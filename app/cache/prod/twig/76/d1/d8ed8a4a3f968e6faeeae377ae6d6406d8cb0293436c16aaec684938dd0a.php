<?php

/* CoreDeliveryBundle:Admin/List:list_min_max_sum.html.twig */
class __TwigTemplate_76d1d8ed8a4a3f968e6faeeae377ae6d6406d8cb0293436c16aaec684938dd0a extends Twig_Template
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
        if (((($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "maxSum", array()) == null) || ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "maxSum", array()) == 0)) && (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "minSum", array()) == null) || ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "minSum", array()) == 0)))) {
            // line 5
            echo "        <div class=\"money\">
            <span>&HorizontalLine;</span>
        </div>
        ";
        } else {
            // line 9
            echo "            ";
            $context["maxSum"] = (((($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "maxSum", array()) == null) || ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "maxSum", array()) == 0))) ? ("&HorizontalLine;") : ((($this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "maxSum", array())) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction())));
            // line 10
            echo "            ";
            $context["minSum"] = (((($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "minSum", array()) == null) || ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "minSum", array()) == 0))) ? ("&HorizontalLine;") : ((($this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "minSum", array())) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction())));
            // line 11
            echo "                <div class=\"money\">
                    <span>";
            // line 12
            echo (isset($context["minSum"]) ? $context["minSum"] : null);
            echo "</span>
                </div>
                <div class=\"money\">
                    <span>";
            // line 15
            echo (isset($context["maxSum"]) ? $context["maxSum"] : null);
            echo "</span>
                </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreDeliveryBundle:Admin/List:list_min_max_sum.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 15,  49 => 12,  46 => 11,  43 => 10,  40 => 9,  34 => 5,  31 => 4,  28 => 3,);
    }
}
