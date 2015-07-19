<?php

/* ApplicationSonataUserBundle:Admin/List:list_log_history.html.twig */
class __TwigTemplate_4b15fb7d649333bb64545b6a3d8fb9393bfd084d8616b7ebaec5e5b332c5fcc2 extends Twig_Template
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
        echo "    ";
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logs", array()))) {
            // line 5
            echo "        <div> Дата: ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logs", array()), "last", array()), "loginDateTime", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "</div>
        <div>Способ: ";
            // line 6
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logs", array()), "last", array()), "loginBySocial", array())) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logs", array()), "last", array()), "loginBySocial", array())) : ("Наш сайт")), "html", null, true);
            echo "</div>
        <div>IP: ";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logs", array()), "last", array()), "ip", array()), "html", null, true);
            echo "</div>
        ";
        } else {
            // line 9
            echo "            <div class=\"label\">Записей нет</div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/List:list_log_history.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 9,  51 => 7,  47 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
