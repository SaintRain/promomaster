<?php

/* ApplicationSonataUserBundle:Admin/List:list_contragents_count.html.twig */
class __TwigTemplate_21dc4183402f0d15c7bdb968282a7ec6f1c17031b6b162e3bb81a91c002bb592 extends Twig_Template
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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "    
    ";
        // line 4
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragents", array())) > 1)) {
            // line 5
            echo "        <a class=\"label label-warning\" target=\"blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_commoncontragent_list", array("filter[user__email][value]=" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))), "html", null, true);
            echo "\">Показать (";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragents", array())), "html", null, true);
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
        return array (  48 => 9,  44 => 7,  36 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
