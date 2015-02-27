<?php

/* SonataAdminBundle:Core:dashboard.html.twig */
class __TwigTemplate_395387825b048a9cfa8f37d2d8ac14ac683b79dbf71b012af4e23161637754a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
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
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title_dashboard", array(), "SonataAdminBundle"), "html", null, true);
    }

    // line 15
    public function block_breadcrumb($context, array $blocks = array())
    {
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "
    ";
        // line 18
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.dashboard.top", array("admin_pool" => (isset($context["admin_pool"]) ? $context["admin_pool"] : null))));
        echo "

    <div class=\"row-fluid\">
        ";
        // line 21
        $context["has_center"] = false;
        // line 22
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["blocks"]) ? $context["blocks"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 23
            echo "            ";
            if (($this->getAttribute($context["block"], "position", array()) == "center")) {
                // line 24
                echo "                ";
                $context["has_center"] = true;
                // line 25
                echo "            ";
            }
            // line 26
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "
        <div class=\"";
        // line 28
        if ((isset($context["has_center"]) ? $context["has_center"] : null)) {
            echo "span3";
        } else {
            echo "span6";
        }
        echo "\">
            ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["blocks"]) ? $context["blocks"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 30
            echo "                ";
            if (($this->getAttribute($context["block"], "position", array()) == "left")) {
                // line 31
                echo "                    ";
                echo call_user_func_array($this->env->getFunction('sonata_block_render')->getCallable(), array(array("type" => $this->getAttribute($context["block"], "type", array()), "settings" => $this->getAttribute($context["block"], "settings", array()))));
                echo "
                ";
            }
            // line 33
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "        </div>

        ";
        // line 36
        if ((isset($context["has_center"]) ? $context["has_center"] : null)) {
            // line 37
            echo "            <div class=\"span4\">
                ";
            // line 38
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["blocks"]) ? $context["blocks"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
                // line 39
                echo "                    ";
                if (($this->getAttribute($context["block"], "position", array()) == "center")) {
                    // line 40
                    echo "                        ";
                    echo call_user_func_array($this->env->getFunction('sonata_block_render')->getCallable(), array(array("type" => $this->getAttribute($context["block"], "type", array()), "settings" => $this->getAttribute($context["block"], "settings", array()))));
                    echo "
                    ";
                }
                // line 42
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "            </div>
        ";
        }
        // line 45
        echo "
        <div class=\"";
        // line 46
        if ((isset($context["has_center"]) ? $context["has_center"] : null)) {
            echo "span4";
        } else {
            echo "span6";
        }
        echo "\">
            ";
        // line 47
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["blocks"]) ? $context["blocks"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 48
            echo "                ";
            if (($this->getAttribute($context["block"], "position", array()) == "right")) {
                // line 49
                echo "                    ";
                echo call_user_func_array($this->env->getFunction('sonata_block_render')->getCallable(), array(array("type" => $this->getAttribute($context["block"], "type", array()), "settings" => $this->getAttribute($context["block"], "settings", array()))));
                echo "
                ";
            }
            // line 51
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "        </div>
    </div>

    ";
        // line 55
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.dashboard.bottom", array("admin_pool" => (isset($context["admin_pool"]) ? $context["admin_pool"] : null))));
        echo "

";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Core:dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 55,  165 => 52,  159 => 51,  153 => 49,  150 => 48,  146 => 47,  138 => 46,  135 => 45,  131 => 43,  125 => 42,  119 => 40,  116 => 39,  112 => 38,  109 => 37,  107 => 36,  103 => 34,  97 => 33,  91 => 31,  88 => 30,  84 => 29,  76 => 28,  73 => 27,  67 => 26,  64 => 25,  61 => 24,  58 => 23,  53 => 22,  51 => 21,  45 => 18,  42 => 17,  39 => 16,  34 => 15,  28 => 14,);
    }
}
