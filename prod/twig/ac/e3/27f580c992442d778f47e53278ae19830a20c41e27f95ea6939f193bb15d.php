<?php

/* CoreOrderBundle:PreOrder/emailMessages:buyByOrderToAdmin.html.twig */
class __TwigTemplate_ace327f580c992442d778f47e53278ae19830a20c41e27f95ea6939f193bb15d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "
На сайте PromoMaster.net поступила заявка <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["preOrderLink"]) ? $context["preOrderLink"] : null), "html", null, true);
        echo "\">#";
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["obj"]) ? $context["obj"] : null), "id", array())), "html", null, true);
        echo "</a> (от ";
        echo twig_escape_filter($this->env, (isset($context["createdDateTime"]) ? $context["createdDateTime"] : null), "html", null, true);
        echo ") 
на доставку под заказ товара <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["productLink"]) ? $context["productLink"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "captionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "article", array()), "html", null, true);
        echo "</a>";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:PreOrder/emailMessages:buyByOrderToAdmin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 9,  22 => 8,  19 => 7,);
    }
}
