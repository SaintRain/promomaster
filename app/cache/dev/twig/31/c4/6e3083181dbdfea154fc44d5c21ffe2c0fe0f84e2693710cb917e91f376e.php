<?php

/* CoreOrderBundle:PreOrder/emailMessages:buyByOrderToAdmin.html.twig */
class __TwigTemplate_31c46e3083181dbdfea154fc44d5c21ffe2c0fe0f84e2693710cb917e91f376e extends Twig_Template
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
На сайте olikids.ru поступила заявка <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["preOrderLink"]) ? $context["preOrderLink"] : $this->getContext($context, "preOrderLink")), "html", null, true);
        echo "\">#";
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["obj"]) ? $context["obj"] : $this->getContext($context, "obj")), "id", array())), "html", null, true);
        echo "</a> (от ";
        echo twig_escape_filter($this->env, (isset($context["createdDateTime"]) ? $context["createdDateTime"] : $this->getContext($context, "createdDateTime")), "html", null, true);
        echo ") 
на доставку под заказ товара <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["productLink"]) ? $context["productLink"] : $this->getContext($context, "productLink")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "captionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "article", array()), "html", null, true);
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
