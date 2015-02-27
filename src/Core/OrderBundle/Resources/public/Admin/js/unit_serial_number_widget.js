
/**
 * Для редактирований серийных номеров в заказе
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
var serialsData = {},
        currentSelComp_id,
        currentSelComp_number = 0,
        isSerialChanged = false,
        currentStockId = false, //текущий инпут по которому кликнули
        focusOutCanGo = true,
        serialsSavedInProcess = false,
        inputSerialsIndex = 0;

$(document).ready(function() {
    for (var composition_id in serialsData) {
        generateSerialsContent(composition_id, true);
    }

    //ссылка редактирования
    $('body').on('click', 'a.serialsEdit', function() {
        var comp_id = $(this).attr('data-composition_id'),
                productCaption = serialsData[comp_id].product.article + ' ' + serialsData[comp_id].product.captionRu; //название продукта
        currentSelComp_number = $(this).parents('tr').index();
        currentSelComp_id = comp_id;  //сохраняем id состава для которого серийники вбиваем
        var dlg = $('#dialogSerials' + comp_id).dialog(
                {
                    width: 1000, height: 800, modal: true, title: "Редактирование серийных номеров в заказе для товара " + productCaption,
                    beforeClose: function(event, ui) {
                        return confirmSaveSerialsChange(comp_id);
                    }

                }
        ).on('keydown', function(evt) {
            if (evt.keyCode === $.ui.keyCode.ESCAPE) {
                dlg.dialog('close');
            }
            evt.stopPropagation();
        });


        dlg.parent().appendTo($(this).parents('form'));
        generateSerialsContent(comp_id, false);
    });


    //подтверждение сохранения
    function confirmSaveSerialsChange(comp_id) {
        if (isSerialChanged && !serialsSavedInProcess) {
            if (confirm("Сохранить изменение серийных номеров? В противном случае все изменения будут потеряны.")) {
                setOkSerials(comp_id);
                return false;
            }
            else {
                if (confirm("Закрыть без сохранения?")) {
                    return true;
                }
                else {
                    return false;
                }
            }
        }
        else {
            return true;
        }
    }

    //если кликнули по кнопке сохранить
    $('body').on('mousedown', 'input.serialsSave', function(event) {
        event.stopPropagation();
        focusOutCanGo = false;
        setOkSerials($(this).attr('data-composition_id'));
    });


    //проверяем нужно ли добавить строку
    $('body').on('focusout', 'input.serialNumbers', function(e) {
        if (focusOutCanGo) {
            addDynamicRow($(this));
        }
        focusOutCanGo = true;
    });


    //очищаем поле ввода серийника
    $('body').on('click', 'span.clearable', function(event) {
        event.stopPropagation();
        focusOutCanGo = false;
        isSerialChanged = true;
        $(this).prev().val('');
    });


    function addDynamicRow($inputObj) {
        var needAdd = true,
                comp_id = currentSelComp_id,
                t_id = 'serialsTable' + comp_id,
                serials = serialsData[comp_id],
                stock_id = $inputObj.attr('data-stock_id'),
                $trs = $('#' + t_id + ' tr.total.stock_' + stock_id);

        //если не все серийники введены
        if ($trs.length < parseInt(serials.stocks[stock_id].quantity)) {
            $trs.each(function() {
                var text = '';
                $(this).find('input').each(function() {
                    text = text + $(this).val();
                });
                console.log(text);
                if (!text && needAdd) {
                    needAdd = false;
                }
            });
        }
        else {
            needAdd = false;
        }

        if (needAdd) {
            addSerialRow(t_id, comp_id, false, false);
        }
    }

    //кнопка закрытия окна без сохранения
    $('body').on('click', 'input.serialsClose', function() {
        if ($('#dialogSerials' + $(this).attr('data-composition_id')).dialog("isOpen")) {
            $('#dialogSerials' + $(this).attr('data-composition_id')).dialog('close');
        }
    });

    $('body').on('click', 'input.serialNumbers', function() {
        $(this).removeClass('has-error');
        $(this).removeAttr('title');
    });

    //если нажали Enter переключаем фокус на следующий элемент
    $('body').on('keypress', 'input.serialNumbers', function(event) {
        if (event.which === 13) {
            addDynamicRow($(this));
            var dataIndex = parseInt($(this).attr('data-index')) + 1;
            if (dataIndex >= inputSerialsIndex) {
                dataIndex = 0;
            }
            $('input.serialNumbers[data-index="' + dataIndex + '"]').focus();
        }
    });

    $('body').on('change', 'input.serialNumbers', function() {
        isSerialChanged = true;
    });
    $('body').on('keyup', 'input.serialNumbers', function() {
        isSerialChanged = true;
    });

    //запоминаем текущий склад по которому кликнули
    $('body').on('focus', 'input.serialNumbers', function(e) {
        currentStockId = $(this).parents('tr').prevAll('tr.stock_head:first').attr('data-stock');
    });



    function setOkSerials(current_composition_id) {
        if (!isShippedStatus && checkSerialsUniq()) {

            var data = {};
            //берём все данные в объект
            $('input.serialNumbers').each(function() {
                var composition_id = $(this).attr('data-composition_id'),
                        number = $(this).attr('data-number'),
                        unit_id = $(this).attr('data-unit_id'),
                        serial_id = $(this).attr('data-serial_id'),
                        stock_id = $(this).attr('data-stock_id');

                if (current_composition_id === composition_id) {
                    if (typeof data[composition_id] === 'undefined') {
                        data[composition_id] = {};
                    }
                    if (typeof data[composition_id][number] === 'undefined') {
                        data[composition_id][number] = {};
                    }

                    if (typeof data[composition_id][number][stock_id] === 'undefined') {
                        data[composition_id][number][stock_id] = {};
                    }

                    if (typeof data[composition_id][number][stock_id][unit_id] === 'undefined') {
                        data[composition_id][number][stock_id][unit_id] = {};
                    }

                    if (serial_id === 'new' && typeof data[composition_id][number][stock_id][unit_id][serial_id] === 'undefined') {
                        data[composition_id][number][stock_id][unit_id][serial_id] = [];
                    }

                    if (serial_id === 'new') {
                        data[composition_id][number][stock_id][unit_id][serial_id].push($(this).val());
                    }
                    else {
                        data[composition_id][number][stock_id][unit_id][serial_id] = $(this).val();
                    }
                }
            });

            if (!jQuery.isEmptyObject(data)) {
                serialsSavedInProcess = true;
                $.post(updateSeriesRouting, data)
                        .done(function(res) {
                            serialsSavedInProcess = false;
                            isSerialChanged = false;
                            if (typeof res.errors !== 'undefined') {
                                if (typeof res.errors.twins !== 'undefined') {
                                    for (var key in res.errors.twins) {
                                        $('#serialsTable' + current_composition_id).find('input.serialNumbers').each(function() {
                                            if ($(this).val() === res.errors.twins[key]) {
                                                $(this).addClass('has-error')
                                                        .attr('title', 'Такой серийный номер уже есть в базе для другой позиции!');
                                            }
                                        });
                                    }
                                    $('.serialsError').show().html('Нельзя сохранить серийные номера, т.к. для другой позиции уже есть указанные серийники!');
                                }
                                else if (typeof res.errors.NotEnoughRealProducts !== 'undefined') {
                                    alert('На складе не хватает реальных товарных позиций, поэтому вы не можете указать все серийны номера!');
                                }
                            }
                            else {
                                if (typeof res.ok !== 'undefined') {
                                    $('.serialsClose').click();
                                    //подменяем данные, чтобы не было ошибки когда создаются серийники
                                    serialsData[current_composition_id].units_serials = res.ok.newUnitsSerials;

                                    //генерируем ссылку, сколько серийников добавленно
                                    generateSeriesEditLink(currentSelComp_id, currentSelComp_number);
                                }
                                else {
                                    console.log(res);
                                    alert('Возникла ошибка при сохранении, смотрите конслоль!');
                                }
                            }
                        });
                return true;
            }
            else {
                $('.serialsClose').click();
                return false;
            }
        }
    }

    /**
     * Проверяет повторяющиеся серийники
     * @param {type} comp_id
     * @returns {Boolean}
     */
    function checkSerialsUniq() {
        var twins = [],
                res = true;
        //сбрасываем ошибки если есть
        $('input[name*="[compositions][' + currentSelComp_number + '][units]"]').each(function() {
            $(this).removeClass('has-error');
            $(this).removeAttr('title');
        });
        //добавляем ошибки если есть
        $('input[name*="[compositions][' + currentSelComp_number + '][units]"]').each(function() {
            if ($(this).val() !== '') {
                if (typeof twins[$(this).val()] === 'undefined') {
                    twins[$(this).val()] = true;
                }
                else {
                    $(this).addClass('has-error');
                    $(this).attr('title', 'Среди вбитых серийников есть неуникальные значения!');
                    res = false;
                }
            }
        });
        if (!res) {
            $('.serialsError').show().html('Нельзя указывать одинаковые серийники!');
        }
        return res;
    }
});

/**
 * Генерирует таблицы и заполняет данными
 * @param {type} comp_id
 * @param {type} createTable
 * @returns {undefined}
 */
function generateSerialsContent(comp_id, createTable) {
    inputSerialsIndex = 0;
    $('.serialsError').hide();
    var serials = serialsData[comp_id],
            t_id = 'serialsTable' + comp_id;
    isSerialChanged = false;
    if (createTable) {
        //сколько горизонтально нужно колонок слить
        if (serials.product.serialsQuantity > 1) {
            var colspan = 'colspan="' + serials.product.serialsQuantity + '"',
                    colspanSklad = 'colspan="' + (serials.product.serialsQuantity + 1) + '"';
        }
        else {
            var colspan = '',
                    colspanSklad = 'colspan="2"';
        }
        //очищаем таблицу и формируем новую
        var html = '<thead><tr><th ' + colspanSklad + '>Серийные номера (всего ' + serials.composition.quantity + ' шт.)</th></tr></thead><tbody>';

        for (var stock_id in serials.stocks) {
            html = html + '<tr data-stock="' + stock_id + '" class="stock_head stock_' + stock_id + ' "><td style="width:10%"><b>Позиция<b></th><td  ' + colspan + '><b>Склад «' + serials.stocks[stock_id].captionRu + '»</td></tr>';
        }

        html = html + '<tr data-stock="0" class="stock_head stock_0"><td style="width:10%"><b>Позиция<b></th><td  ' + colspan + '><b>Отгруженные серийники</b></td></tr>';

        html = html + '</tbody>';

        $("#" + t_id + " > thead").remove();
        $("#" + t_id + " > tbody").remove();
        $("#" + t_id).html($(html));

        number = currentSelComp_number;
        currentSelComp_number++;
    }
    else {
        number = currentSelComp_number;
    }

    $("#" + t_id + " > tbody > tr:not(.stock_head)").remove();    //чистим таблицу
    //если есть сохранённые данные, то добавляем их
    if (typeof serials.units_serials[0] !== 'undefined') {

        var added = 0;
        for (var unit_index in serials.units_serials) {
            if (typeof serials.units_serials[unit_index][0] !== 'undefined') {
                s_id = serials.units_serials[unit_index][0].stock_id;
            }
            else {
                s_id = 0;
            }
            addSerialRow(t_id, comp_id, unit_index, s_id);
            added++;
        }
    }
    //смотрим нужно ли добавить пустые поля
    for (var stock_id in serials.stocks) {
        var added = $('#' + t_id + ' tr.stock_' + stock_id).length - 1;   //смотрим сколько добавленно строк для склада
        //добавляем пустые строки
        for (var i = added; i < serials.stocks[stock_id].quantity; i++) {
            addSerialRow(t_id, comp_id, false, stock_id);
            break;
        }

    }

    var focused = false;
    //ставим фокус на первый инпут       
    $('table#serialsTable' + comp_id + ' input.serialNumbers:text[value=""]').each(function() {
        console.log($(this).attr('data-index'));
        if (!focused) {
            $(this).focus();
            focused = true;
        }

    })

    //генерируем ссылку, сколько серийников добавленно
    generateSeriesEditLink(comp_id, number);


}

/**
 * Добавляет строку в таблицу серийников
 * @param {type} t_id
 * @param {type} comp_id
 * @param {type} unit_index
 * @returns {undefined}
 */
function addSerialRow(t_id, composition_id, unit_index, stock_id) {
    if (stock_id === false) {
        stock_id = currentStockId;
    }

    var number = $('#' + t_id + ' tr:not(.stock_head)').length, //берём общее количество строк в таблице серийников
            unit_id = 'new',
            sData = serialsData[composition_id];

    //если нужно добавить пустое поле для внесения новых данных
    if (!unit_index) {
        unit_index = number - 1;
    }

    if (number <= sData.composition.quantity) {
        var current_number = $('#' + t_id + ' tr.total.stock_' + stock_id).length + 1,
                html = '',
                dontAddRow = false;
        for (var i = 0; i < sData.product.serialsQuantity; i++) {
            if (typeof sData.units_serials[unit_index] === 'undefined' || typeof sData.units_serials[unit_index][i] === 'undefined') {
                var val = '',
                        unit_name = '[' + stock_id + '][new][]',
                        serial_id = 'new';
            }
            else {
                var val = sData.units_serials[unit_index][i].value,
                        unit_name = '[' + stock_id + '][' + sData.units_serials[unit_index][i].id + ']',
                        serial_id = sData.units_serials[unit_index][i].id,
                        unit_id = sData.units_serials[unit_index][i].unit_id;
            }
            val = val.replace(/"/g, '&quot;');
            if (isCheckedStatus && !isShippedStatus && stock_id) {
                html = html + '<td><input type="text" width="100px" class="serialNumbers" data-index="' + inputSerialsIndex + '" data-stock_id="' + stock_id + '" data-composition_id="' + composition_id + '" data-number="' + (number - 1) + '" data-unit_id="' + unit_id + '"  data-serial_id="' + serial_id + '" name="' + sData.field_name + '[' + unit_index + ']' + unit_name + '" value="' + val + '"/>\n\
            <span class="icon-remove-sign clearable" title="Удалить серийник"></span></td>';
                inputSerialsIndex++;
            }
            else {
                html = html + '<td>' + val + '</td>';
                if (val.length === 0) {
                    dontAddRow = true;
                }
            }
        }


        //чтобы не было пустых строк
        if (!dontAddRow) {
            html = '<tr class="total stock_' + stock_id + '"><td>' + current_number + '</td>' + html + '</tr>';
        }
        else {
            html = '';
        }

        if (!isShippedStatus && stock_id) {
            $(' #' + t_id + ' tr.stock_' + stock_id + ':last').after(html);
        }
        else {
            $(' #' + t_id + ' tr:last').after(html);
        }

    }
}


/**
 * генерируем ссылку, сколько серийников добавленно
 * @param {type} comp_id
 * @returns {undefined}
 */
function generateSeriesEditLink(comp_id, number) {
    var haveSerialsQuantity = 0,
            seriesCount = 0,
            needSerialsQuantity = serialsData[comp_id].composition.quantity,
            serials = serialsData[comp_id].units_serials;

    //считаем все добавленные серийники для одной композиции
    for (var index in serials) {
        for (var index2  in serials[index]) {
            seriesCount++;
        }
    }

    //делим на количество серийников в коробке
    haveSerialsQuantity = Math.floor(seriesCount / serialsData[comp_id].product.serialsQuantity);

    if (haveSerialsQuantity < needSerialsQuantity) {
        var style = 'style="color:red"';
    }
    else {
        var style = '';
    }

    if (canViewSeries) {
        var html = '<a class="serialsEdit" ' + style + ' data-composition_id="' + comp_id + '" href="javascript:void(0);">' + haveSerialsQuantity + ' из ' + needSerialsQuantity + '</a>';
    }
    else {
        var html = haveSerialsQuantity + ' из ' + needSerialsQuantity;
    }

    $('.series_quantity_' + comp_id).html(html);
}
