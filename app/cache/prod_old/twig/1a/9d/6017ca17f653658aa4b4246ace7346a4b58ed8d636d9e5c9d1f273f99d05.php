<?php

/* CoreUnionBundle:Admin/Form/td_types:quantity.html.twig */
class __TwigTemplate_1a9d6017ca17f653658aa4b4246ace7346a4b58ed8d636d9e5c9d1f273f99d05 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'image_type' => array($this, 'block_image_type'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('image_type', $context, $blocks);
    }

    public function block_image_type($context, array $blocks = array())
    {
        // line 2
        if ((isset($context["subject_id"]) ? $context["subject_id"] : $this->getContext($context, "subject_id"))) {
            // line 3
            $context["url"] = $this->env->getExtension('routing')->getPath("sonata_admin_set_object_field_value", array("context" => "list", "field" => (isset($context["d_key"]) ? $context["d_key"] : $this->getContext($context, "d_key")), "objectId" => $this->getAttribute((isset($context["union"]) ? $context["union"] : $this->getContext($context, "union")), "id", array()), "code" => $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "code", array())));
            // line 4
            echo "<span  class=\"x-editable editable editable-click\" data-type=\"number\" data-value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["union"]) ? $context["union"] : $this->getContext($context, "union")), "quantity", array()), "html", null, true);
            echo "\" data-title=\"Количество\" data-pk=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["union"]) ? $context["union"] : $this->getContext($context, "union")), "id", array()), "html", null, true);
            echo "\"
      data-url=\"";
            // line 5
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
            echo "\" data-original-title=\"\">
                ";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["union"]) ? $context["union"] : $this->getContext($context, "union")), "quantity", array()), "html", null, true);
            echo "
            </span>
";
        } else {
            // line 9
            echo "<a class=\"x-editable-cannot\" href=\"javascript:void(0)\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["union"]) ? $context["union"] : $this->getContext($context, "union")), "quantity", array()), "html", null, true);
            echo "</a>
";
        }
        // line 11
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreUnionBundle:Admin/Form/td_types:quantity.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  47 => 9,  41 => 6,  37 => 5,  30 => 4,  28 => 3,  26 => 2,  20 => 1,);
    }
}
