#Тестирование админской части статьи (контрагент)
@contactAdminWebInterface
Feature: Test contragent web interface in adminzone
    Background:
        Given there is a user with:
        |field          |value                  |
        |username       |test-tst@ekance.com    |
        |email          |test-tst@ekance.com    |
        |plainPassword  |pa55w0rd               |
        |firstname      |Василий                |
        |lastname       |Пупкин                 |
        |phone          |+790245678312          |
        |enabled        |true                   |
        And there is a contragent with:
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
        And there is a contragent with:
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
        And I am logged in as administrator
    
    @createIndiContactBackend
    @mink:selenium2
    Scenario: Add a new individual contact
        Given there is no individual contact with "test-indi-contact@ekance.com"
        And I am on contragent with email "test-indi@ekance.com" "admin/sonata/user/commoncontragent/%d/edit" page
        And I click on tab with text "Получатели"
        And I follow in form "Добавить новый"
        And I wait for ajax request will end
        When I fill in "Адрес доставки" with "пропект Победы 22"
        And I fill in "Город" with "Москва"
        And I wait for ajax request will end
        And I choose it in ajax entity
        And I click on tab with text "Контактные данные"
        And I fill in "Получатели" block the following:
        |Фамилия            |Пупкин                         |
        |Имя                |Василий                        |
        |Отчество           |Петрович                       |
        |Паспорт            |1234567890                     |
        |Контактный телефон |+380995456733                  |
        |Контактный email   |test-indi-contact@ekance.com   |
        |Примечание         |Примечание                     |
        And I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"

    @editIndiContactBackend
    @mink:selenium2
    Scenario: Edit an individual contact
        Given there is a contact with:
        |field          |value                          |
        |isIndi         |true                           |
        |phone          |+380995456711                  |
        |firstName      |Василий                        |
        |lastName       |Пупкин                         |
        |surName        |Петрович                       |
        |user           |test-tst@ekance.com            |
        |contragent     |test-indi@ekance.com           |
        |contactEmail   |test-indi-contact@ekance.com   |
        |city           |Москва                         |
        |address        |пропект Победы 22              |
        And I am on contragent with email "test-indi@ekance.com" "admin/sonata/user/commoncontragent/%d/edit" page
        And I click on tab with text "Получатели"
        And I click on tab with text "Контактные данные"
        And I fill in "Получатели" block the following:
        |Фамилия            |Петров                         |
        |Имя                |Петр                           |
        |Отчество           |Иванович                       |
        |Паспорт            |12345678933                    |
        |Контактный телефон |+380995456744                  |
        |Примечание         |Примечание ред.                |
        When I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"    
    
    @deleteIndiContactBackend
    Scenario: Delete an individual contact
        Given there is a contact with:
        |field          |value                          |
        |isIndi         |true                           |
        |phone          |+380995456711                  |
        |firstName      |Василий                        |
        |lastName       |Пупкин                         |
        |surName        |Петрович                       |
        |user           |test-tst@ekance.com            |
        |contragent     |test-indi@ekance.com           |
        |contactEmail   |test-indi-contact@ekance.com   |
        |city           |Москва                         |
        |address        |пропект Победы 22              |
        And I am on contragent with email "test-indi@ekance.com" "admin/sonata/user/commoncontragent/%d/edit" page
        #And I click on tab with text "Получатели"
        #And I click on tab with text "Контактные данные"
        When I check in "Получатели" block "Удалить"
        And I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"     

    @createLegalContactBackend
    @mink:selenium2
    Scenario: Add a new legal contact
        Given there is no contacts for contragent with "test-legal@ekance.com"
        And I am on contragent with email "test-legal@ekance.com" "admin/sonata/user/commoncontragent/%d/edit" page
        And I click on tab with text "Адреса"
        And I follow in form "Добавить новый"
        And I wait for ajax request will end
        And I fill in "Город" with "Москва"
        And I wait for ajax request will end
        And I choose it in ajax entity
        And I fill in the following:
        |Адрес доставки     |пропект Победы 44              |
        |Примечание         |Примечание                     |
        And I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен" 

    @editLegalContactBackend
    @mink:selenium2
    Scenario: Edit a legal contact
        Given there is a contact with:
        |field          |value                          |
        |contragent     |test-legal@ekance.com          |
        |city           |Москва                         |
        |address        |пропект Победы 22              |
        And I am on contragent with email "test-legal@ekance.com" "admin/sonata/user/commoncontragent/%d/edit" page
        And I click on tab with text "Адреса"
        And I click on tab with text "Контактные данные"
        And I fill in the following:
        |Адрес доставки     |пропект Победы 22              |
        |Примечание         |Примечание ред.                |
        When I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен" 

    @deleteLegalContactBackend
    Scenario: Delete a legal contact
        Given there is a contact with:
        |field          |value                          |
        |contragent     |test-legal@ekance.com          |
        |city           |Москва                         |
        |address        |пропект Победы 22              |
        And I am on contragent with email "test-legal@ekance.com" "admin/sonata/user/commoncontragent/%d/edit" page
        When I check in "Адреса" block "Удалить"
        And I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен" 
