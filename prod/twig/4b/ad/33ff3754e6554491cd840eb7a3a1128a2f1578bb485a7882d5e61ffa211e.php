<?php

/* FOSUserBundle:Registration:register_content.html.twig */
class __TwigTemplate_4bad33ff3754e6554491cd840eb7a3a1128a2f1578bb485a7882d5e61ffa211e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout2.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::main_layout2.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "    <!--=== Breadcrumbs ===-->
    <div class=\"breadcrumbs\">
        <div class=\"container\">
            <h1 class=\"pull-left\">Регистрация</h1>
            <ul class=\"pull-right breadcrumb\">
                <li><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">На главную</a></li>
                <li class=\"active\">Регистрация</li>
            </ul>
        </div>
        <!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->


    <!--=== Content Part ===-->
    <div class=\"container content\">
        <div class=\"row\">
            <div class=\"col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2\">
                <form id=\"regForm\" class=\"reg-page\"
                      action=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo " method=\"POST\">
                    <div class=\"reg-header\">
                        <h2>Регистрация в системе</h2>

                        <p>Вы уже зарегистрированы? Нажмите <a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
        echo "\"
                                                               class=\"color-green\">авторизоваться</a>, чтобы войти в
                            личный кабинет.</p>
                    </div>

                    <label>Имя</label>
                    ";
        // line 39
        echo "                    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "firstname", array()), 'widget', array("attr" => array("class" => "form-control margin-bottom-20")));
        echo "
                    ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "firstname", array()), 'errors');
        echo "
                    <label>Фамилия</label>
                    ";
        // line 43
        echo "                    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "lastname", array()), 'widget', array("attr" => array("class" => "form-control margin-bottom-20")));
        echo "
                    ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "lastname", array()), 'errors');
        echo "

                    <div class=\"margin-bottom-20 ";
        // line 46
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                        <label>Email <span class=\"color-red\">*</span></label>
                        ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'widget', array("attr" => array("class" => "form-control ")));
        // line 49
        echo "
                        ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'errors');
        echo "
                    </div>

                    <div class=\"row margin-bottom-20\">
                        <div class=\"col-sm-6  ";
        // line 54
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                            <label>Пароль <span class=\"color-red\">*</span></label>
                            ";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                            ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'errors');
        echo "

                        </div>
                        <div class=\"col-sm-6  ";
        // line 60
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                            <label>Повторите пароль <span class=\"color-red\">*</span></label>
                            ";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                            ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'errors');
        echo "

                        </div>
                    </div>

                    <hr>
                    <div class=\"row\">
                        <div class=\"col-lg-6 checkbox\">
                            <label>
                                <input id=\"isAgreeWithRules\"
                                       name=\"isAgreeWithRules\" ";
        // line 73
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "isAgreeWithRules"), "method")) {
            echo " checked ";
        }
        // line 74
        echo "                                       type=\"checkbox\">
                                Я прочитал и согласен с <a href=\"page_terms.html\" class=\"color-green\">условиями
                                    пользования</a>
                            </label>

                            <div class=\"form_field_error_txt rulesError\">
                                Необходимо согласиться с условиями сервиса
                            </div>
                        </div>
                        <div class=\"col-lg-6 text-right\">
                            <button class=\"btn-u\" type=\"submit\">Зарегистрироваться</button>
                        </div>
                    </div>
                    ";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                </form>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->
    <script>

        \$(function () {

            \$('#isAgreeWithRules').click(function () {
                \$('.rulesError').hide();
            });
            \$('#regForm').submit(function () {
                if (!\$('#isAgreeWithRules').is(':checked')) {
                    \$('.rulesError').show();
                    return false;
                }
                else {
                    \$('.rulesError').hide();
                    return true;
                }
            });

        })

    </script>

";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 87,  183 => 74,  179 => 73,  166 => 63,  162 => 62,  155 => 60,  149 => 57,  145 => 56,  138 => 54,  131 => 50,  128 => 49,  126 => 48,  119 => 46,  114 => 44,  109 => 43,  104 => 40,  99 => 39,  90 => 32,  81 => 28,  64 => 14,  57 => 9,  54 => 8,  49 => 6,  44 => 5,  39 => 4,  11 => 1,);
    }
}
