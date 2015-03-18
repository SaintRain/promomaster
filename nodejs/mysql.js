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

//преобразует строковую чату в INT
strDateToInt=function(dateStr)
{
    var date = new Date(dateStr);
    return  date.getUTCSeconds();
}

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
mysqlGetPlacementsMatchSections = function (adplace_id, section_id) {
    if (adplace_id && section_id) {
        var where = "WHERE adplace_id ='" + adplace_id + "' AND section_id='"+section_id+"'";
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

    var q = "SELECT id, adPlace_id, isEnabled, adCompany_id, UNIX_TIMESTAMP(startDateTime) AS startDateTime, UNIX_TIMESTAMP(finishDateTime) AS finishDateTime " +
        "FROM core_adcompany_placement " + where;
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

    var q = "SELECT id, preoritet, banner_id, placement_id " +
        "FROM core_adcompany_placement_banner" + where;
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

    var q = "SELECT id, UNIX_TIMESTAMP(startDateTime) AS startDateTime, UNIX_TIMESTAMP(finishDateTime) AS finishDateTime  FROM core_adcompany " +where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

            //прибавляем сутки
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



//выборка стран
mysqlGetCountries = function (id) {
    if (id) {
        var where = "WHERE id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT id, alpha2 FROM core_directory_country " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            SD.countries['_' + item.id] = item;
            SD.countriesByAlpha2[item.alpha2] = item;

        })
    });

}

//удаление пользователя
mysqlDeleteCountries = function (id) {
    if (SD.countries['_' + id]) {
        delete SD.countriesByAlpha2[SD.countries['_' + id].alpha2];
        delete SD.countries['_' + id];
    }
}



//выборка связи рекламных компаний и стран
mysqlGetAdCompanyMatchCountries = function (adcompany_id, country_id) {
    if (adcompany_id, country_id) {
        var where = "WHERE adcompany_id ='" + adcompany_id + "' AND country_id='"+country_id+"'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM core_ad_company_match_country " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            if (!SD.adCompanyMatchCountries['_' + item.adcompany_id]) {
                SD.adCompanyMatchCountries['_' + item.adcompany_id]={}
            }

            SD.adCompanyMatchCountries['_' + item.adcompany_id]['_'+item.country_id] = item;
        })
    });
}

//удаление связи рекламных компаний и стран
mysqlAdCompanyMatchCountries = function (adcompany_id, country_id) {
    if (SD.adCompanyMatchCountries['_' + adcompany_id]['_'+country_id]) {
        delete SD.adCompanyMatchCountries['_' + adcompany_id]['_'+country_id];
    }
}



//выборка связи размещений и стран
mysqlGetPlaceMatchCountries = function (placement_id, country_id) {
    if (placement_id, country_id) {
        var where = "WHERE placement_id ='" + placement_id + "' AND country_id='"+country_id+"'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM core_ad_company_placement_match_country " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            if (!SD.adPlaceMatchCountries['_' + item.placement_id]) {
                SD.adPlaceMatchCountries['_' + item.placement_id]={}
            }

            SD.adPlaceMatchCountries['_' + item.placement_id]['_'+item.country_id] = item;
        })

    });
}

//удаление размещений и стран
mysqlDeletePlaceMatchCountries = function (placement_id, country_id) {
    if (SD.adPlaceMatchCountries['_' + placement_id]['_'+country_id]) {
        delete SD.adPlaceMatchCountries['_' + placement_id]['_'+country_id];
    }
}


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