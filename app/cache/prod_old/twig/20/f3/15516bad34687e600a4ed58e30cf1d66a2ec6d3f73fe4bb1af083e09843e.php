<?php

/* CoreOrderBundle:Admin/Form/Blocks:collection_widget.html.twig */
class __TwigTemplate_20f315516bad34687e600a4ed58e30cf1d66a2ec6d3f73fe4bb1af083e09843e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "    <li class=\"collection-row control-group\">
            ";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
            ";
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 5
            echo "            <div class=\"pull-left\">";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget');
            echo "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "            ";
        if ((array_key_exists("first", $context) && ((isset($context["allow_add"]) ? $context["allow_add"] : $this->getContext($context, "allow_add")) && (isset($context["first"]) ? $context["first"] : $this->getContext($context, "first"))))) {
            // line 8
            echo "                <div class=\"pull-left\">
                    <a title=\"добавить\" href=\"#\" class=\"btn collection-modify-add\"><i class=\"icon-plus\"></i></a>
                </div>
            ";
        }
        // line 12
        echo "            ";
        if ((isset($context["allow_delete"]) ? $context["allow_delete"] : $this->getContext($context, "allow_delete"))) {
            // line 13
            echo "                <div class=\"pull-left\">
                    <a title=\"удалить\" href=\"#\" class=\"btn collection-modify-delete\"><i class=\"icon-remove\"></i></a>
                </div>
            ";
        }
        // line 17
        echo "    </li>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Blocks:collection_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 17,  53 => 13,  50 => 12,  44 => 8,  41 => 7,  32 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
