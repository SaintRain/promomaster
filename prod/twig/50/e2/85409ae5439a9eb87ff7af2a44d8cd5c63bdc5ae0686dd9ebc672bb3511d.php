<?php

/* CoreOrderBundle:Admin/Documents:addressLabel.html.twig */
class __TwigTemplate_50e285409ae5439a9eb87ff7af2a44d8cd5c63bdc5ae0686dd9ebc672bb3511d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <style type=\"text/css\" media=\"screen,print\">
        table {font-family:San-Serif,Verdana,Arial;font-size:11px;border:1px solid #000;border-bottom:0;border-right:0;border-collapse: collapse;background-color: #fff;margin:0px 0px 0px 0px;}
        table td, table th {border: 1px solid #000; border-left: 0; border-top: 0; padding: 3px;}        
        table thead th, table tfoot th,
        table thead td, table tfoot td {background-color:#eee;}
        table tbody td {background-color:#fff;}
        table tbody td.head {white-space:nowrap;background-color:#eee;}
        table tbody td.number {white-space:nowrap;background-color:#eee;font-weight: bold;text-align: center}
    </style>

  12312321

                    ";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Documents:addressLabel.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  20 => 2,);
    }
}
