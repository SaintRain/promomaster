<?php

/* CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:priceHike.html.twig */
class __TwigTemplate_211c556eae67abcbc80bb7f43a427ec2826d9f1be3940c448338f536873ca4d1 extends Twig_Template
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
        echo "<div class=\"tab-pane priceHike\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 1), "html", null, true);
        echo "\">
    <fieldset>
        <div class=\"sonata-ba-collapsed-fields\">
            <p>Показаны товары только под заказ для указанного производителя. Новые закупочные цены будут
                установлены для выбранных продуктов.</p>
            <p>
                <input type=\"button\" class=\"btn setNewBasePriceButton\"
                       value=\"Установить новые закупочные цены на выбранные товары\">
                &nbsp;
                <input  type=\"button\" class=\"btn disabledProductButton\"
                        value=\"Отключить от публикации выбранные товары\">
                &nbsp;
                <input style=\"display:none\" type=\"button\" class=\"btn enableProductButton\" value=\"Включить на публикацию\">
            </p>

            </p>
            <h3>Фильтры</h3>
            <label style=\"float: left\"><input checked type=\"radio\" name=\"phFilter\" value=\"phAllProducts\" >&nbsp;Все товары <span id=\"phAllProductsQuantity\"></span></label>
            <label style=\"float: left\">&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"phFilter\" value=\"phPriceHike\" type=\"radio\" >&nbsp;Подорожавшие <span id=\"phPriceHikeQuantity\"></span></label>
            <label style=\"float: left\">&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"phFilter\" value=\"phDepreciation\" type=\"radio\" >&nbsp;Подешевевшие <span id=\"phDepreciationQuantity\"></span></label>
            <label style=\"float: left\">&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"phFilter\" value=\"phNothing\" type=\"radio\" >&nbsp;Без изменения <span id=\"phNothingQuantity\"></span></label>
            <label>&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"phFilter\" value=\"phDisabledInBaseandHasInPrice\" type=\"radio\" >&nbsp;Сняты с публикации или производства <span id=\"phDisabledInBaseandHasInPriceQuantity\"></span></label>
            <br/>
            <table class=\"table table-bordered table-hover\" style=\"width:100%\">
                <thead>
                    <tr>
                        <th style=\"width: 1%\">№</th>
                        <th style=\"width:70%\">Продукт</th>
                        <th style=\"width:5%\">Закупочная цена<br><span style=\"font-size:10px\">На момент загрузки прайса</span></th>
                        <th style=\"width:5%\">Цена в прайсе</th>
                        <th style=\"width:9%\">Новая цена</th>
                        <th style=\"width:9%\">Изменение цены</th>
                        <th style=\"width:1%\"><input title=\"Выбрать все\" name=\"setBasePriceAll\"
                                                      type=\"checkbox\" value=\"1\"></th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "priceHike", array()));
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
            // line 40
            echo "                        <tr class=\"priceHikeTr ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "extra", array()), "flag", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "extra", array()), "flag2", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute($this->getAttribute($context["d"], "extra", array(), "any", false, true), "difCurrency", array(), "any", true, true)) {
                echo "error";
            }
            echo "\">
                            <td nowrap>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</td>
                            <td >
                                <a href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "article", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "sku", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "captionRu", array()), "html", null, true);
            echo "</a>
                                <span class=\"money\">";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "product", array()), "price", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span>                            
                                ";
            // line 45
            if ($this->getAttribute($this->getAttribute($context["d"], "product", array()), "isDiscontinued", array())) {
                echo " <span class=\"label label-default\">снят  производства</span>";
            }
            // line 46
            echo "                            </td>
                            <td nowrap>
                                <span class=\"money\">";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "ph", array()), $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()), array(), "array"), "orderOnlyPriceBuying", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "ph", array()), $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()), array(), "array"), "OOPBCurrency", array()), "symbol", array()), "html", null, true);
            echo "</span>
                                ";
            // line 49
            if ($this->getAttribute($this->getAttribute($context["d"], "extra", array(), "any", false, true), "difCurrency", array(), "any", true, true)) {
                // line 50
                echo "                                    <span class=\"label label-important\">валюта отличается в прайсе</span>
                                ";
            }
            // line 52
            echo "                            </td>
                            <td nowrap>
                                <span class=\"money\">";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "priceData", array()), "orderOnlyPriceBuying", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array()), "supplier", array()), "paCurrency", array()), "symbol", array()), "html", null, true);
            echo "</span>
                            </td>
                            <td nowrap>
                                <span class=\"money\">";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "newPrice", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span>
                            </td>
                            <td nowrap>
                                <span class=\"money\">";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "difference", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span>
                                ( ";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "extra", array()), "differenceInPercent", array()), "html", null, true);
            echo "
                                %) ";
            // line 62
            if (($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "flag", array()) != "nothing")) {
                echo " ";
                if (($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "difference", array()) > 0)) {
                    echo "&#8593;";
                } else {
                    echo "&#8595;";
                }
            }
            // line 63
            echo "                            </td>
                            <td>
                                ";
            // line 65
            if ( !$this->getAttribute($this->getAttribute($context["d"], "extra", array(), "any", false, true), "difCurrency", array(), "any", true, true)) {
                // line 66
                echo "                                    <input class=\"setBasePrice\"
                                           data-product-id=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()), "html", null, true);
                echo "\"
                                           data-new-price=\"";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "priceData", array()), "orderOnlyPriceBuying", array()), "html", null, true);
                echo "\"
                                           type=\"checkbox\" value=\"1\">
                                ";
            }
            // line 71
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
        // line 74
        echo "                </tbody>
            </table>
        </div>
    </fieldset>
</div>
<script>
    \$(function () {

        \$('#phAllProductsQuantity').html('(' + \$('.priceHikeTr').length + ')');
        \$('#phPriceHikeQuantity').html('(' + \$('.priceHikeTr.priceHike').length + ')');
        \$('#phDepreciationQuantity').html('(' + \$('.priceHikeTr.depreciation').length + ')');
        \$('#phNothingQuantity').html('(' + \$('.priceHikeTr.nothing').length + ')');
        \$('#phDisabledInBaseandHasInPriceQuantity').html('(' + \$('.priceHikeTr.disabledInBaseandHasInPrice').length + ')');

        //обработчики фильтров
        \$('input[name=\"phFilter\"]').change(function () {

            //сбрасываем все галочки
            \$('.setBasePrice').removeAttr('checked', 'checked');
            \$('input[name=\"setBasePriceAll\"]').removeAttr('checked', 'checked');
            
            \$('.enableProductButton').hide();
            \$('.disabledProductButton').show();
            if (\$(this).val() == 'phAllProducts') {
                \$('.priceHikeTr').show();
            }
            else if (\$(this).val() == 'phPriceHike') {
                \$('.priceHikeTr').hide();
                \$('.priceHikeTr.priceHike').show();
            }
            else if (\$(this).val() == 'phDepreciation') {
                \$('.priceHikeTr').hide();
                \$('.priceHikeTr.depreciation').show();
            }
            else if (\$(this).val() == 'phNothing') {
                \$('.priceHikeTr').hide();
                \$('.priceHikeTr.nothing').show();
            }
            else if (\$(this).val() == 'phDisabledInBaseandHasInPrice') {
                \$('.priceHikeTr').hide();
                \$('.disabledProductButton').hide();
                \$('.priceHikeTr.disabledInBaseandHasInPrice').show();
                \$('.enableProductButton').show();
            }
            //динамическая нумерация строк
            var ind = 1;
            \$('.priceHikeTr:visible').each(function () {
                \$(this).find('td').first().html(ind);
                ind++;
            });
        });

        //включить товары, которые есть в прайсе и базе, но скрыты от публикации
        \$('.enableProductButton').click(function () {
            var ids = [];
            if (\$('input[name=\"phFilter\"]:checked').val() == 'phDisabledInBaseandHasInPrice') {
                \$('.setBasePrice:checked').each(function (obj) {
                    var item = {
                        id: \$(this).attr('data-product-id')
                    }
                    ids.push(item);
                });
            }

            if (ids.length > 0) {
                \$.post(\"";
        // line 139
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

        //установить базовый цены из прайса
        \$('.setNewBasePriceButton').click(function () {
            var ids = [];
            \$('.setBasePrice:checked').each(function (obj) {
                var item = {
                    id: \$(this).attr('data-product-id'),
                    price: \$(this).attr('data-new-price')
                }
                ids.push(item);
            });
            if (ids.length > 0) {
                \$.post(\"";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "setBasePriceForProductsFromPrice", 1 => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array())), "method"), "html", null, true);
        echo "\", {ids: ids})
                        .done(function (data) {
                            alert(\"Новые закупочные цены установлены! Обновите страницу.\");
                        });
            }
            else {
                alert('Отметьте продукты, которые нужно обновить.');
            }
        });

        //выбрать все
        \$('input[name=\"setBasePriceAll\"]').change(function () {
            if (\$(this).is(':checked')) {
                \$('.setBasePrice').each(function () {
                    if (\$(this).parents('tr').is(':visible')) {
                        \$(this).attr('checked', 'checked');
                    }
                });
            }
            else {
                \$('.setBasePrice').removeAttr('checked', 'checked');
            }
        });
    });

    \$(function () {
        //отключить от публикации товары, которых нет в прайсе
        \$('.disabledProductButton').click(function () {
            var ids = [];
            \$('.setBasePrice:checked').each(function (obj) {
                var item = {
                    id: \$(this).attr('data-product-id')
                }
                ids.push(item);
            });
            if (ids.length > 0) {
                \$.post(\"";
        // line 196
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "disableProduct", 1 => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array())), "method"), "html", null, true);
        echo "\", {ids: ids})
                        .done(function (data) {
                            alert(\"Выбранные товары были отключены от публикации! Обновите страницу.\");
                        });
            }
            else {
                alert('Отметьте продукты, которые нужно отключить от публикации.');
            }
        });

    });
</script>";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:priceHike.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  335 => 196,  296 => 160,  272 => 139,  205 => 74,  189 => 71,  183 => 68,  179 => 67,  176 => 66,  174 => 65,  170 => 63,  161 => 62,  157 => 61,  151 => 60,  143 => 57,  135 => 54,  131 => 52,  127 => 50,  125 => 49,  119 => 48,  115 => 46,  111 => 45,  105 => 44,  95 => 43,  90 => 41,  79 => 40,  62 => 39,  19 => 2,);
    }
}
