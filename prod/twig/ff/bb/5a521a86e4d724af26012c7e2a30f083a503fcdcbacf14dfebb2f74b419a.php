<?php

/* SonataUserBundle:Profile:action.html.twig */
class __TwigTemplate_ffbb5a521a86e4d724af26012c7e2a30f083a503fcdcbacf14dfebb2f74b419a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sonata_page_breadcrumb' => array($this, 'block_sonata_page_breadcrumb'),
            'sonata_profile_title' => array($this, 'block_sonata_profile_title'),
            'sonata_profile_menu' => array($this, 'block_sonata_profile_menu'),
            'sonata_profile_content' => array($this, 'block_sonata_profile_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('sonata_page_breadcrumb', $context, $blocks);
        // line 20
        echo "
<h2>";
        // line 21
        $this->displayBlock('sonata_profile_title', $context, $blocks);
        echo "</h2>

<div class=\"sonata-user-show row row-fluid\">

    <div class=\"span2 col-lg-2\" style=\"padding: 8px 0;\">
        ";
        // line 26
        $this->displayBlock('sonata_profile_menu', $context, $blocks);
        // line 29
        echo "    </div>

    <div class=\"span10 col-lg-10\">
        ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "fos_user_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 33
            echo "            <div class=\"alert alert-success\">
                ";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["message"], array(), "FOSUserBundle"), "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "sonata_user_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 38
            echo "            <div class=\"alert alert-success\">
                ";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["message"], array(), "SonataUserBundle"), "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "
        ";
        // line 43
        $this->displayBlock('sonata_profile_content', $context, $blocks);
        // line 45
        echo "    </div>

</div>
";
    }

    // line 12
    public function block_sonata_page_breadcrumb($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        if ( !array_key_exists("breadcrumb_context", $context)) {
            // line 14
            echo "        ";
            $context["breadcrumb_context"] = "user_index";
            // line 15
            echo "    ";
        }
        // line 16
        echo "    <div class=\"row-fluid clearfix\">
        ";
        // line 17
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("breadcrumb", array("context" => (isset($context["breadcrumb_context"]) ? $context["breadcrumb_context"] : null), "current_uri" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "requestUri", array()))));
        echo "
    </div>
";
    }

    // line 21
    public function block_sonata_profile_title($context, array $blocks = array())
    {
        echo $this->env->getExtension('translator')->getTranslator()->trans("sonata_profile_title", array(), "SonataUserBundle");
    }

    // line 26
    public function block_sonata_profile_menu($context, array $blocks = array())
    {
        // line 27
        echo "            ";
        echo call_user_func_array($this->env->getFunction('sonata_block_render')->getCallable(), array(array("type" => "sonata.user.block.menu"), array("current_uri" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "requestUri", array()))));
        echo "
        ";
    }

    // line 43
    public function block_sonata_profile_content($context, array $blocks = array())
    {
        // line 44
        echo "        ";
    }

    public function getTemplateName()
    {
        return "SonataUserBundle:Profile:action.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 44,  129 => 43,  122 => 27,  119 => 26,  113 => 21,  106 => 17,  103 => 16,  100 => 15,  97 => 14,  94 => 13,  91 => 12,  84 => 45,  82 => 43,  79 => 42,  70 => 39,  67 => 38,  62 => 37,  53 => 34,  50 => 33,  46 => 32,  41 => 29,  39 => 26,  31 => 21,  28 => 20,  26 => 12,  23 => 11,);
    }
}
