/**
 * Скрипт для админского типа формы multiupload_document
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
$(function () {

    var
            id, // ид рабочей записи объекта CommonFile
            countOfUploaded = 0, // кол-во загруженых файлов
            maxCountFiles = 5, // максимальное количество файлов для разовой загрузки (один запрос)
            percentByAction = 0, // кол-во процентов за одно действие (отправка, прием запроса)
            cache = new Array();

    // загрузка по ajax
    $('.ajax-document-upload-main').change(function () {
        if (this.files.length) {
            var $mainContainer = $('#field_container_' + $(this).data('form_id_field'));
            var documents = this.files;
            var countDocuments = documents.length;
            countOfUploaded = 0;
            $mainContainer.find('.count-of-sended').text(countDocuments < maxCountFiles ? countDocuments : maxCountFiles);
            $mainContainer.find('.count-all-to-send').text(documents.length);

            // считаем по сколько процентов прибавлять в бар, за одно действие (действия: запрос отправки файлов, получение ответа с обработки файлов)
            percentByAction = Math.floor(100 / (Math.ceil(documents.length / maxCountFiles) * 4));
            statusBar($mainContainer.find('.progress-file'), 0);

            $('.field-container').each(function () {
                $(this).find('.fake-input-file-main').addClass('disabled');
            });
            $('.form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').addClass('disabled');
            sendDocuments(documents, $mainContainer);
        }
    });

    function sendDocuments(documents, $mainContainer) {


        var countDocuments = documents.length;

        if (countDocuments < countOfUploaded + maxCountFiles && countDocuments > countOfUploaded) {
            countOfSending = countDocuments - countOfUploaded;
        } else {
            countOfSending = maxCountFiles;
        }

        var formData = new FormData;
        for (i = countOfUploaded; i < (countOfUploaded + countOfSending); i++) {
            if (documents[i] !== undefined) {
                formData.append('CoreFileBundleInput[filesToUpload][' + i + ']', documents[i]);
            }
        }
        formData.append('CoreFileBundleInput[form_id]', $mainContainer.find('.ajax-form_id').val());
        formData.append('CoreFileBundleInput[id]', $mainContainer.find('.ajax-id').val());
        formData.append('CoreFileBundleInput[type]', $mainContainer.find('.ajax-type').val());
        formData.append('CoreFileBundleInput[fieldName]', $mainContainer.find('.ajax-field').val());
        formData.append('CoreFileBundleInput[namespace_to_attach]', $mainContainer.find('.ajax-namespace_to_attach').val());
        formData.append('CoreFileBundleInput[namespace_to_insert]', $mainContainer.find('.ajax-namespace_to_insert').val());
        $mainContainer.find('.counter-of-documents').show('fast');
        $mainContainer.find('.progress-file').show();
        statusBar($mainContainer.find('.progress-file'), percentByAction);
        $.ajax({
            url: core_file_ajax_upload_file,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (json) {
            statusBar($mainContainer.find('.progress-file'), percentByAction);
            var result = $.parseJSON(json);
            ajaxAlertResult(json, 'main', $mainContainer);
            countOfUploaded += countOfSending;
            if (result.success) {
                $mainContainer.find('.count-of-sended').text(countOfUploaded > countDocuments ? countDocuments : countOfUploaded);
                createRow(result, documents, $mainContainer);
            }
            if (countOfUploaded < countDocuments) {
                sendDocuments(documents, $mainContainer);
            } else {
                var $input = $mainContainer.find('.fake-input-file-main').next();
                var count_of_attached_files = parseInt($input.data('count_of_attached_files'));
                if (result.success) {
                    $input.data('count_of_attached_files', countOfUploaded + count_of_attached_files);
                }

                $('.field-container').each(function () {
                    var $btn = $(this).find('.fake-input-file-main');
                    if (!($btn.next().attr('multiple') !== undefined || $btn.next().data('count_of_attached_files') < 1)) {
                        $btn.html('<span class="icon-trash icon-upload"></span> Загрузить другой');
                    }
                });
            }

            if (result.error) {
                statusBar($mainContainer.find('.progress-file'), 100);
                $('.fake-input-file-main, .form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').removeClass('disabled');
            }
        }).fail(function () {
            $mainContainer.find('.progress-file').hide();
            $mainContainer.find('.counter-of-files').hide();
            alert('Произошла ошибка при загрузке файла!');
            $('.fake-input-file-main, .form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').removeClass('disabled');
        });
    }

    // добавление новой строки
    function createRow(result, files, $mainContainer) {
        statusBar($mainContainer.find('.progress-file'), percentByAction);
        var form_id_field = $mainContainer.find('.ajax-document-upload-main').data('form_id_field');
        if (cache[$mainContainer.attr('id')]) {
            cacheCreateRow(cache[$mainContainer.attr('id')], result, files, $mainContainer);
            $('div#field_container_' + form_id_field + ' tbody.sonata-ba-tbody').trigger('sonata.add_element');
        } else {
            // ajax запрос на получение новой строки
            $.ajax({
                url: sonata_admin_append_form_element_documents[form_id_field],
                type: "POST",
                dataType: 'html',
                data: {_xml_http_request: true}
            }).done(function (htmlResponse) {
                cache[$mainContainer.attr('id')] = htmlResponse;
                cacheCreateRow(htmlResponse, result, files, $mainContainer);
                $('div#field_container_' + form_id_field + ' tbody.sonata-ba-tbody').trigger('sonata.add_element');
            }).fail(function () {
                $mainContainer.find('.progress-file').hide();
                $mainContainer.find('.counter-of-files').hide();
                alert('Произошла ошибка при построении таблицы вывода!');
                $('.fake-input-file-main, .form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').removeClass('disabled');
            });
        }
    }

    function cacheCreateRow(htmlResponse, result, files, $mainContainer) {
        var data = result.data;
        statusBar($mainContainer.find('.progress-file'), percentByAction);
        for (id in data) {
            // очищаем полученый код от лишнего и заменяем id записи
            html = htmlResponse
                    .replace(/<\!-- clear -->([\s\S]*?)<\!-- \/clear -->/im, '')
                    .replace(/form-\d+/g, 'form-' + id)
                    .replace(/form-/g, 'form-' + id)
                    .replace(/error-\d+/g, 'error-' + id)
                    .replace(/error-/g, 'error-' + id)
                    .replace(/success-\d+/g, 'success-' + id)
                    .replace(/success-/g, 'success-' + id)
                    .replace(/data-id="\d+"/g, 'data-id="' + id + '"')
                    .replace(/data-id="?"/g, 'data-id="' + id + '"');
            // добавление новой строки
            html = $('<div/>').attr('id', 'htmlToAppend').html(html);

            nextNumber = $mainContainer.find('.document-table tbody tr.main-row-collection').size();
            if (result.other) {
                if (result.other.indexBy) {
                    nextNumber = id;
                }
            }
            html.find('input').each(function (i) {
                if (!$(this).hasClass('static')) {
                    if (this.id.match(/_\d+_/im)) {
                        this.id = this.id.replace(/_\d+_/im, '_' + nextNumber + '_');
                    }
                    if (this.name.match(/\[\d+\]/im)) {
                        this.name = this.name.replace(/\[\d+\]/im, '[' + nextNumber + ']');
                    }
                }
            });

            if ($mainContainer.find('.document-table').size()) {
                var htmlToAppend = html.find('.document-table tbody tr.main-row-collection:last').html();
                $mainContainer.find('.document-table tbody.sonata-ba-tbody').prepend('<tr class="main-row-collection">' + htmlToAppend + '</tr>');
            } else {
                var htmlToAppend = html.find('.field-container-tbl').html();
                var oneRow = html.find('.document-table tbody tr.main-row-collection:last').html();
                $mainContainer.find('.field-container-tbl').html(htmlToAppend).find('.document-table tbody').html('<tr class="main-row-collection">' + oneRow + '</tr>');
            }
            $('#htmlToAppend').remove();

            // разбираем полученый ответ и проставляем необходимые атрибуты для некоторых элементов
            var $el = $mainContainer.find('.document-table tbody tr:first');
            var path;
            if ($mainContainer.find('.ajax-id').val() !== '0') {
                for (path in data[id]) {
                    var name = data[id][path]['name'];
                    var size = data[id][path]['size'];
                    $el.find('input.file-name').val(name.replace(/_\d+\./g, '.'));
                    $el.find('span.file-name-text').text(name.replace(/_\d+\./g, '.'));
                    $el.find('input.file-size').val(size);
                    $el.find('span.human-size').text(getHumanFileSizeFilter(size));
                    $el.find('a.download-document').attr('href', '/' + path + '/' + name).removeClass('disabled');
                }
            } else {
                $el.find('a.download-document').addClass('disabled');
                $el.find('.remove-file').addClass('disabled');
                $el.find('input.file-name').val(data[id]['name']);
                $el.find('span.file-name-text').text(data[id]['name'].replace(/.+#/, ''));
                $el.find('span.human-size').text(getHumanFileSizeFilter(data[id]['size']));
                $el.find('input.file-size').val(data[id]['size']);
            }

            // подсветка добавленых картинок
            $el.effect('highlight', {'color': '#DFF0D8'}, 2000);
        }

        if ($mainContainer.find('.select-all-for-delete').size() === 0 && $mainContainer.find('tr.main-row-collection').size() > 1) {
            $mainContainer.find('tr.main-row-collection:last').remove();
            $mainContainer.find('tr.main-row-collection:first').find('input').each(function (i) {
                if (!$(this).hasClass('static')) {
                    if (this.id.match(/_1_/im)) {
                        this.id = this.id.replace(/_\d+_/im, '_0_');
                    }
                    if (this.name.match(/\[1\]/im)) {
                        this.name = this.name.replace(/\[\d+\]/im, '[0]');
                    }
                }
            });
        }

        // меняю атрибуты у id и name для правильного соответствия их в коллекции
        $mainContainer.find('.document-table tbody tr.main-row-collection').each(function (i) {
            $(this).find('input').each(function () {
                if (!$(this).hasClass('static')) {
                    if ($(this).hasClass('file-indexPosition')) {
                        this.value = i + 1;
                    }
                }
            });
        });
        if (countOfUploaded >= files.length) {
            statusBar($mainContainer.find('.progress-file'), 100);
            $('.fake-input-file-main,.form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').removeClass('disabled');
        }
        disabledIfNew();
    }
});