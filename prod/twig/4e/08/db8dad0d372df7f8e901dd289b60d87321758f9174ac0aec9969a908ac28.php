<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_4e08db8dad0d372df7f8e901dd289b60d87321758f9174ac0aec9969a908ac28 extends Twig_Template
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
            'js_head' => array($this, 'block_js_head'),
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
    public function block_js_head($context, array $blocks = array())
    {
        // line 9
        echo "     ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
     <script src=\"/assets/js/plugins/ulogin.js\"></script>
 ";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "
    <!--=== Breadcrumbs ===-->
    <div class=\"breadcrumbs\">
        <div class=\"container\">
            <h1 class=\"pull-left\">Авторизация</h1>
            <ul class=\"pull-right breadcrumb\">
                <li><a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">На главную</a></li>
                <li class=\"active\">Авторизация</li>
            </ul>
        </div>
        <!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class=\"container content\">


        <div class=\"row\">
            <div class=\"col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3\">
                <form id=\"auth_form\" class=\"reg-page\" action=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\">
                    <div class=\"reg-header\">
                        <h2>Авторизация в системе</h2>

                        <section class=\"login_social\">
                            ";
        // line 40
        ob_start();
        // line 41
        echo "                                ";
        // line 47
        echo "                                <div id=\"uLogin\" data-ulogin=\"display=buttons;verify=1;lang=ru;
                        fields=first_name,last_name,photo,photo_big,email,nickname,bdate,sex,city,country,profile;
                        redirect_uri=;
                        receiver=http://";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "host", array()), "html", null, true);
        echo $this->env->getExtension('routing')->getPath("auth_receiver");
        echo ";
                        callback=ucall\">
                                    <span data-uloginbutton=\"facebook\" class=\"social_btn social_facebook\">&nbsp;</span>
                                    <span data-uloginbutton=\"vkontakte\"
                                          class=\"social_btn social_vkontakte\">&nbsp;</span>
                                    <span data-uloginbutton=\"twitter\" class=\"social_btn social_twitter\">&nbsp;</span>
                                    <span data-uloginbutton=\"yandex\" class=\"social_btn social_yandex\">&nbsp;</span>
                                    <span data-uloginbutton=\"google\" class=\"social_btn social_google\">&nbsp;</span>
                                    <span data-uloginbutton=\"odnoklassniki\" class=\"social_btn social_odnoklassniki\">&nbsp;</span>
                                </div>
                            ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 61
        echo "                        </section>

                    </div>

                    ";
        // line 65
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 66
            echo "                        <div class=\"form_field_error_txt\">
                            ";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : null), array(), "FOSUserBundle"), "html", null, true);
            echo "
                        </div>
                        <br/>
                    ";
        }
        // line 71
        echo "
                    <div class=\"input-group margin-bottom-20\">
                        <span class=\"input-group-addon\"><i class=\"fa fa-user\"></i></span>
                        <input type=\"email\" id=\"username\" name=\"_username\" required=\"required\" placeholder=\"Email\"
                               class=\"form-control\">
                    </div>
                    <div class=\"input-group margin-bottom-20\">
                        <span class=\"input-group-addon\"><i class=\"fa fa-lock\"></i></span>
                        <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" placeholder=\"Пароль\"
                               class=\"form-control\">
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 checkbox\">
                            <label><input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\"> Запомнить
                                меня</label>
                        </div>
                        <div class=\"col-md-6\">
                            <button class=\"btn-u pull-right\" type=\"submit\">Войти</button>
                        </div>
                    </div>

                    <hr>
                    <h4>Забыли свой пароль ?</h4>

                    <p>не беспокойтесь, <a class=\"color-green\" href=\"";
        // line 96
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_request");
        echo "\">нажмите
                            здесь</a>, чтобы восстановить ваш пароль.</p>

                    <hr>
                    <h4>Вы еще не зарегистрированы?</h4>

                    <p>Нажмите <a class=\"color-green\" href=\"";
        // line 102
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\">зарегистрироваться</a>,
                        чтобы создать учетную запись.</p>

                </form>
            </div>
        </div>
        <!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->


";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 102,  171 => 96,  144 => 71,  137 => 67,  134 => 66,  132 => 65,  126 => 61,  111 => 50,  106 => 47,  104 => 41,  102 => 40,  94 => 35,  77 => 21,  69 => 15,  66 => 14,  58 => 9,  55 => 8,  50 => 6,  45 => 5,  40 => 4,  11 => 1,);
    }
}
