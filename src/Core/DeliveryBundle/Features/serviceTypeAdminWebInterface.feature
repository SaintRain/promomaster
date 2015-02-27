#Тестирование админской части тип достаки
@deliveryService
Feature: Test delivery service type web interface in adminzone
    Background:
        Given I am logged in as administrator
    @createDeliveryServiceType
    Scenario: Add a New Service Type
        Given I am on "admin/core/delivery/servicetype/create"
        And there is no "ServiceType" with "name" "test-delivery"
        When I fill in the following:
        |Название                       |Тестовая доставка  |
        |Системное имя                  |test-delivery      |
        |Позиция сортировки             |3                  |
        And I check the "Выкл." radio button
        And I press button "btn_create_and_edit"
        Then I should see "Элемент создан успешно"
    @editDeliveryServiceType
    Scenario: Edit Service Type
        Given I have a "ServiceType" with:
        |field      | value             |
        |captionRu  |Тестовая доставка  |
        |name       |test-delivery      |
        And I am on "/admin/core/delivery/servicetype/list"
        And I follow "Тестовая доставка"
        When I fill in the following:
        |Название                       |Тестовая доставка  |
        |Системное имя                  |test-delivery      |
        |Позиция сортировки             |2                  |
        And I check the "Вкл." radio button
        And I press button "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"    
    @deleteDeliveryServiceType
    Scenario: Delete Service Type
        Given I have a "ServiceType" with:
        |field      | value             |
        |captionRu  |Тестовая доставка  |
        |name       |test-delivery      |
        And I am on "/admin/core/delivery/servicetype/list"
        And I follow "Тестовая доставка"
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"    