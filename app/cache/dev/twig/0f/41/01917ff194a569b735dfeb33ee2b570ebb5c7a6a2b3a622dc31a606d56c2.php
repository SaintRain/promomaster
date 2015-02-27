<?php

/* ApplicationSonataUserBundle:Admin/List:list_type.html.twig */
class __TwigTemplate_0f4101917ff194a569b735dfeb33ee2b570ebb5c7a6a2b3a622dc31a606d56c2 extends Twig_Template
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
        return array (  46 => 7,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
