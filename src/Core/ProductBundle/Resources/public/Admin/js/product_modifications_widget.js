
/**
 * Для модификаций
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
var selectedModRows = [];
function reloadModificationsDialogContainer(url, field_id) {
    $.get(url,
            null, function(res) {
        setModificationsFormContentHtml(res, field_id);
    });
}

function setModificationsFormContentHtml(html, field_id) {
    //создаём динамически элемент
    if (!$("body#dialogModificationsContainer").length) {
        $("body").append('<div class="hide" id="dialogModificationsContainer"></div>');
    }

    $('#dialogModificationsContainer').html(html);
    $('#dialogModificationsContainer').dialog({width: 1700, height: 800, modal: true, title: "Выбор записи"});
    setToModificationsFormAjaxAction(field_id);
    Admin.add_filters(document);
    Admin.setup_select2(document);
}

/**
 * В окне выбора записи для ссылок и фильтр-формы ставит ajax-обработчик
 * @param {type} field_id
 * @returns {undefined}
 */
function setToModificationsFormAjaxAction(field_id) {

    var options = eval(field_id + '_options');
    var container = $('#dialogModificationsContainer');
    container.find('.sonata-ba-list-field-header-batch').remove();
    container.find('.sonata-ba-list-field-batch').remove();

    //отмечаем записи, которые уже были добавлены в объединение
    for (var key in options.data) {
        var d = options.data[key];
        container.find('td.sonata-ba-list-field-select[objectid="' + d.id + '"]').html('<img class="okImage" title="Уже выбрано" src="/bundles/coreproduct/Admin/img/ok.png"/>');
    }

    //удаляем из списка запись на которой находимся
    if (options.options.options.hideSubjectInList) {
        container.find('td.sonata-ba-list-field-select[objectid="' + options.options.subject_id + '"]').parent('tr').remove();
    }

    //клик на выборку/открепления записи
    container.find('td.sonata-ba-list-field').click(function(event) {
        event.preventDefault();
        event.stopPropagation();
        var objectid = $(this).attr('objectid');
        if (typeof selectedModRows[objectid] === 'undefined' || !selectedModRows[objectid]) {
            if (typeof options.data[objectid] === 'undefined') {
                selectModificationsRow(container, objectid, field_id);
            }
            else {
                unselectModificationsRow(container, objectid, field_id);
            }
        }
    });

    container.find('a').click(function(event) {
        if ($(this).parents('td.sonata-ba-list-field').length > 0) {
            event.preventDefault();
        }
        else {
            var url = $(this).attr('href');
            if (url !== '#') {
                event.preventDefault();
                reloadModificationsDialogContainer(url, field_id);
            }
        }
    });

    container.find('form.sonata-filter-form ').ajaxForm({type: 'get', success: function(data) {
            setModificationsFormContentHtml(data, field_id);
        }});
}


/**
 * Закрепляет выбранную запись к объединению
 * @param {type} container
 * @param {type} objectid
 * @param {type} field_id
 * @returns {undefined}
 */
function  selectModificationsRow(container, objectid, field_id) {
    var options = eval(field_id + '_options'),
            new_options = options.options;

    new_options.selected_object_id = objectid;

    selectedModRows[objectid] = true;
    container.find('td.sonata-ba-list-field-select[objectid="' + objectid + '"]').html('<img src="/bundles/coreproduct/Admin/img/loader.gif"/>');

    //запрос на прикрепления записи к объединению
    $.post(options.set_record_to_union,
            new_options, function(res) {

        selectedModRows[objectid] = false;
        container.find('td.sonata-ba-list-field-select[objectid="' + objectid + '"]').html('<img class="okImage" title="Уже выбрано" src="/bundles/coreproduct/Admin/img/ok.png"/>');

        addModificationsRows(res, field_id);
        options.data[objectid] = {
            id: parseInt(objectid)
        };

    });
}

/**
 * Открепляет запись из объединения
 * @param {type} container
 * @param {type} objectid
 * @returns {undefined}
 */
function  unselectModificationsRow(container, objectid, field_id) {

    var options = eval(field_id + '_options');
    delete options.data[objectid];

    selectedModRows[objectid] = true;
    container.find('td.sonata-ba-list-field-select[objectid="' + objectid + '"]').html('<img src="/bundles/coreproduct/Admin/img/loader.gif"/>');

    var ind = 0;
    for (var key in options.data) {
        ind++;
    }
    if (!ind || ind == 1) {
        $('#field_container_' + field_id).hide();
    }

    var new_options = options.options;
    new_options.selected_object_id = objectid;

    //запрос на прикрепления записи к объединению
    $.post(options.unset_record_from_union,
            new_options, function(res) {
        selectedModRows[objectid] = false;
        container.find('td.sonata-ba-list-field-select[objectid="' + objectid + '"]').html('<a class="btn" href="#"><i class="icon-arrow-right"></i>&nbsp;Выбрать</a>');
        $("." + field_id + "_row_id_" + objectid).remove();

    });
}


/**
 * Добавление строки в таблицу записей, входящих в объединение
 * @param {type} res
 * @returns {undefined}
 */
function addModificationsRows(res, field_id) {
    if (typeof res.errors === 'undefined' && typeof res === 'object') {
        for (var key in res.rows) {
            $('.union-table-body-' + field_id).append(res.rows[key].html);
        }
        $('#field_container_' + field_id).show();
    }
    else {
        if (res.errors) {
            if (res.errors.article) {
                alert("Укажите другой артикул, т.к. с указанным артикулом продукт был добавлен ранее!");
            }
            else {
                alert("Неизвестная ошибка, смотрите консоль!");
                console.log(res);
            }
        }
    }
}