<?php

/* CoreSiteBundle:AdPlace\Form:adolace.html.twig */
class __TwigTemplate_6a099c032f74ff4516bf151352eef9cf32cb9630b882464d2bd72b7ded32ba69 extends Twig_Template
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
        // line 2
        if ($this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array())) {
            // line 3
            echo "    <h3>Редактирование настроек вашего рекламного места</h3>
";
        } else {
            // line 5
            echo "    <h3>Добавление нового рекламного места в систему</h3>
";
        }
        // line 7
        echo "

    ";
        // line 10
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 11
            echo "        <br/>
        <div class=\"alert alert-success fade in\">
            ";
            // line 13
            echo $context["flashMessage"];
            echo "

            &nbsp;&nbsp;&nbsp;<a class='btn-u btn-u-xs ' href='";
            // line 15
            echo $this->env->getExtension('routing')->getPath("core_cabinet_adplace_create");
            echo "'><i
                        class='fa fa-plus-square'></i> &nbsp;Добавить еще рекламное место</a>
            &nbsp;&nbsp;&nbsp;
            <a class='btn-u btn-u-xs btn-u-default' href='";
            // line 18
            echo $this->env->getExtension('routing')->getPath("core_cabinet_adplace_list_first_page");
            echo "'><i
                        class='fa fa-reply'></i> &nbsp;Вернуться к списку рекламных мест</a>

        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "

    ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 26
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 28
            echo $context["flashMessage"];
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "

    ";
        // line 33
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array()))) {
            // line 34
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 36
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
        </div>
    ";
        }
        // line 39
        echo "
<form style=\"clear: both\" class=\"sky-form sky-form-other-style\"
      action=\"";
        // line 41
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
        // line 46
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "site", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Сайт*</label>
                ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "site", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "site", array()), 'errors');
        echo "
                <span class=\"help\">Выберите сайт на котором распологается рекламное место.</span>
            </div>
        </div>

        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-6  ";
        // line 55
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Название*</label>
                ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

                ";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-6  ";
        // line 65
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "size", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Размер*</label>
                ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "size", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "size", array()), 'errors');
        echo "
            </div>
        </div>

        <div class=\"row margin-bottom-20 extraSize\" style=\"display: none\">
            <div class=\"col-sm-6  ";
        // line 73
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "height", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Высота*</label>
                ";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "height", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 76
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "height", array()), 'errors');
        echo "
                <span class=\"help\">Введите высоту рекламного места в пикселях.</span>
            </div>
        </div>

        <div class=\"row margin-bottom-20 extraSize\" style=\"display: none\">
            <div class=\"col-sm-6  ";
        // line 82
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "width", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Ширина*</label>
                ";
        // line 84
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "width", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "width", array()), 'errors');
        echo "
                <span class=\"help\">Введите ширину рекламного места в пикселях.</span>
            </div>
        </div>


        <div class=\"margin-bottom-20 ";
        // line 91
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isShowInCatalog", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
            <label class=\"checkbox\">
                ";
        // line 93
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isShowInCatalog", array()), 'widget');
        echo "<i></i> Выводить в каталог</label>
            ";
        // line 94
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isShowInCatalog", array()), 'errors');
        echo "
            </label>
        </div>


        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-6  ";
        // line 100
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sections", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Разделы</label>
                ";
        // line 102
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sections", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 103
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sections", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\"margin-bottom-20\">
        </div>

        ";
        // line 111
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

        <div class=\"text-right\">
            <button class=\"btn-u\" type=\"submit\">";
        // line 114
        if ($this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array())) {
            echo "Сохранить";
        } else {
            echo "Добавить";
        }
        echo "</button>
            &nbsp;&nbsp;
            <a href=\"";
        // line 116
        echo $this->env->getExtension('routing')->getPath("core_cabinet_site_list_first_page");
        echo "\" class=\"btn-u btn-u-default\">Отмена</a>
            ";
        // line 117
        if ($this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array())) {
            // line 118
            echo "                &nbsp;&nbsp; или &nbsp;&nbsp;
                <a href=\"javascript:void(0);\" class=\"delete btn-u btn-u-red\">Удалить</a>
            ";
        }
        // line 121
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
        // line 143
        if ($this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array())) {
            // line 144
            echo "        \$('.delete').click(function () {
            var res = confirm('Вы действительно хотите удалить это рекламное место из системы?');
            if (res) {
                window.location.href = '";
            // line 147
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_adplace_delete", array("id" => $this->getAttribute((isset($context["adplace"]) ? $context["adplace"] : $this->getContext($context, "adplace")), "id", array()))), "html", null, true);
            echo "';
            }
        });
        ";
        }
        // line 151
        echo "    })
</script>



";
    }

    public function getTemplateName()
    {
        return "CoreSiteBundle:AdPlace\\Form:adolace.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  328 => 151,  321 => 147,  316 => 144,  314 => 143,  290 => 121,  285 => 118,  283 => 117,  279 => 116,  270 => 114,  264 => 111,  253 => 103,  249 => 102,  242 => 100,  233 => 94,  229 => 93,  222 => 91,  213 => 85,  209 => 84,  202 => 82,  193 => 76,  189 => 75,  182 => 73,  174 => 68,  170 => 67,  163 => 65,  154 => 59,  149 => 57,  142 => 55,  133 => 49,  129 => 48,  122 => 46,  108 => 41,  104 => 39,  98 => 36,  94 => 34,  92 => 33,  88 => 31,  79 => 28,  75 => 26,  71 => 25,  67 => 23,  56 => 18,  50 => 15,  45 => 13,  41 => 11,  36 => 10,  32 => 7,  28 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}
