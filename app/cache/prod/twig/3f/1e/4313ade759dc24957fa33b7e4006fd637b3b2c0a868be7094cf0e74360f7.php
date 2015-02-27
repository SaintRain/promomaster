<?php

/* CoreStatisticsBundle:Admin/Crud:deficitProductStatistics.html.twig */
class __TwigTemplate_3f1e4313ade759dc24957fa33b7e4006fd637b3b2c0a868be7094cf0e74360f7 extends Twig_Template
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
        echo "    <p>Показаны товары, которых на складе осталось менее 5 шт. <br/>В данной статистике не отображаются товары, которых никогда не было на складе, также не учтены виртуальные позиции.</strong></p>
<table class=\"table table-bordered table-hover\" style=\"width:50%\">
    <thead>
        <tr>
            <th align=\"center\" width=\"1%\" nowrap=\"\">№</th>
            <th align=\"center\" nowrap=\"nowrap\" >Модель</th>
            <th align=\"center\" width=\"1%\" nowrap=\"\">Всего (шт.)</th>
                ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "stocks", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 11
            echo "                <th align=\"center\" width=\"2%\" nowrap=\"\">Склад ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "captionRu", array()), "html", null, true);
            echo "</th>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "        </tr>
    </thead>

    <tbody>
        ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "manufacturers", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
            // line 18
            echo "            ";
            if ($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "defProducts", array(), "any", false, true), $this->getAttribute($context["manufacturer"], "id", array()), array(), "array", true, true)) {
                // line 19
                echo "                <tr><td colspan=\"100%\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["manufacturer"], "captionRu", array()), "html", null, true);
                echo "</td></tr>
                    ";
                // line 20
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "defProducts", array()), $this->getAttribute($context["manufacturer"], "id", array()), array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                    // line 21
                    echo "                    <tr>
                        <td>";
                    // line 22
                    echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "number", array()), "html", null, true);
                    echo "</td>
                        <td nowrap=\"nowrap\"><a href=\"";
                    // line 23
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute($context["d"], "product", array()), "product_id", array()))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "product_captionRu", array()), "html", null, true);
                    echo "</a></td>
                        <td
                            ";
                    // line 25
                    if ((!$this->getAttribute($context["d"], "total_quantity", array()))) {
                        // line 26
                        echo "                                class=\"error\"
                            ";
                    } else {
                        // line 28
                        echo "                                ";
                        if (($this->getAttribute($context["d"], "total_quantity", array()) < 3)) {
                            echo "class=\"warning\"";
                        }
                        // line 29
                        echo "                            ";
                    }
                    // line 30
                    echo "                            >";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "total_quantity", array()), "html", null, true);
                    echo "</td>
                        ";
                    // line 31
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "stocks", array()));
                    foreach ($context['_seq'] as $context["s_id"] => $context["s"]) {
                        // line 32
                        echo "                            <td
                                ";
                        // line 33
                        if (($this->getAttribute($this->getAttribute($context["d"], "info", array(), "any", false, true), $context["s_id"], array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($context["d"], "info", array(), "any", false, true), $context["s_id"], array(), "array", false, true), "quantity", array(), "any", true, true))) {
                            // line 34
                            echo "                                    ";
                            if ((($this->getAttribute($this->getAttribute($this->getAttribute($context["d"], "info", array()), $context["s_id"], array(), "array"), "quantity", array()) > 0) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["d"], "info", array()), $context["s_id"], array(), "array"), "quantity", array()) < 3))) {
                                // line 35
                                echo "                                        class=\"warning\"
                                    ";
                            } else {
                                // line 37
                                echo "                                        ";
                                if ((!$this->getAttribute($this->getAttribute($this->getAttribute($context["d"], "info", array()), $context["s_id"], array(), "array"), "quantity", array()))) {
                                    // line 38
                                    echo "                                            class=\"error\"
                                        ";
                                }
                                // line 40
                                echo "                                    ";
                            }
                            // line 41
                            echo "                                ";
                        } else {
                            // line 42
                            echo "                                    class=\"error\"
                                ";
                        }
                        // line 44
                        echo "                                >";
                        if (($this->getAttribute($this->getAttribute($context["d"], "info", array(), "any", false, true), $context["s_id"], array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($context["d"], "info", array(), "any", false, true), $context["s_id"], array(), "array", false, true), "quantity", array(), "any", true, true))) {
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["d"], "info", array()), $context["s_id"], array(), "array"), "quantity", array()), "html", null, true);
                        } else {
                            echo "0";
                        }
                        echo "</td>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['s_id'], $context['s'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 46
                    echo "                    </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "
            ";
            }
            // line 50
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/Crud:deficitProductStatistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 51,  165 => 50,  161 => 48,  154 => 46,  141 => 44,  137 => 42,  134 => 41,  131 => 40,  127 => 38,  124 => 37,  120 => 35,  117 => 34,  115 => 33,  112 => 32,  108 => 31,  103 => 30,  100 => 29,  95 => 28,  91 => 26,  89 => 25,  82 => 23,  78 => 22,  75 => 21,  71 => 20,  66 => 19,  63 => 18,  59 => 17,  53 => 13,  44 => 11,  40 => 10,  31 => 3,  28 => 2,);
    }
}
