/**
 * Скрипт для работы с историей URL
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

$(function () {

    // Добавление
    $('.slug-history-main-container').on('click', '.slug-history-btn-add', function () {
        if ($('.slug-history-img-loader:visible').size() > 0) {
            return;
        }
        var $container = $(this).closest('.slug-history-container');
        var url = $container.find('.slug-history-input-add').val();
        if (!url.replace(/ /, '').length) {
            alert('Введите URL!');
            return false;
        }
        var data = {
            targetId: $container.data('target-id'),
            className: $container.data('class-name'),
            url: url,
            action: 'add'
        };

        sendAjax(data);
    });

    // Редактирование
    $('.slug-history-main-container').on('change', '.slug-history-input-edit', function () {
        var $container = $(this).closest('.slug-history-container');
        var url = $(this).val();
        if (!url.replace(/ /, '').length) {
            alert('Введите URL!');
            return false;
        }
        var data = {
            targetId: $container.data('target-id'),
            className: $container.data('class-name'),
            url: url,
            id: $(this).data('id'),
            action: 'edit'
        };

        sendAjax(data);
    });

    // Удаление
    $('.slug-history-main-container').on('click', '.slug-history-icon-remove', function () {
        if (confirm('Подтвердите удаление URL.')) {
            var $container = $(this).closest('.slug-history-container');
            var data = {
                targetId: $container.data('target-id'),
                className: $container.data('class-name'),
                url: '',
                id: $(this).hasClass('all') ? '' : $(this).data('id'),
                action: $(this).hasClass('all') ? 'removeAll' : 'remove'
            };
            sendAjax(data);
        }
    });

    $('.slug-history-main-container').on('keypress keydown keyup', '.slug-history-input-add', function (e) {
        var code = e.keyCode;
        if (code === 13) {
            e.preventDefault();
            var $container = $(this).closest('.slug-history-container');
            $container.find('.slug-history-btn-add').trigger('click');
            return false;
        }
    });

    $('.slug-history-main-container').on('keypress keydown keyup', '.slug-history-input-edit', function (e) {
        var code = e.keyCode;
        if (code === 13) {
            e.preventDefault();
            var $container = $(this).closest('.slug-history-container');
            $container.find('.slug-history-btn-add').focus();
            //$(this).trigger('change');
            return false;
        }
    });

    function sendAjax(data) {
        $('.default-btn-text').hide();
        $('.slug-history-img-loader').show();
        $('.slug-history-main-container').find('.alert').slideUp('fast');
        $.ajax({
            url: adminRoutes['core_slug_history_editor_ajax'],
            type: 'POST',
            data: data
        }).done(function (json) {
            $('.slug-history-main-container').html(json.data.html);
            $('.slug-history-img-loader').hide();
            $('.default-btn-text').show();
        }).fail(function(){
            alert('Произошла ошибка!');
        }) ;
    }
});