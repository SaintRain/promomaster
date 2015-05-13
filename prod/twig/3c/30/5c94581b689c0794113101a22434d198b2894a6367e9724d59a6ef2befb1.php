<?php

/* CorePropertyBundle:Filter/EditType/Extra:checkbox__skills.html.twig */
class __TwigTemplate_3c305c94581b689c0794113101a22434d198b2894a6367e9724d59a6ef2befb1 extends Twig_Template
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
        <div class=\"filter_skills filter_group edit-type-checkbox\">

            <h3>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "caption", array()), "html", null, true);
            echo "</h3>

            ";
            // line 21
            $context["i"] = 0;
            // line 22
            echo "
            ";
            // line 23
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
                // line 24
                echo "
                ";
                // line 25
                if (((isset($context["i"]) ? $context["i"] : null) == (isset($context["countShow"]) ? $context["countShow"] : null))) {
                    // line 26
                    echo "
                    <div class=\"hidden\">

                ";
                }
                // line 30
                echo "
                ";
                // line 31
                $this->displayBlock('rowElement', $context, $blocks);
                // line 38
                echo "
                ";
                // line 39
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 40
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
            // line 42
            echo "
            ";
            // line 43
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "values", array())) > (isset($context["countShow"]) ? $context["countShow"] : null))) {
                // line 44
                echo "
                </div>
                <div class=\"clear\"></div>
                <!--noindex-->
                <span class=\"text_tgl filter-show-all\">Показать все</span>
                <!--/noindex-->

            ";
            }
            // line 52
            echo "
        </div>

    ";
        }
        // line 56
        echo "
";
    }

    // line 31
    public function block_rowElement($context, array $blocks = array())
    {
        // line 32
        echo "
                    <span class=\"filter_skill_tgl filter-fake-checkbox skill_";
        // line 33
        echo twig_escape_filter($this->env, strtr($this->getAttribute((isset($context["value"]) ? $context["value"] : null), "name", array()), " ", "_"), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "caption", array()), "html", null, true);
        echo "\"><span class=\"skill_icon\">&nbsp;</span></span>

                    ";
        // line 35
        $this->displayBlock("formElement", $context, $blocks);
        echo "

                ";
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Filter/EditType/Extra:checkbox__skills.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 35,  150 => 33,  147 => 32,  144 => 31,  139 => 56,  133 => 52,  123 => 44,  121 => 43,  118 => 42,  103 => 40,  101 => 39,  98 => 38,  96 => 31,  93 => 30,  87 => 26,  85 => 25,  82 => 24,  65 => 23,  62 => 22,  60 => 21,  55 => 19,  50 => 16,  48 => 15,  45 => 14,  43 => 13,  40 => 12,  37 => 11,  11 => 9,);
    }
}
