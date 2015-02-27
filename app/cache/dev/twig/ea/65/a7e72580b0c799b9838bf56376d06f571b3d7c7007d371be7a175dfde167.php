<?php

/* CoreLogisticsBundle:Admin/Supply/list_fields:productsUnitsCost.html.twig */
class __TwigTemplate_ea65a7e72580b0c799b9838bf56376d06f571b3d7c7007d371be7a175dfde167 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "<span class=\"money\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "productsUnitsCost", array())), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>

";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supply/list_fields:productsUnitsCost.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 3,  36 => 2,  11 => 1,);
    }
}
