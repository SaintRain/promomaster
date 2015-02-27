/**
 * Динамические поля характеристик
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

//прорисовка динамических полей
jQuery(document).ready(function ($) {

    //при сабмите формы перестраиваем характеристики
    $("#propertyFieldContent").parents('form').submit(function (event) {
        generateDynamicFields(true);
        console.log(11111);
//        event.preventDefault();
        return true;
    });
    //клик на вкладку ХАРАКТЕРИСТИКИ
    $('a[href="#' + propertyOptions.unigid + '_5"]').click(function () {
        generateDynamicFields(false);
    });

});

generateDynamicFields(false);
var generatedFields = [], //сгенерированные ранее поля редактирования
        propertyNumber = 0;
function generateDynamicFields(onSubmit) {

    //если есть отмеченные категории
    if ($('#jsTreeContent_' + propertyOptions.unigid + '_categories li.jstree-checked').length) {

        //очищаем
        for (gf in generatedFields) {
            //возможно введённые данные в элементе изменились их нужно запомнить
            if (generatedFields[gf].property.editType === 'radio') {
                if ($('[name="' + generatedFields[gf].editElementName + '"]').length) {
                    generatedFields[gf].newVal = $('input[name="' + generatedFields[gf].editElementName + '"]:checked').val();
                }
            }
            else if (generatedFields[gf].property.editType === 'checkbox') {
                if ($('[name="' + generatedFields[gf].editElementNameMultiple + '"]').length) {
                    generatedFields[gf].newVal = $('input[name="' + generatedFields[gf].editElementNameMultiple + '"]:checked').map(function () {
                        return $(this).val();
                    }).get();
                }
            }
            else if (generatedFields[gf].property.editType === 'editor') {
                generatedFields[gf].newVal = CKEDITOR.instances[generatedFields[gf].editElementId].getData();
            }
            else {
                if ($('#' + generatedFields[gf].editElementId).length) {
                    generatedFields[gf].newVal = $("#" + generatedFields[gf].editElementId).val();
                }
            }

            generatedFields[gf].povtor = false;
        }

        //очищаем все динамические поля, которые были созданы ранее
        $("#propertyFieldContent").html('');
        var usedPropetries = [];

        //берём все отмеченные категории
        var checkedCategories = [];
        $('#jsTreeContent_' + propertyOptions.unigid + '_categories li.jstree-checked').each(function () {
            checkedCategories[$(this).attr('id').split('_')[1]] = this;
        });

        //перебираем все существующие характеристики для всех категорий
        for (var property_for_cat_key in propertyOptions.category) {
            var property_for_cat = propertyOptions.category[property_for_cat_key];  //характеристики для категории
            var property_for_cat_id = parseInt(property_for_cat_key.split('_')[1]);
            if (typeof checkedCategories[property_for_cat_id] !== 'undefined') {    //если в отмеченных есть категория для которой есть характеристики
                for (var p in property_for_cat) {   //перебираем характеристики категории

                    //проверяем есть ли уже на странице поле для редактирования данной характеристики. Это нужно
                    //т.к. Продукт может принадлежать нескольким категориями и одна характеристика тоже, а полередактирования должно быть одно
                    if (typeof usedPropetries[property_for_cat[p]] === 'undefined') {
                        usedPropetries[property_for_cat[p]] = true;
                        var property = propertyOptions.property['_' + property_for_cat[p]];

                        //если обязательно для заполнения
                        if (property.required) {
                            var required = 'required="required"';
                        }
                        else {
                            var required = '';
                        }

                        //определяем какое поле будем выводить для редактирования
                        if (property.editType === 'input' || property.editType === 'input_text' || property.editType === 'textarea' || property.editType === 'editor') {
                            dataFieldName = 'value';    //строковое
                        }
                        else {
                            dataFieldName = 'data'; //числовое (айдишники или число)
                        }

                        //вспомогательные данные для генерации элементов редактирования
                        var
                                editElementDataName = propertyOptions.unigid + '[productDataProperty][' + propertyNumber + '][data]',
                                editElementIdName = propertyOptions.unigid + '[productDataProperty][' + propertyNumber + '][id]',
                                editElementId = propertyOptions.unigid + '_productDataProperty_' + propertyNumber + '_' + dataFieldName,
                                editElementName = propertyOptions.unigid + '[productDataProperty][' + propertyNumber + '][' + dataFieldName + ']',
                                editElementIdMultiple = propertyOptions.unigid + '_productDataProperty_' + propertyNumber + '_' + dataFieldName,
                                editElementNameMultiple = propertyOptions.unigid + '[productDataProperty][' + propertyNumber + '][' + dataFieldName + '][]',
                                needSelect2 = false,
                                needIdNameValue = false,
                                needDataNameValue = false,
                                needNewVal = false,
                                editElement = '',
                                checked = '',
                                selected = '',
                                htmlField = '';

                        //если поля были сгенерированы раньше, то не генерируем их, а просто переназначаем значения в них и бёрём их HTML-код
                        if (typeof generatedFields['_' + property.id] === 'undefined' || !generatedFields['_' + property.id]) {

                            //берём значение для одиночных списков и текста
                            if (property.editType === 'input' || property.editType === 'input_text' || property.editType === 'textarea' || property.editType === 'editor' || property.editType === 'select' || property.editType === 'radio') {
                                for (var pdp_key in property.productDataProperty[0]) {
                                    needIdNameValue = parseInt(pdp_key.split('_')[1]); //ключ
                                    var dataValue = property.productDataProperty[0][pdp_key];
                                    break;
                                }

                                //берём DataId для текстовых полей
                                if (property.editType === 'input' || property.editType === 'input_text' || property.editType === 'textarea' || property.editType === 'editor') {
                                    for (var dl_key in property.dataList) {
                                        needDataNameValue = parseInt(dl_key.split('_')[1]); //ключ
                                        break;
                                    }
                                }
                            }

                            //подставляем дефолтные значения, если есть
                            if (property.defaultValue && !propertyOptions.id && !propertyOptions.postUniqid) {
                                var
                                        productDataProperty = [],
                                        defaultDataList = [],
                                        defaultValue = [],
                                        defaultValue = property.defaultValue.split("\n"),
                                        dataValue = defaultValue[0];

                                //один-к-многим
                                for (var dl_key in property.dataList) {
                                    for (var dv in defaultValue) {
                                        if (property.dataList[dl_key] === defaultValue[dv]) {
                                            dataValue = parseInt(dl_key.split('_')[1]);
                                            break;
                                        }
                                    }
                                }

                                if (property.editType === 'multiselect' || property.editType === 'checkbox') {
                                    //могие-к-многим
                                    for (var dl_key in property.dataList) {
                                        for (var dv in defaultValue) {
                                            if (property.dataList[dl_key].trim() === defaultValue[dv].trim()) {
                                                var p = [];
                                                p[dl_key] = parseInt(dl_key.split('_')[1]);
                                                productDataProperty.push(p);
                                                break;
                                            }
                                        }
                                    }
                                }
                            }
                            else {
                                var productDataProperty = property.productDataProperty;
                            }

                            //определяем есть ли маска
                            if (property.mask) {
                                var dataMask = 'data-mask="' + property.mask + '"';
                            }
                            else {
                                var dataMask = '';
                            }

                            //взависимости от типа редактирования герерируем поле
                            if (property.editType === 'input') {
                                editElement = '<input type="text" id="' + editElementId + '" ' + dataMask + ' name="' + editElementName + '" class="span5" ' + required + ' value="' + dataValue + '">';
                            }
                            else if (property.editType === 'input_text') {
                                editElement = '<input type="text" id="' + editElementId + '" ' + dataMask + ' name="' + editElementName + '" class="span5" ' + required + ' value="' + dataValue + '">';
                            }
                            else if (property.editType === 'textarea') {
                                editElement = '<textarea id="' + editElementId + '" name="' + editElementName + '" class="span5" ' + required + ' rows="5">' + dataValue + '</textarea>';
                            }
                            else if (property.editType === 'editor') {
                                editElement = '<textarea id="' + editElementId + '" name="' + editElementName + '" class="span5" ' + required + ' rows="5">' + dataValue + '</textarea>';
                            }
                            else if (property.editType === 'radio') {
                                if (!$.isEmptyObject(property.dataList)) {
                                    editElement = editElement + '<table style="width:1px"><tr>';
                                    for (var dl_key in property.dataList) {
                                        var dl_key_id = parseInt(dl_key.split('_')[1]);
                                        if (dl_key_id === dataValue) {
                                            checked = 'checked="checked"';
                                        }
                                        else {
                                            checked = '';
                                        }

                                        editElement = editElement + '<td nowrap><label><input type="radio" name="' + editElementName + '" ' + checked + '  ' + required + ' value="' + dl_key_id + '"> ' + property.dataList[dl_key] + '</label></td><td>&nbsp;&nbsp;</td>';
                                    }
                                    editElement = editElement + '</tr></table>';
                                }
                                else {
                                    editElement = '<span class="label label-important">Нет данных для автоподстановки</span>';
                                }
                            }
                            else if (property.editType === 'select') {
                                editElement = '<select id="' + editElementId + '" name="' + editElementName + '" class="span5 select2-offscreen" ' + required + '  tabindex="-1"><option value=""></option>';

                                for (var dl_key in property.dataList) {
                                    var dl_key_id = parseInt(dl_key.split('_')[1]);
                                    if (dl_key_id === dataValue) {
                                        selected = 'selected="selected"';
                                    }
                                    else {
                                        selected = '';
                                    }
                                    editElement = editElement + '<option ' + selected + ' value="' + dl_key_id + '">' + property.dataList[dl_key] + '</option>';
                                }
                                editElement = editElement + '</select>';
                                needSelect2 = editElementId;
                            }
                            else if (property.editType === 'multiselect') {
                                editElement = '<select id="' + editElementIdMultiple + '" name="' + editElementNameMultiple + '"  class="span5 select2-offscreen" ' + required + ' multiple="multiple" tabindex="-1">';
                                for (var dl_key in property.dataList) {
                                    var dl_key_id = parseInt(dl_key.split('_')[1]);
                                    selected = '';
                                    for (var pdp_n in productDataProperty) {
                                        for (var pdp_key in productDataProperty[pdp_n]) {
                                            // needIdNameValue = parseInt(pdp_key.split('_')[1]);  //ключ
                                            dataValue = productDataProperty[pdp_n][pdp_key];
                                            if (dl_key_id === dataValue) {

                                                selected = 'selected="selected"';
                                                break;
                                            }
                                        }
                                        if (selected) {
                                            break;
                                        }
                                    }
                                    editElement = editElement + '<option ' + selected + ' value="' + dl_key_id + '">' + property.dataList[dl_key] + '</option>';
                                }
                                editElement = editElement + '</select>';
                                needSelect2 = editElementIdMultiple;
                            }
                            else if (property.editType === 'checkbox') {
                                if (!$.isEmptyObject(property.dataList)) {
                                    editElement = editElement + '<table style="width:1px"><tr>';
                                    for (var dl_key in property.dataList) {
                                        var dl_key_id = parseInt(dl_key.split('_')[1]);
                                        checked = '';
                                        for (var pdp_n in productDataProperty) {
                                            for (var pdp_key in productDataProperty[pdp_n]) {
                                                dataValue = productDataProperty[pdp_n][pdp_key];
                                                if (dl_key_id === dataValue) {
                                                    checked = 'checked="checked"';
                                                    break;
                                                }
                                            }
                                            if (checked) {
                                                break;
                                            }
                                        }
                                        editElement = editElement + '<td class="span1" nowrap><label><input  name="' + editElementNameMultiple + '"  type="checkbox" ' + checked + ' value="' + dl_key_id + '">&nbsp;' + property.dataList[dl_key] + '</label></td><td>&nbsp;&nbsp;</td>';
                                    }
                                    editElement = editElement + '</tr></table>';
                                }
                                else {
                                    editElement = '<span class="label label-important">Нет данных для автоподстановки</span>';
                                }
                            }

                            //генерируем HTML- для добавления поля
                            if (editElement !== '') {
                                //если нужно добавляем ID записи для однострочных значений
                                if (needIdNameValue !== false) {
                                    editElement = editElement + '<input type="text" name="' + editElementIdName + '" class="span5 hide" value="' + needIdNameValue + '">';
                                }

                                //если нужно добавляем DATA записи для полей ввода текста
                                if (needDataNameValue !== false) {
                                    editElement = editElement + '<input type="text" name="' + editElementDataName + '" class="span5 hide" value="' + needDataNameValue + '">';
                                }

                                //описание характеристики
                                if (property.description) {
                                    var help = '<span class="help-block sonata-ba-field-help">' + property.description + '</span>';
                                }
                                else {
                                    var help = '';
                                }

                                //если характеристика не выводится в подробнее продукта, То вешаем подсказку, Где она используется
                                var usedInfo = '';
                                if (!property.isEnabled) {
                                    if (property.isEnabledInYml) {
                                        usedInfo = '<span title="Используется только при формировании YML" class="propertyYML">YML</span>&nbsp;';
                                    }
                                    if (property.isUsedInFilter) {
                                        usedInfo = usedInfo + '<span title="Используется только в фильтре" class="propertyFilter">FIL</span>&nbsp;';
                                    }
                                }

                                //строка, где находится элемент редактирования
                                htmlField = '<div class="control-group">' +
                                        '<label class="control-label" for="' + editElementId + '">' + usedInfo + property.caption + '</label>' +
                                        '<div class="controls">' + editElement + help + '</div>';
                            }

                            //сохраняем созданные элемент, чтобы не генерировать еще раз
                            generatedFields['_' + property.id] = {
                                htmlField: htmlField,
                                editElementNameMultiple: editElementNameMultiple,
                                editElement: editElement,
                                editElementName: editElementName,
                                needIdNameValue: needIdNameValue,
                                editElementId: editElementId,
                                editElementIdName: editElementIdName,
                                needDataNameValue: needDataNameValue,
                                editElementDataName: editElementDataName,
                                property: property,
                                needSelect2: needSelect2,
                                povtor: false,
                                help: help
                            };
                        }
                        else {
                            var needNewVal = true;
                        }

                        var field = generatedFields['_' + property.id]; //достаем сгенерированное ранее поле

                        //добавляем поле и вешаем нужные обработчики
                        if (!field.povtor && field.editElement !== '') {
                            $("#propertyFieldContent").append(field.htmlField);

                            //переназначаем данные, если пользователь что-то менял в элементах редактирования
                            if (needNewVal) {
                                if (field.property.editType === 'radio') {
                                    $('input[name="' + field.editElementName + '"][value="' + field.newVal + '"]').attr('checked', 'checked');
                                }
                                else if (field.property.editType === 'checkbox') {
                                    $('input[name="' + field.editElementNameMultiple + '"]:checked').removeAttr('checked');
                                    for (var key in field.newVal) {
                                        $('input[name="' + field.editElementNameMultiple + '"][value="' + field.newVal[key] + '"]').attr('checked', 'checked');
                                    }
                                }

                                else {
                                    $('#' + field.editElementId).val(field.newVal);
                                }
                                generatedFields['_' + property.id].povtor = true;
                            }

                            //вешаем маску ввода для текстового поля
                            if (field.property.editType === 'input' && !field.property.mask) {
                                $('#' + field.editElementId).attr('data-mask', 'decimal');
                            }

                            if (field.needSelect2) {
                                $("#" + field.needSelect2).select2();
                                $('.select2-search-choice-close').css('display', 'block');
                            }

                            //инициализируем редактор
                            if (field.property.editType === 'editor') {
                                CKEDITOR.replace(field.editElementId, {filebrowserBrowseUrl: propertyOptions.filebrowserBrowseUrl, language: 'ru', width: 1017, height: 300});
                            }
                        }
                        propertyNumber++;
                    }
                }
            }
        }

        if (!onSubmit) {
            customiseHelpBlock();
            setMaskForInputs(); //задаём маску ввода, если нужно
        }
    }
    else {
        $("#propertyFieldContent").html('<h5>Дополнительные поля для редактирования характеристик появятся после выбора категорий...</h5>');
    }
}