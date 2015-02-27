/**
 * Скрипт для админского типа формы config_data
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
jQuery(document).ready(function($) {
    $dataField.hide();
    setConfigDataEditType();
    
    $('.addNewConfig').click(function(e) {
        addNewConfig();
    });

    $('body').on('click', '.clearable', function(e) {
        $(this).parents('tr').remove();
    });


    $('form.form-horizontal').submit(function(e) {
        var res = true;
        if ($typeField.val() === 'array') {
            res = setDataFromArrayToString();
        }
        else if ($typeField.val() === 'string') {
            $dataField.text($('#dataConfigInput').val());
        }
        if (!res) {
            $('.keyError').show();
            event.preventDefault();
        }
        else {
            $('.keyError').hide();
        }
    });


    $typeField.change(function(e) {
        setPreviewBtnVisibility();
        setConfigDataEditType();
    })

    function setConfigDataEditType() {
        $dataField.hide();
        if ($typeField.val() === 'string') {
//            $dataField.show();
            $('#dataConfigInput').val($dataField.text());
            $('#dataConfigInput').show();
            $('#dataConfigEditContent').hide();
        }
        else if ($typeField.val() === 'text') {
            $dataField.show();
//            $('#dataConfigInput').val($dataField.text());
//            $('#dataConfigInput').show();
            $('#dataConfigEditContent').hide();
            $('#dataConfigInput').hide();
        }
        else if ($typeField.val() === 'array') {
//            $dataField.hide();
            $('#dataConfigInput').hide();
            $('#dataConfigEditContent').show();
            generateArrayEditType();
        }
    }
    function generateArrayEditType() {
        var html = '',
                data = $dataField.text(),
                para = 0;
        data = data.split("\n");
        for (var index in data) {
            if (para === 0) {
                var key = escapeHtml(data[index]);
            }
            else {
                var value = escapeHtml(data[index]);
            }
            if (para === 1) {
                html = html + '<tr><td><input type="text" class="editTypeKey" style="width:100px" value="' + key + '" /></td><td nowrap><input style="width:90%"  type="text" class="editTypeValue" value="' + value + '" /> <span class="icon-remove-sign clearable" title="Удалить настройку"></span></td></tr>';
//                  html = html + '<tr><td><input type="text" class="editTypeKey" style="width:90%" value="' + key + '" /></td><td><textarea style="width:90%" rows="5" type="text" class="editTypeValue" >' + value + '</textarea> <span class="icon-remove-sign clearable" title="Удалить настройку"></span></td></tr>';
                para = 0;
            }
            else {
                para++;
            }
        }

        if (!html) {
            addNewConfig();
        }

        $('#dataConfigEditContent').find('tbody').html(html);
    }
    function addNewConfig() {
        var html = '<tr><td><input type="text" class="editTypeKey" style="width:100px" value="" /></td><td><input style="width:90%"  type="text" class="editTypeValue" value="" /> <span class="icon-remove-sign clearable" title="Удалить настройку"></span></td></tr>';
//        var html ='<tr><td><input type="text" class="editTypeKey" style="width:100px" value="" /></td><td nowrap><textarea  style="width:100%"  type="text" rows="5" cols="50" class="editTypeValue" ></textarea> <span class="icon-remove-sign clearable" title="Удалить настройку"></span></td></tr>';
        $('#dataConfigEditContent').find('tbody').append(html);
    }

    function setDataFromArrayToString() {
        var text = '',
                keys = [],
                res = true;
        $('.editTypeKey').each(function() {
            var key = $(this).val(),
                    value = $(this).parents('tr').find('.editTypeValue').val();
            if (!text) {
                var novaya = "";
            }
            else {
                var novaya = "\n";
            }
            text = text + novaya + key + "\n" + value;
            if (typeof keys[key] === 'undefined') {
                keys[key] = true;
            }
            //выводим ошибку
            else {
                res = false;
            }
        });
        $dataField.text(text);
        return res;
    }

    function escapeHtml(text) {
        return text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
    }

    /**
     * Показывать-скрывать кнопку превью
     * @returns void
     */
    function setPreviewBtnVisibility() {
        var previewBtn = $('.btn.btn-info.persist-preview'),
            configType = $("select[id$='_type']"),
            highlight = $("select[id$='_highlight']");
        if (configType.val() && configType.val() == 'text' && highlight.val()) {
            previewBtn.removeClass('hidden');
        } else {
            previewBtn.addClass('hidden');
        }
    }

    setPreviewBtnVisibility();

    $("select[id$='_highlight']").change(function(){
        setPreviewBtnVisibility();
    });

    /**
     * Обработка превью
     */
    $('body').on('click', '.btn.btn-info.persist-preview', function(){
        var $this = $(this),
            previewModal = $('#preview_modal'),
            modalBody = $('.modal-body', previewModal),
            dataField = $("textarea.textarea[id$='_data']");
        modalBody.html(editor.getDoc().getValue());
        previewModal.modal('show');
        return false;
    });

    /**
     * Отправка формы
     * @returns void
     */
    $('#preview_modal .btn.btn-primary').click(function(){
        var $this = $(this),
            form = $('.form-horizontal');
        form.submit();
    });
});
