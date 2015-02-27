<?php
/**
 * Перенос файлов из одной сущности в другую
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 *
 * app/console file:move
 */

namespace Core\FileBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Filesystem\Filesystem;

class MoveFilesCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('file:move')
            ->addArgument(
                'type', InputArgument::REQUIRED, 'Тип файла image|document'
            )
            ->addArgument(
                'class', InputArgument::REQUIRED, 'Namespace'
            )
            ->addArgument(
                'fromField', InputArgument::REQUIRED, 'Поле, которое содержит связь с файлами у класса fromClass'
            )
            ->addArgument(
                'toField', InputArgument::REQUIRED, 'Поле, которое содержит связь с файлами у класса toClass'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $type      = $input->getArgument('type');
        $class     = $input->getArgument('class');
        $fromField = $input->getArgument('fromField');
        $toField   = $input->getArgument('toField');
        $em        = $this->getContainer()->get('doctrine')->getManager();
        $configs   = $this->getContainer()->getParameter('core_file');
        $logic     = $this->getContainer()->get('core_file_logic');

        if ($type === 'document') {
            $output->writeln('<error>Для типа файла документ перенос не настроен!</error>');
            exit;
        }

        if ($this->_isClassHasField($class, $fromField) === false) {
            $output->writeln('<error>Класс "'.$class.'" не имеет поле с названием "'.$fromField.'", связанное с сущностью файлов!</error>');
            exit;
        }

        if ($this->_isClassHasField($class, $toField) === false) {
            $output->writeln('<error>Класс "'.$class.'" не имеет поле с названием "'.$toField.'", связанное с сущностью файлов!</error>');
            exit;
        }

        $em->getConnection()->getConfiguration()->setSQLLogger(null);

        $fromConfigs = $configs[$type][$class][$fromField];
        $rootDir     = $logic->getUploadRootDir();
        $fs          = new Filesystem();

        $qb  = $em->createQueryBuilder();
        $ids = $qb
            ->select('p.id')
            ->from($class, 'p')
            ->getQuery()
            ->getScalarResult();

        $pOld  = 0;
        $total = count($ids);

        foreach ($ids as $i => $id) {
            $object    = $em->getRepository($class)->find($id['id']);
            $filesFrom = $object->{'get'.ucfirst($fromField)}();
            $filesTo   = $object->{'get'.ucfirst($toField)}();

            if (($count = count($filesFrom))) {

                foreach ($filesTo as $fileTo) {
                    $fileTo->setIndexPosition( ++$count);
                }
                $em->flush();

                $index = 0;
                foreach ($filesFrom as $fileFrom) {
                    $fileFrom->setIndexPosition($index);
                    $fromHalfPath = $fileFrom->getHalfPath();
                    $toHalfPath   = str_replace($fromField, $toField, $fromHalfPath);
                    $fileFrom->setHalfPath($toHalfPath);
                    $em->flush($fileFrom);
                    $object->{'add'.ucfirst($toField)}($fileFrom);
                    $em->flush($object);
                    $object->{'remove'.ucfirst($fromField)}($fileFrom);
                    $em->flush($object);

                    // копируем фотки
                    foreach ($fromConfigs['options'] as $dir => $prefixes) {
                        foreach ($prefixes as $prefix => $sizes) {
                            $name = $prefix.$logic->getNameWithId($fileFrom);
                            if (is_file($rootDir.'/'.$fromHalfPath.'/'.$dir.'/'.$name)) {
                                $fs->copy($rootDir.'/'.$fromHalfPath.'/'.$dir.'/'.$name, $rootDir.'/'.$toHalfPath.'/'.$dir.'/'.$name);
                            }
                        }
                    }

                    // удаляем фотки
                    $fs->remove($rootDir.'/'.$fromHalfPath);
                }
            }

            $p = floor((($i + 1) / $total) * 100);
            if ($p !== $pOld && $p > 0) {
                if ($p % 10 === 0) {
                    $output->writeln('<info>'.$p.'%</info> '.$i.'/'.$total);
                } else {
                    $output->writeln($p.'% '.$i.'/'.$total);
                }
            }
            $pOld = $p;

            $em->clear();
        }

        $output->writeln('<info>Done!</info>');
    }

    private function _isClassHasField($class, $field)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $cm = $em->getClassMetadata($class);

        if ($cm->hasAssociation($field) === true) {
            $targetEntity = $cm->associationMappings[$field]['targetEntity'];
            if (is_subclass_of($targetEntity, 'Core\FileBundle\Entity\CommonFile')) {
                return true;
            }
        }

        return false;
    }
}