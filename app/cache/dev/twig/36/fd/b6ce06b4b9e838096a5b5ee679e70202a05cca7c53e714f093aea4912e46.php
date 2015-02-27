<?php

/* CorePaymentBundle:Admin/List:list_percent.html.twig */
class __TwigTemplate_36fdb6ce06b4b9e838096a5b5ee679e70202a05cca7c53e714f093aea4912e46 extends Twig_Template
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
    ";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))), "html", null, true);
        echo " % ";
        // line 14
        echo "
";
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:Admin/List:list_percent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 14,  42 => 13,  39 => 12,  36 => 11,  11 => 9,);
    }
}
