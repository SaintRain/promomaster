<?php

/* CoreFaqBundle:Faq:search_form.html.twig */
class __TwigTemplate_b53fcd3d7180cdaff380d565d56aa42303b62f2ce63d2bacc2adea384cded252 extends Twig_Template
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
        // line 15
        echo "<div class=\"help_search";
        echo "\">
    <form action=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("core_faq_search");
        echo "\" method=\"GET\"  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
        <div class=\"help_search_button\">
            <button class=\"common_button\"><span>Найти</span></button>
            ";
        // line 19
        if (array_key_exists("isSearched", $context)) {
            // line 20
            echo "                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("core_faq_homepage");
            echo "\" class=\"btn_off\">Сбросить</a>
            ";
        }
        // line 22
        echo "        </div>
        <div class=\"search_input\">
            ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "searchQuery", array()), 'widget');
        echo "
        </div>
        ";
        // line 31
        echo "    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "CoreFaqBundle:Faq:search_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 31,  43 => 24,  39 => 22,  33 => 20,  31 => 19,  23 => 16,  19 => 15,);
    }
}
