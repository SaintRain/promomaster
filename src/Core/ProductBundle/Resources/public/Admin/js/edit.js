/**
 * Редактирование продукта
 *
 * @author Kaluhniy N.I.
 * @copyright LLC "PromoMaster"
 */

(function($){
    $(function(){
        // обработка вперед назад
        $('body').keydown(function(e) {
            e = e || window.event;
            var keyCode = e.keyCode || e.which,
                prev = $('#btn-prev'),
                next = $('#btn-next'),
                elts = $('input, textarea, select'),
                isFocused = false,
                arrow = {left: 37, up: 38, right: 39, down: 40 };
            elts.each(function(index, elt){
               var $this = $(elt);
               if ($this.is(":focus")) {
                   isFocused = true;
                   return false;
               }
            });
            if (e.ctrlKey && !isFocused) {
                if (keyCode == arrow.left && prev.length) {
                    window.location = prev.attr('href');
                } else if (keyCode == arrow.right && next.length) {
                    window.location = next.attr('href');
                }
            }

        });

        function formatSelect(state) {
            if ($(state.element).attr('data-isenabled')) {
                return '<span class="active">' + state.text + '</span>';
            } else {
                return '<span class="not-active">' + state.text + '</span>';
            }

        }
        $("select[id*='virtualCategoryList']").on('select2-selecting',function(e){
           var curOption = $("select[id*='virtualCategoryList'] option[value='" + e.val + "']");
           if (!curOption.attr('data-isenabled')) {
               return false;
           }

        });
        $("select[id*='virtualCategoryList']").select2({
            formatResult: formatSelect,
            formatSelection: formatSelect,
            escapeMarkup: function(m) { return m; }
        });

    });
})(jQuery)