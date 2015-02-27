<?php

/* SimpleThingsEntityAuditBundle:Audit:view_detail.html.twig */
class __TwigTemplate_dc2e1e5024c9f29d3ee8c87713320e1ec6f04c9473c8c9ad81dcdbfd922bfcdf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SimpleThingsEntityAuditBundle::layout.html.twig");

        $this->blocks = array(
            'simplethings_entityaudit_content' => array($this, 'block_simplethings_entityaudit_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SimpleThingsEntityAuditBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_simplethings_entityaudit_content($context, array $blocks = array())
    {
        // line 4
        echo "<h1>Detail of ";
        echo twig_escape_filter($this->env, (isset($context["className"]) ? $context["className"] : null), "html", null, true);
        echo " with identifiers of ";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo " at revisions ";
        echo twig_escape_filter($this->env, (isset($context["rev"]) ? $context["rev"] : null), "html", null, true);
        echo "</h1>

<p><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("simple_things_entity_audit_viewentity", array("className" => (isset($context["className"]) ? $context["className"] : null), "id" => (isset($context["id"]) ? $context["id"] : null))), "html", null, true);
        echo "\">Compare revisions</a></p>
<table>
    <thead><tr>
        <th>Field</th>
        <th>Value</th>
    </tr></thead>
    <tbody>
    ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : null));
        foreach ($context['_seq'] as $context["field"] => $context["value"]) {
            // line 14
            echo "    <tr>
        <td>";
            // line 15
            echo twig_escape_filter($this->env, $context["field"], "html", null, true);
            echo "</td>
        ";
            // line 16
            if ($this->getAttribute($context["value"], "timestamp", array(), "any", true, true)) {
                // line 17
                echo "        <td>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $context["value"], "m/d/Y"), "html", null, true);
                echo "</td>
        ";
            } else {
                // line 19
                echo "        <td>";
                echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                echo "</td>
        ";
            }
            // line 21
            echo "    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['field'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "    </tbody>
</table>

";
    }

    public function getTemplateName()
    {
        return "SimpleThingsEntityAuditBundle:Audit:view_detail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 23,  76 => 21,  70 => 19,  64 => 17,  62 => 16,  58 => 15,  55 => 14,  51 => 13,  41 => 6,  31 => 4,  28 => 3,);
    }
}
