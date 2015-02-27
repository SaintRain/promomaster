/**
 * скрипт для фиксации изменений из дерева в базу
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

var uniqIdGlobal;
needToSelectByCaptionClick = false,
        selectAllClicked = false,
        unselectAllClicked = false;

jQuery(document).ready(function($) {
    for (var uniqid in treeParams) {
        //отметить все галочки
        $('#checkAllTreeButton_' + uniqid).click(function(data) {
            selectAllClicked = true;
            $("#" + getFiedlUnigId(this)).html('');
            uniqIdGlobal = getFiedlUnigId(this);
            var s_id;
            $('#jsTreeContent_' + uniqIdGlobal + ' li ').each(function(index, data) {
                 s_id = $(this).attr('id');
                $("#jsTreeContent_" + uniqIdGlobal).jstree('check_node', '#' + s_id);
            });
            selectAllClicked = false;
            $("#jsTreeContent_" + uniqIdGlobal).jstree('check_node', '#' + s_id);   //кликаем еще раз, чтобы запустить событие
        });

        //снять все галочки
        $('#uncheckAllTreeButton_' + uniqid).click(function(data) {
            unselectAllClicked=true;
            $("#" + getFiedlUnigId(this)).html('');
            uniqIdGlobal = getFiedlUnigId(this);
            var s_id;
            $('#jsTreeContent_' + uniqIdGlobal + ' li ').each(function(index, data) {
                s_id = $(this).attr('id');
                $("#jsTreeContent_" + uniqIdGlobal).jstree('uncheck_node', '#' + s_id);
            });
            unselectAllClicked=false;
            $("#jsTreeContent_" + uniqIdGlobal).jstree('uncheck_node', '#' + s_id); 
            
        });

        //развернуть дерево
        $('#openTreeButton_' + uniqid).click(function(data) {

            $('#jsTreeContent_' + getFiedlUnigId(this)).jstree('open_all');
        });
        //свернуть дерево
        $('#closeTreeButton_' + uniqid).click(function(data) {
            $('#jsTreeContent_' + getFiedlUnigId(this)).jstree('close_all');
        });
        //показать форму поиска по дереву
        $('#searchTreeButton_' + uniqid).click(function(data) {
            $('#findContent_' + getFiedlUnigId(this)).show();
            $('#serachKey_' + getFiedlUnigId(this)).focus();
        });
        //сабмит формы поиска по дереву
        $('#serachKey_' + uniqid).keypress(function(data) {
            if (data.keyCode === 13) {
                //нажата клавиша enter
                $('#jsTreeContent_' + getFiedlUnigId(this)).jstree('search', $('#serachKey_' + getFiedlUnigId(this)).val());
                return false;
            }
        });

        //запуск поиска по дереву
        $('#findInTreeButton_' + uniqid).click(function(data) {
            $('#jsTreeContent_' + getFiedlUnigId(this)).jstree('search', $('#serachKey_' + getFiedlUnigId(this)).val());
            return false;
        });

        //очистить найденные подсвеченные элементы
        $('#cleareFindInTreeButton_' + uniqid).click(function(data) {
            $('#jsTreeContent_' + getFiedlUnigId(this)).jstree('clear_search');
            $('#findContent_' + getFiedlUnigId(this)).hide();
        });

        //убрать форму поиска
        $('#removeFindInTreeButton_' + uniqid).click(function(data) {
            $('#findContent_' + getFiedlUnigId(this)).hide();
        });

        //строим дерево
        $("#jsTreeContent_" + uniqid)
                .bind("select_node.jstree", function(event, data) {

                    var linkJSTree = data.rslt.obj.children("a").attr("href");

                    if (needToSelectByCaptionClick) {
                        data.rslt.obj.children("a").children("ins.jstree-checkbox").click();
                    }
                    needToSelectByCaptionClick = true;

                    if (linkJSTree !== '#') {
                        //var s_id = data.rslt.obj.attr('id');
                        //$("#jsTreeContent_" + getFiedlUnigId(this)).jstree('check_node', '#' + s_id);
                        //   window.open(linkJSTree, '_blank');
                    }
                })
                //после отметки чекбоксов создаём option
                .bind('check_node.jstree', function(e, data) {
                    if (!selectAllClicked) {
                        $("#" + getFiedlUnigId(this)).html('');
                        var selecter = this;
                        $("#jsTreeContent_" + uniqid).find('.jstree-checked').each(function() {
                            var id_str = $(this).attr('id');
                            id = parseInt(id_str.split('_')[1]);
                            $("#" + getFiedlUnigId(selecter)).append($('<option selected="selected" value="' + id + '"></option>'));
                        })
                    }

                })
                //после снятия чекбоксов удаляем option
                .bind('uncheck_node.jstree', function(e, data) {
                    if (!unselectAllClicked) {
                    $("#" + getFiedlUnigId(this)).html('');
                    var selecter = this;
                    $("#jsTreeContent_" + uniqid).find('.jstree-checked').each(function() {
                        var id_str = $(this).attr('id');
                        id = parseInt(id_str.split('_')[1]);
                        $("#" + getFiedlUnigId(selecter)).append($('<option selected="selected" value="' + id + '"></option>'));
                    })
                                        }
                })

                .bind('loaded.jstree', function(e, data) {
                    //раскрываем дерево, если запись только создаётся
                    if (treeParams[getFiedlUnigId(this)].objectId === "") {
                        $('#jsTreeContent_' + getFiedlUnigId(this)).jstree('open_all');
                    }
                     selectAllClicked = true;
                    //выделяем нужные чекбоксы
                    for (index in treeParams[getFiedlUnigId(this)].selected) {
                        s_id = treeParams[getFiedlUnigId(this)].selected[index];
                        $("#jsTreeContent_" + getFiedlUnigId(this)).jstree('check_node', '#phtml_' + s_id);
                    }
                    selectAllClicked = false;
                    if (typeof s_id!=='undefined') {
                        $("#jsTreeContent_" + getFiedlUnigId(this)).jstree('check_node', '#phtml_' + s_id); //кликаем еще раз, чтобы запустить событие 
                    }
                    
                })
                .bind('open_node.jstree', function(e, data) {
                    $('#jsTreeContent_' + getFiedlUnigId(this)).jstree('check_node', 'li[selected=selected]');
                })
                .jstree({
                    themes: {
                        theme: "default",
                        dots: true,
                        icons: false
                    },
                    plugins: ["themes", "html_data", "ui", "cookies", "checkbox", "search", "types"],
                    cookies: {cookie_options: {path: getShortPatch()}},
                    core: {animation: 0},
                    checkbox: {
                        two_state: true
                    }
                });
    }


    function getFiedlUnigId(obj) {
        return $(obj).attr('id').split(/_(.+)?/)[1];
    }

    //возвращает
    function getShortPatch() {
        var patch = window.location.pathname,
                patch_m = patch.split('/'),
                patch_m_short = patch_m.splice(0, patch_m.length - 2),
                new_patch = patch_m_short.join('/');
        return new_patch;
    }

});




