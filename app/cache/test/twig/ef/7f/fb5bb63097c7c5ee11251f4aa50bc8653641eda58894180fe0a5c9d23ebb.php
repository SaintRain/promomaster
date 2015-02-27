<?php

/* CoreProductBundle:Admin/Form/manufacturer_main_widget:manufacturer_main_widget.html.twig */
class __TwigTemplate_ef7ffb5bb63097c7c5ee11251f4aa50bc8653641eda58894180fe0a5c9d23ebb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'manufacturer_main_widget' => array($this, 'block_manufacturer_main_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('manufacturer_main_widget', $context, $blocks);
    }

    public function block_manufacturer_main_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        $this->displayBlock("choice_widget", $context, $blocks);
        echo "

    <a style=\"margin-left:5px;display:none\" id=\"manufacturerMainIdLink\" title=\"Перейти на редактирование\" target=\"_blank\"
       href=\"#\">
        <i class=\"icon-edit\"></i>
    </a>
    <script>
        \$(document).ready(function() {
            var manufacturerMainId =";
        // line 10
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "manufacturerMain", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "manufacturerMain", array()), "id", array()), "html", null, true);
        } else {
            echo " false";
        }
        echo ",
                    isChanged = false;

            function setManufacturerMain() {
                var manufacturerMain = \$(\"#";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_manufacturerMain\");

                \$('#manufacturerMainIdLink').hide();

                //очищаем и подсвечиваем новю категорию
                manufacturerMain.empty()
                        .append(\$('<option></option>')
                                .val('').attr('selected', 'selected').html('Ничего не выбрано...'));
                manufacturerMain.select2(\"val\", '')

                //берём отмеченные категории
                \$('#";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_manufacturers').find(\":selected\").each(function(index) {
                    var text = \$(this).text(),
                            id = parseInt(\$(this).val());

                    if (isChanged) {
                        if (isChanged === id) {
                            manufacturerMain.append(\$('<option></option>').val(id).html(text));
                            manufacturerMain.select2(\"val\", id)
                            \$('#manufacturerMainIdLink').show();
                        }
                        else {
                            manufacturerMain.append(\$('<option></option>').val(id).html(text));
                        }
                    }
                    else if (manufacturerMainId === id) {
                        manufacturerMain.append(\$('<option></option>').val(id).html(text));
                        manufacturerMain.select2(\"val\", id);
                        \$('#manufacturerMainIdLink').show();
                    }
                    else {
                        manufacturerMain.append(\$('<option></option>').val(id).html(text));
                    }

                });
            }


            \$(\"#";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_manufacturerMain\").on('change', function() {
                manufacturerMainId = false;

                //выставляем ссылку редактирования
                var manufacturerMain=\$(this);
                var link = \"";
        // line 57
        echo $this->env->getExtension('routing')->getPath("admin_core_manufacturer_manufacturer_edit", array("id" => "__s"));
        echo "\";
                var m_id=manufacturerMain.find(\":selected\").attr('value');
                if (m_id) {
                    \$('#manufacturerMainIdLink').show().attr('href', link.replace('__s', m_id));
                }
                else {
                    \$('#manufacturerMainIdLink').hide();
                }

                isChanged = parseInt(\$(this).val());

            });

            \$(\"#";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_manufacturers\").change(function(event) {
                setManufacturerMain();
            });
            setManufacturerMain();

        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/Form/manufacturer_main_widget:manufacturer_main_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  117 => 70,  101 => 57,  93 => 52,  63 => 25,  49 => 14,  38 => 10,  26 => 2,  20 => 1,);
    }
}
