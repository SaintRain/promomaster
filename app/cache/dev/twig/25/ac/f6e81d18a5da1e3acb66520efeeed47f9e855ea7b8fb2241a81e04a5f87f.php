<?php

/* CoreManufacturerBundle:Admin/List:list_url.html.twig */
class __TwigTemplate_25acf6e81d18a5da1e3acb66520efeeed47f9e855ea7b8fb2241a81e04a5f87f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 9
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        ob_start();
        // line 13
        echo "    ";
        if (twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
            // line 14
            echo "        -
    ";
        } else {
            // line 16
            echo "        ";
            if ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "url", array(), "any", true, true)) {
                // line 17
                echo "            ";
                // line 18
                echo "            ";
                $context["url_address"] = $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "url", array());
                // line 19
                echo "        ";
            } elseif (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "route", array(), "any", true, true) && !twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "route", array()), "name", array()), array(0 => "edit", 1 => "show")))) {
                // line 20
                echo "            ";
                // line 21
                echo "            ";
                $context["parameters"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "route", array(), "any", false, true), "parameters", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "route", array(), "any", false, true), "parameters", array()), array())) : (array()));
                // line 22
                echo "
            ";
                // line 24
                echo "            ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "route", array(), "any", false, true), "identifier_parameter_name", array(), "any", true, true)) {
                    // line 25
                    echo "                ";
                    $context["parameters"] = twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : $this->getContext($context, "parameters")), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "route", array()), "identifier_parameter_name", array()) => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "normalizedidentifier", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method")));
                    // line 26
                    echo "            ";
                }
                // line 27
                echo "
            ";
                // line 28
                if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "route", array(), "any", false, true), "absolute", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "route", array(), "any", false, true), "absolute", array()), false)) : (false))) {
                    // line 29
                    echo "                ";
                    $context["url_address"] = $this->env->getExtension('routing')->getUrl($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "route", array()), "name", array()), (isset($context["parameters"]) ? $context["parameters"] : $this->getContext($context, "parameters")));
                    // line 30
                    echo "            ";
                } else {
                    // line 31
                    echo "                ";
                    $context["url_address"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "route", array()), "name", array()), (isset($context["parameters"]) ? $context["parameters"] : $this->getContext($context, "parameters")));
                    // line 32
                    echo "            ";
                }
                // line 33
                echo "        ";
            } else {
                // line 34
                echo "            ";
                // line 35
                echo "            ";
                $context["url_address"] = (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"));
                // line 36
                echo "        ";
            }
            // line 37
            echo "
        ";
            // line 38
            if ((($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "hide_protocol", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "hide_protocol", array()), false)) : (false))) {
                // line 39
                echo "            ";
                $context["value"] = strtr((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array("http://" => "", "https://" => ""));
                // line 40
                echo "        ";
            }
            // line 41
            echo "
        ";
            // line 42
            $context["value"] = twig_first($this->env, twig_split_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "?"));
            // line 43
            echo "
        ";
            // line 44
            if ((twig_length_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))) > 50)) {
                // line 45
                echo "            ";
                $context["value"] = (twig_slice($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), 0, 50) . "...");
                // line 46
                echo "        ";
            }
            // line 47
            echo "
        <a href=\"";
            // line 48
            echo twig_escape_filter($this->env, (isset($context["url_address"]) ? $context["url_address"] : $this->getContext($context, "url_address")), "html", null, true);
            echo "\" target=\"_blank\" title=\"Открыть URL в новой вкладке\">";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
            echo "</a>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreManufacturerBundle:Admin/List:list_url.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 48,  122 => 47,  119 => 46,  116 => 45,  114 => 44,  111 => 43,  109 => 42,  106 => 41,  103 => 40,  100 => 39,  98 => 38,  95 => 37,  92 => 36,  89 => 35,  87 => 34,  84 => 33,  81 => 32,  78 => 31,  75 => 30,  72 => 29,  70 => 28,  67 => 27,  64 => 26,  61 => 25,  58 => 24,  55 => 22,  52 => 21,  50 => 20,  47 => 19,  44 => 18,  42 => 17,  39 => 16,  35 => 14,  32 => 13,  30 => 12,  27 => 11,  18 => 9,);
    }
}
