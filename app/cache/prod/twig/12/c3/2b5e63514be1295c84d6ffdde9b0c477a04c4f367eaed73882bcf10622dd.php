<?php

/* CoreTroubleTicketBundle:Admin/Form:form_actions.html.twig */
class __TwigTemplate_12c32b5e63514be1295c84d6ffdde9b0c477a04c4f367eaed73882bcf10622dd extends Twig_Template
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
        echo "    <div class=\"grey-gradient span12 border-t like-first\">
        <div class=\"with-double-padding preview-container\">
            ";
        // line 4
        if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "supportsPreviewMode", array())) {
            // line 5
            echo "                <button class=\"btn btn-info persist-preview\" name=\"btn_preview\" type=\"submit\">
                    <i class=\"icon-eye-open\"></i>
                    ";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_preview", array(), "SonataAdminBundle"), "html", null, true);
            echo "
                </button>
            ";
        }
        // line 10
        echo "            ";
        if (((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) && (!(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))))) {
            // line 11
            echo "                <div class=\"inline-center\">
                    <input type=\"submit\" class=\"btn btn-primary\" name=\"btn_update_and_edit\" value=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_update_and_edit_again", array(), "SonataAdminBundle"), "html", null, true);
            echo "\"/>
                    ";
            // line 19
            echo "                    ";
            if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isAclEnabled", array(), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "acl"), "method")) && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "MASTER", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
                // line 20
                echo "                        <a class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "acl", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_edit_acl", array(), "SonataAdminBundle"), "html", null, true);
                echo "</a>
                    ";
            }
            // line 22
            echo "                    ";
            if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "list"), "method")) {
                // line 23
                echo "                        <input type=\"submit\" class=\"btn\" name=\"btn_update_and_list\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_update_and_return_to_list", array(), "SonataAdminBundle"), "html", null, true);
                echo "\"/>
                    ";
            }
            // line 25
            echo "                    <a href=\"javascript:void(0);\" class=\"btn btn-info persist-preview preview-action\" name=\"btn_preview\" type=\"submit\">
                        <i class=\"icon-eye-open\"></i>
                        ";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_preview", array(), "SonataAdminBundle"), "html", null, true);
            echo "
                    </a>
                </div>
            ";
        } else {
            // line 31
            echo "                <div class=\"inline-center\">
                    ";
            // line 32
            if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "edit"), "method")) {
                // line 33
                echo "                        <input class=\"btn btn-primary\" type=\"submit\" name=\"btn_create_and_edit\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create_and_edit_again", array(), "SonataAdminBundle"), "html", null, true);
                echo "\"/>
                    ";
            }
            // line 35
            echo "                    ";
            if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "list"), "method")) {
                // line 36
                echo "                        <input type=\"submit\" class=\"btn\" name=\"btn_create_and_list\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create_and_return_to_list", array(), "SonataAdminBundle"), "html", null, true);
                echo "\"/>
                    ";
            }
            // line 38
            echo "                    <input class=\"btn\" type=\"submit\" name=\"btn_create_and_create\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create_and_create_a_new_one", array(), "SonataAdminBundle"), "html", null, true);
            echo "\"/>
                </div>
            ";
        }
        // line 41
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/Form:form_actions.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  110 => 41,  103 => 38,  97 => 36,  94 => 35,  88 => 33,  86 => 32,  83 => 31,  76 => 27,  72 => 25,  66 => 23,  63 => 22,  55 => 20,  52 => 19,  48 => 12,  45 => 11,  42 => 10,  36 => 7,  32 => 5,  30 => 4,  26 => 2,  20 => 1,);
    }
}
