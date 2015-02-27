
/**
 * Для страницы с продуктом
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

// Функция фозврашает ключ первого элемента js объекта
function first(obj) {
    for (var a in obj)
        return a;
}

var speedAnimation = 200;

$(function () {
    // Перезагрузка страницы при смене цвета
    $('#color').change(function () {
        var sizeValue = $('#size :selected').val();
        var linksJson = $('#color :selected').data('links-json');
        var href;
        if (undefined !== linksJson) {
            if (undefined !== linksJson[sizeValue]) {
                href = location.origin + linksJson[sizeValue];
            } else {
                href = location.origin + linksJson[first(linksJson)];
            }
            location.href = href;
        }
    });

    $('#frontend_pre_order_preOrder_phone').inputmask({mask: "+7 (999) 999-99-99[9]", greedy: false});
    $('#frontend_pre_order_preOrder_compositions_0_quantity').inputmask("integer");
    // Показ/скрытие сообщения если нет размера в ввыбранном цвете
    var sizeMsgTpl = $('#sizeMsgTpl').html();
    $('#size').change(function () {

        if ($(this).hasClass('load')) {
            $('#size').val($('#size option[data-current="this"]').val());
        }
        $(this).removeClass('load');

        var sizeValue = $('#size :selected').val();
        var sizeCaption = $('#size :selected').text();
        var colorCaption = $('#color :selected').text();
        var linksJson = $('#color :selected').data('links-json');
        var zoomImage = $('.product_photo_view img');

        if (undefined === linksJson || undefined === linksJson[sizeValue]) {
            var colorsCaptions = new Array();
            $('#color option').each(function () {
                var linksJsonTemp = $(this).data('links-json');
                if (undefined !== linksJsonTemp && undefined !== linksJsonTemp[sizeValue]) {
                    colorsCaptions[colorsCaptions.length] = ' - ' + $(this).text();
                }
            });

            if (colorsCaptions.length) {
                sizeMsg = sizeMsgTpl.replace(/%size%/g, sizeCaption).replace(/%color%/g, colorCaption).replace(/%colors%/g, colorsCaptions.join(';<br>'));
                $('#sizeMsgTpl').html(sizeMsg).slideDown('fast', function () {
                    if ($('.side_col_pad .product_specs').length && $('.side_col_pad .product_buy').length) {
                        zoomConfigHeight = $('.side_col_pad .product_specs').outerHeight(true) + $('.side_col_pad .product_buy').outerHeight(true);
                    }
                    zoomConfig = {
                        cursor: "crosshair",
                        imageCrossfade: false,
                        //tint:true,
                        //tintColour:'#F89406',
                        //tintOpacity:0.5,
                        zoomWindowPosition: 1,
                        zoomWindowHeight: (!zoomConfigHeight) ? 410 : zoomConfigHeight,
                        zoomWindowWidth: 650,
                        zoomWindowFadeIn: 500,
                        zoomWindowFadeOut: 750,
                        zoomWindowOffetx: 110,
                        loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif',
                        borderSize: 0,
                        onZoomedImageLoaded: function () {
                            $('.img-loader').stop(true, true, true).hide();
                            $('.product_photo_view .loupe').stop(true, true, true).show();
                        }
                    };
                    if (zoomImage.data('zoom-image')) {
                        $('.zoomContainer').remove();
                        zoomImage.removeData('elevateZoom');
                        zoomImage.elevateZoom(zoomConfig);
                    }
                });
            }
            $('.instock').removeClass('instock').addClass('not_instock');
            $('.button_cart').prop('disabled', true).fadeOut(100);
            $('.count-instock').hide();
        } else {
            if (undefined !== linksJson[sizeValue] && location.origin + linksJson[sizeValue] !== location.href.replace(/#.+/, '')) {
//                $('.button_cart').prop('disabled', true).fadeOut(100);
//                location.href = location.origin + linksJson[sizeValue];
            } else {
                $('.button_cart').prop('disabled', false).fadeIn(100);
            }
            $('#sizeMsgTpl').slideUp('fast');
            $('.not_instock').removeClass('not_instock').addClass('instock');
            $('.count-instock').show();
        }
    }).trigger('change');
    /*
     $(".fancybox-button").click(function(event) {
     $.fancybox.open(this.href, {type: "iframe"});
     $.fancybox.showLoading();
     $("iframe.fancybox-iframe").load(function() {
     $.fancybox.hideLoading();
     });
     //event.preventDefault();
     });
     */
    // Все что связанное с картинками
    $('.fancybox-button').fancybox({
        prevEffect: 'fade',
        openEffect: 'fade',
        closeEffect: 'fade',
        nextEffect: 'fade',
        transitionIn: 'elastic',
        transitionOut: 'elastic',
        iframe: {
            preload: false
        },
        nextMethod: 'resizeIn'
    });

    var GalleryOptions = {
        widthItem: $('.product_gallery_item').outerWidth(true),
        //widthItem: $('.product_gallery_item').width() + parseInt($('.product_gallery_item').css('margin-left')) * 2 + parseInt($('.product_gallery_item').css('border-width')) * 2,
        count: $('.product_gallery_item').size(),
        boundWidth: $('.product_gallery').width()
    };
    GalleryOptions.widthContainer = GalleryOptions.widthItem * GalleryOptions.count;
    $('.product_gallery_scroll').width(GalleryOptions.widthContainer);
    if (GalleryOptions.widthContainer > GalleryOptions.boundWidth) {
        $('.product_gallery_nav.next').removeClass('disabled');
    }

    $('.product_gallery_nav').disableSelection();

    // клик на правую стрелку
    $('.product_gallery_nav.next').click(function () {
        var $this = $(this);
        if ($this.hasClass('disabled') || $this.hasClass('busy')) {
            return false;
        }
        $this.addClass('busy');
        var $scroll = $('.product_gallery_scroll');
        $scroll.animate({marginLeft: -GalleryOptions.widthItem + parseInt($scroll.css('margin-left'))}, speedAnimation, 'linear', function () {
            if ($('.product_gallery_nav.prev').hasClass('disabled')) {
                $('.product_gallery_nav.prev').removeClass('disabled');
            }
            if (Math.abs(parseInt($scroll.css('margin-left'))) >= Math.abs(GalleryOptions.widthContainer - GalleryOptions.boundWidth)) {
                $this.addClass('disabled');
            }
            $this.removeClass('busy');
        });

    });

    // клик на левую стрелку
    $('.product_gallery_nav.prev').click(function () {
        var $this = $(this);
        if ($this.hasClass('disabled') || $this.hasClass('busy')) {
            return false;
        }
        $this.addClass('busy');
        var $scroll = $('.product_gallery_scroll');
        $scroll.animate({marginLeft: GalleryOptions.widthItem + parseInt($scroll.css('margin-left'))}, speedAnimation, 'linear', function () {
            if ($('.product_gallery_nav.next').hasClass('disabled')) {
                $('.product_gallery_nav.next').removeClass('disabled');
            }
            if (parseInt($scroll.css('margin-left')) >= 0) {
                $this.addClass('disabled');
            }
            $this.removeClass('busy');
        });
    });

    var zoomConfigHeight;
    if ($('.side_col_pad .product_specs').length && $('.side_col_pad .product_buy').length) {
        zoomConfigHeight = $('.side_col_pad .product_specs').outerHeight(true) + $('.side_col_pad .product_buy').outerHeight(true);
    }
    var zoomConfig = {
        cursor: "crosshair",
        imageCrossfade: false,
        //tint:true,
        //tintColour:'#F89406',
        //tintOpacity:0.5,
        zoomWindowPosition: 1,
        zoomWindowHeight: (!zoomConfigHeight) ? 410 : zoomConfigHeight,
        zoomWindowWidth: 650,
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 750,
        zoomWindowOffetx: 110,
        loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif',
        borderSize: 0,
        onZoomedImageLoaded: function () {
            $('.img-loader').stop(true, true, true).hide();
            $('.product_photo_view .loupe').stop(true, true, true).show();
        }
    };
    if ($('.product_photo_view img').data('zoom-image')) {
        $('.product_photo_view img').elevateZoom(zoomConfig);
    }
    // Смена картинки при наведении на превъюхи
    $('body').on('mouseover', '.product_gallery_item', function () {
        var $this = $(this),
                loupeBlock = $('.product_photo_view .loupe'),
                zoomImage = $('.product_photo_view img'),
                dataZoomElt = $('img', $this),
                zoomConfigHeight = 410,
                src = $this.data('src');
        if ($('.side_col_pad .product_specs').length && $('.side_col_pad .product_buy').length) {
            zoomConfigHeight = $('.side_col_pad .product_specs').outerHeight(true) + $('.side_col_pad .product_buy').outerHeight(true);
            zoomConfig.zoomWindowHeight = zoomConfigHeight;
        }

        if ($this.hasClass('small_video')) {
            loupeBlock.addClass('hidden');
            loupeBlock.hide();
            return false;
        }
        $('.product_gallery_item').removeClass('active');
        $this.addClass('active');

        zoomImage.prop('src', src);
        $('.zoomContainer').remove();
        zoomImage.removeData('elevateZoom');
        if (dataZoomElt.data('zoom-image')) {
            loupeBlock.stop(true, true, true).fadeOut(200);
            $('.img-loader').stop(true, true, true).fadeIn(400);
            zoomImage.data('zoom-image', dataZoomElt.data('zoom-image'));
            zoomImage.elevateZoom(zoomConfig);
        } else {
            loupeBlock.hide();
        }
    });
    $('.product_gallery_item.active').trigger('mouseover');

    /*
     $('.product_photo_view img').click(function() {
     if ($('.product_gallery_item.active a').length) {
     $('.product_gallery_item.active a').trigger('click');
     }
     });
     */
    /*
     // Нажатие на лупу
     $('.product_photo_view .loupe').click(function() {
     $(this).parent('.product_photo_view').find('img').trigger('click');
     });
     */
    // Клик по ссылке увеличить фото
    $('.zoom-photo span').click(function () {
        $(this).parent('.zoom-photo').prev('.product_photo_view').find('img').trigger('click');
    });

    // карусель для продуктов находящихся в линии (Из серии, Похожие)
    $('.showcase_compact_nav').disableSelection();
    $('.showcase_nav').disableSelection();
    var firstIndex = new Array();
    var lastIndex = new Array();
    var maxHeights = new Array();
    $('.showcase_compact_box, .showcase_container').each(function (i) {

        var $t = $(this);
        var $productsLine = $t.find('.products_grid_line');
        var $products = $productsLine.find('.product');
        var $next = $t.find('.showcase_compact_nav.next').size() ? $t.find('.showcase_compact_nav.next') : $t.find('.showcase_nav.next');
        var $prev = $t.find('.showcase_compact_nav.prev').size() ? $t.find('.showcase_compact_nav.prev') : $t.find('.showcase_nav.prev');
        var countOfVisible = Math.round($productsLine.width() / $products.outerWidth());

        maxHeights[i] = 232;

        if ($t.hasClass('showcase_compact_box')) {
            var $conteiner = $t.find('.grid_container');
        } else {
            var $conteiner = $t;
        }

        $conteiner.find('.product').each(function () {
            $(this).find('img')[0].onload = function () {
                h = $(this).closest('div.product').outerHeight();
                if (h > maxHeights[i]) {
                    $conteiner.css('min-height', h + 'px');
                    $conteiner.find('.grid_container').css('min-height', h + 'px');
                }
            };

        });

        firstIndex[i] = 1;
        lastIndex[i] = countOfVisible + firstIndex[i];

        // скрываем часть продуктов
        if ($products.size() > countOfVisible) {
            $next.removeClass('disabled');
            $products.each(function (pi) {
                if (pi > (countOfVisible - 1)) {
                    $(this).hide();
                }
            });
        }

        $next.click(function () {

            if ($next.hasClass('disabled') || $next.hasClass('busy') || (lastIndex[i] >= $products.size() + 1)) {
                return false;
            }

            $next.addClass('busy');

            $right = $productsLine.find('.product:nth-child(' + lastIndex[i] + ')').css({
                position: 'absolute',
                top: parseInt($products.css('margin-top')),
                left: parseInt($productsLine.width())
            }).show();

            $right.animate({left: parseInt($right.css('left')) - $products.outerWidth()}, speedAnimation, 'linear', function () {
            });

            $left = $productsLine.find('.product:nth-child(' + firstIndex[i] + ')').animate({marginLeft: -$products.outerWidth()}, speedAnimation, 'linear', function () {

                if ($prev.hasClass('disabled')) {
                    $prev.removeClass('disabled');
                }

                if (lastIndex[i] >= $products.size() + 1) {
                    $next.addClass('disabled');
                }

                $right.removeAttr('style');
                $(this).hide();
                $next.removeClass('busy');
            });

            firstIndex[i]++;
            lastIndex[i]++;
        });

        $prev.click(function () {

            if ($prev.hasClass('disabled') || $prev.hasClass('busy') || firstIndex[i] <= 0) {
                return false;
            }

            $prev.addClass('busy');

            $left = $productsLine.find('.product:nth-child(' + (firstIndex[i] - 1) + ')').css({
                marginLeft: -parseInt($products.outerWidth())
            }).show();

            $right = $productsLine.find('.product:nth-child(' + (lastIndex[i] - 1) + ')').css({
                position: 'absolute',
                top: parseInt($products.css('margin-top')),
                left: parseInt($products.outerWidth() * (countOfVisible - 1))
            }).show();

            $left.animate({marginLeft: 0}, speedAnimation, 'linear', function () {
            });

            $right = $productsLine.find('.product:nth-child(' + (lastIndex[i] - 1) + ')').animate({left: parseInt($productsLine.width())}, speedAnimation, 'linear', function () {

                if ($next.hasClass('disabled')) {
                    $next.removeClass('disabled');
                }

                if ((firstIndex[i] - 1) <= 0) {
                    $prev.addClass('disabled');
                }

                $left.removeAttr('style');
                $(this).hide();
                $prev.removeClass('busy');
            });

            firstIndex[i]--;
            lastIndex[i]--;
        });
    });



    // Обновление избранного (Добавление/Удаление)
    var favoriteData = {
        add: {
            url: $('#update-favorite').data('add-url'),
            text: $('#update-favorite').data('add-text')
        },
        remove: {
            url: $('#update-favorite').data('remove-url'),
            text: $('#update-favorite').data('remove-text')
        },
        isInFavorite: $('#update-favorite').data('is-in-favorite'),
        isLogged: $('#update-favorite').data('is-logged')
    };

    if (favoriteData.isInFavorite) {
        $('#update-favorite').text(favoriteData.remove.text).addClass('remove_from_faver');
    } else {
        $('#update-favorite').text(favoriteData.add.text);
    }

    $('#update-favorite').click(function () {
        if ($(this).hasClass('busy')) {
            return;
        }
        $(this).addClass('busy');

        favoriteData.isInFavorite = $('#update-favorite').data('is-in-favorite');

        if (!favoriteData.isLogged) {
//            loadLoginFormByAjax($('#update-favorite').data('login-url'));
            $('.modal_window').addClass('modal-in-center').modal('show');
            setCookie('add_in_favorite', favoriteData.add.url, {expires: 3600 * 24});
            setCookie('redirect', document.URL, {expires: 3600 * 24});
            $('#update-favorite').removeClass('busy');
            return;
        }

        var url = favoriteData.isInFavorite ? favoriteData.remove.url : favoriteData.add.url;

        var $resultElement = $('.ajax-result-favorites');
        $resultElement.children('div').slideUp('fast');
        $.ajax({
            type: 'POST',
            url: url
        })
                .done(function (result) {

                    if (undefined !== result.success) {
                        $('#update-favorite').data('is-in-favorite', favoriteData.isInFavorite ? 0 : 1);
                        $('#update-favorite').text(favoriteData.isInFavorite ? favoriteData.add.text : favoriteData.remove.text);
                        if (favoriteData.isInFavorite) {
                            $('#update-favorite').removeClass('remove_from_faver');
                        } else {
                            $('#update-favorite').addClass('remove_from_faver');
                        }

                        $resultElement.find('.ajax-success').html(result.success.join('<br>')).slideDown('fast');
                    }
                    if (undefined !== result.error) {
                        $('#update-favorite').data('is-in-favorite', favoriteData.isInFavorite ? 0 : 1);
                        $('#update-favorite').text(favoriteData.isInFavorite ? favoriteData.add.text : favoriteData.remove.text);
                        $resultElement.find('.ajax-error').html(result.error.join('<br>')).slideDown('fast');
                    }

                    $('#update-favorite').removeClass('busy');
                });
    });

    if (getCookie('add_in_favorite') !== undefined) {
        if (!favoriteData.isInFavorite) {
            $('span[data-add-url="' + getCookie('add_in_favorite') + '"]').trigger('click');
        }

        deleteCookie('add_in_favorite');
    }

    // Обновление карзины
    var cartData = {
        id: $('#update-cart').data('id'),
        url: $('#update-cart').data('url'),
        isInCart: $('#update-cart').data('is-in-cart'),
        isInCartText: $('#update-cart').data('is-in-cart-text')
    };

    var orderJson = $.parseJSON(orderJsonString) || {};

    if ($('#quantity-alternative').length) {
        $('#quantity-alternative').on('change', function () {
            var id = parseInt($('#quantity-alternative').val());
            if (orderJson !== null && orderJson.products !== undefined && orderJson.products[id] !== undefined) {
                $('.ajax-result-cart').find('.ajax-success').html(cartData.isInCartText).slideDown('fast');
            } else {
                $('.ajax-result-cart').find('.ajax-success').slideUp('fast');
            }
        });
    }

    $('#update-cart').on('click', function () {
        if ($(this).hasClass('disabled')) {
            return;
        }
        $(this).addClass('disabled');

        cartData.action = 'add';

        // Если есть кол-ние альтернативы то берем id из списка
        if ($('#quantity-alternative').length) {
            cartData.id = parseInt($('#quantity-alternative').val());
        }

        var $resultElement = $('.ajax-result-cart');
        $resultElement.children('div').slideUp('fast');
        $.ajax({
            type: 'POST',
            data: {id: cartData.id, action: cartData.action},
            url: cartData.url
        })
                .done(function (result) {
                    if (undefined !== result.success) {
                        $resultElement.find('.ajax-success').html(result.success.join('<br>')).slideDown('fast');
                        if (orderJson !== null && orderJson.products !== undefined && orderJson.products[cartData.id] !== undefined) {
                            orderJson.products[cartData.id]['quantity'] += 1;
                        } else {
                            orderJson.products = new Array();
                            orderJson.products[cartData.id] = {
                                id: cartData.id,
                                quantity: 1
                            };
                        }
                    }
                    if (undefined !== result.error) {
                        $resultElement.find('.ajax-error').html(result.error.join('<br>')).slideDown('fast');
                    }
                    if (undefined !== result.data) {
                        $('.header_usercart_count').text(result.data.total_quantity);
                        $('.header_usercart_info').text(declOfNum(result.data.total_quantity, ['товар', 'товара', 'товаров']) + ', ' + number_format(result.data.total_cost) + ' ' + $('.header_usercart_info').data('currency'));
                    }

                    $('#update-cart').removeClass('disabled');
                });

    });

    // под заказ
    $('#pre_order_form').submit(function () {
        var $this = $(this),
                errorElt,
                preOrderBlock = $('#pre_order_total_cost'),
                errorsBlock = $('.form_field_error_txt'),
                successBlock = $('#byOrderMessage'),
                submitBtn = $('#buy-in-order');
        visitortime = new Date(),
                visitortimezone = -visitortime.getTimezoneOffset() / 60;
        successBlock.hide();
        if (errorsBlock.length) {
            errorsBlock.each(function (index, element) {
                var $this = $(element);
                $this.parents('.like_text_input_rounded_wr').removeClass('form_field_error');
                $this.remove();
            });
        }
        $.ajax({
            type: 'POST',
            data: $this.serialize() + '&pre_order_form[visitortimezone]=' + visitortimezone,
            url: settingsJS.routes['core_product_buy_by_order'],
            success: function (data) {
                if (data.result) {
                    successBlock.show().attr('class', 'by-order-success-message').html(data.msg);
                    if (data.cost) {
                        preOrderBlock.html(data.cost + '<span> руб.</span>');
                    }
                } else {
                    for (var key in data.errors) {
                        errorElt = $('input.' + key, $this);
                        errorElt.parents('.like_text_input_rounded_wr').addClass('form_field_error');
                        $('<div class="form_field_error_txt">' + data.errors[key] + '</div>').insertAfter(errorElt);
                    }
                }
                submitBtn.removeClass('disabled').removeAttr('disabled');
            },
            error: function () {
                errorElt = $('input.quantity', $this);
                errorElt.parents('.like_text_input_rounded_wr').addClass('form_field_error');
                $('<div class="form_field_error_txt"> Не возможно просчитать </div>').insertAfter(errorElt);
                submitBtn.removeClass('disabled').removeAttr('disabled');
            }
        });
        submitBtn.addClass('disabled').attr('disabled', 'disabled');
        return false;
    });

    // пересчитываем стооимость товара в предзаказе
    $('body').on('blur', '#frontend_pre_order_preOrder_compositions_0_quantity', function () {
        var $this = $(this),
                errorElt,
                parentForm = $('#pre_order_form'),
                errorsBlock = $('.form_field_error_txt'),
                successBlock = $('#byOrderMessage'),
                preOrderBlock = $('#pre_order_total_cost'),
                prodId = $('#frontend_pre_order_preOrder_compositions_0_product').val();

        if (errorsBlock.length) {
            errorsBlock.each(function (index, element) {
                var $this = $(element);
                $this.parents('.like_text_input_rounded_wr').removeClass('form_field_error');
                $this.remove();
            });
        }


        var compositions = [],
                comp = {};

        comp.product = prodId;
        comp.quantity = $this.val();
        compositions.push(comp);

        var requestData = {
            compositions: compositions
        };

        if ($this.val() && (!$this.data('quantity') || $this.data('quantity') != $this.val())) {
            $.post(settingsJS.routes['core_pre_order_cost'], requestData)
                    .done(function (data) {
                        if (data.data) {
                            preOrderBlock.html(data.data.print_cost);
                            $this.data('quantity', $this.val());
                        } else if (data.errors) {
                            for (var key in data.errors) {
                                errorElt = $('input.' + key, parentForm);
                                errorElt.parents('.like_text_input_rounded_wr').addClass('form_field_error');
                                $('<div class="form_field_error_txt">' + data.errors[key] + '</div>').insertAfter(errorElt);
                            }
                        }
                    })
                    .fail(function (data) {
                        errorElt = $('input.quantity', parentForm);
                        errorElt.parents('.like_text_input_rounded_wr').addClass('form_field_error');
                        $('<div class="form_field_error_txt"> Не возможно просчитать </div>').insertAfter(errorElt);
                    });
        }
    });

    $('body').on('change', '#frontend_pre_order_contactList', function () {
        var $this = $(this),
                parentForm = $this.parents('#pre_order_form'),
                deliveryCity = $("input[id^='frontend_pre_order_preOrder_city']", parentForm),
                cityCaption = $('.select2-container.city .select2-chosen', parentForm),
                cityBlock = $('.select2-container.city.ajax-entity', parentForm),
                cityCaptionWrapper = $('.select2-choice', cityBlock),
                contact = $('option:selected', $this).data('contact');
        if ($this.val()) {
            for (var key in contact) {
                if (key == 'city') {
                    deliveryCity.val(contact[key].id);
                    cityCaption.text(contact[key].caption);
                    //cityBlock.addClass('select2-allowclear');
                    cityCaptionWrapper.removeClass('select2-default');
                    //$('.' + key).select2("val", contact[key].id);
                } else {
                    $('.' + key, parentForm).val(contact[key]);
                }
            }
        } else {
            $('select, textarea, input:not([type="hidden"])', parentForm).each(function (index, element) {
                var $this = $(element);
                $this.val('');
                if ($this.hasClass('ajax-entity')) {
                    cityCaption.text('Город');
                    cityCaptionWrapper.addClass('select2-default');
                    $this.select2("val", "");
                }
            });
        }
    });
});
(function ($, F) {
    F.transitions.resizeIn = function () {
        var previous = F.previous,
                current = F.current,
                startPos = previous.wrap.stop(true).position(),
                endPos = $.extend({opacity: 1}, current.pos);
        startPos.width = previous.wrap.width();
        startPos.height = previous.wrap.height();

        previous.wrap.stop(true).trigger('onReset').remove();

        delete endPos.position;

        current.inner.hide();

        current.wrap.css(startPos).animate(endPos, {
            duration: current.nextSpeed,
            easing: current.nextEasing,
            step: F.transitions.step,
            complete: function () {
                F._afterZoomIn();

                current.inner.fadeIn("fast");
            }
        });
    };

}(jQuery, jQuery.fancybox));
