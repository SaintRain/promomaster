<?php

/* CorePropertyBundle:Filter:layout.html.twig */
class __TwigTemplate_75da0606c6739ebdea7a03cbfc4b1aa66bb26c0074f1bcdb5a2bc81a7c95ab30 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'filterBuilder' => array($this, 'block_filterBuilder'),
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
        $this->displayBlock('filterBuilder', $context, $blocks);
    }

    public function block_filterBuilder($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        ";
        // line 12
        if ((array_key_exists("filterBuilder", $context) && (isset($context["filterBuilder"]) ? $context["filterBuilder"] : null))) {
            echo " ";
            // line 13
            echo "
            ";
            // line 14
            $context["parameters"] = twig_array_merge(twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "all", array())), array("page" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "page"), "method")));
            // line 15
            echo "
            <form method=\"GET\" action=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((array_key_exists("filterRoute", $context)) ? ((isset($context["filterRoute"]) ? $context["filterRoute"] : null)) : ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"))), (isset($context["parameters"]) ? $context["parameters"] : null)), "html", null, true);
            echo "\">
                <div class=\"filter";
            // line 17
            if ((array_key_exists("filterWithOwl", $context) && (isset($context["filterWithOwl"]) ? $context["filterWithOwl"] : null))) {
                echo " filter_owl";
            }
            echo "\">

                    ";
            // line 19
            if ((array_key_exists("filterWithOwl", $context) && (isset($context["filterWithOwl"]) ? $context["filterWithOwl"] : null))) {
                // line 20
                echo "
                        <div class=\"filter_owl_appeal\">
                            <span class=\"filter_owl_persona\">&nbsp;</span>
                            <span class=\"filter_owl_bubble\">Подобрать товар &mdash; просто!</span>
                        </div>

                    ";
            } else {
                // line 27
                echo "
                        <h2>";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("filter.title", array(), "frontend"), "html", null, true);
                echo "</h2>

                    ";
            }
            // line 31
            echo "
                    ";
            // line 32
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "get", array(0 => "filter"), "method")) {
                // line 33
                echo "
                        <a class=\"filter_clear\" href=\"javascript:void(0);\">";
                // line 34
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("filter.clear", array(), "frontend"), "html", null, true);
                echo "</a>

                    ";
            }
            // line 37
            echo "
                    ";
            // line 39
            echo "                    ";
            if ($this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "sex", array(), "any", true, true)) {
                // line 40
                echo "                        ";
                $this->env->resolveTemplate($this->getAttribute($this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "sex", array()), "template", array()))->display(array_merge($context, array("this" => $this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "sex", array()))));
                // line 41
                echo "                        ";
                $context["filterBuilder"] = twig_array_merge((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), array("sex" => null));
                // line 42
                echo "                    ";
            }
            // line 43
            echo "
                    ";
            // line 45
            echo "                    ";
            if ($this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "age", array(), "any", true, true)) {
                // line 46
                echo "                        ";
                $this->env->resolveTemplate($this->getAttribute($this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "age", array()), "template", array()))->display(array_merge($context, array("this" => $this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "age", array()))));
                // line 47
                echo "                        ";
                $context["filterBuilder"] = twig_array_merge((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), array("age" => null));
                // line 48
                echo "                    ";
            }
            // line 49
            echo "
                    ";
            // line 51
            echo "                    ";
            if ($this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "skills", array(), "any", true, true)) {
                // line 52
                echo "                        ";
                $this->env->resolveTemplate($this->getAttribute($this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "skills", array()), "template", array()))->display(array_merge($context, array("this" => $this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "skills", array()))));
                // line 53
                echo "                        ";
                $context["filterBuilder"] = twig_array_merge((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), array("skills" => null));
                // line 54
                echo "                    ";
            }
            // line 55
            echo "
                    ";
            // line 57
            echo "                    ";
            if ($this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "price", array(), "any", true, true)) {
                // line 58
                echo "                        ";
                $this->env->resolveTemplate($this->getAttribute($this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "price", array()), "template", array()))->display(array_merge($context, array("this" => $this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "price", array()))));
                // line 59
                echo "                        ";
                $context["filterBuilder"] = twig_array_merge((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), array("price" => null));
                // line 60
                echo "                    ";
            }
            // line 61
            echo "
                    ";
            // line 63
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null));
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
            foreach ($context['_seq'] as $context["fName"] => $context["fData"]) {
                // line 64
                echo "                        ";
                if ($context["fData"]) {
                    // line 65
                    echo "                            ";
                    $this->env->resolveTemplate($this->getAttribute($context["fData"], "template", array()))->display(array_merge($context, array("this" => $context["fData"])));
                    // line 66
                    echo "                        ";
                }
                // line 67
                echo "                    ";
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
            unset($context['_seq'], $context['_iterated'], $context['fName'], $context['fData'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "
                    ";
            // line 70
            echo "                    ";
            $context["GET"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array());
            // line 71
            echo "                    ";
            if ($this->getAttribute((isset($context["GET"]) ? $context["GET"] : null), "get", array(0 => "sort"), "method")) {
                // line 72
                echo "                        <input type=\"hidden\" name=\"sort\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["GET"]) ? $context["GET"] : null), "get", array(0 => "sort"), "method"), "html", null, true);
                echo "\"/>
                    ";
            }
            // line 74
            echo "
                    ";
            // line 75
            if ($this->getAttribute((isset($context["GET"]) ? $context["GET"] : null), "get", array(0 => "show"), "method")) {
                // line 76
                echo "                        <input type=\"hidden\" name=\"show\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["GET"]) ? $context["GET"] : null), "get", array(0 => "show"), "method"), "html", null, true);
                echo "\"/>
                    ";
            }
            // line 78
            echo "
                    <div class=\"filter_group\">
                        <label for=\"filter_instock\">
                            <input type=\"checkbox\" value=\"1\" class=\"\" id=\"filter_instock\" name=\"filter[instock]\" ";
            // line 81
            if (($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), "instock", array(), "array", true, true) && ($this->getAttribute((isset($context["filterRequest"]) ? $context["filterRequest"] : null), "instock", array(), "array") == 1))) {
                echo "checked";
            }
            echo ">
                            <span>&nbsp;Есть в наличии</span>
                        </label>
                    </div>

                    <div class=\"filter_submit filter_group\">
                        <button class=\"common_button\"><span> ";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("filter.submit", array(), "frontend"), "html", null, true);
            echo "</span></button>
                    </div>
                </div>
            </form>

        ";
        }
        // line 93
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Filter:layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  249 => 93,  240 => 87,  229 => 81,  224 => 78,  218 => 76,  216 => 75,  213 => 74,  207 => 72,  204 => 71,  201 => 70,  198 => 68,  184 => 67,  181 => 66,  178 => 65,  175 => 64,  157 => 63,  154 => 61,  151 => 60,  148 => 59,  145 => 58,  142 => 57,  139 => 55,  136 => 54,  133 => 53,  130 => 52,  127 => 51,  124 => 49,  121 => 48,  118 => 47,  115 => 46,  112 => 45,  109 => 43,  106 => 42,  103 => 41,  100 => 40,  97 => 39,  94 => 37,  88 => 34,  85 => 33,  83 => 32,  80 => 31,  74 => 28,  71 => 27,  62 => 20,  60 => 19,  53 => 17,  49 => 16,  46 => 15,  44 => 14,  41 => 13,  38 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
