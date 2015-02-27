<?php

/* CoreOrderBundle:Admin/Form/PreOrder:form_admin_fields.html.twig */
class __TwigTemplate_0dcf72069fd1c714bea520a140a8503589a3b1ffa92e5774f12300d9c802a250 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'core_pre_order_admin_id_text_widget' => array($this, 'block_core_pre_order_admin_id_text_widget'),
            'core_pre_order_admin_contragent_shtumi_dependent_filtered_entity_widget' => array($this, 'block_core_pre_order_admin_contragent_shtumi_dependent_filtered_entity_widget'),
            'core_pre_order_admin_cancelReason_textarea_widget' => array($this, 'block_core_pre_order_admin_cancelReason_textarea_widget'),
            'core_pre_order_admin_compositions_sonata_type_collection_widget' => array($this, 'block_core_pre_order_admin_compositions_sonata_type_collection_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 17
        echo "
";
        // line 19
        $this->displayBlock('core_pre_order_admin_id_text_widget', $context, $blocks);
        // line 28
        echo "
";
        // line 30
        $this->displayBlock('core_pre_order_admin_contragent_shtumi_dependent_filtered_entity_widget', $context, $blocks);
        // line 53
        $this->displayBlock('core_pre_order_admin_cancelReason_textarea_widget', $context, $blocks);
        // line 84
        $this->displayBlock('core_pre_order_admin_compositions_sonata_type_collection_widget', $context, $blocks);
        // line 96
        echo "    ";
    }

    // line 19
    public function block_core_pre_order_admin_id_text_widget($context, array $blocks = array())
    {
        // line 20
        echo "    ";
        $context["order"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array());
        // line 21
        echo "    ";
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())) {
            // line 22
            echo "        <h4>Предзаказ #";
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
            echo " <span
                    style=\"color:gray\">(от ";
            // line 23
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo ")</span></h4>
    ";
        } else {
            // line 25
            echo "        <h4>Новый предзаказ <span style=\"color:gray\">(от ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo ")</span></h4>
    ";
        }
    }

    // line 30
    public function block_core_pre_order_admin_contragent_shtumi_dependent_filtered_entity_widget($context, array $blocks = array())
    {
        // line 31
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "&nbsp;
    <a class=\"btn select-contragent-contacts";
        // line 32
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "disabled", array())) {
            echo " disabled";
        }
        echo "\" href=\"javascript:void(0);\"><i
                class=\"icon icon-list\"></i>&nbsp;Получатели контрагента</a>
    <div id=\"modal-contacts\" class=\"modal hide\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\"
         aria-hidden=\"true\">
        <div class=\"modal-header\">
            <button aria-hidden=\"true\" data-dismiss=\"modal\" class=\"close\" type=\"button\">×</button>
            <h3>Выберите получателя для автозаполнения</h3>
        </div>
        <div class=\"modal-body\">
            <ul class=\"unstyled\" id=\"contragent-contacts\"></ul>
        </div>
        <div class=\"modal-footer\">
            <a data-dismiss=\"modal\" class=\"btn\" href=\"#\">Закрыть</a>
        </div>
    </div>
    <script>
        adminRoutes['admin_core_order_preorder_preorder_contact'] = '";
        // line 48
        echo $this->env->getExtension('routing')->getPath("admin_core_order_preorder_preorder_contact");
        echo "';
        adminRoutes['core_pre_order_cost'] = \"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("core_pre_order_cost");
        echo "\";
    </script>
    <script src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/js/preorder.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    // line 53
    public function block_core_pre_order_admin_cancelReason_textarea_widget($context, array $blocks = array())
    {
        // line 54
        echo "    <div id=\"cancel-reason-wr\" class=\"well well-sm span6\">
        <div class=\"control-group\">
            ";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "children", array()), "preDefinedAnswers", array()), 'label');
        echo "
            <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                ";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "children", array()), "preDefinedAnswers", array()), 'widget');
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            ";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        </div>
        <div>
            <a id=\"cancel-predefined-create\" class=\"btn btn-small sonata-ba-action\" href=\"javascript:void(0);\">
                <i class=\"icon-plus\"></i>Добавить ответ
            </a>
            <a id=\"preview-cancel-msg\" class=\"btn-info btn btn-small sonata-ba-action\" href=\"";
        // line 68
        echo $this->env->getExtension('routing')->getPath("admin_core_order_preorder_preorder_previewCancelMsg");
        echo "\">
                <i class=\"icon-eye-open\"></i>Просмотреть письмо
            </a>
            ";
        // line 71
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "isSendCancelMsg", array())) {
            // line 72
            echo "                ";
            $context["imagePrefix"] = "";
            // line 73
            echo "            ";
        } else {
            // line 74
            echo "                ";
            $context["imagePrefix"] = "dont_";
            // line 75
            echo "            ";
        }
        // line 76
        echo "            <div class=\"checkbox-msg-wr\">
                ";
        // line 77
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "children", array()), "isSendCancelMsg", array()), 'widget');
        echo "
                <label title=\"Нужно ли отправлять уведомление заказчику при отмене\" class=\"checkbox-label-msg\" for=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "children", array()), "isSendCancelMsg", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\"></label>
            </div>
        </div>
    </div>
    <br >
";
    }

    // line 84
    public function block_core_pre_order_admin_compositions_sonata_type_collection_widget($context, array $blocks = array())
    {
        // line 85
        echo "    <div class=\"control-group\">
        
        ";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        ";
        // line 88
        if (((!$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "order", array())) && (!$this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "isXmlHttpRequest", array(), "method")))) {
            // line 89
            echo "            <br>
            <div id=\"pre_order_cost_wr\" ";
            // line 90
            if ((!$this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "compositions", array()), "count", array()))) {
                echo " style=\"display:none\" ";
            }
            echo ">
                <span class=\"pre_order_cost_text\">Итого:</span>
                <div id=\"pre_order_cost\">Подождите происходит расчет...</div>
            </div>
        ";
        }
        // line 95
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/PreOrder:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  203 => 95,  193 => 90,  190 => 89,  188 => 88,  184 => 87,  180 => 85,  177 => 84,  167 => 78,  163 => 77,  160 => 76,  157 => 75,  154 => 74,  151 => 73,  148 => 72,  146 => 71,  140 => 68,  131 => 62,  124 => 58,  119 => 56,  115 => 54,  112 => 53,  106 => 51,  101 => 49,  97 => 48,  76 => 32,  71 => 31,  68 => 30,  60 => 25,  55 => 23,  50 => 22,  47 => 21,  44 => 20,  41 => 19,  37 => 96,  35 => 84,  33 => 53,  31 => 30,  28 => 28,  26 => 19,  23 => 17,);
    }
}
