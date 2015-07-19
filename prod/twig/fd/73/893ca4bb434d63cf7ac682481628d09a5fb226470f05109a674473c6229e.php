<?php

/* ApplicationSonataUserBundle:Admin/List:list_contragents_count.html.twig */
class __TwigTemplate_fd73893ca4bb434d63cf7ac682481628d09a5fb226470f05109a674473c6229e extends Twig_Template
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
        echo "    
    ";
        // line 4
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragents", array())) > 1)) {
            // line 5
            echo "        <a class=\"label label-warning\" target=\"blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_commoncontragent_list", array("filter[user__email][value]=" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
            echo "\">Показать (";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "contragents", array())), "html", null, true);
            echo ")</a>
        ";
        } else {
            // line 7
            echo "            <div class=\"label\">Нет</div>
    ";
        }
        // line 9
        echo "    
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/List:list_contragents_count.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 9,  52 => 7,  44 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
