<?php

/* CoreDeliveryBundle:Admin/Service:edit.html.twig */
class __TwigTemplate_60ad7c2547c5c78540d9ae4a8ac67d3891b6ad8ec08915cc9a675149a6bf9665 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:edit.html.twig");

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig"));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_javascripts($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script>
        adminRoutes['delivery_bundle_internal_codes'] = '";
        // line 6
        echo $this->env->getExtension('routing')->getPath("admin_core_delivery_service_intenalCodes");
        echo "';
    </script>
    <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coredelivery/js/backend.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "CoreDeliveryBundle:Admin/Service:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 8,  39 => 6,  33 => 4,  30 => 3,  25 => 2,);
    }
}
