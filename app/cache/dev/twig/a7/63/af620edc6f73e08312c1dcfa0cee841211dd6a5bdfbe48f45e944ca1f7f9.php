<?php

/* ApplicationSonataUserBundle:Contragent/Form:legal_form.html.twig */
class __TwigTemplate_a763af620edc6f73e08312c1dcfa0cee841211dd6a5bdfbe48f45e944ca1f7f9 extends Twig_Template
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
        if (((array_key_exists("indiForm", $context) &&  !$this->getAttribute($this->getAttribute((isset($context["indiForm"]) ? $context["indiForm"] : $this->getContext($context, "indiForm")), "vars", array()), "valid", array())) || (array_key_exists("legalForm", $context) && $this->getAttribute($this->getAttribute((isset($context["legalForm"]) ? $context["legalForm"] : $this->getContext($context, "legalForm")), "vars", array()), "valid", array())))) {
            // line 2
            echo "    ";
            $context["curClass"] = "hidden";
            // line 3
            echo "    ";
        } else {
            // line 4
            echo "        ";
            $context["curClass"] = "normal";
        }
        // line 6
        echo "<form class=\"";
        echo twig_escape_filter($this->env, (isset($context["curClass"]) ? $context["curClass"] : $this->getContext($context, "curClass")), "html", null, true);
        echo "\" action=\"";
        if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent")), "id", array())) {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_edit", array("contragentId" => $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent")), "id", array()), "isIndi" => (isset($context["isIndi"]) ? $context["isIndi"] : $this->getContext($context, "isIndi")))), "html", null, true);
        } else {
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_create", array("isIndi" => 0));
        }
        echo "\" method=\"POST\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
    ";
        // line 7
        if ( !$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "valid", array())) {
            // line 8
            echo "        <div class=\"attention_box\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.label.error.main"), "html", null, true);
            echo "</div>
    ";
        }
        // line 10
        echo "    <fieldset class=\"form_fieldset\">
        ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "legalForm", array()), 'row');
        echo "
        ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "organization", array()), 'row');
        echo "
    </fieldset>
    <fieldset class=\"form_fieldset\">
        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "inn", array()), 'row');
        echo "
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "kpp", array()), 'row');
        echo "
        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "ogrn", array()), 'row');
        echo "
    </fieldset>
    <fieldset class=\"form_fieldset\">
        ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "chiefPosition", array()), 'row');
        echo "
        ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "chiefFio", array()), 'row');
        echo "
    </fieldset>
    <fieldset class=\"form_fieldset\">
        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bank", array()), 'row');
        echo "
        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bankAccount", array()), 'row');
        echo "
        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "corrAccount", array()), 'row');
        echo "
    </fieldset>
    <fieldset class=\"form_fieldset\">
        ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "addressPost", array()), 'row');
        echo "
        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "addressLegal", array()), 'row');
        echo "
    </fieldset>
    <fieldset class=\"form_fieldset\">
        ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "phone1", array()), 'row');
        echo "
        ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fax", array()), 'row');
        echo "
    </fieldset>
    <fieldset class=\"form_fieldset\">
        ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contactFio", array()), 'row');
        echo "
        ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "site", array()), 'row');
        echo "
    </fieldset>
    <fieldset class=\"form_fieldset\">
        ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contactEmail", array()), 'row');
        echo "
    </fieldset>
    <div class=\"form_padding_group\">
        ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        <button type=\"submit\" class=\"common_button big\">
            <span>";
        // line 46
        if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent")), "id", array())) {
            echo "Сохранить";
        } else {
            echo "Добавить";
        }
        echo "</span>
        </button>
        <a href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_index");
        echo "\" class=\"text_tgl\">Отменить</a>
    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contragent/Form:legal_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 48,  144 => 46,  139 => 44,  133 => 41,  127 => 38,  123 => 37,  117 => 34,  113 => 33,  107 => 30,  103 => 29,  97 => 26,  93 => 25,  89 => 24,  83 => 21,  79 => 20,  73 => 17,  69 => 16,  65 => 15,  59 => 12,  55 => 11,  52 => 10,  46 => 8,  44 => 7,  31 => 6,  27 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
