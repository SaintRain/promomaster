<?php

/* CorePropertyBundle:Admin:edit.html.twig */
class __TwigTemplate_8eb0b191ac4658cc947f63da4489dedc324ad923a68382c52c395e31c565614c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'form' => array($this, 'block_form'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:base_edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
<style>
        .sonata-bc .table {
            width: auto;
        }
    </style>
";
    }

    // line 10
    public function block_javascripts($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script type=\"text/javascript\">
    var formEditOptios = {
        oldEditType: \"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array()), "editType", array()), "html", null, true);
        echo "\",
      uniqid: \"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "html", null, true);
        echo "\"
    };
    adminRoutes['admin_core_faq_article_article'] = \"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("admin_core_faq_article_article");
        echo "\";
    </script>
    <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreproperty/js/edit_form.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    // line 21
    public function block_form($context, array $blocks = array())
    {
        // line 22
        echo "    ";
        echo $this->env->getExtension('language_switcher_extension')->languageSwitcher();
        echo "
    ";
        // line 23
        $this->displayBlock("parentForm", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Admin:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 23,  86 => 22,  83 => 21,  77 => 19,  72 => 17,  67 => 15,  63 => 14,  56 => 11,  53 => 10,  41 => 3,  38 => 2,  11 => 1,);
    }
}
