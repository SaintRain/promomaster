/**
 * http://gabrieleromanato.name/jquery-ajax-autocomplete-for-e-commerce-products/
 * Корзина шаг 2 - 3
 *
 * @author Kaluzhny. N.
 * @copyright LLC "PromoMaster"
 */
(function($){
    var ajaxDeliveryCalc = [],
        myMap,
        myPlacemarkLatitude,
        myPlacemarkLongitude,
        myPlacemark,
        hideContactInfo = true,
        stopRecalc = null;
    $(function() {

        $('.delivery_btn').prop('disabled', true).addClass('disabled'); // выкл кнопку на шаге доставки 
        var isSent = false; // отправлен ли уже ajax

        // маски
        $('.phone_correct').inputmask({mask: "+7 (999) 999-99-99[9]", greedy: false });
        $('.passport').inputmask({mask: "9999 999999", greedy: true });

        $('#contragent_type input').click(function(){
            var $this = $(this),
                contragentForms = $('.contragent_form'),
                formId = $this.val();
                $this.prop('checked', true);
            contragentForms.each(function(index, element){
                var $this = $(element);
                if ($this.is('#' + formId)) {
                    $this.removeClass('hidden');
                } else {
                    $this.addClass('hidden');
                }
            });
        });

        $('body').on('change', '#cart_buyer_recipient_contactList, #delivery_recipient_form_contactList', function() {
            var $this = $(this),
                deliveryCity = $("input[id^='delivery_recipient_form_contact_city']"),
                cityCaption = $('.select2-container.city .select2-chosen'),
                cityBlock  = $('.select2-container.city.ajax-entity'),
                isBuyerPage = $('#indi_form, #legal_form').length,
                cityCaptionWrapper = $('.select2-choice', cityBlock),
                parentForm = $this.parentsUntil('form'),
                contact = $('option:selected', $this).data('contact');
            if ($this.val()) {
                for (var key in contact) {
                    if (key == 'city') {
                        $('.' + key).val(contact[key].id);
                        cityCaption.text(contact[key].caption);
                        //cityBlock.addClass('select2-allowclear');
                        cityCaptionWrapper.removeClass('select2-default');
                        //$('.' + key).select2("val", contact[key].id);
                    } else if (isBuyerPage && key == 'passport') {
                            if (contact[key]) {
                                $('.' + key).parents('fieldset.form_fieldset').show();
                                $('.' + key).val(contact[key]);
                            } else {
                                $('.' + key).parents('fieldset.form_fieldset').hide();
                                $('.' + key).val('');
                            }

                        } else {
                            $('.' + key).val(contact[key]);
                        }
                }
            } else {
                $('select, textarea, input:not([type="hidden"])', parentForm).each(function(index, element){
                    var $this = $(element);
                    $this.val('');
                   if ($this.hasClass('ajax-entity')) {
                       cityCaption.text('Город');
                       //cityBlock.removeClass('select2-allowclear');
                       cityCaptionWrapper.addClass('select2-default');
                       $this.select2("val", "");
                   }
                });
            }
        });
        
        $('body').on('change', '#delivery_recipient_form_contactList', function() {
            var $this = $(this),
                selected = $('option:selected', $this),
                recipientClose = $('.recipient_close'),
                recipientInfo = $('#contact_info'),
                recipientData = selected.data('contact'),
                name;
            if (!$this.val()) {
                return false;
            }
            if (recipientData.lastName) {
                name = recipientData.lastName + ' ' + recipientData.firstName + ' <br />тел.' + recipientData.phone +  '<br />г.' + recipientData.city.caption + ', '+ recipientData.address;
            } else {
                name = recipientData.organization + ' <br />тел.' + recipientData.phone +  '<br />г.' + recipientData.city.caption + ', '+ recipientData.address;
            }

            recipientInfo.html(name);
            recipientClose.removeClass('hidden');
        });

        $('.register_me').change(function(){
            var $this = $(this),
                parentBlock = $this.parents('form'),
                passwordBlock = $('.password', parentBlock);
            if ($this.prop('checked')) {
                passwordBlock.removeClass('hidden');
            } else {
                passwordBlock.addClass('hidden');
            }
        });

        $('.copy').blur(function(){
            var $this = $(this),
                parentBlock = $this.parents('form'),
                otherRecipient = $('.other_recipient', parentBlock);
            if (otherRecipient.prop('checked') == false) {
                printRecipient();
                copyFields($this, parentBlock);
            }
        });




        /*
        $('.copy').blur(function(){
            var $this = $(this),
                parentBlock = $this.parents('form'),
                sameInfo = $('.same_info', parentBlock);
            if ($this.prop('checked') == true) {
                copyFields($this, parentBlock);
            }
        });

        $('.same_info').change(function(){
            var $this = $(this),
                parentBlock = $this.parents('form');
                
            if ($this.prop('checked') == true) {
                $('.copy', parentBlock).each(function(index, element) {
                    var $this = $(element);
                        copyFields($this, parentBlock);
                });
            }
                 
        });
        */
        
        if ($('.other_recipient').prop('checked') == false || $('.legal_form:visible').length ) {
            var otherRecipientParentBlock = $('.other_recipient').parents('form');
            $('.copy', otherRecipientParentBlock).each(function(index, element) {
                    var $this = $(element);
                    copyFields($this, otherRecipientParentBlock);
            });
            printRecipient();
        }
        $('.other_recipient').change(function(){
            var $this = $(this),
                parentBlock = $this.parents('form'),
                recipientBlock = $('.recipient_part.hidden', parentBlock),
                recipientFieldsWrapper = $('.form_group.last .form_fieldset.other'),
                passportField = $('.passport', parentBlock),
                passportWrapper = passportField.parents('fieldset.form_fieldset'),
                recipientFields = $('.form_group.last .other input').filter(function(){
                    return $(this).prop('required');
                });

            passportWrapper.hide();
            passportField.val('');
            if ($this.prop('checked') == true) {

                recipientFields.attr('required', 'required');
                recipientFieldsWrapper.show();
            } else {
                recipientFieldsWrapper.hide();
                printRecipient();
                $('.copy', parentBlock).each(function(index, element) {
                    var $this = $(element);
                    copyFields($this, parentBlock);
                });
            }

        });
                
        $('body').on('click', '.group_switch', function(){
            var $this = $(this),
                sameClass = $('.group_switch'),
                blockToActivate = $('.type_switches'),
                deliveryType = $('.order_delivery_type'),
                deliveryOptions = $('.order_delivery_options'),
                deliveryMethods = $('.order_delivery_option'),
                activeBlock = null,
                activeCompany = null,
                activeCompanyWrapper = null,
                groupClass = [],
                companyClass = [];
            sameClass.removeClass('active');
            blockToActivate.removeClass('active');
            $this.addClass('active');
            if ($this.hasClass('delivery_group_self_pickup')) {
                deliveryType.addClass('self_pickup').removeClass('brown_gradient_box');
                deliveryOptions.addClass('self_pickup')
            } else if ($this.hasClass('delivery_group_free')) {
                deliveryType.addClass('delivery_group_free').removeClass('brown_gradient_box');
                deliveryOptions.addClass('delivery_group_free')
            } else {
                deliveryType.removeClass('delivery_group_free').removeClass('self_pickup').addClass('brown_gradient_box');
                deliveryOptions.removeClass('delivery_group_free').removeClass('self_pickup');
            }
            groupClass = $this.attr('class').match(/delivery_group_([a-zA-Z0-9-_]+)/);

            blockToActivate.each(function(index, element) {
                var $this = $(element);
                if ($this.hasClass(groupClass[0])) {
                    activeBlock = $this;
                    $this.addClass('active');
                } else {
                     $this.removeClass('active');
                }
            });
            activeCompanyWrapper = $('.type_switch.active', activeBlock);
            if (activeCompanyWrapper.length) {
                activeCompany = $('span', activeCompanyWrapper);
            } else {
                activeCompanyWrapper = $('.type_switch:first', activeBlock);
                activeCompanyWrapper.addClass('active');
            }
            activeCompany = $('span', activeCompanyWrapper);
            
            companyClass = activeCompany.attr('class').match(/delivery_([a-zA-Z0-9-_]+)/);

            deliveryMethods.removeClass('active');
            
            if ($this.hasClass('delivery_group_self_pickup') || $this.hasClass('delivery_group_free')) {
                $('.order_delivery_option.' + groupClass[0]).addClass('active');
            } else {
                $('.order_delivery_option.' + groupClass[0] + '.' + companyClass[0]).addClass('active');
            }
                    //return false;
            
        });

        $('.type_switch').click(function() {
            var $this = $(this),
                parentBlock = $this.parents('.type_switches'),
                sameClass = $('.type_switch', parentBlock),
                eltWithClass = $('.type_switch_icon', $this),
                deliveryMethodBlock = $('.order_delivery_option'),
                groupClass = [],
                companyClass = [];

            sameClass.removeClass('active');
            $this.addClass('active');
            companyClass = eltWithClass.attr('class').match(/delivery_([a-zA-Z0-9-_]+)/);
            groupClass = parentBlock.attr('class').match(/delivery_group_([a-zA-Z0-9-_]+)/);

            deliveryMethodBlock.each(function(index, element){
                var $this = $(element);
                if ($this.hasClass(companyClass[0]) && $this.hasClass(groupClass[0])) {
                    $this.addClass('active');
                } else {
                     $this.removeClass('active');
                }
            });
            //return false;
        });

        $('.order_delivery_recipient_edit_tgl').click(function() {
            var $this = $(this),
                parentBlock = $this.parents('.recipient_info'),
                blockToHide = $('.contact_info', parentBlock),
                submitBtn = $('.common_button.big.with_arrow'),
                recipientBlock = $('#inner_recipient');
            recipientBlock.slideDown('slow');
            blockToHide.hide();
            submitBtn.addClass('disabled').prop('disabled', true);
            //$('input, textarea, select', recipientBlock).prop('disabled', false);
        });

        $('.recipient_close').click(function() {
            var $this = $(this),
                parentBlock = $this.parents('.order_delivery_recipient'),
                conactInfo = $('#contact_info');
            if (conactInfo.text()) {
                closeForm();
            }
            
        });

        // обвновляем данные о контакте
        $('body').on('click', '.submit_form', function() {
            var $this = $(this),
                errorField = null,
                errorFieldParent = null,
                form = $this.parents('form'),
                formData = form.serialize(),
                deliveryCost = $('.order_delivery_option_price .text_tgl'),
                //deliveryCity = $('#delivery_recipient_form_contact_city'),
                deliveryCity = $("input[id^='delivery_recipient_form_contact_city']"),
                errorBlock = $('.order_delivery_recipient', form),
                contactList = $('#delivery_recipient_form_contactList', form),
                contactInfoBlock = $('#contact_info', form),
                firstOption = $('option:first', contactList),
                passportBlock = $('.passport_field.hidden'),
                isIndi = (passportBlock.length) ? true : false,
                newOption = {},
                fieldsWithErrors = $('.form_field_error', form);
            if (fieldsWithErrors.length) {
                fieldsWithErrors.removeClass('form_field_error');
                $('.form_field_error_txt', fieldsWithErrors).remove();
            }
            $.ajax({
                url: settingsJS.routes['ajax_contact_cart'],
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.result) {
                        if (data.contact.passport && passportBlock.length) {
                            passportBlock.removeClass('hidden');
                        }
                        if (data.contact.lastName) {
                            contactInfoBlock.html(data.contact.lastName + ' ' + data.contact.firstName + ' <br />тел.' + data.contact.phone +  '<br />г.' + data.contact.city.caption + ', '+ data.contact.address);
                        } else {
                            contactInfoBlock.html(data.contact.organization + ' <br />тел.' + data.contact.phone +  '<br />г.' + data.contact.city.caption + ', '+ data.contact.address);
                        }


                        //{{contact.name}}<br />тел.{{contact.phone}}<br />г.{{contact.city.name}}, {{contact.address}}
                        //newOption = $('<option value="' + data.contact.id + '">' + data.contact.lastName + ' ' + data.contact.firstName + ' (' + data.contact.address + ')</option>');
                        if (data.contact.id != contactList.val()) {
                            if (isIndi) {
                                newOption = $('<option value="' + data.contact.id + '">' + data.contact.lastName + ' ' + data.contact.firstName + ' (' + data.contact.address + ')</option>');
                            } else {
                                newOption = $('<option value="' + data.contact.id + '">' + data.contact.address + '</option>');
                            }
                            newOption.attr('data-contact', JSON.stringify(data.contact));
                            newOption.insertAfter(firstOption);
                            contactList.val(data.contact.id);
                        } else {
                            if (isIndi) {
                                $('option:selected', contactList).text(data.contact.lastName + ' ' + data.contact.firstName + ' (' + data.contact.address + ')').removeData('contact').data('contact', data.contact);
                            } else {
                                $('option:selected', contactList).text(data.contact.address).removeData('contact').data('contact', data.contact);
                            }

                        }
                        // запрускаем заново запросы на подсчет стомости
                        if (deliveryCity.data('city') != data.contact.city.id) {
                            // убиваем ajax запросы
                            for (var i = 0, len = ajaxDeliveryCalc.length; i < len; i++) {
                                ajaxDeliveryCalc[i].abort();
                            }
                            deliveryCost.addClass('in-proccess');
                            allMethodsCalculate(data.contact.city.id);
                        }
                        closeForm();
                    } else {
                        for (var key in data.errors.contact) {
                            errorField = $('#delivery_recipient_form_contact_' + key);
                            errorFieldParent = errorField.parent('.form_row_field');
                            errorFieldParent.addClass('form_field_error');
                            errorFieldParent.append('<div class="form_field_error_txt">' + data.errors.contact[key][0] + '</div>');
                        }
                        for (var key in data.errors) {
                            if (typeof data.errors[key] == "string") {
                                errorField = $('#delivery_recipient_form_' + key);
                                errorFieldParent = errorField.parent('.form_row_field');
                                errorFieldParent.addClass('form_field_error');
                                errorFieldParent.append('<div class="form_field_error_txt">' + data.errors[key][0] + '</div>');
                            }
                        }
                        if (!$('.attention_box').length) {
                            errorBlock.prepend('<div class="attention_box error_block" >' + settingsJS.trans['form_error'] + '</div>');
                        }

                        
                    }
                },
                error: function() {
                    console.log('error');
                }
            });
            return false;
        });
        
        $('body').on('click', '.order_delivery_option', function() {
            var $this = $(this),
                deliveryBtn = $('.delivery_btn'),
                parentRow = $this.parents('tr.order_delivery_option')
                sameClass = $('.order_delivery_option'),
                recipientForm =  $('#inner_recipient'),
                recipientBlock = $('#inner_recipient'),
                contactBlock = $('.contact_info'),
                curChecked  = $('.make_checked'),
                curInput = $(".order_delivery_option_select input[type=radio]",$this),
                inputsToOff = $(".order_delivery_option_select input:not(."+curInput.attr('class')+")"),
                inputsToOn = $(".order_delivery_option_select input."+curInput.attr('class')),
                deliveryMetthodId = $('#delivery_recipient_form_deliveryMethod'),
                curPrice = $('.order_delivery_option_price span', $this),
                deliveryCost = $('#delivery_recipient_form_deliveryCost'),
                deliveryPoint = $('#delivery_recipient_form_deliveryPoint'),
                companyName = $this.data('company').replace('delivery_', ''),
                passportField = $('#delivery_recipient_form_contact_passport'),
                passportBlock = $('.passport_field.hidden'),
                methodId = null,
                activeCompany = null,
                errorBlock = $('.attention_box'),
                groupClass = [],
                groups = $('.group_switch'),
                companies = $('.type_switch'),
                companyClass = [],
                cost = curPrice.text().replace(/([A-Za-zА-Яа-я\s]+)\.$/g, '');
            if (curInput.prop('disabled') == true) {
                return false;
            }
            if (curChecked.length) {
                curChecked.removeClass('make_checked');
                // убиваем ajax запросы
                for (var i = 0, len = ajaxDeliveryCalc.length; i < len; i++) {
                    ajaxDeliveryCalc[i].abort();
                }
                allMethodsCalculate();
            }
            //console.log(stopRecalc);
            /*
            // необходимо прибививать ajax запрос
            // если выбрана бесплатная доставка
            if (stopRecalc && parentRow.hasClass('delivery_group_free')) {
                //stopRecalc.abort();
                curChecked.removeClass('make_checked');
                console.log(curChecked);
            }*/
            deliveryBtn.prop('disabled', true).addClass('disabled');
            sameClass.removeClass('selected');
            groups.removeClass('selected');
            companies.removeClass('selected');
            inputsToOff.prop('checked', false).prop('required', false);
            inputsToOn.attr('required', 'required');

            $this.addClass('selected');
            if ($this.hasClass('first')) {
                $('.group_switch.' + $this.data('group')).addClass('selected');
                activeCompany = $('.type_switch.active .' + $this.data('company'));
                if (activeCompany.length) {
                    activeCompany.parents('.type_switch').addClass('selected');
                }
            }
            if (curInput.hasClass('delivery_point')) {
                methodId = curInput.data('delivery-method');
                deliveryPoint.val(curInput.val());
            } else {
                deliveryPoint.prop('required', false);
                deliveryPoint.removeAttr('required');
                deliveryPoint.val('');
                methodId = curInput.val();
            }
            if (!recipientForm.is(":visible")) {
                deliveryBtn.prop('disabled', false).removeClass('disabled');
            }
            deliveryMetthodId.val(methodId);
            deliveryCost.val(cost);
            curInput.prop('checked', true);
            if (passportBlock.length && companyName == 'dellin' && !passportField.val().length ) {
                passportField.attr('required', 'required');
                passportField.parent('.form_row_field').addClass('form_error').addClass('form_field_error');
                recipientBlock.show();
                contactBlock.hide();
                if (passportBlock.length) {
                    passportBlock.show();
                }
                deliveryBtn.prop('disabled', true).addClass('disabled');
            } else {
                if (passportBlock.length) {
                    passportBlock.hide();
                }

                if (hideContactInfo) {
                    recipientBlock.hide();
                    contactBlock.show();
                }
                errorBlock.remove();
                passportField.parent('.form_row_field').removeClass('form_error').removeClass('form_field_error');
                passportField.removeAttr('required');
                deliveryBtn.prop('disabled', false).removeClass('disabled');
            }
        });

        $('.delivery_btn').click(function(){
            var $this = $(this),
                recipientBlock = $('#inner_recipient'),
                blockToHide = $('#delivery_form .contact_info'),
                recipientBlockElts = $('input, select, textarea', recipientBlock),
                passport = $('#delivery_recipient_form_contact_passport'),
                contactList = $('#delivery_recipient_form_contactList');
                
            if (!$this.hasClass('disabled') && passport.prop('required') && !passport.val() && recipientBlock.is(":hidden")) {
                recipientBlock.show();
                blockToHide.hide();
            } else if (contactList.length && !$this.hasClass('disabled') && !contactList.val() && recipientBlock.is(":hidden")) {
                blockToHide.hide();
                $this.prop('disabled', true).addClass('disabled');
                recipientBlock.slideDown('slow');
            }
        });
        
        $('#delivery_form').submit(function() {
            var fromBlock = $('#in_form'),
                toBlock = $('#from_form');
            fromBlock.remove();
            toBlock.replaceWith(fromBlock);
        });
        
        setTimeout(function(){
            allMethodsCalculate(null);
        }, 1000);
        
        checkFormValidation();
        changeContact();
        $('.order_delivery_option .text_tgl').click(function() {
            var deliveryCity  = $("input[id^='delivery_recipient_form_contact_city']"),
                $this = $(this),
                curCost = $this.text().replace(/([A-Za-zА-Яа-я\s\.]+)$/gi, '');
            if (!deliveryCity.val() || curCost.length) {
                return false;
            }
            
            var parentBlock = $this.parents('.order_delivery_option'),
                deliveryCost = $('.order_delivery_option_price .text_tgl', parentBlock),
                deliveryInfo = $('.order_delivery_option_terms', parentBlock),
                deliveryMethod = $('.order_delivery_option_select input', parentBlock),
                delivery = {
                    deliveryCityId: deliveryCity.val(),
                    deliveryMethodId: deliveryMethod.val(),
                    deliveryMethod : deliveryMethod
                },
                fields = {
                    cost : deliveryCost,
                    info: deliveryInfo
                };
            deliveryInfo.text(settingsJS.trans['order_delivery_in_proccess']);
            $this.addClass('in-proccess');
            calcluateDeliveryCost(delivery, fields);
        });

        makeNextStepActive();
        /*
        $('.order_delivery_option_map_tgl').click(function() {
            var $this = $(this),
                curUrl = $this.attr('href'),
                win;
            if (curUrl != '#') {
                win = window.open(curUrl, '_blank');
                win.focus();
            }

        });
        */
        activateDeliveryMethod();

        // точки самовывоза на карте
        $('.order_delivery_option_map_tgl.text_tgl').click(function(){
            //$('body').on('click', '.order_delivery_option_map_tgl.text_tgl', function() {
            var $this = $(this),
                parentBlock = $this.parents('tr.order_delivery_option'),
                popupTitle = $('td > strong',parentBlock).text(),
                placemarkContent = $('td > span',parentBlock).text(),
                modalWindow = $('.delivery_map_popup');

            if ($('#modal_window_header').length) {
                $('#modal_window_header').text(popupTitle)
            } else {
                modalWindow.prepend('<h2 id="modal_window_header">' + popupTitle +'</h2>')
            }

            if ($this.data('latitude') && $this.data('longitude')) {
                $('.delivery_map_popup').modal('show');

                myPlacemark = new ymaps.Placemark(
                    [$this.data('latitude'), $this.data('longitude') * 1],
                    {
                        balloonContentHeader: popupTitle,
                        balloonContentBody: placemarkContent
                    },
                    {
                        iconLayout: 'default#image',
                        iconImageHref: "/images/map_pin_active.png",
                        // Размеры метки.
                        iconImageSize: [26, 45 ],
                        // Смещение левого верхнего угла иконки относительно
                        // её "ножки" (точки привязки).
                        iconImageOffset: [-3, -45]
                    }
                );

                myPlacemarkLatitude = $this.data('latitude');
                myPlacemarkLongitude = $this.data('longitude');
                ymaps.ready(init);
            }
            return false;
        });

        $('.delivery_map_popup .modal_window_close').click(function(){
            $('.delivery_map_popup').modal('hide');
            myMap.destroy();
        });
        
    });

    /**
     * Копирование полей
     * @param {object} elt
     * @param {object} parentBlock
     */
    var copyFields = function(elt, parentBlock) {
        var matchResult = [],
            exp = /([a-zA-Z]+)_copy/,
            needClass = '';
        matchResult = elt.attr('class').match(exp);
        needClass = matchResult[0].replace('_copy', '');
        $('.' + needClass, parentBlock).val(elt.val());
        if (elt.prop('required')) {
            //console.log($('.' + needClass, parentBlock));
            if ($('.' + needClass, parentBlock).is(':hidden') && $('.' + needClass, parentBlock).val()) {
                $('.' + needClass, parentBlock).removeAttr('required');
            } else {
                $('.' + needClass, parentBlock).attr('required', 'required');
            }
        }
        
    }

    /**
     * Сокрытие формы
     * @returns {void}
     */
    var closeForm = function() {
        var recipientForm = $('#inner_recipient'),
            recipientInfo = $('.contact_info'),
            passportBlock = $('.passport_field.hidden'),
            editLink = $('.order_delivery_recipient_edit_tgl'),
            form = recipientForm.parents('form'),
            submitBtn = $('.common_button.big.with_arrow'),
            fieldsWithErrors = $('.form_field_error', form),
            deliveryMethod = $('.order_delivery_option input:checked');
            if (deliveryMethod.length) {
                submitBtn.removeClass('disabled').prop('disabled', false);
            }
            
            if (fieldsWithErrors) {
                fieldsWithErrors.removeClass('form_field_error');
                $('.form_field_error_txt', fieldsWithErrors).remove();
                $('.error_block').remove();
            }

            recipientForm.slideUp('slow', function(){
                if (editLink.hasClass('hidden')) {
                    editLink.removeClass('hidden');
                }
                recipientInfo.show();
                //$('input, textarea, select', recipientForm).prop('disabled', true);
            });
    }

    /**
     * Подсчет стоимости доставки
     * @param {object} delivery - инфо о доставке
     * @param {object} fields - поля которое следует обновить
     * @returns {void}
     */
    var calcluateDeliveryCost = function(delivery, fields) {
        delivery.deliveryMethod.prop('disabled', true);
        var curAjax;
        var pos = 0,
            deliveryInfoText = '',    
            checkedElt = $('.delivery_method.make_checked'),
            parentRow = delivery.deliveryMethod.parents('.order_delivery_option'),
            formData = '';
        for (var key in delivery) {
            if (!pos) {
                formData += key + '=' + delivery[key];
            } else {
                formData += '&' + key + '=' + delivery[key];
            }
            pos++;
        }

        curAjax = $.ajax({
                url: settingsJS.routes['ajax_delivery_calculate'],
                type: 'POST',
                data: formData,
                success: function(data) {
                    if (data.result.cost) {
                        deliveryInfoText = data.result.days.transPeriod;
                        if (data.result.orderDeliveryDays) {
                            deliveryInfoText += "<br />" + data.result.orderDeliveryDays;
                        }
                        fields.cost.text(data.result.cost + settingsJS.trans['order_label_rub']);
                        fields.info.html(deliveryInfoText);
                        fields.cost.removeClass('in-proccess').removeClass('text_tgl');
                        delivery.deliveryMethod.prop('disabled', false);
                        if (checkedElt.length) {
                            checkedElt.prop('checked', true);
                        }
                        if (delivery.deliveryMethod.hasClass('make_checked')) {
                            delivery.deliveryMethod.removeClass('make_checked');
                            hideContactInfo = false;
                            parentRow.trigger('click');
                        }
                    } else {
                        fields.cost.removeClass('in-proccess');
                        fields.cost.text(settingsJS.trans['order_label_delivery_re_calc']);
                        fields.info.text((data.result.msg) ? data.result.msg : settingsJS.trans['order_label_delivery_error_full']);
                    }
                },
                error: function() {
                    console.log('error');
                }
            });
        if (delivery.deliveryMethod.hasClass('make_checked')) {
            stopRecalc = curAjax;
        }
        ajaxDeliveryCalc.push(curAjax);
    }

    /**
     * Подсчет стоимости доставки для каждого способа
     * @returns {void}
     */
    var allMethodsCalculate = function(cityId) {
        //var deliveryCity = $('#delivery_recipient_form_contact_city');
        var deliveryCity = $("input[id^='delivery_recipient_form_contact_city']");
        if (!deliveryCity.val()) {
            return false;
        }
        $('.order_delivery_option.calculate').each(function(index, element) {
            var $this = $(element),
                deliveryCost = $('.order_delivery_option_price .text_tgl', $this),
                deliveryInfo = $('.order_delivery_option_terms', $this),
                deliveryMethod = $('.order_delivery_option_select input', $this),
                delivery = {
                    deliveryCityId: (cityId) ? cityId : deliveryCity.val() ,
                    deliveryMethodId: deliveryMethod.val(),
                    deliveryMethod : deliveryMethod
                },
                fields = {
                    cost : deliveryCost,
                    info: deliveryInfo
                };
            if (deliveryMethod.prop('checked') == true) {
                deliveryMethod.prop('checked', false);
                deliveryMethod.addClass('make_checked');
            }
            //deliveryCost.addClass('in-proccess');
            calcluateDeliveryCost(delivery, fields);

        });
    }

    var checkFormValidation = function() {
        var recipientBlock = $('#inner_recipient'),
            errors = $('.form_field_error_txt', recipientBlock),
            contactBlock = $('.contact_info');
        if (errors.length) {
            recipientBlock.show();
            contactBlock.hide();
        }
    }

    /**
     * Вызываем расчет стоимости доставки заново
     * если выбран новый контрагент а у него другой город
     * @returns {void}
     */
    var changeContact = function() {
        var originalSelect = $('#delivery_recipient_form_contactList option:selected');
        
        $('body').on('focus', '#delivery_recipient_form_contactList', function() {
            originalSelect = $('option:selected', this);
        }).on('change', '#delivery_recipient_form_contactList', function() {
            var $this = $(this),
                curSelected = $('option:selected', this),
                deliveryCost = $('.order_delivery_option_price .text_tgl'),
                preRecipientData = originalSelect.data('contact'),
                curRecipientData = curSelected.data('contact');
            $this.trigger('blur');
            if (curRecipientData && preRecipientData && curRecipientData.id != preRecipientData && preRecipientData.city.id !=  curRecipientData.city.id) {
                // убиваем ajax запросы
                for (var i = 0, len = ajaxDeliveryCalc.length; i < len; i++) {
                    ajaxDeliveryCalc[i].abort();
                }
                deliveryCost.addClass('in-proccess')
                allMethodsCalculate(null);
            }
        });
    }
    
    /**
     * Активируем сследующий шаг если выбран самовывоз
     * @returns {void}
     */
    var makeNextStepActive = function() {
        var deliveryPoint = $('.delivery_point:checked'),
            submitBtn = $('.common_button.big');
        if (deliveryPoint.length) {
            submitBtn.removeClass('disabled').prop('disabled', false);
        }
    }

    /**
     * Активируем самовывоз или доставку по городу если она выбрана
     * @returns {void}
     */
    var activateDeliveryMethod = function() {
        var deliveryMethod = $('.delivery_method:checked'),
            parentRow = deliveryMethod.parents('tr.order_delivery_option');
        if (parentRow.hasClass('delivery_group_free') || parentRow.hasClass('delivery_group_self_pickup')) {
            hideContactInfo = true;
            parentRow.trigger('click');
        }
    }
    //console.log($('.copy:visible'));
    /**
     * Показываем данные о получателе
     */
    var printRecipient = function() {
        var recipientInfoBlock = $('.recipient_info'),
            contragentFields = $('.copy:visible'),
            answer = [],
            recipientBlock = contragentFields.parents('form').find('.recipient_part.hidden'),
            allFieldsDone,
            recipientInfoBody = '';
        allFieldsDone = contragentFields.filter(function() {
            return !this.value && $(this).prop('required');
        });
        if (allFieldsDone.length) {
            recipientBlock.hide();
        } else {
            contragentFields.each(function(index, element) {
                var $this = $(element);
                if ($this.val()) {
                    if ($this.hasClass('phone_copy')) {
                        answer[2] = ', тел. ' + $this.val();
                    } else if ($this.hasClass('contactEmail_copy')) {
                        answer[3] = ', email ' + $this.val();
                    } else if ($this.hasClass('lastName_copy')) {
                        answer[0] = $this.val();
                    } else if ($this.hasClass('firstName_copy')) {
                        answer[1] = ' ' + $this.val();
                    } else if ($this.hasClass('organization_copy')) {
                        answer[0] = $this.val();
                    }
                }
            });
            recipientInfoBlock.html('<p>' + answer.join('') + '</p>');
            recipientBlock.show();
        }
    }

    /**
     * Yand
     * @returns {undefined}ex Maps Init
     */
    function init(){
        myMap = new ymaps.Map("map", {
            center: [myPlacemarkLatitude, myPlacemarkLongitude],
            zoom: 15
        });
        myMap.geoObjects.add(myPlacemark);
    }
    
})(jQuery)