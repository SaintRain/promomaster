<?php

/* ApplicationSonataAdminBundle:Admin/Form:admin_date_range.html.twig */
class __TwigTemplate_6a000489a856574b66d63ac0be9b1dfa9a6044ea6eaf494f13fb70c1278fe036 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'admin_date_range_widget' => array($this, 'block_admin_date_range_widget'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_admin_date_range_widget($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        ob_start();
        // line 4
        echo "        <div class=\"label-inline date-range-wrapper\">
            ";
        // line 5
        $context["selector"] = array();
        // line 6
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
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
            // line 7
            echo "                    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'label');
            echo "
                    ";
            // line 8
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget', array("attr" => array("class" => " span4 datepicker-with-range")));
            echo "

                    ";
            // line 10
            $context["selector"] = twig_array_merge((isset($context["selector"]) ? $context["selector"] : null), array($this->getAttribute($context["loop"], "index0", array()) => ("#" . $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "id", array()))));
            // line 11
            echo "                        ";
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
        // line 12
        echo "                            ";
        $context["selector"] = twig_join_filter((isset($context["selector"]) ? $context["selector"] : null), ", ");
        // line 13
        echo "                                ";
        if ($this->getAttribute((isset($context["widgetConfig"]) ? $context["widgetConfig"] : null), "ranges", array())) {
            // line 14
            echo "                                    <div class=\"dropdown\" style=\"float:right\">
                                        <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-hover=\"dropdown\" data-toggle=\"dropdown\">
                                            <span class=\"caret\"></span>
                                        </button>
                                        <ul class=\"dropdown-menu\" role=\"menu\" style=\"right: 0; left: auto;\" aria-labelledby=\"dropdownMenu1\">

                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 21
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "\" href=\"javascript:void(0);\">Сегодня</a>
                                            </li>
                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 24
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["oneDay"]) ? $context["oneDay"] : null), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "\" data-to=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["oneDay"]) ? $context["oneDay"] : null), "d.m.Y"), "html", null, true);
            echo "\" href=\"javascript:void(0);\">Вчера</a>
                                            </li>
                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 27
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["twoDays"]) ? $context["twoDays"] : null), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "\" data-to=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["twoDays"]) ? $context["twoDays"] : null), "d.m.Y"), "html", null, true);
            echo "\" href=\"javascript:void(0);\">Позавчера</a>
                                            </li>
                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 30
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["sevenDays"]) ? $context["sevenDays"] : null), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "\" href=\"javascript:void(0);\">7 дн.</a>
                                            </li>
                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 33
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["firstDayOfWeek"]) ? $context["firstDayOfWeek"] : null), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "\" data-to=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["middleDayOfWeek"]) ? $context["middleDayOfWeek"] : null), "d.m.Y"), "html", null, true);
            echo "\" href=\"javascript:void(0);\">Нач. недели</a>
                                            </li>
                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 36
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["firstDayOfMonth"]) ? $context["firstDayOfMonth"] : null), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "\" data-to=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["middleDayOfMonth"]) ? $context["middleDayOfMonth"] : null), "d.m.Y"), "html", null, true);
            echo "\" href=\"javascript:void(0);\">Нач. месяца</a>
                                            </li>

                                        </ul>
                                    </div>
                                ";
        }
        // line 42
        echo "                            </div>
                            ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 44
        echo "                                <script type=\"text/javascript\">
                                    // обработчик datepicker
                                    (function(\$) {
                                        \$(function() {
                                            \$('.date-range').click(function() {
                                                var \$this = \$(this),
                                                        parentBlock = \$(this).parents('div.date-range-wrapper'),
                                                        dateFromField = \$('input[name*=\"from\"]', parentBlock),
                                                        dateToField = \$('input[name*=\"to\"]', parentBlock),
                                                        dateFrom = \$this.attr('data-from'),
                                                        dateTo = \$this.attr('data-to'),
                                                        minDateTo;
                                                'input[name=\"filter[updatedDateTime][value][from]\"]'
                                                dateFromField.val(dateFrom);
                                                dateToField.val(dateTo);
                                                minDateTo = dateFrom.split('.').reverse();
                                                minDateTo = new Date(minDateTo.join('/'));
                                                dates.filter(dateToField).datepicker(\"option\", 'minDate', minDateTo);
                                                \$('.dropdown.open .dropdown-toggle').dropdown('toggle');
                                            });
                                            var dates = \$('";
        // line 64
        echo (isset($context["selector"]) ? $context["selector"] : null);
        echo "').datepicker({                            ";
        if (($this->getAttribute((isset($context["widgetConfig"]) ? $context["widgetConfig"] : null), "start", array()) == false)) {
            // line 65
            echo "                                minDate: new Date(2008, 11, 1),                                                            ";
        } else {
            // line 66
            echo "                                                                            minDate: new Date(";
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["widgetConfig"]) ? $context["widgetConfig"] : null), "start", array()) * 1000), "html", null, true);
            echo "),                            ";
        }
        // line 67
        echo "                                    ";
        if ($this->getAttribute((isset($context["widgetConfig"]) ? $context["widgetConfig"] : null), "end", array())) {
            // line 68
            echo "                                                    maxDate: \"+0D\",                                                        ";
        }
        // line 69
        echo "                                                                                                dateFormat: \"dd.mm.yy\",
                                                                                                changeMonth: true,
                                                                                                changeYear: true,
                                                                                                onClose: function(selectedDate)
                                                                                                {
                                                                                                    var \$this = \$(this),
                                                                                                            instance = \$this.data(\"datepicker\"),
                                                                                                            dateToField = \$this.parents('.date-range-wrapper').find('input[name*=\"to\"]'),
                                                                                                            date = \$.datepicker.parseDate(
                                                                                                                    instance.settings.dateFormat ||
                                                                                                                    \$.datepicker._defaults.dateFormat,
                                                                                                                    selectedDate, instance.settings);
                                                                                                    if (\$this.is('input[name*=\"from\"]'))
                                                                                                    {
                                                                                                        dates.filter(dateToField).datepicker(\"option\", 'minDate', date);
                                                                                                    }
                                                                                                }
                                                                                            });
                                                                                        });
                                                                                    })(jQuery)
                                </script>
                                ";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin/Form:admin_date_range.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 69,  194 => 68,  191 => 67,  186 => 66,  183 => 65,  179 => 64,  157 => 44,  153 => 42,  142 => 36,  134 => 33,  128 => 30,  120 => 27,  112 => 24,  106 => 21,  97 => 14,  94 => 13,  91 => 12,  77 => 11,  75 => 10,  70 => 8,  65 => 7,  47 => 6,  45 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
