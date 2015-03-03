<?php
/**
 * Сервис для файлов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Logic;

use Symfony\Component\Templating\Helper\AssetsHelper;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Gedmo\Sluggable\Util\Urlizer;
use Core\FileBundle\Entity\CommonFile;
use Core\FileBundle\Entity\ImageFile;
use Core\FileBundle\Entity\DocumentFile;
use Core\FileBundle\Entity\FlashFile;
use Imagine\Imagick\Imagine;
use Imagine\Image\ImageInterface;
use Imagine\Image\Palette\RGB;
use Imagine\Image\Point;
use Imagine\Image\Box;

class FileLogic
{
    protected $configs;
    protected $translator;
    protected $doctrine;
    protected $session;
    protected $core_color_logic;
    protected $container;
    public $formDataByFieldName;
    public $removedParentId;

    public function __construct($core_file, $translator, $doctrine, $session, $core_color_logic, $container)
    {
        $this->configs          = $core_file;
        $this->translator       = $translator;
        $this->doctrine         = $doctrine;
        $this->session          = $session;
        $this->core_color_logic = $core_color_logic;
        $this->container        = $container;
    }

    public function getRootDir()
    {
        return $this->configs['root_dir'].'/../'.$this->configs['web_dir'];
    }

    public function getUploadRootDir()
    {
        $path = $this->getRootDir().'/'.$this->configs['upload_dir'];
        $fs   = new Filesystem();
        $fs->mkdir($path);
        return $path;
    }

    /**
     * Получение названия файла с id
     *
     * @param object $obj
     * @return string
     */
    public function getNameWithId($obj)
    {
        $parts = pathinfo($obj->getName());
        if (isset($parts['extension'])) {
            $ext = $parts['extension'];
            if ($ext == 'gz') {
                $parts = pathinfo($parts['filename']);
                if ($parts['extension']) {
                    $ext = $parts['extension'].'.'.$ext;
                }
            }
            $name = substr($obj->getName(), 0, stripos($obj->getName(), '.'));
            return $name.'_'.$obj->getId().'.'.$ext;
        }
    }

    /**
     * Получение пути файла для отображения
     *
     * @param \Core\FileBundle\Entity\* $obj
     * @param string $dir
     * @param string $prefix
     * @return string
     */
    public function getFileWebPath($obj, $dir = null, $prefix = null, $dummy = false)
    {

        $filePath = null;
        if (is_array($obj)) {
            $obj = array_shift($obj);
        } elseif ($obj instanceof \Doctrine\ORM\PersistentCollection) {
            $obj = $obj->first();
        }

        if ($obj instanceof CommonFile) {
            if (null !== $dir && null === $prefix) {
                $temp      = explode('/', $obj->getHalfPath());
                $dirConf   = isset($temp[0]) ? $temp[0] : '';
                $fieldConf = isset($temp[2]) ? $temp[2] : '';
                foreach ($this->configs['image'] as $namespace => $configs) {
                    if (isset($configs[$fieldConf]) && isset($configs[$fieldConf]['prefix_preview_in_admin']) && $configs[$fieldConf]['dir'] === $dirConf) {
                        $prefix = $configs[$fieldConf]['prefix_preview_in_admin'];
                        break;
                    }
                }
            }

            $nameWithId      = $this->getNameWithId($obj);
            $halfPathAndName = $obj->getHalfPath().(null === $dir ? '' : '/'.$dir).'/'.(null === $prefix ? '' : $prefix).$nameWithId;
            $rootFile        = $this->getUploadRootDir().'/'.$halfPathAndName;

            if (is_file($rootFile)) {
                $filePath = $this->configs['upload_dir'].'/'.$halfPathAndName;
            } else {

                $original = $this->getUploadRootDir().'/'.$obj->getHalfPath().'/original/';
                if (is_dir($original)) {
                    $files = scandir($original);
                    foreach ($files as $file) {
                        if (strlen($file) > 3 && false !== strpos($file, $nameWithId)) {
                            $filePath = $this->configs['upload_dir'].'/'.$obj->getHalfPath().'/original/'.$file;
                        }
                    }
                }

            }

        }

        if ($dummy && null === $filePath) {

            $filePath = 'images/image_not_found/'.str_replace('_', '', $prefix).'.jpg';
            if (!file_exists($filePath)) {
                $filePath = $this->configs['no_image_src'];
            }
        }

        return $filePath;
    }

    /**
     * Получение полного пути файла для отображения
     *
     * @param \Core\FileBundle\Entity\* $obj
     * @param string $dir
     * @param string $prefix
     * @return string
     */
    public function getFileAssetWebPath($obj, $dir = null, $prefix = null)
    {
        $assetPath = null;
        $path      = $this->getFileWebPath($obj, $dir, $prefix);
        if ($path) {
            $asset     = new AssetsHelper();
            $assetPath = $asset->getUrl($path);
        }
        return $assetPath;
    }

    /**
     * Получение временного пути файла для обработки
     *
     * @param \Core\FileBundle\Entity\* $obj
     * @return string
     */
    public function getFileTempPath($obj)
    {
        $session = $this->session->get('core_file');
        foreach ($session as $formId => $nss) {
            foreach ($nss as $ns => $fts) {
                foreach ($fts as $ft => $paths) {
                    foreach ($paths as $path => $names) {
                        foreach ($names as $i => $name) {
                            if (strpos($name, $obj->getName()) > 0) {
                                if (is_file($path.'/'.$name)) {
                                    return $path.'/'.$name;
                                }
                            }
                        }
                    }
                }
            }
        }
        return null;
    }

    /**
     * Получение абсолютного пути только для обработки файла
     *
     * @param \Core\FileBundle\Entity\* $obj
     * @param string $dir
     * @param string $prefix
     * @return string
     */
    public function getAbsoluteFilePath($obj, $dir = null, $prefix = null)
    {
        $rootFile = null;
        if ($obj->getId() > 0) {
            $nameWithId      = $this->getNameWithId($obj);
            $halfPathAndName = $obj->getHalfPath().(null === $dir ? '' : '/'.$dir).'/'.(null === $prefix ? '' : $prefix).$nameWithId;
            $rootFile        = $this->getUploadRootDir().'/'.$halfPathAndName;
        }
        if (!is_file($rootFile)) {
            $rootFile = $this->getFileTempPath($obj);
        }

        return $rootFile;
    }

    /**
     * Генерирация названия файла для сущности ImageFile
     *
     * @param object $objToInsert - объект файла
     * @param object $objToAttach - объект сущности к которой цепляем файл
     */
    public function setImageName($objToInsert, $objToAttach)
    {
        $filename = sha1(uniqid(mt_rand(), true));
        $file     = $objToInsert->getFile();
        if (null !== $file) {
            if (method_exists($objToAttach, 'getSlug')) {
                $filename = $objToAttach->getSlug();
            } elseif (method_exists($objToAttach, 'getCaptionRu')) {
                $filename = Urlizer::transliterate($objToAttach->getCaptionRu());
            } else {
                $filename = $objToAttach->getId();
            }

//            if ($file->getExtension()) {
//                $ext = $file->getExtension();
//            } else
            if ($file->guessExtension()) {
                $ext = $file->guessExtension();
            } else {
                $parts = pathinfo($file->getClientOriginalName());
                $ext   = $parts['extension'];
                if ($ext == 'gz') {
                    $parts = pathinfo($parts['filename']);
                    if ($parts['extension']) {
                        $ext = $parts['extension'].'.'.$ext;
                    }
                }
            }

            $objToInsert->setName($filename.'.'.$ext);
        }
        return $objToInsert;
    }

    /**
     * Генерирация названия файла для сущности DocumentFile
     *
     * @param object $objToInsert - объект файла
     */
    public function setDocumentName($objToInsert)
    {
        $file = $objToInsert->getFile();
        if (null !== $file) {
            $filename = $this->UrlizerFileName($file->getClientOriginalName());
//            if ($file->getExtension()) {
//                $ext = $file->getExtension();
//            } else
            if ($file->guessExtension()) {
                $ext = $file->guessExtension();
            } else {
                $parts = pathinfo($file->getClientOriginalName());
                $ext   = $parts['extension'];
                if ($ext == 'gz') {
                    $parts = pathinfo($parts['filename']);
                    if ($parts['extension']) {
                        $ext = $parts['extension'].'.'.$ext;
                    }
                }
            }
            $objToInsert->setName($filename.'.'.$ext);
        }
        return $objToInsert;
    }

    public function UrlizerFileName($name)
    {
        $parts = pathinfo($name);
        $name  = substr($name, 0, strripos($name, '.'));
        $ext   = $parts['extension'];
        if ($ext == 'gz') {
            $name = substr($name, 0, strripos($name, '.'));
        }
        return Urlizer::transliterate($name);
    }

    /**
     * Замена картинки
     *
     * @param array $request
     * @return type
     */
    public function replaceImage($request)
    {

        $response = array();
        $data     = $request->get('data');

        // проверка на наличие поступивших данных
        if (null === $data) {
            $response['error'][] = $this->translator->trans('error.empty.data', array(), 'CoreFileBundle');
        } else {

            // проверка на наличие пути оригинального файла или загруженного файла
            if (!isset($data['original']) && !is_object($request->files->get('original'))) {
                $response['error'][] = $this->translator->trans('error.empty.original', array(), 'CoreFileBundle');
            }
            // проверка на наличие пути заменяемого файла
            if (!isset($data['replace'])) {
                $response['error'][] = $this->translator->trans('error.empty.replace', array(), 'CoreFileBundle');
            }

            // проверка на наличие массива координат
            if (!isset($data['coords']) && is_array($data['coords'])) {
                $response['error'][] = $this->translator->trans('error.error', array('%in%' => 'coords'), 'CoreFileBundle');
            }

            // проверка на наличие ширины и высоты
            if (!isset($data['coords']['w']) || !isset($data['coords']['h'])) {
                $response['error'][] = $this->translator->trans('error.error', array('%in%' => 'width || heigth'), 'CoreFileBundle');
            }

            // проверка на наличие ширины и высоты
            if (!isset($data['action'])) {
                $response['error'][] = $this->translator->trans('error.empty.action', array(), 'CoreFileBundle');
            }
        }
        if (!isset($response['error'])) {

            $isWatermark = (bool) $data['isWatermark'];
            $coords      = $data['coords'];
            $action      = $data['action'];
            $webRootDir  = $this->getRootDir();
            $uf          = $request->files->get('original');
            $original    = null !== $uf ? $uf->getRealPath() : $webRootDir.$data['original'];
            $replace     = $webRootDir.$data['replace'];

            if (!is_file($original)) {
                $response['error'][] = $this->translator->trans('error.cannot_open_file', array('%in%' => (is_file($original) ? '' : "\n".$original)), 'CoreFileBundle');
            }
            if (!is_file($replace) && $action === 'crop') {
                $response['error'][] = $this->translator->trans('error.cannot_open_file', array('%in%' => (is_file($replace) ? '' : "\n".$replace)), 'CoreFileBundle');
            }

            if (!isset($response['error'])) {

                $imagine = new Imagine();

                // открываем картинку
                $image = $imagine->open($original);

                switch ($action) {
                    case 'crop':
                        // если пришли координаты для кропа картинки
                        if (isset($coords['x2']) && isset($coords['y2'])) {

                            $size = $image->getSize();

                            $k1 = $coords['h'] / $coords['w'];
                            $Wr = $size->getWidth();
                            $Hr = $coords['h'] + ($size->getWidth() - $coords['w']) * $k1;
                            if ($Hr < $size->getHeight()) {
                                $Hd = $size->getHeight() - $Hr;
                                $Hr = $size->getHeight();
                                $Wr = $Wr + ($Hd) / $k1;
                            }

                            $y = ($Hr - $size->getHeight()) / 2;
                            $x = ($Wr - $size->getWidth()) / 2;

                            $palette   = new RGB();
                            $tempImage = $imagine->create(new Box($Wr, $Hr), $palette->color($this->configs['thumbnail_backgrond_color']));
                            $tempImage->paste($image, new Point($x, $y));
                            $image     = $tempImage;
                            unset($tempImage);

                            // режем картинку
                            $image->crop(new Point($coords['x1'], $coords['y1']), new Box($coords['x2'] - $coords['x1'], $coords['y2'] - $coords['y1']));
                        }
                        // ресайзим картинку
                        $image->resize(new Box($coords['w'], $coords['h']));

                        if ($isWatermark) {
                            $currentConfigs = $this->configs['image'][$data['class']][$data['field']];
                            if (isset($currentConfigs['watermark']) && $currentConfigs['watermark']['enable']) {
                                $configsWM = $currentConfigs['watermark'];
                                $watermark = $imagine->open($this->getRootDir().'/'.$configsWM['url']);
                                $wSize     = $watermark->getSize();
                                $tSize     = $image->getSize();
                                $top       = round($tSize->getWidth() / 100 * $configsWM['top'] - $wSize->getWidth() / 100 * $configsWM['top']);
                                $left      = round($tSize->getHeight() / 100 * $configsWM['left'] - $wSize->getHeight() / 100 * $configsWM['left']);
                                if ($wSize->getWidth() <= $tSize->getWidth() && $wSize->getHeight() <= $tSize->getHeight()) {
                                    $image->paste($watermark, new Point($top, $left));
                                }
                            }
                        }

                        break;
                    case 'replace':
                        if ($coords['w'] > 1 && $coords['h'] > 1) {
                            // сравниваем разрешимые и полученные размеры картинки
                            if ($coords['w'] != $image->getSize()->getWidth() || $coords['h'] != $image->getSize()->getHeight()) {
                                $response['error'][] = $this->translator->trans('error.bad_image_size', array('%w%' => $coords['w'], '%h%' => $coords['h']), 'CoreFileBundle');
                                $response['error'][] = $this->translator->trans('error.received_image_size', array('%w%' => $image->getSize()->getWidth(), '%h%' => $image->getSize()->getHeight()),
                                    'CoreFileBundle');
                            }
                        }
                        break;
                    default:
                        $response['error'][] = $this->translator->trans('error.no_target_action', array('%in%' => $action), 'CoreFileBundle');
                        break;
                }
            }

            if (!isset($response['error'])) {
                // сохраняем картинку
                $image->save($replace);
                // Определяем доминирующий цвет
                if ($this->configs['detect_dominant_color'] && isset($data['detect_dominant_color']) && $data['detect_dominant_color']) {
                    $response['other']['dominantColor'] = $this->core_color_logic->getDominantColor($replace);
                }
                $response['success'][] = $this->translator->trans('success.update.image', array(), 'CoreFileBundle');
            }

            if (isset($data['id']) && isset($data['attach']) && $data['attach'] !== 'undefined') {
                $em                               = $this->doctrine->getManager();
                $objToAttach                      = $em->getRepository($data['attach'])->find($data['id']);
                $response['other']['objToAttach'] = $objToAttach;
                $response['other']['idToAttach']  = $data['id'];
            }
        }

        return $response;
    }

    /**
     * Удаление файлов
     *
     * @param array $request
     * @return array
     */
    public function ajaxRemoveFile($request)
    {
        if (is_array($request)) {
            if (isset($request['id'])) {
                $id = $request['id'];
            } else {
                $hash = $request['hash'];
            }
            $data = $request['data'];
        } else {
            $id   = $request->get('id');
            $hash = $request->get('hash');
            $data = $request->get('data');
        }
        $response = array();
        if ($id && is_array($data)) {
            $em  = $this->doctrine->getManager();
            $obj = $em->getRepository('CoreFileBundle:CommonFile')->find($id);
            if (null !== $obj) {
                $response['other']['idRemoved']           = $id;
                $response['other']['nameRemoved']         = $this->getNameWithId($obj);
                $response['other']['objRemoved']          = $obj;
                $response['other']['namespace_to_attach'] = $data['namespace_to_attach'];

                $mapping = $em->getClassMetadata($data['namespace_to_attach'])->getAssociationMapping($data['fieldName']);
                if (isset($mapping['indexBy'])) {
                    $response['other']['indexBy'] = $mapping['indexBy'];
                }

                if (isset($data['id_to_attach'])) {
                    $objAttach                        = $em->getRepository($data['namespace_to_attach'])->find($data['id_to_attach']);
                    $response['other']['objToAttach'] = $objAttach;
                    $response['other']['idToAttach']  = $objAttach->getId();
                    $objAttach->{'remove'.ucfirst($data['fieldName'])}($obj);
                    $em->persist($objAttach);
                }
                $em->remove($obj);
                $em->flush();
                $this->removeFile($obj, $data);
                $response['success'][] = $this->translator->trans('success.delete', array(), 'CoreFileBundle');
            } else {
                $response['error'][] = $this->translator->trans('error.not_found.object', array('%in%' => $id), 'CoreFileBundle');
            }
        } elseif ($hash && is_array($data)) {
            $session = $this->session->get('core_file');
            if (isset($session[$data['form_id']][$data['namespace_to_attach']][$data['namespace_to_insert']])) {
                $filesInSession = $session[$data['form_id']][$data['namespace_to_attach']][$data['namespace_to_insert']];
                foreach ($filesInSession as $pathFiled => $files) {
                    foreach ($files as $key => $file) {
                        if ($file == $hash) {
                            unset($filesInSession[$pathFiled][$key]);
                        }
                    }
                }
                $session[$data['form_id']][$data['namespace_to_attach']][$data['namespace_to_insert']] = $filesInSession;
                $this->session->set('core_file', $session);
                $response['success'][]                                                                 = $this->translator->trans('success.delete', array(), 'CoreFileBundle');
            }
        } else {
            $response['error'][] = $this->translator->trans('error.empty.data', array(), 'CoreFileBundle');
        }

        return $response;
    }

    /**
     * Загрузка картинок
     *
     * @param array $request
     * @return array
     */
    public function uploadFile($request)
    {

        $response = array();
        if (null === $request->get('CoreFileBundleInput')) {
            $response['error'][] = $this->translator->trans('error.empty.data', array(), 'CoreFileBundle');
            return $response;
        }

        $data = $request->get('CoreFileBundleInput');
        $type = isset($data['type']) ? $data['type'] : 'document';

        $filesToUpload = $request->files->get('CoreFileBundleInput');
        $files         = $filesToUpload['filesToUpload'];

        $formId         = $data['form_id'];
        $id             = $data['id'];
        $field          = $data['fieldName'];
        $attach         = $data['namespace_to_attach'];
        $insert         = $data['namespace_to_insert'];

//        if (isset($this->configs[$type][$attach][$field])) {
//            $configs= $this->configs[$type][$attach][$field];
//        }
//        else if (isset($this->configs['image'][$attach][$field])) {
//        $configs= $this->configs['image'][$attach][$field];
//    }   else if (isset($this->configs['flash'][$attach][$field])) {
//            $configs= $this->configs['flash'][$attach][$field];
//        }

        $configs        = isset($this->configs[$type][$attach][$field]) ? $this->configs[$type][$attach][$field] : $this->configs['image'][$attach][$field];
        $dataToResponse = array();
        $objToAttach    = null;

        $em = $this->doctrine->getManager();

        if (count($files)) {
            if ($id) {
                $objToAttach = $em->getRepository($attach)->find($id);
            }

            $options = array(
                'objToAttach' => $objToAttach,
                'data' => $data,
            );

            // проверка ограничений по размеру и типу картинки
            $response = $this->checkMimeTypeAndFileSize($files, $configs, $options);

            if (!isset($response['error'])) {

                if ($id) {

                    $options = array(
                        'fieldName' => $field,
                        'insert' => $insert,
                        'objToAttach' => $objToAttach,
                        'data' => $data,
                    );

                    if ($type === 'image') {
                        // вызываем метод обработки картинок
                        $response = $this->handlingAndPersistImages($files, $options);
                    } elseif ($type === 'document') {
                        // вызываем метод обработки документов
                        $response = $this->handlingAndPersistDocument($files, $options);
                    }
                    elseif ($type === 'flash') {
                        // вызываем метод обработки документов
                        $response = $this->handlingAndPersistFlash($files, $options);
                    }
                    $response['other']['objToAttach'] = $objToAttach;
                    $response['other']['idToAttach']  = $id;



                    $mapping = $em->getClassMetadata($attach)->getAssociationMapping($field);
                    if (isset($mapping['indexBy'])) {
                        $response['other']['indexBy'] = $mapping['indexBy'];
                    }
                } else {
                    // если объект к которому добавляем картинки еще не создам, то сохраняем картинки во временную папку
                    $session      = $this->session->get('core_file');
                    $sessionId    = $this->session->getId();
                    $sessionImage = $this->session->get('core_file_image');

                    if (!isset($sessionId)) {
                        $response['error'][] = $this->translator->trans('error.cannot_get_session_id', array(), 'CoreFileBundle');
                    }

                    if (!isset($response['error'])) {
                        $path = $this->configs['temp_dir'].'/'.$sessionId.'/'.$formId.'/'.$configs['dir'].'/'.$field;

                        if ($type === 'document' || $type === 'flash') {
                            $files =  array_reverse($files, true);
                        }
                        //$files = $type === 'document' ? array_reverse($files, true) : $files;


                        foreach ($files as $no => $uf) {
                            if ($uf->guessExtension()) {
                                $ext = $uf->guessExtension();
                            } else {
                                $parts = pathinfo($uf->getClientOriginalName());
                                $ext   = $parts['extension'];
                                if ($ext == 'gz') {
                                    $parts = pathinfo($parts['filename']);
                                    if ($parts['extension']) {
                                        $ext = $parts['extension'].'.'.$ext;
                                    }
                                }
                            }

                            $filename = sha1(uniqid(mt_rand(), true)).'#'.$this->UrlizerFileName($uf->getClientOriginalName()).'.'.$ext;

                            $uf->move($path, $filename);
                            $session[$formId][$attach][$insert][$path][] = $filename;

                            $imageSize = '';
                            if ($type === 'image') {
                                $imagine = new Imagine();
                                // открываем картинку
                                $image   = $imagine->open($path.'/'.$filename);

                                $imageSize                                  = $image->getSize()->getWidth().'x'.$image->getSize()->getHeight().'px';
                                $resize100x100                              = $image->thumbnail(new Box(150, 150), ImageInterface::THUMBNAIL_INSET);
                                $sessionImage[$formId]['base64'][$filename] = 'data:image/'.$ext.';base64,'.base64_encode($resize100x100->get($ext));
                                $sessionImage[$formId]['base64Extra'][$filename]=['width'=>$image->getSize()->getWidth(), 'height'=>$image->getSize()->getHeight()];
                                $response['other']['imginfo'][$filename]    = array(
                                    'base64' => $sessionImage[$formId]['base64'][$filename],
                                    'imageSize' => $imageSize,
                                );

                                // если есть поле detect_dominant_color значит это главное фото
                                if (isset($data['detect_dominant_color']) && $no === 0) {
                                    $resize600x600 = $image->thumbnail(new Box(600, 600), ImageInterface::THUMBNAIL_INSET);
                                    $base64        = 'data:image/'.$ext.';base64,'.base64_encode($resize600x600->get($ext));
                                    if (!$sessionImage[$formId]) {
                                        $sessionImage[$formId]['imageMainInBase64'] = $base64;
                                    }
                                    $response['other']['imageMainInBase64'] = $base64;
                                }

                                $this->session->set('core_file_image', $sessionImage);
                                // Определяем доминирующий цвет
                                if ($this->configs['detect_dominant_color'] && isset($data['detect_dominant_color']) && $data['detect_dominant_color']) {
                                    $response['other']['dominantColor'] = $this->core_color_logic->getDominantColor($path.'/'.$filename);
                                }

                                $response['extraImg']      = [
                                    'height'=>$image->getSize()->getHeight(),
                                    'width'=>$image->getSize()->getWidth()

                                ];
                            }

                            $this->session->set('core_file', $session);
                            $dataToResponse[]      = array(
                                'name' => $filename,
                                'size' => filesize($path.'/'.$filename),
//                                'imageSize' => $imageSize,
                            );
                            $response['success'][] = $this->translator->trans('success.upload', array('%in%' => $uf->getClientOriginalName()), 'CoreFileBundle');
                        }
                        $response['data'] = $dataToResponse;
                        $response['type'] = $type;
                        $response['isNew'] = true;

                    }
                }
            }
        } else {

            $response['error'][] = $this->translator->trans('error.empty.files', array(), 'CoreFileBundle');
        }
        return $response;
    }

    /**
     * Обработка, сохранеие и запись картинки в БД
     *
     * @param array $images - массив объектов типа UploadedFile
     * @param array $options - массив опций
     *                  ['fieldName'] - поле объекта к которому добавляем картинку (reqiured)
     *                  ['insert'] - namespace объекта картинки (reqiured)
     *                  ['objToAttach'] - объект к которому добавляем картинку (reqiured)
     *                  ['objToUpdate'] - объект картинки, если передаем, то новая запись не создается
     * @return array
     */
    public function handlingAndPersistImages($images, array $options)
    {

        $fs             = new Filesystem();
        $response       = array();
        $dataToResponse = array();
        $em             = $this->doctrine->getManager();
        $configs        = $this->searchConfigsByObj($options['objToAttach'], 'image');
        $currentConfigs = isset($configs[$options['fieldName']]) ? $configs[$options['fieldName']] : [];

        if (!count($images)) {
            $response['error'][] = $this->translator->trans('error.empty.files', array(), 'CoreFileBundle');
        }

        if (!count($currentConfigs)) {
            $response['error'][] = $this->translator->trans('error.empty.configs', array('%in%' => get_class($options['objToAttach']).'#'.$options['fieldName']), 'CoreFileBundle');
        }

        if (!is_object($options['objToAttach'])) {
            $response['error'][] = $this->translator->trans('error.empty.attach_object', array(), 'CoreFileBundle');
        }

        if (!isset($response['error'])) {

            $imagine = new Imagine();

            if (isset($currentConfigs['watermark']) && $currentConfigs['watermark']['enable']) {
                $configsWM = $currentConfigs['watermark'];
                $watermark = $imagine->open($this->getRootDir().'/'.$configsWM['url']);
                $wSize     = $watermark->getSize();
            }
            //$images = array_reverse($images);
            foreach ($images as $no => $uf) {
                list($width, $height) = getimagesize($uf);
                $indexPosition = count($options['objToAttach']->{'get'.ucfirst($options['fieldName'])}()) + 1;

                if (isset($options['objToUpdate']) && $options['objToUpdate'] instanceof CommonFile) {
                    $objToInsert = $options['objToUpdate'];
                } else {
                    $objToInsert = new $options['insert']();
                    if (method_exists($options['objToAttach'], 'add'.ucfirst($options['fieldName']))) {
                        $method = 'add';
                    } else {
                        $method = 'set';
                    }
                    $options['objToAttach']->{$method.ucfirst($options['fieldName'])}($objToInsert);
                    $em->persist($options['objToAttach']);
                }

                $halfPath = $currentConfigs['dir'].'/'.$options['objToAttach']->getId().'/'.$options['fieldName'];

                $objToInsert->setFile($uf);
                $objToInsert->setHeight($height);
                $objToInsert->setWidth($width);
                $objToInsert->setHalfPath($halfPath);
                $objToInsert->setIndexPosition($indexPosition);
                $this->setImageName($objToInsert, $options['objToAttach']);
                $em->persist($objToInsert);
                $em->flush();

                // открываем картинку
                $image = $imagine->open($uf->getRealPath());

                // Сохранение файла изображения, порезка, наложение watermark'a
                foreach ($currentConfigs['options'] as $dir => $prefixes) {

                    $path = $this->getUploadRootDir().'/'.$objToInsert->getHalfPath().'/'.$dir;
                    $fs->mkdir($path);

                    foreach ($prefixes as $prefix => $attr) {
                        $filename = $path.'/'.$prefix.$this->getNameWithId($objToInsert);
                        if ($dir === 'preview') {

                            if ($this->configs['thumbnail_crop']) {
                                $image
                                    ->thumbnail(new Box($attr['size']['w'], $attr['size']['h']), ImageInterface::THUMBNAIL_OUTBOUND)
                                    ->save($filename);
                            } else {
                                $thumbnail = $image->thumbnail(new Box($attr['size']['w'], $attr['size']['h']), ImageInterface::THUMBNAIL_INSET);
                                $tSize     = $thumbnail->getSize();
                                $top       = round(($attr['size']['w'] - $tSize->getWidth()) / 2);
                                $left      = round(($attr['size']['h'] - $tSize->getHeight()) / 2);
                                $palette   = new RGB();
                                $testImage = $imagine->create(new Box($attr['size']['w'], $attr['size']['h']), $palette->color($this->configs['thumbnail_backgrond_color']));
                                $testImage->paste($thumbnail, new Point($top, $left))->save($filename);
                                unset($thumbnail);
                                unset($testImage);
                            }
                        } elseif ($dir === 'watermark') {
                            $thumbnail = $image->thumbnail(new Box($attr['size']['w'], $attr['size']['h']), ImageInterface::THUMBNAIL_INSET);

                            if (isset($currentConfigs['watermark']) && $currentConfigs['watermark']['enable']) {
                                $tSize = $thumbnail->getSize();
                                $top   = round($tSize->getWidth() / 100 * $configsWM['top'] - $wSize->getWidth() / 100 * $configsWM['top']);
                                $left  = round($tSize->getHeight() / 100 * $configsWM['left'] - $wSize->getHeight() / 100 * $configsWM['left']);
                                if ($wSize->getWidth() <= $tSize->getWidth() && $wSize->getHeight() <= $tSize->getHeight()) {
                                    $thumbnail->paste($watermark, new Point($top, $left));
                                }
                            }
                            $thumbnail->save($filename);
                            unset($thumbnail);
                        } else {
                            $image->save($filename);
                            // Определяем доминирующий цвет
                            if ($this->configs['detect_dominant_color'] && isset($options['data']['detect_dominant_color']) && $options['data']['detect_dominant_color'] && $no === 0) {
                                $response['other']['dominantColor'] = $this->core_color_logic->getDominantColor($filename);
                            }
                        }
                        $dataToResponse[$objToInsert->getId()][$this->configs['upload_dir'].'/'.$objToInsert->getHalfPath()][$dir][$prefix] = $this->getNameWithId($objToInsert);
                    }
                }
                unset($image);
                $response['success'][] = $this->translator->trans('success.upload', array('%in%' => $uf->getClientOriginalName()), 'CoreFileBundle');
                $response['data']      = $dataToResponse;
                $response['extraImg']      = [
                    'id'=>$objToInsert->getId(),
                    'path'=>$this->configs['upload_dir'].'/'.$objToInsert->getHalfPath(),
                    'height'=>$height,
                    'width'=>$width

                ];
            }
        }
        $response['type']='image';
        return $response;
    }

    /**
     * Обработка, сохранеие и запись картинки в БД
     *
     * @param array $documents - массив объектов типа UploadedFile
     * @param array $options - массив опций
     *                  ['fieldName'] - поле объекта к которому добавляем картинку (reqiured)
     *                  ['insert'] - namespace объекта document (reqiured)
     *                  ['objToAttach'] - объект к которому добавляем документ (reqiured)
     *                  ['objToUpdate'] - объект картинки, если передаем, то новая запись не создается
     * @return array
     */
    public function handlingAndPersistDocument($documents, array $options)
    {

        $response       = array();
        $em             = $this->doctrine->getManager();
        $configs        = $this->searchConfigsByObj($options['objToAttach'], 'document');
        $currentConfigs = isset($configs[$options['fieldName']]) ? $configs[$options['fieldName']] : [];

        if (!count($documents)) {
            $response['error'][] = $this->translator->trans('error.empty.files', array(), 'CoreFileBundle');
        }

        if (!count($currentConfigs)) {
            $response['error'][] = $this->translator->trans('error.empty.configs', array('%in%' => get_class($options['objToAttach']).'#'.$options['fieldName']), 'CoreFileBundle');
        }

        if (!is_object($options['objToAttach'])) {
            $response['error'][] = $this->translator->trans('error.empty.attach_object', array(), 'CoreFileBundle');
        }

        if (!isset($response['error'])) {

            //$documents = array_reverse($documents);
            foreach ($documents as $uf) {

                $indexPosition = count($options['objToAttach']->{'get'.ucfirst($options['fieldName'])}()) + 1;

                if (isset($options['objToUpdate']) && $options['objToUpdate'] instanceof CommonFile) {
                    $objToInsert = $options['objToUpdate'];
                } else {
                    $objToInsert = new $options['insert']();
                    if (method_exists($options['objToAttach'], 'add'.ucfirst($options['fieldName']))) {
                        $method = 'add';
                    } else {
                        $method = 'set';
                    }
                    $options['objToAttach']->{$method.ucfirst($options['fieldName'])}($objToInsert);
                    $em->persist($options['objToAttach']);
                }

                $halfPath = $currentConfigs['dir'].'/'.$options['objToAttach']->getId().'/'.$options['fieldName'];

                $objToInsert->setFile($uf);
                $objToInsert->setSize($uf->getClientSize());
                $objToInsert->setIndexPosition($indexPosition);
                $objToInsert->setHalfPath($halfPath);
                $this->setDocumentName($objToInsert);
                $em->persist($objToInsert);
                $em->flush();

                // Сохранение документа
                $filename = $this->getNameWithId($objToInsert);

                $path = $this->getUploadRootDir().'/'.$objToInsert->getHalfPath();
                $uf->move($path, $filename);

                $response['data'][(string) $objToInsert->getId()][$this->configs['upload_dir'].'/'.$objToInsert->getHalfPath()] = array(
                    'name' => $filename,
                    'size' => $uf->getClientSize(),
                );
                $response['success'][]                                                                                              = $this->translator->trans('success.upload',
                    array('%in%' => $uf->getClientOriginalName()), 'CoreFileBundle');
            }
//            if (isset($response['data'])) {
//                $response['data'] = array_reverse($response['data'], true);
//            }
        }
        $response['type']='document';
        return $response;
    }


    /**
     * Обработка, сохранеие и запись flash в БД
     *
     * @param array $documents - массив объектов типа UploadedFile
     * @param array $options - массив опций
     *                  ['fieldName'] - поле объекта к которому добавляем картинку (reqiured)
     *                  ['insert'] - namespace объекта document (reqiured)
     *                  ['objToAttach'] - объект к которому добавляем документ (reqiured)
     *                  ['objToUpdate'] - объект картинки, если передаем, то новая запись не создается
     * @return array
     */
    public function handlingAndPersistFlash($documents, array $options)
    {

        $response       = array();
        $em             = $this->doctrine->getManager();
        $configs        = $this->searchConfigsByObj($options['objToAttach'], 'flash');
        $currentConfigs = isset($configs[$options['fieldName']]) ? $configs[$options['fieldName']] : [];

        if (!count($documents)) {
            $response['error'][] = $this->translator->trans('error.empty.files', array(), 'CoreFileBundle');
        }

        if (!count($currentConfigs)) {
            $response['error'][] = $this->translator->trans('error.empty.configs', array('%in%' => get_class($options['objToAttach']).'#'.$options['fieldName']), 'CoreFileBundle');
        }

        if (!is_object($options['objToAttach'])) {
            $response['error'][] = $this->translator->trans('error.empty.attach_object', array(), 'CoreFileBundle');
        }

        if (!isset($response['error'])) {

            //$documents = array_reverse($documents);
            foreach ($documents as $uf) {

                $indexPosition = count($options['objToAttach']->{'get'.ucfirst($options['fieldName'])}()) + 1;

                if (isset($options['objToUpdate']) && $options['objToUpdate'] instanceof CommonFile) {
                    $objToInsert = $options['objToUpdate'];
                } else {
                    $objToInsert = new $options['insert']();
                    if (method_exists($options['objToAttach'], 'add'.ucfirst($options['fieldName']))) {
                        $method = 'add';
                    } else {
                        $method = 'set';
                    }
                    $options['objToAttach']->{$method.ucfirst($options['fieldName'])}($objToInsert);
                    $em->persist($options['objToAttach']);
                }

                $halfPath = $currentConfigs['dir'].'/'.$options['objToAttach']->getId().'/'.$options['fieldName'];

                // Сохранение документа
                $objToInsert->setFile($uf);
                $objToInsert->setSize($uf->getClientSize());
                $objToInsert->setIndexPosition($indexPosition);
                $objToInsert->setHalfPath($halfPath);
                $this->setDocumentName($objToInsert);

                //определяем размеры флешки
                list($width, $height) = getimagesize($uf->getPathname());
                $objToInsert->setWidth($width);
                $objToInsert->setHeight($height);
                $em->persist($objToInsert);
                $em->flush();




                $filename = $this->getNameWithId($objToInsert);
                $path = $this->getUploadRootDir().'/'.$objToInsert->getHalfPath();
                $uf->move($path, $filename);

                $response['data'][(string) $objToInsert->getId()][$this->configs['upload_dir'].'/'.$objToInsert->getHalfPath()] = array(
                    'name' => $filename,
                    'width' => $width,
                    'height' => $height,
                    'size' => $uf->getClientSize(),
                );

                $response['success'][]                                                                                              = $this->translator->trans('success.upload',
                    array('%in%' => $uf->getClientOriginalName()), 'CoreFileBundle');
            }
//            if (isset($response['data'])) {
//                $response['data'] = array_reverse($response['data'], true);
//            }
        }
        $response['type']='flash';
        return $response;
    }


    /**
     * Удаление файлов
     *
     * @param \Core\FileBundle\Entity\* $obj
     * @param array $data
     *      $data['fieldName'] - (required) название поля по которому связана сущность файлов с любой другой сущностью
     *      $data['namespace_to_attach'] - (required) namespace сущности с которой связана сущность файлов
     */
    public function removeFile($obj, $data)
    {

        if (null === $obj) {
            return false;
        }

        if (is_array($obj)) {
            $obj = current($obj);
        }

        if (!isset($data['fieldName'])) {
            throw new NotFoundHttpException('Missed required fields:'."\n".'$data[\'fieldName\']'."\n".get_class().'#'.__FUNCTION__);
        }

        if (!isset($data['namespace_to_attach'])) {
            throw new NotFoundHttpException('Missed required fields:'."\n".'$data[\'namespace_to_attach\']'."\n".get_class().'#'.__FUNCTION__);
        }

        $removedFiles = array();

        if ($obj instanceof ImageFile) {
            if (isset($this->configs['image'][$data['namespace_to_attach']][$data['fieldName']])) {
                $configs = $this->configs['image'][$data['namespace_to_attach']][$data['fieldName']];

                foreach ($configs['options'] as $dir => $prefixes) {
                    foreach ($prefixes as $prefix => $attr) {
                        $removedFiles[] = $this->getUploadRootDir().'/'.$obj->getHalfPath().'/'.$dir.'/'.$prefix.$this->getNameWithId($obj);
                    }
                }
            }
        } elseif ($obj instanceof DocumentFile) {
            $removedFiles[] = $this->getUploadRootDir().'/'.$obj->getHalfPath().'/'.$this->getNameWithId($obj);
        }

        elseif ($obj instanceof FlashFile) {
            $removedFiles[] = $this->getUploadRootDir().'/'.$obj->getHalfPath().'/'.$this->getNameWithId($obj);
        }
        else {
            throw new NotFoundHttpException('Deleting files is not configured for the entity:'."\n".get_class($obj)."\n in ".get_class().'#'.__FUNCTION__);
        }

        // Удаление файлов
        foreach ($removedFiles as $file) {
            //$fs = new Filesystem();
            if (is_file($file)) {
                unlink($file);
            }
        }

        return true;
    }

    /**
     * Чистка таблицы и удаление файлов
     *
     * @param Object $obj
     * @param array $data
     *      $data['fieldName'] - (required) название поля по которому связана сущность файлов с любой другой сущностью
     *      $data['namespace_to_attach'] - (required) namespace сущности с которой связана сущность файлов
     */
    public function clearTableAndRemoveFile($obj)
    {
        if (isset($this->formDataByFieldName[get_class($obj)])) {
            foreach ($this->formDataByFieldName[get_class($obj)] as $data) {
                if (isset($data['data'][$data['fieldName']])) {
                    if (null === $obj) {
                        throw new NotFoundHttpException('$obj equal zero in'."\n".get_class().'#'.__FUNCTION__);
                    }

                    $em  = $this->doctrine->getManager();
                    $ids = array();

                    foreach ($data['data'][$data['fieldName']] as $key => $arrayData) {
                        if (isset($arrayData['_delete']) && $arrayData['_delete']) {
                            if (method_exists($obj, 'get'.ucfirst($data['fieldName']))) {
                                $objFile = $obj->{'get'.ucfirst($data['fieldName'])}();
                                if (method_exists($objFile, 'get')) {
                                    $objFile = $objFile->get($key);
                                } elseif (is_array($objFile)) {
                                    $objFile = current($objFile);
                                }
                                if (null !== $objFile) {
                                    $this->removeFile($objFile, $data);
//                                    $ids[] = $objFile->getId();
                                    $em->remove($objFile);
                                    $em->flush($objFile);
                                }
                            }
                        }
                    }
//                    if (count($ids)) {
//                        $em->getRepository('CoreFileBundle:CommonFile')->delete($ids);
//                    }
                }
            }
            return true;
        }
    }

    /**
     * Удаление всех связных файлов с полученым объектом и очистка тадлицы
     *
     * @param type $obj
     * @throws NotFoundHttpException
     */
    public function onTargetObjRemove($obj)
    {
        if (null === $obj) {
            throw new NotFoundHttpException('$obj equal zero in'."\n".get_class().'#'.__FUNCTION__);
        }

        $configsImage    = $this->searchConfigsByObj($obj, 'image');
        $configsDocument = $this->searchConfigsByObj($obj, 'document');
        $configsFlash = $this->searchConfigsByObj($obj, 'flash');
//        $configs         = array_merge($configsImage, $configsDocument);
        $configs         = array_merge($configsImage, $configsDocument, $configsFlash);

        // если в конфигах есть настройки для полученого объекта
        if (!empty($configs)) {

            $fs = new Filesystem();
            $em = $this->doctrine->getManager();

            foreach ($configs as $fieldName => $c) {
                $ids = array();

                // чистим БД
                $getter = 'get'.ucfirst($fieldName);
                if (method_exists($obj, $getter)) {
                    $filesObj = $obj->{$getter}();
                    if (null !== $filesObj) {
                        foreach ($filesObj as $fileObj) {
                            if ($fileObj) {
                                $ids[] = $fileObj->getId();
                            }
                        }
                    }
                }

                // удаление записей из таблицы
                if (!empty($ids)) {
                    $em->getRepository('CoreFileBundle:CommonFile')->delete($ids);
                }

                // удаляем каталог/дерево с файлами
                if (isset($configs[$fieldName]['dir']) && $this->removedParentId > 0) {
                    $path = $this->getUploadRootDir().'/'.$configs[$fieldName]['dir'].'/'.$this->removedParentId;
                    if (is_dir($path)) {
                        $fs->remove(array($path));
                    }
                }
            }
            return true;
        }
    }

    /**
     * Поиск конфигов по объекту
     *
     * @param object $obj
     * @param string $type
     * @return array
     */
    public function searchConfigsByObj($obj, $type)
    {

        $configs     = array();
        $class       = get_class($obj);
        $parentClass = get_parent_class($obj);

        if (key_exists($class, $this->configs[$type])) {
            $configs = $this->configs[$type][$class];
        } elseif ($parentClass) {
            if (key_exists($parentClass, $this->configs[$type])) {
                $configs = $this->configs[$type][$parentClass];
            }
        }

        return $configs;
    }

    /**
     * Переносим временные файлы
     */
    public function moveTempFiles($obj)
    {

        $configsImage    = $this->searchConfigsByObj($obj, 'image');
        $configsDocument = $this->searchConfigsByObj($obj, 'document');
        $configsFlash = $this->searchConfigsByObj($obj, 'flash');
//        $configs         = array_merge($configsImage, $configsDocument);
        $configs         = array_merge($configsImage, $configsDocument, $configsFlash);


        // если в конфигах есть настройки для полученого объекта
        if (!empty($configs)) {
            $session   = $this->session->get('core_file');
            $sessionId = $this->session->getId();

            $requestCoreFileBundleInput = Request::createFromGlobals()->request->get('CoreFileBundleInput');
            if (is_array($requestCoreFileBundleInput)) {
                foreach ($requestCoreFileBundleInput as $fieldName => $value) {
                    $formId = $requestCoreFileBundleInput[$fieldName]['form_id'];

                    if ($sessionId && $session && isset($session[$formId])) {
                        $sessionCurrent = $session[$formId];
                        $class          = get_class($obj);
                        $parentClass    = get_parent_class($obj);

                        if (isset($sessionCurrent[$class]) || isset($sessionCurrent[$parentClass])) {
                            $em                   = $this->doctrine->getManager();
                            $targetFilesInSession = array_merge(
                                isset($sessionCurrent[$class]) ? $sessionCurrent[$class] : array(), isset($sessionCurrent[$parentClass]) ? $sessionCurrent[$parentClass] : array()
                            );

                            $filesArray = array();
                            $filesNames = array();

                            // перебираем файлы в сессии для конкретного объекта
                            foreach ($targetFilesInSession as $insert => $paths) {
                                // перебираем файлы по пути
                                foreach ($paths as $path => $tempFiles) {
                                    $field         = substr($path, strripos($path, '/') + 1);
                                    $tempFilesSort = array();

                                    // выполняем сортирувку файлов в сесии из полученых данных (POST), чтобы сортировка осталась при сохранении
                                    if (isset($this->formDataByFieldName[get_class($obj)])) {
                                        $dataRequest = $this->formDataByFieldName[get_class($obj)][$field];

                                        foreach ($dataRequest['data'][$field] as $indexForUnset => $itemRequest) {
                                            if (in_array($itemRequest['name'], $tempFiles)) {

                                                // если файл не помечен на удаление добавляем его в массив для сохранения
                                                if (!isset($itemRequest['_delete'])) {
                                                    $tempFilesSort[] = $itemRequest['name'];
                                                }

                                                // удаляем из сессии отсортированый файл
                                                if (($key = array_search($itemRequest['name'], $tempFiles)) !== false) {
                                                    unset($tempFiles[$key]);
                                                }
                                            }
                                        }
                                    } else {
                                        $tempFilesSort = $tempFiles;
                                    }

                                    // перебираем имена файлы и создаем массив из UploadedFile
                                    foreach ($tempFilesSort as $tempFile) {
                                        if (is_file($path.'/'.$tempFile)) {
                                            list($hash, $orignalFileName) = explode('#', $tempFile);
                                            $fullFileName = $path.'/'.$tempFile;
                                            $finfo        = new \finfo(FILEINFO_MIME_TYPE);
                                            $mime         = $finfo->file($fullFileName);

                                            $filesArray[$insert][$field][$tempFile] = new UploadedFile($fullFileName, $orignalFileName, $mime, filesize($fullFileName), null, 1);
                                            $filesNames[]                           = $tempFile;
                                        }
                                    }
                                }
                            }

                            // ищем объекты для обновления имени и пути в БД
                            $objsToUpdate = $em->getRepository('CoreFileBundle:CommonFile')->findBy(array('name' => $filesNames, 'halfPath' => null), array('id' => 'DESC'));

                            //foreach ($filesArray as $class => $inserts) {
                            foreach ($filesArray as $insert => $fields) {
                                foreach ($fields as $field => $files) {
                                    // задаем нужные опции
                                    $options = array(
                                        'fieldName' => $field,
                                        'insert' => $insert,
                                        'objToAttach' => $obj,
                                    );
                                    foreach ($files as $file) {
                                        // добавляем объект для изменения, или создастся новая запись
                                        $objFile = null;
                                        if (null !== $objsToUpdate) {
                                            foreach ($objsToUpdate as $objToUpdate) {
                                                if (isset($filesArray[$insert][$field][$objToUpdate->getName()])) {
                                                    $options['objToUpdate'] = $objToUpdate;
                                                    $objFile                = $objToUpdate;
                                                }
                                            }
                                        }

                                        if ($objFile instanceof ImageFile || $insert === 'Core\FileBundle\Entity\ImageFile') {
                                            // если тип файла image, по внутренему разделению бандла
                                            // вызов метода обработки картинок
                                            $this->handlingAndPersistImages([$file], $options);
                                        } elseif ($objFile instanceof DocumentFile || $insert === 'Core\FileBundle\Entity\DocumentFile') {
                                            // если тип файла document, по внутренему разделению бандла
                                            // вызов метода обработки документов
                                            $this->handlingAndPersistDocument([$file], $options);
                                        }
                                        elseif ($objFile instanceof FlashFile || $insert === 'Core\FileBundle\Entity\FlashFile') {
                                            // если тип файла document, по внутренему разделению бандла
                                            // вызов метода обработки документов
                                            $this->handlingAndPersistFlash([$file], $options);
                                        }
                                        else {
                                            throw new NotFoundHttpException('Moving temp files is not configured for the entity:'."\n".get_class($objFile)."\n in ".get_class().'#'.__FUNCTION__);
                                        }
                                    }
                                }
                            }
                            //}
                            $this->removeTempFilesAndClearSession($formId);
                        }
                    }
                }
            }
            return true;
        }
    }

    /**
     * Удаление временных файлов и очистка сессии
     *
     * @param object $obj - объект с которым могут быть связаны временные файлы
     */
    public function removeTempFilesAndClearSession($formId)
    {
        $fs = new Filesystem();

        $session = $this->session->get('core_file');
        unset($session[$formId]);
        $fs->remove([$this->configs['temp_dir'].'/'.$this->session->getId().'/'.$formId]);
        $this->session->set('core_file', $session);

        $sessionImage = $this->session->get('core_file_image');
        unset($sessionImage[$formId]);
        $this->session->set('core_file_image', $sessionImage);


        return true;
    }

    /**
     * Получение название класса из объекта или строки
     *
     * @param string|object $objOrString
     * @return string - название класса
     */
    public function getClassName($objOrString)
    {

        if (is_object($objOrString)) {
            $obj       = $objOrString;
            $classname = get_class($obj);
        } else {
            $classname = $objOrString;
        }

        if (preg_match('@\\\\([\w]+)$@', $classname, $matches)) {
            $classname = $matches[1];
        }

        return $classname;
    }

    /**
     * Проверка файла на тип и размер
     *
     * @param array $configs - конфиги конкретного поля
     * @param array $files - массив файлов тип UploadedFiles
     * @return array
     */
    public function checkMimeTypeAndFileSize(array $files, array $configs, array $options)
    {
        $response           = array();

        // проверка на тип загруженного файла
        foreach ($files as $file) {
            if (isset($configs['mime_types'])) {
                if (!in_array($file->getClientMimeType(), $configs['mime_types'])) {
                    if (!in_array($file->getMimeType(), $configs['mime_types'])) {
                        $halfTypes = array();
                        foreach ($configs['mime_types'] as $type) {
                            if (preg_match('/\*/', $type)) {
                                $halfTypes[] = substr($type, 0, strpos($type, '/'));
                            }
                        }
                        if (!in_array(substr($file->getClientMimeType(), 0, strpos($file->getClientMimeType(), '/')), $halfTypes)) {
                            if (!in_array(substr($file->getMimeType(), 0, strpos($file->getMimeType(), '/')), $halfTypes)) {
                                $response['error'][] = $this->translator->trans('error.bad_file_type', array('%in%' => $file->getClientOriginalName(), '%mime%' => $file->getMimeType()),
                                    'CoreFileBundle');
                                $response['error'][] = $this->translator->trans('msg.accept.file_type', array('%in%' => implode('<br>', $configs['mime_types'])), 'CoreFileBundle');
                            }
                        }
                    }
                }
            }

            // проверка на размер загружаемого файла
            if ($configs['file_size'] < $file->getSize() / 1024 / 1024) {
                $response['error'][] = $this->translator->trans('error.big_file_size', array('%in%' => $file->getClientOriginalName()), 'CoreFileBundle');
                $response['error'][] = $this->translator->trans('msg.accept.file_size', array('%in%' => $configs['file_size'].' Mb'), 'CoreFileBundle');
            }
        }



        // проверка на кол-во загруженных файлов
        if (!isset($response['error'])) {
            $countAttachedFiles = 0;
            if (null !== $options['objToAttach']) {
                $obj = $options['objToAttach'];
                $attachedFiles = $obj->{'get' . ucfirst($options['data']['fieldName'])}();
                if ((int)$configs['max_count_files'] !== 1) {
                    $countAttachedFiles = count($attachedFiles);
                } else {
                    if (null !== $attachedFiles) {
                        if (is_array($attachedFiles)) {
                            $one = array_shift($attachedFiles);
                        } else {
                            $one = $attachedFiles->get(0);
                        }
                        if (null !== $one) {
                            $request = array(
                                'id' => $one->getId(),
                                'data' => $options['data'],
                            );
                            $response = $this->ajaxRemoveFile($request);
                        }
                    }
                }
            } else {
                $session = $this->session->get('core_file');
                $path = $this->configs['temp_dir'] . '/' . $this->session->getId() . '/' . $options['data']['form_id'] . '/' . $configs['dir'] . '/' . $options['data']['fieldName'];
                if (isset($session[$options['data']['form_id']][$options['data']['namespace_to_attach']][$options['data']['namespace_to_insert']][$path])) {

                    if ((int)$configs['max_count_files'] !== 1) {
                        $countAttachedFiles = count($session[$options['data']['form_id']][$options['data']['namespace_to_attach']][$options['data']['namespace_to_insert']][$path]);
                    } else {
                        unset($session[$options['data']['form_id']][$options['data']['namespace_to_attach']][$options['data']['namespace_to_insert']][$path]);
                        $this->session->set('core_file', $session);
                    }
                }
            }

            if ($countAttachedFiles + count($files) > $configs['max_count_files']) {
                $response['error'][] = $this->translator->trans('error.max_count_files', array('%in%' => $configs['max_count_files']), 'CoreFileBundle');
            }
        }


        return $response;
    }

//    public function checkMimeTypeAndFileSize(array $files, array $configs, array $options)
//    {
//        $response           = array();
//        $countAttachedFiles = 0;
//
//        // проверка на кол-во загруженных файлов
//        if (null !== $options['objToAttach']) {
//            $obj           = $options['objToAttach'];
//            $attachedFiles = $obj->{'get'.ucfirst($options['data']['fieldName'])}();
//            if ((int) $configs['max_count_files'] !== 1) {
//                $countAttachedFiles = count($attachedFiles);
//            } else {
//                if (null !== $attachedFiles) {
//                    if (is_array($attachedFiles)) {
//                        $one = array_shift($attachedFiles);
//                    } else {
//                        $one = $attachedFiles->get(0);
//                    }
//                    if (null !== $one) {
//                        $request  = array(
//                            'id' => $one->getId(),
//                            'data' => $options['data'],
//                        );
//                        $response = $this->ajaxRemoveFile($request);
//                    }
//                }
//            }
//        } else {
//            $session = $this->session->get('core_file');
//            $path    = $this->configs['temp_dir'].'/'.$this->session->getId().'/'.$options['data']['form_id'].'/'.$configs['dir'].'/'.$options['data']['fieldName'];
//            if (isset($session[$options['data']['form_id']][$options['data']['namespace_to_attach']][$options['data']['namespace_to_insert']][$path])) {
//
//                if ((int) $configs['max_count_files'] !== 1) {
//                    $countAttachedFiles = count($session[$options['data']['form_id']][$options['data']['namespace_to_attach']][$options['data']['namespace_to_insert']][$path]);
//                } else {
//                    unset($session[$options['data']['form_id']][$options['data']['namespace_to_attach']][$options['data']['namespace_to_insert']][$path]);
//                    $this->session->set('core_file', $session);
//                }
//            }
//        }
//
//        if ($countAttachedFiles + count($files) > $configs['max_count_files']) {
//            $response['error'][] = $this->translator->trans('error.max_count_files', array('%in%' => $configs['max_count_files']), 'CoreFileBundle');
//        }
//
//        // проверка на тип загруженного файла
//        foreach ($files as $file) {
//            if (isset($configs['mime_types'])) {
//                if (!in_array($file->getClientMimeType(), $configs['mime_types'])) {
//                    if (!in_array($file->getMimeType(), $configs['mime_types'])) {
//                        $halfTypes = array();
//                        foreach ($configs['mime_types'] as $type) {
//                            if (preg_match('/\*/', $type)) {
//                                $halfTypes[] = substr($type, 0, strpos($type, '/'));
//                            }
//                        }
//                        if (!in_array(substr($file->getClientMimeType(), 0, strpos($file->getClientMimeType(), '/')), $halfTypes)) {
//                            if (!in_array(substr($file->getMimeType(), 0, strpos($file->getMimeType(), '/')), $halfTypes)) {
//                                $response['error'][] = $this->translator->trans('error.bad_file_type', array('%in%' => $file->getClientOriginalName(), '%mime%' => $file->getMimeType()),
//                                    'CoreFileBundle');
//                                $response['error'][] = $this->translator->trans('msg.accept.file_type', array('%in%' => implode('<br>', $configs['mime_types'])), 'CoreFileBundle');
//                            }
//                        }
//                    }
//                }
//            }
//
//            // проверка на размер загружаемого файла
//            if ($configs['file_size'] < $file->getSize() / 1024 / 1024) {
//                $response['error'][] = $this->translator->trans('error.big_file_size', array('%in%' => $file->getClientOriginalName()), 'CoreFileBundle');
//                $response['error'][] = $this->translator->trans('msg.accept.file_size', array('%in%' => $configs['file_size'].' Mb'), 'CoreFileBundle');
//            }
//        }
//        return $response;
//    }

    /**
     * Копирование файлов у объектов
     *
     * @param type $objFrom - объект у которого копируем файлы
     * @param type $objTo - объект которому копируем файлы
     * @return boolean
     */
    public function copyAllFiles($objFrom, $objTo)
    {
        $em = $this->doctrine->getManager();

        if (null !== $objFrom && null !== $objTo) {
            $rename = array();

            $meta = $em->getClassMetadata(get_class($objFrom));
            $cols = $meta->getAssociationNames();

            // получаем конфиги (двух типов image и document) копируемого объекта
            $configs          = array_merge(
                //$this->searchConfigsByObj($objFrom, 'image'), $this->searchConfigsByObj($objFrom, 'document')
                $this->searchConfigsByObj($objFrom, 'image'), $this->searchConfigsByObj($objFrom, 'document'), $this->searchConfigsByObj($objFrom, 'flash')
            );
            $configsFieldName = array_keys($configs);

            foreach ($cols as $fieldName) {
                if (in_array($fieldName, $configsFieldName)) {

                    // собираем пути к директоиям
                    $fieldDir    = $this->getUploadRootDir().'/'.$configs[$fieldName]['dir'];
                    $originalDir = $fieldDir.'/'.$objFrom->getId();
                    $targetDir   = $fieldDir.'/'.$objTo->getId();
                    $path        = $targetDir.'/'.$fieldName;

                    // достыем коллекции из главного объекта для копирования
                    $collectionCopy = $objFrom->{'get'.ucfirst($fieldName)}();
                    if (null !== $collectionCopy) {
                        foreach ($collectionCopy as $objOld) {
                            $nameOld = $this->getNameWithId($objOld); //$objOld->getId();
                            $idOld   = $objOld->getId();
                            $objNew  = clone $objOld;
                            $objNew->setHalfPath(str_replace('/'.$objFrom->getId().'/', '/'.$objTo->getId().'/', $objOld->getHalfPath()));

                            // записываем каждый новый объект файла, чтобы можно было вытащить id для имени файла
                            $em->persist($objNew);
                            $em->flush($objNew);

                            // устанавливаем новый объект в копируемую сущность
                            if (method_exists($objTo, 'add'.ucfirst($fieldName))) {
                                $method = 'add';
                            } else {
                                $method = 'set';
                            }
                            $objTo->{$method.ucfirst($fieldName)}($objNew);

                            // Собираем названия файлов для переименовывания
                            if (isset($configs[$fieldName]['options'])) {
                                foreach ($configs[$fieldName]['options'] as $dir => $prefixes) {
                                    foreach ($prefixes as $prefix => $size) {
                                        $rename[$path.'/'.$dir.'/'.$prefix.$nameOld] = $path.'/'.$dir.'/'.$prefix.str_replace('_'.$idOld.'.', '_'.$objNew->getId().'.', $nameOld);
                                    }
                                }
                            } else {
                                $rename[$path.'/'.$nameOld] = $path.'/'.str_replace('_'.$idOld.'.', '_'.$objNew->getId().'.', $nameOld);
                            }
                        }
                    }
                }
            }
            // сохраняем копируемый объект
            //$em->persist($objTo);
            $em->flush($objTo);

            if (count($rename)) {
                $fs = new Filesystem();

                // копируем всю папку
                $fs->mirror($originalDir, $targetDir, null, ['override' => true]);
                // переименовываем файлы
                foreach ($rename as $from => $to) {
                    $fs->rename($from, $to);
                }
            }
        } else {
            return false;
        }
        return true;
    }

    /**
     * Получение данных с URL
     *
     * @param string $URL
     * @return type
     */
    private function getDataFromURL($URL)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        if (curl_errno($ch)) {
            $data = false;
        } else {
            $data = curl_exec($ch);
        }
        curl_close($ch);

        return $data;
    }

    /**
     * Добавление файлов через Google Api Search Images
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function googleApiAdd($request)
    {
        $bad          = 0;
        $acceptMTypes = [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG];
        $response     = array();
        $files        = array();
        $data         = $request->get('CoreFileBundleInput');
        $fs           = new Filesystem();
        $type         = isset($data['type']) ? $data['type'] : 'document';
        $field        = $data['fieldName'];
        $attach       = $data['namespace_to_attach'];
        $configs      = isset($this->configs[$type][$attach][$field]) ? $this->configs[$type][$attach][$field] : $this->configs['image'][$attach][$field];
        $sessionId    = $this->session->getId();
        $formId       = $data['form_id'];
        $path         = $this->configs['temp_dir'].'/'.$sessionId.'/'.$formId.'/'.$configs['dir'].'/'.$field;
        $fs->mkdir($path);

        foreach ($data['filesSrc'] as $src) {

//            $src = str_replace(' ', '%20', $src);
            $newFile = $this->getDataFromURL($src);

            if (false !== $newFile) {

                $filename     = sha1(uniqid(mt_rand(), true));
                $fullFilename = $path.'/'.$filename;
                file_put_contents($fullFilename, $newFile);
                $imginfo      = getimagesize($fullFilename);

                if (false !== $imginfo) {
                    rename($fullFilename, $fullFilename.image_type_to_extension($imginfo[2]));
                    $fullFilename .= image_type_to_extension($imginfo[2]);
                    if (in_array($imginfo[2], $acceptMTypes)) {
                        if (is_file($fullFilename)) {
                            $files[] = new UploadedFile($fullFilename, $fullFilename, $imginfo['mime'], filesize($fullFilename), null, true);
                        }
                    } else {
                        @unlink($fullFilename);
                    }
                } else {
                    $bad++;
                }
            } else {
                $bad++;
            }
        }

        if (!empty($files)) {
            $request->files->set('CoreFileBundleInput', ['filesToUpload' => $files]);
            $response = $this->uploadFile($request);
        }

        if ($bad) {
            $word                = $this->container->get('core_common_decline_of_number_twig_extension')->declOfNumFunction($bad, ['картинки', 'картинок', 'картинок']);
            $response['error'][] = 'Произошла ошибка при получении '.$bad.' '.$word;
        }

        return $response;
    }

    /**
     * Добавление картинки по URL
     *
     * @param string $URL - массив объектов типа UploadedFile
     * @param array $objToAttach - объект к которому добавляем картинку (reqiured)
     * @param array $fieldNameToAttach  - поле объекта к которому добавляем картинку (reqiured)
     * @return array
     */
    public function attachImageFromURL($URL, $objToAttach, $fieldNameToAttach, $namespaceToInsert = 'Core\FileBundle\Entity\ImageFile')
    {
        $URL    = trim($URL);
        $images = array();
        $fs     = new Filesystem();

        $image = $this->getDataFromURL($URL);

        if ($image) {
            $path         = $this->configs['temp_dir'].'/parse_upload';
            $fs->mkdir($path);
            $filename     = sha1(uniqid(mt_rand(), true));
            $fullFilename = $path.'/'.$filename;
            file_put_contents($fullFilename, $image);
            $imginfo      = getimagesize($fullFilename);

            if ($imginfo) {
                rename($fullFilename, $fullFilename.image_type_to_extension($imginfo[2]));
                $fullFilename .= image_type_to_extension($imginfo[2]);

                $images[] = new UploadedFile($fullFilename, $filename, $imginfo['mime'], filesize($fullFilename), null, true);

                $options = array(
                    'fieldName' => $fieldNameToAttach,
                    'insert' => $namespaceToInsert,
                    'objToAttach' => $objToAttach,
                );

                $response = $this->handlingAndPersistImages($images, $options);

                @unlink($fullFilename);

                if (!isset($response['error'])) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Обновляем уже существующие изображения
     * @return int
     */
    public function updateImgData()
    {
        $em     = $this->doctrine->getManager();
        $em->getConnection()->getConfiguration()->setSQLLogger(null);
        $images = $em->getRepository('CoreFileBundle:ImageFile')->findWithoutAttr();
        $total  = 0;
        foreach ($images as $img) {
            $filePath = $this->getFileAssetWebPath($img);
            if ($filePath) {
                $filePath = $this->getRootDir().'/../web'.$filePath;
                list($width, $height) = getimagesize($filePath);
                if ($width && $height) {
                    // начинаем транзакцию
                    $em->getConnection()->beginTransaction();
                    $img->setHeight($height);
                    $img->setWidth($width);
                    $total++;
                    try {
                        $em->flush();
                        $em->getConnection()->commit();
                    } catch (\Exception $e) {
                        echo 'here';
                        $em->getConnection()->rollback();
                        $em->close();
                        throw $e;
                    }
                }
            }
        }
        //$em->flush();

        return $total;
    }
}