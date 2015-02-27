<?php

/* CoreReviewBundle:Admin/Form:form_admin_fields.html.twig */
class __TwigTemplate_60e96b593baa1629764a58d7f47d47395dda3e1c5ce2c386a18b97be702c56eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("SonataAdminBundle:Form:form_admin_fields.html.twig");
        // line 9
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."SonataAdminBundle:Form:form_admin_fields.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'core_review_admin_review_children_sonata_type_collection_widget' => array($this, 'block_core_review_admin_review_children_sonata_type_collection_widget'),
                'core_review_admin_review_likes_entity_widget' => array($this, 'block_core_review_admin_review_likes_entity_widget'),
                'core_review_admin_review_likes_entity' => array($this, 'block_core_review_admin_review_likes_entity'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 10
        echo "
";
        // line 12
        $this->displayBlock('core_review_admin_review_children_sonata_type_collection_widget', $context, $blocks);
        // line 130
        echo "
";
        // line 132
        $this->displayBlock('core_review_admin_review_likes_entity_widget', $context, $blocks);
    }

    // line 12
    public function block_core_review_admin_review_children_sonata_type_collection_widget($context, array $blocks = array())
    {
        // line 13
        echo "
    ";
        // line 14
        if ( !$this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "hasassociationadmin", array())) {
            // line 15
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 16
                echo "            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_admin')->renderRelationElement($context["element"], $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array())), "html", null, true);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "    ";
        } else {
            // line 19
            echo "
        <div id=\"field_container_";
            // line 20
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\" class=\"field-container\">
            <span id=\"field_widget_";
            // line 21
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\" >
                ";
            // line 22
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) > 0)) {
                // line 23
                echo "                    <table class=\"table table-bordered\">
                        <thead>
                            <tr>
                                ";
                // line 26
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "children", array()));
                foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                    // line 27
                    echo "                                    ";
                    if (!twig_in_filter($context["field_name"], array(0 => "product", 1 => "parent"))) {
                        // line 28
                        echo "
                                        ";
                        // line 29
                        if (($context["field_name"] == "_delete")) {
                            // line 30
                            echo "                                            <th>";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action_delete", array(), "SonataAdminBundle"), "html", null, true);
                            echo "</th>
                                        ";
                        } else {
                            // line 32
                            echo "                                            <th ";
                            if ((($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "attr", array(), "array", false, true), "hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "attr", array(), "array"), "hidden", array(), "array")) || twig_in_filter($context["field_name"], array(0 => "product", 1 => "parent")))) {
                                echo " style=\"display:none;\"";
                            }
                            echo ">
                                                ";
                            // line 33
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array(), "array"), "admin", array()), "trans", array(0 => $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "label", array())), "method"), "html", null, true);
                            echo "
                                            </th>
                                        ";
                        }
                        // line 36
                        echo "
                                    ";
                    }
                    // line 38
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                echo "                                <th>
                                    Действия
                                </th>
                            </tr>
                        </thead>
                        <tbody class=\"sonata-ba-tbody\">
                            ";
                // line 45
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()));
                foreach ($context['_seq'] as $context["nested_group_field_name"] => $context["nested_group_field"]) {
                    // line 46
                    echo "                                <tr>
                                    ";
                    // line 47
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["nested_group_field"], "children", array()));
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
                    foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                        // line 48
                        echo "
                                        ";
                        // line 49
                        $context["object"] = $this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "get", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "parent", array()), "vars", array()), "name", array())), "method");
                        // line 50
                        echo "
                                        <td class=\"sonata-ba-td-";
                        // line 51
                        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $context["field_name"], "html", null, true);
                        echo " control-group";
                        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                            echo " error";
                        }
                        echo "\"";
                        if ((($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "attr", array(), "array", false, true), "hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "attr", array(), "array"), "hidden", array(), "array")) || twig_in_filter($context["field_name"], array(0 => "product", 1 => "parent")))) {
                            echo " style=\"display:none;\"";
                        }
                        echo ">
                                            ";
                        // line 52
                        if (twig_in_filter($context["field_name"], array(0 => "id", 1 => "createdAt", 2 => "updatedAt"))) {
                            // line 53
                            echo "                                                ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array()), "html", null, true);
                            echo "
                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "user"))) {
                            // line 55
                            echo "                                                <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array()))), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array()), "email", array()), "html", null, true);
                            echo "</a>
                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "rating"))) {
                            // line 57
                            echo "                                                <div style=\"width:85px\">";
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "</div>
                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "review", 1 => "pros", 2 => "cons"))) {
                            // line 59
                            echo "                                                ";
                            if ($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array())) {
                                // line 60
                                echo "
                                                    <span class=\"icon-eye-open\" style=\"cursor: help;\" data-toggle=\"popover\" data-html=\"true\" data-placement=\"left\" data-content=\"";
                                // line 61
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array()), "html", null, true);
                                echo "\" onmouseover=\"
                                                        \$(this).popover('show');
                                                        \$('.popover').css({width:500, marginLeft:-280+'px'});
                                                        \" onmouseout=\"\$(this).popover('destroy');\" data-original-title=\"Просмотр\"></span>

                                                    <span class=\"hidden\">";
                                // line 66
                                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                echo "</span>

                                                ";
                            } else {
                                // line 69
                                echo "                                                    -
                                                ";
                            }
                            // line 71
                            echo "                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "photos"))) {
                            // line 72
                            echo "
                                                ";
                            // line 73
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "photos", array()));
                            foreach ($context['_seq'] as $context["n"] => $context["photo"]) {
                                // line 74
                                echo "                                                    <a class=\"fancybox-button\" rel=\"fancybox-";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "id", array()), "html", null, true);
                                echo "\" href=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["photo"])), "html", null, true);
                                echo "\"><img src=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["photo"], "preview", "35x35_")), "html", null, true);
                                echo "\"/></a>
                                                    ";
                                // line 75
                                if (((($context["n"] + 1) % 5) == 0)) {
                                    // line 76
                                    echo "                                                        <br>
                                                    ";
                                }
                                // line 78
                                echo "                                                ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['n'], $context['photo'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 79
                            echo "
                                                <span class=\"hidden\">";
                            // line 80
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "</span>

                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "videos"))) {
                            // line 83
                            echo "
                                                ";
                            // line 84
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "videos", array()));
                            foreach ($context['_seq'] as $context["n"] => $context["video"]) {
                                // line 85
                                echo "                                                    <a target=\"_blank\" href=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["video"])), "html", null, true);
                                echo "\">Скачать (";
                                echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getHumanFileSizeFilter($this->getAttribute($context["video"], "size", array())), "html", null, true);
                                echo ")</a>
                                                    <br>
                                                ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['n'], $context['video'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 88
                            echo "
                                                <span class=\"hidden\">";
                            // line 89
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "</span>

                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "likes"))) {
                            // line 92
                            echo "
                                                ";
                            // line 93
                            $context["likes"] = $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "likes", array());
                            // line 94
                            echo "                                                ";
                            $this->displayBlock("core_review_admin_review_likes_entity", $context, $blocks);
                            echo "

                                            ";
                        } else {
                            // line 97
                            echo "                                                ";
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "
                                                ";
                            // line 98
                            $context["dummy"] = $this->getAttribute($context["nested_group_field"], "setrendered", array());
                            // line 99
                            echo "                                            ";
                        }
                        // line 100
                        echo "
                                            ";
                        // line 101
                        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                            // line 102
                            echo "                                                <div class=\"help-inline sonata-ba-field-error-messages\">
                                                    ";
                            // line 103
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'errors');
                            echo "
                                                </div>
                                            ";
                        }
                        // line 106
                        echo "                                        </td>

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
                    unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 109
                    echo "                                    <td>
                                        <a href=\"";
                    // line 110
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_review_review_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "id", array()))), "html", null, true);
                    echo "\" class=\"btn edit_link btn-small\" title=\"Редактировать\">
                                            <i class=\"icon-edit\"></i>
                                            Редактировать
                                        </a>
                                    </td>
                                </tr>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['nested_group_field_name'], $context['nested_group_field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 117
                echo "                        </tbody>
                    </table>
                ";
            }
            // line 120
            echo "            </span>
            <br>
            <a target=\"_blank\" class=\"btn sonata-action-element\" href=\"";
            // line 122
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_review_review_create", array("review_parent_id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "sonata_admin", array()), "admin", array()), "subject", array()), "id", array()), "review_product_id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "sonata_admin", array()), "admin", array()), "subject", array()), "product", array()), "id", array()))), "html", null, true);
            echo "\">
            <i class=\"icon-plus\"></i>
            Добавить новый</a>

        </div>
    ";
        }
        // line 128
        echo "
";
    }

    // line 132
    public function block_core_review_admin_review_likes_entity_widget($context, array $blocks = array())
    {
        // line 133
        echo "
    ";
        // line 134
        $context["likes"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "sonata_admin", array()), "admin", array()), "subject", array()), "likes", array());
        // line 135
        echo "
    ";
        // line 136
        $this->displayBlock('core_review_admin_review_likes_entity', $context, $blocks);
        // line 156
        echo "
";
    }

    // line 136
    public function block_core_review_admin_review_likes_entity($context, array $blocks = array())
    {
        // line 137
        echo "
        ";
        // line 138
        $context["positive"] = 0;
        // line 139
        echo "        ";
        $context["negative"] = 0;
        // line 140
        echo "
        ";
        // line 141
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["likes"]) ? $context["likes"] : $this->getContext($context, "likes")));
        foreach ($context['_seq'] as $context["_key"] => $context["like"]) {
            // line 142
            echo "            ";
            if ($this->getAttribute($context["like"], "type", array())) {
                // line 143
                echo "                ";
                $context["positive"] = ((isset($context["positive"]) ? $context["positive"] : $this->getContext($context, "positive")) + 1);
                // line 144
                echo "            ";
            } else {
                // line 145
                echo "                ";
                $context["negative"] = ((isset($context["negative"]) ? $context["negative"] : $this->getContext($context, "negative")) + 1);
                // line 146
                echo "            ";
            }
            // line 147
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['like'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
        echo "
        <span style=\"white-space: nowrap;\">
            <span>";
        // line 150
        echo twig_escape_filter($this->env, (isset($context["positive"]) ? $context["positive"] : $this->getContext($context, "positive")), "html", null, true);
        echo " <span class=\"icon-thumbs-up\"></span></span>
            &nbsp;
            <span>";
        // line 152
        echo twig_escape_filter($this->env, (isset($context["negative"]) ? $context["negative"] : $this->getContext($context, "negative")), "html", null, true);
        echo " <span class=\"icon-thumbs-down\"></span></span>
        </span>

    ";
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Admin/Form:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  461 => 152,  456 => 150,  452 => 148,  446 => 147,  443 => 146,  440 => 145,  437 => 144,  434 => 143,  431 => 142,  427 => 141,  424 => 140,  421 => 139,  419 => 138,  416 => 137,  413 => 136,  408 => 156,  406 => 136,  403 => 135,  401 => 134,  398 => 133,  395 => 132,  390 => 128,  381 => 122,  377 => 120,  372 => 117,  359 => 110,  356 => 109,  340 => 106,  334 => 103,  331 => 102,  329 => 101,  326 => 100,  323 => 99,  321 => 98,  316 => 97,  309 => 94,  307 => 93,  304 => 92,  298 => 89,  295 => 88,  283 => 85,  279 => 84,  276 => 83,  270 => 80,  267 => 79,  261 => 78,  257 => 76,  255 => 75,  246 => 74,  242 => 73,  239 => 72,  236 => 71,  232 => 69,  226 => 66,  218 => 61,  215 => 60,  212 => 59,  206 => 57,  198 => 55,  192 => 53,  190 => 52,  176 => 51,  173 => 50,  171 => 49,  168 => 48,  151 => 47,  148 => 46,  144 => 45,  136 => 39,  130 => 38,  126 => 36,  120 => 33,  113 => 32,  107 => 30,  105 => 29,  102 => 28,  99 => 27,  95 => 26,  90 => 23,  88 => 22,  84 => 21,  80 => 20,  77 => 19,  74 => 18,  65 => 16,  60 => 15,  58 => 14,  55 => 13,  52 => 12,  48 => 132,  45 => 130,  43 => 12,  40 => 10,  37 => 8,  34 => 1,  14 => 9,);
    }
}
