/**
 * Для отзывов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
$(function() {

    $('#review-rating, .upload_add, #reviews-add-pros-and-cons, .reviews-give-answer, .product_opinion_rate, .product_opinion_photos, #rewiews-more, #reviews-sort li').disableSelection();

    $('#reviews-sort li').on('click', function() {

        deleteCookie('reviews_filter');

        if ($('#reviews-sort').hasClass('busy')) {
            return;
        }
        $('#reviews-sort').addClass('busy');

        $('#reviews-sort li').removeClass('text_tab_active');
        $('#reviews-filter li').removeClass('active');
        $(this).addClass('text_tab_active');
        var data = {
            sort: $(this).data('sort'),
            slug: $('#reviews-sort').data('slug')
        };

        location.hash = 'reviews-sort-' + data.sort;

        $.ajax({
            type: 'POST',
            url: $('#reviews-sort').data('url'),
            data: data
        })
                .done(function(result) {
                    if (result.error !== undefined) {
                        alertCustom('Ошибка!', result.error.join('<br>'), {
                            buttons: {
                                Ok: function() {
                                    $(this).dialog('close');
                                }
                            }
                        });
                    } else {
                        $('.read_all').remove();
                        $('#reviews-list').replaceWith(result.data.html);

                        $('#reviews-sort').removeClass('busy');
                        setCookie('reviews_sort', data.sort, {expires: 3600 * 24 * 90});
                    }
                });

    });

    // Выбираем сортировку если она была передана через hash
    if (location.hash.indexOf('reviews-sort') !== -1) {
        $(location.hash + '-do').trigger('click');
    }

    // Подсвечиваем выбранную сортировку из куков, если есть.
    if (getCookie('reviews_sort')) {
        $('#reviews-sort li').removeClass('text_tab_active');
        $('li[data-sort="' + getCookie('reviews_sort') + '"]').addClass('text_tab_active');
    }

    // Фильтрация по кол-ву звезд
    $('#reviews-filter li').on('click', function() {

//        deleteCookie('reviews_sort');

        if ($('#reviews-filter').hasClass('busy') || $(this).hasClass('not-active')) {
            return;
        }
        $('#reviews-filter').addClass('busy');

        $('#reviews-sort li').removeClass('text_tab_active');
        $('#reviews-filter li').removeClass('active');
        $(this).addClass('active');
        var data = {
            filterRating: $(this).data('filter'),
            slug: $('#reviews-sort').data('slug')
        };

        location.hash = 'reviews-filter-' + data.filterRating;

        $.ajax({
            type: 'POST',
            url: $('#reviews-filter').data('url'),
            data: data
        })
                .done(function(result) {
                    if (result.error !== undefined) {
                        alertCustom('Ошибка!', result.error.join('<br>'), {
                            buttons: {
                                Ok: function() {
                                    $(this).dialog('close');
                                }
                            }
                        });
                    } else {
                        $('.read_all').remove();
                        $('#reviews-list').replaceWith(result.data.html);

                        $('#reviews-filter').removeClass('busy');
//                        setCookie('reviews_filter', data.filterRating, {expires: 3600 * 24 * 90});
                    }
                });
        return false;
    });

    // Выбираем филбтрацию если она была передана через hash
    if (location.hash.indexOf('reviews-filter') !== -1) {
        $(location.hash + '-do').trigger('click');
    }

    // Подсвечиваем выбранную фильтрацию из куков, если есть.
//    if (getCookie('reviews_filter')) {
//        $('#reviews-sort li').removeClass('text_tab_active');
//        $('#reviews-filter li').removeClass('active');
//        $('li[data-filter="' + getCookie('reviews_filter') + '"]').addClass('active');
//    }


    // Отображение/скрытие дополнительных полей (рейтинг, плюсы и минусы)
    $('#reviews-add-pros-and-cons').on('click', function() {
        if ($(this).hasClass('pros-and-cons-is-visible')) {
            $(this).removeClass('pros-and-cons-is-visible');
            $('#reviews-pros-and-cons-container').slideUp('fast');
            $('.rating-cancel').trigger('click');
            $('.review-pros, .review-cons').val('');
        } else {
            $(this).addClass('pros-and-cons-is-visible');
            $('#reviews-pros-and-cons-container').slideDown('fast');
        }
        triggerText($(this));
    });

    // Отображение/скрытие формы для ответа
    if ($('#reviews-form-container').length) {
        var $giveAnswerForm = $('<div/>').html($('#reviews-form-container').html().replace(/id=".+?"/g, '').replace(/<script.+?\/script>/g, ''));
        $giveAnswerForm.find('.reviews-answer-form-without-this').remove();
    }
    $('.main_col_pad').on('click', '.reviews-give-answer', function() {
        if (!$('#reviews-section').data('is-logged')) {
            $('.modal_window').addClass('modal-in-center').modal('show');
            setCookie('answer_to_review', $(this).data('id'), {expires: 3600 * 24});
            setCookie('redirect', document.URL.replace(/#reviews/g, '') + '#reviews', {expires: 3600 * 24});
//            loadLoginFormByAjax($('#reviews-section').data('login-url'));
            return;
        }

        if ($(this).hasClass('give-answer-form-is-visible')) {
            $(this).removeClass('give-answer-form-is-visible');
            $(this).next('.reviews-give-answer-form-container').slideUp('fast', function() {
                $(this).html('');
            });
            $(this).next('.reviews-give-answer-form-container').find('textarea').val('');
        } else {
            $('.give-answer-form-is-visible').trigger('click');
            $(this).addClass('give-answer-form-is-visible');

            var id = $(this).data('id');
            $giveAnswerForm.find('.reviews-parent-id').val(id);

            $(this).next('.reviews-give-answer-form-container').html($giveAnswerForm.html()).slideDown('fast');
        }

        $(this).removeClass('with_icon').addClass('with_icon');
        triggerText($(this));
    });

    if (getCookie('answer_to_review') !== undefined) {
        $('span.reviews-give-answer[data-id="' + getCookie('answer_to_review') + '"]').trigger('click');
        deleteCookie('answer_to_review');
    }

    // Лайк отзыва +/-
    $('.main_col_pad').on('click', '.product_opinion_rate_button', function() {
        var $this = $(this);
        var $container = $this.closest('.product_opinion_rate');
        var data = {
            id: $container.data('id'),
            type: $this.hasClass('positive') ? 'positive' : 'negative'
        };

        if (!$('#reviews-section').data('is-logged')) {
            $('.modal_window').addClass('modal-in-center').modal('show');
            setCookie('rate_to_review', data.id, {expires: 3600 * 24});
            setCookie('rate_type', data.type, {expires: 3600 * 24});
            setCookie('redirect', document.URL.replace(/#reviews/g, '') + '#reviews', {expires: 3600 * 24});
//            loadLoginFormByAjax($('#reviews-section').data('login-url'));
            return;
        }

        if ($container.hasClass('busy') || $container.hasClass('product_opinion_rate_disabled') || data.id === undefined) {
            return;
        }

        $container.addClass('busy');

        $.ajax({
            type: 'POST',
            url: $container.data('url'),
            data: data
        })
                .done(function(result) {

                    if (result.error !== undefined) {
                        alertCustom('Ошибка!', result.error.join('<br>'), {
                            buttons: {
                                Ok: function() {
                                    $(this).dialog('close');
                                }
                            }
                        });
                    } else {

                        $container.find('span.selected').removeClass('selected');
                        $container.find('span.positive').text(result.data.count.positive);
                        $container.find('span.negative').text(result.data.count.negative);
                        switch (result.data.action) {
                            case '+1':
                                $container.find('span.positive').addClass('selected').text(result.data.count.positive);
                                break;
                            case '-1':
                                $container.find('span.negative').addClass('selected').text(result.data.count.negative);
                                break;
                        }

                        $container.removeClass('busy');
                    }
                });

    });

    if (getCookie('rate_to_review') !== undefined) {
        var $span = $('div.product_opinion_rate[data-id="' + getCookie('rate_to_review') + '"] span.' + getCookie('rate_type'));
        if (!$span.hasClass('selected')) {
            $span.trigger('click');
        }
        deleteCookie('rate_to_review');
        deleteCookie('rate_type');
    }

    // Подгрузка отзывов по клику на "Читать все"/"Показать еще"
    $('.main_col_pad').on('click', '#rewiews-more', function() {
        var $this = $(this);

        if ($this.hasClass('busy')) {
            return;
        }

        $this.addClass('busy');

        var data = {
            page: $this.data('page'),
            show: $this.data('show'),
            slug: $this.data('slug'),
            sort: $('.text_tab_active').data('sort'),
            filterRating: $('#reviews-filter li.active').data('filter')
        };

        $.ajax({
            type: 'POST',
            url: $this.data('url'),
            data: data
        })
                .done(function(result) {

                    if (result.error !== undefined) {
                        alertCustom('Ошибка!', result.error.join('<br>'), {
                            buttons: {
                                Ok: function() {
                                    $(this).dialog('close');
                                }
                            }
                        });
                    } else {

                        if ($this.data('type') === 'all') {
                            $('ul#reviews-list').html('');
                        } else {
                            $this.data('page', result.data.page);
                        }

                        $('ul#reviews-list').append(result.data.html);

                        if (result.data.total <= (result.data.page - 1) * data.show) {
                            $this.remove();
                        }

                        $this.removeClass('busy');
                    }

                });

    });

    // Работа с видео
    $('body').on('click', '.upload_video', function(e){
        e.preventDefault();
        var $ul = $(this).closest('form.reviews-form').find('.core_review_form_type_remoteVideos');
        var html = $ul.data('prototype').replace(/_remote_video_index_/g, $ul.find('li').length);
        $ul.append(html);

        return false;
    });

    $('body').on('change', '.video-code input, .video-hosting select', function(){
        var $container = $(this).closest('li');
        var code = $container.find('.video-code input').val();
        var hosting = $container.find('.video-hosting select option:selected').data('name');
        $container.find('iframe').hide();
        if (code && hosting) {
            var player = $container.find('.videoPreview iframe.' + hosting);
            var src = player.attr('src').split('/');
            src[(src.length - 1)] = code;
            player.attr('src', src.join('/')).fadeIn(200);
        }
    });

    $('body').on('click', '.video-remove', function(){
        if (confirm('Подтвердите удаление видео!')) {
            $(this).closest('li').remove();
        }
    });

    $('.rating-cancel').remove();

    $('body').on('click', '.button_send', function(e){
        var $form = $(this).closest('form');
        var m = '';

        if (!$form.find('.text-review').val()) {
            m += 'Отзыв не может быть пустым!';
        }
        if ($form.find('.product_rate').length && !$form.find('input.star:checked').length) {
            m += 'Укажите пожалуйста Вашу оценку!\n';
        }

        if (m) {
            e.preventDefault();
            alertCustom('Сообщение', m, {
                buttons: {
                    Ok: function() {
                        $(this).dialog('close');
                    }
                }
            });
            return false;
        }
    });
});