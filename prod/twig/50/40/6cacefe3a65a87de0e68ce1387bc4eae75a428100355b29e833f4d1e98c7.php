<?php

/* FOSUserBundle:Profile:edit.html.twig */
class __TwigTemplate_50406cacefe3a65a87de0e68ce1387bc4eae75a428100355b29e833f4d1e98c7 extends Twig_Template
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
        echo "Редактирование вашего профиля";
    }

    // line 6
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 7
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 9
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 10
        echo "        <!--=== Breadcrumbs ===-->
        <div class=\"breadcrumbs\">
            <div class=\"container\">
                <h1 class=\"pull-left\">Персональная информация</h1>
                <ul class=\"pull-right breadcrumb\">
                    <li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">На главную</a></li>
                    <li class=\"active\">Персональная информация</li>
                </ul>
            </div>
        </div>
        <!--=== End Breadcrumbs ===-->
    ";
    }

    // line 23
    public function block_sub_content($context, array $blocks = array())
    {
        // line 24
        echo "    ";
        // line 25
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "profile_edit_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 26
            echo "        <div class=\"alert alert-success fade in\">
            ";
            // line 27
            echo $this->env->getExtension('translator')->trans($context["flashMessage"], array());
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "
    ";
        // line 31
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "errors", array()))) {
            // line 32
            echo "        <div class=\"alert alert-danger fade in\">
            ";
            // line 33
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
            echo "
        </div>
    ";
        }
        // line 36
        echo "
    <form class=\"sky-form sky-form-other-style\"  action=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo " method=\"POST\">
        <header  class=\"sky-form-other-style\">Редактирование профиля</header><br/>
        <fieldset class=\"sky-form-other-style\">

            <div class=\"row margin-bottom-20\">
                <div class=\"col-sm-6  ";
        // line 42
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "firstname", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                    <label>Имя</label>
                    ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "firstname", array()), 'widget', array("attr" => array("class" => "form-control margin-bottom-20")));
        echo "
                    ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "firstname", array()), 'errors');
        echo "

                </div>
                <div class=\"col-sm-6  ";
        // line 48
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "lastname", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                    <label>Фамилия</label>
                    ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "lastname", array()), 'widget', array("attr" => array("class" => "form-control margin-bottom-20")));
        echo "
                    ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "lastname", array()), 'errors');
        echo "
                </div>
            </div>

            ";
        // line 56
        echo "            ";
        // line 57
        echo "            ";
        // line 58
        echo "            ";
        // line 59
        echo "            ";
        // line 60
        echo "
            ";
        // line 62
        echo "            ";
        // line 63
        echo "            ";
        // line 64
        echo "            ";
        // line 65
        echo "            ";
        // line 66
        echo "
            <div class=\"margin-bottom-20 ";
        // line 67
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Email </label>
                ";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'widget', array("attr" => array("class" => "form-control ")));
        // line 70
        echo "
                ";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'errors');
        echo "
            </div>

            <div class=\"margin-bottom-20 ";
        // line 74
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Телефон </label>
                ";
        // line 76
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone", array()), 'widget', array("attr" => array("class" => "form-control ")));
        // line 77
        echo "
                ";
        // line 78
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone", array()), 'errors');
        echo "
            </div>


            <div class=\"margin-bottom-20 ";
        // line 82
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "isRssNews", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label class=\"checkbox\">
                    ";
        // line 84
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "isRssNews", array()), 'widget');
        echo "<i></i> Получать рассылку</label>
                ";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "isRssNews", array()), 'errors');
        echo "
                </label>
            </div>


            <div class=\" margin-bottom-20\">
                <h3>Изменить пароль</h3>
            </div>

            <div class=\"row \">
                <div class=\"col-sm-6  ";
        // line 95
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                    <label>Новый пароль </label>
                    ";
        // line 97
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                    ";
        // line 98
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'errors');
        echo "

                </div>
                <div class=\"col-sm-6  ";
        // line 101
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                    <label>Повторите пароль </label>
                    ";
        // line 103
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                    ";
        // line 104
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'errors');
        echo "
                </div>
            </div>

            <div class=\" margin-bottom-20\">
            </div>

            ";
        // line 111
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
        </fieldset>

        <footer class=\"sky-form-other-style\">
            <div class=\"row\">
                <div class=\"col-lg-6 checkbox\">
                </div>
                <div class=\"col-lg-6 text-right\">
                    <button class=\"btn-u\" type=\"submit\">Сохранить</button>
                </div>
            </div>
        </footer>
    </form>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Profile:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  282 => 111,  272 => 104,  268 => 103,  261 => 101,  255 => 98,  251 => 97,  244 => 95,  231 => 85,  227 => 84,  220 => 82,  213 => 78,  210 => 77,  208 => 76,  201 => 74,  195 => 71,  192 => 70,  190 => 69,  183 => 67,  180 => 66,  178 => 65,  176 => 64,  174 => 63,  172 => 62,  169 => 60,  167 => 59,  165 => 58,  163 => 57,  161 => 56,  154 => 51,  150 => 50,  143 => 48,  137 => 45,  133 => 44,  126 => 42,  116 => 37,  113 => 36,  107 => 33,  104 => 32,  102 => 31,  99 => 30,  90 => 27,  87 => 26,  82 => 25,  80 => 24,  77 => 23,  66 => 15,  59 => 10,  56 => 9,  51 => 7,  46 => 6,  40 => 5,  11 => 2,);
    }
}
