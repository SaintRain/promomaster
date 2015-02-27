<?php

/* CoreCommonBundle:Collector:odm_total.html.twig */
class __TwigTemplate_df4adb64ce6c0a79b6788d3b993af2989f43a717dc66cbbc9868cc32d7e59504 extends Twig_Template
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
<table style=\"margin: 5px 0;\" id=\"result\">
    <thead>
        <tr>
            <th colspan=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data"))), "html", null, true);
        echo "\"><strong>";
        echo twig_escape_filter($this->env, (isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "html", null, true);
        echo "</strong></th>
        </tr>
        <tr>
            ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        foreach ($context['_seq'] as $context["label"] => $context["row"]) {
            // line 9
            echo "            <th>";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo "</th>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "        </tr>
    </thead>
    <tbody>
        <tr>
            ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        foreach ($context['_seq'] as $context["label"] => $context["val"]) {
            // line 16
            echo "                ";
            if (twig_test_iterable($context["val"])) {
                // line 17
                echo "                    <td>";
                echo $this->env->getExtension('ladybug_extension')->ladybug_dump($context["val"]);
                echo "</td>
                    ";
            } else {
                // line 19
                echo "                    <td>";
                echo twig_escape_filter($this->env, $context["val"], "html", null, true);
                echo "</td>
                ";
            }
            // line 21
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "        </tr>
    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Collector:odm_total.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 22,  71 => 21,  65 => 19,  59 => 17,  56 => 16,  52 => 15,  46 => 11,  37 => 9,  33 => 8,  25 => 5,  19 => 1,);
    }
}
