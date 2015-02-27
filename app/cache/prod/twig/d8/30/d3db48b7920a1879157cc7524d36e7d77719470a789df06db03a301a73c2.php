<?php

/* CoreTroubleTicketBundle:TroubleTicket:edit_print.html.twig */
class __TwigTemplate_d830d3db48b7920a1879157cc7524d36e7d77719470a789df06db03a301a73c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

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
                    } elseif ($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array())) {
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
        return array (  200 => 58,  196 => 56,  190 => 55,  186 => 53,  180 => 51,  178 => 50,  172 => 48,  166 => 46,  160 => 44,  154 => 42,  152 => 41,  144 => 39,  141 => 38,  137 => 37,  133 => 35,  131 => 34,  128 => 33,  124 => 31,  120 => 29,  109 => 26,  106 => 25,  102 => 24,  97 => 21,  95 => 20,  91 => 19,  88 => 18,  86 => 17,  81 => 15,  77 => 14,  74 => 13,  68 => 11,  62 => 9,  60 => 8,  52 => 6,  49 => 5,  43 => 4,  37 => 3,  31 => 2,);
    }
}
