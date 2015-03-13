////глобальные настройки

CONFIG = {
    port:1337,
    secretToken: "elG5fNk4md3l4k4",
    hostname:"http://promomaster",
    mysqldb: {  //настройки подключения к БД Mysql
        host: 'localhost',
        login: 'root',
        password: 'root',
        database: 'promomaster',
        port: ''
    }
};





//CONFIG = {
//    mysqldb: {  //настройки подключения к БД Mysql
//        host:'localhost',
//        login:'admin',
//        password:'admin',
//        base:'bookl',
//        port:''
//    },
//    mongodb:{  //настройки подключения к БД MongoDB
//        host:'localhost',
//        login:'admin',
//        password:'admin',
//        port:27017,
//        base:'bookl'
//    },
//    salt:'j$f67jh-ds3', //соль шифрования для личного кабинет
//    host:'http://bookl', //домен на котором расположена система
//    //mod_patch:'C:/Users/SaintRain/node_modules',
//    mod_patch:'C:/Users/User/node_modules',
//    //xml_patch:'D:/ZendServer/Apache2/htdocs/travelport/request_xml',
//    //lib_patch:'D:/ZendServer/Apache2/htdocs/travelport/lib',
//    xml_patch:'E:/Zend/Apache2/htdocs/bookl/lib/request_xml',
//    lib_patch:'E:/Zend/Apache2/htdocs/bookl/lib',
//    io_port:85, //порт чтения сокетов
//    memcached_port:11211, //порт подключения memcached
//    memcached_host:'localhost', //хост подключения memcached
//    default_currency_type:"UAH", //валюта по умолчанию, в которой запрашиваются предложения перелётов
//    taxPercent:10.0,           //наш процент комиссии
//    travelport:{                //настройки подключения к системе travelport
//        agregator_code:1,                 //код агрегатора, используется для интедификации в базе
//        AuthorizedBy:"S7007837", //индетификатор нашей системы
//        username:"Universal API/uAPI9907993606-ff442080", //логин подключения
//        password:"9Tm}Hc{23?", //пароль подключения
//        branch_code:"P7007844", //код ветки доступа
//        CIDBNumber:"0000576035",
//        PseudoCityCode:"50NX",
//        // PseudoCityCode2:"74QP", //мюнхенский код, тестовый
//        air:{
//            host:"emea.copy-webservices.travelport.com",
//            path:"/B2BGateway/connect/uAPI/AirService"
//        }
//    },
//    //настройки подключения к SMTP серверу
//    smtp:{
//        name:'BOOKL.NET',
//        user:    "bookltest@mail.ru",
//        password:"bookltest2000",
//        host:    "smtp.mail.ru",
//        ssl: true,
//        port:465
//    },
//    msgs: {
//        ru: {
//            reg_subject:'Подтверждение регистрация на сайте BOOKL.NET',
//            reg_message:'Подтвердите регистрацию перейдя по <a href="%s">ссылке</a>',
//            restore_subject:'Восстановление пароля на BOOKL.NET',
//            restore_message:'Для смены пароля перейдите по <a href="%s">ссылке</a>'
//        }
//    }
//}
//
//
//
////подключаем нужные модули
//FS = require('fs');               //работа с файлами
//DOM = require(CONFIG.mod_patch + '/xmldom').DOMParser;    //работа с XMLDOM
//CRYPTO 	= require('crypto');    //работа с шифрованием
//
////запускаем сервер сокетов
//IO_SERVER = require(CONFIG.mod_patch + '/socket.io').listen(CONFIG.io_port);
//
////настройка таймаутов
////IO_SERVER.configure('production', function () {
////    IO_SERVER.set('close timeout', 120);
////    IO_SERVER.set('heartbeat timeout', 120);
////    IO_SERVER.set('heartbeat interval', 50);
////    IO_SERVER.set('polling duration', 50);
////});
//
//
////WS = require(CONFIG.mod_patch + '/ws.js')
//
//
////подключаемся к мемкешу
////var Memcached = require(CONFIG.mod_patch+'/memcached/lib/memcached');
////MEMCACHED = new Memcached(CONFIG.memcached_host+':'+CONFIG.memcached_port);
//
//
////модуль для форматирования текста
//SPRINTF = require(CONFIG.mod_patch+'/sprintf').sprintf;
////vsprintf = require('sprintf').vsprintf;
//
////модуль для работы с запросами
//HTTPS = require("https");
//HTTP = require("http");
//
////обработка исключений
//TRYCATCH = require(CONFIG.mod_patch+'/trycatch')
//
////события
//var events = require('events');
//eventEmitter = new events.EventEmitter();
//
//QueryString = require('querystring');
//
////подключаем стратегию и шаблоны
//LIB = require(CONFIG.lib_patch + '/lib.js');   //общие функции
//
////подключаем стратегии для агрегатора travelport
//tAirRequest = require(CONFIG.lib_patch + '/travelport/air_request.js');
//tAirStrategy = require(CONFIG.lib_patch + '/travelport/air_strategy.js');
//tAirParse = require(CONFIG.lib_patch + '/travelport/air_parse.js');
//tAirValidate = require(CONFIG.lib_patch + '/travelport/air_validate.js');
//

//
////подключение к mongodb
//MONGOOSE = require(CONFIG.mod_patch +'/mongoose');
//MONGOOSE.connect('mongodb://'+CONFIG.mongodb.login+':'+CONFIG.mongodb.password+'@'+CONFIG.mongodb.host+':'+CONFIG.mongodb.port+'/'+CONFIG.mongodb.base);
//
//MONGOOSE_DB = MONGOOSE.connection;  //соединение
//MONGOOSE_DB.on('error', console.error.bind(console, 'connection error:'));
//MONGOOSE_DB.once('open', function callback () {
//    console.log('Успешно подключились к MONGODB')
//});
//
//
//
////модуль для работы с почтой
////http://documentup.com/andris9/nodemailer/
//NODEMAILER = require(CONFIG.mod_patch+"/nodemailer");
//
//
////объект для работы с кабинетом пользователя (авторизация, регистрация, редактирование профиля и т.д.)
//CABINET = require(CONFIG.lib_patch + '/cabinet.js');
//
////объект для работы со статистическими данными
//STATISTICS = require(CONFIG.lib_patch + '/statistics.js');
//
////модуль для парсинга XML
//EXPAT = require(CONFIG.mod_patch +'/node-expat');
//
////колекция частоиспользуемых регулярных выражений
//REGEXP = {
//    Email:/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/,    //Email адрес
//    Name:/^[a-zA-Zа-яА-Я ]+$/,//набор из латинских, кирилических букв и пробел
//    LatinName:/^[A-Z]+$/,  //набор из латинских букв и пробел
//    PassportNumber:/[0-9A-Z]/,  //набор из латинских букв и цифры
//    CardNumber:/[0-9]{13,16}/,  //номер кредитной карты
//    CardCVC_CVV:/^\d{3}$/,      //три целых цифры
//    Date:/^\d{4}-\d{2}-\d{2}/, //Дата в формате 2013-02-21
//    Phone:/^\+\d{2}\(\d{3}\)\d{3}-\d{2}-\d{2}$/, //пример: +38(044)555-55-55
//    IntNumber:/^\d{1,10}$/,  //целое число с ограничением по длинне
//    //Password:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/, //Строчные и прописные латинские буквы, цифры, спецсимволы. Минимум 8 символо
//    Password:/^[a-zA-z]{1}[a-zA-Z1-9]{3,20}$/,
//    Hash: /^[0-9a-f]{32}$/ // выражение для проверки хеша
//
//}
//
//
