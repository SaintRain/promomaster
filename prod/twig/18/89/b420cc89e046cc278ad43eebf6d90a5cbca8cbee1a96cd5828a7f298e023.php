<?php

/* CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:mrc.html.twig */
class __TwigTemplate_1889b420cc89e046cc278ad43eebf6d90a5cbca8cbee1a96cd5828a7f298e023 extends Twig_Template
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
        // line 2
        echo "<div class=\"tab-pane \" id=\"";
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 3), "html", null, true);
        echo "\">
    <fieldset>
        <div class=\"sonata-ba-collapsed-fields\">
            <p>Минимальная рекомендованная цена</p>
            <p>
                <input type=\"button\" class=\"btn updateProductMrcButton\" value=\"Обновить МРЦ для выбранных товаров\">&nbsp;
                <input  type=\"button\" class=\"btn disabledMrcProductButton\"
                        value=\"Отключить от публикации выбранные товары\">
                &nbsp;
                <input style=\"display:none\" type=\"button\" class=\"btn enableMrcProductButton\" value=\"Включить на публикацию\">
            </p>
            <h3>Фильтры</h3>
            <label style=\"float: left\"><input checked type=\"radio\" name=\"mrcFilter\" value=\"mrcAllProducts\" >&nbsp;Все товары <span id=\"mrcAllProductsQuantity\"></span></label>
            <label style=\"float: left\">&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"mrcFilter\" value=\"mrcPriceHike\" type=\"radio\" >&nbsp;Подорожавшие <span id=\"mrcPriceHikeQuantity\"></span></label>
            <label style=\"float: left\">&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"mrcFilter\" value=\"mrcDepreciation\" type=\"radio\" >&nbsp;Подешевевшие <span id=\"mrcDepreciationQuantity\"></span></label>
            <label style=\"float: left\">&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"mrcFilter\" value=\"mrcNothing\" type=\"radio\" >&nbsp;Без изменения <span id=\"mrcNothingQuantity\"></span></label>
            <label>&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"mrcFilter\" value=\"mrcDisabledInBaseandHasInPrice\" type=\"radio\" >&nbsp;Сняты с публикации или производства <span id=\"mrcDisabledInBaseandHasInPriceQuantity\"></span></label>


            <br>
            <table class=\"table table-bordered table-hover\" style=\"width:100%\">
                <thead>
                    <tr>
                        <th style=\"width: 50px\">№</th>
                        <th style=\"width:30%\">Название товара</th>
                        <th>Закупочная цена<br/><span style=\"font-size:10px\">На момент загрузки прайса</span></th>
                        <th>Закупочная в прайсе</th>
                        <th>Изменение закупочной цены</th>
                        <th>МРЦ в базе<br/><span style=\"font-size:10px\">На момент загрузки прайса</span></th>
                        <th>МРЦ в прайсе</th>
                        <th>Изменение цены</th>
                        <th style=\"width:15px\"><input title=\"Выбрать все\" name=\"setMrcPriceAll\"
                                                      type=\"checkbox\" value=\"1\"></th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "analysisMRC", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 39
            echo "                        <tr class=\"priceMrcTr ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "extra", array()), "flag", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "extra", array()), "flag2", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute($this->getAttribute($context["d"], "extra", array(), "any", false, true), "difCurrency", array(), "any", true, true)) {
                echo "error";
            }
            echo "\">
                            <td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</td>
                            <td nowrap>
                                <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "article", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "sku", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "captionRu", array()), "html", null, true);
            echo "</a>
                                <span class=\"money\">";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "product", array()), "price", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span>                            
                            </td>
                            <td>    
                                <span class=\"money\">";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "ph", array()), $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()), array(), "array"), "orderOnlyPriceBuying", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "ph", array()), $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()), array(), "array"), "OOPBCurrency", array()), "symbol", array()), "html", null, true);
            echo "</span>
                                ";
            // line 47
            if ($this->getAttribute($this->getAttribute($context["d"], "extra", array(), "any", false, true), "difCurrency", array(), "any", true, true)) {
                // line 48
                echo "                                    <span class=\"label label-important\">валюта отличается в прайсе</span>
                                ";
            }
            // line 50
            echo "                            </td>
                            <td>
                                <span class=\"money\">";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "priceData", array()), "orderOnlyPriceBuying", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["d"], "product", array()), "OOPBCurrency", array()), "symbol", array()), "html", null, true);
            echo "</span>
                            </td>
                            <td nowrap>
                                     <span class=\"money\">";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "orderOnlyPriceBuyingChange", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span>
                                ( ";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "extra", array()), "orderOnlyPriceBuyingChangeInPercent", array()), "html", null, true);
            echo "
                                    %) ";
            // line 57
            if (($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "orderOnlyPriceBuyingChangeFlag", array()) != "nothing")) {
                echo " ";
                if (($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "orderOnlyPriceBuyingChangeInPercent", array()) > 0)) {
                    echo "&#8593;";
                } else {
                    echo "&#8595;";
                }
            }
            // line 58
            echo "                            </td>

                            <td nowrap>
                                <span class=\"money\">";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "ph", array()), $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()), array(), "array"), "mrc", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span>
                            </td>

                            <td nowrap>
                                <span class=\"money\">";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "priceData", array()), "mrc", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["d"], "product", array()), "OOPBCurrency", array()), "symbol", array()), "html", null, true);
            echo "</span>
                            </td>
                            <td nowrap>
                                <span class=\"money\">";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "difference", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span>
                                ( ";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "extra", array()), "differenceInPercent", array()), "html", null, true);
            echo "
                                %) ";
            // line 70
            if (($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "flag", array()) != "nothing")) {
                echo " ";
                if (($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "difference", array()) > 0)) {
                    echo "&#8593;";
                } else {
                    echo "&#8595;";
                }
            }
            // line 71
            echo "                            </td>
                            <td>
                                ";
            // line 73
            if ( !$this->getAttribute($this->getAttribute($context["d"], "extra", array(), "any", false, true), "difCurrency", array(), "any", true, true)) {
                // line 74
                echo "                                    <input class=\"setMrcPrice\"
                                           data-product-id=\"";
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()), "html", null, true);
                echo "\"
                                           data-new-price=\"";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "priceData", array()), "mrc", array()), "html", null, true);
                echo "\"
                                           type=\"checkbox\" value=\"1\">
                                ";
            }
            // line 79
            echo "                            </td>
                        </tr>
                    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "                </tbody>
            </table>
        </div>
    </fieldset>
</div>
<script>
    \$(function () {

        \$('#mrcAllProductsQuantity').html('(' + \$('.priceMrcTr').length + ')');
        \$('#mrcPriceHikeQuantity').html('(' + \$('.priceMrcTr.priceHike').length + ')');
        \$('#mrcDepreciationQuantity').html('(' + \$('.priceMrcTr.depreciation').length + ')');
        \$('#mrcNothingQuantity').html('(' + \$('.priceMrcTr.nothing').length + ')');
        \$('#mrcDisabledInBaseandHasInPriceQuantity').html('(' + \$('.priceMrcTr.disabledInBaseandHasInPrice').length + ')');

        //обработчики фильтров
        \$('input[name=\"mrcFilter\"]').change(function () {
            //сбрасываем все галочки
            \$('input[name=\"setMrcPriceAll\"]').removeAttr('checked', 'checked');
            \$('.setMrcPrice').removeAttr('checked', 'checked');

            \$('.enableMrcProductButton').hide();
            \$('.disabledMrcProductButton').show();
            if (\$(this).val() == 'mrcAllProducts') {
                \$('.priceMrcTr').show();
            }
            else if (\$(this).val() == 'mrcPriceHike') {
                \$('.priceMrcTr').hide();
                \$('.priceMrcTr.priceHike').show();
            }
            else if (\$(this).val() == 'mrcDepreciation') {
                \$('.priceMrcTr').hide();
                \$('.priceMrcTr.depreciation').show();
            }
            else if (\$(this).val() == 'mrcNothing') {
                \$('.priceMrcTr').hide();
                \$('.priceMrcTr.nothing').show();
            }
            else if (\$(this).val() == 'mrcDisabledInBaseandHasInPrice') {
                \$('.priceMrcTr').hide();
                \$('.disabledMrcProductButton').hide();
                \$('.priceMrcTr.disabledInBaseandHasInPrice').show();
                \$('.enableMrcProductButton').show();
            }
            //динамическая нумерация строк
            var ind = 1;
            \$('.priceMrcTr:visible').each(function () {
                \$(this).find('td').first().html(ind);
                ind++;
            });
        });

        //включить товары, которые есть в прайсе и базе, но скрыты от публикации
        \$('.enableMrcProductButton').click(function () {
            var ids = [];
            if (\$('input[name=\"mrcFilter\"]:checked').val() == 'mrcDisabledInBaseandHasInPrice') {
                \$('.setMrcPrice:checked').each(function (obj) {
                    var item = {
                        id: \$(this).attr('data-product-id')
                    }
                    ids.push(item);
                });
            }

            if (ids.length > 0) {
                \$.post(\"";
        // line 146
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "enableProduct", 1 => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array())), "method"), "html", null, true);
        echo "\", {ids: ids})
                        .done(function (data) {
                            alert(\"Выбранные товары были включены на публикацию! Обновите страницу.\");
                        });
            }
            else {
                alert('Отметьте продукты, которые нужно включить на публикацию.');
            }
        });

        //установить  цены для MRC
        \$('.updateProductMrcButton').click(function () {
            var ids = [];
            \$('.setMrcPrice:checked').each(function (obj) {
                var item = {
                    id: \$(this).attr('data-product-id'),
                    price: \$(this).attr('data-new-price')
                }
                ids.push(item);
            });
            if (ids.length > 0) {
                \$.post(\"";
        // line 167
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "setMrcPriceForProductsFromPrice", 1 => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array())), "method"), "html", null, true);
        echo "\", {ids: ids})
                        .done(function (data) {
                            alert(\"Новые МРЦ цены установлены! Обновите страницу.\");
                        });
            }
            else {
                alert('Отметьте продукты, которые нужно обновить.');
            }
        });

        //выбрать все
        \$('input[name=\"setMrcPriceAll\"]').change(function () {
            if (\$(this).is(':checked')) {
                \$('.setMrcPrice').each(function () {
                    if (\$(this).parents('tr').is(':visible')) {
                        \$(this).attr('checked', 'checked');
                    }
                });
            }
            else {
                \$('.setMrcPrice').removeAttr('checked', 'checked');
            }
        });

    });
</script>";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:mrc.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  321 => 167,  297 => 146,  231 => 82,  215 => 79,  209 => 76,  205 => 75,  202 => 74,  200 => 73,  196 => 71,  187 => 70,  183 => 69,  177 => 68,  169 => 65,  160 => 61,  155 => 58,  146 => 57,  142 => 56,  136 => 55,  128 => 52,  124 => 50,  120 => 48,  118 => 47,  112 => 46,  104 => 43,  94 => 42,  89 => 40,  78 => 39,  61 => 38,  19 => 2,);
    }
}
