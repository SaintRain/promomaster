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


mysqlGetInitializationData = function () {

    //берем все площадки
    var q = "SELECT * FROM core_site";
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            global.SERVICE_DATA.sites[item.id]=item;
        })
    })


    //берем все разделы для рекламных мест
    var q = "SELECT ss.id, m.adplace_id FROM core_site_section AS ss " +
        "JOIN core_site_section_match_ad_place AS m ON (ss.id=m.section_id)";

    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            if (!SERVICE_DATA.sections[item.adplace_id]) {
                SERVICE_DATA.sections[item.adplace_id] = [];
            }
            SERVICE_DATA.sections[item.adplace_id].push(item);
        })

    })



    //берем все размещения
    var q = "SELECT * FROM core_adcompany_placement";
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {
            global.SERVICE_DATA.placements[item.adPlace_id]=item;
        })
    })


//берем все  баннеры для размещений
    var q = "SELECT * FROM core_adcompany_placement_banner";
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

            global.SERVICE_DATA.placementbanners[item.id]=item;
            if (global.SERVICE_DATA.placements[item.adPlace_id]) {
                if (!global.SERVICE_DATA.placements[item.adPlace_id]['banners']) {
                    global.SERVICE_DATA.placements[item.adPlace_id]['banners'] = [];
                }
                global.SERVICE_DATA.placements[item.adPlace_id]['banners'].push(item);
            }
        })
    })





    //берем все рекламные места
    var q = "SELECT * FROM core_site_ad_place";
    MYSQL_CONNECTION.query(q, function (err, rows, fields) {
        if (err) throw err;
        rows.forEach(function (item) {

            SERVICE_DATA.adplaces[item.id] = {adplace: item};
            if (SERVICE_DATA.sections[item.adplace_id]) {
                SERVICE_DATA.adplaces[item.id]['sections'] = SERVICE_DATA.sections[item.adplace_id];
            }
            if (SERVICE_DATA.sites[item.site_id]) {
                SERVICE_DATA.adplaces[item.id]['site'] = SERVICE_DATA.sites[item.site_id];
                SERVICE_DATA.adplaces[item.id]['isSiteByDomain']={};
                SERVICE_DATA.adplaces[item.id]['isSiteByDomain'][SERVICE_DATA.sites[item.site_id].domain] = true;
            }
            //размещения
            if (SERVICE_DATA.placements[item.id]) {

                SERVICE_DATA.adplaces[item.id]['placement']=SERVICE_DATA.placements[item.id];
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