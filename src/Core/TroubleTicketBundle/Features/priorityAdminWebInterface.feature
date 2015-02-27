#Тестирование админской части траблтикеты (приоритеты)
@troubleTicketPriorityAdminWebInterface
Feature: Test trouble ticket priority web interface in adminzone
    Background:
        Given I am logged in as administrator
    
    @createTroubleTicketPriority
    #@mink:selenium2
    Scenario: Add a new trouble ticket priority
        Given I am on "admin/core/troubleticket/priority/create"
        And there is no priority with name "test-priority"
        When I fill in the following:
        |Название               |Тестовый Приоритет |
        |Системное имя          |test-priority      |
        |Поизиция сортировки    |6                  |
        And I press "btn_create_and_edit"
        Then I should see "Элемент создан успешно"

    @editTroubleTicketPriority
    #@mink:selenium2
    Scenario: Edit trouble ticket priority
        Given there is a trouble ticket priority with:
        |field          |value              |
        |name           |test-priority      |
        |captionRu      |Тестовый Приоритет |
        |indexPosition  |6                  |
        And I am on trouble ticket priority with name "test-priority" "admin/core/troubleticket/priority/%d/edit" page
        When I fill in the following:
        |Название               |Тестовый Приоритет обновлен |
        |Системное имя          |test-priority      |
        |Поизиция сортировки    |4                  |
        And I uncheck "Активность"
        And I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"
    
    @deleteTroubleTicketPriority
    #@mink:selenium2
    Scenario: Delete trouble ticket priority
        Given there is a trouble ticket priority with:
        |field          |value              |
        |name           |test-priority      |
        |captionRu      |Тестовый Приоритет |
        |indexPosition  |6                  |
        And I am on trouble ticket priority with name "test-priority" "admin/core/troubleticket/priority/%d/edit" page
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"      