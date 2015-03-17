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
//mysqlGetInitializationData = function (options) {
//
//    //берем все площадки
//    if (options.user_id) {
//        var siteWhere=" WHERE user_id='"+options.user_id+"'";
//        delete SD.sites['_'+options.user_id]; //удаляем элемент
//    }
//    else {
//        var siteWhere="";
//    }
//    var q = "SELECT id, domain, user_id FROM core_site "+siteWhere;
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            if (!SD.sites['_'+item.user_id]) {
//                SD.sites['_'+item.user_id]={};
//            }
//            SD.sites['_'+item.user_id]['_'+item.id] = item;
//        })
//    })
//
//
//    //берем все разделы для рекламных мест
//    if (options.user_id) {
//        var sectionWhere=" WHERE ss.user_id='"+options.user_id+"'";
//        delete SD.sections[options.user_id];    //удаляем элемент
//    }
//    else {
//        var sectionWhere="";
//    }
//    var q = "SELECT  ss.id, ss.isRegExpInUrlTemplate, ss.urlTemplate, ss.user_id, m.adplace_id FROM core_site_section AS ss " +
//        "JOIN core_site_section_match_ad_place AS m ON (ss.id=m.section_id)";
//
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            if (!SD.sections['_'+item.user_id]) {
//                SD.sections['_'+item.user_id] = {};
//            }
//            if (!SD.sections['_'+item.user_id]['_'+item.adplace_id]) {
//                SD.sections['_'+item.user_id]['_'+item.adplace_id]=[];
//            }
//
//            SD.sections['_'+item.user_id]['_'+item.adplace_id].push(item);
//        })
//    })
//
//
//
//    //берем все размещения
//    if (options.user_id) {
//        var placementWhere=" WHERE ac.user_id='"+options.user_id+"'";
//        delete SD.placements['_'+options.user_id]; //удаляем элемент
//    }
//    else {
//        var placementWhere="";
//    }
//
//    var q = "SELECT p.*, ac.user_id FROM core_adcompany_placement AS p " +
//        "JOIN core_adcompany AS ac ON (ac.id=p.adCompany_id)"+placementWhere;
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            if (!SD.placements['_'+item.user_id]) {
//                SD.placements['_'+item.user_id] = {};
//            }
//            if (!SD.placements['_'+item.user_id]['_'+item.adPlace_id]) {
//                SD.placements['_'+item.user_id]['_'+item.adPlace_id]=[];
//            }
//            SD.placements['_'+item.user_id]['_'+item.adPlace_id].push(item);
//        })
//    })
//
//
//
//    //берем все баннеры
//    if (options.user_id) {
//        var bannerWhere=" WHERE b.user_id='"+options.user_id+"'";
//        delete SD.banners[options.user_id]; //удаляем элемент
//
//    }
//    else {
//        var bannerWhere="";
//    }
//
//    var q = "SELECT b.*, file.name AS file_name, file.height AS file_height,  file.width  AS file_width," +
//        "image.height AS image_height,  image.width  AS image_width," +
//        "image.name AS image_name  FROM core_banner_common AS b " +
//        "LEFT JOIN core_file_common AS file ON (b.file_id=file.id) " +
//        "LEFT JOIN core_file_common AS image ON (b.image_id=image.id)"+bannerWhere;
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
//            if (!SD.banners[item.user_id]) {
//                SD.banners[item.user_id]={};
//            }
//
//            SD.banners[item.user_id]['_'+item.id] = item;
//        })
//    })
//
//
//    //берем все настройки  баннеров для размещений
//    if (options.user_id) {
//        var placementBannerWhere=" WHERE id='"+options.user_id+"'";
//        delete SD.placementbanners['_'+options.user_id]; //удаляем элемент
//    }
//    else {
//        var placementBannerWhere="";
//    }
//
//    var q = "SELECT * FROM core_adcompany_placement_banner"+placementBannerWhere;
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//
//            if (!SD.placementbanners['_'+item.placement_id]) {
//                SD.placementbanners['_'+item.placement_id] = [];
//            }
//
//            //разначаем реальный баннер
//            if (SD.banners['_'+item.banner_id]) {
//                item['banner'] = SD.banners['_'+item.banner_id];
//            }
//
//            SD.placementbanners['_'+item.placement_id].push(item);
//
//        })
//
//        //сетапим в размещения баннеры
//        //SD.placements.forEach(function (placements, adPlace_id) {
//        for(var adPlace_id in SD.placements) {
//
//            //placements.forEach(function (placement, key) {
//            for(var key in SD.placements[adPlace_id]) {
//                var placement=SD.placements[adPlace_id][key];
//                if (SD.placementbanners['_'+placement.id]) {
//                    SD.placements[adPlace_id][key]['placementBanners'] = SD.placementbanners['_'+placement.id];
//                }
//            };
//        };
//
//    })
//
//    return 1;
//
//
//    //берем все рекламные места
//    if (options.placement_banner_id) {
//        var adplaceWhere=" WHERE id='"+options.ad_place_id+"'";
//        delete SD.adplaces['_'+options.ad_place_id]; //удаляем элемент
//    }
//    else {
//        var adplaceWhere="";
//    }
//
//    var q = "SELECT * FROM core_site_ad_place";
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//
//            SD.adplaces['_'+item.id] = {adplace: item};
//            if (SD.sections['_'+item.id]) {
//                SD.adplaces['_'+item.id]['sections'] = SD.sections['_'+item.id];
//            }
//            if (SD.sites['_'+item.site_id]) {
//                SD.adplaces['_'+item.id]['site'] = SD.sites['_'+item.site_id];
//                SD.adplaces['_'+item.id]['isSiteByDomain'] = {};
//                SD.adplaces['_'+item.id]['isSiteByDomain'][SD.sites['_'+item.site_id].domain] = true;
//            }
//            //размещения
//            if (SD.placements['_'+item.id]) {
//                SD.adplaces['_'+item.id]['placements'] = SD.placements['_'+item.id];
//            }
//        })
//
//    })
//
//
//    //
//    ////берем все рекламные компании
//    //var q = "SELECT * FROM core_adcompany";
//    //MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//    //    if (err) throw err;
//    //    rows.forEach(function (item) {
//    //        SD.adcompanies[item.id]=item;
//    //    })
//    //})
//    //
//
//    //
//    ////берем всеx пользователей
//    //var q = "SELECT * FROM fos_user_user";
//    //MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//    //    if (err) throw err;
//    //    rows.forEach(function (item) {
//    //        SD.users[item.id]=item;
//    //    })
//    //})
//    //
//
//}


//joinObject = function (obj) {
//    var res = [];
//    for (key in obj) {
//        res.push(obj[key])
//    }
//
//    return res.join(',');
//
//}
//
//deleteFromObj = function (obj, ids) {
//    for (id in ids) {
//        delete obj['_' + id];
//    }
//
//}

//выборка сайтов
mysqlGetSites = function (id) {
    if (id) {
        var where = "WHERE id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT id, domain, user_id FROM core_site " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            SD.sites['_' + item.id] = item;
            //SD.sitesByDomain[item.domain] = SD.sites['_' + item.id];
        })
    });

}

//удаление сайта
mysqlDeleteSites = function (id) {
    if (SD.sites['_' + id]) {
        //delete SD.sitesByDomain[SD.sites['_' + id].domain];
        delete SD.sites['_' + id];
    }
}

//выборка разделов
mysqlGetSections = function (id) {
    if (id) {
        var where = "WHERE ss.id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT  ss.id, ss.isRegExpInUrlTemplate, ss.urlTemplate, ss.user_id, m.adplace_id FROM core_site_section AS ss " +
        "LEFT JOIN core_site_section_match_ad_place AS m ON (ss.id=m.section_id) " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            SD.sections['_' + item.id] = item;
        })
    });

}

//удаление раздела
mysqlDeleteSections = function (id) {
    if (SD.sections['_' + id]) {
        delete SD.sections['_' + id];
    }
}


//выборка связей между рекламными местами и разделами
mysqlGetPlacementsMatchSections = function (id) {
    if (id) {
        var where = "WHERE id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM core_site_section_match_ad_place  " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            if (!SD.placementsMatchSections['_' + item.adplace_id]) {
                SD.placementsMatchSections['_' + item.adplace_id]={};
            }
            SD.placementsMatchSections['_' + item.adplace_id]['_'+item.section_id] = item;
        })
    });

}

//удаление раздела
mysqlDeletePlacementsMatchSections = function (adplace_id, section_id) {
    if (SD.placementsMatchSections['_' + id]) {
        delete SD.placementsMatchSections['_' + adplace_id]['_'+section_id];
    }
}



//выборка размещений
mysqlGetPlacements = function (id) {
    if (id) {
        var where = "WHERE id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM core_adcompany_placement" + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            SD.placements['_' + item.id] = item;
            if (!SD.placementsByAdPlace['_' + item.adPlace_id]) {
                SD.placementsByAdPlace['_' + item.adPlace_id] = {};
            }
            SD.placementsByAdPlace['_' + item.adPlace_id]["_"+item.id]=SD.placements['_' + item.id];
        })
    });

}


//удаление размещения
mysqlDeletePlacements= function (id) {
    if (SD.placements['_' + id]) {
        var adPlace_id=SD.placements['_' + id].adPlace_id;
        delete SD.placementsByAdPlace['_'+adPlace_id]['_' + id];
        delete SD.placements['_' + id];
    }
}


//выборка баннеров
mysqlGetBanners = function (id) {
    if (id) {
        var where = "WHERE b.id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT b.*, file.name AS file_name, file.height AS file_height,  file.width  AS file_width," +
        "image.height AS image_height,  image.width  AS image_width," +
        "image.name AS image_name  FROM core_banner_common AS b " +
        "LEFT JOIN core_file_common AS file ON (b.file_id=file.id) " +
        "LEFT JOIN core_file_common AS image ON (b.image_id=image.id) " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

            //формируем правильные пути
            item.image_name = exports.getNameWithId(item.image_name, item.image_id);
            item.file_name = exports.getNameWithId(item.file_name, item.file_id);
            item.image_src = CONFIG.hostname + "/uploads/image/" + item.id + "/image/original/original_" + item.image_name;
            item.file_src = CONFIG.hostname + "/uploads/flash/" + item.id + "/file/" + item.file_name;

            SD.banners['_' + item.id] = item;

        })
    });

}

//удаление баннера
mysqlDeleteBanners = function (id) {
    if (SD.banners['_' + id]) {
        delete SD.banners['_' + id];
    }
}


//выборка настроек баннера
mysqlGetPlacementBanners = function (id) {
    if (id) {
        var where = "WHERE id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM core_adcompany_placement_banner" + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            SD.placementbanners['_' + item.id] = item;
            if (!SD.placementbannersByPlacement['_'+ item.placement_id]) {
                SD.placementbannersByPlacement['_'+ item.placement_id]={};
            }
            SD.placementbannersByPlacement['_'+ item.placement_id]['_'+item.id]=SD.placementbanners['_' + item.id];
        });
    });

}


//удаление настройки баннера
mysqlDeletePlacementBanners = function (id) {
    if (SD.placementbanners['_' + id]) {
        var placement_id=SD.placementbanners['_' + id].placement_id;
        delete SD.placementbannersByPlacement['_'+placement_id]['_' + id];
        delete SD.placementbanners['_' + id];
    }
}


//выборка рекламных мест
mysqlGetAdPlaces = function (id) {
    if (id) {
        var where = "WHERE id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM core_site_ad_place "+where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            SD.adplaces['_' + item.id] = item;

        })
    });

}

//удаление нрекламного места
mysqlDeleteAdPlaces = function (id) {
    if (SD.adplaces['_' + id]) {
        delete SD.adplaces['_' + id];
    }
}


//выборка рекламных компаний
mysqlGetAdCompanies = function (id) {
    if (id) {
        var where = "WHERE id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM core_adcompany " +where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            SD.adcompanies['_' + item.id] = item;

        })
    });

}

//удаление рекламной компании
mysqlDeleteAdCompanies = function (id) {
    if (SD.adcompanies['_' + id]) {
        delete SD.adcompanies['_' + id];
    }
}


//выборка пользователей
mysqlGetUsers = function (id) {
    if (id) {
        var where = "WHERE id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM fos_user_user " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            SD.users['_' + item.id] = item;

        })
    });

}

//удаление пользователя
mysqlDeleteUsers = function (id) {
    if (SD.users['_' + id]) {
        delete SD.users['_' + id];
    }
}


//mysqlGetInitializationData = function (options) {
//    console.log(options);
//    if (!options || options.site_ids) {
//        //берем все площадки
//        if (options.site_ids) {
//            var siteWhere = " WHERE id IN (" + joinObject(options.site_ids) + ")";
//            deleteFromObj(SD.sites, options.site_ids); //удаляем элемент
//        }
//        else {
//            var siteWhere = "";
//        }
//        var q = "SELECT id, domain, user_id FROM core_site " + siteWhere;
//        console.log(q)
//        MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//            if (err) throw err;
//            rows.forEach(function (item) {
//                SD.sites['_' + item.id] = item;
//            })
//        })
//    }
//
//
//
//    //берем все разделы для рекламных мест
//    if (!options || options.section_ids) {
//        if (options.section_ids) {
//            var sectionWhere = " WHERE ss.id IN (" + joinObject(options.section_ids) + ")";
//        }
//        else {
//            var sectionWhere = "";
//        }
//        var q = "SELECT  ss.id, ss.isRegExpInUrlTemplate, ss.urlTemplate, ss.user_id, m.adplace_id FROM core_site_section AS ss " +
//            "LEFT JOIN core_site_section_match_ad_place AS m ON (ss.id=m.section_id)"+sectionWhere;
//
//        MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//            if (err) throw err;
//            rows.forEach(function (item) {
//                if (item.adplace_id) {
//                    if (!SD.sections['_' + item.adplace_id] || (sectionWhere && SD.sections['_' + item.adplace_id] )) {
//                        SD.sections['_' + item.adplace_id] = [];
//                    }
//
//                    SD.sections['_' + item.adplace_id].push(item);
//                }
//            })
//
//        })
//    }
//
//
//    //берем все размещения
//    if (!options || options.placement_ids) {
//        if (options.placement_ids) {
//            var placementWhere = " WHERE id IN (" + joinObject(options.placement_ids) + ")";
//        }
//        else {
//            var placementWhere = "";
//        }
//
//        var q = "SELECT * FROM core_adcompany_placement" + placementWhere;
//        MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//            if (err) throw err;
//            rows.forEach(function (item) {
//                if (!SD.placements['_' + item.adPlace_id] || placementWhere) {
//                    SD.placements['_' + item.adPlace_id] = [];
//                    //delete (SD.placements[item.adPlace_id]; //удаляем элемент
//                    placementWhere="";
//                }
//                SD.placements['_' + item.adPlace_id].push(item);
//            })
//        })
//    }
//
//
//    //берем все баннеры
//    if (!options || options.banner_ids) {
//        if (options.banner_ids) {
//            var bannerWhere = " WHERE b.id='" + joinObject(options.banner_ids) + "'";
//            deleteFromObj(SD.banners, options.banner_ids); //удаляем элемент
//        }
//        else {
//            var bannerWhere = "";
//        }
//
//        var q = "SELECT b.*, file.name AS file_name, file.height AS file_height,  file.width  AS file_width," +
//            "image.height AS image_height,  image.width  AS image_width," +
//            "image.name AS image_name  FROM core_banner_common AS b " +
//            "LEFT JOIN core_file_common AS file ON (b.file_id=file.id) " +
//            "LEFT JOIN core_file_common AS image ON (b.image_id=image.id)" + bannerWhere;
//        MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//            if (err) throw err;
//            rows.forEach(function (item) {
//
//                //формируем правильные пути
//                item.image_name = exports.getNameWithId(item.image_name, item.image_id);
//                item.file_name = exports.getNameWithId(item.file_name, item.file_id);
//                item.image_src = CONFIG.hostname + "/uploads/image/" + item.id + "/image/original/original_" + item.image_name;
//                item.file_src = CONFIG.hostname + "/uploads/flash/" + item.id + "/file/" + item.file_name;
//
//                SD.banners['_' + item.id] = item;
//            })
//        })
//    }
//
//    //берем все настройки  баннеров для размещений
//    if (!options || options.placement_banner_ids) {
//        if (options.placement_banner_ids) {
//            var placementBannerWhere = " WHERE id IN (" + joinObject(options.placement_banner_ids) + ")";
//            deleteFromObj(SD.placementbanners, options.placement_banner_id); //удаляем элемент
//        }
//        else {
//            var placementBannerWhere = "";
//        }
//
//        var q = "SELECT * FROM core_adcompany_placement_banner" + placementBannerWhere;
//        MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//            if (err) throw err;
//            rows.forEach(function (item) {
//
//                if (!SD.placementbanners['_' + item.placement_id]) {
//                    SD.placementbanners['_' + item.placement_id] = [];
//                }
//
//                //разначаем реальный баннер
//                if (SD.banners['_' + item.banner_id]) {
//                    item['banner'] = SD.banners['_' + item.banner_id];
//                }
//
//                SD.placementbanners['_' + item.placement_id].push(item);
//
//            })
//
//            //сетапим в размещения баннеры
//            //SD.placements.forEach(function (placements, adPlace_id) {
//            for (var adPlace_id in SD.placements) {
//
//                //placements.forEach(function (placement, key) {
//                for (var key in SD.placements[adPlace_id]) {
//                    var placement = SD.placements[adPlace_id][key];
//                    if (SD.placementbanners['_' + placement.id]) {
//                        SD.placements[adPlace_id][key]['placementBanners'] = SD.placementbanners['_' + placement.id];
//                    }
//                }
//
//            }
//
//
//        })
//    }
//
//
//    //берем все рекламные места
//    if (!options || options.ad_place_ids) {
//        if (options.ad_place_ids) {
//            var adplaceWhere = " WHERE id IN (" + joinObject(options.ad_place_ids) + ")";
//            deleteFromObj(SD.adplaces, options.ad_place_ids); //удаляем элемент
//            deleteFromObj(SD.sections, options.ad_place_ids); //удаляем элемент
//            deleteFromObj(SD.placements, options.ad_place_ids); //удаляем элемент
//        }
//        else {
//            var adplaceWhere = "";
//        }
//
//        var q = "SELECT * FROM core_site_ad_place";
//        MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//            if (err) throw err;
//            rows.forEach(function (item) {
//
//                SD.adplaces['_' + item.id] = {adplace: item};
//                if (SD.sections['_' + item.id]) {
//                    SD.adplaces['_' + item.id]['sections'] = SD.sections['_' + item.id];
//                }
//                if (SD.sites['_' + item.site_id]) {
//                    SD.adplaces['_' + item.id]['site'] = SD.sites['_' + item.site_id];
//                    SD.adplaces['_' + item.id]['isSiteByDomain'] = {};
//                    SD.adplaces['_' + item.id]['isSiteByDomain'][SD.sites['_' + item.site_id].domain] = true;
//                }
//                //размещения
//                if (SD.placements['_' + item.id]) {
//                    SD.adplaces['_' + item.id]['placements'] = SD.placements['_' + item.id];
//                }
//            })
//
//        })
//    }
//
//    //
//    ////берем все рекламные компании
//    //var q = "SELECT * FROM core_adcompany";
//    //MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//    //    if (err) throw err;
//    //    rows.forEach(function (item) {
//    //        SD.adcompanies[item.id]=item;
//    //    })
//    //})
//    //
//
//    //
//    ////берем всеx пользователей
//    //var q = "SELECT * FROM fos_user_user";
//    //MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//    //    if (err) throw err;
//    //    rows.forEach(function (item) {
//    //        SD.users[item.id]=item;
//    //    })
//    //})
//    //
//
//}

//mysqlGetInitializationData = function (options) {
//
//    //берем все площадки
//    if (options.site_id) {
//        var siteWhere=" WHERE id='"+options.site_id+"'";
//        delete SD.sites['_'+options.site_id]; //удаляем элемент
//    }
//    else {
//        var siteWhere="";
//    }
//    var q = "SELECT id, domain, user_id FROM core_site "+siteWhere;
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            SD.sites['_'+item.id] = item;
//        })
//    })
//
//
//    //берем все разделы для рекламных мест
//    if (options.section_id) {
//        var sectionWhere=" WHERE ss.id='"+options.section_id+"'";
//       delete SD.sections[options.section_id];    //удаляем элемент
//    }
//    else {
//        var sectionWhere="";
//    }
//    var q = "SELECT  ss.id, ss.isRegExpInUrlTemplate, ss.urlTemplate, ss.user_id, m.adplace_id FROM core_site_section AS ss " +
//        "JOIN core_site_section_match_ad_place AS m ON (ss.id=m.section_id)";
//
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            if (!SD.sections['_'+item.adplace_id]) {
//                SD.sections['_'+item.adplace_id] = [];
//            }
//            SD.sections['_'+item.adplace_id].push(item);
//        })
//    })
//
//
//
//    //берем все размещения
//    if (options.placement_id) {
//        var placementWhere=" WHERE id='"+options.placement_id+"'";
//        delete SD.placements['_'+options.placement_id]; //удаляем элемент
//    }
//    else {
//        var placementWhere="";
//    }
//
//    var q = "SELECT * FROM core_adcompany_placement"+placementWhere;
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            if (!SD.placements['_'+item.adPlace_id]) {
//                SD.placements['_'+item.adPlace_id] = [];
//            }
//            SD.placements['_'+item.adPlace_id].push(item);
//        })
//    })
//
//
//    //берем все баннеры
//    if (options.banner_id) {
//        var bannerWhere=" WHERE b.id='"+options.placement_id+"'";
//        delete SD.banners[item.id]; //удаляем элемент
//
//    }
//    else {
//        var bannerWhere="";
//    }
//
//    var q = "SELECT b.*, file.name AS file_name, file.height AS file_height,  file.width  AS file_width," +
//        "image.height AS image_height,  image.width  AS image_width," +
//        "image.name AS image_name  FROM core_banner_common AS b " +
//        "LEFT JOIN core_file_common AS file ON (b.file_id=file.id) " +
//        "LEFT JOIN core_file_common AS image ON (b.image_id=image.id)"+bannerWhere;
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
//            SD.banners['_'+item.id] = item;
//        })
//    })
//
//
//    //берем все настройки  баннеров для размещений
//    if (options.placement_banner_id) {
//        var placementBannerWhere=" WHERE id='"+options.placement_banner_id+"'";
//        delete SD.placementbanners['_'+options.placement_banner_id]; //удаляем элемент
//    }
//    else {
//        var placementBannerWhere="";
//    }
//
//    var q = "SELECT * FROM core_adcompany_placement_banner"+placementBannerWhere;
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//
//            if (!SD.placementbanners['_'+item.placement_id]) {
//                SD.placementbanners['_'+item.placement_id] = [];
//            }
//
//            //разначаем реальный баннер
//            if (SD.banners['_'+item.banner_id]) {
//                item['banner'] = SD.banners['_'+item.banner_id];
//            }
//
//            SD.placementbanners['_'+item.placement_id].push(item);
//
//        })
//
//        //сетапим в размещения баннеры
//        //SD.placements.forEach(function (placements, adPlace_id) {
//            for(var adPlace_id in SD.placements) {
//
//                //placements.forEach(function (placement, key) {
//                for(var key in SD.placements[adPlace_id]) {
//                    var placement=SD.placements[adPlace_id][key];
//                if (SD.placementbanners['_'+placement.id]) {
//                    SD.placements[adPlace_id][key]['placementBanners'] = SD.placementbanners['_'+placement.id];
//                }
//            };
//        };
//
//    })
//
//
//    //берем все рекламные места
//    if (options.placement_banner_id) {
//        var adplaceWhere=" WHERE id='"+options.ad_place_id+"'";
//        delete SD.adplaces['_'+options.ad_place_id]; //удаляем элемент
//    }
//    else {
//        var adplaceWhere="";
//    }
//
//    var q = "SELECT * FROM core_site_ad_place";
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//
//                SD.adplaces['_'+item.id] = {adplace: item};
//                if (SD.sections['_'+item.id]) {
//                    SD.adplaces['_'+item.id]['sections'] = SD.sections['_'+item.id];
//                }
//                if (SD.sites['_'+item.site_id]) {
//                    SD.adplaces['_'+item.id]['site'] = SD.sites['_'+item.site_id];
//                    SD.adplaces['_'+item.id]['isSiteByDomain'] = {};
//                    SD.adplaces['_'+item.id]['isSiteByDomain'][SD.sites['_'+item.site_id].domain] = true;
//                }
//                //размещения
//                if (SD.placements['_'+item.id]) {
//                    SD.adplaces['_'+item.id]['placements'] = SD.placements['_'+item.id];
//                }
//        })
//
//    })
//
//
//    //
//    ////берем все рекламные компании
//    //var q = "SELECT * FROM core_adcompany";
//    //MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//    //    if (err) throw err;
//    //    rows.forEach(function (item) {
//    //        SD.adcompanies[item.id]=item;
//    //    })
//    //})
//    //
//
//    //
//    ////берем всеx пользователей
//    //var q = "SELECT * FROM fos_user_user";
//    //MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//    //    if (err) throw err;
//    //    rows.forEach(function (item) {
//    //        SD.users[item.id]=item;
//    //    })
//    //})
//    //
//
//}

//mysqlGetInitializationData = function () {
//
//    //берем все площадки
//    var q = "SELECT * FROM core_site";
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            SD.sites[item.id] = item;
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
//            if (!SD.sections[item.adplace_id]) {
//                SD.sections[item.adplace_id] = [];
//            }
//            SD.sections[item.adplace_id].push(item);
//        })
//    })
//
//
//    //берем все размещения
//    var q = "SELECT * FROM core_adcompany_placement";
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            if (!SD.placements[item.adPlace_id]) {
//                SD.placements[item.adPlace_id] = [];
//            }
//            SD.placements[item.adPlace_id].push(item);
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
//            SD.banners[item.id] = item;
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
//            if (!SD.placementbanners[item.placement_id]) {
//                SD.placementbanners[item.placement_id] = [];
//            }
//
//            //разначаем реальный баннер
//            if (SD.banners[item.banner_id]) {
//                item['banner'] = SD.banners[item.banner_id];
//            }
//
//            SD.placementbanners[item.placement_id].push(item);
//
//        })
//
//        //сетапим в размещения баннеры
//        SD.placements.forEach(function (placements, adPlace_id) {
//            placements.forEach(function (placement, key) {
//                // var placement= SD.placements[adPlace_id][key];
//                if (SD.placementbanners[placement.id]) {
//                    SD.placements[adPlace_id][key]['placementBanners'] = SD.placementbanners[placement.id];
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
//            SD.adplaces[item.id] = {adplace: item};
//            if (SD.sections[item.id]) {
//                SD.adplaces[item.id]['sections'] = SD.sections[item.id];
//            }
//            if (SD.sites[item.site_id]) {
//                SD.adplaces[item.id]['site'] = SD.sites[item.site_id];
//                SD.adplaces[item.id]['isSiteByDomain'] = {};
//                SD.adplaces[item.id]['isSiteByDomain'][SD.sites[item.site_id].domain] = true;
//            }
//            //размещения
//            if (SD.placements[item.id]) {
//                SD.adplaces[item.id]['placements'] = SD.placements[item.id];
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