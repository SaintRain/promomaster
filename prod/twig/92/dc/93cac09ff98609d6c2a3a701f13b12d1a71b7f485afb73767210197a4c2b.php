<?php

/* CoreProductBundle:Admin/Form:list.html.twig */
class __TwigTemplate_92dc93cac09ff98609d6c2a3a701f13b12d1a71b7f485afb73767210197a4c2b extends Twig_Template
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
            'actions' => array($this, 'block_actions'),
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

    // line 4
    public function block_actions($context, array $blocks = array())
    {
        // line 5
        echo "<div id=\"import-csv-format-description\" style=\"display:none;\">";
        echo $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "import-csv-format-description"), "method");
        echo "
    <div style=\"vertical-align:baseline;\" class=\"well well-small form-actions\"><a class=\"btn btn-danger import-csv-format-descriptionClose\" href=\"JavaScript:void(0);\">Закрыть</a></div>
</div>
    <div id=\"productParceDialogContent\" style=\"display:none\">
        <form id=\"productPriceFormUpload\" enctype=\"multipart/form-data\">
            <p>Допускается загрузка файлов в формате .csv</p>
            <a class=\"btn btn-large productProceUploadButton\" title=\"Загрузить\"><span class=\"icon-trash icon-upload\"></span> Загрузить файл</a>
            <input name=\"productPrice\" type=\"file\" accept=\".csv\" style=\"display: none\"/>
            <input type=\"button\" class=\"btn btn-primary\" style=\"display: none\" value=\"Загрузить\" />
            &nbsp;&nbsp;<a class=\"import-csv-format-description\" href=\"JavaScript:void(0);\">Описание формата CSV</a>
        </form>

        <div id=\"productPriceFormUploadProgress\" class=\"progress progress-info progress-file progress-striped active\" style=\"visibility: hidden;\">
            <div class=\"bar\" style=\"width: 0%;\">
                <span>0%</span>
            </div>
        </div>
        <div class=\"alert alert-success alert-dismissable\" id=\"productPriceFormUploadProgressOk\" style=\"display:none\"></div>
        <div class=\"alert alert-error alert-dismissable\" id=\"productPriceFormUploadProgressError\" style=\"display:none\"></div>

        <div style=\"vertical-align:baseline;\" class=\"well well-small form-actions\"><a class=\"btn btn-danger productParceDialogContentClose\" href=\"JavaScript:void(0);\">Закрыть</a></div>
    </div>

    <div id=\"ymlDialogContent\" style=\"display:none\">
            Будут сгерерированы файлы:<br/>
            <a href=\"http://";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["domain_ru"]) ? $context["domain_ru"] : null), "html", null, true);
        echo "/yml_wt.xml\">http://";
        echo twig_escape_filter($this->env, (isset($context["domain_ru"]) ? $context["domain_ru"] : null), "html", null, true);
        echo "/yml_wt.xml</a><br/>
            <a href=\"http://";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["domain_ru"]) ? $context["domain_ru"] : null), "html", null, true);
        echo "/yml_market.xml\">http://";
        echo twig_escape_filter($this->env, (isset($context["domain_ru"]) ? $context["domain_ru"] : null), "html", null, true);
        echo "/yml_market.xml</a>
        </p>

        <div id=\"ymlProgress\" class=\"progress progress-info progress-file progress-striped active\" style=\"visibility: hidden;\">
            <div class=\"bar\" style=\"width: 0%;\">
                <span>0%</span>
            </div>
        </div>

        <div class=\"alert alert-success alert-dismissable\" id=\"ymlProgressOk\" style=\"display:none\"></div>
        <div class=\"alert alert-error alert-dismissable\" id=\"ymlProgressError\" style=\"display:none\"></div>

        <div style=\"vertical-align:baseline;\" class=\"well well-small form-actions\"><input type=\"button\" class=\"btn btn-primary ymlGenerateButton\"  value=\"Сгенерировать YML-файл\" /> &nbsp;<a class=\"btn btn-danger ymlDialogContentClose\" href=\"JavaScript:void(0);\">Закрыть</a></div>
    </div>
    <script>
        var intervalProductParceId,
                intervalYmlGenerateId,
                core_product_yml_generator_start = '";
        // line 48
        echo $this->env->getExtension('routing')->getPath("core_product_yml_generator_start");
        echo "',
                core_product_yml_generator_check_status = '";
        // line 49
        echo $this->env->getExtension('routing')->getPath("core_product_yml_generator_check_status");
        echo "',
                core_product_upload_price_file = '";
        // line 50
        echo $this->env->getExtension('routing')->getPath("core_product_upload_price_file");
        echo "',
                core_product_upload_check_status = '";
        // line 51
        echo $this->env->getExtension('routing')->getPath("core_product_upload_check_status");
        echo "';

    </script>
    <script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreproduct/Admin/js/importPrice.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreproduct/Admin/js/ymlGenerate.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script>
     var product_dublicate_create=\"";
        // line 57
        echo $this->env->getExtension('routing')->getPath("product_dublicate_create");
        echo "\";
    </script>
    <script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreproduct/Admin/js/dublicate.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <div class=\"sonata-actions btn-group\">
        <span class=\"btn-group sonata-action-element\">
            <a style=\"margin-top:0px\" class=\"btn sonata-action-element ymlButton\" href=\"JavaScript:void(0);\"><i class=\"icon-download\"></i> Сген. YML <span style=\"line-height:0px;font-size: 12px;color: gray;\">";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('product_extension')->filemtimeFunction("yml_wt.xml"), "html", null, true);
        echo "</span></a>
            <a style=\"margin-top:0px\" class=\"btn sonata-action-element productPriceButton\" href=\"JavaScript:void(0);\"><i class=\"icon-download\"></i> Импорт прайсa</a>
        </span>
    </div>

    ";
        // line 67
        $this->displayParentBlock("actions", $context, $blocks);
        echo "
    
";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/Form:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 67,  134 => 62,  128 => 59,  123 => 57,  118 => 55,  114 => 54,  108 => 51,  104 => 50,  100 => 49,  96 => 48,  74 => 31,  68 => 30,  39 => 5,  36 => 4,  11 => 1,);
    }
}
