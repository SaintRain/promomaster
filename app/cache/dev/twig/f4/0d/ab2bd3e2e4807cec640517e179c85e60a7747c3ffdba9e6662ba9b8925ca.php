<?php

/* CoreStatisticsBundle:Admin/Crud:deficitProductStatistics.html.twig */
class __TwigTemplate_f40dab2bd3e2e4807cec640517e179c85e60a7747c3ffdba9e6662ba9b8925ca extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "stocks", array()));
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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "manufacturers", array()));
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
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "defProducts", array()), $this->getAttribute($context["manufacturer"], "id", array()), array(), "array"));
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
                    if ( !$this->getAttribute($context["d"], "total_quantity", array())) {
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
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "stocks", array()));
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
                                if ( !$this->getAttribute($this->getAttribute($this->getAttribute($context["d"], "info", array()), $context["s_id"], array(), "array"), "quantity", array())) {
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
        return array (  179 => 51,  173 => 50,  169 => 48,  162 => 46,  149 => 44,  145 => 42,  142 => 41,  139 => 40,  135 => 38,  132 => 37,  128 => 35,  125 => 34,  123 => 33,  120 => 32,  116 => 31,  111 => 30,  108 => 29,  103 => 28,  99 => 26,  97 => 25,  90 => 23,  86 => 22,  83 => 21,  79 => 20,  74 => 19,  71 => 18,  67 => 17,  61 => 13,  52 => 11,  48 => 10,  39 => 3,  36 => 2,  11 => 1,);
    }
}
