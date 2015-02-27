<?php

/* CorePaymentBundle:Admin/List:list_payment_amount.html.twig */
class __TwigTemplate_5fa5a2b14f8b331fe7385dd84fb7d67e3bd7a767eaba420b58f6647853ce0d3d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

            throw $e;
        }

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    <span style=\"color:";
        // line 13
        echo (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "type", array())) ? ("green") : ("red"));
        echo "\">";
        echo (((($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "type", array()) == false) && ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")) != 0))) ? ("-") : (""));
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>

";
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:Admin/List:list_payment_amount.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 13,  39 => 12,  36 => 11,  11 => 9,);
    }
}
