<?php

/* ApplicationSonataUserBundle:Contact:create.html.twig */
class __TwigTemplate_7bdb17934e2e63a037ed39617588725d63b72825396a39e8298f9fab1436eea8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'js_head' => array($this, 'block_js_head'),
            'main_content' => array($this, 'block_main_content'),
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
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

    // line 2
    public function block_js_head($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    ";
        // line 4
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0d7c36b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0d7c36b_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/user_contact_contact_1.js");
            // line 5
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "0d7c36b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0d7c36b") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/user_contact.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 6
        echo "   

";
    }

    // line 9
    public function block_main_content($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"main_col_pad\">
        <section class=\"cabinet_addresses\">
            ";
        // line 12
        $context["isIndiContragent"] = (($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "organization", array(), "any", true, true)) ? (false) : (true));
        // line 13
        echo "            ";
        // line 20
        echo "            ";
        if ((isset($context["isIndiContragent"]) ? $context["isIndiContragent"] : $this->getContext($context, "isIndiContragent"))) {
            // line 21
            echo "                <h2>Добавление нового получателя</h2>
            ";
        } else {
            // line 23
            echo "                <h2>Добавление нового адреса</h2>
            ";
        }
        // line 25
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "contact_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 26
            echo "                <div class=\"info_box success\">
                    <h6>";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flashMessage"], array()), "html", null, true);
            echo "</h6>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "            <div class=\"cabinet_address_add no_limit\">
                <div class=\"brown_gradient_box\">
                    ";
        // line 32
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "CoreCommonBundle:Form:row.html.twig"));
        // line 33
        echo "                    ";
        $this->env->loadTemplate("ApplicationSonataUserBundle:Contact:Form/contact_form.html.twig")->display($context);
        // line 34
        echo "                </div>
            </div>
        </section>
    </div>
";
    }

    // line 39
    public function block_title($context, array $blocks = array())
    {
        echo "Изменение контактной информации";
    }

    // line 40
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Изменение контактной информации";
    }

    // line 41
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Изменение контактной информации";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contact:create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 41,  134 => 40,  128 => 39,  120 => 34,  117 => 33,  115 => 32,  111 => 30,  102 => 27,  99 => 26,  94 => 25,  90 => 23,  86 => 21,  83 => 20,  81 => 13,  79 => 12,  75 => 10,  72 => 9,  66 => 6,  52 => 5,  48 => 4,  43 => 3,  40 => 2,  11 => 1,);
    }
}
