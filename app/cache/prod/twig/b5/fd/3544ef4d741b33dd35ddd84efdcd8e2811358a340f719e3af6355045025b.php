<?php

/* CoreOrderBundle:Admin/Form/Order:list.html.twig */
class __TwigTemplate_b5fd3544ef4d741b33dd35ddd84efdcd8e2811358a340f719e3af6355045025b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:list_top_in_new_window.html.twig");

        $this->blocks = array(
            'table_body' => array($this, 'block_table_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:list_top_in_new_window.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_table_body($context, array $blocks = array())
    {
        // line 4
        echo "    <tbody>
        ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "datagrid", array()), "results", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
            // line 6
            echo "            <tr ";
            if ($this->getAttribute($context["object"], "isShippedStatus", array())) {
                echo " class=\"OrderisShippedStatus\" ";
            }
            echo ">
                ";
            // line 7
            $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getTemplate", array(0 => "inner_list_row"), "method"))->display($context);
            // line 8
            echo "            </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    </tbody>


";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 10,  60 => 8,  58 => 7,  51 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
