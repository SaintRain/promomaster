<?php

/* CoreCommonBundle:Fragments:categoriesInDown.html.twig */
class __TwigTemplate_fbdf14886092da21f39d7f62496a5013223e5928838d45bb671296a3163d0f4f extends Twig_Template
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
        $context["noIndex"] = ((((isset($context["request"]) ? $context["request"] : null) && ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "attributes", array()), "get", array(0 => "_route"), "method") == "core_common_index"))) ? (false) : (true));
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 3
            echo "    ";
            if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                echo "<!--noindex-->";
            }
            echo "    
    <li ";
            // line 4
            echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["category"]);
            echo ">
        <a ";
            // line 5
            if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                echo "rel=\"nofollow\" ";
            }
            echo "href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute($context["category"], "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "captionRu", array()), "html", null, true);
            echo "</a>
    </li>
    ";
            // line 7
            if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                echo "<!--/noindex-->";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:categoriesInDown.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 9,  47 => 7,  36 => 5,  32 => 4,  25 => 3,  21 => 2,  19 => 1,);
    }
}
