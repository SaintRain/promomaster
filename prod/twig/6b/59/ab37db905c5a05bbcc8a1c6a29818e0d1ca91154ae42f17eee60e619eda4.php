<?php

/* CorePropertyBundle:Filter/EditType:checkbox.html.twig */
class __TwigTemplate_6b59ab37db905c5a05bbcc8a1c6a29818e0d1ca91154ae42f17eee60e619eda4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'checkbox' => array($this, 'block_checkbox'),
            'rowElement' => array($this, 'block_rowElement'),
            'formElement' => array($this, 'block_formElement'),
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
        $context["countShow"] = 8;
        // line 10
        echo "
";
        // line 11
        $this->displayBlock('checkbox', $context, $blocks);
    }

    public function block_checkbox($context, array $blocks = array())
    {
        // line 12
        echo "
    ";
        // line 13
        $context["formElementClass"] = "";
        // line 14
        echo "
    ";
        // line 15
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "values", array())) {
            // line 16
            echo "
        <div class=\"filter_cats filter_group edit-type-checkbox\">
            <h3>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "caption", array()), "html", null, true);
            echo "</h3>

            ";
            // line 20
            $context["i"] = 0;
            // line 21
            echo "
            ";
            // line 22
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "values", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["id"] => $context["value"]) {
                // line 23
                echo "
                ";
                // line 24
                if (((isset($context["i"]) ? $context["i"] : null) == (isset($context["countShow"]) ? $context["countShow"] : null))) {
                    // line 25
                    echo "
                    <div class=\"hidden asSlide\">

                ";
                }
                // line 29
                echo "
                ";
                // line 30
                $this->displayBlock('rowElement', $context, $blocks);
                // line 50
                echo "
                ";
                // line 51
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 52
                echo "
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "
            ";
            // line 55
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "values", array())) > (isset($context["countShow"]) ? $context["countShow"] : null))) {
                // line 56
                echo "
                </div>
                <!--noindex-->
                <span class=\"text_tgl filter-show-all\">Показать все</span>
                <!--/noindex-->
            ";
            }
            // line 62
            echo "
        </div>

    ";
        }
        // line 66
        echo "
";
    }

    // line 30
    public function block_rowElement($context, array $blocks = array())
    {
        // line 31
        echo "
                    <label for=\"filter_";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\">

                        ";
        // line 34
        $this->displayBlock('formElement', $context, $blocks);
        // line 45
        echo "
                        <span>";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "caption", array()), "html", null, true);
        echo "</span>
                    </label>

                ";
    }

    // line 34
    public function block_formElement($context, array $blocks = array())
    {
        // line 35
        echo "
                            <input
                                type=\"checkbox\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\" class=\"";
        echo twig_escape_filter($this->env, (isset($context["formElementClass"]) ? $context["formElementClass"] : null), "html", null, true);
        echo "\" id=\"filter_";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\"
                                name=\"filter";
        // line 38
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true)) {
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), "html", null, true);
            echo "][";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), "html", null, true);
            echo "]";
        }
        echo "[";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), "html", null, true);
        echo "][]\"
                                ";
        // line 39
        if ((((($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", true, true) && twig_in_filter((isset($context["id"]) ? $context["id"] : null), $this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array"))) || (($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", true, true)) && twig_in_filter((isset($context["id"]) ? $context["id"] : null), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array")))) || ($this->getAttribute(        // line 40
(isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", true, true) && twig_in_filter(((isset($context["id"]) ? $context["id"] : null) . ""), $this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array")))) || (($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", true, true)) && twig_in_filter(((isset($context["id"]) ? $context["id"] : null) . ""), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array"))))) {
            // line 41
            echo "                                    checked=\"checked\"
                                ";
        }
        // line 42
        echo ">

                        ";
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Filter/EditType:checkbox.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 42,  198 => 41,  196 => 40,  195 => 39,  183 => 38,  173 => 37,  169 => 35,  166 => 34,  158 => 46,  155 => 45,  153 => 34,  146 => 32,  143 => 31,  140 => 30,  135 => 66,  129 => 62,  121 => 56,  119 => 55,  116 => 54,  101 => 52,  99 => 51,  96 => 50,  94 => 30,  91 => 29,  85 => 25,  83 => 24,  80 => 23,  63 => 22,  60 => 21,  58 => 20,  53 => 18,  49 => 16,  47 => 15,  44 => 14,  42 => 13,  39 => 12,  33 => 11,  30 => 10,  28 => 9,  25 => 8,  22 => 1,);
    }
}
