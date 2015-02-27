<?php

/* CoreBannerBundle:Banner\Cabinet\Forms:codeBannerForm.html.twig */
class __TwigTemplate_34fe2608886919d6a560b23f7e8927edd580eb9cd3945d986b237f32eb0ef0c3 extends Twig_Template
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
        echo "<form id=\"form_code\" style=\"clear: both;";
        if ( !(isset($context["show"]) ? $context["show"] : $this->getContext($context, "show"))) {
            echo "display: none";
        }
        echo "\" class=\"sky-form sky-form-other-style\"
      action=\"";
        // line 3
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
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 7
            echo "        <br/>
        <div class=\"alert alert-success fade in\">
            ";
            // line 9
            echo $context["flashMessage"];
            echo "
            &nbsp;&nbsp;&nbsp;<a class='btn-u btn-u-xs ' href='";
            // line 10
            echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_create");
            echo "'><i
                        class='fa fa-plus-square'></i> &nbsp;Добавить еще баннер</a>
            &nbsp;&nbsp;&nbsp;
            <a class='btn-u btn-u-xs btn-u-default' href='";
            // line 13
            echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_list_first_page");
            echo "'><i
                        class='fa fa-reply'></i> &nbsp;Вернуться к списку баннеров</a>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "
    ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 19
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 21
            echo $context["flashMessage"];
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
    ";
        // line 25
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array()))) {
            // line 26
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 28
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
        </div>
    ";
        }
        // line 31
        echo "
    <fieldset class=\"sky-form-other-style\">

        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-6\"><label>Тип баннера*</label><select ";
        // line 35
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            echo " disabled ";
        }
        // line 36
        echo "                        type=\"text\"
                        name=\"banner_type\"
                        required=\"required\"
                        class=\"banner_type form-control\">
                    <option value=\"image\">
                        Изображение
                    </option>
                    <option value=\"flash\">Flash</option>
                    <option selected value=\"code\">HTML / Сторонний
                    </option>
                </select>
            </div>
        </div>


        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-6  ";
        // line 52
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Название *</label>
                ";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\"row margin-bottom-20\">
            <div class=\"col-lg-12  ";
        // line 61
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Код *</label>
                ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\" margin-bottom-20\">
        </div>

        ";
        // line 72
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

        <div class=\"text-right\">

            <button class=\"btn-u\" type=\"submit\">";
        // line 76
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            echo "Сохранить";
        } else {
            echo "Добавить";
        }
        echo "</button>
            &nbsp;&nbsp;
            <a href=\"";
        // line 78
        echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_list_first_page");
        echo "\" class=\"btn-u btn-u-default\">Отмена</a>
            ";
        // line 79
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : $this->getContext($context, "banner")), "id", array())) {
            // line 80
            echo "                &nbsp;&nbsp; или &nbsp;&nbsp;
                <a href=\"javascript:void(0);\" class=\"delete btn-u btn-u-red\">Удалить</a>
            ";
        }
        // line 83
        echo "
        </div>

    </fieldset>

</form>";
    }

    public function getTemplateName()
    {
        return "CoreBannerBundle:Banner\\Cabinet\\Forms:codeBannerForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 83,  193 => 80,  191 => 79,  187 => 78,  178 => 76,  171 => 72,  160 => 64,  156 => 63,  149 => 61,  140 => 55,  136 => 54,  129 => 52,  111 => 36,  107 => 35,  101 => 31,  95 => 28,  91 => 26,  89 => 25,  86 => 24,  77 => 21,  73 => 19,  69 => 18,  66 => 17,  56 => 13,  50 => 10,  46 => 9,  42 => 7,  38 => 6,  26 => 3,  19 => 2,);
    }
}
