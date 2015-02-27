<?php

/* SimpleThingsEntityAuditBundle:Audit:compare.html.twig */
class __TwigTemplate_b65bfe414075ae8782a4c236e13c898d4407eb955e01134b6f38dd6147f4fd23 extends Twig_Template
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
        echo "<h1>Comparing ";
        echo twig_escape_filter($this->env, (isset($context["className"]) ? $context["className"] : $this->getContext($context, "className")), "html", null, true);
        echo " with identifiers of ";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo " between revisions ";
        echo twig_escape_filter($this->env, (isset($context["oldRev"]) ? $context["oldRev"] : $this->getContext($context, "oldRev")), "html", null, true);
        echo " and ";
        echo twig_escape_filter($this->env, (isset($context["newRev"]) ? $context["newRev"] : $this->getContext($context, "newRev")), "html", null, true);
        echo "</h1>

<table>
    <thead><tr>
        <th>Field</th>
        <th>Deleted</th>
        <th>Same</th>
        <th>Updated</th>
    </tr></thead>
    <tbody>
    ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["diff"]) ? $context["diff"] : $this->getContext($context, "diff")));
        foreach ($context['_seq'] as $context["field"] => $context["value"]) {
            // line 15
            echo "    <tr>
        <td>";
            // line 16
            echo twig_escape_filter($this->env, $context["field"], "html", null, true);
            echo "</td>
        <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "old", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "same", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "new", array()), "html", null, true);
            echo "</td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['field'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    </tbody>
</table>

";
    }

    public function getTemplateName()
    {
        return "SimpleThingsEntityAuditBundle:Audit:compare.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 22,  70 => 19,  66 => 18,  62 => 17,  58 => 16,  55 => 15,  51 => 14,  31 => 4,  28 => 3,);
    }
}
