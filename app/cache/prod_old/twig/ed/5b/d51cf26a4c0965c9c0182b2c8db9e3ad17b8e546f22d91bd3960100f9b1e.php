<?php

/* ApplicationSonataAdminBundle:Admin/Form:admin_date_range.html.twig */
class __TwigTemplate_ed5bd51cf26a4c0965c9c0182b2c8db9e3ad17b8e546f22d91bd3960100f9b1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig");

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
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
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
            $context["selector"] = twig_array_merge((isset($context["selector"]) ? $context["selector"] : $this->getContext($context, "selector")), array($this->getAttribute($context["loop"], "index0", array()) => ("#" . $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "id", array()))));
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
        $context["selector"] = twig_join_filter((isset($context["selector"]) ? $context["selector"] : $this->getContext($context, "selector")), ", ");
        // line 13
        echo "                                ";
        if ($this->getAttribute((isset($context["widgetConfig"]) ? $context["widgetConfig"] : $this->getContext($context, "widgetConfig")), "ranges", array())) {
            // line 14
            echo "                                    <div class=\"dropdown\" style=\"float:right\">
                                        <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-hover=\"dropdown\" data-toggle=\"dropdown\">
                                            <span class=\"caret\"></span>
                                        </button>
                                        <ul class=\"dropdown-menu\" role=\"menu\" style=\"right: 0; left: auto;\" aria-labelledby=\"dropdownMenu1\">

                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 21
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "\" href=\"javascript:void(0);\">Сегодня</a>
                                            </li>
                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 24
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["oneDay"]) ? $context["oneDay"] : $this->getContext($context, "oneDay")), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "\" data-to=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["oneDay"]) ? $context["oneDay"] : $this->getContext($context, "oneDay")), "d.m.Y"), "html", null, true);
            echo "\" href=\"javascript:void(0);\">Вчера</a>
                                            </li>
                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 27
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["twoDays"]) ? $context["twoDays"] : $this->getContext($context, "twoDays")), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "\" data-to=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["twoDays"]) ? $context["twoDays"] : $this->getContext($context, "twoDays")), "d.m.Y"), "html", null, true);
            echo "\" href=\"javascript:void(0);\">Позавчера</a>
                                            </li>
                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 30
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["sevenDays"]) ? $context["sevenDays"] : $this->getContext($context, "sevenDays")), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "\" href=\"javascript:void(0);\">7 дн.</a>
                                            </li>
                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 33
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["firstDayOfWeek"]) ? $context["firstDayOfWeek"] : $this->getContext($context, "firstDayOfWeek")), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "\" data-to=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["middleDayOfWeek"]) ? $context["middleDayOfWeek"] : $this->getContext($context, "middleDayOfWeek")), "d.m.Y"), "html", null, true);
            echo "\" href=\"javascript:void(0);\">Нач. недели</a>
                                            </li>
                                            <li>
                                                <a class=\"date-range\" data-from=\"";
            // line 36
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["firstDayOfMonth"]) ? $context["firstDayOfMonth"] : $this->getContext($context, "firstDayOfMonth")), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "\" data-to=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["middleDayOfMonth"]) ? $context["middleDayOfMonth"] : $this->getContext($context, "middleDayOfMonth")), "d.m.Y"), "html", null, true);
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
        echo (isset($context["selector"]) ? $context["selector"] : $this->getContext($context, "selector"));
        echo "').datepicker({                            ";
        if (($this->getAttribute((isset($context["widgetConfig"]) ? $context["widgetConfig"] : $this->getContext($context, "widgetConfig")), "start", array()) == false)) {
            // line 65
            echo "                                minDate: new Date(2008, 11, 1),                                                            ";
        } else {
            // line 66
            echo "                                                                            minDate: new Date(";
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["widgetConfig"]) ? $context["widgetConfig"] : $this->getContext($context, "widgetConfig")), "start", array()) * 1000), "html", null, true);
            echo "),                            ";
        }
        // line 67
        echo "                                    ";
        if ($this->getAttribute((isset($context["widgetConfig"]) ? $context["widgetConfig"] : $this->getContext($context, "widgetConfig")), "end", array())) {
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
        return array (  189 => 69,  186 => 68,  183 => 67,  178 => 66,  175 => 65,  171 => 64,  149 => 44,  145 => 42,  134 => 36,  126 => 33,  120 => 30,  112 => 27,  104 => 24,  98 => 21,  89 => 14,  86 => 13,  83 => 12,  69 => 11,  67 => 10,  62 => 8,  57 => 7,  39 => 6,  37 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
