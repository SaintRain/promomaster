<?php

/* CoreBannerBundle:Banner/Cabinet/Forms:flashBannerForm.html.twig */
class __TwigTemplate_f8b5f31d154e5f32abc8ed2dd14d8d04464094d6d6d88dd7dcdd98948f199315 extends Twig_Template
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
        echo "<form id=\"form_flash\" style=\"clear: both;";
        if ( !(isset($context["show"]) ? $context["show"] : null)) {
            echo "display: none";
        }
        echo "\" class=\"sky-form sky-form-other-style\"
      action=\"";
        // line 3
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "id", array())) {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_banner_edit", array("id" => $this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "id", array()))), "html", null, true);
        } else {
            echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_create");
        }
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo "
      method=\"POST\">

    ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
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
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "errors", array()))) {
            // line 26
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 28
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
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
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "id", array())) {
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
                    <option selected value=\"flash\">Flash</option>
                    <option value=\"code\">HTML / Сторонний
                    </option>
                </select>
            </div>
        </div>


        <div class=\"row margin-bottom-20\">
            <div class=\"col-sm-6  ";
        // line 52
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Название*</label>
                ";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'errors');
        echo "
            </div>
        </div>


        ";
        // line 61
        echo "            ";
        // line 62
        echo "                ";
        // line 63
        echo "                ";
        // line 64
        echo "                ";
        // line 65
        echo "            ";
        // line 66
        echo "        ";
        // line 67
        echo "

        ";
        // line 70
        echo "            ";
        // line 71
        echo "                ";
        // line 72
        echo "            ";
        // line 73
        echo "            ";
        // line 74
        echo "        ";
        // line 75
        echo "

        <div class=\"row margin-bottom-20\">
            <div class=\"col-lg-12  ";
        // line 78
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array()), 'errors')) {
            echo "state-error";
        }
        echo "\">
                <label>Flash*</label>
                ";
        // line 80
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                ";
        // line 81
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "file", array()), 'errors');
        echo "
            </div>
        </div>


        <div class=\" margin-bottom-20\">
        </div>

        ";
        // line 89
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

        <div class=\"text-right\">

            <button class=\"btn-u\" type=\"submit\">";
        // line 93
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "id", array())) {
            echo "Сохранить";
        } else {
            echo "Добавить";
        }
        echo "</button>
            &nbsp;&nbsp;
            <a href=\"";
        // line 95
        echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_list_first_page");
        echo "\" class=\"btn-u btn-u-default\">Отмена</a>
            ";
        // line 96
        if ($this->getAttribute((isset($context["banner"]) ? $context["banner"] : null), "id", array())) {
            // line 97
            echo "                &nbsp;&nbsp; или &nbsp;&nbsp;
                <a href=\"javascript:void(0);\" class=\"delete btn-u btn-u-red\">Удалить</a>
            ";
        }
        // line 100
        echo "
        </div>

    </fieldset>

</form>

  ";
    }

    public function getTemplateName()
    {
        return "CoreBannerBundle:Banner/Cabinet/Forms:flashBannerForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 100,  223 => 97,  221 => 96,  217 => 95,  208 => 93,  201 => 89,  190 => 81,  186 => 80,  179 => 78,  174 => 75,  172 => 74,  170 => 73,  168 => 72,  166 => 71,  164 => 70,  160 => 67,  158 => 66,  156 => 65,  154 => 64,  152 => 63,  150 => 62,  148 => 61,  140 => 55,  136 => 54,  129 => 52,  111 => 36,  107 => 35,  101 => 31,  95 => 28,  91 => 26,  89 => 25,  86 => 24,  77 => 21,  73 => 19,  69 => 18,  66 => 17,  56 => 13,  50 => 10,  46 => 9,  42 => 7,  38 => 6,  26 => 3,  19 => 2,);
    }
}
