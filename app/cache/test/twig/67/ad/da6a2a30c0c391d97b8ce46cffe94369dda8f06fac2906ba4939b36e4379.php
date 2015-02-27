<?php

/* CoreDirectoryBundle:Admin/List:list_coordinates.html.twig */
class __TwigTemplate_67adda6a2a30c0c391d97b8ce46cffe94369dda8f06fac2906ba4939b36e4379 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");

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
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "latitude", array()) && $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "longitude", array()))) {
            // line 5
            echo "        <div class=\"row-centrify\">
            <div class=\"text-center\">
            ";
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "coordinates", array()));
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
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "latitude", array()) . ",") . $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "longitude", array())), "html", null, true);
            echo "\">
                    <img alt=\"Google Maps\" src=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/img/gmail.png"), "html", null, true);
            echo "\" />
                </a>
                <a title=\"Yandex Maps\" href=\"http://maps.yandex.ru/?ll=";
            // line 22
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "longitude", array()) . ",") . $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "latitude", array())), "html", null, true);
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
        return array (  113 => 28,  105 => 23,  101 => 22,  96 => 20,  92 => 19,  86 => 15,  72 => 14,  66 => 12,  61 => 10,  58 => 9,  55 => 8,  38 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
