<?php

/* CoreStatisticsBundle:Admin/Crud:inventoryStatistics.html.twig */
class __TwigTemplate_6224879e6d6c511efccdabe1137e9a643d797aa1dda437a92996965343f22701 extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "stocks", array()));
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
        return array (  65 => 15,  58 => 14,  51 => 13,  48 => 12,  44 => 11,  35 => 5,  31 => 3,  28 => 2,);
    }
}
