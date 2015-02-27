/**
 * Импорт прайса на списке продуктов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

$('body').on('click', '.productProceUploadButton', function () {
    $('[name="productPrice"]').click();
});

//окно описания формата
    $('body').on('click', '.import-csv-format-description', function () {
        console.log(1111111111);
        var dlg = $('#import-csv-format-description').dialog(
            {width: 600, height: 550, modal: true, title: "Опсание формата CSV"}
        ).on('keydown', function (evt) {
                if (evt.keyCode === $.ui.keyCode.ESCAPE) {
                    dlg.dialog('close');
                }
            });
    });



$('body').on('click', '.import-csv-format-descriptionClose', function (event) {
    if ($('#import-csv-format-description').dialog("isOpen")) {
        $('#import-csv-format-description').dialog('close');
    }
});


$('body').on('click', '.productPriceButton', function () {
    $('#productPriceFormUploadProgress').show().css('visibility', 'hidden');
    $('#productPriceFormUploadProgressOk').hide();
    $('#productPriceFormUploadProgressError').hide();
    $('.productProceUploadButton').removeAttr('disabled');
    $('[name="productPrice"]').val('');

    var dlg = $('#productParceDialogContent').dialog(
        {
            width: 500, height: 300, modal: true, title: "Импорт прайса",
            close: function (event, ui) {
                clearInterval(intervalProductParceId);
            }
        }
    ).on('keydown', function (evt) {
            if (evt.keyCode === $.ui.keyCode.ESCAPE) {
                dlg.dialog('close');
            }
            evt.stopPropagation();
        });
});

$('body').on('click', '.productParceDialogContentClose', function (event) {
    if ($('#productParceDialogContent').dialog("isOpen")) {
        $('#productParceDialogContent').dialog('close');
    }
});

$('body').on('change', '[name="productPrice"]:file', function () {
    var file = this.files[0];
    if (typeof file !== 'undefined') {
        var name = file.name,
            size = file.size,
            type = file.type;
        if (type === 'text/csv') {
            uploadProductPriceFile();
        }
    }

});

function uploadProductPriceFile() {
    $('.productProceUploadButton').attr('disabled', 'disabled');
    var formData = new FormData($('#productPriceFormUpload')[0]);
    $.ajax({
        url: core_product_upload_price_file, //Server script to process data
        type: 'POST',
        //Ajax events
        beforeSend: function () {
            SetProductPriceFormUploadProgress(0);
        },
        success: function (res) {
            SetProductPriceFormUploadProgress(20);
            intervalProductParceId = setInterval(checkProductParceStatus, 3000);
        },
        error: function (res) {
            $('[name="productPrice"]').val('');
            alert('Ошибка загрузки прайса!');
        },
        // Form data
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });
}


function checkProductParceStatus() {
    $.ajax({
        url: core_product_upload_check_status, //Server script to process data
        type: 'POST',
        success: function (res) {
            var percent = (res.percent / (100 / 80) + 20).toFixed();
            SetProductPriceFormUploadProgress(percent);
            if (percent == 100) {
                clearInterval(intervalProductParceId);
                if (res.quantity > 0) {
                    var msg = 'Успешно добавлено товаров ' + res.quantity + ' шт.';
                }
                else {
                    var msg = 'Парсинг успешно закончился, однако новых продуктов не было обнаружено.';
                }
                $('#productPriceFormUploadProgress').hide();
                $('#productPriceFormUploadProgressOk').show().html(msg);
                $('.productProceUploadButton').removeAttr('disabled');
                $('[name="productPrice"]').val('');
            }
            //если ошибка
            if (res.error) {
                clearInterval(intervalProductParceId);
                $('#productPriceFormUploadProgress').hide();
                $('#productPriceFormUploadProgressError').show().html(res.error);
                $('.productProceUploadButton').removeAttr('disabled');
                $('[name="productPrice"]').val('');
            }

        },
        error: function (res) {
            $('[name="productPrice"]').val('');
            alert('Ошибка загрузки прайса!');
        },
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });
}

function SetProductPriceFormUploadProgress(percent) {
    var $progres = $('#productPriceFormUploadProgress');
    $progres.show().css('visibility', 'visible').find('.bar').attr('style', 'width:' + percent + '%').find('span').html(percent + '%');
    $('#productPriceFormUploadProgressOk').hide();
    $('#productPriceFormUploadProgressError').hide();

}