<?php

/* CoreLogisticsBundle:Admin/Seller/list_fields:requisites.html.twig */
class __TwigTemplate_30b7a90919149a766f9fbc0e48d1778b6dff91234d9eed40444dd8275b03817b extends Twig_Template
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
        echo "<b>ИНН:</b> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "inn", array()), "html", null, true);
        echo "<br>
<b>КПП:</b> ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "kpp", array()), "html", null, true);
        echo "<br>
<b>ОГРН:</b> ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "ogrn", array()), "html", null, true);
        echo "<br>
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Seller/list_fields:requisites.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 5,  44 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
