<?php

/* CoreDirectoryBundle:Admin/Form/Type:filter_capitals_widget.html.twig */
class __TwigTemplate_3e8be05b770f892d40fbceed4dc8ff8eb9a92a6ff43f020b911baab9f1ef288b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig");

        $this->blocks = array(
            'filter_capitals_type_widget' => array($this, 'block_filter_capitals_type_widget'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_filter_capitals_type_widget($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        ob_start();
        // line 4
        echo "        <div class=\"span2\">";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isCapital", array()), 'label');
        echo "</div>
        <div class=\"span8\">
            ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isCapital", array()), 'widget', array("attr" => array("class" => "choice-inline with-min-width no-marg")));
        echo "
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreDirectoryBundle:Admin/Form/Type:filter_capitals_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  34 => 4,  31 => 3,  28 => 2,);
    }
}
