<?php

/* CoreCommonBundle:Fragments:howToBecomeAPartner.html.twig */
class __TwigTemplate_167f0acb5c244d2d677c4972886e5a210119b1663f5c0e97a44124199e48a889 extends Twig_Template
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
        if ((isset($context["article"]) ? $context["article"] : null)) {
            // line 2
            $context["noIndex"] = ((((isset($context["request"]) ? $context["request"] : null) && ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "attributes", array()), "get", array(0 => "_route"), "method") == "core_common_index"))) ? (false) : (true));
            // line 3
            echo "    <li>
        <a ";
            // line 4
            if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                echo "rel=\"nofollow\" ";
            }
            echo "href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("categorySlug" => $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "category", array()), "slug", array()), "articleSlug" => $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "captionRu", array()), "html", null, true);
            echo "</a>
    </li>
";
        }
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:howToBecomeAPartner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
