/**
 * Клиент для работы с сервером ротации рекламы
 */

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
    //connectServerUrl: "http://promomaster:1337", //адрес подключения к серверу

    //прорисовка баннера
    drawBanner: function (banner, adplace_id) {
        if (banner.type == 'ImageBanner') {

            if (banner.isOpenUrlInNewWindow) {
                var target = 'target="_blank"';
            }
            else {
                var target = '';
            }
            var img = '<a href="' + this.connectServerUrl + '/click?adplace_id=' + adplace_id + '&placement_id=' + banner.placement_id + '&placementbanner_id=' + banner.placementbanner_id + '&banner_id=' + banner.banner_id + '"  ' + target + '><image border="0" height="' + banner.height + '" width="' + banner.width + '" src="' + banner.source + '"/></a>'
            document.getElementById('promomaster_adplace_' + adplace_id).innerHTML=img;

        }

        else if (banner.type == 'FlashBanner') {

            if (banner.isOpenUrlInNewWindow) {
                var target = 'target="_blank"';
            }
            else {
                var target = '';
            }
            var flash =
                '<object height="' + banner.height + '" width="' + banner.width + '"' +
                'style="padding-left: 0px"' +
                'type="application/x-shockwave-flash"' +
                'data="' + banner.source + '?url=' + banner.url + '">' +
                '<param name="quality" value="high">' +
                '<param name="wmode" value="opaque">' +
                '<param name="allowfullscreen" value="sameDomain">' +
                '</object>';

            document.getElementById('promomaster_adplace_' + adplace_id).innerHTML=flash;
        }
        else if (banner.type == 'CodeBanner') {
            document.getElementById('promomaster_adplace_' + adplace_id).innerHTML=banner.source;
        }
    },
    //запрашивает рекламу по данным, которые пришли
    getAd: function (adplace_id) {

        var xhr = this.getXhrObject();
        xhr.open('GET', this.connectServerUrl + '/get?id='+adplace_id, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                __PromoMasterClient.drawBanner(response, adplace_id);

            }
        }
        xhr.send(null);
    },

    getQ: function (url) {
        var xhr = this.getXhrObject();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                output.innerHTML = JSON.parse(xhr.responseText);

                __PromoMasterClient.drawBanner(response, adplace_id);

            }
        }
        xhr.send(null);
    },

    getXhrObject: function () {
        if (typeof XMLHttpRequest === 'undefined') {
            XMLHttpRequest = function () {
                try {
                    return new window.ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e) {
                }
            };
        }
        return new XMLHttpRequest();
    }
};