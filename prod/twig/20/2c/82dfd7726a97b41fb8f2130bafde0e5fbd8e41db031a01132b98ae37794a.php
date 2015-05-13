<?php

/* CoreOrderBundle:Admin/Form/PreOrder:edit.html.twig */
class __TwigTemplate_202c82dfd7726a97b41fb8f2130bafde0e5fbd8e41db031a01132b98ae37794a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'form' => array($this, 'block_form'),
            'formactions_buttons' => array($this, 'block_formactions_buttons'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:base_edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_form($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("form", $context, $blocks);
        echo "
    ";
        // line 5
        echo "    <div id=\"cancel-predefined-create-modal\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\"
         aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-header\">
            <button aria-hidden=\"true\" data-dismiss=\"modal\" class=\"close\" type=\"button\">×</button>
            <h3>Сохранить ответ</h3>
        </div>
        <form id=\"article-create\" class=\"form-horizontal\" method=\"POST\"
              action=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("admin_core_faq_article_ajaxCreate");
        echo "\">
            <div class=\"modal-body\">
                <div class=\"sonata-ba-collapsed-fields\">
                    <div class=\"control-group\">
                        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["articleForm"]) ? $context["articleForm"] : null), "captionRu", array()), 'label');
        echo "
                        <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                            ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["articleForm"]) ? $context["articleForm"] : null), "captionRu", array()), 'widget');
        echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["articleForm"]) ? $context["articleForm"] : null), "slug", array()), 'label');
        echo "
                        <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                            ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["articleForm"]) ? $context["articleForm"] : null), "slug", array()), 'widget');
        echo "
                            <div>
                                <span class=\"help-block sonata-ba-field-help span12\">
                                    Если оставить пустым, то будет сгенерировано автоматически
                                    <b>ВАЖНО!!! Используется программистом</b>
                                    <span class=\"help-block-shadow\"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class=\"control-group\">
                        ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["articleForm"]) ? $context["articleForm"] : null), "bodyRu", array()), 'label');
        echo "
                        <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural\">
                            ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["articleForm"]) ? $context["articleForm"] : null), "bodyRu", array()), 'widget');
        echo "
                            ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["articleForm"]) ? $context["articleForm"] : null), 'rest');
        echo "
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <a data-dismiss=\"modal\" class=\"btn\" href=\"#\">Закрыть</a>
                <button name=\"save\" class=\"btn btn-primary\" href=\"#\">Сохранить изменения</button>
            </div>
        </form>
    </div>
    ";
        // line 50
        echo "    ";
        // line 51
        echo "    <div id=\"preview-cancel-msg-modal\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\"
         aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-header\">
            <button aria-hidden=\"true\" data-dismiss=\"modal\" class=\"close\" type=\"button\">×</button>
            <h3>Письмо клиенту</h3>
        </div>
        <div class=\"modal-body\"></div>
        <div class=\"modal-footer\">
            <a data-dismiss=\"modal\" class=\"btn\" href=\"#\">Закрыть</a>
        </div>
    </div>
    ";
    }

    // line 64
    public function block_formactions_buttons($context, array $blocks = array())
    {
        // line 65
        echo "    ";
        $this->displayParentBlock("formactions_buttons", $context, $blocks);
        echo "
    ";
        // line 66
        if (((isset($context["onCreateOrderError"]) ? $context["onCreateOrderError"] : null) || ( !$this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()) || ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "name", array()) != "canceled")))) {
            // line 67
            echo "        ";
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "order", array())) {
                // line 68
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "order", array()), "id", array()))), "html", null, true);
                echo "\" class=\"btn btn-success\">Посмотреть
                заказ</a>
        ";
            } else {
                // line 71
                echo "
            ";
                // line 72
                if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array()), "id", array())) {
                    // line 73
                    echo "                <script>
                adminRoutes['admin_core_order_preorder_preorder_edit'] = \"";
                    // line 74
                    echo $this->env->getExtension('routing')->getPath("admin_core_order_preorder_preorder_edit", array("id" => "__s"));
                    echo "\";
                adminRoutes['core_pre_order_combine'] = \"";
                    // line 75
                    echo $this->env->getExtension('routing')->getPath("core_pre_order_combine");
                    echo "\";
                adminRoutes['core_pre_order_get'] = \"";
                    // line 76
                    echo $this->env->getExtension('routing')->getPath("core_pre_order_get");
                    echo "\";

                    var currencyFormat=\"";
                    // line 78
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    echo "\",
                        currentObjectId= \"";
                    // line 79
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "subject", array()), "id", array()), "html", null, true);
                    echo "\",
                        uniqid=\"";
                    // line 80
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "uniqid", array()), "html", null, true);
                    echo "\";
                </script>

                <script src=\"";
                    // line 83
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreorder/Admin/js/preorderCombine.js"), "html", null, true);
                    echo "\" type=\"text/javascript\"></script>
                <div style=\"display:none\" id=\"selectPreOrderContent\"></div>
                <a href=\"javascript:void(0);\" class=\"btn btn-success selectPreOrder\">Объединить</a>
            ";
                }
                // line 87
                echo "
            <button type=\"submit\" name=\"btn_create_order\" class=\"btn btn-warning persist-preview\">
                <i class=\"icon-edit\"></i>
                Создать заказ
            </button>
        ";
            }
            // line 93
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/PreOrder:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 93,  194 => 87,  187 => 83,  181 => 80,  177 => 79,  173 => 78,  168 => 76,  164 => 75,  160 => 74,  157 => 73,  155 => 72,  152 => 71,  145 => 68,  142 => 67,  140 => 66,  135 => 65,  132 => 64,  117 => 51,  115 => 50,  101 => 38,  97 => 37,  92 => 35,  78 => 24,  73 => 22,  66 => 18,  61 => 16,  54 => 12,  45 => 5,  40 => 3,  37 => 2,  11 => 1,);
    }
}
