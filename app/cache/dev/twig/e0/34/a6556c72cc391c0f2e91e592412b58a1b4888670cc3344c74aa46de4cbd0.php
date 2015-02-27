<?php

/* CoreLogisticsBundle:Admin/Supply/list_fields:stock.html.twig */
class __TwigTemplate_e034a6556c72cc391c0f2e91e592412b58a1b4888670cc3344c74aa46de4cbd0 extends Twig_Template
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
        return array (  54 => 6,  51 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
