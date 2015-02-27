<?php

/* CorePropertyBundle:Filter/EditType:radio.html.twig */
class __TwigTemplate_d78b471129573a233452feabe38991985a4d09e6c9896c92de4744e69a172a4a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'radio' => array($this, 'block_radio'),
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
        $context["curRoute"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method");
        // line 9
        $context["countShow"] = 8;
        // line 10
        echo "
";
        // line 11
        $this->displayBlock('radio', $context, $blocks);
    }

    public function block_radio($context, array $blocks = array())
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
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "values", array())) {
            // line 16
            echo "
        <div class=\"filter_cats filter_group edit-type-radio\">
            <h3>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "caption", array()), "html", null, true);
            echo "</h3>

            ";
            // line 20
            $context["i"] = 0;
            // line 21
            echo "
            ";
            // line 22
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "values", array()));
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
                if (((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) == (isset($context["countShow"]) ? $context["countShow"] : $this->getContext($context, "countShow")))) {
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
                // line 54
                echo "
                ";
                // line 55
                $context["i"] = ((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) + 1);
                // line 56
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
            // line 58
            echo "
            ";
            // line 59
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "values", array())) > (isset($context["countShow"]) ? $context["countShow"] : $this->getContext($context, "countShow")))) {
                // line 60
                echo "
                </div>
                <!--noindex-->
                <span class=\"text_tgl filter-show-all\">Показать все</span>
                <!--/noindex-->
            ";
            }
            // line 66
            echo "
        </div>

    ";
        }
        // line 70
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "name", array()), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\">

                        ";
        // line 34
        $this->displayBlock('formElement', $context, $blocks);
        // line 49
        echo "
                        <span>";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "caption", array()), "html", null, true);
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
                                type=\"radio\" id=\"filter_";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "name", array()), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\"
                                name=\"filter";
        // line 38
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true)) {
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "is", array()), "html", null, true);
            echo "][";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "type", array()), "html", null, true);
            echo "]";
        }
        echo "[";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "name", array()), "html", null, true);
        echo "]\"
                                ";
        // line 39
        if ((($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "name", array()), array(), "array", true, true) && ($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : $this->getContext($context, "filterRequest")), $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "name", array()), array(), "array") == (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")))) || (($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "is", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "type", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "name", array()), array(), "array", true, true)) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : $this->getContext($context, "filterRequest")), $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "is", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "type", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : $this->getContext($context, "this")), "name", array()), array(), "array") == (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")))))) {
            // line 40
            echo "                                    checked=\"checked\"
                                    class=\"";
            // line 41
            echo twig_escape_filter($this->env, (isset($context["formElementClass"]) ? $context["formElementClass"] : $this->getContext($context, "formElementClass")), "html", null, true);
            echo " active\"
                                ";
        } else {
            // line 43
            echo "                                    class=\"";
            echo twig_escape_filter($this->env, (isset($context["formElementClass"]) ? $context["formElementClass"] : $this->getContext($context, "formElementClass")), "html", null, true);
            echo "\"
                                ";
        }
        // line 45
        echo "
                                >

                        ";
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Filter/EditType:radio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 45,  202 => 43,  197 => 41,  194 => 40,  192 => 39,  180 => 38,  172 => 37,  168 => 35,  165 => 34,  157 => 50,  154 => 49,  152 => 34,  145 => 32,  142 => 31,  139 => 30,  134 => 70,  128 => 66,  120 => 60,  118 => 59,  115 => 58,  100 => 56,  98 => 55,  95 => 54,  93 => 30,  90 => 29,  84 => 25,  82 => 24,  79 => 23,  62 => 22,  59 => 21,  57 => 20,  52 => 18,  48 => 16,  46 => 15,  43 => 14,  41 => 13,  38 => 12,  32 => 11,  29 => 10,  27 => 9,  25 => 8,  22 => 1,);
    }
}
