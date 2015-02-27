<?php

/* CorePropertyBundle:Filter/EditType/Extra:checkbox__sex.html.twig */
class __TwigTemplate_b115988e1b55d2d0c473c4ef082faaad9ce4c14142250eddd57de5b47744f737 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CorePropertyBundle:Filter/EditType:checkbox.html.twig");

        $this->blocks = array(
            'checkbox' => array($this, 'block_checkbox'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CorePropertyBundle:Filter/EditType:checkbox.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_checkbox($context, array $blocks = array())
    {
        // line 12
        echo "
    ";
        // line 13
        $context["formElementClass"] = "hidden";
        // line 14
        echo "
    ";
        // line 15
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "values", array())) {
            // line 16
            echo "
        <div class=\"filter_gender filter_group edit-type-checkbox clearfix\">

            ";
            // line 19
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
                // line 20
                echo "
                <span class=\"filter_gender_tgl filter_gender_tgl_";
                // line 21
                echo twig_escape_filter($this->env, strtr($this->getAttribute($context["value"], "name", array()), " ", "_"), "html", null, true);
                echo " filter-fake-checkbox\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "caption", array()), "html", null, true);
                echo "\">";
                echo ((($this->getAttribute($context["value"], "name", array()) == "boy")) ? ("Мальчик") : ("Девочка"));
                echo "</span>

                ";
                // line 23
                $this->displayBlock("formElement", $context, $blocks);
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
            // line 26
            echo "
            <div class=\"clearfix\"></div>

        </div>

    ";
        }
        // line 32
        echo "
";
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Filter/EditType/Extra:checkbox__sex.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 32,  92 => 26,  75 => 23,  66 => 21,  63 => 20,  46 => 19,  41 => 16,  39 => 15,  36 => 14,  34 => 13,  31 => 12,  28 => 11,);
    }
}
