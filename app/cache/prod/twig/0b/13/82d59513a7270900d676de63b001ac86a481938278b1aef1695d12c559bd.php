<?php

/* CoreCommonBundle:Form/ajax_entity/callbacks:product.html.twig */
class __TwigTemplate_0b1382d59513a7270900d676de63b001ac86a481938278b1aef1695d12c559bd extends Twig_Template
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
        // line 2
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "(result) {
        var html = \"<div class=\\\"media\\\">\";
        if (!result.images) {
            result.images = \"/bundles/coreproduct/Admin/img/no_image.png\";
        }
        if (!result.sku) {
            result.sku = \"\";
        }

        html = html + '<div class=\"pull-left\"><img class=\"media-object\" width=\"60px\" src=\"' + result.images + '\"/></div>';
        html = html + \"<div class=\\\"media-body\\\">\" + (result.sku ? \"<b>\" + result.sku + \"</b><br/>\" : \"\") + result.captionRu + \"<br>Цена: \" + result.price.toString().replace('.', ',') + \" ";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</div>\";
        html = html + (result.sku ? \"\" : \"<br/>\") + \"</div>\";

        return html;
    }

    function productFormatSelection";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "(result) {
        if (!result.sku) {
            result.sku = \"\";
        }
        var html = (result.sku ? \"<b>\" + result.sku + \"</b> \" : '') + result.captionRu + ', Цена: <b class=\"money\">' + result.price.toString().replace('.', ',') + ' ";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</b>';
        return html;
    }

</script>

";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Form/ajax_entity/callbacks:product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 22,  44 => 18,  35 => 12,  22 => 2,  19 => 1,);
    }
}
