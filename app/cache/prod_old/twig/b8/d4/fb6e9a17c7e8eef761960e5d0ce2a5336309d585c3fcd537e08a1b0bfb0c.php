<?php

/* ApplicationSonataUserBundle:Profile:change_email.html.twig */
class __TwigTemplate_b8d4fb6e9a17c7e8eef761960e5d0ce2a5336309d585c3fcd537e08a1b0bfb0c extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email", array()), "html", null, true);
        echo "!</h1>
<p>Вы получиле это письмо потому как решили сменить email.</p>
<p>Для подтверждения ваших действий, пройдите по <a href=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
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
