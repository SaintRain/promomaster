<?php

/* CoreOrderBundle:Admin/Form/Order/type:canceled_status_widget.html.twig */
class __TwigTemplate_b450e282f5ce99b1400244b03ccd61f7418e00dbdbaab3c3ca80134d46a728a4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'canceled_status_widget' => array($this, 'block_canceled_status_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('canceled_status_widget', $context, $blocks);
    }

    public function block_canceled_status_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        $context["order"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array());
        echo "        
        <input  type=\"checkbox\" ";
        // line 3
        if ((isset($context["data"]) ? $context["data"] : null)) {
            echo " checked=\"checked\"  ";
        }
        echo " ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " value=\"1\">

        <div class=\"extraCanceledFields well well-sm\" style=\"width:450px;margin-top:10px;margin-bottom: 0px;display:none\">
            <table cellpadding=\"5\" cellspacing=\"0\">
                <tr>
                    <td>Причина отмены *</td>
                    <td>
                        <select ";
        // line 10
        if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isCanceledStatus", array()) &&  !(isset($context["noDisable"]) ? $context["noDisable"] : null))) {
            echo " disabled ";
        }
        echo " style=\"width:300px\" class=\"reasonSelect\"  name=\"cancelExtra[reasonForCanceling]\" >
                            <option value=\"\">Ничего не выбрано...</option>
                            ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["reasons"]) ? $context["reasons"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 13
            echo "                                ";
            if (( !$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "shippedDateTime", array()) && ((($this->getAttribute($context["r"], "name", array()) == twig_constant("Core\\OrderBundle\\Entity\\Order::returnCanceledReasonName")) || ($this->getAttribute($context["r"], "name", array()) == twig_constant("Core\\OrderBundle\\Entity\\Order::reorderCanceledReasonName"))) && ( !$this->getAttribute($this->getAttribute(            // line 14
(isset($context["order"]) ? $context["order"] : null), "reasonForCanceling", array(), "any", false, true), "name", array(), "any", true, true) || (($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "reasonForCanceling", array()), "name", array()) != twig_constant("Core\\OrderBundle\\Entity\\Order::returnCanceledReasonName")) && ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "reasonForCanceling", array()), "name", array()) != twig_constant("Core\\OrderBundle\\Entity\\Order::reorderCanceledReasonName"))))))) {
                // line 16
                echo "                                ";
            } else {
                // line 17
                echo "                                    <option data-name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["r"], "name", array()), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["r"], "id", array()), "html", null, true);
                echo "\" ";
                if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "reasonForCanceling", array()) && ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "reasonForCanceling", array()), "id", array()) == $this->getAttribute($context["r"], "id", array())))) {
                    echo " selected=\"selected\" ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["r"], "captionRu", array()), "html", null, true);
                echo "</option>
                                ";
            }
            // line 19
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['r'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                        </select>
                    </td>
                </tr>

                <tr class=\"stockForCancelingRow\">
                    <td>Склад, на который вернули весь товар *</td>
                    <td>
                        <select ";
        // line 27
        if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isCanceledStatus", array()) &&  !(isset($context["noDisable"]) ? $context["noDisable"] : null))) {
            echo " disabled ";
        }
        echo " style=\"width:300px\" class=\"stockForCanceling\"  name=\"cancelExtra[stockForCanceling]\" >
                            <option value=\"\">Ничего не выбрано...</option>
                            ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stocks"]) ? $context["stocks"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 30
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "id", array()), "html", null, true);
            echo "\" ";
            if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "stockForCanceling", array()) && ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "stockForCanceling", array()), "id", array()) == $this->getAttribute($context["s"], "id", array())))) {
                echo " selected=\"selected\" ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "captionRu", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "                        </select>
                    </td>
                </tr>


                <tr >
                    <td>Удержать с баланса&nbsp;</td>
                    <td>
                        <input data-mask=\"money\" id=\"uderjatSbalansa\" ";
        // line 40
        if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isCanceledStatus", array()) &&  !(isset($context["noDisable"]) ? $context["noDisable"] : null))) {
            echo " disabled ";
        }
        echo " value=\"";
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "keepMoneySumForCanceling", array()), 2, ",", "."), "html", null, true);
        echo "\" style=\"width:200px\"  type=\"text\" name=\"cancelExtra[keepMoneySumForCanceling]\"  >&nbsp;";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "
                    </td>
                </tr>
                <tr>
                    <td valign=\"top\">Комментарий *<br /><span style=\"color: gray\">Текст будет доступен клиенту в e-mail и личном кабинете</span></td>
                    <td>
                        <textarea ";
        // line 46
        if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isCanceledStatus", array()) &&  !(isset($context["noDisable"]) ? $context["noDisable"] : null))) {
            echo " disabled ";
        }
        echo "  style=\"width:300px\" rows=\"4\"  name=\"cancelExtra[commentForCanceling]\" class=\"reasonComment span5\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "commentForCanceling", array()), "html", null, true);
        echo "</textarea>
                    </td>
                </tr>
            </table>
        </div>

        <script>
            \$(document).ready(function() {

                showHideExtraCanceledFields(false);
                showHideChancelStock();

                \$('.reasonSelect').change(function() {
                    showHideChancelStock();
                });

                \$('.cancelledStatus').click(function() {
                    showHideExtraCanceledFields(";
        // line 63
        if ((( !$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isCanceledStatus", array()) && $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isDeliveryIncludedInPayment", array())) && $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "shippedDateTime", array()))) {
            echo "true";
        } else {
            echo "false";
        }
        echo ");
                });

                function showHideChancelStock() {
                    var status = \$('.reasonSelect').find(\":selected\").attr('data-name');

                    if (status === '";
        // line 69
        echo twig_escape_filter($this->env, twig_constant("Core\\OrderBundle\\Entity\\Order::returnCanceledReasonName"), "html", null, true);
        echo "' || status === '";
        echo twig_escape_filter($this->env, twig_constant("Core\\OrderBundle\\Entity\\Order::otherCanceledReasonName"), "html", null, true);
        echo "') {
                        
                    ";
        // line 71
        if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "shippedDateTime", array()) || $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "stockForCanceling", array()))) {
            // line 72
            echo "                        \$('.stockForCancelingRow').show();
                        \$('.stockForCanceling').attr('required', 'required');
                        ";
        } else {
            // line 75
            echo "                            \$('.stockForCancelingRow').hide();
                        \$('.stockForCanceling').removeAttr('required');
                        ";
        }
        // line 78
        echo "                    }
                    else {
                        \$('.stockForCancelingRow').hide();
                        \$('.stockForCanceling').removeAttr('required');
                    }
                }

                function showHideExtraCanceledFields(setSum) {
                    if (\$('.cancelledStatus').attr(\"checked\") === \"checked\") {
                        var delliverySumForKeepMoneySumForCanceling = \"";
        // line 87
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCost", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCost", array()), "html", null, true);
        } else {
            echo "0.00";
        }
        echo "\";
                        if (setSum && \$('#uderjatSbalansa').val() == '0,00') {   //проставляем сумму доставки, которую следует удержать с баланса
                            \$('#uderjatSbalansa').inputmask('remove');
                            \$('#uderjatSbalansa').attr('value', delliverySumForKeepMoneySumForCanceling.replace('.', ','));
                            \$('#uderjatSbalansa').attr('data-mask', 'money');
                            setTimeout('setMaskForInputs();', 1);   //нужен такой кастыль, иначе в хроме не верно отрабатывает

                        }
                        \$('.extraCanceledFields').show();
                        \$('.reasonSelect').attr('required', 'required');
                        \$('.reasonComment').attr('required', 'required');

                    }
                    else {
                        \$('.extraCanceledFields').hide();
                        \$('.reasonSelect').removeAttr('required');
                        \$('.reasonComment').removeAttr('required');
                        \$('.stockForCanceling').removeAttr('required');
                    }
                }
            });
        </script>
        ";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order/type:canceled_status_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  210 => 87,  199 => 78,  194 => 75,  189 => 72,  187 => 71,  180 => 69,  167 => 63,  143 => 46,  128 => 40,  118 => 32,  103 => 30,  99 => 29,  92 => 27,  83 => 20,  77 => 19,  63 => 17,  60 => 16,  58 => 14,  56 => 13,  52 => 12,  45 => 10,  31 => 3,  26 => 2,  20 => 1,);
    }
}
