"use strict";
(function($) {
    $(function() {
        $('body').on('change', '.modal #service', function(e) {
            var $this = $(this),
                    replaceArr = [],
                    types = $("option:selected", $this).html(),
                    parentblock = $this.parents('.waybill-form'),
                    buyerFullAddress = $('.buyer-full-address', parentblock),
                    buyerTerminal = $('.buyer-terminal', parentblock),
                    sellerFullAddress = $('.seller-full-address', parentblock),
                    company = $('#company', parentblock),
                    sellerTerminal = $('.seller-terminal', parentblock),
                    from = $("#deliveryFrom", parentblock),
                    to = $("#deliveryTo", parentblock),
                    inputData = {
                        cost: $('.delivery-price span', parentblock),
                        internalCode: $this.val()
                    },
            expr;
            expr = new RegExp('склад|дверь', 'igm');
            types = types.match(expr);
            if (from.prop('readonly') && to.prop('readonly') && types) {
                // значения совпадаю со значениями в селектах
                for (var i = 0, typesLen = types.length; i < typesLen; i++) {
                    if ('склад' == types[i]) {
                        replaceArr[i] = 0;
                    } else {
                        replaceArr[i] = 1;
                    }
                }
                from.val(replaceArr[0]).select2({val: replaceArr[0], width: 'resolve'});
                to.val(replaceArr[1]).select2({val: replaceArr[1], width: 'resolve'});
            }
            // Посылка ДО двери или нет
            if (to.val() == 0) {
                buyerFullAddress.addClass('hidden');
                buyerTerminal.removeClass('hidden');
            } else {
                buyerFullAddress.removeClass('hidden');
                buyerTerminal.addClass('hidden');
            }

            // компания dpd частный случай
            if (company.val() != 'dpd') {
                //Послыка ОТ двери или нет
                if (to.val() == 0) {
                    sellerFullAddress.addClass('hidden');
                    sellerTerminal.removeClass('hidden');
                } else {
                    sellerFullAddress.removeClass('hidden');
                    sellerTerminal.addClass('hidden');
                }
            }

            calculate(inputData);
        });

        /**
         * Логика для полей забор - доставка груза
         */
        $('body').on('change', '#deliveryFrom, #deliveryTo', function() {
            var $this = $(this),
                    selector = ($this.attr('id') == 'deliveryFrom') ? 'seller' : 'buyer',
                    parentblock = $this.parents('.waybill-form'),
                    terminal = $('.' + selector + '-terminal', parentblock),
                    activeTerminal = $('option:selected', terminal),
                    company = $('#company', parentblock),
                    addr = $('#' + selector + 'Addr', parentblock),
                    fullAddress = $('.' + selector + '-full-address', parentblock);
            if ($this.val() == 0) {
                addr.text((activeTerminal.length && activeTerminal.val()) ? activeTerminal.text() : 'Вначале необходимо выбрать терминал');
            } else {
                addr.text(addr.data('addr'));
            }

            if (company.val() == 'dpd') {
                return false;
            }

            if ($this.val() == 0) {
                fullAddress.addClass('hidden');
                terminal.removeClass('hidden');
            } else {
                fullAddress.removeClass('hidden');
                terminal.addClass('hidden');
            }


        });

        // Обработка для терминалов
        $('body').on('change', '#terminalFrom, #terminalTo', function() {
            var $this = $(this),
                    selector = ($this.attr('id') == 'terminalFrom') ? 'seller' : 'buyer',
                    parentblock = $this.parents('.waybill-form'),
                    activeTerminal = $('option:selected', $this),
                    delivery = $('#' + $this.attr('id').replace('terminal', 'delivery'), parentblock),
                    addr = $('#' + selector + 'Addr', parentblock);
            if (delivery.val() == 0) {
                addr.text((activeTerminal.length && activeTerminal.val()) ? activeTerminal.text() : 'Вначале необходимо выбрать терминал');
            }
        });

        $('body').on('change', "input[id$='isSent']", function() {

            var $this = $(this),
                    parentBlock = $this.parents('.waybill-packages'),
                    buttons = [],
                    removeWaybill = $("a[href='#" + parentBlock.attr('id') + "'] .collection-modify-delete");
            buttons[0] = $("input[id$='isInProccess']", parentBlock);
            buttons[1] = $("input[id$='isReadyToIssue']", parentBlock);
            if ($this.attr('checked')) {
                removeWaybill.hide();
                buttons[0].prop('readonly', false);
            } else {
                removeWaybill.show();
                for (var i = 0, len = buttons.length; i < len; i++) {
                    buttons[i].prop('readonly', true).prop('checked', false);
                }
            }
        });

        $('body').on('change', "input[id$='isInProccess']", function() {
            var $this = $(this),
                    parentBlock = $this.parents('.waybill-packages'),
                    buttons = [];

            buttons[0] = $("input[id$='isReadyToIssue']", parentBlock);

            if ($this.prop('checked')) {
                buttons[0].prop('readonly', false);
            } else {
                for (var i = 0, len = buttons.length; i < len; i++) {
                    buttons[i].prop('readonly', true).prop('checked', false);
                }
            }
        });
        
        /*
        $('body').on('change', "selet[id=$'extraServices']", function() {
            var $this = $(this),
                    selectedElt = $('option:selected', $this),
                    curForm = $this.parents('.waybill-form'),
                    isDeliveryIncludedInPayment = $('#isDeliveryIncludedInPayment', curForm);
            if (selectedElt.text() == 'Наложенный платеж') {
                isDeliveryIncludedInPayment.prop('checked', false)
            }
        });
        */
        /**
         * Генерация накладной
         */
        $('body').on('click', '.waybill-submit-form', function() {
            var $this = $(this),
                    modal = $this.parents('.modal'),
                    modalBody = $('.modal-body', modal),
                    errorBox = '<div class="alert alert-error alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>PLACEHOLDER</div>',
                    errorMsg = 'При генерации произошла ошибка.',
                    errorBlock = $('.alert-error', modal),
                    parentBlock = $this.parents('.waybill-packages'),
                    isDeliveryIncludedInPayment = $("input[id$='isDeliveryIncludedInPayment']"),
                    isAutoGenerated = $("input[id$='isAutoGenerated']", parentBlock),
                    salesMan = $('#' + parentBlock.attr('id') + '_salesMan'),
                    deliveryMode = $('#' + parentBlock.attr('id') + '_deliveryMode'),
                    waybillPrice = $('#' + parentBlock.attr('id') + '_price'),
                    elt,
                    waybillSeller = $("select[id$='seller']"),
                    waybillDeliveryMethod = $("select[id$='deliveryMethod']"),
                    printWaybillLink,
                    //collection = $('.collection-row', parentBlock),
                    deliveryDate = $("input[id$='dateTime']", parentBlock),
                    waybillNum = $("input[id$='number']", parentBlock),
                    waybillBtn = $(".generate-waybill", parentBlock),
                    curForm = $('form', modal),
                    extraData = '',
                    eltWithErrors = $('.error-modify', modalBody);

            eltWithErrors.removeClass('error-modify');
            extraData += 'orderId=' + $('.order-num').data('order') + '&isDeliveryIncludedInPayment=';
            extraData += (isDeliveryIncludedInPayment.attr('checked')) ? 1 : 0;
            extraData += (deliveryDate.val()) ? ('date=' + deliveryDate.val() + '&') : '&';
            /*
             collection.each(function(index, element){
             extraData += 'packages['+index+'][len]=' + $("input[id$='length']", element).val() + '&';
             extraData += 'packages['+index+'][width]=' + $("input[id$='width']", element).val() + '&';
             extraData += 'packages['+index+'][height]=' + $("input[id$='height']", element).val() + '&';
             extraData += 'packages['+index+'][weight]=' + $("input[id$='weight']", element).val() + '&';
             extraData += 'packages['+index+'][isWeightInKg]=' + $("select[id$='isWeightInKg']", element).val() + '&';
             });
             */
            extraData = extraData.replace(/&$/, '');
            $.ajax({
                url: adminRoutes['admin_core_delivery_service_waybill'] + '?' + extraData,
                type: "POST",
                data: curForm.serialize(),
                success: function(data) {
                    if (data.body.waybillNum) {
                        printWaybillLink = adminRoutes['admin_core_delivery_service_print_waybill'].replace('PLACEHOLDER', $('.order-num').data('order'));
                        printWaybillLink += '?waybillId=' + data.body.waybillNum + '&sellerId=' + waybillSeller.val() + '&deliveryMethodId=' + waybillDeliveryMethod.val();
                        waybillNum.val(data.body.waybillNum).attr({
                            readonly : 'readonly',
                            required: 'required'
                        });
                        waybillPrice.attr({required: 'required'});
                        isAutoGenerated.val('1');
                        salesMan.val(waybillSeller.val());
                        deliveryMode.val(waybillDeliveryMethod.val());
                        waybillBtn.text('Распечатать накладную').removeClass('generate-waybill').addClass('print-waybill btn-info');
                        waybillBtn.attr({
                            target: '_blank',
                            href: data.printWaybillUrl//printWaybillLink
                        });
                        modal.modal('hide');
                    } else {
                        errorMsg = (data.body.msg) ? data.body.msg : errorMsg;
                        errorBox = errorBox.replace(/PLACEHOLDER/, errorMsg);
                        if (errorBlock.length) {
                            errorBlock.remove()
                        }
                        modalBody.prepend(errorBox);
                        modalBody.animate({
                            scrollTop: 0
                        }, 'slow');
                        for (var key in data.body) {
                            elt = $('#' + key, modal).addClass('error-modify');
                            elt.popover('destroy');
                            elt.popover({
                                content: '<div class="form_field_error_txt">' + data.body[key] + '</div>',
                                html: true,
                                template: '<div class="popover"><div class="arrow"></div><div class="popover-inner"><div class="popover-content alert-error"><p></p></div></div></div>',
                                placement: 'right',
                                trigger: 'hover'
                            });
                        }
                    }
                },
                error: function(data) {
                    errorBox = errorBox.replace(/PLACEHOLDER/, 'Ошибка на сервере');
                    if (errorBlock.length) {
                        errorBlock.remove()
                    }
                    modalBody.prepend(errorBox);
                    modalBody.animate({
                        scrollTop: 0
                    }, 'slow');
                }

            })
        });


    });

    var calculate = function(inputData) {
        var formData = {},
                compositions = $("div[id$='compositions'] > span > table > tbody > tr"),
                needData = [];

        needData['seller'] = $("select[id$='seller']");
        needData['contragent'] = $("input[id*='contragent'].ajax-entity");
        needData['deliveryMethod'] = $("select[id$='deliveryMethod']");
        needData['store'] = $("select[id$='stock']");
        needData['deliveryCity'] = $("input[id*='deliveryCity'].ajax-entity");
        needData['deliveryAddr'] = $("input[id$='deliveryAddress']");

        formData = {
            cart: [],
            deliveryCityId: needData['deliveryCity'].val(),
            sellerId: needData['seller'].val(),
            deliveryAddr: needData['deliveryAddr'].val(),
            storeId: needData['store'].val(),
            deliveryMethodId: needData['deliveryMethod'].val(),
            contragentId: needData['contragent'].val(),
            internalCode: inputData.internalCode
        }

        compositions.each(function(index, element) {
            var arr = [],
                    item = {};

            arr['quantity'] = $("input[id$='quantity']", element),
                    arr['id'] = $("input[id*='product']", element),
                    item = {
                        quantity: arr['quantity'].val(),
                        id: arr['id'].val()
                    };
            formData.cart.push(item);
        });
        inputData.cost.text('Идет расчет...');
        $.ajax({
            url: adminRoutes['admin_core_delivery_service_deliveryPrice'],
            type: "POST",
            data: formData,
            success: function(data) {
                if (data.cost) {
                    inputData.cost.text(data.cost + ' руб.');
                } else {
                    inputData.cost.text((data.msg) ? data.msg : 'Не удалось подключиться к серверу компании');
                }
            },
            error: function() {
                inputData.cost.text('Ошибка на сервере');
            }
        });
    }
})(jQuery);