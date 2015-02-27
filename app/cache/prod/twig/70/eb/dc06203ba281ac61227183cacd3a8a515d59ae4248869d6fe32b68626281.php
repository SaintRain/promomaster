<?php

/* CorePropertyBundle:Filter/EditType:input.html.twig */
class __TwigTemplate_70ebdc06203ba281ac61227183cacd3a8a515d59ae4248869d6fe32b68626281 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'input' => array($this, 'block_input'),
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
        $this->displayBlock('input', $context, $blocks);
    }

    public function block_input($context, array $blocks = array())
    {
        // line 10
        echo "
    ";
        // line 11
        $context["formElementClass"] = "";
        // line 12
        echo "
    ";
        // line 13
        if (($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "range", array()) && ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "range", array()), "minVal", array()) != $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "range", array()), "maxVal", array())))) {
            // line 14
            echo "
        <div class=\"filter_price filter_group filter-range-customise\">
            <h3>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "caption", array()), "html", null, true);
            if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "range", array()), "shortCaption", array())) {
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "range", array()), "shortCaption", array()), "html", null, true);
            }
            echo "</h3>
            <div class=\"filter_price_input\">
                ";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("filter.from", array(), "frontend"), "html", null, true);
            echo "&nbsp;<input
                    class=\"text_input filter-range-from mask-integer\" type=\"text\" size=\"5\"
                    name=\"filter";
            // line 20
            if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true)) {
                echo "[";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), "html", null, true);
                echo "][";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), "html", null, true);
                echo "]";
            }
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), "html", null, true);
            echo "][from]\"
                    value=\"";
            // line 21
            ob_start();
            // line 22
            echo "                        ";
            if ($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", false, true), "from", array(), "array", true, true)) {
                // line 23
                echo "                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array"), "from", array(), "array"), "html", null, true);
                echo "
                        ";
            } elseif (($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", false, true), "from", array(), "array", true, true))) {
                // line 25
                echo "                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array"), "from", array(), "array"), "html", null, true);
                echo "
                        ";
            }
            // line 27
            echo "                    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "\">
                ";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("filter.to", array(), "frontend"), "html", null, true);
            echo "&nbsp;<input
                    class=\"text_input filter-range-to mask-integer\" type=\"text\" size=\"5\"
                    name=\"filter";
            // line 30
            if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true)) {
                echo "[";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), "html", null, true);
                echo "][";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), "html", null, true);
                echo "]";
            }
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), "html", null, true);
            echo "][to]\"
                    value=\"";
            // line 31
            ob_start();
            // line 32
            echo "                        ";
            if ($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", false, true), "to", array(), "array", true, true)) {
                // line 33
                echo "                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array"), "to", array(), "array"), "html", null, true);
                echo "
                        ";
            } elseif (($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", false, true), "to", array(), "array", true, true))) {
                // line 35
                echo "                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array"), "to", array(), "array"), "html", null, true);
                echo "
                        ";
            }
            // line 37
            echo "                    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "\">
            </div>

            <div class=\"filter_price_slider\" data-range-min=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "range", array()), "minVal", array()), "html", null, true);
            echo "\"  data-range-max=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "range", array()), "maxVal", array()), "html", null, true);
            echo "\">

                <div class=\"filter_price_slider_signs\">
                    <span class=\"filter_price_slider_sign lowest\"><span class=\"range-text\"></span><span class=\"filter_price_slider_mark\">&nbsp;</span></span>
                    <span class=\"filter_price_slider_sign average\"><span class=\"range-text\"></span><span class=\"filter_price_slider_mark\">&nbsp;</span></span>
                    <span class=\"filter_price_slider_sign highest\"><span class=\"range-text\"></span><span class=\"filter_price_slider_mark\">&nbsp;</span></span>
                </div>

            </div>

            ";
            // line 50
            if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "other", array(), "any", true, true)) {
                // line 51
                echo "                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "other", array()));
                foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                    // line 52
                    echo "
                    <input type=\"hidden\" name=\"filter";
                    // line 53
                    if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true)) {
                        echo "[";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), "html", null, true);
                        echo "][";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), "html", null, true);
                        echo "]";
                    }
                    echo "[";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), "html", null, true);
                    echo "][";
                    echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                    echo "\"/>

                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "            ";
            }
            // line 57
            echo "
        </div>

    ";
        }
        // line 61
        echo "
";
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Filter/EditType:input.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  190 => 61,  184 => 57,  181 => 56,  160 => 53,  157 => 52,  152 => 51,  150 => 50,  135 => 40,  128 => 37,  122 => 35,  116 => 33,  113 => 32,  111 => 31,  99 => 30,  94 => 28,  89 => 27,  83 => 25,  77 => 23,  74 => 22,  72 => 21,  60 => 20,  55 => 18,  46 => 16,  42 => 14,  40 => 13,  37 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
