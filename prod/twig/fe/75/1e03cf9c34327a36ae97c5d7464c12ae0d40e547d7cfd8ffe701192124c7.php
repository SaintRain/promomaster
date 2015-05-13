<?php

/* CoreSiteBundle:Site/Cabinet:list.html.twig */
class __TwigTemplate_fe751e03cf9c34327a36ae97c5d7464c12ae0d40e547d7cfd8ffe701192124c7 extends Twig_Template
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
        echo "Ваши сайты";
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
                <h1 class=\"pull-left\">Сайты</h1>
                <ul class=\"pull-right breadcrumb\">
                    <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">На главную</a></li>
                    <li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
        echo "\">Кабинет</a></li>
                    <li class=\"active\">Список ваших сайтов</li>
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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
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
        if ($this->getAttribute((isset($context["sites"]) ? $context["sites"] : null), "getTotalItemCount", array())) {
            // line 45
            echo "        <h3>Список ваших сайтов</h3>
        <a style=\"margin-top: -30px\" href=\"";
            // line 46
            echo $this->env->getExtension('routing')->getPath("core_cabinet_site_create");
            echo "\" class=\"btn-u pull-right\"><i class=\"fa fa-plus-square\"></i> &nbsp;Добавить сайт</a>


        <table class=\"table table-striped\">
            <thead>
            <tr>
                <th>#</th>
                <th>Домен</th>
                <th>Тематика</th>
                <th>Добавлен</th>
                <th>Статистика</th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 60
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sites"]) ? $context["sites"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["site"]) {
                // line 61
                echo "                <tr>
                    <td height=\"53px\">";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</td>
                    <td><a href=\"";
                // line 63
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_site_edit", array("id" => $this->getAttribute($context["site"], "id", array()))), "html", null, true);
                echo "\"><b>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["site"], "domain", array()), "html", null, true);
                echo "</b></a></td>
                    <td>
                        ";
                // line 65
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["site"], "categories", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 66
                    echo "                            <li>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "captionRu", array()), "html", null, true);
                    echo "</li>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 68
                echo "                    </td>
                    <td>";
                // line 69
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["site"], "createdDateTime", array()), "d-m-Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
                echo "</td>
                    <td></td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['site'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 73
            echo "            </tbody>
        </table>

        ";
            // line 76
            $context["routeFirsPage"] = "core_cabinet_site_list_first_page";
            // line 77
            echo "        ";
            $context["routePage"] = "core_cabinet_site_list";
            // line 78
            echo "
        ";
            // line 79
            echo $this->env->getExtension('knp_pagination')->render((isset($context["sites"]) ? $context["sites"] : null), "CoreSiteBundle:Site/Cabinet:pagination.html.twig", array(), array("routeFirsPage" =>             // line 80
(isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : null), "routePage" => (isset($context["routePage"]) ? $context["routePage"] : null)));
            echo "

    ";
        } else {
            // line 83
            echo "        <h2>Вы еще не добавляли свои сайты в систему</h2>
    ";
        }
        // line 85
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreSiteBundle:Site/Cabinet:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 85,  236 => 83,  230 => 80,  229 => 79,  226 => 78,  223 => 77,  221 => 76,  216 => 73,  198 => 69,  195 => 68,  186 => 66,  182 => 65,  175 => 63,  171 => 62,  168 => 61,  151 => 60,  134 => 46,  131 => 45,  129 => 44,  125 => 42,  116 => 39,  112 => 37,  108 => 36,  104 => 34,  95 => 31,  91 => 29,  87 => 28,  84 => 27,  81 => 26,  70 => 17,  66 => 16,  59 => 11,  56 => 10,  51 => 7,  46 => 6,  40 => 5,  11 => 2,);
    }
}
