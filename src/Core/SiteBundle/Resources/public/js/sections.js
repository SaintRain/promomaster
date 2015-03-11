/**
 * Created by Kaluzhiny N.
 */
'use strict';
(function($){

    $(function(){

        $('.section-delete').click(function(){
            var $this = $(this),
                curId = $this.data('id');
            console.log(curId);
            $.ajax({
                type: "POST",
                url: 'dsdsd',
                success: function(data){
                    if (data.status) {
                    }
                },
                error: function(){

                }
            });
        });

    });

})(jQuery)
