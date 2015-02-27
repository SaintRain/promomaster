<?php

/* CoreCommonBundle:Fragments:menu.html.twig */
class __TwigTemplate_354d27e0eddb88d2938d72d709d8253796b3ed463c23a4f4278dd6a0e3b0538d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 2
            echo "
    <nav role=\"navigation\" id=\"navigation_bar\">
        <div class=\"nav_cats\">

            <ul class=\"nav_cats flex\" ";
            // line 6
            if ((null == (isset($context["discountsAndPromotions"]) ? $context["discountsAndPromotions"] : null))) {
                echo "style=\"padding-right:0px;";
            }
            echo "\">

                ";
            // line 8
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["i"] => $context["category"]) {
                // line 9
                echo "
                    ";
                // line 10
                $context["caption"] = $this->getAttribute($context["category"], ("caption" . twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))));
                // line 11
                echo "
                    <li ";
                // line 12
                echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["category"]);
                echo " class=\"nav_cat";
                if (($context["i"] == 0)) {
                    echo " first-child";
                }
                echo " ";
                if (((isset($context["slug"]) ? $context["slug"] : null) && ((isset($context["slug"]) ? $context["slug"] : null) == $this->getAttribute($context["category"], "slug", array())))) {
                    echo "active";
                }
                echo "\" data-menu=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
                echo "\">
                        <a href=\"";
                // line 13
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute($context["category"], "slug", array()))), "html", null, true);
                echo "\" class=\"nav_cat_link";
                if ($this->env->getExtension('common_extension')->isOneWordFunction((isset($context["caption"]) ? $context["caption"] : null))) {
                    echo " one_word";
                }
                echo "\">
                            <span>";
                // line 14
                echo $this->env->getExtension('common_extension')->menuTitleFormaterFilter((isset($context["caption"]) ? $context["caption"] : null));
                echo "</span>
                        </a>
                    </li>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "
            </ul>

            ";
            // line 22
            $context["allCategories"] = (isset($context["categories"]) ? $context["categories"] : null);
            // line 23
            echo "
            ";
            // line 24
            if ((null != (isset($context["discountsAndPromotions"]) ? $context["discountsAndPromotions"] : null))) {
                // line 25
                echo "
                <div ";
                // line 26
                echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["discountsAndPromotions"]) ? $context["discountsAndPromotions"] : null));
                echo " class=\"nav_cat_last ";
                if (((isset($context["slug"]) ? $context["slug"] : null) && ((isset($context["slug"]) ? $context["slug"] : null) == $this->getAttribute((isset($context["discountsAndPromotions"]) ? $context["discountsAndPromotions"] : null), "slug", array())))) {
                    echo "active";
                }
                echo "\" data-menu=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["discountsAndPromotions"]) ? $context["discountsAndPromotions"] : null), "id", array()), "html", null, true);
                echo "\">
                    <a href=\"";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute((isset($context["discountsAndPromotions"]) ? $context["discountsAndPromotions"] : null), "slug", array()))), "html", null, true);
                echo "\" class=\"nav_cat_link\">
                        <span>";
                // line 28
                echo $this->env->getExtension('common_extension')->menuTitleFormaterFilter($this->getAttribute((isset($context["discountsAndPromotions"]) ? $context["discountsAndPromotions"] : null), ("caption" . twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))));
                echo "</span>
                    </a>
                </div>

                ";
                // line 32
                $context["allCategories"] = twig_array_merge((isset($context["categories"]) ? $context["categories"] : null), array(0 => (isset($context["discountsAndPromotions"]) ? $context["discountsAndPromotions"] : null)));
                // line 33
                echo "
            ";
            }
            // line 35
            echo "
        </div>

        ";
            // line 38
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["allCategories"]) ? $context["allCategories"] : null));
            foreach ($context['_seq'] as $context["i"] => $context["category"]) {
                // line 39
                echo "
            ";
                // line 40
                $context["caption"] = $this->getAttribute($context["category"], ("caption" . twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))));
                // line 41
                if ((($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), $this->getAttribute($context["category"], "id", array()), array(), "array", true, true) || $this->getAttribute((isset($context["brands"]) ? $context["brands"] : null), $this->getAttribute($context["category"], "id", array()), array(), "array", true, true)) || (twig_length_filter($this->env, $this->getAttribute($context["category"], "__children", array(), "array")) > 0))) {
                    // line 42
                    echo "            <div class=\"nav_submenu_cats_block clearfix\" data-submenu=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
                    echo "\">
                <div class=\"nav_submenu_cats_item_names clearfix\">
                    ";
                    // line 44
                    if (twig_length_filter($this->env, $this->getAttribute($context["category"], "__children", array(), "array"))) {
                        echo "<div class=\"nav_submenu_cats_item_name name_section\">Разделы</div>";
                    }
                    // line 45
                    echo "                    ";
                    if ($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), $this->getAttribute($context["category"], "id", array(), "array"), array(), "array", false, true), "age", array(), "array", true, true)) {
                        echo "<div class=\"nav_submenu_cats_item_name name_age\">Возраст</div>";
                    }
                    // line 46
                    echo "                    ";
                    if ((array_key_exists("brands", $context) && $this->getAttribute((isset($context["brands"]) ? $context["brands"] : null), $this->getAttribute($context["category"], "id", array()), array(), "array", true, true))) {
                        echo "<div class=\"nav_submenu_cats_item_name name_brand\">Бренд</div>";
                    }
                    // line 47
                    echo "                    ";
                    if ($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), $this->getAttribute($context["category"], "id", array(), "array"), array(), "array", false, true), "skills", array(), "array", true, true)) {
                        echo "<div class=\"nav_submenu_cats_item_name name_skills\">Обучающие навыки</div>";
                    }
                    // line 48
                    echo "                </div>

                ";
                    // line 50
                    if (twig_length_filter($this->env, $this->getAttribute($context["category"], "__children", array(), "array"))) {
                        // line 51
                        echo "
                    <div class=\"nav_submenu_cats_item nav_submenu_cats_item_section\">

                        ";
                        // line 54
                        echo $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_common_fragments"), "method"), "buildBranch", array(0 => $context["category"]), "method");
                        echo "

                    </div>

                ";
                    }
                    // line 59
                    echo "
                ";
                    // line 60
                    if ($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), $this->getAttribute($context["category"], "id", array(), "array"), array(), "array", false, true), "age", array(), "array", true, true)) {
                        // line 61
                        echo "
                    <div class=\"nav_submenu_cats_item nav_submenu_cats_item_age\">
                        <ul class=\"nav_submenu_cats\">

                            ";
                        // line 65
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), $this->getAttribute($context["category"], "id", array(), "array"), array(), "array"), "age", array(), "array"), "values", array(), "array"));
                        foreach ($context['_seq'] as $context["id"] => $context["age"]) {
                            // line 66
                            echo "
                                <li class=\"nav_submenu_cat\">
                                    <a href=\"";
                            // line 68
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute($context["category"], "slug", array()), "filter" => array("p" => array("checkbox" => array("age" => array(0 => $context["id"])))))), "html", null, true);
                            echo "\" class=\"nav_submenu_cat_link\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["age"], "caption", array(), "array"), "html", null, true);
                            echo "</a>
                                </li>

                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['id'], $context['age'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 72
                        echo "
                        </ul>
                    </div>

                ";
                    }
                    // line 77
                    echo "
                ";
                    // line 78
                    if ($this->getAttribute((isset($context["brands"]) ? $context["brands"] : null), $this->getAttribute($context["category"], "id", array()), array(), "array", true, true)) {
                        // line 79
                        echo "                    ";
                        $context["iBrand"] = 0;
                        // line 80
                        echo "                    <div class=\"nav_submenu_cats_item nav_submenu_cats_item_brand\">
                        <ul class=\"nav_submenu_cats\">

                            ";
                        // line 83
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["brands"]) ? $context["brands"] : null), $this->getAttribute($context["category"], "id", array()), array(), "array"));
                        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
                            // line 84
                            echo "
                                <li class=\"nav_submenu_cat\">
                                    <a href=\"";
                            // line 86
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute($context["category"], "slug", array()), "filter" => array("brands" => array(0 => $this->getAttribute($context["brand"], "id", array(), "array"))))), "html", null, true);
                            echo "\" class=\"nav_submenu_cat_link\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["brand"], "caption", array(), "array"), "html", null, true);
                            echo "</a>
                                </li>

                                ";
                            // line 89
                            $context["iBrand"] = ((isset($context["iBrand"]) ? $context["iBrand"] : null) + 1);
                            // line 90
                            echo "                                ";
                            if ((((isset($context["iBrand"]) ? $context["iBrand"] : null) == twig_round((twig_length_filter($this->env, $this->getAttribute((isset($context["brands"]) ? $context["brands"] : null), $this->getAttribute($context["category"], "id", array()), array(), "array")) / 2), 0, "ceil")) && (twig_length_filter($this->env, $this->getAttribute((isset($context["brands"]) ? $context["brands"] : null), $this->getAttribute($context["category"], "id", array()), array(), "array")) > 10))) {
                                // line 91
                                echo "                                    </ul>
                                    <ul class=\"nav_submenu_cats\">
                                ";
                            }
                            // line 94
                            echo "                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 95
                        echo "
                        </ul>
                    </div>

                ";
                    }
                    // line 100
                    echo "
                ";
                    // line 101
                    if ($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), $this->getAttribute($context["category"], "id", array(), "array"), array(), "array", false, true), "skills", array(), "array", true, true)) {
                        // line 102
                        echo "                    ";
                        $context["iSkills"] = 0;
                        // line 103
                        echo "                    ";
                        $context["cSkills"] = twig_round((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), $this->getAttribute($context["category"], "id", array(), "array"), array(), "array"), "skills", array(), "array"), "values", array(), "array")) / 2), 0, "ceil");
                        // line 104
                        echo "                    <div class=\"nav_submenu_cats_item nav_submenu_cats_item_skills\">
                        <ul class=\"nav_submenu_cats\">
                            ";
                        // line 106
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), $this->getAttribute($context["category"], "id", array(), "array"), array(), "array"), "skills", array(), "array"), "values", array(), "array"));
                        foreach ($context['_seq'] as $context["id"] => $context["skill"]) {
                            // line 107
                            echo "
                                <li class=\"nav_submenu_cat skill_";
                            // line 108
                            echo twig_escape_filter($this->env, strtr($this->getAttribute($context["skill"], "name", array(), "array"), " ", "_"), "html", null, true);
                            echo " clearfix\">
                                    <span class=\"skill_icon\">&nbsp;</span><a href=\"";
                            // line 109
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute($context["category"], "slug", array()), "filter" => array("p" => array("checkbox" => array("skills" => array(0 => $context["id"])))))), "html", null, true);
                            echo "\" class=\"nav_submenu_cat_link\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["skill"], "caption", array(), "array"), "html", null, true);
                            echo "</a>
                                </li>

                                ";
                            // line 112
                            $context["iSkills"] = ((isset($context["iSkills"]) ? $context["iSkills"] : null) + 1);
                            // line 113
                            echo "                                ";
                            if (((isset($context["iSkills"]) ? $context["iSkills"] : null) == (isset($context["cSkills"]) ? $context["cSkills"] : null))) {
                                // line 114
                                echo "                                    </ul>
                                    <ul class=\"nav_submenu_cats\">
                                ";
                            }
                            // line 117
                            echo "
                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['id'], $context['skill'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 119
                        echo "                        </ul>
                    </div>
                ";
                    }
                    // line 122
                    echo "
            </div>
";
                }
                // line 125
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 126
            echo "
    </nav>

";
        }
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  338 => 126,  332 => 125,  327 => 122,  322 => 119,  315 => 117,  310 => 114,  307 => 113,  305 => 112,  297 => 109,  293 => 108,  290 => 107,  286 => 106,  282 => 104,  279 => 103,  276 => 102,  274 => 101,  271 => 100,  264 => 95,  258 => 94,  253 => 91,  250 => 90,  248 => 89,  240 => 86,  236 => 84,  232 => 83,  227 => 80,  224 => 79,  222 => 78,  219 => 77,  212 => 72,  200 => 68,  196 => 66,  192 => 65,  186 => 61,  184 => 60,  181 => 59,  173 => 54,  168 => 51,  166 => 50,  162 => 48,  157 => 47,  152 => 46,  147 => 45,  143 => 44,  137 => 42,  135 => 41,  133 => 40,  130 => 39,  126 => 38,  121 => 35,  117 => 33,  115 => 32,  108 => 28,  104 => 27,  94 => 26,  91 => 25,  89 => 24,  86 => 23,  84 => 22,  79 => 19,  68 => 14,  60 => 13,  46 => 12,  43 => 11,  41 => 10,  38 => 9,  34 => 8,  27 => 6,  21 => 2,  19 => 1,);
    }
}
