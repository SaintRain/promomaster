(function($){
    $(function(){
        
        $('.phone_correct').inputmask({mask: "+7 (999) 999-99-99[9]", greedy: false });

        $('.delete').click(function(){
            var $this = $(this),
               parentBlock = $this.parents('.contact_contragents'),
               curId = $this.data('contact') || $this.data('contragent'),
               contactList = $('.contact_list'),
               route = $this.data('route');
            $.ajax({
                url: settingsJS.routes[route],
                method: "POST",
                data: "id=" + curId,
                success: function(data) {
                    if (!data.errors) {
                        parentBlock.fadeOut('slow', function(){
                            parentBlock.remove();
                            if (data.refresh) {
                                contactList.remove();
                                location.reload();
                            }
                        });
                    }
                },
                error: function() {
                    console.log('error');
                }
            });

            return false;
       });

       $('#contragent_type input').change(function(){
           $('.cabinet_address_add form').toggleClass('hidden').toggleClass('normal');
       });
    });
})(jQuery)
