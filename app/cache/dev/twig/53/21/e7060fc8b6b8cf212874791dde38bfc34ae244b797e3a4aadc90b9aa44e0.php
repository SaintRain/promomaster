<?php

/* CoreTroubleTicketBundle:Admin/List:list_readiness.html.twig */
class __TwigTemplate_5321e7060fc8b6b8cf212874791dde38bfc34ae244b797e3a4aadc90b9aa44e0 extends Twig_Template
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
        echo "    <div class=\"progress progress-info\">
        <div class=\"bar\" style=\"width: ";
        // line 5
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "readiness", array()) . "%"), "html", null, true);
        echo "\">
            <span>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "readiness", array()), "html", null, true);
        echo "&percnt;</span>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/List:list_readiness.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
