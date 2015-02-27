<?php

/* CoreBannerBundle:Banner\Cabinet:list.html.twig */
class __TwigTemplate_b2e94bd808cc12cd16152d485b6e4442d88bada3de3b3066773b98151217952f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(2);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'sub_content' => array($this, 'block_sub_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataUserBundle::cabinet_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Ваши баннеры";
    }

    // line 6
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 7
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 10
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 11
        echo "        <!--=== Breadcrumbs ===-->
        <div class=\"breadcrumbs\">
            <div class=\"container\">
                <h1 class=\"pull-left\">Баннеры</h1>
                <ul class=\"pull-right breadcrumb\">
                    <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">На главную</a></li>
                    <li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
        echo "\">Кабинет</a></li>
                    <li class=\"active\">Список ваших баннеров</li>
                </ul>
            </div>
        </div>
        <!--=== End Breadcrumbs ===-->
    ";
    }

    // line 26
    public function block_sub_content($context, array $blocks = array())
    {
        // line 27
        echo "    ";
        if ($this->getAttribute((isset($context["banners"]) ? $context["banners"] : $this->getContext($context, "banners")), "getTotalItemCount", array())) {
            // line 28
            echo "        <h3>Список ваших баннеров</h3>
    ";
        } else {
            // line 30
            echo "        <h3>Вы еще не добавляли свои баннеры в систему</h3>
    ";
        }
        // line 32
        echo "    <a style=\"margin-top: -30px\" href=\"";
        echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_create");
        echo "\" class=\"btn-u pull-right\"><i
                class=\"fa fa-plus-square\"></i> &nbsp;Добавить баннер</a>


    ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 37
            echo "        <br/>
        <div class=\"alert alert-success fade in\">
            ";
            // line 39
            echo $context["flashMessage"];
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "

    ";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 45
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 47
            echo $context["flashMessage"];
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "

    ";
        // line 52
        if ($this->getAttribute((isset($context["banners"]) ? $context["banners"] : $this->getContext($context, "banners")), "getTotalItemCount", array())) {
            // line 53
            echo "        <table class=\"table table-striped\">
            <thead>
            <tr>
                <th width=\"5%\">#</th>
                <th width=\"40%\">Название</th>
                <th width=\"40%\">URL перехода</th>
                <th width=\"5%\">Размер</th>
                <th width=\"5%\">Тип</th>
                ";
            // line 62
            echo "            </tr>
            </thead>
            <tbody>
            ";
            // line 65
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["banners"]) ? $context["banners"] : $this->getContext($context, "banners")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
                // line 66
                echo "                <tr>
                    <td height=\"53px\">";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</td>
                    <td><a title=\"Перейти на редактирование\"
                           href=\"";
                // line 69
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_banner_edit", array("id" => $this->getAttribute($context["banner"], "id", array()))), "html", null, true);
                echo "\"><b>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["banner"], "name", array()), "html", null, true);
                echo "</b></a>
                    </td>
                    <td style=\"   word-break: break-all;\">
                        ";
                // line 72
                if ($this->getAttribute($context["banner"], "url", array(), "any", true, true)) {
                    // line 73
                    echo "                            <a target=\"_blank\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["banner"], "url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["banner"], "url", array()), "html", null, true);
                    echo "</a>
                            ";
                    // line 74
                    if ($this->getAttribute($context["banner"], "isOpenUrlInNewWindow", array())) {
                        echo "<br/><span>переход в новое окно</span>";
                    }
                    // line 75
                    echo "                        ";
                }
                // line 76
                echo "                    </td>
                    <td>
                        ";
                // line 78
                if ($this->getAttribute($context["banner"], "image", array(), "any", true, true)) {
                    // line 79
                    echo "                            ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute($context["banner"], "image", array(), "any", false, true), 0, array(), "array", false, true), "width", array(), "any", true, true)) {
                        // line 80
                        echo "                                ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["banner"], "image", array()), 0, array(), "array"), "height", array()), "html", null, true);
                        echo "x";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["banner"], "image", array()), 0, array(), "array"), "width", array()), "html", null, true);
                        echo "
                            ";
                    }
                    // line 82
                    echo "                        ";
                } else {
                    // line 83
                    echo "                            ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute($context["banner"], "file", array(), "any", false, true), 0, array(), "array", false, true), "width", array(), "any", true, true)) {
                        // line 84
                        echo "                                ";
                        if ($this->getAttribute($this->getAttribute($this->getAttribute($context["banner"], "file", array(), "any", false, true), 0, array(), "array", false, true), "width", array(), "any", true, true)) {
                            // line 85
                            echo "                                    ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["banner"], "file", array()), 0, array(), "array"), "height", array()), "html", null, true);
                            echo "x";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["banner"], "file", array()), 0, array(), "array"), "width", array()), "html", null, true);
                            echo "
                                ";
                        }
                        // line 87
                        echo "                            ";
                    }
                    // line 88
                    echo "                        ";
                }
                // line 89
                echo "                    </td>
                    <td>

                        ";
                // line 92
                if ($this->getAttribute($context["banner"], "image", array(), "any", true, true)) {
                    // line 93
                    echo "                            Изображение
                        ";
                }
                // line 95
                echo "
                        ";
                // line 96
                if ($this->getAttribute($context["banner"], "code", array(), "any", true, true)) {
                    // line 97
                    echo "                            HTML / Сторонний
                        ";
                }
                // line 99
                echo "
                        ";
                // line 100
                if ($this->getAttribute($context["banner"], "file", array(), "any", true, true)) {
                    // line 101
                    echo "                            Flash
                        ";
                }
                // line 103
                echo "
                    </td>
                    ";
                // line 106
                echo "                        ";
                // line 107
                echo "                           ";
                // line 108
                echo "                    ";
                // line 109
                echo "                </tr>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 111
            echo "            </tbody>
        </table>

        ";
            // line 114
            $context["routeFirsPage"] = "core_cabinet_banner_list_first_page";
            // line 115
            echo "        ";
            $context["routePage"] = "core_cabinet_banner_list";
            // line 116
            echo "
        ";
            // line 117
            echo $this->env->getExtension('knp_pagination')->render((isset($context["banners"]) ? $context["banners"] : $this->getContext($context, "banners")), "CoreBannerBundle:Banner/Cabinet:pagination.html.twig", array(), array("routeFirsPage" => (isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : $this->getContext($context, "routeFirsPage")), "routePage" => (isset($context["routePage"]) ? $context["routePage"] : $this->getContext($context, "routePage"))));
            // line 118
            echo "

    ";
        }
        // line 121
        echo "
    <script>
        \$(function () {
            \$('.delete').click(function () {
                var res = confirm('Вы действительно хотите удалить этот баннер из системы?');
                if (res) {
                    var id = \$(this).attr('data-id'),
                            url = '";
        // line 128
        echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_delete", array("id" => 0));
        echo "';

                    url = url.replace(0, id);
                    window.location.href = url;
                }
            });
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "CoreBannerBundle:Banner\\Cabinet:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 128,  325 => 121,  320 => 118,  318 => 117,  315 => 116,  312 => 115,  310 => 114,  305 => 111,  290 => 109,  288 => 108,  286 => 107,  284 => 106,  280 => 103,  276 => 101,  274 => 100,  271 => 99,  267 => 97,  265 => 96,  262 => 95,  258 => 93,  256 => 92,  251 => 89,  248 => 88,  245 => 87,  237 => 85,  234 => 84,  231 => 83,  228 => 82,  220 => 80,  217 => 79,  215 => 78,  211 => 76,  208 => 75,  204 => 74,  197 => 73,  195 => 72,  187 => 69,  182 => 67,  179 => 66,  162 => 65,  157 => 62,  147 => 53,  145 => 52,  141 => 50,  132 => 47,  128 => 45,  124 => 44,  120 => 42,  111 => 39,  107 => 37,  103 => 36,  95 => 32,  91 => 30,  87 => 28,  84 => 27,  81 => 26,  70 => 17,  66 => 16,  59 => 11,  56 => 10,  51 => 7,  46 => 6,  40 => 5,  11 => 2,);
    }
}
