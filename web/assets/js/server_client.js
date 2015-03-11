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


//класс для работы с сервером
var PromoMasterClient = {
    connectServerUrl: "http://127.0.0.1:1337", //адрес подключения к серверу
    isInitialized:false,
    init: function (place_id) {
        if (!this.isInitialized) {
            this.getOptions(place_id);
        }
    },
    //получает начальные настройки площадки для ротации баннеров
    getOptions: function(adplace_id) {

        $.post( "example.php", function() {
            alert( "success" );
        })
            .done(function() {
                alert( "second success" );
            })
            .fail(function() {
                alert( "error" );
            })
            .always(function() {
                alert( "finished" );
            });
    },

    //запрашивает рекламу по данным, которые пришли
    getAd: function(adplace_id) {

        $.get(this.connectServerUrl+'/getad',
            {adplace_id:adplace_id},
            function() {
            //alert( "success" );
        })
            .done(function() {
             //   alert( "second success" );
            })
            .fail(function() {
               // alert( "error" );
            })
            .always(function() {
               // alert( "finished" );
            });
    }

};


$(function () {


})


/**
 * Инициализирует рекламный баннер в том месте, где вызвали
 * @param adplace_id  - ID рекламного места
 * @constructor
 */
function GET_AD(adplace_id) {

    PromoMasterClient.getAd(adplace_id); //запрашивает рекламу для места, где вызвали
}

