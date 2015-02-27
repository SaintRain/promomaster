<?php

/* CoreManufacturerBundle:Admin/List:list_url.html.twig */
class __TwigTemplate_71725a378cf5db251e7cdb999f763f8cd0432b2952e0577cb9f6cf2eedd32143 extends Twig_Template
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
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getTemplate", array(0 => "base_list_field"), "method"));
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
        if (twig_test_empty((isset($context["value"]) ? $context["value"] : null))) {
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
                $context["url_address"] = $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "url", array());
                // line 19
                echo "        ";
            } elseif (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "route", array(), "any", true, true) && !twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "route", array()), "name", array()), array(0 => "edit", 1 => "show")))) {
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
                    $context["parameters"] = twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "route", array()), "identifier_parameter_name", array()) => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "normalizedidentifier", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method")));
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
                    $context["url_address"] = $this->env->getExtension('routing')->getUrl($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "route", array()), "name", array()), (isset($context["parameters"]) ? $context["parameters"] : null));
                    // line 30
                    echo "            ";
                } else {
                    // line 31
                    echo "                ";
                    $context["url_address"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "route", array()), "name", array()), (isset($context["parameters"]) ? $context["parameters"] : null));
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
                $context["url_address"] = (isset($context["value"]) ? $context["value"] : null);
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
                $context["value"] = strtr((isset($context["value"]) ? $context["value"] : null), array("http://" => "", "https://" => ""));
                // line 40
                echo "        ";
            }
            // line 41
            echo "
        ";
            // line 42
            $context["value"] = twig_first($this->env, twig_split_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "?"));
            // line 43
            echo "
        ";
            // line 44
            if ((twig_length_filter($this->env, (isset($context["value"]) ? $context["value"] : null)) > 50)) {
                // line 45
                echo "            ";
                $context["value"] = (twig_slice($this->env, (isset($context["value"]) ? $context["value"] : null), 0, 50) . "...");
                // line 46
                echo "        ";
            }
            // line 47
            echo "
        <a href=\"";
            // line 48
            echo twig_escape_filter($this->env, (isset($context["url_address"]) ? $context["url_address"] : null), "html", null, true);
            echo "\" target=\"_blank\" title=\"Открыть URL в новой вкладке\">";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
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
        return array (  124 => 48,  121 => 47,  118 => 46,  115 => 45,  113 => 44,  110 => 43,  108 => 42,  105 => 41,  102 => 40,  99 => 39,  97 => 38,  94 => 37,  91 => 36,  88 => 35,  86 => 34,  83 => 33,  80 => 32,  77 => 31,  74 => 30,  71 => 29,  69 => 28,  66 => 27,  63 => 26,  60 => 25,  57 => 24,  54 => 22,  51 => 21,  49 => 20,  46 => 19,  43 => 18,  41 => 17,  38 => 16,  34 => 14,  31 => 13,  29 => 12,  26 => 11,);
    }
}
