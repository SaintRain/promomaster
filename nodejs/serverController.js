/**
 * Контроллел для обработки серверных запросов
 *
 */
global.URL = require("url");
require(__dirname + '/config.js');//подключаем настройки
var BODY_PARSER = require('body-parser');
//var MULTER = require('multer');
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


//запускаем сервер
APP.use(BODY_PARSER.json()); // for parsing application/json
APP.use(BODY_PARSER.urlencoded({ extended: true })); // for parsing application/x-www-form-urlencoded
//APP.use(MULTER()); // for parsing multipart/form-data


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
APP.post('/refresh', function (req, res) {

    if (req.body.secretToken == CONFIG.secretToken) {
        mysqlGetInitializationData(req.body);
    }
    else {
        //отдаём ошибку
        LOGIC.sendResponse(res, {statusCode: 400, body: 'Wrong parameter secretToken'})
    }
})


///ПОТОМ НУЖНО УДАЛИТЬ !!!!!!
APP.get('/getAllData', function (req, res) {
    LOGIC.sendResponse(res, {statusCode: 200, body: SERVICE_DATA})
})




var server = APP.listen(CONFIG.port, function () {
    var host = server.address().address
    var port = server.address().port
    console.log('Сервер запущен http://%s:%s', host, port)

})