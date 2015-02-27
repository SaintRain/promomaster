/**
 * Обработка объединения предзаказов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

$(function () {
    //Обработка нажатия кнопки Объединить
    $('.selectPreOrder').on('click', function () {
        var preorder_id = currentObjectId;
        if (preorder_id) {
            $.get(adminRoutes['core_pre_order_get'], {preorder_id: preorder_id})
                .done(function (res) {
                    var link = adminRoutes['admin_core_order_preorder_preorder_edit'];
                    if (res.length) {
                        var html = '<p>Поосле объединения страница должна быть перегружена. Предзаказ который объединили с текущим предзаказом будет скрыт.</p>' +
                            '<table class="table table-bordered">' +
                            '<thead><tr><th>ID</th><th>Контактная информация</th><th>Состав</th><th></th></tr></thead>';
                        for (var index in res) {

                            html = html + '<tr><td><a title="Перейти на редактирование" target="_blank" href="' + link.replace('__s', res[index].id) + '">' + res[index].id + '</a></td>';

                            var caption = [];

                            if (res[index].email) {
                                caption.push(res[index].email);
                            }
                            if (res[index].phone) {
                                caption.push(res[index].phone);
                            }
                            if (res[index].address) {
                                caption.push(res[index].address);
                            }

                            if (res[index].firstName || res[index].lastName || res[index].surName) {
                                var name = res[index].firstName + ' ' + res[index].lastName + ' ' + res[index].surName;
                                caption.push(name);
                            }

                            if (res[index].city) {
                                caption.push(res[index].city);
                            }

                            html = html + '<td>' + caption.join(', ') + '<br/><label style="color:gray"><input class="takeThisContact" type="checkbox" value="1"> Взять эти контакты при объединении</label></td>';
                            var comp = '';
                            console.log(res[index].compositions)
                            for (var comp_index in res[index].compositions) {
                                var c = res[index].compositions[comp_index],
                                    compositions = '';
                                if (c.article) {
                                    compositions = compositions + c.article + ' ';
                                }
                                if (c.captionRu) {
                                    compositions = compositions + c.captionRu + ' ';
                                }
                                if (c.price) {
                                    compositions = compositions + '<span class="money">' + c.price + ' ' + currencyFormat + '</span>';
                                }

                                if (c.quantity) {
                                    compositions = compositions + ' <span class="label">' + c.quantity + ' ' + c.uCaption + '</span>';
                                }

                                comp = comp + compositions + '<br/>';
                            }
                            html = html + '<td>' + comp + '</td><td><a data-id="' + res[index].id + '" href="javascript:void(0);" class="btn unionPreOrderButton">Объединить</a></td></tr>'
                        }
                        var html = html + '</table>';
                    }
                    else {
                        html = '<h5>Нет подходящих предзаказов для объединения.</h5>';
                    }
                    html = html + '<br/><div style="vertical-align:baseline;" class="well well-small form-actions"><input type="button" class="btn btn-danger selectPreOrderContentClose" value="Закрыть"></div>';

                    $('#selectPreOrderContent').html(html);
                    var dlg = $('#selectPreOrderContent').dialog(
                        {
                            width: 1000,
                            height: 600,
                            modal: true,
                            title: "Выберите предзаказ для объединения"
                        }
                    ).on('keydown', function (evt) {
                            if (evt.keyCode === $.ui.keyCode.ESCAPE) {
                                dlg.dialog('close');
                            }
                            evt.stopPropagation();
                        });
                });
        }
        else {
            alert("Предзаказ еще не создан!")
        }
    });

    //клик по кнопке объединения
    $('body').on('click', '.unionPreOrderButton', function (event) {
        var res = confirm('Вы уверены, что хотите объединить предзаказ?');
        var $tr = $(this).parents('tr');
        if (res) {

            if ($(this).parents('tr').find('.takeThisContact').first().is(':checked')) {
                var isNeedReplaceContact = 1
            }
            else {
                var isNeedReplaceContact = 0;
            }

            var data = {
                id: currentObjectId,
                combine_with_preorder_id: $(this).attr('data-id'),
                isNeedReplaceContact: isNeedReplaceContact
            };

            $.get(adminRoutes['core_pre_order_combine'], data)
                .done(function (res) {
                    if (res == 1) {
                        $tr.remove();   //удаляем строку
                        var res2 = confirm('Предзаказы успешно объеденены. Обновить страницу?');
                        if (res2) {
                            location.reload();
                        }
                    }
                    else {
                        console.log(res);
                        alert('Возникли ошибки, смотрите консоль.')
                    }
                });
        }
    });

    $('body').on('click', '.selectPreOrderContentClose', function (event) {

        if ($('#selectPreOrderContent').dialog("isOpen")) {
            $('#selectPreOrderContent').dialog('close');
        }
    });
    $('body').on('click', '.setPreOrderContent', function (event) {
        $('#' + uniqid + '_email').val($(this).attr('data-email'));
        $('#' + uniqid + '_phone').val($(this).attr('data-phone'));
        $('#' + uniqid + '_address').val($(this).attr('data-address'));
        $('#' + uniqid + '_firstName').val($(this).attr('data-firstName'));
        $('#' + uniqid + '_lastName').val($(this).attr('data-lastName'));
        $('#' + uniqid + '_surName').val($(this).attr('data-surName'));
        $('#' + uniqid + '_city').val($(this).attr('data-city'));
        if ($('#selectPreOrderContent').dialog("isOpen")) {
            $('#selectPreOrderContent').dialog('close');
        }
    });
});


