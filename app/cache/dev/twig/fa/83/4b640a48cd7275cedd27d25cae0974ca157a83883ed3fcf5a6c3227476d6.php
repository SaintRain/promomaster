<?php

/* CoreSiteBundle:Admin/list_fields/Site:mirrors.html.twig */
class __TwigTemplate_fa834b640a48cd7275cedd27d25cae0974ca157a83883ed3fcf5a6c3227476d6 extends Twig_Template
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
        echo "
    ";
        // line 5
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "mirrors", array())) {
            // line 6
            echo "        ";
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "mirrors", array()), "html", null, true));
            echo "
    ";
        }
        // line 8
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreSiteBundle:Admin/list_fields/Site:mirrors.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 8,  44 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
