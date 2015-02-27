#Тестирование админской части транспротных компаний
@deliveryCompany
Feature: Test delivery company web interface in adminzone
    Background:
        Given I am logged in as administrator
    @createDeliveryCompany    
    Scenario: Add a New Company
        Given I am on "admin/core/delivery/company/create"
        And there is no "Company" with "name" "test"
        When I fill in the following:
        |Название                       |Тест           |
        |Системное имя                  |test           |
        |URL сайта                      |http://test.com|
        |URL страницы калькулятора      |http://test.com|
        |URL страницы отслеживания груза|http://test.com|
        And I press button "btn_create_and_edit"
        Then I should see "Элемент создан успешно"
    @editDeliveryCompany
    Scenario: Edit a Company
        Given I have a "Company" with:
        |field      | value             |
        |captionRu  |Тест               |
        |name       |test               |
        |tracker    |http://test.com    |
        |calculator |http://test.com    |
        |site       |http://test.com    |
        And I am on "/admin/core/delivery/company/list"
        And I follow "Тест"
        When I fill in the following:
        |Название                       |Тест             |
        |Системное имя                  |test             |
        |URL сайта                      |http://test1.com |
        |URL страницы калькулятора      |http://test1.com |
        |URL страницы отслеживания груза|http://test1.com |
        And I press button "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"
    @deleteDeliveryCompany
    Scenario: Delete a Company
        Given I have a "Company" with:
        |field      | value             |
        |captionRu  |Тест               |
        |name       |test               |
        |tracker    |http://test.com    |
        |calculator |http://test.com    |
        |site       |http://test.com    |
        And I am on "/admin/core/delivery/company/list"
        And I follow "Тест"
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"