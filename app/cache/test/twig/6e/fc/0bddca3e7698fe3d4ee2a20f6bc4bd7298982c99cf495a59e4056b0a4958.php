<?php

/* CoreOrderBundle:Admin/Form/Order:edit.html.twig */
class __TwigTemplate_6efc0bddca3e7698fe3d4ee2a20f6bc4bd7298982c99cf495a59e4056b0a4958 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");

        $this->blocks = array(
            'sonata_tab_content' => array($this, 'block_sonata_tab_content'),
            '__internal_31574406b7240d01c65580f7b287a7f95886ab67b747d40baeb29cf9b8a722cc' => array($this, 'block___internal_31574406b7240d01c65580f7b287a7f95886ab67b747d40baeb29cf9b8a722cc'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:base_edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_sonata_tab_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"tab-content order-num\" data-order=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()), "html", null, true);
        echo "\">
        
        ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "formgroups", array()));
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
            // line 7
            echo "            <div class=\"tab-pane ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo " active";
            }
            echo "\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array()), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "\">
                <fieldset>
                    <div  ";
            // line 9
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo "style=\"float:left;\" ";
            }
            echo " class=\"sonata-ba-collapsed-fields\">
                        ";
            // line 10
            if (($this->getAttribute($context["form_group"], "description", array()) != false)) {
                // line 11
                echo "                            <p>";
                echo $this->getAttribute($context["form_group"], "description", array());
                echo "</p>
                        ";
            }
            // line 13
            echo "                                                                      
                        ";
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["form_group"], "fields", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                // line 15
                echo "                                        
                            ";
                // line 16
                if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                    // line 17
                    echo "                                ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), $context["field_name"], array(), "array", false, true), "vars", array(), "any", false, true), "prototype", array(), "any", true, true)) {
                        // line 18
                        echo "                                    <div class=\"control-group\">
                                        ";
                        // line 19
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), 'label');
                        echo "
                                        <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                                            <div class=\"tabbable tab-collection\">
                                                <ul class=\"nav nav-tabs ";
                        // line 22
                        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array")) == 0)) {
                            echo " only-add ";
                        }
                        echo "\">
                                                    ";
                        // line 23
                        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), "vars", array()), "allow_add", array())) {
                            // line 24
                            echo "                                                        <li class=\"";
                            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array")) == 0)) {
                                echo "active ";
                            }
                            echo "\">
                                                            <a data-toggle=\"tab\" href=\"#\" class=\"add-tab\">
                                                                <span>Добавить накладную</span>
                                                            </a>
                                                        </li>
                                                    ";
                        }
                        // line 30
                        echo "                                                    ";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["nested"]) {
                            // line 31
                            echo "                                                        ";
                            ob_start();
                            // line 32
                            echo "                                                        <li ";
                            if ($this->getAttribute($context["loop"], "first", array())) {
                                echo " class=\"active\" ";
                            }
                            echo ">
                                                            <a data-toggle=\"tab\" href=\"#";
                            // line 33
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["nested"], "vars", array()), "id", array()), "html", null, true);
                            echo "\" class=\"tabs-toogle\">
                                                                <i class=\"icon-exclamation-sign has-errors hide ";
                            // line 34
                            if ((!$this->getAttribute($this->getAttribute($context["nested"], "vars", array()), "valid", array()))) {
                                echo "tabs-errors";
                            }
                            echo "\"></i>
                                                                <span>Накладная № ";
                            // line 35
                            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                            echo "</span>
                                                                ";
                            // line 36
                            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), "vars", array()), "allow_delete", array()) && $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested"], "children", array()), "number", array()), "vars", array()), "attr", array()), "data-forbidden-delete", array(), "array"))) {
                                // line 37
                                echo "                                                                    <span title=\"удалить\" class=\"ui-icon ui-icon-close collection-modify-delete\"></span>
                                                                ";
                            }
                            // line 39
                            echo "                                                            </a>
                                                        </li>
                                                        ";
                            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                            // line 42
                            echo "                                                    ";
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nested'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 43
                        echo "                                                </ul>
                                                <div class=\"tab-content\" id=\"";
                        // line 44
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), "vars", array()), "id", array()), "html", null, true);
                        echo "\" data-prototype=\"";
                        echo twig_escape_filter($this->env, (string) $this->renderBlock("__internal_31574406b7240d01c65580f7b287a7f95886ab67b747d40baeb29cf9b8a722cc", $context, $blocks));
                        echo "\">
                                                    ";
                        // line 45
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["nested"]) {
                            // line 46
                            echo "                                                        ";
                            $this->env->loadTemplate("CoreOrderBundle:Admin/Form/Blocks:collection_widget_tabs.html.twig")->display(array_merge($context, array("form" => $context["nested"], "id" => $this->getAttribute($this->getAttribute($context["nested"], "vars", array()), "id", array()), "isActive" => $this->getAttribute($context["loop"], "first", array()))));
                            // line 47
                            echo "                                                        ";
                            $this->getAttribute($context["nested"], "setRendered", array(), "method");
                            // line 48
                            echo "                                                    ";
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nested'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 49
                        echo "                                                </div>
                                                ";
                        // line 50
                        $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), "setRendered", array(), "method");
                        // line 51
                        echo "                                            </div>
                                        </div>
                                    </div>
                                ";
                    } else {
                        // line 55
                        echo "                                    ";
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), 'row');
                        echo "
                                ";
                    }
                    // line 57
                    echo "                            ";
                }
                // line 58
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "                    </div>
                    
                    
                      ";
            // line 62
            if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                // line 63
                echo "                            <div style=\"float:left;width:350px\" id=\"orderInfoBlock\"></div>
                            <script>
    \$(function() {
        var content=\$('#orderInfoBlockSource').html();
        \$('#orderInfoBlock').html(content);
    })
</script>
                        ";
            }
            // line 71
            echo "                </fieldset>
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
        // line 74
        echo "    </div>
";
    }

    // line 44
    public function block___internal_31574406b7240d01c65580f7b287a7f95886ab67b747d40baeb29cf9b8a722cc($context, array $blocks = array())
    {
        $this->env->loadTemplate("CoreOrderBundle:Admin/Form/Blocks:collection_widget_tabs.html.twig")->display(array_merge($context, array("form" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), (isset($context["field_name"]) ? $context["field_name"] : $this->getContext($context, "field_name")), array(), "array"), "vars", array()), "prototype", array()), "id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), (isset($context["field_name"]) ? $context["field_name"] : $this->getContext($context, "field_name")), array(), "array"), "vars", array()), "id", array()), "isActive" => false)));
    }

    // line 76
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 77
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    // line 80
    public function block_javascripts($context, array $blocks = array())
    {
        // line 81
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/js/unit_serial_number_widget.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
        adminRoutes['admin_core_delivery_service_deliveryPrice'] = '";
        // line 84
        echo $this->env->getExtension('routing')->getPath("admin_core_delivery_service_deliveryPrice");
        echo "';
        adminRoutes['admin_core_delivery_service_waybill'] = '";
        // line 85
        echo $this->env->getExtension('routing')->getPath("admin_core_delivery_service_waybill");
        echo "';
        adminRoutes['admin_core_delivery_service_print_waybill'] = '";
        // line 86
        echo $this->env->getExtension('routing')->getPath("admin_core_delivery_service_printWaybill", array("id" => "PLACEHOLDER"));
        echo "';
        adminRoutes['admin_core_delivery_service_cancel'] = '";
        // line 87
        echo $this->env->getExtension('routing')->getPath("admin_core_delivery_service_cancel");
        echo "';
        adminRoutes['admin_core_delivery_service_deliveryCity'] = '";
        // line 88
        echo $this->env->getExtension('routing')->getPath("admin_core_delivery_service_deliveryCity");
        echo "';
        
    \$(function() {
        \$('img.sendEmailOrderStatus').click(function() {
            var dataTarget=\$(this).attr('data-target'),            
             \$checkbox=\$('input[id \$= \"_'+dataTarget+'\"]').first();                         
             if (\$checkbox.is(':checked')) {
                 \$(this).attr('src', \"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/img/dont_send_email.png"), "html", null, true);
        echo "\");
                 \$checkbox.removeAttr('checked');
             }
             else {                 
                 \$(this).attr('src', \"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/img/send_email.png"), "html", null, true);
        echo "\");
                 \$checkbox.attr('checked','checked');
             }
        })
    })        
    </script>
    <script src=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/js/edit.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coredelivery/js/waybill.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>    
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  404 => 106,  400 => 105,  391 => 99,  384 => 95,  374 => 88,  370 => 87,  366 => 86,  362 => 85,  358 => 84,  353 => 82,  348 => 81,  345 => 80,  339 => 78,  334 => 77,  331 => 76,  325 => 44,  320 => 74,  304 => 71,  294 => 63,  292 => 62,  287 => 59,  273 => 58,  270 => 57,  264 => 55,  258 => 51,  256 => 50,  253 => 49,  239 => 48,  236 => 47,  233 => 46,  216 => 45,  210 => 44,  207 => 43,  193 => 42,  188 => 39,  184 => 37,  182 => 36,  178 => 35,  172 => 34,  168 => 33,  161 => 32,  158 => 31,  140 => 30,  128 => 24,  126 => 23,  120 => 22,  114 => 19,  111 => 18,  108 => 17,  106 => 16,  103 => 15,  86 => 14,  83 => 13,  77 => 11,  75 => 10,  69 => 9,  57 => 7,  40 => 6,  34 => 4,  31 => 3,);
    }
}
