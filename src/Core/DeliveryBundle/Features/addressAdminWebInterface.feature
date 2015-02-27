#Тестирование админской части пункты выдачи
@addressAdminWebInterface
Feature: Test delivery pickup place web interface in adminzone
    Background:
        Given I am logged in as administrator
    @createDeliveryAddress
    @mink:selenium2
    Scenario: Add a Pickup place
        Given I am on "admin/core/delivery/address/create"
        And there is no "Address" with "name" "test-address"
        When I fill in the following:
        |Адрес              |Тестовый Московский адрес                                          |
        |Системное имя      |test-address                                                       |
        |Описание           |Тестовый адрес описание                                            |
        |Ссылка на карту    |http://maps.yandex.ru/?um=S7bDCdK3tN_7tqatGNT0YrWZDkmFy4g6&l=map   |
        |Широта             |47,227                                                             |
        |Долгота            |39,695                                                             |
        And I fill in "Город" with "Москва"
        And I wait for ajax request will end
        And I choose it in ajax entity
        And I select radio button the "Возможна оплата пластиковой картой" with "Нет"
        And I select radio button the "Статус" with "Выкл."
        And I press button "Создать и редактировать"        
        Then I should see "Элемент создан успешно"
    @editDeliveryAddress
    @mink:selenium2
    Scenario: Edit Address
        Given I have a "Address" with:
        |field      | value                                                                     |
        |captionRu  |Тестовый Московский адрес                                                  |
        |name       |test-address                                                               |
        |mapLink    |http://maps.yandex.ru/?um=S7bDCdK3tN_2tqatG470YrWZDkmFy4g6&l=map           |
        |latitude   |55,227                                                                     |
        |longitude  |16,695                                                                     |
        |city       |Москва                                                                     |
        And I am on "/admin/core/delivery/address/list"
        And I follow "Тестовый Московский адрес"
        When I fill in the following:
        #|Ссылка на карту    |http://maps.yandex.ru/?um=S7bDCdK3tN_7tqatGNT0YrWZDkmFy4g6&l=map   |
        |Широта             |47,227                                                             |
        |Долгота            |39,695                                                             |
        And I fill in "Город" with "Краснодар"
        And I wait for ajax request will end
        And I choose it in ajax entity
        And I select radio button the "Возможна оплата пластиковой картой" with "Да"
        And I select radio button the "Статус" with "Выкл."
        And I press button "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"
    @deleteDeliveryAddress
    Scenario: Delete Service Type
        Given I have a "Address" with:
        |field      | value                                                                     |
        |captionRu  |Тестовый Московский адрес                                                  |
        |name       |test-address                                                               |
        |mapLink    |http://maps.yandex.ru/?um=S7bDCdK3tN_2tqatG470YrWZDkmFy4g6&l=map           |
        |latitude   |55,227                                                                     |
        |longitude  |16,695                                                                     |
        |city       |Москва                                                                     |
        And I am on "/admin/core/delivery/address/list"
        And I follow "Тестовый Московский адрес"
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"     