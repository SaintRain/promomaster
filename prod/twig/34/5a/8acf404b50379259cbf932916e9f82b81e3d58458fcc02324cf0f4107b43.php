<?php

/* CoreOrderBundle:Admin/Batch/reportForProducts:reportForProducts.html.twig */
class __TwigTemplate_345a8acf404b50379259cbf932916e9f82b81e3d58458fcc02324cf0f4107b43 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <style type=\"text/css\" media=\"screen,print\">
        table {font-family:San-Serif,Verdana,Arial;font-size:11px;border:1px solid #000;border-bottom:0;border-right:0;border-collapse: collapse;background-color: #fff;margin:0px 0px 0px 0px;}
        table td, table th {border: 1px solid #000; border-left: 0; border-top: 0; padding: 3px;}        
        table thead th, table tfoot th,
        table thead td, table tfoot td {background-color:#eee;}
        table tbody td {background-color:#fff;}
        table tbody td.head {white-space:nowrap;background-color:#eee;}
        table tbody td.number {white-space:nowrap;background-color:#eee;font-weight: bold;text-align: center}
    </style>

    <h3>Отчет по товарам</h3>
    <table border=\"0\"  width=\"100%\" >
        <thead>
            <tr>
                <th class=\"head\">
                    <b>#</b>
                </th>
                <th class=\"head\">
                    <b>Наименование</b>
                </th>
                <th class=\"head\">
                    <b>Количество</b>
                </th>
                <th class=\"head\">
                    <b>Заказы</b>
                </th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 32
        $context["index"] = 1;
        // line 33
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 34
            echo "                    <tr>
                        <td class=\"number\">";
            // line 35
            echo twig_escape_filter($this->env, (isset($context["index"]) ? $context["index"] : null), "html", null, true);
            echo "</td>
                        <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "sku", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["d"], "product", array()), "captionRu", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "quantity", array()), "html", null, true);
            echo "</td>
                        <td>
                            ";
            // line 39
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["d"], "orders", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["o"]) {
                // line 40
                echo "                                ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["o"], "id", array()), "html", null, true);
                if ( !$this->getAttribute($context["loop"], "last", array())) {
                    echo ", ";
                }
                // line 41
                echo "                            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['o'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "                        </td>
                    </tr>
                    ";
            // line 44
            $context["index"] = ((isset($context["index"]) ? $context["index"] : null) + 1);
            // line 45
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                        </tbody>
                    </table>

                    ";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Batch/reportForProducts:reportForProducts.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  131 => 46,  125 => 45,  123 => 44,  119 => 42,  105 => 41,  99 => 40,  82 => 39,  77 => 37,  71 => 36,  67 => 35,  64 => 34,  59 => 33,  57 => 32,  26 => 3,  20 => 2,);
    }
}
