<?php

/* ApplicationSonataUserBundle:Admin/User:edit.html.twig */
class __TwigTemplate_ffafe7b708922bfc974cce7c3be65ec8a899a0fe60c9afa5a6e4776af59359ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logs", array()))) {
            echo " scroll-y";
        }
        echo "\">
                ";
        // line 6
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logs", array()))) {
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
            $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logs", array())));
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 22
                echo "                            <tr>
                                <td>";
                // line 23
                echo $this->env->getExtension('sonata_intl_datetime')->formatDatetime($this->getAttribute($context["log"], "loginDateTime", array()), "dd MMMM Y H:mm", $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()), (isset($context["default_timezone"]) ? $context["default_timezone"] : null));
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
        return array (  123 => 35,  120 => 34,  117 => 33,  111 => 30,  106 => 28,  97 => 25,  93 => 24,  89 => 23,  86 => 22,  82 => 21,  66 => 7,  64 => 6,  57 => 5,  54 => 4,  49 => 38,  46 => 33,  44 => 4,  41 => 3,  38 => 2,  11 => 1,);
    }
}
