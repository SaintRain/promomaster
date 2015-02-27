<?php

/* CoreCommonBundle:Fragments:searchForm.html.twig */
class __TwigTemplate_3343f976759efb99eb4415c6b8a9abb6559e101fcd49bdb53604ce5f340fb26d extends Twig_Template
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
        // line 2
        if ((array_key_exists("simple", $context) && (isset($context["simple"]) ? $context["simple"] : $this->getContext($context, "simple")))) {
            // line 3
            echo "    <div class=\"header_search\">
        <form id=\"search-form\" action=\"";
            // line 4
            echo $this->env->getExtension('routing')->getPath("core_common_search_first_page");
            echo "\">
            <div class=\"button\">
                <button type=\"submit\" class=\"common_button\"><span>Найти</span></button>
            </div>
            <div class=\"search_input\">";
            // line 8
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["searchForm"]) ? $context["searchForm"] : $this->getContext($context, "searchForm")), "q", array()), 'widget', array("attr" => array("placeholder" => (isset($context["placeholder"]) ? $context["placeholder"] : $this->getContext($context, "placeholder")))));
            echo "</div>
            ";
            // line 10
            echo "            <div class=\"search_tip\">Например, <span class=\"text_tgl\">Самокат Mini Micro</span></div>
        </form>
    </div>
    ";
        } else {
            // line 14
            echo "        <form id=\"search-form\" action=\"";
            echo $this->env->getExtension('routing')->getPath("core_common_search_first_page");
            echo "\">
            <div class=\"search_input\">";
            // line 15
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["searchForm"]) ? $context["searchForm"] : $this->getContext($context, "searchForm")), "q", array()), 'widget', array("attr" => array("placeholder" => (isset($context["placeholder"]) ? $context["placeholder"] : $this->getContext($context, "placeholder")))));
            echo "</div>
            <button type=\"submit\" class=\"search_button\">Найти</button>
            <div class=\"search_tip\">Например, <span class=\"text_tgl\">Самокат Mini Micro</span></div>
        </form>
";
        }
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:searchForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 15,  41 => 14,  35 => 10,  31 => 8,  24 => 4,  21 => 3,  19 => 2,);
    }
}
