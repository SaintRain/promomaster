<?php

/* CoreProductBundle:Admin/list_fields:yml.html.twig */
class __TwigTemplate_8e5c9cd007e770021873af2232ba430ca2d4d85195f2def3cf6609e05e0c3bb2 extends Twig_Template
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

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (((( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isCanBeInYml", array()) ||  !$this->getAttribute($this->getAttribute(        // line 5
(isset($context["object"]) ? $context["object"] : null), "manufacturerMain", array()), "isCanBeInYml", array())) || ( !$this->getAttribute(        // line 6
(isset($context["object"]) ? $context["object"] : null), "orderOnly", array()) &&  !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "availabilityQuantity", array()))) || $this->getAttribute(        // line 7
(isset($context["object"]) ? $context["object"] : null), "isDiscontinued", array()))) {
            // line 8
            echo "        ";
            if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "availabilityQuantity", array())) {
                // line 9
                echo "            <span title=\"Нет в наличии\" class=\"label label-important\">нет</span>
        ";
            } else {
                // line 11
                echo "            ";
                if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isCanBeInYml", array())) {
                    // line 12
                    echo "                <span title=\"Отменена публикация товара\" class=\"label label-important\">нет</span>
            ";
                } else {
                    // line 14
                    echo "                ";
                    if ( !$this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manufacturerMain", array()), "isCanBeInYml", array())) {
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
        return array (  85 => 24,  82 => 23,  79 => 22,  76 => 21,  73 => 20,  69 => 18,  66 => 17,  62 => 15,  59 => 14,  55 => 12,  52 => 11,  48 => 9,  45 => 8,  43 => 7,  42 => 6,  41 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
