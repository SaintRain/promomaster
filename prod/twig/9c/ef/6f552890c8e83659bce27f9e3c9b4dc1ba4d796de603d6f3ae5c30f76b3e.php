<?php

/* CoreLogisticsBundle:Admin/Transit:list.html.twig */
class __TwigTemplate_9cef6f552890c8e83659bce27f9e3c9b4dc1ba4d796de603d6f3ae5c30f76b3e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:list.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(12);

            throw $e;
        }

        $this->blocks = array(
            'list_table' => array($this, 'block_list_table'),
            'table_header' => array($this, 'block_table_header'),
            'table_body' => array($this, 'block_table_body'),
            'table_footer' => array($this, 'block_table_footer'),
            'batch' => array($this, 'block_batch'),
            'batch_javascript' => array($this, 'block_batch_javascript'),
            'batch_actions' => array($this, 'block_batch_actions'),
            'pager_results' => array($this, 'block_pager_results'),
            'pager_links' => array($this, 'block_pager_links'),
            'list_filters' => array($this, 'block_list_filters'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:list.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 23
    public function block_list_table($context, array $blocks = array())
    {
        // line 24
        echo "    ";
        // line 25
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "filters", array())) {
            // line 26
            echo "        ";
            $this->env->loadTemplate("CoreLogisticsBundle:Admin/Transit:list_filter.html.twig")->display($context);
            // line 27
            echo "    ";
        }
        // line 28
        echo "    ";
        // line 29
        echo "    ";
        $context["batchactions"] = $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "batchactions", array());
        // line 30
        echo "    ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "results", array())) > 0)) {
            // line 31
            echo "        ";
            if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasRoute", array(0 => "batch"), "method")) {
                // line 32
                echo "        <form action=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => "batch", 1 => array("filter" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "filterParameters", array()))), "method"), "html", null, true);
                echo "\" method=\"POST\" >
            <input type=\"hidden\" name=\"_sonata_csrf_token\" value=\"";
                // line 33
                echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
                echo "\" />
        ";
            }
            // line 35
            echo "            <table class=\"table table-bordered table-striped\">
                ";
            // line 36
            $this->displayBlock('table_header', $context, $blocks);
            // line 70
            echo "
                ";
            // line 71
            $this->displayBlock('table_body', $context, $blocks);
            // line 80
            echo "
                ";
            // line 81
            $this->displayBlock('table_footer', $context, $blocks);
            // line 144
            echo "            </table>
        ";
            // line 145
            if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasRoute", array(0 => "batch"), "method")) {
                // line 146
                echo "        </form>
        ";
            }
            // line 148
            echo "    ";
        } else {
            // line 149
            echo "        <p class=\"notice\">
            ";
            // line 150
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("no_result", array(), "SonataAdminBundle"), "html", null, true);
            echo "
        </p>
    ";
        }
    }

    // line 36
    public function block_table_header($context, array $blocks = array())
    {
        // line 37
        echo "                    <thead>
                        <tr class=\"sonata-ba-list-field-header\">
                            ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "list", array()), "elements", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["field_description"]) {
            // line 40
            echo "                                ";
            if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasRoute", array(0 => "batch"), "method") && ($this->getAttribute($context["field_description"], "getOption", array(0 => "code"), "method") == "_batch")) && (twig_length_filter($this->env, (isset($context["batchactions"]) ? $context["batchactions"] : null)) > 0))) {
                // line 41
                echo "                                    <th class=\"sonata-ba-list-field-header sonata-ba-list-field-header-batch\">
                                      <input type=\"checkbox\" id=\"list_batch_checkbox\" />
                                    </th>
                                ";
            } elseif (($this->getAttribute(            // line 44
$context["field_description"], "getOption", array(0 => "code"), "method") == "_select")) {
                // line 45
                echo "                                    <th class=\"sonata-ba-list-field-header sonata-ba-list-field-header-select\"></th>
                                ";
            } elseif ((($this->getAttribute(            // line 46
$context["field_description"], "name", array()) == "_action") && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "isXmlHttpRequest", array()))) {
                // line 47
                echo "                                        ";
                // line 48
                echo "                                ";
            } else {
                // line 49
                echo "                                    ";
                $context["sortable"] = false;
                // line 50
                echo "                                    ";
                if (($this->getAttribute($this->getAttribute($context["field_description"], "options", array(), "any", false, true), "sortable", array(), "any", true, true) && $this->getAttribute($this->getAttribute($context["field_description"], "options", array()), "sortable", array()))) {
                    // line 51
                    echo "                                        ";
                    $context["sortable"] = true;
                    // line 52
                    echo "                                        ";
                    $context["sort_parameters"] = $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "modelmanager", array()), "sortparameters", array(0 => $context["field_description"], 1 => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array())), "method");
                    // line 53
                    echo "                                        ";
                    $context["current"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "values", array()), "_sort_by", array()) == $context["field_description"]) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "values", array()), "_sort_by", array()), "fieldName", array()) == $this->getAttribute($this->getAttribute((isset($context["sort_parameters"]) ? $context["sort_parameters"] : null), "filter", array()), "_sort_by", array())));
                    // line 54
                    echo "                                        ";
                    $context["sort_active_class"] = (((isset($context["current"]) ? $context["current"] : null)) ? ("sonata-ba-list-field-order-active") : (""));
                    // line 55
                    echo "                                        ";
                    $context["sort_by"] = (((isset($context["current"]) ? $context["current"] : null)) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "values", array()), "_sort_order", array())) : ($this->getAttribute($this->getAttribute($context["field_description"], "options", array()), "_sort_order", array())));
                    // line 56
                    echo "                                    ";
                }
                // line 57
                echo "
                                    ";
                // line 58
                ob_start();
                // line 59
                echo "                                        <th class=\"sonata-ba-list-field-header-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["field_description"], "type", array()), "html", null, true);
                echo " ";
                if ((isset($context["sortable"]) ? $context["sortable"] : null)) {
                    echo " sonata-ba-list-field-header-order-";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, (isset($context["sort_by"]) ? $context["sort_by"] : null)), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, (isset($context["sort_active_class"]) ? $context["sort_active_class"] : null), "html", null, true);
                }
                echo "\">
                                            ";
                // line 60
                if ((isset($context["sortable"]) ? $context["sortable"] : null)) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => "list", 1 => (isset($context["sort_parameters"]) ? $context["sort_parameters"] : null)), "method"), "html", null, true);
                    echo "\">";
                }
                // line 61
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "trans", array(0 => $this->getAttribute($context["field_description"], "label", array()), 1 => array(), 2 => $this->getAttribute($context["field_description"], "translationDomain", array())), "method"), "html", null, true);
                echo "
                                            ";
                // line 62
                if ((isset($context["sortable"]) ? $context["sortable"] : null)) {
                    echo "</a>";
                }
                // line 63
                echo "                                        </th>
                                    ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 65
                echo "                                ";
            }
            // line 66
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_description'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "                        </tr>
                    </thead>
                ";
    }

    // line 71
    public function block_table_body($context, array $blocks = array())
    {
        // line 72
        echo "                    <tbody>
                        ";
        // line 73
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "results", array()));
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
            // line 74
            echo "                            <tr>
                                ";
            // line 75
            $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getTemplate", array(0 => "inner_list_row"), "method"))->display($context);
            // line 76
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
        // line 78
        echo "                    </tbody>
                ";
    }

    // line 81
    public function block_table_footer($context, array $blocks = array())
    {
        // line 82
        echo "                    <tr>
                        <th colspan=\"";
        // line 83
        echo twig_escape_filter($this->env, (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "list", array()), "elements", array())) - (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "isXmlHttpRequest", array())) ? (($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "list", array()), "has", array(0 => "_action"), "method") + $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "list", array()), "has", array(0 => "batch"), "method"))) : (0))), "html", null, true);
        echo "\">
                            <div class=\"form-inline\">
                                ";
        // line 85
        if ( !$this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "isXmlHttpRequest", array())) {
            // line 86
            echo "                                    ";
            if (($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasRoute", array(0 => "batch"), "method") && (twig_length_filter($this->env, (isset($context["batchactions"]) ? $context["batchactions"] : null)) > 0))) {
                // line 87
                echo "                                        ";
                $this->displayBlock('batch', $context, $blocks);
                // line 114
                echo "
                                        <input type=\"submit\" class=\"btn btn-small btn-primary\" value=\"";
                // line 115
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_batch", array(), "SonataAdminBundle"), "html", null, true);
                echo "\"/>
                                    ";
            }
            // line 117
            echo "
                                    <div class=\"pull-right\">
                                        ";
            // line 119
            if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasRoute", array(0 => "export"), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "EXPORT"), "method")) && twig_length_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getExportFormats", array(), "method")))) {
                // line 120
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label_export_download", array(), "SonataAdminBundle"), "html", null, true);
                echo "
                                            ";
                // line 121
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getExportFormats", array(), "method"));
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
                    // line 122
                    echo "                                                <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => "export", 1 => ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "modelmanager", array()), "paginationparameters", array(0 => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), 1 => 0), "method") + array("format" => $context["format"]))), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["format"], "html", null, true);
                    echo "</a>";
                    if ( !$this->getAttribute($context["loop"], "last", array())) {
                        echo ",";
                    }
                    // line 123
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
                // line 124
                echo "
                                            &nbsp;-&nbsp;
                                        ";
            }
            // line 127
            echo "
                                        ";
            // line 128
            $this->displayBlock('pager_results', $context, $blocks);
            // line 131
            echo "                                    </div>
                                ";
        }
        // line 133
        echo "                            </div>
                        </th>
                    </tr>

                    ";
        // line 137
        $this->displayBlock('pager_links', $context, $blocks);
        // line 142
        echo "
                ";
    }

    // line 87
    public function block_batch($context, array $blocks = array())
    {
        // line 88
        echo "                                            <script type=\"text/javascript\">
                                                ";
        // line 89
        $this->displayBlock('batch_javascript', $context, $blocks);
        // line 99
        echo "                                            </script>

                                            ";
        // line 101
        $this->displayBlock('batch_actions', $context, $blocks);
        // line 113
        echo "                                        ";
    }

    // line 89
    public function block_batch_javascript($context, array $blocks = array())
    {
        // line 90
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

    // line 101
    public function block_batch_actions($context, array $blocks = array())
    {
        // line 102
        echo "                                                <label class=\"checkbox\" for=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "html", null, true);
        echo "_all_elements\">
                                                    <input type=\"checkbox\" name=\"all_elements\" id=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "html", null, true);
        echo "_all_elements\"/>
                                                    ";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("all_elements", array(), "SonataAdminBundle"), "html", null, true);
        echo "
                                                </label>

                                                <select name=\"action\" style=\"width: auto; height: auto\">
                                                    ";
        // line 108
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["batchactions"]) ? $context["batchactions"] : null));
        foreach ($context['_seq'] as $context["action"] => $context["options"]) {
            // line 109
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
        // line 111
        echo "                                                </select>
                                            ";
    }

    // line 128
    public function block_pager_results($context, array $blocks = array())
    {
        // line 129
        echo "                                            ";
        $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getTemplate", array(0 => "pager_results"), "method"))->display($context);
        // line 130
        echo "                                        ";
    }

    // line 137
    public function block_pager_links($context, array $blocks = array())
    {
        // line 138
        echo "                        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "pager", array()), "haveToPaginate", array(), "method")) {
            // line 139
            echo "                            ";
            $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getTemplate", array(0 => "pager_links"), "method"))->display($context);
            // line 140
            echo "                        ";
        }
        // line 141
        echo "                    ";
    }

    // line 155
    public function block_list_filters($context, array $blocks = array())
    {
    }

    // line 157
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 158
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coretroubleticket/css/troubleticket.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Transit:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  489 => 159,  484 => 158,  481 => 157,  476 => 155,  472 => 141,  469 => 140,  466 => 139,  463 => 138,  460 => 137,  456 => 130,  453 => 129,  450 => 128,  445 => 111,  434 => 109,  430 => 108,  423 => 104,  419 => 103,  414 => 102,  411 => 101,  399 => 90,  396 => 89,  392 => 113,  390 => 101,  386 => 99,  384 => 89,  381 => 88,  378 => 87,  373 => 142,  371 => 137,  365 => 133,  361 => 131,  359 => 128,  356 => 127,  351 => 124,  337 => 123,  328 => 122,  311 => 121,  306 => 120,  304 => 119,  300 => 117,  295 => 115,  292 => 114,  289 => 87,  286 => 86,  284 => 85,  279 => 83,  276 => 82,  273 => 81,  268 => 78,  253 => 76,  251 => 75,  248 => 74,  231 => 73,  228 => 72,  225 => 71,  219 => 67,  213 => 66,  210 => 65,  206 => 63,  202 => 62,  197 => 61,  191 => 60,  179 => 59,  177 => 58,  174 => 57,  171 => 56,  168 => 55,  165 => 54,  162 => 53,  159 => 52,  156 => 51,  153 => 50,  150 => 49,  147 => 48,  145 => 47,  143 => 46,  140 => 45,  138 => 44,  133 => 41,  130 => 40,  126 => 39,  122 => 37,  119 => 36,  111 => 150,  108 => 149,  105 => 148,  101 => 146,  99 => 145,  96 => 144,  94 => 81,  91 => 80,  89 => 71,  86 => 70,  84 => 36,  81 => 35,  76 => 33,  71 => 32,  68 => 31,  65 => 30,  62 => 29,  60 => 28,  57 => 27,  54 => 26,  51 => 25,  49 => 24,  46 => 23,  11 => 12,);
    }
}
