<?php

/* ApplicationSonataAdminBundle:Admin/ExtraBlocks/Tickets:layout.html.twig */
class __TwigTemplate_669d65c6e584341e811afe74e4534e7c6195a15382712bfe471abb8d025ed70c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("ApplicationSonataAdminBundle:Admin\\ExtraBlocks\\Tickets:tickets.html.twig");
        // line 9
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."ApplicationSonataAdminBundle:Admin\\ExtraBlocks\\Tickets:tickets.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'tickets_block' => array($this, 'block_tickets_block'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 10
        echo "
";
        // line 11
        $this->displayBlock('tickets_block', $context, $blocks);
    }

    public function block_tickets_block($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        ob_start();
        // line 13
        echo "
        <div id=\"tickets-block-container\">
            <div class=\"well\" id=\"tickets-block\">

                <form id=\"tickets-form\">
                    <input type=\"hidden\" name=\"id\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()), "html", null, true);
        echo "\">
                    <input type=\"hidden\" name=\"class\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, (($this->env->getExtension('common_extension')->get_parent_classFunction((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")))) ? ($this->env->getExtension('common_extension')->get_parent_classFunction((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")))) : ($this->env->getExtension('common_extension')->get_classFunction((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))))), "html", null, true);
        echo "\">
                    <input type=\"text\" name=\"ids\" class=\"span12\" placeholder=\"Привязать тикеты (ID через запятую)\" title=\"Привязать тикеты (ID через запятую)\">
                    <input type=\"submit\" value=\"Сохранить\" class=\"btn btn-small tickets-attach\">
                    <br>
                    <div class=\"tickets-ajax-result alert alert-danger\"></div>
                    <div class=\"tickets-ajax-result alert alert-success\"></div>
                </form>

                <div class=\"tickets-table\">

                    ";
        // line 29
        $context["tickets"] = $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "tickets", array());
        // line 30
        echo "                    ";
        $this->displayBlock("tickets_block_tickets_table", $context, $blocks);
        echo "

                </div>

            </div>
        </div>


        <script>

            // Подсчет кол-ва тикетов и смена цвета у лейбы с кол-вом
            function ticketsCount() {
                var c = \$('#tickets-block .tickets-row').size();
                var \$c = \$('#tickets-count');
                if (c > 0 && \$c.hasClass('label-warning')) {
                    \$c.removeClass('label-warning').addClass('label-success');
                } else if (c === 0 && \$c.hasClass('label-success')) {
                    \$c.removeClass('label-success').addClass('label-warning');
                    \$('.tickets-table').html('')
                }
                \$c.text(c);
            }



            \$(function(){
                // ajax запрос на связывание тикета
                \$('#tickets-block-container').on({
                    click: function(e){
                        e.preventDefault();
                        \$('.tickets-attach').attr('disabled', 'disabled');
                        \$('.tickets-ajax-result').hide();
                        var formData = \$(this).closest('form#tickets-form').serializeArray();

                        \$.ajax({
                            type: 'POST',
                            url: '";
        // line 66
        echo $this->env->getExtension('routing')->getPath("application_sonata_admin_tickets_attach");
        echo "',
                            data: formData
                        })
                        .done(function(result) {
                            if (undefined !== result.error) {
                                \$('.tickets-ajax-result.alert-danger').html(result.error.join('<br>')).slideDown('fast');
                            } else if (undefined !== result.success) {
                                \$('.tickets-ajax-result.alert-success').html(result.success.join('<br>')).slideDown('fast');
                                \$('form#tickets-form input[name=\"ids\"]').val('');
                            }

                            if (undefined !== result.other) {
                                if (undefined !== result.other.ticketsHtml) {
                                    \$('.tickets-table').html(result.other.ticketsHtml)
                                }
                                if (undefined !== result.other.ids) {
                                    var ids = result.other.ids;
                                    for (i in ids) {
                                        \$('tr#i-' + ids[i]).effect('highlight', {'color': '#DFF0D8'}, 2000);
                                    }
                                }
                            }
                            ticketsCount();
                            \$('.tickets-attach').attr('disabled', false);
                        })
                        .fail(function() {
                            \$('.tickets-ajax-result.alert-danger').text('При добавлении тикета(ов) произошла ошибка, возможно добавлении не произошло!').slideDown('fast');
                            \$('.tickets-attach').attr('disabled', false);
                        });
                    }
                }, '.tickets-attach');

                // Удаление тикета
                \$('#tickets-block-container').on({
                    click: function(e){
                        e.preventDefault();
                        if (!confirm('Подтвердите удаление связи с тикетом!')) {
                            return false;
                        }
                        \$('.tickets-ajax-result').hide();
                        var \$this = \$(this);
                        var id = \$this.data('id');

                        \$.ajax({
                            type: 'POST',
                            url: '";
        // line 111
        echo $this->env->getExtension('routing')->getPath("application_sonata_admin_tickets_detach");
        echo "',
                            data: {id: id, objectId: ";
        // line 112
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()), "html", null, true);
        echo ", class: '";
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, (($this->env->getExtension('common_extension')->get_parent_classFunction((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")))) ? ($this->env->getExtension('common_extension')->get_parent_classFunction((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")))) : ($this->env->getExtension('common_extension')->get_classFunction((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))))), "js"), "html", null, true);
        echo "' }
                        })
                        .done(function(result) {
                            if (undefined !== result.error) {
                                \$('.tickets-ajax-result.alert-danger').html(result.error.join('<br>')).slideDown('fast');
                            } else if (undefined !== result.success) {
                                \$('.tickets-ajax-result.alert-success').html(result.success.join('<br>')).slideDown('fast');
                                \$this.closest('tr.tickets-row').remove();
                            }
                            ticketsCount();
                        })
                        .fail(function() {
                            \$('.comment-ajax-result.alert-danger').text('При удалении произошла ошибка, возможно удаление не произошло!').slideDown('fast');
                        });
                    }
                }, '.tickets-remove');

            });
        </script>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin/ExtraBlocks/Tickets:layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  168 => 112,  164 => 111,  116 => 66,  76 => 30,  74 => 29,  61 => 19,  57 => 18,  50 => 13,  47 => 12,  41 => 11,  38 => 10,  35 => 8,  32 => 1,  14 => 9,);
    }
}
