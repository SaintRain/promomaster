//создание скринов сайтов

var MYSQL = require('mysql');
var webshot = require('webshot');

var easyimg = require('easyimage');

require(__dirname + '/config.js');//подключаем настройки
require(__dirname + '/mysql.js');


var options = {
    renderDelay: 5000,
    timeout: 10000,
    screenSize: {
        width: 1024
        , height: 1024
    }
    , shotSize: {
        width: 'all'
        , height: 1024
    },
    quality: 80,
    phantomConfig: {'ignore-ssl-errors': 'true'},
    userAgent: 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36'

};

//устанавливаем соединение
mysqlConnect(MYSQL, 0);

mysqlGetSitesForWebshot(function (sites) {
    webshotsRun(false, sites);

});


function webshotsRun(checkKey, sites) {
    var
        currentIndex = 1,
        isNeadToRun = false;

    for (key in sites) {

        if (isNeadToRun || !checkKey) {
            getWebshot(sites, currentIndex, key);
            break;
        }
        if (key == checkKey) {
            isNeadToRun = true;
        }
        currentIndex++;
    }

    if (sites.length <= currentIndex) {
        console.log('Complete : ' + currentIndex);
        console.log('Sites count : ' + sites.length);
        process.exit();
    }

}

function getWebshot(sites, currentIndex, checkKey) {
    var site = sites[checkKey],
        filename = 'site-' + site.id + '.jpg',
        srcFile='web/uploads/sites/' + site.user_id + '/' + filename;

    webshot(site.domain, srcFile, options, function (err) {

        if (err == null) {

            easyimg.thumbnail({
                src:srcFile,
                dst:srcFile,
                width:800,
                height:800});

            easyimg.thumbnail({
                src:srcFile,
                dst:'web/uploads/sites/' + site.user_id + '/small_' + filename,
                width:100,
            height:100});

            site.snapshot = filename;
            mysqlUpdateSitesForWebshot(site);
            console.log('processed: ' + currentIndex + '; ' + site.domain);
        }
        else {
            console.log('filed: ' + currentIndex + '; ' + site.domain);
        }


        webshotsRun(checkKey, sites)
    });

}





