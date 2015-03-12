/**
 * Контроллел для обработки серверных запросов
 *
 */
global.URL = require("url");
require(__dirname + '/config.js');//подключаем настройки
var MYSQL = require('mysql');
var MYSQL_CONNECTION;
global.SERVICE_DATA = {
    adplaces: {},
    sections: {},
    sites: {},
    placementbanners: {},
    placements: {},
    banners: {}
    //adplace:[],
    //adplace:[],
    //adplace:[],
    //adplace:[],

}

var EXPRESS = require('express');
var APP = EXPRESS();


//собственные библиотеки

require(__dirname + '/mysql.js'); //подключаем настройки
var LOGIC = require(__dirname + '/serverLogic.js'); //подключаем настройки


//берем данные из базы
LOGIC.initialization(MYSQL);

//обработка запроса на получение баннера
APP.get('/get', function (req, res) {

    if (req.query.id) {
        LOGIC.getAd(req, res, req.query.id);
    }
    else {
        //отдаём ошибку
        LOGIC.sendResponse(res, {statusCode: 400, body: 'Missing parameter adplace_id'})
    }
})


//обработка запроса на необходимость обновления данных из базы
APP.get('/refresh', function (req, res) {
    if (req.query.id && req.query.entityName) {
        if (typeof(parseInt(req.query.id))==='number') {
            LOGIC.refresh(req, res, parseInt(req.query.id), req.query.entityName);
        }
        else {
            //отдаём ошибку
            LOGIC.sendResponse(res, {statusCode: 400, body: 'Wrong parameter id'})
        }
    }
    else {
        //отдаём ошибку
        LOGIC.sendResponse(res, {statusCode: 400, body: 'Missing parameter id'})
    }
})


///ПОТОМ НУЖНО УДАЛИТЬ !!!!!!
APP.get('/getAllData', function (req, res) {
    LOGIC.sendResponse(res, {statusCode: 200, body: SERVICE_DATA})
})

//запускаем сервер
var server = APP.listen(CONFIG.port, function () {
    var host = server.address().address
    var port = server.address().port
    console.log('Сервер запущен http://%s:%s', host, port)

})