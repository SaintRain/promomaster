<?php

/* SonataAdminBundle:Form:form_admin_fields.html.twig */
class __TwigTemplate_49c72846939d12d2b43d8750967f1c51d6b2af90f3dd0e0364e1ef65331de6e5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_label' => array($this, 'block_form_label'),
            'widget_container_attributes_choice_widget' => array($this, 'block_widget_container_attributes_choice_widget'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'choice_widget' => array($this, 'block_choice_widget'),
            'form_row' => array($this, 'block_form_row'),
            'label' => array($this, 'block_label'),
            'collection_widget_row' => array($this, 'block_collection_widget_row'),
            'collection_widget' => array($this, 'block_collection_widget'),
            'sonata_type_immutable_array_widget' => array($this, 'block_sonata_type_immutable_array_widget'),
            'sonata_type_immutable_array_widget_row' => array($this, 'block_sonata_type_immutable_array_widget_row'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "
";
        // line 13
        $this->displayBlock('form_label', $context, $blocks);
        // line 52
        echo "
";
        // line 53
        $this->displayBlock('widget_container_attributes_choice_widget', $context, $blocks);
        // line 60
        echo "
";
        // line 61
        $this->displayBlock('choice_widget_expanded', $context, $blocks);
        // line 73
        echo "
";
        // line 74
        $this->displayBlock('choice_widget', $context, $blocks);
        // line 111
        echo "
";
        // line 112
        $this->displayBlock('form_row', $context, $blocks);
        // line 153
        echo "
";
        // line 154
        $this->displayBlock('collection_widget_row', $context, $blocks);
        // line 164
        echo "
";
        // line 165
        $this->displayBlock('collection_widget', $context, $blocks);
        // line 183
        echo "
";
        // line 184
        $this->displayBlock('sonata_type_immutable_array_widget', $context, $blocks);
        // line 197
        echo "
";
        // line 198
        $this->displayBlock('sonata_type_immutable_array_widget_row', $context, $blocks);
    }

    // line 13
    public function block_form_label($context, array $blocks = array())
    {
        // line 14
        ob_start();
        // line 15
        echo "    ";
        if ((!((isset($context["label"]) ? $context["label"] : null) === false))) {
            // line 16
            echo "        ";
            $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : null), array("class" => ((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " control-label")));
            // line 17
            echo "
        ";
            // line 18
            if ((!(isset($context["compound"]) ? $context["compound"] : null))) {
                // line 19
                echo "            ";
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : null), array("for" => (isset($context["id"]) ? $context["id"] : null)));
                // line 20
                echo "        ";
            }
            // line 21
            echo "        ";
            if ((isset($context["required"]) ? $context["required"] : null)) {
                // line 22
                echo "            ";
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : null), array("class" => trim(((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " required"))));
                // line 23
                echo "        ";
            }
            // line 24
            echo "
        ";
            // line 25
            if (twig_test_empty((isset($context["label"]) ? $context["label"] : null))) {
                // line 26
                echo "            ";
                $context["label"] = $this->env->getExtension('form')->humanize((isset($context["name"]) ? $context["name"] : null));
                // line 27
                echo "        ";
            }
            // line 28
            echo "
        ";
            // line 29
            if (((array_key_exists("in_list_checkbox", $context) && (isset($context["in_list_checkbox"]) ? $context["in_list_checkbox"] : null)) && array_key_exists("widget", $context))) {
                // line 30
                echo "            <label";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["attr"]) ? $context["attr"] : null));
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    echo " ";
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                    echo "\"";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo ">
                ";
                // line 31
                echo (isset($context["widget"]) ? $context["widget"] : null);
                echo "
                <span>
                    ";
                // line 33
                if ((!$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()))) {
                    // line 34
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : null), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)), "html", null, true);
                } else {
                    // line 36
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : null), array(), $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "translationDomain", array())), "html", null, true);
                }
                // line 38
                echo "                </span>
            </label>
        ";
            } else {
                // line 41
                echo "            <label";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) ? $context["label_attr"] : null));
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    echo " ";
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                    echo "\"";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo ">
                ";
                // line 42
                if ((!$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()))) {
                    // line 43
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : null), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)), "html", null, true);
                } else {
                    // line 45
                    echo "                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "trans", array(0 => (isset($context["label"]) ? $context["label"] : null), 1 => array(), 2 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "translationDomain", array())), "method"), "html", null, true);
                    echo "
                ";
                }
                // line 47
                echo "            </label>
        ";
            }
            // line 49
            echo "    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 53
    public function block_widget_container_attributes_choice_widget($context, array $blocks = array())
    {
        // line 54
        echo "    ";
        ob_start();
        // line 55
        echo "        id=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\"
        ";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["attr"]) ? $context["attr"] : null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
            echo "=\"";
            if (($context["attrname"] == "class")) {
                echo "unstyled ";
            }
            echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
            echo "\" ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "        ";
        if (!twig_in_filter("class", (isset($context["attr"]) ? $context["attr"] : null))) {
            echo "class=\"unstyled\"";
        }
        // line 58
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 61
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 62
        ob_start();
        // line 63
        echo "    <ul ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
        ";
        // line 64
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 65
            echo "            <li>
                ";
            // line 66
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget');
            echo "
                ";
            // line 67
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'label');
            echo "
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "    </ul>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 74
    public function block_choice_widget($context, array $blocks = array())
    {
        // line 75
        ob_start();
        // line 76
        echo "    ";
        if ((isset($context["compound"]) ? $context["compound"] : null)) {
            // line 77
            echo "        <ul ";
            $this->displayBlock("widget_container_attributes_choice_widget", $context, $blocks);
            echo ">
        ";
            // line 78
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 79
                echo "            <li>
                ";
                // line 80
                ob_start();
                // line 81
                echo "                    ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget');
                echo "
                ";
                $context["form_widget_content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 83
                echo "                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'label', array("in_list_checkbox" => true, "widget" => (isset($context["form_widget_content"]) ? $context["form_widget_content"] : null)) + (twig_test_empty($_label_ = (($this->getAttribute($this->getAttribute($context["child"], "vars", array(), "any", false, true), "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($context["child"], "vars", array(), "any", false, true), "label", array()), null)) : (null))) ? array() : array("label" => $_label_)));
                echo "
            </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 86
            echo "        </ul>
    ";
        } else {
            // line 88
            echo "    <select ";
            $this->displayBlock("widget_attributes", $context, $blocks);
            if ((isset($context["multiple"]) ? $context["multiple"] : null)) {
                echo " multiple=\"multiple\"";
            }
            echo ">
        ";
            // line 89
            if ((!(null === (isset($context["empty_value"]) ? $context["empty_value"] : null)))) {
                // line 90
                echo "            <option value=\"\">
                ";
                // line 91
                if ((!$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()))) {
                    // line 92
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["empty_value"]) ? $context["empty_value"] : null), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : null)), "html", null, true);
                } else {
                    // line 94
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["empty_value"]) ? $context["empty_value"] : null), array(), $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "translationDomain", array())), "html", null, true);
                }
                // line 96
                echo "            </option>
        ";
            }
            // line 98
            echo "        ";
            if ((twig_length_filter($this->env, (isset($context["preferred_choices"]) ? $context["preferred_choices"] : null)) > 0)) {
                // line 99
                echo "            ";
                $context["options"] = (isset($context["preferred_choices"]) ? $context["preferred_choices"] : null);
                // line 100
                echo "            ";
                $this->displayBlock("choice_widget_options", $context, $blocks);
                echo "
            ";
                // line 101
                if ((twig_length_filter($this->env, (isset($context["choices"]) ? $context["choices"] : null)) > 0)) {
                    // line 102
                    echo "                <option disabled=\"disabled\">";
                    echo twig_escape_filter($this->env, (isset($context["separator"]) ? $context["separator"] : null), "html", null, true);
                    echo "</option>
            ";
                }
                // line 104
                echo "        ";
            }
            // line 105
            echo "        ";
            $context["options"] = (isset($context["choices"]) ? $context["choices"] : null);
            // line 106
            echo "        ";
            $this->displayBlock("choice_widget_options", $context, $blocks);
            echo "
    </select>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 112
    public function block_form_row($context, array $blocks = array())
    {
        // line 113
        echo "    ";
        if ((((!array_key_exists("sonata_admin", $context)) || (!(isset($context["sonata_admin_enabled"]) ? $context["sonata_admin_enabled"] : null))) || (!$this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array())))) {
            // line 114
            echo "        <div class=\"control-group ";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
                echo " error";
            }
            echo "\">
            ";
            // line 115
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), null)) : (null))) ? array() : array("label" => $_label_)));
            echo "
            <div class=\"controls ";
            // line 116
            if (((isset($context["label"]) ? $context["label"] : null) === false)) {
                echo "sonata-collection-row-without-label";
            }
            echo "\">
                ";
            // line 117
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
            echo "
                ";
            // line 118
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
                // line 119
                echo "                    <div class=\"help-inline sonata-ba-field-error-messages\">
                        ";
                // line 120
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
                echo "
                    </div>
                ";
            }
            // line 123
            echo "            </div>
        </div>
    ";
        } else {
            // line 126
            echo "        <div class=\"control-group";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
                echo " error";
            }
            echo "\" id=\"sonata-ba-field-container-";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "\">
            ";
            // line 127
            $this->displayBlock('label', $context, $blocks);
            // line 134
            echo "
            ";
            // line 135
            $context["has_label"] = ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "name", array(), "any", true, true) || (!((isset($context["label"]) ? $context["label"] : null) === false)));
            // line 136
            echo "            <div class=\"controls sonata-ba-field sonata-ba-field-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "edit", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "inline", array()), "html", null, true);
            echo " ";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
                echo "sonata-ba-field-error";
            }
            echo " ";
            if ((!(isset($context["has_label"]) ? $context["has_label"] : null))) {
                echo "sonata-collection-row-without-label";
            }
            echo "\">

                ";
            // line 138
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
            echo "

                ";
            // line 140
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
                // line 141
                echo "                    <div class=\"help-inline sonata-ba-field-error-messages\">
                        ";
                // line 142
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
                echo "
                    </div>
                ";
            }
            // line 145
            echo "
                ";
            // line 146
            if ($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "help", array())) {
                // line 147
                echo "                    <span class=\"help-block sonata-ba-field-help\">";
                echo $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "trans", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "help", array()), 1 => array(), 2 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "translationDomain", array())), "method");
                echo "</span>
                ";
            }
            // line 149
            echo "            </div>
        </div>
    ";
        }
    }

    // line 127
    public function block_label($context, array $blocks = array())
    {
        // line 128
        echo "                ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "name", array(), "any", true, true)) {
            // line 129
            echo "                    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label', array("attr" => array("class" => "control-label")) + (twig_test_empty($_label_ = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "options", array()), "name", array())) ? array() : array("label" => $_label_)));
            echo "
                ";
        } else {
            // line 131
            echo "                    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label', array("attr" => array("class" => "control-label")) + (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : null), null)) : (null))) ? array() : array("label" => $_label_)));
            echo "
                ";
        }
        // line 133
        echo "            ";
    }

    // line 154
    public function block_collection_widget_row($context, array $blocks = array())
    {
        // line 155
        ob_start();
        // line 156
        echo "    <div class=\"sonata-collection-row\">
        ";
        // line 157
        if ((isset($context["allow_delete"]) ? $context["allow_delete"] : null)) {
            // line 158
            echo "            <a href=\"#\" class=\"btn sonata-collection-delete\"><i class=\"icon-remove\"></i></a>
        ";
        }
        // line 160
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : null), 'row');
        echo "
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 165
    public function block_collection_widget($context, array $blocks = array())
    {
        // line 166
        ob_start();
        // line 167
        echo "    ";
        if (array_key_exists("prototype", $context)) {
            // line 168
            echo "        ";
            $context["child"] = (isset($context["prototype"]) ? $context["prototype"] : null);
            // line 169
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : null), array("data-prototype" => $this->renderBlock("collection_widget_row", $context, $blocks), "data-prototype-name" => $this->getAttribute($this->getAttribute((isset($context["prototype"]) ? $context["prototype"] : null), "vars", array()), "name", array()), "class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : (""))));
            // line 170
            echo "    ";
        }
        // line 171
        echo "    <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
        ";
        // line 172
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        ";
        // line 173
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 174
            echo "            ";
            $this->displayBlock("collection_widget_row", $context, $blocks);
            echo "
        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
        ";
        // line 177
        if ((isset($context["allow_add"]) ? $context["allow_add"] : null)) {
            // line 178
            echo "            <div><a href=\"#\" class=\"btn sonata-collection-add\"><i class=\"icon-plus\"></i></a></div>
        ";
        }
        // line 180
        echo "    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 184
    public function block_sonata_type_immutable_array_widget($context, array $blocks = array())
    {
        // line 185
        echo "    ";
        ob_start();
        // line 186
        echo "        <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
            ";
        // line 187
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "

            ";
        // line 189
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
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
        foreach ($context['_seq'] as $context["key"] => $context["child"]) {
            // line 190
            echo "                ";
            $this->displayBlock("sonata_type_immutable_array_widget_row", $context, $blocks);
            echo "
            ";
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 192
        echo "
            ";
        // line 193
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 198
    public function block_sonata_type_immutable_array_widget_row($context, array $blocks = array())
    {
        // line 199
        echo "    ";
        ob_start();
        // line 200
        echo "        <div class=\"control-group";
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
            echo " error";
        }
        echo "\" id=\"sonata-ba-field-container-";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
        echo "\">

            ";
        // line 202
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : null), 'label');
        echo "

            <div class=\"controls sonata-ba-field sonata-ba-field-";
        // line 204
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "edit", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "inline", array()), "html", null, true);
        echo " ";
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
            echo "sonata-ba-field-error";
        }
        echo "\">
                ";
        // line 205
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : null), 'widget');
        echo "
            </div>

            ";
        // line 208
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) {
            // line 209
            echo "                <div class=\"help-inline sonata-ba-field-error-messages\">
                    ";
            // line 210
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : null), 'errors');
            echo "
                </div>
            ";
        }
        // line 213
        echo "        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Form:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  710 => 213,  704 => 210,  701 => 209,  699 => 208,  693 => 205,  683 => 204,  678 => 202,  666 => 200,  663 => 199,  660 => 198,  652 => 193,  649 => 192,  632 => 190,  615 => 189,  610 => 187,  605 => 186,  602 => 185,  599 => 184,  593 => 180,  589 => 178,  587 => 177,  582 => 176,  565 => 174,  548 => 173,  544 => 172,  539 => 171,  536 => 170,  533 => 169,  530 => 168,  527 => 167,  525 => 166,  522 => 165,  513 => 160,  509 => 158,  507 => 157,  504 => 156,  502 => 155,  499 => 154,  495 => 133,  489 => 131,  483 => 129,  480 => 128,  477 => 127,  470 => 149,  464 => 147,  462 => 146,  459 => 145,  453 => 142,  450 => 141,  448 => 140,  443 => 138,  427 => 136,  425 => 135,  422 => 134,  420 => 127,  411 => 126,  406 => 123,  400 => 120,  397 => 119,  395 => 118,  391 => 117,  385 => 116,  381 => 115,  374 => 114,  371 => 113,  368 => 112,  358 => 106,  355 => 105,  352 => 104,  346 => 102,  344 => 101,  339 => 100,  336 => 99,  333 => 98,  329 => 96,  326 => 94,  323 => 92,  321 => 91,  318 => 90,  316 => 89,  308 => 88,  304 => 86,  294 => 83,  288 => 81,  286 => 80,  283 => 79,  279 => 78,  274 => 77,  271 => 76,  269 => 75,  266 => 74,  260 => 70,  251 => 67,  247 => 66,  244 => 65,  240 => 64,  235 => 63,  233 => 62,  230 => 61,  225 => 58,  220 => 57,  205 => 56,  200 => 55,  197 => 54,  194 => 53,  188 => 49,  184 => 47,  178 => 45,  175 => 43,  173 => 42,  157 => 41,  152 => 38,  149 => 36,  146 => 34,  144 => 33,  139 => 31,  123 => 30,  121 => 29,  118 => 28,  115 => 27,  112 => 26,  110 => 25,  107 => 24,  104 => 23,  101 => 22,  98 => 21,  95 => 20,  92 => 19,  90 => 18,  87 => 17,  84 => 16,  81 => 15,  79 => 14,  76 => 13,  72 => 198,  69 => 197,  67 => 184,  64 => 183,  62 => 165,  59 => 164,  57 => 154,  54 => 153,  52 => 112,  49 => 111,  47 => 74,  44 => 73,  42 => 61,  39 => 60,  37 => 53,  34 => 52,  32 => 13,  29 => 11,);
    }
}
