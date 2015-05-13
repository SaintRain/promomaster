<?php

/* CorePropertyBundle:Filter/EditType:input_text.html.twig */
class __TwigTemplate_cfebdee54c9279c23e14674f972bb7f452595f5db4549b5238875b5652a159cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'input_text' => array($this, 'block_input_text'),
            'rowElement' => array($this, 'block_rowElement'),
            'formElement' => array($this, 'block_formElement'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('input_text', $context, $blocks);
    }

    public function block_input_text($context, array $blocks = array())
    {
        // line 10
        echo "
    ";
        // line 11
        $context["formElementClass"] = "";
        // line 12
        echo "
    ";
        // line 13
        if (($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()) == "input_text")) {
            // line 14
            echo "
        <div class=\"filter_cats filter_group edit-type-input_text\">
            <h3>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "caption", array()), "html", null, true);
            echo "</h3>

                ";
            // line 18
            $this->displayBlock('rowElement', $context, $blocks);
            // line 40
            echo "
             </div>

    ";
        }
        // line 44
        echo "
";
    }

    // line 18
    public function block_rowElement($context, array $blocks = array())
    {
        // line 19
        echo "
                    <label for=\"filter_";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), "html", null, true);
        echo "\">

                        ";
        // line 22
        $this->displayBlock('formElement', $context, $blocks);
        // line 36
        echo "
                    </label>

                ";
    }

    // line 22
    public function block_formElement($context, array $blocks = array())
    {
        // line 23
        echo "
                            <input
                                type=\"text\" id=\"filter_";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), "html", null, true);
        echo "\" class=\"text_input w92 ";
        echo twig_escape_filter($this->env, (isset($context["formElementClass"]) ? $context["formElementClass"] : null), "html", null, true);
        echo "\"
                                name=\"filter";
        // line 26
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true)) {
            echo "[";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), "html", null, true);
            echo "][";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), "html", null, true);
            echo "]";
        }
        echo "[";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), "html", null, true);
        echo "]\"
                                value=\"";
        // line 27
        ob_start();
        // line 28
        echo "                                    ";
        if ($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", true, true)) {
            // line 29
            echo "                                        ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array"), "html", null, true);
            echo "
                                    ";
        } elseif (($this->getAttribute(        // line 30
(isset($context["this"]) ? $context["this"] : null), "is", array(), "any", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), array(), "array", false, true), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array", true, true))) {
            // line 31
            echo "                                        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "is", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "type", array()), array(), "array"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "name", array()), array(), "array"), "html", null, true);
            echo "
                                    ";
        }
        // line 33
        echo "                                    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        echo "\">

                        ";
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Filter/EditType:input_text.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  129 => 33,  123 => 31,  121 => 30,  116 => 29,  113 => 28,  111 => 27,  99 => 26,  93 => 25,  89 => 23,  86 => 22,  79 => 36,  77 => 22,  72 => 20,  69 => 19,  66 => 18,  61 => 44,  55 => 40,  53 => 18,  48 => 16,  44 => 14,  42 => 13,  39 => 12,  37 => 11,  34 => 10,  28 => 9,  25 => 8,  22 => 1,);
    }
}
