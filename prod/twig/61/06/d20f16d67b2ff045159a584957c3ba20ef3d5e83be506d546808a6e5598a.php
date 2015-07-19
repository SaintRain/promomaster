<?php

/* SonataAdminBundle:CRUD:list_string.html.twig */
class __TwigTemplate_6106d20f16d67b2ff045159a584957c3ba20ef3d5e83be506d546808a6e5598a extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        // line 12
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list_string.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  9 => 12,);
    }
}
