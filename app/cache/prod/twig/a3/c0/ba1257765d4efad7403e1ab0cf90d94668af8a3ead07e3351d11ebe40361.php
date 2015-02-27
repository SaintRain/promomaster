<?php

/* CoreTroubleTicketBundle:Admin/List:list_author_info.html.twig */
class __TwigTemplate_a3c0ba1257765d4efad7403e1ab0cf90d94668af8a3ead07e3351d11ebe40361 extends Twig_Template
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
        echo "<div>
    ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "author", array()));
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
        foreach ($context['_seq'] as $context["key"] => $context["author"]) {
            // line 6
            echo "        ";
            if ($context["author"]) {
                // line 7
                echo "        ";
                if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "user", array())) {
                    // line 8
                    echo "            ";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo ": <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "user", array()), "id", array()))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["author"], "html", null, true);
                    echo "</a>
            ";
                } else {
                    // line 10
                    echo "                ";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $context["author"], "html", null, true);
                    echo "
        ";
                }
                // line 12
                echo "        ";
            }
            // line 13
            echo "        ";
            if (($this->getAttribute($context["loop"], "last", array()) == false)) {
                // line 14
                echo "            <br />
        ";
            }
            // line 16
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['author'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/List:list_author_info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 17,  85 => 16,  81 => 14,  78 => 13,  75 => 12,  67 => 10,  57 => 8,  54 => 7,  51 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
