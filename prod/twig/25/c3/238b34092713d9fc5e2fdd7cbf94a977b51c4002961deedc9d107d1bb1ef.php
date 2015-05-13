<?php

/* CoreTroubleTicketBundle:TroubleTicket:form.html.twig */
class __TwigTemplate_25c3238b34092713d9fc5e2fdd7cbf94a977b51c4002961deedc9d107d1bb1ef extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "CoreCommonBundle:Form:row.html.twig"));
        // line 2
        echo "<div class=\"contacts_form brown_gradient_box auto_size\">
    <form action=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method")), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo " method=\"POST\">

        ";
        // line 5
        if ((isset($context["order"]) ? $context["order"] : null)) {
            // line 6
            echo "
            <h3>Вопрос сзвязанный с <a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_order", array("id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()))), "html", null, true);
            echo "\">заказом №";
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
            echo "</a></h3>
            ";
            // line 8
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "order", array()), 'widget', array("value" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())));
            echo "
            <br>

        ";
        }
        // line 12
        echo "
        ";
        // line 13
        if ((isset($context["product"]) ? $context["product"] : null)) {
            // line 14
            echo "
            <h3>Вопрос сзвязанный с товаром: \"<a href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</a>\"</h3>
            ";
            // line 16
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "product", array()), 'widget', array("value" => $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "id", array())));
            echo "
            <br>

        ";
        }
        // line 20
        echo "
        <fieldset class=\"form_fieldset\">
            ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "authorName", array()), 'row');
        echo "
            ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "authorEmail", array()), 'row');
        echo "
        </fieldset>
        <fieldset class=\"form_fieldset\">
            ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category", array()), 'row');
        echo "
            ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'row');
        echo "
            ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'row');
        echo "
        </fieldset>
        ";
        // line 30
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "captcha", array(), "any", true, true)) {
            // line 31
            echo "            <fieldset class=\"form_fieldset\">
                ";
            // line 32
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "captcha", array()), 'row');
            echo "
            </fieldset>
        ";
        }
        // line 35
        echo "        ";
        // line 41
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
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
