/**
 * Бизнес логика серверной части
 */
//инициализация приложения
var TIMER_ID,
    START_DATE_TIME

exports.initialization = function (MYSQL) {

    //устанавливаем соединение
    mysqlConnect(MYSQL, 0);

    //загружаем из базы все данные
    mysqlGetSites(false);
    mysqlGetSections(false);
    mysqlGetPlacements(false);
    mysqlGetBanners(false);
    mysqlGetPlacementBanners(false);
    mysqlGetPlacementsMatchSections(false);
    mysqlGetAdPlaces(false);
    mysqlGetAdCompanies(false);
    mysqlGetUsers(false);
    mysqlGetCountries(false);
    mysqlGetAdCompanyMatchCountries(false);
    mysqlGetPlaceMatchCountries(false);
    mysqlGetStatistics();
    mysqlGetPriceModel();

    //берем текущее время
    var now = new Date();
    START_DATE_TIME = DATE_FORMAT(now, "yyyy-mm-dd HH:MM:ss");

    TIMER_ID = setInterval(this.saveStatistics, 1*60000);   // раз в 1 минуту
    //TIMER_ID = setInterval(this.saveStatistics, 5*60000);   // раз в 5 минут

}

/**
 * Ответ на все запросы клиента
 * @param res - объект ответа
 * @param options - данные ответа, которые нужно передать в res
 */
exports.sendResponse = function (res, options) {
    //строчки ниже нужны для того, чтобы браузер клиента мог посылать кроссдоменные запросы
    res.header("Access-Control-Allow-Origin", "*")
        .header("Access-Control-Allow-Headers", "X-Requested-With")
        .status(options.statusCode)
        .send(options.body);
}

/**
 * Отдаёт рекламный баннер, если он найден
 * @param req
 * @param res
 * @param adplace_id
 */
exports.getAd = function (req, res, adplace_id) {

    //console.log(req.headers('host'));

    if (typeof(req.header('Referer')) !== 'undefined') {
        //if (typeof(req.get('origin') !== 'undefined')) {

        var refererInfo = URL.parse(req.header('Referer'));
        //var refererInfo = URL.parse(req.get('origin')),
            //domain = refererInfo.protocol + '//' + refererInfo.hostname;

        //вырезаем www.
        if (refererInfo.hostname.indexOf('www.')===0) {
            var domain =  refererInfo.hostname.replace('www.', '');
        }
        else {
            var domain =  refererInfo.hostname;
        }

        console.log('referer domain='+domain)

        //проверяем, чтоб домен рефера совпадал с тем, что у нас прописан в базе. Иначе возможна накрутка показов с других площадок
        if (typeof(SD.adplaces['_' + adplace_id]) !== 'undefined' && SD.sites['_' + SD.adplaces['_' + adplace_id].site_id].domain == domain) {
            if (SD.placementsByAdPlace['_' + adplace_id]) {  //если есть размещения

                //если заданы разделы проверяем, чтоб раздел совпадал
                if (SD.placementsMatchSections['_' + adplace_id]) {

                   var isAllowed = false;    //если задан хоть один раздел
                    //перебираем все разделы
                        for (key in SD.placementsMatchSections['_' + adplace_id]) {
                            var placementsMatchSection=SD.placementsMatchSections['_' + adplace_id][key],
                             section = SD.sections['_'+placementsMatchSection.section_id];

                        //проверка по регулярному выражению, регулярка на этапе сохранения должна быть проверена и без ошибок,
                        //иначе сервер станет
                        if (section.isRegExpInUrlTemplate) {
                            var regex = new RegExp(section.urlTemplate);
                            regexResult = regex.test(refererInfo.path);
                            if (regexResult) {
                                isAllowed = true;
                                break;
                            }

                        }
                        //проверка по простому совпадению
                        else {
                            var result = refererInfo.path.indexOf(section.urlTemplate);
                            if (result === 0) {    //совпадать должно с первого символа
                                isAllowed = true;
                                break;
                            }
                        }
                    }
                }
                else {
                    var isAllowed = true;
                }


                if (isAllowed) {
                    var ip = this.getIpFromReq(req);
                    if (ip == '127.0.0.1') {  //для теста на локальном
                        var ip = '92.112.66.58';
                    }
                    console.log('referer ip='+ip)

                    //перебираем все размещения и проверяем их по дате
                    for (key in SD.placementsByAdPlace['_' + adplace_id]) {
                        var placement = SD.placementsByAdPlace['_' + adplace_id][key];


                        //проверяем, чтоб количество показов не привысило максимально-заданное
                        if ((typeof(STplacements['_' + placement.id]) === 'undefined' || !placement.quantity ||
                            STplacements['_' + placement.id][placement.quantityModelName] < placement.quantity)) {


                            console.log('in loop');

                            //проверяем рекламную компанию по дате
                            var checkByDateRes = this.checkByDate(SD.adcompanies['_' + placement.adCompany_id].startDateTime,
                                    SD.adcompanies['_' + placement.adCompany_id].finishDateTime),
                            //проверяет по странам/регионам
                                checkByGeoRes = this.checkByGeo(ip, SD.adCompanyMatchCountries, '_' + SD.adcompanies['_' + placement.adCompany_id].id);

                            console.log('checkByGeoRes='+checkByGeoRes);

                            if (checkByDateRes && checkByGeoRes && SD.adcompanies['_' + placement.adCompany_id].isEnabled) {  //если для компании все ок, идем дальше
                                checkByDateRes = this.checkByDate(placement.startDateTime, placement.finishDateTime),
                                    checkByGeoRes = this.checkByGeo(ip, SD.adPlaceMatchCountries, '_' + placement.id);

                                console.log('checkByGeoRes='+checkByGeoRes);
                                console.log('checkByDateRes='+checkByDateRes);


                                if (checkByDateRes && checkByGeoRes && placement.isEnabled) {  //подходит и размещение
                                    console.log(placement);
                                    break;
                                }
                                else {
                                    placement = false;
                                }
                            }
                            else {
                                placement = false;
                            }
                        }
                        else {
                            placement = false;
                        }
                    }



                    if (placement && typeof SD.placementbannersByPlacement['_' + placement.id] !== 'undefined') { //если есть размещение с баннерами
                        /**
                         Определяем по параметрам баннера, какой баннер нужно отобразить
                         */
                        var placementBanner, index = 0;

                        for (key in SD.placementbannersByPlacement['_' + placement.id]) {

                            var preoritet = SD.placementbannersByPlacement['_' + placement.id][key].preoritet;

                            //инициализация массива
                            if (typeof SD.placementbannersByPlacementPrioritets['_' + placement.id] === 'undefined') {
                                SD.placementbannersByPlacementPrioritets['_' + placement.id] = {
                                    quantity: 0,
                                    index: index
                                };
                            }

                            if (SD.placementbannersByPlacementPrioritets['_' + placement.id].index == index) {

                                SD.placementbannersByPlacementPrioritets['_' + placement.id].quantity++;

                                if (SD.placementbannersByPlacementPrioritets['_' + placement.id].quantity <= preoritet || !preoritet) {
                                    placementBanner = SD.placementbannersByPlacement['_' + placement.id][key];

                                    //сдвигаем на следующий баннер
                                    if (SD.placementbannersByPlacementPrioritets['_' + placement.id].quantity >= preoritet) {
                                        if (index + 1 < this.getObjectCount(SD.placementbannersByPlacement['_' + placement.id])) {
                                            var nextKey = index + 1;
                                        }
                                        else {
                                            var nextKey = 0;
                                        }

                                        SD.placementbannersByPlacementPrioritets['_' + placement.id] = {
                                            quantity: 0,
                                            index: nextKey
                                        }
                                    }
                                }

                                break;
                            }
                            index++;
                        }

                        var banner = SD.banners['_' + placementBanner.banner_id];
                        // отдаём баннер
                        this.sendBanner(res, banner, placement, placementBanner);

                        //обновляем статистику
                        this.updateShowsStatistics(req, SD.adplaces['_' + adplace_id], placement, placementBanner, banner);
                    }
                    else {

                        //проверяем есть ли заглушка для рекламного места
                        if (SD.adplaces['_' + adplace_id].gag_id) {
                            var banner = SD.banners['_' + SD.adplaces['_' + adplace_id].gag_id];
                            this.sendBanner(res, banner, {id: 0}, {id: 0});
                        }
                        else {
                            //отдаём пустой ответ
                            this.sendResponse(res, {statusCode: 200, body: {}});
                        }
                    }
                }
                else {

                    //проверяем есть ли заглушка для рекламного места
                    if (SD.adplaces['_' + adplace_id].gag_id) {
                        var banner = SD.banners['_' + SD.adplaces['_' + adplace_id].gag_id];
                        this.sendBanner(res, banner, {id: 0}, {id: 0});
                    } else {
                        //отдаём пустой ответ
                        this.sendResponse(res, {statusCode: 200, body: {}});
                    }
                }
            }
            else {
                var msgError = "Placement is not finded.";
                //отдаём ошибку
                this.sendResponse(res, {statusCode: 400, body: msgError})
            }

        }
        else {
            if (typeof(SD.adplaces['_' + adplace_id]) === 'undefined') {
                var msgError = "Wrong parameter adplace_id.";
            }
            else {
                var msgError = "Wrong refer hostname. Need " + SD.sites['_' + SD.adplaces['_' + adplace_id].site_id].domain + ", but get " + domain;
            }


            //отдаём ошибку
            this.sendResponse(res, {statusCode: 400, body: msgError})
        }
    }
    else {
        var msgError = "Referer is undefined";
        //отдаём ошибку
        this.sendResponse(res, {statusCode: 400, body: msgError})
    }
}


exports.getObjectCount = function (obj) {

    var count = 0,
        i;
    for (i in obj) {
        if (obj.hasOwnProperty(i)) {
            count++;
        }
    }
    return count;
}


/**
 * Обработка клика по баннеру
 * @param req
 * @param res
 * @param adplace_id
 * @param placement_id
 * @param banner_id
 */
exports.click = function (req, res, adplace_id, placement_id, placementbanner_id, banner_id) {

    this.updateClicksStatistics(req, SD.adplaces['_' + adplace_id], SD.placements['_' + placement_id], SD.placementbanners['_' + placementbanner_id], SD.banners['_' + banner_id]);

    var banner = SD.banners['_' + banner_id];
    res.redirect(banner.url);   //перенаправляем пользователя на ресурс рекламодателя

}

//проверяет по странам
exports.checkByGeo = function (ip, countryMatch, key) {
    if (typeof(countryMatch[key]) !== 'undefined') {

        var geo = GEOIP.lookup(ip),
            country_id = SD.countriesByAlpha2[geo.country].id;

        //если есть страна в связях
        if (countryMatch[key]['_' + country_id]) {

            var isAllowed = true;
        }
        else {
            var isAllowed = false;
        }
    }
    else {
        var isAllowed = true;
    }

    return isAllowed;
}


//проверяет по датам начала и окончания
exports.checkByDate = function (startDateTime, finishDateTime) {
    var currentSeconds = new Date().getTime() / 1000;   //текущее время начиная с эпохи Unix time

    //если для баннера размещения заданы одна из дат, значит берем его
    if (startDateTime || finishDateTime) {
        var startDate = false,
            endDate = false;

        if (!startDateTime ||
            currentSeconds > startDateTime) {
            var startDate = true;
        }

        if (!finishDateTime ||
            currentSeconds < finishDateTime) {
            var endDate = true;
        }

        //если найден подходящий баннер по дате
        if (startDate && endDate) {
            var isAllowed = 1;
        }
        else {
            var isAllowed = 0;
        }

    }
    else {
        var isAllowed = 2;  //нужно проверить вышестоящие условия таргетинга
    }
    //console.log(isAllowed)
    return isAllowed;
}


//отдает баннер
exports.sendBanner = function (res, banner, placement, placementBanner) {
    //берем полный путь для баннера
    if (banner.dtype == 'ImageBanner') {
        var source = banner.image_src,
            width = banner.image_width,
            height = banner.image_height,
            url = banner.url;
    }
    else if (banner.dtype == 'FlashBanner') {
        var source = banner.file_src,
            width = banner.file_width,
            height = banner.file_height,
            url = banner.url;
    }
    else if (banner.dtype == 'CodeBanner') {
        var source = banner.code,
            url = false;
    }

    var body = {
        placement_id: placement.id,
        banner_id: banner.id,
        placementbanner_id: placementBanner.id,
        type: banner.dtype,
        width: width,
        height: height,
        source: source,
        isOpenUrlInNewWindow: banner.isOpenUrlInNewWindow,
        url: url
    }
    //отдаём ссылку на баннер
    this.sendResponse(res, {statusCode: 200, body: body});
}


//обновляет статистику кликов
exports.updateClicksStatistics = function (req, adPlace, placement, placementBanner, banner) {

    this.checkST(adPlace, placement, placementBanner, banner);

    ST['_' + adPlace.id]['_' + placement.id]['_' + placementBanner.id]['_' + banner.id].clicksQuantity++; //количество кликов с разбивкой

    //общее количество кликов для размещения
    STplacements['_' + placement.id].clicksQuantity++;
}

//обновляет статистику показов
exports.updateShowsStatistics = function (req, adPlace, placement, placementBanner, banner) {
    this.checkST(adPlace, placement, placementBanner, banner);
    ST['_' + adPlace.id]['_' + placement.id]['_' + placementBanner.id]['_' + banner.id].showsQuantity++;  //количество показов с разбивкой

    //общее количество показов для размещения
    STplacements['_' + placement.id].showsQuantity++;

}

//проверяет инициализацию статистических объектов
exports.checkST = function (adPlace, placement, placementBanner, banner) {

    if (!STplacements) {
        STplacements = {};
    }

    //полное количество по всем баннерам
    if (!STplacements['_' + placement.id]) {
        if (typeof SD.statistics['_' + adPlace.id] !== 'undefined' && typeof SD.statistics['_' + adPlace.id]['_' + placement.id] !== 'undefined') {
            var showsQuantity = SD.statistics['_' + adPlace.id]['_' + placement.id].showsQuantity,
                clicksQuantity = SD.statistics['_' + adPlace.id]['_' + placement.id].clicksQuantity;
        }
        else {
            var showsQuantity = 0,
                clicksQuantity = 0;
        }

        STplacements['_' + placement.id] = {
            showsQuantity: showsQuantity,
            clicksQuantity: clicksQuantity
        };
    }


    if (!ST['_' + adPlace.id]) {
        ST['_' + adPlace.id] = {};
    }

    if (!ST['_' + adPlace.id]['_' + placement.id]) {
        ST['_' + adPlace.id]['_' + placement.id] = {};
    }

    if (!ST['_' + adPlace.id]['_' + placement.id]['_' + placementBanner.id]) {
        ST['_' + adPlace.id]['_' + placement.id]['_' + placementBanner.id] = {};
    }

    if (!ST['_' + adPlace.id]['_' + placement.id]['_' + placementBanner.id]['_' + banner.id]) {
        ST['_' + adPlace.id]['_' + placement.id]['_' + placementBanner.id]['_' + banner.id] = {
            showsQuantity: 0,
            clicksQuantity: 0
        };
    }
}

/**
 * Сохраняет всю статистику
 */
exports.saveStatistics = function () {

    var stats = [],
        STclone = CLONE(ST),
        now = new Date(),
        finishDateTime = DATE_FORMAT(now, "yyyy-mm-dd HH:MM:ss");

    ST = {};//очищаем сразу статистику, чтобы можно было писать опять

    for (var adplace_id in STclone) {
        for (var placement_id in STclone[adplace_id]) {
console.log(SD.placements[placement_id])
            for (var placement_banner_id in STclone[adplace_id][placement_id]) {
                for (var banner_id in STclone[adplace_id][placement_id][placement_banner_id]) {
                    stats.push({
                        showsQuantity: STclone[adplace_id][placement_id][placement_banner_id][banner_id].showsQuantity,
                        clicksQuantity: STclone[adplace_id][placement_id][placement_banner_id][banner_id].clicksQuantity,
                        site_id: SD.adplaces[adplace_id].site_id,
                        adplace_id: SD.adplaces[adplace_id].id,
                        placement_id: SD.placements[placement_id].id,
                        //placement_banner_id: SD.placementbanners[placement_banner_id].id,
                        banner_id: SD.banners[banner_id].id,
                        finishDateTime: finishDateTime,
                        startDateTime: START_DATE_TIME
                    });
                }
            }
        }
    }
    console.log(stats)
    START_DATE_TIME = finishDateTime;
    mysqlInsertStatistics(stats);  //пишем в базу

//  clearTimeout(TIMER_ID)
}


//
//}

//получает IP из запроса
exports.getIpFromReq = function (req) {
    return req.headers['x-forwarded-for'] || req.connection.remoteAddress;
}

/**
 * Принудительно обновляет данные из базы в память
 * @param req
 * @param res
 * @param id    - id
 * @param entityName  - имя сущности
 */
exports.refresh = function (req, res) {

    if (req.body.tableName == 'core_site') {
        if (req.body.type == 'delete') {
            mysqlDeleteSites(req.body.id);
        }
        else {
            mysqlGetSites(req.body.id);
        }
    }
    else if (req.body.tableName == 'core_site_section') {
        if (req.body.type == 'delete') {
            mysqlDeleteSections(req.body.id);
        }
        else {
            mysqlGetSections(req.body.id);
        }
    }
    else if (req.body.tableName == 'core_site_section_match_ad_place') {
        if (req.body.type == 'delete') {
            mysqlDeletePlacementsMatchSections(req.body.extraFields.adplace_id, req.body.extraFields.section_id);
        }
        else {
            mysqlGetPlacementsMatchSections(req.body.extraFields.adplace_id, req.body.extraFields.section_id);
        }
    }
    else if (req.body.tableName == 'core_ad_company_match_country') {
        if (req.body.type == 'delete') {
            mysqlAdCompanyMatchCountries(req.body.extraFields.adcompany_id, req.body.extraFields.country_id);
        }
        else {
            mysqlGetAdCompanyMatchCountries(req.body.extraFields.adcompany_id, req.body.extraFields.country_id);
        }
    }
    else if (req.body.tableName == 'core_ad_company_placement_match_country') {
        if (req.body.type == 'delete') {
            mysqlDeletePlaceMatchCountries(req.body.extraFields.placement_id, req.body.extraFields.country_id);
        }
        else {
            mysqlGetPlaceMatchCountries(req.body.extraFields.placement_id, req.body.extraFields.country_id);
        }
    }
    else if (req.body.tableName == 'core_adcompany_placement') {
        if (req.body.type == 'delete') {
            mysqlDeletePlacements(req.body.id);
        }
        else {
            mysqlGetPlacements(req.body.id);
        }
    }
    else if (req.body.tableName == 'core_banner_common') {
        if (req.body.type == 'delete') {
            mysqlDeleteBanners(req.body.id);
        }
        else {
            mysqlGetBanners(req.body.id);
        }
    }
    else if (req.body.tableName == 'core_adcompany_placement_banner') {
        if (req.body.type == 'delete') {
            mysqlDeletePlacementBanners(req.body.id);
        }
        else {
            mysqlGetPlacementBanners(req.body.id);
        }
    }
    else if (req.body.tableName == 'core_site_ad_place') {
        if (req.body.type == 'delete') {
            mysqlDeleteAdPlaces(req.body.id);
        }
        else {
            mysqlGetAdPlaces(req.body.id);
        }
    }
    else if (req.body.tableName == 'core_adcompany') {
        if (req.body.type == 'delete') {
            mysqlDeleteAdCompanies(req.body.id);
        }
        else {
            mysqlGetAdCompanies(req.body.id);
        }
    }

    else if (req.body.tableName == 'fos_user_user') {
        if (req.body.type == 'delete') {
            mysqlDeleteUsers(req.body.id);
        }
        else {
            mysqlGetUsers(req.body.id);
        }
    }

    this.sendResponse(res, {statusCode: 200, body: {res:'ok'}});

    console.log("Данные  обновлены:");
    console.log(req.body);

}
