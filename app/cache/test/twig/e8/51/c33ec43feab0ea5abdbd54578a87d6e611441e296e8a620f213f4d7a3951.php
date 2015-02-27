<?php

/* FOSUserBundle:Resetting:passwordAlreadyRequested.html.twig */
class __TwigTemplate_e851c33ec43feab0ea5abdbd54578a87d6e611441e296e8a620f213f4d7a3951 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Восстановление пароля пользователя | OliKids.ru";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "восстановить, пароль, личный кабинет";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Введите Ваш e-mail для восстановления пароля на сайте OliKids.";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "<div id=\"page_path\">
        <ul class=\"page_path_links\">
            <li class=\"page_path_link\"><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a></li>
            <li class=\"page_path_link\">
                <strong>Восстановление пароля</strong>
            </li>
        </ul>
    </div>
    <div role=\"main\" class=\"login_page\" id=\"content\">
        <div class=\"page_pad\">
            <h1>Восстановление пароля</h1>
            <div class=\"attention_box\">
                ";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.password_already_requested", array(), "FOSUserBundle"), "html", null, true);
        echo "
            </div>
            <div class=\"box brown_gradient_box\">
                <form class=\"auto_size\" action=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_send_email");
        echo "\" method=\"POST\" class=\"fos_user_resetting_request\">
                    <fieldset class=\"form_fieldset\">
                        <div class=\"form_row\">
                            <label class=\"form_label\" for=\"username\">";
        // line 27
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
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>
                        </button> или
                        <a href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">Отменить</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:passwordAlreadyRequested.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 37,  92 => 35,  81 => 27,  75 => 24,  69 => 21,  56 => 11,  52 => 9,  49 => 8,  43 => 6,  37 => 5,  31 => 4,);
    }
}
