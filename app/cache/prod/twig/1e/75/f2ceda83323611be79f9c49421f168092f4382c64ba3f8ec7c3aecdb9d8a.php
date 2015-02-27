<?php

/* ApplicationSonataUserBundle:Contragent/Form:indi_form.html.twig */
class __TwigTemplate_1e75f2ceda83323611be79f9c49421f168092f4382c64ba3f8ec7c3aecdb9d8a extends Twig_Template
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
        if ((array_key_exists("legalForm", $context) && (!$this->getAttribute($this->getAttribute((isset($context["legalForm"]) ? $context["legalForm"] : null), "vars", array()), "valid", array())))) {
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
        echo "    <form class=\"";
        echo twig_escape_filter($this->env, (isset($context["curClass"]) ? $context["curClass"] : null), "html", null, true);
        echo "\" action=\"";
        if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "id", array())) {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_edit", array("contragentId" => $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "id", array()), "isIndi" => (isset($context["isIndi"]) ? $context["isIndi"] : null))), "html", null, true);
        } else {
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_create", array("isIndi" => 1));
        }
        echo "\" method=\"POST\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
    ";
        // line 7
        if ((!$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "valid", array()))) {
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "lastName", array()), 'row');
        echo "
        ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "firstName", array()), 'row');
        echo "
        ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "surName", array()), 'row');
        echo "
    </fieldset>
    <fieldset class=\"form_fieldset\">
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone1", array()), 'row');
        echo "
    </fieldset>
    <fieldset class=\"form_fieldset\">
        ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contactEmail", array()), 'row');
        echo "
    </fieldset>
    <div class=\"form_padding_group\">
        ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
        <button type=\"submit\" class=\"common_button big\">
            <span>";
        // line 24
        if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "id", array())) {
            echo "Сохранить";
        } else {
            echo "Добавить";
        }
        echo "</span>
        </button>
        <a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_index");
        echo "\" class=\"text_tgl\">Отменить</a>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Contragent/Form:indi_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 26,  86 => 24,  81 => 22,  75 => 19,  69 => 16,  63 => 13,  59 => 12,  55 => 11,  52 => 10,  46 => 8,  44 => 7,  31 => 6,  27 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
