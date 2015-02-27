<?php

/* CorePropertyBundle:Admin/Form:property_widget.html.twig */
class __TwigTemplate_795a74d8e7bd8dcb41487c1c6c694875cc33066c5b690761b1ef9c73195c8274 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'property_widget' => array($this, 'block_property_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('property_widget', $context, $blocks);
    }

    public function block_property_widget($context, array $blocks = array())
    {
        // line 2
        echo "<script>
    var propertyOptions = {
    filebrowserBrowseUrl : \"";
        // line 4
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "debug", array())) {
            echo "/app_dev.php/";
        } else {
            echo "/";
        }
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "getParameter", array(0 => "filebrowserBrowseRoute"), "method"), "html", null, true);
        echo "\",
    property:{
        ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 7
            echo "    _";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "id", array()), "html", null, true);
            echo ":{productDataProperty: {

";
            // line 9
            if ($this->getAttribute((isset($context["pdp_match"]) ? $context["pdp_match"] : null), $this->getAttribute($context["p"], "id", array()), array(), "array", true, true)) {
                // line 10
                echo "
";
                // line 11
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pdp_match"]) ? $context["pdp_match"] : $this->getContext($context, "pdp_match")), $this->getAttribute($context["p"], "id", array()), array(), "array"));
                foreach ($context['_seq'] as $context["key"] => $context["p2"]) {
                    // line 12
                    echo "    ";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo ":{
        _";
                    // line 13
                    if ($this->getAttribute($context["p2"], "id", array())) {
                        echo twig_escape_filter($this->env, $this->getAttribute($context["p2"], "id", array()), "html", null, true);
                    } else {
                        echo "0";
                    }
                    echo ":";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($context["p2"], "data", array()), "property", array()), "editType", array()) == "input")) {
                        echo twig_escape_filter($this->env, ($this->getAttribute($context["p2"], "valueNumeric", array()) + 0), "html", null, true);
                    } else {
                        if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["p2"], "data", array()), "property", array()), "editType", array()), array(0 => "input_text", 1 => "textarea", 2 => "editor"))) {
                            echo "\"";
                            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["p2"], "value", array()), "js"), "html", null, true);
                            echo "\"";
                        } else {
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p2"], "data", array()), "id", array()), "html", null, true);
                        }
                    }
                    // line 14
                    echo "    },
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['p2'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 16
                echo "
";
            } else {
                // line 17
                echo "0:{_0:\"\"}";
            }
            // line 18
            echo "}
,description:\"";
            // line 19
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["p"], "descriptionRu", array()), "js"), "html", null, true);
            echo "\", isUsedInFilter:\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "isUsedInFilter", array()), "html", null, true);
            echo "\", isEnabled:\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "isEnabled", array()), "html", null, true);
            echo "\", isEnabledInYml:\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "isEnabledInYml", array()), "html", null, true);
            echo "\", id:\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "id", array()), "html", null, true);
            echo "\", defaultValue:\"";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "generalSettingsCategory", array()), "defaultValue", array()), "js"), "html", null, true);
            echo "\", required:\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "generalSettingsCategory", array()), "isRequired", array()), "html", null, true);
            echo "\", mask:\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "generalSettingsCategory", array()), "mask", array()), "html", null, true);
            echo "\", caption:\"";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["p"], "captionRu", array()), "js"), "html", null, true);
            if (((($this->getAttribute($context["p"], "editType", array()) == "input") && $this->getAttribute($this->getAttribute($context["p"], "generalSettingsCategory", array()), "defaultUnit", array())) && $this->getAttribute($this->getAttribute($this->getAttribute($context["p"], "generalSettingsCategory", array()), "defaultUnit", array()), "captionRu", array()))) {
                echo " (";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["p"], "generalSettingsCategory", array()), "defaultUnit", array()), "shortCaptionRu", array()), "html", null, true);
                echo ")";
            }
            if ($this->getAttribute($this->getAttribute($context["p"], "generalSettingsCategory", array()), "isRequired", array())) {
                echo " *";
            }
            echo "\",editType:\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "editType", array()), "html", null, true);
            echo "\",dataList: { ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["p"], "dataList", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                echo "_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
                echo ":\"";
                echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["d"], "value", array()), "js"), "html", null, true);
                echo "\",";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo " }},";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " },
            category: { ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : $this->getContext($context, "categories")));
        foreach ($context['_seq'] as $context["key"] => $context["cat"]) {
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo ":[";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["cat"]);
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                echo twig_escape_filter($this->env, $context["c"], "html", null, true);
                echo ",";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "],";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "}
    ,
            unigid:\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "\",
    id:\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array()), "html", null, true);
        echo "\",
    postUniqid:\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "uniqid"), "method"), "html", null, true);
        echo "\" //признак того, что есть пост данные и не нужно использовать дефолтные
    };

    </script>
    <script type=\"text/javascript\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/coreproperty/js/dynamicFields.js"), "html", null, true);
        echo "\"></script>    
";
        // line 29
        ob_start();
        // line 30
        echo "<div id=\"propertyFieldContent\"></div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Admin/Form:property_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  191 => 30,  189 => 29,  185 => 28,  178 => 24,  174 => 23,  170 => 22,  147 => 20,  99 => 19,  96 => 18,  93 => 17,  89 => 16,  82 => 14,  64 => 13,  59 => 12,  55 => 11,  52 => 10,  50 => 9,  44 => 7,  40 => 6,  30 => 4,  26 => 2,  20 => 1,);
    }
}
