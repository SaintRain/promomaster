<?php

/* CoreReviewBundle:Admin/List:list_parent.html.twig */
class __TwigTemplate_4c6144e8fdf30258494a0a73c163aef920a6cc38b976a9ba1487c3a907e6f326 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        if ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))) {
            // line 13
            echo "        ";
            if ((($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "hasAssociationAdmin", array()) && $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "associationadmin", array()), "hasRoute", array(0 => "edit"), "method")) && $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "associationadmin", array()), "isGranted", array(0 => "EDIT", 1 => (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))), "method"))) {
                // line 14
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "associationadmin", array()), "generateObjectUrl", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "route", array()), "name", array()), 1 => (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), 2 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "route", array()), "parameters", array())), "method"), "html", null, true);
                echo "\">ID: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "id", array()), "html", null, true);
                echo "</a>
        ";
            } else {
                // line 16
                echo "            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_admin')->renderRelationElement((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), (isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description"))), "html", null, true);
                echo "
        ";
            }
            // line 18
            echo "    ";
        } else {
            // line 19
            echo "        -
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Admin/List:list_parent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 19,  49 => 18,  43 => 16,  35 => 14,  32 => 13,  29 => 12,  26 => 11,);
    }
}
