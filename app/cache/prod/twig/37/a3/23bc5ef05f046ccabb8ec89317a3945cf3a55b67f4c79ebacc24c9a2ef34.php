<?php

/* CoreOrderBundle:Admin/Form/Order/type:waybills_in_order_widget.html.twig */
class __TwigTemplate_37a323bc5ef05f046ccabb8ec89317a3945cf3a55b67f4c79ebacc24c9a2ef34 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'collection_widget_row' => array($this, 'block_collection_widget_row'),
            'waybills_in_order_widget' => array($this, 'block_waybills_in_order_widget'),
            '__internal_0539bf48068310664aeaa5ca7579a5c656a35db832fff681a1d7f67fbe5c57db' => array($this, 'block___internal_0539bf48068310664aeaa5ca7579a5c656a35db832fff681a1d7f67fbe5c57db'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('collection_widget_row', $context, $blocks);
        // line 6
        echo "
";
        // line 7
        $this->displayBlock('waybills_in_order_widget', $context, $blocks);
    }

    // line 1
    public function block_collection_widget_row($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        ob_start();
        // line 3
        echo "        ";
        $this->env->loadTemplate("CoreOrderBundle:Admin/Form/Blocks:collection_widget.html.twig")->display(array_merge($context, array("form" => (isset($context["child"]) ? $context["child"] : null))));
        // line 4
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 7
    public function block_waybills_in_order_widget($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 9
            echo "        ";
            $this->env->getExtension('form')->renderer->setTheme($context["child"], array(0 => $this));
            // line 10
            echo "        ";
            if ($this->getAttribute($this->getAttribute($context["child"], "vars", array(), "any", false, true), "prototype", array(), "any", true, true)) {
                // line 11
                echo "        ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'label');
                echo "
        <div class=\"controls sonata-ba-field sonata-ba-field-standard-natural  \">
            <ul class=\"collection-modify control-group\" id=\"";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "id", array()), "html", null, true);
                echo "\" data-prototype=\"";
                echo twig_escape_filter($this->env, (string) $this->renderBlock("__internal_0539bf48068310664aeaa5ca7579a5c656a35db832fff681a1d7f67fbe5c57db", $context, $blocks));
                echo "\">
                ";
                // line 14
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($context["child"]);
                $context['_iterated'] = false;
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["nested"]) {
                    // line 15
                    echo "                    ";
                    $this->env->loadTemplate("CoreOrderBundle:Admin/Form/Blocks:collection_widget.html.twig")->display(array_merge($context, array("form" => $context["nested"], "allow_delete" => $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "allow_delete", array()), "first" => $this->getAttribute($context["loop"], "first", array()), "allow_add" => $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "allow_add", array()), "id" => $this->getAttribute($context["loop"], "index", array()))));
                    // line 16
                    echo "                    ";
                    $this->getAttribute($context["nested"], "setRendered", array(), "method");
                    // line 17
                    echo "                    ";
                    $context['_iterated'] = true;
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                if (!$context['_iterated']) {
                    // line 18
                    echo "                        <li class=\"first-add\"><a class=\"btn collection-modify-add\" href=\"javascript:void(0);\">Добавить упаковку</a></li>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nested'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 20
                echo "            </ul>
            ";
                // line 21
                if (twig_length_filter($this->env, $context["child"])) {
                    // line 22
                    echo "                <div class=\"control-group\">
                    ";
                    // line 23
                    if ((($this->getAttribute((isset($context["waybill"]) ? $context["waybill"] : null), "isAutoGenerated", array()) == 1) && twig_length_filter($this->env, $this->getAttribute((isset($context["waybill"]) ? $context["waybill"] : null), "number", array())))) {
                        // line 24
                        echo "                        <a target=\"_blank\" href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_delivery_service_printWaybill", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "sellerId" => $this->getAttribute($this->getAttribute((isset($context["waybill"]) ? $context["waybill"] : null), "salesMan", array()), "id", array()), "deliveryMethodId" => $this->getAttribute($this->getAttribute((isset($context["waybill"]) ? $context["waybill"] : null), "deliveryMode", array()), "id", array()), "waybillId" => $this->getAttribute((isset($context["waybill"]) ? $context["waybill"] : null), "number", array()))), "html", null, true);
                        echo "\" class=\"btn print-waybill btn-info\">Распечатать накладную</a>
                        ";
                    } else {
                        // line 26
                        echo "                            <a href=\"javascript:void(0);\" class=\"btn generate-waybill\">Сгенерировать накладную</a>
                    ";
                    }
                    // line 28
                    echo "                </div>
                <div class=\"modal waybill-modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                    <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
                    <h3 id=\"myModalLabel\">Генерация накладной</h3>
                    </div>
                    <div class=\"modal-body\">
                    </div>
                    <div class=\"modal-footer\">
                        <a href=\"javascript:void(0);\" class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Оменить генерацию</a>
                        <a href=\"javascript:void(0);\" class=\"btn btn-primary waybill-submit-form\">Сгенирировать</a>
                    </div>
                </div>
            ";
                }
                // line 42
                echo "        </div>
        ";
            } else {
                // line 44
                echo "            ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'row');
                echo "
        ";
            }
            // line 46
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 13
    public function block___internal_0539bf48068310664aeaa5ca7579a5c656a35db832fff681a1d7f67fbe5c57db($context, array $blocks = array())
    {
        $this->env->loadTemplate("CoreOrderBundle:Admin/Form/Blocks:collection_widget.html.twig")->display(array_merge($context, array("form" => $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "vars", array()), "prototype", array()), "allow_delete" => $this->getAttribute($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "vars", array()), "allow_delete", array()), "id" => $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index", array()))));
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order/type:waybills_in_order_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  190 => 13,  174 => 46,  168 => 44,  164 => 42,  148 => 28,  144 => 26,  138 => 24,  136 => 23,  133 => 22,  131 => 21,  128 => 20,  121 => 18,  108 => 17,  105 => 16,  102 => 15,  84 => 14,  78 => 13,  72 => 11,  69 => 10,  66 => 9,  48 => 8,  45 => 7,  40 => 4,  37 => 3,  34 => 2,  31 => 1,  27 => 7,  24 => 6,  22 => 1,);
    }
}
