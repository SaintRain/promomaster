<?php

/* CoreUnionBundle:Admin/Form:generate_table.html.twig */
class __TwigTemplate_8c8b4530e52a6561f6c7664d45aa05b6cf386fa2d42a85b16ed8712abaf22f80 extends Twig_Template
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
        if ($this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "deleteable", array())) {
            // line 6
            echo "            <th width=\"80\" style=\"text-align:left\"><input type=\"checkbox\" class=\"select-all-";
            echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : $this->getContext($context, "field_name")), "html", null, true);
            echo "-delete\" title=\"Выбрать все\">&nbsp;Удалить</th>
            ";
        }
        // line 8
        echo "            <th width=\"90\" nowrap style=\"text-align:left\"><input type=\"checkbox\" class=\"select-all-";
        echo twig_escape_filter($this->env, (isset($context["field_name"]) ? $context["field_name"] : $this->getContext($context, "field_name")), "html", null, true);
        echo "-undock\" title=\"Выбрать все\">&nbsp;Открепить</th>                    
                    ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "columns", array()));
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
        echo twig_escape_filter($this->env, (isset($context["field_id"]) ? $context["field_id"] : $this->getContext($context, "field_id")), "html", null, true);
        echo "\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["field_id"]) ? $context["field_id"] : $this->getContext($context, "field_id")), "html", null, true);
        echo "_productModificationTable\">
                        
                ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["unions"]) ? $context["unions"] : $this->getContext($context, "unions")));
        foreach ($context['_seq'] as $context["_key"] => $context["union"]) {
            // line 20
            echo "                            ";
            if (($this->getAttribute($this->getAttribute($context["union"], "targetObject", array()), "id", array()) != (isset($context["subject_id"]) ? $context["subject_id"] : $this->getContext($context, "subject_id")))) {
                // line 21
                echo "                        ";
                echo twig_include($this->env, $context, "CoreUnionBundle::Admin/Form/generate_table_row.html.twig", array("dInfo" => (isset($context["dInfo"]) ? $context["dInfo"] : $this->getContext($context, "dInfo")), "field_name" => (isset($context["field_name"]) ? $context["field_name"] : $this->getContext($context, "field_name")), "field_id" => (isset($context["field_id"]) ? $context["field_id"] : $this->getContext($context, "field_id")), "subject_id" => (isset($context["subject_id"]) ? $context["subject_id"] : $this->getContext($context, "subject_id")), "mappedBy" => (isset($context["mappedBy"]) ? $context["mappedBy"] : $this->getContext($context, "mappedBy")), "d" => $this->getAttribute($context["union"], "targetObject", array()), "union" => $context["union"], "uniqid" => (isset($context["uniqid"]) ? $context["uniqid"] : $this->getContext($context, "uniqid")), "sortable" => (isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))));
                echo "
                            ";
            }
            // line 23
            echo "                ";
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
        return array (  100 => 24,  94 => 23,  88 => 21,  85 => 20,  81 => 19,  74 => 17,  70 => 15,  66 => 13,  63 => 12,  48 => 10,  44 => 9,  39 => 8,  33 => 6,  31 => 5,  26 => 2,  20 => 1,);
    }
}
