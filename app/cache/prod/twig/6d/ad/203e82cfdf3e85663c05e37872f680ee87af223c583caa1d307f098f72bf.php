<?php

/* CoreStatisticsBundle:Admin/Form/list_fields:contragent.html.twig */
class __TwigTemplate_6dad203e82cfdf3e85663c05e37872f680ee87af223c583caa1d307f098f72bf extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragent", array())) {
            // line 5
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_commoncontragent_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragent", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragent", array()), "listName", array()), "html", null, true);
            echo "</a>
    ";
        } else {
            // line 7
            echo "        <span class=\"label label-important\">нет</span>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/Form/list_fields:contragent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
