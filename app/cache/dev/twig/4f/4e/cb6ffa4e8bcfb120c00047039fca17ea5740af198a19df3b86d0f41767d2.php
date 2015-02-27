<?php

/* CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig */
class __TwigTemplate_4f4ecb6ffa4e8bcfb120c00047039fca17ea5740af198a19df3b86d0f41767d2 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, (isset($context["full_name"]) ? $context["full_name"] : $this->getContext($context, "full_name")), "html", null, true);
        echo "\"";
        // line 4
        if ((isset($context["read_only"]) ? $context["read_only"] : $this->getContext($context, "read_only"))) {
            echo " readonly=\"readonly\"";
        }
        // line 5
        if ((isset($context["disabled"]) ? $context["disabled"] : $this->getContext($context, "disabled"))) {
            echo " disabled=\"disabled\"";
        }
        // line 6
        if ((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required"))) {
            echo " required=\"required\"";
        }
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")));
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
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["attrvalue"], array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                    echo "\"";
                } elseif (($context["attrvalue"] === true)) {
                    // line 13
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "\"";
                } elseif ( !($context["attrvalue"] === false)) {
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
            $context["optionsIndexed"] = $this->env->getExtension('common_extension')->setKeysIdsFunction((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "data");
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
        $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")));
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
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["group_label"], array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
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
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), "data-extra", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 43
                        echo "                        
                        ";
                        // line 44
                        $context["valueExtra"] = twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["optionsIndexed"]) ? $context["optionsIndexed"] : $this->getContext($context, "optionsIndexed")), $this->getAttribute($this->getAttribute($context["choice"], "data", array()), "id", array()), array(), "array"), $context["field"]), "html");
                        // line 45
                        echo "                        ";
                        if ($this->getAttribute((isset($context["valueExtra"]) ? $context["valueExtra"] : null), "timestamp", array(), "any", true, true)) {
                            // line 46
                            echo "                        ";
                            $context["valueExtra"] = twig_date_format_filter($this->env, (isset($context["valueExtra"]) ? $context["valueExtra"] : $this->getContext($context, "valueExtra")), "d-m-Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone")));
                            // line 47
                            echo "                        ";
                        }
                        // line 48
                        echo "                        ";
                        $context["dataExtra"] = ((((((isset($context["dataExtra"]) ? $context["dataExtra"] : $this->getContext($context, "dataExtra")) . " data-") . $context["field"]) . "=\"") . (isset($context["valueExtra"]) ? $context["valueExtra"] : $this->getContext($context, "valueExtra"))) . "\"");
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
                if ((isset($context["dataExtra"]) ? $context["dataExtra"] : $this->getContext($context, "dataExtra"))) {
                    echo " ";
                    echo (isset($context["dataExtra"]) ? $context["dataExtra"] : $this->getContext($context, "dataExtra"));
                    echo " ";
                }
                // line 53
                echo "                        value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["choice"], "value", array()), "html", null, true);
                echo "\"";
                if ($this->env->getExtension('form')->isSelectedChoice($context["choice"], (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($context["choice"], "label", array()), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
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
        if ((( !array_key_exists("sonata_admin", $context) ||  !(isset($context["sonata_admin_enabled"]) ? $context["sonata_admin_enabled"] : $this->getContext($context, "sonata_admin_enabled"))) ||  !$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()))) {
            // line 61
            echo "        <div class=\"control-group ";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
                echo " error";
            }
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "data-hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "attr", array()), "data-hidden", array(), "array"))) {
                echo " hidden";
            }
            echo "\">
            ";
            // line 62
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), null)) : (null))) ? array() : array("label" => $_label_)));
            echo "
            <div class=\"controls ";
            // line 63
            if (((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false)) {
                echo "sonata-collection-row-without-label";
            }
            echo "\">
                ";
            // line 64
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
            echo "
                ";
            // line 65
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
                // line 66
                echo "                    <div class=\"help-inline sonata-ba-field-error-messages\">
                        ";
                // line 67
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
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
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
                echo " error";
            }
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "data-hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "attr", array()), "data-hidden", array(), "array"))) {
                echo " hidden";
            }
            echo "\"
             id=\"sonata-ba-field-container-";
            // line 74
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\">
            ";
            // line 75
            $this->displayBlock('label', $context, $blocks);
            // line 82
            echo "
            ";
            // line 83
            $context["has_label"] = ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "name", array(), "any", true, true) ||  !((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false));
            // line 84
            echo "            <div class=\"controls sonata-ba-field sonata-ba-field-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "edit", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "inline", array()), "html", null, true);
            echo " ";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
                echo "sonata-ba-field-error";
            }
            echo " ";
            if ( !(isset($context["has_label"]) ? $context["has_label"] : $this->getContext($context, "has_label"))) {
                echo "sonata-collection-row-without-label";
            }
            echo "\">

                ";
            // line 86
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
            echo "

                ";
            // line 88
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
                // line 89
                echo "                    <div class=\"help-inline sonata-ba-field-error-messages\">
                        ";
                // line 90
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
                echo "
                    </div>
                ";
            }
            // line 93
            echo "
                ";
            // line 94
            if ($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "help", array())) {
                // line 95
                echo "                    <span class=\"help-block sonata-ba-field-help\">";
                echo $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "trans", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "help", array()), 1 => array(), 2 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "translationDomain", array())), "method");
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
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', array("attr" => array("class" => "control-label")) + (twig_test_empty($_label_ = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "options", array()), "name", array())) ? array() : array("label" => $_label_)));
            echo "
                ";
        } else {
            // line 79
            echo "                    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', array("attr" => array("class" => "control-label")) + (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), null)) : (null))) ? array() : array("label" => $_label_)));
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
        return array (  372 => 81,  366 => 79,  360 => 77,  357 => 76,  354 => 75,  347 => 97,  341 => 95,  339 => 94,  336 => 93,  330 => 90,  327 => 89,  325 => 88,  320 => 86,  304 => 84,  302 => 83,  299 => 82,  297 => 75,  293 => 74,  283 => 73,  278 => 70,  272 => 67,  269 => 66,  267 => 65,  263 => 64,  257 => 63,  253 => 62,  243 => 61,  240 => 60,  237 => 59,  232 => 56,  218 => 55,  206 => 53,  200 => 52,  197 => 51,  194 => 50,  188 => 49,  185 => 48,  182 => 47,  179 => 46,  176 => 45,  174 => 44,  171 => 43,  166 => 42,  163 => 41,  161 => 40,  158 => 39,  151 => 36,  149 => 35,  144 => 34,  141 => 33,  124 => 32,  121 => 31,  118 => 30,  115 => 29,  112 => 28,  109 => 27,  106 => 26,  103 => 24,  100 => 23,  97 => 22,  83 => 15,  77 => 13,  71 => 11,  69 => 10,  67 => 9,  65 => 8,  61 => 7,  57 => 6,  53 => 5,  49 => 4,  43 => 3,  40 => 2,  37 => 1,  33 => 59,  30 => 58,  28 => 22,  25 => 21,  23 => 1,);
    }
}
