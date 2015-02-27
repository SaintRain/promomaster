/**
 * Скрипт для типа формы multiupload_document_frontend
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

if (!window.jQuery) {
    alert('Необходимо подключить библиотеку jQuery!');
} else {
    $(function () {
        var $CoreFileContainer,
            timeout, // таймер
            filesToUpload = new Array(), // масссив файлов для загрузки
            countOfUploaded = 0, // кол-во загруженых файлов
            maxCountFiles = 5; // максимальное количество файлов для разовой загрузки (один запрос)

        $('body').on('click', '.fake-input-file', function (e) {
            if (!$(this).hasClass('disabled')) {
                e.preventDefault();
                $(this).next('input[type="file"]').trigger('click');
            }
        });

        $('.CoreFileContainer').each(function () {
            var $input = $(this).find('.ajax-file');
            if ($input.attr('multiple') === undefined && $input.data('count_of_attached_files') >= 1) {
                //$(this).find('.fake-input-file').addClass('disabled');
            }

        });

        $('body').on('change', '.ajax-file', function (e) {
            if (this.files.length) {
                $CoreFileContainer = $(this).parent('.CoreFileContainer');
                filesToUpload = this.files;
                var countFiles = filesToUpload.length;
                countOfUploaded = 0;
                $CoreFileContainer.find('.count-of-sended').text('0');
                $CoreFileContainer.find('.count-of-sended').text(countFiles < maxCountFiles ? countFiles : maxCountFiles);
                $CoreFileContainer.find('.count-all-to-send').text(filesToUpload.length);
                $CoreFileContainer.find('.fake-input-file').addClass('disabled');
                $CoreFileContainer.find('.CoreFileCounter').fadeIn('fast');

                sendFiles();
            }
        });

        function sendFiles() {

            var countFiles = filesToUpload.length;

            if (countFiles < countOfUploaded + maxCountFiles && countFiles > countOfUploaded) {
                countOfSending = countFiles - countOfUploaded;
            } else {
                countOfSending = maxCountFiles;
            }

            var formData = new FormData;
            for (i = countOfUploaded; i < (countOfUploaded + countOfSending); i++) {
                if (filesToUpload[i] !== undefined) {
                    formData.append('CoreFileBundleInput[filesToUpload][' + i + ']', filesToUpload[i]);
                }
            }
            formData.append('CoreFileBundleInput[form_id]', $CoreFileContainer.find('.ajax-form_id').val());
            formData.append('CoreFileBundleInput[id]', $CoreFileContainer.find('.ajax-id').val());
            formData.append('CoreFileBundleInput[type]', $CoreFileContainer.find('.ajax-type').val());
            formData.append('CoreFileBundleInput[fieldName]', $CoreFileContainer.find('.ajax-field').val());
            formData.append('CoreFileBundleInput[namespace_to_attach]', $CoreFileContainer.find('.ajax-namespace_to_attach').val());
            formData.append('CoreFileBundleInput[namespace_to_insert]', $CoreFileContainer.find('.ajax-namespace_to_insert').val());

            $.ajax({
                url: core_file_ajax_upload_file,
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function (json) {
                var result = $.parseJSON(json),
                    href = '', // ссылка на файл
                    name = ''; // название файла
                var path, dir, prefix;
                $CoreFileContainer.find('.CoreFileCounter').slideUp('fast');
                ajaxAlertResult(json, 'main', $CoreFileContainer);
                countOfUploaded += countOfSending;
                if (result.success) {
                    $CoreFileContainer.find('.count-of-sended').text(countOfUploaded > countFiles ? countFiles : countOfUploaded);
                    for (key in result.data) {
                        if (result.data[key] !== null && typeof result.data[key] === 'object') {
                            if (result.data[key]['name']) {
                                name = result.data[key]['name'];
                            } else {
                                for (path in result.data[key]) {
                                    if (!result.data[key][path]['name'] && !result.data[key][path]['size']) {
                                        for (dir in result.data[key][path]) {
                                            if (dir === 'original') {
                                                for (prefix in result.data[key][path][dir]) {
                                                    name = result.data[key][path][dir][prefix];
                                                    href = '/' + path + '/' + dir + '/' + prefix + name;
                                                }
                                            }
                                        }
                                    } else {
                                        name = result.data[key][path]['name'];
                                        href = '/' + path + '/' + name;
                                    }
                                }
                            }
                        } else {
                            name = result.data[key];
                        }

                        if ( $CoreFileContainer.find('.CoreFileAttached ul li').length>1) {
                            $CoreFileContainer
                                .find('.CoreFileAttached ul li:not(:last)').remove();
                        }

                        //для изображений делаем свой стиль
                        //работает для OneToOne
                        if (typeof result.isNew !=='undefined' && result.type=='image') {
                            var base64 = result.other.imginfo[result.data[0].name].base64,
                                img = '<img style="margin-top: 5px;max-height: 200px;" src="' + base64 + '"/>',
                                size='Размер '+ result.extraImg.height+'x'+result.extraImg.width;

                            $newEl= $CoreFileContainer
                                .find('.CoreFileAttached ul li:last')
                                .clone()
                                .prependTo($CoreFileContainer.find('.CoreFileAttached ul'))
                                .fadeIn('fast')
                                .removeClass('hidden');

                            $newEl.find('span.file-attachment')
                                .html(img);

                            $newEl.find('span.download')
                                .hide();


                            $newEl.find('span.size')
                                .text(size);
                        }
                        else if (typeof result.isNew ==='undefined' && result.type=='image') {
                            var
                                img = '<img style="margin-top: 5px;max-height: 200px;" src="/' + result.extraImg.path + '/original/original_' + result.data[result.extraImg.id][result.extraImg.path].original.original_ + '"/>',
                                size='Размер '+ result.extraImg.height+'x'+result.extraImg.width;

                            $newEl= $CoreFileContainer
                                .find('.CoreFileAttached ul li:last')
                                .clone()
                                .prependTo($CoreFileContainer.find('.CoreFileAttached ul'))
                                .fadeIn('fast')
                                .removeClass('hidden');

                            $newEl
                                .find('span.file-attachment')
                                .html(img);

                            $newEl.find('span.size')
                                .text(size);
                        }

                        else {
                            var $newEl=$CoreFileContainer
                                .find('.CoreFileAttached ul li:last')
                                .clone()
                                .prependTo($CoreFileContainer.find('.CoreFileAttached ul'))
                                .fadeIn('fast')
                                .removeClass('hidden');

                            $newEl.find('span.file-name')
                                .text(name.replace(/_\d+\./g, '.').replace(/.+#/g, ''));

                            if (typeof result.isNew!=='undefined') {
                            $newEl.find('span.download')
                                    .hide();
                            }
                        }

                        if (!$CoreFileContainer.find('.ajax-id').val()) {
                            $CoreFileContainer
                                .find('.CoreFileAttached ul li:first')
                                .find('span.file-remove')
                                .attr('data-hash', name)
                                .parent('li')
                                .find('a.file-link')
                                .remove();
                        } else {
                            $CoreFileContainer
                                .find('.CoreFileAttached ul li:first')
                                .find('span.file-remove')
                                .attr('data-id', key)
                                .parent('li')
                                .find('a.file-link')
                                .attr('href', href);
                        }


                    }
                }
                if (countOfUploaded < countFiles) {
                    sendFiles();
                } else {
                    var $input = $CoreFileContainer.find('.ajax-file');
                    var count_of_attached_files = parseInt($input.data('count_of_attached_files'));
                    $input
                        .removeAttr('value')
                        .data('count_of_attached_files', countOfUploaded + count_of_attached_files);
                    $CoreFileContainer.find('.fake-input-file').removeClass('disabled');
                    $CoreFileContainer.find('.ajax-file').val('');
                }
            }).fail(function () {
                alert('Произошла ошибка при загрузке файла!');
                $CoreFileContainer.find('.fake-input-file').removeClass('disabled');
                $CoreFileContainer.find('.ajax-file').val('');
            });
        }

        // Функция для отображения результата ajax запроса
        function ajaxAlertResult(json, id, $CoreFileContainer) {
            var result = $.parseJSON(json);
            var type = 'success';


            if (result.error) {
                type = 'error';
                $CoreFileContainer.find('.disabled').removeClass('disabled');
            }

            var el;
            if (timeout) {
                clearTimeout(timeout);
            }
            $('.hide-by-timer').hide();
            if (result[type]) {
                if (id === 'main') {
                    el = $CoreFileContainer.find('.ajax-' + type + '-' + id);
                } else {
                    el = $('.ajax-' + type + '-' + id);
                }
                el.html(result[type].join('<br>')).removeClass('hidden').css('visibility', 'visible').slideDown('fast');


                timeout = setTimeout(function () {
                    el.html(result[type].join('<br>')).slideUp('fast');
                }, el.data('hide-after') * 1000);
            }
        }


        $('body').on('click', '.file-remove', function (e) {
            if (confirm('Подтвердите удаление файла.')) {
                var $this = $(this),
                    formData = new FormData,
                    hash = $(this).data('hash'),
                    id = $(this).data('id'),
                    $CoreFileContainer = $(this).closest('.CoreFileContainer');
                if (hash) {
                    formData.append('hash', hash);
                } else {
                    formData.append('id', id);
                }

                formData.append('data[form_id]', $CoreFileContainer.find('.ajax-form_id').val());
                formData.append('data[fieldName]', $CoreFileContainer.find('.ajax-field').val());
                formData.append('data[namespace_to_attach]', $CoreFileContainer.find('.ajax-namespace_to_attach').val());
                formData.append('data[namespace_to_insert]', $CoreFileContainer.find('.ajax-namespace_to_insert').val());

                $.ajax({
                    url: core_file_ajax_remove_file,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (json) {
                    ajaxAlertResult(json, 'main', $CoreFileContainer);
                    $this.closest('li').fadeOut(function () {
                        $(this).remove();
                    });
                });
            }
        });
    });
}