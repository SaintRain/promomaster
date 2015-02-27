<?php

/* CoreOrderBundle:Admin/Form/ExtraStatus/type:extra_status_widget.html.twig */
class __TwigTemplate_23b9d13a67ad064be2848a0ecc0734e21d185da88b56da51aaa285edf9c5e0f8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'extra_status_widget' => array($this, 'block_extra_status_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('extra_status_widget', $context, $blocks);
    }

    public function block_extra_status_widget($context, array $blocks = array())
    {
        // line 2
        echo "       <input  type=\"hidden\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " value=\"";
        if ($this->getAttribute((isset($context["value"]) ? $context["value"] : null), "id", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "id", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
        }
        echo "\">
    <script>

            \$(document).ready(function() {
                var uniqId = \"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqId", array()), "html", null, true);
        echo "\";


                showHideExtraStatusOptions();


                \$('#' + uniqId + '_isCanceledStatus').click(function() {
                 showHideExtraStatusOptions();
                });

                \$('#' + uniqId + '_isShippedStatus').click(function() {
                 showHideExtraStatusOptions();
                });

                \$('#' + uniqId + '_isPaidStatus').click(function() {
                 showHideExtraStatusOptions();
                });

                \$('#' + uniqId + '_isCheckedStatus').click(function() {
                 showHideExtraStatusOptions();
                });


            function showHideExtraStatusOptions() {
                var
                    extraStatuses={
                        ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "extraStatusesData", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 33
            echo "                                ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
            echo ": {
                                    id:";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
            echo ",
                                    captionRu:'";
            // line 35
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["d"], "captionRu", array()), "js"), "html", null, true);
            echo "',
                                    generalStatus:'";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "generalStatus", array()), "html", null, true);
            echo "'
                                },
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                    };

                //определяем последний статус
                if (\$('#' + uniqId + '_isCanceledStatus').attr(\"checked\")) {
                    generalStatus=";
        // line 43
        echo twig_escape_filter($this->env, twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::canceledStatusCode"), "html", null, true);
        echo ";
                }
                else
                if (\$('#' + uniqId + '_isShippedStatus').attr(\"checked\")) {
                    generalStatus=";
        // line 47
        echo twig_escape_filter($this->env, twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::shippedStatusCode"), "html", null, true);
        echo ";
                }
                else if (\$('#' + uniqId + '_isPaidStatus').attr(\"checked\")) {
                    generalStatus=";
        // line 50
        echo twig_escape_filter($this->env, twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::paidStatusCode"), "html", null, true);
        echo ";
                }
                else
                if (\$('#' + uniqId + '_isCheckedStatus').attr(\"checked\")) {
                    generalStatus=";
        // line 54
        echo twig_escape_filter($this->env, twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::checkedStatusCode"), "html", null, true);
        echo ";
                }


                //очищаем список
                \$('#' + uniqId + '_extraStatus').select2({data:[]});
                if (typeof generalStatus!=='undefined') {
                   //добавляем элементы
                    var newData= [];
                    for (var index in extraStatuses) {
                        if (extraStatuses[index].generalStatus==generalStatus) {
                            newData.push({id:extraStatuses[index].id,text:extraStatuses[index].captionRu});
                        }
                    }
                    \$('#' + uniqId + '_extraStatus').select2({data:newData});
                }

            };
            });

        </script>
        ";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/ExtraStatus/type:extra_status_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  121 => 54,  114 => 50,  108 => 47,  101 => 43,  95 => 39,  86 => 36,  82 => 35,  78 => 34,  73 => 33,  69 => 32,  40 => 6,  26 => 2,  20 => 1,);
    }
}
