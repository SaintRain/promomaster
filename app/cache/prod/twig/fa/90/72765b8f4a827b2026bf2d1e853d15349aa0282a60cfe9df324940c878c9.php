<?php

/* CoreLogisticsBundle:Admin/UnitInStock/list_fields:status.html.twig */
class __TwigTemplate_fa9072765b8f4a827b2026bf2d1e853d15349aa0282a60cfe9df324940c878c9 extends Twig_Template
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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "
    ";
        // line 4
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isWithDefect", array())) {
            // line 5
            echo "        <span class=\"label label-warrning\">списано</span>
        ";
            // line 6
            if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "defectReason", array(), "any", false, true), "captionRu", array(), "any", true, true)) {
                echo "<br/>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "defectReason", array()), "captionRu", array()), "html", null, true);
            }
            // line 7
            echo "    ";
        } else {
            // line 8
            echo "        ";
            if ((!$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isCouldBeSold", array()))) {
                // line 9
                echo "            <span class=\"label label-success\">продано</span><br/>
            ";
                // line 10
                if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "composition", array(), "any", false, true), "order", array(), "any", true, true)) {
                    // line 11
                    echo "            (заказ <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "composition", array()), "order", array()), "id", array()))), "html", null, true);
                    echo "\">#";
                    echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "composition", array()), "order", array()), "id", array())), "html", null, true);
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
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "composition", array()), "order", array()), "isCanceledStatus", array())) {
                        echo "переоформляется";
                    } else {
                        echo "забронировано";
                    }
                    echo "</span><br/>
                (заказ <a href=\"";
                    // line 16
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "composition", array()), "order", array()), "id", array()))), "html", null, true);
                    echo "\">#";
                    echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "composition", array()), "order", array()), "id", array())), "html", null, true);
                    echo "</a>)
            ";
                } else {
                    // line 18
                    echo "                ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supply", array()), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Supply::onTheWayStatusName"))) {
                        // line 19
                        echo "                    <span class=\"label label-info\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supply", array()), "status", array()), "captionRu", array()), "html", null, true);
                        echo "</span>
                ";
                    } else {
                        // line 21
                        echo "                    ";
                        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supply", array()), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Supply::suppliedStatusName"))) {
                            // line 22
                            echo "                        <span class=\"label label-success\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supply", array()), "status", array()), "captionRu", array()), "html", null, true);
                            echo "</span>
                    ";
                        } else {
                            // line 24
                            echo "                        <span class=\"label label-default\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supply", array()), "status", array()), "captionRu", array()), "html", null, true);
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
        return array (  121 => 30,  118 => 29,  115 => 28,  112 => 27,  109 => 26,  103 => 24,  97 => 22,  94 => 21,  88 => 19,  85 => 18,  78 => 16,  69 => 15,  66 => 14,  63 => 13,  55 => 11,  53 => 10,  50 => 9,  47 => 8,  44 => 7,  39 => 6,  36 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
