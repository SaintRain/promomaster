<?php

/* GregwarCaptchaBundle::captcha.html.twig */
class __TwigTemplate_104ce10a4e8b5aaf1c71b3b1c12e50d50275a2e721575c3101f8440ed556d140 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'captcha_widget' => array($this, 'block_captcha_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('captcha_widget', $context, $blocks);
        // line 20
        echo "
";
    }

    // line 1
    public function block_captcha_widget($context, array $blocks = array())
    {
        // line 2
        if ((isset($context["is_human"]) ? $context["is_human"] : $this->getContext($context, "is_human"))) {
            // line 3
            echo "-
";
        } else {
            // line 5
            ob_start();
            // line 6
            echo "    <img id=\"";
            echo twig_escape_filter($this->env, (isset($context["image_id"]) ? $context["image_id"] : $this->getContext($context, "image_id")), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["captcha_code"]) ? $context["captcha_code"] : $this->getContext($context, "captcha_code")), "html", null, true);
            echo "\" alt=\"\" title=\"captcha\" width=\"";
            echo twig_escape_filter($this->env, (isset($context["captcha_width"]) ? $context["captcha_width"] : $this->getContext($context, "captcha_width")), "html", null, true);
            echo "\" height=\"";
            echo twig_escape_filter($this->env, (isset($context["captcha_height"]) ? $context["captcha_height"] : $this->getContext($context, "captcha_height")), "html", null, true);
            echo "\" />
    ";
            // line 7
            if ((isset($context["reload"]) ? $context["reload"] : $this->getContext($context, "reload"))) {
                // line 8
                echo "    <script type=\"text/javascript\">
        function reload_";
                // line 9
                echo twig_escape_filter($this->env, (isset($context["image_id"]) ? $context["image_id"] : $this->getContext($context, "image_id")), "html", null, true);
                echo "() {
            var img = document.getElementById('";
                // line 10
                echo twig_escape_filter($this->env, (isset($context["image_id"]) ? $context["image_id"] : $this->getContext($context, "image_id")), "html", null, true);
                echo "');
            img.src = '";
                // line 11
                echo twig_escape_filter($this->env, (isset($context["captcha_code"]) ? $context["captcha_code"] : $this->getContext($context, "captcha_code")), "html", null, true);
                echo "?n=' + (new Date()).getTime();
        }
    </script>
    <a class=\"captcha_reload\" href=\"javascript:reload_";
                // line 14
                echo twig_escape_filter($this->env, (isset($context["image_id"]) ? $context["image_id"] : $this->getContext($context, "image_id")), "html", null, true);
                echo "();\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Renew", array(), "gregwar_captcha"), "html", null, true);
                echo "</a>
    ";
            }
            // line 16
            echo "    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
            echo "
";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        }
    }

    public function getTemplateName()
    {
        return "GregwarCaptchaBundle::captcha.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  75 => 16,  68 => 14,  62 => 11,  58 => 10,  54 => 9,  51 => 8,  49 => 7,  38 => 6,  36 => 5,  32 => 3,  30 => 2,  27 => 1,  22 => 20,  20 => 1,);
    }
}
