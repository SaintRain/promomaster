<?php

/* CoreSiteBundle:Section/Cabinet/Form:section.html.twig */
class __TwigTemplate_5098c4d78962b1ee1c442776021829be007439f011f816831d0b80280c31a183 extends Twig_Template
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
        // line 2
        echo "
";
        // line 3
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "id", array())) {
            // line 4
            echo "    <h3>Редактирование настроек раздела рекламного места</h3>
";
        } else {
            // line 6
            echo "    <h3>Добавление нового раздела в систему</h3>
";
        }
        // line 8
        echo "

    ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
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
            echo $this->env->getExtension('routing')->getPath("core_cabinet_section_create");
            echo "'><i
                        class='fa fa-plus-square'></i> &nbsp;Добавить еще раздел</a>
            &nbsp;&nbsp;&nbsp;
            <a class='btn-u btn-u-xs btn-u-default' href='";
            // line 18
            echo $this->env->getExtension('routing')->getPath("core_cabinet_section_list_first_page");
            echo "'><i
                        class='fa fa-reply'></i> &nbsp;Вернуться к списку разделов</a>

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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
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
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "errors", array()))) {
            // line 34
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 36
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
            echo "
        </div>
    ";
        }
        // line 39
        echo "
<form style=\"clear: both\" class=\"sky-form sky-form-other-style\"
      action=\"";
        // line 41
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "id", array())) {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_section_edit", array("id" => $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "id", array()))), "html", null, true);
        } else {
            echo $this->env->getExtension('routing')->getPath("core_cabinet_section_create");
        }
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo "
      method=\"POST\">
    <fieldset class=\"sky-form-other-style\">

        <div class=\"row margin-bottom-20\">
            <div class=\"col-lg-6  ";
        // line 46
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Название*</label>
                ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\"margin-bottom-20 ";
        // line 54
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "isAllPage", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
            <label class=\"checkbox\">
                ";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "isAllPage", array()), 'widget');
        echo "<i></i> Выводить на всех страницах</label>
            ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "isAllPage", array()), 'errors');
        echo "
            </label>
        </div>


        <div class=\"row margin-bottom-20 form_urlTemplate\" style=\"display: none\">
            <div class=\"col-sm-12  ";
        // line 63
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Шаблон*</label>
                ";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "urlTemplate", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

                ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "urlTemplate", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\"margin-bottom-20\">
        </div>

        ";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

        <div class=\"text-right\">
            <button class=\"btn-u\" type=\"submit\">";
        // line 78
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "id", array())) {
            echo "Сохранить";
        } else {
            echo "Добавить";
        }
        echo "</button>
            &nbsp;&nbsp;
            <a href=\"";
        // line 80
        echo $this->env->getExtension('routing')->getPath("core_cabinet_site_list_first_page");
        echo "\" class=\"btn-u btn-u-default\">Отмена</a>
            ";
        // line 81
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "id", array())) {
            // line 82
            echo "                &nbsp;&nbsp; или &nbsp;&nbsp;
                <a href=\"javascript:void(0);\" class=\"delete btn-u btn-u-red\">Удалить</a>
            ";
        }
        // line 85
        echo "        </div>
    </fieldset>
</form>


<script>
    \$(function () {
        checkTemplateNeedShow();
        \$('#form_isAllPage').change(function () {
            checkTemplateNeedShow();
        });

        function checkTemplateNeedShow() {
            if (\$('#form_isAllPage').is(':checked')) {
                \$('.form_urlTemplate').hide();
            }
            else {
                \$('.form_urlTemplate').show();
            }
        }

        ";
        // line 106
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "id", array())) {
            // line 107
            echo "        \$('.delete').click(function () {
            var res = confirm('Вы действительно хотите удалить этот раздел из системы?');
            if (res) {
                window.location.href = '";
            // line 110
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_section_delete", array("id" => $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "id", array()))), "html", null, true);
            echo "';
            }
        });
        ";
        }
        // line 114
        echo "    })
</script>



";
    }

    public function getTemplateName()
    {
        return "CoreSiteBundle:Section/Cabinet/Form:section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 114,  239 => 110,  234 => 107,  232 => 106,  209 => 85,  204 => 82,  202 => 81,  198 => 80,  189 => 78,  183 => 75,  172 => 67,  167 => 65,  160 => 63,  151 => 57,  147 => 56,  140 => 54,  132 => 49,  128 => 48,  121 => 46,  107 => 41,  103 => 39,  97 => 36,  93 => 34,  91 => 33,  87 => 31,  78 => 28,  74 => 26,  70 => 25,  66 => 23,  55 => 18,  49 => 15,  44 => 13,  40 => 11,  36 => 10,  32 => 8,  28 => 6,  24 => 4,  22 => 3,  19 => 2,);
    }
}
