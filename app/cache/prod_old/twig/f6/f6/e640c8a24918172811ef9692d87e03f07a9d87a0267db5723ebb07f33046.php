<?php

/* CoreCommonBundle:Form:errors.html.twig */
class __TwigTemplate_f6f6e640c8a24918172811ef9692d87e03f07a9d87a0267db5723ebb07f33046 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_errors' => array($this, 'block_form_errors'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('form_errors', $context, $blocks);
    }

    public function block_form_errors($context, array $blocks = array())
    {
        // line 2
        ob_start();
        // line 3
        echo "    ";
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
            // line 4
            echo "        ";
            if (((!$this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array())) || twig_in_filter("repeated", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "block_prefixes", array(), "array")))) {
                // line 5
                echo "            <div class=\"error\">
        ";
            }
            // line 7
            echo "                <div class=\"form_field_error_txt\">
                    ";
            // line 8
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 9
                echo "                        ";
                if ($this->getAttribute($context["loop"], "first", array())) {
                    // line 10
                    echo "                            ";
                    if ($this->getAttribute($this->getAttribute($context["error"], "messageParameters", array(), "any", false, true), "{{ limit }}", array(), "array", true, true)) {
                        // line 11
                        echo "                                ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->transchoice($this->env->getExtension('translator')->trans($this->getAttribute($context["error"], "messageTemplate", array()), $this->getAttribute($context["error"], "messageParameters", array()), "validators"), $this->getAttribute($this->getAttribute($context["error"], "messageParameters", array()), "{{ limit }}", array(), "array")), "html", null, true);
                        echo "
                                ";
                    } else {
                        // line 13
                        echo "                                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($context["error"], "messageTemplate", array()), $this->getAttribute($context["error"], "messageParameters", array()), "validators"), "html", null, true);
                        echo "
                            ";
                    }
                    // line 15
                    echo "                        ";
                }
                // line 16
                echo "                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "                </div>
        ";
            // line 18
            if (((!$this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array())) || twig_in_filter("repeated", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "block_prefixes", array(), "array")))) {
                // line 19
                echo "            </div>
        ";
            }
            // line 21
            echo "    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Form:errors.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  102 => 21,  98 => 19,  96 => 18,  93 => 17,  79 => 16,  76 => 15,  70 => 13,  64 => 11,  61 => 10,  58 => 9,  41 => 8,  38 => 7,  34 => 5,  31 => 4,  28 => 3,  26 => 2,  20 => 1,);
    }
}
