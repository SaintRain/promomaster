<?php

/* CoreDirectoryBundle:Admin/List:list_coordinates.html.twig */
class __TwigTemplate_b6543a9abd532de3fdd8fbbe29fb316c38764ab84472f74d0f742dbc584ce39c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "latitude", array()) && $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "longitude", array()))) {
            // line 5
            echo "        <div class=\"row-centrify\">
            <div class=\"text-center\">
            ";
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "coordinates", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 8
                echo "                ";
                if ($this->getAttribute($context["loop"], "last", array())) {
                    // line 9
                    echo "                    <span>&nbsp;&setmn;&nbsp;</span>
                    <span>";
                    // line 10
                    echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                    echo "</span>
                    ";
                } else {
                    // line 12
                    echo "                        <span>";
                    echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                    echo "</span>
                ";
                }
                // line 14
                echo "            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "            </div>
        </div>
        <div class=\"row-centrify\">
            <div class=\"text-center\">
                <a title=\"Google Maps\" href=\"http://maps.google.com/?q=";
            // line 19
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "latitude", array()) . ",") . $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "longitude", array())), "html", null, true);
            echo "\">
                    <img alt=\"Google Maps\" src=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/img/gmail.png"), "html", null, true);
            echo "\" />
                </a>
                <a title=\"Yandex Maps\" href=\"http://maps.yandex.ru/?ll=";
            // line 22
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "longitude", array()) . ",") . $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "latitude", array())), "html", null, true);
            echo "\">
                    <img alt=\"Yandex Maps\" src=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/img/yamaps.png"), "html", null, true);
            echo "\" />
                </a>
            </div>
        </div>
        ";
        } else {
            // line 28
            echo "            <div>&#x2012;</div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreDirectoryBundle:Admin/List:list_coordinates.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 28,  113 => 23,  109 => 22,  104 => 20,  100 => 19,  94 => 15,  80 => 14,  74 => 12,  69 => 10,  66 => 9,  63 => 8,  46 => 7,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
