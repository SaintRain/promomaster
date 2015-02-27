<?php

/* CoreProductBundle:Admin\Form\category_main_widget:category_main_widget.html.twig */
class __TwigTemplate_d7aef63b980a61de7f987e476fe5902abd45af1d9f9e9efadacdacf38831c021 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'category_main_widget' => array($this, 'block_category_main_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('category_main_widget', $context, $blocks);
    }

    public function block_category_main_widget($context, array $blocks = array())
    {
        // line 2
        echo "   ";
        $this->displayBlock("choice_widget", $context, $blocks);
        echo "
    <script>
        \$(document).ready(function() {
            var categoryMainId =";
        // line 5
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "categoryMain", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "categoryMain", array()), "id", array()), "html", null, true);
        } else {
            echo " false";
        }
        echo ",
                    isChanged = false;
            function setCategoryMain() {
                var categoryMain = \$(\"#";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_categoryMain\"),
                        categoriesContent = \$(\"#jsTreeContent_";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_categories\");

                //очищаем и подсвечиваем новю категорию
                categoryMain.empty()
                        .append(\$('<option></option>')
                                .val('').attr('selected', 'selected').html('Ничего не выбрано...'));
                categoryMain.select2(\"val\", '')

                //берём отмеченные категории
                \$('#jsTreeContent_";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_categories').find('.jstree-checked').each(function(index) {
                    var id_str = \$(this).attr('id'),
                            id = parseInt(id_str.split('_')[1]),
                            lvl = parseInt(\$(this).find('a').attr('data-lvl'));

                    var text = \$(this).find('a').first().text();
                    text = text.replace(/^\\s+/, \"\");

                    var lvl_text = '';
                    for (var i = 0; i < lvl; i++) {
                        lvl_text = lvl_text + '&nbsp;&nbsp;&nbsp;&nbsp;';
                    }
                    text = lvl_text + text;

                    if (isChanged) {
                        if (isChanged === id) {
                            categoryMain.append(\$('<option></option>').val(id).html(text));
                            categoryMain.select2(\"val\", id)
                        }
                        else {
                            categoryMain.append(\$('<option></option>').val(id).html(text));
                        }
                    }
                    else if (categoryMainId === id) {
                        categoryMain.append(\$('<option></option>').val(id).html(text));
                        categoryMain.select2(\"val\", id)
                    }
                    else {
                        categoryMain.append(\$('<option></option>').val(id).html(text));
                    }
                });
            }


            \$(\"#";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_categoryMain\").on('change', function() {
                categoryMainId = false;
                isChanged = parseInt(\$(this).val());
            })

            \$(\"#jsTreeContent_";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_categories\").bind(\"check_node.jstree\", function(event, data) {
                setCategoryMain()
            });

            \$(\"#jsTreeContent_";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_categories\").bind(\"uncheck_node.jstree\", function(event, data) {
                setCategoryMain()
            });
            //очищаем
            \$(\"#";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_categoryMain\").empty().append(\$('<option></option>')
                    .val('').attr('selected', 'selected').html('Ничего не выбрано...'))
                    .select2(\"val\", '');

        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin\\Form\\category_main_widget:category_main_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  118 => 65,  111 => 61,  104 => 57,  96 => 52,  59 => 18,  47 => 9,  43 => 8,  33 => 5,  26 => 2,  20 => 1,);
    }
}
