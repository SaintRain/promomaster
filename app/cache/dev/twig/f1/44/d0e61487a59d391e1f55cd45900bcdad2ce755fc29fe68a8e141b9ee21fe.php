<?php

/* CoreCommonBundle:Fragments/simple:footer.html.twig */
class __TwigTemplate_f144d0e61487a59d391e1f55cd45900bcdad2ce755fc29fe68a8e141b9ee21fe extends Twig_Template
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
        // line 2
        echo "<footer id=\"footer\" class=\"error_page_footer\">
    <div class=\"footer_container\">
        <div class=\"footer_copyright\">© ";
        // line 4
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
        echo " Olikids. <!--noindex--><a rel=\"nofollow\" href=\"";
        echo $this->env->getExtension('routing')->getPath("core_common_privacy_policies");
        echo "\">Политика конфиденциальности</a><!--/noindex--></div>
    </div>
</footer>";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments/simple:footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 4,  19 => 2,);
    }
}
