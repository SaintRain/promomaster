<?php

/* FOSUserBundle:Registration:register_content.html.twig */
class __TwigTemplate_d66ea3f8d80180d99c0fc27436d222a97259e4d8c7fd95f846daee896b3045e1 extends Twig_Template
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
        echo "<div class=\"box brown_gradient_box\">
    <form id=\"auth_form\" data-refresh=\"0\" class=\"auto_size\" action=\"";
        // line 2
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo " method=\"POST\">
        <fieldset class=\"form_fieldset\">
            <div class=\"form_row\">
                ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'label', array("label_attr" => array("class" => "form_label")));
        echo "
                <div class=\"form_field ";
        // line 6
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'errors')) {
            echo "form_field_error";
        }
        echo "\">
                    ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'widget', array("attr" => array("size" => "40", "class" => "text_input")));
        echo "
                    ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'errors');
        echo "
                </div>
            </div>
        </fieldset>

        <fieldset class=\"form_fieldset\">
                <div class=\"form_row\">
                    ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'label', array("label_attr" => array("class" => "form_label")));
        echo "
                    <div class=\"form_field ";
        // line 16
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'errors')) {
            echo "form_field_error";
        }
        echo "\">
                        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'widget', array("attr" => array("size" => "40", "class" => "text_input")));
        echo "
                        ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "first", array()), 'errors');
        echo "
                    </div>
                </div>
                <div class=\"form_row\">
                    ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'label', array("label_attr" => array("class" => "form_label")));
        echo "
                    ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'widget', array("attr" => array("size" => "40", "class" => "text_input")));
        echo "
                    ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), "second", array()), 'errors');
        echo "
                </div>
        </fieldset>
        <div class=\"form_padding_group\">
                ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                <button type=\"submit\" class=\"common_button big\" onclick=\"yaCounter23357440.reachGoal('registr'); return true;\">
                    <span>";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>
                </button> или <a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
        echo "\">Войти</a>
        </div>
    </form>
    <section class=\"login_social\">
            <h2>Вход через:</h2>
            ";
        // line 36
        ob_start();
        // line 37
        echo "            <div id=\"uLogin\" data-ulogin=\"display=buttons;
                 fields=first_name,last_name,photo,photo_big,email,nickname,bdate,sex,city,country,profile;
                 redirect_uri=;
                 receiver=http://";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "host", array()), "html", null, true);
        echo $this->env->getExtension('routing')->getPath("auth_receiver");
        echo ";
                 callback=ucall\">
                <span onclick=\"yaCounter23357440.reachGoal('registr_social');\" return true; data-uloginbutton=\"facebook\" class=\"social_btn social_facebook\">&nbsp;</span>
                <span onclick=\"yaCounter23357440.reachGoal('registr_social');\" data-uloginbutton=\"vkontakte\" class=\"social_btn social_vkontakte\">&nbsp;</span>
                <span onclick=\"yaCounter23357440.reachGoal('registr_social');\" data-uloginbutton=\"twitter\" class=\"social_btn social_twitter\">&nbsp;</span>
                <span onclick=\"yaCounter23357440.reachGoal('registr_social');\" data-uloginbutton=\"yandex\" class=\"social_btn social_yandex\">&nbsp;</span>
                <span onclick=\"yaCounter23357440.reachGoal('registr_social');\" data-uloginbutton=\"google\" class=\"social_btn social_google\">&nbsp;</span>
                <span onclick=\"yaCounter23357440.reachGoal('registr_social');\" data-uloginbutton=\"odnoklassniki\" class=\"social_btn social_odnoklassniki\">&nbsp;</span>
            </div>
            ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 50
        echo "    </section>
</div>";
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
        return array (  128 => 50,  114 => 40,  109 => 37,  107 => 36,  99 => 31,  95 => 30,  90 => 28,  83 => 24,  79 => 23,  75 => 22,  68 => 18,  64 => 17,  58 => 16,  54 => 15,  44 => 8,  40 => 7,  34 => 6,  30 => 5,  22 => 2,  19 => 1,);
    }
}
