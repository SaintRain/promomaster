<?php

/* CoreUnionBundle:Admin/Form:generate_table.html.twig */
class __TwigTemplate_34ac6ba2b7099fefd4fa1d4afb9c7895145e276ca4741945b5249ded124812f9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'generate_table' => array($this, 'block_generate_table'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('generate_table', $context, $blocks);
    }

    public function block_generate_table($context, array $blocks = array())
    {
        // line 2
        echo "<table class=\"table table-bordered table-striped\">
    <thead>
        <tr class=\"sonata-ba-list-field-header\">
            ";
        // line 5
        if ($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "deleteable", array())) {
            // line 6
            echo "            <th width=\"80\" style=\"text-align:left\"><input type=\"checkbox\" class=\"select-all-";
            echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : null), "html", null, true);
            echo "-delete\" title=\"Выбрать все\">&nbsp;Удалить</th>
            ";
        }
        // line 8
        echo "            <th width=\"90\" nowrap style=\"text-align:left\"><input type=\"checkbox\" class=\"select-all-";
        echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : null), "html", null, true);
        echo "-undock\" title=\"Выбрать все\">&nbsp;Открепить</th>                    
                    ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "columns", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 10
            echo "                    <th ";
            if ($this->getAttribute($context["column"], "width", array(), "any", true, true)) {
                echo " width=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "width", array()), "html", null, true);
                echo "\" ";
            }
            echo " class=\"sonata-ba-list-field-header-text\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "label", array()), "html", null, true);
            echo "</th>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "                                ";
        if (array_key_exists("sortable", $context)) {
            // line 13
            echo "                        <th class=\"sonata-ba-list-field-header-text hidden\">Сортировка</th>
                                ";
        }
        // line 15
        echo "                        </tr>

                    <tbody class=\"sonata-ba-tbody ui-sortable union-table-body-";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["field_id"]) ? $context["field_id"] : null), "html", null, true);
        echo "\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["field_id"]) ? $context["field_id"] : null), "html", null, true);
        echo "_productModificationTable\">
                        
                ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["unions"]) ? $context["unions"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["union"]) {
            // line 20
            echo "                            ";
            if (($this->getAttribute($this->getAttribute($context["union"], "targetObject", array()), "id", array()) != (isset($context["subject_id"]) ? $context["subject_id"] : null))) {
                // line 21
                echo "                        ";
                echo twig_include($this->env, $context, "CoreUnionBundle::Admin/Form/generate_table_row.html.twig", array("dInfo" => (isset($context["dInfo"]) ? $context["dInfo"] : null), "field_name" => (isset($context["field_name"]) ? $context["field_name"] : null), "field_id" => (isset($context["field_id"]) ? $context["field_id"] : null), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : null), "mappedBy" => (isset($context["mappedBy"]) ? $context["mappedBy"] : null), "d" => $this->getAttribute($context["union"], "targetObject", array()), "union" => $context["union"], "uniqid" => (isset($context["uniqid"]) ? $context["uniqid"] : null), "sortable" => (isset($context["sortable"]) ? $context["sortable"] : null)));
                echo "
                            ";
            }
            // line 23
            echo "                ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['union'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "                        </tbody>
                    </table>
";
    }

    public function getTemplateName()
    {
        return "CoreUnionBundle:Admin/Form:generate_table.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  121 => 24,  107 => 23,  101 => 21,  98 => 20,  81 => 19,  74 => 17,  70 => 15,  66 => 13,  63 => 12,  48 => 10,  44 => 9,  39 => 8,  33 => 6,  31 => 5,  26 => 2,  20 => 1,);
    }
}
