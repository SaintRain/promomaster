<?php

/* CoreLanguageBundle::language_switcher_menu.html.twig */
class __TwigTemplate_7faf18bec0eba4fb9054a5dbddc407a02fa7c36202d39119a083ea9dee9e4f77 extends Twig_Template
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
        echo "<div class=\"btn-group\" id=\"langSwitchButtonsContent\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "languages", array()));
        foreach ($context['_seq'] as $context["key"] => $context["lang"]) {
            // line 3
            echo "        <button type=\"button\" data-lang=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" class=\"langSwitch btn ";
            if (($context["key"] == $this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "active", array()))) {
                echo "btn-info";
            }
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["lang"], "caption", array()), "html", null, true);
            echo "</button>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['lang'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "    </div><br/>

";
        // line 8
        echo "    <script type=\"text/javascript\">
        var languageSwitcher = {
            activeLang: '";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "active", array()), "html", null, true);
        echo "',
            defaultLang: '";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "default", array()), "html", null, true);
        echo "',
            classId:'";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "classId", array()), "html", null, true);
        echo "',
            switch_language_url: '";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("switch_language", array("activeLanguage" => $this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "default", array()))), "html", null, true);
        echo "',
            needFixActiveLanguageInSession:false

        }
        </script>
        <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corelanguage/js/language_switcher.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "CoreLanguageBundle::language_switcher_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 18,  61 => 13,  57 => 12,  53 => 11,  49 => 10,  45 => 8,  41 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
