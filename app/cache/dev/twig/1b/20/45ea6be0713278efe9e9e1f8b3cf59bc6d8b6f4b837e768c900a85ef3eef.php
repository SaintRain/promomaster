<?php

/* CoreCategoryBundle:Form:FrontendCategory_widget.html.twig */
class __TwigTemplate_1b2045ea6be0713278efe9e9e1f8b3cf59bc6d8b6f4b837e768c900a85ef3eef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'FrontendCategory_widget' => array($this, 'block_FrontendCategory_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('FrontendCategory_widget', $context, $blocks);
    }

    public function block_FrontendCategory_widget($context, array $blocks = array())
    {
        // line 2
        echo "    <div class=\"row\">
        <div class=\"col-sm-6  \">

            <select name=\"selectMainCat\" class=\"selectMainCat form-control\">
                <option value=\"0\" style=\"color:gray\">...Выберите раздел</option>
                ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : $this->getContext($context, "categories")));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 8
            echo "                    <option ";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "selectMainCat"), "method") == $this->getAttribute($context["d"], "id", array()))) {
                echo " selected ";
            }
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "captionRu", array()), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "            </select>
        </div>
    </div>
    <div class=\"row \">
        <div class=\"col-sm-12  \">
            ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : $this->getContext($context, "categories")));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 16
            echo "                <div id=\"subCat";
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
            echo "\" class=\"subCat\" data-parent-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
            echo "\" style=\"";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "selectMainCat"), "method") != $this->getAttribute($context["d"], "id", array()))) {
                echo "display:none;";
            }
            echo "clear: both\">
                    <span class=\"help\">Отметьте разделы, которые соответствуют тематике вашего сайта:</span><br/>
                    <br/>
                    ";
            // line 19
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["d"], "__children", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["d2"]) {
                // line 20
                echo "                        <div style=\"float: left;width:270px; \"><label class=\"checkbox\"><input

                                        class=\"text_input\"
                                        type=\"checkbox\"
                                        value=\"";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["d2"], "id", array()), "html", null, true);
                echo "\"
                                        name=\"form[categories][]\"><i></i> ";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($context["d2"], "captionRu", array()), "html", null, true);
                echo "
                            </label>&nbsp;&nbsp;</div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d2'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "        </div>
    </div>




    <script>
        \$(function () {

            //отмечаем чекбоксы
            var selected = [";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "data", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "id", array()), "html", null, true);
            echo ", ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "]; //отмеченные данные
            for (var s_id in selected) {
                var pId = \$('input[type=\"checkbox\"][value=\"' + selected[s_id] + '\"]')
                        .prop(\"checked\", true)
                        .parents('.subCat')
                        .show()
                        .attr('data-parent-id');

                \$('.selectMainCat').val(pId);
            }

            \$('.selectMainCat').change(function () {
                var id = \$(this).find('option:selected').val();
                \$('.subCat').hide();
                \$('#subCat'+id).show();
            });

            //очищаем предыдущие значения
            \$('.selectMainCat').parents('form').submit(function () {
                \$('.subCat:hidden').find('input[type=\"checkbox\"]').each(function () {
                    \$(this).prop(\"checked\", false);
                })
            })

        })

    </script>

";
    }

    public function getTemplateName()
    {
        return "CoreCategoryBundle:Form:FrontendCategory_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  118 => 40,  106 => 30,  99 => 28,  90 => 25,  86 => 24,  80 => 20,  76 => 19,  63 => 16,  59 => 15,  52 => 10,  37 => 8,  33 => 7,  26 => 2,  20 => 1,);
    }
}
