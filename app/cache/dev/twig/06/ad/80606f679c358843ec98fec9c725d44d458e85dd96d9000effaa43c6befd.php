<?php

/* CoreCommonBundle:Form/ajax_entity/callbacks:productInPreOrderComposition.html.twig */
class __TwigTemplate_06ad80606f679c358843ec98fec9c725d44d458e85dd96d9000effaa43c6befd extends Twig_Template
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
        // line 4
        echo "<script>
    function productFormatResult";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
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
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</div>\";
        html = html + (result.sku ? \"\" : \"<br/>\") + \"</div>\";

        return html;
    }

    function productFormatSelection";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "(result) {
        if (!result.sku) {
            result.sku = \"\";
        }
        var html = (result.sku ? \"<b>\" + result.sku + \"</b> \" : '') + result.captionRu + ', Цена: <b class=\"money\">' + result.price.toString().replace('.', ',') + ' ";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</b>',
                id = '";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "',
                \$pContent = \$('[id*=\"' + id + '\"]').parent('div'),
                \$product = \$('[id*=\"' + id + '\"]');


        if (typeof result.OOPBQuantityUpdated !== 'undefined') {
            var rDate = result.OOPBQuantityUpdated;

            \$pContent.find('.OOPBQuantityLabel').html(result.OOPBQuantity + ' ' + result.unitOfMeasureShortCaptionRu).show();
            \$pContent.find('.OOPBQuantityUpdatedLabel').html(rDate);

            if (result.OOPBQuantity > 1) {
                \$pContent.find('.OOPBQuantityLabel').addClass('class', 'label-success');
                \$pContent.find('.OOPBQuantityLabel').removeClass('class', 'label-important');
            }
            else {
                \$pContent.find('.OOPBQuantityLabel').removeClass('class', 'label-success');
                \$pContent.find('.OOPBQuantityLabel').addClass('class', 'label-important');
            }
            \$pContent.find('.OOPBQuantityExtraInfoContent').show();
        }
        else {
            \$pContent.find('.OOPBQuantityExtraInfoContent').hide();
        }

        return html;
    }

    function productOnReset";
        // line 54
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "(e) {
        var
                id = '";
        // line 56
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "',
                \$pContent = \$('[id*=\"' + id + '\"]').parent('div');
        \$pContent.find('.OOPBQuantityExtraInfoContent').hide();
        \$pContent.find('.OOPBQuantityLabel').hide();

    }

</script>

";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Form/ajax_entity/callbacks:productInPreOrderComposition.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 56,  86 => 54,  55 => 26,  51 => 25,  44 => 21,  35 => 15,  22 => 5,  19 => 4,);
    }
}
