<?php

/* CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:outOfStock.html.twig */
class __TwigTemplate_36783f44ccd27ed428d9db1fc21951dfcdebd90e19c6e0fb749fc1769772c8c7 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : $this->getContext($context, "uniqid")), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : $this->getContext($context, "ind")) + 2), "html", null, true);
        echo "\">
    <fieldset>
        <div class=\"sonata-ba-collapsed-fields\">
            <p>Показаны товары, которых нет в нашей базе, но есть в прайсе и наоборот.</p>
            <p>
                <input type=\"button\" class=\"btn disabledProductButton2\" value=\"Отключить от публикации выбранные товары\">&nbsp;

            </p>
            <h3>Фильтры</h3>
            <label style=\"float: left\" ><input checked type=\"radio\" name=\"phFilter2\" value=\"noInBase\" >&nbsp;Есть в прайсе, но нет в базе <span id=\"noInBaseQuantity\"></span></label>
            <label >&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"phFilter2\" value=\"noInPrice\" type=\"radio\" >&nbsp;Есть в базе, но нет в прайсе <span id=\"noInPriceQuantity\"></span></label>


            <br>
            <table class=\"table table-bordered table-hover outOfStock\" style=\"width:100%\">
                <thead>
                    <tr>
                        <th style=\"width: 50px\">№</th>
                        <th >Продукт</th>
                        <th style=\"width: 100px\">Цена</th>
                        <th style=\"width:15px\"><input title=\"Выбрать все\" name=\"disableAllProducts2\"
                                                      type=\"checkbox\" value=\"1\"></th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 27
        $context["index"] = 1;
        // line 28
        echo "                    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extra"]) ? $context["extra"] : $this->getContext($context, "extra")), "outOfStock", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 29
            echo "                        <tr class=\"priceHikeTr2 ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "extra", array()), "flag", array()), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "flag", array()) != "noInBase")) {
                echo "style=\"display:none\"";
            }
            echo ">
                            <td>";
            // line 30
            if (($this->getAttribute($this->getAttribute($context["d"], "extra", array()), "flag", array()) == "noInBase")) {
                echo twig_escape_filter($this->env, (isset($context["index"]) ? $context["index"] : $this->getContext($context, "index")), "html", null, true);
                $context["index"] = ((isset($context["index"]) ? $context["index"] : $this->getContext($context, "index")) + 1);
            }
            echo "</td>
                            <td nowrap>
                                ";
            // line 32
            if ($this->getAttribute($context["d"], "product", array(), "any", true, true)) {
                // line 33
                echo "                                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "article", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "sku", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "captionRu", array()), "html", null, true);
                echo "</a>
                                    ";
                // line 34
                if ($this->getAttribute($this->getAttribute($context["d"], "product", array()), "isDiscontinued", array())) {
                    echo " <span class=\"label label-default\">снят  производства</span>";
                }
                // line 35
                echo "                                ";
            } else {
                // line 36
                echo "                                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "priceData", array()), "sku", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "priceData", array()), "captionRu", array()), "html", null, true);
                echo "
                                ";
            }
            // line 38
            echo "                            </td>
                            <td>
                                ";
            // line 40
            if ($this->getAttribute($context["d"], "product", array(), "any", true, true)) {
                // line 41
                echo "                                    <span class=\"money\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "product", array()), "price", array())), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo "</span>
                                ";
            } else {
                // line 43
                echo "                                    <span class=\"money\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["d"], "priceData", array()), "orderOnlyPriceBuying", array())), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "subject", array()), "supplier", array()), "paCurrency", array()), "symbol", array()), "html", null, true);
                echo "</span>
                                ";
            }
            // line 45
            echo "                            </td>
                            <td>
                                ";
            // line 47
            if ($this->getAttribute($context["d"], "product", array(), "any", true, true)) {
                // line 48
                echo "                                    <input class=\"disableProduct2\"
                                           data-product-id=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "id", array()), "html", null, true);
                echo "\"
                                           type=\"checkbox\" value=\"1\">
                                ";
            }
            // line 52
            echo "                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "                </tbody>
            </table>
        </div>
    </fieldset>
</div>
<script>
    \$(function () {
        
        \$('#noInBaseQuantity').html('('+\$('.priceHikeTr2.noInBase').length+')');
        \$('#noInPriceQuantity').html('('+\$('.priceHikeTr2.noInPrice').length+')');
        \$('#disabledInBaseandHasInPriceQuantity').html('('+\$('.priceHikeTr2.disabledInBaseandHasInPrice').length+')');
        
        //обработчики фильтров
        \$('input[name=\"phFilter2\"]').change(function () {
            //сбрасываем все галочки
            \$('.disableProduct2').removeAttr('checked', 'checked');
            \$('input[name=\"disableAllProducts2\"]').removeAttr('checked', 'checked');
            
            if (\$(this).val() == 'noInPrice') {
                \$('.priceHikeTr2').hide();
                \$('.priceHikeTr2.noInPrice').show();
            }
            else if (\$(this).val() == 'noInBase') {
                \$('.priceHikeTr2').hide();
                \$('.priceHikeTr2.noInBase').show();
            }

            //динамическая нумерация строк
            var ind = 1;
            \$('.priceHikeTr2:visible').each(function () {
                \$(this).find('td').first().html(ind);
                ind++;
            });
        });




        //отключить от публикации товары, которых нет в прайсе
        \$('.disabledProductButton2').click(function () {
            var ids = [];
            if (\$('input[name=\"phFilter2\"]:checked').val() == 'noInPrice') {
                \$('.disableProduct2:checked').each(function (obj) {
                    var item = {
                        id: \$(this).attr('data-product-id')
                    }
                    ids.push(item);
                });
            }

            if (ids.length > 0) {
                \$.post(\"";
        // line 106
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateObjectUrl", array(0 => "disableProduct", 1 => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "subject", array())), "method"), "html", null, true);
        echo "\", {ids: ids})
                        .done(function (data) {
                            alert(\"Выбранные товары были отключены от публикации! Обновите страницу.\");
                        });
            }
            else {
                alert('Отметьте продукты, которые нужно отключить от публикации.');
            }

        });

        //выбрать все
        \$('input[name=\"disableAllProducts2\"]').change(function () {
            if (\$(this).is(':checked')) {
                \$('.disableProduct2').each(function () {
                    if (\$(this).parents('tr').is(':visible')) {
                        \$(this).attr('checked', 'checked');
                    }
                });
            }
            else {
                \$('.disableProduct2').removeAttr('checked', 'checked');
            }
        });
    });
</script>";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:outOfStock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 106,  147 => 55,  139 => 52,  133 => 49,  130 => 48,  128 => 47,  124 => 45,  116 => 43,  108 => 41,  106 => 40,  102 => 38,  94 => 36,  91 => 35,  87 => 34,  76 => 33,  74 => 32,  66 => 30,  57 => 29,  52 => 28,  50 => 27,  19 => 2,);
    }
}
