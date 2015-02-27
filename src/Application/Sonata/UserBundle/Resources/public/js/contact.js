(function($){
    var ajaxDeliveryCalc = [];
    $(function() {

        $('.delivery_btn').prop('disabled', true).addClass('disabled'); // выкл кнопку на шаге доставки 
        var isSent = false; // отправлен ли уже ajax

        // маски
        $('.phone_correct').inputmask({mask: "+7 (999) 999-99-99[9]", greedy: false });
        $('.passport').inputmask({mask: "9999 999999", greedy: true });
    });
})(jQuery);