/**
 * Встраивание в категории возможности инидивидуальной настройки характеристики
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

jQuery(document).ready(function($) {
    //создаём вне формы контейнер, где будет храниться содержимое формы для редактирования инд. настроек
    $("#" + PropertySettings.uniqid + "__token").parent('form').parent().append('<div id="dialogContainer" class="container sonata-ba-modal"></div>');
});

for (var uniqid in treeParams) {
    //строим дерево
    $("#jsTreeContent_" + uniqid)
            .bind('loaded.jstree', function(e, data) {

        var menuId = 'propertyCategoryContextMenu';

        //прорисовываем значки настройки характеристики для категорий
        for (var sc_id in PropertySettings.settings_category) {
            var sc_category_id = PropertySettings.settings_category[sc_id];
            $('li[id="phtml_' + sc_category_id + '"] > a').after('<img data-id="' + sc_id + '" class="settingsCategory" src="/bundles/coreproperty/img/settings.png" title="Настройки характеристики для категории" />');

        }

        //клик по иконке настроек
        $('img.settingsCategory').live('click', function(e) {
            var li_parent = $(this).parent('li'),
                    link = $(li_parent).children('a'),
                    sc_id = $(li_parent).find('img.settingsCategory').attr('data-id'),
                    eUrl = PropertySettings.url_settingscategoryproperty_edit.replace('__id', sc_id);

            link.parents('div.jstree').find('a.jstree-clicked').attr('class', '');
            link.attr('class', 'jstree-clicked');

            $.get(eUrl, function(data) {
                setFormContentHtml(data, {type: 'edit'});
            });
        });

        $('div.jstree a, img.settingsCategory').contextMenu(menuId, {
            //прячем\оторажаем пункты меню, взависимости от того создана настройка или нет
            onShowMenu: function(e, menu) {

                var li_parent = $(e.target).parent('li'),
                        imgset = $(li_parent).children('img.settingsCategory'),
                        link = $(li_parent).children('a');

                link.parents('div.jstree').find('a.jstree-clicked').attr('class', '');
                link.attr('class', 'jstree-clicked');

                if (imgset.length) {
                    $('#createSettings', menu).remove();
                    $('#editSettings, #removeSettings', menu).show();
                }
                else {
                    $('#createSettings', menu).show();
                    $('#editSettings, #removeSettings', menu).hide();
                }
                return menu;
            },
            menuStyle: {
                border: '1px solid #979797',
                minWidth: '180px'
            },
            itemStyle: {
                backgroundColor: '#f0f0f0',
                color: 'black',
                paddingLeft: '10px',
                cursor: 'pointer',
                border: '1px solid #f0f0f0',
                borderTop: '1px solid white',
                borderBottom: '1px solid #e0e0e0'
            },
            itemHoverStyle: {
                color: 'black',
                backgroundColor: '#e8eff7',
                border: '1px solid #aecff7'
            },
            bindings: {
                'createSettings': function(t) {

                    if (PropertySettings.propertyId) {
                        var
                                id_str = $(t).parents('li').attr('id'),
                                category_id = parseInt(id_str.split('_')[1]);
                        $.get((PropertySettings.url_settingscategoryproperty_create)+'&unit_id='+$('#' + PropertySettings.uniqid + '_defaultUnit').val(), function(data) {
                            setFormContentHtml(data, {type: 'create', category_id: category_id});
                            $("#" + PropertySettings.uniqid + "_category option[value='" + category_id + "']").attr("selected", "selected");
                            $("#" + PropertySettings.uniqid + "_property option[value='" + PropertySettings.propertyId + "']").attr("selected", "selected");
                        });
                    }
                    else {
                        alert("Сохраните создание характеристики, затем сможете создавать индивидуальные настройки для категорий!");
                    }
                },
                'editSettings': function(t) {
                    var li_parent = $(t).parents('li'),
                            sc_id = $(li_parent).find('img.settingsCategory').attr('data-id'),
                            eUrl = PropertySettings.url_settingscategoryproperty_edit.replace('__id', sc_id);

                    $.get(eUrl, function(data) {
                        setFormContentHtml(data, {type: 'edit'});
                    });
                },
                'removeSettings': function(t) {
                    var li_parent = $(t).parents('li'),
                            sc_id = $(li_parent).find('img.settingsCategory').attr('data-id'),
                            eUrl = PropertySettings.url_settingscategoryproperty_delete.replace('__id', sc_id);

                    $.get(eUrl, function(data) {
                        setFormContentHtml(data, {type: 'delete', sc_id: sc_id});
                    });
                },
                'editCategory': function(t) {
                    var li_parent = $(t).parents('li'),
                            url = $(li_parent).find('a').attr('href');
                    window.open(url, '_blank');
                    window.focus();
                }
            }
        });

    });


    function setFormContentHtml(data, options) {

        $('#dialogContainer').html(data);
        $('#dialogContainer').dialog({width: 850, modal: true, title: "Настройки характеристики для категориии"});

        //если нужно, прячем поле для ввода маски
        var editType = $('#' + PropertySettings.uniqid + '_editType').val(),
                elementId = 'dialogContainer',
                mask = $('#' + elementId).find('#' + PropertySettings.uniqid + '_mask').parents('div.control-group'),
                defaultUnit = $('#' + elementId).find('#' + PropertySettings.uniqid + '_defaultUnit').parents('div.control-group');

        if (editType === 'input_text' || editType === 'input') {
            mask.show();
        }
        else {
            mask.hide();
        }

        if (editType === 'input') {
            defaultUnit.show();
        }
        else {
            defaultUnit.hide();
        }

        $("#" + PropertySettings.uniqid + "_category").parents('div.control-group').hide();
        $("#" + PropertySettings.uniqid + "_property").parents('div.control-group').hide();
        setAjaxFormSubmiter(elementId, options);
    }

    function setAjaxFormSubmiter(elementId, options) {
        $('#' + elementId).find('form').ajaxForm({type: 'post', success: function(data) {

                if (data.result === 'ok') {
                    $('#dialogContainer').dialog('close');

                    if (options.type === 'create') {
                        $('li[id="phtml_' + options.category_id + '"] > a').after('<img data-id="' + data.objectId + '" class="settingsCategory" src="/bundles/coreproperty/img/settings.png" title="Настройки характеристики для категории" />');
                    }
                    else if (options.type === 'delete') {
                        $("img.settingsCategory[data-id='" + options.sc_id + "']").remove();
                    }
                }
                else {
                    setFormContentHtml(data, options);
                }

            }});
    }
}