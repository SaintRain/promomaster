<?php

/* CoreReviewBundle:Review:stars.html.twig */
class __TwigTemplate_4220c8a3a02ca00d127d79ebff36a3833a49f41725a36369e2ddd1f554a7ccdd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stars' => array($this, 'block_stars'),
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
        $this->displayBlock('stars', $context, $blocks);
    }

    public function block_stars($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "        ";
        if (((isset($context["rating"]) ? $context["rating"] : $this->getContext($context, "rating")) > 0)) {
            // line 12
            echo "
            <span class=\"product_rating_stars ";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "html", null, true);
            echo "\">

                ";
            // line 15
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["rating"]) ? $context["rating"] : $this->getContext($context, "rating"))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 16
                echo "                    <span class=\"product_rating_star\">&nbsp;</span>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "
                ";
            // line 19
            if (((isset($context["half"]) ? $context["half"] : $this->getContext($context, "half")) > 0)) {
                // line 20
                echo "
                    <span class=\"product_rating_star half\">&nbsp;</span>

                ";
            }
            // line 24
            echo "
            </span>

        ";
        }
        // line 28
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Review:stars.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  74 => 28,  68 => 24,  62 => 20,  60 => 19,  57 => 18,  50 => 16,  46 => 15,  41 => 13,  38 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
