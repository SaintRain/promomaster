<?php

/* FOSUserBundle:Resetting:checkEmail.html.twig */
class __TwigTemplate_dd9710c81e335bcffaefd559bd04ab8ef0f050f143d1b73d96aeea71311129ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout2.html.twig");
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
        return "CoreCommonBundle::main_layout2.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "    <!--=== Breadcrumbs ===-->
    <div class=\"breadcrumbs\">
        <div class=\"container\">
            <h1 class=\"pull-left\">Восстановление пароля</h1>
            <ul class=\"pull-right breadcrumb\">
                <li><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">На главную</a></li>
                <li class=\"active\">Восстановление пароля</li>
            </ul>
        </div>
        <!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->


    <!--=== Content Part ===-->
    <div class=\"container content\">

        <div class=\"alert alert-warning fade in\">
            <h1>";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.check_email", array("%email%" => (isset($context["email"]) ? $context["email"] : null)), "FOSUserBundle"), "html", null, true);
        echo "</h1>
        </div>


        ";
        // line 31
        $this->env->loadTemplate("FOSUserBundle:Resetting:request_content.html.twig")->display($context);
        // line 32
        echo "        <!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->

";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:checkEmail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 32,  87 => 31,  80 => 27,  64 => 14,  57 => 9,  54 => 8,  49 => 6,  44 => 5,  39 => 4,  11 => 1,);
    }
}
