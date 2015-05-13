<?php

/* CoreOrderBundle:Order:on_email_admin.html.twig */
class __TwigTemplate_a454c1e5b3f59b4d8181eca4e769e32c9551bc24e92f7913891e31456184186a extends Twig_Template
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
        // line 7
        ob_start();
        // line 8
        echo "
    Создан новый заказ <a href=\"http://";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()))), "html", null, true);
        echo "\">№";
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
        echo "</a> (";
        echo twig_escape_filter($this->env, (isset($context["createdDateTime"]) ? $context["createdDateTime"] : null), "html", null, true);
        echo ")<br>
    на сумму ";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_cost_all", array(), "array")), "html", null, true);
        echo "&nbsp;";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "<br>

    ";
        // line 12
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "payments", array()), "count", array())) {
            // line 13
            echo "
        Оплата: ";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "payments", array()), "first", array()), "system", array()), "captionRu", array()), "html", null, true);
            echo "<br>

    ";
        }
        // line 17
        echo "
    ";
        // line 18
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array())) {
            // line 19
            echo "
        Доставка: ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array()), "captionRu", array()), "html", null, true);
            echo "<br>
        Адрес Доставки: ";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array()), "name", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryAddress", array()), "html", null, true);
            echo "<br>
    ";
        }
        // line 23
        echo "        Пользователь: ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "user", array()), "lastname", array()) || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "user", array()), "firstname", array()))) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "user", array()), "lastname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "user", array()), "firstname", array()), "html", null, true);
            echo ", ";
        }
        echo " ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "user", array()), "phone", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "user", array()), "phone", array()), "html", null, true);
            echo ", ";
        }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "user", array()), "email", array()), "html", null, true);
        echo "<br>
        Плательщик: ";
        // line 24
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "organization", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "organization", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "contactFio", array()), "html", null, true);
        }
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "phone1", array()), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "contactEmail", array()), "html", null, true);
        echo "<br>
        ";
        // line 25
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "firstName", array(), "any", true, true)) {
            // line 26
            echo "            Получатель: ";
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientFio", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientFio", array()), "html", null, true);
                echo ", ";
            }
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientPhone", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientPhone", array()), "html", null, true);
                echo ", ";
            }
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientEmail", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientEmail", array()), "html", null, true);
            }
            echo "<br>
        ";
        }
        // line 28
        echo "        Состав заказа:
        ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "compositions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["comp"]) {
            // line 30
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "captionRu", array()), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["comp"], "quantity", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "unitOfMeasure", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "unitOfMeasure", array()), "shortCaptionRu", array()), "html", null, true);
            }
            echo "<br/>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "    <a href=\"http://";
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()))), "html", null, true);
        echo "\">ссылка на заказ в админке</a><br>

";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order:on_email_admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 32,  124 => 30,  120 => 29,  117 => 28,  101 => 26,  99 => 25,  87 => 24,  70 => 23,  63 => 21,  59 => 20,  56 => 19,  54 => 18,  51 => 17,  45 => 14,  42 => 13,  40 => 12,  33 => 10,  24 => 9,  21 => 8,  19 => 7,);
    }
}
