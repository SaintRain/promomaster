<?php

/* CoreProductBundle:Command:ymlGenerate.html.twig */
class __TwigTemplate_7477906712f6afefbe600385d4e77ed637cf6df7f6fc6d7744b223f735cedef1 extends Twig_Template
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
        ob_start();
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<!DOCTYPE yml_catalog SYSTEM \"shops.dtd\">
<yml_catalog date=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
        echo "\">
    <shop>
        <name>Olikids.ru</name>
        <company>ООО \"Olikids\"</company>
        <url>http://www.";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["domain_ru"]) ? $context["domain_ru"] : $this->getContext($context, "domain_ru")), "html", null, true);
        echo "/</url>
        <currencies>
            <currency id=\"RUB\" rate=\"1\"/>
        </currencies>
        <categories>
            ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : $this->getContext($context, "categories")));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 13
            echo "                ";
            if (!twig_in_filter($this->getAttribute($context["cat"], "id", array()), (isset($context["root_cat_ids"]) ? $context["root_cat_ids"] : $this->getContext($context, "root_cat_ids")))) {
                // line 14
                echo "                    <category id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "id", array()), "html", null, true);
                echo "\" ";
                if (($this->getAttribute($context["cat"], "parent", array()) && !twig_in_filter($this->getAttribute($this->getAttribute($context["cat"], "parent", array()), "id", array()), (isset($context["root_cat_ids"]) ? $context["root_cat_ids"] : $this->getContext($context, "root_cat_ids"))))) {
                    echo "parentId=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["cat"], "parent", array()), "id", array()), "html", null, true);
                    echo "\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "captionRu", array()), "html", null, true);
                echo "</category>
                    ";
            }
            // line 16
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "        </categories>
        <local_delivery_cost>300</local_delivery_cost>
        <offers>
            ";
        // line 20
        echo (isset($context["offers"]) ? $context["offers"] : $this->getContext($context, "offers"));
        echo "
        </offers>
    </shop>
</yml_catalog>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Command:ymlGenerate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 20,  66 => 17,  60 => 16,  46 => 14,  43 => 13,  39 => 12,  31 => 7,  24 => 3,  19 => 1,);
    }
}
