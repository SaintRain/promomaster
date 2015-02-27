<?php

/* CoreTroubleTicketBundle:Admin/Form:list_filter.html.twig */
class __TwigTemplate_273f3682f551586a0e3196bc4b2fc7d70365a73a2cd2dc2b855bd7f62677694e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<form class=\"sonata-filter-form ";
        echo ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isChild", array()) && (1 == twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "filters", array()))))) ? ("hide") : (""));
        echo "\" action=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => "list"), "method"), "html", null, true);
        echo "\" method=\"GET\">
    ";
        // line 2
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
    <fieldset class=\"filter_legend\">
        <legend class=\"filter_legend ";
        // line 4
        echo (($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "hasActiveFilters", array())) ? ("active") : ("inactive"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label_filters", array(), "SonataAdminBundle"), "html", null, true);
        echo "</legend>
        <div class=\"filter_container ";
        // line 5
        echo (($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "hasActiveFilters", array())) ? ("active") : ("inactive"));
        echo "\">

            <div>
                ";
        // line 8
        $context["internalCounter"] = 0;
        // line 9
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "filters", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
            // line 10
            echo "                    ";
            if (((isset($context["internalCounter"]) ? $context["internalCounter"] : null) == 0)) {
                // line 11
                echo "                        <div class=\"row-fluid\">
                    ";
            }
            // line 13
            echo "                    ";
            $context["internalCounter"] = ((isset($context["internalCounter"]) ? $context["internalCounter"] : null) + 1);
            // line 14
            echo "
                    <div class=\"span3\">
                        ";
            // line 17
            echo "                        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), $this->getAttribute($context["filter"], "formName", array()), array(), "array"), "children", array()), "type", array(), "array"), 'widget', array("attr" => array("class" => "span12 sonata-filter-option")));
            echo "
                        ";
            // line 18
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), $this->getAttribute($context["filter"], "formName", array()), array(), "array"), "children", array()), "value", array(), "array"), 'widget', array("attr" => array("class" => "span12")));
            echo "
                    </div>
                    ";
            // line 20
            if (((isset($context["internalCounter"]) ? $context["internalCounter"] : null) == 4)) {
                // line 21
                echo "                       </div>
                       ";
                // line 22
                $context["internalCounter"] = 0;
                // line 23
                echo "                    ";
            }
            // line 24
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "            </div>

            <input type=\"hidden\" name=\"filter[_page]\" id=\"filter__page\" value=\"1\" />

            ";
        // line 29
        $context["foo"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), "_page", array(), "array"), "setRendered", array(), "method");
        // line 30
        echo "            ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
            <div class=\"row-fluid\">
                <div class=\"pull-right\">
                    <input type=\"submit\" class=\"btn btn-primary\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_filter", array(), "SonataAdminBundle"), "html", null, true);
        echo "\" />
                    <a class=\"btn\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => "list", 1 => array("filters" => "reset")), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_reset_filter", array(), "SonataAdminBundle"), "html", null, true);
        echo "</a>
                </div>
            </div>
        </div>

        ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "persistentParameters", array()));
        foreach ($context['_seq'] as $context["paramKey"] => $context["paramValue"]) {
            // line 40
            echo "            <input type=\"hidden\" name=\"";
            echo twig_escape_filter($this->env, $context["paramKey"], "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $context["paramValue"], "html", null, true);
            echo "\" />
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['paramKey'], $context['paramValue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "    </fieldset>
</form>";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/Form:list_filter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 42,  123 => 40,  119 => 39,  109 => 34,  105 => 33,  98 => 30,  96 => 29,  90 => 25,  84 => 24,  81 => 23,  79 => 22,  76 => 21,  74 => 20,  69 => 18,  64 => 17,  60 => 14,  57 => 13,  53 => 11,  50 => 10,  45 => 9,  43 => 8,  37 => 5,  31 => 4,  26 => 2,  19 => 1,);
    }
}
