<?php

/* CoreCategoryBundle:Admin:formactions.html.twig */
class __TwigTemplate_a6dcbb4b471d0b4ba25a9d1bab735ac2d2291244c7aaf7d46ff45f5d75d79fb7 extends Twig_Template
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
        echo "                ";
        if (((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) || (!$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "valid", array())))) {
            // line 3
            echo "                <div class=\"well well-small form-actions\">  
                        ";
            // line 4
            if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "supportsPreviewMode", array())) {
                // line 5
                echo "                            <button class=\"btn btn-info persist-preview\" name=\"btn_preview\" type=\"submit\">
                                <i class=\"icon-eye-open\"></i>
                                ";
                // line 7
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_preview", array(), "SonataAdminBundle"), "html", null, true);
                echo "
                            </button>
                        ";
            }
            // line 10
            echo "                        ";
            if ((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method")))) {
                // line 11
                echo "                            <input type=\"submit\" class=\"btn btn-primary\" name=\"btn_update_and_edit\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_update_and_edit_again", array(), "SonataAdminBundle"), "html", null, true);
                echo "\"/>
                            ";
                // line 12
                if (($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "delete"), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "DELETE", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
                    // line 13
                    echo "                                ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delete_or", array(), "SonataAdminBundle"), "html", null, true);
                    echo "
                                <a class=\"btn btn-danger\" href=\"";
                    // line 14
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "delete", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_delete", array(), "SonataAdminBundle"), "html", null, true);
                    echo "</a>
                            ";
                }
                // line 16
                echo "                            ";
                if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isAclEnabled", array(), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "acl"), "method")) && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "MASTER", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
                    // line 17
                    echo "                                <a class=\"btn\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "acl", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_edit_acl", array(), "SonataAdminBundle"), "html", null, true);
                    echo "</a>
                            ";
                }
                // line 19
                echo "                        ";
            } else {
                // line 20
                echo "                            ";
                if ($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "edit"), "method")) {
                    // line 21
                    echo "                                <input class=\"btn btn-primary\" type=\"submit\" name=\"btn_create_and_edit\" value=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_create_and_edit_again", array(), "SonataAdminBundle"), "html", null, true);
                    echo "\"/>
                            ";
                }
                // line 22
                echo "                            
                        ";
            }
            // line 23
            echo "     
                </div>
";
        }
    }

    public function getTemplateName()
    {
        return "CoreCategoryBundle:Admin:formactions.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  93 => 23,  89 => 22,  83 => 21,  80 => 20,  77 => 19,  69 => 17,  66 => 16,  59 => 14,  54 => 13,  52 => 12,  47 => 11,  44 => 10,  38 => 7,  34 => 5,  32 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }
}
