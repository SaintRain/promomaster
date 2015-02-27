<?php

/* CoreOrderBundle:Order/Form:legal_info_form.html.twig */
class __TwigTemplate_710efa06be2943a100a11eeef41a72bc929b4cbdcdda472f328af34b4b8b63e3 extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "CoreOrderBundle:Form:row.html.twig"));
        // line 2
        echo "<form class=\"contragent_form ";
        if ((((isset($context["indiForm"]) ? $context["indiForm"] : $this->getContext($context, "indiForm")) && $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "valid", array())) || ((isset($context["isIndi"]) ? $context["isIndi"] : $this->getContext($context, "isIndi")) == 1))) {
            echo "hidden";
        }
        echo "\" id=\"legal_form\" action=\"";
        echo $this->env->getExtension('routing')->getPath("core_order_cart_step2", array("indi" => false));
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " method=\"POST\">
    ";
        // line 3
        if ((!$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "valid", array()))) {
            // line 4
            echo "        <div class=\"attention_box\">
            <h6>";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.form.errors"), "html", null, true);
            echo "</h6>
            ";
            // line 6
            if (((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array())) == 1) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array()), 0, array(), "array"), "message", array()) == "sameContragent"))) {
                // line 7
                echo "                <p>У вас уже существует контрагент с такими данными. Предлагаем его <a class=\"btn-change-contragent with-url\" href=\"";
                echo $this->env->getExtension('routing')->getPath("application_sonata_user_get_user_contragents");
                echo "\"><strong>выбрать</strong></a>
                </p>
            ";
            }
            // line 10
            echo "        </div>
    ";
        }
        // line 12
        echo "    <div class=\"form_group\">
            <fieldset class=\"form_fieldset\">
                ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "legalForm", array()), 'row');
        echo "
                ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "organization", array()), 'row');
        echo "
            </fieldset>
            <fieldset class=\"form_fieldset\">
                ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "inn", array()), 'row');
        echo "
                ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "kpp", array()), 'row');
        echo "
                ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "ogrn", array()), 'row');
        echo "
            </fieldset>
            <fieldset class=\"form_fieldset\">
                ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "chiefPosition", array()), 'row');
        echo "
                ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "chiefFio", array()), 'row');
        echo "
            </fieldset>
                <div class=\"form_row\">
                    ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "bank", array()), 'label', array("label_attr" => array("class" => "form_label")));
        echo "
                    <div class=\"form_row_field ajax-entity";
        // line 28
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "bank", array()), 'errors')) {
            echo " form_field_error";
        }
        echo "\">
                        ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "bank", array()), 'widget');
        echo "
                    </div>
                </div>
                ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "bankAccount", array()), 'row');
        echo "
                ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "corrAccount", array()), 'row');
        echo "
                ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "addressPost", array()), 'row');
        echo "
                ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "addressLegal", array()), 'row');
        echo "
            <fieldset class=\"form_fieldset\">
                ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "phone1", array()), 'row');
        echo "
                ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "fax", array()), 'row');
        echo "
            </fieldset>
            <fieldset class=\"form_fieldset\">
                ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "contactFio", array()), 'row');
        echo "
                ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "site", array()), 'row');
        echo "
            </fieldset>
            <fieldset>
                ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "contactEmail", array()), 'row');
        echo "
            </fieldset>
        ";
        // line 47
        if (((((!$this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "rssNews", array(), "any", true, true)) && $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "password", array(), "any", true, true)) && $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "register", array(), "any", true, true))) {
            // line 48
            echo "            <div class=\"form_padding_group\">
                <ul class=\"form_checkbox_list\">
                    ";
            // line 50
            if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "register", array(), "any", true, true)) {
                // line 51
                echo "                        <li>
                            ";
                // line 52
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "register", array()), 'widget');
                echo "
                            ";
                // line 53
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "register", array()), 'label', array("label_attr" => array("class" => "form_label_simple")));
                echo "
                        </li>
                    ";
            }
            // line 56
            echo "                    <li>
                        ";
            // line 57
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "rssNews", array()), 'widget');
            echo "
                        ";
            // line 58
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "rssNews", array()), 'label', array("label_attr" => array("class" => "form_label_simple")));
            echo "
                    </li>
                </ul>
            </div>
            <fieldset class=\"form_fieldset password ";
            // line 62
            if (((!$this->getAttribute((isset($context["form"]) ? $context["form"] : null), "register", array(), "any", true, true)) || (!$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "register", array()), "vars", array()), "checked", array())))) {
                echo "hidden ";
            }
            echo "\">
                ";
            // line 63
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "password", array()), 'row');
            echo "
            </fieldset>
        ";
        }
        // line 66
        echo "    </div>
    <div class=\"form_group last\">
        <div class=\"form_group_header\">
            <h2>";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.whereSend"), "html", null, true);
        echo "</h2>
            ";
        // line 76
        echo "            ";
        // line 82
        echo "        </div>
        ";
        // line 83
        if ((!$this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()))) {
            // line 84
            echo "        <fieldset class=\"form_fieldset\">
            <div class=\"recipient_part hidden\">
                <label class=\"form_label\">";
            // line 86
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.recipient"), "html", null, true);
            echo "</label>
                <div class=\"form_row\">
                    <div class=\"form_row_field\">
                        <div class=\"recipient_info\"></div>
                    </div>
                </div>
            </div>
        </fieldset>
        ";
        }
        // line 95
        echo "        ";
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contactList", array(), "any", true, true)) {
            // line 96
            echo "            <fieldset class=\"form_fieldset order_recipient_saved_addresses\">
                ";
            // line 97
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contactList", array()), 'row');
            echo "
            </fieldset>
        ";
        }
        // line 100
        echo "        ";
        // line 115
        echo "        <fieldset class=\"form_fieldset\">
            <div class=\"form_row\">
                ";
        // line 117
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "city", array()), 'label', array("label_attr" => array("class" => "form_label")));
        echo "
                <div class=\"form_row_field ajax-entity";
        // line 118
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "city", array()), 'errors')) {
            echo " form_field_error";
        }
        echo "\">
                    ";
        // line 119
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "city", array()), 'widget');
        echo "
                </div>
            </div>
            ";
        // line 122
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "address", array()), 'row');
        echo "
            ";
        // line 135
        echo "        </fieldset>
        <fieldset class=\"form_fieldset\">
            ";
        // line 137
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "mark", array()), 'row');
        echo "
        </fieldset>
        ";
        // line 139
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
    </div>
    <div class=\"order_proceed\">
        <a href=\"";
        // line 142
        echo $this->env->getExtension('routing')->getPath("core_order_cart");
        echo "\" class=\"order_proceed_goprev\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Your Purchase"), "html", null, true);
        echo "</a>
        <span class=\"order_proceed_next\">";
        // line 143
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next Step: «Delivery»"), "html", null, true);
        echo "</span>
        <button type=\"submit\" class=\"common_button big with_arrow\">
            <span>";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Forward"), "html", null, true);
        echo "</span>
        </button>
    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order/Form:legal_info_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 145,  288 => 143,  282 => 142,  276 => 139,  271 => 137,  267 => 135,  263 => 122,  257 => 119,  251 => 118,  247 => 117,  243 => 115,  241 => 100,  235 => 97,  232 => 96,  229 => 95,  217 => 86,  213 => 84,  211 => 83,  208 => 82,  206 => 76,  202 => 69,  197 => 66,  191 => 63,  185 => 62,  178 => 58,  174 => 57,  171 => 56,  165 => 53,  161 => 52,  158 => 51,  156 => 50,  152 => 48,  150 => 47,  145 => 45,  139 => 42,  135 => 41,  129 => 38,  125 => 37,  120 => 35,  116 => 34,  112 => 33,  108 => 32,  102 => 29,  96 => 28,  92 => 27,  86 => 24,  82 => 23,  76 => 20,  72 => 19,  68 => 18,  62 => 15,  58 => 14,  54 => 12,  50 => 10,  43 => 7,  41 => 6,  37 => 5,  34 => 4,  32 => 3,  21 => 2,  19 => 1,);
    }
}
