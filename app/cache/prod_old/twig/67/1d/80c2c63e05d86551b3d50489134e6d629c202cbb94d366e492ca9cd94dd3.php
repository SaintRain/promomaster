<?php

/* CoreOrderBundle:Order/Form:indi_info_form.html.twig */
class __TwigTemplate_671d80c2c63e05d86551b3d50489134e6d629c202cbb94d366e492ca9cd94dd3 extends Twig_Template
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
        // line 5
        echo "<form class=\"contragent_form";
        if ((((isset($context["legalForm"]) ? $context["legalForm"] : $this->getContext($context, "legalForm")) && (!$this->getAttribute($this->getAttribute((isset($context["legalForm"]) ? $context["legalForm"] : $this->getContext($context, "legalForm")), "vars", array()), "valid", array()))) || (((isset($context["isIndi"]) ? $context["isIndi"] : $this->getContext($context, "isIndi")) == 0) && ((isset($context["isIndi"]) ? $context["isIndi"] : $this->getContext($context, "isIndi")) != null)))) {
            echo " hidden";
        }
        echo "\" id=\"indi_form\" action=\"";
        echo $this->env->getExtension('routing')->getPath("core_order_cart_step2", array("indi" => true));
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " method=\"POST\">
    ";
        // line 6
        if ((!$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "valid", array()))) {
            // line 7
            echo "        <div class=\"attention_box\">
            <h6>";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.form.errors"), "html", null, true);
            echo "</h6>
            ";
            // line 10
            echo "            ";
            if (((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array())) == 1) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array()), 0, array(), "array"), "message", array()) == "sameContragent"))) {
                // line 11
                echo "                <p>У вас уже существует контрагент с такими данными. Предлагаем его <a class=\"btn-change-contragent with-url\" href=\"";
                echo $this->env->getExtension('routing')->getPath("application_sonata_user_get_user_contragents");
                echo "\"><strong>выбрать</strong></a>
                </p>
            ";
            }
            // line 14
            echo "        </div>
    ";
        }
        // line 16
        echo "    <div class=\"form_group\">
        <fieldset class=\"form_fieldset\">
            ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "lastName", array()), 'row');
        echo "
            ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "firstName", array()), 'row');
        echo "
            ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "surName", array()), 'row');
        echo "
        </fieldset>
        <fieldset class=\"form_fieldset\">
            ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "phone1", array()), 'row');
        echo "
        </fieldset>       
        <fieldset>
            ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contragent", array()), "contactEmail", array()), 'row');
        echo "
        </fieldset>
        ";
        // line 28
        if (((((!$this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) && $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "rssNews", array(), "any", true, true)) && $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "password", array(), "any", true, true)) && $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "register", array(), "any", true, true))) {
            // line 29
            echo "            <div class=\"form_padding_group\">
                <ul class=\"form_checkbox_list\">
                    ";
            // line 31
            if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "register", array(), "any", true, true)) {
                // line 32
                echo "                        <li>
                            ";
                // line 33
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "register", array()), 'widget');
                echo "
                            ";
                // line 34
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "register", array()), 'label', array("label_attr" => array("class" => "form_label_simple")));
                echo "
                        </li>
                    ";
            }
            // line 37
            echo "                    <li>
                        ";
            // line 38
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "rssNews", array()), 'widget');
            echo "
                        ";
            // line 39
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "rssNews", array()), 'label', array("label_attr" => array("class" => "form_label_simple")));
            echo "
                    </li>
                </ul>
            </div>
            <fieldset class=\"form_fieldset password ";
            // line 43
            if (((!$this->getAttribute((isset($context["form"]) ? $context["form"] : null), "register", array(), "any", true, true)) || (!$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "register", array()), "vars", array()), "checked", array())))) {
                echo "hidden ";
            }
            echo "\">
                ";
            // line 44
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "password", array()), 'row');
            echo "
            </fieldset>
        ";
        }
        // line 47
        echo "    </div>
    <div class=\"form_group last\">
        ";
        // line 49
        $context["isOtherRecipient"] = ((($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "otherRecipient", array(), "any", true, true) && (!$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "otherRecipient", array()), "vars", array()), "checked", array())))) ? (true) : (false));
        // line 50
        echo "        <div class=\"form_group_header\">
            <h2>";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.whereSend"), "html", null, true);
        echo "</h2>
            ";
        // line 58
        echo "            ";
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "otherRecipient", array(), "any", true, true)) {
            // line 59
            echo "                ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "otherRecipient", array()), 'widget');
            echo "
                ";
            // line 60
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "otherRecipient", array()), 'label', array("label_attr" => array("class" => "form_label_simple")));
            echo "
            ";
        }
        // line 62
        echo "        </div>
        ";
        // line 63
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "otherRecipient", array(), "any", true, true)) {
            // line 64
            echo "            <fieldset class=\"form_fieldset\">
                <div class=\"recipient_part hidden\">
                    <label class=\"form_label\">";
            // line 66
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
        // line 75
        echo "        ";
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contactList", array(), "any", true, true)) {
            // line 76
            echo "            <fieldset class=\"form_fieldset order_recipient_saved_addresses\">
                <div class=\"form_row \">
                    ";
            // line 78
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contactList", array()), 'label', array("label_attr" => array("class" => "form_label")));
            echo "
                    <div class=\"form_row_field\">
                        ";
            // line 80
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contactList", array()), 'widget');
            echo "
                    </div>
                </div>
            </fieldset>
        ";
        }
        // line 85
        echo "        <fieldset class=\"form_fieldset other";
        if ((isset($context["isOtherRecipient"]) ? $context["isOtherRecipient"] : $this->getContext($context, "isOtherRecipient"))) {
            echo " hidden";
        }
        echo "\">
            ";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "lastName", array()), 'row');
        echo "
            ";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "firstName", array()), 'row');
        echo "
        </fieldset>
        ";
        // line 89
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array(), "any", false, true), "passport", array(), "any", true, true)) {
            // line 90
            echo "            <fieldset class=\"form_fieldset";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "passport", array()), "vars", array()), "value", array())) == 0)) {
                echo " hidden";
            }
            echo "\">
                ";
            // line 91
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "passport", array()), 'row');
            echo "
            </fieldset>
        ";
        }
        // line 94
        echo "        <fieldset class=\"form_fieldset other";
        if ((isset($context["isOtherRecipient"]) ? $context["isOtherRecipient"] : $this->getContext($context, "isOtherRecipient"))) {
            echo " hidden";
        }
        echo "\">
            ";
        // line 95
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "phone", array()), 'row');
        echo "
            ";
        // line 96
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "contactEmail", array()), 'row');
        echo "
        </fieldset>
        <fieldset class=\"form_fieldset\">
            <div class=\"form_row\">
                ";
        // line 100
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "city", array()), 'label', array("label_attr" => array("class" => "form_label")));
        echo "
                <div class=\"form_row_field ajax-entity";
        // line 101
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "city", array()), 'errors')) {
            echo " form_field_error";
        }
        echo "\">
                    ";
        // line 102
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "city", array()), 'widget');
        echo "
                </div>
            </div>
            ";
        // line 105
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "address", array()), 'row');
        echo "
            ";
        // line 116
        echo "        </fieldset>
        <fieldset class=\"form_fieldset\">
            ";
        // line 118
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact", array()), "mark", array()), 'row');
        echo "
        </fieldset>
        ";
        // line 120
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
    </div>
    <div class=\"order_proceed\">
        <a href=\"";
        // line 123
        echo $this->env->getExtension('routing')->getPath("core_order_cart");
        echo "\" class=\"order_proceed_goprev\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Your Purchase"), "html", null, true);
        echo "</a>
        <span class=\"order_proceed_next\">
            ";
        // line 125
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "isOrderHavePhysicalProduct", array(), "array")) {
            // line 126
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next Step: «Delivery»"), "html", null, true);
            echo "
                ";
        } else {
            // line 128
            echo "                    ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next Step: «Payment»"), "html", null, true);
            echo "
            ";
        }
        // line 130
        echo "        </span>
        <button type=\"submit\" class=\"common_button big with_arrow\">
            <span>";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Forward"), "html", null, true);
        echo "</span>
        </button>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order/Form:indi_info_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  307 => 132,  303 => 130,  297 => 128,  291 => 126,  289 => 125,  282 => 123,  276 => 120,  271 => 118,  267 => 116,  263 => 105,  257 => 102,  251 => 101,  247 => 100,  240 => 96,  236 => 95,  229 => 94,  223 => 91,  216 => 90,  214 => 89,  209 => 87,  205 => 86,  198 => 85,  190 => 80,  185 => 78,  181 => 76,  178 => 75,  166 => 66,  162 => 64,  160 => 63,  157 => 62,  152 => 60,  147 => 59,  144 => 58,  140 => 51,  137 => 50,  135 => 49,  131 => 47,  125 => 44,  119 => 43,  112 => 39,  108 => 38,  105 => 37,  99 => 34,  95 => 33,  92 => 32,  90 => 31,  86 => 29,  84 => 28,  79 => 26,  73 => 23,  67 => 20,  63 => 19,  59 => 18,  55 => 16,  51 => 14,  44 => 11,  41 => 10,  37 => 8,  34 => 7,  32 => 6,  21 => 5,  19 => 1,);
    }
}
