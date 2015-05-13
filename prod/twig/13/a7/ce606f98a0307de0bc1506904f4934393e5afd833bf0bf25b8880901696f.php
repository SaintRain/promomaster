<?php

/* CoreCategoryBundle:Admin/Form:caregory_widget.html.twig */
class __TwigTemplate_13a7ce606f98a0307de0bc1506904f4934393e5afd833bf0bf25b8880901696f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'category_widget' => array($this, 'block_category_widget'),
            'java_script' => array($this, 'block_java_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('category_widget', $context, $blocks);
    }

    public function block_category_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        ob_start();
        // line 3
        echo "    ";
        $this->displayBlock('java_script', $context, $blocks);
        // line 22
        echo "
    <div class=\"sonata-ba-side-menu\" style=\"padding: 0px 0;overflow-x: auto;\">
        <div id=\"findContentForm_";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\" class=\"form-inline\" action=\"#\" style=\"padding: 8px\">
            <button class=\"btn btn-mini\" id=\"openTreeButton_";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\"  type=\"button\"><i class=\"icon-folder-open\"></i> Развернуть</button>&nbsp;
            <button class=\"btn btn-mini\"  id=\"closeTreeButton_";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\" type=\"button\"><i class=\"icon-folder-close\"></i> Свернуть</button>&nbsp;
            <button class=\"btn btn-mini\"  id=\"checkAllTreeButton_";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\" type=\"button\"><i class=\"icon-check\"></i> Отметить всё</button>&nbsp;
            <button class=\"btn btn-mini\"  id=\"uncheckAllTreeButton_";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\" type=\"button\"> Снять всё</button>&nbsp;

            <button class=\"btn btn-mini\" id=\"searchTreeButton_";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\"  type=\"button\"><i class=\"icon-search\"></i> Поиск</button>&nbsp;
            <span id=\"findContent_";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\" style=\"display:none\">
                <input id=\"serachKey_";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\" class=\"span2\" type=\"text\" placeholder=\"Фраза для поиска...\">&nbsp;
                <button id=\"findInTreeButton_";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\" class=\"btn btn-mini\" type=\"button\"><i class=\"icon-ok\"></i> Найти</button>&nbsp;
                <button id=\"cleareFindInTreeButton_";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\" class=\"btn btn-mini\"  type=\"button\"><i class=\"icon-tint\"></i> Очистить</button>&nbsp;
                <button id=\"removeFindInTreeButton_";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\" class=\"btn btn-mini\"  type=\"button\"><i class=\"icon-remove-sign\"></i> Убрать</button>
            </span>
        </div>
        <div id=\"jsTreeContent_";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\" >";
        echo (isset($context["treeHtml"]) ? $context["treeHtml"] : null);
        echo "</div>
        <select ";
        // line 39
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo "   multiple=\"multiple\">
        </select>
    </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 3
    public function block_java_script($context, array $blocks = array())
    {
        // line 4
        echo "<script>
    ";
        // line 5
        if ((isset($context["firstTree"]) ? $context["firstTree"] : null)) {
            // line 6
            echo "    var treeParams = [];
    ";
        }
        // line 8
        echo "    treeParams[\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\"] = {
        selected: [";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "data", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "id", array()), "html", null, true);
            echo ",";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "], //отмеченные данные
        fieldId: \"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\",
        objectId: \"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "id", array()), "html", null, true);
        echo "\"
    };
    </script>
    ";
        // line 14
        if ((isset($context["firstTree"]) ? $context["firstTree"] : null)) {
            // line 15
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/corecategory/js/sprintf.min.js"), "html", null, true);
            echo "\"></script>
    <script type=\"text/javascript\" src=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/corecategory/js/jstree/_lib/jquery.cookie.js"), "html", null, true);
            echo "\"></script>
    <script type=\"text/javascript\" src=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/corecategory/js/jstree/_lib/jquery.hotkeys.js"), "html", null, true);
            echo "\"></script>
    <script type=\"text/javascript\" src=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/corecategory/js/jstree/jquery.jstree.js"), "html", null, true);
            echo "\"></script>
    <script type=\"text/javascript\" src=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/corecategory/js/treeinclude.js"), "html", null, true);
            echo "\"></script>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreCategoryBundle:Admin/Form:caregory_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  157 => 19,  153 => 18,  149 => 17,  145 => 16,  140 => 15,  138 => 14,  132 => 11,  128 => 10,  116 => 9,  111 => 8,  107 => 6,  105 => 5,  102 => 4,  99 => 3,  90 => 39,  84 => 38,  78 => 35,  74 => 34,  70 => 33,  66 => 32,  62 => 31,  58 => 30,  53 => 28,  49 => 27,  45 => 26,  41 => 25,  37 => 24,  33 => 22,  30 => 3,  27 => 2,  21 => 1,);
    }
}
