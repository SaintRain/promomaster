<?php

/* CoreDeliveryBundle:Admin/List:list_min_max_sum.html.twig */
class __TwigTemplate_fc734ef899268ea806adce134956149e266ef1cd92b824fcb4146cfff78f9073 extends Twig_Template
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
        return array (  63 => 15,  57 => 12,  54 => 11,  51 => 10,  48 => 9,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
