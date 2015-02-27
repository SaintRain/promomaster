<?php

/* CoreProductBundle:Admin/list_fields:categories.html.twig */
class __TwigTemplate_ce59c84c69522bebb1af6aee4bb766285da809332f29d96b088eea1b1f081cce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["p_id"] = false;
        // line 5
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "categories", array()));
        foreach ($context['_seq'] as $context["ind"] => $context["cat"]) {
            // line 6
            echo "        <div style=\"min-width:200px\">
            <table class=\"noCSS\" >
                <tr>
                    <td>
                    ";
            // line 10
            if ($this->getAttribute($this->getAttribute($context["cat"], "parent", array(), "any", false, true), "id", array(), "any", true, true)) {
                if (($this->getAttribute($this->getAttribute($context["cat"], "parent", array()), "id", array()) != (isset($context["p_id"]) ? $context["p_id"] : $this->getContext($context, "p_id")))) {
                    echo "-&nbsp;";
                } else {
                    echo "&nbsp;&nbsp;";
                }
            }
            echo "</td>
                <td>";
            // line 11
            if (($this->getAttribute($context["cat"], "parent", array()) && $this->getAttribute($this->getAttribute($context["cat"], "parent", array()), "lvl", array()))) {
                if (($this->getAttribute($this->getAttribute($context["cat"], "parent", array()), "id", array()) != (isset($context["p_id"]) ? $context["p_id"] : $this->getContext($context, "p_id")))) {
                    echo "<b>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["cat"], "parent", array()), "captionRu", array()), "html", null, true);
                    echo "</b>
                    &nbsp;&nbsp;→";
                    // line 12
                    if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "categories", array(), "any", false, true), ($context["ind"] + 1), array(), "array", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "categories", array()), ($context["ind"] + 1), array(), "array"), "parent", array()), "id", array()) == $this->getAttribute($this->getAttribute($context["cat"], "parent", array()), "id", array())))) {
                        echo "<br/>";
                    } else {
                        echo "&nbsp;&nbsp;";
                    }
                } else {
                }
            }
            // line 13
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_category_productcategory_edit", array("id" => $this->getAttribute($context["cat"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "captionRu", array()), "html", null, true);
            echo "</a>
                    ";
            // line 14
            if (((($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "categories", array(), "any", false, true), ($context["ind"] + 1), array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "categories", array(), "any", false, true), ($context["ind"] + 1), array(), "array", false, true), "parent", array(), "any", false, true), "id", array(), "any", true, true)) && $this->getAttribute($this->getAttribute($context["cat"], "parent", array(), "any", false, true), "id", array(), "any", true, true)) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "categories", array()), ($context["ind"] + 1), array(), "array"), "parent", array()), "id", array()) == $this->getAttribute($this->getAttribute($context["cat"], "parent", array()), "id", array())))) {
                // line 17
                echo ",&nbsp;";
            }
            // line 18
            echo "                </td>
            </tr>
        </table>
    </div>
    ";
            // line 22
            if ($this->getAttribute($this->getAttribute($context["cat"], "parent", array(), "any", false, true), "id", array(), "any", true, true)) {
                // line 23
                echo "        ";
                $context["p_id"] = $this->getAttribute($this->getAttribute($context["cat"], "parent", array()), "id", array());
                // line 24
                echo "    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['ind'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/list_fields:categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 24,  91 => 23,  89 => 22,  83 => 18,  80 => 17,  78 => 14,  71 => 13,  62 => 12,  55 => 11,  45 => 10,  39 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
