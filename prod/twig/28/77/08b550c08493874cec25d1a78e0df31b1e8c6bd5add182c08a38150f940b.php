<?php

/* ApplicationSonataAdminBundle:Admin/ExtraBlocks:extra_left_block_1.html.twig */
class __TwigTemplate_287708b550c08493874cec25d1a78e0df31b1e8c6bd5add182c08a38150f940b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("ApplicationSonataAdminBundle:Admin\\ExtraBlocks\\Comments:layout.html.twig");
        // line 9
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."ApplicationSonataAdminBundle:Admin\\ExtraBlocks\\Comments:layout.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->env->loadTemplate("ApplicationSonataAdminBundle:Admin\\ExtraBlocks\\Tickets:layout.html.twig");
        // line 10
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."ApplicationSonataAdminBundle:Admin\\ExtraBlocks\\Tickets:layout.html.twig".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            array(
                'extra_left_block_1' => array($this, 'block_extra_left_block_1'),
            )
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
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('extra_left_block_1', $context, $blocks);
    }

    public function block_extra_left_block_1($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        ob_start();
        // line 14
        echo "


        <div class=\"extra-left-block-1-container\">
            <div class=\"extra-block extra-left-block extra-left-block-1\">

                <ul class=\"nav nav-tabs\">

                    ";
        // line 22
        if ((($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "tabs", array(), "array", true, true) && twig_in_filter("comments", $this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "tabs", array(), "array"))) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))) {
            // line 23
            echo "
                        <li class=\"\">
                            <a href=\"#comments_block\" data-toggle=\"tab\">
                                ";
            // line 26
            $context["count"] = twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "adminComments", array()));
            // line 27
            echo "                                <smal>Комментарии ";
            if (((isset($context["count"]) ? $context["count"] : null) > 0)) {
                echo "<span id=\"comments-count\" class=\"label label-success\">";
                echo twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true);
                echo "</span>";
            } else {
                echo "<span id=\"comments-count\" class=\"label label-warning\">";
                echo twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true);
                echo "</span>";
            }
            echo "</smal>
                            </a>
                        </li>

                    ";
        }
        // line 32
        echo "
                    ";
        // line 33
        if ((($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "tabs", array(), "array", true, true) && twig_in_filter("tickets", $this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "tabs", array(), "array"))) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))) {
            // line 34
            echo "
                        <li class=\"\">
                            <a href=\"#tickets_block\" data-toggle=\"tab\">
                                ";
            // line 37
            $context["count"] = twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "tickets", array()));
            // line 38
            echo "                                <smal>Тикеты ";
            if (((isset($context["count"]) ? $context["count"] : null) > 0)) {
                echo "<span id=\"tickets-count\" class=\"label label-success\">";
                echo twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true);
                echo "</span>";
            } else {
                echo "<span id=\"tickets-count\" class=\"label label-warning\">";
                echo twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true);
                echo "</span>";
            }
            echo "</smal>
                            </a>
                        </li>

                    ";
        }
        // line 43
        echo "                        <li class=\"\">
                            <a id=\"create_ticket\" target=\"_blank\" href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_create");
        echo "\">Создать тикет</a>
                        </li>

                </ul>

                <div class=\"tab-content\">

                    ";
        // line 51
        if ((($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "tabs", array(), "array", true, true) && twig_in_filter("comments", $this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "tabs", array(), "array"))) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))) {
            // line 52
            echo "
                        <div class=\"tab-pane\" id=\"comments_block\">";
            // line 53
            $this->displayBlock("comments_block", $context, $blocks);
            echo "</div>

                    ";
        }
        // line 56
        echo "
                    ";
        // line 57
        if ((($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "tabs", array(), "array", true, true) && twig_in_filter("tickets", $this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "tabs", array(), "array"))) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))) {
            // line 58
            echo "
                        <div class=\"tab-pane\" id=\"tickets_block\">";
            // line 59
            $this->displayBlock("tickets_block", $context, $blocks);
            echo "</div>

                    ";
        }
        // line 62
        echo "
                </div>

            </div>
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 69
        echo "    <script type=\"text/javascript\">
        \$(function(){
            \$('.extra-left-block-1 ul.nav li:nth-child(1) a').trigger('click');
            \$('#create_ticket').click(function(){
                var \$this = \$(this),
                    curLink = \$(this).attr('href').split('?'),
                    newLink = '',
                    //curOwner = \$(\"input.ajax-entity[id*='contragent']\").val(),
                    curOwner = \$('#ticket_owner').text() * 1,
                    curOrder = \$('.tab-content.order-num').data('order');
                curLink = curLink[0];
                newLink = (curOwner) ? newLink + '?userId=' + curOwner : '';
                if (curOrder) {
                    newLink = (newLink.length) ? newLink + '&' : newLink + '?';
                    newLink += 'orderId=' + curOrder;
                }
                \$this.attr('href', curLink + newLink);
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin/ExtraBlocks:extra_left_block_1.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  172 => 69,  163 => 62,  157 => 59,  154 => 58,  152 => 57,  149 => 56,  143 => 53,  140 => 52,  138 => 51,  128 => 44,  125 => 43,  108 => 38,  106 => 37,  101 => 34,  99 => 33,  96 => 32,  79 => 27,  77 => 26,  72 => 23,  70 => 22,  60 => 14,  57 => 13,  51 => 12,  48 => 11,  45 => 8,  42 => 1,  21 => 10,  14 => 9,);
    }
}
