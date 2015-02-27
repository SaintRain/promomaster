<?php

/**
 * Прережатие всех картинок если поменяли размер в настройках
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 * app/console file:reresizeimages
 */

namespace Core\FileBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;
use Imagine\Imagick\Imagine;
use Imagine\Image\ImageInterface;
use Imagine\Image\Palette\RGB;
use Imagine\Image\Point;
use Imagine\Image\Box;

class ReResizeImagesCommand extends ContainerAwareCommand
{

    /**
     * Конфигурации команды
     */
    protected function configure()
    {
        $this
                ->setName('file:reresizeimages')
                ->addArgument(
                        'namespace', null, InputOption::VALUE_NONE, null //'Namespace сущности в которой проверяем и пережимаем картинки'
                )
                ->addArgument(
                        'field', null, InputOption::VALUE_NONE, null //'Связное поле в сущностью ImageFile'
                )
        ;
    }

    /**
     * Выполняемая команда
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        ini_set('memory_limit', '1025M');

        $counter = 0;
        $container = $this->getContainer();

        $configs = $container->getParameter('core_file');
        $rootDir = $configs['root_dir'] . '/../' . $configs['web_dir'] . '/' . $configs['upload_dir'];

        $namespace = $input->getArgument('namespace');
        $field = $input->getArgument('field');

        $fs = new Filesystem();
        if ($namespace && $field) {
            if (!isset($configs['image'][$namespace])) {
                $output->writeln('<error>Ooops... Options for namespace: "' . $namespace . '" doesnot exist!</error>');
                exit;
            }
            if (!isset($configs['image'][$namespace][$field])) {
                $output->writeln('<error>Ooops... Options for namespace: "' . $namespace . '" with field:"' . $field . '" doesnot exist!</error>');
                exit;
            }

            $configImages[$namespace][$field] = $configs['image'][$namespace][$field];
        } else {
            $configImages = $configs['image'];
        }

        $imagine = new Imagine();

        // Перебираем все опции картинок
        foreach ($configImages as $namespace => $fieldConfigImage) {

            foreach ($fieldConfigImage as $field => $configImage) {

                $path = $rootDir . '/' . $configImage['dir'];

                if ($fs->exists($path)) {

                    // Получаем настройки ватермарка
                    if (isset($configImage['watermark']) && $configImage['watermark']['enable']) {
                        $configsWM = $configImage['watermark'];
                        $watermark = $imagine->open($configs['root_dir'] . '/../' . $configs['web_dir'] . '/' . $configsWM['url']);
                        $wSize = $watermark->getSize();
                    }

                    // Ишем все директории который называются айдишниками
                    $finderDir = new Finder();
                    $finderDir->in($path)->depth(0)->directories();

                    foreach ($finderDir as $dirById) {
                        $dirByIdAndField = $dirById->getRealpath() . '/' . $field;
                        $dirOriginal = $dirByIdAndField . '/original';
                        if ($fs->exists($dirOriginal)) {

                            // Ищем оригинальную картинку
                            $finderFile = new Finder();
                            $finderFile->in($dirOriginal)->files();

                            foreach ($finderFile as $file) {
                                $originalName = $file->getBasename();
                                if (isset($configImage['options']['original']) && is_array($configImage['options']['original'])) {
                                    $originalPrefix = key($configImage['options']['original']);
                                    $name = str_replace($originalPrefix, '', $originalName);
                                    if (is_file($file->getRealpath())) {
                                        $image = $imagine->open($file->getRealpath());

                                        foreach ($configImage['options'] as $dir => $sizesOptions) {
                                            if ($dir !== 'original') {
                                                $fs->remove($dirByIdAndField . '/' . $dir);
                                                $fs->mkdir($dirByIdAndField . '/' . $dir);

                                                foreach ($sizesOptions as $prefix => $attr) {

                                                    $filename = $dirByIdAndField . '/' . $dir . '/' . $prefix . $name;

                                                    if ($dir === 'preview') {

                                                        if ($configs['thumbnail_crop']) {
                                                            $image
                                                                    ->thumbnail(new Box($attr['size']['w'], $attr['size']['h']), ImageInterface::THUMBNAIL_OUTBOUND)
                                                                    ->save($filename);
                                                        } else {
                                                            $thumbnail = $image->thumbnail(new Box($attr['size']['w'], $attr['size']['h']), ImageInterface::THUMBNAIL_INSET);
                                                            $tSize = $thumbnail->getSize();
                                                            $top = round(($attr['size']['w'] - $tSize->getWidth()) / 2);
                                                            $left = round(($attr['size']['h'] - $tSize->getHeight()) / 2);
                                                            $palette = new RGB();
                                                            $testImage = $imagine->create(new Box($attr['size']['w'], $attr['size']['h']), $palette->color($configs['thumbnail_backgrond_color']));
                                                            $testImage->paste($thumbnail, new Point($top, $left))->save($filename);
                                                            unset($thumbnail);
                                                            unset($testImage);
                                                        }
                                                    } elseif ($dir === 'watermark') {
                                                        $thumbnail = $image->thumbnail(new Box($attr['size']['w'], $attr['size']['h']), ImageInterface::THUMBNAIL_INSET);

                                                        if (isset($configImage['watermark']) && $configImage['watermark']['enable']) {
                                                            $tSize = $thumbnail->getSize();
                                                            $top = round($tSize->getWidth() / 100 * $configsWM['top'] - $wSize->getWidth() / 100 * $configsWM['top']);
                                                            $left = round($tSize->getHeight() / 100 * $configsWM['left'] - $wSize->getHeight() / 100 * $configsWM['left']);
                                                            if ($wSize->getWidth() <= $tSize->getWidth() && $wSize->getHeight() <= $tSize->getHeight()) {
                                                                $thumbnail->paste($watermark, new Point($top, $left));
                                                            }
                                                        }
                                                        $thumbnail->save($filename);
                                                        unset($thumbnail);
                                                    }
                                                }
                                            }
                                        }
                                        $counter++;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $output->writeln('<info>Done!</info>');
        $output->writeln('<info>Count of reresize images: ' . $counter . '</info>');
    }

}
