<?php

/* CoreTroubleTicketBundle:Admin/List:list_manager.html.twig */
class __TwigTemplate_528488f4103313a67fa6756892e5a71a487f5ed910f621f5f501ddbfa00bdc21 extends Twig_Template
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

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manager", array())) {
            // line 5
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manager", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manager", array()), "userName", array()), "html", null, true);
            echo "</a>
        ";
        } else {
            // line 7
            echo "            <span class=\"label label-important\">нет</span>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/List:list_manager.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
