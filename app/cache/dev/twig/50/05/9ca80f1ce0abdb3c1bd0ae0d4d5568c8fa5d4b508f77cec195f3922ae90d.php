<?php

/* CoreTroubleTicketBundle:TroubleTicket:contact_print.html.twig */
class __TwigTemplate_50059ca80f1ce0abdb3c1bd0ae0d4d5568c8fa5d4b508f77cec195f3922ae90d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'menu' => array($this, 'block_menu'),
            'footer' => array($this, 'block_footer'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::main_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 6
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "<div role=\"main\" class=\"contacts_page info_page\" id=\"content\">
    <div class=\"main_col\">
        <div class=\"main_col_pad\">
            <h1>Контактная информация</h1>

            <section class=\"info\">
                <div class=\"general\">
                    <h2>ООО «РОСТПЭЙ»</h2>
                    <p>Россия, г. Ростов-на-Дону, Бизнес-центр «Гвардейский», пер. Доломановский, 70Д, офис №1001 (10 этаж)</p>
                </div>
                ";
        // line 22
        echo "                <dl class=\"contacts_list\">
                    <dd class=\"contacts_list_name\">Телефоны</dd>
                    <dt class=\"contacts_list_info\">
                        <ul class=\"round_bullet\">
                            <li>+7 (495) 916-72-52 Москва</li>
                            <li>+7 (812) 604-43-47 Санкт-Петербург</li>
                            <li>+7 (863) 280-01-01 Ростове-на-Дону</li>
                        </ul>
                    </dt>
                    <dd class=\"contacts_list_name\">E-mail</dd>
                    <dt class=\"contacts_list_info\"><a href=\"mailto:support@olikids.com\">support@olikids.com</a></dt>
                    ";
        // line 36
        echo "                    <dd class=\"contacts_list_name\">Юридический адрес</dd>
                    <dt class=\"contacts_list_info\">344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1 (10 этаж)</dt>
                    <dd class=\"contacts_list_name\">Почтовый адрес</dd>
                    <dt class=\"contacts_list_info\">344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1001</dt>
                    <dd class=\"contacts_list_name\">Банковские реквизиты</dd>
                    <dt class=\"contacts_list_info\">
                        <ul class=\"list_simple\">
                                <li>ОГРН: 1086168004669</li>
                                <li>ИНН/КПП: 6168024612/616401001</li>
                                <li>Р/счет: 40702810681000895501 в Южном филиале ОАО \"Промсвязьбанк\", г. Волгоград</li>
                                <li>БИК: 041806715</li>
                                <li>К/счет: 30101810100000000715</li>
                        </ul>
                    </dt>
                </dl>
            </section>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:TroubleTicket:contact_print.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 36,  69 => 22,  57 => 9,  54 => 8,  49 => 6,  44 => 5,  39 => 4,  11 => 1,);
    }
}
