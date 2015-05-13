<?php

/* CoreUnionBundle:Admin/Form:generate_table_row.html.twig */
class __TwigTemplate_e05ff2ed1d63a76a6866e4a12a067c125187472bf6b018238654e76464624e07 extends Twig_Template
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
        echo "
<tr class=\"main-row-collection ";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["field_id"]) ? $context["field_id"] : null), "html", null, true);
        echo "_row_id_";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), "html", null, true);
        echo "\">
    ";
        // line 4
        if ($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "deleteable", array())) {
            // line 5
            echo "        <td><input type=\"checkbox\" ";
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
                if ((array_key_exists("dInfo", $context) && $this->env->getExtension('checked_union')->isCheckedForUnionDelete($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), (isset($context["dInfo"]) ? $context["dInfo"] : null)))) {
                    echo " checked=\"checked\" ";
                }
                // line 7
                echo "    ";
            } else {
                echo " disabled ";
            }
            echo ">
                   </td>
    ";
        }
        // line 10
        echo "                   <td>
                       <input type=\"hidden\" name=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : null), "html", null, true);
        echo "][ids][]\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), "html", null, true);
        echo "\">
                       <input type=\"checkbox\" ";
        // line 12
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
            // line 13
            if ((array_key_exists("dInfo", $context) && $this->env->getExtension('checked_union')->isCheckedForUnionUndock($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), (isset($context["dInfo"]) ? $context["dInfo"] : null)))) {
                echo " checked=\"checked\" ";
            }
        } else {
            // line 14
            echo " disabled ";
        }
        echo "></td>
                      ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "columns", array()));
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
        foreach ($context['_seq'] as $context["d_key"] => $context["column"]) {
            // line 16
            echo "                   <td>
                            ";
            // line 17
            if ($this->getAttribute($context["column"], "template", array(), "any", true, true)) {
            } else {
                // line 19
                echo "
";
                // line 20
                if (($this->getAttribute($context["column"], "type", array(), "any", true, true) && ($this->getAttribute($context["column"], "type", array()) == "boolean"))) {
                    // line 21
                    echo "    ";
                    echo twig_include($this->env, $context, "CoreUnionBundle::Admin/Form/td_types/boolean.html.twig", array("field_id" => (isset($context["field_id"]) ? $context["field_id"] : null), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : null), "d" => (isset($context["d"]) ? $context["d"] : null), "d_key" => $context["d_key"]));
                    echo "
    ";
                } else {
                    // line 23
                    echo "        ";
                    if (($this->getAttribute($context["column"], "type", array(), "any", true, true) && ($this->getAttribute($context["column"], "type", array()) == "money"))) {
                        // line 24
                        echo "            ";
                        echo twig_include($this->env, $context, "CoreProductBundle::Admin/Form/modifications_widget/td_types/money.html.twig", array("field_id" => (isset($context["field_id"]) ? $context["field_id"] : null), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : null), "d" => (isset($context["d"]) ? $context["d"] : null), "d_key" => $context["d_key"]));
                        echo "
        ";
                    } else {
                        // line 26
                        echo "        ";
                        if (($this->getAttribute($context["column"], "type", array(), "any", true, true) && ($this->getAttribute($context["column"], "type", array()) == "image"))) {
                            // line 27
                            echo "            ";
                            echo twig_include($this->env, $context, "CoreUnionBundle::Admin/Form/td_types/image.html.twig", array("field_id" => (isset($context["field_id"]) ? $context["field_id"] : null), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : null), "d" => (isset($context["d"]) ? $context["d"] : null), "d_key" => $context["d_key"]));
                            echo "
        ";
                        } else {
                            // line 29
                            echo "        ";
                            if (($this->getAttribute($context["column"], "type", array(), "any", true, true) && ($this->getAttribute($context["column"], "type", array()) == "quantity"))) {
                                // line 30
                                echo "            ";
                                echo twig_include($this->env, $context, "CoreUnionBundle::Admin/Form/td_types/quantity.html.twig", array("field_id" => (isset($context["field_id"]) ? $context["field_id"] : null), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : null), "d" => (isset($context["d"]) ? $context["d"] : null), "d_key" => $context["d_key"], "union" => (isset($context["union"]) ? $context["union"] : null)));
                                echo "
        ";
                            } else {
                                // line 32
                                echo "        ";
                                if ((($this->getAttribute($context["column"], "identifier", array(), "any", true, true) && $this->getAttribute($context["column"], "identifier", array())) && ($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()) != (isset($context["subject_id"]) ? $context["subject_id"] : null)))) {
                                    // line 33
                                    echo "                           <a target=\"_blank\" href=\"";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "edit_route", array()), array("id" => $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()))), "html", null, true);
                                    echo "\">";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), $context["d_key"]), "html", null, true);
                                    echo "</a>
        ";
                                } else {
                                    // line 35
                                    echo "            ";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), $context["d_key"]), "html", null, true);
                                    echo "
        ";
                                }
                                // line 37
                                echo "
        ";
                            }
                            // line 39
                            echo "    ";
                        }
                        // line 40
                        echo "    ";
                    }
                    // line 41
                    echo "    ";
                }
            }
            // line 43
            echo "                       </td>
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
        unset($context['_seq'], $context['_iterated'], $context['d_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "                ";
        if ((isset($context["sortable"]) ? $context["sortable"] : null)) {
            // line 46
            echo "                       <td class=\"sonata-ba-td-";
            echo twig_escape_filter($this->env, (isset($context["field_id"]) ? $context["field_id"] : null), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, (isset($context["sortable"]) ? $context["sortable"] : null), "html", null, true);
            echo " hidden\">
                           <input type=\"hidden\"
                                  name=\"";
            // line 48
            echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
            echo "[";
            echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : null), "html", null, true);
            echo "][_indexPosition][]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["union"]) ? $context["union"] : null), (isset($context["sortable"]) ? $context["sortable"] : null)), "html", null, true);
            echo "\"></td>
                ";
        }
        // line 50
        echo "            </tr>

";
    }

    public function getTemplateName()
    {
        return "CoreUnionBundle:Admin/Form:generate_table_row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  223 => 50,  214 => 48,  206 => 46,  203 => 45,  188 => 43,  184 => 41,  181 => 40,  178 => 39,  174 => 37,  168 => 35,  160 => 33,  157 => 32,  151 => 30,  148 => 29,  142 => 27,  139 => 26,  133 => 24,  130 => 23,  124 => 21,  122 => 20,  119 => 19,  116 => 17,  113 => 16,  96 => 15,  91 => 14,  86 => 13,  74 => 12,  66 => 11,  63 => 10,  54 => 7,  50 => 6,  37 => 5,  35 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }
}
