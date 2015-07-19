<?php

/* ApplicationSonataAdminBundle:Admin\ExtraBlocks\Comments:layout.html.twig */
class __TwigTemplate_dc637b87914bc268ab4ce8ff4de3634deeb2a3aa3f74387988e2fa30a632288e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("ApplicationSonataAdminBundle:Admin\\ExtraBlocks\\Comments:comment.html.twig");
        // line 9
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."ApplicationSonataAdminBundle:Admin\\ExtraBlocks\\Comments:comment.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'comments_block' => array($this, 'block_comments_block'),
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
        $this->displayBlock('comments_block', $context, $blocks);
    }

    public function block_comments_block($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        ob_start();
        // line 13
        echo "
        <div id=\"comments-block-container\">
            <div class=\"well\" id=\"comments-block\">

                <div class=\"comments\">

                    ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "adminComments", array())));
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
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 20
            echo "
                        ";
            // line 21
            $this->displayBlock("comments_block_comment", $context, $blocks);
            echo "

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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
                </div>

                <form id=\"comments-form\">
                    <input type=\"hidden\" name=\"orderId\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
        echo "\">
                    <input type=\"hidden\" name=\"class\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->get_classFunction((isset($context["object"]) ? $context["object"] : null)), "html", null, true);
        echo "\">
                    <textarea name=\"comment\" class=\"span12\" placeholder=\"Ваш комментарий\"></textarea>
                    <br>

                    ";
        // line 33
        $context["checked"] = "";
        // line 34
        echo "                    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "subscribersOnAdminComments", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["subscriber"]) {
            // line 35
            echo "                        ";
            if (($this->getAttribute($context["subscriber"], "id", array()) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array()))) {
                // line 36
                echo "                            ";
                $context["checked"] = "checked=\"checked\"";
                // line 37
                echo "                        ";
            }
            // line 38
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscriber'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "
                    <label>
                        <input type=\"checkbox\" name=\"isSubscribe\" ";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["checked"]) ? $context["checked"] : null), "html", null, true);
        echo "> подписаться на комментарии
                    </label>

                    <input type=\"submit\" value=\"Сохранить\" class=\"btn btn-small comment-save\">
                    <br>
                    <div class=\"comment-ajax-result alert alert-danger\"></div>
                    <div class=\"comment-ajax-result alert alert-success\"></div>
                </form>
            </div>
        </div>

        <script>

            // Подсчет кол-ва комментариев и смена цвета у лейбы с кол-вом
            function commentsCount() {
                var c = \$('#comments-block .comments .comment').size();
                var \$c = \$('#comments-count');
                if (c > 0 && \$c.hasClass('label-warning')) {
                    \$c.removeClass('label-warning').addClass('label-success');
                } else if (c === 0 && \$c.hasClass('label-success')) {
                    \$c.removeClass('label-success').addClass('label-warning');
                }
                \$c.text(c);
            }

            \$(function(){

                // подсветка границы при наведении на крестик
                \$('#comments-block-container').on({
                    mouseover: function(){
                        \$(this).closest('.comment').css('border-color', '#E9322D');
                    },
                    mouseout: function(){
                        \$(this).closest('.comment').css('border-color', '#E3E3E3');
                    }
                }, '.comment-remove');

                // подсветка коментария по id
                if (location.hash) {
                    if (\$(location.hash + '-i').is('div')) {
                        \$(location.hash + '-i').css('border-color', 'rgba(82, 168, 236, 0.8)');
                    }
                }

                // ajax запрос на добавление коментария или подписки/отписки от комментариев
                \$('#comments-block-container').on({
                    click: function(e){
                        e.preventDefault();
                        \$('.comment-save').attr('disabled', 'disabled');
                        \$('.comment-ajax-result').hide();
                        var formData = \$(this).closest('form#comments-form').serializeArray();

                        \$.ajax({
                            type: 'POST',
                            url: '";
        // line 95
        echo $this->env->getExtension('routing')->getPath("application_sonata_admin_comment_leave");
        echo "',
                            data: formData
                        })
                        .done(function(result) {
                            if (undefined !== result.error) {
                                \$('.comment-ajax-result.alert-danger').html(result.error.join('<br>')).slideDown('fast');
                            } else if (undefined !== result.success) {
                                \$('.comment-ajax-result.alert-success').html(result.success.join('<br>')).slideDown('fast');
                                \$('form#comments-form textarea').val('');
                            }

                            if (undefined !== result.other) {
                                if (undefined !== result.other.commentHtml) {
                                    \$('#comments-block-container .comments').prepend(result.other.commentHtml);
                                    \$('#comments-block-container .comments .comment:first').css('border-color', '#3ED500').slideDown('fast', function(){
                                        commentsCount();
                                        \$(this).effect('highlight', {'color': '#DFF0D8'}, 2000);
                                        \$(this).find('.comment-header').effect('highlight', {'color': '#DFF0D8'}, 2000);
                                    });
                                }
                            }
                            \$('.comment-save').attr('disabled', false);
                        })
                        .fail(function() {
                            \$('.comment-ajax-result.alert-danger').text('При сохранении произошла ошибка, возможно сохранение не произошло!').slideDown('fast');
                            \$('.comment-save').attr('disabled', false);
                        });
                    }
                }, '.comment-save');

                // Удаление комментария
                \$('#comments-block-container').on({
                    click: function(e){
                        e.preventDefault();
                        if (!confirm('Подтвердите удаление комментария!')) {
                            return false;
                        }
                        \$('.comment-ajax-result').hide();
                        var \$this = \$(this);
                        var id = \$this.data('id');
                        var className = \$('#comments-form input[name=\"class\"]').val();

                        \$.ajax({
                            type: 'POST',
                            url: '";
        // line 139
        echo $this->env->getExtension('routing')->getPath("application_sonata_admin_comment_remove");
        echo "',
                            data: {id: id, orderId: ";
        // line 140
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
        echo ", class: className }
                        })
                        .done(function(result) {
                            if (undefined !== result.error) {
                                \$('.comment-ajax-result.alert-danger').html(result.error.join('<br>')).slideDown('fast');
                            } else if (undefined !== result.success) {
                                \$('.comment-ajax-result.alert-success').html(result.success.join('<br>')).slideDown('fast');
                                \$this.closest('div.comment').slideUp('fast', function(){
                                    \$(this).remove();
                                    commentsCount();
                                });
                            }
                        })
                        .fail(function() {
                            \$('.comment-ajax-result.alert-danger').text('При удалении произошла ошибка, возможно удаление не произошло!').slideDown('fast');
                        });
                    }
                }, '.comment-remove');

            });
        </script>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin\\ExtraBlocks\\Comments:layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  246 => 140,  242 => 139,  195 => 95,  138 => 41,  134 => 39,  128 => 38,  125 => 37,  122 => 36,  119 => 35,  114 => 34,  112 => 33,  105 => 29,  101 => 28,  95 => 24,  78 => 21,  75 => 20,  58 => 19,  50 => 13,  47 => 12,  41 => 11,  38 => 10,  35 => 8,  32 => 1,  14 => 9,);
    }
}
