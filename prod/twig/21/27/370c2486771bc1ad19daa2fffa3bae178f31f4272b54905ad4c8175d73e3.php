<?php

/* CoreTroubleTicketBundle:TroubleTicket:log.html.twig */
class __TwigTemplate_2127370c2486771bc1ad19daa2fffa3bae178f31f4272b54905ad4c8175d73e3 extends Twig_Template
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
        // line 1
        echo "<h4>Тикет #";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "id", array()), "html", null, true);
        echo " был обновлен: (";
        if ( !(null === $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "manager", array()))) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["log"]) ? $context["log"] : null), "manager", array()), "userName", array()), "html", null, true);
            echo " ";
        } elseif ($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array())) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array()), "html", null, true);
            echo " ";
        } else {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorEmail", array()), "html", null, true);
            echo " ";
        }
        echo ")</h4>
";
        // line 2
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "changes", array()))) {
            // line 3
            echo "<ul>
    ";
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["log"]) ? $context["log"] : null), "changes", array()));
            foreach ($context['_seq'] as $context["field"] => $context["changes"]) {
                // line 5
                echo "        ";
                if (($context["field"] != "file")) {
                    // line 6
                    echo "            <li>
                <span>Параметр <b><i>";
                    // line 7
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("parameter." . $context["field"])), "html", null, true);
                    echo "</i></b> изменился</span>
                ";
                    // line 8
                    if ($this->getAttribute((isset($context["oldTicket"]) ? $context["oldTicket"] : null), "getValueForKey", array(0 => $context["field"]), "method")) {
                        // line 9
                        echo "                    <span>c ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["oldTicket"]) ? $context["oldTicket"] : null), "getValueForKey", array(0 => $context["field"]), "method"), "html", null, true);
                        echo "</span>
                ";
                    }
                    // line 11
                    echo "                ";
                    if ($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "getValueForKey", array(0 => $context["field"]), "method")) {
                        // line 12
                        echo "                    <span>на ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "getValueForKey", array(0 => $context["field"]), "method"), "html", null, true);
                        echo "</span>
                ";
                    }
                    // line 14
                    echo "            </li>
            ";
                } else {
                    // line 16
                    echo "            ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["changes"], "data", array()));
                    foreach ($context['_seq'] as $context["key"] => $context["file"]) {
                        // line 17
                        echo "                ";
                        if ($this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "file", array()), "get", array(0 => $context["key"]), "method")) {
                            // line 18
                            echo "                    ";
                            $context["fileLink"] = (("http://" . (isset($context["base_url"]) ? $context["base_url"] : null)) . $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "file", array()), "get", array(0 => $context["key"]), "method"))));
                            // line 19
                            echo "                    <li>Файл <a href=\"";
                            echo twig_escape_filter($this->env, (isset($context["fileLink"]) ? $context["fileLink"] : null), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $context["file"], "html", null, true);
                            echo "</a> ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("parameter." . $this->getAttribute($context["changes"], "operation", array()))), "html", null, true);
                            echo "</li>
                    ";
                        } else {
                            // line 21
                            echo "                        <li>Файл <span ";
                            if (($this->getAttribute($context["changes"], "operation", array()) != "add")) {
                                echo "class=\"file-removed\"";
                            }
                            echo ">";
                            echo twig_escape_filter($this->env, $context["file"], "html", null, true);
                            echo "</span> ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("parameter." . $this->getAttribute($context["changes"], "operation", array()))), "html", null, true);
                            echo "</li>
                ";
                        }
                        // line 23
                        echo "            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['file'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 24
                    echo "        ";
                }
                // line 25
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['field'], $context['changes'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "</ul>
";
        }
        // line 28
        echo "<br />
";
        // line 29
        if ((isset($context["message"]) ? $context["message"] : null)) {
            // line 30
            echo "    ";
            echo $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "body", array());
            echo "
";
        }
        // line 32
        echo "<hr />
<h1>
    ";
        // line 34
        $context["ticketLink"] = (("http://" . (isset($context["base_url"]) ? $context["base_url"] : null)) . $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_edit", array("id" => $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "id", array()))));
        echo "   
    <a target=\"_blank\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["ticketLink"]) ? $context["ticketLink"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "title", array()), "html", null, true);
        echo "</a>
</h1>
<ul>
    <li>Добавил(а): ";
        // line 38
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array())) ? ($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorName", array())) : ($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorEmail", array()))), "html", null, true);
        echo "</li>
    <li>Контактый email: ";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "authorEmail", array()), "html", null, true);
        echo "</li>
    <li>Статус: ";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "status", array()), "captionRu", array()), "html", null, true);
        echo "</li>
    <li>Приоритет: ";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "priority", array()), "captionRu", array()), "html", null, true);
        echo "</li>
    <li>Назначена: ";
        // line 42
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "manager", array())) ? ($this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "manager", array()), "userName", array())) : ("Нет")), "html", null, true);
        echo "</li>
    <li>Категория: ";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "category", array()), "captionRu", array()), "html", null, true);
        echo "</li>
    <li>Готовность: ";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : null), "readiness", array()), "html", null, true);
        echo "%</li>
</ul>";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:TroubleTicket:log.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 44,  177 => 43,  173 => 42,  169 => 41,  165 => 40,  161 => 39,  157 => 38,  149 => 35,  145 => 34,  141 => 32,  135 => 30,  133 => 29,  130 => 28,  126 => 26,  120 => 25,  117 => 24,  111 => 23,  99 => 21,  89 => 19,  86 => 18,  83 => 17,  78 => 16,  74 => 14,  68 => 12,  65 => 11,  59 => 9,  57 => 8,  53 => 7,  50 => 6,  47 => 5,  43 => 4,  40 => 3,  38 => 2,  19 => 1,);
    }
}
