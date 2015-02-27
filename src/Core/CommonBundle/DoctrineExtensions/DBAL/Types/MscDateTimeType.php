<?php

namespace Core\CommonBundle\DoctrineExtensions\DBAL\Types;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;

/**
 * @see https://github.com/l3pp4rd/DoctrineExtensions/blob/master/doc/timestampable.md
 */
class MscDateTimeType extends DateTimeType
{
    static private $msc = null;

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        if (is_null(self::$msc)) {
            self::$msc = new \DateTimeZone('Europe/Moscow');
        }

        $value->setTimeZone(self::$msc);

        return $value->format($platform->getDateTimeFormatString());
    }
    /*
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        if (is_null(self::$msc)) {
            self::$msc = new \DateTimeZone('Europe/Moscow');
        }

        $val = \DateTime::createFromFormat($platform->getDateTimeFormatString(), $value, self::$msc);

        if (!$val) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }
        return $val;
    }*/
}