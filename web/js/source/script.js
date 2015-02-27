// Функция для экранирование спец символов при создании регулярки из юзерской строки
function escapeRegExp(str) {
    if (undefined !== str) {
        return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
    }
}
/**
 * Авторизация через ulogin
 * @param {type} token
 * @returns {undefined}
 * @link http://ulogin.ru/custom_buttons_example.php
 */
function ucall(token) {
    var authForm = $('#auth_form'),
        errorBlock = $('.attention_box', authForm),
        onlyRefresh = (authForm.data('refresh')) ? 1 : 0,
        result = {};
    if (errorBlock.length) {
        errorBlock.remove();
    }
    if (token) {
        $.getJSON('https://ulogin.ru/token.php?token=' + token + '&host=' + encodeURIComponent(location.hostname) + '&callback=?', function (data) {
            result = $.parseJSON(data.toString());
            if (!result || result.error || result.verified_email != 1) {
                authForm.prepend('<div class=attention_box>' + 'Невозможно авторизоваться' + '</div>');
            }
            $.ajax({
                url: settingsJS.routes['social_auth'] + '?refresh=' + onlyRefresh,
                type: 'POST',
                data: result,
                dataType: 'JSON',
                success: function (data) {
                    if (data.errors) {
                        authForm.prepend('<div class=attention_box>' + data.msg + '</div>');
                    } else if (data.route) {
                        location = data.route;
                    } else {
                        location.reload();
                    }
                },
                error: function () {
                    console.log('error');
                }
            });
        });
    }

}

$(function () {
    $('.mask-integer').inputmask({alias: 'integer'});

    // На время выполнения ajax запроса меняем курсор мыши
    $(document)
        .ajaxStart(function () {
            $('body').css('cursor', 'progress');
        })
        .ajaxStop(function () {
            $('body').css('cursor', 'default');
        });


    // Навигация по ctrl + right || left
    $(document).keydown(function (e) {
        var href = null;
        e = e || window.e;
        if (e.ctrlKey) {
            var tag = (e.target || e.srcElement).tagName;
            if (tag !== 'INPUT' && tag !== 'TEXTAREA') {
                switch (e.keyCode ? e.keyCode : e.which ? e.which : null) {
                    case 37:
                        href = $('#PrevPage').attr('href');
                        break;
                    case 39:
                        href = $('#NextPage').attr('href');
                        break;
                }

                if (href) {
                    location.href = href;
                }
            }
        }
    });

    // Все что связано с поиском
    var idSearch = $('.search-input').attr('id');
    $('input#' + idSearch)
        .on('select2-selecting', function (e) {
            e.preventDefault();
        })
        .on('select2-focus', function (e) {

            if ($('.select2-input').attr('onkeydown') === undefined) {
                $('.select2-input').attr('onkeydown', 'select2searchOnKeyDown(this, this.value, event)');
            }
            if ($('.select2-input').attr('onkeyup') === undefined) {
                $('.select2-input').attr('onkeyup', 'select2searchOnKeyUp(this, this.value, event)');
            }
            $('form#search-form .select2-chosen').text('');
            var placeholder = $('#' + idSearch).prop('placeholder');
            if (placeholder !== 'Поиск игрушек') {
                var interval = setInterval(function () {
                    if ($('.searchdrop .select2-search input').val() === placeholder) {
                        clearInterval(interval);
                    } else {
                        $('.searchdrop .select2-search input').val(placeholder).trigger('input');
                    }
                }, 5);
            }
        })
        .on('select2-close', function (e) {
            var placeholder = $('#' + idSearch).prop('placeholder');
            $('form#search-form .select2-chosen').text(placeholder);
            $('.select2-count-of-result').remove();
            $('.searchdrop').removeClass('no-round-br');
        })
        .on('select2-loaded', function (e) {
            $('.select2-count-of-result').remove();
            $('.searchdrop').addClass('no-round-br').append('<div class="select2-count-of-result"><span>Найдено ' + declOfNum(e.items.total, ['совпадение', 'совпадения', 'совпадений']) + '</span></div>');
            $('.select2-highlighted').removeClass('select2-highlighted');
        });

    // Клик на кнопку найти (белая стрелка на желтом фоне)
    $('#search-form button').on('click', function (e) {
        e.preventDefault();
        var query = $('.searchdrop .select2-input').val() ? $('.searchdrop .select2-input').val() : $('input#' + idSearch).val();
        if (query.length > 2) {
            $('input#' + idSearch).select2('close');
            $('input#' + idSearch).val(query);
            $('form#search-form .select2-chosen').text(query);
            $('form#search-form').submit();
        }
        return false;
    });

    // Клик на пример для поиска
    $('.search_tip .text_tgl').click(function () {
        var text = $(this).text();
        $('input#' + idSearch).select2('open');
        $('form#search-form .select2-chosen').text('');
        $('input#' + idSearch).prop('placeholder', text);
        $('.searchdrop .select2-search input').val(text).trigger('input');
    });

    // Удаление лейбы с кол-вом на поиске, при условии что ничего не было найдено
    $(document).ajaxSuccess(function (event, xhr, settings) {
        if (settings.url.indexOf('ajax/search.json') !== -1) {
            var json = $.parseJSON(xhr.responseText);
            if (json.total !== undefined && json.total === 0) {
                $('.select2-count-of-result').remove();
                $('.searchdrop').removeClass('no-round-br');
            }
        }
    });

    // Открытие выпадайки при клике на телефон
    $('.header_contacts_phone .text_tgl, .call_us_sidebox .text_tgl').on('click', function () {
        $('.header_contacts_dropdown').show();
    });

    // Переключение телефонов
    $('.header_contacts_dropdown ul li').on('click', function () {
        var phone = $(this).find('.text-phone').text();
        var city = $(this).find('.text-city').text();
        $('.text-phone-selected').text(phone);
        $('.text-city-selected').text(city);
        $('.header_contacts_dropdown').hide();

        $('.header_contacts_dropdown ul li.selected').removeClass('selected');
        $(this).addClass('selected');

        setCookie('header_phone', $(this).attr('id'), {expires: 3600 * 24 * 90});
    });

    // Выбор выбранного ранее телефона из куков
    if (getCookie('header_phone') !== undefined) {
        $('.header_contacts_dropdown ul li#' + getCookie('header_phone')).trigger('click');
    }

    // Закрытие выпадайки с телефонами при клике вне ее области
    $(document).click(function (event) {
        if (!$(event.target).closest('.header_contacts_phone').length && !$(event.target).closest('.call_us_sidebox').length) {
            $('.header_contacts_dropdown').hide();
            event.stopPropagation();
        }
    });


    // Окно смены котрагента
    $('#change-contragent-container').dialog({
        modal: true,
        width: 'auto',
        height: 'auto',
        autoOpen: $('#change-contragent-container').data('auto-open'),
        closeOnEscape: !$('#change-contragent-container').data('auto-open'),
        dialogClass: 'change-contragent-dialog',
        show: {
            effect: 'fade',
            duration: 300
        },
        hide: {
            effect: 'fade',
            duration: 300
        },
        position: 'center',
        open: function (event, ui) {
            if ($('#change-contragent-container').data('auto-open') === true) {
                $('.change-contragent-dialog .ui-dialog-titlebar-close').remove();
            }
        }
    });

    $('.btn-change-contragent').on('click', function (e) {
        e.preventDefault();
        if ($(this).hasClass('busy')) {
            return;
        }
        $(this).addClass('busy');

        $.ajax({
            type: 'POST',
            url: $('.btn-change-contragent.with-url').data('url')
        })
            .done(function (result) {
                if (undefined !== result.data) {
                    if (undefined !== result.data.url) {
                        location.href = result.data.url;
                    } else if (undefined !== result.data.html) {
                        $('#change-contragent-container').html(result.data.html);
                        $('#change-contragent-container').dialog('open');
                    }
                }

                $('.btn-change-contragent').removeClass('busy');
            });

        return false;
    });

    $('#change-contragent-container').on('click', 'ul.change-contragent li span.text_tgl', function (e) {
        if ($(this).hasClass('busy')) {
            return;
        }
        if ($(this).hasClass('contragent-selected')) {
            $('#change-contragent-container').dialog('close');
            return;
        }

        $(this).after('<span class="ajax-loading"></span>');
        $('ul.change-contragent li span.text_tgl').addClass('busy');
        $.ajax({
            url: $('ul.change-contragent').data('url'),
            data: {contragentId: $(this).data('id')},
            method: 'POST',
            success: function (data) {
                location.reload();
            }
        });
    });

    // Подключаем flex menu
    $('ul.flex').flexMenu({
        linkText: 'Ещё',
        linkTitle: 'Ещё',
        showOnHover: true
    });

    $('.flexMenu-popup li').each(function () {
        $span = $(this).find('span');
        $span.text($span.text());
        $(this).find('a').addClass('one_word');
    });

    var timerForOpenMenu;
    var mouseOnMenu = false;


    $('body').mousemove(function () {
        if (!$('div.nav_cats:hover, .nav_submenu_cats_block:hover').length) {
            mouseOnMenu = false;
        }
    });

    $('ul.nav_cats li.nav_cat, div.nav_cat_last, .nav_submenu_cats_block').on({
        mouseover: function () {
            if ($(this).data('menu') !== undefined) {
                var id = $(this).data('menu');
            } else {
                var id = $(this).data('submenu');
            }

            var $li = $('li.nav_cat[data-menu="' + id + '"]');
            if (!$($li).hasClass('active')) {
                $li.find('a.nav_cat_link').addClass('hover');
            }

            if (!$(this).closest('.flexMenu-popup').length) {

                if (!mouseOnMenu) {
                    timerForOpenMenu = setTimeout(function () {
                        mouseOnMenu = true;
                        $('.nav_submenu_cats_block[data-submenu="' + id + '"]').show();
                    }, 500);

                } else {
                    $('.nav_submenu_cats_block[data-submenu="' + id + '"]').show();
                }

            }
        },
        mouseout: function () {
            clearTimeout(timerForOpenMenu);

            if ($(this).data('menu') !== undefined) {
                var id = $(this).data('menu');
            } else {
                var id = $(this).data('submenu');
            }

            var $li = $('li.nav_cat[data-menu="' + id + '"]');
            if (!$($li).hasClass('active')) {
                $li.find('a.nav_cat_link').removeClass('hover');
            }

            $('.nav_submenu_cats_block').hide();
        }
    });

    $('#show-all-payment-system').on('click', function () {

        if ($(this).hasClass('isViewed')) {
            $(this).removeClass('isViewed');
            $('.footer_payments li.thisViewed').fadeOut('fast');
        } else {
            $(this).addClass('isViewed');
            $('.footer_payments li.hidden').addClass('thisViewed').fadeIn('fast');
        }

        triggerText($(this));
    });


    // Всплывающее окно для ввода email для уведомления о поступлении товара
    var popupReportInstock = '' +
        '<div class="avaliability_expected_popup" style="top: -153px; left: 20px; bottom: auto;">' +
        '<form method="post" class="report_instock">' +
        '<ins class="modal_window_close"></ins>' +
        '<h4>Узнать о поступлении товара</h4>' +
        '<input class="text_input avaliability_expected_popup_input" type="email" name="email" placeholder="Ваш E-mail" required="required">' +
        '<button class="common_button"><span>Отправить заявку</span></button>' +
        '</form>' +
        '</div>';

    // Закрытие модального окна для ввода email
    $('.product').on('click', '.modal_window_close', function () {
        $(this).closest('.avaliability_expected_popup').fadeOut(200, function () {
            $(this).remove();
        });
    });

    // Клик по ссылке "ОЖИДАЕТСЯ ПОСТАВКА"
    $('.report-instock').click(function () {
        var id = $(this).data('id');
        if (id) {
            $('.modal_window_close').trigger('click');
            $(this).after(popupReportInstock);
            $('.avaliability_expected_popup').fadeIn(200).find('form').append('<input type="hidden" value="' + id + '" name="productId"/>');
        }
    });

    // Отправка email
    $('.product').on('click', 'form.report_instock button', function (e) {

        var $form = $(this).closest('form');
        var data = {
            email: $form.find('input[name="email"]').val(),
            productId: $form.find('input[name="productId"]').val()
        };

        if (data.email.length && data.productId.length) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                data: data,
                url: settingsJS.routes['core_product_subscribe_to_report']
            }).done(function (response) {

                if (response.error !== undefined) {
                    alertCustom('Ошибка!', response.error.join('<br>'), {
                        buttons: {
                            Ок: function() {
                                $(this).dialog('close');
                            }
                        }
                    });
                } else if (response.success !== undefined) {
                    alertCustom('Сообщение', response.success.join('<br>'), {
                        buttons: {
                            Ок: function() {
                                $(this).dialog('close');
                            }
                        }
                    });
                    $('.modal_window_close').trigger('click');
                    $form.find('input[name="email"]').val('');
                }
            });

            return false;
        } else {
            if (!data.email.length) {
                $(this).closest('div').addClass('form_field_error');
            }
            if (!data.productId.length) {
                location.reload();
            }
        }
    });

    // Получаем дату и кол-во для товаров со ствтцсом "Ожидается поставки"
    $('.product').on('mouseover', '.report-instock', function () {
        var $t = $(this);
        var id = $t.closest('.report-instock').data('id');
        if (id !== undefined && $t.attr('title') === undefined) {
            $.ajax({
                type: 'POST',
                data: {productId: id},
                url: settingsJS.routes['core_product_get_date_and_count_for_nearest_supply']
            }).done(function (response) {
                if (response.success !== undefined) {
                    $t.attr('title', response.success);
                }
            });
        }
    });

});

function select2searchOnKeyUp(_this, val, event) {
    if (val.match(/[^0-9a-zA-Zа-яА-Я\ \-]/g)) {
        val = val.replace(/[^0-9a-zA-Zа-яА-Я\ \-]/g, '');
        _this.value = val;
    }

    var idSearch = $('.search-input').attr('id');
    $('input#' + idSearch).prop('placeholder', val).val(val);
    $('input#' + idSearch).val(val);
}

// Функция для поиска в header, для перехвата нажатия клавиши Enter, для submit формы
function select2searchOnKeyDown(_this, val, event) {
    var code = event.keyCode ? event.keyCode : event.which;
    var char2 = String.fromCharCode(code);
    var systemKeys = [27, 8, 46, 36, 35, 39, 37];
    if (!($.inArray(code, systemKeys) >= 0)
        && ((event.shiftKey && code === 189)
        || (code !== 189 && !event.ctrlKey && (event.shiftKey && char2.match(/[0-9]/g) || char2.match(/[^0-9a-zA-Zа-яА-Я\ -]/g))))
        || char2.match(/o|j|k|n/)) {
        event.preventDefault();
    }

    if (!$('.select2-highlighted').length) {
        switch (code) {
            case 13: // ENTER
                $('#search-form button').trigger('click');
                break;
            case 38: // UP
                $('.select2-result:last').addClass('select2-highlighted');
                $('.searchdrop ul.select2-results').scrollTop($('.searchdrop ul.select2-results')[0].scrollHeight);
                break;
            case 40: // DOWN
                $('.select2-result:first').addClass('select2-highlighted');
                break;
        }
    } else {
        switch (code) {
            case 13: // ENTER
                select2searchOnClick($('.select2-highlighted').find('a')[0]);
                break;
        }
    }
}

// Функция для поиска в header, для перехвата нажатия клавиши Enter, для submit формы
function select2searchOnClick($this) {
    var idSearch = $('.search-input').attr('id');
    $('input#' + idSearch).select2('close');
    var placeholder = $('#' + idSearch).prop('placeholder');
    $('form#search-form .select2-chosen').text(placeholder);
    location.href = $this.href;
}

// костомация alert, confirm
function alertCustom(title, text, options) {
    $('#alert-container').remove();
    $('body').append('<div id="alert-container" title="' + title + '">' + text + '</div>');
    options.modal = true;
    options.closeOnEscape = true;
    $('#alert-container').dialog(options);
}

// склонение числительных
function declOfNum(number, titles, delim) {
    if (delim === undefined) {
        delim = ' ';
    }
    cases = [2, 0, 1, 1, 1, 2];
    return number + delim + titles[ (number % 100 > 4 && number % 100 < 20) ? 2 : cases[(number % 10 < 5) ? number % 10 : 5] ];
}

function triggerText($this) {
    var text = $this.text();
    $this.text($this.data('trigger-text'));
    $this.data('trigger-text', text);
}

// Мини плагин для запрета выделения текста на некоторых элементах
(function ($) {
    $.fn.disableSelection = function () {
        return this
            .attr('unselectable', 'on')
            .css('user-select', 'none')
            .on('selectstart', false);
    };
})(jQuery);

// Format a number with grouped thousands
function number_format(number, decimals, dec_point, thousands_sep) {
    //
    // +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +	 bugfix by: Michael White (http://crestidg.com)

    var i, j, kw, kd, km;

    // input sanitation & defaults
    if (isNaN(decimals = Math.abs(decimals))) {
        decimals = 2;
    }
    if (dec_point === undefined) {
        dec_point = ",";
    }
    if (thousands_sep === undefined) {
        thousands_sep = " ";
    }

    i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

    if ((j = i.length) > 3) {
        j = j % 3;
    } else {
        j = 0;
    }

    km = (j ? i.substr(0, j) + thousands_sep : "");
    kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
    kd = Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2);

    return parseInt(kd) ? km + kw + dec_point + kd : km + kw;
}

// Устанавливает cookies
// http://learn.javascript.ru/cookie#функция-setcookie-name-value-options
function setCookie(name, value, options) {
    options = options || {};

    var expires = options.expires;

    if (typeof expires === "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires * 1000);
        expires = options.expires = d;
    }
    if (expires && expires.toUTCString) {
        options.expires = expires.toUTCString();
    }

    value = encodeURIComponent(value);

    var updatedCookie = name + "=" + value;

    if (options.path === undefined) {
        options.path = '/';
    }

    for (var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true) {
            updatedCookie += "=" + propValue;
        }
    }

    document.cookie = updatedCookie;
}

// Возвращает cookie с именем name, если есть, если нет, то undefined
// http://learn.javascript.ru/cookie#функция-getcookie-name
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

// удаляет cookie с именем name
function deleteCookie(name) {
    setCookie(name, "", {expires: -1});
}

// Подгрузка формы авторизации по ajax в модальное окно
function loadLoginFormByAjax(url) {
    if (url === undefined) {
        url = '/login.html';
    }
    $.ajax({
        type: 'POST',
        data: {modal: true},
        url: url
    }).done(function (html) {
        $('body').append('<div title="Необходима авторизация" id="login-container"></div>');
        $('#login-container').hide().html(html).dialog({
            modal: true,
            width: 'auto',
            height: 'auto',
            autoOpen: true,
            show: {
                effect: 'fade',
                duration: 300
            },
            hide: {
                effect: 'fade',
                duration: 300
            },
            position: 'center'
        });

    });
}

// модальное окно
// http://learn.javascript.ru/cookie#функция-deletecookie-name
(function ($) {
    $(function () {
        $('.modal_window_off').click(function () {
            var $this = $(this),
                parentBlock = $this.parents('.login_offer_box');
            parentBlock.slideUp();

            return false;
        });

        $('.login.popup').click(function () {
            $('.modal_window').modal('show');
            return false;
        });

        $('.restore').click(function () {
            $('.modal_window_body').toggleClass('hidden');
            return false;
        });

        $('.modal_window .close').click(function () {
            var $this = $(this),
                modalReset = $('#modal_reset'),
                modalResetSuccess = $('.modal_reset_success'),
                modalWindow = $this.parents('.modal_window'),
                modalRestore = $('.modal_restore'),
                modalLogin = $('.modal_login');
            modalWindow.modal('hide');
            modalRestore.addClass('hidden');
            modalLogin.removeClass('hidden');
            if (modalResetSuccess.length) {
                modalResetSuccess.remove();
                modalReset.removeClass('hidden');
            }
            return false;
        });

        $('.modal_window #auth_form').submit(function () {
            var $this = $(this),
                userName = $('#username_login', $this),
                userNameParent = userName.parent('.form_field'),
                isRefresh = $this.data('refresh');
                errorBlock = userName.siblings('.form_field_error_txt');
            if (errorBlock.length) {
                errorBlock.remove();
                userNameParent.removeClass('form_field_error');
            }
            $.ajax({
                url: $this.attr('action'),
                data: $this.serialize(),
                method: $this.attr('method'),
                success: function (data) {
                    if (!data.success) {
                        userName.after('<div class="form_field_error_txt">' + data.message + '</div>');
                        userNameParent.addClass('form_field_error');
                    } else if (data.url && !isRefresh) {
                        window.location = data.url;
                    } else {
                        location.reload();
                    }
                }
            });
            return false;
        });

        $('.modal_window #modal_reset').submit(function () {
            var $this = $(this),
                modalWindow = $('.modal_window'),
                userName = $('#username', $this),
                userNameParent = userName.parent('.form_field'),
                errorBlock = userName.siblings('.form_field_error_txt');
            if (errorBlock.length) {
                errorBlock.remove();
                userNameParent.removeClass('form_field_error');
            }
            $.ajax({
                url: $this.attr('action'),
                data: $this.serialize(),
                method: $this.attr('method'),
                success: function (data) {
                    if (data.success) {
                        $this.addClass('hidden');
                        $this.after('<div class="modal_reset_success info_box">' + data.message + '</div>');
                    } else {
                        userName.after('<div class="form_field_error_txt">' + data.message + '</div>');
                        userNameParent.addClass('form_field_error');
                    }
                }
            });
            return false;
        });
    });
})(jQuery);
