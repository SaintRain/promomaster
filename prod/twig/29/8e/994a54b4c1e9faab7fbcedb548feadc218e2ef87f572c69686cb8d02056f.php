<?php

/* CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig */
class __TwigTemplate_298e994a54b4c1e9faab7fbcedb548feadc218e2ef87f572c69686cb8d02056f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'widget_attributes' => array($this, 'block_widget_attributes'),
            'choice_widget_options' => array($this, 'block_choice_widget_options'),
            'form_row' => array($this, 'block_form_row'),
            'label' => array($this, 'block_label'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('widget_attributes', $context, $blocks);
        // line 21
        echo "
";
        // line 22
        $this->displayBlock('choice_widget_options', $context, $blocks);
        // line 58
        echo "
";
        // line 59
        $this->displayBlock('form_row', $context, $blocks);
    }

    // line 1
    public function block_widget_attributes($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        ob_start();
        // line 3
        echo "        id=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, (isset($context["full_name"]) ? $context["full_name"] : null), "html", null, true);
        echo "\"";
        // line 4
        if ((isset($context["read_only"]) ? $context["read_only"] : null)) {
            echo " readonly=\"readonly\"";
        }
        // line 5
        if ((isset($context["disabled"]) ? $context["disabled"] : null)) {
            echo " disabled=\"disabled\"";
        }
        // line 6
        if ((isset($context["required"]) ? $context["required"] : null)) {
            echo " required=\"required\"";
        }
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["attr"]) ? $context["attr"] : null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            // line 8
            if (($context["attrname"] != "data-extra")) {
                // line 9
                echo " ";
                // line 10
                if (twig_in_filter($context["attrname"], array(0 => "placeholder", 1 => "title"))) {
                    // line 11
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["attrvalue"], array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)), "html", null, true);
                    echo "\"";
                } elseif ((                // line 12
$context["attrvalue"] === true)) {
                    // line 13
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "\"";
                } elseif ( !(                // line 14
$context["attrvalue"] === false)) {
                    // line 15
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                    echo "\"";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 22
    public function block_choice_widget_options($context, array $blocks = array())
    {
        // line 23
        echo "    ";
        ob_start();
        // line 24
        echo "
        ";
        // line 26
        echo "        ";
        if ($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-extra", array(), "array", true, true)) {
            // line 27
            echo "            ";
            $context["optionsIndexed"] = $this->env->getExtension('common_extension')->setKeysIdsFunction((isset($context["options"]) ? $context["options"] : null), "data");
            // line 28
            echo "        ";
        } else {
            // line 29
            echo "            ";
            $context["optionsIndexed"] = array();
            // line 30
            echo "        ";
        }
        // line 31
        echo "
        ";
        // line 32
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
            // line 33
            echo "            ";
            if (twig_test_iterable($context["choice"])) {
                // line 34
                echo "                <optgroup label=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["group_label"], array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)), "html", null, true);
                echo "\">
                    ";
                // line 35
                $context["options"] = $context["choice"];
                // line 36
                echo "                    ";
                $this->displayBlock("choice_widget_options", $context, $blocks);
                echo "
                </optgroup>
            ";
            } else {
                // line 39
                echo "
                ";
                // line 40
                $context["dataExtra"] = "";
                // line 41
                echo "                ";
                if ($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-extra", array(), "array", true, true)) {
                    // line 42
                    echo "                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "data-extra", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 43
                        echo "                        
                        ";
                        // line 44
                        $context["valueExtra"] = twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["optionsIndexed"]) ? $context["optionsIndexed"] : null), $this->getAttribute($this->getAttribute($context["choice"], "data", array()), "id", array()), array(), "array"), $context["field"]), "html");
                        // line 45
                        echo "                        ";
                        if ($this->getAttribute((isset($context["valueExtra"]) ? $context["valueExtra"] : null), "timestamp", array(), "any", true, true)) {
                            // line 46
                            echo "                        ";
                            $context["valueExtra"] = twig_date_format_filter($this->env, (isset($context["valueExtra"]) ? $context["valueExtra"] : null), "d-m-Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null));
                            // line 47
                            echo "                        ";
                        }
                        // line 48
                        echo "                        ";
                        $context["dataExtra"] = ((((((isset($context["dataExtra"]) ? $context["dataExtra"] : null) . " data-") . $context["field"]) . "=\"") . (isset($context["valueExtra"]) ? $context["valueExtra"] : null)) . "\"");
                        // line 49
                        echo "                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 50
                    echo "                ";
                }
                // line 51
                echo "
                <option  ";
                // line 52
                if ((isset($context["dataExtra"]) ? $context["dataExtra"] : null)) {
                    echo " ";
                    echo (isset($context["dataExtra"]) ? $context["dataExtra"] : null);
                    echo " ";
                }
                // line 53
                echo "                        value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["choice"], "value", array()), "html", null, true);
                echo "\"";
                if ($this->env->getExtension('form')->isSelectedChoice($context["choice"], (isset($context["value"]) ? $context["value"] : null))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($context["choice"], "label", array()), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)), "html", null, true);
                echo "</option>
            ";
            }
            // line 55
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
        // line 56
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 59
    public function block_form_row($context, array $blocks = array())
    {
        // line 60
        echo "    ";
        if ((( !array_key_exists("sonata_admin", $context) ||  !(isset($context["sonata_admin_enabled"]) ? $context["sonata_admin_enabled"] : null)) ||  !$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()))) {
            // line 61
            echo "        <div class=\"control-group ";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
                echo " error";
            }
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "data-hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "attr", array()), "data-hidden", array(), "array"))) {
                echo " hidden";
            }
            echo "\">
            ";
            // line 62
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), null)) : (null))) ? array() : array("label" => $_label_)));
            echo "
            <div class=\"controls ";
            // line 63
            if (((isset($context["label"]) ? $context["label"] : null) === false)) {
                echo "sonata-collection-row-without-label";
            }
            echo "\">
                ";
            // line 64
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
            echo "
                ";
            // line 65
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
                // line 66
                echo "                    <div class=\"help-inline sonata-ba-field-error-messages\">
                        ";
                // line 67
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
                echo "
                    </div>
                ";
            }
            // line 70
            echo "            </div>
        </div>
    ";
        } else {
            // line 73
            echo "        <div class=\"control-group";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
                echo " error";
            }
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "data-hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "attr", array()), "data-hidden", array(), "array"))) {
                echo " hidden";
            }
            echo "\"
             id=\"sonata-ba-field-container-";
            // line 74
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "\">
            ";
            // line 75
            $this->displayBlock('label', $context, $blocks);
            // line 82
            echo "
            ";
            // line 83
            $context["has_label"] = ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "name", array(), "any", true, true) ||  !((isset($context["label"]) ? $context["label"] : null) === false));
            // line 84
            echo "            <div class=\"controls sonata-ba-field sonata-ba-field-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "edit", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "inline", array()), "html", null, true);
            echo " ";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
                echo "sonata-ba-field-error";
            }
            echo " ";
            if ( !(isset($context["has_label"]) ? $context["has_label"] : null)) {
                echo "sonata-collection-row-without-label";
            }
            echo "\">

                ";
            // line 86
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
            echo "

                ";
            // line 88
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
                // line 89
                echo "                    <div class=\"help-inline sonata-ba-field-error-messages\">
                        ";
                // line 90
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
                echo "
                    </div>
                ";
            }
            // line 93
            echo "
                ";
            // line 94
            if ($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "help", array())) {
                // line 95
                echo "                    <span class=\"help-block sonata-ba-field-help\">";
                echo $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "trans", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "help", array()), 1 => array(), 2 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "translationDomain", array())), "method");
                echo "</span>
                ";
            }
            // line 97
            echo "            </div>
        </div>
    ";
        }
    }

    // line 75
    public function block_label($context, array $blocks = array())
    {
        // line 76
        echo "                ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "name", array(), "any", true, true)) {
            // line 77
            echo "                    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label', array("attr" => array("class" => "control-label")) + (twig_test_empty($_label_ = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "options", array()), "name", array())) ? array() : array("label" => $_label_)));
            echo "
                ";
        } else {
            // line 79
            echo "                    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label', array("attr" => array("class" => "control-label")) + (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), null)) : (null))) ? array() : array("label" => $_label_)));
            echo "
                ";
        }
        // line 81
        echo "            ";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  374 => 81,  368 => 79,  362 => 77,  359 => 76,  356 => 75,  349 => 97,  343 => 95,  341 => 94,  338 => 93,  332 => 90,  329 => 89,  327 => 88,  322 => 86,  306 => 84,  304 => 83,  301 => 82,  299 => 75,  295 => 74,  285 => 73,  280 => 70,  274 => 67,  271 => 66,  269 => 65,  265 => 64,  259 => 63,  255 => 62,  245 => 61,  242 => 60,  239 => 59,  234 => 56,  220 => 55,  208 => 53,  202 => 52,  199 => 51,  196 => 50,  190 => 49,  187 => 48,  184 => 47,  181 => 46,  178 => 45,  176 => 44,  173 => 43,  168 => 42,  165 => 41,  163 => 40,  160 => 39,  153 => 36,  151 => 35,  146 => 34,  143 => 33,  126 => 32,  123 => 31,  120 => 30,  117 => 29,  114 => 28,  111 => 27,  108 => 26,  105 => 24,  102 => 23,  99 => 22,  85 => 15,  83 => 14,  78 => 13,  76 => 12,  71 => 11,  69 => 10,  67 => 9,  65 => 8,  61 => 7,  57 => 6,  53 => 5,  49 => 4,  43 => 3,  40 => 2,  37 => 1,  33 => 59,  30 => 58,  28 => 22,  25 => 21,  23 => 1,);
    }
}
