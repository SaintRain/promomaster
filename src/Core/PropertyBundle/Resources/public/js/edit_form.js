/**
 * Скрывает/отображает дополнительные поля взависимости от типа редактирования
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
jQuery(document).ready(function($) {
    var needTestoreCheck = false;
    $('#' + formEditOptios.uniqid + '_editType').change(function() {
        showHideData($(this));
    });

    $('#' + formEditOptios.uniqid + '_editType').each(function() {
        var selected = $(this).children('option:selected');
        showHideData(selected);
    });

    /**
     * Скрытие  и отображение вкладки с характеристиками
     */
    function showHideData(selected) {

        var newEditType = $("#" + formEditOptios.uniqid + "_editType").val(),
                textTypes = ['input', 'input_text', 'textarea', 'editor'];

        var editType = selected.val(),
                mask = $('#' + formEditOptios.uniqid + '_mask').parents('div.control-group'),
                defaultUnit = $('#' + formEditOptios.uniqid + '_defaultUnit').parents('div.control-group');

        //поле для ввода маски
        if (editType === 'input_text' || editType === 'input') {
            mask.show();
        }
        else {
            mask.hide();
        }

        //дефолтная единица измерения
        if (editType === 'input') {
            defaultUnit.show();
        }
        else {
            defaultUnit.hide();
        }

        if ($.inArray(editType, textTypes) >= 0) {
            $('a[href="#' + formEditOptios.uniqid + '_4"]').hide();
            //отмечаем на удаление все данные, если изменили тим редактирования с выборки на строковое
            if (formEditOptios.oldEditType !== newEditType) {
                if ($.inArray(newEditType, textTypes) >= 0) {
                    $('input[id$="__delete"]').attr('checked', 'checked');
                    needTestoreCheck = true;
                }
            }
        } else {
            $('a[href="#' + formEditOptios.uniqid + '_4"]').show();
            //снимаем галочки с удаления
            if (needTestoreCheck) {
                $('input[id$="__delete"]').removeAttr('checked');
                needTestoreCheck = false;
            }
        }
    }
    
    $("input[id$='articleKey']").blur(function(){
        var $this = $(this),
            parentRow = $(this).parent('td');
        if ($this.val()) {
            $.ajax({
                url: adminRoutes['admin_core_faq_article_article'],
                type: 'POST',
                data: 'articleSlug=' + $this.val(),
                success: function(data) {
                    if (data.errors) {
                        parentRow.addClass('error');
                        $this.popover({
                            content: '<div class="form_field_error_txt">Данной статьи не существует</div>',
                            html: true,
                            template: '<div class="popover"><div class="arrow"></div><div class="popover-inner"><div class="popover-content alert-error"><p></p></div></div></div>',
                            trigger: "hover",
                            placement: "left"
                        });
                        $this.popover('show');
                    } else {
                        if (parentRow.hasClass('error')) {
                            parentRow.removeClass('error');
                            $this.popover('destroy');
                        }
                    }
                    
                },
                error: function() {
                    console.log('error');
                }
            });
        } else {
            if (parentRow.hasClass('error')) {
                parentRow.removeClass('error');
                $this.popover('destroy');
            }
        }
        
    });
    setRowName();
});

var setRowName = function() {
        var curElt = $("input[id$='_name']"),
            dataList = $("div[id$='dataList']"),
            rows = null;

        if (curElt.length && !(curElt.val() == 'skills' || curElt.val() == 'iso-sings') && dataList.length) {
            rows = $('thead th', dataList);
            rows.each(function(index, element){
                var $this = $(this);
                if ($this.text().trim() == 'Краткое описание') {
                    $this.text('Дополнительно 1');
                } else if ($this.text().trim() == 'ЧПУ Статьи из раздела FAQ') {
                    $this.text('Дополнительно 2');
                }
            });
        }
    }