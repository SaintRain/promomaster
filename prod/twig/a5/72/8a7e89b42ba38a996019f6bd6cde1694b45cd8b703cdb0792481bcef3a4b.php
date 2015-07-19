<?php

/* ApplicationSonataAdminBundle:CRUD:base_edit_form.html.twig */
class __TwigTemplate_a5728a7e89b42ba38a996019f6bd6cde1694b45cd8b703cdb0792481bcef3a4b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form' => array($this, 'block_form'),
            'sonata_pre_fieldsets' => array($this, 'block_sonata_pre_fieldsets'),
            'sonata_tab_content' => array($this, 'block_sonata_tab_content'),
            'sonata_post_fieldsets' => array($this, 'block_sonata_post_fieldsets'),
            'formactions' => array($this, 'block_formactions'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('form', $context, $blocks);
    }

    public function block_form($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.edit.form.top", array("admin" => (isset($context["admin"]) ? $context["admin"] : null), "object" => (isset($context["object"]) ? $context["object"] : null))));
        echo "

    ";
        // line 4
        $context["url"] = (( !(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) ? ("edit") : ("create"));
        // line 5
        echo "
    ";
        // line 6
        if ( !$this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasRoute", array(0 => (isset($context["url"]) ? $context["url"] : null)), "method")) {
            // line 7
            echo "        <div>
            ";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form_not_available", array(), "SonataAdminBundle"), "html", null, true);
            echo "
        </div>
    ";
        } else {
            // line 11
            echo "        <form class=\"form-horizontal\"
              action=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => (isset($context["url"]) ? $context["url"] : null), 1 => array("id" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"), "uniqid" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "subclass" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "subclass"), "method"))), "method"), "html", null, true);
            echo "\" ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
            echo "
              method=\"POST\"
              ";
            // line 14
            if ( !$this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "getOption", array(0 => "html5_validate"), "method")) {
                echo "novalidate=\"novalidate\"";
            }
            // line 15
            echo "              >
            ";
            // line 16
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "errors", array())) > 0)) {
                // line 17
                echo "                <div class=\"sonata-ba-form-error\">
                    ";
                // line 18
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
                echo "
                </div>
            ";
            }
            // line 21
            echo "
            ";
            // line 22
            $this->displayBlock('sonata_pre_fieldsets', $context, $blocks);
            // line 35
            echo "
            ";
            // line 36
            $this->displayBlock('sonata_tab_content', $context, $blocks);
            // line 83
            echo "
            ";
            // line 84
            $this->displayBlock('sonata_post_fieldsets', $context, $blocks);
            // line 87
            echo "
            ";
            // line 88
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
            echo "

            ";
            // line 90
            $this->displayBlock('formactions', $context, $blocks);
            // line 132
            echo "        </form>
    ";
        }
        // line 134
        echo "
    ";
        // line 135
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.edit.form.bottom", array("admin" => (isset($context["admin"]) ? $context["admin"] : null), "object" => (isset($context["object"]) ? $context["object"] : null))));
        echo "

";
    }

    // line 22
    public function block_sonata_pre_fieldsets($context, array $blocks = array())
    {
        // line 23
        echo "                <div class=\"tabbable\">
                    <ul class=\"nav nav-tabs\">
                        ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formgroups", array()));
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
            // line 26
            echo "                            <li class=\"";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo "active";
            }
            echo "\">
                                <a href=\"#";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "\" data-toggle=\"tab\">
                                    <i class=\"icon-exclamation-sign has-errors hide\"></i>
                                    ";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "trans", array(0 => $context["name"], 1 => array(), 2 => $this->getAttribute($context["form_group"], "translation_domain", array())), "method"), "html", null, true);
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
        // line 33
        echo "                    </ul>
            ";
    }

    // line 36
    public function block_sonata_tab_content($context, array $blocks = array())
    {
        // line 37
        echo "                <div class=\"tab-content\">
                    ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formgroups", array()));
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
            // line 39
            echo "                        <div class=\"tab-pane ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo " active";
            }
            echo "\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "\">
                            <fieldset>
                                <div class=\"sonata-ba-collapsed-fields\">
                                    ";
            // line 42
            if (($this->getAttribute($context["form_group"], "description", array()) != false)) {
                // line 43
                echo "                                        <p>";
                echo $this->getAttribute($context["form_group"], "description", array());
                echo "</p>
                                    ";
            }
            // line 45
            echo "
                                    ";
            // line 46
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["form_group"], "fields", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                // line 47
                echo "
                                        ";
                // line 48
                if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                    // line 49
                    echo "
                                            ";
                    // line 50
                    $context["fd"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formfielddescriptions", array()), $context["field_name"], array(), "array"), "options", array());
                    // line 51
                    echo "
                                            ";
                    // line 52
                    if (($this->getAttribute((isset($context["fd"]) ? $context["fd"] : null), "clearfix", array(), "any", true, true) && twig_in_filter("before", $this->getAttribute((isset($context["fd"]) ? $context["fd"] : null), "clearfix", array())))) {
                        // line 53
                        echo "                                                <div class=\"clearfix\"></div>
                                            ";
                    }
                    // line 55
                    echo "                                            
                                            ";
                    // line 56
                    if ($this->getAttribute((isset($context["fd"]) ? $context["fd"] : null), "wrapper", array(), "any", true, true)) {
                        // line 57
                        echo "                                                ";
                        $context["wrapper"] = $this->getAttribute((isset($context["fd"]) ? $context["fd"] : null), "wrapper", array());
                        // line 58
                        echo "                                                <div ";
                        if ($this->getAttribute((isset($context["wrapper"]) ? $context["wrapper"] : null), "id", array(), "any", true, true)) {
                            echo "id=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wrapper"]) ? $context["wrapper"] : null), "id", array()), "html", null, true);
                            echo "\" ";
                        }
                        // line 59
                        echo "                                                     ";
                        if ($this->getAttribute((isset($context["wrapper"]) ? $context["wrapper"] : null), "class", array(), "any", true, true)) {
                            echo "class=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wrapper"]) ? $context["wrapper"] : null), "class", array()), "html", null, true);
                            echo "\" ";
                        }
                        // line 60
                        echo "                                                     ";
                        if ($this->getAttribute((isset($context["wrapper"]) ? $context["wrapper"] : null), "style", array(), "any", true, true)) {
                            echo "style=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wrapper"]) ? $context["wrapper"] : null), "style", array()), "html", null, true);
                            echo "\" ";
                        }
                        // line 61
                        echo "                                                    >
                                            ";
                    }
                    // line 63
                    echo "
                                            ";
                    // line 64
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), $context["field_name"], array(), "array"), 'row');
                    echo "

                                            ";
                    // line 66
                    if ($this->getAttribute((isset($context["fd"]) ? $context["fd"] : null), "wrapper", array(), "any", true, true)) {
                        // line 67
                        echo "                                                </div>
                                            ";
                    }
                    // line 69
                    echo "                                            
                                            ";
                    // line 70
                    if (($this->getAttribute((isset($context["fd"]) ? $context["fd"] : null), "clearfix", array(), "any", true, true) && twig_in_filter("after", $this->getAttribute((isset($context["fd"]) ? $context["fd"] : null), "clearfix", array())))) {
                        // line 71
                        echo "                                                <div class=\"clearfix\"></div>
                                            ";
                    }
                    // line 73
                    echo "
                                        ";
                }
                // line 75
                echo "
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "                                </div>
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
        // line 81
        echo "                </div>
            ";
    }

    // line 84
    public function block_sonata_post_fieldsets($context, array $blocks = array())
    {
        // line 85
        echo "                </div>
            ";
    }

    // line 90
    public function block_formactions($context, array $blocks = array())
    {
        // line 91
        echo "                <div class=\"well well-small form-actions\">
                    ";
        // line 92
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "isxmlhttprequest", array())) {
            // line 93
            echo "                        ";
            if ( !(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
                // line 94
                echo "                            <input type=\"submit\" class=\"btn btn-primary\" name=\"btn_update\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_update", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">
                        ";
            } else {
                // line 96
                echo "                            <input type=\"submit\" class=\"btn\" name=\"btn_create\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">
                        ";
            }
            // line 98
            echo "                    ";
        } else {
            // line 99
            echo "                        ";
            if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "supportsPreviewMode", array())) {
                // line 100
                echo "                            <button class=\"btn btn-info persist-preview\" name=\"btn_preview\" type=\"submit\">
                                <i class=\"icon-eye-open\"></i>
                                ";
                // line 102
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_preview", array(), "SonataAdminBundle"), "html", null, true);
                echo "
                            </button>
                        ";
            }
            // line 105
            echo "                        ";
            if ( !(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
                // line 106
                echo "                            <input type=\"submit\" class=\"btn btn-primary\" name=\"btn_update_and_edit\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_update_and_edit_again", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">

                            ";
                // line 108
                if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "list"), "method")) {
                    // line 109
                    echo "                                <input type=\"submit\" class=\"btn\" name=\"btn_update_and_list\" value=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_update_and_return_to_list", array(), "SonataAdminBundle"), "html", null, true);
                    echo "\">
                            ";
                }
                // line 111
                echo "
                            ";
                // line 112
                if (($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "delete"), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "DELETE", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
                    // line 113
                    echo "                                ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delete_or", array(), "SonataAdminBundle"), "html", null, true);
                    echo "
                                <a class=\"btn btn-danger\" href=\"";
                    // line 114
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "delete", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_delete", array(), "SonataAdminBundle"), "html", null, true);
                    echo "</a>
                            ";
                }
                // line 116
                echo "
                            ";
                // line 117
                if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isAclEnabled", array(), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "acl"), "method")) && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "MASTER", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
                    // line 118
                    echo "                                <a class=\"btn\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "acl", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_edit_acl", array(), "SonataAdminBundle"), "html", null, true);
                    echo "</a>
                            ";
                }
                // line 120
                echo "                        ";
            } else {
                // line 121
                echo "                            ";
                if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "edit"), "method")) {
                    // line 122
                    echo "                                <input class=\"btn btn-primary\" type=\"submit\" name=\"btn_create_and_edit\" value=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create_and_edit_again", array(), "SonataAdminBundle"), "html", null, true);
                    echo "\">
                            ";
                }
                // line 124
                echo "                            ";
                if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "list"), "method")) {
                    // line 125
                    echo "                                <input type=\"submit\" class=\"btn\" name=\"btn_create_and_list\" value=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create_and_return_to_list", array(), "SonataAdminBundle"), "html", null, true);
                    echo "\">
                            ";
                }
                // line 127
                echo "                            <input class=\"btn\" type=\"submit\" name=\"btn_create_and_create\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create_and_create_a_new_one", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">
                        ";
            }
            // line 129
            echo "                    ";
        }
        // line 130
        echo "                </div>
            ";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:CRUD:base_edit_form.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  463 => 130,  460 => 129,  454 => 127,  448 => 125,  445 => 124,  439 => 122,  436 => 121,  433 => 120,  425 => 118,  423 => 117,  420 => 116,  413 => 114,  408 => 113,  406 => 112,  403 => 111,  397 => 109,  395 => 108,  389 => 106,  386 => 105,  380 => 102,  376 => 100,  373 => 99,  370 => 98,  364 => 96,  358 => 94,  355 => 93,  353 => 92,  350 => 91,  347 => 90,  342 => 85,  339 => 84,  334 => 81,  317 => 77,  310 => 75,  306 => 73,  302 => 71,  300 => 70,  297 => 69,  293 => 67,  291 => 66,  286 => 64,  283 => 63,  279 => 61,  272 => 60,  265 => 59,  258 => 58,  255 => 57,  253 => 56,  250 => 55,  246 => 53,  244 => 52,  241 => 51,  239 => 50,  236 => 49,  234 => 48,  231 => 47,  227 => 46,  224 => 45,  218 => 43,  216 => 42,  203 => 39,  186 => 38,  183 => 37,  180 => 36,  175 => 33,  157 => 29,  150 => 27,  143 => 26,  126 => 25,  122 => 23,  119 => 22,  112 => 135,  109 => 134,  105 => 132,  103 => 90,  98 => 88,  95 => 87,  93 => 84,  90 => 83,  88 => 36,  85 => 35,  83 => 22,  80 => 21,  74 => 18,  71 => 17,  69 => 16,  66 => 15,  62 => 14,  55 => 12,  52 => 11,  46 => 8,  43 => 7,  41 => 6,  38 => 5,  36 => 4,  30 => 2,  24 => 1,);
    }
}
