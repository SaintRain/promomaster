<?php

/* CorePaymentBundle:PaymentSystem\BankTransfer:layout_print.html.twig */
class __TwigTemplate_200e869f5fa5caf9c6f2a1a5f118d0d8dc94b4ec05e3d647076db08b4a49c444 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
<!doctype html public \"-//W3C//DTD HTML 4.01 Transitional//EN\"
    \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
    <head>
        <title>";
        // line 13
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <meta name=\"Robots\" content=\"noindex,follow\" >
        <meta name=\"Keywords\" content=\"";
        // line 15
        $this->displayBlock('keywords', $context, $blocks);
        echo "\">
        <meta name=\"Description\" content=\"";
        // line 16
        $this->displayBlock('description', $context, $blocks);
        echo "\">
        <meta name=\"Content-Type\" content=\"text/html; charset=UTF-8\">
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
        <style>
            body {width: 800px; margin: auto}
            table {border-collapse: collapse;border:#000000 1px solid;}
            table td, table th  {background: white; border: 1px black solid !important; border-width: 1px !important;}
        </style>
    </head>
    <body>

        ";
        // line 27
        $this->displayBlock('body', $context, $blocks);
        // line 28
        echo "
    </body>
</html>";
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        echo "Оплаты через банк";
    }

    // line 15
    public function block_keywords($context, array $blocks = array())
    {
        echo "Оплата через банк";
    }

    // line 16
    public function block_description($context, array $blocks = array())
    {
        echo "Оплата через банк";
    }

    // line 27
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:PaymentSystem\\BankTransfer:layout_print.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  82 => 27,  76 => 16,  70 => 15,  64 => 13,  58 => 28,  56 => 27,  42 => 16,  38 => 15,  33 => 13,  26 => 8,  23 => 1,);
    }
}
