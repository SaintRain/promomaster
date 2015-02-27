<?php

/* SimpleThingsEntityAuditBundle:Audit:view_entity.html.twig */
class __TwigTemplate_0b7feebcb2e5e0cd2a3c1acda84760d680f0ffbefe976822ff6ded5068aa8963 extends Twig_Template
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
        echo "<h1>Change history for ";
        echo twig_escape_filter($this->env, (isset($context["className"]) ? $context["className"] : null), "html", null, true);
        echo " with identifiers of ";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "</h1>

<p><a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("simple_things_entity_audit_home");
        echo "\">Home</a></p>

<form action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("simple_things_entity_audit_compare", array("className" => (isset($context["className"]) ? $context["className"] : null), "id" => (isset($context["id"]) ? $context["id"] : null))), "html", null, true);
        echo "\" method=\"get\">
<table>
    <thead>
    <tr>
        <th colspan=\"3\">&nbsp;</th>
        <th colspan=\"2\">Compare</th>
    </tr>
    <tr>
        <th>Revision</th>
        <th>Date</th>
        <th>User</th>
        <th>Old</th>
        <th>New</th>
    </tr>
    </thead>
    <tbody>

";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["revisions"]) ? $context["revisions"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["revision"]) {
            // line 26
            echo "    <tr>
        <td><a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("simple_things_entity_audit_viewentity_detail", array("rev" => $this->getAttribute($context["revision"], "rev", array()), "className" => (isset($context["className"]) ? $context["className"] : null), "id" => (isset($context["id"]) ? $context["id"] : null))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["revision"], "rev", array()), "html", null, true);
            echo "</a></td>
        <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["revision"], "timestamp", array()), "r"), "html", null, true);
            echo "</td>
        <td>";
            // line 29
            echo twig_escape_filter($this->env, (($this->getAttribute($context["revision"], "username", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["revision"], "username", array()), "Anonymous")) : ("Anonymous")), "html", null, true);
            echo "</td>

        <td><input type=\"radio\" name=\"oldRev\" value=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["revision"], "rev", array()), "html", null, true);
            echo "\"";
            if (($this->getAttribute($context["loop"], "index", array()) == 2)) {
                echo " checked=\"checked\"";
            }
            echo " /></td>
        <td><input type=\"radio\" name=\"newRev\" value=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["revision"], "rev", array()), "html", null, true);
            echo "\"";
            if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                echo " checked=\"checked\"";
            }
            echo " /></td>
    </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['revision'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "    </tbody>
</table>

    <input type=\"submit\" value=\"Compare Revisions\" />
</form>

";
    }

    public function getTemplateName()
    {
        return "SimpleThingsEntityAuditBundle:Audit:view_entity.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 35,  107 => 32,  99 => 31,  94 => 29,  90 => 28,  84 => 27,  81 => 26,  64 => 25,  44 => 8,  39 => 6,  31 => 4,  28 => 3,);
    }
}
