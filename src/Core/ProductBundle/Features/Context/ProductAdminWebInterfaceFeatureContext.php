<?php

namespace Core\ProductBundle\Features\Context;

use Core\CommonBundle\Features\Context\CommonFeatureContext;

/**
 * Behat context class.
 */
class ProductAdminWebInterfaceFeatureContext extends CommonFeatureContext
{
    private $new_article;

    /**
     * @When I press on icon with class :arg1
     */
    public function iPressOnIconWithClass($arg1)
    {
        $this->getSession()->getPage()->find('css', $arg1)->click();
        $this->getSession()->wait(0, '(0 === jQuery.active)');
    }

    /**
     * @Then I should see div container with id :arg1
     */
    public function iShouldSeeDivContainerWithId($arg1)
    {
        $this->getSession()->getPage()->
        findById($arg1);
    }

    /**
     * @When I press on button with class like :arg1
     */
    public function iPressOnButtonWithClassLike($arg1)
    {
        $this->getSession()->getPage()->find('xpath',
            "//input[contains(@class, '$arg1')]")->click();
    }

    /**
     * @When I type text  :arg1 in alert box and press ok
     */
    public function iTypeTextInAlertBoxAndPressOk($arg1)
    {
        $this->new_article = $arg1 . uniqid();
        $data = array(
            'text' => $this->new_article
        );
        $this->getSession()->getDriver()->getWebDriverSession()->postAlert_text($data);
        $this->getSession()->getDriver()->getWebDriverSession()->accept_alert();
    }
    /**
     * @Then I should see created product and link with text :arg1
     */
    public function iShouldSeeCreatedProductAndLinkWithText($arg1)
    {
        $this->getSession()->getPage()->find('xpath',
            "//a[contains(text(), '{$this->new_article}')]");
    }
}