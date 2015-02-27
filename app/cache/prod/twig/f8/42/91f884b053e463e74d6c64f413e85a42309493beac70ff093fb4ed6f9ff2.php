<?php

/* CoreOrderBundle:Admin/Batch/delliveryWaybills:one_row_for_body.html.twig */
class __TwigTemplate_f84291f884b053e463e74d6c64f413e85a42309493beac70ff093fb4ed6f9ff2 extends Twig_Template
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
        echo "<tr>
    <td>
        <b>";
        // line 3
        if ($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryMethod", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryMethod", array()), "captionRu", array()), "html", null, true);
        }
        echo "</b>
    </td>
    <td>
        ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()), "html", null, true);
        echo "
    </td>
    <td>
        ";
        // line 9
        if ($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "seller", array(), "any", false, true), "caption", array(), "any", true, true)) {
            // line 10
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "seller", array()), "caption", array()), "html", null, true);
            echo "<br/>
            ИНН: ";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "seller", array()), "inn", array()), "html", null, true);
            echo "
        ";
        }
        // line 13
        echo "    </td>
    <td>
        ";
        // line 15
        if ($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array(), "any", false, true), "organization", array(), "any", true, true)) {
            // line 16
            echo "            ";
            // line 17
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "organization", array()), "html", null, true);
            echo "
            ИНН: ";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "inn", array()), "html", null, true);
            echo "
            Конт. лицо: ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "contactFio", array()), "html", null, true);
            echo "
        ";
        } else {
            // line 21
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "lastName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "surName", array()), "html", null, true);
            echo "<br/>
            ";
            // line 22
            if ($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone1", array())) {
                // line 23
                echo "                ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone1", array()), "html", null, true);
                echo "
            ";
            } else {
                // line 25
                echo "                ";
                if ($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone2", array())) {
                    // line 26
                    echo "                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone2", array()), "html", null, true);
                    echo "
                ";
                } else {
                    // line 28
                    echo "                    ";
                    if ($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone3", array())) {
                        // line 29
                        echo "                        ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone3", array()), "html", null, true);
                        echo "
                    ";
                    }
                    // line 31
                    echo "                ";
                }
                // line 32
                echo "            ";
            }
            // line 33
            echo "        ";
        }
        // line 34
        echo "    </td>
    <td align=\"right\">
        ";
        // line 36
        if (($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryMethod", array()) && $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryMethod", array()), "isCashOnDelivery", array()))) {
            // line 37
            echo "            ";
            if ((!$this->getAttribute((isset($context["d"]) ? $context["d"] : null), "isDeliveryIncludedInPayment", array()))) {
                echo "При получении ";
            }
            // line 38
            echo "            ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryCost", array())), "html", null, true);
            echo "
        ";
        } else {
            // line 40
            echo "            ";
            if ((!$this->getAttribute((isset($context["d"]) ? $context["d"] : null), "isDeliveryIncludedInPayment", array()))) {
                echo "При получении ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryCost", array())), "html", null, true);
                echo "
            ";
            } else {
                // line 42
                echo "                <b>";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryCost", array())), "html", null, true);
                echo "</b>
            ";
            }
            // line 44
            echo "
        ";
        }
        // line 46
        echo "    </td>
    <td align=\"right\">
        ";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "getCost", array())), "html", null, true);
        echo "
    </td>
    <td>
        ";
        // line 51
        if ($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryCity", array())) {
            // line 52
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryCity", array()), "name", array()), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryCity", array()), "region", array()), "name", array()), "html", null, true);
            echo ")<br/>
        ";
        }
        // line 54
        echo "        ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "deliveryAddress", array()), "html", null, true);
        echo "
    </td>
    <td>
        ";
        // line 57
        if ($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone1", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone1", array()), "html", null, true);
            echo "<br/>";
        }
        // line 58
        echo "        ";
        if ($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone2", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone2", array()), "html", null, true);
            echo "<br/>";
        }
        // line 59
        echo "        ";
        if ($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone2", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "contragent", array()), "phone3", array()), "html", null, true);
            echo "<br/>";
        }
        // line 60
        echo "    </td>
    <td>
        ";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "comments", array()), "html", null, true);
        echo "
    </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Batch/delliveryWaybills:one_row_for_body.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 62,  194 => 60,  188 => 59,  182 => 58,  177 => 57,  170 => 54,  162 => 52,  160 => 51,  154 => 48,  150 => 46,  146 => 44,  140 => 42,  132 => 40,  126 => 38,  121 => 37,  119 => 36,  115 => 34,  112 => 33,  109 => 32,  106 => 31,  100 => 29,  97 => 28,  91 => 26,  88 => 25,  82 => 23,  80 => 22,  71 => 21,  66 => 19,  62 => 18,  57 => 17,  55 => 16,  53 => 15,  49 => 13,  44 => 11,  39 => 10,  37 => 9,  31 => 6,  23 => 3,  19 => 1,);
    }
}
