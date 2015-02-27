<?php

/* SonataAdminBundle:CRUD:list_trans.html.twig */
class __TwigTemplate_fa52de368cb9977551b0f22dd01e563bc8423e535057878cec31c48beadf956f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        // line 15
        echo "    ";
        if ((!$this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "catalogue", array(), "any", true, true))) {
            // line 16
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["value"]) ? $context["value"] : null)), "html", null, true);
            echo "
    ";
        } else {
            // line 18
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["value"]) ? $context["value"] : null), array(), $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "catalogue", array())), "html", null, true);
            echo "
    ";
        }
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list_trans.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 18,  32 => 16,  29 => 15,  26 => 14,);
    }
}
