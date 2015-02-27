<?php

/* CoreCommonBundle:Fragments:brandsInDown.html.twig */
class __TwigTemplate_91af62df43b3195ca0ceb71ac2a3fbf5f24830810b1341139acada72bb45de14 extends Twig_Template
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
        $context["noIndex"] = ((((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")) && ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "attributes", array()), "get", array(0 => "_route"), "method") == "core_common_index"))) ? (false) : (true));
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["brands"]) ? $context["brands"] : $this->getContext($context, "brands")));
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 3
            echo "    ";
            if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
                echo "<!--noindex-->";
            }
            // line 4
            echo "    <li ";
            echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["brand"]);
            echo ">
        <a ";
            // line 5
            if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
                echo "rel=\"nofollow\" ";
            }
            echo "href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute($context["brand"], "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["brand"], "captionRu", array()), "html", null, true);
            echo "</a>
    </li>
    ";
            // line 7
            if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
                echo "<!--/noindex-->";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:brandsInDown.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 7,  35 => 5,  30 => 4,  25 => 3,  21 => 2,  19 => 1,);
    }
}
