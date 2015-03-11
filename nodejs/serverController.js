/**
 * Контроллел для обработки серверных запросов
 *
 */

require(__dirname + '/config.js');//подключаем настройки
var MYSQL = require('mysql');
var MYSQL_CONNECTION;
global.SERVICE_DATA= {
    adplaces:[],
    sections:[],
    sites:[],
    placementbanners:[],
    placements:[],
    //adplace:[],
    //adplace:[],
    //adplace:[],
    //adplace:[],

}
global.URL = require("url");
var EXPRESS = require('express');
var APP = EXPRESS();
//собственные библиотеки
require(__dirname + '/mysql.js'); //подключаем настройки
var LOGIC=require(__dirname + '/serverLogic.js'); //подключаем настройки


//берем данные из базы
LOGIC.initialization(MYSQL);

//обработка запроса на получение баннера
APP.get('/getad', function (req, res) {

    if (req.query.adplace_id) {
        LOGIC.getAd(req, res, req.query.adplace_id);
    }
    else {
        //отдаём ошибку
        LOGIC.sendResponse(res, {statusCode: 400, body: 'Missing parameter adplace_id'})
    }
})

var server = APP.listen(1337, function () {

    var host = server.address().address
    var port = server.address().port

    console.log('Сервер запущен http://%s:%s', host, port)

})