<?php

/* CoreDeliveryBundle:Delivery:notification.html.twig */
class __TwigTemplate_53397f2b0a7b0f78890b40bdc0d067cb861d9a7b0ac36f83c2fc3be49b478c6b extends Twig_Template
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
        echo "<h4>Уважаемый(ая) ";
        echo twig_escape_filter($this->env, (isset($context["userFio"]) ? $context["userFio"] : $this->getContext($context, "userFio")), "html", null, true);
        echo "</h4>
";
        // line 2
        ob_start();
        // line 3
        echo "    <h3>
        ";
        // line 4
        if ((twig_length_filter($this->env, (isset($context["waybills"]) ? $context["waybills"] : $this->getContext($context, "waybills"))) > 1)) {
            // line 5
            echo "            Для вас были созданы отправления со следующими номерами:
            ";
            // line 6
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["waybills"]) ? $context["waybills"] : $this->getContext($context, "waybills")));
            foreach ($context['_seq'] as $context["_key"] => $context["waybill"]) {
                // line 7
                echo "                &dash;&nbsp; &numero;";
                echo twig_escape_filter($this->env, $this->getAttribute($context["waybill"], "number", array()), "html", null, true);
                echo "<br />
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['waybill'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 9
            echo "            ";
        } else {
            // line 10
            echo "                ";
            $context["waybill"] = twig_first($this->env, (isset($context["waybills"]) ? $context["waybills"] : $this->getContext($context, "waybills")));
            // line 11
            echo "                Для вас было создано отправление &numero; ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["waybill"]) ? $context["waybill"] : $this->getContext($context, "waybill")), "number", array()), "html", null, true);
            echo "
        ";
        }
        // line 13
        echo "        
    </h3>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 16
        $context["curLocale"] = (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())) ? ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())) : ("ru"));
        // line 17
        echo "<p>Вы можете остледить статус отправления по адресу <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deliveryCompany"]) ? $context["deliveryCompany"] : $this->getContext($context, "deliveryCompany")), "calculator", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deliveryCompany"]) ? $context["deliveryCompany"] : $this->getContext($context, "deliveryCompany")), ("caption" . (isset($context["curLocale"]) ? $context["curLocale"] : $this->getContext($context, "curLocale")))), "html", null, true);
        echo "</a><p>

<p>-- <br />С вопросами и предложениями обращайтесь через форму <a href=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["contacstUrl"]) ? $context["contacstUrl"] : $this->getContext($context, "contacstUrl")), "html", null, true);
        echo "\">обратной связи</a></p>

<p>С уважением и наилучшими пожеланиями,</p>
<p>команда olikids.ru</p>
<p>olikids.ru - игрушки и игры</p>
";
        // line 24
        $context["phonesKeys"] = array("rostov" => "phones.simple.rostov", "msk" => "phones.simple.msk", "spb" => "phones.simple.spb");
        // line 25
        $context["phones"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "phones"), "method");
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["phones"]) ? $context["phones"] : $this->getContext($context, "phones")));
        foreach ($context['_seq'] as $context["key"] => $context["phone"]) {
            // line 27
            echo "    <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["phonesKeys"]) ? $context["phonesKeys"] : $this->getContext($context, "phonesKeys")), $context["key"], array(), "array")), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $context["phone"], "html", null, true);
            echo "</p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['phone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "<p><a href=\"";
        echo twig_escape_filter($this->env, (isset($context["siteUrl"]) ? $context["siteUrl"] : $this->getContext($context, "siteUrl")), "html", null, true);
        echo "\">olikids.ru</a></p>
";
    }

    public function getTemplateName()
    {
        return "CoreDeliveryBundle:Delivery:notification.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 29,  90 => 27,  86 => 26,  84 => 25,  82 => 24,  74 => 19,  66 => 17,  64 => 16,  59 => 13,  53 => 11,  50 => 10,  47 => 9,  38 => 7,  34 => 6,  31 => 5,  29 => 4,  26 => 3,  24 => 2,  19 => 1,);
    }
}
