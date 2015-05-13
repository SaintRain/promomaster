<?php

/* CoreCommonBundle:Fragments:popularProductsInDown.html.twig */
class __TwigTemplate_b20e18b5304ea4b13bf0f98184914d5ce81ae7c97199496f586d3e50cc2009de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'products_grid' => array($this, 'block_products_grid'),
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
        // line 10
        $this->displayBlock('products_grid', $context, $blocks);
    }

    public function block_products_grid($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        ob_start();
        // line 12
        echo "        <div class=\"showcase_horizontal showcase_box\">
            <div class=\"products_grid row_four\">
                <div class=\"showcase_container\">
                    <span class=\"showcase_nav prev disabled\"><span class=\"showcase_nav_btn\">Предыдущие</span></span>
                    <span class=\"showcase_nav next\"><span class=\"showcase_nav_btn\">Следующие</span></span>
                    <div class=\"products_wrapper\">
                        <div class=\"products_grid_line grid_container\">
                            ";
        // line 20
        echo "                            ";
        $context["productItemContainerClass"] = "product_min";
        // line 21
        echo "                            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
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
        foreach ($context['_seq'] as $context["i"] => $context["product"]) {
            // line 22
            echo "                                ";
            $this->displayBlock("product", $context, $blocks);
            echo "
                                ";
            // line 23
            $this->env->loadTemplate("CoreProductBundle:Catalog:product_cell.html.twig")->display($context);
            // line 24
            echo "                            ";
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
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "                        </div>
                    </div>
                </div>
            </div>
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:popularProductsInDown.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  87 => 25,  73 => 24,  71 => 23,  66 => 22,  48 => 21,  45 => 20,  36 => 12,  33 => 11,  27 => 10,  23 => 8,  20 => 1,);
    }
}
