<?php

/* FOSUserBundle:Registration:checkEmail.html.twig */
class __TwigTemplate_c04c49bc6539e6153f6b1861852ca10bb8785ef225063f675a6c97781b30207e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::layout.html.twig");

        $this->blocks = array(
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div id=\"page_path\">
        <ul class=\"page_path_links\">
                <li class=\"page_path_link\">
                    <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a>
                </li>
                <li class=\"page_path_link\">
                    <strong>Регистрация</strong>
                </li>
        </ul>
    </div>
    <div id=\"content\" class=\"registration_page\" role=\"main\">
        <div class=\"page_pad\">
            <h1>Регистрация</h1>
            <div class=\"info_box\">
                ";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.check_email", array("%email%" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email", array())), "FOSUserBundle"), "html", null, true);
        echo "
            </div>
            <div class=\"registration_benefits\">
                <h2>Регистрация на OliKids.ru &mdash; это одни преимущества!</h2>
                <ul class=\"round_bullet\">
                    <li>Индивидуальные скидки постоянным клиентам;</li>
                    <li>Авоматизация выписки всех необходимых документов: акты, счета-фактуры, договора, платежи и т.д.;</li>
                    <li>Контроль исполнения заказов: отгрузка, упаковка, поступление, оплата и т.д.;</li>
                    <li>Встроенная система консультирования клиентов;</li>
                    <li>Управление адресами получателей;</li>
                    <li>Индивидуальные прайс-листы на оборудование в формате XLS, PDF и другие;</li>
                    <li>Управление профилем пользователя;</li>
                    <li>И многое другое...</li>
                </ul>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:checkEmail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 18,  36 => 7,  31 => 4,  28 => 3,);
    }
}
