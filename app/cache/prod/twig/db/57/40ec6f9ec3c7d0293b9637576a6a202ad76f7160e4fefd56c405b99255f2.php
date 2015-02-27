<?php

/* CoreColorBundle:Admin/Form:admin_form_type_color_widget.html.twig */
class __TwigTemplate_db5740ec6f9ec3c7d0293b9637576a6a202ad76f7160e4fefd56c405b99255f2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'admin_form_type_color_widget_attributes' => array($this, 'block_admin_form_type_color_widget_attributes'),
            'admin_form_type_color_choice_widget_options' => array($this, 'block_admin_form_type_color_choice_widget_options'),
            'admin_form_type_color_widget' => array($this, 'block_admin_form_type_color_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('admin_form_type_color_widget_attributes', $context, $blocks);
        // line 15
        echo "
";
        // line 16
        $this->displayBlock('admin_form_type_color_choice_widget_options', $context, $blocks);
        // line 30
        echo "
";
        // line 31
        $this->displayBlock('admin_form_type_color_widget', $context, $blocks);
    }

    // line 9
    public function block_admin_form_type_color_widget_attributes($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "        id=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, (isset($context["full_name"]) ? $context["full_name"] : null), "html", null, true);
        echo "\"";
        if ((isset($context["read_only"]) ? $context["read_only"] : null)) {
            echo " readonly=\"readonly\"";
        }
        if ((isset($context["disabled"]) ? $context["disabled"] : null)) {
            echo " disabled=\"disabled\"";
        }
        if ((isset($context["required"]) ? $context["required"] : null)) {
            echo " required=\"required\"";
        }
        if ((isset($context["max_length"]) ? $context["max_length"] : null)) {
            echo " maxlength=\"";
            echo twig_escape_filter($this->env, (isset($context["max_length"]) ? $context["max_length"] : null), "html", null, true);
            echo "\"";
        }
        if ((isset($context["pattern"]) ? $context["pattern"] : null)) {
            echo " pattern=\"";
            echo twig_escape_filter($this->env, (isset($context["pattern"]) ? $context["pattern"] : null), "html", null, true);
            echo "\"";
        }
        // line 12
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["attr"]) ? $context["attr"] : null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            if (twig_in_filter($context["attrname"], array(0 => "placeholder", 1 => "title"))) {
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["attrvalue"], array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)), "html", null, true);
                echo "\" ";
            } else {
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                if (twig_in_filter($context["attrname"], array(0 => "class"))) {
                    echo " color-palette";
                }
                echo "\" ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 16
    public function block_admin_form_type_color_choice_widget_options($context, array $blocks = array())
    {
        // line 17
        echo "    ";
        ob_start();
        // line 18
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["group_label"] => $context["choice"]) {
            // line 19
            echo "            ";
            if (twig_test_iterable($context["choice"])) {
                // line 20
                echo "                <optgroup label=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["group_label"], array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)), "html", null, true);
                echo "\">
                    ";
                // line 21
                $context["options"] = $context["choice"];
                // line 22
                echo "                    ";
                $this->displayBlock("admin_form_type_color_choice_widget_options", $context, $blocks);
                echo "
                </optgroup>
            ";
            } else {
                // line 25
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["choice"], "value", array()), "html", null, true);
                echo "\" ";
                if (($this->getAttribute($this->getAttribute($context["choice"], "data", array()), "hex", array()) != "null")) {
                    echo "data-hex=\"#";
                    echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($context["choice"], "data", array()), "hex", array())), "html", null, true);
                    echo "\"";
                } else {
                }
                echo " ";
                if ($this->env->getExtension('form')->isSelectedChoice($context["choice"], (isset($context["value"]) ? $context["value"] : null))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($context["choice"], "label", array()), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)), "html", null, true);
                echo "</option>
            ";
            }
            // line 27
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['group_label'], $context['choice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 31
    public function block_admin_form_type_color_widget($context, array $blocks = array())
    {
        // line 32
        echo "
<script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecolor/js/color.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<link rel=\"stylesheet\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecolor/css/color.css"), "html", null, true);
        echo "\" media=\"all\">

<script>
    var palette, colors = new Array();
    ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["colors"]) ? $context["colors"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["color"]) {
            // line 39
            echo "        ";
            if ((twig_upper_filter($this->env, $this->getAttribute($context["color"], "hex", array())) != "NULL")) {
                // line 40
                echo "            palette = new Array();
            palette.push('";
                // line 41
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["color"], "hex", array())), "html", null, true);
                echo "');
            ";
                // line 42
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["color"], "palette", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["palette"]) {
                    // line 43
                    echo "                palette.push('";
                    echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["palette"], "hex", array())), "html", null, true);
                    echo "');
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['palette'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 45
                echo "            colors.push({
                color: '";
                // line 46
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["color"], "hex", array())), "html", null, true);
                echo "',
                palette: palette
            });
        ";
            }
            // line 50
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['color'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "</script>

    ";
        // line 53
        ob_start();
        // line 54
        echo "    <div class=\"image-color-detect-container\" title=\"Определение цвета по клику\">
        <table class=\"table table-bordered icd-table\">
            <tr>
                <td>
                    <img class=\"icd-img\">
                </td>
                <td width=\"350px\">
                    <table class=\"table table-bordered icd-colors-preview\">
                        <thead>
                            <tr>
                                <th>Цвет по кот. кликнули</th>
                                <th>Выбранный цвет</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class=\"icd-color-preview icd-click-color\"></div></td>
                                <td><div class=\"icd-color-preview icd-selected-color\"></div></td>
                            </tr>
                            <tr>
                                <td><input class=\"icd-text-hex icd-click-text-hex\" type=\"text\"/></td>
                                <td><input class=\"icd-text-hex icd-selected-text-hex\" type=\"text\"/></td>
                            </tr>
                            <tr>
                                <td colspan=\"2\" class=\"text-center border-top\">
                                    <strong class=\"icd-color-name\">&nbsp;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=\"2\" class=\"text-center border-top\">
                                    <a class=\"btn btn-primary icd-click-ok\" title=\"OK\"><span class=\"icon-ok icon-white\"></span> OK</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a class=\"btn btn-danger icd-click-cancel\" title=\"Отмена\"><span class=\"icon-remove icon-white\"></span> Отмена</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
        ";
        // line 95
        if ((twig_length_filter($this->env, (isset($context["colors"]) ? $context["colors"] : null)) > 0)) {
            // line 96
            echo "
            ";
            // line 97
            if ((isset($context["compound"]) ? $context["compound"] : null)) {
                // line 98
                echo "                <ul ";
                $this->displayBlock("widget_container_attributes_choice_widget", $context, $blocks);
                echo ">
                ";
                // line 99
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 100
                    echo "                    <li>
                        ";
                    // line 101
                    ob_start();
                    // line 102
                    echo "                            ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget');
                    echo "
                        ";
                    $context["form_widget_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 104
                    echo "                        ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'label', array("in_list_checkbox" => true, "widget" => (isset($context["form_widget_content"]) ? $context["form_widget_content"] : null)) + (twig_test_empty($_label_ = (($this->getAttribute($this->getAttribute($context["child"], "vars", array(), "any", false, true), "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($context["child"], "vars", array(), "any", false, true), "label", array()), null)) : (null))) ? array() : array("label" => $_label_)));
                    echo "
                    </li>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 107
                echo "                </ul>
            ";
            } else {
                // line 109
                echo "            <select ";
                $this->displayBlock("admin_form_type_color_widget_attributes", $context, $blocks);
                if ((isset($context["multiple"]) ? $context["multiple"] : null)) {
                    echo " multiple=\"multiple\"";
                }
                echo ">
                ";
                // line 110
                if ((!(null === (isset($context["empty_value"]) ? $context["empty_value"] : null)))) {
                    // line 111
                    echo "                    <option value=\"\">
                        ";
                    // line 112
                    if ((!$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()))) {
                        // line 113
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["empty_value"]) ? $context["empty_value"] : null), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)), "html", null, true);
                    } else {
                        // line 115
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["empty_value"]) ? $context["empty_value"] : null), array(), $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "translationDomain", array())), "html", null, true);
                    }
                    // line 117
                    echo "                    </option>
                ";
                }
                // line 119
                echo "                ";
                if ((twig_length_filter($this->env, (isset($context["preferred_choices"]) ? $context["preferred_choices"] : null)) > 0)) {
                    // line 120
                    echo "                    ";
                    $context["options"] = (isset($context["preferred_choices"]) ? $context["preferred_choices"] : null);
                    // line 121
                    echo "                    ";
                    $this->displayBlock("admin_form_type_color_choice_widget_options", $context, $blocks);
                    echo "
                    ";
                    // line 122
                    if ((twig_length_filter($this->env, (isset($context["choices"]) ? $context["choices"] : null)) > 0)) {
                        // line 123
                        echo "                        <option disabled=\"disabled\">";
                        echo twig_escape_filter($this->env, (isset($context["separator"]) ? $context["separator"] : null), "html", null, true);
                        echo "</option>
                    ";
                    }
                    // line 125
                    echo "                ";
                }
                // line 126
                echo "                ";
                $context["options"] = (isset($context["choices"]) ? $context["choices"] : null);
                // line 127
                echo "                ";
                $this->displayBlock("admin_form_type_color_choice_widget_options", $context, $blocks);
                echo "
            </select>
            ";
            }
            // line 130
            echo "
            <div class=\"selected-color-preview\"></div>
            <button class=\"btn icd-controls icd-btn-click-color\">Выбрать цвет из картинки</button>

       ";
        } else {
            // line 135
            echo "
            <div class=\"alert alert-error alert-dismissable\" style=\"float:left;\">
                Необходимо заполнить <a href=\"";
            // line 137
            echo $this->env->getExtension('routing')->getPath("admin_core_color_color_list");
            echo "\">таблицу цветов</a>.
            </div>

       ";
        }
        // line 141
        echo "   ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 142
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreColorBundle:Admin/Form:admin_form_type_color_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  408 => 142,  405 => 141,  398 => 137,  394 => 135,  387 => 130,  380 => 127,  377 => 126,  374 => 125,  368 => 123,  366 => 122,  361 => 121,  358 => 120,  355 => 119,  351 => 117,  348 => 115,  345 => 113,  343 => 112,  340 => 111,  338 => 110,  330 => 109,  326 => 107,  316 => 104,  310 => 102,  308 => 101,  305 => 100,  301 => 99,  296 => 98,  294 => 97,  291 => 96,  289 => 95,  246 => 54,  244 => 53,  240 => 51,  234 => 50,  227 => 46,  224 => 45,  215 => 43,  211 => 42,  207 => 41,  204 => 40,  201 => 39,  197 => 38,  190 => 34,  186 => 33,  183 => 32,  180 => 31,  175 => 28,  161 => 27,  142 => 25,  135 => 22,  133 => 21,  128 => 20,  125 => 19,  107 => 18,  104 => 17,  101 => 16,  96 => 13,  73 => 12,  48 => 11,  45 => 10,  42 => 9,  38 => 31,  35 => 30,  33 => 16,  30 => 15,  28 => 9,  25 => 8,  22 => 1,);
    }
}
