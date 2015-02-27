<?php

/* CoreCommonBundle:Collector:total.html.twig */
class __TwigTemplate_32e1813d632fb3562addb60fab0f6963e730b9e7d94e4867e81acae08fdcee2b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<strong>Profiling:</strong>

<table style=\"margin: 5px 0;\">
    <thead>
        <tr>
            <th>Status</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 12
            echo "        <tr>
            ";
            // line 13
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["row"]);
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 14
                echo "                <td>";
                echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                echo "</td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "    </tbody>
    <tfoot>
        <tr>
            <th>Total:</th>
            <td>";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total")), "html", null, true);
        echo "</td>
        </tr>
    </tfoot>
</table>";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Collector:total.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 22,  58 => 18,  51 => 16,  42 => 14,  38 => 13,  35 => 12,  31 => 11,  19 => 1,);
    }
}
