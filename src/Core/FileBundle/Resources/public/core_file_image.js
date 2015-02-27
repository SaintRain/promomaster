/**
 * Скрипт для админского типа формы multiupload_image
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

var percentByAction = 0, // кол-во процентов за одно действие (отправка, прием запроса)
        countOfUploaded = 0, // кол-во загруженых файлов
        maxCountFiles = 5, // максимальное количество файлов для разовой загрузки (один запрос)
        cache = new Array();

$(function () {

    var jcrop_api, // плагин для кропа картинки
            boundx, //
            boundy, //
            xsize, // ширина превью-контейнера
            ysize, // длина превью-контейнера
            h, w, id,
            original = '', // путь к оригинальной картинке
            replace = '', // путь к заменяемой картинке
            maxWidthPreview = 260, // максимальная ширина превью-контейнера, чтобы не полезла верстка
            jccnt = $('#jcrop-container').html();
    disabledIfNew();
    initTooltip();

    // загрузка фото по ajax с главного инпута
    $('.ajax-image-upload-main').change(function () {
        if (this.files.length) {
            var $mainContainer = $('#field_container_' + $(this).data('form_id_field'));
            var files = this.files;
            var countFiles = files.length;
            countOfUploaded = 0;
            $mainContainer.find('.count-of-sended').text(countFiles < maxCountFiles ? countFiles : maxCountFiles);
            $mainContainer.find('.count-all-to-send').text(files.length);

            // считаем по сколько процентов прибавлять в бар, за одно действие (действия: запрос отправки файлов, получение ответа с обработки файлов)
            percentByAction = Math.floor(100 / (Math.ceil(files.length / maxCountFiles) * 4));
            statusBar($mainContainer.find('.progress-file'), 0);

            $('.fake-input-file-main,.form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').addClass('disabled');
            sendFiles(files, $mainContainer);
        }
    });

    function sendFiles(files, $mainContainer) {

        var countFiles = files.length;

        if (countFiles < countOfUploaded + maxCountFiles && countFiles > countOfUploaded) {
            countOfSending = countFiles - countOfUploaded;
        } else {
            countOfSending = maxCountFiles;
        }

        var formData = new FormData;
        for (i = countOfUploaded; i < (countOfUploaded + countOfSending); i++) {
            if (files[i] !== undefined) {
                formData.append('CoreFileBundleInput[filesToUpload][' + i + ']', files[i]);
            }
        }
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
            url: core_file_ajax_upload_file,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (json) {
            statusBar($mainContainer.find('.progress-file'), percentByAction);
            var result = $.parseJSON(json);

            setDetectColorAndMainImg(result, $mainContainer);
            ajaxAlertResult(json, 'main', $mainContainer);

            countOfUploaded += countOfSending;
            if (countOfUploaded < countFiles) {
                sendFiles(files, $mainContainer);
            } else {
                var $input = $mainContainer.find('.fake-input-file-main').next();
                var count_of_attached_files = parseInt($input.data('count_of_attached_files'));
                if (result.success) {
                    $input.data('count_of_attached_files', countOfUploaded + count_of_attached_files);
                }

                $('.fake-input-file-main').each(function () {
                    if (!($(this).next().attr('multiple') !== undefined || $(this).next().data('count_of_attached_files') < 1)) {
                        $(this).html('<span class="icon-trash icon-upload"></span> Загрузить другой');//removeClass('disabled');
                    }
                });
            }

            if (result.error) {
                statusBar($mainContainer.find('.progress-file'), 100);
                $('.fake-input-file-main, .form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').removeClass('disabled');
            }

            if (result.success) {
                createRow(result, files, $mainContainer);
            }

        }).fail(function () {
            $mainContainer.find('.progress-file').hide();
            $mainContainer.find('.counter-of-files').hide();
            alert('Произошла ошибка при загрузке фото!');
            $('.fake-input-file-main, .form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').removeClass('disabled');
        });
    }

    var jcWidth = $(window).width() - 200,
            jcHeight = $(window).height() - 200,
            namespace,
            field,
            isWatermark;

    // Инициализация окна-контейнера для помешения картинки
    $('#jcrop-container').dialog({
        modal: true,
        width: 'auto', //width: jcWidth,
        height: 'auto', //height: jcHeight,
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
        open: function (event, ui) {
            $('.ui-dialog').css({position: 'fixed', top: 100});
        }
    });

    // нажатие на кнопку отмена
    $('body').on('click', '#crop-cancel', function () {
        $('#jcrop-container').dialog('close');
    });

    // Закрытие диалогового окна по нажатию на Esc, т.к. стандартное перекрывает JCrop Plugin
    $(document).on('keyup', function (e) {
        if (e.keyCode === 27 || e.which === 27) {
            $('#jcrop-container').dialog('close');
        }
    });

    // нажате на кнопку Обрезать
    $('body').on('mousedown', '.btn-crop-image', function (e) {
        e.preventDefault();

        isWatermark = $(this).data('is-watermark');
        namespace = $(this).closest('.field-container').find('.ajax-namespace_to_attach').val();
        field = $(this).closest('.field-container').find('.ajax-field').val();

        if ($(this).hasClass('disabled'))
            return;

        var unix = new Date().getTime();
        id = $(this).data('id');

        // сбрасываем контейнер для кропа на начальное его состояние
        $('#jcrop-container').html(jccnt).find('table').hide();

        w = $(this).data('width');
        h = $(this).data('height');
        original = $(this).data('original');
        replace = $(this).data('replace');

        // изменяем заголовок окна-контейнера
        $('#jcrop-container').parent().find('.ui-dialog-title').text($('#jcrop-container').parent().find('.ui-dialog-title').text().replace(/\(.+\)/g, '(' + w + 'x' + h + 'px)'));

        // если ширина превью больше разрешенной, то ограничиваем для показа
        if (w > maxWidthPreview) {
            ysize = h / w * maxWidthPreview;
            xsize = maxWidthPreview;
        } else {
            ysize = h;
            xsize = w;
        }

        // проставляем стили для контейнера предпросмотра превью
        $('.preview-container').css({
            width: xsize,
            height: ysize
        });

        // выставляем путь к оригинальной картинке
        var img = new Image()
        img.src = original;

        img.onload = function () {

            var canvas = document.createElement('canvas');

            k1 = h / w;
            Wr = this.width;
            Hr = h + (this.width - w) * k1;
            if (Hr < this.height) {
                Hd = this.height - Hr;
                Hr = this.height;
                Wr = Wr + (Hd) / k1;
            }

            c = {
                y: (Hr - this.height) / 2,
                x: (Wr - this.width) / 2
            };

            canvas.width = Wr;
            canvas.height = Hr;

            var ctx = canvas.getContext('2d');
            ctx.fillStyle = $('.image-for-crop').data('background');
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(this, c.x, c.y);

            var base64 = canvas.toDataURL();
            $('.image-for-crop').attr('src', base64);

            // атачим плагин jcrop
            $('#jcrop-target').Jcrop({
                boxWidth: jcWidth - 100 - ysize,
                boxHeight: jcHeight - 100,
                aspectRatio: xsize / ysize,
                createHandles: ['nw', 'ne', 'se', 'sw'],
                onChange: updatePreviewAndSetCoords,
                onSelect: updatePreviewAndSetCoords,
                onRelease: clearCoords
            }, function () {
                var bounds = this.getBounds();
                boundx = bounds[0];
                boundy = bounds[1];
                jcrop_api = this;
            });

            $halfW = canvas.width / 2;
            $halfH = canvas.height / 2;
            jcrop_api.setSelect([$halfW / 2, $halfH / 2, $halfW + $halfW / 2, $halfH + $halfH / 2]);
            jcrop_api.release();

            $('#jcrop-container').find('table').show();
            $('#jcrop-container').dialog('open');
        };
        // открываем окно-контейнер для кропа

//        e.stopPropogation();
    });

    // Функция для обновления предпросмотра превью и установки координат для обрезки
    function updatePreviewAndSetCoords(c) {

        // для превью
        if (parseInt(c.w) > 0) {
            var rx = xsize / c.w;
            var ry = ysize / c.h;
            $('.jcrop-preview').css({
                width: Math.round(rx * boundx) + 'px',
                height: Math.round(ry * boundy) + 'px',
                marginLeft: '-' + Math.round(rx * c.x) + 'px',
                marginTop: '-' + Math.round(ry * c.y) + 'px'
            });
        }

        // установка координат
        $('#coords-x1').val(parseInt(c.x));
        $('#coords-y1').val(parseInt(c.y));
        $('#coords-x2').val(parseInt(c.x2));
        $('#coords-y2').val(parseInt(c.y2));
        $('#coords-w').val(parseInt(c.w));
        $('#coords-h').val(parseInt(c.h));
    }

    // функция очищает проставленные координаты
    function clearCoords() {
        $('#coords input').val('');
    }

    // нажатие на кнопку отмена
    $('body').on('click', '#crop-ok', function () {
        var coords = {};

        // получаем выбранные координаты
        $('.coords-for-crop').each(function () {
            coords[this.id.replace(/coords-/, '')] = parseInt(this.value);
        });

        // если есть высота и ширина новой у картинки выполняем запрос на кроп
        if (coords.w > 0 && coords.h > 0) {
            coords.w = w;
            coords.h = h;

            var data = {
                coords: coords,
                isWatermark: isWatermark,
                class: namespace,
                field: field
            };

            if (original !== '') {
                data.original = original;
            }

            if (replace !== '') {
                data.replace = replace;
            }

            data.action = 'crop';
            $.ajax({
                url: core_file_ajax_replace_image,
                type: 'POST',
                data: {data: data}
            }).done(function (json) {
                ajaxAlertResult(json, id, $(this).closest('div.field-container'));
                updateLinks(id);
                $('#jcrop-container').dialog('close');
            });
        }
    });

    // загрузка фото по ajax
    $('body').on('change', '.ajax-image-upload', function () {
        files = this.files;
        var data = new FormData;
        var isOriginal = $(this).hasClass('original-file');
        var imageOriginal = new Image();
        $mainContainer = $(this).closest('div.field-container');
        imageOriginal.src = $(this).data('replace');
        var $parent = $(this).parents('td').find('.width-and-height');
        id = $(this).data('id');
        data.append('original', files[0]);
        data.append('data[id]', $mainContainer.find('.ajax-id').val());
        data.append('data[attach]', $mainContainer.find('.ajax-namespace_to_attach').val());
        data.append('data[action]', 'replace');
        data.append('data[coords][w]', $(this).data('width'));
        data.append('data[coords][h]', $(this).data('height'));
        data.append('data[replace]', $(this).data('replace'));
        if ($mainContainer.find('.ajax-detect_dominant_color').val()) {
            data.append('data[detect_dominant_color]', $mainContainer.find('.ajax-detect_dominant_color').val());
        }

        $.ajax({
            url: core_file_ajax_replace_image,
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (json) {
            ajaxAlertResult(json, id);
            updateLinks(id);
            if (isOriginal) {
                imageOriginal.src = imageOriginal.src + '?' + new Date().getTime();
                imageOriginal.onload = function () {
                    $parent.text(imageOriginal.width + 'x' + imageOriginal.height + 'px');
                };
            }
            $('#jcrop-container').dialog('close');
        });
    });

    // функция для обнавления ссылок, чтобы картинки не грузились из кеша
    function updateLinks(id) {
        if ($('#form-' + id).length > 0) {
            var unix = new Date().getTime();
            $('#form-' + id + ' a').each(function () {
                if (this.href.length > 0) {
                    this.href = this.href.replace(/\?.+/, '') + '?' + unix;
                }
            });
            $('#form-' + id + ' img').each(function () {
                if (this.src.length > 0) {
                    this.src = this.src.replace(/\?.+/, '') + '?' + unix;
                }
            });
        }
    }

    // проверяем наличие картинок у строк таблицы, если не показаны, то ищем в массиве-сессии превью в формате base64
    $('.image-table tbody tr.main-row-collection').each(function (i) {

        var $img = $(this).find('img.main-preview'),
                fileName = $(this).find('input[type="hidden"].file-name').val();
        if ($img.attr('src') === '' && typeof imageInBase64 !== 'undefined') {
            if (imageInBase64[fileName] !== undefined) {
                $img.attr('src', imageInBase64[fileName]);
            }
        }
    });
});

// добавление новой строки
function createRow(result, files, $mainContainer) {

    statusBar($mainContainer.find('.progress-file'), percentByAction);
    var form_id_field = $mainContainer.find('.ajax-image-upload-main').data('form_id_field');
    if (cache[$mainContainer.attr('id')]) {
        cacheCreateRow(cache[$mainContainer.attr('id')], result, files, $mainContainer);
        $('div#field_container_' + form_id_field + ' tbody.sonata-ba-tbody').trigger('sonata.add_element');
    } else {
        // ajax запрос на получение новой строки
        $.ajax({
            url: sonata_admin_append_form_element_image[form_id_field],
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
                .replace(/data-id=""/g, 'data-id="' + id + '"')
                .replace(/src=".+?"/g, 'src=""')
                .replace(/href=".+?"/g, 'href=""');
        // добавление новой строки
        html = $('<div/>').attr('id', 'htmlToAppend').html(html);

        nextNumber = $mainContainer.find('.image-table tbody tr.main-row-collection').size();
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

        if ($mainContainer.find('.image-table').size()) {
            var htmlToAppend = html.find('.image-table tbody tr.main-row-collection:last').html();
            $mainContainer.find('.image-table tbody.sonata-ba-tbody').prepend('<tr class="main-row-collection">' + htmlToAppend + '</tr>');
        } else {
            var htmlToAppend = html.find('.field-container-tbl').html();
            var oneRow = html.find('.image-table tbody tr.main-row-collection:last').html();
            $mainContainer.find('.field-container-tbl').html(htmlToAppend).find('.image-table tbody').html('<tr class="main-row-collection">' + oneRow + '</tr>');
        }
        $('#htmlToAppend').remove();

        // разбираем полученый ответ и проставляем необходимые атрибуты для некоторых элементов
        var $el = $mainContainer.find('.image-table tbody tr:first');
        var path, dir, prefix;
        if ($mainContainer.find('.ajax-id').val() !== '0') {
            for (path in data[id]) {
                for (dir in data[id][path]) {
                    for (prefix in data[id][path][dir]) {
                        var className = dir + '-' + prefix;
                        var name = data[id][path][dir][prefix];
                        if (dir === 'original') {
                            var original = '/' + path + '/' + dir + '/' + prefix + name;
                        }
                        var imgUrl = '/' + path + '/' + dir + '/' + prefix + name;
                        $el.find('a.' + className).attr('href', imgUrl);
                        $el.find('img.' + className).attr('src', imgUrl);
                        $el.find('*[data-replace="/"].' + className).attr('data-replace', imgUrl);
                        $el.find('*[data-original="/"].' + className).attr('data-original', original);
                        $el.find('input.file-name').attr('value', name.replace(/_\d+\./g, '.'));
                        /*
                         if (size != 'undefined') {
                         $el.find('input.file-size').attr('value', size);
                         $el.find('span.human-size').text(getHumanFileSizeFilter(size));
                         }
                         */
                    }
                }
            }
            if (original !== undefined) {
                var imageOriginal = new Image();
                imageOriginal.src = original;
                imageOriginal.onload = function () {
                    var src = this.src.replace(new RegExp(location.protocol + '//' + location.host), '');
                    $('a.main-image-tooltip[href="' + src + '"]').html('<span class="width-and-height">' + this.width + 'x' + this.height + 'px</span>');
                };
            }
        } else {

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

    // показываем превью картинки если связной объект новый
    if (parseInt($mainContainer.find('.ajax-id').val()) === 0) {
        $mainContainer.find('.image-table tbody tr.main-row-collection').each(function (i) {
            var $img = $(this).find('img');
            var $inputName = $(this).find('input.file-name');

            if ($inputName.val() === '') {
                $inputName.val(data[i]['name']);
            }

            if ($img.attr('src') === '') {
                if (result.other !== undefined) {
                    if (result.other.imginfo !== undefined) {
                        if (result.other.imginfo[data[i]['name']]['base64'] !== undefined) {
                            $img.width(100).attr('src', result.other.imginfo[data[i]['name']]['base64']);
                            $(this).find('a.main-image-tooltip').html('<span class="width-and-height">' + result.other.imginfo[data[i]['name']]['imageSize'] + '</span>');
                        }
                    }
                }
            }
        });
    }

    // меняю атрибуты у id и name для правильного соответствия их в коллекции
    $mainContainer.find('.image-table tbody tr.main-row-collection').each(function (i) {
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
        $('.fake-input-file-main, .form-actions input, .form-actions a, input[name="btn_update_and_edit"], input[name="btn_update_and_list"],.google-api-search-images-btn').removeClass('disabled');
    }
    // если загрузка картинки началась после того как нажали на кнопку определения цвета из картинки, то по завершению загрузки открываем окно выьора цвета
    if ($('.icd-btn-click-color').size() && icdBtnClick === true) {
        $('.icd-btn-click-color').trigger('click');
        icdBtnClick = false;
    }
    if (parseInt($mainContainer.find('.ajax-id').val()) !== 0) {
        initTooltip();
    }
    disabledIfNew();

}

// всплывающее окно при наведении на кнопу просмотра фото
function initTooltip() {
    $('.image-tooltip').tooltip({
        delay: 300,
        showURL: false,
        collision: "fit",
        bodyHandler: function () {
            if (this.href) {
                return $('<img/>').attr('src', this.href);
            }
        }
    });
}

// устанавливаем найдены цвет и главную фотку
function setDetectColorAndMainImg(result, $mainContainer) {
    if (result.other) {
        if (!$mainContainer.find('.main-row-collection').size()) {
            if (result.other.dominantColor) {
                $('.detected-dominant-color').val(result.other.dominantColor).trigger('change');
            }
        }

        if (result.other.imageMainInBase64) {
            imageMainInBase64 = result.other.imageMainInBase64;
        }
    }
}