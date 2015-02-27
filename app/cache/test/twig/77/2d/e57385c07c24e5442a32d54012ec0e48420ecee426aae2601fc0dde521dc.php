<?php

/* CoreOrderBundle:Admin/Form/Order/list_fields:deliveryMethod.html.twig */
class __TwigTemplate_772de57385c07c24e5442a32d54012ec0e48420ecee426aae2601fc0dde521dc extends Twig_Template
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
        echo "
    ";
        // line 4
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryMethod", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryMethod", array()), "captionRu", array()), "html", null, true);
            echo "<br/>
    <span class=\"money\">";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryCost", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span>
    <br/><small class=\"muted\">";
            // line 6
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "deliveryCity", array(), "any", false, true), "name", array(), "any", true, true) || $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryAddress", array()))) {
                if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "deliveryCity", array(), "any", false, true), "name", array(), "any", true, true)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryCity", array()), "name", array()), "html", null, true);
                    echo ", ";
                }
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryAddress", array()), "html", null, true);
            }
            echo "</small>
    ";
        }
        // line 8
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order/list_fields:deliveryMethod.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 8,  45 => 6,  39 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
