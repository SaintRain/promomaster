<?php

/* SonataAdminBundle:CRUD:list_boolean.html.twig */
class __TwigTemplate_052b121b75fa59b55a5d16118c6c67f297ae268eabc6c92b7875e309e300d1cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field_span_attributes' => array($this, 'block_field_span_attributes'),
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 14
        $context["isEditable"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "editable", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "editable", array())) && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "isGranted", array(0 => "EDIT", 1 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"));
        // line 15
        $context["xEditableType"] = $this->env->getExtension('sonata_admin')->getXEditableType($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "type", array()));
        // line 17
        if (((isset($context["isEditable"]) ? $context["isEditable"] : $this->getContext($context, "isEditable")) && (isset($context["xEditableType"]) ? $context["xEditableType"] : $this->getContext($context, "xEditableType")))) {
        }
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 18
    public function block_field_span_attributes($context, array $blocks = array())
    {
        // line 19
        echo "        ";
        ob_start();
        // line 20
        echo "            ";
        $this->displayParentBlock("field_span_attributes", $context, $blocks);
        echo "
            data-source=\"[{value: 0, text: '";
        // line 21
        echo $this->env->getExtension('translator')->getTranslator()->trans("label_type_no", array(), "SonataAdminBundle");
        echo "'},{value: 1, text: '";
        echo $this->env->getExtension('translator')->getTranslator()->trans("label_type_yes", array(), "SonataAdminBundle");
        echo "'}]\"
        ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 23
        echo "    ";
    }

    // line 26
    public function block_field($context, array $blocks = array())
    {
        // line 27
        echo "    ";
        ob_start();
        // line 28
        echo "        ";
        if ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))) {
            // line 29
            echo "            <span class=\"label label-success\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("label_type_yes", array(), "SonataAdminBundle");
            echo "</span>
        ";
        } else {
            // line 31
            echo "            <span class=\"label label-important\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("label_type_no", array(), "SonataAdminBundle");
            echo "</span>
        ";
        }
        // line 33
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list_boolean.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 33,  71 => 31,  65 => 29,  62 => 28,  59 => 27,  56 => 26,  52 => 23,  45 => 21,  40 => 20,  37 => 19,  34 => 18,  28 => 17,  26 => 15,  24 => 14,);
    }
}
