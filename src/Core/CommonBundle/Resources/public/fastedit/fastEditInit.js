/**
 * 
 * Библиотека инициализация функционала быстрого редактирования на сайте
 *
 * @author Sergeev A.M
 * @copyright LLC "PromoMaster"
 */

$(function() {
    $('body').on('mousedown', '[' + __fastEditTagName + ']', function(e) {
        if (e.which === 2 && __fastEditCTRL) {
            __fastEditCTRL = false;
            var url = $(this).attr(__fastEditTagName);
            window.open(url);
            e.preventDefault();
            e.stopPropagation();
        }
    });

    //ловим нажатие CTRL
    $(document).keydown(function(event) {
        if (event.which == 17) {
            __fastEditCTRL = true;
        }
        return true;
    });

    //ловим отпаскание CTRL
    $(document).keyup(function(event) {
        if (event.which == 17) {
            __fastEditCTRL = false;
        }
        return true;
    });
});


