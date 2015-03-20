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
                var target = 'target="_blank"';
            }
            else {
                var target = '';
            }
            var img = '<a href="' + this.connectServerUrl + '/click?adplace_id='+adplace_id+'&placement_id='+banner.placement_id+'&placementbanner_id='+banner.placementbanner_id+'&banner_id='+banner.banner_id+'"  ' + target + '><image border="0" height="' + banner.height + '" width="' + banner.width + '" src="' + banner.source + '"/></a>'
            $('#promomaster_adplace_' + adplace_id).append(img);

        }

        //<div style="position:relative;">
        //<a style="position: absolute; width: 100px; height: 100px; left: 0; top: 0; background: url(/images/blank.gif) left top no-repeat;" href="http://www.example.ru"></a>
        //<object
        //type="application/x-shockwave-flash"
        //data="/banner.swf"
        //width="100" height="100">
        //<param name="movie" value="banner.swf">
        //<param name="wmode" value="opaque">
        //<param name="allowScriptAccess" value="sameDomain" />
        //</object></div>


        //<
        //object
        //style = "width:960px!important;height:80px!important;"
        //type = "application/x-shockwave-flash"
        //allowscriptaccess = "always"
        //data = "http://www.rontar.com/Banners/18717.swf?url=http%3A%2F%2Fadcode.rontar.com%2FClick.aspx%3Fcd%3Db0c67e8d558edbdd0b405a36e4d86ed4%26acsd%3D10694%26tp%3D2%26d%3D16763%26ac%3D12100%26ad%3D18717%26s%3D3025%26jiverUserId%3Daa226abce9d0ebad918942aeb19097fc%26ap%3D8071%26anap%3D0%26sspId%3D0%26dspId%3D0%26rtbp%3D-%26cpcbm%3DFalse%26ii%3D18717_21fac8e5-6b28-48f6-a5c8-0a1186bf061d_0&amp;link1=http%3A%2F%2Fadcode.rontar.com%2FClick.aspx%3Fcd%3Db0c67e8d558edbdd0b405a36e4d86ed4%26acsd%3D10694%26tp%3D2%26d%3D16763%26ac%3D12100%26ad%3D18717%26s%3D3025%26jiverUserId%3Daa226abce9d0ebad918942aeb19097fc%26ap%3D8071%26anap%3D0%26sspId%3D0%26dspId%3D0%26rtbp%3D-%26cpcbm%3DFalse%26ii%3D18717_21fac8e5-6b28-48f6-a5c8-0a1186bf061d_0&amp;clickTag=http%3A%2F%2Fadcode.rontar.com%2FClick.aspx%3Fcd%3Db0c67e8d558edbdd0b405a36e4d86ed4%26acsd%3D10694%26tp%3D2%26d%3D16763%26ac%3D12100%26ad%3D18717%26s%3D3025%26jiverUserId%3Daa226abce9d0ebad918942aeb19097fc%26ap%3D8071%26anap%3D0%26sspId%3D0%26dspId%3D0%26rtbp%3D-%26cpcbm%3DFalse%26ii%3D18717_21fac8e5-6b28-48f6-a5c8-0a1186bf061d_0&amp;target=_blank&amp;aTarget=_blank"
        //width = "960"
        //height = "80" >
        // < param
        //name = "movie"
        //value = "http://ac101.rontar.com/18717.swf?url=http%3A%2F%2Fadcode.rontar.com%2FClick.aspx%3Fcd%3Db0c67e8d558edbdd0b405a36e4d86ed4%26acsd%3D10694%26tp%3D2%26d%3D16763%26ac%3D12100%26ad%3D18717%26s%3D3025%26jiverUserId%3Daa226abce9d0ebad918942aeb19097fc%26ap%3D8071%26anap%3D0%26sspId%3D0%26dspId%3D0%26rtbp%3D-%26cpcbm%3DFalse%26ii%3D18717_21fac8e5-6b28-48f6-a5c8-0a1186bf061d_0&amp;link1=http%3A%2F%2Fadcode.rontar.com%2FClick.aspx%3Fcd%3Db0c67e8d558edbdd0b405a36e4d86ed4%26acsd%3D10694%26tp%3D2%26d%3D16763%26ac%3D12100%26ad%3D18717%26s%3D3025%26jiverUserId%3Daa226abce9d0ebad918942aeb19097fc%26ap%3D8071%26anap%3D0%26sspId%3D0%26dspId%3D0%26rtbp%3D-%26cpcbm%3DFalse%26ii%3D18717_21fac8e5-6b28-48f6-a5c8-0a1186bf061d_0&amp;clickTag=http%3A%2F%2Fadcode.rontar.com%2FClick.aspx%3Fcd%3Db0c67e8d558edbdd0b405a36e4d86ed4%26acsd%3D10694%26tp%3D2%26d%3D16763%26ac%3D12100%26ad%3D18717%26s%3D3025%26jiverUserId%3Daa226abce9d0ebad918942aeb19097fc%26ap%3D8071%26anap%3D0%26sspId%3D0%26dspId%3D0%26rtbp%3D-%26cpcbm%3DFalse%26ii%3D18717_21fac8e5-6b28-48f6-a5c8-0a1186bf061d_0&amp;target=_blank&amp;aTarget=_blank" > < a
        //href = "http://adcode.rontar.com/Click.aspx?cd=b0c67e8d558edbdd0b405a36e4d86ed4&amp;acsd=10694&amp;tp=2&amp;d=16763&amp;ac=12100&amp;ad=18717&amp;s=3025&amp;jiverUserId=aa226abce9d0ebad918942aeb19097fc&amp;ap=8071&amp;anap=0&amp;sspId=0&amp;dspId=0&amp;rtbp=-&amp;cpcbm=False&amp;ii=18717_21fac8e5-6b28-48f6-a5c8-0a1186bf061d_0"
        //style = "border:0!important;"
        //target = "_blank" > < img
        //style = "border:0!important;"
        //src = "http://www.rontar.com/Banners/18717_2.jpg" > < /a><param name="wmode" value="opaque"></
        //object >


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





