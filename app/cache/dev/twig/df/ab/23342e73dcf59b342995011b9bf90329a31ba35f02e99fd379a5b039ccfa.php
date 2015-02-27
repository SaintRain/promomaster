<?php

/* ApplicationSonataUserBundle:Contact/Form:contact_form.html.twig */
class __TwigTemplate_dfab23342e73dcf59b342995011b9bf90329a31ba35f02e99fd379a5b039ccfa extends Twig_Template
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
        echo "<form action=\"";
        if (array_key_exists("contragent", $context)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_contact_create", array("contragentId" => $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent")), "id", array()))), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_contact_edit", array("contactId" => $this->getAttribute((isset($context["contact"]) ? $context["contact"] : $this->getContext($context, "contact")), "id", array()))), "html", null, true);
        }
        echo "\" method=\"POST\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
    ";
        // line 2
        if ( !$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "valid", array())) {
            // line 3
            echo "        <div class=\"attention_box\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.label.error.main"), "html", null, true);
            echo "</div>
    ";
        }
        // line 5
        echo "    ";
        if (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "lastName", array(), "any", true, true) && $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "firstName", array(), "any", true, true))) {
            // line 6
            echo "        <fieldset class=\"form_fieldset\">
            ";
            // line 7
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "lastName", array()), 'row');
            echo "
            ";
            // line 8
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "firstName", array()), 'row');
            echo "
        </fieldset>
    ";
        }
        // line 11
        echo "    ";
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "passport", array(), "any", true, true)) {
            // line 12
            echo "        <fieldset class=\"form_fieldset\">
            ";
            // line 13
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "passport", array()), 'row');
            echo "
        </fieldset>
    ";
        }
        // line 16
        echo "    ";
        if (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone", array(), "any", true, true) && $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contactEmail", array(), "any", true, true))) {
            // line 17
            echo "    <fieldset class=\"form_fieldset\">
        ";
            // line 18
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "phone", array()), 'row');
            echo "
        ";
            // line 19
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contactEmail", array()), 'row');
            echo "
    </fieldset>
    ";
        }
        // line 22
        echo "    <fieldset class=\"form_fieldset\">
        ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "city", array()), 'row');
        echo "
        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "address", array()), 'row');
        echo "
        ";
        // line 25
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "postIndex", array(), "any", true, true)) {
            // line 26
            echo "            <div class=\"form_row \">
                ";
            // line 27
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "postIndex", array()), 'label', array("label_attr" => array("class" => "form_label")));
            echo "
                <div class=\"form_row_field";
            // line 28
            if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "postIndex", array()), 'errors')) {
                echo " form_field_error";
            }
            echo "\">
                    ";
            // line 29
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "postIndex", array()), 'widget');
            echo "
                    <a target=\"blank\" href=\"http://www.russianpost.ru/rp/servise/ru/home/postuslug/searchops1\">";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.indexLabel"), "html", null, true);
            echo "</a>
                    ";
            // line 31
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "postIndex", array()), 'errors');
            echo "
                </div>
            </div>
        ";
        }
        // line 35
        echo "    </fieldset>
    ";
        // line 36
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "mark", array(), "any", true, true)) {
            // line 37
            echo "        <fieldset class=\"form_fieldset\">
            ";
            // line 38
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "mark", array()), 'row');
            echo "
        </fieldset>
    ";
        }
        // line 41
        echo "    <div class=\"form_padding_group\">
        ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        <button type=\"submit\" class=\"common_button big\">
            <span>";
        // line 44
        if (array_key_exists("contragent", $context)) {
            echo "Добавить";
        } else {
            echo "Сохранить";
        }
        echo "</span>
        </button>
        ";
        // line 46
        $context["contragent"] = ((array_key_exists("contragent", $context)) ? ((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent"))) : ($this->getAttribute((isset($context["contact"]) ? $context["contact"] : $this->getContext($context, "contact")), "contragent", array())));
        // line 47
        echo "        ";
        if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "organization", array(), "any", true, true)) {
            // line 48
            echo "            ";
            $context["isIndi"] = 0;
            // line 49
            echo "            ";
        } else {
            // line 50
            echo "                ";
            $context["isIndi"] = 1;
            // line 51
            echo "        ";
        }
        // line 52
        echo "            ";
        // line 55
        echo "            <a href=\"";
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_index");
        echo "\" class=\"text_tgl\">Отменить</a>
    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contact/Form:contact_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 55,  171 => 52,  168 => 51,  165 => 50,  162 => 49,  159 => 48,  156 => 47,  154 => 46,  145 => 44,  140 => 42,  137 => 41,  131 => 38,  128 => 37,  126 => 36,  123 => 35,  116 => 31,  112 => 30,  108 => 29,  102 => 28,  98 => 27,  95 => 26,  93 => 25,  89 => 24,  85 => 23,  82 => 22,  76 => 19,  72 => 18,  69 => 17,  66 => 16,  60 => 13,  57 => 12,  54 => 11,  48 => 8,  44 => 7,  41 => 6,  38 => 5,  32 => 3,  30 => 2,  19 => 1,);
    }
}
