$(function() {
    var speedAnimation = 100;
    $('.products_showcase.products_grid .text_tab').click(function() {
        var $this = $(this),
                needClass = $this.attr('class').match(/in_cat_([0-9a-zA-Z-_]+)/gi),
                productsRow = $('.products_showcase .grid_container'),
                sameClass = $this.siblings();
        if ($this.hasClass('active')) {
            return false;
        }

        $this.addClass('text_tab_active');
        sameClass.removeClass('text_tab_active');
        productsRow.addClass('hidden');
        $('.products_showcase .grid_container.' + needClass[0]).removeClass('hidden');

        return false;
    });

    $('.multiple-items').slick({
        dots: false,
        speed: 300,
        infinite: false,
        slidesToShow: 5,
        touchMove: false,
        slidesToScroll: 1,
        slide: 'li'
    });
    
});