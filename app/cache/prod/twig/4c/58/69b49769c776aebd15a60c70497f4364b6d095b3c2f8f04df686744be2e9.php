<?php

/* CoreTroubleTicketBundle:TroubleTicket:msg_edit.html.twig */
class __TwigTemplate_4c5869b49769c776aebd15a60c70497f4364b6d095b3c2f8f04df686744be2e9 extends Twig_Template
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
        // line 5
        echo "<h3>Уважаемый(ая) ";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array())) ? ($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array())) : ($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorEmail", array()))), "html", null, true);
        echo "!</h3>
<p>В интернет магазине olikids.ru на Ваше сообщение №";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "id", array()), "html", null, true);
        echo " пришел ответ.</p>
<p>Прочитать ответ, а также посмотреть всю историю сообщений Вы можете по данной ссылке:</p>
<a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["ticketLink"]) ? $context["ticketLink"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["ticketLink"]) ? $context["ticketLink"] : null), "html", null, true);
        echo "</a>

<p>Если в течение 14 дней Вы не ответите на сообщение, то вопрос считается автоматически закрытым.</p>
<p>Помимо этого, Вы сможете возобновить вопрос, обратившись в техподдержку.</p>

<p>Просим вас не отвечать на это уведомление: оно выслано автоматически.</p>


<p>-- <br />С вопросами и предложениями обращайтесь через форму <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["contactsLink"]) ? $context["contactsLink"] : null), "html", null, true);
        echo "\">обратной связи</a></p>

<p>С уважением и наилучшими пожеланиями,</p>
<p>команда ";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "</p>
";
        // line 20
        $context["phonesKeys"] = array("rostov" => "phones.simple.rostov", "msk" => "phones.simple.msk", "spb" => "phones.simple.spb");
        // line 21
        $context["phones"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "phones"), "method");
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["phones"]) ? $context["phones"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["phone"]) {
            // line 23
            echo "    <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["phonesKeys"]) ? $context["phonesKeys"] : null), $context["key"], array(), "array")), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $context["phone"], "html", null, true);
            echo "</p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['phone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "<p>";
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:TroubleTicket:msg_edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 25,  60 => 23,  56 => 22,  54 => 21,  52 => 20,  48 => 19,  42 => 16,  29 => 8,  24 => 6,  19 => 5,);
    }
}
