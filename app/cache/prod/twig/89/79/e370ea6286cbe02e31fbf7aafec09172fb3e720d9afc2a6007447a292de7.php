<?php

/* ApplicationSonataUserBundle:Contragent:index.html.twig */
class __TwigTemplate_8979e370ea6286cbe02e31fbf7aafec09172fb3e720d9afc2a6007447a292de7 extends Twig_Template
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
        echo "Добавление и редактирование контрагентов | OliKids.ru";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "контрагенты";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Добавление и редактирование контрагентов в интернет-магазине детских игрушек OliKids. Создайте контрагента и нажмите редактировать, чтобы добавить адрес доставки.";
    }

    // line 8
    public function block_js_head($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    <script>
        settingsJS.routes['contragent_delete'] = '";
        // line 11
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_delete");
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
        // line 15
        echo "    
";
    }

    // line 17
    public function block_main_content($context, array $blocks = array())
    {
        // line 18
        echo "    <div class=\"main_col_pad\">
        <section class=\"cabinet_addresses\">
            <h2>Контрагенты</h2>
            ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "contragent_success_create"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 22
            echo "                    <div class=\"info_box success\">
                        <h6>";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flashMessage"], array()), "html", null, true);
            echo "</h6>
                    </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "            <div class=\"cabinet_address_add\">
                <div class=\"controls\">
                    <a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_create");
        echo "\" class=\"add with_icon text_tgl\">Добавить нового контрагента</a>
                </div>
            </div>
            ";
        // line 31
        if (twig_length_filter($this->env, (isset($context["contragents"]) ? $context["contragents"] : null))) {
            // line 32
            echo "                <dl class=\"cabinet_addresses_list\">
                    ";
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["contragents"]) ? $context["contragents"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["contragent"]) {
                // line 34
                echo "                        <div ";
                echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["contragent"]);
                echo " class=\"contact_contragents\">
                            ";
                // line 35
                if ($this->getAttribute($context["contragent"], "organization", array(), "any", true, true)) {
                    // line 36
                    echo "                                ";
                    $context["isIndi"] = 0;
                    // line 37
                    echo "                                <dt class=\"cabinet_address_person\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "organization", array()), "html", null, true);
                    echo "</dt>
                                ";
                } else {
                    // line 39
                    echo "                                    ";
                    $context["isIndi"] = 1;
                    // line 40
                    echo "                                    <dt class=\"cabinet_address_person\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "lastName", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "firstName", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "surName", array()), "html", null, true);
                    echo "</dt>
                            ";
                }
                // line 42
                echo "                            <dd class=\"cabinet_address\">
                                ";
                // line 43
                ob_start();
                // line 44
                echo "                                    <p class=\"cabinet_address_info\">
                                        ";
                // line 45
                if ($this->getAttribute($context["contragent"], "contactEmail", array())) {
                    // line 46
                    echo "                                            E-mail: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "contactEmail", array()), "html", null, true);
                    echo "<br>
                                        ";
                }
                // line 48
                echo "                                        ";
                if ($this->getAttribute($context["contragent"], "phone1", array())) {
                    // line 49
                    echo "                                            Контактный телефон: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "phone1", array()), "html", null, true);
                    echo "
                                        ";
                }
                // line 51
                echo "                                    </p>
                                ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 53
                echo "                                <div class=\"cabinet_address_controls\">
                                        <a href=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_edit", array("contragentId" => $this->getAttribute($context["contragent"], "id", array()), "isIndi" => (isset($context["isIndi"]) ? $context["isIndi"] : null))), "html", null, true);
                echo "\" class=\"edit with_icon text_tgl\">Редактировать</a>
                                        ";
                // line 55
                if ((((twig_length_filter($this->env, $this->getAttribute($context["contragent"], "orders", array())) == 0) && (twig_length_filter($this->env, $this->getAttribute($context["contragent"], "payments", array())) == 0)) && (twig_length_filter($this->env, $this->getAttribute($context["contragent"], "manufacturerDiscounts", array())) == 0))) {
                    // line 56
                    echo "                                            <a data-route=\"contragent_delete\" data-contragent=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contragent"], "id", array()), "html", null, true);
                    echo "\" href=\"javascript:void(0);\" class=\"delete with_icon text_tgl\">Удалить</a>
                                        ";
                }
                // line 58
                echo "                                </div>
                            </dd>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contragent'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "                </dl>
                ";
        } else {
            // line 64
            echo "                <div class=\"info_box\">Записей не найдено</div>
            ";
        }
        // line 66
        echo "        </section>
    </div>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contragent:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 66,  216 => 64,  212 => 62,  203 => 58,  197 => 56,  195 => 55,  191 => 54,  188 => 53,  184 => 51,  178 => 49,  175 => 48,  169 => 46,  167 => 45,  164 => 44,  162 => 43,  159 => 42,  149 => 40,  146 => 39,  140 => 37,  137 => 36,  135 => 35,  130 => 34,  126 => 33,  123 => 32,  121 => 31,  115 => 28,  111 => 26,  102 => 23,  99 => 22,  95 => 21,  90 => 18,  87 => 17,  82 => 15,  68 => 14,  64 => 13,  59 => 11,  53 => 9,  50 => 8,  44 => 6,  38 => 5,  32 => 4,);
    }
}
