
/**
 * Для страниц где есть превью карточка товара
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

$(function() {

    // Удаление из избранного
    $('.product.favored .favor').click(function() {
        var $t = $(this);
        var url = $t.data('remove-url');

        $t.hide();

        alertCustom('Подтверждение', 'Вы уверены, что хотите удалить этот продукт из избранного?', {
            buttons: {
                Да: function() {

                    $.ajax({
                        type: 'POST',
                        url: url
                    })
                            .done(function(result) {

                                if (undefined !== result.success) {
                                    alertCustom('Сообщение', result.success.join('<br>'), {
                                        buttons: {
                                            Ok: function() {
                                                $(this).dialog('close');
                                            }
                                        },
                                        close: function() {
                                            if (location.href.indexOf('profile/products/favorites.html') > 0) {
                                                location.reload();
                                            }
                                        }
                                    });
                                }
                                if (undefined !== result.error) {
                                    alertCustom('Сообщение', result.error.join('<br>'), {
                                        buttons: {
                                            Ok: function() {
                                                $(this).dialog('close');
                                            }
                                        },
                                        close: function() {
                                            if (location.href.indexOf('profile/products/favorites.html') > 0) {
                                                location.reload();
                                            }
                                        }
                                    });
                                }
                            });
                },
                Отмена: function() {
                    $t.show();
                    $(this).dialog('close');
                }
            }
        });
    });

    // Скрытие/показ полного описания бренда
    $('.trigger-description-hidden-part').click(function(){

        if ($(this).hasClass('isVisible')) {
            $(this).removeClass('isVisible');
            $('.description-hidden-part').slideUp(200);
        } else {
            $(this).addClass('isVisible');
            $('.description-hidden-part').slideDown(200);
        }
        triggerText($(this));
    });
});