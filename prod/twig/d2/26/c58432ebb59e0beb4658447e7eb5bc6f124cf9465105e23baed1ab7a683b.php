<?php

/* CoreOrderBundle:Admin/Form/Order/type:unit_serial_number.html.twig */
class __TwigTemplate_d226c58432ebb59e0beb4658447e7eb5bc6f124cf9465105e23baed1ab7a683b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'unit_serial_number_widget' => array($this, 'block_unit_serial_number_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('unit_serial_number_widget', $context, $blocks);
    }

    public function block_unit_serial_number_widget($context, array $blocks = array())
    {
        // line 2
        echo "<style>
    .clearable{
  cursor:pointer;
  display:none;
}
</style>
    
";
        // line 9
        $context["composition"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "vars", array()), "value", array());
        // line 10
        echo "
";
        // line 11
        if (($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "id", array(), "any", true, true) && $this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "id", array()))) {
            // line 12
            echo "    ";
            $context["shippedQuantity"] = 0;
            // line 13
            echo "    ";
            if ( !$this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "order", array()), "isShippedStatus", array())) {
                // line 14
                echo "        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "units", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["unit"]) {
                    // line 15
                    echo "            ";
                    if ( !$this->getAttribute($context["unit"], "isCouldBeSold", array())) {
                        // line 16
                        echo "                ";
                        $context["shippedQuantity"] = ((isset($context["shippedQuantity"]) ? $context["shippedQuantity"] : null) + 1);
                        // line 17
                        echo "             ";
                    }
                    // line 18
                    echo "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['unit'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 19
                echo "    ";
            }
            // line 20
            if ( !$this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "product", array()), "isNoSerials", array())) {
                // line 21
                echo "<span class=\"series_quantity_";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "id", array()), "html", null, true);
                echo "\"></span>
";
                // line 23
                echo "<div  id=\"dialogSerials";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "id", array()), "html", null, true);
                echo "\" style=\"display:none\">
    ";
                // line 24
                if (($this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "order", array()), "isShippedStatus", array()) && (isset($context["isShippedStatusSaved"]) ? $context["isShippedStatusSaved"] : null))) {
                    echo "<div class=\"alert alert-warning alert-dismissable\">Чтобы добавить серийники нужно отменить и переоформить заказ</div>";
                }
                echo "    
    ";
                // line 25
                if ( !$this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "order", array()), "isCheckedStatus", array())) {
                    echo "<div class=\"alert alert-warning alert-dismissable\">Чтобы добавить серийники нужно для заказа выставить статус «Проверен»</div>";
                }
                // line 26
                echo "
<div class=\"alert alert-error alert-dismissable serialsError\"></div>
    <table id=\"serialsTable";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "id", array()), "html", null, true);
                echo "\" class=\"table table-bordered table-striped\" >
    </table>
    <div class=\"well well-small form-actions\">
        ";
                // line 31
                if ((( !$this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "order", array()), "isShippedStatus", array()) ||  !(isset($context["isShippedStatusSaved"]) ? $context["isShippedStatusSaved"] : null)) &&  !$this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "order", array()), "isCanceledStatus", array()))) {
                    // line 32
                    echo "        <input type=\"button\" class=\"btn btn-primary serialsSave\" data-composition_id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "id", array()), "html", null, true);
                    echo "\"  value=\"Сохранить\">
        или
        ";
                }
                // line 35
                echo "        <input type=\"button\" class=\"btn btn-danger serialsClose\" data-composition_id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "id", array()), "html", null, true);
                echo "\"  value=\"Закрыть\">
    </div>
</div>
        ";
            } else {
                // line 39
                echo "            без серийников
        ";
            }
            // line 41
            echo "        
";
            // line 42
            if ((isset($context["shippedQuantity"]) ? $context["shippedQuantity"] : null)) {
                // line 43
                echo "<br/>отгружено ";
                echo twig_escape_filter($this->env, (isset($context["shippedQuantity"]) ? $context["shippedQuantity"] : null), "html", null, true);
                echo " ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "product", array(), "any", false, true), "unitOfMeasure", array(), "any", false, true), "shortCaptionRu", array(), "any", true, true)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "product", array()), "unitOfMeasure", array()), "shortCaptionRu", array()), "html", null, true);
                } else {
                    echo "шт.";
                }
            }
            // line 45
            echo "
";
            // line 46
            if ((isset($context["firstSerials"]) ? $context["firstSerials"] : null)) {
                // line 50
                echo "<script>
var updateSeriesRouting=\"";
                // line 51
                echo $this->env->getExtension('routing')->getPath("core_order_update_serials");
                echo "\",
        canViewSeries= 1 ";
                // line 52
                echo ",
        isShippedStatus= ";
                // line 53
                if (($this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "order", array()), "isShippedStatus", array()) && (isset($context["isShippedStatusSaved"]) ? $context["isShippedStatusSaved"] : null))) {
                    echo "1";
                } else {
                    echo "0";
                }
                echo ",
        isCheckedStatus= ";
                // line 54
                if ($this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "order", array()), "isCheckedStatus", array())) {
                    echo "1";
                } else {
                    echo "0";
                }
                echo ";
    </script>
";
            }
            // line 57
            if ( !$this->getAttribute($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "product", array()), "isNoSerials", array())) {
                // line 58
                echo "<script>
            serialsData[";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "id", array()), "html", null, true);
                echo "] = {
    field_id:\"";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
                echo "\",
            field_name:\"";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "full_name", array()), "html", null, true);
                echo "\",
            stocks:{
                //склады на которых произошла бронь
                ";
                // line 64
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "booking", array()));
                foreach ($context['_seq'] as $context["b_index"] => $context["b"]) {
                    // line 65
                    echo "                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "stock", array()), "id", array()), "html", null, true);
                    echo ":{
                    quantity:";
                    // line 66
                    echo twig_escape_filter($this->env, $this->getAttribute($context["b"], "quantity", array()), "html", null, true);
                    echo ",
                    captionRu:\"";
                    // line 67
                    echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "stock", array()), "captionRu", array()), "js"), "html", null, true);
                    echo "\"
                        },
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['b_index'], $context['b'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 70
                echo "            },
            units_serials: {

        ";
                // line 73
                if ($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "units", array())) {
                    // line 74
                    echo "                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["composition"]) ? $context["composition"] : null), "units", array()));
                    foreach ($context['_seq'] as $context["unit_index"] => $context["unit"]) {
                        echo "                        
                    ";
                        // line 75
                        echo twig_escape_filter($this->env, $context["unit_index"], "html", null, true);
                        echo ":{ ";
                        // line 76
                        echo "                        ";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["unit"], "serials", array()));
                        foreach ($context['_seq'] as $context["s_key"] => $context["s"]) {
                            // line 77
                            echo "                                ";
                            echo twig_escape_filter($this->env, $context["s_key"], "html", null, true);
                            echo ":{unit_id:";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["unit"], "id", array()), "html", null, true);
                            echo ", stock_id:";
                            if ($this->getAttribute($this->getAttribute($context["unit"], "stock", array(), "any", false, true), "id", array(), "any", true, true)) {
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["unit"], "stock", array()), "id", array()), "html", null, true);
                            } else {
                                echo "0";
                            }
                            echo ", id:";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "id", array()), "html", null, true);
                            echo ", value:'";
                            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["s"], "value", array()), "js"), "html", null, true);
                            echo "'},
                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['s_key'], $context['s'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 79
                        echo "                            },                    
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['unit_index'], $context['unit'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 81
                    echo "        ";
                }
                // line 82
                echo "    },

            product: {
    serialsQuantity:";
                // line 85
                if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "vars", array()), "value", array()), "product", array()), "serialsQuantity", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "vars", array()), "value", array()), "product", array()), "serialsQuantity", array()), "html", null, true);
                } else {
                    echo "1";
                }
                echo ",
            captionRu: \"";
                // line 86
                echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "vars", array()), "value", array()), "product", array()), "captionRu", array()), "js"), "html", null, true);
                echo "\",
            article: \"";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "vars", array()), "value", array()), "product", array()), "sku", array()));
                echo "\",
            id: \"";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "vars", array()), "value", array()), "product", array()), "id", array()), "html", null, true);
                echo "\"
    },
            composition: {
    quantity:";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "vars", array()), "value", array()), "quantity", array()), "html", null, true);
                echo "
    }
    };
    </script>
    ";
            }
        }
        // line 97
        echo "

";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order/type:unit_serial_number.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  302 => 97,  293 => 91,  287 => 88,  283 => 87,  279 => 86,  271 => 85,  266 => 82,  263 => 81,  256 => 79,  235 => 77,  230 => 76,  227 => 75,  220 => 74,  218 => 73,  213 => 70,  204 => 67,  200 => 66,  195 => 65,  191 => 64,  185 => 61,  181 => 60,  177 => 59,  174 => 58,  172 => 57,  162 => 54,  154 => 53,  151 => 52,  147 => 51,  144 => 50,  142 => 46,  139 => 45,  129 => 43,  127 => 42,  124 => 41,  120 => 39,  112 => 35,  105 => 32,  103 => 31,  97 => 28,  93 => 26,  89 => 25,  83 => 24,  78 => 23,  73 => 21,  71 => 20,  68 => 19,  62 => 18,  59 => 17,  56 => 16,  53 => 15,  48 => 14,  45 => 13,  42 => 12,  40 => 11,  37 => 10,  35 => 9,  26 => 2,  20 => 1,);
    }
}
