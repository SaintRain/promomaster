<?php

/* @Doctrine/Collector/db.html.twig */
class __TwigTemplate_1baf4e007db753de6961d70ecb372ea4a9f0f56111223ecc707bad58eafaf7b0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
            'queries' => array($this, 'block_queries'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->env->resolveTemplate((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "isXmlHttpRequest", array())) ? ("WebProfilerBundle:Profiler:ajax_layout.html.twig") : ("WebProfilerBundle:Profiler:layout.html.twig")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_toolbar($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        ob_start();
        // line 4
        echo "        <img width=\"20\" height=\"28\" alt=\"Database\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAcCAYAAABh2p9gAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAQRJREFUeNpi/P//PwM1ARMDlcGogZQDlpMnT7pxc3NbA9nhQKxOpL5rQLwJiPeBsI6Ozl+YBOOOHTv+AOllQNwtLS39F2owKYZ/gRq8G4i3ggxEToggWzvc3d2Pk+1lNL4fFAs6ODi8JzdS7mMRVyDVoAMHDsANdAPiOCC+jCQvQKqBQB/BDbwBxK5AHA3E/kB8nKJkA8TMQBwLxaBIKQbi70AvTADSBiSadwFXpCikpKQU8PDwkGTaly9fHFigkaKIJid4584dkiMFFI6jkTJII0WVmpHCAixZQEXWYhDeuXMnyLsVlEQKI45qFBQZ8eRECi4DBaAlDqle/8A48ip6gAADANdQY88Uc0oGAAAAAElFTkSuQmCC\" />
        <span class=\"sf-toolbar-status";
        // line 5
        if ((50 < $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "querycount", array()))) {
            echo " sf-toolbar-status-yellow";
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "querycount", array()), "html", null, true);
        echo "</span>
        ";
        // line 6
        if (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "querycount", array()) > 0)) {
            // line 7
            echo "            <span class=\"sf-toolbar-info-piece-additional-detail\">in ";
            echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "time", array()) * 1000)), "html", null, true);
            echo " ms</span>
        ";
        }
        // line 9
        echo "        ";
        if (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "invalidEntityCount", array()) > 0)) {
            // line 10
            echo "            <span class=\"sf-toolbar-info-piece-additional sf-toolbar-status sf-toolbar-status-red\"> </span>
        ";
        }
        // line 12
        echo "    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 13
        echo "    ";
        ob_start();
        // line 14
        echo "        <div class=\"sf-toolbar-info-piece\">
            <b>DB Queries</b>
            <span>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "querycount", array()), "html", null, true);
        echo "</span>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <b>Query time</b>
            <span>";
        // line 20
        echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "time", array()) * 1000)), "html", null, true);
        echo " ms</span>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <b>Invalid entities</b>
            <span class=\"sf-toolbar-status sf-toolbar-status-";
        // line 24
        echo ((($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "invalidEntityCount", array()) > 0)) ? ("red") : ("green"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "invalidEntityCount", array()), "html", null, true);
        echo "</span>
        </div>
    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 27
        echo "    ";
        $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_item.html.twig")->display(array_merge($context, array("link" => (isset($context["profiler_url"]) ? $context["profiler_url"] : $this->getContext($context, "profiler_url")))));
    }

    // line 30
    public function block_menu($context, array $blocks = array())
    {
        // line 31
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAcCAYAAAB/E6/TAAABLUlEQVR42u3TP0vDQBiA8UK/gDiLzi0IhU4OEunk5OQUAhGSOBUCzqWfIKSzX8DRySF0URCcMjWLIJjFD9Cpk/D6HITecEPUuzhIAz8CIdyTP/f2iqI4qaqqDx8l5Ic2uIeP/bquezCokOAFF+oCN3t4gPzSEjc4NEPaCldQbzjELTYW0RJzHDchwwem+ons6ZBpLSJ7nueJC22h0V+FzmwWV0ee59vQNV67CGVZJmEYbkNjfpY6X6I0Qo4/3RMmTdDDspuQVsJvgkP3IdMbIkIjLPBoadG2646iKJI0Ta2wxm6OdnP0/Tk6DYJgHcfxpw21RtscDTDDnaVZ26474GkkSRIrrPEv5sgMTfHe+cA2O6wPH6vOBpYQNALneHb96XTEDI6dzpEZ0VzO0Rf3pP5LMLI4tAAAAABJRU5ErkJggg==\" alt=\"\" /></span>
    <strong>Doctrine</strong>
    <span class=\"count\">
        <span>";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "querycount", array()), "html", null, true);
        echo "</span>
        <span>";
        // line 36
        echo twig_escape_filter($this->env, sprintf("%0.0f", ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "time", array()) * 1000)), "html", null, true);
        echo " ms</span>
    </span>
</span>
";
    }

    // line 41
    public function block_panel($context, array $blocks = array())
    {
        // line 42
        echo "    ";
        if (("explain" == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
            // line 43
            echo "        ";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("DoctrineBundle:Profiler:explain", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "panel" => "db", "connectionName" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "get", array(0 => "connection"), "method"), "query" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "get", array(0 => "query"), "method"))));
            // line 48
            echo "
    ";
        } elseif (("total" == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
            // line 50
            echo "        ";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Profiler:total", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "panel" => "db", "connectionName" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "get", array(0 => "connection"), "method"), "query" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "get", array(0 => "query"), "method"))));
            // line 55
            echo "
    ";
        } else {
            // line 57
            echo "        ";
            $this->displayBlock("queries", $context, $blocks);
            echo "
    ";
        }
    }

    // line 61
    public function block_queries($context, array $blocks = array())
    {
        // line 62
        echo "    <h2>Queries</h2>

    ";
        // line 64
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "queries", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["connection"] => $context["queries"]) {
            // line 65
            echo "        <h3>Connection <em>";
            echo twig_escape_filter($this->env, $context["connection"], "html", null, true);
            echo "</em></h3>
        ";
            // line 66
            if (twig_test_empty($context["queries"])) {
                // line 67
                echo "            <p>
                <em>No queries.</em>
            </p>
        ";
            } else {
                // line 71
                echo "            <ul class=\"alt\" id=\"queriesPlaceholder-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">
                ";
                // line 72
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($context["queries"]);
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["i"] => $context["query"]) {
                    // line 73
                    echo "                    <li class=\"";
                    echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $context["i"]), "html", null, true);
                    echo "\" data-extra-info=\"";
                    echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute($context["query"], "executionMS", array()) * 1000)), "html", null, true);
                    echo "\" data-target-id=\"";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\">
                        <div style=\"margin-top: 4px\" id=\"queryNo-";
                    // line 74
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                    echo "\">
                            <div onclick=\"return expandQuery(this);\" title=\"Expand query\" data-target-id=\"code-";
                    // line 75
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                    echo "\" style=\"cursor: pointer;\">
                                <img alt=\"+\" src=\"";
                    // line 76
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_more.gif"), "html", null, true);
                    echo "\" style=\"display: inline;\" />
                                <img alt=\"-\" src=\"";
                    // line 77
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_less.gif"), "html", null, true);
                    echo "\" style=\"display: none;\" />
                                <span style=\"display: none\">Shrink query</span>
                                <span id=\"smallcode-";
                    // line 79
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                    echo "\">
                                    ";
                    // line 80
                    echo $this->env->getExtension('doctrine_extension')->minifyQuery($this->getAttribute($context["query"], "sql", array()));
                    echo "
                                </span>
                            </div>
                            <code id=\"code-";
                    // line 83
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                    echo "\">
                                ";
                    // line 84
                    echo SqlFormatter::format($this->getAttribute($context["query"], "sql", array()), $context["i"], $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()));
                    echo "
                            </code>
                            <span id=\"original-query-";
                    // line 86
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                    echo "\" style=\"display: none;\">
                                ";
                    // line 87
                    echo $this->env->getExtension('doctrine_extension')->replaceQueryParameters($this->getAttribute($context["query"], "sql", array()), $this->getAttribute($context["query"], "params", array()));
                    echo "
                            </span>
                            <small>
                                <strong>Parameters</strong>: ";
                    // line 90
                    echo twig_escape_filter($this->env, $this->env->getExtension('yaml')->encode($this->getAttribute($context["query"], "params", array())), "html", null, true);
                    echo " <br />
                                [<span id=\"expandParams-";
                    // line 91
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                    echo "\" onclick=\"javascript:toggleRunnableQuery(this);\" target-data-id=\"original-query-";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                    echo "\" style=\"cursor: pointer;\">Display runnable query</span>]<br/>
                                <strong>Time</strong>: ";
                    // line 92
                    echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute($context["query"], "executionMS", array()) * 1000)), "html", null, true);
                    echo " ms
                            </small>
                            ";
                    // line 94
                    if ($this->getAttribute($context["query"], "explainable", array())) {
                        // line 95
                        echo "                                [<a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("panel" => "db", "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "page" => "explain", "connection" => $context["connection"], "query" => $context["i"])), "html", null, true);
                        echo "\" onclick=\"return explain(this);\" style=\"text-decoration: none;\" title=\"Explains the query\" data-target-id=\"explain-";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                        echo "\" >
                                    <img alt=\"+\" src=\"";
                        // line 96
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_more.gif"), "html", null, true);
                        echo "\" style=\"display: inline; width: 12px; height: 12px;\" />
                                    <img alt=\"-\" src=\"";
                        // line 97
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_less.gif"), "html", null, true);
                        echo "\" style=\"display: none; width: 12px; height: 12px;\" />
                                    <span style=\"vertical-align:top\">Explain query</span>
                                </a>]
                            ";
                    } else {
                        // line 101
                        echo "                                This query cannot be explained
                            ";
                    }
                    // line 103
                    echo "                            ";
                    // line 104
                    echo "                            ";
                    if ($this->getAttribute($context["query"], "explainable", array())) {
                        // line 105
                        echo "                                [<a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("panel" => "db", "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "page" => "total", "connection" => $context["connection"], "query" => $context["i"])), "html", null, true);
                        echo "\" onclick=\"return explain(this);\" style=\"text-decoration: none;\" title=\"Explains the query\" data-target-id=\"explain-";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                        echo "\" >
                                    <img alt=\"+\" src=\"";
                        // line 106
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_more.gif"), "html", null, true);
                        echo "\" style=\"display: inline; width: 12px; height: 12px;\" />
                                    <img alt=\"-\" src=\"";
                        // line 107
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_less.gif"), "html", null, true);
                        echo "\" style=\"display: none; width: 12px; height: 12px;\" />
                                    <span style=\"vertical-align:top\">Profile query</span>
                                </a>]
                            ";
                    } else {
                        // line 111
                        echo "                                This query cannot be explained
                            ";
                    }
                    // line 113
                    echo "                            ";
                    // line 114
                    echo "                        </div>
                        ";
                    // line 115
                    if ($this->getAttribute($context["query"], "explainable", array())) {
                        // line 116
                        echo "                        <div id=\"explain-";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["loop"], "parent", array()), "loop", array()), "index", array()), "html", null, true);
                        echo "\" class=\"loading\"></div>
                        ";
                    }
                    // line 118
                    echo "                    </li>
                ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['i'], $context['query'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 120
                echo "            </ul>
        ";
            }
            // line 122
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['connection'], $context['queries'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "
    <h2>Database Connections</h2>

    ";
        // line 126
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "connections", array())) {
            // line 127
            echo "        ";
            $this->env->loadTemplate("WebProfilerBundle:Profiler:table.html.twig")->display(array("data" => $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "connections", array())));
            // line 128
            echo "    ";
        } else {
            // line 129
            echo "        <p>
            <em>No connections.</em>
        </p>
    ";
        }
        // line 133
        echo "
    <h2>Entity Managers</h2>

    ";
        // line 136
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "managers", array())) {
            // line 137
            echo "        ";
            $this->env->loadTemplate("WebProfilerBundle:Profiler:table.html.twig")->display(array("data" => $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "managers", array())));
            // line 138
            echo "    ";
        } else {
            // line 139
            echo "        <p>
            <em>No entity managers.</em>
        </p>
    ";
        }
        // line 143
        echo "
    <h2>Mapping</h2>

    ";
        // line 146
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "entities", array()));
        foreach ($context['_seq'] as $context["manager"] => $context["classes"]) {
            // line 147
            echo "        <h3>Manager <em>";
            echo twig_escape_filter($this->env, $context["manager"], "html", null, true);
            echo "</em></h3>
        ";
            // line 148
            if (twig_test_empty($context["classes"])) {
                // line 149
                echo "            <p><em>No loaded entities.</em></p>
        ";
            } else {
                // line 151
                echo "            <table>
                <thead>
                <tr>
                    <th scope=\"col\">Class</th>
                    <th scope=\"col\">Mapping errors</th>
                </tr>
                </thead>
                <tbody>
                ";
                // line 159
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($context["classes"]);
                foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
                    // line 160
                    echo "                    <tr>
                        <td>";
                    // line 161
                    echo twig_escape_filter($this->env, $context["class"], "html", null, true);
                    echo "</td>
                        <td>
                            ";
                    // line 163
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "mappingErrors", array(), "any", false, true), $context["manager"], array(), "array", false, true), $context["class"], array(), "array", true, true)) {
                        // line 164
                        echo "                                <ul>
                                    ";
                        // line 165
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "mappingErrors", array()), $context["manager"], array(), "array"), $context["class"], array(), "array"));
                        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                            // line 166
                            echo "                                        <li>";
                            echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                            echo "</li>
                                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 168
                        echo "                                </ul>
                            ";
                    } else {
                        // line 170
                        echo "                                Valid
                            ";
                    }
                    // line 172
                    echo "                        </td>
                    </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 175
                echo "                </tbody>
            </table>
        ";
            }
            // line 178
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['manager'], $context['classes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 179
        echo "
    <script type=\"text/javascript\">//<![CDATA[
        function explain(link) {
            \"use strict\";

            var imgs = link.children,
                target = link.getAttribute('data-target-id');

            Sfjs.toggle(target, imgs[0], imgs[1])
                .load(
                    target,
                    link.href,
                    null,
                    function(xhr, el) {
                        el.innerHTML = 'An error occurred while loading the details';
                        Sfjs.removeClass(el, 'loading');
                    }
                );

            return false;
        }

        function expandQuery(link) {
            var sections = link.children,
                target = link.getAttribute('data-target-id'),
                targetId = target.replace('code', ''),
                queriesParameters = document.getElementById('original-query' + targetId);

            if (queriesParameters.style.display != 'none') {
                queriesParameters.style.display = 'none';
                document.getElementById('small' + target).style.display = 'inline';
                document.getElementById('expandParams' + targetId).innerHTML = 'Display runnable query';
            }

            if (document.getElementById('small' + target).style.display != 'none') {
                document.getElementById('small' + target).style.display = 'none';
                document.getElementById(target).style.display = 'inline';

                sections[0].style.display = 'none';
                sections[1].style.display = 'inline';
                sections[2].style.display = 'inline';
            } else {
                document.getElementById('small' + target).style.display = 'inline';
                document.getElementById(target).style.display = 'none';

                sections[0].style.display = 'inline';
                sections[1].style.display = 'none';
                sections[2].style.display = 'none';
            }

            return false;
        }

        function toggleRunnableQuery(target) {
            var targetId = target.getAttribute('target-data-id').replace('original-query', ''),
                targetElement = document.getElementById(target.getAttribute('target-data-id')),
                elem;

            if (targetElement.style.display != 'block') {
                targetElement.style.display = 'block';
                target.innerHTML = 'Hide runnable query';

                document.getElementById('smallcode' + targetId).style.display = 'none';
                document.getElementById('code' + targetId).style.display = 'none';

                elem = document.getElementById('code' + targetId).parentElement.children[0];

                elem.children[0].style.display = 'inline';
                elem.children[1].style.display = 'none';
                elem.children[2].style.display = 'none';

            } else {
                targetElement.style.display = 'none';
                target.innerHTML = 'Display runnable query';

                document.getElementById('smallcode' + targetId).style.display = 'inline';
            }
        }

    //]]></script>

    <style>
        h3 {
            margin-bottom: 0px;
        }

        code {
            display: none;
        }

        code pre {
            padding: 5px;
        }
    </style>
";
    }

    public function getTemplateName()
    {
        return "@Doctrine/Collector/db.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  519 => 179,  513 => 178,  508 => 175,  500 => 172,  496 => 170,  492 => 168,  483 => 166,  479 => 165,  476 => 164,  474 => 163,  469 => 161,  466 => 160,  462 => 159,  452 => 151,  448 => 149,  446 => 148,  441 => 147,  437 => 146,  432 => 143,  426 => 139,  423 => 138,  420 => 137,  418 => 136,  413 => 133,  407 => 129,  404 => 128,  401 => 127,  399 => 126,  394 => 123,  380 => 122,  376 => 120,  361 => 118,  353 => 116,  351 => 115,  348 => 114,  346 => 113,  342 => 111,  335 => 107,  331 => 106,  322 => 105,  319 => 104,  317 => 103,  313 => 101,  306 => 97,  302 => 96,  293 => 95,  291 => 94,  286 => 92,  276 => 91,  272 => 90,  266 => 87,  260 => 86,  255 => 84,  249 => 83,  243 => 80,  237 => 79,  232 => 77,  228 => 76,  222 => 75,  216 => 74,  207 => 73,  190 => 72,  185 => 71,  179 => 67,  177 => 66,  172 => 65,  155 => 64,  151 => 62,  148 => 61,  140 => 57,  136 => 55,  133 => 50,  129 => 48,  126 => 43,  123 => 42,  120 => 41,  112 => 36,  108 => 35,  102 => 31,  99 => 30,  94 => 27,  86 => 24,  79 => 20,  72 => 16,  68 => 14,  65 => 13,  62 => 12,  58 => 10,  55 => 9,  49 => 7,  47 => 6,  39 => 5,  36 => 4,  33 => 3,  30 => 2,  21 => 1,);
    }
}
