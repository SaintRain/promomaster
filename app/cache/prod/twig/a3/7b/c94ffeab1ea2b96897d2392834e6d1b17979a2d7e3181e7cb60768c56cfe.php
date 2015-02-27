<?php

/* ApplicationSonataUserBundle:Profile:change_email.html.twig */
class __TwigTemplate_a37bc94ffeab1ea2b96897d2392834e6d1b17979a2d7e3181e7cb60768c56cfe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1>Уважаемый ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()), "html", null, true);
        echo "!</h1>
<p>Вы получиле это письмо потому как решили сменить email.</p>
<p>Для подтверждения ваших действий, пройдите по <a href=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : null), "html", null, true);
        echo "\">ссылке</a> </p>
<p>С наилучшими пожеланиями,<br />команда сайта.</p>";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Profile:change_email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 3,  19 => 1,);
    }
}
