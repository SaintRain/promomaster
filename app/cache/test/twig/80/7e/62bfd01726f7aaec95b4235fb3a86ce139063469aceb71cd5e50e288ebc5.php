<?php

/* CoreProductBundle:Command:ymlOffers.html.twig */
class __TwigTemplate_807e62bfd01726f7aaec95b4235fb3a86ce139063469aceb71cd5e50e288ebc5 extends Twig_Template
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
        // line 2
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 3
            echo "        <offer id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "id", array()), "html", null, true);
            echo "\" type=\"vendor.model\" available=\"";
            if ($this->getAttribute($context["p"], "orderOnly", array())) {
                echo "false";
            } else {
                echo "true";
            }
            echo "\">
            <url>http://";
            // line 4
            echo twig_escape_filter($this->env, (isset($context["domain_ru"]) ? $context["domain_ru"] : $this->getContext($context, "domain_ru")), "html", null, true);
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute($context["p"], "slug", array()))), "html", null, true);
            echo "</url>
            <price>";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "price", array()), "html", null, true);
            echo "</price>
            <currencyId>RUB</currencyId>
            <categoryId>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "categoryMain", array()), "id", array()), "html", null, true);
            echo "</categoryId>
                ";
            // line 8
            if ($this->getAttribute($context["p"], "images", array())) {
                // line 9
                echo "                    ";
                $context["sliceCount"] = 9;
                // line 10
                echo "                <picture>http://";
                echo twig_escape_filter($this->env, (isset($context["domain_ru"]) ? $context["domain_ru"] : $this->getContext($context, "domain_ru")), "html", null, true);
                if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($context["p"], "images", array()))) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($context["p"], "images", array()), "watermark", "watermark_")), "html", null, true);
                }
                echo "</picture>
                ";
            } else {
                // line 12
                echo "                    ";
                $context["sliceCount"] = 10;
                // line 13
                echo "                ";
            }
            // line 14
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute($context["p"], "images", array()), 0, (isset($context["sliceCount"]) ? $context["sliceCount"] : $this->getContext($context, "sliceCount"))));
            foreach ($context['_seq'] as $context["_key"] => $context["img"]) {
                // line 15
                echo "                    ";
                // line 16
                echo "                <picture>http://";
                echo twig_escape_filter($this->env, (isset($context["domain_ru"]) ? $context["domain_ru"] : $this->getContext($context, "domain_ru")), "html", null, true);
                if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["img"])) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["img"], "watermark", "watermark_")), "html", null, true);
                }
                echo "</picture>
                    ";
                // line 18
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['img'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "            <delivery>";
            if ($this->getAttribute($context["p"], "IsPhysical", array())) {
                echo "true";
            } else {
                echo "false";
            }
            echo "</delivery>
            <local_delivery_cost>";
            // line 20
            if ($this->getAttribute($context["p"], "IsPhysical", array())) {
                echo "300";
            } else {
                echo "0";
            }
            echo "</local_delivery_cost>
            <typePrefix>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "typePrefix", array()), "html", null, true);
            echo "</typePrefix>
            <vendor>";
            // line 22
            if ($this->getAttribute($context["p"], "manufacturerMain", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "manufacturerMain", array()), "captionRu", array()), "html", null, true);
            } else {
            }
            echo "</vendor>
            <vendorCode>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "sku", array()), "html", null, true);
            echo "</vendorCode>
            <model>";
            // line 24
            if ($this->getAttribute($context["p"], "ymlCaption", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "ymlCaption", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "captionRu", array()), "html", null, true);
            }
            echo "</model>
            <description>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "shortDescriptionRu", array()), "html", null, true);
            echo "</description>
            <sales_notes>100% предоплата или наложенный платеж.</sales_notes>
            <manufacturer_warranty>";
            // line 29
            if ($this->getAttribute($context["p"], "warrantyMonths", array())) {
                // line 31
                $context["years"] = intval(floor(($this->getAttribute($context["p"], "warrantyMonths", array()) / 12)));
                // line 32
                $context["months"] = ($this->getAttribute($context["p"], "warrantyMonths", array()) % 12);
                // line 34
                if ((((isset($context["years"]) ? $context["years"] : $this->getContext($context, "years")) > 0) || ((isset($context["months"]) ? $context["months"] : $this->getContext($context, "months")) > 0))) {
                    // line 35
                    echo "P";
                }
                // line 38
                if (((isset($context["years"]) ? $context["years"] : $this->getContext($context, "years")) > 0)) {
                    // line 39
                    echo twig_escape_filter($this->env, (isset($context["years"]) ? $context["years"] : $this->getContext($context, "years")), "html", null, true);
                    echo "Y";
                }
                // line 42
                if (((isset($context["months"]) ? $context["months"] : $this->getContext($context, "months")) > 0)) {
                    // line 43
                    echo twig_escape_filter($this->env, (isset($context["months"]) ? $context["months"] : $this->getContext($context, "months")), "html", null, true);
                    echo "M";
                }
            } else {
                // line 47
                echo "false";
            }
            // line 50
            echo "</manufacturer_warranty>
            <country_of_origin>";
            // line 51
            if ($this->getAttribute($context["p"], "countryOfOrigin", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "countryOfOrigin", array()), "captionRu", array()), "html", null, true);
            } else {
            }
            echo "</country_of_origin>
                ";
            // line 52
            $context["isProcessed"] = array();
            // line 53
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["p"], "productDataProperty", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["pdp"]) {
                // line 54
                echo "                    ";
                if ((!twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()), twig_get_array_keys_filter(array(0 => "sex", 1 => "age", 2 => "toy_property"))) && $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "isEnabledInYml", array()))) {
                    // line 55
                    echo "                        ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "editType", array()) == "input")) {
                        // line 56
                        echo "                        <param name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "captionRu", array()), "html", null, true);
                        echo "\" ";
                        if ($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "defaultUnit", array())) {
                            echo "unit=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "defaultUnit", array()), "shortCaptionRu", array()), "html", null, true);
                            echo "\"";
                        }
                        echo ">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["pdp"], "valueNumeric", array()), "html", null, true);
                        echo "</param>
                    ";
                    }
                    // line 58
                    echo "                    ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "editType", array()) == "input_text")) {
                        // line 59
                        echo "                        <param name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "captionRu", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["pdp"], "value", array()), "html", null, true);
                        echo "</param>
                    ";
                    }
                    // line 61
                    echo "                    ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "editType", array()) == "select")) {
                        // line 62
                        echo "                        <param name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "captionRu", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array()), "html", null, true);
                        echo "</param>
                    ";
                    }
                    // line 64
                    echo "                    ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "editType", array()) == "radio")) {
                        // line 65
                        echo "                        <param name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "captionRu", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array()), "html", null, true);
                        echo "</param>
                    ";
                    }
                    // line 67
                    echo "                    ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "editType", array()) == "checkbox")) {
                        // line 68
                        echo "                        <param name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "captionRu", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array()), "html", null, true);
                        echo "</param>
                    ";
                    }
                    // line 70
                    echo "                    ";
                    if ((($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "editType", array()) == "multiselect") && !twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()), (isset($context["isProcessed"]) ? $context["isProcessed"] : $this->getContext($context, "isProcessed"))))) {
                        // line 71
                        echo "                        ";
                        $context["isProcessed"] = twig_array_merge((isset($context["isProcessed"]) ? $context["isProcessed"] : $this->getContext($context, "isProcessed")), array(0 => $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array())));
                        // line 72
                        echo "                        <param name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "captionRu", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute($context["p"], "multiselectDataToStr", array()), $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()), array(), "array"), ", "), "html", null, true);
                        echo "</param>
                    ";
                    }
                    // line 74
                    echo "                ";
                }
                // line 75
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pdp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "
            ";
            // line 78
            echo "            ";
            if ($this->getAttribute($this->getAttribute($context["p"], "serie", array(), "any", false, true), "captionRu", array(), "any", true, true)) {
                // line 79
                echo "                <param name=\"Линейка\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "serie", array()), "captionRu", array()), "html", null, true);
                echo "</param>
            ";
            }
            // line 81
            echo "            ";
            // line 82
            echo "
            ";
            // line 83
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["p"], "productDataProperty", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["pdp"]) {
                // line 84
                echo "                ";
                if ((($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()) == "sex") && $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "isEnabledInYml", array()))) {
                    // line 85
                    echo "                    <param name=\"Пол\">";
                    if (($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "name", array()) == "boy")) {
                        echo "Женский";
                    } else {
                        echo "Мужской";
                    }
                    echo "</param>
                ";
                }
                // line 87
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pdp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "
            ";
            // line 90
            echo "            ";
            $context["age"] = $this->getAttribute($context["p"], "getPDPByPropertyName", array(0 => "age"), "method");
            // line 91
            echo "            ";
            if (($this->getAttribute((isset($context["age"]) ? $context["age"] : null), "data", array(), "any", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["age"]) ? $context["age"] : $this->getContext($context, "age")), "data", array()), "property", array()), "isEnabledInYml", array()))) {
                // line 92
                echo "                ";
                $context["fromTo"] = twig_split_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["age"]) ? $context["age"] : $this->getContext($context, "age")), "data", array()), "value", array()), "-");
                // line 93
                echo "                <param name=\"Возраст от\" unit=\"лет\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["fromTo"]) ? $context["fromTo"] : $this->getContext($context, "fromTo")), 0, array(), "array"), "html", null, true);
                echo "</param>
                <param name=\"Возраст до\" unit=\"лет\">";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["fromTo"]) ? $context["fromTo"] : $this->getContext($context, "fromTo")), 1, array(), "array"), "html", null, true);
                echo "</param>
            ";
            }
            // line 96
            echo "            ";
            // line 97
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["p"], "productDataProperty", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["pdp"]) {
                // line 98
                echo "                ";
                if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()) == "toy_property")) {
                    // line 99
                    echo "                    <param name=\"Свойство игрушки\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array()), "html", null, true);
                    echo "</param>
                ";
                }
                // line 101
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pdp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            echo "
            ";
            // line 104
            echo "            ";
            if ($this->getAttribute($context["p"], "widthOfProduct", array())) {
                // line 105
                echo "                <param name=\"Ширина\" unit=\"см\">";
                echo twig_escape_filter($this->env, twig_round(($this->getAttribute($context["p"], "widthOfProduct", array()) / 10)), "html", null, true);
                echo "</param>
            ";
            }
            // line 107
            echo "
            ";
            // line 108
            if ($this->getAttribute($context["p"], "heightOfProduct", array())) {
                // line 109
                echo "                <param name=\"Высота\" unit=\"см\">";
                echo twig_escape_filter($this->env, twig_round(($this->getAttribute($context["p"], "heightOfProduct", array()) / 10)), "html", null, true);
                echo "</param>
            ";
            }
            // line 111
            echo "
            ";
            // line 112
            if ($this->getAttribute($context["p"], "lengthOfProduct", array())) {
                // line 113
                echo "                <param name=\"Длина\" unit=\"см\">";
                echo twig_escape_filter($this->env, twig_round(($this->getAttribute($context["p"], "lengthOfProduct", array()) / 10)), "html", null, true);
                echo "</param>
            ";
            }
            // line 115
            echo "            ";
            if ($this->getAttribute($context["p"], "netWeight", array())) {
                // line 116
                echo "                <param name=\"Вес\" unit=\"кг\">";
                if ($this->getAttribute($context["p"], "isNetWeightInGm", array())) {
                    echo twig_escape_filter($this->env, twig_round(($this->getAttribute($context["p"], "netWeight", array()) / 1000), 4, "floor"), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "netWeight", array()), "html", null, true);
                }
                echo "</param>
            ";
            }
            // line 118
            echo "        </offer>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Command:ymlOffers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  399 => 118,  389 => 116,  386 => 115,  380 => 113,  378 => 112,  375 => 111,  369 => 109,  367 => 108,  364 => 107,  358 => 105,  355 => 104,  352 => 102,  346 => 101,  340 => 99,  337 => 98,  332 => 97,  330 => 96,  325 => 94,  320 => 93,  317 => 92,  314 => 91,  311 => 90,  308 => 88,  302 => 87,  292 => 85,  289 => 84,  285 => 83,  282 => 82,  280 => 81,  274 => 79,  271 => 78,  268 => 76,  262 => 75,  259 => 74,  251 => 72,  248 => 71,  245 => 70,  237 => 68,  234 => 67,  226 => 65,  223 => 64,  215 => 62,  212 => 61,  204 => 59,  201 => 58,  187 => 56,  184 => 55,  181 => 54,  176 => 53,  174 => 52,  167 => 51,  164 => 50,  161 => 47,  156 => 43,  154 => 42,  150 => 39,  148 => 38,  145 => 35,  143 => 34,  141 => 32,  139 => 31,  137 => 29,  132 => 25,  124 => 24,  120 => 23,  113 => 22,  109 => 21,  101 => 20,  92 => 19,  86 => 18,  78 => 16,  76 => 15,  71 => 14,  68 => 13,  65 => 12,  56 => 10,  53 => 9,  51 => 8,  47 => 7,  42 => 5,  37 => 4,  26 => 3,  21 => 2,  19 => 1,);
    }
}
