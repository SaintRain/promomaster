<?php

/* FOSUserBundle:Resetting:reset.html.twig */
class __TwigTemplate_7921c09500e076550226d6adf5259f8da93a374b66eebb1883aa90d4c38adafe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        echo "Изменение пароля";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Изменение пароля, вспомнить пароль";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Изменение пароля пользователя.";
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
        $this->env->loadTemplate("ApplicationSonataUserBundle:Resetting:reset_content.html.twig")->display($context);
        // line 27
        echo "            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:reset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 27,  90 => 26,  87 => 25,  81 => 22,  78 => 21,  76 => 20,  64 => 11,  60 => 9,  57 => 8,  51 => 6,  45 => 5,  39 => 4,  11 => 1,);
    }
}
