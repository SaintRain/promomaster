
/**
 * Переключатель языка в формах редактирования
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

jQuery(document).ready(function($) {

    //кликаем повторно на кнопку переключения, если был ajax-запрос
    $(document).ajaxStop(function() {
        languageSwitcher.needFixActiveLanguageInSession = false;
        $.clickActiveLangSwitchButton();
    });

    $("body button.langSwitch").live('click', function(event) {

        var oldActiveLang = languageSwitcher.activeLang;
        languageSwitcher.activeLang = $(this).attr('data-lang');
        $(this).parent().find('.btn-info').removeClass('btn-info');
        $(this).addClass('btn-info');

        //фиксируем в сессии
        if (languageSwitcher.needFixActiveLanguageInSession && oldActiveLang != languageSwitcher.activeLang) {
            var switch_language_url = languageSwitcher.switch_language_url;
            switch_language_url = switch_language_url.substr(0, switch_language_url.length - 2) + languageSwitcher.activeLang;
            $.get(switch_language_url, function(data) {
            });
        }
        languageSwitcher.needFixActiveLanguageInSession = true;

        $.showHideLanguegesFields(languageSwitcher.activeLang, this);

    });

    //отображает, прячет языковые поля
    $.showHideLanguegesFields = function(activeLang, environment) {
        var container = $(environment).parents('div.content');
        var fieldsLangs = container.find('[class *= ' + languageSwitcher.classId + ']').each(function() {
            var id = $(this).attr('id'),
                    lang = $(this).attr('class').substr(-2);
            if (lang === activeLang) {
                $.showHideParentContainer('show', id);
            }
            else {
                $.showHideParentContainer('hide', id);
            }
        });
    }

    $.showHideParentContainer = function(operation, id) {
        var cell = $('#' + id).parent(),
                table = cell.parents('table'),
                cellIndex = cell.index() + 1;

        if (cell.is("td")) {
            if (operation === 'show') {
                table.find('th:nth-child(' + cellIndex + ')').show();
                table.find('td:nth-child(' + cellIndex + ')').show();
            }
            else {
                table.find('th:nth-child(' + cellIndex + ')').hide();
                table.find('td:nth-child(' + cellIndex + ')').hide();
            }
        }
        else {
            //пытаемся найти родительский элемент
            if (typeof $('#sonata-ba-field-container-' + id).attr('id') !== 'undefined') {
                var $obj = $('#sonata-ba-field-container-' + id);
            }
            else {              
                var $obj = $('#' + id).parents('.control-group[id*=sonata-ba-field-container]').first();
            }

            if (operation === 'show') {
                $obj.show();
            }
            else {
                $obj.hide();
            }
        }
    }

    //кликаем на кнопку программно
    $.clickActiveLangSwitchButton = function() {
        $('body button.langSwitch[data-lang="' + languageSwitcher.activeLang + '"]').click();
    }

    $.clickActiveLangSwitchButton();
});


