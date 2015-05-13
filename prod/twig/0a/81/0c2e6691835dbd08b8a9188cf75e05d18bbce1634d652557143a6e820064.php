<?php

/* CoreDiscountsBundle:Admin/ContragentManufacturerDiscount/list_td:contragent.html.twig */
class __TwigTemplate_0a810c2e6691835dbd08b8a9188cf75e05d18bbce1634d652557143a6e820064 extends Twig_Template
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
        echo "
    ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragent", array()), "user", array()), "email", array()), "html", null, true);
        echo "<br/>
    ";
        // line 5
        if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
            // line 6
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragent", array()), "organization", array()), "html", null, true);
            echo "
    ";
        } else {
            // line 8
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragent", array()), "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragent", array()), "lastName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragent", array()), "surName", array()), "html", null, true);
            echo "
    ";
        }
        // line 10
        echo "

";
    }

    public function getTemplateName()
    {
        return "CoreDiscountsBundle:Admin/ContragentManufacturerDiscount/list_td:contragent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 10,  54 => 8,  48 => 6,  46 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
