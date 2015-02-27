(function($){
    $(function(){
        var totalElts = $('.delivery_companies .hidden .delivery_company').length - 1;

        $('.delivery_companies .hidden .delivery_company').each(function(index, element) {
            var $this = $(element),
                isLast = (totalElts == index) ? true :false;
                calcOneMethod($this, isLast, false);
        });

        //calcOneMethod(null);
        $('.delivery_all').click(function() {
            var $this = $(this),
                deliveryCompanies = $('.delivery_company.done');

            if ($this.hasClass('to_hide')) {
                $this.removeClass('to_hide').text(settingsJS.trans['delivery_calculate_show']);
                deliveryCompanies.each(function(index, element) {
                    var $this = $(element),
                        companyParent = $this.parent('dt'),
                        fullTimeBlock = companyParent.next('dd');
                    if (index != 0) {
                        companyParent.hide();
                        fullTimeBlock.hide();
                    }
                });
            } else {
                $this.addClass('to_hide').text(settingsJS.trans['delivery_calculate_hide']);
                    $('.delivery_companies .hidden .delivery_company').each(function(index, element) {
                    var $this = $(element),
                        companyParent = $this.parent('dt'),
                        fullTimeBlock = companyParent.next('dd');
                    if ($this.hasClass('done')) {
                        companyParent.show();
                        fullTimeBlock.show();
                    } else  {
                        calcOneMethod($this, false, true);
                    }
                });
            }
            
        });
        
    });

    /**
     * Посчет стоимости доставки
     * @param {object} element - jquery element блок с мтодом доставки
     * @returns {void}
     */
    var calcOneMethod = function(element, isLast, needToShow) {
        var deliveryAllLink = $('.delivery_all'),
            firstInGroup,
            $this = element,
            parentBlock = $this.parents('.product_buy_delivery'),
            companyParent = $this.parent('dt'),
            fullTimeBlock = companyParent.next('dd'),
            timeBlock =  $('span', fullTimeBlock);

        $.ajax({
            method: "POST",
            url: settingsJS.routes['delivery_calculate'],
            data: "productId=" + parentBlock.data('product-id') + "&deliveryMethodId=" + $this.data('delivery') + "&deliveryCityId=" + $this.data('user-city') + "&productPrice=" + parentBlock.data('product-price'),
            success: function(data) {
                if (data.result.cost) {
                    $this.addClass('done');
                    timeBlock.text(data.result.days.maxDaysTrans);
                    if (needToShow) {
                        companyParent.show();
                        fullTimeBlock.show();
                    }
                } else {
                    fullTimeBlock.text(' ' + settingsJS.trans['delivery_broken_connection']);
                }

                if ($('.delivery_company.done').length && isLast) {
                    firstInGroup = $('.delivery_company.done:first');
                    firstInGroup.parent('dt').show();
                    firstInGroup.parent('dt').next('dd').show();
                    $('.delivery_all').show();
                }
            }
        });
    }
})(jQuery)


