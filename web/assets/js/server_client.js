/**
 * Клиент для работы с сервером ротации рекламы
 */

//Включает на площадке jquery, если её нет
//if (!window.jQuery) {
    var jq = document.createElement('script');
    jq.type = 'text/javascript';
    jq.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js';
    document.getElementsByTagName('head')[0].appendChild(jq);
//}

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
    connectServerUrl: "http://191.235.147.26:1337", //адрес подключения к серверу

    //прорисовка баннера
    drawBanner: function (banner, adplace_id) {
        if (banner.type == 'ImageBanner') {

            if (banner.isOpenUrlInNewWindow) {
                var target = 'target="_blank"';
            }
            else {
                var target = '';
            }
            var img = '<a href="' + this.connectServerUrl + '/click?adplace_id='+adplace_id+'&placement_id='+banner.placement_id+'&placementbanner_id='+banner.placementbanner_id+'&banner_id='+banner.banner_id+'"  ' + target + '><image border="0" height="' + banner.height + '" width="' + banner.width + '" src="' + banner.source + '"/></a>'
            $('#promomaster_adplace_' + adplace_id).append(img);

        }

        else
        if (banner.type == 'FlashBanner') {

            if (banner.isOpenUrlInNewWindow) {
                var target = 'target="_blank"';
            }
            else {
                var target = '';
            }
            var flash =
                '<object height="' + banner.height + '" width="' + banner.width + '"' +
                'style="padding-left: 0px"' +
                'type="application/x-shockwave-flash"'+
                'data="' + banner.source + '?url=' + banner.url + '">' +
                '<param name="quality" value="high">' +
                '<param name="wmode" value="opaque">'+
                '<param name="allowfullscreen" value="sameDomain">' +
            '</object>';


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
            .success(function (response) {
                __PromoMasterClient.drawBanner(response, adplace_id);
            })
            .error(function (response) {
                console.log(response);
            });
    }




};





