<?php

/* CoreOrderBundle:Admin/Form/Blocks:collection_widget_tabs.html.twig */
class __TwigTemplate_8db41fdbd781bd63209d729d2475f81170c706b8c64ece56e22ea1a91eb34a76 extends Twig_Template
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
        // line 1
        ob_start();
        // line 2
        echo "    <div class=\"tab-pane waybill-packages ";
        if ((isset($context["isActive"]) ? $context["isActive"] : $this->getContext($context, "isActive"))) {
            echo "active";
        }
        echo "\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\">
        ";
        // line 4
        echo "        <fieldset>
            ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        </fieldset>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Blocks:collection_widget_tabs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 5,  30 => 4,  21 => 2,  19 => 1,);
    }
}
