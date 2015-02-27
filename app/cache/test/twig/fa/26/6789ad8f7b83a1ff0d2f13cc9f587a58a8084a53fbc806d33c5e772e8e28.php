<?php

/* CoreDiscountsBundle:Admin/ContragentManufacturerDiscount/list_td:manufacturerStepValues.html.twig */
class __TwigTemplate_fa266789ad8f7b83a1ff0d2f13cc9f587a58a8084a53fbc806d33c5e772e8e28 extends Twig_Template
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
            Cумма заказа
        </th>
        <th >
            Значение скидки
        </th>        

    </tr>
    ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "manufacturerStepValues", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 15
            echo "    <tr>
        <td class=\"money\">";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["d"], "stepValue", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
        <td>";
            // line 17
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
        // line 20
        echo "
</table>

";
    }

    public function getTemplateName()
    {
        return "CoreDiscountsBundle:Admin/ContragentManufacturerDiscount/list_td:manufacturerStepValues.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 20,  57 => 17,  51 => 16,  48 => 15,  44 => 14,  31 => 3,  28 => 2,);
    }
}
