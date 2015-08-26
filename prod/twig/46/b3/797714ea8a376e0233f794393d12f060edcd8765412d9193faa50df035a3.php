<?php

/* ApplicationSonataUserBundle:Contragent:edit.html.twig */
class __TwigTemplate_46b3797714ea8a376e0233f794393d12f060edcd8765412d9193faa50df035a3 extends Twig_Template
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
        echo "Редактирование контрагента ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "listName", array()), "html");
        echo " | PromoMaster.net";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "редактирование, контрагент";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Страница редактирования контрагента на сайте OliKids. Вы можете изменить персональные данные контрагента или добавить адреса доставки.";
    }

    // line 8
    public function block_js_head($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    <script>
        settingsJS.routes['contact_delete'] = '";
        // line 11
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_contact_delete");
        echo "';
    </script>
     ";
        // line 13
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "35f41f8_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35f41f8_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/user_frontend_contact_frontend.contact_1.js");
            // line 14
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "35f41f8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35f41f8") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/user_frontend_contact.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 17
    public function block_main_content($context, array $blocks = array())
    {
        // line 18
        echo "    <div ";
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["contragent"]) ? $context["contragent"] : null));
        echo " class=\"main_col_pad\">
        <section class=\"cabinet_addresses\">
            ";
        // line 20
        if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "id", array())) {
            // line 21
            echo "                <h2>Редактирование \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "listName", array()), "html", null, true);
            echo "\"</h2>
                ";
        } else {
            // line 23
            echo "                    <h2>Новый контрагент</h2>
            ";
        }
        // line 25
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "contact_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 26
            echo "                    <div class=\"info_box success\">
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
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "contragent_success_edit"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 31
            echo "                    <div class=\"info_box success\">
                        <h6>";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flashMessage"], array()), "html", null, true);
            echo "</h6>
                    </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "            <div class=\"cabinet_address_add no_limit\">
                <div class=\"brown_gradient_box\">
                    ";
        // line 37
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "CoreCommonBundle:Form:row.html.twig"));
        // line 38
        echo "                    ";
        if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "organization", array(), "any", true, true)) {
            // line 39
            echo "                        ";
            $context["isIndi"] = 0;
            // line 40
            echo "                        ";
            $this->env->loadTemplate("ApplicationSonataUserBundle:Contragent:Form/legal_form.html.twig")->display($context);
            // line 41
            echo "                        ";
        } else {
            // line 42
            echo "                            ";
            $context["isIndi"] = 1;
            // line 43
            echo "                            ";
            $this->env->loadTemplate("ApplicationSonataUserBundle:Contragent:Form/indi_form.html.twig")->display($context);
            // line 44
            echo "                    ";
        }
        // line 45
        echo "                </div>
                ";
        // line 92
        echo "            </div>
        </section>
    </div>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contragent:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 92,  176 => 45,  173 => 44,  170 => 43,  167 => 42,  164 => 41,  161 => 40,  158 => 39,  155 => 38,  153 => 37,  149 => 35,  140 => 32,  137 => 31,  132 => 30,  123 => 27,  120 => 26,  115 => 25,  111 => 23,  105 => 21,  103 => 20,  97 => 18,  94 => 17,  78 => 14,  74 => 13,  69 => 11,  63 => 9,  60 => 8,  54 => 6,  48 => 5,  40 => 4,  11 => 1,);
    }
}
