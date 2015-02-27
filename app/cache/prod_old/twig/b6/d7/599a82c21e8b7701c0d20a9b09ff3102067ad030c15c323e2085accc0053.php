<?php

/* CoreDeliveryBundle:Admin/Service:waybill.html.twig */
class __TwigTemplate_b6d7599a82c21e8b7701c0d20a9b09ff3102067ad030c15c323e2085accc0053 extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig"));
        // line 2
        echo "<form action=\"#\" method=\"post\" class=\"waybill-form\">
    <fieldset>
        <legend>Заполните недостающие данные</legend>
        <div class=\"control-group\">
            ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "departureCity", array()), 'label', array("attr" => array("class" => "control-label")));
        echo "
            <div class=\"controls\">";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "departureCity", array()), 'widget');
        echo "</div>
        </div>
        ";
        // line 9
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "terminalFrom", array(), "any", true, true)) {
            // line 10
            echo "            <div class=\"control-group seller-terminal";
            if ((((isset($context["deliveryFrom"]) ? $context["deliveryFrom"] : $this->getContext($context, "deliveryFrom")) == 1) && ((isset($context["company"]) ? $context["company"] : $this->getContext($context, "company")) != "dpd"))) {
                echo " hidden";
            }
            echo "\">
                ";
            // line 11
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "terminalFrom", array()), 'label', array("attr" => array("class" => "control-label")));
            echo "
                <div class=\"controls\">";
            // line 12
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "terminalFrom", array()), 'widget');
            echo "</div>
            </div>
        ";
        }
        // line 15
        echo "        <div class=\"control-group\">
            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "service", array()), 'label', array("attr" => array("class" => "control-label")));
        echo "
            <div class=\"controls\">";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "service", array()), 'widget');
        echo "</div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\">Стоимость доставки</label>
            <div class=\"controls delivery-price\">
                <span class=\"label label-info\">";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["deliveryPrice"]) ? $context["deliveryPrice"] : $this->getContext($context, "deliveryPrice")), "html", null, true);
        echo " руб.</span>
            </div>
        </div>
        ";
        // line 25
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "costly", array(), "any", true, true)) {
            // line 26
            echo "            <div class=\"control-group\">
                ";
            // line 27
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "costly", array()), 'label', array("attr" => array("class" => "control-label")));
            echo "
                <div class=\"controls\">";
            // line 28
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "costly", array()), 'widget');
            echo "</div>
            </div>
        ";
        }
        // line 31
        echo "        ";
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "packageDescription", array(), "any", true, true)) {
            // line 32
            echo "            <div class=\"control-group\">
                ";
            // line 33
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "packageDescription", array()), 'label', array("attr" => array("class" => "control-label")));
            echo "
                <div class=\"controls\">";
            // line 34
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "packageDescription", array()), 'widget');
            echo "</div>
            </div>
        ";
        }
        // line 37
        echo "        <div class=\"control-group\">
            ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "extraServices", array()), 'label', array("attr" => array("class" => "control-label")));
        echo "
            <div class=\"controls\">";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "extraServices", array()), 'widget');
        echo "</div>
        </div>
        ";
        // line 41
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "deliveryFrom", array(), "any", true, true)) {
            // line 42
            echo "        <div class=\"control-group\">
            ";
            // line 43
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "deliveryFrom", array()), 'label', array("attr" => array("class" => "control-label")));
            echo "
            <div class=\"controls\">";
            // line 44
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "deliveryFrom", array()), 'widget');
            echo "</div>
        </div>
        ";
        }
        // line 47
        echo "        ";
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "deliveryTo", array(), "any", true, true)) {
            // line 48
            echo "        <div class=\"control-group\">
            ";
            // line 49
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "deliveryTo", array()), 'label', array("attr" => array("class" => "control-label")));
            echo "
            <div class=\"controls\">";
            // line 50
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "deliveryTo", array()), 'widget');
            echo "</div>
        </div>
        <div class=\"seller-full-address";
            // line 52
            if ((((isset($context["deliveryFrom"]) ? $context["deliveryFrom"] : $this->getContext($context, "deliveryFrom")) == 0) && ((isset($context["company"]) ? $context["company"] : $this->getContext($context, "company")) != "dpd"))) {
                echo " hidden";
            }
            echo "\">
            <div class=\"control-group\">
                ";
            // line 54
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sellerAddr", array()), 'label');
            echo "
                <div class=\"controls\">";
            // line 55
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sellerAddr", array()), 'widget');
            echo "</div>
            </div>
            <div class=\"control-group\">
                ";
            // line 58
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sellerStreetAbbr", array()), 'widget');
            echo "
                <div class=\"controls\">";
            // line 59
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sellerStreet", array()), 'widget');
            echo "</div>
            </div>
            <div class=\"control-group\">
                ";
            // line 62
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sellerHouse", array()), 'label', array("attr" => array("class" => "control-label")));
            echo "
                <div class=\"controls\">";
            // line 63
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sellerHouse", array()), 'widget');
            echo "</div>
            </div>
            <div class=\"control-group\">
                ";
            // line 66
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sellerPlacementType", array()), 'widget');
            echo "
                <div class=\"controls\">";
            // line 67
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sellerPlacement", array()), 'widget');
            echo "</div>
            </div>
            ";
            // line 69
            if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "sellerExtraAddr", array(), "any", true, true)) {
                // line 70
                echo "            <div class=\"control-group\">
                ";
                // line 71
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sellerExtraAddr", array()), 'label', array("attr" => array("class" => "control-label")));
                echo "
                <div class=\"controls\">";
                // line 72
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sellerExtraAddr", array()), 'widget');
                echo "</div>
            </div>
            ";
            }
            // line 75
            echo "        </div>
        ";
        }
        // line 77
        echo "        <div class=\"control-group\">
            ";
        // line 78
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comment", array()), 'label', array("attr" => array("class" => "control-label")));
        echo "
            <div class=\"controls\">";
        // line 79
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comment", array()), 'widget');
        echo "</div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Разбейте адрес доставки на составляющие, если это доставка до дверей клиента</legend>
        <div class=\"buyer-terminal ";
        // line 84
        if ((((isset($context["deliveryTo"]) ? $context["deliveryTo"] : $this->getContext($context, "deliveryTo")) == 1) && ((isset($context["company"]) ? $context["company"] : $this->getContext($context, "company")) != "dpd"))) {
            echo " hidden";
        }
        echo "\">
        <div class=\"control-group\">
            ";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "terminalTo", array()), 'label', array("attr" => array("class" => "control-label")));
        echo "
            <div class=\"controls\">";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "terminalTo", array()), 'widget');
        echo "</div>
        </div>
        </div>
        <div class=\"buyer-full-address";
        // line 90
        if ((((isset($context["deliveryTo"]) ? $context["deliveryTo"] : $this->getContext($context, "deliveryTo")) == 0) && ((isset($context["company"]) ? $context["company"] : $this->getContext($context, "company")) != "dpd"))) {
            echo " hidden";
        }
        echo "\">
            <div class=\"control-group\">
                ";
        // line 92
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "buyerAddr", array()), 'label');
        echo "
                <div class=\"controls\">";
        // line 93
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "buyerAddr", array()), 'widget');
        echo "</div>
            </div>
            <div class=\"control-group\">
                ";
        // line 96
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "streetAbbr", array()), 'widget');
        echo "
                <div class=\"controls\">";
        // line 97
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "street", array()), 'widget');
        echo "</div>
            </div>
            <div class=\"control-group\">
                ";
        // line 100
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "house", array()), 'label', array("attr" => array("class" => "control-label")));
        echo "
                <div class=\"controls\">";
        // line 101
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "house", array()), 'widget');
        echo "</div>
            </div>
            <div class=\"hidden\">
                ";
        // line 104
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sizesOfBox", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["sizesOfBox"]) {
            // line 105
            echo "                    <li>
                        ";
            // line 106
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["sizesOfBox"], 'errors');
            echo "
                        ";
            // line 107
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["sizesOfBox"], 'widget');
            echo "
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sizesOfBox'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo "                ";
        $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "sizesOfBox", array()), "setRendered", array());
        // line 111
        echo "            </div>
            <div class=\"control-group\">
                ";
        // line 113
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "placementType", array()), 'widget');
        echo "
                <div class=\"controls\">";
        // line 114
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "placement", array()), 'widget');
        echo "</div>
            </div>
            ";
        // line 116
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "buyerExtraAddr", array(), "any", true, true)) {
            // line 117
            echo "            <div class=\"control-group\">
                ";
            // line 118
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "buyerExtraAddr", array()), 'label', array("attr" => array("class" => "control-label")));
            echo "
                <div class=\"controls\">";
            // line 119
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "buyerExtraAddr", array()), 'widget');
            echo "</div>
            </div>
            ";
        }
        // line 122
        echo "            <div class=\"hidden\">
                ";
        // line 123
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
            </div>
        </div>
    </fieldset>
</form>";
    }

    public function getTemplateName()
    {
        return "CoreDeliveryBundle:Admin/Service:waybill.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  337 => 123,  334 => 122,  328 => 119,  324 => 118,  321 => 117,  319 => 116,  314 => 114,  310 => 113,  306 => 111,  303 => 110,  294 => 107,  290 => 106,  287 => 105,  283 => 104,  277 => 101,  273 => 100,  267 => 97,  263 => 96,  257 => 93,  253 => 92,  246 => 90,  240 => 87,  236 => 86,  229 => 84,  221 => 79,  217 => 78,  214 => 77,  210 => 75,  204 => 72,  200 => 71,  197 => 70,  195 => 69,  190 => 67,  186 => 66,  180 => 63,  176 => 62,  170 => 59,  166 => 58,  160 => 55,  156 => 54,  149 => 52,  144 => 50,  140 => 49,  137 => 48,  134 => 47,  128 => 44,  124 => 43,  121 => 42,  119 => 41,  114 => 39,  110 => 38,  107 => 37,  101 => 34,  97 => 33,  94 => 32,  91 => 31,  85 => 28,  81 => 27,  78 => 26,  76 => 25,  70 => 22,  62 => 17,  58 => 16,  55 => 15,  49 => 12,  45 => 11,  38 => 10,  36 => 9,  31 => 7,  27 => 6,  21 => 2,  19 => 1,);
    }
}
