<?php

/* CorePropertyBundle:Admin/Form:property_caregory_widget.html.twig */
class __TwigTemplate_5ca852f5c1fedc3cfe3aff98edcc279fdf37104a223e6b39a3675dac906e5ab7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCategoryBundle::Admin/Form/caregory_widget.html.twig");

        $this->blocks = array(
            'property_category_widget' => array($this, 'block_property_category_widget'),
            'category_widget' => array($this, 'block_category_widget'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCategoryBundle::Admin/Form/caregory_widget.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_property_category_widget($context, array $blocks = array())
    {
        // line 3
        $this->displayBlock('category_widget', $context, $blocks);
        // line 4
        ob_start();
        // line 5
        echo "<script>
    var 
            PropertySettings = {
        url_settingscategoryproperty_create: \"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("admin_core_property_settingscategoryproperty_create");
        echo "?uniqid=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "\",
        url_settingscategoryproperty_edit: \"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("admin_core_property_settingscategoryproperty_edit", array("id" => "__id"));
        echo "?uniqid=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "\",
        url_settingscategoryproperty_delete: \"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("admin_core_property_settingscategoryproperty_delete", array("id" => "__id"));
        echo "?uniqid=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "\",

        settings_category: {
        ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "settingsCategory", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["sc"]) {
            // line 14
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["sc"], "id", array()), "html", null, true);
            echo ":";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["sc"], "category", array()), "id", array()), "html", null, true);
            echo ",
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "            },
        uniqid : \"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "\",
        propertyId: \"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "id", array()), "html", null, true);
        echo "\"
    }
    </script>
    <script type=\"text/javascript\" src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/coreproperty/js/jquery.contextmenu.r2.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/coreproperty/js/property_category.js"), "html", null, true);
        echo "\"></script>

    <style>
            img.settingsCategory {
                margin-left: 5px;
                margin-bottom: 2px;
                cursor: pointer;
            }
        </style>

        <div class=\"hide\" id=\"propertyCategoryContextMenu\">
            <ul class=\"propertyCategoryContextMenuUl\">
                <li id=\"createSettings\">Создать настройку</li>
                <li id=\"editSettings\">Редактировать настройку</li>
                <li id=\"removeSettings\">Удалить настройку</li>
                <li id=\"editCategory\">Редактировать категорию</li>
            </ul>
        </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 41
        echo "
";
    }

    // line 3
    public function block_category_widget($context, array $blocks = array())
    {
        $this->displayParentBlock("category_widget", $context, $blocks);
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Admin/Form:property_caregory_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 3,  115 => 41,  93 => 22,  89 => 21,  83 => 18,  79 => 17,  76 => 16,  65 => 14,  61 => 13,  53 => 10,  47 => 9,  41 => 8,  36 => 5,  34 => 4,  32 => 3,  29 => 2,);
    }
}
