// Функция для экранирование спец символов при создании регулярки из юзерской строки
function escapeRegExp(str) {
    if (undefined !== str) {
        return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
    }
}

// дописывает ведущие нули к числу
function leadZero(number, length) {
    while (number.toString().length < length) {
        number = '0' + number;
    }
    return number;
}

// Format a number with grouped thousands
function number_format(number, decimals, dec_point, thousands_sep) {
    //
    // +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +	 bugfix by: Michael White (http://crestidg.com)

    var i, j, kw, kd, km;

    // input sanitation & defaults
    if (isNaN(decimals = Math.abs(decimals))) {
        decimals = 2;
    }
    if (dec_point === undefined) {
        dec_point = ",";
    }
    if (thousands_sep === undefined) {
        thousands_sep = " ";
    }

    i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

    if ((j = i.length) > 3) {
        j = j % 3;
    } else {
        j = 0;
    }

    km = (j ? i.substr(0, j) + thousands_sep : "");
    kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
    kd = Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2);

    return parseInt(kd) ? km + kw + dec_point + kd : km + kw;
}

jQuery(function($) {
    
    $('.with-popover').popover({
        trigger: 'hover',
        html: false
    });
    // datePicker Config
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
            'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    $.datepicker.setDefaults($.datepicker.regional['ru']);
    // datePicker End

    // прикрепляем календарь, выбор даты
    $('.datepicker').datepicker({
        dateFormat: "dd.mm.yy",
        changeMonth: true,
        changeYear: true
    });

    //деактивируем некоторые галочки, если в TR  есть тег с классом .cannotRemove
//    $('span.cannotRemove').parents('tr').find('td.sonata-ba-list-field-batch').find('input[type="checkbox"]').attr('readonly', 'readonly').attr('disabled', 'disabled').attr('title', 'Нельзя удалить');

    // Блок со вспомогательным текстом под полем ввода
    // setTimeout(customiseHelpBlock, 10);

    $(document).ready(function() {
        $('div.row-fluid').find('div.offset2').removeClass('span4');
        customiseHelpBlock();
    });
    $('body').on('dialogopen', function(event, ui) {
        setTimeout(customiseHelpBlock, 10);
    });

    $('.nav, .nav-tabs *').on('click', function() {
        setTimeout(customiseHelpBlock, 10);
    });

    $(document).on('click', '.sonata-bc .form-horizontal .help-block', function() {
        if ($(this).hasClass('help-block-open')) {
            $(this).animate({height: '15px'}, 100, function() {
                $(this).removeClass('help-block-open');
                $(this).find('.help-block-shadow').show();
            });

        } else {
            $(this).find('.help-block-shadow').hide();
            h = $(this).addClass('help-block-open').css('height', 'auto').height();
            $(this).css('height', '15px');
            $(this).animate({height: h}, 100, function() {
            });
        }
    });

    $('.fancybox-button').fancybox({
        prevEffect: 'fade',
        openEffect: 'fade',
        closeEffect: 'fade',
        nextEffect: 'fade',
        transitionIn: 'elastic',
        transitionOut: 'elastic',
        iframe: {
            preload: false
        },
        nextMethod: 'resizeIn'
    });

    // Новое меню
    $('.submenu-show-on-hover').hover(function(){
        if ($(window).width() > 979) {
            $(this).find('ul.dropdown-menu:first').show();
        }
    }, function(){
        if ($(window).width() > 979) {
            $(this).find('ul.dropdown-menu:first').hide();
        } else {
            $(this).find('ul.dropdown-menu:first').show();
        }
    });
    $('.submenu-show-on-hover>a').click(function(e){
        e.preventDefault();
        return false;
    });
    // Убираем пустые пункты меню
    $('.dropdown').each(function(){
        if ($(this).find('ul.dropdown-menu li').size() === 0) {
            $(this).remove();
        }
    });
    
    hotSave();
});

function customiseHelpBlock() {
    $('.sonata-bc .form-horizontal .help-block').each(function() {
        if (!$(this).find('.help-block-shadow').size()) {
            $(this).append('<span class="help-block-shadow"></span>');
        }
        var $div = $(this).closest('div.controls');
        if ((['color', 'date', 'datetime', 'datetime-local', 'email', 'month', 'number', 'password', 'tel', 'text', 'timeNew', 'url', 'week'].indexOf($(this).prev('input').attr('type')) !== -1 && !$(this).closest('div').find('.select2-container').size())) {
            $(this).css('max-width', ($div.find('input[type!=hidden]').width() + 15) + 'px');
        } else if ($(this).prev().is('textarea')) {
            $(this).css('max-width', ($(this).prev('textarea:visible').width() + 15) + 'px');
        } else if ($(this).prev().find('table.table.table-bordered').size()) {
            $(this).addClass('help-block-fix');
        } else if ($div.find('.jstree').size()) {
            $(this).css('width', '500px');
        } else {
            $(this).addClass('span5').css('width', $div.find('input:visible').width() + 'px');
        }

        if ($div.find('.select2-container:visible').size() === 1) {
//            $(this).css('max-width', $div.find('.select2-container').css('width'));
//            var wrap = '<div class="help-block-wrap" style="padding-top: ' + (parseInt($div.find('.select2-container:visible').css('height')) || 36) + 'px;"></div>';
//
//            if ($(this).parent().is('div.help-block-wrap')) {
//                $(this).unwrap('<div></div>');
//            }
//            $(this).wrap(wrap);
            if ($(this).prev().is('div.clearfix')) {
                $(this).prev().remove();
            }
            $(this).before('<div class="clearfix" style="max-height: ' + (parseInt($div.find('.select2-container:visible').css('height')) || 36) + 'px" ></div>');

        }

        if ($(this)[0].scrollHeight === 15) {
            $(this).find('.help-block-shadow').remove();
        }

    });

    /**
     * Добавляем для всех полей типа url префикс http://
     */
    var setUrlPrefix = function() {
        if (!$('input[type="url"]').val()) {
            $('input[type="url"]').val('http://');
        }
    }
    setUrlPrefix();

    /**
     * Вкл\выкл input по checkbox
     */
    $('.with-exclude input[type="checkbox"]').click(function() {
        var $this = $(this),
                parentBlock = $this.parents('.with-exclude'),
                elToDisable = $('input[type="text"]', parentBlock);
        setDisabled($this, elToDisable);
    });
}

/**
 * Назначает маски ввода для текстовых полей
 * @returns {undefined}
 */
function setMaskForInputs() {

    var masksDefinitions = {
        decimal: {rightAlignNumerics: false, radixPoint: "."},
        money: {rightAlignNumerics: false, radixPoint: ",", onBeforePaste: function() {
            return this.value.replace(/\./g, ',');
        }},
        integer: {rightAlignNumerics: false}
    };

    $('input[data-mask]').each(function() {
        var options = {clearIncomplete: true},
        maskStr = $(this).attr('data-mask');
        if (typeof masksDefinitions[maskStr] !== 'undefined') {
            for (key in masksDefinitions[maskStr]) {
                options[key] = masksDefinitions[maskStr][key];
            }
        }
        if (maskStr === 'money') {
            maskStr = 'decimal';
        }
        if (maskStr === 'url') {
            options.clearIncomplete = false;
        }
        $(this).inputmask(maskStr, options);
    });
}



/**
 * Назначает календари для текстовых полей
 * @returns {undefined}
 */
function setDatePickerForInputs() {
    $('.datepicker').each(function() {
        //чтобы хром не подставлял свой календарь удаляем тип date
        /*
         if ($(this).attr('type') === 'date') {
         $(this).removeAttr('type');
         }
         */
        $(this).datepicker();
    });
}

/**
 * Задаем размер блока важно для html5 error
 * @returns {undefined}
 */
function fixHtml5Error() {
    var container = $('div.html-error');
    container.each(function(index, element) {
        var $this = $(element),
                parentBlock = $this.parent('.controls');

        parentBlock.width($this.width());
        parentBlock.css('position', 'relative');
    });

}

/**
 * Парсинг таблицы в CSV
 * @returns {undefined}
 */
function exportTableToCSV($table, filename) {

    var $rows = $table.find('tr:has(td)'),
            tmpColDelim = String.fromCharCode(11),
            tmpRowDelim = String.fromCharCode(0),
            colDelim = '","',
            rowDelim = '"\r\n"',
            csv = '"' + $rows.map(function(i, row) {
                var $row = $(row),
                        $cols = $row.find('td');

                return $cols.map(function(j, col) {
                    var $col = $(col),
                            text = $col.text();

                    return text.replace('"', '""');

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
            .split(tmpRowDelim).join(rowDelim)
            .split(tmpColDelim).join(colDelim) + '"',
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

    $(this)
            .attr({
                'download': filename,
                'href': csvData,
                'target': '_blank'
            });
}
/*
function holdFormHistory() {
    return true;
    if (typeof(Storage) != "undefined") {
    var formData = (localStorage.getItem('formData')) ? JSON.parse(localStorage.getItem('formData')) : [],
        curForm = $('.form-horizontal'),
        curElt = null,
        elements = $('select, input, textarea', curForm);
    //console.log(formData);
    if (formData.length) {
        for (var key in formData) {
            curElt = $("select[name$='" + key + "'], input[name$='" + key + "'], textarea[name$='" + key + "']");
            console.log(curElt);
            curElt.val(formData[key]);
        }
        delete(key);
    }
    elements.each(function(index, element){
        console.log($(element));
        var $this = $(element),
            eltName = $this.attr('name').replace(/[a-z0-9]+/, ''),
            eltVal = $this.val();
        if (localStorage.getItem(eltName)) {
            $this.val(localStorage.getItem(eltName));
        }
        
//        if ($this.is('radio')) {
//            $this.each(function(index, element){
//
//            });
//        }
    });
    elements.change(function() {
        var $this = $(this),
            eltName = $this.attr('name').replace(/[a-z0-9]+/, ''),
            eltVal = $this.val();
            
        formData[eltName] = eltVal;
        //console.log('formData');
        //console.log(formData);
        //localStorage.setItem('formData', formData);
        //console.log(JSON.stringify(formData));
        //console.log('Local Storage Form Data');
        //console.log(localStorage.getItem('formData'));
        localStorage.setItem(eltName, eltVal);
        console.log(localStorage.getItem(eltName));
        
    });
    
    
//    localStorage.setItem('form', {'dfdf': 'dfdf'})
//    localStorage.getItem('form');
//    var formData = new FormData();
//    console.log(localStorage.getItem('form'));
//    console.log(formData);
    
    } else {
        console.log('no local storage');
    }
    
}
if (typeof(Storage) != "undefined") {
    Storage.prototype.setObj = function(key, obj) {
        return this.setItem(key, JSON.stringify(obj))
    }
    Storage.prototype.getObj = function(key) {
        return JSON.parse(this.getItem(key))
    }
}
*/
function checkUserLogin() {
    $('form').submit(function(){
        var $this = $(this),
            canSubmitForm = false;
        $.ajax({
            url: adminRoutes['checkLogin'],
            type: "POST",
            data: "email=" + ((adminExtra['email']) ? adminExtra['email'] : null),
            async: false,
            success: function(data) {
                canSubmitForm = true;
                console.log(data);
                console.log(data.result);
                return false;
            },
            error: function() {
                console.log('error');
            }
        });
        
        return canSubmitForm;
    });
}

function hotSave() {
    if (CKEDITOR) {
        CKEDITOR.on('instanceReady', function (ev) {
            ev.editor.setKeystroke(CKEDITOR.CTRL + 83 /*S*/, 'save');
        });
    }
    $('body').keydown(function(e) {
        e = e || window.event;
        
        var keyCode = e.keyCode || e.which,
            elts = $('input, textarea, select'),
            isFocused = false,
            btn = $("input[name='btn_update_and_edit'], input[name='btn_create_and_edit']"),
            letter = {s: 83 };
        if (e.ctrlKey) {
            if (keyCode == letter.s) {
                btn.trigger('click');
                e.preventDefault();
                return false;
            }    
        }
        
    });
}
