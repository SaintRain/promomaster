<?php

/* CoreBannerBundle:Banner\Cabinet:edit.html.twig */
class __TwigTemplate_a50cd8e11d0ce192a9d66abc1bb5d15341ddc217a8af0335800906b7a57a9f41 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            echo "Редактирование настроек баннера";
        } else {
            echo "Добавление баннера в систему";
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
                <h1 class=\"pull-left\">Сайты</h1>
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
        echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_list_first_page");
        echo "\">Список ваших баннеров</a></li>
                    <li class=\"active\">Редактирование настроек вашего баннера</li>
                </ul>
            </div>
        </div>
        <!--=== End Breadcrumbs ===-->
    ";
    }

    // line 27
    public function block_sub_content($context, array $blocks = array())
    {
        // line 28
        echo "
    ";
        // line 29
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            // line 30
            echo "        <h3>Редактирование настроек вашего баннера</h3>
    ";
        } else {
            // line 32
            echo "        <h3>Добавление нового баннера в систему</h3>
    ";
        }
        // line 34
        echo "

    ";
        // line 37
        echo "    ";
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            // line 38
            echo "        ";
            echo twig_include($this->env, $context, (("CoreBannerBundle:Banner\\Cabinet\\Forms:" . (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type"))) . "BannerForm.html.twig"), array("show" => true, "banner" => (isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "form" => (isset($context["form"]) ? $context["form"] : $this->getContext($context, "form"))));
            echo "
    ";
        } else {
            // line 40
            echo "        ";
            echo twig_include($this->env, $context, "CoreBannerBundle:Banner\\Cabinet\\Forms:imageBannerForm.html.twig", array("show" => false, "banner" => (isset($context["imageBanner"]) ? $context["imageBanner"] : $this->getContext($context, "imageBanner")), "form" => (isset($context["imageBannerForm"]) ? $context["imageBannerForm"] : $this->getContext($context, "imageBannerForm"))));
            echo "
        ";
            // line 41
            echo twig_include($this->env, $context, "CoreBannerBundle:Banner\\Cabinet\\Forms:flashBannerForm.html.twig", array("show" => false, "banner" => (isset($context["flashBanner"]) ? $context["flashBanner"] : $this->getContext($context, "flashBanner")), "form" => (isset($context["flashBannerForm"]) ? $context["flashBannerForm"] : $this->getContext($context, "flashBannerForm"))));
            echo "
        ";
            // line 42
            echo twig_include($this->env, $context, "CoreBannerBundle:Banner\\Cabinet\\Forms:codeBannerForm.html.twig", array("show" => false, "banner" => (isset($context["codeBanner"]) ? $context["codeBanner"] : $this->getContext($context, "codeBanner")), "form" => (isset($context["codeBannerForm"]) ? $context["codeBannerForm"] : $this->getContext($context, "codeBannerForm"))));
            echo "
    ";
        }
        // line 44
        echo "

    <script>
        \$(function () {
            ";
        // line 48
        if ((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type"))) {
            // line 49
            echo "                \$('#form_";
            echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
            echo "').show();
            ";
        }
        // line 51
        echo "
            \$('.banner_type').change(function () {
                var type = \$(this).find('option:selected').val();
                //выставляем исходное состояние
                \$('#form_image .banner_type').val('image');
                \$('#form_flash .banner_type').val('flash');
                \$('#form_code .banner_type').val('code');

                \$('.sky-form').hide();
                \$('#form_' + type).show();
            });


            ";
        // line 64
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            // line 65
            echo "            \$('.delete').click(function () {
                var res = confirm('Вы действительно хотите удалить этот баннер из системы?');
                if (res) {
                    window.location.href = '";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_banner_delete", array("id" => $this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array()))), "html", null, true);
            echo "';
                }
            });
            ";
        }
        // line 72
        echo "        })
    </script>

";
    }

    public function getTemplateName()
    {
        return "CoreBannerBundle:Banner\\Cabinet:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 72,  168 => 68,  163 => 65,  161 => 64,  146 => 51,  140 => 49,  138 => 48,  132 => 44,  127 => 42,  123 => 41,  118 => 40,  112 => 38,  109 => 37,  105 => 34,  101 => 32,  97 => 30,  95 => 29,  92 => 28,  89 => 27,  78 => 18,  74 => 17,  70 => 16,  63 => 11,  60 => 10,  55 => 7,  50 => 6,  40 => 5,  11 => 2,);
    }
}
