<?php

/* CoreBannerBundle:Banner\Cabinet\Forms:imageBannerForm.html.twig */
class __TwigTemplate_fcbf92b7cbd8cbb8f023d4dba31c4bb91c0b5b170a491362866d7235e06de9b9 extends Twig_Template
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
<form id=\"form_image\" style=\"clear: both;";
        // line 3
        if ( !(isset($context["show"]) ? $context["show"] : $this->getContext($context, "show"))) {
            echo "display: none";
        }
        echo "\"
      class=\"sky-form sky-form-other-style\"
      action=\"";
        // line 5
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_banner_edit", array("id" => $this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array()))), "html", null, true);
        } else {
            echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_create");
        }
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo "
      method=\"POST\">

    ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 9
            echo "        <br/>
        <div class=\"alert alert-success fade in\">
            ";
            // line 11
            echo $context["flashMessage"];
            echo "
            &nbsp;&nbsp;&nbsp;<a class='btn-u btn-u-xs ' href='";
            // line 12
            echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_create");
            echo "'><i
                        class='fa fa-plus-square'></i> &nbsp;Добавить еще баннер</a>
            &nbsp;&nbsp;&nbsp;
            <a class='btn-u btn-u-xs btn-u-default' href='";
            // line 15
            echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_list_first_page");
            echo "'><i
                        class='fa fa-reply'></i> &nbsp;Вернуться к списку баннеров</a>
        </div>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "
    ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 22
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 24
            echo $context["flashMessage"];
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "
    ";
        // line 28
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array()))) {
            // line 29
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 31
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
        </div>
    ";
        }
        // line 34
        echo "
    <fieldset class=\"sky-form-other-style\">

        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-6\"><label>Тип баннера*</label><select ";
        // line 38
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            echo " disabled ";
        }
        // line 39
        echo "                        type=\"text\"
                        name=\"banner_type\"
                        required=\"required\"
                        class=\"banner_type form-control\">
                    <option selected value=\"image\">
                        Изображение
                    </option>
                    <option value=\"flash\">Flash</option>
                    <option value=\"code\">HTML / Сторонний
                    </option>
                </select>
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
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-12  ";
        // line 64
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "url", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Ссылка перехода*</label>
                ";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "url", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "url", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\"margin-bottom-20 ";
        // line 72
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isOpenUrlInNewWindow", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
            <label class=\"checkbox\">
                ";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isOpenUrlInNewWindow", array()), 'widget');
        echo "<i></i> Открывать ссылку перехода в новом окне</label>
            ";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isOpenUrlInNewWindow", array()), 'errors');
        echo "
            </label>
        </div>


        <div class=\"row margin-bottom-20\">
            <div class=\"col-lg-12  ";
        // line 81
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "image", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Файл*</label>
                ";
        // line 83
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "image", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 84
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "image", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\" margin-bottom-20\">
        </div>

        ";
        // line 92
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

        <div class=\"text-right\">

            <button class=\"btn-u\" type=\"submit\">";
        // line 96
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            echo "Сохранить";
        } else {
            echo "Добавить";
        }
        echo "</button>
            &nbsp;&nbsp;
            <a href=\"";
        // line 98
        echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_list_first_page");
        echo "\" class=\"btn-u btn-u-default\">Отмена</a>
            ";
        // line 99
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            // line 100
            echo "                &nbsp;&nbsp; или &nbsp;&nbsp;
                <a href=\"javascript:void(0);\" class=\"delete btn-u btn-u-red\">Удалить</a>
            ";
        }
        // line 103
        echo "
        </div>

    </fieldset>

</form>

  ";
    }

    public function getTemplateName()
    {
        return "CoreBannerBundle:Banner\\Cabinet\\Forms:imageBannerForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 103,  236 => 100,  234 => 99,  230 => 98,  221 => 96,  214 => 92,  203 => 84,  199 => 83,  192 => 81,  183 => 75,  179 => 74,  172 => 72,  164 => 67,  160 => 66,  153 => 64,  144 => 58,  140 => 57,  133 => 55,  115 => 39,  111 => 38,  105 => 34,  99 => 31,  95 => 29,  93 => 28,  90 => 27,  81 => 24,  77 => 22,  73 => 21,  70 => 20,  59 => 15,  53 => 12,  49 => 11,  45 => 9,  41 => 8,  29 => 5,  22 => 3,  19 => 2,);
    }
}
