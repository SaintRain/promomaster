<?php

/* FOSUserBundle:Profile:show_content.html.twig */
class __TwigTemplate_413c6be7d166f5d068c2f2fb06b4438d9adc9aae172cc5e0c1c88128f4cb310a extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "profile_edit_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 2
            echo "    <div class=\"info_box cl\">
        ";
            // line 3
            echo $this->env->getExtension('translator')->trans($context["flashMessage"], array());
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 6
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "errors", array()))) {
            // line 7
            echo "    <div class=\"attention_box cl\">
        ";
            // line 8
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
            echo "
    </div>
";
        }
        // line 11
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "CoreCommonBundle:Form:row.html.twig"));
        // line 12
        echo "<form class=\"auto_size\" action=\"";
        echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo " method=\"POST\">
    <div class=\"";
        // line 13
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array(), "any", true, true)) {
            echo "form_group ";
        }
        echo "simple\">
        <fieldset class=\"form_fieldset\">
            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "lastname", array()), 'row');
        echo "
            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "firstname", array()), 'row');
        echo "
        </fieldset>
        <fieldset class=\"form_fieldset\">
            ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone", array()), 'row');
        echo "
            ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'row');
        echo "
        </fieldset>
        <fieldset class=\"form_fieldset\">
            ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "notation", array()), 'row');
        echo "
            ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "isRssNews", array()), 'row');
        echo "
        </fieldset>
    </div>
    ";
        // line 27
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array(), "any", true, true)) {
            // line 28
            echo "        <div class=\"clear\">
            <h3>Изменить пароль</h3>
        </div>
        <fieldset class=\"form_fieldset\">
            ";
            // line 32
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), 'row');
            echo "
        </fieldset>
    ";
        }
        // line 35
        echo "    <fieldset class=\"form_fieldset\">
        ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
    </fieldset>
    <div class=\"form_padding_group\">
        <button type=\"submit\" class=\"common_button big\">
            <span>Сохранить изменения</span>
        </button>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Profile:show_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 36,  106 => 35,  100 => 32,  94 => 28,  92 => 27,  86 => 24,  82 => 23,  76 => 20,  72 => 19,  66 => 16,  62 => 15,  55 => 13,  48 => 12,  46 => 11,  40 => 8,  37 => 7,  35 => 6,  26 => 3,  23 => 2,  19 => 1,);
    }
}
