<?php

/* CoreSiteBundle:Section\Cabinet:list.html.twig */
class __TwigTemplate_e6025e2c7928a2c4039640cf6e4291494d94057bf1305eebd43b4474866d91e2 extends Twig_Template
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
        echo "Разделы для отображения рекламных мест";
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
                <h1 class=\"pull-left\">Разделы рекламных мест</h1>
                <ul class=\"pull-right breadcrumb\">
                    <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">На главную</a></li>
                    <li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
        echo "\">Кабинет</a></li>
                    <li class=\"active\">Список разделов для отображения рекламных мест</li>
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

    <div class=\"tab-v2\">
        <ul class=\"nav nav-tabs\">
            <li class=\"\"><a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("core_cabinet_adplace_list_first_page");
        echo "\" >Рекламное
                    место</a></li>
            <li class=\"active\"><a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("core_cabinet_section_list_first_page");
        echo "\"
                                  data-toggle=\"tab\">Разделы</a></li>
        </ul>
        <div class=\"tab-content\">
            <div class=\"tab-pane fade active in\" id=\"tab1\">


                ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 41
            echo "                    <br/>
                    <div class=\"alert alert-success fade in\">
                        ";
            // line 43
            echo $context["flashMessage"];
            echo "
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "

                ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "edit_errors"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 49
            echo "                    <br/>
                    <div class=\"alert alert-danger fade in\">
                        ";
            // line 51
            echo $context["flashMessage"];
            echo "
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "

                ";
        // line 56
        if ($this->getAttribute((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")), "getTotalItemCount", array())) {
            // line 57
            echo "                    <h3>Список разделов для отображения рекламных мест</h3>
                    <a style=\"margin-top: -30px\" href=\"";
            // line 58
            echo $this->env->getExtension('routing')->getPath("core_cabinet_section_create");
            echo "\"
                       class=\"btn-u pull-right\"><i class=\"fa fa-plus-square\"></i> &nbsp;Добавить раздел</a>

                    <table class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Шаблон</th>
                            <th>Весь сайт</th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
            // line 71
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
                // line 72
                echo "                            <tr>
                                <td height=\"53px\">";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</td>
                                <td>
                                    <a href=\"";
                // line 75
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_cabinet_section_edit", array("id" => $this->getAttribute($context["section"], "id", array()))), "html", null, true);
                echo "\"><b>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["section"], "name", array()), "html", null, true);
                echo "</b></a>
                                </td>
                                <td>
                                    ";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute($context["section"], "urlTemplate", array()), "html", null, true);
                echo "
                                </td>
                                <td>
                                    ";
                // line 81
                if ($this->getAttribute($context["section"], "isAllPage", array())) {
                    echo "<span class=\"label label-u\">Да</span>";
                } else {
                    echo "<span
                                            class=\"label label-warning\">Нет</span>";
                }
                // line 83
                echo "
                                </td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "                        </tbody>
                    </table>

                    ";
            // line 90
            $context["routeFirsPage"] = "core_cabinet_section_list_first_page";
            // line 91
            echo "                    ";
            $context["routePage"] = "core_cabinet_section_list";
            // line 92
            echo "
                    ";
            // line 93
            echo $this->env->getExtension('knp_pagination')->render((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")), "CoreSiteBundle:Section/Cabinet:pagination.html.twig", array(), array("routeFirsPage" => (isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : $this->getContext($context, "routeFirsPage")), "routePage" => (isset($context["routePage"]) ? $context["routePage"] : $this->getContext($context, "routePage"))));
            // line 94
            echo "

                ";
        } else {
            // line 97
            echo "                    <h2>Вы еще не добавляли разделы для рекламных мест в систему</h2>
                ";
        }
        // line 99
        echo "
            </div>

        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "CoreSiteBundle:Section\\Cabinet:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 99,  251 => 97,  246 => 94,  244 => 93,  241 => 92,  238 => 91,  236 => 90,  231 => 87,  214 => 83,  207 => 81,  201 => 78,  193 => 75,  188 => 73,  185 => 72,  168 => 71,  152 => 58,  149 => 57,  147 => 56,  143 => 54,  134 => 51,  130 => 49,  126 => 48,  122 => 46,  113 => 43,  109 => 41,  105 => 40,  95 => 33,  90 => 31,  84 => 27,  81 => 26,  70 => 17,  66 => 16,  59 => 11,  56 => 10,  51 => 7,  46 => 6,  40 => 5,  11 => 2,);
    }
}
