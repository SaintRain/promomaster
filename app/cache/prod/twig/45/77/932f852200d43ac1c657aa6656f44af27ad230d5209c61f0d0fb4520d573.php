<?php

/* CoreDirectoryBundle:Admin/Form/Type:remote_video_widget.html.twig */
class __TwigTemplate_4577932f852200d43ac1c657aa6656f44af27ad230d5209c61f0d0fb4520d573 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig");

        $this->blocks = array(
            'remote_video_form_widget' => array($this, 'block_remote_video_form_widget'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_remote_video_form_widget($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        ob_start();
        // line 12
        echo "        <fieldset class=\"remote-wrapper\">
            <div class=\"span6\">
                <div class=\"control-group\">
                    ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), ("caption" . twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))), 'label', array("label_attr" => array("class" => " control-label extra-label")));
        echo "
                    <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), ("caption" . twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group \">
                    ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "code", array()), 'label', array("label_attr" => array("class" => " control-label extra-label")));
        echo "
                    <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "code", array()), 'widget');
        echo "
                    </div>
                    <span class=\"span11 remote-video-help help-block sonata-ba-field-help\"></span>
                </div>

                <div class=\"control-group \">
                    ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "videoHosting", array()), 'label', array("label_attr" => array("class" => " control-label extra-label")));
        echo "
                    <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                        ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "videoHosting", array()), 'widget');
        echo "
                    </div>
                </div>
            </div>
            <div class=\"span5\">
                ";
        // line 37
        $context["curCode"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "code", array()), "vars", array()), "value", array())) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "code", array()), "vars", array()), "value", array())) : (""));
        // line 38
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["hostings"]) ? $context["hostings"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["hosting"]) {
            // line 39
            echo "                    ";
            $context["playerUri"] = strtr($this->getAttribute($context["hosting"], "playerUri", array()), array("http://" => "https://"));
            // line 40
            echo "                    <iframe class=\"hidden ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["hosting"], "name", array()), "html", null, true);
            echo " remote-video-container\" width=\"180\" height=\"110\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["playerUri"]) ? $context["playerUri"] : null), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["curCode"]) ? $context["curCode"] : null), "html", null, true);
            echo "\" frameborder=\"0\"></iframe>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hosting'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "            </div>
        </fieldset>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreDirectoryBundle:Admin/Form/Type:remote_video_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 42,  89 => 40,  86 => 39,  81 => 38,  79 => 37,  71 => 32,  66 => 30,  57 => 24,  52 => 22,  44 => 17,  39 => 15,  34 => 12,  31 => 11,  28 => 10,);
    }
}
