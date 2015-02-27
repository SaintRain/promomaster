<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_c943978e15311a856c0f364178690a8aa18d59c7ce9b29502fa3c7802c33e57d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "method", array()) == "GET") && ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "modal"), "method") == null))) ? ("ApplicationSonataUserBundle::layout.html.twig") : ("ApplicationSonataUserBundle:Security:login_block.html.twig")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Авторизация";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Авторизация";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Войти и авторизоваться на Оликидс.ру";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "    <div id=\"page_path\">
        <ul class=\"page_path_links\">
                <li class=\"page_path_link\"><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a></li>
                <li class=\"page_path_link\">
                    <strong>Вход</strong>
                </li>
        </ul>
    </div>
    <div role=\"main\" class=\"login_page\" id=\"content\">
        <div class=\"page_pad\">
            <h1>Вход</h1>
            <div class=\"box brown_gradient_box\">
                <form data-refresh=\"0\" id=\"auth_form\" class=\"auto_size\" action=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\">
                    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />
                    <fieldset class=\"form_fieldset\">
                        <div class=\"form_row\">
                            <label class=\"form_label\" for=\"username\">";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                            <div class=\"form_field ";
        // line 26
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            echo "form_field_error";
        }
        echo "\">
                                <input size=\"40\" class=\"text_input\" type=\"email\" id=\"username\" name=\"_username\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\" />
                                ";
        // line 28
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 29
            echo "                                    <div class=\"form_field_error_txt\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
                                ";
        }
        // line 31
        echo "                            </div>
                        </div>
                        <div class=\"form_row\">
                            <label class=\"form_label\" for=\"password\">";
        // line 34
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
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class=\"form_row form_padding_group\">
                        <button type=\"submit\" id=\"_submit\" name=\"_submit\" class=\"common_button big\">
                            <span>";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>
                        </button> или <a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\">Зарегистрироваться</a>
                    </div>
                    <div class=\"form_padding_group\">
                            <a href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_request");
        echo "\">Напомнить пароль</a>
                    </div>
                </form>
                <section class=\"login_social\">
                    <h2>Вход через:</h2>
                    ";
        // line 57
        ob_start();
        // line 58
        echo "                    ";
        // line 64
        echo "                    <div id=\"uLogin\" data-ulogin=\"display=buttons;verify=1;lang=ru;
                         fields=first_name,last_name,photo,photo_big,email,nickname,bdate,sex,city,country,profile;
                         redirect_uri=;
                         receiver=http://";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "host", array()), "html", null, true);
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
        // line 77
        echo "                </section>
            </div>
            <div class=\"registration_benefits\">
                <h2>Зарегистрируйтесь на OliKids.ru прямо сейчас! Это займет одну минуту и даст Вам еще больше возможностей.</h2>
                <ul class=\"round_bullet\">
                    <li>Только зарегистрированный пользователь может купить игрушки на нашем сайте.</li>
                    <li>Мы запомним все Ваши данные, и при оформлении новых заказов Вам не придется указывать свои имя, фамилию, адрес и т. д.</li>
                    <li>Вы всегда будете в курсе состояния своих заказов: вся история и статус будут выводиться в личном кабинете.</li>
                    <li>Мы внимательно следим за Вашими предпочтениями и будем предлагать товары, которые могли бы Вас заинтересовать.</li>
                    <li>Мы регулярно оповещаем своих клиентов о своих новостях, свежих поступлениях, а также конкурсах и акциях.</li>
                    <li>Ваше мнение будет услышано — после регистрации у Вас появится возможность оставлять комментарии на сайте. Нам важно мнение Вас и Вашего ребенка!</li>
                </ul>
            </div>
        </div>
    </div>
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
        return array (  165 => 77,  151 => 67,  146 => 64,  144 => 58,  142 => 57,  134 => 52,  128 => 49,  124 => 48,  115 => 42,  104 => 34,  99 => 31,  93 => 29,  91 => 28,  87 => 27,  81 => 26,  77 => 25,  71 => 22,  67 => 21,  54 => 11,  50 => 9,  47 => 8,  41 => 6,  35 => 5,  29 => 4,);
    }
}
