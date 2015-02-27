<?php

/**
 * Физический товар
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\ProductBundle\Entity\CommonProduct;
use Symfony\Component\Validator\ExecutionContextInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Core\ProductBundle\Entity\Traits\PhysicalPropertiesValidator;

/**
 * @ORM\Entity(repositoryClass="Core\ProductBundle\Entity\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValidProduct"})
 */
class Product extends CommonProduct {

    use PhysicalPropertiesValidator; //валидатор для физических характеристик

    ///////////////////////////////////////////Дополнительные свойства////////////////////////////////////////////////////////////////////////////

    public function getReviews() {
        return $this->reviews;
    }

    public function setReviews($reviews) {
        $this->reviews = $reviews;
        return $this;
    }

    public function getReviewsRating() {
        return $this->reviewsRating;
    }

    public function setReviewsRating($reviewsRating) {
        $this->reviewsRating = $reviewsRating;
        return $this;
    }



}
