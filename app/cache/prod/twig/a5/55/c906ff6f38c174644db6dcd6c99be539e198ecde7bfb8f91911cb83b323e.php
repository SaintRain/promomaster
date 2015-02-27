<?php

/* CoreLanguageBundle:Form/Type:text_case_widget.html.twig */
class __TwigTemplate_a555c906ff6f38c174644db6dcd6c99be539e198ecde7bfb8f91911cb83b323e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'textCase_widget' => array($this, 'block_textCase_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('textCase_widget', $context, $blocks);
    }

    public function block_textCase_widget($context, array $blocks = array())
    {
        echo "    
    
    <div class=\"caption_case_wrapper\">
        ";
        // line 5
        echo "        <div class=\"";
        echo " active\">
                ";
        // line 6
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()))) {
            // line 7
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 8
                echo "                        <div class=\"control-group\">
                            ";
                // line 9
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'label');
                echo "
                            <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                                ";
                // line 11
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget');
                echo "
                                ";
                // line 12
                if ($this->getAttribute((isset($context["help"]) ? $context["help"] : null), $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "name", array()), array(), "array", true, true)) {
                    // line 13
                    echo "                                    <span class=\"help-block sonata-ba-field-help\">
                                        ";
                    // line 14
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["help"]) ? $context["help"] : null), $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "name", array()), array(), "array"), "html", null, true);
                    echo "
                                        <span class=\"help-block-shadow\"></span>
                                    </span>
                                ";
                }
                // line 18
                echo "                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "            
                ";
        }
        // line 21
        echo "    
        </div>
    </div>    

";
    }

    public function getTemplateName()
    {
        return "CoreLanguageBundle:Form/Type:text_case_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  77 => 21,  73 => 20,  65 => 18,  58 => 14,  55 => 13,  53 => 12,  49 => 11,  44 => 9,  41 => 8,  36 => 7,  34 => 6,  30 => 5,  20 => 1,);
    }
}
