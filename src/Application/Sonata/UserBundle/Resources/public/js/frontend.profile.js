
/**
 * Скрипт для с личным кабинетов пользователя
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

$(function(){

    $('#clear-history-products').click(function(){
        var url = $(this).data('url-clear');
        alertCustom('Подтверждение', 'Вы уверенны, что хотите очистить историю просмотренных товаров?', {
            buttons: {
                Да: function(){
                    $dialog = $(this);
                    $.ajax({
                        type: 'POST',
                        url: url
                    })
                            .done(function(result) {

                                if (undefined !== result.success) {
                                    var h2 = $('.cabinet_history h2');
                                    $('.cabinet_history').html(h2);
                                    $('.cabinet_history h2').after(result.success.join('<br>'));
                                    $dialog.dialog('close');
                                }
                                if (undefined !== result.error) {
                                    alertCustom('Сообщение', result.error.join('<br>'), {
                                        buttons: {
                                            Ok: function() {
                                                $(this).dialog('close');
                                            }
                                        },
                                        close: function() {
                                            if (location.href.indexOf('profile/products/history.html') > 0) {
                                                location.reload();
                                            }
                                        }
                                    });
                                }
                            });
                },
                Отмена: function(){
                    $(this).dialog('close');
                }
            }
        });

    });


    // Показ модального окна с выбором оплаты заказа
    $('.cabinet_order_payment_change_tgl').on('click', function(){
        $('.change_payment_type').fadeIn('fast');
    });

    // Скрытие модального окна с выбором оплаты заказа
    $('.modal_window_close, .modal_window_close_by_cancel').on('click',function() {
        $('.modal_window').fadeOut('fast');
    });
    $(document).keyup(function(e){
        if (e.keyCode === 27 && $('.change_payment_type:visible').length) {
            $('.modal_window').fadeOut('fast');
        }
    });

    // Нажатие на повтор платежа
    $('#paymentRetry').on('click', function(){

        var ps = $(this).data('payment-system');

        $('#PaymentSystem').val(ps).closest('form').submit();

        return false;
    });

});