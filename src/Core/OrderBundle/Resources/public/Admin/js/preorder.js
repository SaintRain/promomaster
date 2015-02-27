/**
 * @author Kaluhniy N.I.
 */
"use strict";
(function ($) {
    $(function () {
        // создание заказа
        $('body').on('click', '.create-order', function () {
            var $this = $(this),
                    textBlock = $('span', $this),
                    errors = [],
                    orderRoute = adminRoutes['admin_core_order_order_edit'] = adminRoutes['admin_core_order_order_edit'],
                    route = adminRoutes['admin_core_order_preorder_preorder_createOder'],
                    icon = $('i', $this);
            $.ajax({
                url: route,
                type: 'POST',
                data: 'id=' + $this.data('obj-id'),
                success: function (data) {
                    if (data.result) {
                        orderRoute = orderRoute.replace("PLACEHOLDER", data.orderId);
                        $this.attr('href', orderRoute);
                        icon.removeClass('icon-plus-sign').addClass('icon-zoom-in');
                        textBlock.text('Посмотреть заказ');
                    } else {
                        $this.addClass('create-order');
                        for (var key in data.errors) {
                            errors.push(key + " - " + data.errors[key]);
                        }
                        $this.popover({
                            title: 'Произошла ошибка',
                            html: true,
                            trigger: 'hover',
                            placement: 'left',
                            content: errors.join('<br />')
                        });
                        $this.popover('show');
                        $this.addClass('create-order');
                    }
                },
                error: function () {
                    console.log('error');
                }
            });
            $this.popover('destroy');
            $this.removeClass('create-order');
            return false;
        });

        // контакты выбранного контрагента
        $('body').on('click', '.select-contragent-contacts', function () {
            var $this = $(this),
                    contragent = ($("input.ajax-entity[id*='contragent']").length) ? $("input.ajax-entity[id*='contragent']") : $("select[id$='_contragent']"),
                    errors = [],
                    contactData,
                    modalWindow = $('#modal-contacts'),
                    contactsListBlock = $('#contragent-contacts').html(''),
                    contactElt = '',
                    key,
                    route = adminRoutes['admin_core_order_preorder_preorder_contact'];

            if ($this.hasClass('disabled')) {
                return false;
            }
            if (contragent.val()) {
                $.ajax({
                    url: route,
                    type: 'POST',
                    data: 'id=' + contragent.val(),
                    success: function (data) {
                        if (data.result) {
                            for (var key in data.contacts) {
                                contactData = JSON.stringify(jQuery.parseJSON(data.contacts[key]));
                                contactElt = $('<li><a href="#">' + key + '</a></li>')
                                contactElt.attr('data-contact', contactData);
                                contactsListBlock.append(contactElt);
                            }
                            modalWindow.modal('show');
                        } else {
                            modalWindow.modal('hide');
                            for (var key in data.errors) {
                                errors.push(key + " - " + data.errors[key]);
                            }
                            $this.popover({
                                title: '<b>Произошла ошибка</b>',
                                html: true,
                                trigger: 'click',
                                placement: 'bottom',
                                content: errors.join('<br />')
                            });
                            $this.popover('show');
                        }
                        $this.removeClass('disabled');
                    },
                    error: function () {
                        console.log('error');
                    }
                });
                $this.addClass('disabled');
                $this.popover('destroy');
            } else {
                modalWindow.modal('hide');
                $this.popover('destroy');
                $this.popover({
                    title: '<b>Произошла ошибка</b>',
                    html: true,
                    trigger: 'click',
                    placement: 'bottom',
                    content: 'Контрагент не выбран'
                });
                $this.popover('show');
            }

        });

        // автоподставновка данных о контакте
        $('body').on('click', '#contragent-contacts li a', function () {
            var $this = $(this),
                    cityCaption = $('.select2-container.city .select2-chosen'),
                    cityBlock = $('.select2-container.city.ajax-entity'),
                    cityCaptionWrapper = $('.select2-choice', cityBlock),
                    parentForm = $this.parents('form'),
                    modalWindow = $('#modal-contacts'),
                    contact = $this.parent('li').data('contact');

            for (var key in contact) {
                if (key == 'city') {
                    $('.' + key, parentForm).val(contact[key].id);
                    cityCaption.text(contact[key].caption);
                    cityCaptionWrapper.removeClass('select2-default');
                } else {
                    $('.' + key, parentForm).val(contact[key]);
                }
            }
            modalWindow.modal('hide');
            return false;
        });

        // показываем модально окно для создания причины отмены
        $('#cancel-predefined-create').click(function () {
            var $this = $(this),
                    modalWindow = $('#cancel-predefined-create-modal');
            if (!$this.hasClass('disabled')) {
                modalWindow.modal('show');
            }
            return false;
        });

        // сохранение причины отмены
        $('body').on('submit', '#article-create', function () {
            var $this = $(this),
                    elt,
                    eltParent,
                    changedElt,
                    cancelReason = $("textarea[id$='_cancelReason']"),
                    preDefinedAnswers = $("select[id$='_preDefinedAnswers']"),
                    preDefinedAnswersOption = $("option:selected", preDefinedAnswers),
                    idElt = $('#simple_article_admin_id', $this),
                    oldErrors = $('.alert-danger', $this),
                    fieldGroups = $('.control-group', $this),
                    mainErrorText = 'Во время обновления элемента произошла ошибка.',
                    errorBlock = $('<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>'),
                    modalWindow = $('#cancel-predefined-create-modal'),
                    route = $this.attr('action');
            if (oldErrors.length) {
                oldErrors.remove();
            }
            $('.with-popover').popover('destroy');
            fieldGroups.removeClass('error');
            $.ajax({
                url: route,
                type: 'POST',
                data: $this.serialize(),
                success: function (data) {
                    if (data.result) {
                        cancelReason.val(data.article.bodyRu);
                        changedElt = $('<option value="' + data.article.id + '">' + data.article.captionRu + '</option>');
                        changedElt.attr('data-compressed', JSON.stringify(data.article));
                        if (preDefinedAnswers.val() != data.article.id) {
                            idElt.val(data.article.id);
                            preDefinedAnswers.append(changedElt);
                        } else {
                            preDefinedAnswersOption.replaceWith(changedElt);
                        }
                        preDefinedAnswers.select2('destroy');
                        preDefinedAnswers.select2();
                        preDefinedAnswers.select2('val', data.article.id);
                        modalWindow.modal('hide');
                    } else {
                        for (var key in data.errors) {
                            elt = $('#simple_article_admin_' + key, $this);
                            if (elt.length) {
                                elt.addClass('with-popover');
                                eltParent = elt.parents('.control-group');
                                eltParent.addClass('error');
                                elt.popover('destroy');
                                elt.popover({
                                    content: '<div class="form_field_error_txt">' + data.errors[key] + '</div>',
                                    html: true,
                                    template: '<div class="popover" style="z-index:9999;"><div class="arrow"></div><div class="popover-inner"><div class="popover-content alert-error"><p></p></div></div></div>',
                                    placement: 'right',
                                    trigger: 'hover'
                                });
                            } else {
                                mainErrorText += '<br />' + data.errors[key];
                                errorBlock = errorBlock.append(mainErrorText);
                                $this.prepend(errorBlock);
                            }

                        }
                    }
                },
                error: function () {
                    console.log('error');
                }

            });
            return false;
        });

        // выбираем готовые ответы для причины отмены
        $('body').on('change', "select[id$='_preDefinedAnswers']", function () {
            var $this = $(this),
                    selected = $('option:selected', $this),
                    articleLink = $('#cancel-predefined-create'),
                    cancelReason = $("textarea[id$='_cancelReason']"),
                    articleFormFields = $('.article-form-field'),
                    article = selected.data('compressed');
            if ($this.val()) {
                for (var key in article) {
                    $('#simple_article_admin_' + key).val(article[key]);
                }
                cancelReason.val(article.bodyRu);
                articleLink.html('<i class="icon-plus"></i>Сохранить ответ');
            } else {
                articleLink.html('<i class="icon-plus"></i>Добавить ответ');
                articleFormFields.each(function (index, element) {
                    var $this = $(element);
                    $this.val('');
                });
                //cancelReason.val('');
            }

        });

        // изменения для текста
        $('body').on('blur', "textarea[id$='_cancelReason']", function () {
            var $this = $(this),
                    articleBody = $('#simple_article_admin_bodyRu');

            articleBody.val($this.val());
        });

        // просмотр письма клиенту
        $('body').on('click', '#preview-cancel-msg', function () {
            var $this = $(this),
                    errors = '',
                    modalWindow = $('#preview-cancel-msg-modal'),
                    modalBody = $('.modal-body', modalWindow),
                    route = $this.attr('href'),
                    product = $("input[id*='_product_']"),
                    cancelReason = $("textarea[id$='_cancelReason']");
            $this.popover('destroy');
            if ($this.hasClass('disabled')) {
                return false;
            }
            $.ajax({
                url: route,
                type: 'POST',
                data: 'productId=' + product.val() + '&cancelReason=' + cancelReason.val(),
                success: function (data) {
                    if (data.result) {
                        modalBody.html(data.body);
                        modalWindow.modal('show');
                    } else {
                        $this.popover({
                            content: '<div class="form_field_error_txt">' + data.errors.join('<br />') + '</div>',
                            html: true,
                            template: '<div class="popover" style="z-index:9999;"><div class="arrow"></div><div class="popover-inner"><div class="popover-content alert-error"><p></p></div></div></div>',
                            placement: 'right',
                            trigger: 'hover'
                        });
                    }
                    $this.removeClass('disabled');
                },
                error: function () {
                    console.log('error');
                }
            });
            $this.addClass('disabled');

            return false;
        });

        // показывать\скрывать блок с причиной отмены
        getCancelReasonVisibility();

        $('body').on('change', "select[id$='_status']", function () {
            getCancelReasonVisibility();
        });

        cancelReasonBtnDisable();
        // подсчет общей стоимости заказа
        $('body').on('change', "input.ajax-entity[id*='_product_'], input[id*='_quantity'], select[id*='_contragent']", function () {

            var $this = $(this),
                    product = $("input.ajax-entity[id*='_product_']"),
                    quantity = $("input[id*='_quantity']"),
                    contragent = $("select[id*='_contragent']"),
                    route = adminRoutes['core_pre_order_cost'],
                    preOrderCostBlock = $('#pre_order_cost'),
                    preOrderWrapper = $('#pre_order_cost_wr'),
                    formData = '',
                    tempVal = '',
                    errors = [],
                    i = 0,
                    compositions = [];


            //собираем весь состав предзаказа
            $("input.ajax-entity[id*='_product_']").each(function () {
                if ($(this).val()) {
                    var comp = {};
                    comp.product = $(this).val();
                    comp.quantity = $(this).parents('tr').find("input[id*='_quantity']").val();
                    compositions.push(comp);
                }
            })

            if (compositions.length) {
                var requestData = {
                    isAdmin: true,
                    compositions: compositions,
                    contragentId: contragent.val()
                };
                preOrderWrapper.popover('destroy');
                $('#pre_order_cost_wr').show();
                preOrderCostBlock.html('Подождите происходит расчет...');

                $.post(route, requestData)
                        .done(function (data) {
                            if (data.data) {
                                preOrderCostBlock.html('<span class="money">' + data.data.print_cost + '</span>');
                                //preOrderCostBlock.html(data.data.total_cost + '<span> руб.</span>');
                            } else if (data.errors) {
                                for (var key in data.errors) {
                                    errors.push(data.errors[key]);
                                }
                                preOrderCostBlock.html('Не возможно просчитать');
                                preOrderWrapper.popover({
                                    content: '<div class="form_field_error_txt">' + errors.join('<br />') + '</div>',
                                    html: true,
                                    template: '<div class="popover" style="z-index:9999;"><div class="arrow"></div><div class="popover-inner"><div class="popover-content alert-error"><p></p></div></div></div>',
                                    placement: 'right',
                                    trigger: 'hover'
                                });
                                preOrderWrapper.popover('show');
                            }
                        })
                        .fail(function (data) {
                            console.log('error');
                            console.log(data);
                        });
            }
            else {
                $('#pre_order_cost_wr').hide();
            }
        }
        );

    });

    /**
     * показывать\скрывать блок с причиной отмены
     * @returns void
     */
    var getCancelReasonVisibility = function () {
        var cancelReasonBlock = $('#cancel-reason-wr'),
                status = $("select[id$='_status'] option:selected"),
                cancelReasonBlockParent = cancelReasonBlock.parents("div[id$='_cancelReason']");
        if (status.data('name') && status.data('name') == 'canceled') {
            cancelReasonBlockParent.removeClass('hidden');
        } else {
            cancelReasonBlockParent.addClass('hidden');

        }
    }

    /**
     * 
     * @returns {undefined}
     */
    var cancelReasonBtnDisable = function () {
        var createBtn = $("button[name='btn_create_order']"),
                disabledBtns = $('#cancel-predefined-create, #preview-cancel-msg');
        if (!createBtn.length) {
            disabledBtns.addClass('disabled');
        }
    }
})(jQuery)