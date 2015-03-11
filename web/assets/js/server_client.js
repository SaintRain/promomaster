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





$(function () {
//класс для работы с сервером
    var client = jQuery.Class.create({
        init: function (place_id) {
            if (!this.isInitialized) {
                this.getOptions(place_id);
            }
        },
        //получает начальные настройки площадки для ротации баннеров
        getOptions: function(place_id) {

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
        getAd: function(place_id) {

        }




    });

})


/**
 * Инициализирует рекламный баннер в том месте, где вызвали
 * @param place_id  - ID рекламного места
 * @constructor
 */
function GET_AD(place_id) {

    var client = new client(place_id);  //создаёт клиента для работы с сервером

    client.getAd(place_id); //запрашивает рекламу для места, где вызвали

}

