<?php

/* CoreFileBundle:Admin/List:list_document.html.twig */
class __TwigTemplate_28f49112c63be2a7ea2411e07c55af503525bb1a807a5dfec4254ded5c749f0b extends Twig_Template
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

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["value"]) ? $context["value"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["document"]) {
            // line 14
            echo "        <a class=\"btn btn-small\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["document"])), "html", null, true);
            echo "\" target=\"_blank\" title=\"Скачать '";
            echo twig_escape_filter($this->env, $this->getAttribute($context["document"], "name", array()), "html", null, true);
            echo "'\">
            <span class=\"icon-download\"></span>
            Скачать
        </a>
        <br />
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 20
            echo "        -
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['document'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreFileBundle:Admin/List:list_document.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 22,  53 => 20,  39 => 14,  34 => 13,  31 => 12,  28 => 11,);
    }
}
