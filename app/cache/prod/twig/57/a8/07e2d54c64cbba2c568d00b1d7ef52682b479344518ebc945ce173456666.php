<?php

/* CoreCommonBundle:Fragments:helpArticles.html.twig */
class __TwigTemplate_57a807e2d54c64cbba2c568d00b1d7ef52682b479344518ebc945ce173456666 extends Twig_Template
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
        if (twig_length_filter($this->env, (isset($context["articles"]) ? $context["articles"] : null))) {
            // line 2
            $context["noIndex"] = ((((isset($context["request"]) ? $context["request"] : null) && ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "attributes", array()), "get", array(0 => "_route"), "method") == "core_common_index"))) ? (false) : (true));
            // line 3
            if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                echo "<!--noindex-->";
            }
            // line 4
            echo "<ul class=\"header_help pull-left\">
    ";
            // line 5
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["articles"]) ? $context["articles"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 6
                echo "        ";
                if (($this->getAttribute($context["article"], "slug", array()) == "checkout")) {
                    // line 7
                    echo "            ";
                    $context["captionRu"] = "Как заказать?";
                    // line 8
                    echo "        ";
                } elseif (($this->getAttribute($context["article"], "slug", array()) == "payment-order")) {
                    // line 9
                    echo "            ";
                    $context["captionRu"] = " Оплата";
                    // line 10
                    echo "        ";
                } elseif (($this->getAttribute($context["article"], "slug", array()) == "delivery-types")) {
                    // line 11
                    echo "            ";
                    $context["captionRu"] = "Доставка";
                    // line 12
                    echo "        ";
                } else {
                    // line 13
                    echo "            ";
                    $context["captionRu"] = "";
                    // line 14
                    echo "        ";
                }
                // line 15
                echo "        <li class=\"header_help_links\">
            <a ";
                // line 16
                if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                    echo "rel=\"nofollow\" ";
                }
                echo "href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("articleSlug" => $this->getAttribute($context["article"], "slug", array()), "categorySlug" => $this->getAttribute($this->getAttribute($context["article"], "category", array()), "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["captionRu"]) ? $context["captionRu"] : null), "html", null, true);
                echo "</a>
        </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "</ul>
";
            // line 20
            if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                echo "<!--/noindex-->";
            }
        }
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:helpArticles.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 20,  79 => 19,  64 => 16,  61 => 15,  58 => 14,  55 => 13,  52 => 12,  49 => 11,  46 => 10,  43 => 9,  40 => 8,  37 => 7,  34 => 6,  30 => 5,  27 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
