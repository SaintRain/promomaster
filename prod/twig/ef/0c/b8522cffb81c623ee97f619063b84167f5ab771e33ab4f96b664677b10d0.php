<?php

/* ApplicationSonataAdminBundle:CRUD:list_top_in_new_window.html.twig */
class __TwigTemplate_ef0cb8522cffb81c623ee97f619063b84167f5ab771e33ab4f96b664677b10d0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:list_top.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'list_table' => array($this, 'block_list_table'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:list_top.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_list_table($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("list_table", $context, $blocks);
        echo "
    <script>
        //вешаем на форму генерирования обработку в новом окне
        \$(document).ready(function() {
            \$('input[name=\"all_elements\"]').parents('form').attr('target', '_blank');
        });

    </script>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:CRUD:list_top_in_new_window.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 3,  36 => 2,  11 => 1,);
    }
}
