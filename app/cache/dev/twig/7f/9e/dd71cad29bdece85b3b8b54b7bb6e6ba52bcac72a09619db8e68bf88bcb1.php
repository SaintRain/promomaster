<?php

/* CoreLogisticsBundle:Admin/Supply/list_fields:supplier.html.twig */
class __TwigTemplate_7f9edd71cad29bdece85b3b8b54b7bb6e6ba52bcac72a09619db8e68bf88bcb1 extends Twig_Template
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
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supplier", array()) && $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supplier", array()), "caption", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supplier", array()), "caption", array()), "html", null, true);
        }
        // line 5
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "seller", array()) && $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "seller", array()), "caption", array()))) {
            echo " ";
            if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supplier", array()) && $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supplier", array()), "caption", array()))) {
                echo "<br>";
            }
            // line 6
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "seller", array()), "caption", array()), "html", null, true);
            echo "<br>";
        }
        // line 7
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "seller", array()) && $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "seller", array()), "isWorkingWithNds", array()))) {
            echo " <small class=\"muted\">(НДС)</small> ";
        }
        // line 8
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supply/list_fields:supplier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 8,  58 => 7,  53 => 6,  46 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
