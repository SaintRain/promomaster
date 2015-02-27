<?php

/* CoreTroubleTicketBundle:TroubleTicket:index.html.twig */
class __TwigTemplate_9d8f7eddea18d73366fa447d9f08550ac4e2de4e2f90e6ddd9dfeb9e18be930a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreTroubleTicketBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'trouble_ticket_content' => array($this, 'block_trouble_ticket_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreTroubleTicketBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Обращения и жалобы | OliKids.ru";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "обращения, жалобы";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Список Ваших обращений и жалоб интернет-магазину OliKids.";
    }

    // line 8
    public function block_trouble_ticket_content($context, array $blocks = array())
    {
        // line 9
        echo "    <section class=\"cabinet_discussions\">
        <div>
            <h3 class=\"pull_right marg_off\">
                <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("trouble_ticket_contact");
        echo "#ask-a-question\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("ticket.create"), "html", null, true);
        echo "</a>
            </h3>
        ";
        // line 14
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 15
            echo "            <h2>Мои обращения</h2>
            ";
        } else {
            // line 17
            echo "            <h1>Мои обращения</h1>
        ";
        }
        // line 19
        echo "        </div>
        ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tickets"]) ? $context["tickets"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["ticket"]) {
            // line 21
            echo "            <dl class=\"cabinet_discussions_list\">
                <dt class=\"cabinet_discussion_item\">
                    ";
            // line 23
            if ($this->getAttribute($context["ticket"], "adminAnswers", array())) {
                // line 24
                echo "                    <span class=\"cabinet_discussion_item_status cabinet_discussion_status updated\">
                        <span class=\"notice_indicator\">";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($context["ticket"], "adminAnswers", array()), "html", null, true);
                echo "</span> Обновлен
                    </span>
                    ";
            } else {
                // line 28
                echo "                        <span class=\"cabinet_discussion_item_status cabinet_discussion_status ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["ticket"], "status", array()), "sysname", array()), "html", null, true);
                echo "\">
                            ";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["ticket"], "status", array()), "captionRu", array()), "html", null, true);
                echo "
                        </span>
                    ";
            }
            // line 32
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_edit", array("hash" => $this->getAttribute($context["ticket"], "hash", array()))), "html", null, true);
            echo "\" class=\"cabinet_discussion_item_theme\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["ticket"], "title", array()), "html", null, true);
            echo "</a>
                    <span class=\"cabinet_discussion_item_info\">";
            // line 33
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["ticket"], "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "</span>
                    <span class=\"cabinet_item_discussion_info\">&numero;";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["ticket"], "id", array()), "html", null, true);
            echo "</span>
                </dt>
                ";
            // line 36
            if ($this->getAttribute($context["ticket"], "body", array())) {
                // line 37
                echo "                    <dd class=\"cabinet_discussion_item_preview\">";
                echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["ticket"], "body", array()), "html", null, true));
                echo "</dd>
                ";
            }
            // line 39
            echo "            </dl>
            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 41
            echo "                <div class=\"attention_box\">
                    <h6>";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("tickets not found"), "html", null, true);
            echo "</h6>
                </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ticket'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "    </section>
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:TroubleTicket:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 45,  141 => 42,  138 => 41,  132 => 39,  126 => 37,  124 => 36,  119 => 34,  115 => 33,  108 => 32,  102 => 29,  97 => 28,  91 => 25,  88 => 24,  86 => 23,  82 => 21,  77 => 20,  74 => 19,  70 => 17,  66 => 15,  64 => 14,  57 => 12,  52 => 9,  49 => 8,  43 => 6,  37 => 5,  31 => 4,);
    }
}
