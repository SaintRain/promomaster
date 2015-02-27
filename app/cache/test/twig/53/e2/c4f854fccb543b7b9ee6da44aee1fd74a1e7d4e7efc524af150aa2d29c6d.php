<?php

/* CoreOrderBundle:Admin/Form/Order/list_fields:contragent.html.twig */
class __TwigTemplate_53e2c4f854fccb543b7b9ee6da44aee1fd74a1e7d4e7efc524af150aa2d29c6d extends Twig_Template
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
        $context["cont"] = $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragent", array());
        // line 5
        echo "
<small class=\"muted\"><b>";
        // line 6
        if ($this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "kpp", array(), "any", true, true)) {
            echo "Юр.";
        } else {
            echo "Физ.";
        }
        echo "</b></small>&nbsp;
<strong style=\"font-size:14px;\" title=\"Клиент уже сделал N заказов\">";
        // line 7
        if ($this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "kpp", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")), "organization", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")), "lastName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")), "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")), "surName", array()), "html", null, true);
        }
        echo "</strong>
&nbsp;
<a target=\"_blank\" title=\"Посмотреть контрагента\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_commoncontragent_edit", array("id" => $this->getAttribute((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")), "id", array()))), "html", null, true);
        echo "\"></a>
";
        // line 10
        if ($this->getAttribute((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")), "phone1", array())) {
            echo "<br><small class=\"muted\">Тел.</small>&nbsp;";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")), "phone1", array()), "html", null, true);
        }
        // line 11
        echo "<br>
<a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_commoncontragent_edit", array("id" => $this->getAttribute((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")), "id", array()))), "html", null, true);
        echo "\" target=\"_blank\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")), "user", array()), "email", array()), "html", null, true);
        echo "</a>

";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order/list_fields:contragent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 12,  69 => 11,  64 => 10,  60 => 9,  47 => 7,  39 => 6,  36 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
