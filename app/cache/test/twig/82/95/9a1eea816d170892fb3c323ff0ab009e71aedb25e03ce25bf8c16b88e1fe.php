<?php

/* ApplicationSonataUserBundle:Admin/Form:onec_type_widget.html.twig */
class __TwigTemplate_82959a1eea816d170892fb3c323ff0ab009e71aedb25e03ce25bf8c16b88e1fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig");

        $this->blocks = array(
            'onec_type_widget' => array($this, 'block_onec_type_widget'),
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
    public function block_onec_type_widget($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        ob_start();
        // line 4
        echo "        <div class=\"with-exclude\">
            ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "onec", array()), 'widget', array("attr" => array("class" => "span8")));
        echo "
            ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "onecOnOff", array()), 'widget');
        echo "
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 9
        echo "    ";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/Form:onec_type_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 9,  41 => 6,  37 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
