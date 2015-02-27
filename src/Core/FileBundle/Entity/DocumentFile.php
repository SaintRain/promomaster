<?php

/**
 * Файлы документов для товара
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\FileBundle\Entity\CommonFile;
use Symfony\Component\Validator\Constraints as Assert;
use Core\CommonBundle\TranslatableProperties\Caption;

/**
 * @ORM\Table(name="core_file_document")
 * @ORM\Entity(repositoryClass="Core\FileBundle\Entity\Repository\DocumentFileRepository")
 */
class DocumentFile extends CommonFile
{

    use Caption;



}
