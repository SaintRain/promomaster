<?php

/* CoreConfigBundle:Admin/Form:edit.html.twig */
class __TwigTemplate_eb6fb13a0cf2028ad7c27e7f4ee8d70221b792e0bdd2770d5583c89add3c4d2f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");

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
        return array (  31 => 3,  28 => 2,);
    }
}
