/**
 * Скрипт для работы с colorpiker'ом в админке
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

function colorpickerInit() {
    $('.colorpicker-input').each(function(i) {
        if (i !== 0) {
            $t = $(this);
            $t.wrap('<span></span>');
            $t.parent().replaceWith($t.parent().html());
        }
    });
    $('div.colorpicker').remove();
    $('.colorpicker-input').ColorPicker({
        onSubmit: function(hsb, hex, rgb, el) {
            $(el).val(hex);
            $(el).ColorPickerHide();
            $(el).prev('.colorpicker-preview').children('div').css({backgroundColor: '#' + hex});
        },
        onBeforeShow: function() {
            $(this).ColorPickerSetColor(this.value);
        }
    });
}

$(function() {

    colorpickerInit();

    $('.colorpicker-preview').live('click', function() {
        $(this).next('.colorpicker-input').trigger('click');
    });

    $('.colorpicker-input').live('keyup', function() {
        var hex = this.value.replace(/#/, '');
        $(this).ColorPickerSetColor(hex);
        $(this).prev('.colorpicker-preview').children('div').css({backgroundColor: '#' + hex});
    }).bind('focusout focusin', function(){
        var hex = this.value.replace(/#/, '');
        this.value = hex;
    });

    $(document).ajaxStop(function() {
        colorpickerInit();
    });
});