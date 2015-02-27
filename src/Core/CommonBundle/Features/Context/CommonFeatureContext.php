<?php
/**
 * Здесь находятся общие методы, которые могут быть использованы в разных сценариях
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Behat\Symfony2Extension\Context\KernelDictionary;
use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Mink\Driver\GoutteDriver,
    Behat\Mink\Driver\Goutte\Client as GoutteClient;


/**
 * Behat context class.
 */
class CommonFeatureContext extends MinkContext implements Context
{
    use KernelDictionary;

    /**
     * Авторизация в админку
     * @Given I am logged in as administrator
     */
    public function iAmLoggedInAsAdministrator()
    {

        $this->visit('login.html');
        $this->fillField('username', 'saintrain@mail.ru');
        $this->fillField('password', 'tel76924');
        $this->pressButton('_submit');
        $this->visit('/');
    }

    /**
     * Клик по вкладке с текстом
     * @Then I click on tab with text :arg1
     */
    public function iClickOnTabWithText($arg1)
    {
        $this->getSession()->getDriver()->executeScript('$("a[data-toggle=\'tab\']:contains(\'' . $arg1 . '\')").click()');
    }

    /**
     * Дожидаемся пока запрос окончится
     * @Given /^I wait for ajax request will end$/
     */
    public function iWaitForAjaxRequestWillEnd()
    {
        $this->getSession()->wait(100000, '(0 === jQuery.active)');
    }

   /**
    * @Given /^I check the "([^"]*)" radio button with "([^"]*)" value$/
    */
    public function iCheckTheRadioButtonWithValue($element, $value)
    {
        foreach ($this->getSession()->getPage()->findAll('css', 'input[type="radio"][name="'. $element .'"]') as $radio) {
            if ($radio->getAttribute('value') == $value) {
                    $radio->check();
                    return true;
            }
        }
        return false;
    }

    /**
     * Устанаваливаем значение radio кнопки (Гутти)
     * @Given /^I check the "([^"]*)" radio button$/
     */
    public function iCheckTheRadioButton($labelText)
    {
        foreach ($this->getSession()->getPage()->findAll('css', 'label') as $label) {
            if ($labelText === $label->getText() && $label->has('css', 'input[type="radio"]')) {
                $this->fillField($label->find('css', 'input[type="radio"]')->getAttribute('name'), $label->find('css', 'input[type="radio"]')->getAttribute('value'));
                return;
            }
        }
        throw new \Exception('Radio button not found');
    }

    /**
     * Кликаем по выбранному значению в ajax entity
     * @When I choose it in ajax entity
     */
    public function iChooseItInAjaxEntity()
    {
        $this->getSession()->wait(1000);
        $cssSelector = $this
            ->getSession()
            ->getPage()
            ->findAll('css', 'ul.select2-results li.select2-result-selectable');
        $xpath = null;
        foreach($cssSelector as $res) {
            $xpath = $res->getXpath();
            break;
        }
        // старая версия может пригодится
        //$cssSelector = new \Behat\Mink\Selector\CssSelector();
        //$cssSelector->
        //$xpath = $cssSelector->translateToXPath('.select2-results li.select2-result-selectable.select2-highlighted');
        //ldd($xpath);
        if (!$xpath) {
            throw new \Exception('Current Ajax Entity Not Found');
        }
        $this->getSession()->getDriver()->click($xpath);
        $this->getSession()->wait(100);
        return true;
    }

    /**
     * Выбираем значение для radio кнопки в админке (Селениум)
     * @When I select radio button the :arg1 with :arg2
     */
    public function iSelectRadioButtonTheWith($arg1, $arg2)
    {
        $needLabel = null;
        $xpath = null;
        foreach ($this->getSession()->getPage()->findAll('css', 'label') as $label) {
            if ($arg1 === $label->getText()) {
                $needLabel = $label;
                break;
            }
        }
        if (!$needLabel) {
            throw new \Exception(sprintf('Radio button with label %s not found', $arg1));
        }
        $parentNode = $needLabel->getParent();
        foreach ($parentNode->findAll('css', 'label') as $label) {
            if ($label->getText() == $arg2) {
                $xpath = $label->getXpath();
                break;
            }
        }
        if (!$xpath) {
            throw new \Exception(sprintf('Radio button with label %s not found', $arg2));
        }
        $this->getSession()->getDriver()->click($xpath);
    }

    /**
     * Выбираем значение для radio кнопки в админке (Гутти)
     * @When I check radio button the :arg1 with :arg2
     */
    public function iCheckRadioButtonTheWith($arg1, $arg2)
    {
        $needLabel = null;
        $xpath = null;
        foreach ($this->getSession()->getPage()->findAll('css', 'label') as $label) {
            if ($arg1 === $label->getText()) {
                $needLabel = $label;
                break;
            }
        }
        if (!$needLabel) {
            throw new \Exception(sprintf('Radio button with label %s not found', $arg1));
        }
        $parentNode = $needLabel->getParent();
        foreach ($parentNode->findAll('css', 'label') as $label) {
            if ($label->getText() == $arg2) {
                $xpath = $label;
                break;
            }
        }

        if (!$xpath) {
            throw new \Exception(sprintf('Radio button with label %s not found', $arg2));
        }
        $this->fillField($xpath->find('css', 'input[type="radio"]')->getAttribute('name'), $xpath->find('css', 'input[type="radio"]')->getAttribute('value'));
    }

    /**
     * Выборка из селект2 по клику, т.е. нет возможности вводить текст (Селениум)
     * @When I select :arg1 from select2 :arg2
     */
    public function iSelectFromSelect($arg1, $arg2)
    {
        $needLabel = null;
        $needOption = null;
        foreach ($this->getSession()->getPage()->findAll('css', 'label') as $label) {
            if ($arg2 === $label->getText()) {
                $needLabel = $label;
                break;
            }
        }
        if (!$needLabel) {
            throw new \Exception(sprintf('Radio button with label %s not found', $arg2));
        }
        $link = $needLabel->getParent()->find('css', '.select2-choice');
        if (!$link) {
            throw new \Exception(sprintf('Select2 for %s not found', $arg2));
        }
        $link = $link->getXpath();
        $this->getSession()->getDriver()->click($link);
        $this->getSession()->wait(100);
        foreach ($this->getSession()->getPage()->findAll('css', '.select2-drop-active .select2-result-label') as $option) {
            if ($arg1 == $option->getText()) {
                $needOption = $option->getXpath();
                break;
            }
        }
        if (!$needOption) {
            throw new \Exception(sprintf('Option %s in select with label %s not found', $arg2, $arg1));
        }
        $this->getSession()->getDriver()->click($needOption);
        $this->getSession()->wait(100);
        return true;
    }

    /**
     * Простановка текста для Ckeditor
     * @Given I fill ckeditor in :arg1 with :arg2
     */
    public function iFillCkeditorInWith($arg1, $arg2)
    {
        $needLabel = null;
        $xpath = null;
        foreach ($this->getSession()->getPage()->findAll('css', 'label') as $label) {
            if ($arg1 === $label->getText()) {
                $needLabel = $label;
                break;
            }
        }
        if (!$needLabel) {
            throw new \Exception(sprintf('The field with label %s not found', $arg1));
        }
        $parentNode = $needLabel->getParent();
        $result = $parentNode->find('css','textarea');
        if (!$result) {
            throw new \Exception('CKEDITOR field not found');
        }

        $this->getSession()->getDriver()->executeScript(
            sprintf('CKEDITOR.instances[\'%s\'].setData(\'%s\')',$result->getAttribute('id'), $arg2));
    }

    /**
     * Выборка из селекта (деревовидный список)
     * @Given I select :value from categoryTreeSelect :label
     */
    public function iSelectFromCategoryTreeSelect($value, $label)
    {
        $needLabel = null;
        $curValue= null;
        foreach ($this->getSession()->getPage()->findAll('css', 'label') as $val) {
            if ($label === $val->getText()) {
                $needLabel = $val;
                break;
            }
        }
        if (!$needLabel) {
            throw new \Exception(sprintf('The field with label %s not found', $arg1));
        }
        $parentNode = $needLabel->getParent();
        $hiddenInput = $parentNode->find('css','input[type="hidden"]');
        if (!$hiddenInput) {
            throw new \Exception('Category Tree select not found');
        }
        $elts = $parentNode->findAll('css','li');
        if (!count($elts)) {
            throw new \Exception('Category Tree select not found');
        }
        foreach($elts as $elt) {
            if ($value === $elt->getHtml() || preg_match('/^'.$value.'/', $elt->getHtml())) {
                $curValue = $elt->getAttribute('rel');
                break;
            }
        }
        if (!$curValue) {
            throw new \Exception(sprintf(' Element with value %s. Not Found', $value));
        }
        $this->getSession()->getDriver()->executeScript(
            sprintf('return jQuery(\'#%s\').val(%s)',$hiddenInput->getAttribute('id'), $curValue)
            );
        $this->getSession()->getDriver()->executeScript(
            sprintf('return jQuery(\'#%s\').siblings(\'input\').val(%s)',$hiddenInput->getAttribute('id'), $curValue)
            );
        $this->getSession()->getDriver()->executeScript(
            sprintf('return jQuery(\'#%s\').siblings(\'.short-text\').text(\'%s\')',$hiddenInput->getAttribute('id'), $value)
            );
        $this->getSession()->wait(100);
    }

}
