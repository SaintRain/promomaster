<?php

/* FOSUserBundle:Resetting:reset_content.html.twig */
class __TwigTemplate_d3ece7272ca0b5460fcbc6d64cab2a6a9a4ee50a5a944bbf1f14e61f29353521 extends Twig_Template
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
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_resetting_reset", array("token" => (isset($context["token"]) ? $context["token"] : null))), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo " method=\"POST\" class=\"auto_size\">
    <fieldset class=\"form_fieldset\">
        ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "new", array()), "first", array()), 'row', array("attr" => array("class" => "text_input", "size" => 40)));
        echo "
        ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "new", array()), "second", array()), 'row', array("attr" => array("class" => "text_input", "size" => 40)));
        echo "
        ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
    </fieldset>
    <div class=\"form_row form_padding_group\">
        <button type=\"submit\" class=\"common_button big\">
            <span>";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.reset.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>
        </button> или
        <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">Отменить</a>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:reset_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 12,  44 => 10,  37 => 6,  33 => 5,  29 => 4,  21 => 2,  19 => 1,);
    }
}
