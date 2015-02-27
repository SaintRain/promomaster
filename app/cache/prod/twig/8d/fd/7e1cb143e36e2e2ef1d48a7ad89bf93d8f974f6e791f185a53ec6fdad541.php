<?php

/* CoreProductBundle:Admin/list_fields:virtual_categories.html.twig */
class __TwigTemplate_8dfd7e1cb143e36e2e2ef1d48a7ad89bf93d8f974f6e791f185a53ec6fdad541 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");

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
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "virtualCategoryList", array()))) {
            // line 5
            echo "    <ul class=\"unstyled\">
    ";
            // line 6
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "virtualCategoryList", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 7
                echo "        <li>
            <span class=\"label ";
                // line 8
                if ($this->getAttribute($context["cat"], "isEnabled", array())) {
                    echo "label-info";
                } else {
                    echo "label-default";
                }
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "captionRu", array()), "html", null, true);
                echo "<span>
        </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "    </ul>
    ";
        } else {
            // line 13
            echo "        <div class=\"label label-default\">Нет</div>
";
        }
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/list_fields:virtual_categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 13,  58 => 11,  43 => 8,  40 => 7,  36 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
