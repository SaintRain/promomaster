<?php

/* SonataAdminBundle:CRUD:show_boolean.html.twig */
class __TwigTemplate_6c34199468cfc77339bcfe49b3985b966c68cd6d87a14c329c4f027b53dab8e6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_show_field.html.twig");

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_show_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        // line 15
        ob_start();
        // line 16
        echo "    ";
        if ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))) {
            // line 17
            echo "        <i class=\"icon-ok-circle\"></i>";
            // line 18
            echo $this->env->getExtension('translator')->getTranslator()->trans("label_type_yes", array(), "SonataAdminBundle");
        } else {
            // line 20
            echo "        <i class=\"icon-ban-circle\"></i>";
            // line 21
            echo $this->env->getExtension('translator')->getTranslator()->trans("label_type_no", array(), "SonataAdminBundle");
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:show_boolean.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 21,  41 => 20,  38 => 18,  36 => 17,  33 => 16,  31 => 15,  28 => 14,);
    }
}
