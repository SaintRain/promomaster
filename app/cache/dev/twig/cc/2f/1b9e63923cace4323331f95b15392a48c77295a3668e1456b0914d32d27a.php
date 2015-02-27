<?php

/* ApplicationSonataUserBundle:Admin\Form:kpp_type_widget.html.twig */
class __TwigTemplate_cc2f1b9e63923cace4323331f95b15392a48c77295a3668e1456b0914d32d27a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'kpp_type_widget' => array($this, 'block_kpp_type_widget'),
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
    public function block_kpp_type_widget($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        ob_start();
        // line 4
        echo "        <div class=\"with-exclude\">
            ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "kpp", array()), 'widget', array("attr" => array("class" => "span8")));
        echo "
            ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "kppOnOff", array()), 'widget');
        echo "
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 9
        echo "    ";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin\\Form:kpp_type_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 9,  49 => 6,  45 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
