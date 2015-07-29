<?php

/* CoreTroubleTicketBundle:Admin/Form:message_form_actions.html.twig */
class __TwigTemplate_9764f19425c9c64f479736b1529db4947e56865be268125f5f6179e6d498b61b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'formactions' => array($this, 'block_formactions'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('formactions', $context, $blocks);
    }

    public function block_formactions($context, array $blocks = array())
    {
        // line 2
        echo "    <div class=\"well well-small form-actions preview-container\">
        <button class=\"btn btn-info persist-preview preview-action\" name=\"btn_preview\" type=\"button\">
            <i class=\"icon-eye-open\"></i>
            ";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_preview", array(), "SonataAdminBundle"), "html", null, true);
        echo "
        </button>
        <input type=\"submit\" class=\"btn btn-primary\" name=\"btn_update_and_edit\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_update_and_edit_again", array(), "SonataAdminBundle"), "html", null, true);
        echo "\"/>

        <button class=\"btn btn-danger decline-action\" type=\"button\" name=\"btn_preview_decline\">
            <i class=\"icon-remove\"></i>
            ";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_preview_decline", array(), "SonataAdminBundle"), "html", null, true);
        echo "
        </button>

        ";
        // line 14
        if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isAclEnabled", array(), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "acl"), "method")) && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "MASTER", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
            // line 15
            echo "            <a class=\"btn\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "acl", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_edit_acl", array(), "SonataAdminBundle"), "html", null, true);
            echo "</a>
        ";
        }
        // line 17
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/Form:message_form_actions.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  59 => 17,  51 => 15,  49 => 14,  43 => 11,  36 => 7,  31 => 5,  26 => 2,  20 => 1,);
    }
}