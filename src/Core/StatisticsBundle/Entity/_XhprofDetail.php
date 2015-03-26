<?php

namespace Core\StatisticsBundle\Entity;

use Jns\Bundle\XhprofBundle\Entity\XhprofDetail as BaseXhprofDetail;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="core_statistics_xhprof_details")
 */
class XhprofDetail extends BaseXhprofDetail
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="string", unique=true, length=17, nullable=false)
     * @ORM\Id
     */
    protected $id;
}