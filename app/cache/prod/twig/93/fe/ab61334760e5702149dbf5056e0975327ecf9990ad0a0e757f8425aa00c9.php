<?php

/* CoreOrderBundle:Admin/Form/Order/type:boxes_and_waybills_type_widget.html.twig */
class __TwigTemplate_93feab61334760e5702149dbf5056e0975327ecf9990ad0a0e757f8425aa00c9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'boxes_and_waybills_type_widget' => array($this, 'block_boxes_and_waybills_type_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('boxes_and_waybills_type_widget', $context, $blocks);
        // line 201
        echo "    
";
    }

    // line 1
    public function block_boxes_and_waybills_type_widget($context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 3
        if ((!$this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "hasassociationadmin", array()))) {
            // line 4
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["value"]) ? $context["value"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 5
                echo "        ";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_admin')->renderRelationElement($context["element"], $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array())), "html", null, true);
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 8
            echo "
    <div id=\"field_container_";
            // line 9
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "\" class=\"field-container\">
        <span id=\"field_widget_";
            // line 10
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "\" >
            ";
            // line 11
            if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "edit", array()) == "inline")) {
                // line 12
                echo "                ";
                if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "inline", array()) == "table")) {
                    // line 13
                    echo "                    ";
                    if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array())) > 0)) {
                        // line 14
                        echo "                        <table class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    ";
                        // line 17
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array())), "children", array()));
                        foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                            // line 18
                            echo "                                        
                                        ";
                            // line 19
                            if (($context["field_name"] == "_delete")) {
                                // line 20
                                echo "                                            <th>";
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action_delete", array(), "SonataAdminBundle"), "html", null, true);
                                echo "</th>
                                        ";
                            } elseif (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) != "sizesOfBox")) {
                                // line 22
                                echo "                                            <th ";
                                echo (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "required", array(), "array")) ? ("class=\"required\"") : (""));
                                if (($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "attr", array(), "array", false, true), "hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "attr", array(), "array"), "hidden", array(), "array"))) {
                                    echo " style=\"display:none;\"";
                                }
                                echo ">
                                                ";
                                // line 23
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array(), "array"), "admin", array()), "trans", array(0 => $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "label", array())), "method"), "html", null, true);
                                echo "
                                            </th>
                                        ";
                            }
                            // line 26
                            echo "                                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 27
                        echo "                                </tr>
                            </thead>
                            <tbody class=\"sonata-ba-tbody\">
                                ";
                        // line 30
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()));
                        foreach ($context['_seq'] as $context["nested_group_field_name"] => $context["nested_group_field"]) {
                            // line 31
                            echo "                                    ";
                            $context["arr"] = array();
                            // line 32
                            echo "                                    <tr>
                                        ";
                            // line 33
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["nested_group_field"], "children", array()));
                            foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                                // line 34
                                echo "                                            ";
                                if (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "sizesOfBox")) {
                                    // line 35
                                    echo "                                                ";
                                    $context["arr"] = twig_array_merge((isset($context["arr"]) ? $context["arr"] : null), array($context["field_name"] => $context["nested_field"]));
                                    echo " 
                                                ";
                                } else {
                                    // line 37
                                    echo "                                                <td class=\"sonata-ba-td-";
                                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
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
                                    // line 38
                                    if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "associationadmin", array(), "any", false, true), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                                        // line 39
                                        echo "                                                        ";
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                        echo "

                                                        ";
                                        // line 41
                                        $context["dummy"] = $this->getAttribute($context["nested_group_field"], "setrendered", array());
                                        // line 42
                                        echo "                                                    ";
                                    } else {
                                        // line 43
                                        echo "                                                        ";
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                        echo "
                                                    ";
                                    }
                                    // line 45
                                    echo "                                                    ";
                                    if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                                        // line 46
                                        echo "                                                        <div class=\"help-inline sonata-ba-field-error-messages\">
                                                            ";
                                        // line 47
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'errors');
                                        echo "
                                                        </div>
                                                    ";
                                    }
                                    // line 50
                                    echo "                                                </td>
                                                ";
                                }
                                // line 52
                                echo "                                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 53
                            echo "                                    </tr>
                                    
                                    ";
                            // line 55
                            if (twig_length_filter($this->env, (isset($context["arr"]) ? $context["arr"] : null))) {
                                // line 56
                                echo "                                            ";
                                $context["colspan"] = (twig_length_filter($this->env, $this->getAttribute($context["nested_group_field"], "children", array())) - 1);
                                // line 57
                                echo "                                            ";
                                $context['_parent'] = (array) $context;
                                $context['_seq'] = twig_ensure_traversable((isset($context["arr"]) ? $context["arr"] : null));
                                foreach ($context['_seq'] as $context["_key"] => $context["col_in_col_field"]) {
                                    // line 58
                                    echo "                                                <tr>
                                                    <td colspan=\"";
                                    // line 59
                                    echo twig_escape_filter($this->env, (isset($context["colspan"]) ? $context["colspan"] : null), "html", null, true);
                                    echo "\">
                                                        ";
                                    // line 60
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["col_in_col_field"], 'widget');
                                    echo "
                                                        ";
                                    // line 61
                                    $context["dummy"] = $this->getAttribute($context["col_in_col_field"], "setrendered", array());
                                    // line 62
                                    echo "                                                    </td>
                                                </tr>
                                            ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col_in_col_field'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 65
                                echo "                                    ";
                            }
                            // line 66
                            echo "                                    
                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['nested_group_field_name'], $context['nested_group_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 68
                        echo "                            </tbody>
                        </table>
                    ";
                    }
                    // line 71
                    echo "                ";
                } elseif ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array())) > 0)) {
                    // line 72
                    echo "                    ";
                    $context["associationAdmin"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "associationadmin", array());
                    // line 73
                    echo "
                    <div>
                        ";
                    // line 75
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()));
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
                        // line 76
                        echo "                            <ul class=\"nav nav-tabs\">
                                ";
                        // line 77
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : null), "formgroups", array()));
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
                            // line 78
                            echo "                                    <li class=\"";
                            if ($this->getAttribute($context["loop"], "first", array())) {
                                echo "active";
                            }
                            echo "\">
                                        <a href=\"#";
                            // line 79
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : null), "uniqid", array()), "html", null, true);
                            echo "_";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                            echo "_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                            echo "\" data-toggle=\"tab\">
                                            <i class=\"icon-exclamation-sign has-errors hide\"></i>
                                            ";
                            // line 81
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : null), "trans", array(0 => $context["name"], 1 => array(), 2 => $this->getAttribute($context["form_group"], "translation_domain", array())), "method"), "html", null, true);
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
                        // line 85
                        echo "                            </ul>

                            <div class=\"tab-content\">
                                ";
                        // line 88
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : null), "formgroups", array()));
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
                            // line 89
                            echo "                                    <div class=\"tab-pane ";
                            if ($this->getAttribute($context["loop"], "first", array())) {
                                echo "active";
                            }
                            echo "\" id=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : null), "uniqid", array()), "html", null, true);
                            echo "_";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                            echo "_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                            echo "\">
                                        <fieldset>
                                            <div class=\"sonata-ba-collapsed-fields\">
                                                ";
                            // line 92
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["form_group"], "fields", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                                // line 93
                                echo "                                                    ";
                                $context["nested_field"] = $this->getAttribute($this->getAttribute($context["nested_group_field"], "children", array()), $context["field_name"], array(), "array");
                                // line 94
                                echo "                                                    ";
                                if ($this->getAttribute($this->getAttribute((isset($context["associationAdmin"]) ? $context["associationAdmin"] : null), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                                    // line 95
                                    echo "                                                        ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["nested_field"]) ? $context["nested_field"] : null), 'row', array("inline" => "natural", "edit" => "inline"));
                                    // line 98
                                    echo "
                                                        ";
                                    // line 99
                                    $context["dummy"] = $this->getAttribute($context["nested_group_field"], "setrendered", array());
                                    // line 100
                                    echo "                                                    ";
                                } else {
                                    // line 101
                                    echo "                                                        ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["nested_field"]) ? $context["nested_field"] : null), 'row');
                                    echo "
                                                    ";
                                }
                                // line 103
                                echo "                                                ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 104
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
                        // line 108
                        echo "                            </div>

                            ";
                        // line 110
                        if ($this->getAttribute($context["nested_group_field"], "_delete", array(), "array", true, true)) {
                            // line 111
                            echo "                                ";
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["nested_group_field"], "_delete", array(), "array"), 'row');
                            echo "
                            ";
                        }
                        // line 113
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
                    // line 114
                    echo "                    </div>
                ";
                }
                // line 116
                echo "            ";
            } else {
                // line 117
                echo "                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
                echo "
            ";
            }
            // line 119
            echo "
        </span>

        ";
            // line 122
            if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "edit", array()) == "inline")) {
                // line 123
                echo "            ";
                // line 124
                echo "            ";
                if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "associationadmin", array()), "hasroute", array(0 => "create"), "method") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "associationadmin", array()), "isGranted", array(0 => "CREATE"), "method")) && (isset($context["btn_add"]) ? $context["btn_add"] : null))) {
                    // line 125
                    echo "                ";
                    // line 126
                    echo "                <span id=\"field_actions_";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\" >
                    <a
                        href=\"";
                    // line 128
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    echo "\"
                        onclick=\"return start_field_retrieve_";
                    // line 129
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "(this);\"
                        class=\"btn sonata-ba-action\"
                        title=\"";
                    // line 131
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : null), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : null)), "html", null, true);
                    echo "\"
                        >
                        <i class=\"icon-plus\"></i>
                        ";
                    // line 134
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : null), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : null)), "html", null, true);
                    echo "
                    </a>
                </span>
            ";
                }
                // line 138
                echo "
            ";
                // line 140
                echo "            ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "sortable", array(), "any", true, true)) {
                    // line 141
                    echo "                <script type=\"text/javascript\">
                    jQuery('div#field_container_";
                    // line 142
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo " tbody.sonata-ba-tbody').sortable({
                        axis: 'y',
                        opacity: 0.6,
                        items: 'tr',
                        stop: apply_position_value_";
                    // line 146
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "
                    });

                    function apply_position_value_";
                    // line 149
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "() {
                        // update the input value position
                        jQuery('div#field_container_";
                    // line 151
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo " tbody.sonata-ba-tbody td.sonata-ba-td-";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "options", array()), "sortable", array()), "html", null, true);
                    echo "').each(function(index, element) {
                            // remove the sortable handler and put it back
                            jQuery('span.sonata-ba-sortable-handler', element).remove();
                            jQuery(element).append('<span class=\"sonata-ba-sortable-handler ui-icon ui-icon-grip-solid-horizontal\"></span>');
                            jQuery('input', element).hide();
                        });

                        jQuery('div#field_container_";
                    // line 158
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo " tbody.sonata-ba-tbody td.sonata-ba-td-";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "options", array()), "sortable", array()), "html", null, true);
                    echo " input').each(function(index, value) {
                            jQuery(value).val(index + 1);
                        });
                    }

                    // refresh the sortable option when a new element is added
                    jQuery('#sonata-ba-field-container-";
                    // line 164
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "').bind('sonata.add_element', function() {
                        apply_position_value_";
                    // line 165
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "();
                        jQuery('div#field_container_";
                    // line 166
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo " tbody.sonata-ba-tbody').sortable('refresh');
                    });

                    apply_position_value_";
                    // line 169
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "();

                </script>
            ";
                }
                // line 173
                echo "
            ";
                // line 175
                echo "            ";
                $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_one_association_script.html.twig")->display($context);
                // line 176
                echo "
        ";
            } else {
                // line 178
                echo "            <span id=\"field_actions_";
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                echo "\" >
                ";
                // line 179
                if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "associationadmin", array()), "hasroute", array(0 => "create"), "method") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "associationadmin", array()), "isGranted", array(0 => "CREATE"), "method")) && (isset($context["btn_add"]) ? $context["btn_add"] : null))) {
                    // line 180
                    echo "                    <a
                        href=\"";
                    // line 181
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "associationadmin", array()), "generateUrl", array(0 => "create", 1 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")), "method"), "html", null, true);
                    echo "\"
                        onclick=\"return start_field_dialog_form_add_";
                    // line 182
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "(this);\"
                        class=\"btn sonata-ba-action\"
                        title=\"";
                    // line 184
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : null), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : null)), "html", null, true);
                    echo "\"
                        >
                        <i class=\"icon-plus\"></i>
                        ";
                    // line 187
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["btn_add"]) ? $context["btn_add"] : null), array(), (isset($context["btn_catalogue"]) ? $context["btn_catalogue"] : null)), "html", null, true);
                    echo "
                    </a>
                ";
                }
                // line 190
                echo "            </span>

            <div style=\"display: none\" id=\"field_dialog_";
                // line 192
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                echo "\">

            </div>

            ";
                // line 196
                $this->env->loadTemplate("SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig")->display($context);
                // line 197
                echo "        ";
            }
            // line 198
            echo "    </div>
";
        }
        // line 200
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order/type:boxes_and_waybills_type_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  628 => 200,  624 => 198,  621 => 197,  619 => 196,  612 => 192,  608 => 190,  602 => 187,  596 => 184,  591 => 182,  587 => 181,  584 => 180,  582 => 179,  577 => 178,  573 => 176,  570 => 175,  567 => 173,  560 => 169,  554 => 166,  550 => 165,  546 => 164,  533 => 158,  519 => 151,  514 => 149,  508 => 146,  501 => 142,  498 => 141,  495 => 140,  492 => 138,  485 => 134,  479 => 131,  474 => 129,  470 => 128,  464 => 126,  462 => 125,  459 => 124,  457 => 123,  455 => 122,  450 => 119,  444 => 117,  441 => 116,  437 => 114,  423 => 113,  417 => 111,  415 => 110,  411 => 108,  394 => 104,  388 => 103,  382 => 101,  379 => 100,  377 => 99,  374 => 98,  371 => 95,  368 => 94,  365 => 93,  361 => 92,  346 => 89,  329 => 88,  324 => 85,  306 => 81,  297 => 79,  290 => 78,  273 => 77,  270 => 76,  253 => 75,  249 => 73,  246 => 72,  243 => 71,  238 => 68,  231 => 66,  228 => 65,  220 => 62,  218 => 61,  214 => 60,  210 => 59,  207 => 58,  202 => 57,  199 => 56,  197 => 55,  193 => 53,  187 => 52,  183 => 50,  177 => 47,  174 => 46,  171 => 45,  165 => 43,  162 => 42,  160 => 41,  154 => 39,  152 => 38,  137 => 37,  131 => 35,  128 => 34,  124 => 33,  121 => 32,  118 => 31,  114 => 30,  109 => 27,  103 => 26,  97 => 23,  89 => 22,  83 => 20,  81 => 19,  78 => 18,  74 => 17,  69 => 14,  66 => 13,  63 => 12,  61 => 11,  57 => 10,  53 => 9,  50 => 8,  40 => 5,  35 => 4,  33 => 3,  30 => 2,  27 => 1,  22 => 201,  20 => 1,);
    }
}
