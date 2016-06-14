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
                        throw new Error('Не правильные данные авторизации Mysql');

                    }
                    else if (err.code == "PROTOCOL_CONNECTION_LOST") {
                        if (!CONFIG.isProd) {
                            console.log('Соединение с Mysql потеряно, пытаемся переустановить.');
                        }
                        mysqlConnect(MYSQL, connectionTryCount);    //пытаемся пересоздать соединение
                    }
                    else {
                        throw err;
                    }
                }
                else {
                    if (!CONFIG.isProd) {
                        console.log("Соединение с Mysql успешно установлено.");
                    }
                }
            }
        );

        MYSQL_CONNECTION.on('close', function (err) {
            //устанавливаем соединение
            mysqlConnect(MYSQL, 0);
        });

        MYSQL_CONNECTION.on('error', function (err) {
            //устанавливаем соединение
            mysqlConnect(MYSQL, 0);
        });

    }
    else {
        throw new Error('Невозможно приконектится к базе, соединение обрывается.');
    }
}





//преобразует строковую чату в INT
strDateToInt = function (dateStr) {
    var date = new Date(dateStr);
    return date.getUTCSeconds();
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

        var array = {"http://www.":"", "https://www.":"", "http://":"", "https://":""}

        rows.forEach(function (item) {

            //оставляем только доменное имя
            for (var val in array)
                item.domain = item.domain.replace(val, array[val]);

            //console.log(item.domain)

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
        var where = "WHERE adplace_id ='" + adplace_id + "' AND section_id='" + section_id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM core_site_section_match_ad_place  " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            if (!SD.placementsMatchSections['_' + item.adplace_id]) {
                SD.placementsMatchSections['_' + item.adplace_id] = {};
            }
            SD.placementsMatchSections['_' + item.adplace_id]['_' + item.section_id] = item;
        })
    });

}

//удаление раздела
mysqlDeletePlacementsMatchSections = function (adplace_id, section_id) {
    if (SD.placementsMatchSections['_' + id]) {
        delete SD.placementsMatchSections['_' + adplace_id]['_' + section_id];
    }
}


//выборка размещений
mysqlGetPlacements = function (id) {
    if (id) {
        var where = "WHERE p.id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT p.*, UNIX_TIMESTAMP(p.startDateTime) AS startDateTime , UNIX_TIMESTAMP(p.finishDateTime) AS finishDateTime, pm.name AS priceModelName " +
        "FROM core_adcompany_placement AS p " +
        "LEFT JOIN ad_price_model AS pm ON (p.quantityModel_id=pm.id) " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

            //определяем код количества клики/показы/дни
            if (item.priceModelName == 'showsquantity') {
                item.quantityModelName = "showsQuantity";
            }
            else if (item.priceModelName == 'clicksquantity') {
                item.quantityModelName = "clicksQuantity";
            }


            SD.placements['_' + item.id] = item;
            if (!SD.placementsByAdPlace['_' + item.adPlace_id]) {
                SD.placementsByAdPlace['_' + item.adPlace_id] = {};
            }
            SD.placementsByAdPlace['_' + item.adPlace_id]["_" + item.id] = SD.placements['_' + item.id];



        })
    });

}


//удаление размещения
mysqlDeletePlacements = function (id) {
    if (SD.placements['_' + id]) {
        var adPlace_id = SD.placements['_' + id].adPlace_id;
        delete SD.placementsByAdPlace['_' + adPlace_id]['_' + id];
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
        "FROM core_adcompany_placement_banner " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

            if (!item.preoritet) {
                preoritet=1;
            }

            SD.placementbanners['_' + item.id] = item;
            if (!SD.placementbannersByPlacement['_' + item.placement_id]) {
                SD.placementbannersByPlacement['_' + item.placement_id] = {};
            }
            SD.placementbannersByPlacement['_' + item.placement_id]['_' + item.id] = SD.placementbanners['_' + item.id];
        });
    });

}


//удаление настройки баннера
mysqlDeletePlacementBanners = function (id) {
    if (SD.placementbanners['_' + id]) {
        var placement_id = SD.placementbanners['_' + id].placement_id;
        delete SD.placementbannersByPlacement['_' + placement_id]['_' + id];
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

    var q = "SELECT * FROM core_site_ad_place " + where;
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


//выборка рекламных кампаний
mysqlGetAdCompanies = function (id) {
    if (id) {
        var where = "WHERE id ='" + id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT id, isEnabled, UNIX_TIMESTAMP(startDateTime) AS startDateTime, UNIX_TIMESTAMP(finishDateTime) AS finishDateTime  FROM core_adcompany " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

            //прибавляем сутки
            SD.adcompanies['_' + item.id] = item;

        })
    });

}

//удаление рекламной кампании
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

//удаление страны
mysqlDeleteCountries = function (id) {
    if (SD.countries['_' + id]) {
        delete SD.countriesByAlpha2[SD.countries['_' + id].alpha2];
        delete SD.countries['_' + id];
    }
}


//выборка связи рекламных кампаний и стран
mysqlGetAdCompanyMatchCountries = function (adcompany_id, country_id) {
    if (adcompany_id, country_id) {
        var where = "WHERE adcompany_id ='" + adcompany_id + "' AND country_id='" + country_id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM core_ad_company_match_country " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            if (!SD.adCompanyMatchCountries['_' + item.adcompany_id]) {
                SD.adCompanyMatchCountries['_' + item.adcompany_id] = {}
            }

            SD.adCompanyMatchCountries['_' + item.adcompany_id]['_' + item.country_id] = item;
        })
    });
}

//удаление связи рекламных кампаний и стран
mysqlAdCompanyMatchCountries = function (adcompany_id, country_id) {
    if (SD.adCompanyMatchCountries['_' + adcompany_id]['_' + country_id]) {
        delete SD.adCompanyMatchCountries['_' + adcompany_id]['_' + country_id];
    }
}


//выборка связи размещений и стран
mysqlGetPlaceMatchCountries = function (placement_id, country_id) {
    if (placement_id, country_id) {
        var where = "WHERE placement_id ='" + placement_id + "' AND country_id='" + country_id + "'";
    }
    else {
        var where = "";
    }

    var q = "SELECT * FROM core_ad_company_placement_match_country " + where;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            if (!SD.adPlaceMatchCountries['_' + item.placement_id]) {
                SD.adPlaceMatchCountries['_' + item.placement_id] = {}
            }

            SD.adPlaceMatchCountries['_' + item.placement_id]['_' + item.country_id] = item;
        })

    });
}

//удаление размещений и стран
mysqlDeletePlaceMatchCountries = function (placement_id, country_id) {
    if (SD.adPlaceMatchCountries['_' + placement_id]['_' + country_id]) {
        delete SD.adPlaceMatchCountries['_' + placement_id]['_' + country_id];
    }
}

/**
 * Добавляет запись о статистике
 * @param startDateTime
 * @param finishDateTime
 * @param showsQuantity
 * @param clicksQuantity
 * @param adplace_id
 * @param placement_id
 * @param placement_banner_id
 * @param banner_id
 */
mysqlInsertStatistics = function (options) {

    if (options.length) {
        //var q = "INSERT INTO core_statistics (id,startDateTime,finishDateTime, showsQuantity, clicksQuantity, adPlace_id, placementBanner_id, placement_id, banner_id) VALUES ",
        var q = "INSERT INTO core_statistics (id, site_id, startDateTime,finishDateTime, showsQuantity, clicksQuantity, adPlace_id, placement_id, banner_id) VALUES ",
            values = [];

        for (var key in options) {
            var d = options[key];

            //values.push("(NULL,'" + d.startDateTime + "', '" + d.finishDateTime + "', '" + d.showsQuantity + "', '" + d.clicksQuantity + "', '" + d.adplace_id + "','" + d.placement_banner_id + "','" + d.placement_id + "','" + d.banner_id + "')");
            values.push("(NULL,'"+ d.site_id + "', '"  + d.startDateTime + "', '" + d.finishDateTime + "', '" + d.showsQuantity + "', '" + d.clicksQuantity + "', '" + d.adplace_id + "','"+ d.placement_id + "','" + d.banner_id + "')");

        }
        q = q + values.join(',');
        MYSQL_CONNECTION.query(q);
        //console.log(q);
        //console.log("Статистика записана в базу");
    }
}


/**
 * Загружает статистические данные
 */
mysqlGetStatistics = function () {
   // var q = "SELECT adPlace_id, placement_id,placementBanner_id, banner_id,sum(showsQuantity) AS showsQuantity,sum(clicksQuantity) AS clicksQuantity FROM core_statistics GROUP BY placement_id";

    var q = "SELECT adPlace_id, placement_id, banner_id,sum(showsQuantity) AS showsQuantity,sum(clicksQuantity) AS clicksQuantity FROM core_statistics GROUP BY placement_id";
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

            if (!STplacements['_' + item.placement_id]) {
                STplacements['_' + item.placement_id] = {
                    showsQuantity: 0,
                    clicksQuantity: 0
                }
            }

            if (!SD.statistics['_' + item.adPlace_id]) {
                SD.statistics['_' + item.adPlace_id] = {};
            }

            if (!SD.statistics['_' + item.adPlace_id]['_' + item.placement_id]) {
                SD.statistics['_' + item.adPlace_id]['_' + item.placement_id] = {
                    showsQuantity: item.showsQuantity,
                    clicksQuantity: item.clicksQuantity
                };
            }
            else {
                SD.statistics['_' + item.adPlace_id]['_' + item.placement_id].showsQuantity += item.showsQuantity; //общее количество показов для размещения
                SD.statistics['_' + item.adPlace_id]['_' + item.placement_id].clicksQuantity += item.clicksQuantity; //общее количество показов для размещен
            }

            STplacements['_' + item.placement_id].showsQuantity += item.showsQuantity;
            STplacements['_' + item.placement_id].clicksQuantity += item.clicksQuantity;

        });
    });
}

//берем названия ценовых моделей
mysqlGetPriceModel = function () {
    var q = "SELECT * FROM ad_price_model";
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            if (!SD.priceModel['_' + item.id]) {
                SD.priceModel['_' + item.id]={};
            }
            SD.priceModel['_' + item.id]=item;
        });
    });
}


//выборка сайтов для создания скриншотов
mysqlGetSitesForWebshot = function (callback) {

var sites=[];
    var q = "SELECT id, domain, user_id  FROM core_site WHERE isVerified=1 AND (isHaveSnapshot=0 OR isHaveSnapshot IS NULL)";
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            sites.push(item) ;
        })
        callback(sites);
    });
return sites;
}


//обновление скриншота
mysqlUpdateSitesForWebshot = function (site) {

    var q = "UPDATE core_site SET isHaveSnapshot=1, snapshot='"+site.snapshot+"'  WHERE id="+site.id;
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
    });

}



//выборка связи рекламных кампаний и стран
//mysqlGetAdCompanyMatchCountries = function (adcompany_id, country_id) {
//    if (adcompany_id, country_id) {
//        var where = "WHERE adcompany_id ='" + adcompany_id + "' AND country_id='" + country_id + "'";
//    }
//    else {
//        var where = "";
//    }
//
//    var q = "SELECT * FROM core_ad_company_match_country " + where;
//    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
//        if (err) throw err;
//        rows.forEach(function (item) {
//            if (!SD.adCompanyMatchCountries['_' + item.adcompany_id]) {
//                SD.adCompanyMatchCountries['_' + item.adcompany_id] = {}
//            }
//
//            SD.adCompanyMatchCountries['_' + item.adcompany_id]['_' + item.country_id] = item;
//        })
//    });
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