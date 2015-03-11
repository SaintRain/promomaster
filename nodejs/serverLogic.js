/**
 * Бизнес логика серверной части
 */



//инициализация приложения
exports.initialization = function (MYSQL) {

    //устанавливаем соединение
    mysqlConnect(MYSQL, 0);

    //загружаем из базы все данные
    mysqlGetInitializationData();

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

    var refererInfo=URL.parse(req.header('Referer')),
        domain=refererInfo.protocol+'//'+refererInfo.hostname;

    //проверяем, чтоб домен рефера совпадал с тем, что у нас прописан в базе. Иначе возможна накрутка показов с других площадок
    if (typeof(SERVICE_DATA.adplaces[adplace_id]['isSiteByDomain'][domain]) !== 'undefined') {
        console.log(SERVICE_DATA.adplaces[adplace_id]['placement']);
        if (SERVICE_DATA.adplaces[adplace_id]['placement']['banners']) {
            var banner = SERVICE_DATA.adplaces[adplace_id]['placement']['banners'].pop();
            //отдаём ссылку на баннер
            this.sendResponse(res, {statusCode: 200, body: banner});
        }
        else {
            var msgError ="Banner is not finded.";
            //отдаём ошибку
            this.sendResponse(res, {statusCode: 400, body: msgError})
        }

    }
    else {

        if (typeof(SERVICE_DATA.adplaces[adplace_id]) !== 'undefined'){
            var msgError ="Wrong refer hostname. Need "+SERVICE_DATA.adplaces[adplace_id]['site']['domain']+", but get "+domain;
        }
        else {
            var msgError ="Wrong parameter adplace_id.";
        }
        //отдаём ошибку
        this.sendResponse(res, {statusCode: 400, body: msgError})
    }


    console.log(refererInfo);

    //находим ID сайта с которого пришел запрос

    //SERVICE_DATA.adplaces[adplace_id][]
}





//LOGIC.(req, res, adplace_id);
//sendResponse(res, {statusCode: 200, body: req.query.adplace_id})
