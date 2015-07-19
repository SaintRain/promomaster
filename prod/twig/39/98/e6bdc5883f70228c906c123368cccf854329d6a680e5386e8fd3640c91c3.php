<?php

/* CoreProductBundle:Catalog:pagination.html.twig */
class __TwigTemplate_3998e6bdc5883f70228c906c123368cccf854329d6a680e5386e8fd3640c91c3 extends Twig_Template
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
        echo "
";
        // line 8
        echo "
";
        // line 9
        if (((isset($context["pageCount"]) ? $context["pageCount"] : null) > 1)) {
            // line 10
            echo "
    ";
            // line 11
            $context["GET"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array());
            // line 12
            echo "    ";
            $context["parameters"] = twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"), $this->getAttribute((isset($context["GET"]) ? $context["GET"] : null), "all", array()));
            // line 13
            echo "
    ";
            // line 14
            if (array_key_exists("previous", $context)) {
                // line 15
                echo "        <!--noindex-->
        ";
                // line 16
                if ((array_key_exists("routeFirsPage", $context) && ((isset($context["previous"]) ? $context["previous"] : null) == (isset($context["first"]) ? $context["first"] : null)))) {
                    // line 17
                    echo "            <a id=\"PrevPage\" class=\"pagination_prev\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => null))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("prev", array(), "frontend"), "html", null, true);
                    echo "</a>
        ";
                } else {
                    // line 19
                    echo "            <a id=\"PrevPage\" class=\"pagination_prev\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => (isset($context["previous"]) ? $context["previous"] : null)))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("prev", array(), "frontend"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 21
                echo "        <!--/noindex-->
    ";
            }
            // line 23
            echo "
    ";
            // line 24
            if (array_key_exists("next", $context)) {
                // line 25
                echo "        <!--noindex-->
        <a id=\"NextPage\" class=\"pagination_next\" href=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => (isset($context["next"]) ? $context["next"] : null)))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("next", array(), "frontend"), "html", null, true);
                echo "</a>
        <!--/noindex-->
    ";
            }
            // line 29
            echo "
    <ul class=\"pagination_nums\">

        ";
            // line 32
            if (((array_key_exists("first", $context) && ((isset($context["current"]) ? $context["current"] : null) > ((isset($context["first"]) ? $context["first"] : null) + 2))) && ((isset($context["pageCount"]) ? $context["pageCount"] : null) > 7))) {
                // line 33
                echo "            ";
                if (array_key_exists("routeFirsPage", $context)) {
                    // line 34
                    echo "                <li class=\"pagination_num\"><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => null))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, (isset($context["first"]) ? $context["first"] : null), "html", null, true);
                    echo "</a></li>
            ";
                } else {
                    // line 36
                    echo "                <li class=\"pagination_num\"><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => (isset($context["first"]) ? $context["first"] : null)))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, (isset($context["first"]) ? $context["first"] : null), "html", null, true);
                    echo "</a></li>
            ";
                }
                // line 38
                echo "        ";
            }
            // line 39
            echo "
        ";
            // line 40
            if (((array_key_exists("first", $context) && ((isset($context["current"]) ? $context["current"] : null) > ((isset($context["first"]) ? $context["first"] : null) + 3))) && ((isset($context["pageCount"]) ? $context["pageCount"] : null) > 7))) {
                // line 41
                echo "            ";
                if (((isset($context["current"]) ? $context["current"] : null) == ((isset($context["first"]) ? $context["first"] : null) + 4))) {
                    // line 42
                    echo "                <li class=\"pagination_num\"><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => ((isset($context["first"]) ? $context["first"] : null) + 1)))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, ((isset($context["first"]) ? $context["first"] : null) + 1), "html", null, true);
                    echo "</a></li>
            ";
                } else {
                    // line 44
                    echo "                <li class=\"pagination_num\"><span>&hellip;</span></li>
            ";
                }
                // line 46
                echo "        ";
            }
            // line 47
            echo "
        ";
            // line 48
            if (((isset($context["pageCount"]) ? $context["pageCount"] : null) <= 7)) {
                // line 49
                echo "            ";
                $context["pagesInRange"] = array();
                // line 50
                echo "            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["pageCount"]) ? $context["pageCount"] : null)));
                foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
                    // line 51
                    echo "                ";
                    $context["pagesInRange"] = twig_array_merge((isset($context["pagesInRange"]) ? $context["pagesInRange"] : null), array(0 => $context["n"]));
                    // line 52
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 53
                echo "        ";
            }
            // line 54
            echo "
        ";
            // line 55
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagesInRange"]) ? $context["pagesInRange"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 56
                echo "            ";
                if (($context["page"] != (isset($context["current"]) ? $context["current"] : null))) {
                    // line 57
                    echo "                ";
                    if ((array_key_exists("routeFirsPage", $context) && ($context["page"] == (isset($context["first"]) ? $context["first"] : null)))) {
                        // line 58
                        echo "                    <li class=\"pagination_num\"><a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => null))), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, (isset($context["first"]) ? $context["first"] : null), "html", null, true);
                        echo "</a></li>
                ";
                    } else {
                        // line 60
                        echo "                    <li class=\"pagination_num\"><a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => $context["page"]))), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                        echo "</a></li>
                ";
                    }
                    // line 62
                    echo "            ";
                } else {
                    // line 63
                    echo "                <li class=\"pagination_num\"><strong>";
                    echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                    echo "</strong></li>
            ";
                }
                // line 65
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "
        ";
            // line 67
            if (((array_key_exists("last", $context) && ((isset($context["current"]) ? $context["current"] : null) < ((isset($context["last"]) ? $context["last"] : null) - 3))) && ((isset($context["pageCount"]) ? $context["pageCount"] : null) > 7))) {
                // line 68
                echo "            ";
                if (((isset($context["current"]) ? $context["current"] : null) == ((isset($context["last"]) ? $context["last"] : null) - 4))) {
                    // line 69
                    echo "                <li class=\"pagination_num\"><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => ((isset($context["last"]) ? $context["last"] : null) - 1)))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, ((isset($context["last"]) ? $context["last"] : null) - 1), "html", null, true);
                    echo "</a></li>
            ";
                } else {
                    // line 71
                    echo "                <li class=\"pagination_num\"><span>&hellip;</span></li>
            ";
                }
                // line 73
                echo "        ";
            }
            // line 74
            echo "
        ";
            // line 75
            if (((array_key_exists("last", $context) && ((isset($context["current"]) ? $context["current"] : null) < ((isset($context["last"]) ? $context["last"] : null) - 2))) && ((isset($context["pageCount"]) ? $context["pageCount"] : null) > 7))) {
                // line 76
                echo "            <li class=\"pagination_num\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["last"]) ? $context["last"] : null)))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["last"]) ? $context["last"] : null), "html", null, true);
                echo "</a></li>
        ";
            }
            // line 78
            echo "
    </ul>

";
        }
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Catalog:pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 78,  230 => 76,  228 => 75,  225 => 74,  222 => 73,  218 => 71,  210 => 69,  207 => 68,  205 => 67,  202 => 66,  196 => 65,  190 => 63,  187 => 62,  179 => 60,  171 => 58,  168 => 57,  165 => 56,  161 => 55,  158 => 54,  155 => 53,  149 => 52,  146 => 51,  141 => 50,  138 => 49,  136 => 48,  133 => 47,  130 => 46,  126 => 44,  118 => 42,  115 => 41,  113 => 40,  110 => 39,  107 => 38,  99 => 36,  91 => 34,  88 => 33,  86 => 32,  81 => 29,  73 => 26,  70 => 25,  68 => 24,  65 => 23,  61 => 21,  53 => 19,  45 => 17,  43 => 16,  40 => 15,  38 => 14,  35 => 13,  32 => 12,  30 => 11,  27 => 10,  25 => 9,  22 => 8,  19 => 1,);
    }
}
