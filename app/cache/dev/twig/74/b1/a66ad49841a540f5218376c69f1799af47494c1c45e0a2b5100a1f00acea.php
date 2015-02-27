<?php

/* ApplicationSonataUserBundle::cabinet_layout.html.twig */
class __TwigTemplate_74b1a66ad49841a540f5218376c69f1799af47494c1c45e0a2b5100a1f00acea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout2.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(2);

            throw $e;
        }

        $_trait_0 = $this->env->loadTemplate("ApplicationSonataUserBundle:Profile:left_menu.html.twig");
        // line 3
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."ApplicationSonataUserBundle:Profile:left_menu.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'css' => array($this, 'block_css'),
                'content' => array($this, 'block_content'),
                'breadcrumbs' => array($this, 'block_breadcrumbs'),
                'sub_content' => array($this, 'block_sub_content'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return "CoreCommonBundle::main_layout2.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_css($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayParentBlock("css", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"/assets/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css\">
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "
    ";
        // line 12
        $this->displayBlock('breadcrumbs', $context, $blocks);
        // line 14
        echo "
    <div class=\"profile container content\">
        <div class=\"row\">
            <!--Left Sidebar-->
            <div class=\"col-md-3 md-margin-bottom-40\">
                ";
        // line 19
        $this->displayBlock("left_menu", $context, $blocks);
        echo "
            </div>
            <!--End Left Sidebar-->

            <div class=\"col-md-9\">
                <!--Profile Body-->
                ";
        // line 25
        $this->displayBlock('sub_content', $context, $blocks);
        // line 27
        echo "                <!--End Profile Body-->
            </div>
        </div>
        <!--/end row-->
    </div>

";
    }

    // line 12
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 13
        echo "    ";
    }

    // line 25
    public function block_sub_content($context, array $blocks = array())
    {
        // line 26
        echo "                ";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle::cabinet_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 26,  106 => 25,  102 => 13,  99 => 12,  89 => 27,  87 => 25,  78 => 19,  71 => 14,  69 => 12,  66 => 11,  63 => 10,  55 => 6,  52 => 5,  43 => 2,  22 => 3,  11 => 2,);
    }
}
