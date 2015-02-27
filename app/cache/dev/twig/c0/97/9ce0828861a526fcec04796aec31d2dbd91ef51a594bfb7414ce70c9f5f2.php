<?php

/* CoreProductBundle:Admin/Form/modifications_widget/td_types:product_data_property.html.twig */
class __TwigTemplate_c0979ce0828861a526fcec04796aec31d2dbd91ef51a594bfb7414ce70c9f5f2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'product_data_property_type' => array($this, 'block_product_data_property_type'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('product_data_property_type', $context, $blocks);
    }

    public function block_product_data_property_type($context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 3
        $context["used"] = array();
        // line 4
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d")), "productDataProperty", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["pdp"]) {
            // line 5
            echo "
";
            // line 6
            if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()), $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "showProperties", array()))) {
                // line 7
                echo "
";
                // line 8
                if (!twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "id", array()), (isset($context["used"]) ? $context["used"] : $this->getContext($context, "used")))) {
                    // line 9
                    if (twig_length_filter($this->env, (isset($context["used"]) ? $context["used"] : $this->getContext($context, "used")))) {
                        echo "<br>";
                    }
                    // line 10
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "captionRu", array()), "html", null, true);
                    echo ":
";
                }
                // line 12
                if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "id", array()), (isset($context["used"]) ? $context["used"] : $this->getContext($context, "used")))) {
                    echo ",";
                }
                // line 13
                echo "    ";
                if ($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array())) {
                    // line 14
                    echo "        ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array()), "html", null, true);
                    echo "
    ";
                } else {
                    // line 16
                    echo "        ";
                    if ($this->getAttribute($context["pdp"], "value", array())) {
                        // line 17
                        echo "            ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["pdp"], "value", array()), "html", null, true);
                        echo "
        ";
                    } else {
                        // line 19
                        echo "        ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["pdp"], "valueNumeric", array()), "html", null, true);
                        echo "
        ";
                        // line 20
                        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array(), "any", false, true), "property", array(), "any", false, true), "defaultUnit", array(), "any", false, true), "id", array(), "any", true, true)) {
                            // line 21
                            echo "            ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "defaultUnit", array()), "shortCaptionRu", array()), "html", null, true);
                            echo "
        ";
                        }
                        // line 23
                        echo "        ";
                    }
                    // line 24
                    echo "    ";
                }
                // line 25
                if (!twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "id", array()), (isset($context["used"]) ? $context["used"] : $this->getContext($context, "used")))) {
                    // line 26
                    $context["used"] = twig_array_merge((isset($context["used"]) ? $context["used"] : $this->getContext($context, "used")), array(0 => $this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "id", array())));
                }
                // line 28
                echo "    
        ";
            }
            // line 30
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pdp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/Form/modifications_widget/td_types:product_data_property.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  105 => 30,  101 => 28,  98 => 26,  96 => 25,  93 => 24,  90 => 23,  84 => 21,  82 => 20,  77 => 19,  71 => 17,  68 => 16,  62 => 14,  59 => 13,  55 => 12,  50 => 10,  46 => 9,  44 => 8,  41 => 7,  39 => 6,  36 => 5,  31 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }
}
