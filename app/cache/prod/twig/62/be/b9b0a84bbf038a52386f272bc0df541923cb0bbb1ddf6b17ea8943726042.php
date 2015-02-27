<?php

/* ApplicationSonataUserBundle:Contragent:contact_list.html.twig */
class __TwigTemplate_62beb9b0a84bbf038a52386f272bc0df541923cb0bbb1ddf6b17ea8943726042 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["isIndiContragent"] = (($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "organization", array(), "any", true, true)) ? (false) : (true));
        // line 2
        echo "<dl class=\"cabinet_addresses_list contact_list\">
    ";
        // line 3
        if (twig_length_filter($this->env, (isset($context["contacts"]) ? $context["contacts"] : null))) {
            // line 4
            echo "        <h2>";
            if ((isset($context["isIndiContragent"]) ? $context["isIndiContragent"] : null)) {
                echo "Получатели";
            } else {
                echo "Адреса";
            }
            echo "</h2>
        <div class=\"cabinet_address_add\">
            <div class=\"controls\">
                <a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_contact_create", array("contragentId" => $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "id", array()))), "html", null, true);
            echo "\" class=\"add with_icon text_tgl\">";
            if ((isset($context["isIndiContragent"]) ? $context["isIndiContragent"] : null)) {
                echo "Добавить получателя";
            } else {
                echo "Добавить адрес";
            }
            echo "</a>
            </div>
        </div>
    ";
        }
        // line 11
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["contacts"]) ? $context["contacts"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
            // line 12
            echo "        <div ";
            echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["contact"]);
            echo " class=\"contact_contragents\">
            ";
            // line 13
            if (($this->getAttribute($context["contact"], "lastName", array(), "any", true, true) && $this->getAttribute($context["contact"], "firstName", array(), "any", true, true))) {
                // line 14
                echo "                <dt class=\"cabinet_address_person\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "lastName", array()), "html", null, true);
                echo "&nbsp;";
                echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "firstName", array()), "html", null, true);
                echo "</dt>
            ";
            }
            // line 16
            echo "            <dd class=\"cabinet_address\">
                ";
            // line 17
            ob_start();
            // line 18
            echo "                    <p class=\"cabinet_address_info\">
                        Адрес: ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "address", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["contact"], "city", array()), "name", array()), "html", null, true);
            echo ", ";
            echo "<br>
                        ";
            // line 20
            if ((((isset($context["isIndiContragent"]) ? $context["isIndiContragent"] : null) && $this->getAttribute($context["contact"], "phone", array(), "any", true, true)) && $this->getAttribute($context["contact"], "phone", array()))) {
                // line 21
                echo "                            Контактный телефон: ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "phone", array()), "html", null, true);
                echo "
                        ";
            }
            // line 23
            echo "                    </p>
                ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 25
            echo "                <div class=\"cabinet_address_controls\">
                    <a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_contact_edit", array("contactId" => $this->getAttribute($context["contact"], "id", array()))), "html", null, true);
            echo "\" class=\"edit with_icon text_tgl\">Редактировать</a>
                    <a data-route=\"contact_delete\" data-contact=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "id", array()), "html", null, true);
            echo "\" href=\"";
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_contact_delete");
            echo "\" class=\"delete with_icon text_tgl\">Удалить</a>
                </div>
            </dd>
        </div>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 32
            echo "            <div class=\"attention_box\">
                <h4>Информация о ";
            // line 33
            if ((isset($context["isIndiContragent"]) ? $context["isIndiContragent"] : null)) {
                echo "получателях";
            } else {
                echo "адресах";
            }
            echo " не найдена</h4>
                <br />
                <div class=\"cabinet_address_add\">
                    <div class=\"controls\">
                        <span>Вы можете</span>
                        <a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_contact_create", array("contragentId" => $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "id", array()))), "html", null, true);
            echo "\" class=\"add with_icon text_tgl\">Добавить</a>
                        <span>&nbsp; неограниченное число ";
            // line 39
            if ((isset($context["isIndiContragent"]) ? $context["isIndiContragent"] : null)) {
                echo "получателей";
            } else {
                echo "адресов";
            }
            echo "</span>
                    </div>
                </div>
            </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "</dl>";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contragent:contact_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 44,  136 => 39,  132 => 38,  120 => 33,  117 => 32,  105 => 27,  101 => 26,  98 => 25,  94 => 23,  88 => 21,  86 => 20,  79 => 19,  76 => 18,  74 => 17,  71 => 16,  63 => 14,  61 => 13,  56 => 12,  50 => 11,  37 => 7,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
