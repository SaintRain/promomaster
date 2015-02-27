/**
 * Генерирование YML-файла
 * 
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

$('body').on('click', '.ymlGenerateButton', function() {
    ymlGenerationStart();
});

$('body').on('click', '.ymlButton', function() {
    $('#ymlProgress').show().css('visibility', 'hidden');
    $('#ymlProgressOk').hide();
    $('#ymlProgressError').hide();
    $('.ymlGenerateButton').removeAttr('disabled');

    var dlg = $('#ymlDialogContent').dialog(
            {width: 500, height: 300, modal: true, title: "Генерация YML-файла",
                close: function(event, ui) {
                    clearInterval(intervalYmlGenerateId);
                }
            }
    ).on('keydown', function(evt) {
        if (evt.keyCode === $.ui.keyCode.ESCAPE) {
            dlg.dialog('close');
        }
        evt.stopPropagation();
    });
});

$('body').on('click', '.ymlDialogContentClose', function(event) {
    if ($('#ymlDialogContent').dialog("isOpen")) {
        $('#ymlDialogContent').dialog('close');
    }
});

function ymlGenerationStart() {
    $('.ymlGenerateButton').attr('disabled', 'disabled');
    var formData = new FormData($('#productPriceFormUpload')[0]);
    $.ajax({
        url: core_product_yml_generator_start, //Server script to process data
        type: 'POST',
        //Ajax events
        beforeSend: function() {
            SetYmlGenerationProgress(0);
        },
        success: function(res) {
            SetYmlGenerationProgress(5);
            intervalYmlGenerateId = setInterval(checkYmlGenerationStatus, 3000);
        },
        error: function(res) {
            $('#ymlProgress').hide();
            $('.ymlGenerateButton').removeAttr('disabled');
            alert('Ошибка генерирования YML!');
        },
        // Form data
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });
}


function checkYmlGenerationStatus() {
    $.ajax({
        url: core_product_yml_generator_check_status, //Server script to process data
        type: 'POST',
        success: function(res) {
            var percent = (res.percent / (100 / 95) + 5).toFixed();
            SetYmlGenerationProgress(percent);
            if (percent == 100) {
                clearInterval(intervalYmlGenerateId);
                var msg = 'Успешно обработано товаров ' + res.quantity + ' шт.';
                $('#ymlProgress').hide();
                $('#ymlProgressOk').show().html(msg);
                $('.ymlGenerateButton').removeAttr('disabled');
            }
            //если ошибка
            if (res.error) {
                clearInterval(intervalYmlGenerateId);
                $('#ymlProgress').hide();
                $('#ymlProgressError').show().html(res.error);
                $('.ymlGenerateButton').removeAttr('disabled');
            }

        },
        error: function(res) {
            if (intervalYmlGenerateId) {
                clearInterval(intervalYmlGenerateId);
            }
            $('#ymlProgress').hide();
            $('.ymlGenerateButton').removeAttr('disabled');
            alert('Ошибка генерирования YML!');
        },
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });
}

function SetYmlGenerationProgress(percent) {
    var $progres = $('#ymlProgress');
    $progres.show().css('visibility', 'visible').find('.bar').attr('style', 'width:' + percent + '%').find('span').html(percent + '%');
    $('#ymlProgressOk').hide();
    $('#ymlProgressError').hide();

}