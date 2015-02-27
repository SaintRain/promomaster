<?php

/* CoreSiteBundle:AdPlace\Cabinet:list.html.twig */
class __TwigTemplate_38bc9b91b8a90dd18d9d55082ba9aeb84d7236ab9158fe9008f514b80f3b2256 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(2);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'sub_content' => array($this, 'block_sub_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataUserBundle::cabinet_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Ваши рекламные места";
    }

    // line 6
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 7
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 10
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 11
        echo "        <!--=== Breadcrumbs ===-->
        <div class=\"breadcrumbs\">
            <div class=\"container\">
                <h1 class=\"pull-left\">Рекламные места</h1>
                <ul class=\"pull-right breadcrumb\">
                    <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">На главную</a></li>
                    <li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
        echo "\">Кабинет</a></li>
                    <li class=\"active\">Список ваших рекламных мест</li>
                </ul>
            </div>
        </div>
        <!--=== End Breadcrumbs ===-->
    ";
    }

    // line 26
    public function block_sub_content($context, array $blocks = array())
    {
        // line 27
        echo "
    ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 29
            echo "        <br/>
        <div class=\"alert alert-success fade in\">
            ";
            // line 31
            echo $context["flashMessage"];
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "

    ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 37
            echo "        <br/>
        <div class=\"alert alert-danger fade in\">
            ";
            // line 39
            echo $context["flashMessage"];
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "

    ";
        // line 44
        if ($this->getAttribute((isset($context["adplaces"]) ? $context["adplaces"] : $this->getContext($context, "adplaces")), "getTotalItemCount", array())) {
            // line 45
            echo "        <h3>Список ваших рекламных мест</h3>
        <a style=\"margin-top: -30px\" href=\"";
            // line 46
            echo $this->env->getExtension('routing')->getPath("core_cabinet_adplace_create");
            echo "\" class=\"btn-u pull-right\"><i class=\"fa fa-plus-square\"></i> &nbsp;Добавить рекламное место</a>


        <table class=\"table table-striped\">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Сайт</th>
                <th>Размер</th>
                <th>В каталоге</th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 60
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["adplaces"]) ? $context["adplaces"] : $this->getContext($context, "adplaces")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["adplace"]) {
                // line 61
                echo "                <tr>
                    <td height=\"53px\">";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</td>
                    <td><a href=\"";
                // line 63
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_adplace_edit", array("id" => $this->getAttribute($context["adplace"], "id", array()))), "html", null, true);
                echo "\"><b>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["adplace"], "name", array()), "html", null, true);
                echo "</b></a></td>
                    <td>
                        <a href=\"";
                // line 65
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_site_edit", array("id" => $this->getAttribute($this->getAttribute($context["adplace"], "site", array()), "id", array()))), "html", null, true);
                echo "\"><b>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["adplace"], "site", array()), "domain", array()), "html", null, true);
                echo "</b></a>
                    </td>
                    <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($context["adplace"], "height", array()), "html", null, true);
                echo "x";
                echo twig_escape_filter($this->env, $this->getAttribute($context["adplace"], "width", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 68
                if ($this->getAttribute($context["adplace"], "isShowInCatalog", array())) {
                    echo "<span class=\"label label-u\">Да</span>";
                } else {
                    echo "<span class=\"label label-warning\">Нет</span>";
                }
                echo "</td>
                </tr>
            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['adplace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "            </tbody>
        </table>

        ";
            // line 74
            $context["routeFirsPage"] = "core_cabinet_adplace_list_first_page";
            // line 75
            echo "        ";
            $context["routePage"] = "core_cabinet_adplace_list";
            // line 76
            echo "
        ";
            // line 77
            echo $this->env->getExtension('knp_pagination')->render((isset($context["adplaces"]) ? $context["adplaces"] : $this->getContext($context, "adplaces")), "CoreSiteBundle:AdPlace/Cabinet:pagination.html.twig", array(), array("routeFirsPage" => (isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : $this->getContext($context, "routeFirsPage")), "routePage" => (isset($context["routePage"]) ? $context["routePage"] : $this->getContext($context, "routePage"))));
            // line 78
            echo "

    ";
        } else {
            // line 81
            echo "        <h2>Вы еще не добавляли свои рекламные места в систему</h2>
    ";
        }
        // line 83
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreSiteBundle:AdPlace\\Cabinet:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 83,  236 => 81,  231 => 78,  229 => 77,  226 => 76,  223 => 75,  221 => 74,  216 => 71,  195 => 68,  189 => 67,  182 => 65,  175 => 63,  171 => 62,  168 => 61,  151 => 60,  134 => 46,  131 => 45,  129 => 44,  125 => 42,  116 => 39,  112 => 37,  108 => 36,  104 => 34,  95 => 31,  91 => 29,  87 => 28,  84 => 27,  81 => 26,  70 => 17,  66 => 16,  59 => 11,  56 => 10,  51 => 7,  46 => 6,  40 => 5,  11 => 2,);
    }
}
