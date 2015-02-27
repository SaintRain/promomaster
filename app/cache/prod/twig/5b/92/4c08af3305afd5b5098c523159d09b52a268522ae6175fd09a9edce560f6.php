<?php

/* CoreLogisticsBundle:Admin/Transit/type:products_in_transit_widget.html.twig */
class __TwigTemplate_5b924c08af3305afd5b5098c523159d09b52a268522ae6175fd09a9edce560f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'products_in_transit_widget' => array($this, 'block_products_in_transit_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('products_in_transit_widget', $context, $blocks);
    }

    public function block_products_in_transit_widget($context, array $blocks = array())
    {
        // line 2
        if ((isset($context["inTransit"]) ? $context["inTransit"] : null)) {
            // line 3
            echo "<table class=\"table table-striped table-bordered\">
    <thead>
    <th>Продукт</th>
    <th>Из заказа</th>
    <th>Всего</th>
</thead>
<tbody>
";
            // line 10
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["inTransit"]) ? $context["inTransit"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 11
                echo "        <tr>
    <td><a href=\"";
                // line 12
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute($context["t"], "product", array()), "id", array()))), "html", null, true);
                echo "\"><b>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["t"], "product", array()), "sku", array()), "html", null, true);
                echo "</b> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["t"], "product", array()), "captionRu", array()), "html", null, true);
                echo "</a></td>
    <td>
    ";
                // line 14
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["t"], "booking", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["book"]) {
                    // line 15
                    echo "            <p id=\"book_content";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["book"], "id", array()), "html", null, true);
                    echo "\"><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($context["book"], "composition", array()), "order", array()), "id", array()))), "html", null, true);
                    echo "\">Заказ №";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["book"], "composition", array()), "order", array()), "id", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["book"], "quantity", array()), "html", null, true);
                    echo " шт.</a>

";
                    // line 17
                    if (((!$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "status", array())) || (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "status", array()), "name", array()) != "v-puti") && (!$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "isTransitWasExecuted", array()))))) {
                        // line 18
                        echo "                <a title=\"Удалить из транзита\" class=\"booking-remove\" data-product=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["t"], "product", array()), "id", array()), "html", null, true);
                        echo "\" data-book=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["book"], "id", array()), "html", null, true);
                        echo "\" href=\"javascript:void(0);\"><i class=\"icon-remove\"></i></a>
";
                    }
                    // line 20
                    echo "                </p>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['book'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 22
                echo "            </td>
            <td id=\"book_total";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["t"], "product", array()), "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "total", array()), "html", null, true);
                echo " шт.</td>
            </tr>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "        </tbody>
    </table>

    <script>
        \$(document).ready(function() {
            //удаление из транзита
            \$('a.booking-remove').click(function() {
                var r = confirm(\"Вы действительно хотите удалить из транзита эти товарные позиции?\");
                if (r) {
                    var d_id = \$(this).attr('data-book'),
                            p_id = \$(this).attr('data-product');


                    \$.ajax({
                        url: \"";
            // line 40
            echo $this->env->getExtension('routing')->getPath("core_logistics_delete_book_from_transit");
            echo "\",
                        data: {id: d_id},
                        success: function(data) {
                            console.log(data);

                            \$('#book_total' + p_id).html(data.total + ' шт.');
                            \$('#book_content' + d_id).remove();
                        }
                        //dataType: 'GET'
                    });
                }
            })
        })
        </script>
";
        } else {
            // line 55
            echo "        В транзите нет товара...
";
        }
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Transit/type:products_in_transit_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  134 => 55,  116 => 40,  100 => 26,  89 => 23,  86 => 22,  79 => 20,  71 => 18,  69 => 17,  57 => 15,  53 => 14,  44 => 12,  41 => 11,  37 => 10,  28 => 3,  26 => 2,  20 => 1,);
    }
}
