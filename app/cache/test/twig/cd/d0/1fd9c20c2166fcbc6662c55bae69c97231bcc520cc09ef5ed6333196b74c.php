<?php

/* CoreCommonBundle:Form/ajax_entity/callbacks:contragentInOrder.html.twig */
class __TwigTemplate_cdd01fd9c20c2166fcbc6662c55bae69c97231bcc520cc09ef5ed6333196b74c extends Twig_Template
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
        echo "<script>
    function contragentFormatResult";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "(result) {
    ";
        // line 4
        echo "            return  contragentFormatCommon";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "(result);
        }

        function contragentFormatSelection";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "(result) {
            var html = contragentFormatCommon";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "(result),
                    id = \"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\",
                    fio = '',
                    organization = '',
                    passport='';

            if (result.lastName) {
                fio = result.lastName;
            }

            if (result.firstName) {
                fio = fio + ' ' + result.firstName;
            }
            if (result.surName) {
                fio = fio + ' ' + result.surName;
            }

            if (result.organization) {
                organization = result.organization;
            }
            
            if (result.passport) {
                passport = result.passport;
            }
            
   ";
        // line 40
        echo "
            return html;
        }

        function contragentFormatCommon";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "(result) {
            var html = '',
                    subText = '';

            if (result.lastName) {
                subText = result.lastName;
            }
            if (result.firstName) {
                subText = subText + ' ' + result.firstName;
            }

            if (result.surName) {
                subText = subText + ' ' + result.surName;
            }

            if (result.organization) {
                subText = subText + ' ' + result.organization;
            }

            html = '<b>' + result.userEmail + '</b>' + '<i id=\"ticket_owner\" style=\"display: none;\">' + result.userId + '</i>';
            if (subText) {
                html = html + ', ' + subText;
            }
            return html;
        }

</script>";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Form/ajax_entity/callbacks:contragentInOrder.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 44,  68 => 40,  41 => 9,  37 => 8,  33 => 7,  26 => 4,  22 => 2,  19 => 1,);
    }
}
