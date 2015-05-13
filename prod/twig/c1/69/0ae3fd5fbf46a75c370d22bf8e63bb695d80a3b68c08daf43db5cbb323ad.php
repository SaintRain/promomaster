<?php

/* FOSUserBundle:Registration:register.html.twig */
class __TwigTemplate_c1690ae3fd5fbf46a75c370d22bf8e63bb695d80a3b68c08daf43db5cbb323ad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::layout.html.twig");
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
        return "ApplicationSonataUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Регистрация";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Регистрация на сайте";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Регистрация на сайте Оликидс.ру";
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
                <strong>Регистрация</strong>
            </li>
    </ul>
</div>
<div role=\"main\" class=\"registration_page\" id=\"content\">
    <div class=\"page_pad\">
        <h1>Регистрация</h1>
        ";
        // line 20
        $this->env->loadTemplate("ApplicationSonataUserBundle:Registration:register_content.html.twig")->display($context);
        // line 21
        echo "        <div class=\"registration_benefits\">
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
        return "FOSUserBundle:Registration:register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 21,  76 => 20,  64 => 11,  60 => 9,  57 => 8,  51 => 6,  45 => 5,  39 => 4,  11 => 1,);
    }
}
