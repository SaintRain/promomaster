<?php

/* CoreStatisticsBundle:Admin/Crud:inventoryGeneratedStatistics_sum.html.twig */
class __TwigTemplate_43530aaef0790255a81f3126148c0db558891c5f0283b347156a7cf9a3cab591 extends Twig_Template
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
        // line 12
        $this->displayBlock('sonata_admin_content', $context, $blocks);
        // line 56
        echo "
";
    }

    // line 1
    public function block_sonata_nav($context, array $blocks = array())
    {
        echo "         
    <style type=\"text/css\" media=\"screen,print\">
        table {font-family:San-Serif,Verdana,Arial;font-size:11px;border:1px solid #000;border-bottom:0;border-right:0;border-collapse: collapse;background-color: #fff;margin:20px 20px 60px 20px;width:1000px;}
        table td, table th {border: 1px solid #000; border-left: 0; border-top: 0; padding: 3px;}
        table td.num, table th.num {white-space:nowrap;text-align:right;font-weight: bold;background-color:#eee;}
        table thead th, table tfoot th,
        table thead td, table tfoot td {background-color:#eee;}
        table tbody td {background-color:#fff;}
        table tbo
    </style>
";
    }

    // line 12
    public function block_sonata_admin_content($context, array $blocks = array())
    {
        // line 13
        echo "    <div style=\"margin-left:20px\">
        <h2>Инвентаризация по складам
            ";
        // line 15
        if (($this->getAttribute($this->getAttribute((isset($context["search"]) ? $context["search"] : null), "filter", array(), "any", false, true), "only_free", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["search"]) ? $context["search"] : null), "filter", array()), "only_free", array()))) {
            // line 16
            echo "                (только свободные позиции)
            ";
        } else {
            // line 18
            echo "                (всё, что лежит на складе)
            ";
        }
        // line 20
        echo "        </h2>
        <p><strong>В данной статистике не отображаются товары, которых никогда не было на складе.
                Также не учитываются виртуальные позиции и позиции в пути.
            </strong></p>
    </div>
    <table style=\"width:";
        // line 25
        if (($this->getAttribute((isset($context["search"]) ? $context["search"] : null), "format", array()) == "pdf")) {
            echo "100%";
        } else {
            echo "50%";
        }
        echo "\"  >
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
        // line 35
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "data", array(), "any", true, true)) {
            // line 36
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "data", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                // line 37
                echo "                    <tr>
                        <td class=\"num\">";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "number", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "product_article", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "product_captionRu", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "quantity", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "quantity_with_defect", array()), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "
                <tr>
                    <td class=\"num\"></td>
                    <td style=\"text-align: right\"><b>Итого:</b></td>
                    <td><b>";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "total_quantity", array()), "html", null, true);
            echo "</b></td>
                    <td><b>";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "total_quantity_with_defect", array()), "html", null, true);
            echo "</b></td>
                </tr>
            ";
        }
        // line 52
        echo "        </tbody>
    </table>

";
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/Crud:inventoryGeneratedStatistics_sum.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  136 => 52,  130 => 49,  126 => 48,  120 => 44,  111 => 41,  107 => 40,  101 => 39,  97 => 38,  94 => 37,  89 => 36,  87 => 35,  70 => 25,  63 => 20,  59 => 18,  55 => 16,  53 => 15,  49 => 13,  46 => 12,  30 => 1,  25 => 56,  23 => 12,  21 => 1,);
    }
}
