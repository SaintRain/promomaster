<?php

/* ApplicationSonataUserBundle:Admin/User:edit.html.twig */
class __TwigTemplate_7b1a18ae90fadd898e1fc41d23e31f39a9bba37eaf4815c4e627946b9b96481d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");

        $this->blocks = array(
            'right_side' => array($this, 'block_right_side'),
            'preview' => array($this, 'block_preview'),
            'form' => array($this, 'block_form'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:base_edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_right_side($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"first_like_span\">
        ";
        // line 4
        $this->displayBlock('preview', $context, $blocks);
        // line 33
        echo "        ";
        $this->displayBlock('form', $context, $blocks);
        // line 38
        echo "    </div>
";
    }

    // line 4
    public function block_preview($context, array $blocks = array())
    {
        // line 5
        echo "            <div class=\"span3 pull-right";
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "logs", array()))) {
            echo " scroll-y";
        }
        echo "\">
                ";
        // line 6
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "logs", array()))) {
            // line 7
            echo "                <table class=\"table table-striped\">
                    <thead>
                        <tr>
                            <th colspan=\"3\">
                                <h4>Данные об авторизации</h4>
                            </th>
                        </tr>
                        <tr>
                            <th>Дата</th>
                            <th>Способ</th>
                            <th>IP</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 21
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "logs", array())));
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 22
                echo "                            <tr>
                                <td>";
                // line 23
                echo $this->env->getExtension('sonata_intl_datetime')->formatDatetime($this->getAttribute($context["log"], "loginDateTime", array()), "dd MMMM Y H:mm", $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()), (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone")));
                echo "</td>
                                <td>";
                // line 24
                echo twig_escape_filter($this->env, (($this->getAttribute($context["log"], "loginBySocial", array())) ? ($this->getAttribute($context["log"], "loginBySocial", array())) : ("Наш сайт")), "html", null, true);
                echo "&nbsp;</td>
                                <td>";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($context["log"], "ip", array()), "html", null, true);
                echo "</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "                    </tbody>
                </table>
                ";
        }
        // line 30
        echo "    
            </div>
        ";
    }

    // line 33
    public function block_form($context, array $blocks = array())
    {
        // line 34
        echo "            <div class=\"span9 pull-left\">
            ";
        // line 35
        $this->displayParentBlock("form", $context, $blocks);
        echo "
            </div>
        ";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/User:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 35,  112 => 34,  109 => 33,  103 => 30,  98 => 28,  89 => 25,  85 => 24,  81 => 23,  78 => 22,  74 => 21,  58 => 7,  56 => 6,  49 => 5,  46 => 4,  41 => 38,  38 => 33,  36 => 4,  33 => 3,  30 => 2,);
    }
}
