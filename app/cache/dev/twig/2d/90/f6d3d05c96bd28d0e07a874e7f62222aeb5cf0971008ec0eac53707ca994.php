<?php

/* CoreTroubleTicketBundle::layout.html.twig */
class __TwigTemplate_2d90f6d3d05c96bd28d0e07a874e7f62222aeb5cf0971008ec0eac53707ca994 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

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
                'content' => array($this, 'block_content'),
                'content_header' => array($this, 'block_content_header'),
                'trouble_ticket_content' => array($this, 'block_trouble_ticket_content'),
                'js_head' => array($this, 'block_js_head'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "CoreCommonBundle::main_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div role=\"main\" class=\"cabinet_page";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()) == null)) {
            echo " guest";
        }
        echo "\" id=\"content\">
        ";
        // line 7
        $this->displayBlock('content_header', $context, $blocks);
        // line 12
        echo "        <!-- main content col -->
        <div class=\"";
        // line 13
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            echo "main_col ";
        } else {
            echo "page_pad";
        }
        echo "\">
            <div class=\"";
        // line 14
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            echo " main_col_pad ";
        } else {
            echo "main_guest_pad";
        }
        echo "\">
                ";
        // line 15
        $this->displayBlock('trouble_ticket_content', $context, $blocks);
        // line 16
        echo "            </div>
        </div>
        ";
        // line 18
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 19
            echo "
            ";
            // line 20
            $this->displayBlock("left_menu", $context, $blocks);
            echo "

            ";
            // line 75
            echo "        ";
        }
        // line 76
        echo "    </div>
";
    }

    // line 7
    public function block_content_header($context, array $blocks = array())
    {
        // line 8
        echo "        ";
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 9
            echo "            <h1>Личный кабинет</h1>
        ";
        }
        // line 11
        echo "        ";
    }

    // line 15
    public function block_trouble_ticket_content($context, array $blocks = array())
    {
    }

    // line 78
    public function block_js_head($context, array $blocks = array())
    {
        // line 79
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
         ";
        // line 80
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0505135_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0505135_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/troubleticket_frontend_frontend_1.js");
            // line 81
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "0505135"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0505135") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/troubleticket_frontend.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 82
        echo "    
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 82,  138 => 81,  134 => 80,  129 => 79,  126 => 78,  121 => 15,  117 => 11,  113 => 9,  110 => 8,  107 => 7,  102 => 76,  99 => 75,  94 => 20,  91 => 19,  89 => 18,  85 => 16,  83 => 15,  75 => 14,  67 => 13,  64 => 12,  62 => 7,  55 => 6,  52 => 5,  43 => 1,  22 => 3,  11 => 1,);
    }
}
