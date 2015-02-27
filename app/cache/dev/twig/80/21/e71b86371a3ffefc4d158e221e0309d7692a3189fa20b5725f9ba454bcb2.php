<?php

/* CoreTroubleTicketBundle:TroubleTicket:form.html.twig */
class __TwigTemplate_8021e71b86371a3ffefc4d158e221e0309d7692a3189fa20b5725f9ba454bcb2 extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "CoreCommonBundle:Form:row.html.twig"));
        // line 2
        echo "<div class=\"contacts_form brown_gradient_box auto_size\">
    <form action=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method")), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " method=\"POST\">

        ";
        // line 5
        if ((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order"))) {
            // line 6
            echo "
            <h3>Вопрос сзвязанный с <a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_order", array("id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()))), "html", null, true);
            echo "\">заказом №";
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
            echo "</a></h3>
            ";
            // line 8
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "order", array()), 'widget', array("value" => $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())));
            echo "
            <br>

        ";
        }
        // line 12
        echo "
        ";
        // line 13
        if ((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product"))) {
            // line 14
            echo "
            <h3>Вопрос сзвязанный с товаром: \"<a href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</a>\"</h3>
            ";
            // line 16
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "product", array()), 'widget', array("value" => $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id", array())));
            echo "
            <br>

        ";
        }
        // line 20
        echo "
        <fieldset class=\"form_fieldset\">
            ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "authorName", array()), 'row');
        echo "
            ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "authorEmail", array()), 'row');
        echo "
        </fieldset>
        <fieldset class=\"form_fieldset\">
            ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "category", array()), 'row');
        echo "
            ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "title", array()), 'row');
        echo "
            ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "body", array()), 'row');
        echo "
        </fieldset>
        ";
        // line 30
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "captcha", array(), "any", true, true)) {
            // line 31
            echo "            <fieldset class=\"form_fieldset\">
                ";
            // line 32
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "captcha", array()), 'row');
            echo "
            </fieldset>
        ";
        }
        // line 35
        echo "        ";
        // line 41
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        <div class=\"form_padding_group\">
            <button type=\"submit\" class=\"common_button big\">
                <span>Отправить</span>
            </button>
        </div>
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:TroubleTicket:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 41,  108 => 35,  102 => 32,  99 => 31,  97 => 30,  92 => 28,  88 => 27,  84 => 26,  78 => 23,  74 => 22,  70 => 20,  63 => 16,  57 => 15,  54 => 14,  52 => 13,  49 => 12,  42 => 8,  36 => 7,  33 => 6,  31 => 5,  24 => 3,  21 => 2,  19 => 1,);
    }
}
