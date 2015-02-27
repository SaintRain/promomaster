<?php

/* CoreStatisticsBundle:Admin/NotFinishedOrder:show.html.twig */
class __TwigTemplate_766281d94f57007c5d85c110b755c649545f2a5fbad6790ad3f6f021612eb42e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'actions' => array($this, 'block_actions'),
            'side_menu' => array($this, 'block_side_menu'),
            'show' => array($this, 'block_show'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->env->resolveTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_actions($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"sonata-actions btn-group\">
        ";
        // line 5
        $this->env->loadTemplate("SonataAdminBundle:Button:edit_button.html.twig")->display($context);
        // line 6
        echo "        ";
        $this->env->loadTemplate("SonataAdminBundle:Button:history_button.html.twig")->display($context);
        // line 7
        echo "        ";
        $this->env->loadTemplate("SonataAdminBundle:Button:create_button.html.twig")->display($context);
        // line 8
        echo "        ";
        $this->env->loadTemplate("SonataAdminBundle:Button:list_button.html.twig")->display($context);
        // line 9
        echo "    </div>
";
    }

    // line 12
    public function block_side_menu($context, array $blocks = array())
    {
        echo $this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "sidemenu", array(0 => (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action"))), "method"), array("currentClass" => "active"), "list");
    }

    // line 14
    public function block_show($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"sonata-ba-view\">

        ";
        // line 17
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.show.top", array("admin" => (isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "object" => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")))));
        echo "

        ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "showgroups", array()));
        foreach ($context['_seq'] as $context["name"] => $context["view_group"]) {
            // line 20
            echo "            <table class=\"table table-bordered\">
                ";
            // line 21
            if ($context["name"]) {
                // line 22
                echo "                    <thead>
                    <tr class=\"sonata-ba-view-title\">
                        <th colspan=\"2\">
                            ";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "trans", array(0 => $context["name"]), "method"), "html", null, true);
                echo "
                        </th>
                    </tr>
                    </thead>
                ";
            }
            // line 30
            echo "
                <tbody>
                    <tr class=\"sonata-ba-view-container\">
                        <td>Покупатель</td>
                        <td>
                            ";
            // line 35
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragent", array())) {
                // line 36
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_commoncontragent_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragent", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "contragent", array()), "listName", array()), "html", null, true);
                echo "</a>
                                ";
            } else {
                // line 38
                echo "                                    <span class=\"label label-important\">нет</span>
                            ";
            }
            // line 40
            echo "                        </td>
                    </tr>
                    <tr class=\"sonata-ba-view-container\">
                        <td>Способ доставки</td>
                        <td>
                            ";
            // line 45
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryMethod", array())) {
                // line 46
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_delivery_service_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryMethod", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryMethod", array()), "captionRu", array()), "html", null, true);
                echo "</a>
                                ";
            } else {
                // line 48
                echo "                                    <span class=\"label label-important\">нет</span>
                            ";
            }
            // line 50
            echo "                        </td>
                    </tr>
                    <tr class=\"sonata-ba-view-container\">
                        <td>Состав заказа</td>
                        <td>
                            <table class=\"table table-bordered\">
                                <thead>
                                    <tr>
                                        <td>Продукт</td>
                                        <td>Базовая цена</td>
                                        <td>Количество</td>
                                        <td>Итого</td>
                                    </tr>
                                </thead>
                            ";
            // line 64
            $context["totalCost"] = 0;
            // line 65
            echo "                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "compositions", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["composition"]) {
                // line 66
                echo "                                ";
                $context["totalCost"] = ((isset($context["totalCost"]) ? $context["totalCost"] : $this->getContext($context, "totalCost")) + ($this->getAttribute($context["composition"], "cost", array()) * 1));
                // line 67
                echo "                                    <tr>
                                        <td>
                                            <a href=\"";
                // line 69
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "captionRu", array()), "html", null, true);
                echo "</a>
                                            ( <a href=\"";
                // line 70
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "slug", array()))), "html", null, true);
                echo "\">Посмотреть на сайте</a> )
                                        </td>
                                        <td>";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($context["composition"], "price", array()), "html", null, true);
                echo " руб.</td>
                                        <td>";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($context["composition"], "quantity", array()), "html", null, true);
                echo "</td>
                                        <td>";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute($context["composition"], "cost", array()), "html", null, true);
                echo " руб.</td>
                                    </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['composition'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "                                <tfoot>
                                    <tr>
                                        <td colspan=\"3\">Итого</td>
                                        <td colspan=\"4\">
                                            <div class=\"label\">";
            // line 81
            echo twig_escape_filter($this->env, (isset($context["totalCost"]) ? $context["totalCost"] : $this->getContext($context, "totalCost")), "html", null, true);
            echo " руб.</div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['view_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "
        ";
        // line 92
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.show.bottom", array("admin" => (isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "object" => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")))));
        echo "

    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/NotFinishedOrder:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 92,  213 => 91,  197 => 81,  191 => 77,  182 => 74,  178 => 73,  174 => 72,  169 => 70,  163 => 69,  159 => 67,  156 => 66,  151 => 65,  149 => 64,  133 => 50,  129 => 48,  121 => 46,  119 => 45,  112 => 40,  108 => 38,  100 => 36,  98 => 35,  91 => 30,  83 => 25,  78 => 22,  76 => 21,  73 => 20,  69 => 19,  64 => 17,  60 => 15,  57 => 14,  51 => 12,  46 => 9,  43 => 8,  40 => 7,  37 => 6,  35 => 5,  32 => 4,  29 => 3,  20 => 1,);
    }
}
