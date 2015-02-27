<?php

/* ApplicationSonataUserBundle:Admin\Form:contragent_email_type_widget.html.twig */
class __TwigTemplate_6c1c8fea65736dc24434082cb4bd145f7d25b952836d499a34c84d7f517cdee2 extends Twig_Template
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
            'contragent_email_type_widget' => array($this, 'block_contragent_email_type_widget'),
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
    public function block_contragent_email_type_widget($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        ob_start();
        // line 4
        echo "        <div class=\"full-search\">
            ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email", array()), 'widget', array("attr" => array("class" => "span8")));
        echo "
            ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "full", array()), 'widget');
        echo "
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin\\Form:contragent_email_type_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 6,  45 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
