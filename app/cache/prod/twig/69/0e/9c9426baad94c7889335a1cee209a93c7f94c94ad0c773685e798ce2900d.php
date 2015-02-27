<?php

/* CoreStatisticsBundle:Admin/Crud:inventoryGeneratedStatistics_separate.html.twig */
class __TwigTemplate_690e9c9426baad94c7889335a1cee209a93c7f94c94ad0c773685e798ce2900d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sonata_nav' => array($this, 'block_sonata_nav'),
            'sonata_admin_content' => array($this, 'block_sonata_admin_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('sonata_nav', $context, $blocks);
        // line 13
        $this->displayBlock('sonata_admin_content', $context, $blocks);
        // line 62
        echo "
";
    }

    // line 1
    public function block_sonata_nav($context, array $blocks = array())
    {
        // line 2
        echo "    <style type=\"text/css\" media=\"screen,print\">
        table {font-family:San-Serif,Verdana,Arial;font-size:11px;border:1px solid #000;border-bottom:0;border-right:0;border-collapse: collapse;background-color: #fff;margin:20px 20px 60px 20px;width:1000px;}
        table td, table th {border: 1px solid #000; border-left: 0; border-top: 0; padding: 3px;}
        table td.num, table th.num {white-space:nowrap;text-align:right;background-color:#eee;}
        table thead th, table tfoot th,
        table thead td, table tfoot td {background-color:#eee;}
        table tbody td {background-color:#fff;}
        table tbody th {background-color:#eee;}

    </style>
";
    }

    // line 13
    public function block_sonata_admin_content($context, array $blocks = array())
    {
        // line 14
        echo "    <div style=\"margin-left:20px\">
        <h2>Инвентаризация по складам
            ";
        // line 16
        if (($this->getAttribute($this->getAttribute((isset($context["search"]) ? $context["search"] : null), "filter", array(), "any", false, true), "only_free", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["search"]) ? $context["search"] : null), "filter", array()), "only_free", array()))) {
            // line 17
            echo "                (только свободные позиции)
            ";
        } else {
            // line 19
            echo "                (всё, что лежит на складе)
            ";
        }
        // line 21
        echo "        </h2>
        <p><strong>В данной статистике не отображаются товары, которых никогда не было на складе.
                Также не учитываются виртуальные позиции и позиции в пути.
            </strong></p>
    </div>

    <table style=\"width:";
        // line 27
        if (($this->getAttribute((isset($context["search"]) ? $context["search"] : null), "format", array()) == "pdf")) {
            echo "100%";
        } else {
            echo "50%";
        }
        echo "\" >
        <thead>
            <tr>
                <th style=\"width:5%\">#</th>
                <th>Наименование</th>
                <th>Числится</th>
                <th>Списано</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stocks"]) ? $context["stocks"] : null));
        foreach ($context['_seq'] as $context["s_id"] => $context["s"]) {
            // line 38
            echo "                <tr><td colspan=\"4\" style=\"background-color:#eee;font-size:12px;\"><h5>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "captionRu", array()), "html", null, true);
            echo "</h5></td></tr>
                            ";
            // line 39
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), $context["s_id"], array(), "array", true, true)) {
                // line 40
                echo "                                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), $context["s_id"], array(), "array"), "data", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                    // line 41
                    echo "                        <tr>
                            <td class=\"num\">";
                    // line 42
                    echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "number", array()), "html", null, true);
                    echo "</td>
                            <td>";
                    // line 43
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "product_article", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "product_captionRu", array()), "html", null, true);
                    echo "</td>
                            <td>";
                    // line 44
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "quantity", array()), "html", null, true);
                    echo "</td>
                            <td>";
                    // line 45
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "quantity_with_defect", array()), "html", null, true);
                    echo "</td>
                        </tr>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "                ";
            }
            // line 49
            echo "                <tr>
                    <td class=\"num\"></td>
                    <td style=\"text-align: right\"><b>Итого:</b></td>
                    <td><b>";
            // line 52
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), $context["s_id"], array(), "array", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), $context["s_id"], array(), "array"), "total_quantity", array()), "html", null, true);
            } else {
                echo "0";
            }
            echo "</b></td>
                    <td><b>";
            // line 53
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), $context["s_id"], array(), "array", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), $context["s_id"], array(), "array"), "total_quantity_with_defect", array()), "html", null, true);
            } else {
                echo "0";
            }
            echo "</b></td>
                </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['s_id'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "
        </tbody>
    </table>

";
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/Crud:inventoryGeneratedStatistics_separate.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  161 => 57,  147 => 53,  139 => 52,  134 => 49,  131 => 48,  122 => 45,  118 => 44,  112 => 43,  108 => 42,  105 => 41,  100 => 40,  98 => 39,  93 => 38,  89 => 37,  72 => 27,  64 => 21,  60 => 19,  56 => 17,  54 => 16,  50 => 14,  47 => 13,  33 => 2,  30 => 1,  25 => 62,  23 => 13,  21 => 1,);
    }
}
