<?php

/* CoreProductBundle:Admin/list_fields:yml.html.twig */
class __TwigTemplate_f91bec28754a141f7715f48844f2ed56e5fe2881c97c057fe73daa6598ad849b extends Twig_Template
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
        if (((((!$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isCanBeInYml", array())) || (!$this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manufacturerMain", array()), "isCanBeInYml", array()))) || ((!$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "orderOnly", array())) && (!$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "availabilityQuantity", array())))) || $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isDiscontinued", array()))) {
            // line 8
            echo "        ";
            if ((!$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "availabilityQuantity", array()))) {
                // line 9
                echo "            <span title=\"Нет в наличии\" class=\"label label-important\">нет</span>
        ";
            } else {
                // line 11
                echo "            ";
                if ((!$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isCanBeInYml", array()))) {
                    // line 12
                    echo "                <span title=\"Отменена публикация товара\" class=\"label label-important\">нет</span>
            ";
                } else {
                    // line 14
                    echo "                ";
                    if ((!$this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manufacturerMain", array()), "isCanBeInYml", array()))) {
                        // line 15
                        echo "                    <span title=\"Отменена публикация производителя\" class=\"label label-important\">нет</span>
                ";
                    } else {
                        // line 17
                        echo "                    ";
                        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isDiscontinued", array())) {
                            // line 18
                            echo "                        <span title=\"Снят с производства\" class=\"label label-important\">нет</span>
                    ";
                        }
                        // line 20
                        echo "                ";
                    }
                    // line 21
                    echo "            ";
                }
                // line 22
                echo "        ";
            }
            // line 23
            echo "    ";
        } else {
            // line 24
            echo "        <span title=\"Включено в YML\" class=\"label label-success\">да</span>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/list_fields:yml.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 24,  71 => 23,  68 => 22,  65 => 21,  62 => 20,  58 => 18,  55 => 17,  51 => 15,  48 => 14,  44 => 12,  41 => 11,  37 => 9,  34 => 8,  31 => 4,  28 => 3,);
    }
}
