<?php

/* CoreStatisticsBundle:Admin/Form/list_fields:contragent.html.twig */
class __TwigTemplate_dde191262daeb61c33ee702dac5e45ac78e7ecf8494b58ce9d0d34da973f5046 extends Twig_Template
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

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragent", array())) {
            // line 5
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_commoncontragent_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragent", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragent", array()), "listName", array()), "html", null, true);
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
        return array (  50 => 7,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
