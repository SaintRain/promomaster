<?php

/* CoreCommonBundle:Form/ajax_entity/callbacks:frontend.product.html.twig */
class __TwigTemplate_d856009ae7ab578fcb5d565ce8423d20584ccdeb9e39fce82f6a5e28c3ee0b7f extends Twig_Template
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
        echo "<script>

    function productFormatResult";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "(result) {
        var html = \"<a onclick=\\\"select2searchOnClick(this)\\\" href=\\\"\" + '";
        // line 4
        echo $this->env->getExtension('routing')->getPath("core_product", array("slug" => "~slug~"));
        echo "'.replace(/~slug~/g, result.slug) + \"\\\" class=\\\"search-row\\\">\";
        if (!result.images) {
            result.images = \"/images/no-image.jpg\";
        }

        html = html + '<div class=\"pull-left\"><img class=\"search-image\" src=\"' + result.images + '\"/></div>';
        html = html + \"<div class=\\\"search-text\\\">\" + result.captionRu + (result.sku ? \"<br/>SKU: \" + result.sku : '') + \"<br><span class=\\\"search-price\\\">Цена: \" + number_format(result.price.toString()) + \" ";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span></div>\";
        html = html + \"</a>\";

        return html;
    }

    function productFormatSelection";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "(result) {
        var html = result.captionRu + (result.sku ? \" (SKU: \" + result.sku + \"\" + ')' : '') +', Цена: ' + number_format(result.price.toString()) + ' ";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "';

        return html;
    }

</script>

";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Form/ajax_entity/callbacks:frontend.product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 17,  45 => 16,  36 => 10,  27 => 4,  23 => 3,  19 => 1,);
    }
}
