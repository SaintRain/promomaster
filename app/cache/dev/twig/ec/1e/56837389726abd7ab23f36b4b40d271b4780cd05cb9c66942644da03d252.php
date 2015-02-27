<?php

/* CoreProductBundle:Admin/Form:form_admin_fields.html.twig */
class __TwigTemplate_ec1e56837389726abd7ab23f36b4b40d271b4780cd05cb9c66942644da03d252 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'core_shop_product_admin_isCanBeInYml_checkbox_widget' => array($this, 'block_core_shop_product_admin_isCanBeInYml_checkbox_widget'),
            'core_shop_product_admin_descriptionRu_ckeditor_widget' => array($this, 'block_core_shop_product_admin_descriptionRu_ckeditor_widget'),
            'core_shop_product_admin_isNoSerials_checkbox_widget' => array($this, 'block_core_shop_product_admin_isNoSerials_checkbox_widget'),
            'core_shop_product_admin_OOPBQuantity_integer_widget' => array($this, 'block_core_shop_product_admin_OOPBQuantity_integer_widget'),
            'core_shop_product_admin_deliveryDays_integer_widget' => array($this, 'block_core_shop_product_admin_deliveryDays_integer_widget'),
            'core_shop_product_admin_isDescriptionSendToYandex_checkbox_widget' => array($this, 'block_core_shop_product_admin_isDescriptionSendToYandex_checkbox_widget'),
            'core_shop_product_admin_isOOPBCurrencyRateAdditiveInPercent_checkbox_widget' => array($this, 'block_core_shop_product_admin_isOOPBCurrencyRateAdditiveInPercent_checkbox_widget'),
            'core_shop_product_admin_orderOnlyShopTaxInPercent_checkbox_widget' => array($this, 'block_core_shop_product_admin_orderOnlyShopTaxInPercent_checkbox_widget'),
            'core_shop_product_admin_productTags_sonata_type_collection_widget' => array($this, 'block_core_shop_product_admin_productTags_sonata_type_collection_widget'),
            'core_shop_product_admin_images_multiupload_image_widget' => array($this, 'block_core_shop_product_admin_images_multiupload_image_widget'),
            'core_shop_product_admin_price_money_price_widget' => array($this, 'block_core_shop_product_admin_price_money_price_widget'),
            'core_shop_product_admin_isVisible_checkbox_widget' => array($this, 'block_core_shop_product_admin_isVisible_checkbox_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "

";
        // line 10
        $this->displayBlock('core_shop_product_admin_isCanBeInYml_checkbox_widget', $context, $blocks);
        // line 38
        echo "
";
        // line 40
        $this->displayBlock('core_shop_product_admin_descriptionRu_ckeditor_widget', $context, $blocks);
        // line 68
        echo "

";
        // line 70
        $this->displayBlock('core_shop_product_admin_isNoSerials_checkbox_widget', $context, $blocks);
        // line 93
        echo "
";
        // line 95
        $this->displayBlock('core_shop_product_admin_OOPBQuantity_integer_widget', $context, $blocks);
        // line 104
        echo "
";
        // line 106
        $this->displayBlock('core_shop_product_admin_deliveryDays_integer_widget', $context, $blocks);
        // line 112
        echo "


";
        // line 115
        $this->displayBlock('core_shop_product_admin_isDescriptionSendToYandex_checkbox_widget', $context, $blocks);
        // line 118
        echo "
";
        // line 119
        $this->displayBlock('core_shop_product_admin_isOOPBCurrencyRateAdditiveInPercent_checkbox_widget', $context, $blocks);
        // line 128
        echo "

";
        // line 130
        $this->displayBlock('core_shop_product_admin_orderOnlyShopTaxInPercent_checkbox_widget', $context, $blocks);
        // line 261
        echo "

";
        // line 264
        $this->displayBlock('core_shop_product_admin_productTags_sonata_type_collection_widget', $context, $blocks);
        // line 278
        echo "
";
        // line 280
        $this->displayBlock('core_shop_product_admin_images_multiupload_image_widget', $context, $blocks);
        // line 285
        echo "

";
        // line 288
        $this->displayBlock('core_shop_product_admin_price_money_price_widget', $context, $blocks);
        // line 314
        echo "
";
        // line 316
        $this->displayBlock('core_shop_product_admin_isVisible_checkbox_widget', $context, $blocks);
    }

    // line 10
    public function block_core_shop_product_admin_isCanBeInYml_checkbox_widget($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    ";
        // line 12
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array())) {
            // line 13
            echo "    ";
            if (((( !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "isCanBeInYml", array()) ||  !$this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "manufacturerMain", array()), "isCanBeInYml", array())) || ( !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "orderOnly", array()) &&  !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "availabilityQuantity", array()))) || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "isDiscontinued", array()))) {
                // line 17
                echo "        ";
                // line 18
                echo "        ";
                if (( !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "availabilityQuantity", array()) &&  !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "orderOnly", array()))) {
                    // line 19
                    echo "            <span title=\"Не включено в YML\" class=\"label label-important\">Нет в наличии</span>
        ";
                } else {
                    // line 21
                    echo "            ";
                    if ( !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "isCanBeInYml", array())) {
                        // line 22
                        echo "                <span title=\"Не включено в YML\" class=\"label label-important\">Отменена публикация товара</span>
            ";
                    } else {
                        // line 24
                        echo "                ";
                        if ( !$this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "manufacturerMain", array()), "isCanBeInYml", array())) {
                            // line 25
                            echo "                    <span title=\"Не включено в YML\" class=\"label label-important\">Отменена публикация производителя</span>
                ";
                        } else {
                            // line 27
                            echo "                    ";
                            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "isDiscontinued", array())) {
                                // line 28
                                echo "                        <span title=\"Не включено в YML\" class=\"label label-important\">Снят с производства</span>
                ";
                            }
                            // line 30
                            echo "                ";
                        }
                        // line 31
                        echo "            ";
                    }
                    // line 32
                    echo "        ";
                }
                // line 33
                echo "    ";
            } else {
                // line 34
                echo "        <span class=\"label label-success\">Включено в YML</span>
    ";
            }
            // line 36
            echo "    ";
        }
    }

    // line 40
    public function block_core_shop_product_admin_descriptionRu_ckeditor_widget($context, array $blocks = array())
    {
        // line 41
        echo "
    ";
        // line 42
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "isDescriptionSendToYandex", array())) {
            // line 43
            echo "        ";
            $context["imagePrefix"] = "";
            // line 44
            echo "    ";
        } else {
            // line 45
            echo "        ";
            $context["imagePrefix"] = "dont_";
            // line 46
            echo "    ";
        }
        // line 47
        echo "    <img data-target=\"isDescriptionSendToYandex\" class=\"sendEmailOrderStatus\"
         title=\"Нужно ли отправлять текст в YandexMarket при обновлении описания\"
         src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("bundles/coreorder/Admin/img/" . (isset($context["imagePrefix"]) ? $context["imagePrefix"] : $this->getContext($context, "imagePrefix"))) . "send_email.png")), "html", null, true);
        echo "\"/>
    ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    <script>
        \$(function () {
            \$('img.sendEmailOrderStatus').click(function () {
                var dataTarget = \$(this).attr('data-target'),
                        \$checkbox = \$('input[id \$= \"_' + dataTarget + '\"]').first();
                if (\$checkbox.is(':checked')) {
                    \$(this).attr('src', \"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/img/dont_send_email.png"), "html", null, true);
        echo "\");
                    \$checkbox.removeAttr('checked');
                }
                else {
                    \$(this).attr('src', \"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/img/send_email.png"), "html", null, true);
        echo "\");
                    \$checkbox.attr('checked', 'checked');
                }
            })
        })
    </script>
";
    }

    // line 70
    public function block_core_shop_product_admin_isNoSerials_checkbox_widget($context, array $blocks = array())
    {
        // line 71
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    <script>
        //скрываем/показываем поле ввода серийных номеров
        \$(function () {
            var uniqid = \"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "\";
            toogleSerialsQuantity();

            \$('#' + uniqid + '_isNoSerials').change(function () {
                toogleSerialsQuantity();
            });
            function toogleSerialsQuantity() {
                var \$obj = \$('#' + uniqid + '_isNoSerials');
                if (\$obj.is(':checked')) {
                    \$('#' + uniqid + '_serialsQuantity').parents('div.control-group').hide();
                }
                else {
                    \$('#' + uniqid + '_serialsQuantity').parents('div.control-group').show();
                }
            }
        });
    </script>
";
    }

    // line 95
    public function block_core_shop_product_admin_OOPBQuantity_integer_widget($context, array $blocks = array())
    {
        // line 96
        echo "    <div style=\"width:250px;float: left\">";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        ";
        // line 97
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "OOPBQuantityUpdated", array())) {
            // line 98
            echo "            <span class=\"label label-default\"
                  title=\"Дата обновления остатка\">";
            // line 99
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "OOPBQuantityUpdated", array()), "d-m-Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "</span>
        ";
        }
        // line 101
        echo "    </div>
    <div class=\"clearfix\"></div>
";
    }

    // line 106
    public function block_core_shop_product_admin_deliveryDays_integer_widget($context, array $blocks = array())
    {
        // line 107
        echo "    <div style=\"width:250px;float: left\">
        ";
        // line 108
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    </div>
    <div class=\"clearfix\"></div>
";
    }

    // line 115
    public function block_core_shop_product_admin_isDescriptionSendToYandex_checkbox_widget($context, array $blocks = array())
    {
        // line 116
        echo "    <span style='display: none'>";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "</span>
";
    }

    // line 119
    public function block_core_shop_product_admin_isOOPBCurrencyRateAdditiveInPercent_checkbox_widget($context, array $blocks = array())
    {
        // line 120
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "<br/>
    Курс ЦБР: <span id=\"selectedCurencyRate\" class=\"money\"></span> <span class=\"money\">";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>
    <span class=\"label label-default\" title=\"Дата обновления курса\" id=\"currencyDateTime\"></span><br/>
    Курс с амортизацией: <span id=\"selectedCurencyRateWithAdditive\" class=\"money\"></span> <span
        class=\"money\">";
        // line 124
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span><br>
    Цена закупки: <span id=\"selectedCurencyRateCompute\" class=\"money\"></span> <span
        class=\"money\">";
        // line 126
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>
";
    }

    // line 130
    public function block_core_shop_product_admin_orderOnlyShopTaxInPercent_checkbox_widget($context, array $blocks = array())
    {
        // line 131
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    <br/><br/>
    <div class=\"control-group\">Расчетная цена: <span class=\"money\" id=\"rashetnayaStoimost\">0</span> <span
                class=\"money\">";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span></div>
    <div class=\"control-group\">Прибыль: <span class=\"money\" id=\"pribil\">0</span> <span
                class=\"money\">";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span></div>
    <script>
        \$(document).ready(function () {
            rashetnayaStoimost();
            var uniqid = \"";
        // line 140
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "\";

            \$('#' + uniqid + '_orderOnlyPriceBuying').change(function () {
                rashetnayaStoimost();
            });
            \$('#' + uniqid + '_OOPBCurrency').change(function () {
                rashetnayaStoimost();
            });
            \$('#' + uniqid + '_OOPBCurrencyRateAdditive').change(function () {
                rashetnayaStoimost();
            });
            \$('#' + uniqid + '_isOOPBCurrencyRateAdditiveInPercent').change(function () {
                rashetnayaStoimost();
            });
            \$('#' + uniqid + '_mrc').change(function () {
                rashetnayaStoimost();
            });
            \$('#' + uniqid + '_isMrcEnabled').change(function () {
                rashetnayaStoimost();
            });
            \$('#' + uniqid + '_orderOnlyShopTax').change(function () {
                rashetnayaStoimost();
            });
            \$('#' + uniqid + '_orderOnlyShopTaxInPercent').change(function () {
                rashetnayaStoimost();
            });

        });

        //расчетная стоимость под заказ
        function rashetnayaStoimost() {
            var
                    uniqid = \"";
        // line 172
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "\",
                    newPrice = 0,
                    orderOnlyPriceBuying = \$('#' + uniqid + '_orderOnlyPriceBuying').val(),
                    orderOnlyPriceBuying = parseFloat(orderOnlyPriceBuying.replace(',', '.')),
                    orderOnlyShopTax = parseFloat(\$('#' + uniqid + '_orderOnlyShopTax').val().replace(/,/g, '.')),
                    orderOnlyShopTaxInPercent = \$('#' + uniqid + '_orderOnlyShopTaxInPercent').is(':checked'),
                    isMrcEnabled = \$('#' + uniqid + '_isMrcEnabled').is(':checked'),
                    mrc = \$('#' + uniqid + '_mrc').val(),
                    mrc = parseFloat(mrc.replace(',', '.')),
                    \$OOPBCurrency = \$('#' + uniqid + '_OOPBCurrency').find(\":selected\"),
                    OOPBCurrencyRateAdditive = \$('#' + uniqid + '_OOPBCurrencyRateAdditive').val(),
                    OOPBCurrencyRateAdditive = parseFloat(OOPBCurrencyRateAdditive.replace(',', '.')),
                    isOOPBCurrencyRateAdditiveInPercent = \$('#' + uniqid + '_isOOPBCurrencyRateAdditiveInPercent').is(':checked');

            if (!OOPBCurrencyRateAdditive) {
                OOPBCurrencyRateAdditive = 0;
            }

            if (!orderOnlyShopTax) {
                orderOnlyShopTax = 0;
            }
            if (!orderOnlyPriceBuying) {
                orderOnlyPriceBuying = 0;
            }

            if (\$OOPBCurrency.attr('data-currencyRUB')) {
                var rate = \$OOPBCurrency.attr('data-currencyRUB');
                rate = parseFloat(rate.replace(',', '.'));
                if (!rate) {
                    rate = 1;
                }
            }
            else {
                var rate = 1;
            }

            \$('#selectedCurencyRate').html(number_format(rate + '', 4, ',', ''));
            if (rate == 1) {
                \$(\"#currencyDateTime\").html('').hide();
            }
            else {
                \$(\"#currencyDateTime\").html(\$OOPBCurrency.attr('data-currencyDateTime')).show();
            }


            //прибавляем к курсу надбавку
            if (isOOPBCurrencyRateAdditiveInPercent) {
                rate = rate + (rate / 100) * OOPBCurrencyRateAdditive;
            }
            else {
                rate = rate + OOPBCurrencyRateAdditive;
            }
            //курс с амортизацией
            \$('#selectedCurencyRateWithAdditive').html(number_format(rate + '', 4, ',', ''));

            //переводим по курсу
            orderOnlyPriceBuying = orderOnlyPriceBuying * rate;

            \$('#selectedCurencyRateCompute').html(number_format(Math.ceil(orderOnlyPriceBuying) + '', 2, ',', ''));

            //если MRC включена, то берем её без всяких расчетов
            if (isMrcEnabled) {
                newPrice = mrc;
            }
            else {
                if (orderOnlyShopTaxInPercent) {
                    newPrice = orderOnlyPriceBuying + ((orderOnlyPriceBuying / 100) * orderOnlyShopTax);
                }
                else {
                    newPrice = orderOnlyPriceBuying + orderOnlyShopTax * rate;
                }
            }

            newPrice = Math.ceil(newPrice);
            if (isNaN(newPrice)) {
                newPrice = 0;
            }
            var pribil = newPrice - orderOnlyPriceBuying;

            //newPrice = number_format(newPrice, 2, ',', '');
            //расчетная цена
            \$('#rashetnayaStoimost').html(newPrice);
            //прибыль
            \$('#pribil').html(Math.ceil(pribil));


        }
    </script>
";
    }

    // line 264
    public function block_core_shop_product_admin_productTags_sonata_type_collection_widget($context, array $blocks = array())
    {
        // line 265
        echo "    <div style=\"width:450px\">
        ";
        // line 266
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    </div>
    <script>
        \$(document).ready(function () {
            \$(\".tagsAutocomplete\").autocomplete({
                source: \"";
        // line 271
        echo $this->env->getExtension('routing')->getPath("core_directrory_product_tags");
        echo "\",
                minLength: 2
            });

        });
    </script>
";
    }

    // line 280
    public function block_core_shop_product_admin_images_multiupload_image_widget($context, array $blocks = array())
    {
        // line 281
        echo "    <div style=\"width:900px\">
        ";
        // line 282
        $this->displayBlock("multiupload_image_widget", $context, $blocks);
        echo "
    </div>
";
    }

    // line 288
    public function block_core_shop_product_admin_price_money_price_widget($context, array $blocks = array())
    {
        // line 289
        echo "    ";
        ob_start();
        // line 290
        echo "        <script>

            if (core_statistics_ajax_get_chart_price_history === undefined) {
                \$.getScript('";
        // line 293
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreproduct/Admin/js/ajax_get_chart_price_history.js"), "html", null, true);
        echo "');
                var currencySymbol = ' ";
        // line 294
        echo twig_escape_filter($this->env, (isset($context["currencySymbol"]) ? $context["currencySymbol"] : $this->getContext($context, "currencySymbol")), "html", null, true);
        echo "';
            }

            var core_statistics_ajax_get_chart_price_history = '";
        // line 297
        echo $this->env->getExtension('routing')->getPath("core_statistics_ajax_get_chart_price_history");
        echo "';

        </script>
        <div class=\"pull-left\">
            ";
        // line 301
        $this->displayBlock("money_widget", $context, $blocks);
        echo "
        </div>

        ";
        // line 304
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array())) {
            // line 305
            echo "            <div class=\"icon-graph pull-left get-chart-price-history\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "id"), "method"), "html", null, true);
            echo "\"
                 title=\"Посмотреть график изменения цены\"></div>
        ";
        }
        // line 308
        echo "
        <div class=\"clearfix\"></div>
        <span class=\"help-block sonata-ba-field-help span5\">Если товар доставляется под заказ, то цена автоматически будет пересчитываться<span
                    class=\"help-block-shadow\"></span></span>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 316
    public function block_core_shop_product_admin_isVisible_checkbox_widget($context, array $blocks = array())
    {
        // line 317
        echo "    ";
        ob_start();
        // line 318
        echo "
        <div style=\"height: 8px\"></div>

        ";
        // line 321
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "isVisible", array())) {
            // line 322
            echo "
            <span class=\"label label-success\" style=\"margin-top: 10px\">Да</span>

        ";
        } else {
            // line 326
            echo "
            <span class=\"label label-important\">Нет</span>

        ";
        }
        // line 330
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/Form:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  591 => 330,  585 => 326,  579 => 322,  577 => 321,  572 => 318,  569 => 317,  566 => 316,  557 => 308,  550 => 305,  548 => 304,  542 => 301,  535 => 297,  529 => 294,  525 => 293,  520 => 290,  517 => 289,  514 => 288,  507 => 282,  504 => 281,  501 => 280,  490 => 271,  482 => 266,  479 => 265,  476 => 264,  383 => 172,  348 => 140,  341 => 136,  336 => 134,  329 => 131,  326 => 130,  320 => 126,  315 => 124,  309 => 121,  304 => 120,  301 => 119,  294 => 116,  291 => 115,  283 => 108,  280 => 107,  277 => 106,  271 => 101,  266 => 99,  263 => 98,  261 => 97,  256 => 96,  253 => 95,  231 => 75,  223 => 71,  220 => 70,  209 => 61,  202 => 57,  192 => 50,  188 => 49,  184 => 47,  181 => 46,  178 => 45,  175 => 44,  172 => 43,  170 => 42,  167 => 41,  164 => 40,  159 => 36,  155 => 34,  152 => 33,  149 => 32,  146 => 31,  143 => 30,  139 => 28,  136 => 27,  132 => 25,  129 => 24,  125 => 22,  122 => 21,  118 => 19,  115 => 18,  113 => 17,  110 => 13,  108 => 12,  103 => 11,  100 => 10,  96 => 316,  93 => 314,  91 => 288,  87 => 285,  85 => 280,  82 => 278,  80 => 264,  76 => 261,  74 => 130,  70 => 128,  68 => 119,  65 => 118,  63 => 115,  58 => 112,  56 => 106,  53 => 104,  51 => 95,  48 => 93,  46 => 70,  42 => 68,  40 => 40,  37 => 38,  35 => 10,  31 => 7,);
    }
}
