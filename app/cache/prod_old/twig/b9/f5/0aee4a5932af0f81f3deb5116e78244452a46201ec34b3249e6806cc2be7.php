<?php

/* CoreTroubleTicketBundle:Admin/Message:edit.html.twig */
class __TwigTemplate_b9f50aee4a5932af0f81f3deb5116e78244452a46201ec34b3249e6806cc2be7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");

        $this->blocks = array(
            'right_side' => array($this, 'block_right_side'),
            'form' => array($this, 'block_form'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:base_edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_right_side($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayBlock('form', $context, $blocks);
    }

    public function block_form($context, array $blocks = array())
    {
        // line 4
        echo "        ";
        $this->env->loadTemplate("CoreTroubleTicketBundle:Admin:Form/message_form.html.twig")->display($context);
        // line 5
        echo "    ";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/Message:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 5,  39 => 4,  32 => 3,  29 => 2,);
    }
}
