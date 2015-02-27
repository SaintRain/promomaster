<?php

/* CoreCommonBundle:Form:row.html.twig */
class __TwigTemplate_95ce66b768b3745cae567f11b220587551f0ac4f26c8f1dfd9cfe8b8af5834f3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_row' => array($this, 'block_form_row'),
            'captcha_widget' => array($this, 'block_captcha_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('form_row', $context, $blocks);
        // line 12
        echo "
";
        // line 13
        $this->displayBlock('captcha_widget', $context, $blocks);
    }

    // line 1
    public function block_form_row($context, array $blocks = array())
    {
        // line 2
        ob_start();
        // line 3
        echo "    <div class=\"form_row\">
        ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', array("label_attr" => array("class" => "form_label")));
        echo "
        <div class=\"form_field";
        // line 5
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors')) {
            echo " form_field_error";
        }
        echo "\">
            ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
            ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 13
    public function block_captcha_widget($context, array $blocks = array())
    {
        // line 14
        if ((isset($context["is_human"]) ? $context["is_human"] : $this->getContext($context, "is_human"))) {
            // line 15
            echo "-
";
        } else {
            // line 17
            ob_start();
            // line 18
            echo "<div class=\"captcha_wrapper\">
    <img id=\"";
            // line 19
            echo twig_escape_filter($this->env, (isset($context["image_id"]) ? $context["image_id"] : $this->getContext($context, "image_id")), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["captcha_code"]) ? $context["captcha_code"] : $this->getContext($context, "captcha_code")), "html", null, true);
            echo "\" alt=\"\" title=\"captcha\" width=\"";
            echo twig_escape_filter($this->env, (isset($context["captcha_width"]) ? $context["captcha_width"] : $this->getContext($context, "captcha_width")), "html", null, true);
            echo "\" height=\"";
            echo twig_escape_filter($this->env, (isset($context["captcha_height"]) ? $context["captcha_height"] : $this->getContext($context, "captcha_height")), "html", null, true);
            echo "\" class=\"form_kcaptcha_pic\" />
    ";
            // line 20
            if ((isset($context["reload"]) ? $context["reload"] : $this->getContext($context, "reload"))) {
                // line 21
                echo "    <a class=\"captcha_reload\" href=\"javascript:reload_";
                echo twig_escape_filter($this->env, (isset($context["image_id"]) ? $context["image_id"] : $this->getContext($context, "image_id")), "html", null, true);
                echo "();\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Renew", array(), "gregwar_captcha"), "html", null, true);
                echo "</a>
    <script type=\"text/javascript\">
        function reload_";
                // line 23
                echo twig_escape_filter($this->env, (isset($context["image_id"]) ? $context["image_id"] : $this->getContext($context, "image_id")), "html", null, true);
                echo "() {
            var img = document.getElementById('";
                // line 24
                echo twig_escape_filter($this->env, (isset($context["image_id"]) ? $context["image_id"] : $this->getContext($context, "image_id")), "html", null, true);
                echo "');
            img.src = '";
                // line 25
                echo twig_escape_filter($this->env, (isset($context["captcha_code"]) ? $context["captcha_code"] : $this->getContext($context, "captcha_code")), "html", null, true);
                echo "?n=' + (new Date()).getTime();
        }
    </script>
    ";
            }
            // line 29
            echo "</div>
    ";
            // line 30
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
            echo "
";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        }
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Form:row.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  113 => 30,  110 => 29,  103 => 25,  99 => 24,  95 => 23,  87 => 21,  85 => 20,  75 => 19,  72 => 18,  70 => 17,  66 => 15,  64 => 14,  61 => 13,  52 => 7,  48 => 6,  42 => 5,  38 => 4,  35 => 3,  33 => 2,  30 => 1,  26 => 13,  23 => 12,  21 => 1,);
    }
}
