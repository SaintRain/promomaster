<?php

/* CoreCommonBundle:Fragments:paymentSystemsInDown.html.twig */
class __TwigTemplate_454c630d1ad4721241da918529be07e850dba038021eb7a2836e18b1e9a4f8d7 extends Twig_Template
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
        echo "
";
        // line 2
        if (twig_length_filter($this->env, (isset($context["paymentSytems"]) ? $context["paymentSytems"] : $this->getContext($context, "paymentSytems")))) {
            // line 3
            echo "    ";
            $context["noIndex"] = ((((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")) && ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "attributes", array()), "get", array(0 => "_route"), "method") == "core_common_index"))) ? (false) : (true));
            // line 4
            echo "    <ul class=\"footer_payments\">

        ";
            // line 6
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["paymentSytems"]) ? $context["paymentSytems"] : $this->getContext($context, "paymentSytems")));
            foreach ($context['_seq'] as $context["_key"] => $context["ps"]) {
                // line 7
                echo "
            ";
                // line 8
                if ((($this->getAttribute($context["ps"], "system", array()) != "Robokassa") && $this->getAttribute($context["ps"], "isEnabled", array()))) {
                    // line 9
                    echo "
                <li class=\"payment_";
                    // line 10
                    echo twig_escape_filter($this->env, $this->getAttribute($context["ps"], "system", array()), "html", null, true);
                    echo " payment_icon\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["ps"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["ps"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                    echo "</li>

            ";
                }
                // line 13
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ps'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "
        ";
            // line 16
            if ((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article"))) {
                // line 17
                echo "            ";
                if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
                    echo "<!--noindex-->";
                }
                // line 18
                echo "            <li class=\"all\">
                <a ";
                // line 19
                if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
                    echo "rel=\"nofollow\" ";
                }
                echo "href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("articleSlug" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "slug", array()), "categorySlug" => $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "category", array()), "slug", array()))), "html", null, true);
                echo "\">Все способы оплаты</a>
            </li>
            ";
                // line 21
                if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
                    echo "<!--/noindex-->";
                }
                // line 22
                echo "        ";
            }
            // line 23
            echo "
    </ul>

    <div class=\"clear\"></div>

";
        }
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:paymentSystemsInDown.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 23,  86 => 22,  82 => 21,  73 => 19,  70 => 18,  65 => 17,  63 => 16,  60 => 15,  53 => 13,  43 => 10,  40 => 9,  38 => 8,  35 => 7,  31 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
