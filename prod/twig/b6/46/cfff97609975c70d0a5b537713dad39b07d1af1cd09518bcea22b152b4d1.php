<?php

/* CoreLogisticsBundle:Admin/Bank/list_fields:bick_swift.html.twig */
class __TwigTemplate_b646cfff97609975c70d0a5b537713dad39b07d1af1cd09518bcea22b152b4d1 extends Twig_Template
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
        echo "<b>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "bic", array()), "html", null, true);
        echo "</b><br>
<span class=\"muted\">—</span>
<br>
<b>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "swift", array()), "html", null, true);
        echo "</b>
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Bank/list_fields:bick_swift.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 7,  39 => 4,  36 => 3,  11 => 1,);
    }
}
