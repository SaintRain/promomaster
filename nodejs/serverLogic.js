/**
 * Бизнес логика серверной части
 */
//инициализация приложения
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

    if (typeof(req.header('Referer')) !== 'undefined') {
        var refererInfo = URL.parse(req.header('Referer')),
            domain = refererInfo.protocol + '//' + refererInfo.hostname;

        //проверяем, чтоб домен рефера совпадал с тем, что у нас прописан в базе. Иначе возможна накрутка показов с других площадок
        if (typeof(SD.adplaces['_' + adplace_id]) !== 'undefined' && SD.sites['_' + SD.adplaces['_' + adplace_id].site_id].domain == domain) {

            if (SD.placementsByAdPlace['_' + adplace_id]) {  //если есть размещения

                //если заданы разделы проверяем, чтоб раздел совпадал
                if (SD.placementsMatchSections['_' + adplace_id]) {

                    var isAllowed = false;    //если задан хоть один раздел

                    //перебираем все разделы
                    SD.placementsMatchSections['_' + adplace_id].forEach(function (placementsMatchSection) {
                        var section = SD.sections[placementsMatchSection.section_id];

                        //проверка по регулярному выражению, регулярка на этапе сохранения должна быть проверена и без ошибок,
                        //иначе сервер станет
                        if (section.isRegExpInUrlTemplate) {
                            var regex = new RegExp(section.urlTemplate);
                            regexResult = regex.test(refererInfo.path);
                            if (regexResult) {
                                isAllowed = true;
                                return true;
                            }

                        }
                        //проверка по простому совпадению
                        else {
                            var result = refererInfo.path.indexOf(section.urlTemplate);
                            if (result === 0) {    //совпадать должно с первого символа
                                isAllowed = true;
                                return true;
                            }
                        }
                    })
                }
                else {
                    var isAllowed = true;
                }


                if (isAllowed) {
                    //var ip = this.getIpFromReq(req);
                    var ip = '176.114.35.119';


                    //перебираем все размещения и проверяем их по дате
                    for (key in SD.placementsByAdPlace['_' + adplace_id]) {
                        var placement = SD.placementsByAdPlace['_' + adplace_id][key];

                        //проверяем рекламную компанию по дате
                        var checkByDateRes = this.checkByDate(SD.adcompanies['_' + placement.adCompany_id].startDateTime,
                                SD.adcompanies['_' + placement.adCompany_id].finishDateTime),
                        //проверяет по странам/регионам
                            checkByGeoRes = this.checkByGeo(ip, SD.adCompanyMatchCountries, '_' + SD.adcompanies['_' + placement.adCompany_id].id);
                        if (checkByDateRes && checkByGeoRes && SD.adcompanies['_' + placement.adCompany_id].isEnabled) {  //если для компании все ок, идем дальше
                            checkByDateRes = this.checkByDate(placement.startDateTime, placement.finishDateTime),
                                checkByGeoRes = this.checkByGeo(ip, SD.adPlaceMatchCountries, '_' + placement.id);

                            if (checkByDateRes && checkByGeoRes && placement.isEnabled) {  //подходит и размещение
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


                    if (placement) {
                        /**
                         Пока берем просто первый баннер. Но нужно сделать:
                         1. Определяем по параметрам баннера, какой баннер нужно отобразить
                         */
                        var placementBanner;
                        for (key in SD.placementbannersByPlacement['_' + placement.id]) {
                            placementBanner = SD.placementbannersByPlacement['_' + placement.id][key];
                        }
                        var banner = SD.banners['_' + placementBanner.banner_id];

                        // отдаём баннер
                        this.sendBanner(res, banner);

                        //обновляем статистику
                        this.updateStatistics(req, placement);
                    }
                    else {
                        //проверяем есть ли заглушка для рекламного места
                        //....

                    }
                }
                else {
                    //проверяем есть ли заглушка для рекламного места
                    //....

                }


            }
            else {
                var msgError = "Placement is not finded.";
                //отдаём ошибку
                this.sendResponse(res, {statusCode: 400, body: msgError})
            }

        }
        else {

            if (typeof(SD.adplaces[adplace_id]) !== 'undefined') {
                var msgError = "Wrong refer hostname. Need " + SD.adplaces[adplace_id]['site']['domain'] + ", but get " + domain;
            }
            else {
                var msgError = "Wrong parameter adplace_id.";
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
    var currentSeconds = new Date().getTime() / 1000;   //ntкущее время начиная с эпохи Unix time
    //console.log('currentSeconds='+currentSeconds)
    //console.log(startDateTime)
    //console.log(finishDateTime)

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
exports.sendBanner = function (res, banner) {
    //берем полный путь для баннера
    if (banner.dtype == 'ImageBanner') {
        var source = banner.image_src,
            width = banner.image_width,
            height = banner.image_height;
    }
    else if (banner.dtype == 'FlashBanner') {
        var source = banner.file_src,
            width = banner.file_width,
            height = banner.file_height;
    }
    else if (banner.dtype == 'CodeBanner') {
        var source = banner.code;
    }

    var body = {
        type: banner.dtype,
        width: width,
        height: height,
        source: source,
        isOpenUrlInNewWindow: banner.isOpenUrlInNewWindow,
        url: banner.url
    }
    //отдаём ссылку на баннер
    this.sendResponse(res, {statusCode: 200, body: body});
}

//обновляет статистику
exports.updateStatistics = function (req, placement) {

    if (!ST.placements['_' + placement.id]) {
        ST.placements['_' + placement.id] = {
            showsQuantity: 0
        };
    }

    ST.placements['_' + placement.id].showsQuantity++; //общее количество показов для размещения

    //var ip = this.getIpFromReq(req);
    //var geo = GEOIP.lookup(ip);
    console.log(ST.placements);
}

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

    this.sendResponse(res, {statusCode: 200, body: 'ok'});

    console.log("Данные  обновлены:");
    console.log(req.body);

}
