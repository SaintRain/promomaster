<?php

/* CoreOrderBundle:Admin/Form/PreOrder/list_fields:product.html.twig */
class __TwigTemplate_7e2dc40c6f96e1ff454790c9ebfa329e98adbfb5a4686ba4522dc666d0e2d694 extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "compositions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["comp"]) {
            // line 5
            echo "        <div>
            ";
            // line 6
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "cannotRemove", array(), "any", true, true)) {
                echo "<span style=\"display:none\" class=\"cannotRemove\"></span>";
            }
            // line 7
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()))), "html", null, true);
            echo "\">
                ";
            // line 8
            if ($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "images", array())) {
                // line 9
                echo "                    <img class=\"img-thumbnail\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "images", array()), "preview", "64x64_")), "html", null, true);
                echo "\"/>
                ";
            } else {
                // line 11
                echo "                    <img title=\"Нет фото\" width=\"64px\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/coreproduct/Admin/img/no_image.png"), "html", null, true);
                echo "\"/>
                ";
            }
            // line 12
            echo "</a>&nbsp;<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "captionRu", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "article", array()), "html", null, true);
            echo "
            </a>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/PreOrder/list_fields:product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 12,  64 => 11,  58 => 9,  56 => 8,  51 => 7,  47 => 6,  44 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
