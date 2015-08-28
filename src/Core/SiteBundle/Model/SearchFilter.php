<?php


namespace Core\SiteBundle\Model;

class SearchFilter
{
    private $keywords;
    private $categories=[];
    private $selectMainCat;


    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param ArrayCollection $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return mixed
     */
    public function getSelectMainCat()
    {
        return $this->selectMainCat;
    }

    /**
     * @param mixed $selectMainCat
     */
    public function setSelectMainCat($selectMainCat)
    {
        $this->selectMainCat = $selectMainCat;
    }



}

