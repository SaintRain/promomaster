<?php

/* CoreColorBundle:Admin/List:list_count_hue.html.twig */
class __TwigTemplate_afff8c7d6877fd4428c376aaf0de799d3f15bdeefc9edf1f1be7855b96a47088 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "
    ";
        // line 5
        ob_start();
        // line 6
        echo "
        ";
        // line 7
        $context["p"] = $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "palette", array());
        // line 8
        echo "
        ";
        // line 9
        if (twig_length_filter($this->env, (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")))) {
            // line 10
            echo "
            ";
            // line 11
            $context["tooltip"] = "<div style=\"width: 500px\">";
            // line 12
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 13
                echo "                    ";
                $context["tooltip"] = ((((isset($context["tooltip"]) ? $context["tooltip"] : $this->getContext($context, "tooltip")) . "<div style=\"width:18px;height:18px;float:left;border:solid 1px #ddd;background-color: #") . $this->getAttribute($context["c"], "hex", array())) . "\"></div>");
                // line 14
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "            ";
            $context["tooltip"] = ((isset($context["tooltip"]) ? $context["tooltip"] : $this->getContext($context, "tooltip")) . "</div><div class=\"clearfix\"></div>");
            // line 16
            echo "
            <span
                class=\"icon-eye-open\"
                style=\"cursor: help;\"
                data-toggle=\"popover\"
                title=\"Оттенки\"
                data-html=\"true\"
                data-content=\"";
            // line 23
            echo twig_escape_filter($this->env, (isset($context["tooltip"]) ? $context["tooltip"] : $this->getContext($context, "tooltip")), "html", null, true);
            echo "\"
                onmouseover=\"
                    \$(this).popover('show');
                    \$('.popover').css({width:528});
                \"
                onmouseout=\"\$(this).popover('destroy')\"
            ></span>&nbsp;";
            // line 29
            echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p"))), "html", null, true);
            echo "
        ";
        } else {
            // line 31
            echo "            -
        ";
        }
        // line 33
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 35
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreColorBundle:Admin/List:list_count_hue.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 35,  103 => 33,  99 => 31,  94 => 29,  85 => 23,  76 => 16,  73 => 15,  67 => 14,  64 => 13,  59 => 12,  57 => 11,  54 => 10,  52 => 9,  49 => 8,  47 => 7,  44 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
