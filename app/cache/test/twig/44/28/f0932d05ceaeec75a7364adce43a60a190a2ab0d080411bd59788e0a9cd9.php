<?php

/* SimpleThingsEntityAuditBundle:Audit:index.html.twig */
class __TwigTemplate_4428f0932d05ceaeec75a7364adce43a60a190a2ab0d080411bd59788e0a9cd9 extends Twig_Template
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
        echo "<h1>Revisions</h1>

<ul>
";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["revisions"]) ? $context["revisions"] : $this->getContext($context, "revisions")));
        foreach ($context['_seq'] as $context["_key"] => $context["revision"]) {
            // line 8
            echo "    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("simple_things_entity_audit_viewrevision", array("rev" => $this->getAttribute($context["revision"], "rev", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["revision"], "timestamp", array()), "r"), "html", null, true);
            echo " -- ";
            echo twig_escape_filter($this->env, (($this->getAttribute($context["revision"], "username", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["revision"], "username", array()), "Anonymous")) : ("Anonymous")), "html", null, true);
            echo "</a></li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['revision'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "SimpleThingsEntityAuditBundle:Audit:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 10,  40 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
