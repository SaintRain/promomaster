<?php

/* CorePaymentBundle:Admin/List:list_total_amount.html.twig */
class __TwigTemplate_40caaa8630a9cbaf683e14a198ed8c3e678abfd9ee916de2e6d67303565e9f3a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

            throw $e;
        }

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    ";
        // line 13
        $context["totalAmount"] = 0;
        // line 14
        echo "
    ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")));
        foreach ($context['_seq'] as $context["_key"] => $context["payment"]) {
            // line 16
            echo "        ";
            if ($this->getAttribute($context["payment"], "isPassed", array())) {
                // line 17
                echo "            ";
                if (($this->getAttribute($context["payment"], "type", array()) == "+")) {
                    // line 18
                    echo "                ";
                    $context["totalAmount"] = ((isset($context["totalAmount"]) ? $context["totalAmount"] : $this->getContext($context, "totalAmount")) + $this->getAttribute($context["payment"], "amount", array()));
                    // line 19
                    echo "            ";
                } else {
                    // line 20
                    echo "                ";
                    $context["totalAmount"] = ((isset($context["totalAmount"]) ? $context["totalAmount"] : $this->getContext($context, "totalAmount")) - $this->getAttribute($context["payment"], "amount", array()));
                    // line 21
                    echo "            ";
                }
                // line 22
                echo "        ";
            }
            // line 23
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
    <span style=\"color:";
        // line 25
        echo ((((isset($context["totalAmount"]) ? $context["totalAmount"] : $this->getContext($context, "totalAmount")) >= 0)) ? ("green") : ("red"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["totalAmount"]) ? $context["totalAmount"] : $this->getContext($context, "totalAmount"))), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>

";
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:Admin/List:list_total_amount.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 25,  78 => 24,  72 => 23,  69 => 22,  66 => 21,  63 => 20,  60 => 19,  57 => 18,  54 => 17,  51 => 16,  47 => 15,  44 => 14,  42 => 13,  39 => 12,  36 => 11,  11 => 9,);
    }
}
