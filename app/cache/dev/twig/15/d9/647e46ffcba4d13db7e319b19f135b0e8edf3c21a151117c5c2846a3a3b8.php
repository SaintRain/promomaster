<?php

/* CoreStatisticsBundle:Admin/Crud:inventoryStatistics.html.twig */
class __TwigTemplate_15d9647e46ffcba4d13db7e319b19f135b0e8edf3c21a151117c5c2846a3a3b8 extends Twig_Template
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
        echo "
<div id=\"filters\" class=\"well well-small\" style=\"position: relative;\">
    <form id=\"filter_form\" method=\"GET\" action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("core_statistics_generate_inventory");
        echo "\" target=\"_blank\">
        <input type=\"hidden\" name=\"key\" value=\"print_docs\">
        <input type=\"hidden\" name=\"action\" value=\"admin_print_stats_inventory\">
        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"adminTableFilters\">
            <tbody>
                <tr><td valign=\"top\"><b>Склад(ы)</b>:
                            ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "stocks", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 12
            echo "                                <label >
                                    <input type=\"checkbox\" name=\"filter[id_store][]\" value=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "id", array()), "html", null, true);
            echo "\" checked=\"\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "captionRu", array()), "html", null, true);
            if ($this->getAttribute($context["s"], "isGeneralStock", array())) {
                echo " (главный склад)";
            }
            // line 14
            echo "                                </label>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "                        
                            </td>
                            <td valign=\"top\"><b>Учитывать</b>:
                                    <label ><input type=\"radio\" name=\"filter[only_free]\" value=\"0\" checked=\"\"> всё, что лежит на складе</label>
                                    <label><input type=\"radio\" name=\"filter[only_free]\" value=\"1\"> только свободные позиции</label></td>
                            <td valign=\"top\"><b>Показывать</b>:
                                <label ><input type=\"radio\" name=\"filter[type]\" value=\"sum\" checked=\"\"> в сумме по всем выбранным складам</label>
                                <label><input type=\"radio\" name=\"filter[type]\" value=\"separate\"> по каждому выбранному складу отдельно</label>
                                </td>
                                <td valign=\"top\"><b>Формат</b>:
                                    <label ><input type=\"radio\" name=\"format\" value=\"pdf\" checked=\"\"> PDF</label>
                                    <label><input type=\"radio\" name=\"format\" value=\"html\"> HTML</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                <input type=\"submit\" class=\"btn btn-primary\" name=\"btn_update_and_edit\" value=\"Сформировать\">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>


";
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/Crud:inventoryStatistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 15,  66 => 14,  59 => 13,  56 => 12,  52 => 11,  43 => 5,  39 => 3,  36 => 2,  11 => 1,);
    }
}
