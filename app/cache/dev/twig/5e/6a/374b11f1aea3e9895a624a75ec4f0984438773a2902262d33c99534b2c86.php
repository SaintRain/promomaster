<?php

/* CoreReviewBundle:Form:star_rating_widget.html.twig */
class __TwigTemplate_5e6a374b11f1aea3e9895a624a75ec4f0984438773a2902262d33c99534b2c86 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'star_rating_widget' => array($this, 'block_star_rating_widget'),
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
        $this->displayBlock('star_rating_widget', $context, $blocks);
    }

    public function block_star_rating_widget($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 13
            echo "
            ";
            // line 14
            if (($this->getAttribute($this->getAttribute($context["child"], "vars", array(), "any", false, true), "value", array(), "any", true, true) && $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "value", array()))) {
                // line 15
                echo "
                <input type=\"radio\" ";
                // line 16
                $this->displayBlock("widget_attributes", $context, $blocks);
                if ($this->getAttribute($this->getAttribute($context["child"], "vars", array(), "any", false, true), "value", array(), "any", true, true)) {
                    echo " value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "value", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "value", array()), "html", null, true);
                    echo "\"";
                }
                echo " ";
                if ($this->getAttribute($this->getAttribute($context["child"], "vars", array()), "checked", array())) {
                    echo "checked=\"checked\"";
                }
                echo "/>

            ";
            }
            // line 19
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Form:star_rating_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  95 => 21,  80 => 19,  63 => 16,  60 => 15,  58 => 14,  55 => 13,  38 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
