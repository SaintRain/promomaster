<?php

/* CoreTroubleTicketBundle:Admin/Form:form.html.twig */
class __TwigTemplate_85bf757ae4571302e89d951444afe40ae7771da2aa8ba32de2415e1d9675b024 extends Twig_Template
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
        echo "<div class=\"row-fluid play ";
        if (((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) && (!(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))))) {
            echo " hidden ";
        }
        echo "\" id=\"trouble-ticket-form\">
    <div class=\"clearfix\"></div>
    <div class=\"straight-border alone\">
    <div>

        ";
        // line 6
        if (((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) && (!(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))))) {
            // line 7
            echo "            ";
            $context["url"] = "edit";
            // line 8
            echo "            ";
        } elseif (((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) && (null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array())))) {
            // line 9
            echo "                ";
            $context["url"] = "copy";
            // line 10
            echo "            ";
        } elseif (((null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method")) && (null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array())))) {
            // line 11
            echo "                ";
            $context["url"] = "create";
            // line 12
            echo "        ";
        }
        // line 13
        echo "
        <form class=\"form-horizontal trouble-ticket-form\"
              action=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => (isset($context["url"]) ? $context["url"] : null), 1 => array("id" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"), "uniqid" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "subclass" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "subclass"), "method"))), "method"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo "
              method=\"POST\" ";
        // line 16
        if ((!$this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "getOption", array(0 => "html5_validate"), "method"))) {
            echo "novalidate=\"novalidate\"";
        }
        echo ">
            <input id=\"objectId\" type=\"hidden\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
        echo "\" >
            <input id=\"uniqid\" type=\"hidden\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "html", null, true);
        echo "\" >
            ";
        // line 19
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "errors", array())) > 0)) {
            // line 20
            echo "                <div class=\"sonata-ba-form-error\">
                    ";
            // line 21
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
            echo "
                </div>
            ";
        }
        // line 24
        echo "            <fieldset id=\"edit-msg\" class=\"row-fluid\">
                <div class=\"grey-gradient span12 border-b\">
                    <div class=\"with-padding\">
                        <h5 class=\"pull-left widget-color\">
                            Свойства
                            ";
        // line 29
        if (((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) && (!(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))))) {
            // line 30
            echo "                                (<a class=\"more-info-ctrl\" href=\"javascript:void(0);\">Больше</a>)
                            ";
        }
        // line 32
        echo "                        </h5>
                        <div class=\"clear-fix\"></div>
                    </div>
                </div>
                <div class=\"clearfix\"></div>
                <div class=\"clearfix\"></div>
                <div class=\"alone\"></div>
                <div class=\"row-fluid trouble-ticket-more-info\">
                    <div class=\"span12\">
                        <div class=\"control-group ";
        // line 41
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'errors')) {
            echo "error";
        }
        echo "\">
                            ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'label');
        echo "
                            <div class=\"controls\">";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'widget', array("attr" => array("class" => "span11")));
        echo "</div>
                        </div>
                        <div class=\"control-group\">
                            ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'label');
        echo "
                            <div class=\"controls\">";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "body", array()), 'widget');
        echo "</div>
                        </div>
                    </div>
                </div>
                ";
        // line 51
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array(), "any", true, true)) {
            // line 52
            echo "                   <div class=\"row-fluid\">
                       <div class=\"span8\">
                           <div class=\"control-group ";
            // line 54
            if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), 'errors')) {
                echo "error";
            }
            echo "\">
                               ";
            // line 55
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), 'label');
            echo "
                               <div class=\"controls\">";
            // line 56
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "user", array()), 'widget');
            echo "</div>
                           </div>
                       </div>
                   </div>
                ";
        }
        // line 61
        echo "                <div class=\"row-fluid\">
                    <div class=\"controls span6\">
                        <div class=\"control-group ";
        // line 63
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status", array()), 'errors')) {
            echo "error";
        }
        echo "\">
                            ";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status", array()), 'label');
        echo "
                            <div class=\"controls\">";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status", array()), 'widget');
        echo "</div>
                        </div>
                        <div class=\"control-group ";
        // line 67
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority", array()), 'errors')) {
            echo "error";
        }
        echo "\">
                            ";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority", array()), 'label');
        echo "
                            <div class=\"controls\">";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority", array()), 'widget');
        echo "</div>
                        </div>
                    </div>
                    <div class=\"controls span6 special-controls\">
                        <div class=\"control-group ";
        // line 73
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category", array()), 'errors')) {
            echo "error";
        }
        echo "\">
                            ";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category", array()), 'label');
        echo "
                            <div class=\"controls\">";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category", array()), 'widget');
        echo "</div>
                        </div>
                        <div class=\"control-group\">
                            ";
        // line 78
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "readiness", array()), 'label');
        echo "
                            <div class=\"controls\">";
        // line 79
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "readiness", array()), 'widget');
        echo "</div>
                        </div>
                        ";
        // line 87
        echo "                    </div>
                    <div>
                        <div class=\"span8\">
                            <div class=\"control-group ";
        // line 90
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "manager", array()), 'errors')) {
            echo "error";
        }
        echo "\">
                                ";
        // line 91
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "manager", array()), 'label');
        echo "
                                <div class=\"controls\">
                                    <div class=\"fix-error\">
                                    ";
        // line 94
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "manager", array()), 'widget');
        echo "
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
        // line 101
        if (((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"))) && (!(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))))) {
            // line 102
            echo "                <div class=\"row-fluid\" id=\"edit-msg\">
                    <div class=\"control-group\">
                        <div class=\"controls\">
                            <a class=\"predefinded-answers\" href=\"";
            // line 105
            echo $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_categories");
            echo "\">Предопределенные ответы</a>
                        </div>
                    </div>
                    ";
            // line 108
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "messages", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 109
                echo "                        <div class=\"control-group\">
                            ";
                // line 111
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["message"], "body", array()), 'label', array("label" => "Примечания"));
                // line 112
                echo "<div class=\"controls edit-msg\">";
                // line 113
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["message"], "body", array()), 'widget', array("attr" => array("class" => "msg-body main span11")));
                // line 114
                echo "</div>
                            <div class=\"hidden\">";
                // line 116
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["message"], "troubleTicket", array()), 'widget');
                // line 117
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["message"], "manager", array()), 'widget');
                // line 118
                echo "</div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            echo "                    ";
            $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "messages", array()), "setRendered", array(), "method");
            // line 122
            echo "                </div>
                ";
        }
        // line 124
        echo "            </fieldset>
            ";
        // line 125
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
            ";
        // line 126
        $this->env->loadTemplate("CoreTroubleTicketBundle:Admin:Form/form_actions.html.twig")->display($context);
        // line 127
        echo "            <div class=\"preview-block modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
                <h3 id=\"myModalLabel\">Предпросмотр</h3>
                </div>
                <div class=\"modal-body\"></div>
                <div class=\"modal-footer\">
                    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Close"), "html", null, true);
        echo "</button>
                    <button class=\"btn btn-primary\">";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Save changes"), "html", null, true);
        echo "</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/Form:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  318 => 135,  314 => 134,  305 => 127,  303 => 126,  299 => 125,  296 => 124,  292 => 122,  289 => 121,  281 => 118,  279 => 117,  277 => 116,  274 => 114,  272 => 113,  270 => 112,  268 => 111,  265 => 109,  261 => 108,  255 => 105,  250 => 102,  248 => 101,  238 => 94,  232 => 91,  226 => 90,  221 => 87,  216 => 79,  212 => 78,  206 => 75,  202 => 74,  196 => 73,  189 => 69,  185 => 68,  179 => 67,  174 => 65,  170 => 64,  164 => 63,  160 => 61,  152 => 56,  148 => 55,  142 => 54,  138 => 52,  136 => 51,  129 => 47,  125 => 46,  119 => 43,  115 => 42,  109 => 41,  98 => 32,  94 => 30,  92 => 29,  85 => 24,  79 => 21,  76 => 20,  74 => 19,  70 => 18,  66 => 17,  60 => 16,  54 => 15,  50 => 13,  47 => 12,  44 => 11,  41 => 10,  38 => 9,  35 => 8,  32 => 7,  30 => 6,  19 => 1,);
    }
}
