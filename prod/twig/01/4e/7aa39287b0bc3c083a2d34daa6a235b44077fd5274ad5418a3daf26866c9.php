<?php

/* CoreFaqBundle:Admin/Article:preview.html.twig */
class __TwigTemplate_014e7aa39287b0bc3c083a2d34daa6a235b44077fd5274ad5418a3daf26866c9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:edit.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(12);

            throw $e;
        }

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'actions' => array($this, 'block_actions'),
            'side_menu' => array($this, 'block_side_menu'),
            'formactions' => array($this, 'block_formactions'),
            'preview' => array($this, 'block_preview'),
            'form' => array($this, 'block_form'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 15
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style_default.css"), "html", null, true);
        echo "\" />
";
    }

    // line 18
    public function block_actions($context, array $blocks = array())
    {
    }

    // line 21
    public function block_side_menu($context, array $blocks = array())
    {
    }

    // line 24
    public function block_formactions($context, array $blocks = array())
    {
        // line 25
        echo "    <button class=\"btn btn-success\" type=\"submit\" name=\"btn_preview_approve\">
        <i class=\"icon-ok\"></i>
        ";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_preview_approve", array(), "SonataAdminBundle"), "html", null, true);
        echo "
    </button>
    <button class=\"btn btn-danger\" type=\"submit\" name=\"btn_preview_decline\">
        <i class=\"icon-remove\"></i>
        ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_preview_decline", array(), "SonataAdminBundle"), "html", null, true);
        echo "
    </button>
";
    }

    // line 35
    public function block_preview($context, array $blocks = array())
    {
        // line 36
        echo "    <div class=\"sonata-ba-view\">
        ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "showgroups", array()));
        foreach ($context['_seq'] as $context["name"] => $context["view_group"]) {
            // line 38
            echo "            <table class=\"table table-bordered\">
                ";
            // line 39
            if ($context["name"]) {
                // line 40
                echo "                    <tr class=\"sonata-ba-view-title\">
                        <td colspan=\"2\">
                            ";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "trans", array(0 => $context["name"]), "method"), "html", null, true);
                echo "
                        </td>
                    </tr>
                ";
            }
            // line 46
            echo "
                ";
            // line 47
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["view_group"], "fields", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                // line 48
                echo "                    <tr class=\"sonata-ba-view-container\">
                        ";
                // line 49
                if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "show", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                    // line 50
                    echo "                            ";
                    echo $this->env->getExtension('sonata_admin')->renderViewElement($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "show", array()), $context["field_name"], array(), "array"), (isset($context["object"]) ? $context["object"] : null));
                    echo "
                        ";
                }
                // line 52
                echo "                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "            </table>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['view_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "    </div>
";
    }

    // line 59
    public function block_form($context, array $blocks = array())
    {
        // line 60
        echo "    <div class=\"like_site\">
        <h1>";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        echo "</h1>
        <article class=\"def_style\">
            ";
        // line 63
        echo $this->getAttribute((isset($context["object"]) ? $context["object"] : null), ("body" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
        echo "
        </article>
        <div class=\"sonata-preview-form-container\">
            ";
        // line 66
        $this->displayParentBlock("form", $context, $blocks);
        echo "
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreFaqBundle:Admin/Article:preview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 66,  160 => 63,  155 => 61,  152 => 60,  149 => 59,  144 => 56,  137 => 54,  130 => 52,  124 => 50,  122 => 49,  119 => 48,  115 => 47,  112 => 46,  105 => 42,  101 => 40,  99 => 39,  96 => 38,  92 => 37,  89 => 36,  86 => 35,  79 => 31,  72 => 27,  68 => 25,  65 => 24,  60 => 21,  55 => 18,  49 => 16,  44 => 15,  41 => 14,  11 => 12,);
    }
}
