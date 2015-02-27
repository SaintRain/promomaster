<?php

/* ApplicationSonataUserBundle:Security:login_for_order.html.twig */
class __TwigTemplate_c319bb7d8d95c94c39a67bc9df6c49e503a2b240d95e5507c87cdf5f508e0de9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Установка пароля";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Указать пароль";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Указать пароль на сайте Оликидс.ру";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "<div id=\"page_path\">
        <ul class=\"page_path_links\">
                <li class=\"page_path_link\"><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a></li>
                <li class=\"page_path_link\">
                    <strong>Установка пароля</strong>
                </li>
        </ul>
    </div>
    <div role=\"main\" class=\"login_page\" id=\"content\">
        <div class=\"page_pad\">
            <h1>Установка пароля</h1>
            ";
        // line 20
        if (array_key_exists("invalid_username", $context)) {
            // line 21
            echo "                <div class=\"attention_box\">
                    ";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.invalid_username", array("%username%" => (isset($context["invalid_username"]) ? $context["invalid_username"] : $this->getContext($context, "invalid_username"))), "FOSUserBundle"), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 25
        echo "            <div class=\"box brown_gradient_box\">
                ";
        // line 26
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "CoreCommonBundle:Form:row.html.twig"));
        // line 27
        echo "                <form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_login_for_order", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "orderId" => (isset($context["orderId"]) ? $context["orderId"] : $this->getContext($context, "orderId")))), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " method=\"POST\" class=\"auto_size\">
                    <fieldset class=\"form_fieldset\">
                        ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "new", array()), "first", array()), 'row', array("attr" => array("class" => "text_input", "size" => 40)));
        echo "
                        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "new", array()), "second", array()), 'row', array("attr" => array("class" => "text_input", "size" => 40)));
        echo "
                        ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                    </fieldset>
                    <div class=\"form_row form_padding_group\">
                        <button type=\"submit\" class=\"common_button big\">
                            <span>";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.reset.submitSet", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>
                        </button> или
                        <a href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">Отменить</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Security:login_for_order.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 37,  107 => 35,  100 => 31,  96 => 30,  92 => 29,  84 => 27,  82 => 26,  79 => 25,  73 => 22,  70 => 21,  68 => 20,  56 => 11,  52 => 9,  49 => 8,  43 => 6,  37 => 5,  31 => 4,);
    }
}
