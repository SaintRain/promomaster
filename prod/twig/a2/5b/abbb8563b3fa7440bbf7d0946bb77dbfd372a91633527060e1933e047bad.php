<?php

/* CoreSiteBundle:Section/Cabinet:edit.html.twig */
class __TwigTemplate_a25babbb8563b3fa7440bbf7d0946bb77dbfd372a91633527060e1933e047bad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(2);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'sub_content' => array($this, 'block_sub_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataUserBundle::cabinet_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig"));
        // line 2
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "id", array())) {
            echo "Редактирование раздела рекламного места";
        } else {
            echo "Добавление раздела рекламного места в систему";
        }
    }

    // line 6
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 7
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 10
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 11
        echo "        <!--=== Breadcrumbs ===-->
        <div class=\"breadcrumbs\">
            <div class=\"container\">
                <h1 class=\"pull-left\">Разделы для рекламных мест</h1>
                <ul class=\"pull-right breadcrumb\">
                    <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">На главную</a></li>
                    <li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
        echo "\">Кабинет</a></li>
                    <li><a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("core_cabinet_adplace_list_first_page");
        echo "\">Список ваших рекламных мест</a></li>
                    <li><a href=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("core_cabinet_section_list_first_page");
        echo "\">Список разделов</a></li>

                    <li class=\"active\">";
        // line 21
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "id", array())) {
            echo "Редактирование раздела";
        } else {
            echo "Добавление раздела";
        }
        echo "</li>
                </ul>
            </div>
        </div>
        <!--=== End Breadcrumbs ===-->
    ";
    }

    // line 29
    public function block_sub_content($context, array $blocks = array())
    {
        // line 30
        echo "


        <div class=\"tab-v2\">
            <ul class=\"nav nav-tabs\">
                <li class=\"\"><a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("core_cabinet_adplace_list_first_page");
        echo "\" >Рекламное место</a></li>
                <li class=\"active\"><a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("core_cabinet_section_list_first_page");
        echo "\" >Разделы</a></li>
            </ul>
            <div class=\"tab-content\">
                <div class=\"tab-pane fade active in\" id=\"tab1\">
                    ";
        // line 40
        echo twig_include($this->env, $context, "CoreSiteBundle:Section\\Cabinet\\Form:section.html.twig");
        echo "
                </div>
                <div class=\"tab-pane fade\" id=\"tab2\">

                </div>
            </div>
        </div>


";
    }

    public function getTemplateName()
    {
        return "CoreSiteBundle:Section/Cabinet:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 40,  118 => 36,  114 => 35,  107 => 30,  104 => 29,  90 => 21,  85 => 19,  81 => 18,  77 => 17,  73 => 16,  66 => 11,  63 => 10,  58 => 7,  53 => 6,  43 => 5,  39 => 2,  37 => 3,  11 => 2,);
    }
}
