<?php

/* FOSUserBundle:Profile:show.html.twig */
class __TwigTemplate_6d3d1c186c1a69073b611207526dc594c49229d1b9c91572e65466fd633f3e52 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'main_content' => array($this, 'block_main_content'),
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Личный кабинет пользователя | OliKids.ru";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "личный кабинет, персональные данные, информация";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Личный кабинет пользователя в интернет-магазине детских товаров OliKids. В личном кабинете Вы можете изменить персональную информацию, узнать состояние заказа, посмотреть историю прошлых покупок и просмотренных товаров.";
    }

    // line 8
    public function block_main_content($context, array $blocks = array())
    {
        // line 9
        echo "    <section class=\"cabinet_personal_info\">
        <h2>Персональная информация</h2>
        ";
        // line 11
        $this->env->loadTemplate("ApplicationSonataUserBundle:Profile:show_content.html.twig")->display($context);
        // line 12
        echo "    </section>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Profile:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 12,  56 => 11,  52 => 9,  49 => 8,  43 => 6,  37 => 5,  31 => 4,);
    }
}
