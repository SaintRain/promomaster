<?php

/* CoreDeliveryBundle:Admin/List:list_max_sum.html.twig */
class __TwigTemplate_b4fd28ffe2cae4f75dad25983c0fe558fadc6284b8ed235155e259f6f3f577da extends Twig_Template
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
        if ((($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "maxSum", array()) == null) || ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "maxSum", array()) == 0))) {
            // line 5
            echo "        <div>&HorizontalLine;</div>
        ";
        } else {
            // line 7
            echo "            <div class=\"money\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "maxSum", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreDeliveryBundle:Admin/List:list_max_sum.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
