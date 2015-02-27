<?php

/* ApplicationSonataUserBundle:Contragent:create.html.twig */
class __TwigTemplate_b1a40838c7bf159894cb6a3b03a5c5e97c64eb134143a5eaed3cf0c1b58b7c2f extends Twig_Template
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
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'js_head' => array($this, 'block_js_head'),
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Создание контрагента | OliKids.ru";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "создать, контрагент";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Страница создания контрагента на сайте OliKids. Для добавления адресов доставки зайдите в редактирование уже созданного контрагента.";
    }

    // line 8
    public function block_js_head($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
     ";
        // line 10
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "35f41f8_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35f41f8_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/user_frontend_contact_frontend.contact_1.js");
            // line 11
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "35f41f8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35f41f8") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/user_frontend_contact.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 12
        echo "    
";
    }

    // line 14
    public function block_main_content($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"main_col_pad\">
        <section class=\"cabinet_addresses\">
            <h2>Создание нового плательщика</h2>
            ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "contactagent_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 19
            echo "                    <div class=\"info_box success\">
                        <h6>";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flashMessage"], array()), "html", null, true);
            echo "</h6>
                    </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "            <div class=\"cabinet_address_add no_limit\">
                <div class=\"brown_gradient_box\">
                    ";
        // line 25
        $this->env->getExtension('form')->renderer->setTheme((isset($context["indiForm"]) ? $context["indiForm"] : $this->getContext($context, "indiForm")), array(0 => "CoreCommonBundle:Form:row.html.twig"));
        // line 26
        echo "                    ";
        $this->env->getExtension('form')->renderer->setTheme((isset($context["legalForm"]) ? $context["legalForm"] : $this->getContext($context, "legalForm")), array(0 => "CoreCommonBundle:Form:row.html.twig"));
        // line 27
        echo "                    <ul id=\"contragent_type\" class=\"filter_sort_switches\">
                        <li>
                            <label>
                                <span>";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.label.indi.caption"), "html", null, true);
        echo "</span>
                                <input type=\"radio\" value=\"indi_form\" name=\"form_selector\" ";
        // line 31
        if ((( !$this->getAttribute($this->getAttribute((isset($context["indiForm"]) ? $context["indiForm"] : $this->getContext($context, "indiForm")), "vars", array()), "valid", array()) && $this->getAttribute($this->getAttribute((isset($context["legalForm"]) ? $context["legalForm"] : $this->getContext($context, "legalForm")), "vars", array()), "valid", array())) || ($this->getAttribute($this->getAttribute((isset($context["indiForm"]) ? $context["indiForm"] : $this->getContext($context, "indiForm")), "vars", array()), "valid", array()) && $this->getAttribute($this->getAttribute((isset($context["legalForm"]) ? $context["legalForm"] : $this->getContext($context, "legalForm")), "vars", array()), "valid", array())))) {
            echo "  checked=\"checked\" ";
        }
        echo "/>
                            </label>
                        </li>
                        <li>
                            <label>
                                <span>";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.label.legal.caption"), "html", null, true);
        echo "</span>
                                <input type=\"radio\" value=\"legal_form\" name=\"form_selector\" ";
        // line 37
        if (( !$this->getAttribute($this->getAttribute((isset($context["legalForm"]) ? $context["legalForm"] : $this->getContext($context, "legalForm")), "vars", array()), "valid", array()) && $this->getAttribute($this->getAttribute((isset($context["indiForm"]) ? $context["indiForm"] : $this->getContext($context, "indiForm")), "vars", array()), "valid", array()))) {
            echo " checked=\"checked\" ";
        }
        echo "/>
                            </label>
                        </li>
                    </ul>
                    ";
        // line 41
        $this->env->loadTemplate("ApplicationSonataUserBundle:Contragent:Form/indi_form.html.twig")->display(array_merge($context, array("form" => (isset($context["indiForm"]) ? $context["indiForm"] : $this->getContext($context, "indiForm")))));
        // line 42
        echo "                    ";
        $this->env->loadTemplate("ApplicationSonataUserBundle:Contragent:Form/legal_form.html.twig")->display(array_merge($context, array("form" => (isset($context["legalForm"]) ? $context["legalForm"] : $this->getContext($context, "legalForm")))));
        // line 43
        echo "                </div>
            </div>
        </section>
    </div>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contragent:create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 43,  156 => 42,  154 => 41,  145 => 37,  141 => 36,  131 => 31,  127 => 30,  122 => 27,  119 => 26,  117 => 25,  113 => 23,  104 => 20,  101 => 19,  97 => 18,  92 => 15,  89 => 14,  84 => 12,  70 => 11,  66 => 10,  61 => 9,  58 => 8,  52 => 6,  46 => 5,  40 => 4,  11 => 1,);
    }
}
