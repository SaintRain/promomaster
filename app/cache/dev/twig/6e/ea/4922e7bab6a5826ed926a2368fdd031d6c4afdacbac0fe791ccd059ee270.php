<?php

/* ApplicationSonataUserBundle:Admin/List:list_contragents_info.html.twig */
class __TwigTemplate_6eea4922e7bab6a5826ed926a2368fdd031d6c4afdacbac0fe791ccd059ee270 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

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
        return array (  107 => 25,  103 => 23,  100 => 22,  96 => 20,  88 => 18,  85 => 17,  79 => 16,  76 => 15,  73 => 14,  70 => 13,  67 => 12,  64 => 11,  61 => 10,  58 => 9,  55 => 8,  50 => 7,  47 => 6,  44 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
