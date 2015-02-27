<?php

/* CorePropertyBundle:Filter/EditType:hidden.html.twig */
class __TwigTemplate_f68a1a3d4b17645c982ca8d79a2cb0fe5d6f99042aacd6b7dc89b1f74a4fa192 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'hidden' => array($this, 'block_hidden'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('hidden', $context, $blocks);
    }

    public function block_hidden($context, array $blocks = array())
    {
        // line 2
        echo "
    ";
        // line 3
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "value", array(), "any", true, true)) {
            // line 4
            echo "
 <input type=\"hidden\" name=\"filter[";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), "html", null, true);
            echo "]\"
                    value=\"";
            // line 6
            ob_start();
            // line 7
            echo "                        ";
            if ($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", true, true)) {
                // line 8
                echo "                            ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array"), "html", null, true);
                echo "
                        ";
            }
            // line 10
            echo "                    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "\">
";
        }
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Filter/EditType:hidden.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  49 => 10,  43 => 8,  40 => 7,  38 => 6,  34 => 5,  31 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }
}
