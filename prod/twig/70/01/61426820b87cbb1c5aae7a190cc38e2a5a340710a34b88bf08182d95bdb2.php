<?php

/* ApplicationSonataAdminBundle:CRUD:list_filter.html.twig */
class __TwigTemplate_700161426820b87cbb1c5aae7a190cc38e2a5a340710a34b88bf08182d95bdb2 extends Twig_Template
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
        echo "                    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "filters", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
            // line 10
            echo "                        ";
            if (((isset($context["internalCounter"]) ? $context["internalCounter"] : null) == 0)) {
                // line 11
                echo "                            <div class=\"row-fluid\">
                            ";
            }
            // line 13
            echo "                            ";
            $context["internalCounter"] = ((isset($context["internalCounter"]) ? $context["internalCounter"] : null) + 1);
            // line 14
            echo "
                                <div class=\"span3\">
                                    ";
            // line 16
            if ( !$this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "options", array(), "any", false, true), "field_options", array(), "any", false, true), "attr", array(), "any", true, true)) {
                // line 17
                echo "                                        ";
                $context["attr"] = array();
                // line 18
                echo "                                            ";
            } else {
                // line 19
                echo "                                                ";
                $context["attr"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "options", array()), "field_options", array()), "attr", array());
                // line 20
                echo "                                                    ";
            }
            // line 21
            echo "
                                                        ";
            // line 22
            if ($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "placeholder", array(), "any", true, true)) {
                // line 23
                echo "                                                            ";
                $context["placeholder"] = $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "placeholder", array());
                // line 24
                echo "                                                                ";
            } else {
                // line 25
                echo "                                                                    ";
                $context["placeholder"] = "";
                // line 26
                echo "                                                                        ";
            }
            // line 27
            echo "

";
            // line 31
            echo "                                                                            ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), $this->getAttribute($context["filter"], "formName", array()), array(), "array"), "children", array()), "type", array(), "array"), 'widget', array("attr" => array("class" => "span12 sonata-filter-option")));
            echo "
                                                                            ";
            // line 32
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), $this->getAttribute($context["filter"], "formName", array()), array(), "array"), "children", array()), "value", array(), "array"), 'widget', array("attr" => array("class" => "span12", "placeholder" => (isset($context["placeholder"]) ? $context["placeholder"] : null))));
            echo "
                                                                        </div>
                                                                        ";
            // line 34
            if (((isset($context["internalCounter"]) ? $context["internalCounter"] : null) == 4)) {
                // line 35
                echo "                                                                        </div>
                                                                        ";
                // line 36
                $context["internalCounter"] = 0;
                // line 37
                echo "                                                                            ";
            }
            // line 38
            echo "                                                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                                                                                </div>

                                                                                <input type=\"hidden\" name=\"filter[_page]\" id=\"filter__page\" value=\"1\" />

                                                                                ";
        // line 43
        $context["foo"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), "_page", array(), "array"), "setRendered", array(), "method");
        // line 44
        echo "                                                                                    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                                                                                    <div class=\"row-fluid\" style=\"margin-top:5px\">
                                                                                        ";
        // line 46
        if ( !$this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "isXmlHttpRequest", array())) {
            // line 47
            echo "                                                                                            ";
            // line 48
            echo "                                                                                            <div class=\"pull-left span3 label-inline\">
                                                                                                <label class=\"control-label\"><input ";
            // line 49
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh"), "method")) {
                echo " checked ";
            }
            echo " type=\"checkbox\" value=\"1\" name=\"filter_autorefresh\" id=\"filter_autorefresh\">&nbsp;автообновление</label>&nbsp;
                                                                                                <select id=\"filter_autorefresh_interval\" name=\"filter_autorefresh_interval\" ";
            // line 50
            if ( !$this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh"), "method")) {
                echo "disabled=\"\" ";
            }
            echo " >
                                                                                                    <option ";
            // line 51
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh_interval"), "method") == 10)) {
                echo "selected ";
            }
            echo "  value=\"10\">10 сек</option>
                                                                                                    <option ";
            // line 52
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh_interval"), "method") == 30)) {
                echo "selected ";
            }
            echo " value=\"30\">30\tсек</option>
                                                                                                    <option ";
            // line 53
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh_interval"), "method") == 60)) {
                echo "selected ";
            }
            echo " value=\"60\">1\tмин</option>
                                                                                                    <option  ";
            // line 54
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh_interval"), "method") == 120)) {
                echo "selected ";
            }
            echo " value=\"120\">2\tмин</option>
                                                                                                    <option ";
            // line 55
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh_interval"), "method") == 300)) {
                echo "selected ";
            }
            echo "  value=\"300\">5\tмин</option>
                                                                                                    <option ";
            // line 56
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh_interval"), "method") == 600)) {
                echo "selected ";
            }
            echo "  value=\"600\">10\tмин</option>
                                                                                                    <option ";
            // line 57
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh_interval"), "method") == 1200)) {
                echo "selected ";
            }
            echo "  value=\"1200\">20\tмин</option>
                                                                                                    <option ";
            // line 58
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh_interval"), "method") == 1800)) {
                echo "selected ";
            }
            echo "  value=\"1800\">30\tмин</option>
                                                                                                    <option ";
            // line 59
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh_interval"), "method") == 3600)) {
                echo "selected ";
            }
            echo "  value=\"3600\">1\tчас</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        ";
        }
        // line 63
        echo "                                                                                        <div class=\"pull-right\">
                                                                                            <input type=\"submit\" class=\"btn btn-primary\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_filter", array(), "SonataAdminBundle"), "html", null, true);
        echo "\" />
                                                                                            <a class=\"btn\" href=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => "list", 1 => array("filters" => "reset")), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_reset_filter", array(), "SonataAdminBundle"), "html", null, true);
        echo "</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                ";
        // line 70
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "persistentParameters", array()));
        foreach ($context['_seq'] as $context["paramKey"] => $context["paramValue"]) {
            // line 71
            echo "                                                                                    <input type=\"hidden\" name=\"";
            echo twig_escape_filter($this->env, $context["paramKey"], "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $context["paramValue"], "html", null, true);
            echo "\" />
                                                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['paramKey'], $context['paramValue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "                                                                            </fieldset>
                                                                        </form>
                                                                        ";
        // line 75
        if ( !$this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "isXmlHttpRequest", array())) {
            // line 76
            echo "                                                                            ";
            // line 77
            echo "                                                                            <script>
                                                                                \$('#filter_autorefresh').change(function() {
                                                                                    if (\$(this).is(':checked')) {
                                                                                        \$('#filter_autorefresh_interval').removeAttr('disabled');
                                                                                    }
                                                                                    else {
                                                                                        \$('#filter_autorefresh_interval').attr('disabled', 'disabled');
                                                                                    }
                                                                                })
                                                                                ";
            // line 86
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "filter_autorefresh"), "method")) {
                // line 87
                echo "                                                                                    var interval = parseInt(\$('#filter_autorefresh_interval').val());
                                                                                    if (interval > 0) {
                                                                                        setTimeout(function() {
                                                                                            location.reload();
                                                                                        }, interval * 1000);
                                                                                    }
                                                                                ";
            }
            // line 94
            echo "                                                                            </script>
                                                                        ";
        }
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:CRUD:list_filter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  277 => 94,  268 => 87,  266 => 86,  255 => 77,  253 => 76,  251 => 75,  247 => 73,  236 => 71,  232 => 70,  222 => 65,  218 => 64,  215 => 63,  206 => 59,  200 => 58,  194 => 57,  188 => 56,  182 => 55,  176 => 54,  170 => 53,  164 => 52,  158 => 51,  152 => 50,  146 => 49,  143 => 48,  141 => 47,  139 => 46,  133 => 44,  131 => 43,  125 => 39,  119 => 38,  116 => 37,  114 => 36,  111 => 35,  109 => 34,  104 => 32,  99 => 31,  95 => 27,  92 => 26,  89 => 25,  86 => 24,  83 => 23,  81 => 22,  78 => 21,  75 => 20,  72 => 19,  69 => 18,  66 => 17,  64 => 16,  60 => 14,  57 => 13,  53 => 11,  50 => 10,  45 => 9,  43 => 8,  37 => 5,  31 => 4,  26 => 2,  19 => 1,);
    }
}
