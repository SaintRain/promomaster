<?php

/* CoreTroubleTicketBundle:Admin/List:list_author_info.html.twig */
class __TwigTemplate_3c5d0342f39292ee9e427fad8a57edb5dbe0acdb9acf2b049421dbce5d262ba2 extends Twig_Template
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
        echo "<div>
    ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "author", array()));
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
                if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array())) {
                    // line 8
                    echo "            ";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo ": <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array()), "id", array()))), "html", null, true);
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
        return array (  107 => 17,  93 => 16,  89 => 14,  86 => 13,  83 => 12,  75 => 10,  65 => 8,  62 => 7,  59 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
