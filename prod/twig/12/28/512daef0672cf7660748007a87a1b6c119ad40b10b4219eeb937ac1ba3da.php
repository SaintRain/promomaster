<?php

/* FOSUserBundle:Resetting:passwordAlreadyRequested.html.twig */
class __TwigTemplate_1228512daef0672cf7660748007a87a1b6c119ad40b10b4219eeb937ac1ba3da extends Twig_Template
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
            <h1>Пароль для данного пользователя уже запрашивался за последние 24 часа.</h1>
        </div>

        ";
        // line 32
        $this->env->loadTemplate("FOSUserBundle:Resetting:request_content.html.twig")->display($context);
        // line 33
        echo "        <!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->

";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:passwordAlreadyRequested.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 33,  85 => 32,  64 => 14,  57 => 9,  54 => 8,  49 => 6,  44 => 5,  39 => 4,  11 => 1,);
    }
}