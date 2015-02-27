<?php

/* ApplicationSonataAdminBundle:Admin/ExtraBlocks/Tickets:tickets.html.twig */
class __TwigTemplate_aa603c0e44c1f76d65f40e130fef4d673011957e758c0f0df470795cdd5d32d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'tickets_block_tickets_table' => array($this, 'block_tickets_block_tickets_table'),
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
        $this->displayBlock('tickets_block_tickets_table', $context, $blocks);
    }

    public function block_tickets_block_tickets_table($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 12
        if ((array_key_exists("tickets", $context) && (twig_length_filter($this->env, (isset($context["tickets"]) ? $context["tickets"] : null)) > 0))) {
            // line 14
            echo "<table class=\"table table-bordered\">
                <thead>
                    <tr>
                        <th>Тема</th>
                        <th>Информация</th>
                    </tr>
                </thead>
                <tbody>";
            // line 23
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, (isset($context["tickets"]) ? $context["tickets"] : null)));
            foreach ($context['_seq'] as $context["_key"] => $context["ticket"]) {
                // line 25
                echo "<tr id=\"i-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ticket"], "id", array()), "html", null, true);
                echo "\" class=\"tickets-row\" ";
                if (($this->getAttribute($context["ticket"], "isAdminAnswer", array()) == true)) {
                    echo "style=\"background-color: #FFE8E8\" title=\"Тикет требует ответа\"";
                }
                echo ">
                            <td><a href=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_edit", array("id" => $this->getAttribute($context["ticket"], "id", array()))), "html", null, true);
                echo "\" target=\"_blank\" title=\"Перейти на редактирование тикета\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ticket"], "title", array()), "html", null, true);
                echo "</a></td>
                            <td nowrap>
                                ";
                // line 28
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["ticket"], "updatedDateTime", array()), "d.m.y H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
                echo "
                                <br>
                                ";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["ticket"], "status", array()), "captionRu", array()), "html", null, true);
                echo "
                                <br>
                                <a href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_edit", array("hash" => $this->getAttribute($context["ticket"], "hash", array()))), "html", null, true);
                echo "\" target=\"_blank\" title=\"Посмотреть обсуждение на сайте\">
                                    <span class=\"icon icon-home\"></span>
                                </a>
                                &nbsp;
                                <a href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_edit", array("id" => $this->getAttribute($context["ticket"], "id", array()))), "html", null, true);
                echo "\" target=\"_blank\" title=\"Перейти на редактирование тикета\">
                                    <span class=\"icon icon-eye-open\"></span>
                                </a>
                                &nbsp;
                                <span class=\"icon icon-remove tickets-remove\" title=\"Удалить (только звязь с тикетом)\" data-id=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute($context["ticket"], "id", array()), "html", null, true);
                echo "\"></span>
                            </td>
                        </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ticket'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "</tbody>
            </table>";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin/ExtraBlocks/Tickets:tickets.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  99 => 46,  90 => 40,  83 => 36,  76 => 32,  71 => 30,  66 => 28,  59 => 26,  50 => 25,  46 => 23,  37 => 14,  35 => 12,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
