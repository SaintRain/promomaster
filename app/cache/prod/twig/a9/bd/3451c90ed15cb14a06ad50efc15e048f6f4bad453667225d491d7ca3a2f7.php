<?php

/* CoreSlugHistoryBundle:Admin/Form:slug_history_widget.html.twig */
class __TwigTemplate_a9bd3451c90ed15cb14a06ad50efc15e048f6f4bad453667225d491d7ca3a2f7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'slug_history_widget' => array($this, 'block_slug_history_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 2
        $this->displayBlock('slug_history_widget', $context, $blocks);
    }

    public function block_slug_history_widget($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        ob_start();
        // line 4
        echo "
        ";
        // line 5
        if ((!array_key_exists("withoutJS", $context))) {
            // line 6
            echo "
            <script src=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreslughistory/js/Admin/slug_history.js"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
            <script>
                adminRoutes['core_slug_history_editor_ajax'] = '";
            // line 9
            echo $this->env->getExtension('routing')->getPath("core_slug_history_editor_ajax");
            echo "';
            </script>

            <div class=\"slug-history-main-container\" style=\"max-height: 800px; overflow: auto;\">

        ";
        }
        // line 15
        echo "
        ";
        // line 16
        if (array_key_exists("response", $context)) {
            // line 17
            echo "
            ";
            // line 18
            if ($this->getAttribute((isset($context["response"]) ? $context["response"] : null), "error", array(), "any", true, true)) {
                // line 19
                echo "                <div class=\"alert alert-error alert-dismissable\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                    ";
                // line 21
                echo twig_join_filter($this->getAttribute((isset($context["response"]) ? $context["response"] : null), "error", array()), "<br>");
                echo "
                </div>
            ";
            } elseif ($this->getAttribute((isset($context["response"]) ? $context["response"] : null), "success", array(), "any", true, true)) {
                // line 24
                echo "                <div class=\"alert alert-success alert-dismissable\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                    ";
                // line 26
                echo twig_join_filter($this->getAttribute((isset($context["response"]) ? $context["response"] : null), "success", array()), "<br>");
                echo "
                </div>
            ";
            }
            // line 29
            echo "
        ";
        }
        // line 31
        echo "
        <table class=\"table table-bordered slug-history-container\" style=\"min-width:700px\" data-target-id=\"";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["target_id"]) ? $context["target_id"] : null), "html", null, true);
        echo "\" data-class-name=\"";
        echo twig_escape_filter($this->env, (isset($context["className"]) ? $context["className"] : null), "html", null, true);
        echo "\">

            ";
        // line 34
        if (twig_length_filter($this->env, (isset($context["history"]) ? $context["history"] : null))) {
            // line 35
            echo "
                <thead>
                    <tr>
                        <th class=\"text-left\" width=\"90px\"><span class=\"slug-history-icon-remove all icon-trash\"  title=\"Удалить все\"></span>&nbsp;&nbsp;Удалить</th>
                        <th width=\"100px\">Дата</th>
                        <th>URL</th>
                    </tr>
                </thead>

            ";
        }
        // line 45
        echo "
            <tbody class=\"sonata-ba-tbody\">

                ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["history"]) ? $context["history"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["obj"]) {
            // line 49
            echo "
                    <tr>
                        <td class=\"control-group\">
                            <span class=\"slug-history-icon-remove icon-trash\" data-id=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($context["obj"], "id", array()), "html", null, true);
            echo "\"></span>
                        </td>
                        <td class=\"control-group\">
                            ";
            // line 55
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["obj"], "createdAt", array()), "d.m.Y H:i"), "html", null, true);
            // line 56
            echo "                        </td>
                        <td class=\"control-group\">
                            <input type=\"text\" class=\"slug-history-input-edit span12\" value=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($context["obj"], "oldUrl", array()), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["obj"], "id", array()), "html", null, true);
            echo "\">
                        </td>
                    </tr>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obj'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "
                <tr>
                    <td class=\"control-group\" colspan=\"3\">
                        <input type=\"text\" class=\"slug-history-input-add span9\" placeholder=\"Введите URL с которого надо делать редирект\" ";
        // line 66
        if ((array_key_exists("url", $context) && twig_length_filter($this->env, (isset($context["url"]) ? $context["url"] : null)))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "\"";
        }
        echo " />
                        &nbsp;&nbsp;&nbsp;
                        <a class=\"btn slug-history-btn-add\" href=\"#\" style=\"min-width: 125px;\">
                            <span class=\"default-btn-text\">
                                <i class=\"icon-plus\"></i>
                                Добавить новый
                            </span>
                            <img src=\"/bundles/sonataadmin/ajax-loader.gif\" class=\"slug-history-img-loader\">
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>

        ";
        // line 81
        if ((!array_key_exists("withoutJS", $context))) {
            // line 82
            echo "            </div>
        ";
        }
        // line 84
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreSlugHistoryBundle:Admin/Form:slug_history_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  184 => 84,  180 => 82,  178 => 81,  156 => 66,  151 => 63,  138 => 58,  134 => 56,  132 => 55,  126 => 52,  121 => 49,  117 => 48,  112 => 45,  100 => 35,  98 => 34,  91 => 32,  88 => 31,  84 => 29,  78 => 26,  74 => 24,  68 => 21,  64 => 19,  62 => 18,  59 => 17,  57 => 16,  54 => 15,  45 => 9,  40 => 7,  37 => 6,  35 => 5,  32 => 4,  29 => 3,  23 => 2,  20 => 1,);
    }
}
