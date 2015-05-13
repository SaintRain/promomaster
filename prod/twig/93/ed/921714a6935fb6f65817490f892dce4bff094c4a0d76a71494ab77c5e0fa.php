<?php

/* CoreTroubleTicketBundle:TroubleTicket:edit_print.html.twig */
class __TwigTemplate_93ed921714a6935fb6f65817490f892dce4bff094c4a0d76a71494ab77c5e0fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'footer' => array($this, 'block_footer'),
            'menu' => array($this, 'block_menu'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::main_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_header($context, array $blocks = array())
    {
        echo " ";
    }

    // line 3
    public function block_footer($context, array $blocks = array())
    {
        echo " ";
    }

    // line 4
    public function block_menu($context, array $blocks = array())
    {
        echo " ";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div role=\"main\" class=\"cabinet_page";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) == null)) {
            echo " guest";
        }
        echo "\" id=\"content\">
    <div class=\"cabinet_discussion\">
        ";
        // line 8
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 9
            echo "            <h2>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "title", array()), "html", null, true);
            echo "</h2>
            ";
        } else {
            // line 11
            echo "                <h1>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "title", array()), "html", null, true);
            echo "</h1>
        ";
        }
        // line 13
        echo "        <ul class=\"cabinet_discussion_info\">
            <li>";
        // line 14
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo "</li>
            <li>&numero;";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "id", array()), "html", null, true);
        echo "</li>
        </ul>
        ";
        // line 17
        if (($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "body", array()) || twig_length_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "file", array())))) {
            // line 18
            echo "            <div class=\"cabinet_discussion_text\">
                ";
            // line 19
            echo $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "body", array());
            echo "
                ";
            // line 20
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "file", array()))) {
                // line 21
                echo "                    <h4>Прикрипленные файлы</h4>
                    <br />
                    <ul>
                        ";
                // line 24
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "file", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                    // line 25
                    echo "                            <li>
                                <a href=\"";
                    // line 26
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
                // line 29
                echo "                    </ul>
                ";
            }
            // line 31
            echo "            </div>
        ";
        }
        // line 33
        echo "            <section class=\"cabinet_discussion_comments\">
                ";
        // line 34
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "logs", array()))) {
            // line 35
            echo "                    <h3>Обсуждение</h3>
                    <ul class=\"cabinet_discussion_comments_list\">
                        ";
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "logs", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 38
                echo "                            ";
                if ($this->getAttribute($context["log"], "message", array())) {
                    // line 39
                    echo "                                <li class=\"cabinet_discussion_comment ";
                    if ($this->getAttribute($context["log"], "manager", array())) {
                        echo "official";
                    }
                    echo "\">
                                    <span class=\"cabinet_discussion_comment_info\">
                                        ";
                    // line 41
                    if ($this->getAttribute($context["log"], "manager", array())) {
                        // line 42
                        echo "                                            <strong>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["log"], "manager", array()), "userName", array()), "html", null, true);
                        echo " (сотрудник OliKids)</strong>
                                            ";
                    } elseif ($this->getAttribute(                    // line 43
(isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array())) {
                        // line 44
                        echo "                                                <strong>";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array()), "html", null, true);
                        echo "</strong>
                                            ";
                    } else {
                        // line 46
                        echo "                                                <strong>";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorEmail", array()), "html", null, true);
                        echo "</strong>
                                        ";
                    }
                    // line 48
                    echo "                                        <span>";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["log"], "date", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
                    echo "</span>
                                    </span>
                                    ";
                    // line 50
                    if ($this->getAttribute($context["log"], "message", array())) {
                        // line 51
                        echo "                                        <div>";
                        echo $this->getAttribute($this->getAttribute($context["log"], "message", array()), "body", array());
                        echo "</div>
                                    ";
                    }
                    // line 53
                    echo "                                </li>
                            ";
                }
                // line 55
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            echo "                    </ul>
                ";
        }
        // line 58
        echo "            </section>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:TroubleTicket:edit_print.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 58,  205 => 56,  199 => 55,  195 => 53,  189 => 51,  187 => 50,  181 => 48,  175 => 46,  169 => 44,  167 => 43,  162 => 42,  160 => 41,  152 => 39,  149 => 38,  145 => 37,  141 => 35,  139 => 34,  136 => 33,  132 => 31,  128 => 29,  117 => 26,  114 => 25,  110 => 24,  105 => 21,  103 => 20,  99 => 19,  96 => 18,  94 => 17,  89 => 15,  85 => 14,  82 => 13,  76 => 11,  70 => 9,  68 => 8,  60 => 6,  57 => 5,  51 => 4,  45 => 3,  39 => 2,  11 => 1,);
    }
}
