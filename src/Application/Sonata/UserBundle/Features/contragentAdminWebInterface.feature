#Тестирование админской части статьи (контрагент)
@contragentAdminWebInterface
Feature: Test contragent web interface in adminzone
    Background:
        Given I am logged in as administrator
        And there is a user with:
        |field          |value                  |
        |username       |test-tst@ekance.com    |
        |email          |test-tst@ekance.com    |
        |plainPassword  |pa55w0rd               |
        |firstname      |Василий                |
        |lastname       |Пупкин                 |
        |phone          |+790245678312          |
        |enabled        |true                   |
            
    
    @createIndiContragentBackend
    @mink:selenium2
    Scenario: Add a new individual contragent
        Given I am on "admin/sonata/user/commoncontragent/create?subclass=IndiContragent"
        And there no contragents for user with email "test-tst@ekance.com"
        When I fill in the following:
        |Фамилия                |Пупкин     |
        |Имя                    |Василий    |
        |Отчество               |Петрович   |
        And I fill in "Пользователь" with "test-tst@ekance.com"
        And I wait for ajax request will end
        And I choose it in ajax entity
        And I click on tab with text "Контактная информация"
        And I fill in the following:
        |Контактный телефон 1   |+380995456711          |
        |Контактный телефон 2   |+380995456722          |
        |Контактный телефон 3   |+380995456733          |
        |Контактный email       |test-indi@ekance.com   |
        When I press "btn_create_and_edit"
        Then I should see "Элемент создан успешно"
       
    @editIndiContragentBackend
    Scenario: Edit an individual contragent
        Given there is a contragent with:
        |field          |value                  |
        |isIndi         |true                   |
        |phone1         |+380995456711          |
        |phone2         |+380995456722          |
        |phone3         |+380995456733          |
        |firstName      |Василий                |
        |lastName       |Пупкин                 |
        |surName        |Петрович               |
        |user           |test-tst@ekance.com    |
        |contactEmail   |test-indi@ekance.com   |
        And I am on contragent with email "test-indi@ekance.com" "admin/sonata/user/commoncontragent/%d/edit" page
        And I fill in the following:
        |Фамилия                |Петров     |
        |Имя                    |Петр       |
        |Отчество               |Иванович   |
        #And I click on tab with text "Контактная информация"
        And I fill in "Контактный телефон 1" with "+380665456711"
        When I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"

    @createLegalContragentBackend
    @mink:selenium2
    Scenario: Add a new legal contragent
        Given I am on "admin/sonata/user/commoncontragent/create?subclass=LegalContragent"
        And there no contragents for user with email "test-tst@ekance.com"
        When I fill in the following:
        |Название организации   |ЧП Пупкин                  |
        |ИНН                    |233456789102               |
        |ОГРН                   |314237213500124            |
        |Должность руководителя |Директор                   |
        |ФИО руководителя       |Пупкин Васислий Петрович   |
        |Расчетный счет в банке |40802810501000005313       |
        |Кор. счет              |30101810100000000715       |
        And I select "ИП" from select2 "Организационно-правовая форма"
        And I fill in "Пользователь" with "test-tst@ekance.com"
        And I wait for ajax request will end
        And I choose it in ajax entity
        And I fill in "Банк" with "041806715"
        And I wait for ajax request will end
        And I choose it in ajax entity
        And I click on tab with text "Контактная информация"
        And I fill in the following:
        |Конт. телефон 1        |+380995456711                                                          |
        |Конт. телефон 2        |+380995456722                                                          |
        |Конт. телефон 3        |+380995456733                                                          |
        |Контактный email       |test-indi@ekance.com                                                   |
        |Юрид-кий адрес         |344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1 (10 этаж)   |
        |Почтовый адрес         |344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1001          |
        |ФИО контактного лица   |Пупкин Васислий Петрович                                               |
        |Факс                   |+380995456711                                                           |
        |Сайт компании          |site.com                                                               |
        |Контактный email       |test-legal@ekance.com                                                  |
        When I press "btn_create_and_edit"
        Then I should see "Элемент создан успешно"

    @editLegalContragentBackend
    @mink:selenium2
    Scenario: Edit a legal contragent
        Given there is a contragent with:
        |field              |value                                                                  |
        |phone1             |+380995456711                                                          |
        |phone2             |+380995456722                                                          |
        |phone3             |+380995456733                                                          |
        |fax                |+380995456733                                                          |
        |user               |test-tst@ekance.com                                                    |
        |contactEmail       |test-legal@ekance.com                                                  |
        |inn                |233456789102                                                           |
        |ogrn               |314237213500124                                                        |
        |chiefPosition      |Директор                                                               |
        |chiefFio           |Пупкин Васислий Петрович                                               |
        |bankAccount        |40802810501000005313                                                   |
        |corrAccount        |30101810100000000715                                                   |
        |legalForm          |ip                                                                     |
        |bank               |041806715                                                              |
        |addressLegal       |344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1 (10 этаж)   |
        |addressPost        |344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1001          |
        |contactFio         |Пупкин Васислий Петрович                                               |
        |site               |http://site.com                                                        |
        |organization       |ЧП Пупкин                                                              |
        
        And I am on contragent with email "test-legal@ekance.com" "admin/sonata/user/commoncontragent/%d/edit" page
        When I fill in the following:
        |Название организации   |ЧП Петров                      |
        |Должность руководителя |Индивидулаьный предприниматель |
        |ФИО руководителя       |Петров Петр Иванович           |
        And I click on tab with text "Контактная информация"
        And I fill in the following:
        |Конт. телефон 1        |+380995456714                                                          |
        |Конт. телефон 2        |+380995456725                                                          |
        |Конт. телефон 3        |+380995456715                                                          |
        |Юрид-кий адрес         |344011, г. Ростов-на-Дону, пер.Доломановский, д. 71Д, оф.1 (10 этаж)   |
        |Почтовый адрес         |344011, г. Ростов-на-Дону, пер.Доломановский, д. 71Д, оф.1001          |
        |ФИО контактного лица   |Петров Петр Иванович                                                   |
        |Факс                   |+80995456711                                                           |
        |Сайт компании          |site-peter.com                                                         |
        And I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"    
    
    @deleteLegalContragentBackend
    Scenario: Delete a legal contragent
        Given there is a contragent with:
        |field              |value                                                                  |
        |phone1             |+380995456711                                                          |
        |phone2             |+380995456722                                                          |
        |phone3             |+380995456733                                                          |
        |fax                |+380995456733                                                          |
        |user               |test-tst@ekance.com                                                    |
        |contactEmail       |test-legal@ekance.com                                                  |
        |inn                |233456789102                                                           |
        |ogrn               |314237213500124                                                        |
        |chiefPosition      |Директор                                                               |
        |chiefFio           |Пупкин Васислий Петрович                                               |
        |bankAccount        |40802810501000005313                                                   |
        |corrAccount        |30101810100000000715                                                   |
        |legalForm          |ip                                                                     |
        |bank               |041806715                                                              |
        |addressLegal       |344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1 (10 этаж)   |
        |addressPost        |344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1001          |
        |contactFio         |Пупкин Васислий Петрович                                               |
        |site               |http://site.com                                                        |
        |organization       |ЧП Пупкин                                                              |
        And I am on contragent with email "test-legal@ekance.com" "admin/sonata/user/commoncontragent/%d/edit" page
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"    

    @deleteIndiContragentBackend
    Scenario: Delete an individual contragent
        Given there is a contragent with:
        |field          |value                  |
        |isIndi         |true                   |
        |phone1         |+380995456711          |
        |phone2         |+380995456722          |
        |phone3         |+380995456733          |
        |firstName      |Василий                |
        |lastName       |Пупкин                 |
        |surName        |Петрович               |
        |user           |test-tst@ekance.com    |
        |contactEmail   |test-indi@ekance.com   |
        And I am on contragent with email "test-indi@ekance.com" "admin/sonata/user/commoncontragent/%d/edit" page    
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"  