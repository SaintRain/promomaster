<?php

/* CoreStatisticsBundle:Admin/Crud:virtualUnitsStatistics.html.twig */
class __TwigTemplate_87127ca304f92d1dd7a15c1205ca3cdd4d205d4a8643665890019b180d26ec4a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreStatisticsBundle:Admin/Crud:default.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "stocks", array()));
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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "products", array()));
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
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "stocks", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 25
                echo "
                        ";
                // line 26
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "p_info", array(), "any", false, true), $this->getAttribute($context["s"], "id", array()), array(), "array", false, true), $this->getAttribute($context["p"], "id", array()), array(), "array", true, true)) {
                    // line 27
                    echo "                        ";
                    $context["total_quantity"] = ((isset($context["total_quantity"]) ? $context["total_quantity"] : $this->getContext($context, "total_quantity")) + $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "p_info", array()), $this->getAttribute($context["s"], "id", array()), array(), "array"), $this->getAttribute($context["p"], "id", array()), array(), "array"));
                    // line 28
                    echo "                        <td class=\"error\">
                                ";
                    // line 29
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "p_info", array()), $this->getAttribute($context["s"], "id", array()), array(), "array"), $this->getAttribute($context["p"], "id", array()), array(), "array"), "html", null, true);
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
            if ((isset($context["total_quantity"]) ? $context["total_quantity"] : $this->getContext($context, "total_quantity"))) {
                echo "class=\"error\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["total_quantity"]) ? $context["total_quantity"] : $this->getContext($context, "total_quantity")), "html", null, true);
            echo "</td>
                            <td ";
            // line 36
            if ((isset($context["total_quantity"]) ? $context["total_quantity"] : $this->getContext($context, "total_quantity"))) {
                echo "class=\"error\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction(((isset($context["total_quantity"]) ? $context["total_quantity"] : $this->getContext($context, "total_quantity")) * $this->getAttribute($context["p"], "price", array()))), "html", null, true);
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
        return array (  143 => 39,  128 => 36,  119 => 35,  113 => 34,  109 => 32,  103 => 29,  100 => 28,  97 => 27,  95 => 26,  92 => 25,  87 => 24,  85 => 23,  76 => 21,  73 => 20,  69 => 19,  61 => 13,  52 => 11,  48 => 10,  39 => 3,  36 => 2,  11 => 1,);
    }
}
