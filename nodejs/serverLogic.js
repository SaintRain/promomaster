/**
 * Бизнес логика серверной части
 */



//инициализация приложения
exports.initialization = function (MYSQL) {

    //устанавливаем соединение
    mysqlConnect(MYSQL, 0);

    //загружаем из базы все данные
    mysqlGetInitializationData(false);

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

    var refererInfo = URL.parse(req.header('Referer')),
        domain = refererInfo.protocol + '//' + refererInfo.hostname;

    //проверяем, чтоб домен рефера совпадал с тем, что у нас прописан в базе. Иначе возможна накрутка показов с других площадок
    if (typeof(SERVICE_DATA.adplaces['_'+adplace_id]['isSiteByDomain'][domain]) !== 'undefined') {


        if (SERVICE_DATA.adplaces['_'+adplace_id]['placements']) {  //если есть размещения


            //если заданы разделы проверяем, чтоб раздел совпадал
            if (SERVICE_DATA.adplaces['_'+adplace_id]['sections']) {
                //  console.log(refererInfo);
                var isAllowed = false;    //если задан хоть один раздел

                //перебираем все разделы
                SERVICE_DATA.adplaces['_'+adplace_id]['sections'].forEach(function (section) {

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
                /**
                 Пока берем просто первое размещение. Но нужно сделать:
                 1. Определяем по параметрам размещения, какое нужно использовать
                 */
                var placement = SERVICE_DATA.adplaces['_'+adplace_id]['placements'][0];

                /**
                 Пока берем просто первый баннер. Но нужно сделать:
                 1. Определяем по параметрам баннера, какой баннер нужно отобразить
                 */
                var placementBanner = placement.placementBanners[0];
                var banner = placementBanner.banner;

                //  console.log(banner);

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

        if (typeof(SERVICE_DATA.adplaces[adplace_id]) !== 'undefined') {
            var msgError = "Wrong refer hostname. Need " + SERVICE_DATA.adplaces[adplace_id]['site']['domain'] + ", but get " + domain;
        }
        else {
            var msgError = "Wrong parameter adplace_id.";
        }
        //отдаём ошибку
        this.sendResponse(res, {statusCode: 400, body: msgError})
    }
}


/**
 * Принудительно обновляет данные из базы в память
 * @param req
 * @param res
 * @param id    - id
 * @param entityName  - имя сущности
 */
exports.refresh = function (req, res, id, entityName) {
    if (entityName == 'WebSite' || entityName == 'SoftSite') {
        mysqlGetInitializationData({site_id: id});
    }
    else if (entityName == 'Section') {
        mysqlGetInitializationData({section_id: id});
    }
    else if (entityName == 'Placement') {
        mysqlGetInitializationData({placement_id: id});
    }
    else if (entityName == 'FlashBanner' || entityName == 'ImageBanner' || entityName == 'CodeBanner') {
        mysqlGetInitializationData({banner_id: id});
    }
    else if (entityName == 'PlacementBanner') {
        mysqlGetInitializationData({placement_banner_id: id});
    }
    else if (entityName == 'AdPlace') {
        mysqlGetInitializationData({ad_place_id: id});
    }


    this.sendResponse(res, {statusCode: 200, body: 'ok'});

    console.log("Данные " + entityName + "=" + id + " обновлены.");

}
