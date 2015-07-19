<?php

/* CoreCommonBundle:Fragments:brandsInDown.html.twig */
class __TwigTemplate_19521ed9d3c2e56f40c010ea589cf4898981245d150b091973b536648c7caaca extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable((isset($context["brands"]) ? $context["brands"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 3
            echo "    ";
            if (($this->getAttribute($context["loop"], "index", array()) < 16)) {
                // line 4
                echo "    ";
                if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                    echo "<!--noindex-->";
                }
                // line 5
                echo "    <li ";
                echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["brand"]);
                echo ">
        <a ";
                // line 6
                if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                    echo "rel=\"nofollow\" ";
                }
                echo "href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute($context["brand"], "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["brand"], "captionRu", array()), "html", null, true);
                echo "</a>
    </li>
    ";
                // line 8
                if ((isset($context["noIndex"]) ? $context["noIndex"] : null)) {
                    echo "<!--/noindex-->";
                }
                // line 9
                echo "        ";
            }
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
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
        return array (  66 => 9,  62 => 8,  51 => 6,  46 => 5,  41 => 4,  38 => 3,  21 => 2,  19 => 1,);
    }
}
