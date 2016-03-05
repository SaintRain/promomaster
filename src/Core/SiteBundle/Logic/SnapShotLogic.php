<?php

namespace Core\SiteBundle\Logic;

use Core\SiteBundle\Entity\WebSite;
use Knp\Bundle\SnappyBundle\Snappy\LoggableGenerator;

class SnapShotLogic
{
    /**
     * height or width max value
     */
    const MAX_SIZE = 1000;
    /**
     * @var
     */
    private $imageSnapper;
    /**
     * @var
     */
    private $pdfSnapper;

    /**
     * SnapShotLogic constructor.
     * @param LoggableGenerator $imageSnapper
     * @param LoggableGenerator $pdfSnapper
     */
    public function __construct(LoggableGenerator $imageSnapper, LoggableGenerator $pdfSnapper)
    {
        $this->imageSnapper = $imageSnapper;
        $this->pdfSnapper = $pdfSnapper;
    }

    /**
     * @param WebSite $site
     * @return bool
     */
    public function makeSnapShot(WebSite $site)
    {
        $result = false;

        if (!file_exists($site->getUploadRootDir())) {
            mkdir($site->getUploadRootDir());
        }

        $file = sprintf('site-%d', $site->getId());
        $imagePath = sprintf('%s/%s.jpg', $site->getUploadRootDir(),$file);
        $pfdPath = sprintf('%s/%s.pdf', $site->getUploadRootDir(), $file);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        try {
            $this->imageSnapper->generate($site->getDomain(), $imagePath);
            $site->setSnapShot(sprintf('%s.jpg', $file));
            $result = true;
            $this->resize($imagePath);
        } catch(\Exception $exception) {
            $result = false;
        }

        try {
            if (!$result) {
                $res = $this->pdfSnapper->generate($site->getDomain(), $pfdPath);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $imagick = new \Imagick();
                $imagick->setResolution(300,300);
                $imagick->readimage("{$pfdPath}[0]");
                $imagick->setImageFormat('jpg');
                $imagick->writeImage($imagePath);
                $imagick->clear();
                $imagick->destroy();

                $site->setSnapShot(sprintf('%s.jpg', $file));
                $this->resize($imagePath);
                unlink($pfdPath);
                $result = true;
            }
        } catch (\Exception $exception) {
            $result = false;
        }

        if (!$result) {
            if (file_exists($pfdPath)) {
                unlink($pfdPath);
            }

            if (file_exists($imagePath)) {
                $site->setSnapShot(sprintf('%s.jpg', $file));
                $this->resize($imagePath);
                $result = true;
            }
        }

        return $result;
    }

    /**
     * @param $path
     * @return bool
     */
    private function resize($path)
    {
        $thumb = new \Imagick();
        $thumb->readImage($path);
        $size = $thumb->identifyImage();

        if (!($size['geometry']['width'] > static::MAX_SIZE || $size['geometry']['height'] > static::MAX_SIZE)) {
            return false;
        }

        if ($size['geometry']['width'] > static::MAX_SIZE && $size['geometry']['height'] > static::MAX_SIZE) {
            $thumb->scaleImage(static::MAX_SIZE, 0);
            $thumb->cropImage(static::MAX_SIZE, static::MAX_SIZE, 0, 0);
        } elseif ($size['geometry']['height']) {
            $thumb->cropImage($size['geometry']['width'], static::MAX_SIZE, 0, 0);
        } elseif ($size['geometry']['width'] > static::MAX_SIZE) {
            $thumb->scaleImage(static::MAX_SIZE, 0);
        }

        $thumb->writeImage($path);
    }
}