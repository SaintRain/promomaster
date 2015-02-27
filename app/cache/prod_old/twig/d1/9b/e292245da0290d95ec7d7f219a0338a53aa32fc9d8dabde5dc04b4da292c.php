<?php

/* ApplicationSonataUserBundle:Admin/List:list_contragents_info.html.twig */
class __TwigTemplate_d19be292245da0290d95ec7d7f219a0338a53aa32fc9d8dabde5dc04b4da292c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");

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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "    
    ";
        // line 4
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragents", array()))) {
            // line 5
            echo "        ";
            $context["ids"] = "";
            // line 6
            echo "        ";
            $context["ordersTotal"] = 0;
            // line 7
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragents", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["contragent"]) {
                // line 8
                echo "            ";
                if (twig_length_filter($this->env, $this->getAttribute($context["contragent"], "orders", array()))) {
                    // line 9
                    echo "                ";
                    if (((isset($context["ordersTotal"]) ? $context["ordersTotal"] : $this->getContext($context, "ordersTotal")) > 0)) {
                        // line 10
                        echo "                    ";
                        $context["ids"] = (((isset($context["ids"]) ? $context["ids"] : $this->getContext($context, "ids")) . ",") . $this->getAttribute($context["contragent"], "id", array()));
                        // line 11
                        echo "                    ";
                    } else {
                        // line 12
                        echo "                        ";
                        $context["ids"] = ((isset($context["ids"]) ? $context["ids"] : $this->getContext($context, "ids")) . $this->getAttribute($context["contragent"], "id", array()));
                        // line 13
                        echo "                ";
                    }
                    // line 14
                    echo "                ";
                    $context["ordersTotal"] = ((isset($context["ordersTotal"]) ? $context["ordersTotal"] : $this->getContext($context, "ordersTotal")) + twig_length_filter($this->env, $this->getAttribute($context["contragent"], "orders", array())));
                    // line 15
                    echo "            ";
                }
                // line 16
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contragent'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "        ";
            if (((isset($context["ordersTotal"]) ? $context["ordersTotal"] : $this->getContext($context, "ordersTotal")) > 0)) {
                // line 18
                echo "            <a target=\"blank\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_list", array("filter[contragent__user__email][value]" => (isset($context["ids"]) ? $context["ids"] : $this->getContext($context, "ids")))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->transchoice("orderCount", (isset($context["ordersTotal"]) ? $context["ordersTotal"] : $this->getContext($context, "ordersTotal"))), "html", null, true);
                echo "</a>
            ";
            } else {
                // line 20
                echo "                <div class=\"label\">Заказов нет</div>
        ";
            }
            // line 22
            echo "        ";
        } else {
            // line 23
            echo "            <div class=\"label\">Заказов нет</div>
    ";
        }
        // line 25
        echo "    
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/List:list_contragents_info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 25,  95 => 23,  92 => 22,  88 => 20,  80 => 18,  77 => 17,  71 => 16,  68 => 15,  65 => 14,  62 => 13,  59 => 12,  56 => 11,  53 => 10,  50 => 9,  47 => 8,  42 => 7,  39 => 6,  36 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
