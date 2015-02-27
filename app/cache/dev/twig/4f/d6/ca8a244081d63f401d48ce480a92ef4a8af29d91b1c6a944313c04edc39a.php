<?php

/* CoreProductBundle:Admin/list_fields:yml.html.twig */
class __TwigTemplate_4fd6ca8a244081d63f401d48ce480a92ef4a8af29d91b1c6a944313c04edc39a extends Twig_Template
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
        if (((( !$this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isCanBeInYml", array()) ||  !$this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "manufacturerMain", array()), "isCanBeInYml", array())) || ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "orderOnly", array()) &&  !$this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "availabilityQuantity", array()))) || $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isDiscontinued", array()))) {
            // line 8
            echo "        ";
            if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "availabilityQuantity", array())) {
                // line 9
                echo "            <span title=\"Нет в наличии\" class=\"label label-important\">нет</span>
        ";
            } else {
                // line 11
                echo "            ";
                if ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isCanBeInYml", array())) {
                    // line 12
                    echo "                <span title=\"Отменена публикация товара\" class=\"label label-important\">нет</span>
            ";
                } else {
                    // line 14
                    echo "                ";
                    if ( !$this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "manufacturerMain", array()), "isCanBeInYml", array())) {
                        // line 15
                        echo "                    <span title=\"Отменена публикация производителя\" class=\"label label-important\">нет</span>
                ";
                    } else {
                        // line 17
                        echo "                    ";
                        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isDiscontinued", array())) {
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
        return array (  82 => 24,  79 => 23,  76 => 22,  73 => 21,  70 => 20,  66 => 18,  63 => 17,  59 => 15,  56 => 14,  52 => 12,  49 => 11,  45 => 9,  42 => 8,  39 => 4,  36 => 3,  11 => 1,);
    }
}
