<?php

/* CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_status.html.twig */
class __TwigTemplate_4e80ebef37ceb086ab84294242fdd6f35b0bcef151524329bbb144d7d726233d extends Twig_Template
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
        if ((!$this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()))) {
            // line 5
            echo "        ";
            $context["labelStyle"] = "label-default";
            // line 6
            echo "        ";
        } elseif (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()) && ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "name", array()) == "executed"))) {
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
        echo twig_escape_filter($this->env, (isset($context["labelStyle"]) ? $context["labelStyle"] : $this->getContext($context, "labelStyle")), "html", null, true);
        echo "\">";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "captionRu", array()), "html", null, true);
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
        return array (  54 => 14,  52 => 11,  49 => 10,  46 => 9,  43 => 8,  40 => 7,  37 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
