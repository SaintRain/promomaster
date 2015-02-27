//скрипт для фиксации изменений из дерева в базу
jQuery(document).ready(function($) {
    setAjaxFormSubmiter();

    //развернуть дерево
    $('#openTreeButton').click(function(data) {
        $('#jsTreeContent').jstree('open_all');
    });
    //свернуть дерево
    $('#closeTreeButton').click(function(data) {
        $('#jsTreeContent').jstree('close_all');
    });
    //показать форму поиска подереву
    $('#searchTreeButton').click(function(data) {
        $('#findContent').show();
        $('#serachKey').focus();
    });
    //сабмит формы поиска по дереву
    $('#findContentForm').submit(function(data) {
        $('#jsTreeContent').jstree('search', $('#serachKey').val());
        return false;
    });

    //запуск поиска по дереву
    $('#findInTreeButton').click(function(data) {
        $('#jsTreeContent').jstree('search', $('#serachKey').val());
    });

    //очистить найденные подсвеченные элементы
    $('#cleareFindInTreeButton').click(function(data) {
        $('#jsTreeContent').jstree('clear_search');
        $('#findContent').hide();
    });

    //убрать форму поиска
    $('#removeFindInTreeButton').click(function(data) {
        $('#findContent').hide();
    });


    //строим дерево
    $("#jsTreeContent")
            .bind("move_node.jstree", function(e, data) {
        if (treeParams.needFixAfterMove) {
            moveSend(data);
        }
        else {
            treeParams.needFixAfterMove = true;
        }
        return true;
    })

            .bind("before.jstree", function(e, data) {
        //   console.log(data);
    })

            .bind("remove.jstree", function(e, data) {
        var id_str = data.rslt.obj.attr("id"),
                id = parseInt(id_str.split('_')[1]),
                deleteUrl = sprintf(treeParams.deleteUrl, id);
        document.location.href = deleteUrl;
    })
            .bind("create.jstree", function(e, data) {
        $(".sonata-ba-form").html('');
        getCreateForm(data);
    })
            .bind("rename.jstree", function(e, data) {
        treeParams.canRequestNodeData = false;
        renameSend(data);
    })
            .bind("select_node.jstree", function(event, data) {
        jstree_selectId = '#' + data.rslt.obj.attr("id");
        var linkJSTree = data.rslt.obj.children("a").attr("href");

        if (linkJSTree !== '#') {
            //меняем строку в браузере
            //  window.history.pushState(null, null, linkJSTree);
        }

        if (treeParams.canRequestNodeData) {
            if (linkJSTree !== '#') {
                treeParams.linkJSTree = linkJSTree;

                $(".sonata-ba-form").html('');
                $.get(treeParams.linkJSTree, function(data) {
                    //$(".sonata-ba-form").html(data);
                    setFormContentHtml(data);
                    setAjaxFormSubmiter();
                });
            }
        }
        treeParams.canRequestNodeData = true;
    })
            .jstree({
        themes: {
            theme: "default",
            dots: true,
            icons: false
        },
        plugins: ["themes", "html_data", "ui", "crrm", "cookies", "dnd", "search", "types", "hotkeys", "contextmenu"],
        core: {animation: 0},
        contextmenu: {items: customMenu},
        ui: {select_multiple_modifier: false},
        crrm: {
            move: {
                default_position: "first",
                check_move: function(data) {
                    //нельзя двигать руут

                    /*
                     if ($.jstree._focused()._get_parent(data.o[0]) == -1) {
                     return false;
                     }
                     else {
                     return true;
                     }
                     */
                    return true;
                }
            }
        }
    });
});

//настройки меню
function customMenu(node) {
    var items = {
        cretaeItem: {
            label: "Создать",
            action: function(obj) {
                this.create(obj);
            }
        },
        renameItem: {
            label: "Переименовать",
            action: function(obj) {
                this.rename(obj);
            },
            separator_before: true,
            separator_after: true
        },
        deleteItem: {
            label: "Удалить",
            action: function(obj) {
                this.remove(obj);
            }
            ,
            separator_before: true,
            separator_after: true
        },
        copyUrlItem: {
            label: "Копировать ссылку",
            action: function(obj) {
                var urlCopy = obj.children("a").attr("href");
                urlCopy = window.location.host + urlCopy;
                var person = prompt("Пожалуйста, скопируйте ссылку:", urlCopy);
            }
        }
    };
    return items;
}

//без этого из редактора не сохраняется текст
function CKupdate() {
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
}

//ставим содержимое формы
function setFormContentHtml(html) {
    $(".sonata-ba-form").html(html);
}


//Вешаем на кнопку сабмита формы редактирования ajax-обработчик
function setAjaxFormSubmiter() {

    $("#categoryForm").ajaxForm({type: 'post', beforeSerialize: CKupdate, success: function(data) {
            setFormContentHtml(data);
            //после переименования категории в форме меняем её в дереве
            if ($('.alert-success')) {
                var uniq_id = $("#uniqid").val(),
                        node_text = $('#' + uniq_id + "_captionRu").val(),
                        node = $.jstree._focused().get_selected();

                //переименовываем
                $("#jsTreeContent").jstree('set_text', node, node_text);
                $("#jsTreeContent").jstree('rename_node', node, node_text);

                if ($.jstree._focused()._get_parent(node) !== -1) {
                    var old_node_parent_id = '#' + $.jstree._focused()._get_parent(node).attr('id'),
                            node_parent_id = '#phtml_' + $('#' + uniq_id + "_parent").val();

                    //меняем родителя в дереве, если он изменился в форме
                    if (node_parent_id !== old_node_parent_id) {
                        treeParams.needFixAfterMove = false;
                        $("#jsTreeContent").jstree("move_node", "#" + node.attr('id'), node_parent_id);
                    }
                }
                if ($('#' + uniq_id + "_isEnabled").attr('checked')) {
                    node.children("a").removeClass('jstree_disabled');
                }
                else {
                    node.children("a").addClass('jstree_disabled');
                }
            }
            setAjaxFormSubmiter();
        }});
}


//сохраняем перемещение
/*
 data.rslt contains:
 .o - the node being moved
 .r - the reference node in the move
 .ot - the origin tree instance
 .rt - the reference tree instance
 .p - the position to move to (may be a string - "last", "first", etc)
 .cp - the calculated position to move to (always a number)
 .np - the new parent
 .oc - the original node (if there was a copy)
 .cy - boolen indicating if the move was a copy
 .cr - same as np, but if a root node is created this is -1
 .op - the former parent
 .or - the node that was previously in the position of the moved node
 */
function moveSend(data) {
    if (!data.rslt.o.attr("id")) {
        return false;
    }

    console.log(data.rslt.cp);

    var dataForm = {};
    dataForm[treeParams.adminUniqid] = {};
    dataForm[treeParams.adminUniqid]._token = treeParams.csrf_token;
    dataForm[treeParams.adminUniqid]._move = true;

    $(".sonata-ba-form").html('');
    var id_str = data.rslt.o.attr("id"),
            id = parseInt(id_str.split('_')[1]),
            editUrl = sprintf(treeParams.editUrl, id) + "?uniqid=" + treeParams.adminUniqid;
    if (data.inst._get_prev(data.rslt.o)) {
        var node = data.rslt.o,
                parentNode = data.inst._get_parent(node),
                prev = data.inst._get_prev(data.rslt.o),
                prev_id_str = prev.attr("id"),
                prev_id = parseInt(prev_id_str.split('_')[1]);
        if (parentNode !== -1) {
            parent_id_str = parentNode.attr("id");
            parent_id = parent_id_str.split('_')[1];
        }
        else {
            parent_id = parentNode;
        }
    }

    if (typeof parent_id === 'undefined') {
        var parent_id = 0;
    }

    if (typeof prev_id === 'undefined') {
        var prev_id = 0;
    }

    dataForm[treeParams.adminUniqid].parent = parent_id;
    dataForm[treeParams.adminUniqid].prev_node_id = prev_id;
    $.post(
            editUrl,
            dataForm,
            function(dataContent) {
                setFormContentHtml(dataContent);
                setAjaxFormSubmiter();
                var new_id = 'phtml_' + $("#objectId").val();
                $("#jsTreeContent").jstree("deselect_all");
                treeParams.canRequestNodeData = false;
                $("#jsTreeContent").jstree("select_node", '#' + new_id);
            }
    );

}

//сохраняем переименование
function renameSend(data) {
    if (!data.rslt.obj.attr("id") || data.rslt.new_name === data.rslt.old_name) {
        return false;
    }

    $(".sonata-ba-form").html('');
    var id_str = data.rslt.obj.attr("id"),
            id = parseInt(id_str.split('_')[1]),
            editUrl = sprintf(treeParams.editUrl, id) + "?uniqid=" + treeParams.adminUniqid,
            dataForm = {};
    dataForm[treeParams.adminUniqid] = {};
    dataForm[treeParams.adminUniqid].captionRu = data.rslt.new_name;
    dataForm[treeParams.adminUniqid]._token = treeParams.csrf_token;
    dataForm[treeParams.adminUniqid]._rename = true;
    $.post(
            editUrl,
            dataForm,
            function(dataContent) {
                setFormContentHtml(dataContent);
                setAjaxFormSubmiter();
                var new_id = 'phtml_' + $("#objectId").val();
                $("#jsTreeContent").jstree("deselect_all");
                $("#jsTreeContent").jstree("select_node", '#' + new_id);
            }
    );
}


//сохраняем создание
function getCreateForm(data) {
    var
            parent_id_str = data.rslt.parent.attr("id"),
            parent_id = parent_id_str.split('_')[1],
            dataForm = {};
    dataForm[treeParams.adminUniqid] = {};
    dataForm[treeParams.adminUniqid].parent = parent_id;
    dataForm[treeParams.adminUniqid].captionRu = data.rslt.name;
    dataForm[treeParams.adminUniqid].isEnabled = 1;
    dataForm[treeParams.adminUniqid]._token = treeParams.csrf_token;
    $("#jsTreeContent").jstree("deselect_all");
    $.post(
            treeParams.createUrl + '?uniqid=' + treeParams.adminUniqid,
            dataForm,
            function(dataContent) {
                setFormContentHtml(dataContent);
                setAjaxFormSubmiter();
                //ставим ссылку на редактирование
                var edit_url = sprintf(treeParams.editUrl, parseInt($("#objectId").val())),
                        new_id = 'phtml_' + $("#objectId").val();
                data.rslt.obj.children("a").attr("href", edit_url).attr('title','ID:'+$("#objectId").val());
                data.rslt.obj.attr('id', new_id);
                treeParams.canRequestNodeData = false;
                $("#jsTreeContent").jstree("select_node", '#' + new_id);
            }
    );
}