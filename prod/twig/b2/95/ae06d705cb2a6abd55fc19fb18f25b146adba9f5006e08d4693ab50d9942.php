<?php

/* CoreReviewBundle:Admin/List:list_likes.html.twig */
class __TwigTemplate_b295ae06d705cb2a6abd55fc19fb18f25b146adba9f5006e08d4693ab50d9942 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 9
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    ";
        // line 13
        $context["positive"] = 0;
        // line 14
        echo "    ";
        $context["negative"] = 0;
        // line 15
        echo "
    ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["value"]) ? $context["value"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["like"]) {
            // line 17
            echo "        ";
            if ($this->getAttribute($context["like"], "type", array())) {
                // line 18
                echo "            ";
                $context["positive"] = ((isset($context["positive"]) ? $context["positive"] : null) + 1);
                // line 19
                echo "        ";
            } else {
                // line 20
                echo "            ";
                $context["negative"] = ((isset($context["negative"]) ? $context["negative"] : null) + 1);
                // line 21
                echo "        ";
            }
            // line 22
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['like'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "
    <span style=\"white-space: nowrap;\">
        <span>";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["positive"]) ? $context["positive"] : null), "html", null, true);
        echo " <span class=\"icon-thumbs-up\"></span></span>
        &nbsp;
        <span>";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["negative"]) ? $context["negative"] : null), "html", null, true);
        echo " <span class=\"icon-thumbs-down\"></span></span>
    </span>

";
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Admin/List:list_likes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 27,  70 => 25,  66 => 23,  60 => 22,  57 => 21,  54 => 20,  51 => 19,  48 => 18,  45 => 17,  41 => 16,  38 => 15,  35 => 14,  33 => 13,  30 => 12,  27 => 11,  18 => 9,);
    }
}
