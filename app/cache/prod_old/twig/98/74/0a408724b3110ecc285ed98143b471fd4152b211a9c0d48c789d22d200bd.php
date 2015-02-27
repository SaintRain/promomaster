<?php

/* CoreDiscountsBundle:Admin/ManufacturerDiscount/list_td:ManufacturerStepValues.html.twig */
class __TwigTemplate_98740a408724b3110ecc285ed98143b471fd4152b211a9c0d48c789d22d200bd extends Twig_Template
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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "
<table class=\"table  table-bordered table-striped\">
    <tr>
        <th >
            Накопительная сумма 
        </th>
        <th >
            Ограничение в днях
        </th>
        <th >
            Значение скидки
        </th>        

    </tr>
    ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "manufacturerStepValues", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 18
            echo "    <tr>
        <td class=\"money\">";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["d"], "stepValue", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
        <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "stepDays", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "discountValue", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute($context["d"], "isDiscountValueInPercent", array())) {
                echo "%";
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            }
            echo "</td>
    </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
</table>

";
    }

    public function getTemplateName()
    {
        return "CoreDiscountsBundle:Admin/ManufacturerDiscount/list_td:ManufacturerStepValues.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 24,  64 => 21,  60 => 20,  54 => 19,  51 => 18,  47 => 17,  31 => 3,  28 => 2,);
    }
}
