<?php

/* CoreTroubleTicketBundle:Admin/Message:edit.html.twig */
class __TwigTemplate_6ba51073c394056036090de1516e8edda8ffe6dbda3f4974c7947ad4c7ab2dd4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        return array (  50 => 5,  47 => 4,  40 => 3,  37 => 2,  11 => 1,);
    }
}
