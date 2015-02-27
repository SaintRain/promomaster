<?php

/* CoreReviewBundle:Admin/List:list_rating.html.twig */
class __TwigTemplate_cafd0e8e892094228cec1dd6153a0ecc0222d6989fed5ab36796ae1045b3a4d8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

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

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    ";
        // line 13
        if ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))) {
            // line 14
            echo "
        <span title=\"";
            // line 15
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
            echo "\" style=\"white-space: nowrap;\">

            ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 18
                echo "
                <span class=\"icon-star\"></span>

            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "
        </span>

    ";
        }
        // line 26
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Admin/List:list_rating.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 26,  65 => 22,  56 => 18,  52 => 17,  47 => 15,  44 => 14,  42 => 13,  39 => 12,  36 => 11,  11 => 9,);
    }
}
