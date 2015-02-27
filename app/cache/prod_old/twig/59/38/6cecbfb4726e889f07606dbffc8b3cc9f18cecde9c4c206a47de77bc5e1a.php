<?php

/* ApplicationSonataAdminBundle:Admin:menu.html.twig */
class __TwigTemplate_59386cecbfb4726e889f07606dbffc8b3cc9f18cecde9c4c206a47de77bc5e1a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'menu' => array($this, 'block_menu'),
            'top_bar_before_nav' => array($this, 'block_top_bar_before_nav'),
            'sonata_top_bar_nav' => array($this, 'block_sonata_top_bar_nav'),
            'menu_dropdown' => array($this, 'block_menu_dropdown'),
            'top_bar_after_nav' => array($this, 'block_top_bar_after_nav'),
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
        $this->displayBlock('menu', $context, $blocks);
        // line 93
        echo "
";
    }

    // line 9
    public function block_menu($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        <div class=\"nav-collapse\">
            <ul class=\"nav\">
                ";
        // line 14
        $this->displayBlock('top_bar_before_nav', $context, $blocks);
        // line 15
        echo "                ";
        $this->displayBlock('sonata_top_bar_nav', $context, $blocks);
        // line 87
        echo "                ";
        $this->displayBlock('top_bar_after_nav', $context, $blocks);
        // line 88
        echo "            </ul>
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 14
    public function block_top_bar_before_nav($context, array $blocks = array())
    {
    }

    // line 15
    public function block_sonata_top_bar_nav($context, array $blocks = array())
    {
        // line 16
        echo "                    ";
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "security", array()), "token", array()) && $this->env->getExtension('security')->isGranted("ROLE_SONATA_ADMIN"))) {
            // line 17
            echo "
                        ";
            // line 18
            $context["carretArrow"] = "";
            // line 19
            echo "                        ";
            $context["menuClass"] = "";
            // line 20
            echo "
                        ";
            // line 21
            $this->displayBlock('menu_dropdown', $context, $blocks);
            // line 84
            echo "
                    ";
        }
        // line 86
        echo "                ";
    }

    // line 21
    public function block_menu_dropdown($context, array $blocks = array())
    {
        // line 22
        echo "                            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")));
        foreach ($context['_seq'] as $context["labelParent"] => $context["items"]) {
            // line 23
            echo "
                                ";
            // line 24
            $context["tempMenu"] = (isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu"));
            // line 25
            echo "                                <li class=\"dropdown";
            echo twig_escape_filter($this->env, (isset($context["menuClass"]) ? $context["menuClass"] : $this->getContext($context, "menuClass")), "html", null, true);
            echo "\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
            // line 26
            echo twig_escape_filter($this->env, $context["labelParent"], "html", null, true);
            echo " <span class=\"caret";
            echo twig_escape_filter($this->env, (isset($context["carretArrow"]) ? $context["carretArrow"] : $this->getContext($context, "carretArrow")), "html", null, true);
            echo "\"></span></a>
                                    <ul class=\"dropdown-menu\">

                                            ";
            // line 29
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["items"]);
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
            foreach ($context['_seq'] as $context["label"] => $context["item"]) {
                // line 30
                echo "
                                                ";
                // line 31
                $context["display"] = true;
                // line 32
                echo "
                                                ";
                // line 33
                if ($this->getAttribute($context["item"], "roles", array(), "any", true, true)) {
                    // line 34
                    echo "                                                    ";
                    $context["display"] = false;
                    // line 35
                    echo "                                                    ";
                    if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
                        // line 36
                        echo "                                                        ";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "roles", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                            // line 37
                            echo "                                                            ";
                            if (twig_in_filter($context["role"], $this->getAttribute($context["item"], "roles", array()))) {
                                // line 38
                                echo "                                                                ";
                                $context["display"] = true;
                                // line 39
                                echo "                                                            ";
                            }
                            // line 40
                            echo "                                                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 41
                        echo "                                                    ";
                    }
                    // line 42
                    echo "                                                ";
                }
                // line 43
                echo "
                                                ";
                // line 44
                if ((isset($context["display"]) ? $context["display"] : $this->getContext($context, "display"))) {
                    // line 45
                    echo "
                                                    ";
                    // line 46
                    if (($this->getAttribute($context["item"], "delimiters", array(), "any", true, true) && twig_in_filter("before", $this->getAttribute($context["item"], "delimiters", array())))) {
                        // line 47
                        echo "
                                                        ";
                        // line 49
                        echo "                                                        <hr style=\"margin: 0px\">
                                                    ";
                    }
                    // line 51
                    echo "
                                                    ";
                    // line 52
                    if ($this->getAttribute($context["item"], "route", array(), "any", true, true)) {
                        // line 53
                        echo "
                                                        ";
                        // line 54
                        $context["carretArrow"] = "";
                        // line 55
                        echo "                                                        ";
                        $context["menuClass"] = "";
                        // line 56
                        echo "
                                                        <li";
                        // line 57
                        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == $this->getAttribute($context["item"], "route", array()))) {
                            echo " class=\"active\"";
                        }
                        echo "><a href=\"";
                        echo $this->env->getExtension('routing')->getPath($this->getAttribute($context["item"], "route", array()));
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                        echo "</a></li>

                                                    ";
                    } else {
                        // line 60
                        echo "
                                                        ";
                        // line 61
                        $context["menu"] = array(("" . $context["label"]) => $context["item"]);
                        // line 62
                        echo "                                                        ";
                        $context["carretArrow"] = "-right";
                        // line 63
                        echo "                                                        ";
                        $context["menuClass"] = " submenu-show-on-hover";
                        // line 64
                        echo "                                                        ";
                        $this->displayBlock("menu_dropdown", $context, $blocks);
                        echo "

                                                    ";
                    }
                    // line 67
                    echo "
                                                    ";
                    // line 68
                    if (($this->getAttribute($context["item"], "delimiters", array(), "any", true, true) && twig_in_filter("after", $this->getAttribute($context["item"], "delimiters", array())))) {
                        // line 69
                        echo "                                                                <hr style=\"margin: 0px\">
                                                        ";
                        // line 71
                        echo "
                                                    ";
                    }
                    // line 73
                    echo "
                                                ";
                }
                // line 75
                echo "
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
            unset($context['_seq'], $context['_iterated'], $context['label'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "
                                    </ul>
                                </li>

                                ";
            // line 81
            $context["menu"] = (isset($context["tempMenu"]) ? $context["tempMenu"] : $this->getContext($context, "tempMenu"));
            // line 82
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['labelParent'], $context['items'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "                        ";
    }

    // line 87
    public function block_top_bar_after_nav($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin:menu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  293 => 87,  289 => 83,  283 => 82,  281 => 81,  275 => 77,  260 => 75,  256 => 73,  252 => 71,  249 => 69,  247 => 68,  244 => 67,  237 => 64,  234 => 63,  231 => 62,  229 => 61,  226 => 60,  214 => 57,  211 => 56,  208 => 55,  206 => 54,  203 => 53,  201 => 52,  198 => 51,  194 => 49,  191 => 47,  189 => 46,  186 => 45,  184 => 44,  181 => 43,  178 => 42,  175 => 41,  169 => 40,  166 => 39,  163 => 38,  160 => 37,  155 => 36,  152 => 35,  149 => 34,  147 => 33,  144 => 32,  142 => 31,  139 => 30,  122 => 29,  114 => 26,  109 => 25,  107 => 24,  104 => 23,  99 => 22,  96 => 21,  92 => 86,  88 => 84,  86 => 21,  83 => 20,  80 => 19,  78 => 18,  75 => 17,  72 => 16,  69 => 15,  64 => 14,  56 => 88,  53 => 87,  50 => 15,  48 => 14,  43 => 11,  40 => 10,  37 => 9,  32 => 93,  30 => 9,  27 => 8,  24 => 1,);
    }
}
