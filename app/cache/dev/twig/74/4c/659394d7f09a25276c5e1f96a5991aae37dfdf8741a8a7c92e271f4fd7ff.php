<?php

/* CoreSiteBundle:AdPlace\Form:adolace_edit.html.twig */
class __TwigTemplate_744c659394d7f09a25276c5e1f96a5991aae37dfdf8741a8a7c92e271f4fd7ff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "


";
        // line 4
        if ($this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array())) {
            // line 5
            echo "    <h3>Редактирование настроек вашего рекламного места</h3>
";
        } else {
            // line 7
            echo "    <h3>Добавление нового рекламного места в систему</h3>
";
        }
        // line 9
        echo "

    ";
        // line 12
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 13
            echo "        <br/>
        <div class=\"alert alert-success fade in\">
            ";
            // line 15
            echo $context["flashMessage"];
            echo "

            &nbsp;&nbsp;&nbsp;<a class='btn-u btn-u-xs ' href='";
            // line 17
            echo $this->env->getExtension('routing')->getPath("core_cabinet_adplace_create");
            echo "'><i
                        class='fa fa-plus-square'></i> &nbsp;Добавить еще рекламное место</a>
            &nbsp;&nbsp;&nbsp;
            <a class='btn-u btn-u-xs btn-u-default' href='";
            // line 20
            echo $this->env->getExtension('routing')->getPath("core_cabinet_adplace_list_first_page");
            echo "'><i
                        class='fa fa-reply'></i> &nbsp;Вернуться к списку рекламных мест</a>

        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "

    ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 28
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 30
            echo $context["flashMessage"];
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "

    ";
        // line 35
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array()))) {
            // line 36
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 38
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
        </div>
    ";
        }
        // line 41
        echo "
<form style=\"clear: both\" class=\"sky-form sky-form-other-style\"
      action=\"";
        // line 43
        if ($this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array())) {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_adplace_edit", array("id" => $this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array()))), "html", null, true);
        } else {
            echo $this->env->getExtension('routing')->getPath("core_cabinet_adplace_create");
        }
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo "
      method=\"POST\">
    <fieldset class=\"sky-form-other-style\">

        <div class=\"row margin-bottom-20\">
            <div class=\"col-lg-6  ";
        // line 48
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "site", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Сайт*</label>
                ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "site", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "site", array()), 'errors');
        echo "
                <span class=\"help\">Выберите сайт на котором распологается рекламное место.</span>
            </div>
        </div>

        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-6  ";
        // line 57
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Название*</label>
                ";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

                ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-6  ";
        // line 67
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "size", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Размер*</label>
                ";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "size", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "size", array()), 'errors');
        echo "
            </div>
        </div>

        <div class=\"row margin-bottom-20 extraSize\" style=\"display: none\">
            <div class=\"col-sm-6  ";
        // line 75
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "height", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Высота*</label>
                ";
        // line 77
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "height", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 78
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "height", array()), 'errors');
        echo "
                <span class=\"help\">Введите высоту рекламного места в пикселях.</span>
            </div>
        </div>

        <div class=\"row margin-bottom-20 extraSize\" style=\"display: none\">
            <div class=\"col-sm-6  ";
        // line 84
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "width", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Ширина*</label>
                ";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "width", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "width", array()), 'errors');
        echo "
                <span class=\"help\">Введите ширину рекламного места в пикселях.</span>
            </div>
        </div>


        <div class=\"margin-bottom-20 ";
        // line 93
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isShowInCatalog", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
            <label class=\"checkbox\">
                ";
        // line 95
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isShowInCatalog", array()), 'widget');
        echo "<i></i> Выводить в каталог</label>
            ";
        // line 96
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isShowInCatalog", array()), 'errors');
        echo "
            </label>
        </div>


        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-6  ";
        // line 102
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sections", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Разделы</label>
                ";
        // line 104
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sections", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 105
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sections", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\"margin-bottom-20\">
        </div>

        ";
        // line 113
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

        <div class=\"text-right\">
            <button class=\"btn-u\" type=\"submit\">";
        // line 116
        if ($this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array())) {
            echo "Сохранить";
        } else {
            echo "Добавить";
        }
        echo "</button>
            &nbsp;&nbsp;
            <a href=\"";
        // line 118
        echo $this->env->getExtension('routing')->getPath("core_cabinet_site_list_first_page");
        echo "\" class=\"btn-u btn-u-default\">Отмена</a>
            ";
        // line 119
        if ($this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array())) {
            // line 120
            echo "                &nbsp;&nbsp; или &nbsp;&nbsp;
                <a href=\"javascript:void(0);\" class=\"delete btn-u btn-u-red\">Удалить</a>
            ";
        }
        // line 123
        echo "        </div>
    </fieldset>
</form>


<script>
    \$(function () {
        \$('#form_size').change(function () {
            if (\$(this).find('option:selected').attr('data-name') == 'specialnoe') {
                \$('.extraSize').show();
                \$('#form_height').attr('required', 'required');
                \$('#form_width').attr('required', 'required');
            }
            else {
                \$('.extraSize').hide();
                \$('#form_height').removeAttr('required');
                \$('#form_width').removeAttr('required');
            }
        });

        \$('#form_size').change();

        ";
        // line 145
        if ($this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array())) {
            // line 146
            echo "        \$('.delete').click(function () {
            var res = confirm('Вы действительно хотите удалить это рекламное место из системы?');
            if (res) {
                window.location.href = '";
            // line 149
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_adplace_delete", array("id" => $this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array()))), "html", null, true);
            echo "';
            }
        });
        ";
        }
        // line 153
        echo "    })
</script>



";
    }

    public function getTemplateName()
    {
        return "CoreSiteBundle:AdPlace\\Form:adolace_edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  330 => 153,  323 => 149,  318 => 146,  316 => 145,  292 => 123,  287 => 120,  285 => 119,  281 => 118,  272 => 116,  266 => 113,  255 => 105,  251 => 104,  244 => 102,  235 => 96,  231 => 95,  224 => 93,  215 => 87,  211 => 86,  204 => 84,  195 => 78,  191 => 77,  184 => 75,  176 => 70,  172 => 69,  165 => 67,  156 => 61,  151 => 59,  144 => 57,  135 => 51,  131 => 50,  124 => 48,  110 => 43,  106 => 41,  100 => 38,  96 => 36,  94 => 35,  90 => 33,  81 => 30,  77 => 28,  73 => 27,  69 => 25,  58 => 20,  52 => 17,  47 => 15,  43 => 13,  38 => 12,  34 => 9,  30 => 7,  26 => 5,  24 => 4,  19 => 1,);
    }
}
