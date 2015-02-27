<?php

/* CoreCommonBundle:Pages:error404.html.twig */
class __TwigTemplate_20796e119d97c470067dd0a8956b749bdbc6c7e2445a19e6d82a3cceb5612900 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout_simple.html.twig");

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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Ошибка 404. Страница не найдена";
    }

    // line 4
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Ошибка 404. Страница не найдена";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Ошибка 404. Страница не найдена";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    <div id=\"content\" class=\"error_page\" role=\"main\">
        <div class=\"page_pad\">

            <div class=\"error_page_info\">
                <h1 class=\"error_page_name\">4<span class=\"error_page_zero\">0</span>4</h1>
                <p class=\"error_page_desc\">Неправильно набран адрес, или такой страницы на сайте не существует (ошибка 404), попробуйте вернуться назад или воспользуйтесь ссылками ниже.</p>
            </div>

            <div class=\"error_page_things grid_container\">
                <div class=\"cats grid_item\">
                    <h2>Разделы сайта</h2>
                    <ul class=\"list_simple\">
                        ";
        // line 19
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:categoriesInDown"));
        echo "
                    </ul>
                </div>
                <div class=\"brands grid_item\">
                    <h2>Бренды</h2>
                    <ul class=\"list_simple\">
                        ";
        // line 25
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:brandsInDown"));
        echo "
                    </ul>
                    ";
        // line 30
        echo "                </div>

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
        return "CoreCommonBundle:Pages:error404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 35,  80 => 30,  75 => 25,  66 => 19,  52 => 7,  49 => 6,  43 => 5,  37 => 4,  31 => 3,);
    }
}
