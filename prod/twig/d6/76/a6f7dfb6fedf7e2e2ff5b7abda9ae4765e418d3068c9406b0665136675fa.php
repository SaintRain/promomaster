<?php

/* CoreTroubleTicketBundle:TroubleTicket:edit.html.twig */
class __TwigTemplate_d676a6f7dfb6fedf7e2e2ff5b7abda9ae4765e418d3068c9406b0665136675fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreTroubleTicketBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'trouble_ticket_content' => array($this, 'block_trouble_ticket_content'),
            'js_head' => array($this, 'block_js_head'),
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
        echo "Обращение №";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "id", array()), "html", null, true);
        echo " от ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo " | PromoMaster.net";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "обращение, ответ";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Обращение №";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "id", array()), "html", null, true);
        echo " от ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo " на сайте OliKids. Как только представитель интернет-магазина ответит Вам - Вы увидите ответ на этой странице.";
    }

    // line 8
    public function block_trouble_ticket_content($context, array $blocks = array())
    {
        // line 9
        echo "<ul class=\"cabinet_page_path page_path_links\">
    <li class=\"page_path_link\">
        <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) ? ($this->env->getExtension('routing')->getPath("trouble_ticket_index_auth")) : ($this->env->getExtension('routing')->getPath("trouble_ticket_index", array("owner" => $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "owner", array()))))), "html", null, true);
        echo "\">Мои обращения</a>
    </li>
    <li class=\"page_path_link\">
        <strong>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "title", array()), "html", null, true);
        echo "</strong>
    </li>
</ul>
<div class=\"cabinet_discussion\">
    <div class=\"controls\">
        <a target=\"blank\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_edit", array("hash" => $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "hash", array()), "print" => "true")), "html", null, true);
        echo "\" class=\"print with_icon text_tgl\">Напечатать</a>
        <span class=\"text_tgl ";
        // line 20
        if ($this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "status", array()), "isEditable", array())) {
            echo "close_action";
        } else {
            echo "closed";
        }
        echo "\" data-id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "id", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "status", array()), "isEditable", array())) ? ("Закрыть обращение") : ($this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "status", array()), "captionRu", array()))), "html", null, true);
        echo "</span>
    </div>
    ";
        // line 22
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 23
            echo "        <h2>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "title", array()), "html", null, true);
            echo "</h2>
        ";
        } else {
            // line 25
            echo "            <h1>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "title", array()), "html", null, true);
            echo "</h1>
    ";
        }
        // line 27
        echo "    <ul class=\"cabinet_discussion_info\">
        <li>";
        // line 28
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo "</li>
        <li>&numero;";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "id", array()), "html", null, true);
        echo "</li>
    </ul>
    ";
        // line 31
        if (($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "body", array()) || twig_length_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "file", array())))) {
            // line 32
            echo "        <div class=\"cabinet_discussion_text\">
            ";
            // line 33
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "body", array()), "html", null, true));
            echo "
            ";
            // line 34
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "file", array()))) {
                // line 35
                echo "                <h4>Прикрипленные файлы</h4>
                <br />
                <ul>
                    ";
                // line 38
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "file", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                    // line 39
                    echo "                        <li>
                            <a href=\"";
                    // line 40
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["file"])), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "name", array()), "html", null, true);
                    echo "</a>
                        </li>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 43
                echo "                </ul>
            ";
            }
            // line 45
            echo "        </div>
    ";
        }
        // line 47
        echo "        <section class=\"cabinet_discussion_comments\">
            ";
        // line 48
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "logs", array()))) {
            // line 49
            echo "                <h3>Обсуждение</h3>
                <ul class=\"cabinet_discussion_comments_list\">
                    ";
            // line 51
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "logs", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 52
                echo "                        ";
                if ($this->getAttribute($context["log"], "message", array())) {
                    // line 53
                    echo "                            <li class=\"cabinet_discussion_comment ";
                    if ($this->getAttribute($context["log"], "manager", array())) {
                        echo "official";
                    }
                    echo "\">
                                <span class=\"cabinet_discussion_comment_info\">
                                    ";
                    // line 55
                    if ($this->getAttribute($context["log"], "manager", array())) {
                        // line 56
                        echo "                                        <strong>";
                        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($context["log"], "manager", array()), "fullName", array())) ? ($this->getAttribute($this->getAttribute($context["log"], "manager", array()), "fullName", array())) : ($this->getAttribute($context["log"], "userName", array()))), "html", null, true);
                        echo " (сотрудник OliKids)</strong>
                                        ";
                    } elseif ($this->getAttribute(                    // line 57
(isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array())) {
                        // line 58
                        echo "                                            <strong>";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array()), "html", null, true);
                        echo "</strong>
                                        ";
                    } else {
                        // line 60
                        echo "                                            <strong>";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorEmail", array()), "html", null, true);
                        echo "</strong>
                                    ";
                    }
                    // line 62
                    echo "                                    <span>";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["log"], "date", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
                    echo "</span>
                                </span>
                                ";
                    // line 64
                    if ($this->getAttribute($context["log"], "message", array())) {
                        // line 65
                        echo "                                    <div>";
                        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["log"], "message", array()), "body", array()), "html", null, true));
                        echo "</div>
                                ";
                    }
                    // line 67
                    echo "                            </li>
                        ";
                }
                // line 69
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "                </ul>
            ";
        }
        // line 72
        echo "            ";
        if ($this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "status", array()), "isEditable", array())) {
            // line 73
            echo "            <form class=\"cabinet_discussion_comments_add\" action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_edit", array("hash" => $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "hash", array()))), "html", null, true);
            echo "\" ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
            echo " method=\"POST\">
                <div class=\"form_row";
            // line 74
            if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'errors')) {
                echo " form_field_error";
            }
            echo "\">
                    ";
            // line 75
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'widget');
            echo "
                    ";
            // line 76
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'errors');
            echo "
                    ";
            // line 77
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
            echo "
                </div>
                <div class=\"form_submit\">
                    <button class=\"common_button big\">
                        <span>Добавить</span>
                    </button>
                </div>
            </form>
            ";
        }
        // line 86
        echo "        </section>
</div>
";
    }

    // line 89
    public function block_js_head($context, array $blocks = array())
    {
        // line 90
        echo "
        ";
        // line 91
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
        <script>
            ";
        // line 93
        if ($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "adminAnswers", array())) {
            // line 94
            echo "                settingsJS.routes['trouble_ticket_read'] = '";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_read", array("hash" => $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "hash", array()))), "html", null, true);
            echo "';
                (function(\$){
                    \$(function(){
                        readTicket(settingsJS.routes['trouble_ticket_read']);
                    });
                })(jQuery)
            ";
        }
        // line 101
        echo "            settingsJS.routes['trouble_ticket_close'] = '";
        echo $this->env->getExtension('routing')->getPath("trouble_ticket_close", array("id" => "PLACEHOLDER"));
        echo "';
        </script>
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:TroubleTicket:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  311 => 101,  300 => 94,  298 => 93,  293 => 91,  290 => 90,  287 => 89,  281 => 86,  269 => 77,  265 => 76,  261 => 75,  255 => 74,  248 => 73,  245 => 72,  241 => 70,  235 => 69,  231 => 67,  225 => 65,  223 => 64,  217 => 62,  211 => 60,  205 => 58,  203 => 57,  198 => 56,  196 => 55,  188 => 53,  185 => 52,  181 => 51,  177 => 49,  175 => 48,  172 => 47,  168 => 45,  164 => 43,  153 => 40,  150 => 39,  146 => 38,  141 => 35,  139 => 34,  135 => 33,  132 => 32,  130 => 31,  125 => 29,  121 => 28,  118 => 27,  112 => 25,  106 => 23,  104 => 22,  91 => 20,  87 => 19,  79 => 14,  73 => 11,  69 => 9,  66 => 8,  56 => 6,  50 => 5,  40 => 4,  11 => 1,);
    }
}
