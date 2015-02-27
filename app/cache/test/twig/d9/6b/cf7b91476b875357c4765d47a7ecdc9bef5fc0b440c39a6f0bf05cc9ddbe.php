<?php

/* ApplicationSonataUserBundle:Contact:index.html.twig */
class __TwigTemplate_d96bcf7b91476b875357c4765d47a7ecdc9bef5fc0b440c39a6f0bf05cc9ddbe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");

        $this->blocks = array(
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

    // line 2
    public function block_js_head($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    <script>
        settingsJS.routes['contragent_delete'] = '";
        // line 5
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_delete");
        echo "';
    </script>
     ";
        // line 7
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "35f41f8_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35f41f8_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/user_frontend_contact_frontend.contact_1.js");
            // line 8
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
        // line 10
        echo "    
";
    }

    // line 12
    public function block_main_content($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"main_col_pad\">
        <section class=\"cabinet_addresses\">
            <h2>Адреса доставки</h2>
            <div class=\"cabinet_address_add\">
                <div class=\"controls\">
                    <a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_create");
        echo "\" class=\"add with_icon text_tgl\">Добавить адрес доставки</a>
                </div>
            </div>
            ";
        // line 21
        if (twig_length_filter($this->env, (isset($context["contragents"]) ? $context["contragents"] : $this->getContext($context, "contragents")))) {
            // line 22
            echo "                <dl class=\"cabinet_addresses_list\">
                    ";
            // line 23
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["contragents"]) ? $context["contragents"] : $this->getContext($context, "contragents")));
            foreach ($context['_seq'] as $context["_key"] => $context["contragent"]) {
                // line 24
                echo "                        <div ";
                echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["contragent"]);
                echo " class=\"contact_contragents\">
                            ";
                // line 25
                if ($this->getAttribute($context["contragent"], "organization", array(), "any", true, true)) {
                    // line 26
                    echo "                                ";
                    $context["isIndi"] = 0;
                    // line 27
                    echo "                                <dt class=\"cabinet_address_person\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "organization", array()), "html", null, true);
                    echo "</dt>
                                ";
                } else {
                    // line 29
                    echo "                                    ";
                    $context["isIndi"] = 1;
                    // line 30
                    echo "                                    <dt class=\"cabinet_address_person\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "lastName", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "firstName", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "surName", array()), "html", null, true);
                    echo "</dt>
                            ";
                }
                // line 32
                echo "                            <dd class=\"cabinet_address\">
                                ";
                // line 33
                ob_start();
                // line 34
                echo "                                    <p class=\"cabinet_address_info\">
                                        ";
                // line 35
                if ($this->getAttribute($context["contragent"], "contactEmail", array())) {
                    // line 36
                    echo "                                            Email: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "contactEmail", array()), "html", null, true);
                    echo "<br>
                                        ";
                }
                // line 38
                echo "                                        ";
                if ($this->getAttribute($context["contragent"], "phone1", array())) {
                    // line 39
                    echo "                                            Контактный телефон: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "phone1", array()), "html", null, true);
                    echo "
                                        ";
                }
                // line 41
                echo "                                    </p>
                                ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 43
                echo "                                <div class=\"cabinet_address_controls\">
                                        <a href=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_edit", array("contragentId" => $this->getAttribute($context["contragent"], "id", array()), "isIndi" => (isset($context["isIndi"]) ? $context["isIndi"] : $this->getContext($context, "isIndi")))), "html", null, true);
                echo "\" class=\"edit with_icon text_tgl\">Редактировать</a>
                                        ";
                // line 45
                if ((((twig_length_filter($this->env, $this->getAttribute($context["contragent"], "orders", array())) == 0) && (twig_length_filter($this->env, $this->getAttribute($context["contragent"], "payments", array())) == 0)) && (twig_length_filter($this->env, $this->getAttribute($context["contragent"], "manufacturerDiscounts", array())) == 0))) {
                    // line 46
                    echo "                                            <a data-route=\"contragent_delete\" data-contragent=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "id", array()), "html", null, true);
                    echo "\" href=\"javascript:void(0);\" class=\"delete with_icon text_tgl\">Удалить</a>
                                        ";
                }
                // line 48
                echo "                                </div>
                            </dd>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contragent'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "                </dl>
                ";
        } else {
            // line 54
            echo "                <div class=\"info_box\">Записей не найдено</div>
            ";
        }
        // line 56
        echo "        </section>
    </div>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contact:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 56,  177 => 54,  173 => 52,  164 => 48,  158 => 46,  156 => 45,  152 => 44,  149 => 43,  145 => 41,  139 => 39,  136 => 38,  130 => 36,  128 => 35,  125 => 34,  123 => 33,  120 => 32,  110 => 30,  107 => 29,  101 => 27,  98 => 26,  96 => 25,  91 => 24,  87 => 23,  84 => 22,  82 => 21,  76 => 18,  69 => 13,  66 => 12,  61 => 10,  47 => 8,  43 => 7,  38 => 5,  32 => 3,  29 => 2,);
    }
}
