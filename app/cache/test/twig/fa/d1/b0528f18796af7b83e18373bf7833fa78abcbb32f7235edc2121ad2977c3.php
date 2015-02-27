<?php

/* CoreCategoryBundle:Admin:CommonCategory_edit.html.twig */
class __TwigTemplate_fad1b0528f18796af7b83e18373bf7833fa78abcbb32f7235edc2121ad2977c3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:list.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'list_table' => array($this, 'block_list_table'),
            'right_side' => array($this, 'block_right_side'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:list.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_javascripts($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

<script type=\"text/javascript\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/corecategory/js/sprintf.min.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/corecategory/js/jstree/_lib/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/corecategory/js/jstree/_lib/jquery.hotkeys.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/corecategory/js/jstree/jquery.jstree.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/corecategory/js/treeadmin.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
    var treeParams = {
        canRequestNodeData: ";
        // line 17
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "cookies", array()), "has", array(0 => "jstree_select"), "method") && (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")))) {
            echo "false";
        } else {
            echo "true";
        }
        echo ",
        needFixAfterMove: true,
        linkJSTree: false,
        jstree_selectId: null,
        editUrl: \"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["link_format"]) ? $context["link_format"] : $this->getContext($context, "link_format")), "html", null, true);
        echo "\",
        deleteUrl: \"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["deleteUrl"]) ? $context["deleteUrl"] : $this->getContext($context, "deleteUrl")), "html", null, true);
        echo "\",
        createUrl: \"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => "create"), "method"), "html", null, true);
        echo "\",
        adminUniqid: \"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array()), "html", null, true);
        echo "\",
        csrf_token: \"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array())), "html", null, true);
        echo "\"
    };
</script>
";
    }

    // line 30
    public function block_list_table($context, array $blocks = array())
    {
        // line 31
        echo "    <div class=\"row-fluid\">
        <div class=\"sidebar span3\">
            <div class=\"well sonata-ba-side-menu\" style=\"padding: 8px 0;overflow-x: auto;\">
                <div style=\"padding: 8px\">
                    <button class=\"btn btn-mini\" id=\"openTreeButton\"  type=\"button\"><i class=\"icon-folder-open\"></i> Развернуть</button>
                    <button class=\"btn btn-mini\"  id=\"closeTreeButton\" type=\"button\"><i class=\"icon-folder-close\"></i> Свернуть</button>
                    <button class=\"btn btn-mini\" id=\"searchTreeButton\"  type=\"button\"><i class=\"icon-search\"></i> Поиск</button>
                </div>

                <div id=\"findContent\" style=\"display:none;padding: 8px\">
                    <form id=\"findContentForm\" action=\"#\" >
                        <input id=\"serachKey\" class=\"span10\" type=\"text\" placeholder=\"Фраза для поиска...\">
                        <div>
                            <button id=\"findInTreeButton\" class=\"btn btn-mini\" type=\"button\"><i class=\"icon-ok\"></i> Найти</button>
                            <button id=\"cleareFindInTreeButton\" class=\"btn btn-mini\"  type=\"button\"><i class=\"icon-tint\"></i> Очистить</button>
                            <button id=\"removeFindInTreeButton\" class=\"btn btn-mini\"  type=\"button\"><i class=\"icon-remove-sign\"></i> Убрать</button>
                        </div>
                    </form>
                </div>

                <div id=\"jsTreeContent\" >";
        // line 51
        echo (isset($context["treeHtml"]) ? $context["treeHtml"] : $this->getContext($context, "treeHtml"));
        echo "</div>
            </div>
        </div>
        <div class=\"content span9\">
            <div class=\"sonata-ba-form\">
                    ";
        // line 56
        $this->displayBlock('right_side', $context, $blocks);
        // line 57
        echo "                </div>
            </div>
        </div>

";
    }

    // line 56
    public function block_right_side($context, array $blocks = array())
    {
        echo (isset($context["formCreate"]) ? $context["formCreate"] : $this->getContext($context, "formCreate"));
    }

    public function getTemplateName()
    {
        return "CoreCategoryBundle:Admin:CommonCategory_edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 56,  140 => 57,  138 => 56,  130 => 51,  108 => 31,  105 => 30,  97 => 25,  93 => 24,  89 => 23,  85 => 22,  81 => 21,  70 => 17,  64 => 14,  60 => 13,  56 => 12,  52 => 11,  48 => 10,  43 => 8,  40 => 7,  34 => 4,  31 => 3,);
    }
}
