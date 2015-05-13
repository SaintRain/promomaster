<?php

/* SimpleThingsEntityAuditBundle:Audit:view_revision.html.twig */
class __TwigTemplate_56a8eb00618ca76c1f1352c1aa63147b81f4fbb0b9c84261e54f840aa04c32ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SimpleThingsEntityAuditBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["revision"]) ? $context["revision"] : null), "rev", array()), "html", null, true);
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
        $context['_seq'] = twig_ensure_traversable((isset($context["changedEntities"]) ? $context["changedEntities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["changedEntity"]) {
            // line 16
            echo "    <tr>
        <td><a href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("simple_things_entity_audit_viewentity_detail", array("rev" => $this->getAttribute((isset($context["revision"]) ? $context["revision"] : null), "rev", array()), "className" => $this->getAttribute($context["changedEntity"], "className", array()), "id" => twig_join_filter($this->getAttribute($context["changedEntity"], "id", array()), ","))), "html", null, true);
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
        return array (  83 => 22,  74 => 19,  70 => 18,  64 => 17,  61 => 16,  57 => 15,  45 => 6,  39 => 4,  36 => 3,  11 => 1,);
    }
}
