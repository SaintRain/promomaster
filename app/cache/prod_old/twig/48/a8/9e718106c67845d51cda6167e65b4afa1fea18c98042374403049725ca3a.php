<?php

/* SimpleThingsEntityAuditBundle:Audit:view_revision.html.twig */
class __TwigTemplate_48a89e718106c67845d51cda6167e65b4afa1fea18c98042374403049725ca3a extends Twig_Template
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
        echo "<h1>Entities changed in revision ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["revision"]) ? $context["revision"] : $this->getContext($context, "revision")), "rev", array()), "html", null, true);
        echo "</h1>

<p><a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("simple_things_entity_audit_home");
        echo "\">Home</a></p>

<table>
    <thead><tr>
        <th>Class Name</th>
        <th>Identifiers</th>
        <th>Revision Type</th>
    </tr></thead>
    <tbody>
";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["changedEntities"]) ? $context["changedEntities"] : $this->getContext($context, "changedEntities")));
        foreach ($context['_seq'] as $context["_key"] => $context["changedEntity"]) {
            // line 16
            echo "    <tr>
        <td><a href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("simple_things_entity_audit_viewentity_detail", array("rev" => $this->getAttribute((isset($context["revision"]) ? $context["revision"] : $this->getContext($context, "revision")), "rev", array()), "className" => $this->getAttribute($context["changedEntity"], "className", array()), "id" => twig_join_filter($this->getAttribute($context["changedEntity"], "id", array()), ","))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["changedEntity"], "className", array()), "html", null, true);
            echo "</a></td>
        <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($context["changedEntity"], "id", array()), ", "), "html", null, true);
            echo "</td>
        <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["changedEntity"], "revisionType", array()), "html", null, true);
            echo "</td>
    </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['changedEntity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    </tbody>
</table>

";
    }

    public function getTemplateName()
    {
        return "SimpleThingsEntityAuditBundle:Audit:view_revision.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 22,  66 => 19,  62 => 18,  56 => 17,  53 => 16,  49 => 15,  37 => 6,  31 => 4,  28 => 3,);
    }
}
