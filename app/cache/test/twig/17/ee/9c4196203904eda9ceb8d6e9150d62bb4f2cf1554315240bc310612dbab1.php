<?php

/* CoreCommonBundle:Fragments:footer.html.twig */
class __TwigTemplate_17ee9c4196203904eda9ceb8d6e9150d62bb4f2cf1554315240bc310612dbab1 extends Twig_Template
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
        $context["noIndex"] = ((($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_common_index"))) ? (false) : (true));
        // line 3
        echo "<footer id=\"footer\">
    <div class=\"footer_container\">
        <div class=\"grid_container\">
            <ul class=\"footer_cats grid_item\">
                ";
        // line 7
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:categoriesInDown", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "
            </ul>
            <ul class=\"footer_brands grid_item\">
                ";
        // line 10
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:brandsInDown", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "
            </ul>
            <div class=\"footer_support grid_item\">

                ";
        // line 14
        $context["phones"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "phones"), "method");
        // line 15
        echo "                ";
        $context["phonesCaptions"] = array("rostov" => "Ростов н/Д", "msk" => "Москва", "spb" => "СПб");
        // line 16
        echo "
                <ul>
                    ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["phones"]) ? $context["phones"] : $this->getContext($context, "phones")));
        foreach ($context['_seq'] as $context["key"] => $context["phone"]) {
            // line 19
            echo "                        ";
            if ($this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : null), $context["key"], array(), "array", true, true)) {
                // line 20
                echo "
                            <li>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : $this->getContext($context, "phonesCaptions")), $context["key"], array(), "array"), "html", null, true);
                echo ": ";
                echo twig_escape_filter($this->env, $context["phone"], "html", null, true);
                echo "</li>

                        ";
            }
            // line 24
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['phone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "                    ";
        // line 28
        echo "                </ul>
                ";
        // line 29
        if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
            echo "<!--noindex-->";
        }
        // line 30
        echo "                <ul>
                    <li>
                        <a ";
        // line 32
        if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
            echo "rel=\"nofollow\" ";
        }
        echo "href=\"";
        echo $this->env->getExtension('routing')->getPath("core_common_about");
        echo "\">О магазине</a>
                    </li>
                    <li>
                        <a ";
        // line 35
        if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
            echo "rel=\"nofollow\" ";
        }
        echo "href=\"";
        echo $this->env->getExtension('routing')->getPath("trouble_ticket_contact");
        echo "\">Контактная информация</a>
                    </li>
                    <li>
                        <a ";
        // line 38
        if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
            echo "rel=\"nofollow\" ";
        }
        echo "href=\"";
        echo $this->env->getExtension('routing')->getPath("core_faq_homepage");
        echo "\">Помощь</a>
                    </li>

                    ";
        // line 41
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:howToBecomeAPartner", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "

                </ul>
                ";
        // line 44
        if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
            echo "<!--/noindex-->";
        }
        // line 45
        echo "                <ul>
                    <li>
                        <a target=\"_blank\" href=\"http://clck.yandex.ru/redir/dtype=stred/pid=47/cid=2508/*http://market.yandex.ru/shop/239839/reviews\">
                            <img src=\"http://clck.yandex.ru/redir/dtype=stred/pid=47/cid=2505/*http://grade.market.yandex.ru/?id=239839&amp;action=image&amp;size=0\" border=\"0\" width=\"88\" height=\"31\" alt=\"Читайте отзывы покупателей и оценивайте качество магазина на Яндекс.Маркете\">
                        </a>
                    </li>
                    <li>
                        <a target=\"_blank\" href=\"http://clck.yandex.ru/redir/dtype=stred/pid=47/cid=1248/*http://market.yandex.ru/shop/239839/reviews/add\">
                            <img src=\"http://clck.yandex.ru/redir/dtype=stred/pid=47/cid=1248/*http://img.yandex.ru/market/informer12.png\" border=\"0\" alt=\"Оцените качество магазина на Яндекс.Маркете.\">
                        </a>
                    </li>
                    ";
        // line 56
        if (((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex")) == false)) {
            // line 57
            echo "                    <li>
                        <a target=\"_blank\" href=\"http://www.kids-price.ru\">
                            <img height=\"31\" width=\"88\" alt=\"Kids-Price.Ru - цены на детские товары, коляски, автомобильные детские кресла, одежду и обувь.\" src=\"http://www.kids-price.ru/i/banner.gif\" border=\"0\">
                        </a>
                    </li>
                    ";
        }
        // line 63
        echo "                </ul>
            </div>
            <div class=\"footer_info grid_item\">

                ";
        // line 67
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:PaymentSystemInDown", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "

                ";
        // line 69
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:deliveryCompaniesInDown", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "
            </div>
        </div>
        ";
        // line 72
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment", array()) == "prod")) {
            // line 73
            echo "            ";
            $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
            // line 74
            echo "            ";
            echo $this->getAttribute((isset($context["mixMarketList"]) ? $context["mixMarketList"] : $this->getContext($context, "mixMarketList")), "main", array(), "array");
            echo "
            ";
            // line 75
            $context["metrics"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "metrics"), "method");
            // line 76
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["metrics"]) ? $context["metrics"] : $this->getContext($context, "metrics")));
            foreach ($context['_seq'] as $context["_key"] => $context["metric"]) {
                // line 77
                echo "                ";
                ob_start();
                // line 78
                echo "                ";
                echo $context["metric"];
                echo "
                ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 80
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['metric'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 81
            echo "            
            ";
            // line 82
            $context["otherScripts"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "other-scripts"), "method");
            // line 83
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["otherScripts"]) ? $context["otherScripts"] : $this->getContext($context, "otherScripts")));
            foreach ($context['_seq'] as $context["_key"] => $context["other"]) {
                // line 84
                echo "                ";
                ob_start();
                // line 85
                echo "                    ";
                echo $context["other"];
                echo "
                ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 87
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['other'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "        ";
        }
        // line 89
        echo "        ";
        if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
            echo "<!--noindex-->";
        }
        // line 90
        echo "        <div class=\"footer_copyright\">&copy; ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
        echo " Olikids. <a ";
        if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
            echo "rel=\"nofollow\" ";
        }
        echo "href=\"";
        echo $this->env->getExtension('routing')->getPath("core_common_privacy_policies");
        echo "\">Политика конфиденциальности</a></div>
        ";
        // line 91
        if ((isset($context["noIndex"]) ? $context["noIndex"] : $this->getContext($context, "noIndex"))) {
            echo "<!--/noindex-->";
        }
        // line 92
        echo "        <script>
            console.log(google_tag_params);
        </script>
    </div>
</footer>";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 92,  242 => 91,  231 => 90,  226 => 89,  223 => 88,  217 => 87,  211 => 85,  208 => 84,  203 => 83,  201 => 82,  198 => 81,  192 => 80,  186 => 78,  183 => 77,  178 => 76,  176 => 75,  171 => 74,  168 => 73,  166 => 72,  160 => 69,  155 => 67,  149 => 63,  141 => 57,  139 => 56,  126 => 45,  122 => 44,  116 => 41,  106 => 38,  96 => 35,  86 => 32,  82 => 30,  78 => 29,  75 => 28,  73 => 25,  67 => 24,  59 => 21,  56 => 20,  53 => 19,  49 => 18,  45 => 16,  42 => 15,  40 => 14,  33 => 10,  27 => 7,  21 => 3,  19 => 2,);
    }
}
