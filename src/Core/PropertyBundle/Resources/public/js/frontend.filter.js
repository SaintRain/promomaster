/**
 * Работа с фильтром
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

$(function() {

    //****************************************************
    // Сброс фильтра

    $('.filter_clear').on('click', function(e) {
        e.preventDefault();
        $('.filter .active').removeClass('active');
        $('.filter input:checked').prop('checked', false);
        $('.filter input:text').val('').trigger('keyup');
        location.href = $(this).closest('form').attr('action').replace(/\?.+/g, '');
        return false;
//        $(this).closest('form').submit();
//        return false;
    });

    //****************************************************
    // Виджет разници чисел (Вес, Цена, Размер ... ) (EditType: [input])
    $('.filter_price_slider').each(function() {
        var _this = $(this);
        var container = _this.closest('.filter_group');
        var range = {
            min: _this.data('range-min'),
            max: _this.data('range-max')
        };

        // проставляем текст в значки
        container.find('span.lowest span.range-text').text(range.min);
        container.find('span.average span.range-text').text(Math.round((range.max + range.min) / 2));
        container.find('span.highest span.range-text').text(range.max);

        // скрываем половинный разделитель если разница между max и min = 1
        if (range.max - range.min <= 1) {
            container.find('span.average').hide();
        }

        // аттачим слайдер
        _this.slider({
            range: true,
            min: range.min,
            max: range.max,
            values: [range.min, range.max],
            slide: function(event, ui) {
                container.find('.filter-range-from').val(ui.values[0]);
                container.find('.filter-range-to').val(ui.values[1]);
            }
        });

        // вешаем событие на input, чтобы при вводе чисел с клавиатуры разница отображалась на виджете диапазона чисел
        container.find('.text_input').on('keyup change', function() {
            var rangeChange = {
                min: parseInt(container.find('.filter-range-from').val()) || range.min,
                max: parseInt(container.find('.filter-range-to').val()) || range.max
            };

            if (rangeChange.max < rangeChange.min) {
                rangeChange.max = rangeChange.min;
            }

            if (rangeChange.min < range.min) {
                rangeChange.min = range.min;
            }

            if (rangeChange.max > range.max) {
                rangeChange.max = range.max;
            }

            _this.slider({values: [rangeChange.min, rangeChange.max]});
        });
    });

    $('.text_input').trigger('keyup');

    //****************************************************
    // Radio (Пол ...) (EditType: [radio])

    function activeInput(input) {
        if (input.hasClass('active')) {
            input.removeClass('active');
            input.prop('checked', false);
        } else {
            // если тип инпута radio, то убираем выделение с выделеных
            if (input.attr('type') === 'radio') {
                input.closest('.edit-type-radio').find('input.active').removeClass('active');
            }
            input.addClass('active').prop('checked', true);
        }
    }

    // Снятие выделения с input type = "radio"
    $('.edit-type-radio input:radio').on('click', function() {
        activeInput($(this));
    });

    // Фейковые input'ы в виде картинок
    $('.edit-type-radio .filter-fake-radio').on('click', function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            var container = $(this).closest('.edit-type-radio');
            container.find('.filter-fake-radio.active').removeClass('active');
            $(this).addClass('active');
        }
        activeInput($(this).next('input:radio'));
    });

    $('.edit-type-radio input.hidden:checked').each(function() {
        $(this).addClass('active').prev('span').addClass('active');
    });


    //****************************************************
    // Checkbox (Возраст ...) (EditType: [сheckbox, multiselect, select])

    // Фейковые checkbox'ы в виде кругляшков
    $('.edit-type-checkbox .filter-fake-checkbox').on('click', function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
        activeInput($(this).next('input:checkbox'));
    });

    $('.edit-type-checkbox input.hidden:checked').each(function() {
        $(this).addClass('active').prev('span').addClass('active');
    });


    //****************************************************
    //

    $('.filter-show-all').on('click', function() {
        var container = $(this).closest('.filter_group');
        var hidden = container.find('div.hidden');
        if ($(this).data('show-all')) {
            if (hidden.hasClass('asSlide')) {
                hidden.slideUp('fast');
            } else {
                hidden.fadeOut('fast');
            }
            $(this).text('Показать все').data('show-all', false);
        } else {
            if (hidden.hasClass('asSlide')) {
                hidden.slideDown('fast');
            } else {
                hidden.fadeIn('fast');
            }
            $(this).text('Скрыть часть').data('show-all', true);
        }
    });

    $('.filter-fake-checkbox').disableSelection();

    //****************************************************
    //
    $('.filter_submit button').click(function() {
        if (!$(this).closest('form').serialize().replace(/sort=[a-z_1-9]+|show=[a-z_1-9]+/g, '').replace(/&&/g, '&').replace(/^&/g, '')) {
            alertCustom('Информация', 'Необходимо выбрать хотя бы один параметр!', {
                buttons: {
                    Ok: function() {
                        $(this).dialog('close');
                    }
                }
            });
            return false;
        }
    });


});