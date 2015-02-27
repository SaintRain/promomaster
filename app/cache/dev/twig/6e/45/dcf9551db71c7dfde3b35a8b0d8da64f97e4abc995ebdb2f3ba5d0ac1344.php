<?php

/* CoreAdCompanyBundle:Admin/list_fields/AdCompany:placementBannersList.html.twig */
class __TwigTemplate_6e45dcf9551db71c7dfde3b35a8b0d8da64f97e4abc995ebdb2f3ba5d0ac1344 extends Twig_Template
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
        echo "
    ";
        // line 5
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "placementBannersList", array())) {
            // line 6
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "placementBannersList", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 7
                echo "            ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "id", array()), "html", null, true);
                echo "<br>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 9
            echo "    ";
        }
        // line 10
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreAdCompanyBundle:Admin/list_fields/AdCompany:placementBannersList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 10,  58 => 9,  49 => 7,  44 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
