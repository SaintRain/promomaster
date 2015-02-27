<?php

/* CoreTroubleTicketBundle:TroubleTicket:edit.html.twig */
class __TwigTemplate_9c5276ce1c70d2ee7fcad04cb250993919fd8936f8639812098beb16ba6fc435 extends Twig_Template
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
        echo " | OliKids.ru";
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
                    } elseif ($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array())) {
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
        return array (  302 => 101,  291 => 94,  289 => 93,  284 => 91,  281 => 90,  278 => 89,  272 => 86,  260 => 77,  256 => 76,  252 => 75,  246 => 74,  239 => 73,  236 => 72,  232 => 70,  226 => 69,  222 => 67,  216 => 65,  214 => 64,  208 => 62,  202 => 60,  196 => 58,  190 => 56,  188 => 55,  180 => 53,  177 => 52,  173 => 51,  169 => 49,  167 => 48,  164 => 47,  160 => 45,  156 => 43,  145 => 40,  142 => 39,  138 => 38,  133 => 35,  131 => 34,  127 => 33,  124 => 32,  122 => 31,  117 => 29,  113 => 28,  110 => 27,  104 => 25,  98 => 23,  96 => 22,  83 => 20,  79 => 19,  71 => 14,  65 => 11,  61 => 9,  58 => 8,  48 => 6,  42 => 5,  32 => 4,);
    }
}
