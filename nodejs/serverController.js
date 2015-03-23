/**
 * Контроллел для обработки серверных запросов
 *
 */

global.GEOIP = require('geoip-lite');   //модуль для работы с maxmind
global.URL = require("url");
require(__dirname + '/config.js');//подключаем настройки
var BODY_PARSER = require('body-parser');
var MYSQL = require('mysql');
global.EXTEND = require('util')._extend;
global.CLONE = require('clone');
global.DATE_FORMAT = require('dateformat');
var MYSQL_CONNECTION;
global.SD = {
    adplaces: {},
    adPlaceMatchCountries: {},
    sections: {},
    sites: {},
    placementbanners: {},
    placementbannersByPlacement: {},
    placements: {},
    placementsByAdPlace: {},
    placementsMatchSections: {},
    banners: {},
    adcompanies: {},
    users: {},
    countries: {},
    countriesByAlpha2: {},
    adCompanyMatchCountries: {},
    statistics:{},
    priceModel:{},
    //adplace:[],
    //adplace:[],
}

global.STplacements= {} //вся статистика кликов и показов
global.ST = {}; //статистические данные

var EXPRESS = require('express');
var APP = EXPRESS();

//собственные библиотеки
require(__dirname + '/mysql.js'); //подключаем настройки
var LOGIC = require(__dirname + '/serverLogic.js'); //подключаем настройки


//запускаем сервер
APP.use(BODY_PARSER.json()); // for parsing application/json
APP.use(BODY_PARSER.urlencoded({extended: true})); // for parsing application/x-www-form-urlencoded


//берем данные из базы
LOGIC.initialization(MYSQL);

//обработка запроса на получение баннера
APP.get('/get', function (req, res) {


    if (req.query.id) {
        LOGIC.getAd(req, res, parseInt(req.query.id));
    }
    else {
        //отдаём ошибку
        LOGIC.sendResponse(res, {statusCode: 400, body: 'Missing parameter id'})
    }
})

//обработка клика по баннеру
APP.get('/click', function (req, res) {

    if (req.query.adplace_id &&
        req.query.placementbanner_id &&
        req.query.placement_id &&
        req.query.banner_id
    ) {
        LOGIC.click(req, res, parseInt(req.query.adplace_id), parseInt(req.query.placement_id), parseInt(req.query.placementbanner_id), parseInt(req.query.banner_id));
    }
    else {
        //отдаём ошибку
        LOGIC.sendResponse(res, {statusCode: 400, body: 'Missing some parameter(s)'})
    }
})


//обработка запроса на необходимость обновления данных из базы
APP.post('/refresh', function (req, res) {

    if (req.body.secretToken == CONFIG.secretToken) {
        LOGIC.refresh(req, res);
    }
    else {
        //отдаём ошибку
        LOGIC.sendResponse(res, {statusCode: 400, body: 'Wrong parameter secretToken'})
    }
})


///ПОТОМ НУЖНО УДАЛИТЬ !!!!!!
APP.get('/getAllData', function (req, res) {
    LOGIC.sendResponse(res, {statusCode: 200, body: SD})
})


var server = APP.listen(CONFIG.port, function () {
    var host = server.address().address
    var port = server.address().port
    console.log('Сервер запущен http://%s:%s', host, port)

})