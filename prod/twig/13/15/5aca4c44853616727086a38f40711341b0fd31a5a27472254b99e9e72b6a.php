<?php

/* CoreLogisticsBundle:Admin/SupplierPriceAnalysis:edit.html.twig */
class __TwigTemplate_13155aca4c44853616727086a38f40711341b0fd31a5a27472254b99e9e72b6a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:edit.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'sonata_pre_fieldsets' => array($this, 'block_sonata_pre_fieldsets'),
            'sonata_tab_content' => array($this, 'block_sonata_tab_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 66
        $context["ind"] = 1;
        // line 67
        $context["uniqid"] = $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_javascripts($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script xmlns=\"http://www.w3.org/1999/html\">
        \$(function () {

            \$('a#summaryInfoPodorojalo').click(function () {
                \$('a[href=\"#";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 1), "html", null, true);
        echo "\"]').click();
                \$('input[value=\"phPriceHike\"]').click();
            });

            \$('a#summaryInfoPodeshevelo').click(function () {
                \$('a[href=\"#";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 1), "html", null, true);
        echo "\"]').click();
                \$('input[value=\"phDepreciation\"]').click();
            });

            \$('a#summaryInfoPodorojaloMrc').click(function () {
                \$('a[href=\"#";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 3), "html", null, true);
        echo "\"]').click();
                \$('input[value=\"mrcPriceHike\"]').click();
            });
            \$('a#summaryInfoPodesheveloMrc').click(function () {
                \$('a[href=\"#";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 3), "html", null, true);
        echo "\"]').click();
                \$('input[value=\"mrcDepreciation\"]').click();
            });

            \$('a#summaryInfoBezizmeneniya').click(function () {
                \$('a[href=\"#";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 1), "html", null, true);
        echo "\"]').click();
                \$('input[value=\"phNothing\"]').click();
            });

            \$('a#summaryInfoBezizmeneniyaMrc').click(function () {
                \$('a[href=\"#";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 3), "html", null, true);
        echo "\"]').click();
                \$('input[value=\"mrcNothing\"]').click();
            });

            \$('a#summaryInfoNoInBase').click(function () {
                \$('a[href=\"#";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 2), "html", null, true);
        echo "\"]').click();
                \$('input[value=\"noInBase\"]').click();
            });

            \$('a#summaryInfoNoInPrice').click(function () {
                \$('a[href=\"#";
        // line 43
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 2), "html", null, true);
        echo "\"]').click();
                \$('input[value=\"noInPrice\"]').click();
            });

            \$('a#summaryInfoDisabledInBaseandHasInPrice').click(function () {
                \$('a[href=\"#";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 1), "html", null, true);
        echo "\"]').click();
                \$('input[value=\"phDisabledInBaseandHasInPrice\"]').click();
            });

            \$('a#summaryInfoDisabledInBaseandHasInPriceMrc').click(function () {
                \$('a[href=\"#";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 3), "html", null, true);
        echo "\"]').click();
                \$('input[value=\"mrcDisabledInBaseandHasInPrice\"]').click();
            });

            \$('a#badRecordsQuantity').click(function () {
                \$('a[href=\"#";
        // line 58
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 4), "html", null, true);
        echo "\"]').click();
            });

        });


    </script>
";
    }

    // line 68
    public function block_sonata_pre_fieldsets($context, array $blocks = array())
    {
        // line 69
        echo "
<div class=\"tabbable\">
<ul class=\"nav nav-tabs\">

    ";
        // line 73
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formgroups", array()));
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
        foreach ($context['_seq'] as $context["name"] => $context["form_group"]) {
            // line 74
            echo "        <li class=\"";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo "active";
            }
            echo "\">
            <a href=\"#";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "\" data-toggle=\"tab\">
                <i class=\"icon-exclamation-sign has-errors hide\"></i>
                ";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "trans", array(0 => $context["name"], 1 => array(), 2 => $this->getAttribute($context["form_group"], "translation_domain", array())), "method"), "html", null, true);
            echo "
            </a>
        </li>
        ";
            // line 80
            $context["ind"] = $this->getAttribute($context["loop"], "index", array());
            // line 81
            echo "    ";
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
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['form_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "    ";
        if ($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "priceHike", array(), "any", true, true)) {
            // line 83
            echo "        <li>
            <a href=\"#";
            // line 84
            echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 1), "html", null, true);
            echo "\" data-toggle=\"tab\">
                <i class=\"icon-exclamation-sign has-errors hide\"></i>
                Изменение цены
            </a>
        </li>
    ";
        }
        // line 90
        echo "    ";
        if ($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "outOfStock", array(), "any", true, true)) {
            // line 91
            echo "        <li>
            <a href=\"#";
            // line 92
            echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 2), "html", null, true);
            echo "\" data-toggle=\"tab\">
                <i class=\"icon-exclamation-sign has-errors hide\"></i>
                Нет в наличии
            </a>
        </li>
    ";
        }
        // line 98
        echo "    ";
        if ($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "analysisMRC", array(), "any", true, true)) {
            // line 99
            echo "        <li>
            <a href=\"#";
            // line 100
            echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 3), "html", null, true);
            echo "\" data-toggle=\"tab\">
                <i class=\"icon-exclamation-sign has-errors hide\"></i>
                МРЦ
            </a>
        </li>
    ";
        }
        // line 106
        echo "    ";
        if ($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "analysisBadRecords", array(), "any", true, true)) {
            // line 107
            echo "        <li>
            <a href=\"#";
            // line 108
            echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 4), "html", null, true);
            echo "\" data-toggle=\"tab\">
                <i class=\"icon-exclamation-sign has-errors hide\"></i>
                Испорченные записи
            </a>
        </li>
    ";
        }
        // line 114
        echo "
</ul>
";
    }

    // line 118
    public function block_sonata_tab_content($context, array $blocks = array())
    {
        // line 119
        echo "    <div class=\"tab-content\">
    ";
        // line 120
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formgroups", array()));
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
        foreach ($context['_seq'] as $context["name"] => $context["form_group"]) {
            // line 121
            echo "        <div class=\"tab-pane ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo " active";
            }
            echo "\"
             id=\"";
            // line 122
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "\">
            <fieldset>
                <div class=\"sonata-ba-collapsed-fields\">
                    ";
            // line 125
            if (($this->getAttribute($context["form_group"], "description", array()) != false)) {
                // line 126
                echo "                        <p>";
                echo $this->getAttribute($context["form_group"], "description", array());
                echo "</p>
                    ";
            }
            // line 128
            echo "
                    ";
            // line 129
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["form_group"], "fields", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                // line 130
                echo "                        ";
                if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                    // line 131
                    echo "                            ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), $context["field_name"], array(), "array"), 'row');
                    echo "
                        ";
                }
                // line 133
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 134
            echo "                </div>

                ";
            // line 137
            echo "                ";
            if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array()), "id", array())) {
                // line 138
                echo "                    <div class=\"control-group\">
                        <label class=\"control-label \">
                        </label>

                        <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural  \"
                             style=\"position: relative;\">
                            <div class=\"well well-sm\" style=\"width: 350px; margin-top: 10px; margin-bottom: 0px;\">
                                <h5>Сводная информация</h5>





                                ";
                // line 151
                if ( !$this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array()), "isQuantityProcessed", array())) {
                    // line 152
                    echo "                                    <span class=\"small\" >Прайс начнет обрабатываться с минутной задержкой:</span>
                                    <div id=\"productPriceFormUploadProgress\"
                                         class=\"progress progress-info progress-striped active\">
                                        <div class=\"bar\" style=\"width: 0%;\">
                                            <span>0%</span>
                                        </div>
                                    </div>

                                    <div class=\"alert alert-success alert-dismissable\"
                                         id=\"productPriceFormUploadProgressOk\" style=\"display:none\"></div>
                                    <div class=\"alert alert-error alert-dismissable\"
                                         id=\"productPriceFormUploadProgressError\" style=\"display:none\"></div>
                                    <script>
                                        var intervalProductParceId=setInterval(checkProductParcePriceAnalisysStatus, 3000);

                                        function checkProductParcePriceAnalisysStatus() {
                                            \$.ajax({
                                                url: \"";
                    // line 169
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "getUpdateQuantityProgress", 1 => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array())), "method"), "html", null, true);
                    echo "\", //Server script to process data
                                                type: 'POST',
                                                success: function (res) {
                                                    // var percent = (res.percent / (100 / 80) + 20).toFixed();
                                                    if (typeof(res)=='object') {
                                                        var percent = res.percent;
                                                        SetProductPriceFormUploadProgress(percent);
                                                        if (percent == 100) {
                                                            clearInterval(intervalProductParceId);
                                                            if (res.quantity > 0) {
                                                                var msg = 'Успешно обновлено товаров ' + res.quantity + ' шт. Необходимо обновить страницу. Обновить сейчас?';
                                                                var q=confirm(msg);
                                                                if (q) {
                                                                    location.reload();
                                                                }
                                                            }
                                                            else {
                                                                var msg = 'Парсинг успешно закончился, однако изменения для продуктов не было обнаружено.';
                                                            }
                                                            \$('#productPriceFormUploadProgress').hide();
                                                            \$('#productPriceFormUploadProgressOk').show().html(msg);
                                                        }
                                                        //если ошибка
                                                        if (res.error) {
                                                            clearInterval(intervalProductParceId);
                                                            \$('#productPriceFormUploadProgress').hide();
                                                            \$('#productPriceFormUploadProgressError').show().html(res.error);
                                                        }
                                                    }
                                                    else {

                                                    }
                                                },
                                                error: function (res) {
                                                    clearInterval(intervalProductParceId);
                                                    \$('#productPriceFormUploadProgress').hide();
                                                    \$('#productPriceFormUploadProgressError').show().html('Ошибка парсинга прайса! '+res.statusText);
                                                },
                                                //Options to tell jQuery not to process data or worry about content-type.
                                                cache: false,
                                                contentType: false,
                                                processData: false
                                            });
                                        }

                                        function SetProductPriceFormUploadProgress(percent) {
                                            var \$progres = \$('#productPriceFormUploadProgress');
                                            \$progres.show().css('visibility', 'visible').find('.bar').attr('style', 'width:' + percent + '%').find('span').html(percent + '%');
                                            \$('#productPriceFormUploadProgressOk').hide();
                                            \$('#productPriceFormUploadProgressError').hide();
                                        }
                                    </script>
                                ";
                }
                // line 222
                echo "

                                ";
                // line 224
                if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array()), "isQuantityProcessed", array())) {
                    // line 225
                    echo "                                <div>Всего в прайсе:
                                    <b>";
                    // line 226
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "totalQuantity", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "totalQuantity", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                </div>
                                <div>Испорченных: <a id=\"badRecordsQuantity\"
                                                     href=\"javascript:void(0);\"><b>";
                    // line 229
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "badRecordsQuantity", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "badRecordsQuantity", array()), array(0 => "запись", 1 => "записи", 2 => "записей")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                <div>Подорожало: <a id=\"summaryInfoPodorojalo\"
                                                    href=\"javascript:void(0);\"><b>";
                    // line 233
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "podorojalo", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "podorojalo", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                <div>Подешевело: <a id=\"summaryInfoPodeshevelo\"
                                                    href=\"javascript:void(0);\"><b>";
                    // line 237
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "podeshevelo", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "podeshevelo", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                <div>Без изменения цены: <a id=\"summaryInfoBezizmeneniya\"
                                                            href=\"javascript:void(0);\"><b>";
                    // line 241
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "bezizmeneniya", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "bezizmeneniya", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                <div>Скрыто из доступных: <a id=\"summaryInfoDisabledInBaseandHasInPrice\"
                                                             href=\"javascript:void(0);\"><b>";
                    // line 245
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "disabledInBaseandHasInPrice", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "disabledInBaseandHasInPrice", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                <hr style=\"margin:5px\">
                                <div>Подорожало по МРЦ: <a id=\"summaryInfoPodorojaloMrc\"
                                                           href=\"javascript:void(0);\"><b>";
                    // line 250
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "podorojaloMrc", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "podorojaloMrc", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                <div>Подешевело по МРЦ: <a id=\"summaryInfoPodesheveloMrc\"
                                                           href=\"javascript:void(0);\"><b>";
                    // line 254
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "podesheveloMrc", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "podesheveloMrc", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                <div>Без изменения цены по МРЦ: <a id=\"summaryInfoBezizmeneniyaMrc\"
                                                                   href=\"javascript:void(0);\"><b>";
                    // line 258
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "bezizmeneniyaMrc", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "bezizmeneniyaMrc", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                <div>Скрыто из доступных по МРЦ: <a id=\"summaryInfoDisabledInBaseandHasInPriceMrc\"
                                                                    href=\"javascript:void(0);\"><b>";
                    // line 262
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "disabledInBaseandHasInPriceMrc", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "disabledInBaseandHasInPriceMrc", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                <hr style=\"margin:5px\">
                                <div>Нет в базе: <a id=\"summaryInfoNoInBase\"
                                                    href=\"javascript:void(0);\"><b>";
                    // line 267
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "noInBase", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "noInBase", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                <div>Нет у поставщика: <a id=\"summaryInfoNoInPrice\"
                                                          href=\"javascript:void(0);\"><b>";
                    // line 271
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "noInPrice", array()), "html", null, true);
                    echo "</b> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "summaryInfo", array()), "noInPrice", array()), array(0 => "товар", 1 => "товара", 2 => "товаров")), "html", null, true);
                    echo "
                                    </a>
                                </div>
                                ";
                }
                // line 275
                echo "                            </div>
                        </div>
                    </div>
                ";
            }
            // line 279
            echo "
            </fieldset>
        </div>
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
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['form_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 283
        echo "
    ";
        // line 285
        echo "    ";
        if ($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "priceHike", array(), "any", true, true)) {
            // line 286
            echo "        ";
            $this->env->loadTemplate("CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:priceHike.html.twig")->display($context);
            // line 287
            echo "    ";
        }
        // line 288
        echo "
    ";
        // line 290
        echo "    ";
        if ($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "outOfStock", array(), "any", true, true)) {
            // line 291
            echo "        ";
            $this->env->loadTemplate("CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:outOfStock.html.twig")->display($context);
            // line 292
            echo "    ";
        }
        // line 293
        echo "
    ";
        // line 295
        echo "    ";
        if ($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "analysisMRC", array(), "any", true, true)) {
            // line 296
            echo "        ";
            $this->env->loadTemplate("CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:mrc.html.twig")->display($context);
            // line 297
            echo "    ";
        }
        // line 298
        echo "
    ";
        // line 300
        echo "    ";
        if ($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "analysisBadRecords", array(), "any", true, true)) {
            // line 301
            echo "        ";
            $this->env->loadTemplate("CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:badRecords.html.twig")->display($context);
            // line 302
            echo "    ";
        }
        // line 303
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/SupplierPriceAnalysis:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  660 => 303,  657 => 302,  654 => 301,  651 => 300,  648 => 298,  645 => 297,  642 => 296,  639 => 295,  636 => 293,  633 => 292,  630 => 291,  627 => 290,  624 => 288,  621 => 287,  618 => 286,  615 => 285,  612 => 283,  595 => 279,  589 => 275,  580 => 271,  571 => 267,  561 => 262,  552 => 258,  543 => 254,  534 => 250,  524 => 245,  515 => 241,  506 => 237,  497 => 233,  488 => 229,  480 => 226,  477 => 225,  475 => 224,  471 => 222,  415 => 169,  396 => 152,  394 => 151,  379 => 138,  376 => 137,  372 => 134,  366 => 133,  360 => 131,  357 => 130,  353 => 129,  350 => 128,  344 => 126,  342 => 125,  334 => 122,  327 => 121,  310 => 120,  307 => 119,  304 => 118,  298 => 114,  287 => 108,  284 => 107,  281 => 106,  270 => 100,  267 => 99,  264 => 98,  253 => 92,  250 => 91,  247 => 90,  236 => 84,  233 => 83,  230 => 82,  216 => 81,  214 => 80,  208 => 77,  201 => 75,  194 => 74,  177 => 73,  171 => 69,  168 => 68,  154 => 58,  144 => 53,  134 => 48,  124 => 43,  114 => 38,  104 => 33,  94 => 28,  84 => 23,  75 => 19,  65 => 14,  55 => 9,  46 => 4,  43 => 3,  39 => 1,  37 => 67,  35 => 66,  11 => 1,);
    }
}
