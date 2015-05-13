<?php

/* CoreLogisticsBundle:Admin/UnitInStock/form:form_admin_fields.html.twig */
class __TwigTemplate_6c48891d204f2109c906b9b382a6fc3201535762648539449b2a20a706301da4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'core_logistics_unit_in_stock_admin_product_ajax_entity_widget' => array($this, 'block_core_logistics_unit_in_stock_admin_product_ajax_entity_widget'),
            'core_logistics_unit_in_stock_admin_serials_sonata_type_collection_widget' => array($this, 'block_core_logistics_unit_in_stock_admin_serials_sonata_type_collection_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('core_logistics_unit_in_stock_admin_product_ajax_entity_widget', $context, $blocks);
        // line 37
        echo "

            ";
        // line 40
        echo "            ";
        $this->displayBlock('core_logistics_unit_in_stock_admin_serials_sonata_type_collection_widget', $context, $blocks);
    }

    // line 2
    public function block_core_logistics_unit_in_stock_admin_product_ajax_entity_widget($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayBlock("ajax_entity_widget", $context, $blocks);
        echo "
    ";
        // line 4
        $context["unit"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array());
        echo "        
        ";
        // line 5
        if ($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "productInSupply", array(), "any", false, true), "priceInGtdCurrency", array(), "any", true, true)) {
            // line 6
            echo "            <br><br>
            <div style=\"clear: left;\"><span class=\"small_label\">Цена поставки в валюте ГТД: <span class=\"money small_label\">";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "productInSupply", array()), "priceInGtdCurrency", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "productInSupply", array()), "gtdCurrency", array()), "symbol", array()), "html", null, true);
            echo "</span></label></div>
            <div><span small_label>Цена поставки в основной валюте: <span class=\"money small_label\">";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "productInSupply", array()), "priceInGeneralCurrency", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span></label></div>
        ";
        }
        // line 10
        echo "
        ";
        // line 11
        if (( !$this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "isCouldBeSold", array()) && $this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "composition", array(), "any", false, true), "order", array(), "any", true, true))) {
            // line 12
            echo "            <span class=\"label label-success\">продано</span> 
            ";
            // line 13
            if ($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "composition", array(), "any", false, true), "order", array(), "any", true, true)) {
                // line 14
                echo "                (заказ <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "composition", array()), "order", array()), "id", array()))), "html", null, true);
                echo "\">#";
                echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "composition", array()), "order", array()), "id", array())), "html", null, true);
                echo "</a>)
            ";
            }
            // line 15
            echo "           
        ";
        } else {
            // line 17
            echo "            ";
            if ($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "composition", array(), "any", false, true), "order", array(), "any", true, true)) {
                // line 18
                echo "                <span class=\"label label-success\">";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "composition", array()), "order", array()), "isCanceledStatus", array())) {
                    echo "переоформляется";
                } else {
                    echo "забронировано";
                }
                echo "</span> 
                (заказ <a href=\"";
                // line 19
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "composition", array()), "order", array()), "id", array()))), "html", null, true);
                echo "\">#";
                echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "composition", array()), "order", array()), "id", array())), "html", null, true);
                echo "</a>)
            ";
            } else {
                // line 21
                echo "                ";
                if ($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "isWithDefect", array())) {
                    // line 22
                    echo "                    <span class=\"label label-warrning\">списано</span>
                ";
                } else {
                    // line 24
                    echo "                    ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "supply", array()), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Supply::onTheWayStatusName"))) {
                        // line 25
                        echo "                        <span class=\"label label-info\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "supply", array()), "status", array()), "captionRu", array()), "html", null, true);
                        echo "</span>
                    ";
                    } else {
                        // line 27
                        echo "                        ";
                        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "supply", array()), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Supply::suppliedStatusName"))) {
                            // line 28
                            echo "                            <span class=\"label label-success\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "supply", array()), "status", array()), "captionRu", array()), "html", null, true);
                            echo "</span>
                        ";
                        } else {
                            // line 30
                            echo "                            <span class=\"label label-default\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : null), "supply", array()), "status", array()), "captionRu", array()), "html", null, true);
                            echo "</span>
                        ";
                        }
                        // line 32
                        echo "                    ";
                    }
                    // line 33
                    echo "                ";
                }
                // line 34
                echo "            ";
            }
            // line 35
            echo "        ";
        }
        // line 36
        echo "        ";
    }

    // line 40
    public function block_core_logistics_unit_in_stock_admin_serials_sonata_type_collection_widget($context, array $blocks = array())
    {
        // line 41
        echo "                <div style=\"width:350px\">
                    ";
        // line 42
        $this->displayBlock("sonata_type_collection_widget", $context, $blocks);
        echo "
                </div>
            ";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/UnitInStock/form:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  156 => 42,  153 => 41,  150 => 40,  146 => 36,  143 => 35,  140 => 34,  137 => 33,  134 => 32,  128 => 30,  122 => 28,  119 => 27,  113 => 25,  110 => 24,  106 => 22,  103 => 21,  96 => 19,  87 => 18,  84 => 17,  80 => 15,  72 => 14,  70 => 13,  67 => 12,  65 => 11,  62 => 10,  55 => 8,  49 => 7,  46 => 6,  44 => 5,  40 => 4,  35 => 3,  32 => 2,  27 => 40,  23 => 37,  21 => 2,);
    }
}
