<?php

/* SonataAdminBundle:CRUD:batch_confirmation.html.twig */
class __TwigTemplate_52850e8ec3f515e1a9560aa44a23be797ffbfa5d8126e1c339ff49294a5444fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'actions' => array($this, 'block_actions'),
            'side_menu' => array($this, 'block_side_menu'),
            'content' => array($this, 'block_content'),
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
    public function block_actions($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"sonata-actions btn-group\">
        ";
        // line 16
        $this->env->loadTemplate("SonataAdminBundle:Button:list_button.html.twig")->display($context);
        // line 17
        echo "        ";
        $this->env->loadTemplate("SonataAdminBundle:Button:create_button.html.twig")->display($context);
        // line 18
        echo "    </div>
";
    }

    // line 21
    public function block_side_menu($context, array $blocks = array())
    {
        echo $this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "sidemenu", array(0 => (isset($context["action"]) ? $context["action"] : null)), "method"), array("currentClass" => "active"), "list");
    }

    // line 23
    public function block_content($context, array $blocks = array())
    {
        // line 24
        echo "    <div class=\"sonata-ba-delete\">
        <h1>";
        // line 25
        echo $this->env->getExtension('translator')->getTranslator()->trans("title_batch_confirmation", array("%action%" => (isset($context["action_label"]) ? $context["action_label"] : null)), "SonataAdminBundle");
        echo "</h1>

        ";
        // line 27
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "all_elements", array())) {
            // line 28
            echo "            ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("message_batch_all_confirmation", array(), "SonataAdminBundle"), "html", null, true);
            echo "
        ";
        } else {
            // line 30
            echo "            ";
            echo $this->env->getExtension('translator')->getTranslator()->transChoice("message_batch_confirmation", twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "idx", array())), array("%count%" => twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "idx", array()))), "SonataAdminBundle");
            // line 31
            echo "        ";
        }
        // line 32
        echo "
        <div class=\"well well-small form-actions\">
            <form action=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => "batch", 1 => array("filter" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "filterParameters", array()))), "method"), "html", null, true);
        echo "\" method=\"POST\" >
                <input type=\"hidden\" name=\"confirmation\" value=\"ok\">
                <input type=\"hidden\" name=\"data\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["data"]) ? $context["data"] : null)), "html", null, true);
        echo "\">
                <input type=\"hidden\" name=\"_sonata_csrf_token\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\">

                <div style=\"display: none\">
                    ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                </div>

                <button type=\"submit\" class=\"btn btn-danger\">";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_execute_batch_action", array(), "SonataAdminBundle"), "html", null, true);
        echo "</button>

                ";
        // line 45
        if (($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasRoute", array(0 => "list"), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "LIST"), "method"))) {
            // line 46
            echo "                    ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delete_or", array(), "SonataAdminBundle"), "html", null, true);
            echo "

                    <a class=\"btn btn-success\" href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => "list"), "method"), "html", null, true);
            echo "\">
                        <i class=\"icon-th-list icon-white\"></i> ";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_action_list", array(), "SonataAdminBundle"), "html", null, true);
            echo "
                    </a>
                ";
        }
        // line 52
        echo "            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:batch_confirmation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 52,  117 => 49,  113 => 48,  107 => 46,  105 => 45,  100 => 43,  94 => 40,  88 => 37,  84 => 36,  79 => 34,  75 => 32,  72 => 31,  69 => 30,  63 => 28,  61 => 27,  56 => 25,  53 => 24,  50 => 23,  44 => 21,  39 => 18,  36 => 17,  34 => 16,  31 => 15,  28 => 14,);
    }
}
