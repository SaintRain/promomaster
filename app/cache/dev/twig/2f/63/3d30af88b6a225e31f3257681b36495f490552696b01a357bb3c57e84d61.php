<?php

/* CoreOrderBundle:Admin\Form\Order\type:products_in_order_widget.html.twig */
class __TwigTemplate_2f633d30af88b6a225e31f3257681b36495f490552696b01a357bb3c57e84d61 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'products_in_order_widget' => array($this, 'block_products_in_order_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('products_in_order_widget', $context, $blocks);
    }

    public function block_products_in_order_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        $context["order"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array());
        // line 3
        echo "                
        ";
        // line 4
        $context["costInfo"] = $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "costInfo", array());
        // line 5
        echo "
            ";
        // line 6
        if ( !$this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "hasassociationadmin", array())) {
            // line 7
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 8
                echo "                    ";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_admin')->renderRelationElement($context["element"], $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array())), "html", null, true);
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "            ";
        } else {
            // line 11
            echo "

                <div id=\"field_container_";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\" class=\"field-container\">
                    <span id=\"field_widget_";
            // line 14
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\" >
                        ";
            // line 15
            if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "edit", array()) == "inline")) {
                // line 16
                echo "                            ";
                if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "inline", array()) == "table")) {
                    // line 17
                    echo "                                ";
                    if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) > 0)) {
                        // line 18
                        echo "                                    <table class=\"table table-bordered\">
                                        <thead>
                                            <tr>
                                                ";
                        // line 21
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "children", array()));
                        foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                            // line 22
                            echo "                                                    ";
                            if (($context["field_name"] == "_delete")) {
                                // line 23
                                echo "                                                        <th>
                                                            Уд.
                                                        </th>
                                                    ";
                            } else {
                                // line 27
                                echo "                                                        <th ";
                                echo (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "required", array(), "array")) ? ("class=\"required\"") : (""));
                                if (($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "attr", array(), "array", false, true), "hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "attr", array(), "array"), "hidden", array(), "array"))) {
                                    echo " style=\"display:none;\"";
                                }
                                echo ">
                                                            ";
                                // line 28
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array(), "array"), "admin", array()), "trans", array(0 => $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "label", array())), "method"), "html", null, true);
                                echo "
                                                        </th>
                                                    ";
                            }
                            // line 31
                            echo "                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 32
                        echo "
                                                ";
                        // line 33
                        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array(), "any", true, true)) {
                            // line 34
                            echo "                                                    <th style=\"width:300px\">
                                                        Бронирование по складам
                                                    </th>
                                                ";
                        }
                        // line 38
                        echo "
                                            </tr>
                                        </thead>
                                        <tbody class=\"sonata-ba-tbody\">
                                            ";
                        // line 42
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()));
                        foreach ($context['_seq'] as $context["nested_group_field_name"] => $context["nested_group_field"]) {
                            // line 43
                            echo "                                                ";
                            $context["composition"] = $this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array());
                            // line 44
                            echo "                                                    <tr>
                                                        ";
                            // line 45
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["nested_group_field"], "children", array()));
                            foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                                // line 46
                                echo "
                                                            <td class=\"sonata-ba-td-";
                                // line 47
                                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                                echo "-";
                                echo twig_escape_filter($this->env, $context["field_name"], "html", null, true);
                                echo " control-group";
                                if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                                    echo " error";
                                }
                                echo "\"";
                                if (($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "attr", array(), "array", false, true), "hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "attr", array(), "array"), "hidden", array(), "array"))) {
                                    echo " style=\"display:none;\"";
                                }
                                echo ">
                                                                ";
                                // line 48
                                if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "associationadmin", array(), "any", false, true), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                                    // line 49
                                    echo "                                                                    ";
                                    // line 50
                                    echo "                                                                    ";
                                    if ((($context["field_name"] == "product") && $this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "product", array()))) {
                                        // line 51
                                        echo "                                                                        ";
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("read_only" => true));
                                        echo "
                                                                    ";
                                    } else {
                                        // line 53
                                        echo "
                                                                ";
                                        // line 54
                                        if (($context["field_name"] == "defaultSupplier")) {
                                            // line 55
                                            echo "                                                                    ";
                                            if (( !$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "shippedDateTime", array()) ||  !$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()), "vars", array()), "valid", array()))) {
                                                // line 56
                                                echo "                                                                    ";
                                                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("read_only" => false, "disabled" => false));
                                                echo "
                                                                        ";
                                            } else {
                                                // line 58
                                                echo "                                                                            ";
                                                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("disabled" => true));
                                                echo "
                                                                        ";
                                            }
                                            // line 60
                                            echo "                                                                ";
                                        } else {
                                            // line 61
                                            echo "                                                                    ";
                                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                            echo "
                                                                    ";
                                        }
                                        // line 63
                                        echo "
                                                                    ";
                                    }
                                    // line 65
                                    echo "
                                                                    ";
                                    // line 67
                                    echo "                                                                    ";
                                    if (($context["field_name"] == "discountValue")) {
                                        // line 68
                                        echo "                                                                        ";
                                        if (($this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "isDiscountValueInPercent", array()) ||  !$this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "id", array()))) {
                                            // line 69
                                            echo "                                                                            %
                                                                        ";
                                        } else {
                                            // line 71
                                            echo "                                                                            ";
                                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                                            echo "
                                                                        ";
                                        }
                                        // line 73
                                        echo "                                                                    ";
                                    }
                                    // line 74
                                    echo "
                                                                    ";
                                    // line 76
                                    echo "                                                                    ";
                                    if (($context["field_name"] == "quantity")) {
                                        // line 77
                                        echo "                                                                        ";
                                        if ($this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "product", array())) {
                                            // line 78
                                            echo "                                                                            ";
                                            $context["totalQuantity"] = 0;
                                            // line 79
                                            echo "                                                                                ";
                                            $context['_parent'] = (array) $context;
                                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "product", array()), "productAvailability", array()));
                                            foreach ($context['_seq'] as $context["_key"] => $context["pa"]) {
                                                // line 80
                                                echo "                                                                                    ";
                                                $context["totalQuantity"] = ((isset($context["totalQuantity"]) ? $context["totalQuantity"] : $this->getContext($context, "totalQuantity")) + $this->getAttribute($context["pa"], "quantity", array()));
                                                // line 81
                                                echo "                                                                                        ";
                                            }
                                            $_parent = $context['_parent'];
                                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pa'], $context['_parent'], $context['loop']);
                                            $context = array_intersect_key($context, $_parent) + $_parent;
                                            // line 82
                                            echo "                                                                                            ";
                                            if ((isset($context["totalQuantity"]) ? $context["totalQuantity"] : $this->getContext($context, "totalQuantity"))) {
                                                // line 83
                                                echo "                                                                                                &nbsp;<span class=\"label\" title=\"Количество товара доступное для бронирования\">";
                                                echo twig_escape_filter($this->env, (isset($context["totalQuantity"]) ? $context["totalQuantity"] : $this->getContext($context, "totalQuantity")), "html", null, true);
                                                echo " шт.</span>
                                                                                            ";
                                            } else {
                                                // line 85
                                                echo "                                                                                                &nbsp;<span class=\"label label-important\" title=\"Товар закончился\">нет</span>
                                                                                            ";
                                            }
                                            // line 87
                                            echo "                                                                                            ";
                                        }
                                        // line 88
                                        echo "                                                                                                ";
                                    }
                                    // line 89
                                    echo "
                                                                                                    ";
                                    // line 90
                                    $context["dummy"] = $this->getAttribute($context["nested_group_field"], "setrendered", array());
                                    // line 91
                                    echo "                                                                                                        ";
                                } else {
                                    // line 92
                                    echo "
                                                                                                            ";
                                    // line 94
                                    echo "                                                                                                            ";
                                    if ((($context["field_name"] == "product") && $this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "product", array()))) {
                                        // line 95
                                        echo "                                                                                                                ";
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("read_only" => true));
                                        echo "
                                                                                                            ";
                                    } else {
                                        // line 97
                                        echo "                                                                                                                ";
                                        // line 98
                                        echo "                                                                                                                ";
                                        if (($this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "units", array()), "count", array()) || $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "read_only", array(), "array"))) {
                                            // line 99
                                            echo "                                                                                                                    ";
                                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("disabled" => true));
                                            echo "
                                                                                                                ";
                                        } else {
                                            // line 101
                                            echo "                                                                                                                    ";
                                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                            echo "
                                                                                                                ";
                                        }
                                        // line 103
                                        echo "
                                                                                                            ";
                                    }
                                    // line 105
                                    echo "

                                                                                                            ";
                                }
                                // line 108
                                echo "                                                                                                                ";
                                if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                                    // line 109
                                    echo "                                                                                                                    <div class=\"help-inline sonata-ba-field-error-messages\">
                                                                                                                        ";
                                    // line 110
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'errors');
                                    echo "
                                                                                                                    </div>
                                                                                                                ";
                                }
                                // line 113
                                echo "
                                                                                                            </td>


                                                                                                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 118
                            echo "                                                                                                                ";
                            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array(), "any", true, true)) {
                                // line 119
                                echo "                                                                                                                    <td>

                                                                                                                        ";
                                // line 122
                                echo "                                                                                                                        ";
                                if ($this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "booking", array())) {
                                    // line 123
                                    echo "                                                                                                                            ";
                                    $context['_parent'] = (array) $context;
                                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "booking", array()));
                                    foreach ($context['_seq'] as $context["_key"] => $context["pb"]) {
                                        // line 124
                                        echo "                                                                                                                                ";
                                        if ($this->getAttribute($context["pb"], "id", array())) {
                                            // line 125
                                            echo "
                                                                                                                                    <div>
                                                                                                                                        <a href=\"";
                                            // line 127
                                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_logistics_stock_edit", array("id" => $this->getAttribute($this->getAttribute($context["pb"], "stock", array()), "id", array()))), "html", null, true);
                                            echo "\"><b>";
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["pb"], "stock", array()), "captionRu", array()), "html", null, true);
                                            echo "</b></a>

                                                                                                                                        <!--
                                                                                                                                        <a href=\"#\" title=\"некоторые позиции в данный момент в транзите, остальные можно отправить в транзит\" class=\"truck-exclamation\" data-stock=\"";
                                            // line 130
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["pb"], "stock", array()), "id", array()), "html", null, true);
                                            echo "\" data-quantity=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["pb"], "quantity", array()), "html", null, true);
                                            echo "\" data-composition=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "id", array()), "html", null, true);
                                            echo "\">
                                                                                                                                        <img src=\"";
                                            // line 131
                                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/img/truck-exclamation.png"), "html", null, true);
                                            echo "\"/>
                                                                                                                                        </a>
                                                                                                                                        -->
                                                                                                                                        &nbsp;
                                                                                                                                        <span class=\"truck-arrow\" data-stock=\"";
                                            // line 135
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["pb"], "stock", array()), "id", array()), "html", null, true);
                                            echo "\" data-composition=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "id", array()), "html", null, true);
                                            echo "\" ";
                                            if ( !$this->getAttribute($context["pb"], "transit", array())) {
                                                echo " style=\"display:none\" ";
                                            }
                                            echo ">
                                                                                                                                            <img  title=\"все позиции уже в транзите в данный момент\" src=\"";
                                            // line 136
                                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/img/truck-arrow.png"), "html", null, true);
                                            echo "\" />
                                                                                                                                            &nbsp;
                                                                                                                                            ";
                                            // line 138
                                            if (($this->getAttribute($context["pb"], "transit", array()) && $this->getAttribute($this->getAttribute($context["pb"], "transit", array()), "toStock", array()))) {
                                                // line 139
                                                echo "                                                                                                                                                <a ";
                                                if ($this->getAttribute($this->getAttribute($context["pb"], "transit", array()), "status", array())) {
                                                    echo "title=\"";
                                                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["pb"], "transit", array()), "status", array()), "captionRu", array()), "html", null, true);
                                                    echo "\"";
                                                }
                                                echo " href=\"";
                                                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_logistics_stock_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($context["pb"], "transit", array()), "toStock", array()), "id", array()))), "html", null, true);
                                                echo "\">";
                                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["pb"], "transit", array()), "toStock", array()), "captionRu", array()), "html", null, true);
                                                echo "</a>
                                                                                                                                            ";
                                            }
                                            // line 141
                                            echo "                                                                                                                                        </span>

                                                                                                                                        ";
                                            // line 143
                                            if (($this->getAttribute($this->getAttribute($context["pb"], "stock", array()), "id", array()) != $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "stock", array()), "id", array()))) {
                                                // line 144
                                                echo "                                                                                                                                            <a class=\"truck-plus\" ";
                                                if ($this->getAttribute($context["pb"], "transit", array())) {
                                                    echo " style=\"display:none\" ";
                                                }
                                                echo " href=\"#\" title=\"позиции можно отправить в транзит\" data-book=\"";
                                                echo twig_escape_filter($this->env, $this->getAttribute($context["pb"], "id", array()), "html", null, true);
                                                echo "\"  data-stock=\"";
                                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["pb"], "stock", array()), "id", array()), "html", null, true);
                                                echo "\" data-quantity=\"";
                                                echo twig_escape_filter($this->env, $this->getAttribute($context["pb"], "quantity", array()), "html", null, true);
                                                echo "\" data-composition=\"";
                                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "id", array()), "html", null, true);
                                                echo "\">
                                                                                                                                                <img src=\"";
                                                // line 145
                                                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/img/truck-plus.png"), "html", null, true);
                                                echo "\"/>
                                                                                                                                            </a>
                                                                                                                                        ";
                                            }
                                            // line 148
                                            echo "
                                                                                                                                    </div>
                                                                                                                                    <div>
                                                                                                                                        <span class=\"label  label-success\">Забронировано ";
                                            // line 151
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["pb"], "quantity", array()), "html", null, true);
                                            echo " шт.</span>
                                                                                                                                        ";
                                            // line 152
                                            $context['_parent'] = (array) $context;
                                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : $this->getContext($context, "composition")), "product", array()), "productAvailability", array()));
                                            foreach ($context['_seq'] as $context["_key"] => $context["pa"]) {
                                                // line 153
                                                echo "                                                                                                                                            ";
                                                if (($this->getAttribute($this->getAttribute($context["pa"], "stock", array()), "id", array()) == $this->getAttribute($this->getAttribute($context["pb"], "stock", array()), "id", array()))) {
                                                    // line 154
                                                    echo "                                                                                                                                                ";
                                                    if (($this->getAttribute($context["pa"], "quantity", array()) > 0)) {
                                                        // line 155
                                                        echo "                                                                                                                                                    <span class=\"label label-info\" >Осталось ";
                                                        echo twig_escape_filter($this->env, $this->getAttribute($context["pa"], "quantity", array()), "html", null, true);
                                                        echo " шт.</span>
                                                                                                                                                ";
                                                    } else {
                                                        // line 157
                                                        echo "                                                                                                                                                    <span class=\"label label-important\" >Товара нет</span>
                                                                                                                                                ";
                                                    }
                                                    // line 159
                                                    echo "                                                                                                                                            ";
                                                }
                                                // line 160
                                                echo "                                                                                                                                        ";
                                            }
                                            $_parent = $context['_parent'];
                                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pa'], $context['_parent'], $context['loop']);
                                            $context = array_intersect_key($context, $_parent) + $_parent;
                                            // line 161
                                            echo "                                                                                                                                    </div>
                                                                                                                                ";
                                        }
                                        // line 163
                                        echo "                                                                                                                            ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pb'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 164
                                    echo "                                                                                                                        ";
                                }
                                // line 165
                                echo "                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                ";
                            }
                            // line 168
                            echo "
                                                                                                            </tr>
                                                                                                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['nested_group_field_name'], $context['nested_group_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 171
                        echo "                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                                <div id=\"orderInfoBlockSource\">
                                                                                                        ";
                        // line 174
                        $context["weightVolumeInfo"] = $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "weightVolumeInfo", array());
                        // line 175
                        echo "                                                                                                            <div class=\"well well-sm\" style=\"float:right; width: 350px; margin-left: 15px; margin-top: 10px; margin-bottom: 0px;\">
                                                                                                                ";
                        // line 176
                        if ((( !$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isShippedStatus", array()) &&  !$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isCanceledStatus", array())) && $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "renewal_info_is_different", array(), "any", true, true))) {
                            echo "Всё, что нужно отгрузить";
                        }
                        // line 177
                        echo "                                                                                                                <div>Всего: <b>";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "total_quantity", array()), "html", null, true);
                        echo " шт.</b></div>
                                                                                                                <div>Общий вес: <b>";
                        // line 178
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["weightVolumeInfo"]) ? $context["weightVolumeInfo"] : $this->getContext($context, "weightVolumeInfo")), "weight", array()), "html", null, true);
                        echo " кг</b>&nbsp;&nbsp;&nbsp;Общий объем: <b>";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["weightVolumeInfo"]) ? $context["weightVolumeInfo"] : $this->getContext($context, "weightVolumeInfo")), "volume", array()), "html", null, true);
                        echo " м3</b></div>
                                                                                                                <div>Стоимость без скидки, без доставки: <b>";
                        // line 179
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "composition_total_price", array())), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                        echo "</b></div>
                                                                                                                <div>Стоимость со скидкой, без доставки: <b>";
                        // line 180
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "composition_total_cost", array())), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                        echo "</b></div>
                                                                                                                <div>Общая скидка: ";
                        // line 181
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "total_discount", array()), "html", null, true);
                        echo " % = ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "total_discount_summ", array())), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                        echo "</div>
                                                                                                                <div>Доставка: <b>
                                                                                                                        ";
                        // line 183
                        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isDeliveryIncludedInPayment", array())) {
                            // line 184
                            echo "                                                                                                                            ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "delivery_cost", array())), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                            echo "
                                                                                                                        ";
                        } else {
                            // line 186
                            echo "                                                                                                                            оплачивается отдельно
                                                                                                                        ";
                        }
                        // line 188
                        echo "                                                                                                                    </b></div>
                                                                                                                <div>Общая стоимость: <span class=\"label label-success\">";
                        // line 189
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "total_cost", array())), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                        echo "</span> <span class=\"label\">";
                        if ( !$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array())) {
                            echo " Без НДС";
                        } else {
                            echo " НДС ";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()), "html", null, true);
                            echo " %";
                        }
                        echo "</span></div>
                                                                                                            </div>


                                                                                                            ";
                        // line 193
                        if (((($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "shippedDateTime", array()) &&  !$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isShippedStatus", array())) &&  !$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isCanceledStatus", array())) && $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "renewal_info_is_different", array(), "any", true, true))) {
                            // line 194
                            echo "                                                                                                                ";
                            $context["costInfoHistory"] = $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "history_info", array());
                            // line 195
                            echo "                                                                                                                    ";
                            $context["weightVolumeInfoHistory"] = $this->getAttribute((isset($context["costInfoHistory"]) ? $context["costInfoHistory"] : $this->getContext($context, "costInfoHistory")), "weightVolumeInfo", array());
                            // line 196
                            echo "                                                                                                                        <div class=\"well well-sm\" style=\"float:right; width: 350px; margin-top: 10px; margin-bottom: 0px;color:gray\">
                                                                                                                            Вместе с ранее отгруженными продуктами
                                                                                                                            <div>Всего: <b>";
                            // line 198
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["costInfoHistory"]) ? $context["costInfoHistory"] : $this->getContext($context, "costInfoHistory")), "total_quantity", array()), "html", null, true);
                            echo " шт.</b></div>
                                                                                                                            <div>Общий вес: <b>";
                            // line 199
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["weightVolumeInfoHistory"]) ? $context["weightVolumeInfoHistory"] : $this->getContext($context, "weightVolumeInfoHistory")), "weight", array()), "html", null, true);
                            echo " кг</b>&nbsp;&nbsp;&nbsp;Общий объем: <b>";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["weightVolumeInfoHistory"]) ? $context["weightVolumeInfoHistory"] : $this->getContext($context, "weightVolumeInfoHistory")), "volume", array()), "html", null, true);
                            echo " м3</b></div>
                                                                                                                            <div>Стоимость без скидки, без доставки: <b>";
                            // line 200
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfoHistory"]) ? $context["costInfoHistory"] : $this->getContext($context, "costInfoHistory")), "composition_total_price", array())), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                            echo "</b></div>
                                                                                                                            <div>Стоимость со скидкой, без доставки: <b>";
                            // line 201
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfoHistory"]) ? $context["costInfoHistory"] : $this->getContext($context, "costInfoHistory")), "composition_total_cost", array())), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                            echo "</b></div>
                                                                                                                            <div>Общая скидка: ";
                            // line 202
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["costInfoHistory"]) ? $context["costInfoHistory"] : $this->getContext($context, "costInfoHistory")), "total_discount", array()), "html", null, true);
                            echo " % = ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfoHistory"]) ? $context["costInfoHistory"] : $this->getContext($context, "costInfoHistory")), "total_discount_summ", array())), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                            echo "</div>
                                                                                                                            <div>Доставка: <b>
                                                                                                                                    ";
                            // line 204
                            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isDeliveryIncludedInPayment", array())) {
                                // line 205
                                echo "                                                                                                                                        ";
                                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfoHistory"]) ? $context["costInfoHistory"] : $this->getContext($context, "costInfoHistory")), "delivery_cost", array())), "html", null, true);
                                echo " ";
                                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                                echo "
                                                                                                                                    ";
                            } else {
                                // line 207
                                echo "                                                                                                                                        оплачивается отдельно
                                                                                                                                    ";
                            }
                            // line 209
                            echo "                                                                                                                                </b></div>
                                                                                                                            <div>Общая стоимость: <span class=\"label \">";
                            // line 210
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfoHistory"]) ? $context["costInfoHistory"] : $this->getContext($context, "costInfoHistory")), "total_cost", array())), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                            echo "</span>
                                                                                                                                <span class=\"label\">";
                            // line 211
                            if (( !$this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "shipped_order_info_history", array(), "any", false, true), "ndsTax", array(), "any", true, true) ||  !$this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "shipped_order_info_history", array()), "ndsTax", array()))) {
                                echo " Без НДС";
                            } else {
                                echo " НДС ";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "shipped_order_info_history", array()), "ndsTax", array()), "html", null, true);
                                echo " %";
                            }
                            echo "</span></div>
                                                                                                                        </div>
                                                                                                                        ";
                        }
                        // line 214
                        echo "                                                                                                                        </div>

                                                                                                                            <br/>

                                                                                                                            ";
                    }
                    // line 219
                    echo "                                                                                                                                ";
                } elseif ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) > 0)) {
                    // line 220
                    echo "                                                                                                                                    ";
                    $context["associationAdmin"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array());
                    // line 221
                    echo "
                                                                                                                                        <div>
                                                                                                                                            ";
                    // line 223
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["nested_group_field"]) {
                        // line 224
                        echo "                                                                                                                                                <ul class=\"nav nav-tabs\">
                                                                                                                                                    ";
                        // line 225
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : $this->getContext($context, "associationAdmin")), "formgroups", array()));
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
                            // line 226
                            echo "                                                                                                                                                        <li class=\"";
                            if ($this->getAttribute($context["loop"], "first", array())) {
                                echo "active";
                            }
                            echo "\">
                                                                                                                                                            <a href=\"#";
                            // line 227
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : $this->getContext($context, "associationAdmin")), "uniqid", array()), "html", null, true);
                            echo "_";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                            echo "_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                            echo "\" data-toggle=\"tab\">
                                                                                                                                                                <i class=\"icon-exclamation-sign has-errors hide\"></i>
                                                                                                                                                                ";
                            // line 229
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : $this->getContext($context, "associationAdmin")), "trans", array(0 => $context["name"], 1 => array(), 2 => $this->getAttribute($context["form_group"], "translation_domain", array())), "method"), "html", null, true);
                            echo "
                                                                                                                                                            </a>
                                                                                                                                                        </li>
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
                        // line 233
                        echo "                                                                                                                                                </ul>

                                                                                                                                                <div class=\"tab-content\">
                                                                                                                                                    ";
                        // line 236
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : $this->getContext($context, "associationAdmin")), "formgroups", array()));
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
                            // line 237
                            echo "                                                                                                                                                        <div class=\"tab-pane ";
                            if ($this->getAttribute($context["loop"], "first", array())) {
                                echo "active";
                            }
                            echo "\" id=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : $this->getContext($context, "associationAdmin")), "uniqid", array()), "html", null, true);
                            echo "_";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                            echo "_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                            echo "\">
                                                                                                                                                            <fieldset>
                                                                                                                                                                <div class=\"sonata-ba-collapsed-fields\">
                                                                                                                                                                    ";
                            // line 240
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["form_group"], "fields", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                                // line 241
                                echo "                                                                                                                                                                        ";
                                $context["nested_field"] = $this->getAttribute($this->getAttribute($context["nested_group_field"], "children", array()), $context["field_name"], array(), "array");
                                // line 242
                                echo "                                                                                                                                                                            ";
                                if ($this->getAttribute($this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : null), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                                    // line 243
                                    echo "                                                                                                                                                                                ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["nested_field"]) ? $context["nested_field"] : $this->getContext($context, "nested_field")), 'row', array("inline" => "natural", "edit" => "inline"));
                                    // line 246
                                    echo "
                                                                                                                                                                                ";
                                    // line 247
                                    $context["dummy"] = $this->getAttribute($context["nested_group_field"], "setrendered", array());
                                    // line 248
                                    echo "                                                                                                                                                                                    ";
                                } else {
                                    // line 249
                                    echo "                                                                                                                                                                                        ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["nested_field"]) ? $context["nested_field"] : $this->getContext($context, "nested_field")), 'row');
                                    echo "
                                                                                                                                                                                        ";
                                }
                                // line 251
                                echo "                                                                                                                                                                                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 252
                            echo "                                                                                                                                                                                            </div>
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
                        // line 256
                        echo "                                                                                                                                                                                    </div>

                                                                                                                                                                                    ";
                        // line 258
                        if ($this->getAttribute($context["nested_group_field"], "_delete", array(), "array", true, true)) {
                            // line 259
                            echo "                                                                                                                                                                                        ";
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["nested_group_field"], "_delete", array(), "array"), 'row');
                            echo "
                                                                                                                                                                                    ";
                        }
                        // line 261
                        echo "                                                                                                                                                                                    ";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nested_group_field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 262
                    echo "                                                                                                                                                                                    </div>
                                                                                                                                                                                    ";
                }
                // line 264
                echo "                                                                                                                                                                                        ";
            } else {
                // line 265
                echo "                                                                                                                                                                                            ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
                echo "
                                                                                                                                                                                            ";
            }
            // line 267
            echo "
                                                                                                                                                                                            </span>

                                                                                                                                                                                            ";
            // line 270
            if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "edit", array()) == "inline")) {
                // line 271
                echo "
                                                                                                                                                                                                ";
                // line 272
                if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "hasroute", array(0 => "create"), "method") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "isGranted", array(0 => "CREATE"), "method")) && (isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")))) {
                    // line 273
                    echo "                                                                                                                                                                                                    <span id=\"field_actions_";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "\" >
                                                                                                                                                                                                        <a
                                                                                                                                                                                                        href=\"";
                    // line 275
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    echo "\"
                                                                                                                                                                                                        onclick=\"return start_field_retrieve_";
                    // line 276
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "(this);\"
                                                                                                                                                                                                        class=\"btn sonata-ba-action\"
                                                                                                                                                                                                        title=\"";
                    // line 278
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : $this->getContext($context, "btn_catalogue"))), "html", null, true);
                    echo "\"
                                                                                                                                                                                                        >
                                                                                                                                                                                                        <i class=\"icon-plus\"></i>
                                                                                                                                                                                                        ";
                    // line 281
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : $this->getContext($context, "btn_catalogue"))), "html", null, true);
                    echo "
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                    </span>
                                                                                                                                                                                                ";
                }
                // line 285
                echo "
                                                                                                                                                                                                ";
                // line 287
                echo "                                                                                                                                                                                                ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "sortable", array(), "any", true, true)) {
                    // line 288
                    echo "                                                                                                                                                                                                    <script type=\"text/javascript\">
                                                                                                                                                                                                                jQuery('div#field_container_";
                    // line 289
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo " tbody.sonata-ba-tbody').sortable({
                                                                                                                                                                                                        axis: 'y',
                                                                                                                                                                                                                opacity: 0.6,
                                                                                                                                                                                                                items: 'tr',
                                                                                                                                                                                                                stop: apply_position_value_";
                    // line 293
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "
                                                                                                                                                                                                        });
                                                                                                                                                                                                                function apply_position_value_";
                    // line 295
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "() {
                                                                                                                                                                                                                // update the input value position
                                                                                                                                                                                                                jQuery('div#field_container_";
                    // line 297
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo " tbody.sonata-ba-tbody td.sonata-ba-td-";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "options", array()), "sortable", array()), "html", null, true);
                    echo "').each(function(index, element) {
                                                                                                                                                                                                                // remove the sortable handler and put it back
                                                                                                                                                                                                                jQuery('span.sonata-ba-sortable-handler', element).remove();
                                                                                                                                                                                                                        jQuery(element).append('<span class=\"sonata-ba-sortable-handler ui-icon ui-icon-grip-solid-horizontal\"></span>');
                                                                                                                                                                                                                        jQuery('input', element).hide();
                                                                                                                                                                                                                });
                                                                                                                                                                                                                        jQuery('div#field_container_";
                    // line 303
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo " tbody.sonata-ba-tbody td.sonata-ba-td-";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "options", array()), "sortable", array()), "html", null, true);
                    echo " input').each(function(index, value) {
                                                                                                                                                                                                                jQuery(value).val(index + 1);
                                                                                                                                                                                                                });
                                                                                                                                                                                                                }

                                                                                                                                                                                                        // refresh the sortable option when a new element is added
                                                                                                                                                                                                        jQuery('#sonata-ba-field-container-";
                    // line 309
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "').bind('sonata.add_element', function() {
                                                                                                                                                                                                        apply_position_value_";
                    // line 310
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "();
                                                                                                                                                                                                                jQuery('div#field_container_";
                    // line 311
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo " tbody.sonata-ba-tbody').sortable('refresh');
                                                                                                                                                                                                        });
                                                                                                                                                                                                                apply_position_value_";
                    // line 313
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "();                                                                                                                                                                                                    </script>
                                                                                                                                                                                                ";
                }
                // line 315
                echo "
                                                                                                                                                                                                ";
                // line 317
                echo "                                                                                                                                                                                                ";
                $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_one_association_script.html.twig")->display($context);
                // line 318
                echo "
                                                                                                                                                                                            ";
            } else {
                // line 320
                echo "                                                                                                                                                                                                <span id=\"field_actions_";
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "\" >
                                                                                                                                                                                                    ";
                // line 321
                if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "hasroute", array(0 => "create"), "method") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "isGranted", array(0 => "CREATE"), "method")) && (isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")))) {
                    // line 322
                    echo "                                                                                                                                                                                                        <a
                                                                                                                                                                                                        href=\"";
                    // line 323
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    echo "\"
                                                                                                                                                                                                        onclick=\"return start_field_dialog_form_add_";
                    // line 324
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "(this);\"
                                                                                                                                                                                                        class=\"btn sonata-ba-action\"
                                                                                                                                                                                                        title=\"";
                    // line 326
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : $this->getContext($context, "btn_catalogue"))), "html", null, true);
                    echo "\"
                                                                                                                                                                                                        >
                                                                                                                                                                                                        <i class=\"icon-plus\"></i>
                                                                                                                                                                                                        ";
                    // line 329
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : $this->getContext($context, "btn_catalogue"))), "html", null, true);
                    echo "
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                    ";
                }
                // line 332
                echo "                                                                                                                                                                                                </span>

                                                                                                                                                                                                <div style=\"display: none\" id=\"field_dialog_";
                // line 334
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "\">

                                                                                                                                                                                                </div>



                                                                                                                                                                                                ";
                // line 340
                $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig")->display($context);
                // line 341
                echo "                                                                                                                                                                                            ";
            }
            // line 342
            echo "                                                                                                                                                                                        </div>
                                                                                                                                                                                        ";
        }
        // line 344
        echo "
                                                                                                                                                                                            ";
        // line 346
        echo "                                                                                                                                                                                            <div style=\"display: none;overflow:hidden\" id=\"dialogTransit";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\">
                                                                                                                                                                                                <label>Склад, на который нужно переместить:</label>
                                                                                                                                                                                                <label id=\"errorStockLabel\" style=\"color:red\">Укажите склад</label>
                                                                                                                                                                                                <div class=\"controls \">
                                                                                                                                                                                                    <input style=\"width:250px\" type=\"hidden\" id=\"selectedStockForTransit\">
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class=\"well well-small form-actions\">
                                                                                                                                                                                                    <input type=\"button\" class=\"btn btn-primary\" name=\"addToTransit\" value=\"Переместить\">
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>

                                                                                                                                                                                            <script>

                                                                                                                                                                                                        var allStocks = {
                                                                                                                                                                                                ";
        // line 360
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stocks"]) ? $context["stocks"] : $this->getContext($context, "stocks")));
        foreach ($context['_seq'] as $context["_key"] => $context["stock"]) {
            // line 361
            echo "                                                                                                                                                                                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["stock"], "id", array()), "html", null, true);
            echo ": {
                                                                                                                                                                                                                captionRu:\"";
            // line 362
            echo twig_escape_filter($this->env, $this->getAttribute($context["stock"], "captionRu", array()));
            echo "\"
                                                                                                                                                                                                                },                                                                                                                                                                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stock'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 364
        echo "                                                                                                                                                                                                                            }


                                                                                                                                                                                                                    \$('input[name=\"addToTransit\"]').click(function(){
                                                                                                                                                                                                                    if (\$('#selectedStockForTransit').val()) {

                                                                                                                                                                                                                    var data = {
                                                                                                                                                                                                                    toStock:\$('#selectedStockForTransit').val(),
                                                                                                                                                                                                                            fromStock:\$('#selectedStockForTransit').attr('data-stock'),
                                                                                                                                                                                                                            quantity:\$('#selectedStockForTransit').attr('data-quantity'),
                                                                                                                                                                                                                            book:\$('#selectedStockForTransit').attr('data-book'),
                                                                                                                                                                                                                            composition:\$('#selectedStockForTransit').attr('data-composition')
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    \$.get(\"";
        // line 377
        echo $this->env->getExtension('routing')->getPath("core_order_add_to_transit");
        echo "\",
                                                                                                                                                                                                                            data, function(res) {

                                                                                                                                                                                                                            if (typeof res.errors !== 'undefined') {
                                                                                                                                                                                                                            for (var index in res.errors) {
                                                                                                                                                                                                                            if (res.errors[index] == 'NotEnoughRealProducts') {
                                                                                                                                                                                                                            \$('#dialogTransit";
        // line 383
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "').dialog('close');
                                                                                                                                                                                                                                    alert('Нельзя отправить товарные продукции в транзит, т.к. не хватает реального товара на складе!');
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                            else {
                                                                                                                                                                                                                            \$('a.truck-plus[data-stock=\"' + data.fromStock + '\"][data-composition=\"' + data.composition + '\"]').hide();
                                                                                                                                                                                                                                    \$('span.truck-arrow[data-stock=\"' + data.fromStock + '\"][data-composition=\"' + data.composition + '\"]')
                                                                                                                                                                                                                                    .show().append(\$('#selectedStockForTransit').select2('data').text);
                                                                                                                                                                                                                                    \$('#dialogTransit";
        // line 392
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "').dialog('close');
                                                                                                                                                                                                                            }



                                                                                                                                                                                                                            //console.log(res)

                                                                                                                                                                                                                            });
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    else {
                                                                                                                                                                                                                    \$('#errorStockLabel').show();
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    })
                                                                                                                                                                                                                            \$('a.truck-plus').click(function(){
                                                                                                                                                                                                                    \$('#errorStockLabel').hide();
                                                                                                                                                                                                                            \$('#selectedStockForTransit').
                                                                                                                                                                                                                            attr('data-quantity', \$(this).attr('data-quantity')).
                                                                                                                                                                                                                            attr('data-composition', \$(this).attr('data-composition')).
                                                                                                                                                                                                                            attr('data-book', \$(this).attr('data-book')).
                                                                                                                                                                                                                            attr('data-stock', \$(this).attr('data-stock'));
                                                                                                                                                                                                                            //формируем список складов и прячем склад с которого нужно перевезти
                                                                                                                                                                                                                            \$('#select').select2(\"val\", \"\");
                                                                                                                                                                                                                            var data = [];
                                                                                                                                                                                                                            for (var s_id in allStocks) {
                                                                                                                                                                                                                    if (s_id != \$(this).attr('data-stock')) {
                                                                                                                                                                                                                    data.push({id: s_id, text: allStocks[s_id].captionRu });
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    \$('#selectedStockForTransit').select2({data:data})

                                                                                                                                                                                                                            \$('#dialogTransit";
        // line 422
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "').dialog({width: 400, height: 200, modal: true, title: \"Транзит позиций между складами\"});
                                                                                                                                                                                                                    });

                                                                                                                                                                                            </script>

                                                                                                                                                                                            ";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin\\Form\\Order\\type:products_in_order_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  1162 => 422,  1129 => 392,  1117 => 383,  1108 => 377,  1093 => 364,  1085 => 362,  1080 => 361,  1076 => 360,  1058 => 346,  1055 => 344,  1051 => 342,  1048 => 341,  1046 => 340,  1037 => 334,  1033 => 332,  1027 => 329,  1021 => 326,  1016 => 324,  1012 => 323,  1009 => 322,  1007 => 321,  1002 => 320,  998 => 318,  995 => 317,  992 => 315,  987 => 313,  982 => 311,  978 => 310,  974 => 309,  961 => 303,  948 => 297,  943 => 295,  938 => 293,  931 => 289,  928 => 288,  925 => 287,  922 => 285,  915 => 281,  909 => 278,  904 => 276,  900 => 275,  894 => 273,  892 => 272,  889 => 271,  887 => 270,  882 => 267,  876 => 265,  873 => 264,  869 => 262,  855 => 261,  849 => 259,  847 => 258,  843 => 256,  826 => 252,  820 => 251,  814 => 249,  811 => 248,  809 => 247,  806 => 246,  803 => 243,  800 => 242,  797 => 241,  793 => 240,  778 => 237,  761 => 236,  756 => 233,  738 => 229,  729 => 227,  722 => 226,  705 => 225,  702 => 224,  685 => 223,  681 => 221,  678 => 220,  675 => 219,  668 => 214,  656 => 211,  650 => 210,  647 => 209,  643 => 207,  635 => 205,  633 => 204,  624 => 202,  618 => 201,  612 => 200,  606 => 199,  602 => 198,  598 => 196,  595 => 195,  592 => 194,  590 => 193,  573 => 189,  570 => 188,  566 => 186,  558 => 184,  556 => 183,  547 => 181,  541 => 180,  535 => 179,  529 => 178,  524 => 177,  520 => 176,  517 => 175,  515 => 174,  510 => 171,  502 => 168,  497 => 165,  494 => 164,  488 => 163,  484 => 161,  478 => 160,  475 => 159,  471 => 157,  465 => 155,  462 => 154,  459 => 153,  455 => 152,  451 => 151,  446 => 148,  440 => 145,  425 => 144,  423 => 143,  419 => 141,  405 => 139,  403 => 138,  398 => 136,  388 => 135,  381 => 131,  373 => 130,  365 => 127,  361 => 125,  358 => 124,  353 => 123,  350 => 122,  346 => 119,  343 => 118,  333 => 113,  327 => 110,  324 => 109,  321 => 108,  316 => 105,  312 => 103,  306 => 101,  300 => 99,  297 => 98,  295 => 97,  289 => 95,  286 => 94,  283 => 92,  280 => 91,  278 => 90,  275 => 89,  272 => 88,  269 => 87,  265 => 85,  259 => 83,  256 => 82,  250 => 81,  247 => 80,  242 => 79,  239 => 78,  236 => 77,  233 => 76,  230 => 74,  227 => 73,  221 => 71,  217 => 69,  214 => 68,  211 => 67,  208 => 65,  204 => 63,  198 => 61,  195 => 60,  189 => 58,  183 => 56,  180 => 55,  178 => 54,  175 => 53,  169 => 51,  166 => 50,  164 => 49,  162 => 48,  148 => 47,  145 => 46,  141 => 45,  138 => 44,  135 => 43,  131 => 42,  125 => 38,  119 => 34,  117 => 33,  114 => 32,  108 => 31,  102 => 28,  94 => 27,  88 => 23,  85 => 22,  81 => 21,  76 => 18,  73 => 17,  70 => 16,  68 => 15,  64 => 14,  60 => 13,  56 => 11,  53 => 10,  44 => 8,  39 => 7,  37 => 6,  34 => 5,  32 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }
}
