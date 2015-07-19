<?php

/* CoreFaqBundle:Admin/List:list_rating.html.twig */
class __TwigTemplate_1210d9538462c01e87eab68d7aba5d11ff7d584dbdfe37b9c8196126062468c3 extends Twig_Template
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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"centered\">
        <div class=\"inline-center\">
            <i title=\"Помогло\" class=\"icon-thumbs-up\"></i>
            <span title=\"Помогло\">";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "goodRate", array()), "html", null, true);
        echo "</span>
        </div>
        <div class=\"inline-center\">
            <i title=\"Не помогло\" class=\"icon-thumbs-down\"></i>
            <span title=\"Не помогло\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "badRate", array()), "html", null, true);
        echo "</span>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreFaqBundle:Admin/List:list_rating.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 10,  44 => 6,  39 => 3,  36 => 2,  11 => 1,);
    }
}
