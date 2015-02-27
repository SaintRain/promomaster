<?php

/* CoreOrderBundle:Admin/Form/Order/list_fields:contragent.html.twig */
class __TwigTemplate_6de75b4ff880bc783abd30bb659d69939ca8702649786cbacf2cebb5b399c20e extends Twig_Template
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
        return array (  80 => 12,  77 => 11,  72 => 10,  68 => 9,  55 => 7,  47 => 6,  44 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
