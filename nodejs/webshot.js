//создание скринов сайтов


//логирование
global.LOG = require("log4js");
global.LOG.configure(__dirname + "/config_log4js.json");
global.LOGGER = global.LOG.getLogger();
global.TRYCATCH = require('trycatch');

TRYCATCH(function () {


    var MYSQL = require('mysql');
    var webshot = require('webshot');


    var easyimg = require('easyimage');


    require(__dirname + '/config.js');//подключаем настройки
    require(__dirname + '/mysql.js');


    var options = {
        renderDelay: 5000,
        timeout: 60000,
        screenSize: {
            width: 1024
            , height: 1024
        }
        , shotSize: {
            width: 'all'
            , height: 1024
        },
        quality: 80,
        streamType: 'jpg',
        defaultWhiteBackground: true,
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

        if (!CONFIG.isProd) {
            console.log('processed: '+sites[key].domain+' #'+ currentIndex+ ' from '+sites.length);
        }

        console.log(sites.length);
        console.log(currentIndex);

        if (!sites.length || sites.length <= currentIndex) {

            if (!CONFIG.isProd) {
                console.log('Complete : ' + currentIndex);
                console.log('Sites count : ' + sites.length);
            }


            //screenshot.close();
            //process.exit();
        }

    }

    function getWebshot(sites, currentIndex, checkKey) {
        var site = sites[checkKey],
            filename = 'site-' + site.id + '.jpg',
            srcFile = CONFIG.image_patch+'/sites/' + site.user_id + '/' + filename;


        webshot(site.domain, srcFile, options, function (err) {


            if (err == null) {

                var res=easyimg.thumbnail({
                    src: srcFile,
                    dst: srcFile,
                    width: 800,
                    height: 800
                });
                console.log(srcFile)
                console.log(res)

                easyimg.thumbnail({
                    src: srcFile,
                    dst: CONFIG.image_patch+'/sites/' + site.user_id + '/small_' + filename,
                    width: 100,
                    height: 100
                });

                site.snapshot = filename;
                mysqlUpdateSitesForWebshot(site);
                //console.log('processed: ' + currentIndex + '; ' + site.domain);
            }
            else {
                if (!CONFIG.isProd) {
                    console.log('filed: ' + currentIndex + '; ' + site.domain+' error='+err);
                }

            }


            webshotsRun(checkKey, sites)
        });

    }



},

function (err) {
    global.LOGGER.error(err.stack);
    //console.log(err.stack);
});

