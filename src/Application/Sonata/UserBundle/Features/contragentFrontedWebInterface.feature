#Тестирование клиентской части статьи (контрагент)
@contragetnFrontendWebInterface
Feature: Test contragent web interface on frontend
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
        And there no contragents for user with email "test-tst@ekance.com"
        And I am login as "test-tst@ekance.com" with "pa55w0rd"

    @createIndiContragentFrontend
    #@mink:selenium2
    Scenario: Add a new individual contragent (Frontend)
        Given I am on "contragent/create.html"
        When I fill in the following:
        |Фамилия    |Пупкин                 |
        |Имя        |Василий                |
        |Отчество   |Петрович               |
        |Телефон    |0995456711             |
        |E-mail     |test-indi@ekance.com   |
        When I press "Добавить"
        Then I should be on "/contragent/index.html"
        And I should see "Плательщик добавлен успешно"

    @editIndiContragentFrontend
    Scenario: Edit an individual contragent (Frontend)
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
    And I am on contragent with email "test-indi@ekance.com" "contragent/edit-%d-%d.html" frontend page
    And I fill in the following:
        |Фамилия                |Петров         |
        |Имя                    |Петр           |
        |Отчество               |Иванович       |
        |Телефон                |+380665456711  |
    When I press "Сохранить"
    Then I should see "Данные успешно обновлены"
    
    @deleteIndiContragentFrontend
    @mink:selenium2
    Scenario: Delete an individual contragent (Frontend)
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
        And I am on "contragent/index.html"
    #    And I should see "Информация о получателях не найдена"
        When I follow "Удалить"
    #    And I wait for ajax request will end
    #    And I wait for ajax request will end
    #    Then I should not see "Информация о получателях не найдена" 
    
    @createLegalContragentFrontend
    @mink:selenium2
    Scenario: Add a new legal contragent (Frontend)
        Given I am on "contragent/create.html"
        And I check "Юридическое лицо" from contragents type
        When I fill in the following:
        |Название организации               |ЧП Пупкин                                                              |
        |ИНН                                |233456789102                                                           |
        |ОГРН                               |314237213500124                                                        |
        |Должность руководителя             |Директор                                                               |
        |ФИО руководителя                   |Пупкин Васислий Петрович                                               |
        |Расчетный счет в банке             |40802810501000005313                                                   |
        |Кор. счет                          |30101810100000000715                                                   |
        |Юридический адрес                  |344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1 (10 этаж)   |
        |Почтовый адрес                     |344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1001          |
        |ФИО контактного лица               |Пупкин Васислий Петрович                                               |
        |Сайт компании                      |http://site.com                                                        |
        |legal_contragent_form_contactEmail |test-legal@ekance.com                                                  |
        And fill "0995456711" in masked "legal_contragent_form_phone1"
        And fill "+380995456711" in masked "legal_contragent_form_fax"
        And I select "ИП" from "Организационно-правовая форма"
        And I fill in "БИК банка" with "041806715"
        And I wait for ajax request will end
        And I choose it in ajax entity       
        And I submit visible form
        Then I should be on "/contragent/index.html"
        And I should see "Плательщик добавлен успешно"
    
    @editLegalContragentFrontend
    #@mink:selenium2
    Scenario: Add a new legal contragent (Frontend)
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
        And I am on contragent with email "test-legal@ekance.com" "contragent/edit-%d-%d.html" frontend page
        When I fill in the following:
        |Название организации               |ЧП Петров                                                              |
        |ИНН                                |233456789102                                                           |
        |ОГРН                               |314237213500124                                                        |
        |Должность руководителя             |Директор                                                               |
        |ФИО руководителя                   |Петров Иван Иванович                                                   |
        |Расчетный счет в банке             |40802810501000005313                                                   |
        |Кор. счет                          |30101810100000000715                                                   |
        |Юридический адрес                  |344011, г. Ростов-на-Дону, пер.Доломановский, д. 71Д, оф.2 (10 этаж)   |
        |Почтовый адрес                     |344011, г. Ростов-на-Дону, пер.Доломановский, д. 71Д, оф.1001          |
        |ФИО контактного лица               |Пупкин Васислий Петрович                                               |
        |Сайт компании                      |http://petersite.com                                                   |
        |Телефон                            |+380665456711                                                          |
        |Факс                               |+380665456711                                                          |
        And I select "ИП" from "Организационно-правовая форма"
        When I press "Сохранить"
        Then I should see "Данные успешно обновлены"
    
    @deleteLegalContragentFrontend
    @mink:selenium2    
    Scenario: Add a new legal contragent (Frontend)
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
        And I am on "contragent/index.html"
        #And I should see "Информация о получателях не найдена"
        When I follow "Удалить"
        #And I wait for ajax request will end
        #Then I should not see "Удалить"    