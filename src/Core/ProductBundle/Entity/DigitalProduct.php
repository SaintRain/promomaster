<?php

/**
 * Цифровой/электронный товар
 * 
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\ProductBundle\Entity\CommonProduct;

/**
 * @ORM\Entity(repositoryClass="Core\ProductBundle\Entity\Repository\DigitalProductRepository")
 */
class DigitalProduct extends CommonProduct {

}
