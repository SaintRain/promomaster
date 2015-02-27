<?php

/* FOSUserBundle:Resetting:request.html.twig */
class __TwigTemplate_c469ffd6adcfe7c53cfff7c6d6f3a4a27fe7ab52be6c83d99f7f54cfa05d84c7 extends Twig_Template
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
        echo "Восстановление пароля";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Восстановление пароля, интернет-магазин";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Восстановление утерянного пароля на сайте Оликидс.ру";
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
                    <strong>Восстановление пароля</strong>
                </li>
        </ul>
    </div>
    <div role=\"main\" class=\"login_page\" id=\"content\">
        <div class=\"page_pad\">
            <h1>Восстановление пароля</h1>
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
        $this->env->loadTemplate("FOSUserBundle:Resetting:request_content.html.twig")->display($context);
        // line 27
        echo "            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:request.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 27,  82 => 26,  79 => 25,  73 => 22,  70 => 21,  68 => 20,  56 => 11,  52 => 9,  49 => 8,  43 => 6,  37 => 5,  31 => 4,);
    }
}
