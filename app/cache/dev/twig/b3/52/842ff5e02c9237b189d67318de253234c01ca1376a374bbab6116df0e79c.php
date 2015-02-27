<?php

/* CoreDeliveryBundle:Admin/List:list_buyer_type.html.twig */
class __TwigTemplate_b352842ff5e02c9237b189d67318de253234c01ca1376a374bbab6116df0e79c extends Twig_Template
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
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "buyerType", array()) == "IndiContragent")) {
            // line 5
            echo "        <span class=\"label label-info\">Физическое лицо</span>
        ";
        } elseif (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "buyerType", array()) == "LegalContragent")) {
            // line 7
            echo "            <span class=\"label label-info\">Юридическое лицо</span>
            ";
        } else {
            // line 9
            echo "        <span class=\"label label-default\">Не указано</span>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreDeliveryBundle:Admin/List:list_buyer_type.html.twig";
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
