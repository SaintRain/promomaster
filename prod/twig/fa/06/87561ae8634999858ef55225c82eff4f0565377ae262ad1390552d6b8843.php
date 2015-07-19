<?php

/* CoreProductBundle:Command:ymlGenerate.html.twig */
class __TwigTemplate_fa0687561ae8634999858ef55225c82eff4f0565377ae262ad1390552d6b8843 extends Twig_Template
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
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo "\">
    <shop>
        <name>Olikids.ru</name>
        <company>ООО \"Olikids\"</company>
        <url>http://www.";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["domain_ru"]) ? $context["domain_ru"] : null), "html", null, true);
        echo "/</url>
        <currencies>
            <currency id=\"RUB\" rate=\"1\"/>
        </currencies>
        <categories>
            ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 13
            echo "                ";
            if (!twig_in_filter($this->getAttribute($context["cat"], "id", array()), (isset($context["root_cat_ids"]) ? $context["root_cat_ids"] : null))) {
                // line 14
                echo "                    <category id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "id", array()), "html", null, true);
                echo "\" ";
                if (($this->getAttribute($context["cat"], "parent", array()) && !twig_in_filter($this->getAttribute($this->getAttribute($context["cat"], "parent", array()), "id", array()), (isset($context["root_cat_ids"]) ? $context["root_cat_ids"] : null)))) {
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
        echo (isset($context["offers"]) ? $context["offers"] : null);
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
