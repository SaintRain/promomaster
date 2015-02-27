<?php

/* ApplicationSonataUserBundle:Admin/List:list_type.html.twig */
class __TwigTemplate_e72a954a396b720eceb82d9365908d0a67ceecd8586c5451e19745cd75cac0c5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");

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

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "legalForm", array(), "any", true, true)) {
            // line 5
            echo "        <div class=\"label label-info\">Юридическое лицо</div>
        ";
        } else {
            // line 7
            echo "        <div class=\"label label-success\">Физическое лицо</div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/List:list_type.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
