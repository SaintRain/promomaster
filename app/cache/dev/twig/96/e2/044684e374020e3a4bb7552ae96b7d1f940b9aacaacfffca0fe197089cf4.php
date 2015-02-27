<?php

/* CoreProductBundle:Admin/list_fields:virtual_categories.html.twig */
class __TwigTemplate_96e2044684e374020e3a4bb7552ae96b7d1f940b9aacaacfffca0fe197089cf4 extends Twig_Template
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
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "virtualCategoryList", array()))) {
            // line 5
            echo "    <ul class=\"unstyled\">
    ";
            // line 6
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "virtualCategoryList", array()));
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
        return array (  70 => 13,  66 => 11,  51 => 8,  48 => 7,  44 => 6,  41 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
