<?php

/* CoreDirectoryBundle:Admin\Form\Type:filter_capitals_widget.html.twig */
class __TwigTemplate_c410882006d57a47cb856021a79ae4b0aa850a557f454b93524ac9e3526a44ba extends Twig_Template
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
        return "CoreDirectoryBundle:Admin\\Form\\Type:filter_capitals_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 6,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
