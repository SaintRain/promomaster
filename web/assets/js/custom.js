/**
 * Авторизация через ulogin
 * @param {type} token
 * @returns {undefined}
 * @link http://ulogin.ru/custom_buttons_example.php
 */
function ucall(token) {
    var authForm = $('#auth_form'),
        errorBlock = $('.attention_box alert alert-danger fade in', authForm),
        onlyRefresh = (authForm.data('refresh')) ? 1 : 0,
        result = {};
    if (errorBlock.length) {
        errorBlock.remove();
    }
    if (token) {
        $.getJSON('https://ulogin.ru/token.php?token=' + token + '&host=' + encodeURIComponent(location.hostname) + '&callback=?', function (data) {
            result = $.parseJSON(data.toString());
            if (!result || result.error || result.verified_email != 1) {
                authForm.prepend('<div class="attention_box alert alert-danger fade in">' + 'Невозможно авторизоваться' + '</div>');
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
    //кликает на вкладку на которой есть ошибка
    if ($('.state-error').length) {
        var errorTabContentId=$('.state-error').parents('.tab-pane').attr('id');
        if (errorTabContentId) {
            $('.nav-tabs > li >a[href="#'+errorTabContentId+'"]').click();
        }
        $('.state-error').parents('nav-tabs')
    }




    $(document).on('click', '.video-show', function() {
        var url=$(this).attr('data-url');
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $('.modal-video').find('.modal-dialog').html(response);
                $('.modal-video').modal('show');
            },
            error: function () {
                console.log(response)
            }
        });

    })

})