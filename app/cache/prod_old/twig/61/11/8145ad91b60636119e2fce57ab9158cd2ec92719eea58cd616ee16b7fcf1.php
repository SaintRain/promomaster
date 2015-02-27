<?php

/* CoreOrderBundle:Admin/Documents:invoiceForPaymentSend.html.twig */
class __TwigTemplate_61118145ad91b60636119e2fce57ab9158cd2ec92719eea58cd616ee16b7fcf1 extends Twig_Template
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
        echo "    ";
        ob_start();
        // line 4
        echo "        ";
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
            // line 5
            echo "            ";
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentFio", array())) {
                echo "Здравствуйте, уважаемый(ая) ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentFio", array()), "html", null, true);
                echo "!";
            } else {
                echo "Здравствуйте!";
            }
            // line 6
            echo "        ";
        } else {
            // line 7
            echo "            Здравствуйте, уважаемый(ая) ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentFio", array()), "html", null, true);
            echo "!
        ";
        }
        // line 9
        echo "        <br/>
        Во вложении данного письма находится счет, который ожидает Вашей оплаты.
        <br/><br/>
        С ув. администрация проекта olikids.ru
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Documents:invoiceForPaymentSend.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  50 => 9,  44 => 7,  41 => 6,  32 => 5,  29 => 4,  26 => 3,  20 => 2,);
    }
}
