<?php

/* CoreCommonBundle:Pages:error504.html.twig */
class __TwigTemplate_2e507ac116c0689f235f636447d181c20c65d8e1de7bb84b4586e52080f7561a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout_simple.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_description' => array($this, 'block_meta_description'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::main_layout_simple.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Ошибка 504";
    }

    // line 5
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Ошибка 504";
    }

    // line 6
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Ошибка 504";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "    <div id=\"content\" class=\"error_page\" role=\"main\">
        <div class=\"page_pad\">

            <div class=\"error_page_info\">
                <h1 class=\"error_page_name\">5<span class=\"error_page_zero\">0</span>4</h1>
                <p class=\"error_page_desc\">Пожалуйста, повторите запрос через некоторое время. Попробуйте вернуться назад или воспользуйтесь ссылками ниже.</p>
            </div>

            <div class=\"error_page_things grid_container\">
                <div class=\"cats grid_item\">
                    <h2>Разделы сайта</h2>
                    <ul class=\"list_simple\">
                        ";
        // line 21
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:categoriesInDown"));
        echo "
                    </ul>
                </div>
                <div class=\"brands grid_item\">
                    <h2>Бренды</h2>
                    <ul class=\"list_simple\">
                        ";
        // line 27
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:brandsInDown"));
        echo "
                    </ul>
                    <a href=\"\">Все бренды</a>
                </div>

                <!-- popular showcase -->
                <div class=\"popular_products grid_item\">
                    <h2>Популярные товары</h2>
                    ";
        // line 35
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:popularProductsInDown"));
        echo "
                </div>
            </div>

        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Pages:error504.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 35,  83 => 27,  74 => 21,  60 => 9,  57 => 8,  51 => 6,  45 => 5,  39 => 4,  11 => 1,);
    }
}
