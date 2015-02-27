<?php

/* CoreTroubleTicketBundle:TroubleTicket:contact.html.twig */
class __TwigTemplate_cf6012422b7d2dd38a8647e05bd2f878bf094e727e949ec91f1068fcd8eddfc6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'content' => array($this, 'block_content'),
            'menu_left' => array($this, 'block_menu_left'),
            'js_head' => array($this, 'block_js_head'),
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
    public function block_title($context, array $blocks = array())
    {
        echo "Контакты";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Контакты";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Контакты";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "<div role=\"main\" class=\"contacts_page info_page\" id=\"content\">
    <div class=\"main_col\">
        <div class=\"main_col_pad\">
            <ul class=\"info_page_path page_path_links\">
                <li class=\"page_path_link\">
                    <a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a>
                </li>
                <li class=\"page_path_link\">
                    <strong>Контактная информация</strong>
                </li>
            </ul>
            ";
        // line 20
        $context["ticketDone"] = false;
        // line 21
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "ticket_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 22
            echo "                ";
            $context["ticketDone"] = true;
            // line 23
            echo "                <div class=\"info_box info_box_border\">
                    ";
            // line 24
            echo $this->env->getExtension('translator')->trans($context["flashMessage"], array());
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "                ";
        // line 28
        echo "            <h1>Контактная информация</h1>

            <section class=\"info\">
                <div class=\"general\">
                    <h2>ООО «РОСТПЭЙ»</h2>
                    <p>Россия, г. Ростов-на-Дону, Бизнес-центр «Гвардейский», пер. Доломановский, 70Д, офис №1001 (10 этаж)</p>
                    <p><a target=\"blank\" href=\"http://maps.yandex.ua/-/CVrV50~6\" class=\"yandex_maps with_icon with_icon_right\">Посмотреть на Яндекс.Картах</a></p>
                </div>
                <img height=\"367\" width=\"284\" alt=\"Бизнес-центр «Гвардейский», пер. Доломановский, 70Д\" src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/office_photo.jpg"), "html", null, true);
        echo "\" class=\"office_photo ";
        if ((isset($context["ticketDone"]) ? $context["ticketDone"] : $this->getContext($context, "ticketDone"))) {
            echo "move";
        }
        echo "\">

                <dl class=\"contacts_list\">
                    <dd class=\"contacts_list_name\">Телефоны</dd>
                    <dt class=\"contacts_list_info\">
                        <ul class=\"round_bullet\">
                            <li>+7 (495) 916-72-52 Москва</li>
                            <li>+7 (812) 604-43-47 Санкт-Петербург</li>
                            <li>+7 (863) 280-01-01 Ростове-на-Дону</li>
                        </ul>
                    </dt>
                    <dd class=\"contacts_list_name\">";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("workTime.label"), "html", null, true);
        echo "</dd>
                    <dt class=\"contacts_list_info\">";
        // line 48
        echo $this->env->getExtension('translator')->trans("workTime.body");
        echo "</dt>
                    <dd class=\"contacts_list_name\">E-mail</dd>
                    <dt class=\"contacts_list_info\"><a href=\"mailto:info@olikids.ru\">info@olikids.ru</a></dt>
                    ";
        // line 54
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
                ";
        // line 69
        if (twig_length_filter($this->env, (isset($context["pickupPoints"]) ? $context["pickupPoints"] : $this->getContext($context, "pickupPoints")))) {
            // line 70
            echo "                    <dl class=\"contacts_list contacts_list_delivery\">
                        <dd class=\"contacts_list_name\">Пункт выдачи товара</dd>
                        <dt class=\"contacts_list_info\">
                            <ul class=\"list_simple\">
                                ";
            // line 74
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pickupPoints"]) ? $context["pickupPoints"] : $this->getContext($context, "pickupPoints")));
            foreach ($context['_seq'] as $context["_key"] => $context["point"]) {
                // line 75
                echo "                                <li>
                                    ";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["point"], "city", array()), "name", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["point"], "captionRu", array()), "html", null, true);
                echo "
                                    <br />
                                    ";
                // line 78
                echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["point"], "description", array()), "html", null, true));
                echo "
                                </li>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['point'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 81
            echo "                            </ul>
                        </dt>
                    </dl>
                ";
        }
        // line 85
        echo "            </section>
            <section id=\"ask-a-question\" class=\"ask\">
                <h2>Задайте нам вопрос</h2>
                <p>Мы постоянно работаем над качеством сайта, удобством его использования и повышением уровня наших услуг.
                Если у вас есть какие-либо предложения, пожелания, комментарии, вопросы или проблемы при использовании
                нашего сервиса, заполните, пожалуйста, форму, чтобы связаться с нами.</p>
                <p>Пожалуйста, для оформления и оплаты заказа ознакомьтесь с разделом <a href=\"";
        // line 91
        echo $this->env->getExtension('routing')->getPath("core_faq_homepage");
        echo "\">Помощь</a>.</p>

                ";
        // line 93
        $this->env->loadTemplate("CoreTroubleTicketBundle:TroubleTicket:form.html.twig")->display($context);
        // line 94
        echo "            </section>
        </div>
    </div>
    ";
        // line 97
        $this->displayBlock('menu_left', $context, $blocks);
        // line 100
        echo "</div>
";
    }

    // line 97
    public function block_menu_left($context, array $blocks = array())
    {
        // line 98
        echo "        ";
        echo twig_include($this->env, $context, "CoreCommonBundle:Fragments:menuLeft.html.twig");
        echo "
    ";
    }

    // line 102
    public function block_js_head($context, array $blocks = array())
    {
        // line 103
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
     ";
        // line 104
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0505135_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0505135_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/troubleticket_frontend_frontend_1.js");
            // line 105
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "0505135"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0505135") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/troubleticket_frontend.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 106
        echo "    
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:TroubleTicket:contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  249 => 106,  235 => 105,  231 => 104,  226 => 103,  223 => 102,  216 => 98,  213 => 97,  208 => 100,  206 => 97,  201 => 94,  199 => 93,  194 => 91,  186 => 85,  180 => 81,  171 => 78,  164 => 76,  161 => 75,  157 => 74,  151 => 70,  149 => 69,  132 => 54,  126 => 48,  122 => 47,  104 => 36,  94 => 28,  92 => 27,  83 => 24,  80 => 23,  77 => 22,  72 => 21,  70 => 20,  61 => 14,  54 => 9,  51 => 8,  45 => 6,  39 => 5,  33 => 4,);
    }
}
