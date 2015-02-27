<?php

/* CoreProductBundle:Admin/list_fields:imageMain.html.twig */
class __TwigTemplate_5b8ba2119d0b3f282858bc263c79413d3240ef90f091a88be423bcad09e9f761 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "cannotRemove", array(), "any", true, true)) {
            echo "<span style=\"display:none\" class=\"cannotRemove\"></span>";
        }
        // line 5
        echo "    <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))), "html", null, true);
        echo "\">
        ";
        // line 6
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "images", array())) {
            // line 7
            echo "            <img class=\"img-thumbnail\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "images", array()), "preview", "64x64_")), "html", null, true);
            echo "\"/>
        ";
        } else {
            // line 9
            echo "            <img title=\"Нет фото\" width=\"64px\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/coreproduct/Admin/img/no_image.png"), "html", null, true);
            echo "\"/>
        ";
        }
        // line 11
        echo "    </a>

";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/list_fields:imageMain.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 11,  57 => 9,  51 => 7,  49 => 6,  44 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
