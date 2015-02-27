<?php

/* CoreLogisticsBundle:Admin\UnitInStock\type:unit_in_stock_defect_widget.html.twig */
class __TwigTemplate_f89d0dbec455d65e31db4f51bdecb765a3f584415a5220e6895a07fc4c9278e7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'unit_in_stock_defect_widget' => array($this, 'block_unit_in_stock_defect_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('unit_in_stock_defect_widget', $context, $blocks);
    }

    public function block_unit_in_stock_defect_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        $context["unit"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array());
        // line 3
        echo "        <input  type=\"checkbox\" ";
        if ((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data"))) {
            echo " checked=\"checked\"  ";
        }
        echo " ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " value=\"1\">

        <div class=\"extraCanceledFields well well-sm\" style=\"width:450px;margin-top:10px;margin-bottom: 0px;display:none\">
            <table cellpadding=\"5\" cellspacing=\"0\">
                <tr>
                    <td>Причина списания *</td>
                    <td>
                        <select ";
        // line 10
        if (($this->getAttribute((isset($context["unit"]) ? $context["unit"] : $this->getContext($context, "unit")), "isWithDefect", array()) &&  !(isset($context["noDisable"]) ? $context["noDisable"] : $this->getContext($context, "noDisable")))) {
            echo " disabled ";
        }
        echo " style=\"width:300px\" class=\"reasonSelect\"  name=\"defectExtra[defectReason]\" >
                            <option value=\"\">Ничего не выбрано...</option>
                            ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["reasons"]) ? $context["reasons"] : $this->getContext($context, "reasons")));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 13
            echo "                                <option data-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["r"], "name", array()), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["r"], "id", array()), "html", null, true);
            echo "\" ";
            if (($this->getAttribute((isset($context["unit"]) ? $context["unit"] : $this->getContext($context, "unit")), "defectReason", array()) && ($this->getAttribute($this->getAttribute((isset($context["unit"]) ? $context["unit"] : $this->getContext($context, "unit")), "defectReason", array()), "id", array()) == $this->getAttribute($context["r"], "id", array())))) {
                echo " selected=\"selected\" ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["r"], "captionRu", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['r'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "                        </select>
                    </td>
                </tr>
            </table>
        </div>

        <script>
            \$(document).ready(function() {
    

                \$('.defectStatus').click(function() {
                    showHideExtraCanceledFields();
                });

                showHideExtraCanceledFields();
               
                function showHideExtraCanceledFields() {
                    if (\$('.defectStatus').attr(\"checked\") === \"checked\") {
                        \$('.extraCanceledFields').show();
                        \$('.reasonSelect').attr('required', 'required');
                    }
                    else {
                        \$('.extraCanceledFields').hide();
                        \$('.reasonSelect').removeAttr('required');                        
                    }
                }
            });
        </script>
        ";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin\\UnitInStock\\type:unit_in_stock_defect_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  72 => 15,  55 => 13,  51 => 12,  44 => 10,  29 => 3,  26 => 2,  20 => 1,);
    }
}
