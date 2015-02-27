<?php

/* CoreCommonBundle:Fragments:howToBecomeAPartner.html.twig */
class __TwigTemplate_ccd5ca2398c344adbb29f04ad8af24f2d3c58899bd30494278019914b7d38d23 extends Twig_Template
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
        if ((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article"))) {
            // line 2
            $context["noIndex"] = ((((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")) && ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "attributes", array()), "get", array(0 => "_route"), "method") == "core_common_index"))) ? (false) : (true));
            // line 3
            echo "    <li>
        <a ";
            // line 4
            if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
                echo "rel=\"nofollow\" ";
            }
            echo "href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("categorySlug" => $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "category", array()), "slug", array()), "articleSlug" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "captionRu", array()), "html", null, true);
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
