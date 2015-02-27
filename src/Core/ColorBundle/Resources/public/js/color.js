/**
 * Скрипт для работы с цветом
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

/**
 * Перевод цвета из hex формата в rgb
 *
 * @param {string} hex - строка в вормате hex (ex: #FFFFFF)
 * @returns {object} - объект содержащий r, g, b полученого цвета
 */
function hex2rgb(hex) {
    var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
    hex = hex.replace(shorthandRegex, function(m, r, g, b) {
        return r + r + g + g + b + b;
    });

    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? [parseInt(result[1], 16), parseInt(result[2], 16), parseInt(result[3], 16)] : null;
}

/**
 * Вспомагательная функция для функции rgb2hex
 * Переводит число из 10 с. с. в 16 с. с.
 *
 * @param {integer} c - число в 10 с. с.
 * @returns {string} - полученное число в 16 с. с.
 */
function componentToHex(c) {
    var hex = c.toString(16);
    return hex.length == 1 ? "0" + hex : hex;
}

/**
 * Перевод цвета из формата rgb в hex
 *
 * @param {integer} r - число [0..255]
 * @param {integer} g - число [0..255]
 * @param {integer} b - число [0..255]
 * @returns {string}  - число в формтае hex
 */
function rgb2hex(r, g, b) {
    return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
}

/**
 * Перевод угла из радиан в градусы
 * angle / Math.PI * 180
 *
 * @param {number} angle - угол для перевода
 * @returns {number} - угол в градусах
 */
function rad2deg(angle) {
    return angle * 57.29577951308232;
}

/**
 * Перевод угла из градусов в радианы
 *
 * @param {number} angle - угол для перевода
 * @returns {number} - угол в радианах
 */
function deg2rad(angle) {
    return angle * .017453292519943295; // (angle / 180) * Math.PI;
}

/**
 * Функция для расчета схожести цветов по формуле цветового отличия
 * http://ru.wikipedia.org/wiki/%D0%A4%D0%BE%D1%80%D0%BC%D1%83%D0%BB%D0%B0_%D1%86%D0%B2%D0%B5%D1%82%D0%BE%D0%B2%D0%BE%D0%B3%D0%BE_%D0%BE%D1%82%D0%BB%D0%B8%D1%87%D0%B8%D1%8F
 *
 * @param {array} $rgb1 - массив содержащий r,g,b цвета
 * @param {array} $rgb2 - массив содержащий r,g,b цвета
 * @returns {number} - разница между получеными цветами
 */
function deltaECIE2000($rgb1, $rgb2) {

    var_rgb2lab = rgb2lab($rgb1);
    $l1 = var_rgb2lab[0];
    $a1 = var_rgb2lab[1];
    $b1 = var_rgb2lab[2];


    var_rgb2lab = rgb2lab($rgb2);
    $l2 = var_rgb2lab[0];
    $a2 = var_rgb2lab[1];
    $b2 = var_rgb2lab[2];

    $avg_lp = ($l1 + $l2) / 2;
    $c1 = Math.sqrt(Math.pow($a1, 2) + Math.pow($b1, 2));
    $c2 = Math.sqrt(Math.pow($a2, 2) + Math.pow($b2, 2));
    $avg_c = ($c1 + $c2) / 2;
    $g = (1 - Math.sqrt(Math.pow($avg_c, 7) / (Math.pow($avg_c, 7) + Math.pow(25, 7)))) / 2;
    $a1p = $a1 * (1 + $g);
    $a2p = $a2 * (1 + $g);
    $c1p = Math.sqrt(Math.pow($a1p, 2) + Math.pow($b1, 2));
    $c2p = Math.sqrt(Math.pow($a2p, 2) + Math.pow($b2, 2));
    $avg_cp = ($c1p + $c2p) / 2;
    $h1p = rad2deg(Math.atan2($b1, $a1p));
    if ($h1p < 0) {
        $h1p += 360;
    }
    $h2p = rad2deg(Math.atan2($b2, $a2p));
    if ($h2p < 0) {
        $h2p += 360;
    }
    $avg_hp = Math.abs($h1p - $h2p) > 180 ? ($h1p + $h2p + 360) / 2 : ($h1p + $h2p) / 2;
    $t = 1 - 0.17 * Math.cos(deg2rad($avg_hp - 30)) + 0.24 * Math.cos(deg2rad(2 * $avg_hp)) + 0.32 * Math.cos(deg2rad(3 * $avg_hp + 6)) - 0.2 * Math.cos(deg2rad(4 * $avg_hp - 63));
    $delta_hp = $h2p - $h1p;
    if (Math.abs($delta_hp) > 180) {
        if ($h2p <= $h1p) {
            $delta_hp += 360;
        } else {
            $delta_hp -= 360;
        }
    }
    $delta_lp = $l2 - $l1;
    $delta_cp = $c2p - $c1p;
    $delta_hp = 2 * Math.sqrt($c1p * $c2p) * Math.sin(deg2rad($delta_hp) / 2);

    $s_l = 1 + ((0.015 * Math.pow($avg_lp - 50, 2)) / Math.sqrt(20 + Math.pow($avg_lp - 50, 2)));
    $s_c = 1 + 0.045 * $avg_cp;
    $s_h = 1 + 0.015 * $avg_cp * $t;

    $delta_ro = 30 * Math.exp(-(Math.pow(($avg_hp - 275) / 25, 2)));
    $r_c = 2 * Math.sqrt(Math.pow($avg_cp, 7) / (Math.pow($avg_cp, 7) + Math.pow(25, 7)));
    $r_t = -$r_c * Math.sin(2 * deg2rad($delta_ro));

    $kl = $kc = $kh = 1;

    $delta_e = Math.sqrt(Math.pow($delta_lp / ($s_l * $kl), 2) + Math.pow($delta_cp / ($s_c * $kc), 2) + Math.pow($delta_hp / ($s_h * $kh), 2) + $r_t * ($delta_cp / ($s_c * $kc)) * ($delta_hp / ($s_h * $kh)));
    return $delta_e;
}

/**
 * Перевод цвета из формата rgb в lab
 *
 * @param {array} $rgb - массив содержащий r,g,b цвета
 * @returns {array} - массив содержащий l,a,b цвета
 */
function rgb2lab($rgb) {
    return xyz2lab(rgb2xyz($rgb));
}

/**
 * Перевод цвета из формата rgb в xyz
 *
 * @param {array} $rgb - массив содержащий r,g,b цвета
 * @returns {array} - массив содержащий x,y,z цвета
 */
function rgb2xyz($rgb) {

    $r = $rgb[0];
    $g = $rgb[1];
    $b = $rgb[2];

    $r = $r <= 0.04045 ? $r / 12.92 : Math.pow(($r + 0.055) / 1.055, 2.4);
    $g = $g <= 0.04045 ? $g / 12.92 : Math.pow(($g + 0.055) / 1.055, 2.4);
    $b = $b <= 0.04045 ? $b / 12.92 : Math.pow(($b + 0.055) / 1.055, 2.4);

    $r *= 100;
    $g *= 100;
    $b *= 100;

    $x = $r * 0.412453 + $g * 0.357580 + $b * 0.180423;
    $y = $r * 0.212671 + $g * 0.715160 + $b * 0.072169;
    $z = $r * 0.019334 + $g * 0.119193 + $b * 0.950227;

    return [$x, $y, $z];
}

/**
 * Перевод цвета из формата xyz в lab
 *
 * @param {array} $xyz - массив содержащий x,y,z цвета
 * @returns {array} - массив содержащий l,a,b цвета
 */
function xyz2lab($xyz) {

    $x = $xyz[0];
    $y = $xyz[1];
    $z = $xyz[2];

    $x /= 95.047;
    $y /= 100;
    $z /= 108.883;

    $x = $x > 0.008856 ? Math.pow($x, 1 / 3) : $x * 7.787 + 16 / 116;
    $y = $y > 0.008856 ? Math.pow($y, 1 / 3) : $y * 7.787 + 16 / 116;
    $z = $z > 0.008856 ? Math.pow($z, 1 / 3) : $z * 7.787 + 16 / 116;

    $l = $y * 116 - 16;
    $a = ($x - $y) * 500;
    $b = ($y - $z) * 200;

    return [$l, $a, $b];
}

/**
 * Функция для нахождения ближайшего цвета к заданному
 *
 * @param {string} dominantColorHEX - цвет в вормате hex которому надо нйати ближайший
 * @returns {string} - ближайший к полученому цвет в вормате hex
 */
function getNearestColor(dominantColorHEX) {

    // если получеый цвет очень тусклый/темный он определяетья как белый/черный
    var bound = {
        white: 230,
        black: 40
    };

    var diff, near, colorRGB,
            diffs = new Array(),
            colorsMain = new Array(),
            dominantColorRGB = hex2rgb(dominantColorHEX);

//    if (dominantColorRGB[0] >= bound.white && dominantColorRGB[1] >= bound.white && dominantColorRGB[2] >= bound.white) {
//        return '#FFFFFF';
//    } else if (dominantColorRGB[0] <= bound.black && dominantColorRGB[1] <= bound.black && dominantColorRGB[2] <= bound.black) {
//        return '#000000';
    //} else {
        for (i = 0; i < colors.length; i++) {
            diff = new Array();
            for (var j in colors[i].palette) {
                colorRGB = hex2rgb(colors[i].palette[j]);
                diff.push(deltaECIE2000(dominantColorRGB, colorRGB));
            }
            near = Math.min.apply(null, diff);

            diffs.push(near);
            colorsMain.push(colors[i].color);
        }
//    }

    var indexNearest = diffs.indexOf(Math.min.apply(null, diffs));

    if (colorsMain[indexNearest] !== undefined) {
        return '#' + colorsMain[indexNearest].toUpperCase();
    } else {
        return null;
    }

}

/**
 * Функция выделяет цвет в списке
 *
 * @param {string} hex - цвет в формате hex
 */
function selectColorByHex(hex) {
    $('select.color-palette option').each(function() {
        $(this).removeAttr('selected');
        if ($(this).data('hex') === hex.toUpperCase()) {
            $(this).attr('selected', 'selected').trigger('change');
        }
    });
}

var icdBtnClick = false; // флаг нажатия кнопки опредения цвета из картинки, нужен для того, чтобы открыть окно выбора цвета после загрузки фото, если его не было а цвет захоели определить

$(function() {

    // test
    $('.detectColor').click(function(e) {
        e.preventDefault();
        $('#test').remove();
        $(this).parent().after('<table id="test"><tr id="firstTr"><td style="min-width:30px;height:30px;" data-hex="#d22233" bgcolor="#d22233">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr></table>')
        for (i = 0; i < 75; i++) {
            bc = Math.floor(Math.random() * 16777215).toString(16);
            if (bc.length === 6) {
                $('#test tr').append('<td data-hex="#' + bc + '" bgcolor="#' + bc + '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>');
            }
        }
        $('#test').append('<tr id="newTr"></tr>');
        $('#test tr#firstTr td').each(function() {
            newBc = getNearestColor($(this).data('hex'));
            $('#test tr#newTr').append('<td style="min-width:30px;height:30px;" data-hex="' + newBc + '" bgcolor="' + newBc + '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>');
        });

    });

    // ширина и высота диалогового окна
    var dWidth = $(window).width() - 200,
            dHeight = $(window).height() - 200;

    // если не нашли кнопку для загрузки главного изображения, то удаляем кнопку для открытия окна выбора цвета из картинки
    if ($('.btn-to-upload-image-to-detect-color').size() === 0) {
        $('.icd-controls').remove();
        console.log('Not found main image! Look in property \'is_main\' for multiupload_image');
    }

    // если изменилось поле, в которое прописываеться автоматически определенный доминирующий цвет, то ищем ему подобный из нашей палитры, и ставим его выбранным
    $('.detected-dominant-color').change(function() {
        // если цвет не был выбран пользователем вручную, то делаем выбраный ближайшиый к доминирующему
        if (parseInt($('.is-color-selected-by-user').val()) !== 1) {
            var hex = $(this).val();
            if (hex !== undefined) {
                var opt = $('select.color-palette option:selected');
                var nearestColor = getNearestColor(hex);
                selectColorByHex(nearestColor);
                // выводим сообщение если цвет был изменен
                if (opt.data('hex') !== nearestColor) {
                    ajaxAlertResult({info: ['Цвет был изменен на "' + $('select.color-palette option:selected').text() + '"!']}, 'main', $('.image-to-detect-color').closest('div.field-container'));
                }
            }
        }
    });

    // вуделение текста при клике в текстовых полях, где записан hex, в окне выбора цвета
    $('.icd-text-hex').bind('click', function() {
        $(this).select();
    });

    // показ выбранного цвета в квадратике после списка
    var selectedColor = $('select.color-palette option:selected').data('hex');
    $('.selected-color-preview').css('background', selectedColor !== undefined ? selectedColor : '');
    $('select.color-palette').change(function() {
        if ($('select.color-palette option:selected').data('hex') !== undefined) {
            $('.selected-color-preview').css('background', $('select.color-palette option:selected').data('hex'));
        } else {
            $('.selected-color-preview').css('background', '');
        }

    });


    //
    $('.icd-btn-click-color').click(function(e) {
        e.preventDefault();

        // устанавливаем выбранный цвет (текст, превью и название), в окно выбора цвета
        var opt = $('select.color-palette option:selected');
        if (opt === undefined) {
            opt = $('select.color-palette option:first');
        }

        $('.icd-selected-color').css('background', opt.data('hex'));
        $('.icd-selected-text-hex').val(opt.data('hex'));
        $('.icd-click-color').css('background', '#FFFFFF');
        $('.icd-color-name').text(opt.text());

        // если уже инициализировали canvas вместо img, то заменяем canvas на img, (сбрасываем на начальное состояние)
        if ($('.icd-canvas').size()) {
            $('.icd-canvas').replaceWith($('<img />').attr('class', 'icd-img'));
        }

        // получаем путь к изображению, если не находим, просим юзера загрузить главную картинку
        if ($('.image-to-detect-color:first').attr('href') === undefined && imageMainInBase64 === undefined) {
            icdBtnClick = true;
            $('.btn-to-upload-image-to-detect-color').trigger('click');
        } else {
            var image = new Image();
            image.src = imageMainInBase64 ? imageMainInBase64 : $('.image-to-detect-color:first').attr('href');
            image.onload = function() {

                // вешаем на картинку обработчик выбора цвета по клику
                $('img.icd-img').attr('src', image.src).canvas().click(function(e) {
                    var rgb = e.rgb(),
                            hex = rgb2hex(rgb[0], rgb[1], rgb[2]),
                            nearestColor = getNearestColor(hex);

                    $('.icd-click-color').css('background', hex);
                    $('.icd-click-text-hex').val(hex.toUpperCase());
                    $('.icd-selected-color').css('background', nearestColor);
                    $('.icd-click-ok').data('hex', nearestColor);

                    $('select.color-palette option').each(function() {
                        if ($(this).data('hex') === nearestColor) {
                            $('.icd-selected-text-hex').val($(this).data('hex'));
                            $('.icd-color-name').text($(this).text());
                        }
                    });

                });
                $('.image-color-detect-container').dialog('open');
            };
        }
    });

    // нажатие на OK в окне, выбираем в списке полученый цвет и ставим флаг что цвет выбрал пользователь
    $('.icd-click-ok').click(function() {
        selectColorByHex($(this).data('hex'));
        $('.image-color-detect-container').dialog('close');
        $('.is-color-selected-by-user').val(1);
    });

    // если цвет выбрали из списка ставим флаг что цвет выбрал пользователь
    $('.color-palette').on("select2-selecting", function(e) {
        $('.is-color-selected-by-user').val(1);
    });

    // Инициализация окна-контейнера для помешения картинки
    $('.image-color-detect-container').dialog({
        modal: true,
        width: 'auto', //width: dWidth,
        height: 'auto', //height: dHeight,
        autoOpen: false,
        show: {
            effect: "fade",
            duration: 300
        },
        hide: {
            effect: "fade",
            duration: 300
        },
        position: "center",
        open: function(event, ui) {
            $('.ui-dialog').css({position: 'fixed', top: 100});
        }
    });

    // нажатие на Cancel в окне, закрываем окно
    $('.icd-click-cancel').click(function() {
        $('.image-color-detect-container').dialog('close');
    });

    /******** Определение цвета из картинки ********/
    $.fn.canvas = function(f) {
        return this.map(function() {
            if (this.nodeName === "IMG") {
                var canvas = $('<canvas>')
                this.src = this.src; // IE fix
                if (this.width > dWidth - 440) {
                    var wCanvas = dWidth - 440;
                    var hCanvas = Math.floor(this.height * (dWidth - 440) / this.width);
                }
                if (this.height + 100 > dHeight - 150) {
                    var hCanvas = dHeight - 150;
                    var wCanvas = Math.floor(this.width * (dHeight - 150) / this.height);
                } else {
                    var wCanvas = this.width;
                    var hCanvas = this.height;
                }

                canvas.attr({width: wCanvas, height: hCanvas, class: 'icd-canvas'});
                canvas[0].getContext('2d').drawImage(this, 0, 0, wCanvas, hCanvas);
                $(this).replaceWith(canvas);
                return canvas[0];
            } else {
                return this;
            }
        });
    };
    jQuery.Event.prototype.rgb = function() {
        var x = this.offsetX || (this.pageX - $(this.target).offset().left),
                y = this.offsetY || (this.pageY - $(this.target).offset().top);
        if (this.target.nodeName !== "CANVAS")
            return null;
        return this.target.getContext('2d').getImageData(x, y, 1, 1).data;
    };

});