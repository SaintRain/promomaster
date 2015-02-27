;
"use strict";
(function($){
    var deliveryReq = [];
    var deliveryMethodsCount = 0;
    $(function(){
        
        
        $("select[id$='deliveryMethod'] option").each(function(index, element){
            $this = $(element);
            if ($this.data('instancename') == 'Service') {
                deliveryMethodsCount++;
            }
        });
        
        // ошибки для накладных
        $('.tabs-errors').each(function(index, element){
            var $this = $(element),
                parentBlock = $this.parents('.tab-pane'),
                parentLink = $("a[href='#"+parentBlock.attr('id')+"']"),
                errorLink = $('.icon-exclamation-sign', parentLink);
                
            errorLink.removeClass('hide');
            $this.removeClass('hide');
        });
        
        // просчет стоимости посылки
        $("select[id$='deliveryMethod']").on('change',function(e){
            var deliveryMethod = $(this),
                deliveryPoint = $("select[id$='deliveryPoint']"),
                disabled = false;
            if ($('option:selected', deliveryMethod).data('instancename') == 'ServiceWithAddress') {
                disabled = true;
            }
            getDeliveryInfoFields(deliveryPoint, disabled);
            calculateDeliverPrice(deliveryMethod, e.val, true);
        });
        
        // перерасчет стоимости посылки
        $('body').on('click', '.delivery-recalc', function(){
            var $this = $(this),
                deliveryMethod = $("select[id$='deliveryMethod']");
            calculateDeliverPrice(deliveryMethod, deliveryMethod.val(), true);
        });

        // просчет стоимости посылки всеми сопособами доставки
        $('body').on('click', '.delivery-calc-all', function() {
            var deliveryMethods = $("select[id$='deliveryMethod'] option"),
                allMethodsWrapper = $('.all-methods-container'),
                allMethodsContainer = $('.all-methods-container table tbody'),
                calcRes = false,
                deliveryMethod = $("select[id$='deliveryMethod']");
            /* 
            // Не удалять может пригодится   
            calcRes = calculateDeliverPrice(deliveryMethod, deliveryMethod.val(), true);
            if (!calcRes) {
                return false;
            }*/
            if (!allMethodsWrapper.hasClass('hidden')) {
                allMethodsWrapper.addClass('hidden');
                allMethodsContainer.html('');
            }
            deliveryMethods.each(function(index, element){
                var $this = $(element);
                if ($this.val() && $this.data('companyname') && $this.data('companyname') != 'shop_default') {
                    calculateDeliverPrice($this, $this.val(), false);
                }    
            });
        });

        $('body').on('click', '.all-methods-container tr a', function(){
            var $this = $(this),
                parentRow = $this.parents('tr'),
                deliveryMethodElt = $("select[id$='deliveryMethod']"),
                deliveryPriceElt = $("input[id$='deliveryPrice']"),
                costElt = $('td.cost-cell', parentRow);
                deliveryPriceElt.val(costElt.text());
                deliveryMethodElt.select2("val", parentRow.data('delivery-method'));
                reCalcLink();
            return false;
        });
        // удаление элементов коллекции
        $('body').on('click','.collection-modify-delete', function(){
           var $this = $(this),
           order = $('.order-num'),
           waybillBlock,
           waybillNum,
           elements,
           navTabs,
           collectionHolder,
           deliveryMethod,
           waybillPackages,
           seller = $("select[id$='deliveryMethod']"),
           elToActivate = $('.add-tab').parent('li'),
           elToRemove,
           removeLink,
           addLink = '<div class="pull-left"><a class="btn collection-modify-add" href="#" title="добавить"><i class="icon-plus"></i></a></div>',
           parent;
            // удаляем строки
           if ($this.parents('.collection-row').length) {
               parent = $this.parents('.collection-row');
               if (parent.siblings('.collection-row').length) {
                   if ($this.parent('div').prev('div').find('.collection-modify-add').length) {
                       removeLink = $('div .collection-modify-delete',parent.next());
                       removeLink.parent('div').before(addLink);
                   }
                   parent.remove();
               } else {
                   collectionHolder = $this.parents('.collection-modify');
                   collectionHolder.next().remove();
                   parent.replaceWith('<li class="first-add"><a href="javascript:void(0);" class="btn collection-modify-add">Добавить упаковку</a></li>');
               }
            //    удаляем табы
           } else if ($this.parents('.tab-collection').length) {
                parent = $this.parents('.tab-collection');
                navTabs = $('.nav-tabs', parent),
                elToRemove = $this.parents('li').remove();
                waybillPackages = $('.waybill-packages', parent);
                waybillBlock = $($('a',elToRemove).attr('href'));
                waybillNum = $("input[id$='number']", waybillBlock);
                deliveryMethod = $("select[id$='deliveryMode']", waybillBlock);
                seller = $("select[id$='salesMan']", waybillBlock);
                console.log(waybillPackages.length);
                if (waybillPackages.length == 1) {
                    navTabs.addClass('only-add');
                }
                if (waybillNum.val()) {
                     $.ajax({
                         url: adminRoutes['admin_core_delivery_service_cancel'],
                         type: 'GET',
                         data: 'waybillId=' + waybillNum.val() + '&sellerId=' + seller.val() + '&deliveryMethodId=' + deliveryMethod.val() + '&orderId=' + order.data('order'),
                         success: function(data) {
                             console.log(data);
                         },
                         error: function() {
                             alert('Серверная ошибка');
                         }
                     });
                }
                waybillBlock.remove();
                parent.tabs( "refresh" );
                elements = $('.nav > li',parent);
                if (elements.length == 1) {
                    elToActivate.addClass('active');
                }
            
           }            
           return false;
        });

        $('body').on('click', '.add-tab', function(){
            addTabs();
            return false;
        });

        $('body').on('click','.collection-modify-add', function(){
            addRow($(this));
            waybillLink();
            return false;
        });
        $('body').on('click', "input[id$='isPaidStatus']", function(){
            waybillLink();
        });

        // перед сабмитом формы прибиваем ajax запросы
        $('.form-horizontal').submit(function(){
            if (deliveryReq.length) {
                for (var i = 0, len = deliveryReq.length; i < len; i++) {
                    deliveryReq[i].abort();
                }
           }
        });
        /**
         * Генерация окна с формой для ввода доп инфы
         * для получения накладной
         */
        $('body').on('click', '.generate-waybill', function(){
            var $this = $(this),
                errors = [],
                formData = {},
                sel = {},
                errMsg = '',
                needData = [],
                compositions = $("div[id$='compositions'] > span > table > tbody > tr"),
                collection = $this.parent().siblings('.collection-modify').find('.collection-row'),
                modal = $this.parent().siblings('.modal'),
                formPlacement = $('.modal-body', modal);

            errors['seller'] = 'Необходимо указать продавца';
            errors['contragent'] = 'Необходимо указать покупателя';
            errors['store'] = 'Необходимо указать склад';
            errors['deliveryMethod'] = 'Необходимо вырать способ доставки';
            errors['cart'] = 'Необходимо добавить хотя бы один товар';
            errors['sizesOfBox'] = 'Необходимо добавить хотя бы одну упаковку';
            errors['deliveryPrice'] = 'Необходимо указать предварительную стоимость доставки';
            errors['cdek'] = 'Для СДЭК всегда должна быть 1 упаковка';
            errors['deliveryCity'] = 'Необходимо выбрать город доставки';
            errors['deliveryAddr'] = 'Необходимо указать адрес доставки';
            errors['recipientFio'] = 'Необходимо указать ФИО получателя';
            errors['recipientPhone'] = 'Необходимо указать телефон получателя';

            needData['deliveryMethod'] = $("select[id$='deliveryMethod'] option:selected");
            needData['deliveryPrice'] = $("input[id$='deliveryPrice']");
            needData['contragent'] = $("input[id*='contragent'].ajax-entity");
            needData['seller'] = $("select[id$='seller']");
            needData['store'] = $("select[id$='stock']");
            needData['generateForm'] = true;
            needData['deliveryCity'] = $("input[id*='deliveryCity'].ajax-entity");
            needData['deliveryAddr'] = $("input[id$='deliveryAddress']");
            needData['recipientFio'] = $("input[id$='recipientFio']");
            needData['recipientPhone'] = $("input[id$='recipientPhone']");
            needData['recipientEmail'] = $("input[id$='recipientEmail']");
            needData['order'] = $(".order-num");

            formData = {
                sizesOfBox : [],
                cart : [],
                sellerId : needData['seller'].val(),
                storeId : needData['store'].val(),
                deliveryMethodId: needData['deliveryMethod'].val(),
                contragentId: needData['contragent'].val(),
                deliveryPrice: needData['deliveryPrice'].val(),
                generateForm: needData['generateForm'],
                deliveryCityId: needData['deliveryCity'].val(),
                deliveryAddr: needData['deliveryAddr'].val(),
                recipientFio: needData['recipientFio'].val(),
                recipientPhone: needData['recipientPhone'].val()
            };

            if (needData['contragent'].data('legal') == 1) {
                errors['recipientCompany'] = 'Необходимо указать название';
                needData['recipientCompany'] = $("input[id$='recipientCompany']");
                formData.recipientCompany = needData['recipientCompany'].val();
            }
            
            // проверка что все необходимые данные введены корректно
            if (needData['deliveryMethod'].data('companyname') == 'dpd' || needData['deliveryMethod'].data('companyname') == 'cdek') {

                // состав товара
                compositions.each(function(index, element) {
                    var arr = [],
                        item = {};

                    arr['quantity'] = $("input[id$='quantity']", element),
                    arr['id'] = $("input[id*='product']", element),
                       
                   item = {
                        quantity : arr['quantity'].val(),
                        id : arr['id'].val()
                   };
                   formData.cart.push(item);
                   errMsg += errorForField(item, arr, 'cartError');
                });

                // упаковки
                collection.each(function(index, element) {
                    var arr = [],
                        item = {};
                    arr['len'] = $("input[id$='length']", element);
                    arr['width'] = $("input[id$='width']", element);
                    arr['height'] = $("input[id$='height']", element);
                    arr['weight'] = $("input[id$='weight']", element);
                    arr['isWeightInKg'] = $("select[id$='isWeightInKg']", element);
                    item = {
                         len : arr['len'].val(),
                         width : arr['width'].val(),
                         height : arr['height'].val(),
                         weight : arr['weight'].val(),
                         isWeightInKg : arr['isWeightInKg'].val(),
                    };
                    errMsg += errorForField(item, arr, 'boxesError');
                    formData.sizesOfBox.push(item);
                });

                // Для cdek одна накладная = одна упаковка
                if (needData['deliveryMethod'].data('companyname') == 'cdek' && collection.length > 1) {
                    setError($this, 'pre-gen-error', false, errors['cdek'], true);
                    return false;
                }
                // остальные ошибки
                errMsg += errorsForArr(formData, needData, errors);
                if (errMsg) {
                    $('.generate-waybill').data('modal', 0);
                    setError($this, 'pre-gen-error', false, errMsg, true);
                    return false;
                }
            } else {
                setError($this, 'pre-gen-error', false, 'Генерация накладной только доступна для СДЭК и DPD', true);
                return false;
            }
            
            // модальное окно с формой
            if ($this.data('modal')) {
                modal.modal();
            } else {
                formData.recipientEmail = needData['recipientEmail'].val();
                formData.orderId = needData['order'].data('order');
                $.ajax({
                    url: adminRoutes['admin_core_delivery_service_waybill'],
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        formPlacement.html(data);

                        $('.with-select', modal).each(function(index, element){
                            if ($(element).attr('readonly')) {
                                $(element).prop('readonly', true);
                            }
                            $(element).select2({
                                width : 'resolve',
                                readonly: ($(element).prop('readonly')) ? true : false
                            });
                        });
                        modal.modal();
                        $this.data('modal',1);
                        sel = {
                            affiliate: $('#terminalTo', modal),
                            city: $('#deliveryCity', modal)
                        }
                        hideOptions(sel);
                    },
                    error: function(data) {
                        $.removeData($this, 'modal');
                        formPlacement.html('<h2>Ошибка на сервере</h2>');
                        modal.modal();
                    }
                });
            }
            
            return false
        });

        waybillLink();
        reCalcLink();

        $("input[id$='deliveryPrice']").change(function(){
            waybillLink();
            reCalcLink();
        });

        $("div[id$='compositions'] > span > table > tbody > tr input[id*='product'], div[id$='compositions'] > span > table > tbody > tr input[id$='quantity'],input[id*='deliveryCity'], input[id$='deliveryPrice'], input[id$='deliveryAddress'], input[id$='contragent'], select[id$='seller'], select[id$='stock']").change(function(){
            // .collection-row input, .collection-row select - не должны учитываться
            var waybillBtn = $('.generate-waybill');
            waybillBtn.data('modal', 0);
        });

        $("body").on('click', '.collection-modify-add, .collection-modify-delete', function(){
            var waybillBtn = $('.generate-waybill');
            waybillBtn.data('modal', 0);
        });
        
        /**
         * Подставляем город автоматически
         */
        $("select[id$='deliveryPoint']").on('change', function(e){
            getDeliveryInfoFields(e, true);
        });
        
        deliveryPointVisibility();
        
        // фиксируем изменения о полях
        $("input[id*='deliveryCity'].ajax-entity, input[id$='deliveryAddress'], input[id$='deliveryPostcode']").on('change', function(e){
            var $this = $(this),
                cityCaption = '',
                val = (e.added) ? e.val : $this.val();
            if (val) {
                $this.attr('data-val', val);
                if (e.added) {
                    cityCaption = (e.added.regionName) ? (e.added.name + ', '+ e.added.regionName) : e.added.name;
                    $this.attr('data-caption', cityCaption);
                }
            }
        });
    });

    
    /**
     * Проставление ошибок
     * @param {object} elt - элемент c ошибкой
     * @param {string} errClass - класс ошибок
     * @param {boolean} off - вкл - выкл ошибки
     * @param {string} msg - сообщение об ошибке
     *
     */
    /*
    var setError = function(elt, errClass, off, msg, closest) {
        var errContainer = $('body > .container-fluid .' + errClass),
            groupParentElt = (closest) ? elt.closest('.control-group') : elt.parents('.control-group'),
            errElt = '<div class="alert ' + errClass + ' alert-error">PLACEHOLDER<button data-dismiss="alert" class="close" type="button">×</button></div>';

        if (off) {
            errContainer.remove();
            groupParentElt.removeClass('error');
        } else {
            errElt = errElt.replace("PLACEHOLDER", msg);

            if (!errContainer.length) {
                $('body > .container-fluid').prepend(errElt);
                $('.alert').alert();
                groupParentElt.addClass('error');
                $('html,body').animate({
                    scrollTop: 0
                }, 'slow');
            }
        }
    }*/
    var setError = function(elt, errClass, off, msg, closest) {
        var errContainer = $('body > .container-fluid .alert-error'),
            groupParentElt = (closest) ? elt.closest('.control-group') : elt.parents('.control-group'),
            errElt = '<div class="alert ' + errClass + ' alert-error"><button data-dismiss="alert" class="close" type="button">×</button>PLACEHOLDER</div>';

        if (off || errContainer.length) {
            errContainer.remove();
            groupParentElt.removeClass('error');
        } 
        if (!off) {
            errElt = errElt.replace("PLACEHOLDER", msg);
            $('body > .container-fluid').prepend(errElt);
            $('.alert').alert();
            groupParentElt.addClass('error');
            $('html,body').animate({
                scrollTop: 0
            }, 'slow');
        }
    }

    /**
     * Добавление нового эл-та коллекции (для табов)
     */
    var addTabs = function() {
        var tabsHolder  = $('.tab-collection'),
            navTabs = $('.nav-tabs', tabsHolder),
            tabs = $('.tab-pane', tabsHolder),
            index = tabs.length,
            linksHolder = $('.nav-tabs li:last-child', tabsHolder),
            collectionHolder = $('.tab-content',tabsHolder),
            prototype = collectionHolder.data('prototype'),
            newForm = prototype.replace(/__waybill__/g, index),
            newTab,
            newLink;
        if (navTabs.hasClass('only-add')) {
            navTabs.removeClass('only-add');
        }
        collectionHolder.append(newForm);
        $('li', tabsHolder).removeClass('active');
        newTab = collectionHolder.find('div.tab-pane:last');
        newTab.find('.datepicker').datepicker();
        newTab.attr('id', newTab.attr('id') + '_' + index);
        newLink = '<li class="active">'+
                   '<a class="tabs-toogle" href="#' + newTab.attr('id') + '" data-toggle="tab">'+
                   '<i class="icon-exclamation-sign has-errors hide"></i>'+
                   '<span>Накладная № ' + (index + 1) + '</span>'+
                   '<span title="удалить" class="ui-icon ui-icon-close collection-modify-delete"></span>'+
                   '</a>'+
                   '</li>';
        linksHolder.after(newLink);
        index++;
        $('.tab-pane', collectionHolder).removeClass('active');
        newTab.addClass('active');
    }
    
    /**
     * Добавление нового эл-та коллекции 
     */
    var addRow = function(element) {
        var collectionHolder = element.parents('.collection-modify'),
            addFirstRow = $('.first-add',collectionHolder),
            collectionRows =  $('.collection-row', collectionHolder),
            index = collectionRows.length,
            addLink = '<div class="pull-left"><a class="btn collection-modify-add" href="#" title="добавить"><i class="icon-plus"></i></a></div>',
            prototype = collectionHolder.data('prototype'),
            newForm = prototype.replace(/__box__/g, index),
            removeLink,
            genWaybillLink = '<div class="control-group">'+
                                '<a class="btn generate-waybill">Сгенерировать накладную</a>'+
                            '</div>'+
                            '<div class="modal waybill-modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
                                '<div class="modal-header">'+
                                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                                '<h3 id="myModalLabel">Генерация накладной</h3>'+
                                '</div>'+
                                '<div class="modal-body">'+
                                '</div>'+
                                '<div class="modal-footer">' +
                                    '<a href="javascript:void(0);" class="btn" data-dismiss="modal" aria-hidden="true">Оменить генерацию</a>' +
                                    '<a href="javascript:void(0);" class="btn btn-primary waybill-submit-form">Сгенирировать</a>' +
                                '</div>' +
                            '</div>';
        if (index) {
            collectionHolder.append(newForm);
        } else {
            addFirstRow.replaceWith(newForm);
            removeLink = $('li',collectionHolder).find('.collection-modify-delete').parent('div');
            removeLink.before(addLink);
            collectionHolder.after(genWaybillLink);
        }
        
        $('li:last-child .with-select',collectionHolder).select2({
            width : 'resolve'
        });
        index++;
    }

    /**
     * Скрывать показывать ссылку генерации накладной
     * @returns {undefined}
     */
    var waybillLink = function () {
        var deliveryMethod = $("select[id$='deliveryMethod'] option:selected"),
            deliveryPrice = $("input[id$='deliveryPrice']"),
            orderIsPaid = $("input[id$='isPaidStatus']"),
            link = $('.generate-waybill');
        if (link.length) {
            if ((deliveryMethod.data('companyname') == 'dpd' || deliveryMethod.data('companyname') == 'cdek') && deliveryPrice.val() && orderIsPaid.prop('checked')) {
                link.removeClass('hidden');
            } else {
                link.addClass('hidden');
            }
        }
        
    }

    /**
     * Скрывать показывать кнопку пересчета
     * @returns {undefined}
     */
    var reCalcLink = function() {
        var link = $('.delivery-recalc'),
            deliveryMethod = $("select[id$='deliveryMethod'] option:selected");

        if (deliveryMethod.data('companyname') && deliveryMethod.data('companyname') != 'shop_default' && deliveryMethod.val()) {
            link.removeClass('hidden');
        } else {
            link.addClass('hidden');
        }
    }

    /**
     * Ошибка для каждого поля в коллекции
     * @param {object} item - элемент коллекции 
     * @param {array} arr - массив элеметов строки
     * @param {string} errKey - ключ в массиве ошибок
     * @returns {undefined}
     */
    var errorForField = function(item, arr, errKey) {
        var err = [],
            regex,
            msg = '',
            ajaxEntity;
        //console.log(item, arr, errKey);
        //return false;
        err['cartError'] = 'Данные о товарах заполнены не полностью';
        err['boxesError'] = 'Данные об упаковках заполнены не полностью';
        regex = new RegExp(err[errKey],'i');
        for (var key in item) {
            ajaxEntity = arr[key].siblings('.ajax-entity').find('a');
            arr[key] = (ajaxEntity.length) ? ajaxEntity : arr[key];
            if (item[key] === "") {
                arr[key].addClass('error-modify');
                if (!regex.test(msg)) {
                    msg += err[errKey] + '<br />';
                }
            } else {
                arr[key].removeClass('error-modify');
            }
        }
        return msg;
    }

    /**
     * Проставление ошибок для всех данных необходимых для ajax запросы
     * @param {object} formData - данные
     * @param {array} needData - массив с эл-тами 
     * @returns {String}
     */
    var errorsForArr = function(formData, needData, errors) {
        var errMsg = '';
        for (var key in formData) {
            var needKey = key.replace(/Id/, ''),
                ajaxEntity;
            if (needData[needKey] instanceof jQuery) {
                ajaxEntity = needData[needKey].siblings('.ajax-entity').find('a');
                needData[needKey] = (ajaxEntity.length) ? ajaxEntity : needData[needKey];
            }
            if ($.isArray(formData[key]) && !formData[key].length) {
                errMsg += errors[key] + '<br />';
            } else if (!formData[key] && needData[needKey]) {
                needData[needKey].addClass('error-modify');
                errMsg += errors[needKey] + '<br />';
            } else if (needData[needKey] && needData[needKey] instanceof jQuery) {
                needData[needKey].removeClass('error-modify');
            }
        }
        return errMsg;
    }

    /**
     * Просчет стоимости доставки
     * @param {object} element - метод доставки (объект jQuery)
     * @param {integer} curVal - значение
     * @param {Boolean} needToUpdateCost - необходимо ли обновлять перблизительную стоимость доставки
     * @returns {Boolean}
     */
    var calculateDeliverPrice = function(element, curVal, needToUpdateCost) {
        var $this = element,
            curReq,
            daysStr = '',
            selected = (needToUpdateCost) ? $('option:selected', element) : $this,
            deliveryPoint = $("div[id$='deliveryPoint'].control-group"),
            deliveryPointElt = $('select', deliveryPoint),
            allMethodsWrapper = $('.all-methods-container'),
            allMethodsContainer = $('.all-methods-container table tbody'),
            allMethodsMaxRow,
            costRow,
            eltToRotate = (needToUpdateCost) ? $('.delivery-recalc i') : $('.delivery-calc-all i'),
            intreval,
            waybillBtn = $('.generate-waybill'),
            cost = '',
            order = $('.order-num'),
            ajaxErrMsg = '',
            priceField = $("input[id$='deliveryPrice']"),
            errClass = 'delivery-error',
            compositions = $("div[id$='compositions'] > span > table > tbody > tr"),
            formData = {},
            errors = [],
            errMsg = '',
            needData = [];
            errors['seller'] = 'Необходимо указать продавца';
            errors['contragent'] = 'Необходимо указать покупателя';
            errors['store'] = 'Необходимо указать склад';
            errors['cart'] = 'Необходимо добавить хотя бы один товар';
            errors['deliveryMethod'] = 'Необходимо вырать способ доставки';
            errors['deliveryCity'] = 'Необходимо выбрать город доставки';
            errors['deliveryAddr'] = 'Необходимо указать адрес доставки';

            needData['seller'] = $("select[id$='seller']");
            needData['contragent'] = $("input[id*='contragent'].ajax-entity");
            needData['store'] = $("select[id$='stock']");
            needData['deliveryCity'] = $("input[id*='deliveryCity'].ajax-entity");
            needData['deliveryAddr'] = $("input[id$='deliveryAddress']");

            reCalcLink();
            // удаляем данные чтобы заново генерировать окно
            // для получения накладной
            waybillBtn.data('modal', 0);
            
            // для самовывоза нет никаких просчетов
            // так же необходимо показать пункты выдачи
            if (needToUpdateCost && (!selected.data('companyname') || selected.data('companyname') == 'shop_default') && curVal) {
                if (selected.data('instancename') ==  'ServiceWithAddress') {
                    deliveryPoint.removeClass('hidden');
                    deliveryPointElt.prop("required",true);
                    deliveryPointElt.data('hidden', false);
                } else {
                    deliveryPoint.addClass('hidden');
                    deliveryPointElt.prop("required",false);
                    deliveryPointElt.data('hidden', true);
                }
                return false;
            } else {
                deliveryPoint.addClass('hidden');
                deliveryPointElt.prop("required", false);
                deliveryPointElt.data('hidden', true);
            }
            if (curVal) {
                formData = {
                    cart: [],
                    deliveryCityId: needData['deliveryCity'].val(), 
                    sellerId: needData['seller'].val(),
                    deliveryAddr: needData['deliveryAddr'].val(),
                    storeId : needData['store'].val(),
                    deliveryMethodId: $this.val(),
                    contragentId: needData['contragent'].val(),
                    orderId: order.data('order')
                }

                //priceField.prop('readonly', true);
                compositions.each(function(index, element) {
                    var arr = [],
                         item = {};

                     arr['quantity'] = $("input[id$='quantity']", element),
                     arr['id'] = $("input[id*='product']", element),

                    item = {
                         quantity : arr['quantity'].val(),
                         id : arr['id'].val()
                    };
                    formData.cart.push(item);
                    errMsg += errorForField(item, arr, 'cartError');
                });

                errMsg += errorsForArr(formData, needData, errors);
                if (errMsg) {
                    setError($this, errClass, false, errMsg, false);
                    return false;
                } else {
                    setError($this, errClass, true, null, false);
                    setError(priceField, errClass, true, null, false);
                    //priceField.prop('readonly', true);
                    if (!intreval) {
                        intreval = rotate(eltToRotate);
                    }
                    
                    curReq = $.ajax({
                        url: adminRoutes['admin_core_delivery_service_deliveryPrice'],
                        type: "POST",
                        data: formData,
                        success: function(data) {
                            if (data.cost) {
                                cost = data.cost + "";
                                cost = cost.replace(".",",");
                                if (needToUpdateCost) {
                                    priceField.val(cost);
                                    setError(priceField, errClass, true, null, false);
                                } else {
                                    if (data.days) {
                                        if (data.days.minDays && data.days.maxDays && (data.days.minDays != data.days.maxDays)) {
                                            daysStr = data.days.minDays + ' - ' + data.days.maxDays;
                                        } else {
                                            daysStr = (data.days.minDays) ? data.days.minDays : data.days.maxDays;
                                        }  
                                    }
                                    costRow = '<tr data-cost="' + data.cost + '" data-delivery-method="' + formData.deliveryMethodId + '"><td><a href="#">' + $this.text() + '</a></td><td data-sort="float" class="cost-cell">' + cost + '</td><td>' + daysStr + '</td></tr>';

                                    $('tr', allMethodsContainer).each(function(index, element){
                                        var $this = $(element);
                                        if ($this.data('cost') >= data.cost) {
                                            allMethodsMaxRow = $this;
                                            return false;
                                        }
                                    });
                                    
                                    if (allMethodsMaxRow) {
                                        $(costRow).insertBefore(allMethodsMaxRow);
                                    } else {
                                        allMethodsContainer.append(costRow);
                                    }
                                    if (allMethodsWrapper.hasClass('hidden')) {
                                        allMethodsWrapper.removeClass('hidden');
                                    }
                                }
                                
                            } else if(!data.cost && needToUpdateCost) {
                                priceField.val('');
                                ajaxErrMsg = (typeof(data.msg) == 'undefined') ? 'Не удалось подключиться к серверу компании' : data.msg;
                                setError(priceField, errClass, false, ajaxErrMsg, false);
                            }
                            deliveryMethodsCount--;
                            if (deliveryMethodsCount == 0) {
                                sortDeliveryTable();
                            }
                            //priceField.prop('readonly', false);
                            clearInterval(intreval);
                        },
                        error: function(data) {
                            deliveryMethodsCount--;
                            if (deliveryMethodsCount == 0) {
                                sortDeliveryTable();
                            }
                            clearInterval(intreval);
                            if (needToUpdateCost) {
                                priceField.val('');
                                //priceField.prop('readonly', false);
                                setError(priceField, errClass, false, 'Ошибка на сервере', false);
                            }
                        }
                    });
                    deliveryReq.push(curReq);
                }
            } /*else {
                priceField.prop('readonly', false);
            }*/

            waybillLink();
            return true;
    }
    /**
     *
     * @param {object} eltToRotate
     * @returns {interval}
     */
    var rotate = function(eltToRotate) {
        var degree = 0,
            interval;
        interval = setInterval(function(){
            degree += 3;
            eltToRotate.css({ transform: 'rotate(' + degree + 'deg)'});
        }, 1);
        return interval;
    }
    
    /**
     *
     * @param {type} data
     */
    var hideOptions = function(data) {
        $('option', data.affiliate).each(function(index, element){
           var $this = $(element);
           if ($this.hasClass('hidden')) {
               $this.removeClass('hidden');
           }
           if (data.city.val() != $this.data('citycode')) {
               $this.addClass('hidden');
           }
        });
    }
    
    /**
     * Проставялем город для доставки (самовывоз)
     * @param {object} deliveryPoint
     * @returns void
     */
    var getDeliveryInfoFields = function(deliveryPoint, disabled) {
        var fields = {
                deliveryAddress: $("input[id$='deliveryAddress']"),
                deliveryPostCode: $("input[id$='deliveryPostcode']"),
                city: $("input[id*='deliveryCity'].ajax-entity")
            },
            parentBlock = fields.city.siblings('.select2-container'),
            cityName = $('.select2-chosen', parentBlock),
            cityChoiceBlock = $('a.select2-choice', parentBlock),
            deliveryPointId = (deliveryPoint.currentTarget) ? deliveryPoint.val : deliveryPoint.val(),
            deliveryMethod = $("select[id$='deliveryMethod'] option:selected"),
            errPlace = (deliveryPoint.currentTarget) ? $(deliveryPoint.currentTarget).siblings('.select2-container') : deliveryPoint.siblings('.select2-container');
            for (var key in fields) {
                fields[key].prop('readonly', disabled);
            }
            cityChoiceBlock.removeClass('select2-default');
            fields.city.select2("readonly", disabled);
        if (!disabled) {
            for (var key in fields) {
                fields[key].val(fields[key].data('val') ? fields[key].data('val') : '');
                
            }
            if (fields.city.data('caption')) {
                cityName.text(fields.city.data('caption'));
            } else {
                fields.city.select2("val", "");
            }
            
        }    
        if (!deliveryPointId || deliveryMethod.data('instancename') != 'ServiceWithAddress') {
            return true;
        }
        $.ajax({
            url: adminRoutes['admin_core_delivery_service_deliveryCity'],
            type: "POST",
            data: "id="+ deliveryPointId,
            success: function(data) {
                if (data.result) {
                    fields.city.val(data.city.id);
                    cityName.text(data.city.name);
                    errPlace.popover('destroy');
                    fields.deliveryAddress.val(data.city.address);
                    fields.deliveryPostCode.val('');
                } else {
                    errPlace.popover('destroy');
                    errPlace.popover({
                        content: 'Невозможно получить город',
                        html: true,
                        template: '<div class="popover"><div class="arrow"></div><div class="popover-inner"><div class="popover-content alert-error"><p></p></div></div></div>',
                        placement: 'right',
                        trigger: 'hover'
                    });
                    errPlace.popover('show');
                }
                
            },
            error: function(){
                errPlace.popover('destroy');
                errPlace.popover({
                    content: 'На сервере произошла ошибка',
                    html: true,
                    template: '<div class="popover"><div class="arrow"></div><div class="popover-inner"><div class="popover-content alert-error"><p></p></div></div></div>',
                    placement: 'right',
                    trigger: 'hover'
                });
                errPlace.popover('show');
            }
        });
    }
    
    /**
     * Видимость пункта выдачи
     * @returns {undefined} 
     */
    var deliveryPointVisibility = function() {
        var deliveryMethod = $("select[id$='deliveryMethod'] option:selected"),
            deliveryPoint = $("input[id$='deliveryPoint']"),
            deliveryPointParent = $("div.control-group"),
            error = $('.alert.alert-danger'),
            fields = {
                deliveryAddress: $("input[id$='deliveryAddress']"),
                deliveryPostCode: $("input[id$='deliveryPostcode']"),
                city: $("input[id*='deliveryCity'].ajax-entity")
            };
        if (error.length && deliveryMethod.data('instancename') == 'ServiceWithAddress' && deliveryPointParent.hasClass('hidden')) {
            deliveryPointParent.removeClass('hidden');
            fields.city.select2("readonly", true);
            for (var key in fields) {
                fields[key].prop('readonly', true);
            }
        }
    }
    
    var sortDeliveryTable = function() {
        // сортировка таблицы результатов от ТК
        var table = $(".all-methods-container table");
        if (table.length) {
            table.stupidtable({
                "period" : function(a,b) {
                    var tempA = a.split('-'),
                        tempB = b.split('-');

                    a = (tempA[1]) ? tempA[1].trim() : tempA[0].trim();
                    b = (tempB[1]) ? tempB[1].trim() : tempB[0].trim();
                    return a - b;
                }
            }).bind('aftertablesort', function (event, data) {
                    // data.column - the index of the column sorted after a click
                    // data.direction - the sorting direction (either asc or desc)

                    var th = $(this).find("th");
                    th.find(".arrow").remove();
                    var arrow = data.direction === "asc" ? "↑" : "↓";
                    th.eq(data.column + 1).append('<span class="arrow">' + arrow +'</span>');
            });
        }
    }
    
})(jQuery)