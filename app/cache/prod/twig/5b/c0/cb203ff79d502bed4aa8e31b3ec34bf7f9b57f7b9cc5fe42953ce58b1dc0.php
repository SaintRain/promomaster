<?php

/* CoreCommonBundle:Fragments:modal_window.html.twig */
class __TwigTemplate_5bc0cb203ff79d502bed4aa8e31b3ec34bf7f9b57f7b9cc5fe42953ce58b1dc0 extends Twig_Template
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
        // line 2
        echo "<div class=\"modal_window login\">
    <div class=\"modal_window_body modal_login\">
        <h2>Вход</h2>
        <form id=\"auth_form\" data-refresh=\"1\" id=\"modal_login\" class=\"auto_size\" action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\">
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\" />
            <fieldset class=\"form_fieldset\">
                <div class=\"form_row\">
                    <label class=\"form_label\" for=\"username_login\">";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                    <div class=\"form_field\">
                        <input size=\"40\" class=\"text_input\" type=\"text\" id=\"username_login\" name=\"_username\" value=\"\" required=\"required\" />
                    </div>
                </div>
                <div class=\"form_row\">
                    <label class=\"form_label\" for=\"password\">";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                    <div class=\"form_field\">
                        <input size=\"40\" class=\"text_input\" type=\"password\" id=\"password\" name=\"_password\" required=\"required\" />
                    </div>
                </div>
                <div class=\"form_row form_padding_group\">
                    <div class=\"form_field\">
                        <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                        <label for=\"remember_me\">";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                    </div>
                </div>
            </fieldset>
            <div class=\"form_row form_padding_group\">
                <button type=\"submit\" id=\"_submit\" name=\"_submit\" class=\"common_button big\">
                    <span>";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>
                </button> или <a target=\"blank\" href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\" class=\"text_tgl register\">Регистрация</a>
            </div>
            <div class=\"form_padding_group\">
                <a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_request");
        echo "\" class=\"restore text_tgl\">Напомнить пароль</a>
            </div>
        </form>
        <section class=\"login_social\">
            <h3>Вход через:</h3>
            ";
        // line 38
        ob_start();
        // line 39
        echo "            <div class=\"uLogin\" data-ulogin=\"display=buttons;
                 fields=first_name,last_name,photo,photo_big,email,nickname,bdate,sex,city,country,profile;
                 redirect_uri=;
                 receiver=http://";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "host", array()), "html", null, true);
        echo $this->env->getExtension('routing')->getPath("auth_receiver");
        echo ";
                 callback=ucall\">
                <span data-uloginbutton=\"facebook\" class=\"social_btn social_facebook\">&nbsp;</span>
                <span data-uloginbutton=\"vkontakte\" class=\"social_btn social_vkontakte\">&nbsp;</span>
                <span data-uloginbutton=\"twitter\" class=\"social_btn social_twitter\">&nbsp;</span>
                <span data-uloginbutton=\"yandex\" class=\"social_btn social_yandex\">&nbsp;</span>
                <span data-uloginbutton=\"google\" class=\"social_btn social_google\">&nbsp;</span>
                <span data-uloginbutton=\"odnoklassniki\" class=\"social_btn social_odnoklassniki\">&nbsp;</span>
            </div>
            ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 52
        echo "        </section>
    </div>
    <div class=\"modal_window_body hidden modal_restore\">
        <h2>Восстановление пароля</h2>
        <p>Вам на электронный адрес будет выслано письмо с паролем.</p>
        <form id=\"modal_reset\" class=\"auto_size\" action=\"";
        // line 57
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_send_email_ajax");
        echo "\" method=\"POST\" class=\"fos_user_resetting_request\">
            <fieldset class=\"form_fieldset\">
                <div class=\"form_row\">
                    <label class=\"form_label\" for=\"username\">";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                    <div class=\"form_field\">
                        <input size=\"40\" class=\"text_input\" type=\"text\" id=\"username\" name=\"username\" required=\"required\" />
                    </div>
                </div>
            </fieldset>
            <div class=\"form_row form_padding_group\">
                <button type=\"submit\" class=\"common_button big\">
                    <span>";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>
                </button> или
                <a href=\"";
        // line 70
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\" class=\"text_tgl close\" data-dismiss=\"modal\" aria-hidden=\"true\">Отменить</a>
            </div>
        </form>
    </div>
    <span title=\"Закрыть\" class=\"modal_window_close close\" data-dismiss=\"modal\" aria-hidden=\"true\">Закрыть</span>
</div>";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:modal_window.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 70,  126 => 68,  115 => 60,  109 => 57,  102 => 52,  88 => 42,  83 => 39,  81 => 38,  73 => 33,  67 => 30,  63 => 29,  54 => 23,  43 => 15,  34 => 9,  28 => 6,  24 => 5,  19 => 2,);
    }
}
