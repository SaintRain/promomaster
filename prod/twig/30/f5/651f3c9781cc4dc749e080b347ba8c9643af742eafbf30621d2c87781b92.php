<?php

/* CoreTroubleTicketBundle:Admin/Form:message_form.html.twig */
class __TwigTemplate_30f5651f3c9781cc4dc749e080b347ba8c9643af742eafbf30621d2c87781b92 extends Twig_Template
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
        echo "<div class=\"clearfix\"></div>
<div class=\"row-fluid alone\">
    ";
        // line 3
        $context["url"] = (( !(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) ? ("edit") : ("create"));
        // line 4
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => "success", 1 => "error", 2 => "info", 3 => "warning"));
        foreach ($context['_seq'] as $context["_key"] => $context["notice_level"]) {
            // line 5
            echo "        ";
            $context["session_var"] = ("sonata_flash_" . $context["notice_level"]);
            // line 6
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => (isset($context["session_var"]) ? $context["session_var"] : null)), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flash"]) {
                // line 7
                echo "            <div class=\"alert ";
                echo twig_escape_filter($this->env, ("alert-" . $context["notice_level"]), "html", null, true);
                echo "\">
                ";
                // line 8
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flash"], array(), "SonataAdminBundle"), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notice_level'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "    
    <form class=\"form-horizontal trouble-ticket-msg-form\"
          action=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => (isset($context["url"]) ? $context["url"] : null), 1 => array("id" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"), "uniqid" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "subclass" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "subclass"), "method"))), "method"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo "
          method=\"POST\" ";
        // line 14
        if ( !$this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "getOption", array(0 => "html5_validate"), "method")) {
            echo "novalidate=\"novalidate\"";
        }
        echo ">
        ";
        // line 15
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "errors", array())) > 0)) {
            // line 16
            echo "            <div class=\"sonata-ba-form-error\">
                ";
            // line 17
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
            echo "
            </div>
        ";
        }
        // line 20
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'widget', array("attr" => array("class" => "msg-body span12")));
        echo "
        ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
        ";
        // line 22
        $this->env->loadTemplate("CoreTroubleTicketBundle:Admin:Form/message_form_actions.html.twig")->display($context);
        // line 23
        echo "        <div class=\"preview-block modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h3 id=\"myModalLabel\">Примечания</h3>
            </div>
            <div class=\"modal-body\"></div>
            <div class=\"modal-footer\">
                <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
                <button class=\"btn btn-primary\">Save changes</button>
            </div>
        </div>
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/Form:message_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 23,  93 => 22,  89 => 21,  84 => 20,  78 => 17,  75 => 16,  73 => 15,  67 => 14,  61 => 13,  52 => 11,  43 => 8,  38 => 7,  33 => 6,  30 => 5,  25 => 4,  23 => 3,  19 => 1,);
    }
}
