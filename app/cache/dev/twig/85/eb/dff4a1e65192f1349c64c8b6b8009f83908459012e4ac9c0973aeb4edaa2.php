<?php

/* CoreProductBundle:Catalog:products_grid.html.twig */
class __TwigTemplate_85ebdff4a1e65192f1349c64c8b6b8009f83908459012e4ac9c0973aeb4edaa2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("CoreProductBundle:Catalog:product_cell.html.twig");
        // line 9
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreProductBundle:Catalog:product_cell.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'cell_product_category' => array($this, 'block_cell_product_category'),
                'products_grid' => array($this, 'block_products_grid'),
            )
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
        echo "
";
        // line 12
        $this->displayBlock('cell_product_category', $context, $blocks);
        // line 17
        echo "
";
        // line 18
        $this->displayBlock('products_grid', $context, $blocks);
    }

    // line 12
    public function block_cell_product_category($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        if (( !array_key_exists("hide_category_link", $context) || ((isset($context["hide_category_link"]) ? $context["hide_category_link"] : $this->getContext($context, "hide_category_link")) == false))) {
            // line 14
            echo "        ";
            $this->displayParentBlock("cell_product_category", $context, $blocks);
            echo "
    ";
        }
    }

    // line 18
    public function block_products_grid($context, array $blocks = array())
    {
        // line 19
        echo "    ";
        ob_start();
        // line 20
        echo "
    <section class=\"products_list products_grid\">

        <div class=\"products_grid_line grid_container\">

            ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")));
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
            // line 26
            echo "
                ";
            // line 27
            if (((($context["i"] % 4) == 0) && ($context["i"] != 1))) {
                // line 28
                echo "
                    </div>
                    <div class=\"products_grid_line grid_container\">

                ";
            }
            // line 33
            echo "
                ";
            // line 34
            $this->displayBlock("product", $context, $blocks);
            echo "

            ";
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
        // line 37
        echo "
        </div>

    </section>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Catalog:products_grid.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  127 => 37,  110 => 34,  107 => 33,  100 => 28,  98 => 27,  95 => 26,  78 => 25,  71 => 20,  68 => 19,  65 => 18,  57 => 14,  54 => 13,  51 => 12,  47 => 18,  44 => 17,  42 => 12,  39 => 10,  36 => 8,  33 => 1,  14 => 9,);
    }
}
