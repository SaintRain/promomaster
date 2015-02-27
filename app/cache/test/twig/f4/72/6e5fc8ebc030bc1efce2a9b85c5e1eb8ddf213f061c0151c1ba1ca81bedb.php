<?php

/* CoreLogisticsBundle:Admin/Supply/list_fields:stock.html.twig */
class __TwigTemplate_f4726e5fc8ebc030bc1efce2a9b85c5e1eb8ddf213f061c0151c1ba1ca81bedb extends Twig_Template
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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "stock", array(), "any", true, true)) {
            // line 4
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "stock", array()), "captionRu", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "stock", array(), "any", false, true), "city", array(), "any", true, true)) {
                echo "<small class=\"muted\">(г.";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "stock", array()), "city", array()), "name", array()), "html", null, true);
                echo ")</small>";
            }
            // line 5
            echo "    ";
        }
        // line 6
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supply/list_fields:stock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 6,  43 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
