<?php

/* CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_status.html.twig */
class __TwigTemplate_d689dcb09abd5c057cfef04fe12e2d4b287852ee90a369563aa589f3672417ed extends Twig_Template
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
        if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array())) {
            // line 5
            echo "        ";
            $context["labelStyle"] = "label-default";
            // line 6
            echo "        ";
        } elseif (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()) && ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "name", array()) == "executed"))) {
            // line 7
            echo "            ";
            $context["labelStyle"] = "label-success";
            // line 8
            echo "        ";
        } else {
            // line 9
            echo "            ";
            $context["labelStyle"] = "label-important";
            // line 10
            echo "    ";
        }
        // line 11
        echo "        ";
        // line 14
        echo "            <span class=\"label ";
        echo twig_escape_filter($this->env, (isset($context["labelStyle"]) ? $context["labelStyle"] : null), "html", null, true);
        echo "\">";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "captionRu", array()), "html", null, true);
        } else {
            echo "Новый";
        }
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 14,  60 => 11,  57 => 10,  54 => 9,  51 => 8,  48 => 7,  45 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
