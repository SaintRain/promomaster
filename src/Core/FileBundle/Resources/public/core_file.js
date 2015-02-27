/**
 * Общий скрипт для админских тип форм multiupload_document и multiupload_image
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
if (core_file_include === undefined) {

    function getHumanFileSizeFilter($bytes, $decimals) {
        if ($decimals === undefined) {
            $decimals = 2;
        }
        $bytes = parseInt($bytes);
        $sz = new Array('B', 'Kb', 'Mb', 'Gb', 'Tb');
        $factor = Math.floor(($bytes.toString().length - 1) / 3);
        return number_format($bytes / Math.pow(1024, $factor), $decimals, '.', '') + ' ' + $sz[$factor];
    }

    function reverseForIn(obj, f) {
        var arr = [];
        for (var key in obj) {
            arr.push(key);
        }
        for (var i = arr.length - 1; i >= 0; i--) {
            f.call(obj, arr[i]);
        }
    }

    function statusBar($div, percent, bound) {
        if (percent) {
            percent = parseInt($div.find('span').text().replace(/%/g, '')) + parseInt(percent);
        } else {
            percent = 0;
        }

        if (percent >= bound) {
            percent = bound;
        }

        if (percent >= 100) {
            percent = 100;
            setTimeout(function () {
                var $mainContainer = $div.closest('.field-container');
                $mainContainer.find('.counter-of-files').fadeOut('slow');
                $mainContainer.find('.counter-of-documents').fadeOut('slow');
                $div.fadeOut('slow');
                statusBar($div, 0);
            }, 1000);
        }

        $div.find('.bar').css('width', percent + '%');
        $div.find('span').text(percent + '%');


    }

    var core_file_include = true, // флаг, подключен данный скрипт или нет
            timeout; // таймер

    // нажате на кнопку загузить файл
    $('body').on('click', '.fake-input-file', function (e) {
        if (!$(this).hasClass('disabled')) {
            e.preventDefault();
            $(this).next().trigger('click');
        }
    });

    // Функция для отображения результата ajax запроса
    function ajaxAlertResult(json, id, $mainContainer) {
        if (typeof json == 'string' || json instanceof String) {
            var result = $.parseJSON(json);
        } else {
            var result = json;
        }
        var type = 'success';
        if (result.error) {
            type = 'error';
            $('.form-actions input, .form-actions a').removeClass('disabled');
            if ($mainContainer !== undefined) {
                $mainContainer.find('.fake-input-file-main').removeClass('disabled');
                $mainContainer.find('.form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"]').removeClass('disabled');
                $mainContainer.find('.counter-of-files').fadeOut('slow');
                $mainContainer.find('.counter-of-documents').fadeOut('slow');
                $mainContainer.find('.progress-file').fadeOut('slow');
            } else {
                $('.fake-input-file-main').removeClass('disabled');
                $('.form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"]').removeClass('disabled');
            }
        }

        if (result.info) {
            type = 'info';
        }

        var el;
        if (timeout === undefined) {
            var timeout = [];
        }
        if ($mainContainer !== undefined && timeout[$mainContainer.attr('id')] === undefined) {
            clearTimeout(timeout[$mainContainer.attr('id')]);
        }
        if (result[type]) {
            if (id === 'main') {
                el = $mainContainer.find('.ajax-' + type + '-' + id);
            } else {
                el = $('.ajax-' + type + '-' + id);
            }
            el.hide();
            el.html(result[type].join('<br>')).css('visibility', 'visible').slideDown('fast');
            timeout[$mainContainer.attr('id')] = setTimeout(function () {
                if ($mainContainer !== undefined) {
                    $mainContainer.find('.hide-by-timer').slideUp('fast');
                } else {
                    $('.hide-by-timer').slideUp('fast');
                }
                el.slideUp('fast');
            }, el.data('hide-after') * 1000);
        }
    }

    // функция для блокировки некоторых опций если родительский объект новый
    function disabledIfNew() {
        $('.ajax-id').each(function () {
            if ($(this).val() === '0') {
                var m = 'Станет доступной после общего сохранения позиции.';
                $('.image-table').find('a.btn').addClass('disabled').attr('title', m);
                $('.image-table').find('.open-original-image').addClass('disabled').attr('title', m);
                $('.image-table').find('.btn-crop-image').addClass('disabled').attr('title', m);
                $('.image-table').find('.fake-input-file').addClass('disabled').attr('title', m);
                $('.image-table').find('a.image-tooltip').addClass('disabled').attr('title', m);
                $('.image-table').find('.remove-file').addClass('disabled').attr('title', m);
                $('.document-table').find('.remove-file').addClass('disabled').attr('title', m);
                $('.document-table').find('.download-document').addClass('disabled').attr('title', m);
                $('#tooltip').remove();
            }
        });
    }

    // убираем события с элементов у которых есть класс disabled
    $('body').on('click mouseover mouseout hover', '.disabled', function (e) {
        e.preventDefault();
        $('.disabled').unbind();
        return false;
    });

    // выделение всех для удаления
    $('body').on('click', '.select-all-for-delete', function (e) {
        if (!$(this).hasClass('disabled')) {
            if (!$(this).hasClass('all-selected')) {
                $(this).parent().parent().parent().parent().find('input[type="checkbox"]').attr('checked', 'checked');
                $(this).addClass('all-selected');
            } else {
                $('.image-table').parent().parent().parent().parent().find('input[type="checkbox"]').attr('checked', false);
                $(this).removeClass('all-selected');
            }
        }
    });

    // подтверждение удаления файла
    $('body').on('click', '.remove-file', function (e) {
        e.preventDefault();
        if ($(this).hasClass('disabled'))
            return false;
        if (confirm('Подтвердите удаление файла.')) {

            $mainContainer = $(this).closest('div.field-container');

            var data = new FormData;
            data.append('id', $(this).data('id'));
            data.append('data[fieldName]', $mainContainer.find('.ajax-field').val());
            data.append('data[namespace_to_attach]', $mainContainer.find('.ajax-namespace_to_attach').val());
            data.append('data[id_to_attach]', $mainContainer.find('.ajax-id').val());

            var $btn = $(this);

            $.ajax({
                url: core_file_ajax_remove_file,
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false
            }).done(function (json) {
                ajaxAlertResult(json, 'main', $mainContainer);
                var result = $.parseJSON(json);
                $btn.parent().parent('tr.main-row-collection').fadeOut(function () {
                    $(this).remove();
                    var mainRowCollection = $mainContainer.find('.image-table tbody tr.main-row-collection, .document-table tbody tr.main-row-collection');
                    if (mainRowCollection.size()) {
                        mainRowCollection.each(function (i) {
                            $(this).find('input').each(function () {
                                if (!$(this).hasClass('static')) {
                                    if (result.other !== undefined && (!result.other.indexBy || result.other.indexBy === undefined)) {
                                        if (this.id.match(/_\d+_/im)) {
                                            this.id = this.id.replace(/_\d+_/im, '_' + i + '_');
                                        }
                                        if (this.name.match(/\[\d+\]/im)) {
                                            this.name = this.name.replace(/\[\d+\]/im, '[' + i + ']');
                                        }
                                    }
                                    if ($(this).hasClass('file-indexPosition')) {
                                        this.value = i + 1;
                                    }
                                }
                            });
                        });
                    }

                    $('body').find('.image-table, .document-table').each(function () {
                        if (!$(this).find('tr.main-row-collection').size()) {
                            $(this).fadeOut(function () {
                                $(this).remove();
                            });
                        }

                    });
                });
            });
        } else {
            return false;
        }
    });

    $(function () {
        $('input[name="btn_update_and_edit"], input[name="btn_update_and_list"], input[name="btn_create_and_edit"], input[name="btn_create_and_list"], input[name="btn_create_and_create"]').on('click', function () {
            $('.ajax-image-upload-main').each(function () {
                if ($(this).attr('required') && $(this).closest('.field-container').find('.image-table').length) {
                    $(this).removeAttr('required');
                }
            });
            $('.ajax-document-upload-main').each(function () {
                if ($(this).attr('required') && $(this).closest('.field-container').find('.document-table').length) {
                    $(this).removeAttr('required');
                }
            });
        });
    });
}