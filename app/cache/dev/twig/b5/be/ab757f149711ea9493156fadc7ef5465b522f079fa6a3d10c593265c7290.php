<?php

/* CoreDirectoryBundle:Form/Type:remote_video_widget.html.twig */
class __TwigTemplate_b5beab757f149711ea9493156fadc7ef5465b522f079fa6a3d10c593265c7290 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'remote_video_form_frontend_widget' => array($this, 'block_remote_video_form_frontend_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig"));
        // line 2
        $this->displayBlock('remote_video_form_frontend_widget', $context, $blocks);
    }

    public function block_remote_video_form_frontend_widget($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        ob_start();
        // line 4
        echo "        <fieldset class=\"remote-wrapper\">
            <div class=\"span4\">
                <div class=\"control-group\">
                    ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), ("caption" . (isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")))), 'label', array("label_attr" => array("class" => " control-label extra-label")));
        echo "
                    <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                        ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), ("caption" . (isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")))), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group \">
                    ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), 'label', array("label_attr" => array("class" => " control-label extra-label")));
        echo "
                    <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"control-group \">
                    ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "videoHosting", array()), 'label', array("label_attr" => array("class" => " control-label extra-label")));
        echo "
                    <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                        ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "videoHosting", array()), 'widget');
        echo "
                    </div>
                </div>

            </div>
            <div class=\"span4\">
                ";
        // line 29
        $context["curCode"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), "vars", array()), "value", array())) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), "vars", array()), "value", array())) : (""));
        // line 30
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "hostings", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["hosting"]) {
            // line 31
            echo "                    <iframe class=\"hidden ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["hosting"], "name", array()), "html", null, true);
            echo " remote-video-container\" width=\"560\" height=\"315\" src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["hosting"], "playerUri", array()), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["curCode"]) ? $context["curCode"] : $this->getContext($context, "curCode")), "html", null, true);
            echo "\" frameborder=\"0\"></iframe>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hosting'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "            </div>
        </fieldset>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreDirectoryBundle:Form/Type:remote_video_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 33,  83 => 31,  78 => 30,  76 => 29,  67 => 23,  62 => 21,  54 => 16,  49 => 14,  41 => 9,  36 => 7,  31 => 4,  28 => 3,  22 => 2,  20 => 1,);
    }
}
