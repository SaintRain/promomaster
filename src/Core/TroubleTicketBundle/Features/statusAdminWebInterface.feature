#Тестирование админской части траблтикеты (статусы)
@troubleTicketStatusAdminWebInterface
Feature: Test trouble ticket status web interface in adminzone
    Background:
        Given I am logged in as administrator
    
    @createTroubleTicketStatus
    #@mink:selenium2
    Scenario: Add a new trouble ticket status
        Given I am on "admin/core/troubleticket/status/create"
        And there is no status with name "test-status"
        When I fill in the following:
        |Название               |Тестовый Статус    |
        |Системное имя          |test-status        |
        |Поизиция сортировки    |6                  |
        And I press "btn_create_and_edit"
        Then I should see "Элемент создан успешно"

    @editTroubleTicketStatus
    #@mink:selenium2
    Scenario: Edit trouble ticket status
        Given there is a trouble ticket status with:
        |field          |value              |
        |name           |test-status        |
        |captionRu      |Тестовый Статус    |
        |indexPosition  |6                  |
        And I am on trouble ticket status with name "test-status" "admin/core/troubleticket/status/%d/edit" page
        When I fill in the following:
        |Название               |Тестовый Статус обновлен   |
        |Системное имя          |test-status                |
        |Поизиция сортировки    |4                          |
        And I uncheck "Активность"
        And I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"
    
    @deleteTroubleTicketStatus
    #@mink:selenium2
    Scenario: Delete trouble ticket status
        Given there is a trouble ticket status with:
        |field          |value              |
        |name           |test-status        |
        |captionRu      |Тестовый Статус    |
        |indexPosition  |6                  |
        And I am on trouble ticket status with name "test-status" "admin/core/troubleticket/status/%d/edit" page
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"      