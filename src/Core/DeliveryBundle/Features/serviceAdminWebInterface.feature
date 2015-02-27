#Тестирование админской части доставка
@adminDeliveryService
Feature: Test delivery service web interface in adminzone
    Background:
        Given I am logged in as administrator
    @createDeliveryServiceSimple
    Scenario: Add a new Simple Service
        Given I am on "admin/core/delivery/service/create?subclass=Service"
        And there is no "Service" with "name" "test-simple-service"
        When I fill in the following:
        |Название               |Тестовая простая доставка                                          |
        |Системное имя          |test-simple-service                                                |
        |Мин. суммма заказа     |100                                                                |
        |Макс. сумма заказа     |10000                                                              |
        And I select "Почта" from "Тип доставки"
        And I select "Olikids" from "Транспортная компания"
        And I select "Дверь" from "Забор груза"
        And I select "Дверь" from "Доставка груза"
        And I check radio button the "На странице продукта" with "Да" 
        And I check radio button the "Наложный платеж" with "Да" 
        And I press button "Создать и редактировать"        
        Then I should see "Элемент создан успешно"
    @createDeliveryDpdService
    @mink:selenium2
    Scenario: Add a new DPD Service With Inetrnal Code
        Given I am on "admin/core/delivery/service/create?subclass=Service"
        And there is no "Service" with "name" "test-dpd-service"
        When I fill in the following:
        |Название               |Тестовая DPD доставка                                              |
        |Системное имя          |test-dpd-service                                                   |
        |Мин. суммма заказа     |100                                                                |
        |Макс. сумма заказа     |10000                                                              |
        And I select "Транспортная компания" from select2 "Тип доставки"
        And I select "DPD" from select2 "Транспортная компания"
        And I wait for ajax request will end
        And I select "DPD CLASSIC domestic" from select2 "Сис-ное имя внутри компании"
        And I select "Дверь" from select2 "Забор груза"
        And I select "Дверь" from select2 "Доставка груза"
        And I select radio button the "На странице продукта" with "Да"
        And I select radio button the "Наложный платеж" with "Да"
        And I press button "Создать и редактировать"        
        Then I should see "Элемент создан успешно"
    @createDeliveryCDEKService
    @mink:selenium2
    Scenario: Add a new CDEK Service With Inetrnal Code
        Given I am on "admin/core/delivery/service/create?subclass=Service"
        And there is no "Service" with "name" "test-cdek-service"
        When I fill in the following:
        |Название               |Тестовая CDEK доставка                                             |
        |Системное имя          |test-cdek-service                                                  |
        |Мин. суммма заказа     |100                                                                |
        |Макс. сумма заказа     |10000                                                              |
        And I select "Курьерская компания" from select2 "Тип доставки"
        And I select "CDEK" from select2 "Транспортная компания"
        And I wait for ajax request will end
        And I select "Экспресс лайт склад-дверь" from select2 "Сис-ное имя внутри компании"
        And option "Склад" from disabled select2 "Забор груза" must be selected
        And option "Дверь" from disabled select2 "Доставка груза" must be selected
        And I select radio button the "На странице продукта" with "Да"
        And I select radio button the "Наложный платеж" with "Нет"
        And I press button "Создать и редактировать"
        Then I should see "Элемент создан успешно"
    @createDeliveryServiceInCity
    @mink:selenium2
    Scenario: Add a new Simple Service
        Given I am on "admin/core/delivery/service/create?subclass=ServiceInCity"
        And there is no "Service" with "name" "test-in-city-service"
        And there is only one option "Olikids" in "Транспортная компания"
        And there is only one option "Склад" in "Забор груза"
        And there is only one option "Дверь" in "Доставка груза"
        When I fill in the following:
        |Название               |Тестовая  адресная доставка                                        |
        |Системное имя          |test-in-city-service                                               |
        |Мин. суммма заказа     |100                                                                |
        |Макс. сумма заказа     |10000                                                              |
        |Описание               | This is a simple description... This is a simple description      |
        And I fill in "Город" with "Краснодар"
        And I wait for ajax request will end
        And I choose it in ajax entity
        And I select "Транспортная компания" from select2 "Тип доставки"
        And I press button "Создать и редактировать"        
        Then I should see "Элемент создан успешно"
    @createDeliveryServiceSelfPickUp
    Scenario: Add a new Self Pickup Service 
        Given I am on "admin/core/delivery/service/create?subclass=ServiceWithAddress"
        And there is no "Service" with "name" "test-selfpickup-service"
        And there is only one option "Olikids" in "Транспортная компания"
        When I fill in the following:
        |Название               |Тестовая доставка - самовывоз                                      |
        |Системное имя          |test-selfpickup-service                                            |
        |Мин. суммма заказа     |100                                                                |
        |Макс. сумма заказа     |10000                                                              |
        And I select "Ростов-на-Дону, пер.Доломановский, д. 70Д, офис №1001 (10 этаж)" from "Пункты"
        And I select "Транспортная компания" from "Тип доставки"
        And I select "Да" from "Наложный платеж"
        And I press button "Создать и редактировать"        
        Then I should see "Элемент создан успешно"    
    @editDeliveryService
    Scenario: Edit Delivery Service 
        Given I have a Service with data:
        |captionRu                  |name               |deliveryFrom   |deliveryTo |buyerType      |minSum |maxSum|serviceTypeId   |companyId  |
        |Тестовая простая доставка  |test-simple-service|true           |true       |IndiContragent |100    |100000|1               |10         |
        #|field          | value                     |
        #|captionRu      |Тестовая простая доставка  |
        #|name           |test-simple-service        |
        #|deliveryFrom   |true                       |
        #|deliveryTo     |true                       |
        #|buyerType      |IndiContragent             |
        #|minSum         |100                        |
        #|maxSum         |100000                     |
        #|serviceTypeId  |1                          |
        #|companyId      |10                         |
        And I am on "/admin/core/delivery/service/list"
        And I follow "Тестовая простая доставка"
        When I fill in the following:
        |Название               |Тестовая простая доставка                                          |
        |Системное имя          |test-simple-service                                                |
        |Мин. суммма заказа     |100                                                                |
        |Макс. сумма заказа     |10000                                                              |
        And I select "Почта" from "Тип доставки"
        And I select "Olikids" from "Транспортная компания"
        And I select "Дверь" from "Забор груза"
        And I select "Дверь" from "Доставка груза"
        And I check radio button the "На странице продукта" with "Нет" 
        And I check radio button the "Наложный платеж" with "Нет" 
        And I press button "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен" 
    @deleteDeliveryService
    Scenario: Delete a Service
        Given I have a Service with data:
        |captionRu                  |name               |deliveryFrom   |deliveryTo |buyerType      |minSum |maxSum|serviceTypeId   |companyId  |
        |Тестовая простая доставка  |test-simple-service|true           |true       |IndiContragent |100    |100000|1               |10         |
        And I am on "/admin/core/delivery/service/list"
        And I follow "Тестовая простая доставка"
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"    