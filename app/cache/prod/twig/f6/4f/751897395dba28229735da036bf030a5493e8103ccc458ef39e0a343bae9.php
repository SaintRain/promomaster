<?php

/* CoreCommonBundle:Fragments:deliveryCompaniesInDown.html.twig */
class __TwigTemplate_f64f751897395dba28229735da036bf030a5493e8103ccc458ef39e0a343bae9 extends Twig_Template
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
        if (twig_length_filter($this->env, (isset($context["deliveryCompanies"]) ? $context["deliveryCompanies"] : null))) {
            // line 2
            echo "    ";
            $context["noIndex"] = ((((isset($context["request"]) ? $context["request"] : null) && ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "attributes", array()), "get", array(0 => "_route"), "method") == "core_common_index"))) ? (false) : (true));
            // line 3
            echo "    <ul class=\"footer_delivery\">
        ";
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["deliveryCompanies"]) ? $context["deliveryCompanies"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["company"]) {
                // line 5
                echo "            <li title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["company"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "\" class=\"delivery_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["company"], "name", array()), "html", null, true);
                echo " delivery_icon\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["company"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "</li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['company'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            echo "        ";
            if ((isset($context["article"]) ? $context["article"] : null)) {
                // line 8
                echo "            ";
                if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                    echo "<!--noindex-->";
                }
                // line 9
                echo "            <li class=\"all\">
                <a ";
                // line 10
                if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                    echo "rel=\"nofollow\" ";
                }
                echo "href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("articleSlug" => $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "slug", array()), "categorySlug" => $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "category", array()), "slug", array()))), "html", null, true);
                echo "\">Все способы доставки</a>
            </li>
            ";
                // line 12
                if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                    echo "<!--/noindex-->";
                }
                // line 13
                echo "        ";
            }
            // line 14
            echo "    </ul>
";
        }
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:deliveryCompaniesInDown.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 14,  68 => 13,  64 => 12,  55 => 10,  52 => 9,  47 => 8,  44 => 7,  31 => 5,  27 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
