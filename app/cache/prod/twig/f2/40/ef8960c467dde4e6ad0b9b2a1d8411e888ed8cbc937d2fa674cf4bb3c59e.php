<?php

/* ApplicationSonataUserBundle:Contragent:contact.html.twig */
class __TwigTemplate_f240ef8960c467dde4e6ad0b9b2a1d8411e888ed8cbc937d2fa674cf4bb3c59e extends Twig_Template
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
        settingsJS.routes['contact_delete'] = '";
        // line 12
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_contact_delete");
        echo "';
    </script>
     ";
        // line 14
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "35f41f8_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35f41f8_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/user_frontend_contact_frontend.contact_1.js");
            // line 15
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
        // line 16
        echo "    
";
    }

    // line 18
    public function block_main_content($context, array $blocks = array())
    {
        // line 19
        echo "    <div class=\"main_col_pad\">
        <section class=\"cabinet_addresses\">
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
        echo "            ";
        if ((isset($context["contragent"]) ? $context["contragent"] : null)) {
            // line 27
            echo "                <dl class=\"cabinet_addresses_list\">
                    <div ";
            // line 28
            echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["contragent"]) ? $context["contragent"] : null));
            echo " class=\"contact_contragents\">
                        ";
            // line 29
            if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "organization", array(), "any", true, true)) {
                // line 30
                echo "                            ";
                $context["isIndi"] = 0;
                // line 31
                echo "                            <dt class=\"cabinet_address_person\"><h2>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "organization", array()), "html", null, true);
                echo "</h2></dt>
                            ";
            } else {
                // line 33
                echo "                                ";
                $context["isIndi"] = 1;
                // line 34
                echo "                                <dt class=\"cabinet_address_person\"><h2>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "lastName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "firstName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "surName", array()), "html", null, true);
                echo "</h2></dt>
                        ";
            }
            // line 36
            echo "                        <dd class=\"cabinet_address\">
                            ";
            // line 37
            ob_start();
            // line 38
            echo "                                <p class=\"cabinet_address_info\">
                                    ";
            // line 39
            if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "contactEmail", array())) {
                // line 40
                echo "                                        E-mail: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "contactEmail", array()), "html", null, true);
                echo "<br>
                                    ";
            }
            // line 42
            echo "                                    ";
            if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "phone1", array())) {
                // line 43
                echo "                                        Контактный телефон: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "phone1", array()), "html", null, true);
                echo "
                                    ";
            }
            // line 45
            echo "                                </p>
                            ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 47
            echo "                            <div class=\"cabinet_address_controls\">
                                    <a href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_edit", array("contragentId" => $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "id", array()), "isIndi" => (isset($context["isIndi"]) ? $context["isIndi"] : null))), "html", null, true);
            echo "\" class=\"edit with_icon text_tgl\">Редактировать</a>
                                    ";
            // line 49
            if ((((twig_length_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "orders", array())) == 0) && (twig_length_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "payments", array())) == 0)) && (twig_length_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "manufacturerDiscounts", array())) == 0))) {
                // line 50
                echo "                                        <a data-route=\"contragent_delete\" data-contragent=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "id", array()), "html", null, true);
                echo "\" href=\"javascript:void(0);\" class=\"delete with_icon text_tgl\">Удалить</a>
                                    ";
            }
            // line 52
            echo "                            </div>
                        </dd>
                    </div>
                    ";
            // line 55
            $this->env->loadTemplate("ApplicationSonataUserBundle:Contragent:contact_list.html.twig")->display(array_merge($context, array("contacts" => $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "contactList", array()))));
            echo "            
                </dl>
                ";
        } else {
            // line 57
            echo "   
                <div class=\"info_box\">Информация о плательщике не найдена</div>
                <p>Вы можете добавить информацию о плательщике, а после указать адреса доставки</p>
                <div class=\"cabinet_address_add\">
                    <div class=\"controls\">
                        <a href=\"";
            // line 62
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_create");
            echo "\" class=\"add with_icon text_tgl\">Добавить нового плательщика</a>
                    </div>
                </div>
            ";
        }
        // line 66
        echo "        </section>
    </div>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contragent:contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 66,  210 => 62,  203 => 57,  197 => 55,  192 => 52,  186 => 50,  184 => 49,  180 => 48,  177 => 47,  173 => 45,  167 => 43,  164 => 42,  158 => 40,  156 => 39,  153 => 38,  151 => 37,  148 => 36,  138 => 34,  135 => 33,  129 => 31,  126 => 30,  124 => 29,  120 => 28,  117 => 27,  114 => 26,  105 => 23,  102 => 22,  98 => 21,  94 => 19,  91 => 18,  86 => 16,  72 => 15,  68 => 14,  63 => 12,  59 => 11,  53 => 9,  50 => 8,  44 => 6,  38 => 5,  32 => 4,);
    }
}
