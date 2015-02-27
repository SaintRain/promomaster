<?php

/* CoreDeliveryBundle:Admin/List:list_service_variant.html.twig */
class __TwigTemplate_757f5da7384d715bcb88232619e61467131b69076295dcaf1d567aeabfcc3c23 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "addresses", array(), "any", true, true)) {
            // line 5
            echo "        <span class=\"label label-default\">Самовывоз</span>
        ";
        } elseif ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "city", array(), "any", true, true)) {
            // line 7
            echo "            <span class=\"label label-inverse\">Адресная доставка</span>
        ";
        } else {
            // line 9
            echo "            <span class=\"label label-info\">Обычная</span>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreDeliveryBundle:Admin/List:list_service_variant.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 9,  46 => 7,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
