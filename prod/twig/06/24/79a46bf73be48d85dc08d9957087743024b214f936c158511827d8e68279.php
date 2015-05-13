<?php

/* CoreSiteBundle:Site/Cabinet:edit.html.twig */
class __TwigTemplate_062479a46bf73be48d85dc08d9957087743024b214f936c158511827d8e68279 extends Twig_Template
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
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "id", array())) {
            echo "Редактирование настроек сайта ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "domain", array()), "html", null, true);
        } else {
            echo "Добавление сайта в систему";
        }
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
                <h1 class=\"pull-left\">Сайты</h1>
                <ul class=\"pull-right breadcrumb\">
                    <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">На главную</a></li>
                    <li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
        echo "\">Кабинет</a></li>
                    <li><a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("core_cabinet_site_list_first_page");
        echo "\">Список ваших сайтов</a></li>
                    <li class=\"active\">Редактирование настроек вашего сайта</li>
                </ul>
            </div>
        </div>
        <!--=== End Breadcrumbs ===-->
    ";
    }

    // line 27
    public function block_sub_content($context, array $blocks = array())
    {
        // line 28
        echo "
    ";
        // line 29
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "id", array())) {
            // line 30
            echo "        <h3>Редактирование настроек вашего сайта</h3>
    ";
        } else {
            // line 32
            echo "        <h3>Добавление нового сайта в систему</h3>
    ";
        }
        // line 34
        echo "

    ";
        // line 37
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 38
            echo "        <br/>
        <div class=\"alert alert-success fade in\">
            ";
            // line 40
            echo $context["flashMessage"];
            echo "

            &nbsp;&nbsp;&nbsp;<a class='btn-u btn-u-xs ' href='";
            // line 42
            echo $this->env->getExtension('routing')->getPath("core_cabinet_site_create");
            echo "'><i
                        class='fa fa-plus-square'></i> &nbsp;Добавить еще сайт</a>
            &nbsp;&nbsp;&nbsp;
            <a class='btn-u btn-u-xs btn-u-default' href='";
            // line 45
            echo $this->env->getExtension('routing')->getPath("core_cabinet_site_list_first_page");
            echo "'><i
                        class='fa fa-reply'></i> &nbsp;Вернуться к списку сайтов</a>

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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 53
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 55
            echo $context["flashMessage"];
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "

    ";
        // line 60
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "errors", array()))) {
            // line 61
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 63
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
            echo "
        </div>
    ";
        }
        // line 66
        echo "
    <form style=\"clear: both\" class=\"sky-form sky-form-other-style\"
          action=\"";
        // line 68
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "id", array())) {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_site_edit", array("id" => $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "id", array()))), "html", null, true);
        } else {
            echo $this->env->getExtension('routing')->getPath("core_cabinet_site_create");
        }
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo "
          method=\"POST\">
        <fieldset class=\"sky-form-other-style\">

            <div class=\"row margin-bottom-20\">
                <div class=\"col-sm-6  ";
        // line 73
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "domain", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                    <label>Адрес сайта*</label>
                    ";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "domain", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                    <span class=\"help\">Введите полный адрес вашего сайта начиная с http://</span>
                    ";
        // line 77
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "domain", array()), 'errors');
        echo "
                </div>
            </div>
            <div class=\"row margin-bottom-20\">
                <div class=\"col-lg-12  ";
        // line 81
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "categories", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                    <label>Тематика сайта*</label>
                    ";
        // line 83
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "categories", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                    ";
        // line 84
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "categories", array()), 'errors');
        echo "
                </div>
            </div>

            <div class=\"row margin-bottom-20\">
                <div class=\"col-sm-6  ";
        // line 89
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "mirrors", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                    <label>Зеркала</label>
                    ";
        // line 91
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "mirrors", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                    ";
        // line 92
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "mirrors", array()), 'errors');
        echo "
                    <span class=\"help\">Альтернативные адреса вашего сайта.</span>
                </div>
            </div>

            <div class=\"row margin-bottom-20\">
                <div class=\"col-sm-6  ";
        // line 98
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "keywords", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                    <label>Ключевые слова (каждое с новой строки)</label>
                    ";
        // line 100
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "keywords", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                    <span class=\"help\">Ключевые слова используются для повышения релевантности поиска в каталоге системы.</span>
                    ";
        // line 102
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "keywords", array()), 'errors');
        echo "
                </div>
            </div>


            <div class=\"margin-bottom-20\">
            </div>

            ";
        // line 110
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

            <div class=\"text-right\">
                <button class=\"btn-u\" type=\"submit\">";
        // line 113
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "id", array())) {
            echo "Сохранить";
        } else {
            echo "Добавить";
        }
        echo "</button>
                &nbsp;&nbsp;
                <a href=\"";
        // line 115
        echo $this->env->getExtension('routing')->getPath("core_cabinet_site_list_first_page");
        echo "\" class=\"btn-u btn-u-default\">Отмена</a>
                ";
        // line 116
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "id", array())) {
            // line 117
            echo "                    &nbsp;&nbsp; или &nbsp;&nbsp;
                    <a href=\"javascript:void(0);\" class=\"delete btn-u btn-u-red\">Удалить</a>
                ";
        }
        // line 120
        echo "            </div>

        </fieldset>


    </form>



    <script>
        \$(function () {

            ";
        // line 132
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "id", array())) {
            // line 133
            echo "            \$('.delete').click(function () {
                var res = confirm('Вы действительно хотите удалить этот баннер из системы?');
                if (res) {
                    window.location.href = '";
            // line 136
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_site_delete", array("id" => $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "id", array()))), "html", null, true);
            echo "';
                }
            });
            ";
        }
        // line 140
        echo "        })
    </script>


";
    }

    public function getTemplateName()
    {
        return "CoreSiteBundle:Site/Cabinet:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  331 => 140,  324 => 136,  319 => 133,  317 => 132,  303 => 120,  298 => 117,  296 => 116,  292 => 115,  283 => 113,  277 => 110,  266 => 102,  261 => 100,  254 => 98,  245 => 92,  241 => 91,  234 => 89,  226 => 84,  222 => 83,  215 => 81,  208 => 77,  203 => 75,  196 => 73,  182 => 68,  178 => 66,  172 => 63,  168 => 61,  166 => 60,  162 => 58,  153 => 55,  149 => 53,  145 => 52,  141 => 50,  130 => 45,  124 => 42,  119 => 40,  115 => 38,  110 => 37,  106 => 34,  102 => 32,  98 => 30,  96 => 29,  93 => 28,  90 => 27,  79 => 18,  75 => 17,  71 => 16,  64 => 11,  61 => 10,  56 => 7,  51 => 6,  40 => 5,  11 => 2,);
    }
}
