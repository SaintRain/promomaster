<?php

/* CoreReviewBundle:Review/Form:remoteVideo_widget.html.twig */
class __TwigTemplate_e274ad0fc0bf58b25e42f2f958c26ef577a252ec925b220f86afa450fe5bbf56 extends Twig_Template
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
        // line 7
        echo "
";
        // line 8
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig"));
        // line 9
        $this->displayBlock('remote_video_form_frontend_widget', $context, $blocks);
    }

    public function block_remote_video_form_frontend_widget($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        <li>
            <div class=\"video-control-container\">
                <div class=\"video-control-group\">
                    ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), ("caption" . (isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")))), 'label', array("label_attr" => array("class" => " control-label extra-label")));
        echo "
                    <div class=\"controls video-caption\">
                        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), ("caption" . (isset($context["prefix"]) ? $context["prefix"] : $this->getContext($context, "prefix")))), 'widget', array("attr" => array("class" => "text_input")));
        echo "
                    </div>
                </div>

                <div class=\"video-control-group\">
                    ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), 'label', array("label_attr" => array("class" => " control-label extra-label")));
        echo "
                    <div class=\"controls video-code\">
                        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), 'widget', array("attr" => array("class" => "text_input")));
        echo "
                    </div>
                </div>

                <div class=\"video-control-group\">
                    ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "videoHosting", array()), 'label', array("label_attr" => array("class" => " control-label extra-label")));
        echo "
                    <div class=\"controls video-hosting\">
                        ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "videoHosting", array()), 'widget', array("attr" => array("class" => "text_input")));
        echo "
                    </div>
                </div>
            </div>
            <div class=\"videoPreview\">
                ";
        // line 36
        $context["curCode"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), "vars", array()), "value", array())) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "code", array()), "vars", array()), "value", array())) : (""));
        // line 37
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "hostings", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["hosting"]) {
            // line 38
            echo "                    <iframe class=\"hidden ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["hosting"], "name", array()), "html", null, true);
            echo " remote-video-container\" width=\"270\" height=\"155\"
                            src=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($context["hosting"], "playerUri", array()), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["curCode"]) ? $context["curCode"] : $this->getContext($context, "curCode")), "html", null, true);
            echo "\" frameborder=\"0\"></iframe>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hosting'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            </div>

            <span class=\"video-remove\">X</span>

            <div class=\"clearfix\"></div>
        </li>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Review/Form:remoteVideo_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 41,  91 => 39,  86 => 38,  81 => 37,  79 => 36,  71 => 31,  66 => 29,  58 => 24,  53 => 22,  45 => 17,  40 => 15,  34 => 11,  31 => 10,  25 => 9,  23 => 8,  20 => 7,);
    }
}
