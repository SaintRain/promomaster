<?php

/* ApplicationSonataUserBundle:Profile:change_contragent.html.twig */
class __TwigTemplate_922fe3da6250c018c2902c4855f0362a5c724d2b4410ee530df0deb8cb235115 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_description' => array($this, 'block_meta_description'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'main_content' => array($this, 'block_main_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataUserBundle::cabinet_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo "Выбор текущего контрагента";
    }

    // line 12
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Выбор текущего контрагента";
    }

    // line 13
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Выбор текущего контрагента";
    }

    // line 15
    public function block_main_content($context, array $blocks = array())
    {
        // line 16
        echo "    ";
        ob_start();
        // line 17
        echo "
        <h2>Выбор текущего контрагента</h2>

        <form method=\"POST\">
            <ul class=\"change-cintragent\">

                ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["contragents"]) ? $context["contragents"] : $this->getContext($context, "contragents")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["contragent"]) {
            // line 24
            echo "
                    <li>
                        <button name=\"contragentId\" value=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "id", array()), "html", null, true);
            echo "\">";
            // line 27
            if ($this->getAttribute($context["contragent"], "legalForm", array(), "any", true, true)) {
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "organization", array()), "html", null, true);
            } else {
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "lastName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "firstName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "surName", array()), "html", null, true);
            }
            // line 32
            echo "</button>
                    </li>

                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 36
            echo "
                    <li>Еще не создан ни один контрагент!</li>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contragent'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "
            </ul>
        </form>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Profile:change_contragent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 40,  95 => 36,  87 => 32,  80 => 30,  77 => 28,  75 => 27,  72 => 26,  68 => 24,  63 => 23,  55 => 17,  52 => 16,  49 => 15,  43 => 13,  37 => 12,  31 => 11,);
    }
}
