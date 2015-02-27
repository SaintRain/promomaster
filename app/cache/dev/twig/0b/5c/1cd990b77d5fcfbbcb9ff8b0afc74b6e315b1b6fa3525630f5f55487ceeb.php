<?php

/* CoreAdCompanyBundle:Admin/list_fields/AdCompany:user.html.twig */
class __TwigTemplate_0b5c1cd990b77d5fcfbbcb9ff8b0afc74b6e315b1b6fa3525630f5f55487ceeb extends Twig_Template
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
        if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array()), "email", array())) {
            // line 6
            echo "        <a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array()), "id", array()))), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array()), "email", array()), "html", null, true);
            echo "</a>
    ";
        }
        // line 8
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreAdCompanyBundle:Admin/list_fields/AdCompany:user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 8,  44 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
