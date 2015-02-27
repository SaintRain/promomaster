<?php

/* CoreDiscountsBundle:Admin/ContragentManufacturerDiscount/list_td:manufacturers.html.twig */
class __TwigTemplate_f60fbb1138d7c64b4d476f0dbd60fd290d6c0f763e7d6ec55165e017d857b730 extends Twig_Template
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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manufacturers", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 4
            echo "        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_manufacturer_manufacturer_edit", array("id" => $this->getAttribute($context["b"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["b"], "captionRu", array()), "html", null, true);
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "CoreDiscountsBundle:Admin/ContragentManufacturerDiscount/list_td:manufacturers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 4,  31 => 3,  28 => 2,);
    }
}
