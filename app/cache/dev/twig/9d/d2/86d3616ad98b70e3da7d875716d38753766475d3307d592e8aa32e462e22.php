<?php

/* CoreCommonBundle:Form/ajax_entity/callbacks:productInOrder.html.twig */
class __TwigTemplate_9dd286d3616ad98b70e3da7d875716d38753766475d3307d592e8aa32e462e22 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "(result) {
        var html = \"<div class=\\\"media\\\">\",
                id = \"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\";
        if (!result.images) {
            result.images = \"/bundles/coreproduct/Admin/img/no_image.png\";
        }
        if (!result.sku) {
            result.sku = \"\";
        }

        html = html + '<div class=\"pull-left\"><img class=\"media-object\" width=\"60px\" src=\"' + result.images + '\"/></div>';
        html = html + \"<div class=\\\"media-body\\\">\" + (result.sku ? \"<b>\" + result.sku + \"</b><br/>\" : \"\") + result.captionRu + \"<br>Цена: \" + result.price.toString().replace('.', ',') + \" ";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</div>\";
        html = html + (result.sku ? \"\" : \"<br/>\") + \"</div>\";

        return html;
    }


    function productFormatSelection";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "(result) {
        if (!result.sku) {
            result.sku = \"\";
        }
        var html = \"<b>\" + result.sku + \"</b> \" + result.captionRu,
                id = \"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\";

        //проставляем цену
        var price = result.price + '';
        if (price.indexOf(\".\") === -1) {
            price = result.price + '.00';
        }

        //\$price = \$('#' + id).closest('tr').find('input[id \$= \"price\"]');
        \$price = \$('#' + id.replace(/_product/, '_price'));
        \$product = \$('[id*=\"' + id + '\"]');

        if (!\$price.val()) {    //если цена была проставлена раньше, то ничего не делаем
            \$price.val(price.replace('.', ','));
        }

        \$supplier = \$('#' + id.replace(/_product/, '_defaultSupplier'));
        if (!\$supplier.val() && result.supplierId) {
            \$supplier.select2('val',result.supplierId)
        }

        //прорисовываем иконку
        ";
        // line 48
        echo "                ";
        // line 49
        echo "                ";
        // line 50
        echo "                ";
        // line 51
        echo "
        ";
        // line 53
        echo "        ";
        // line 54
        echo "
        return html;
    }

    function productOnReset";
        // line 58
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "(e) {
        ";
        // line 60
        echo "                ";
        // line 61
        echo "                ";
        // line 62
        echo "        ";
        // line 63
        echo "    }

</script>
";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Form/ajax_entity/callbacks:productInOrder.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 63,  107 => 62,  105 => 61,  103 => 60,  99 => 58,  93 => 54,  91 => 53,  88 => 51,  86 => 50,  84 => 49,  82 => 48,  57 => 25,  49 => 20,  39 => 13,  27 => 4,  22 => 2,  19 => 1,);
    }
}
