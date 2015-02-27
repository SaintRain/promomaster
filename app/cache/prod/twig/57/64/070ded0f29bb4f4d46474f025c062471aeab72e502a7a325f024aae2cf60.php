<?php

/* CoreProductBundle:Admin/Form:edit.html.twig */
class __TwigTemplate_5764070ded0f29bb4f4d46474f025c062471aeab72e502a7a325f024aae2cf60 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'actions' => array($this, 'block_actions'),
            'formactions_buttons' => array($this, 'block_formactions_buttons'),
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
    public function block_javascripts($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script>
        var product_dublicate_create = \"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("product_dublicate_create");
        echo "\";
    </script>    
    <script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreproduct/Admin/js/edit.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>    
    <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreproduct/Admin/js/dublicate.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    // line 12
    public function block_actions($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "slug", array(), "any", true, true) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "slug", array()))) {
            // line 14
            echo "
        <div class=\"sonata-actions btn-group\">
            <span class=\"btn-group sonata-action-element\">
                <a  target=\"_blank\" class=\"btn sonata-action-element\" href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "slug", array()))), "html", null, true);
            echo "\"><i class=\"icon-zoom-in\"></i> Показать на сайте</a>
            </span>            
        </div>
    ";
        }
        // line 21
        echo "    ";
        $this->displayParentBlock("actions", $context, $blocks);
        echo "
    ";
        // line 22
        if ((array_key_exists("nextObject", $context) || array_key_exists("prevObject", $context))) {
            // line 23
            echo "        <div class=\"row-fluid pull-right\" id=\"prev-next\">
            <div class=\"pull-right\">
                ";
            // line 25
            if ((array_key_exists("prevObject", $context) && (isset($context["prevObject"]) ? $context["prevObject"] : null))) {
                // line 26
                echo "                    <span class=\"btn btn-link\">
                        <a title=\"Предыдущий (ctrl + &larr;)\" id=\"btn-prev\" class=\"prev-next\" href=\"";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute((isset($context["prevObject"]) ? $context["prevObject"] : null), "id", array()))), "html", null, true);
                echo "\"><i class=\"icon-step-backward\"></i>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prevObject"]) ? $context["prevObject"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "</a>
                    </span>
                ";
            }
            // line 30
            echo "                ";
            if ((array_key_exists("nextObject", $context) && (isset($context["nextObject"]) ? $context["nextObject"] : null))) {
                // line 31
                echo "                    <span class=\"btn btn-link\">
                        <a title=\"Следующий (ctrl + &rarr;)\" id=\"btn-next\" class=\"prev-next\" href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute((isset($context["nextObject"]) ? $context["nextObject"] : null), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nextObject"]) ? $context["nextObject"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "<i class=\"icon-step-forward\"></i></a>
                    </span>
                ";
            }
            // line 35
            echo "            </div>
        </div>
    ";
        }
    }

    // line 40
    public function block_formactions_buttons($context, array $blocks = array())
    {
        // line 41
        echo "    ";
        $this->displayParentBlock("formactions_buttons", $context, $blocks);
        echo "
    <span class=\"btn-group sonata-action-element\">
        <a href=\"javascript:void(0);\" data-id=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
        echo "\" data-article=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "article", array()), "html", null, true);
        echo "\" class=\"dublicateProduct btn\">
            Дублировать
        </a>
    </span>
";
    }

    // line 49
    public function block_form($context, array $blocks = array())
    {
        // line 50
        echo "  ";
        echo $this->env->getExtension('language_switcher_extension')->languageSwitcher();
        echo "
    ";
        // line 51
        $this->displayParentBlock("form", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/Form:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 51,  141 => 50,  138 => 49,  127 => 43,  121 => 41,  118 => 40,  111 => 35,  103 => 32,  100 => 31,  97 => 30,  89 => 27,  86 => 26,  84 => 25,  80 => 23,  78 => 22,  73 => 21,  66 => 17,  61 => 14,  58 => 13,  55 => 12,  49 => 8,  45 => 7,  40 => 5,  34 => 3,  31 => 2,);
    }
}
