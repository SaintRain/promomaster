<?php

/* ApplicationSonataUserBundle:Contragent:list_in_header.html.twig */
class __TwigTemplate_6083a6de2b0ff57d6128796df7ce178ef908a70cde8a4feb04f772d69bcaa11f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'list_contragents' => array($this, 'block_list_contragents'),
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
        $this->displayBlock('list_contragents', $context, $blocks);
    }

    public function block_list_contragents($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        <ul class=\"change-contragent\" data-url=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_ajax_change_contragent");
        echo "\">

            ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["contragents"]) ? $context["contragents"] : $this->getContext($context, "contragents")));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 15
            echo "
                <li>
                    <span ";
            // line 17
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "current_contragent_id"), "method") != $this->getAttribute($context["c"], "id", array()))) {
                echo "class=\"text_tgl\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "id", array()), "html", null, true);
                echo "\"";
            } else {
                echo " class=\"text_tgl contragent-selected\" title=\"Текущий контрагент\"";
            }
            echo ">";
            // line 19
            if ($this->getAttribute($context["c"], "legalForm", array(), "any", true, true)) {
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "organization", array()), "html", null, true);
            } else {
                // line 22
                echo twig_escape_filter($this->env, (((($this->getAttribute($context["c"], "lastName", array()) . " ") . $this->getAttribute($context["c"], "firstName", array())) . " ") . $this->getAttribute($context["c"], "surName", array())), "html", null, true);
            }
            // line 25
            echo "</span>
                </li>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "
        </ul>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contragent:list_in_header.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  77 => 29,  68 => 25,  65 => 22,  62 => 20,  60 => 19,  51 => 17,  47 => 15,  43 => 14,  38 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
