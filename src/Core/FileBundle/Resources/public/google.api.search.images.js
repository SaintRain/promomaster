/**
 * Скрипт для работы с поиском картинок через интернет
 * Google Search API Images
 * https://developers.google.com/image-search/v1/jsondevguide
 * https://developers.google.com/web-search/docs/
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

(function($) {
    $.fn.hasScrollBar = function() {
        return this[0].scrollHeight > this[0].clientHeight;
    };
})(jQuery);

$(function() {

    var $mainContainer;

    // Инициализация окна-контейнера для помешения найденых картинок через интернет
    $('#google-api-search-images-container').dialog({
        modal: true,
        width: $(window).width() - 100,
        height: $(window).height() - 200,
        minWidth: 1000,
        minHeight: 300,
        autoOpen: false,
        show: {
            effect: "fade",
            duration: 300
        },
        hide: {
            effect: "fade",
            duration: 300
        },
        position: "center",
        open: function(event, ui) {
            $('.ui-dialog').css({position: 'fixed', top: 100});
        },
        resizeStop: function(event, ui) {
            $('.ui-dialog').css({position: 'fixed', top: 100});
        },
        dragStart: function(event, ui) {
            $('.ui-dialog').css({position: 'fixed', top: 100});
        }
    });

    var isLoading = false;
    var perPage = 8;
    var page = 1;
    var pageTotal = 0;
    var isRunAfterScrollVisible = false;
    var query = $('#gasi-query').val();
    var url = "//ajax.googleapis.com/ajax/services/search/images?v=1.0&imgsz=" + $('#gasi-imgsz').val() + "&rsz=" + perPage + "&start=0&q=" + query;

    // запрос на google, получеие данных о картинках
    function findImages() {
        if (query.replace(/ /, '').length === 0) {
            $('#gasi-previews').html('<h3>Введите запрос для поиска!</h3>');
            return;
        }

        if (isLoading || (page >= pageTotal && pageTotal !== 0)) {
            return;
        }
        isLoading = true;

        $.ajax({
            type: "GET",
            dataType: "JSONP",
            url: url,
        })
                .done(function(data) {
                    isLoading = false;
                    if (data.responseStatus === 200) {
                        var results = data.responseData.results;
                        if (results.length) {
                            for (i in results) {
                                var image = results[i];
                                src = image.unescapedUrl;
                                html = '<span class="gasi-item">';
                                html += '<span><a href="' + src + '" class="image-tooltip" onclick="return false;"><img src="' + image.tbUrl + '"></a></span>';
                                html += '<a href="' + src + '" target="_blank">' + image.width + 'x' + image.height + 'px' + '</a>';
                                html += '<input type="checkbox" value="' + src + '">';
                                html += '</span>';

                                if (/\.jpg|\.jpeg|\.png|\.gif/.test(src)) {
                                    $('#gasi-previews').append(html);
                                }

                                page = data.responseData.cursor.currentPageIndex + 1;
                                pageTotal = data.responseData.cursor.pages.length;
                                url = "//ajax.googleapis.com/ajax/services/search/images?v=1.0&imgsz=" + $('#gasi-imgsz').val() + "&rsz=" + perPage + "&start=" + (page * perPage) + "&q=" + query;

                                if (!$('#google-api-search-images-container').hasScrollBar()) {
                                    findImages();
                                } else if (false === isRunAfterScrollVisible) {
                                    findImages();
                                    isRunAfterScrollVisible = true;
                                }
                                initTooltip();
                            }
                        } else {
                            $('#gasi-previews').html('<h3>Картинки не были найдены!</h3>');
                        }
                    } else {
                        $('#gasi-previews').append('<h3>Ошибка ' + data.responseStatus + '! ' + data.responseDetails + '</h3>');
                        if (parseInt(data.responseStatus) === 503) {
                            $('#gasi-previews h3').after('<h4>Вы слишком часто выполняете запросы для поиска картинок! Подождите неськолько секунд и повторите поиск! Если ошибка не пропадет, подождите чуть больше!</h4>');
                        }
                    }
                });
    }

    // При прокрутке скрола в контейнере с картинками подгружаем новые
    $('#google-api-search-images-container').on('scroll', function() {
        if (250 > $(this)[0].scrollHeight - $(this).scrollTop() - $(this).height()) {
            findImages();
        }
    });

    // поиск картинок при клике на кнопку "Поиск"
    $('#gasi-search').on('click', function() {
        $('#gasi-previews').html('');
        query = $('#gasi-query').val();
        url = "//ajax.googleapis.com/ajax/services/search/images?v=1.0&imgsz=" + $('#gasi-imgsz').val() + "&rsz=" + perPage + "&start=0&q=" + query;
        page = 0;
        findImages();
    });

    $('#gasi-query').on('keyup', function(e) {
        if (e.keyCode === 13) {
            $('#gasi-search').trigger('click');
        }
    });

    // открытие окна для поиска при клике на "Поиск через интернет"
    $('body').on('click', '.google-api-search-images-btn', function() {

        if ($(this).hasClass('disabled')) {
            return false;
        }

        var idElement = $('#gasi-query').data('id-element-for-get-query');
        if (idElement !== undefined) {
            $('#gasi-query').val($('#' + idElement).val());
        }

        $('#gasi-previews').html('');
        query = $('#gasi-query').val();
        url = "//ajax.googleapis.com/ajax/services/search/images?v=1.0&imgsz=" + $('#gasi-imgsz').val() + "&rsz=" + perPage + "&start=0&q=" + query;
        page = 0;
        findImages();

        $('#google-api-search-images-container').dialog('open');

        $mainContainer = $('#field_container_' + $(this).data('form_id_field'));
    });

    // выделение и подсветка выбраных картинок
    $('body').on('click', '.gasi-item span, .gasi-item input', function() {
        $el = $(this).closest('.gasi-item');

        if ($mainContainer.find('.ajax-image-upload-main').attr('multiple') === undefined) {
            $('.gasi-item').removeClass('checked').find('input').prop('checked', false);
        }

        if ($el.hasClass('checked')) {
            $el.removeClass('checked').find('input').prop('checked', false);
        } else {
            $el.addClass('checked').find('input').prop('checked', true);
        }
    });

    // отправка выбраных фото на обработку
    $('#gasi-add').on('click', function() {

        var $els = $('#gasi-previews .gasi-item.checked input:checked');
        var countFiles = $els.length;
        countOfUploaded = 0;
        $mainContainer.find('.count-of-sended').text(countFiles < maxCountFiles ? countFiles : maxCountFiles);
        $mainContainer.find('.count-all-to-send').text(countFiles);

        // считаем по сколько процентов прибавлять в бар, за одно действие (действия: запрос отправки файлов, получение ответа с обработки файлов)
        percentByAction = Math.floor(100 / (Math.ceil(countFiles / maxCountFiles) * 4));
        statusBar($mainContainer.find('.progress-file'), 0);

        $('.fake-input-file-main, .form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').addClass('disabled');
        sendUrlFiles($els, $mainContainer);

    });
    function sendUrlFiles($els, $mainContainer) {

        if ($els.length) {

            var countFiles = $els.length;

            if (countFiles < countOfUploaded + maxCountFiles && countFiles > countOfUploaded) {
                countOfSending = countFiles - countOfUploaded;
            } else {
                countOfSending = maxCountFiles;
            }

            var formData = new FormData;

            $els.each(function(i) {
                if (i >= countOfUploaded && i < (countOfUploaded + countOfSending)) {
                    formData.append('CoreFileBundleInput[filesSrc][' + i + ']', $(this).val());
                }
            });

            formData.append('CoreFileBundleInput[form_id]', $mainContainer.find('.ajax-form_id').val());
            formData.append('CoreFileBundleInput[id]', $mainContainer.find('.ajax-id').val());
            formData.append('CoreFileBundleInput[type]', $mainContainer.find('.ajax-type').val());
            formData.append('CoreFileBundleInput[fieldName]', $mainContainer.find('.ajax-field').val());
            formData.append('CoreFileBundleInput[namespace_to_attach]', $mainContainer.find('.ajax-namespace_to_attach').val());
            formData.append('CoreFileBundleInput[namespace_to_insert]', $mainContainer.find('.ajax-namespace_to_insert').val());
            if ($mainContainer.find('.ajax-detect_dominant_color').val() && !$mainContainer.find('.main-row-collection').size()) {
                formData.append('CoreFileBundleInput[detect_dominant_color]', $mainContainer.find('.ajax-detect_dominant_color').val());
            }

            $mainContainer.find('.count-of-sended').text(countOfUploaded + countOfSending > countFiles ? countFiles : countOfUploaded + countOfSending);
            $mainContainer.find('.counter-of-files').show('fast');
            $mainContainer.find('.progress-file').show();
            statusBar($mainContainer.find('.progress-file'), percentByAction);

            $.ajax({
                type: "POST",
                data: formData,
                url: core_file_ajax_google_api_add,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(json) {
                var result = $.parseJSON(json);

                setDetectColorAndMainImg(result, $mainContainer);
                ajaxAlertResult(json, 'main', $mainContainer);

                countOfUploaded += countOfSending;
                if (countOfUploaded < countFiles) {
                    sendUrlFiles($els, $mainContainer);
                } else {
                    var $input = $mainContainer.find('.fake-input-file-main').next();
                    var count_of_attached_files = parseInt($input.data('count_of_attached_files'));
                    if (result.success) {
                        $input.data('count_of_attached_files', countOfUploaded + count_of_attached_files);
                    }

                    $('.fake-input-file-main').each(function() {
                        if (!($(this).next().attr('multiple') !== undefined || $(this).next().data('count_of_attached_files') < 1)) {
                            $(this).html('<span class="icon-trash icon-upload"></span> Загрузить другой');//removeClass('disabled');
                        }
                    });
                }

                if (result.success) {
                    createRow(result, $els, $mainContainer);
                }

                if (result.error) {
                    statusBar($mainContainer.find('.progress-file'), 100);
                    $('.fake-input-file-main, .form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').removeClass('disabled');
                }

            }).fail(function(){
                $mainContainer.find('.progress-file').hide();
                $mainContainer.find('.counter-of-files').hide();
                alert('Произошла ошибка при загрузке фото! \nРекомендуемые действия, нажмите на кнопку "Сохранить", если была изменена информация. \nИли просто перезагрузите страницу.');
                $('.fake-input-file-main, .form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').removeClass('disabled');
            });
            $('#google-api-search-images-container').dialog('close');
        } else {
            alert('Не выбрана ни одна картинка!');
        }
    }


});