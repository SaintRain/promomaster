<?php

/* CoreLogisticsBundle:Admin/Supply/Form:sonata_type_collection_products.html.twig */
class __TwigTemplate_8398b5e7748d6495c9dfcc6ee9743ffe92c4357b1b9a162345f42a7a8b4af76c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'core_logistics_supply_admin_products_sonata_type_collection_widget' => array($this, 'block_core_logistics_supply_admin_products_sonata_type_collection_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "
";
        // line 9
        $this->displayBlock('core_logistics_supply_admin_products_sonata_type_collection_widget', $context, $blocks);
    }

    public function block_core_logistics_supply_admin_products_sonata_type_collection_widget($context, array $blocks = array())
    {
        // line 10
        echo "
    ";
        // line 11
        if ( !$this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "hasassociationadmin", array())) {
            // line 12
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 13
                echo "            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_admin')->renderRelationElement($context["element"], $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array())), "html", null, true);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "    ";
        } else {
            // line 16
            echo "   ";
            $context["canDelete"] = false;
            // line 17
            echo "        <div id=\"field_container_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\" class=\"field-container\">
        <span id=\"field_widget_";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\" >
            ";
            // line 19
            if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "edit", array()) == "inline")) {
                // line 20
                echo "                ";
                if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "inline", array()) == "table")) {
                    // line 21
                    echo "                    ";
                    if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) > 0)) {
                        // line 22
                        echo "                        <table class=\"table table-bordered\">
                            <thead>
                            <tr>
                                ";
                        // line 25
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "children", array()));
                        foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                            // line 26
                            echo "                                    ";
                            if (($context["field_name"] == "_delete")) {
                                // line 27
                                echo "                                        ";
                                $context["canDelete"] = true;
                                // line 28
                                echo "                                        <th>";
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action_delete", array(), "SonataAdminBundle"), "html", null, true);
                                echo "</th>
                                    ";
                            } else {
                                // line 30
                                echo "                                        <th ";
                                echo (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "required", array(), "array")) ? ("class=\"required\"") : (""));
                                if (($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "attr", array(), "array", false, true), "hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "attr", array(), "array"), "hidden", array(), "array"))) {
                                    echo " style=\"display:none;\"";
                                }
                                echo ">
                                            ";
                                // line 31
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array(), "array"), "admin", array()), "trans", array(0 => $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "label", array())), "method"), "html", null, true);
                                echo "
                                            
                                            ";
                                // line 33
                                if (($context["field_name"] == "costPriceForOneUnit")) {
                                    // line 34
                                    echo "                                                <span style=\"font-size:10px;line-height: 0px\">(вычисляется авт. после сохранения)</span>
                                            ";
                                }
                                // line 36
                                echo "                                        </th>
                                    ";
                            }
                            // line 38
                            echo "                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 39
                        echo "                            </tr>
                            </thead>
                            <tbody class=\"sonata-ba-tbody\">
                            ";
                        // line 42
                        $context["totalPrice"] = 0;
                        // line 43
                        echo "                            ";
                        $context["totalCount"] = 0;
                        // line 44
                        echo "                            ";
                        $context["totalCostPriceForOneUnit"] = 0;
                        echo "                            

                            ";
                        // line 46
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()));
                        foreach ($context['_seq'] as $context["nested_group_field_name"] => $context["nested_group_field"]) {
                            echo "                                                                                                

                            ";
                            // line 48
                            if ($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "product", array())) {
                                // line 49
                                echo "                                        
                                            ";
                                // line 50
                                $context["totalPrice"] = ((isset($context["totalPrice"]) ? $context["totalPrice"] : $this->getContext($context, "totalPrice")) + ($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "quantity", array()) * $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "priceInGeneralCurrency", array())));
                                echo "                                        
                                       
                                            ";
                                // line 52
                                $context["totalCount"] = ((isset($context["totalCount"]) ? $context["totalCount"] : $this->getContext($context, "totalCount")) + $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "quantity", array()));
                                // line 53
                                echo "                                                                                                                        
                                            ";
                                // line 54
                                $context["totalCostPriceForOneUnit"] = ((isset($context["totalCostPriceForOneUnit"]) ? $context["totalCostPriceForOneUnit"] : $this->getContext($context, "totalCostPriceForOneUnit")) + ($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "quantity", array()) * $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "costPriceForOneUnit", array())));
                                echo "                                        
                                        
                                        ";
                            }
                            // line 57
                            echo "                                        
                                <tr 
                                    ";
                            // line 59
                            if (($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "product", array()) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "product", array()), "price", array()) < $this->env->getExtension('common_extension')->floatvalFilter($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "costPriceForOneUnit", array()))))) {
                                // line 61
                                echo "                                                                                
                                    class=\"error\" ";
                            }
                            // line 62
                            echo ">
                                    ";
                            // line 63
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["nested_group_field"], "children", array()));
                            foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                                echo "                                        
                                        <td class=\"sonata-ba-td-";
                                // line 64
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
                                // line 65
                                if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "associationadmin", array(), "any", false, true), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                                    // line 66
                                    echo "                                                ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                    echo "

                                                ";
                                    // line 68
                                    $context["dummy"] = $this->getAttribute($context["nested_group_field"], "setrendered", array());
                                    // line 69
                                    echo "                                            ";
                                } else {
                                    // line 70
                                    echo "                                                ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                    echo "
                                            ";
                                }
                                // line 72
                                echo "                                            ";
                                if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                                    // line 73
                                    echo "                                                <div class=\"help-inline sonata-ba-field-error-messages\">
                                                    ";
                                    // line 74
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'errors');
                                    echo "
                                                </div>
                                            ";
                                }
                                // line 77
                                echo "                                        </td>
                                    ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 79
                            echo "                                </tr>
                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['nested_group_field_name'], $context['nested_group_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 81
                        echo "                            <tr>                               
                                 ";
                        // line 82
                        if ((isset($context["canDelete"]) ? $context["canDelete"] : $this->getContext($context, "canDelete"))) {
                            echo "<td></td>";
                        }
                        // line 83
                        echo "                                <td>Итого:</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>                                
                                
                                <td class=\"money\"><span id=\"totalPrice\">";
                        // line 90
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["totalPrice"]) ? $context["totalPrice"] : $this->getContext($context, "totalPrice"))), "html", null, true);
                        echo "</span> ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                        echo "</td>                                
                                <td class=\"money\"><span id=\"totalCostPriceForOneUnit\">";
                        // line 91
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["totalCostPriceForOneUnit"]) ? $context["totalCostPriceForOneUnit"] : $this->getContext($context, "totalCostPriceForOneUnit"))), "html", null, true);
                        echo "</span> ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                        echo "</td>
                                <td><span id=\"totalCount\">";
                        // line 92
                        echo twig_escape_filter($this->env, (isset($context["totalCount"]) ? $context["totalCount"] : $this->getContext($context, "totalCount")), "html", null, true);
                        echo "</span></td>
                            </tr>
                            </tbody>
                        </table>

                        <script>
                            \$(function(){
                                \$('input[id \$= \"_priceInGeneralCurrency\"], input[id \$= \"_quantity\"]').keyup(function(){
                                    var totalPrice = 0,
                                    totalCount = 0,
                                    totalCostPriceForOneUnit=0;
                             
                                    \$('input[id \$= \"_priceInGeneralCurrency\"]').each(function(){
                                        if (\$(this).val()) {                                            
                                            var quantity=parseInt(\$(this).parents('tr').find('input[id \$= \"_quantity\"]').first().val());
                                           if (!quantity) {
                                               quantity=0;
                                           }
                                            totalPrice += parseFloat(\$(this).val())*quantity;
                                        }
                                    });
                                    
                                      \$('input[id \$= \"_costPriceForOneUnit\"]').each(function(){
                                        if (\$(this).val()) {                                            
                                            var quantity=parseInt(\$(this).parents('tr').find('input[id \$= \"_quantity\"]').first().val());
                                            if (!quantity) {
                                               quantity=0;
                                           }
                                            totalCostPriceForOneUnit += parseFloat(\$(this).val())*quantity;
                                        }
                                    });                                    
                                    \$('input[id \$= \"_quantity\"]').each(function(){
                                        if (\$(this).val()) {
                                            var quantity=parseInt(\$(this).val());
                                              if (!quantity) {
                                               quantity=0;
                                           }
                                            totalCount += quantity;
                                        }
                                    });
                                    \$('#totalPrice').text(totalPrice);
                                    \$('#totalCount').text(totalCount);
                                    \$('#totalCostPriceForOneUnit').text(totalCostPriceForOneUnit);
                                    
                                });
                            });
                        </script>
                    ";
                    }
                    // line 140
                    echo "                ";
                } elseif ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) > 0)) {
                    // line 141
                    echo "                    ";
                    $context["associationAdmin"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array());
                    // line 142
                    echo "
                    <div>
                        ";
                    // line 144
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
                        // line 145
                        echo "                            <ul class=\"nav nav-tabs\">
                                ";
                        // line 146
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
                            // line 147
                            echo "                                    <li class=\"";
                            if ($this->getAttribute($context["loop"], "first", array())) {
                                echo "active";
                            }
                            echo "\">
                                        <a href=\"#";
                            // line 148
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : $this->getContext($context, "associationAdmin")), "uniqid", array()), "html", null, true);
                            echo "_";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                            echo "_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                            echo "\" data-toggle=\"tab\">
                                            <i class=\"icon-exclamation-sign has-errors hide\"></i>
                                            ";
                            // line 150
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
                        // line 154
                        echo "                            </ul>

                            <div class=\"tab-content\">
                                ";
                        // line 157
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
                            // line 158
                            echo "                                    <div class=\"tab-pane ";
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
                            // line 161
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["form_group"], "fields", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                                // line 162
                                echo "                                                    ";
                                $context["nested_field"] = $this->getAttribute($this->getAttribute($context["nested_group_field"], "children", array()), $context["field_name"], array(), "array");
                                // line 163
                                echo "                                                    ";
                                if ($this->getAttribute($this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : null), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                                    // line 164
                                    echo "                                                        ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["nested_field"]) ? $context["nested_field"] : $this->getContext($context, "nested_field")), 'row', array("inline" => "natural", "edit" => "inline"));
                                    // line 167
                                    echo "
                                                        ";
                                    // line 168
                                    $context["dummy"] = $this->getAttribute($context["nested_group_field"], "setrendered", array());
                                    // line 169
                                    echo "                                                    ";
                                } else {
                                    // line 170
                                    echo "                                                        ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["nested_field"]) ? $context["nested_field"] : $this->getContext($context, "nested_field")), 'row');
                                    echo "
                                                    ";
                                }
                                // line 172
                                echo "                                                ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 173
                            echo "                                            </div>
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
                        // line 177
                        echo "                            </div>

                            ";
                        // line 179
                        if ($this->getAttribute($context["nested_group_field"], "_delete", array(), "array", true, true)) {
                            // line 180
                            echo "                                ";
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["nested_group_field"], "_delete", array(), "array"), 'row');
                            echo "
                            ";
                        }
                        // line 182
                        echo "                        ";
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
                    // line 183
                    echo "                    </div>
                ";
                }
                // line 185
                echo "            ";
            } else {
                // line 186
                echo "                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
                echo "
            ";
            }
            // line 188
            echo "
        </span>

            ";
            // line 191
            if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "edit", array()) == "inline")) {
                // line 192
                echo "
                ";
                // line 193
                if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "hasroute", array(0 => "create"), "method") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "isGranted", array(0 => "CREATE"), "method")) && (isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")))) {
                    // line 194
                    echo "                    <span id=\"field_actions_";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "\" >
                    <a
                            href=\"";
                    // line 196
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    echo "\"
                            onclick=\"return start_field_retrieve_";
                    // line 197
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "(this);\"
                            class=\"btn sonata-ba-action\"
                            title=\"";
                    // line 199
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : $this->getContext($context, "btn_catalogue"))), "html", null, true);
                    echo "\"
                            >
                        <i class=\"icon-plus\"></i>
                        ";
                    // line 202
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : $this->getContext($context, "btn_catalogue"))), "html", null, true);
                    echo "
                    </a>
                </span>
                ";
                }
                // line 206
                echo "
                ";
                // line 208
                echo "                ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "sortable", array(), "any", true, true)) {
                    // line 209
                    echo "                    <script type=\"text/javascript\">
                        jQuery('div#field_container_";
                    // line 210
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo " tbody.sonata-ba-tbody').sortable({
                            axis: 'y',
                            opacity: 0.6,
                            items: 'tr',
                            stop: apply_position_value_";
                    // line 214
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "
                        });

                        function apply_position_value_";
                    // line 217
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "() {
                            // update the input value position
                            jQuery('div#field_container_";
                    // line 219
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
                    // line 226
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
                    // line 232
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "').bind('sonata.add_element', function() {
                            apply_position_value_";
                    // line 233
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "();
                            jQuery('div#field_container_";
                    // line 234
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo " tbody.sonata-ba-tbody').sortable('refresh');
                        });

                        apply_position_value_";
                    // line 237
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "();

                    </script>
                ";
                }
                // line 241
                echo "
                ";
                // line 243
                echo "                ";
                $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_one_association_script.html.twig")->display($context);
                // line 244
                echo "
            ";
            } else {
                // line 246
                echo "                <span id=\"field_actions_";
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "\" >
                ";
                // line 247
                if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "hasroute", array(0 => "create"), "method") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "isGranted", array(0 => "CREATE"), "method")) && (isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")))) {
                    // line 248
                    echo "                    <a
                            href=\"";
                    // line 249
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    echo "\"
                            onclick=\"return start_field_dialog_form_add_";
                    // line 250
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "(this);\"
                            class=\"btn sonata-ba-action\"
                            title=\"";
                    // line 252
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : $this->getContext($context, "btn_catalogue"))), "html", null, true);
                    echo "\"
                            >
                        <i class=\"icon-plus\"></i>
                        ";
                    // line 255
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : $this->getContext($context, "btn_add")), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : $this->getContext($context, "btn_catalogue"))), "html", null, true);
                    echo "
                    </a>
                ";
                }
                // line 258
                echo "            </span>

                <div style=\"display: none\" id=\"field_dialog_";
                // line 260
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "\">

                </div>

                ";
                // line 264
                $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig")->display($context);
                // line 265
                echo "            ";
            }
            // line 266
            echo "        </div>
    ";
        }
        // line 268
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supply/Form:sonata_type_collection_products.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  705 => 268,  701 => 266,  698 => 265,  696 => 264,  689 => 260,  685 => 258,  679 => 255,  673 => 252,  668 => 250,  664 => 249,  661 => 248,  659 => 247,  654 => 246,  650 => 244,  647 => 243,  644 => 241,  637 => 237,  631 => 234,  627 => 233,  623 => 232,  610 => 226,  596 => 219,  591 => 217,  585 => 214,  578 => 210,  575 => 209,  572 => 208,  569 => 206,  562 => 202,  556 => 199,  551 => 197,  547 => 196,  541 => 194,  539 => 193,  536 => 192,  534 => 191,  529 => 188,  523 => 186,  520 => 185,  516 => 183,  502 => 182,  496 => 180,  494 => 179,  490 => 177,  473 => 173,  467 => 172,  461 => 170,  458 => 169,  456 => 168,  453 => 167,  450 => 164,  447 => 163,  444 => 162,  440 => 161,  425 => 158,  408 => 157,  403 => 154,  385 => 150,  376 => 148,  369 => 147,  352 => 146,  349 => 145,  332 => 144,  328 => 142,  325 => 141,  322 => 140,  271 => 92,  265 => 91,  259 => 90,  250 => 83,  246 => 82,  243 => 81,  236 => 79,  229 => 77,  223 => 74,  220 => 73,  217 => 72,  211 => 70,  208 => 69,  206 => 68,  200 => 66,  198 => 65,  184 => 64,  178 => 63,  175 => 62,  171 => 61,  169 => 59,  165 => 57,  159 => 54,  156 => 53,  154 => 52,  149 => 50,  146 => 49,  144 => 48,  137 => 46,  131 => 44,  128 => 43,  126 => 42,  121 => 39,  115 => 38,  111 => 36,  107 => 34,  105 => 33,  100 => 31,  92 => 30,  86 => 28,  83 => 27,  80 => 26,  76 => 25,  71 => 22,  68 => 21,  65 => 20,  63 => 19,  59 => 18,  54 => 17,  51 => 16,  48 => 15,  39 => 13,  34 => 12,  32 => 11,  29 => 10,  23 => 9,  20 => 7,);
    }
}
