<?php

/* CoreProductBundle:Admin/Form:edit.html.twig */
class __TwigTemplate_b24cb7f7214b8cfc3a314c327e54d6301e5c03273ccd612085e5d77d63b0834e extends Twig_Template
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
        return array (  154 => 51,  149 => 50,  146 => 49,  135 => 43,  129 => 41,  126 => 40,  119 => 35,  111 => 32,  108 => 31,  105 => 30,  97 => 27,  94 => 26,  92 => 25,  88 => 23,  86 => 22,  81 => 21,  74 => 17,  69 => 14,  66 => 13,  63 => 12,  57 => 8,  53 => 7,  48 => 5,  42 => 3,  39 => 2,  11 => 1,);
    }
}
