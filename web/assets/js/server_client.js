/**
 * Клиент для работы с сервером ротации рекламы
 */

//Включает на площадке jquery, если её нет
if (!window.jQuery) {
    var jq = document.createElement('script');
    jq.type = 'text/javascript';
    jq.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js';
    document.getElementsByTagName('head')[0].appendChild(jq);
}

/**
 * Инициализирует рекламный баннер в том месте, где вызвали
 * @param adplace_id  - ID рекламного места
 * @constructor
 */
function __GET_AD(adplace_id) {

    __PromoMasterClient.getAd(adplace_id); //запрашивает рекламу для места, где вызвали
}

//класс для работы с сервером
var __PromoMasterClient = {
    connectServerUrl: "http://127.0.0.1:1337", //адрес подключения к серверу
    isInitialized: false,
    init: function (place_id) {
        if (!this.isInitialized) {
            this.getOptions(place_id);
        }
    },
    //получает начальные настройки площадки для ротации баннеров
    getOptions: function (adplace_id) {

        $.post("example.php", function () {
            alert("success");
        })
            .done(function () {
                alert("second success");
            })
            .fail(function () {
                alert("error");
            })
            .always(function () {
                alert("finished");
            });
    },

    //прорисовка баннера
    drawBanner: function (banner, adplace_id) {
        if (banner.type == 'ImageBanner') {

            if (banner.isOpenUrlInNewWindow) {
                var target='target="_blank"';
            }
            else {
                var target='';
            }
            var img='<a href="'+banner.url+'" '+target+'><image border="0" height="' + banner.height + '" width="' + banner.width + '" src="' + banner.source + '"/></a>'
            $('#promomaster_adplace_' + adplace_id).append(img);

        }
        else if (banner.type == 'FlashBanner') {
            var flash =
                '<object height="' + banner.height + '" width="' + banner.width + '"' +
                'style="padding-left: 0px"' +
                'type="application/x-shockwave-flash" data="' + banner.source + '">' +
                '<param name="quality" value="high"><param name="wMode" value="window">' +
                '<param name="swLiveConnect" value="true">' +
                '<param name="wmode" value="transparent">' +
                '<param name="bgcolor" value="#000000">' +
                '<param name="allowfullscreen" value="true">' +
                '</object>'

            $('#promomaster_adplace_' + adplace_id).append(flash);
        }
        else if (banner.type == 'CodeBanner') {
            $('#promomaster_adplace_' + adplace_id).append(banner.source);
        }
    },
    //запрашивает рекламу по данным, которые пришли
    getAd: function (adplace_id) {
        $.get(this.connectServerUrl + '/get',
            {id: adplace_id})
            .done(function (response) {
                __PromoMasterClient.drawBanner(response, adplace_id);
            })
            .fail(function (response) {
                console.log(response);
            })
            .always(function (response) {
                console.log(response);
            });
    }

};





