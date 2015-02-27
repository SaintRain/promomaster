<?php

/* SonataBlockBundle:Block:block_side_menu_template.html.twig */
class __TwigTemplate_7512a296b9dd6896440fbbdb09e06358fb860d3af424486481311a6b1c5fe584 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("knp_menu.html.twig");

        $this->blocks = array(
            'list' => array($this, 'block_list'),
            'item' => array($this, 'block_item'),
            'linkElement' => array($this, 'block_linkElement'),
            'spanElement' => array($this, 'block_spanElement'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_list($context, array $blocks = array())
    {
        // line 15
        $context["macros"] = $this->env->loadTemplate("knp_menu.html.twig");
        // line 16
        echo "    ";
        if ((($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "hasChildren", array()) && (!($this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "depth", array()) === 0))) && $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "displayChildren", array()))) {
            // line 17
            echo "        <div";
            echo $context["macros"]->getattributes((isset($context["listAttributes"]) ? $context["listAttributes"] : $this->getContext($context, "listAttributes")));
            echo ">
            ";
            // line 18
            $this->displayBlock("children", $context, $blocks);
            echo "
        </div>
    ";
        }
    }

    // line 23
    public function block_item($context, array $blocks = array())
    {
        // line 24
        $context["macros"] = $this->env->loadTemplate("knp_menu.html.twig");
        // line 25
        echo "    ";
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "displayed", array())) {
            // line 26
            echo "        ";
            // line 27
            $context["classes"] = (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "class"), "method")))) ? (array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "class"), "method"))) : (array()));
            // line 28
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "current", array())) {
                // line 29
                $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "currentClass", array())));
            } elseif ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "currentAncestor", array())) {
                // line 31
                $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "ancestorClass", array())));
            }
            // line 33
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "actsLikeFirst", array())) {
                // line 34
                $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "firstClass", array())));
            }
            // line 36
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "actsLikeLast", array())) {
                // line 37
                $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "lastClass", array())));
            }
            // line 39
            $context["attributes"] = $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attributes", array());
            // line 40
            if ((!twig_test_empty((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes"))))) {
                // line 41
                $context["attributes"] = twig_array_merge((isset($context["attributes"]) ? $context["attributes"] : $this->getContext($context, "attributes")), array("class" => twig_join_filter((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), " ")));
            }
            // line 43
            echo "        ";
            // line 44
            if (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "uri", array()))) && ((!$this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "current", array())) || $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "currentAsLink", array())))) {
                // line 45
                echo "            ";
                $this->displayBlock("linkElement", $context, $blocks);
            } else {
                // line 47
                echo "            ";
                $this->displayBlock("spanElement", $context, $blocks);
            }
            // line 49
            echo "        ";
            // line 50
            $context["childrenClasses"] = (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "childrenAttribute", array(0 => "class"), "method")))) ? (array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "childrenAttribute", array(0 => "class"), "method"))) : (array()));
            // line 51
            $context["childrenClasses"] = twig_array_merge((isset($context["childrenClasses"]) ? $context["childrenClasses"] : $this->getContext($context, "childrenClasses")), array(0 => ("menu_level_" . $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "level", array()))));
            // line 52
            $context["listAttributes"] = twig_array_merge($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "childrenAttributes", array()), array("class" => twig_join_filter((isset($context["childrenClasses"]) ? $context["childrenClasses"] : $this->getContext($context, "childrenClasses")), " ")));
            // line 53
            echo "        ";
            $this->displayBlock("list", $context, $blocks);
            echo "
    ";
        }
    }

    // line 57
    public function block_linkElement($context, array $blocks = array())
    {
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "uri", array()), "html", null, true);
        echo "\"";
        echo $this->getAttribute((isset($context["macros"]) ? $context["macros"] : $this->getContext($context, "macros")), "attributes", array(0 => twig_array_merge(twig_array_merge($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attributes", array()), $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "linkAttributes", array())), (isset($context["attributes"]) ? $context["attributes"] : $this->getContext($context, "attributes")))), "method");
        echo ">";
        $this->displayBlock("label", $context, $blocks);
        echo "</a>";
    }

    // line 59
    public function block_spanElement($context, array $blocks = array())
    {
        echo "<div";
        echo $this->getAttribute((isset($context["macros"]) ? $context["macros"] : $this->getContext($context, "macros")), "attributes", array(0 => twig_array_merge(twig_array_merge($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attributes", array()), $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "labelAttributes", array())), (isset($context["attributes"]) ? $context["attributes"] : $this->getContext($context, "attributes")))), "method");
        echo "><h4 class=\"list-group-item-heading\">";
        $this->displayBlock("label", $context, $blocks);
        echo "</h4></div>";
    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_side_menu_template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 59,  117 => 57,  109 => 53,  107 => 52,  105 => 51,  103 => 50,  101 => 49,  97 => 47,  93 => 45,  91 => 44,  89 => 43,  86 => 41,  84 => 40,  82 => 39,  79 => 37,  77 => 36,  74 => 34,  72 => 33,  69 => 31,  66 => 29,  64 => 28,  62 => 27,  60 => 26,  57 => 25,  55 => 24,  52 => 23,  44 => 18,  39 => 17,  36 => 16,  34 => 15,  31 => 14,);
    }
}
