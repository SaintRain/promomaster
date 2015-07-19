<?php

/* CorePaymentBundle:Admin/Form:form_admin_fields.html.twig */
class __TwigTemplate_31e94c118a74913bdae30c3e50eeb99be39122c84f3473d0a5f170e6989c877b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'core_payment_admin_id_text_widget' => array($this, 'block_core_payment_admin_id_text_widget'),
            'core_payment_admin_isRefund_checkbox_widget' => array($this, 'block_core_payment_admin_isRefund_checkbox_widget'),
            'core_payment_admin_order_ajax_entity_widget' => array($this, 'block_core_payment_admin_order_ajax_entity_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "
";
        // line 9
        $this->displayBlock('core_payment_admin_id_text_widget', $context, $blocks);
        // line 21
        echo "
";
        // line 23
        $this->displayBlock('core_payment_admin_isRefund_checkbox_widget', $context, $blocks);
        // line 42
        echo "
";
        // line 44
        $this->displayBlock('core_payment_admin_order_ajax_entity_widget', $context, $blocks);
        // line 85
        echo "
";
    }

    // line 9
    public function block_core_payment_admin_id_text_widget($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        $context["payment"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array());
        // line 11
        echo "    ";
        if ($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "id", array())) {
            // line 12
            echo "
        <h4>Платеж #";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "id", array())), "html", null, true);
            echo " <span style=\"color:gray\">(от ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "createdAt", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo ")</span></h4>

    ";
        } else {
            // line 16
            echo "
        <h4>Новый платеж <span style=\"color:gray\">(от ";
            // line 17
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo ")</span></h4>

    ";
        }
    }

    // line 23
    public function block_core_payment_admin_isRefund_checkbox_widget($context, array $blocks = array())
    {
        // line 24
        echo "
    ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "

    <script>
        \$(function(){
            \$('.isRefundRow input[type=\"checkbox\"]').click(function(){
                if (\$(this).prop('checked')) {
                    \$('.hiddenRefundRows').slideDown('fast');
                } else {
                    \$('.hiddenRefundRows').slideUp('fast');
                }
            });
            if (\$('.isRefundRow input[type=\"checkbox\"]').prop('checked')) {
                \$('.hiddenRefundRows').show();
            }
        });
    </script>
";
    }

    // line 44
    public function block_core_payment_admin_order_ajax_entity_widget($context, array $blocks = array())
    {
        // line 45
        echo "    ";
        ob_start();
        // line 46
        echo "
        ";
        // line 47
        $context["order"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "order", array());
        // line 48
        echo "
        ";
        // line 49
        if ((isset($context["order"]) ? $context["order"] : null)) {
            // line 50
            echo "
            <h4>Платеж звязан с заказом <a href=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()))), "html", null, true);
            echo "\">#";
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
            echo "</a></h4>

            Статус(ы) заказа:

            ";
            // line 55
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isCheckedStatus", array())) {
                // line 56
                echo "                <span class=\"label label-default\">Проверен</span>
            ";
            }
            // line 58
            echo "
            ";
            // line 59
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isPaidStatus", array())) {
                // line 60
                echo "                <span class=\"label label-info\">Оплачен</span>
            ";
            }
            // line 62
            echo "
            ";
            // line 63
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isShippedStatus", array())) {
                // line 64
                echo "                <span class=\"label label-success\">Отгружен</span>
            ";
            }
            // line 66
            echo "
            ";
            // line 67
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isCanceledStatus", array())) {
                // line 68
                echo "                <span class=\"label label-important\">Отменён</span>
            ";
            }
            // line 70
            echo "
            ";
            // line 71
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extraStatus", array())) {
                // line 72
                echo "                &nbsp;<span style=\"color:#";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extraStatus", array()), "hex", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extraStatus", array()), "captionRu", array()), "html", null, true);
                echo "</span>
            ";
            }
            // line 74
            echo "
            <span class=\"hidden\">";
            // line 75
            $this->displayBlock("ajax_entity_widget", $context, $blocks);
            echo "</span>

        ";
        } else {
            // line 78
            echo "
            ";
            // line 79
            $this->displayBlock("ajax_entity_widget", $context, $blocks);
            echo "

        ";
        }
        // line 82
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:Admin/Form:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  192 => 82,  186 => 79,  183 => 78,  177 => 75,  174 => 74,  166 => 72,  164 => 71,  161 => 70,  157 => 68,  155 => 67,  152 => 66,  148 => 64,  146 => 63,  143 => 62,  139 => 60,  137 => 59,  134 => 58,  130 => 56,  128 => 55,  119 => 51,  116 => 50,  114 => 49,  111 => 48,  109 => 47,  106 => 46,  103 => 45,  100 => 44,  79 => 25,  76 => 24,  73 => 23,  65 => 17,  62 => 16,  54 => 13,  51 => 12,  48 => 11,  45 => 10,  42 => 9,  37 => 85,  35 => 44,  32 => 42,  30 => 23,  27 => 21,  25 => 9,  22 => 7,);
    }
}
