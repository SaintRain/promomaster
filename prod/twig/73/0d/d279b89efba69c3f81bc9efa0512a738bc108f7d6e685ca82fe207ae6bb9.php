<?php

/* CoreConfigBundle:Admin/Form:edit.html.twig */
class __TwigTemplate_730dd279b89efba69c3f81bc9efa0512a738bc108f7d6e685ca82fe207ae6bb9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'formactions' => array($this, 'block_formactions'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:base_edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_formactions($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("formactions", $context, $blocks);
        echo "
    <div id=\"preview_modal\" class=\"modal hide\">
        <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
            <h3>Предпросмотр</h3>
        </div>
        <div class=\"modal-body\"></div>
        <div class=\"modal-footer\">
            <a data-dismiss=\"modal\" href=\"#\" class=\"btn\">Закрыть</a>
            <a class=\"btn btn-primary\" href=\"#\">Сохранить</a>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreConfigBundle:Admin/Form:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 3,  36 => 2,  11 => 1,);
    }
}
