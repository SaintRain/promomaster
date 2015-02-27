<?php

/* ApplicationSonataUserBundle:Contragent:edit.html.twig */
class __TwigTemplate_834dfa28e4508c286dcbc1c8df6400f29d00bd350ca7230166d72467208497f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");

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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent")), "listName", array()), "html");
        echo " | OliKids.ru";
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
    }

    // line 17
    public function block_main_content($context, array $blocks = array())
    {
        // line 18
        echo "    <div ";
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent")));
        echo " class=\"main_col_pad\">
        <section class=\"cabinet_addresses\">
            ";
        // line 20
        if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent")), "id", array())) {
            // line 21
            echo "                <h2>Редактирование \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent")), "listName", array()), "html", null, true);
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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "contact_success"), "method"));
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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "contragent_success_edit"), "method"));
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "CoreCommonBundle:Form:row.html.twig"));
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
        return array (  171 => 92,  168 => 45,  165 => 44,  162 => 43,  159 => 42,  156 => 41,  153 => 40,  150 => 39,  147 => 38,  145 => 37,  141 => 35,  132 => 32,  129 => 31,  124 => 30,  115 => 27,  112 => 26,  107 => 25,  103 => 23,  97 => 21,  95 => 20,  89 => 18,  86 => 17,  70 => 14,  66 => 13,  61 => 11,  55 => 9,  52 => 8,  46 => 6,  40 => 5,  32 => 4,);
    }
}
