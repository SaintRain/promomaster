/**
 * Интерфейся для работы с Mysql
 * Содержит все запросы
 */


/**
 * Подключение к базе MYSQL
 *
 * @param MYSQL
 * @param connectionTryCount - количество попыток установить соединение
 */
mysqlConnect = function (MYSQL, connectionTryCount) {
    connectionTryCount++;

    if (connectionTryCount < 5) {
        //подключение к базе MYSQL
        MYSQL_CONNECTION = MYSQL.createConnection({
            host: CONFIG.mysqldb.host,
            user: CONFIG.mysqldb.login,
            password: CONFIG.mysqldb.password,
            database: CONFIG.mysqldb.database
        });

        MYSQL_CONNECTION
            .connect(
            function (err) {
                if (err) {
                    if (err.code == "ER_ACCESS_DENIED_ERROR") {
                        console.log('Не правильные данные авторизации Mysql');
                    }
                    else if (err.code == "PROTOCOL_CONNECTION_LOST") {
                        console.log('Соединение с Mysql потеряно, пытаемся переустановить.');
                        mysqlConnect(MYSQL, connectionTryCount);    //пытаемся пересоздать соединение
                    }
                    else {
                        throw err;
                    }
                }
                else {
                    console.log("Соединение с Mysql успешно установлено.");
                }
            }
        );

    }
    else {
        throw new Error('Невозможно приконектится к базе, соединение обрывается.');
    }
}

//инициализация данных в память
mysqlGetInitializationData = function (options) {

    //берем все площадки
    if (options.site_id) {
        var siteWhere=" WHERE id='"+options.site_id+"'";
        delete global.SERVICE_DATA.sites['_'+options.site_id]; //удаляем элемент
    }
    else {
        var siteWhere="";
    }
    var q = "SELECT id, domain, user_id FROM core_site "+siteWhere;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            SERVICE_DATA.sites['_'+item.id] = item;
        })
    })


    //берем все разделы для рекламных мест
    if (options.section_id) {
        var sectionWhere=" WHERE ss.id='"+options.section_id+"'";
       delete SERVICE_DATA.sections[options.section_id];    //удаляем элемент
    }
    else {
        var sectionWhere="";
    }
    var q = "SELECT  ss.id, ss.isRegExpInUrlTemplate, ss.urlTemplate, ss.user_id, m.adplace_id FROM core_site_section AS ss " +
        "JOIN core_site_section_match_ad_place AS m ON (ss.id=m.section_id)";

    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            if (!SERVICE_DATA.sections['_'+item.adplace_id]) {
                SERVICE_DATA.sections['_'+item.adplace_id] = [];
            }
            SERVICE_DATA.sections['_'+item.adplace_id].push(item);
        })
    })



    //берем все размещения
    if (options.placement_id) {
        var placementWhere=" WHERE id='"+options.placement_id+"'";
        delete global.SERVICE_DATA.placements['_'+options.placement_id]; //удаляем элемент
    }
    else {
        var placementWhere="";
    }

    var q = "SELECT * FROM core_adcompany_placement"+placementWhere;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            if (!global.SERVICE_DATA.placements['_'+item.adPlace_id]) {
                global.SERVICE_DATA.placements['_'+item.adPlace_id] = [];
            }
            global.SERVICE_DATA.placements['_'+item.adPlace_id].push(item);
        })
    })


    //берем все баннеры
    if (options.banner_id) {
        var bannerWhere=" WHERE b.id='"+options.placement_id+"'";
        delete global.SERVICE_DATA.banners[item.id]; //удаляем элемент

    }
    else {
        var bannerWhere="";
    }

    var q = "SELECT b.*, file.name AS file_name, file.height AS file_height,  file.width  AS file_width," +
        "image.height AS image_height,  image.width  AS image_width," +
        "image.name AS image_name  FROM core_banner_common AS b " +
        "LEFT JOIN core_file_common AS file ON (b.file_id=file.id) " +
        "LEFT JOIN core_file_common AS image ON (b.image_id=image.id)"+bannerWhere;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

            //формируем правильные пути
            item.image_name = exports.getNameWithId(item.image_name, item.image_id);
            item.file_name = exports.getNameWithId(item.file_name, item.file_id);
            item.image_src = CONFIG.hostname + "/uploads/image/" + item.id + "/image/original/original_" + item.image_name;
            item.file_src = CONFIG.hostname + "/uploads/flash/" + item.id + "/file/" + item.file_name;

            global.SERVICE_DATA.banners['_'+item.id] = item;
        })
    })


    //берем все настройки  баннеров для размещений
    if (options.placement_banner_id) {
        var placementBannerWhere=" WHERE id='"+options.placement_banner_id+"'";
        delete global.SERVICE_DATA.placementbanners['_'+options.placement_banner_id]; //удаляем элемент
    }
    else {
        var placementBannerWhere="";
    }

    var q = "SELECT * FROM core_adcompany_placement_banner"+placementBannerWhere;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

            if (!global.SERVICE_DATA.placementbanners['_'+item.placement_id]) {
                global.SERVICE_DATA.placementbanners['_'+item.placement_id] = [];
            }

            //разначаем реальный баннер
            if (global.SERVICE_DATA.banners['_'+item.banner_id]) {
                item['banner'] = global.SERVICE_DATA.banners['_'+item.banner_id];
            }

            global.SERVICE_DATA.placementbanners['_'+item.placement_id].push(item);

        })

        //сетапим в размещения баннеры
        //global.SERVICE_DATA.placements.forEach(function (placements, adPlace_id) {
            for(var adPlace_id in SERVICE_DATA.placements) {

                //placements.forEach(function (placement, key) {
                for(var key in SERVICE_DATA.placements[adPlace_id]) {
                    var placement=SERVICE_DATA.placements[adPlace_id][key];
                if (global.SERVICE_DATA.placementbanners['_'+placement.id]) {
                    global.SERVICE_DATA.placements[adPlace_id][key]['placementBanners'] = global.SERVICE_DATA.placementbanners['_'+placement.id];
                }
            };
        };

    })


    //берем все рекламные места
    if (options.placement_banner_id) {
        var adplaceWhere=" WHERE id='"+options.ad_place_id+"'";
        delete global.SERVICE_DATA.adplaces['_'+options.ad_place_id]; //удаляем элемент
    }
    else {
        var adplaceWhere="";
    }

    var q = "SELECT * FROM core_site_ad_place";
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

                SERVICE_DATA.adplaces['_'+item.id] = {adplace: item};
                if (SERVICE_DATA.sections['_'+item.id]) {
                    SERVICE_DATA.adplaces['_'+item.id]['sections'] = SERVICE_DATA.sections['_'+item.id];
                }
                if (SERVICE_DATA.sites['_'+item.site_id]) {
                    SERVICE_DATA.adplaces['_'+item.id]['site'] = SERVICE_DATA.sites['_'+item.site_id];
                    SERVICE_DATA.adplaces['_'+item.id]['isSiteByDomain'] = {};
                    SERVICE_DATA.adplaces['_'+item.id]['isSiteByDomain'][SERVICE_DATA.sites['_'+item.site_id].domain] = true;
                }
                //размещения
                if (SERVICE_DATA.placements['_'+item.id]) {
                    SERVICE_DATA.adplaces['_'+item.id]['placements'] = SERVICE_DATA.placements['_'+item.id];
                }
        })

    })


    //
    ////берем все рекламные компании
    //var q = "SELECT * FROM core_adcompany";
    //MYSQL_CONNECTION.query(q, function (err, rows, fields) {
    //    if (err) throw err;
    //    rows.forEach(function (item) {
    //        global.SERVICE_DATA.adcompanies[item.id]=item;
    //    })
    //})
    //

    //
    ////берем всеx пользователей
    //var q = "SELECT * FROM fos_user_user";
    //MYSQL_CONNECTION.query(q, function (err, rows, fields) {
    //    if (err) throw err;
    //    rows.forEach(function (item) {
    //        global.SERVICE_DATA.users[item.id]=item;
    //    })
    //})
    //

}

//mysqlGetInitializationData = function () {
//
//    //берем все площадки
//    var q = "SELECT * FROM core_site";
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            global.SERVICE_DATA.sites[item.id] = item;
//        })
//    })
//
//
//    //берем все разделы для рекламных мест
//    var q = "SELECT ss.*, m.adplace_id FROM core_site_section AS ss " +
//        "JOIN core_site_section_match_ad_place AS m ON (ss.id=m.section_id)";
//
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            if (!SERVICE_DATA.sections[item.adplace_id]) {
//                SERVICE_DATA.sections[item.adplace_id] = [];
//            }
//            SERVICE_DATA.sections[item.adplace_id].push(item);
//        })
//    })
//
//
//    //берем все размещения
//    var q = "SELECT * FROM core_adcompany_placement";
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            if (!global.SERVICE_DATA.placements[item.adPlace_id]) {
//                global.SERVICE_DATA.placements[item.adPlace_id] = [];
//            }
//            global.SERVICE_DATA.placements[item.adPlace_id].push(item);
//        })
//    })
//
//
//    //берем все баннеры
//    var q = "SELECT b.*, file.name AS file_name, file.height AS file_height,  file.width  AS file_width," +
//        "image.height AS image_height,  image.width  AS image_width," +
//        "image.name AS image_name  FROM core_banner_common AS b " +
//        "LEFT JOIN core_file_common AS file ON (b.file_id=file.id) " +
//        "LEFT JOIN core_file_common AS image ON (b.image_id=image.id)";
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//
//            //формируем правильные пути
//            item.image_name = exports.getNameWithId(item.image_name, item.image_id);
//            item.file_name = exports.getNameWithId(item.file_name, item.file_id);
//            item.image_src = CONFIG.hostname + "/uploads/image/" + item.id + "/image/original/original_" + item.image_name;
//            item.file_src = CONFIG.hostname + "/uploads/flash/" + item.id + "/file/" + item.file_name;
//
//            global.SERVICE_DATA.banners[item.id] = item;
//        })
//    })
//
//
//    //берем все настройки  баннеров для размещений
//    var q = "SELECT * FROM core_adcompany_placement_banner";
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//
//            if (!global.SERVICE_DATA.placementbanners[item.placement_id]) {
//                global.SERVICE_DATA.placementbanners[item.placement_id] = [];
//            }
//
//            //разначаем реальный баннер
//            if (global.SERVICE_DATA.banners[item.banner_id]) {
//                item['banner'] = global.SERVICE_DATA.banners[item.banner_id];
//            }
//
//            global.SERVICE_DATA.placementbanners[item.placement_id].push(item);
//
//        })
//
//        //сетапим в размещения баннеры
//        global.SERVICE_DATA.placements.forEach(function (placements, adPlace_id) {
//            placements.forEach(function (placement, key) {
//                // var placement= global.SERVICE_DATA.placements[adPlace_id][key];
//                if (global.SERVICE_DATA.placementbanners[placement.id]) {
//                    global.SERVICE_DATA.placements[adPlace_id][key]['placementBanners'] = global.SERVICE_DATA.placementbanners[placement.id];
//                }
//            });
//        });
//
//    })
//
//
//    //берем все рекламные места
//    var q = "SELECT * FROM core_site_ad_place";
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//
//            SERVICE_DATA.adplaces[item.id] = {adplace: item};
//            if (SERVICE_DATA.sections[item.id]) {
//                SERVICE_DATA.adplaces[item.id]['sections'] = SERVICE_DATA.sections[item.id];
//            }
//            if (SERVICE_DATA.sites[item.site_id]) {
//                SERVICE_DATA.adplaces[item.id]['site'] = SERVICE_DATA.sites[item.site_id];
//                SERVICE_DATA.adplaces[item.id]['isSiteByDomain'] = {};
//                SERVICE_DATA.adplaces[item.id]['isSiteByDomain'][SERVICE_DATA.sites[item.site_id].domain] = true;
//            }
//            //размещения
//            if (SERVICE_DATA.placements[item.id]) {
//                SERVICE_DATA.adplaces[item.id]['placements'] = SERVICE_DATA.placements[item.id];
//            }
//
//
//        })
//
//    })
//
//
//}









/**
 * Формирует правильный путь для файлов
 * @param name
 * @param id
 * @returns {string|*}
 */
exports.getNameWithId = function (name, id) {
    if (name) {
        var arr = name.split(".");
        var fullName = arr[0] + '_' + id + '.' + arr[1];
    }
    else {
        var fullName = name;
    }
    return fullName;
}