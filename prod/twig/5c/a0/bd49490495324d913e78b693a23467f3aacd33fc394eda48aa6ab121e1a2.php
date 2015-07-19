<?php

/* CoreStatisticsBundle:Admin/EntityAudit:block.html.twig */
class __TwigTemplate_5ca0bd49490495324d913e78b693a23467f3aacd33fc394eda48aa6ab121e1a2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'audit' => array($this, 'block_audit'),
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
        $this->displayBlock('audit', $context, $blocks);
    }

    public function block_audit($context, array $blocks = array())
    {
        // line 10
        echo "    <div id=\"audit-block-container\">
        <div class=\"well\" id=\"audit-block\">
            <ol>

                ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "differences", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["difference"]) {
            // line 15
            echo "
                    ";
            // line 16
            if (($this->getAttribute($context["difference"], "type", array()) == "INS")) {
                // line 17
                echo "
                        <li>
                            <span class=\"label label-important\">Создание</span>
                                ";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($context["difference"], "timestamp", array()), "html", null, true);
                echo ",
                                ";
                // line 21
                if ($this->getAttribute($context["difference"], "user", array(), "any", true, true)) {
                    // line 22
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute($context["difference"], "user", array()), "id", array()))), "html", null, true);
                    echo "\" target=\"_blank\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["difference"], "username", array()), "html", null, true);
                    echo "</a>
                                ";
                } else {
                    // line 24
                    echo "                                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["difference"], "username", array()), "html", null, true);
                    echo "
                                ";
                }
                // line 26
                echo "                        </li>

                    ";
            } elseif (($this->getAttribute(            // line 28
$context["difference"], "type", array()) == "UPD")) {
                // line 29
                echo "
                        <li>
                            <span class=\"label label-success\">Изменение</span>
                                ";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($context["difference"], "timestamp", array()), "html", null, true);
                echo ",
                                ";
                // line 33
                if ($this->getAttribute($context["difference"], "user", array(), "any", true, true)) {
                    // line 34
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute($context["difference"], "user", array()), "id", array()))), "html", null, true);
                    echo "\" target=\"_blank\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["difference"], "username", array()), "html", null, true);
                    echo "</a>
                                ";
                } else {
                    // line 36
                    echo "                                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["difference"], "username", array()), "html", null, true);
                    echo "
                                ";
                }
                // line 38
                echo "
                            <ul>
                                    ";
                // line 40
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["difference"], "data", array()));
                foreach ($context['_seq'] as $context["namespace"] => $context["diffData"]) {
                    // line 41
                    echo "
                                        ";
                    // line 42
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($context["diffData"]);
                    foreach ($context['_seq'] as $context["idDirty"] => $context["rev"]) {
                        // line 43
                        echo "                                            ";
                        $context["id"] = (($this->getAttribute($context["diffData"], "id", array(), "array", true, true)) ? ($this->getAttribute($context["diffData"], "id", array(), "array")) : (twig_number_format_filter($this->env, $context["idDirty"])));
                        // line 44
                        echo "                                            ";
                        if ($this->getAttribute($context["rev"], "type", array(), "any", true, true)) {
                            // line 45
                            echo "                                                <li>
                                                ";
                            // line 46
                            if ((($this->getAttribute($context["rev"], "type", array()) == "INS") && $this->getAttribute($context["rev"], "fields", array(), "any", true, true))) {
                                // line 47
                                echo "
                                                    <span class=\"label\">";
                                // line 48
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((("audit." . $context["namespace"]) . ".INS"), array("%id%" => (isset($context["id"]) ? $context["id"] : null)), (isset($context["translationDomain"]) ? $context["translationDomain"] : null)), "html", null, true);
                                echo "</span>
                                                    <ul>

                                                    ";
                                // line 51
                                $context['_parent'] = (array) $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["rev"], "fields", array()));
                                foreach ($context['_seq'] as $context["field"] => $context["value"]) {
                                    // line 52
                                    echo "
                                                        ";
                                    // line 53
                                    $context["suffix"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "suffixes", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "suffixes", array(), "array"), $context["field"], array(), "array")) : (""));
                                    // line 54
                                    echo "                                                        ";
                                    $context["prefix"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "prefixes", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "prefixes", array(), "array"), $context["field"], array(), "array")) : (""));
                                    // line 55
                                    echo "                                                        ";
                                    $context["suffix_value"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "suffixes_value", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "suffixes_value", array(), "array"), $context["field"], array(), "array")) : (""));
                                    // line 56
                                    echo "                                                        ";
                                    $context["prefix_value"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "prefixes_value", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "prefixes_value", array(), "array"), $context["field"], array(), "array")) : (""));
                                    // line 57
                                    echo "
                                                        ";
                                    // line 58
                                    if ($this->getAttribute($context["value"], "id", array(), "any", true, true)) {
                                        // line 59
                                        echo "                                                            ";
                                        $context["path"] = $this->env->getExtension('routing')->getPath(($this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => twig_first($this->env, $this->getAttribute($this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "adminClasses", array()), $this->getAttribute($context["value"], "className", array()), array(), "array"))), "method"), "baseRouteName", array()) . "_edit"), array("id" => $this->getAttribute($context["value"], "id", array())));
                                        // line 60
                                        echo "                                                            ";
                                        $context["value"] = (((("<a href=\"" . (isset($context["path"]) ? $context["path"] : null)) . "\" target=\"_blank\">") . $this->getAttribute($context["value"], "caption", array())) . "</a>");
                                        // line 61
                                        echo "                                                        ";
                                    } else {
                                        // line 62
                                        echo "                                                            ";
                                        $context["value"] = $context["value"];
                                        // line 63
                                        echo "                                                        ";
                                    }
                                    // line 64
                                    echo "
                                                        <li>
                                                            ";
                                    // line 66
                                    echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : null) . $this->env->getExtension('translator')->trans(((("audit." . $context["namespace"]) . ".") . $context["field"]), array(), (isset($context["translationDomain"]) ? $context["translationDomain"] : null))) . (isset($context["suffix"]) ? $context["suffix"] : null)), "html", null, true);
                                    echo ": ";
                                    echo (((isset($context["prefix_value"]) ? $context["prefix_value"] : null) . $context["value"]) . (isset($context["suffix_value"]) ? $context["suffix_value"] : null));
                                    echo "
                                                        </li>

                                                    ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['field'], $context['value'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 70
                                echo "
                                                ";
                            } elseif ((($this->getAttribute(                            // line 71
$context["rev"], "type", array()) == "UPD") && $this->getAttribute($context["rev"], "fields", array(), "any", true, true))) {
                                // line 72
                                echo "
                                                        ";
                                // line 73
                                if ($this->getAttribute($context["rev"], "title", array(), "any", true, true)) {
                                    // line 74
                                    echo "                                                            ";
                                    $context["id"] = ((isset($context["id"]) ? $context["id"] : null) . " <span class=\"icon icon-info-sign icon-white audit-icon-show-sub-titles\"></span>");
                                    // line 75
                                    echo "                                                        ";
                                }
                                // line 76
                                echo "                                                        <span class=\"label\">";
                                echo $this->env->getExtension('translator')->trans((("audit." . $context["namespace"]) . ".UPD"), array("%id%" => (isset($context["id"]) ? $context["id"] : null)), (isset($context["translationDomain"]) ? $context["translationDomain"] : null));
                                echo "</span>

                                                        ";
                                // line 78
                                if ($this->getAttribute($context["rev"], "title", array(), "any", true, true)) {
                                    // line 79
                                    echo "                                                            <br>
                                                            <div class=\"sub-label audit-sub-title\">";
                                    // line 80
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["rev"], "title", array()), "html", null, true);
                                    echo "</div>
                                                            <div class=\"clearfix\"></div>
                                                        ";
                                }
                                // line 83
                                echo "                                                    <ul>
                                                    ";
                                // line 84
                                $context['_parent'] = (array) $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["rev"], "fields", array()));
                                foreach ($context['_seq'] as $context["field"] => $context["value"]) {
                                    // line 85
                                    echo "
                                                        ";
                                    // line 86
                                    $context["suffix"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["field"], array(), "array", false, true), "suffix", array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["field"], array(), "array"), "suffix", array(), "array")) : (""));
                                    // line 87
                                    echo "                                                        ";
                                    $context["prefix"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["field"], array(), "array", false, true), "prefix", array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["field"], array(), "array"), "prefix", array(), "array")) : (""));
                                    // line 88
                                    echo "                                                        ";
                                    $context["suffix_value"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["field"], array(), "array", false, true), "suffix_value", array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["field"], array(), "array"), "suffix_value", array(), "array")) : (""));
                                    // line 89
                                    echo "                                                        ";
                                    $context["prefix_value"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["field"], array(), "array", false, true), "prefix_value", array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["field"], array(), "array"), "prefix_value", array(), "array")) : (""));
                                    // line 90
                                    echo "                                                        ";
                                    $context["suffix"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "suffixes", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "suffixes", array(), "array"), $context["field"], array(), "array")) : ((isset($context["suffix"]) ? $context["suffix"] : null)));
                                    // line 91
                                    echo "                                                        ";
                                    $context["prefix"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "prefixes", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "prefixes", array(), "array"), $context["field"], array(), "array")) : ((isset($context["prefix"]) ? $context["prefix"] : null)));
                                    // line 92
                                    echo "                                                        ";
                                    $context["suffix_value"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "suffixes_value", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "suffixes_value", array(), "array"), $context["field"], array(), "array")) : ((isset($context["suffix_value"]) ? $context["suffix_value"] : null)));
                                    // line 93
                                    echo "                                                        ";
                                    $context["prefix_value"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "prefixes_value", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "prefixes_value", array(), "array"), $context["field"], array(), "array")) : ((isset($context["prefix_value"]) ? $context["prefix_value"] : null)));
                                    // line 94
                                    echo "
                                                        ";
                                    // line 95
                                    if (($this->getAttribute($this->getAttribute($context["value"], "old", array(), "any", false, true), "id", array(), "any", true, true) || $this->getAttribute($this->getAttribute($context["value"], "new", array(), "any", false, true), "id", array(), "any", true, true))) {
                                        // line 96
                                        echo "
                                                            ";
                                        // line 97
                                        if ($this->getAttribute($this->getAttribute($context["value"], "old", array(), "any", false, true), "id", array(), "any", true, true)) {
                                            // line 98
                                            echo "                                                                ";
                                            $context["path"] = $this->env->getExtension('routing')->getPath(($this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => twig_first($this->env, $this->getAttribute($this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "adminClasses", array()), $this->getAttribute($this->getAttribute($context["value"], "old", array()), "className", array()), array(), "array"))), "method"), "baseRouteName", array()) . "_edit"), array("id" => $this->getAttribute($this->getAttribute($context["value"], "old", array()), "id", array())));
                                            // line 99
                                            echo "                                                                ";
                                            $context["old"] = (((("<a href=\"" . (isset($context["path"]) ? $context["path"] : null)) . "\" target=\"_blank\">") . $this->getAttribute($this->getAttribute($context["value"], "old", array()), "caption", array())) . "</a>");
                                            // line 100
                                            echo "                                                            ";
                                        } else {
                                            // line 101
                                            echo "                                                                ";
                                            $context["old"] = $this->getAttribute($context["value"], "old", array());
                                            // line 102
                                            echo "                                                            ";
                                        }
                                        // line 103
                                        echo "
                                                            ";
                                        // line 104
                                        if ($this->getAttribute($this->getAttribute($context["value"], "new", array(), "any", false, true), "id", array(), "any", true, true)) {
                                            // line 105
                                            echo "                                                                ";
                                            $context["path"] = $this->env->getExtension('routing')->getPath(($this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => twig_first($this->env, $this->getAttribute($this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "adminClasses", array()), $this->getAttribute($this->getAttribute($context["value"], "new", array()), "className", array()), array(), "array"))), "method"), "baseRouteName", array()) . "_edit"), array("id" => $this->getAttribute($this->getAttribute($context["value"], "new", array()), "id", array())));
                                            // line 106
                                            echo "                                                                ";
                                            $context["new"] = (((("<a href=\"" . (isset($context["path"]) ? $context["path"] : null)) . "\" target=\"_blank\">") . $this->getAttribute($this->getAttribute($context["value"], "new", array()), "caption", array())) . "</a>");
                                            // line 107
                                            echo "                                                            ";
                                        } else {
                                            echo " ";
                                            // line 108
                                            echo "                                                                ";
                                            $context["new"] = $this->getAttribute($context["value"], "new", array());
                                            // line 109
                                            echo "                                                            ";
                                        }
                                        // line 110
                                        echo "
                                                            <li>
                                                                ";
                                        // line 112
                                        echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : null) . $this->env->getExtension('translator')->trans(((("audit." . $context["namespace"]) . ".") . $context["field"]), array(), (isset($context["translationDomain"]) ? $context["translationDomain"] : null))) . (isset($context["suffix"]) ? $context["suffix"] : null)), "html", null, true);
                                        echo ": ";
                                        if ( !(null === (isset($context["old"]) ? $context["old"] : null))) {
                                            echo (((isset($context["prefix_value"]) ? $context["prefix_value"] : null) . (isset($context["old"]) ? $context["old"] : null)) . (isset($context["suffix_value"]) ? $context["suffix_value"] : null));
                                            echo " =&gt; ";
                                        }
                                        if ( !(null === $this->getAttribute($context["value"], "new", array()))) {
                                            echo (((isset($context["prefix_value"]) ? $context["prefix_value"] : null) . (isset($context["new"]) ? $context["new"] : null)) . (isset($context["suffix_value"]) ? $context["suffix_value"] : null));
                                        } else {
                                            echo "<span class=\"label label-warning\">пусто</span>";
                                        }
                                        // line 113
                                        echo "                                                            </li>

                                                        ";
                                    } elseif (($this->getAttribute(                                    // line 115
$context["value"], "old", array(), "any", true, true) || $this->getAttribute($context["value"], "new", array(), "any", true, true))) {
                                        // line 116
                                        echo "
                                                            <li>
                                                                ";
                                        // line 118
                                        echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : null) . $this->env->getExtension('translator')->trans(((("audit." . $context["namespace"]) . ".") . $context["field"]), array(), (isset($context["translationDomain"]) ? $context["translationDomain"] : null))) . (isset($context["suffix"]) ? $context["suffix"] : null)), "html", null, true);
                                        echo ": ";
                                        if ((twig_in_filter("textarea", $this->getAttribute($context["value"], "old", array())) || twig_in_filter("textarea", $this->getAttribute($context["value"], "new", array())))) {
                                            echo "<br>";
                                        }
                                        echo " ";
                                        if (( !(null === $this->getAttribute($context["value"], "old", array())) && (twig_length_filter($this->env, $this->getAttribute($context["value"], "old", array())) > 0))) {
                                            echo (((isset($context["prefix_value"]) ? $context["prefix_value"] : null) . $this->getAttribute($context["value"], "old", array())) . (isset($context["suffix_value"]) ? $context["suffix_value"] : null));
                                            echo " =&gt; ";
                                        }
                                        if ( !(null === $this->getAttribute($context["value"], "new", array()))) {
                                            echo (((isset($context["prefix_value"]) ? $context["prefix_value"] : null) . $this->getAttribute($context["value"], "new", array())) . (isset($context["suffix_value"]) ? $context["suffix_value"] : null));
                                        } else {
                                            echo "<span class=\"label label-warning\">пусто</span>";
                                        }
                                        // line 119
                                        echo "                                                            </li>

                                                        ";
                                    }
                                    // line 122
                                    echo "                                                    ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['field'], $context['value'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 123
                                echo "
                                                ";
                            } elseif (($this->getAttribute(                            // line 124
$context["rev"], "type", array()) == "DEL")) {
                                // line 125
                                echo "
                                                    <span class=\"label\">";
                                // line 126
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((("audit." . $context["namespace"]) . ".DEL"), array("%id%" => (isset($context["id"]) ? $context["id"] : null)), (isset($context["translationDomain"]) ? $context["translationDomain"] : null)), "html", null, true);
                                echo "</span>
                                                    <ul>

                                                    ";
                                // line 129
                                $context['_parent'] = (array) $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["rev"], "fields", array()));
                                foreach ($context['_seq'] as $context["field"] => $context["value"]) {
                                    // line 130
                                    echo "
                                                        ";
                                    // line 131
                                    $context["suffix"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "suffixes", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "suffixes", array(), "array"), $context["field"], array(), "array")) : (""));
                                    // line 132
                                    echo "                                                        ";
                                    $context["prefix"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "prefixes", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "prefixes", array(), "array"), $context["field"], array(), "array")) : (""));
                                    // line 133
                                    echo "                                                        ";
                                    $context["suffix_value"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "suffixes_value", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "suffixes_value", array(), "array"), $context["field"], array(), "array")) : (""));
                                    // line 134
                                    echo "                                                        ";
                                    $context["prefix_value"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array(), "any", false, true), $context["namespace"], array(), "array", false, true), "prefixes_value", array(), "array", false, true), $context["field"], array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["auditData"]) ? $context["auditData"] : null), "options", array()), $context["namespace"], array(), "array"), "prefixes_value", array(), "array"), $context["field"], array(), "array")) : (""));
                                    // line 135
                                    echo "
                                                        ";
                                    // line 136
                                    if ($this->getAttribute($context["value"], "id", array(), "any", true, true)) {
                                        // line 137
                                        echo "                                                            ";
                                        $context["path"] = $this->env->getExtension('routing')->getPath(($this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => twig_first($this->env, $this->getAttribute($this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "adminClasses", array()), $this->getAttribute($context["value"], "className", array()), array(), "array"))), "method"), "baseRouteName", array()) . "_edit"), array("id" => $this->getAttribute($context["value"], "id", array())));
                                        // line 138
                                        echo "                                                            ";
                                        $context["value"] = (((("<a href=\"" . (isset($context["path"]) ? $context["path"] : null)) . "\" target=\"_blank\">") . $this->getAttribute($context["value"], "caption", array())) . "</a>");
                                        // line 139
                                        echo "                                                        ";
                                    } else {
                                        // line 140
                                        echo "                                                            ";
                                        $context["value"] = $context["value"];
                                        // line 141
                                        echo "                                                        ";
                                    }
                                    // line 142
                                    echo "
                                                        <li>
                                                            ";
                                    // line 144
                                    echo twig_escape_filter($this->env, (((isset($context["prefix"]) ? $context["prefix"] : null) . $this->env->getExtension('translator')->trans(((("audit." . $context["namespace"]) . ".") . $context["field"]), array(), (isset($context["translationDomain"]) ? $context["translationDomain"] : null))) . (isset($context["suffix"]) ? $context["suffix"] : null)), "html", null, true);
                                    echo ": ";
                                    echo (((isset($context["prefix_value"]) ? $context["prefix_value"] : null) . $context["value"]) . (isset($context["suffix_value"]) ? $context["suffix_value"] : null));
                                    echo "
                                                        </li>

                                                    ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['field'], $context['value'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 148
                                echo "
                                                ";
                            }
                            // line 150
                            echo "
                                                        </li>
                                                    </ul>

                                            ";
                        }
                        // line 155
                        echo "                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['idDirty'], $context['rev'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 156
                    echo "
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['namespace'], $context['diffData'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 158
                echo "
                                </li>
                            </ul>
                        </li>

                    ";
            }
            // line 164
            echo "
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['difference'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 166
        echo "
            </ol>
        </div>
    </div>

<script>
    \$(function(){
        \$('#audit-block').on('click', '.audit-icon-show-sub-titles', function() {
            \$(this).fadeOut('fast').closest('li').find('.audit-sub-title').slideDown('fast');
        });
    })
</script>

";
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/EntityAudit:block.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  464 => 166,  457 => 164,  449 => 158,  442 => 156,  436 => 155,  429 => 150,  425 => 148,  413 => 144,  409 => 142,  406 => 141,  403 => 140,  400 => 139,  397 => 138,  394 => 137,  392 => 136,  389 => 135,  386 => 134,  383 => 133,  380 => 132,  378 => 131,  375 => 130,  371 => 129,  365 => 126,  362 => 125,  360 => 124,  357 => 123,  351 => 122,  346 => 119,  330 => 118,  326 => 116,  324 => 115,  320 => 113,  308 => 112,  304 => 110,  301 => 109,  298 => 108,  294 => 107,  291 => 106,  288 => 105,  286 => 104,  283 => 103,  280 => 102,  277 => 101,  274 => 100,  271 => 99,  268 => 98,  266 => 97,  263 => 96,  261 => 95,  258 => 94,  255 => 93,  252 => 92,  249 => 91,  246 => 90,  243 => 89,  240 => 88,  237 => 87,  235 => 86,  232 => 85,  228 => 84,  225 => 83,  219 => 80,  216 => 79,  214 => 78,  208 => 76,  205 => 75,  202 => 74,  200 => 73,  197 => 72,  195 => 71,  192 => 70,  180 => 66,  176 => 64,  173 => 63,  170 => 62,  167 => 61,  164 => 60,  161 => 59,  159 => 58,  156 => 57,  153 => 56,  150 => 55,  147 => 54,  145 => 53,  142 => 52,  138 => 51,  132 => 48,  129 => 47,  127 => 46,  124 => 45,  121 => 44,  118 => 43,  114 => 42,  111 => 41,  107 => 40,  103 => 38,  97 => 36,  89 => 34,  87 => 33,  83 => 32,  78 => 29,  76 => 28,  72 => 26,  66 => 24,  58 => 22,  56 => 21,  52 => 20,  47 => 17,  45 => 16,  42 => 15,  38 => 14,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
