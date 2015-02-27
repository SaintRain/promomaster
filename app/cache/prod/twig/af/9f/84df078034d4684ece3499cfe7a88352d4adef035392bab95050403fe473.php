<?php

/* CoreStatisticsBundle:Admin/Crud:virtualUnitsStatistics.html.twig */
class __TwigTemplate_af9f84df078034d4684ece3499cfe7a88352d4adef035392bab95050403fe473 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreStatisticsBundle:Admin/Crud:default.html.twig");

        $this->blocks = array(
            'statisticsContent' => array($this, 'block_statisticsContent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreStatisticsBundle:Admin/Crud:default.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_statisticsContent($context, array $blocks = array())
    {
        // line 3
        echo "<p>Показаны виртуальные товарные единицы, которые забронированы и олачены в заказах. Виртуальные позиции бронируются, если не хватает реального товара.<br/>
        Указанные  виртуальные товарные единицы следует поставить
        на склады, чтобы заказы можно было отгрузить.</p>
<table class=\"table table-bordered table-hover\" style=\"width:70% \">
    <thead>
        <tr>
            <th>Продукт</th>
            ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "stocks", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 11
            echo "                <th align=\"center\" width=\"2%\" nowrap=\"\">Склад «";
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "captionRu", array()), "html", null, true);
            echo "»</th>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "
                    <th>Всего шт.</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
    ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "products", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 20
            echo "                    <tr>
                        <td nowrap=\"nowrap\"><a href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($context["p"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "sku", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "captionRu", array()), "html", null, true);
            echo "</a></td>

                ";
            // line 23
            $context["total_quantity"] = 0;
            // line 24
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "stocks", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 25
                echo "
                        ";
                // line 26
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "p_info", array(), "any", false, true), $this->getAttribute($context["s"], "id", array()), array(), "array", false, true), $this->getAttribute($context["p"], "id", array()), array(), "array", true, true)) {
                    // line 27
                    echo "                        ";
                    $context["total_quantity"] = ((isset($context["total_quantity"]) ? $context["total_quantity"] : null) + $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "p_info", array()), $this->getAttribute($context["s"], "id", array()), array(), "array"), $this->getAttribute($context["p"], "id", array()), array(), "array"));
                    // line 28
                    echo "                        <td class=\"error\">
                                ";
                    // line 29
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "p_info", array()), $this->getAttribute($context["s"], "id", array()), array(), "array"), $this->getAttribute($context["p"], "id", array()), array(), "array"), "html", null, true);
                    echo "
                            </td>
                        ";
                } else {
                    // line 32
                    echo "                            <td >0</td>
                        ";
                }
                // line 34
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "                            <td ";
            if ((isset($context["total_quantity"]) ? $context["total_quantity"] : null)) {
                echo "class=\"error\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["total_quantity"]) ? $context["total_quantity"] : null), "html", null, true);
            echo "</td>
                            <td ";
            // line 36
            if ((isset($context["total_quantity"]) ? $context["total_quantity"] : null)) {
                echo "class=\"error\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction(((isset($context["total_quantity"]) ? $context["total_quantity"] : null) * $this->getAttribute($context["p"], "price", array()))), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                    </tbody>
                </table>
";
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/Crud:virtualUnitsStatistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 39,  120 => 36,  111 => 35,  105 => 34,  101 => 32,  95 => 29,  92 => 28,  89 => 27,  87 => 26,  84 => 25,  79 => 24,  77 => 23,  68 => 21,  65 => 20,  61 => 19,  53 => 13,  44 => 11,  40 => 10,  31 => 3,  28 => 2,);
    }
}
