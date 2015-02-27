(function($){
    $(function(){
        var addHash = function() {
            var contactForm = $('.contacts_form'),
                errors = $('.form_field_error',contactForm);
            if (errors.length) {
                $('html, body').animate({
                    scrollTop: contactForm.offset().top
                }, 10);
            }
        }
        addHash();
        $('.close_action').click(function(){
            var $this = $(this),
                ticketId = $(this).attr('data-id'),
                msgForm = $('.cabinet_discussion_comments_add'),
                route = settingsJS.routes['trouble_ticket_close'];
            route = route.replace("PLACEHOLDER", ticketId);    
            $.ajax({
                type: "POST",
                url: route,
                success: function(data){
                    if (data.status) {
                       $this.html(data.status).removeClass('cloes_action').addClass('closed');
                       msgForm.remove();
                    } 
                },
                error: function(){
                    console.log('error');
                }
            });
        });
    })
})(jQuery)

var readTicket = function(route) {
    $.ajax({
        type: "POST",
        url: route,
        success: function(data){
            if (!data.status) {
                console.log(data.status)
            } else {
               console.log(data)
            }
        },
        error: function(){
            console.log('error');
        }
    });
}
