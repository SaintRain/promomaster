<?php

/* CoreProductBundle:Admin/Form/modifications_widget:generate_table_row.html.twig */
class __TwigTemplate_b72ecd68c2782becbbe16ee3c2af810a755970df4b0976d049b8d622851a21bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'generate_table_row' => array($this, 'block_generate_table_row'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('generate_table_row', $context, $blocks);
    }

    public function block_generate_table_row($context, array $blocks = array())
    {
        // line 2
        echo "<tr class=\"main-row-collection ";
        echo twig_escape_filter($this->env, (isset($context["field_id"]) ? $context["field_id"] : null), "html", null, true);
        echo "_row_id_";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), "html", null, true);
        echo "\">
    
    ";
        // line 4
        if ($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "deleteable", array())) {
            // line 5
            echo "    <td><input type=\"checkbox\" ";
            if (($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()) != (isset($context["subject_id"]) ? $context["subject_id"] : null))) {
                echo "  class=\"";
                echo twig_escape_filter($this->env, (isset($context["field_id"]) ? $context["field_id"] : null), "html", null, true);
                echo "__delete\"   name=\"";
                echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
                echo "[";
                echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : null), "html", null, true);
                echo "][_delete][]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), "html", null, true);
                echo "\"
 ";
                // line 6
                if ((array_key_exists("dInfo", $context) && $this->env->getExtension('checked_modification')->isCheckedForModificationDelete($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), (isset($context["dInfo"]) ? $context["dInfo"] : null)))) {
                    echo " checked=\"checked\" ";
                }
            } else {
                // line 7
                echo " disabled ";
            }
            echo ">
                   </td>
";
        }
        // line 9
        echo "    
               <td><input type=\"checkbox\" ";
        // line 10
        if (($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()) != (isset($context["subject_id"]) ? $context["subject_id"] : null))) {
            echo " class=\"";
            echo twig_escape_filter($this->env, (isset($context["field_id"]) ? $context["field_id"] : null), "html", null, true);
            echo "__undock\" name=\"";
            echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : null), "html", null, true);
            echo "][_undock][]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), "html", null, true);
            echo "\"
";
            // line 11
            if ((array_key_exists("dInfo", $context) && $this->env->getExtension('checked_modification')->isCheckedForModificationUndock($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), (isset($context["dInfo"]) ? $context["dInfo"] : null)))) {
                echo " checked=\"checked\" ";
            }
            // line 12
            echo "
";
        } else {
            // line 13
            echo " disabled ";
        }
        echo "><input type=\"hidden\" name=\"";
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : null), "html", null, true);
        echo "][ids][]\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), "html", null, true);
        echo "\"></td>
                          <td><input type=\"radio\"
";
        // line 15
        if (((array_key_exists("dInfo", $context) && (isset($context["dInfo"]) ? $context["dInfo"] : null)) && $this->env->getExtension('checked_modification')->isGeneralForModification($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), (isset($context["dInfo"]) ? $context["dInfo"] : null)))) {
            echo " checked ";
        } else {
            if (($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()) == (isset($context["general_id"]) ? $context["general_id"] : null))) {
                echo " checked";
            }
        }
        echo "  name=\"";
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : null), "html", null, true);
        echo "][general]\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), "html", null, true);
        echo "\"></td>

                    ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "columns", array()));
        foreach ($context['_seq'] as $context["d_key"] => $context["column"]) {
            // line 18
            echo "                                     <td>
                            ";
            // line 19
            if ($this->getAttribute($context["column"], "template", array(), "any", true, true)) {
            } else {
                // line 21
                echo "
";
                // line 22
                if (($this->getAttribute($context["column"], "type", array(), "any", true, true) && ($this->getAttribute($context["column"], "type", array()) == "boolean"))) {
                    // line 23
                    echo "    ";
                    echo twig_include($this->env, $context, "CoreProductBundle::Admin/Form/modifications_widget/td_types/boolean.html.twig", array("field_id" => (isset($context["field_id"]) ? $context["field_id"] : null), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : null), "d" => (isset($context["d"]) ? $context["d"] : null), "d_key" => $context["d_key"]));
                    echo "
    ";
                } else {
                    // line 25
                    echo "        ";
                    if (($this->getAttribute($context["column"], "type", array(), "any", true, true) && ($this->getAttribute($context["column"], "type", array()) == "money"))) {
                        // line 26
                        echo "            ";
                        echo twig_include($this->env, $context, "CoreProductBundle::Admin/Form/modifications_widget/td_types/money.html.twig", array("field_id" => (isset($context["field_id"]) ? $context["field_id"] : null), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : null), "d" => (isset($context["d"]) ? $context["d"] : null), "d_key" => $context["d_key"]));
                        echo "
        ";
                    } else {
                        // line 28
                        echo "            ";
                        if (($this->getAttribute($context["column"], "type", array(), "any", true, true) && ($this->getAttribute($context["column"], "type", array()) == "image"))) {
                            // line 29
                            echo "                ";
                            echo twig_include($this->env, $context, "CoreProductBundle::Admin/Form/modifications_widget/td_types/image.html.twig", array("field_id" => (isset($context["field_id"]) ? $context["field_id"] : null), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : null), "d" => (isset($context["d"]) ? $context["d"] : null), "d_key" => $context["d_key"]));
                            echo "
            ";
                        } else {
                            // line 31
                            echo "            ";
                            if (($this->getAttribute($context["column"], "type", array(), "any", true, true) && ($this->getAttribute($context["column"], "type", array()) == "color"))) {
                                // line 32
                                echo "                ";
                                echo twig_include($this->env, $context, "CoreProductBundle::Admin/Form/modifications_widget/td_types/color.html.twig", array("field_id" => (isset($context["field_id"]) ? $context["field_id"] : null), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : null), "d" => (isset($context["d"]) ? $context["d"] : null), "d_key" => $context["d_key"]));
                                echo "
            ";
                            } else {
                                // line 34
                                echo "            ";
                                if (($this->getAttribute($context["column"], "type", array(), "any", true, true) && ($this->getAttribute($context["column"], "type", array()) == "product_data_property"))) {
                                    // line 35
                                    echo "                ";
                                    echo twig_include($this->env, $context, "CoreProductBundle::Admin/Form/modifications_widget/td_types/product_data_property.html.twig", array("field_id" => (isset($context["field_id"]) ? $context["field_id"] : null), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : null), "d" => (isset($context["d"]) ? $context["d"] : null), "d_key" => $context["d_key"]));
                                    echo "
            ";
                                } else {
                                    // line 37
                                    echo "
         ";
                                    // line 38
                                    if ((($this->getAttribute($context["column"], "identifier", array(), "any", true, true) && $this->getAttribute($context["column"], "identifier", array())) && ($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()) != (isset($context["subject_id"]) ? $context["subject_id"] : null)))) {
                                        // line 39
                                        echo "                                             <a target=\"_blank\" href=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "edit_route", array()), array("id" => $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()))), "html", null, true);
                                        echo "\">";
                                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), $context["d_key"]), "html", null, true);
                                        echo "</a>
        ";
                                    } else {
                                        // line 41
                                        echo "            ";
                                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), $context["d_key"]), "html", null, true);
                                        echo "
        ";
                                    }
                                    // line 43
                                    echo "        ";
                                }
                                // line 44
                                echo "        ";
                            }
                            // line 45
                            echo "        ";
                        }
                        // line 46
                        echo "        ";
                    }
                    // line 47
                    echo "    ";
                }
            }
            // line 49
            echo "                                         </td>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['d_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "                ";
        if ((isset($context["sortable"]) ? $context["sortable"] : null)) {
            // line 52
            echo "                                         <td class=\"sonata-ba-td-";
            echo twig_escape_filter($this->env, (isset($context["field_id"]) ? $context["field_id"] : null), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, (isset($context["sortable"]) ? $context["sortable"] : null), "html", null, true);
            echo " hidden\">
                                             <input type=\"hidden\"
                                                    name=\"";
            // line 54
            echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : null), "html", null, true);
            echo "][_indexPosition][]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), (isset($context["sortable"]) ? $context["sortable"] : null)), "html", null, true);
            echo "\"></td>
                ";
        }
        // line 56
        echo "                              </tr>

";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/Form/modifications_widget:generate_table_row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  232 => 56,  223 => 54,  215 => 52,  212 => 51,  205 => 49,  201 => 47,  198 => 46,  195 => 45,  192 => 44,  189 => 43,  183 => 41,  175 => 39,  173 => 38,  170 => 37,  164 => 35,  161 => 34,  155 => 32,  152 => 31,  146 => 29,  143 => 28,  137 => 26,  134 => 25,  128 => 23,  126 => 22,  123 => 21,  120 => 19,  117 => 18,  113 => 17,  96 => 15,  84 => 13,  80 => 12,  76 => 11,  64 => 10,  61 => 9,  54 => 7,  49 => 6,  36 => 5,  34 => 4,  26 => 2,  20 => 1,);
    }
}
