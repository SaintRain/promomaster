<?php

/* CoreLogisticsBundle:Admin/UnitInStock/list_fields:status.html.twig */
class __TwigTemplate_4858f41522a8a5f5b86c9cda4262ce25fd6e666a7187c426049a930c83abb78d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "
    ";
        // line 4
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isWithDefect", array())) {
            // line 5
            echo "        <span class=\"label label-warrning\">списано</span>
        ";
            // line 6
            if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "defectReason", array(), "any", false, true), "captionRu", array(), "any", true, true)) {
                echo "<br/>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "defectReason", array()), "captionRu", array()), "html", null, true);
            }
            // line 7
            echo "    ";
        } else {
            // line 8
            echo "        ";
            if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isCouldBeSold", array())) {
                // line 9
                echo "            <span class=\"label label-success\">продано</span><br/>
            ";
                // line 10
                if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "composition", array(), "any", false, true), "order", array(), "any", true, true)) {
                    // line 11
                    echo "            (заказ <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "composition", array()), "order", array()), "id", array()))), "html", null, true);
                    echo "\">#";
                    echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "composition", array()), "order", array()), "id", array())), "html", null, true);
                    echo "</a>)
            ";
                }
                // line 13
                echo "        ";
            } else {
                // line 14
                echo "            ";
                if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "composition", array(), "any", false, true), "order", array(), "any", true, true)) {
                    // line 15
                    echo "                <span class=\"label label-success\">";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "composition", array()), "order", array()), "isCanceledStatus", array())) {
                        echo "переоформляется";
                    } else {
                        echo "забронировано";
                    }
                    echo "</span><br/>
                (заказ <a href=\"";
                    // line 16
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "composition", array()), "order", array()), "id", array()))), "html", null, true);
                    echo "\">#";
                    echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "composition", array()), "order", array()), "id", array())), "html", null, true);
                    echo "</a>)
            ";
                } else {
                    // line 18
                    echo "                ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supply", array()), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Supply::onTheWayStatusName"))) {
                        // line 19
                        echo "                    <span class=\"label label-info\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supply", array()), "status", array()), "captionRu", array()), "html", null, true);
                        echo "</span>
                ";
                    } else {
                        // line 21
                        echo "                    ";
                        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supply", array()), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Supply::suppliedStatusName"))) {
                            // line 22
                            echo "                        <span class=\"label label-success\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supply", array()), "status", array()), "captionRu", array()), "html", null, true);
                            echo "</span>
                    ";
                        } else {
                            // line 24
                            echo "                        <span class=\"label label-default\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supply", array()), "status", array()), "captionRu", array()), "html", null, true);
                            echo "</span>
                    ";
                        }
                        // line 26
                        echo "                ";
                    }
                    // line 27
                    echo "            ";
                }
                // line 28
                echo "        ";
            }
            // line 29
            echo "    ";
        }
        // line 30
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/UnitInStock/list_fields:status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 30,  126 => 29,  123 => 28,  120 => 27,  117 => 26,  111 => 24,  105 => 22,  102 => 21,  96 => 19,  93 => 18,  86 => 16,  77 => 15,  74 => 14,  71 => 13,  63 => 11,  61 => 10,  58 => 9,  55 => 8,  52 => 7,  47 => 6,  44 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
