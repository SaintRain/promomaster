<?php

/* CoreFileBundle:Admin/List:list_image.html.twig */
class __TwigTemplate_063b1ab7208f129a391bd61383d7d52280c24713b8ea0a23857e06dd0de4726a extends Twig_Template
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
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 14
            echo "        <img width=\"64px\" class=\"img-thumbnail\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logo", array()), "preview")), "html", null, true);
            echo "\"/>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 16
            echo "        -
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreFileBundle:Admin/List:list_image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 18,  47 => 16,  39 => 14,  34 => 13,  31 => 12,  28 => 11,);
    }
}
