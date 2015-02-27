<?php

/* SonataAdminBundle:CRUD:base_list.html.twig */
class __TwigTemplate_f43da267c7b6dd4bbec61256da830cad65600acafe2441b29e97233e4910f258 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'actions' => array($this, 'block_actions'),
            'side_menu' => array($this, 'block_side_menu'),
            'list_table' => array($this, 'block_list_table'),
            'list_header' => array($this, 'block_list_header'),
            'table_header' => array($this, 'block_table_header'),
            'table_body' => array($this, 'block_table_body'),
            'table_footer' => array($this, 'block_table_footer'),
            'batch' => array($this, 'block_batch'),
            'batch_javascript' => array($this, 'block_batch_javascript'),
            'batch_actions' => array($this, 'block_batch_actions'),
            'pager_results' => array($this, 'block_pager_results'),
            'pager_links' => array($this, 'block_pager_links'),
            'list_footer' => array($this, 'block_list_footer'),
            'list_filters' => array($this, 'block_list_filters'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 12
        return $this->env->resolveTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_actions($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"sonata-actions btn-group\">
        ";
        // line 16
        $this->env->loadTemplate("SonataAdminBundle:Core:create_button.html.twig")->display($context);
        // line 17
        echo "    </div>
";
    }

    // line 20
    public function block_side_menu($context, array $blocks = array())
    {
        echo $this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "sidemenu", array(0 => (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action"))), "method"), array("currentClass" => "active"), "list");
    }

    // line 22
    public function block_list_table($context, array $blocks = array())
    {
        // line 23
        echo "
    ";
        // line 24
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.list.table.top", array("admin" => (isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")))));
        echo "

    ";
        // line 26
        $this->displayBlock('list_header', $context, $blocks);
        // line 27
        echo "
    ";
        // line 28
        $context["batchactions"] = $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "batchactions", array());
        // line 29
        echo "    ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "results", array())) > 0)) {
            // line 30
            echo "        ";
            if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "hasRoute", array(0 => "batch"), "method")) {
                // line 31
                echo "        <form action=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => "batch", 1 => array("filter" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "filterParameters", array()))), "method"), "html", null, true);
                echo "\" method=\"POST\" >
            <input type=\"hidden\" name=\"_sonata_csrf_token\" value=\"";
                // line 32
                echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
                echo "\">
        ";
            }
            // line 34
            echo "            <table class=\"table table-bordered table-striped\">
                ";
            // line 35
            $this->displayBlock('table_header', $context, $blocks);
            // line 69
            echo "
                ";
            // line 70
            $this->displayBlock('table_body', $context, $blocks);
            // line 79
            echo "
                ";
            // line 80
            $this->displayBlock('table_footer', $context, $blocks);
            // line 143
            echo "            </table>
        ";
            // line 144
            if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "hasRoute", array(0 => "batch"), "method")) {
                // line 145
                echo "        </form>
        ";
            }
            // line 147
            echo "    ";
        } else {
            // line 148
            echo "        <p class=\"notice\">
            ";
            // line 149
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("no_result", array(), "SonataAdminBundle"), "html", null, true);
            echo "
        </p>
    ";
        }
        // line 152
        echo "
    ";
        // line 153
        $this->displayBlock('list_footer', $context, $blocks);
        // line 154
        echo "
    ";
        // line 155
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.list.table.bottom", array("admin" => (isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")))));
        echo "

";
    }

    // line 26
    public function block_list_header($context, array $blocks = array())
    {
    }

    // line 35
    public function block_table_header($context, array $blocks = array())
    {
        // line 36
        echo "                    <thead>
                        <tr class=\"sonata-ba-list-field-header\">
                            ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "list", array()), "elements", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["field_description"]) {
            // line 39
            echo "                                ";
            if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "hasRoute", array(0 => "batch"), "method") && ($this->getAttribute($context["field_description"], "getOption", array(0 => "code"), "method") == "_batch")) && (twig_length_filter($this->env, (isset($context["batchactions"]) ? $context["batchactions"] : $this->getContext($context, "batchactions"))) > 0))) {
                // line 40
                echo "                                    <th class=\"sonata-ba-list-field-header sonata-ba-list-field-header-batch\">
                                      <input type=\"checkbox\" id=\"list_batch_checkbox\">
                                    </th>
                                ";
            } elseif (($this->getAttribute($context["field_description"], "getOption", array(0 => "code"), "method") == "_select")) {
                // line 44
                echo "                                    <th class=\"sonata-ba-list-field-header sonata-ba-list-field-header-select\"></th>
                                ";
            } elseif ((($this->getAttribute($context["field_description"], "name", array()) == "_action") && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "isXmlHttpRequest", array()))) {
                // line 46
                echo "                                        ";
                // line 47
                echo "                                ";
            } else {
                // line 48
                echo "                                    ";
                $context["sortable"] = false;
                // line 49
                echo "                                    ";
                if (($this->getAttribute($this->getAttribute($context["field_description"], "options", array(), "any", false, true), "sortable", array(), "any", true, true) && $this->getAttribute($this->getAttribute($context["field_description"], "options", array()), "sortable", array()))) {
                    // line 50
                    echo "                                        ";
                    $context["sortable"] = true;
                    // line 51
                    echo "                                        ";
                    $context["sort_parameters"] = $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "modelmanager", array()), "sortparameters", array(0 => $context["field_description"], 1 => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array())), "method");
                    // line 52
                    echo "                                        ";
                    $context["current"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "values", array()), "_sort_by", array()) == $context["field_description"]) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "values", array()), "_sort_by", array()), "fieldName", array()) == $this->getAttribute($this->getAttribute((isset($context["sort_parameters"]) ? $context["sort_parameters"] : $this->getContext($context, "sort_parameters")), "filter", array()), "_sort_by", array())));
                    // line 53
                    echo "                                        ";
                    $context["sort_active_class"] = (((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current"))) ? ("sonata-ba-list-field-order-active") : (""));
                    // line 54
                    echo "                                        ";
                    $context["sort_by"] = (((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current"))) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "values", array()), "_sort_order", array())) : ($this->getAttribute($this->getAttribute($context["field_description"], "options", array()), "_sort_order", array())));
                    // line 55
                    echo "                                    ";
                }
                // line 56
                echo "
                                    ";
                // line 57
                ob_start();
                // line 58
                echo "                                        <th class=\"sonata-ba-list-field-header-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["field_description"], "type", array()), "html", null, true);
                echo " ";
                if ((isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))) {
                    echo " sonata-ba-list-field-header-order-";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, (isset($context["sort_by"]) ? $context["sort_by"] : $this->getContext($context, "sort_by"))), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, (isset($context["sort_active_class"]) ? $context["sort_active_class"] : $this->getContext($context, "sort_active_class")), "html", null, true);
                }
                echo "\">
                                            ";
                // line 59
                if ((isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => "list", 1 => (isset($context["sort_parameters"]) ? $context["sort_parameters"] : $this->getContext($context, "sort_parameters"))), "method"), "html", null, true);
                    echo "\">";
                }
                // line 60
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "trans", array(0 => $this->getAttribute($context["field_description"], "label", array()), 1 => array(), 2 => $this->getAttribute($context["field_description"], "translationDomain", array())), "method"), "html", null, true);
                echo "
                                            ";
                // line 61
                if ((isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))) {
                    echo "</a>";
                }
                // line 62
                echo "                                        </th>
                                    ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 64
                echo "                                ";
            }
            // line 65
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_description'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                        </tr>
                    </thead>
                ";
    }

    // line 70
    public function block_table_body($context, array $blocks = array())
    {
        // line 71
        echo "                    <tbody>
                        ";
        // line 72
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "results", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
            // line 73
            echo "                            <tr>
                                ";
            // line 74
            $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "inner_list_row"), "method"))->display($context);
            // line 75
            echo "                            </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "                    </tbody>
                ";
    }

    // line 80
    public function block_table_footer($context, array $blocks = array())
    {
        // line 81
        echo "                    <tr>
                        <th colspan=\"";
        // line 82
        echo twig_escape_filter($this->env, (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "list", array()), "elements", array())) - (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "isXmlHttpRequest", array())) ? (($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "list", array()), "has", array(0 => "_action"), "method") + $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "list", array()), "has", array(0 => "batch"), "method"))) : (0))), "html", null, true);
        echo "\">
                            <div class=\"form-inline\">
                                ";
        // line 84
        if ( !$this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "isXmlHttpRequest", array())) {
            // line 85
            echo "                                    ";
            if (($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "hasRoute", array(0 => "batch"), "method") && (twig_length_filter($this->env, (isset($context["batchactions"]) ? $context["batchactions"] : $this->getContext($context, "batchactions"))) > 0))) {
                // line 86
                echo "                                        ";
                $this->displayBlock('batch', $context, $blocks);
                // line 115
                echo "                                    ";
            }
            // line 116
            echo "
                                    <div class=\"pull-right\">
                                        ";
            // line 118
            if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "hasRoute", array(0 => "export"), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "isGranted", array(0 => "EXPORT"), "method")) && twig_length_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getExportFormats", array(), "method")))) {
                // line 119
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label_export_download", array(), "SonataAdminBundle"), "html", null, true);
                echo "
                                            ";
                // line 120
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getExportFormats", array(), "method"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["format"]) {
                    // line 121
                    echo "                                                <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => "export", 1 => ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "modelmanager", array()), "paginationparameters", array(0 => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), 1 => 0), "method") + array("format" => $context["format"]))), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["format"], "html", null, true);
                    echo "</a>";
                    if ( !$this->getAttribute($context["loop"], "last", array())) {
                        echo ",";
                    }
                    // line 122
                    echo "                                            ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['format'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 123
                echo "
                                            &nbsp;-&nbsp;
                                        ";
            }
            // line 126
            echo "
                                        ";
            // line 127
            $this->displayBlock('pager_results', $context, $blocks);
            // line 130
            echo "                                    </div>
                                ";
        }
        // line 132
        echo "                            </div>
                        </th>
                    </tr>

                    ";
        // line 136
        $this->displayBlock('pager_links', $context, $blocks);
        // line 141
        echo "
                ";
    }

    // line 86
    public function block_batch($context, array $blocks = array())
    {
        // line 87
        echo "                                            <script>
                                                ";
        // line 88
        $this->displayBlock('batch_javascript', $context, $blocks);
        // line 98
        echo "                                            </script>

                                            ";
        // line 100
        $this->displayBlock('batch_actions', $context, $blocks);
        // line 112
        echo "                                            
                                            <input type=\"submit\" class=\"btn btn-small btn-primary\" value=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_batch", array(), "SonataAdminBundle"), "html", null, true);
        echo "\">
                                        ";
    }

    // line 88
    public function block_batch_javascript($context, array $blocks = array())
    {
        // line 89
        echo "                                                    jQuery(document).ready(function (\$) {
                                                        \$('#list_batch_checkbox').click(function () {
                                                            \$(this).closest('table').find(\"td input[type='checkbox']\").attr('checked', \$(this).is(':checked')).parent().parent().toggleClass('sonata-ba-list-row-selected', \$(this).is(':checked'));
                                                        });
                                                        \$(\"td.sonata-ba-list-field-batch input[type='checkbox']\").change(function () {
                                                            \$(this).parent().parent().toggleClass('sonata-ba-list-row-selected', \$(this).is(':checked'));
                                                        });
                                                    });
                                                ";
    }

    // line 100
    public function block_batch_actions($context, array $blocks = array())
    {
        // line 101
        echo "                                                <label class=\"checkbox\" for=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array()), "html", null, true);
        echo "_all_elements\">
                                                    <input type=\"checkbox\" name=\"all_elements\" id=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array()), "html", null, true);
        echo "_all_elements\">
                                                    ";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("all_elements", array(), "SonataAdminBundle"), "html", null, true);
        echo "
                                                </label>

                                                <select name=\"action\" style=\"width: auto; height: auto\">
                                                    ";
        // line 107
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["batchactions"]) ? $context["batchactions"] : $this->getContext($context, "batchactions")));
        foreach ($context['_seq'] as $context["action"] => $context["options"]) {
            // line 108
            echo "                                                        <option value=\"";
            echo twig_escape_filter($this->env, $context["action"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["options"], "label", array()), "html", null, true);
            echo "</option>
                                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['action'], $context['options'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo "                                                </select>
                                            ";
    }

    // line 127
    public function block_pager_results($context, array $blocks = array())
    {
        // line 128
        echo "                                            ";
        $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "pager_results"), "method"))->display($context);
        // line 129
        echo "                                        ";
    }

    // line 136
    public function block_pager_links($context, array $blocks = array())
    {
        // line 137
        echo "                        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "pager", array()), "haveToPaginate", array(), "method")) {
            // line 138
            echo "                            ";
            $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "pager_links"), "method"))->display($context);
            // line 139
            echo "                        ";
        }
        // line 140
        echo "                    ";
    }

    // line 153
    public function block_list_footer($context, array $blocks = array())
    {
    }

    // line 159
    public function block_list_filters($context, array $blocks = array())
    {
        // line 160
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "filters", array())) {
            // line 161
            echo "        <form class=\"sonata-filter-form ";
            echo ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "isChild", array()) && (1 == twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "filters", array()))))) ? ("hide") : (""));
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => "list"), "method"), "html", null, true);
            echo "\" method=\"GET\">
            ";
            // line 162
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
            <fieldset class=\"filter_legend\">
                <legend class=\"filter_legend ";
            // line 164
            echo (($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "hasActiveFilters", array())) ? ("active") : ("inactive"));
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label_filters", array(), "SonataAdminBundle"), "html", null, true);
            echo "</legend>

                <div class=\"filter_container ";
            // line 166
            echo (($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "hasActiveFilters", array())) ? ("active") : ("inactive"));
            echo "\">
                    <div>
                        ";
            // line 168
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "datagrid", array()), "filters", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
                // line 169
                echo "                            <div class=\"clearfix\">
                                <label for=\"";
                // line 170
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()), $this->getAttribute($context["filter"], "formName", array()), array(), "array"), "children", array()), "value", array(), "array"), "vars", array()), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "trans", array(0 => $this->getAttribute($context["filter"], "label", array()), 1 => array(), 2 => $this->getAttribute($context["filter"], "translationDomain", array())), "method"), "html", null, true);
                echo "</label>
                                ";
                // line 171
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()), $this->getAttribute($context["filter"], "formName", array()), array(), "array"), "children", array()), "type", array(), "array"), 'widget', array("attr" => twig_array_merge((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array(), "any", false, true), $this->getAttribute($context["filter"], "formName", array()), array(), "array", false, true), "children", array(), "any", false, true), "type", array(), "array", false, true), "vars", array(), "any", false, true), "attr", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array(), "any", false, true), $this->getAttribute($context["filter"], "formName", array()), array(), "array", false, true), "children", array(), "any", false, true), "type", array(), "array", false, true), "vars", array(), "any", false, true), "attr", array()), array())) : (array())), array("class" => trim(((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array(), "any", false, true), $this->getAttribute($context["filter"], "formName", array()), array(), "array", false, true), "children", array(), "any", false, true), "type", array(), "array", false, true), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array(), "any", false, true), $this->getAttribute($context["filter"], "formName", array()), array(), "array", false, true), "children", array(), "any", false, true), "type", array(), "array", false, true), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "class", array()), "")) : ("")) . " span8 sonata-filter-option"))))));
                echo "
                                ";
                // line 172
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()), $this->getAttribute($context["filter"], "formName", array()), array(), "array"), "children", array()), "value", array(), "array"), 'widget', array("attr" => twig_array_merge((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array(), "any", false, true), $this->getAttribute($context["filter"], "formName", array()), array(), "array", false, true), "children", array(), "any", false, true), "value", array(), "array", false, true), "vars", array(), "any", false, true), "attr", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array(), "any", false, true), $this->getAttribute($context["filter"], "formName", array()), array(), "array", false, true), "children", array(), "any", false, true), "value", array(), "array", false, true), "vars", array(), "any", false, true), "attr", array()), array())) : (array())), array("class" => trim(((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array(), "any", false, true), $this->getAttribute($context["filter"], "formName", array()), array(), "array", false, true), "children", array(), "any", false, true), "value", array(), "array", false, true), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array(), "any", false, true), $this->getAttribute($context["filter"], "formName", array()), array(), "array", false, true), "children", array(), "any", false, true), "value", array(), "array", false, true), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "class", array()), "")) : ("")) . " span8"))))));
                echo "
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 175
            echo "                    </div>

                    <input type=\"hidden\" name=\"filter[_page]\" id=\"filter__page\" value=\"1\">

                    ";
            // line 179
            $context["foo"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()), "_page", array(), "array"), "setRendered", array(), "method");
            // line 180
            echo "                    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
            echo "

                    <input type=\"submit\" class=\"btn btn-primary\" value=\"";
            // line 182
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_filter", array(), "SonataAdminBundle"), "html", null, true);
            echo "\">

                    <a class=\"btn\" href=\"";
            // line 184
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => "list", 1 => array("filters" => "reset")), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_reset_filter", array(), "SonataAdminBundle"), "html", null, true);
            echo "</a>
                </div>

                ";
            // line 187
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "persistentParameters", array()));
            foreach ($context['_seq'] as $context["paramKey"] => $context["paramValue"]) {
                // line 188
                echo "                    <input type=\"hidden\" name=\"";
                echo twig_escape_filter($this->env, $context["paramKey"], "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $context["paramValue"], "html", null, true);
                echo "\">
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['paramKey'], $context['paramValue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 190
            echo "            </fieldset>
        </form>
    ";
        }
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  607 => 190,  596 => 188,  592 => 187,  584 => 184,  579 => 182,  573 => 180,  571 => 179,  565 => 175,  556 => 172,  552 => 171,  546 => 170,  543 => 169,  539 => 168,  534 => 166,  527 => 164,  522 => 162,  515 => 161,  512 => 160,  509 => 159,  504 => 153,  500 => 140,  497 => 139,  494 => 138,  491 => 137,  488 => 136,  484 => 129,  481 => 128,  478 => 127,  473 => 110,  462 => 108,  458 => 107,  451 => 103,  447 => 102,  442 => 101,  439 => 100,  427 => 89,  424 => 88,  418 => 113,  415 => 112,  413 => 100,  409 => 98,  407 => 88,  404 => 87,  401 => 86,  396 => 141,  394 => 136,  388 => 132,  384 => 130,  382 => 127,  379 => 126,  374 => 123,  360 => 122,  351 => 121,  334 => 120,  329 => 119,  327 => 118,  323 => 116,  320 => 115,  317 => 86,  314 => 85,  312 => 84,  307 => 82,  304 => 81,  301 => 80,  296 => 77,  281 => 75,  279 => 74,  276 => 73,  259 => 72,  256 => 71,  253 => 70,  247 => 66,  241 => 65,  238 => 64,  234 => 62,  230 => 61,  225 => 60,  219 => 59,  207 => 58,  205 => 57,  202 => 56,  199 => 55,  196 => 54,  193 => 53,  190 => 52,  187 => 51,  184 => 50,  181 => 49,  178 => 48,  175 => 47,  173 => 46,  169 => 44,  163 => 40,  160 => 39,  156 => 38,  152 => 36,  149 => 35,  144 => 26,  137 => 155,  134 => 154,  132 => 153,  129 => 152,  123 => 149,  120 => 148,  117 => 147,  113 => 145,  111 => 144,  108 => 143,  106 => 80,  103 => 79,  101 => 70,  98 => 69,  96 => 35,  93 => 34,  88 => 32,  83 => 31,  80 => 30,  77 => 29,  75 => 28,  72 => 27,  70 => 26,  65 => 24,  62 => 23,  59 => 22,  53 => 20,  48 => 17,  46 => 16,  43 => 15,  40 => 14,  31 => 12,);
    }
}
