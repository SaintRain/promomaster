
/**
 * Для корзины
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

var speedAnimation = 200;

$(function() {

    $('.cart_product_qnt_input').inputmask({mask: 9, repeat: 3, greedy: false});

    /*
     $('.cart_pack').click(function(){
     if ($(this).hasClass('clicked')) {
     $(this).closest('tr').next('tr.cart_package').hide(100);
     $(this).removeClass('clicked');

     } else {
     $(this).closest('tr').next('tr.cart_package').show(100);
     $(this).addClass('clicked');
     }
     });
     */

    $('.qnt_btn,.cart_product_tool,.group_switch,.type_switch').disableSelection();

    // Обновление корзины
    function updateCart($this) {
        if ($this.hasClass('disabled')) {
            return;
        }

        var $tr = $this.closest('tr');
        var $input = $tr.find('.cart_product_qnt_input');
        var max = $input.data('max');
        $tr.find('.increase').removeClass('disabled');
        $tr.find('.decrease').removeClass('disabled');

        removeItem($this);
        $this.addClass('disabled');
        if ($this.data('action') === 'setQuantity') {
            if ($this.hasClass('decrease')) {
                if (parseInt($input.val()) - 1 > 0) {
                    $input.val(parseInt($input.val()) - 1);
                    $this.removeClass('disabled');
                } else {
                    $this.removeClass('disabled');
                    return;
                }
            } else if ($this.hasClass('increase')) {
                if (parseInt($input.val()) + 1 <= 999 && max >= parseInt($input.val()) + 1) {
                    $input.val(parseInt($input.val()) + 1);
                } else {
                    $this.removeClass('disabled');
                    return;
                }
            }
        }

        if ($input.val() > $input.data('max')) {
            alertCustom('Информация', 'Всего доступно на складе ' + $input.data('max') + ' шт.', {
                buttons: {
                    Ok: function() {
                        $input.val($input.data('max'));
                        updateCart($input);
                        $(this).dialog('close');
                    }
                }
            });
            $('.ui-dialog :button').focus();
            $this.removeClass('disabled');
            $('#create-order').addClass('disabled');
            $tr.find('.increase').addClass('disabled');
            return;
        }

        $('#create-order').addClass('disabled');

        $.ajax({
            type: 'POST',
            data: {id: $tr.data('id'), action: $this.data('action'), quantity: parseInt($input.val())},
            url: $tr.data('url')
        })
                .done(function(result) {
                    if (undefined !== result.error) {
                        alertCustom('Информация', result.error.join('<br>'), {
                            buttons: {
                                Ok: function() {
                                    $(this).dialog('close');
                                }
                            }
                        });
                        $('.ui-dialog :button').focus();
                    } else if (undefined !== result.success) {
                        $('#create-order').removeClass('disabled');
                        if ($this.data('action') === 'remove') {
                            $this.closest('tr').fadeOut(100, function() {
                                $(this).remove();
                                if ($('tr.cart_product').length === 0) {
                                    $('.cart_total,.cart_products_list').remove();
                                    $('.main_col_pad').html('<div class="info_box">Ваша корзина пуста</div>');
                                }
                            });
                        }
                    }

                    if (undefined !== result.data) {
                        $('.header_usercart_count').text(result.data.total_quantity);
                        if (result.data.total_quantity > 0) {
                            $('.header_usercart_info').text(declOfNum(result.data.total_quantity, ['товар', 'товара', 'товаров']) + ', ' + number_format(result.data.total_cost) + ' ' + $('.header_usercart_info').data('currency'));
                        } else {
                            $('.header_usercart_info').text($('.header_usercart_info').data('empty-text'));
                        }
                        var c = result.data.composition;
                        for (id in c) {
                            var $tr2 = $('tr[data-id="' + id + '"]');
                            $tr2.find('.composition_cost').text(number_format(c[id]['cost']));
                            $tr2.find('.discountValue').text(c[id]['discountValue']);
                            if (c[id]['isDiscountValueInPercent']) {
                                $tr2.find('.discountValueInCurrency').text(number_format(c[id]['discountValueInMoney']));
                            }
                        }
//                        $('#composition_total_cost').text(number_format(result.data.composition_total_cost));
                        $('#total_discount_summ').text(number_format(result.data.total_discount_summ));
                        $('#total_cost').text(number_format(result.data.total_cost));

                        var confines = result.data.confines;
                        if (confines.canCreateOrder === false) {
                            $('.order_proceed').hide();
                            $('.confines_min_sum').html(confines.msg).show();
                        } else {
                            $('.order_proceed').show();
                            $('.confines_min_sum').html('').hide();
                        }
                    }

                    $this.removeClass('disabled');

                    if ($this[0].tagName === 'SPAN') {
                        if (parseInt($input.val()) >= max/* || parseInt($input.val()) <= 1*/) {
                            $this.addClass('disabled');
                        }
                    }

                    if (parseInt($input.val()) >= max) {
                        $tr.find('.increase').addClass('disabled');
                        $tr.find('.decrease').removeClass('disabled');
                    } /*else if (parseInt($input.val()) <= 1) {
                        $tr.find('.decrease').addClass('disabled');
                        $tr.find('.increase').removeClass('disabled');
                    }*/

                });
    }

    $('#create-order').on('click', function() {
        if ($(this).hasClass('disabled')) {
            return;
        }
    });


    $('.qnt_btn, .delete').on('click', function() {
        updateCart($(this));
    });

    var changeVal = 0;
    $('.cart_product_qnt_input').on('focus', function() {
        val = $(this).val();
    });

    $('.cart_product_qnt_input').on('change keypress', function(e) {
        if (((e.type === 'change' && $(this).val() !== changeVal) && $('.cart_product_qnt_input').focus()) || (e.type === 'keypress' && (e.keyCode === 13 || e.which === 13))) {
            if ($('.ui-dialog:visible').length === 0) {
                var result = removeItem($(this));
                if (result) {
                    updateCart($(this));
                }
            }

            if (e.type === 'keypress') {
                changeVal = $(this).val();
            }
        }
    });

    // Переход на страницу "Данные покупателя"
    $('#create-order').on('click', function() {
        if ($(this).hasClass('disabled')) {
            return;
        }

        var url = $(this).data('url');
        location.href = url;
    });

    if ($('.more_info_timer').length) {
        var interval = setInterval(function() {
            now = parseInt($('.more_info_timer').text());
            if (now === 0) {
                clearInterval(interval);
                location.href = $('.more_info').attr('href');
            } else {
                $('.more_info_timer').text(now - 1);
            }
        }, 1000);
    }


    // Переключалки для выбора способа оплаты
    $('.group_switch').on('click', function(){
        $('.group_switch').removeClass('active');
        $('.type_switch').removeClass('active');
        $(this).addClass('active');

        var tab = $(this).data('tab');
        $('.type_switches').hide();
        if ($('.type_switches[data-content="' + tab + '"]').length) {

            $('.order_payment_type.type_switcher').show();
            $('.type_switches[data-content="' + tab + '"]').show();
        } else {
            $('.order_payment_type.type_switcher').hide();
        }

        $('#PaymentSystem').val($(this).data('val'));
        if ($.inArray($(this).data('val'), ['BankTransfer', 'PaymentOnDelivery', 'PlasticCardTerminal']) < 0) {
            $('.common_button span.text-trigger').text('Перейти к оплате...');
        } else {
            $('.common_button span.text-trigger').text('Оформить заказ');
        }
    });

    $('.type_switch').on('click', function() {
        $('.type_switch').removeClass('active');
        $(this).addClass('active');

        $('#PaymentSystem').val($(this).data('val'));
        if ($.inArray($(this).data('val'), ['BankTransfer', 'PaymentOnDelivery', 'PlasticCardTerminal']) < 0) {
            $('.common_button span.text-trigger').text('Перейти к оплате...');
        } else {
            $('.common_button span.text-trigger').text('Оформить заказ');
        }
    });

    $('.common_button').on('click', function(e){
        var paymentSystem = $('#PaymentSystem');
        if (paymentSystem.length && !paymentSystem.val().length) {
            e.preventDefault();
            alertCustom('Ошибка!', 'Выберите способ оплаты', {
                buttons: {
                    Ok: function() {
                        $(this).dialog('close');
                    }
                }
            });
            return false;
        }
    });

    /**
     * Удаление товара из корзины
     * @param $this
     * @returns {boolean}
     */
    var removeItem = function($this) {
        var $tr = $this.closest('tr'),
            $input = $('.cart_product_qnt_input', $tr),
            productCaption = $('.cart_product_name', $tr).text(),
            productRemoveLink = $('.delete.with_icon.text_tgl', $tr);

        if (( parseInt($input.val()) == 0 && $this.hasClass('cart_product_qnt_input')) || ($this.data('action') === 'setQuantity' && (parseInt($input.val()) == 1 || parseInt($input.val()) == 0) && $this.hasClass('decrease'))) {
            alertCustom('Информация', 'Вы действительно хотите удалить из корзины ' + productCaption, {
                buttons: {
                    "Да": function() {
                        productRemoveLink.trigger('click');
                        $( this ).dialog( "close" );
                    },
                    "Нет": function() {
                        $input.val(1);
                        $( this ).dialog( "close" );
                    }
                }
            });
            return false;
        }

        return true;
    }
});