<?php

/* CoreOrderBundle:Admin/Form/PreOrder:list.html.twig */
class __TwigTemplate_48d6d6be932624c8447350c6597cad94c28336349960fd9258a1d41a5049c0d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:list_top.html.twig");

        $this->blocks = array(
            'table_body' => array($this, 'block_table_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:list_top.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_table_body($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("table_body", $context, $blocks);
        echo "
    <script>
        adminRoutes['admin_core_order_preorder_preorder_createOder'] = '";
        // line 6
        echo $this->env->getExtension('routing')->getPath("admin_core_order_preorder_preorder_createOder");
        echo "';
        adminRoutes['admin_core_order_order_edit'] = '";
        // line 7
        echo $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => "PLACEHOLDER"));
        echo "';
    </script>
    <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/js/preorder.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/PreOrder:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 9,  41 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
