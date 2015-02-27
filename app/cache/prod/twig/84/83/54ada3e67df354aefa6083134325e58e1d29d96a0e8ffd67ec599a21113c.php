<?php

/* CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:badRecords.html.twig */
class __TwigTemplate_848354ada3e67df354aefa6083134325e58e1d29d96a0e8ffd67ec599a21113c extends Twig_Template
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
        // line 2
        echo "<div class=\"tab-pane \" id=\"";
        echo twig_escape_filter($this->env, (isset($context["uniqid"]) ? $context["uniqid"] : null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, ((isset($context["ind"]) ? $context["ind"] : null) + 4), "html", null, true);
        echo "\">
    <fieldset>
        <div class=\"sonata-ba-collapsed-fields\">
            <p>Показаны записи из прайса, которые определены как испорченные.<br/> 
                Также сюда попадают записе для которых не указана МРЦ (если есть настройка у производителя) 
                или если не указана закупочная цена.<br>
                Всего ";
        // line 8
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "analysisBadRecords", array())), "html", null, true);
        echo " шт.</p>
            
            
            ";
        // line 11
        if ($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "analysisBadRecords", array())) {
            // line 12
            echo "                <table class=\"table table-bordered table-hover outOfStock\" style=\"width:100%\">
                    <thead>
                        <tr>                        
                            <th style=\"width: 50px;background-color: #f5f5f5\">№ <span style=\"font-size:10px\">строки из прайса</span></th>
                                ";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "analysisBadRecords", array()));
            foreach ($context['_seq'] as $context["row_index"] => $context["row"]) {
                if (($context["row_index"] == 0)) {
                    // line 17
                    echo "                                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($context["row"]);
                    foreach ($context['_seq'] as $context["cell_index"] => $context["cell"]) {
                        // line 18
                        echo "                                    <th style=\"background-color: #f5f5f5\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->numberToLetterFunction($context["cell_index"]), "html", null, true);
                        echo "</th>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['cell_index'], $context['cell'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 20
                    echo "                                ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['row_index'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 24
            $context["index"] = 1;
            // line 25
            echo "                        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "analysisBadRecords", array()));
            foreach ($context['_seq'] as $context["row_index"] => $context["row"]) {
                // line 26
                echo "                            <tr>
                                <td style=\"background-color: #f5f5f5\">";
                // line 27
                echo twig_escape_filter($this->env, ($context["row_index"] + 1), "html", null, true);
                echo "</td>
                                ";
                // line 28
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($context["row"]);
                foreach ($context['_seq'] as $context["cell_index"] => $context["cell"]) {
                    // line 29
                    echo "                                    <td>";
                    echo twig_escape_filter($this->env, $context["cell"], "html", null, true);
                    echo "</td>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['cell_index'], $context['cell'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 31
                echo "                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['row_index'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "                
                    </tbody>
                </table>
            ";
        }
        // line 36
        echo "        </div>
    </fieldset>
</div>
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/SupplierPriceAnalysis/tabs:badRecords.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 36,  110 => 32,  103 => 31,  94 => 29,  90 => 28,  86 => 27,  83 => 26,  78 => 25,  76 => 24,  71 => 21,  64 => 20,  55 => 18,  50 => 17,  45 => 16,  39 => 12,  37 => 11,  31 => 8,  19 => 2,);
    }
}
