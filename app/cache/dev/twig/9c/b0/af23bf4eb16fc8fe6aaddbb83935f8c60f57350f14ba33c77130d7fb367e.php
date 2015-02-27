<?php

/* CoreCommonBundle::test.html.twig */
class __TwigTemplate_9cb0af23bf4eb16fc8fe6aaddbb83935f8c60f57350f14ba33c77130d7fb367e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
    \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
  <head>


<form method=\"post\" action= \"https://www.paypal.com/cgi-bin/webscr\">
    <input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
    <input type=\"hidden\" name=\"business\" value=\"info@olikids.ru\">
    <input type=\"hidden\" name=\"return\" value=\"info@olikids.ru\">
    <input type=\"hidden\" name=\"cancel_return\" value=\"info@olikids.ru\">
    <input type=\"hidden\" name=\"notify_url\" value=\"info@olikids.ru\">
    <input type=\"hidden\" name=\"item_name\" value=\"Item name\">
    <input type=\"hidden\" name=\"item_number\" value=\"1234\">
    <input type=\"hidden\" name=\"amount\" value=\"1\">
    <input type=\"hidden\" name=\"no_shipping\" value=\"1\">
    <input type=\"hidden\" name=\"currency_code\" value=\"RUB\">
    <input type=\"submit\" value=\"Buy Now\">
</form>


  ";
        // line 51
        echo "</html>";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle::test.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  42 => 51,  19 => 1,);
    }
}
