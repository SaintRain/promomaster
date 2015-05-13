<?php

/* CorePropertyBundle:Filter/EditType/Extra:checkbox__age.html.twig */
class __TwigTemplate_bbe87a1a2002732f43dd630514353f21cb942adcf1c03b08fa851e5ca74e46d9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("CorePropertyBundle:Filter/EditType:checkbox.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

            throw $e;
        }

        $this->blocks = array(
            'checkbox' => array($this, 'block_checkbox'),
            'rowElement' => array($this, 'block_rowElement'),
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
        <div class=\"filter_age filter_group edit-type-checkbox\">
            <h3>&nbsp;Возраст ребенка</h3>

            ";
            // line 20
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
                // line 21
                echo "
                ";
                // line 22
                $this->displayBlock('rowElement', $context, $blocks);
                // line 37
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
            // line 39
            echo "
        </div>

    ";
        }
        // line 43
        echo "
";
    }

    // line 22
    public function block_rowElement($context, array $blocks = array())
    {
        // line 23
        echo "
                    ";
        // line 24
        $context["age"] = $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "caption", array());
        // line 25
        echo "
                    ";
        // line 26
        if ((twig_slice($this->env, (isset($context["age"]) ? $context["age"] : null),  -1) == 1)) {
            // line 27
            echo "                        ";
            $context["ageString"] = array(0 => "год", 1 => "года", 2 => "лет");
            // line 28
            echo "                    ";
        } else {
            // line 29
            echo "                        ";
            $context["ageString"] = array(0 => "года", 1 => "года", 2 => "лет");
            // line 30
            echo "                    ";
        }
        // line 31
        echo "
                    <span class=\"filter_age_tgl filter-fake-checkbox\" title=\"Возраст ";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "caption", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction(twig_slice($this->env, (isset($context["age"]) ? $context["age"] : null),  -1), (isset($context["ageString"]) ? $context["ageString"] : null)), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "caption", array()), "html", null, true);
        echo "</span>

                    ";
        // line 34
        $this->displayBlock("formElement", $context, $blocks);
        echo "

                ";
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Filter/EditType/Extra:checkbox__age.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 34,  132 => 32,  129 => 31,  126 => 30,  123 => 29,  120 => 28,  117 => 27,  115 => 26,  112 => 25,  110 => 24,  107 => 23,  104 => 22,  99 => 43,  93 => 39,  78 => 37,  76 => 22,  73 => 21,  56 => 20,  50 => 16,  48 => 15,  45 => 14,  43 => 13,  40 => 12,  37 => 11,  11 => 9,);
    }
}
