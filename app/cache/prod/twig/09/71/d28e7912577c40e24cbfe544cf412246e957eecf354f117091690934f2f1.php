<?php

/* SonataAdminBundle:CRUD:base_edit.html.twig */
class __TwigTemplate_0971d28e7912577c40e24cbfe544cf412246e957eecf354f117091690934f2f1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $_trait_0 = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit_form.html.twig");
        // line 79
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."ApplicationSonataAdminBundle:CRUD:base_edit_form.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        if (!isset($_trait_0_blocks["form"])) {
            throw new Twig_Error_Runtime(sprintf('Block "form" is not defined in trait "ApplicationSonataAdminBundle:CRUD:base_edit_form.html.twig".'));
        }

        $_trait_0_blocks["parentForm"] = $_trait_0_blocks["form"]; unset($_trait_0_blocks["form"]);

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'actions' => array($this, 'block_actions'),
                'formactions' => array($this, 'block_formactions'),
                'formactions_buttons' => array($this, 'block_formactions_buttons'),
                'side_menu' => array($this, 'block_side_menu'),
                'form' => array($this, 'block_form'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((isset($context["base_template"]) ? $context["base_template"] : null));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        // line 15
        echo "    ";
        if ((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method")))) {
            // line 16
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title_edit", array("%name%" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "toString", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method")), "SonataAdminBundle"), "html", null, true);
            echo "
    ";
        } else {
            // line 18
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title_create", array(), "SonataAdminBundle"), "html", null, true);
            echo "
    ";
        }
    }

    // line 22
    public function block_actions($context, array $blocks = array())
    {
        // line 23
        echo "    <div class=\"sonata-actions btn-group\">
        ";
        // line 24
        $this->env->loadTemplate("SonataAdminBundle:Button:show_button.html.twig")->display($context);
        // line 25
        echo "        ";
        // line 26
        echo "        ";
        $this->env->loadTemplate("SonataAdminBundle:Button:acl_button.html.twig")->display($context);
        // line 27
        echo "        ";
        $this->env->loadTemplate("SonataAdminBundle:Button:create_button.html.twig")->display($context);
        // line 28
        echo "        ";
        $this->env->loadTemplate("SonataAdminBundle:Button:list_button.html.twig")->display($context);
        // line 29
        echo "    </div>
";
    }

    // line 32
    public function block_formactions($context, array $blocks = array())
    {
        // line 33
        echo "    <div class=\"well well-small form-actions\">
        ";
        // line 34
        $this->displayBlock('formactions_buttons', $context, $blocks);
        // line 74
        echo "    </div>
";
    }

    // line 34
    public function block_formactions_buttons($context, array $blocks = array())
    {
        // line 35
        echo "        ";
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "isxmlhttprequest", array())) {
            // line 36
            echo "            ";
            if ((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method")))) {
                // line 37
                echo "                <input type=\"submit\" class=\"btn btn-primary\" name=\"btn_update\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_update", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">
            ";
            } else {
                // line 39
                echo "                <input type=\"submit\" class=\"btn\" name=\"btn_create\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">
            ";
            }
            // line 41
            echo "        ";
        } else {
            // line 42
            echo "            ";
            if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "supportsPreviewMode", array())) {
                // line 43
                echo "                <button class=\"btn btn-info persist-preview\" name=\"btn_preview\" type=\"submit\">
                    <i class=\"icon-eye-open\"></i>
                    ";
                // line 45
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_preview", array(), "SonataAdminBundle"), "html", null, true);
                echo "
                </button>
            ";
            }
            // line 48
            echo "            ";
            if ((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method")))) {
                // line 49
                echo "                <input title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("hot_save_title", array(), "SonataAdminBundle"), "html", null, true);
                echo "\" type=\"submit\" class=\"btn btn-primary\" name=\"btn_update_and_edit\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_update_and_edit_again", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">

                ";
                // line 51
                if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "list"), "method")) {
                    // line 52
                    echo "                    <input type=\"submit\" class=\"btn\" name=\"btn_update_and_list\" value=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_update_and_return_to_list", array(), "SonataAdminBundle"), "html", null, true);
                    echo "\">
                ";
                }
                // line 54
                echo "
                ";
                // line 55
                if (($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "delete"), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "DELETE", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
                    // line 56
                    echo "                    ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delete_or", array(), "SonataAdminBundle"), "html", null, true);
                    echo "
                    <a class=\"btn btn-danger\" href=\"";
                    // line 57
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "delete", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_delete", array(), "SonataAdminBundle"), "html", null, true);
                    echo "</a>
                ";
                }
                // line 59
                echo "
                ";
                // line 60
                if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isAclEnabled", array(), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "acl"), "method")) && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "MASTER", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
                    // line 61
                    echo "                    <a class=\"btn\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "acl", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_edit_acl", array(), "SonataAdminBundle"), "html", null, true);
                    echo "</a>
                ";
                }
                // line 63
                echo "            ";
            } else {
                // line 64
                echo "                ";
                if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "edit"), "method")) {
                    // line 65
                    echo "                    <input title=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("hot_save_title", array(), "SonataAdminBundle"), "html", null, true);
                    echo "\" class=\"btn btn-primary\" type=\"submit\" name=\"btn_create_and_edit\" value=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create_and_edit_again", array(), "SonataAdminBundle"), "html", null, true);
                    echo "\">
                ";
                }
                // line 67
                echo "                ";
                if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "list"), "method")) {
                    // line 68
                    echo "                    <input type=\"submit\" class=\"btn\" name=\"btn_create_and_list\" value=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create_and_return_to_list", array(), "SonataAdminBundle"), "html", null, true);
                    echo "\">
                ";
                }
                // line 70
                echo "                <input class=\"btn\" type=\"submit\" name=\"btn_create_and_create\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create_and_create_a_new_one", array(), "SonataAdminBundle"), "html", null, true);
                echo "\">
            ";
            }
            // line 72
            echo "        ";
        }
        // line 73
        echo "        ";
    }

    // line 77
    public function block_side_menu($context, array $blocks = array())
    {
        echo $this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "sidemenu", array(0 => (isset($context["action"]) ? $context["action"] : null)), "method"), array("currentClass" => "active"), "list");
    }

    // line 81
    public function block_form($context, array $blocks = array())
    {
        // line 82
        echo "    ";
        $this->displayBlock("parentForm", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  237 => 82,  234 => 81,  228 => 77,  224 => 73,  221 => 72,  215 => 70,  209 => 68,  206 => 67,  198 => 65,  195 => 64,  192 => 63,  184 => 61,  182 => 60,  179 => 59,  172 => 57,  167 => 56,  165 => 55,  162 => 54,  156 => 52,  154 => 51,  146 => 49,  143 => 48,  137 => 45,  133 => 43,  130 => 42,  127 => 41,  121 => 39,  115 => 37,  112 => 36,  109 => 35,  106 => 34,  101 => 74,  99 => 34,  96 => 33,  93 => 32,  88 => 29,  85 => 28,  82 => 27,  79 => 26,  77 => 25,  75 => 24,  72 => 23,  69 => 22,  61 => 18,  55 => 16,  52 => 15,  49 => 14,  12 => 79,);
    }
}
