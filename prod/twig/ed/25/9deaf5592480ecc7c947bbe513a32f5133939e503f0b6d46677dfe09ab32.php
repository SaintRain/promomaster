<?php

/* CoreSiteBundle:AdPlace/Cabinet:pagination.html.twig */
class __TwigTemplate_ed259deaf5592480ecc7c947bbe513a32f5133939e503f0b6d46677dfe09ab32 extends Twig_Template
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
        // line 2
        echo "
";
        // line 3
        if (((isset($context["pageCount"]) ? $context["pageCount"] : null) > 1)) {
            // line 4
            echo "    ";
            $context["GET"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array());
            // line 5
            echo "    ";
            $context["parameters"] = twig_array_merge(twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"), $this->getAttribute((isset($context["GET"]) ? $context["GET"] : null), "all", array())), array("page" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "page"), "method")));
            // line 6
            echo "<div class=\"text-left\">
    <ul class=\"pagination\">
        ";
            // line 8
            if (array_key_exists("previous", $context)) {
                // line 9
                echo "            <li>
                <a href=\"";
                // line 10
                if ((array_key_exists("routeFirsPage", $context) && ((isset($context["previous"]) ? $context["previous"] : null) == (isset($context["first"]) ? $context["first"] : null)))) {
                    // line 11
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => null))), "html", null, true);
                } else {
                    // line 13
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routePage"]) ? $context["routePage"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => (isset($context["previous"]) ? $context["previous"] : null)))), "html", null, true);
                }
                // line 14
                echo "\">«</a>
            </li>
        ";
            }
            // line 17
            echo "
        ";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagesInRange"]) ? $context["pagesInRange"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 19
                echo "            <li ";
                if (($context["page"] == (isset($context["current"]) ? $context["current"] : null))) {
                    echo " class=\"active\"  ";
                }
                echo ">
                <a href=\"";
                // line 20
                if ((array_key_exists("routeFirsPage", $context) && ($context["page"] == (isset($context["first"]) ? $context["first"] : null)))) {
                    // line 21
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => null))), "html", null, true);
                } else {
                    // line 23
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routePage"]) ? $context["routePage"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => $context["page"]))), "html", null, true);
                }
                // line 24
                echo "\">";
                echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                echo "</a>
            </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "

        ";
            // line 29
            if (array_key_exists("next", $context)) {
                // line 30
                echo "            <li>
                <a href=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routePage"]) ? $context["routePage"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("page" => (isset($context["next"]) ? $context["next"] : null)))), "html", null, true);
                echo "\">»</a>
            </li>
        ";
            }
            // line 34
            echo "    </ul>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "CoreSiteBundle:AdPlace/Cabinet:pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 34,  93 => 31,  90 => 30,  88 => 29,  84 => 27,  74 => 24,  71 => 23,  68 => 21,  66 => 20,  59 => 19,  55 => 18,  52 => 17,  47 => 14,  44 => 13,  41 => 11,  39 => 10,  36 => 9,  34 => 8,  30 => 6,  27 => 5,  24 => 4,  22 => 3,  19 => 2,);
    }
}
