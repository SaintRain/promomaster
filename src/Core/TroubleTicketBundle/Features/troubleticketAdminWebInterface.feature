#Тестирование админской части траблтикеты
@troubleTicketAdminWebInterface
Feature: Test trouble ticket web interface in adminzone
    Background:
        Given I am logged in as administrator
    
    @createTroubleTicket
    @mink:selenium2
    Scenario: Add a new trouble ticket
        Given I am on "admin/core/troubleticket/troubleticket/create"
        And there is no trouble ticket with title "Тестовая тема"
        When I fill in the following:
        |Тема       |Тестовая тема                              |
        |Описание   |Тестовая тема Тестовая тема Тестовая тема  |
        And I select "saintrain@mail.ru" from select2 "Назначена"
        And I select "10%" from select2 "Готовность"
        And I select "Новая" from select2 "Статус"
        And I select "Нормальный" from select2 "Приоритет"
        And I select "Вопросы по товарам" from categoryTreeSelect "Категория"
        And I press "btn_create_and_edit"
        Then I should see "Элемент создан успешно"

    @editTroubleTicket
    @mink:selenium2
    Scenario: Edit trouble ticket
        Given there is a trouble ticket with:
        |field          |value                                      |
        |title          |Тестовая тема                              |
        |body           |Тестовая тема Тестовая тема Тестовая тема  |
        |manager        |saintrain@mail.ru                          |
        |user           |saintrain@mail.ru                          |
        |priority       |normalnyi                                  |
        |status         |novaia                                     |
        |readiness      |100                                        |
        |category       |item                                       |
        And I am on trouble ticket with title "Тестовая тема" "admin/core/troubleticket/troubleticket/%d/edit" page
        And I follow "Редактировать"
        And I follow "Больше"
        When I fill in the following:
        |Описание   |Тестовая темка Тестовая текма Тестовая темка   |
        |Примечания |Тестововое примечание                          |
        And I select "100%" from select2 "Готовность"
        And I select "Выполнен" from select2 "Статус"
        And I select "Срочный" from select2 "Приоритет"
        And I select "Вопросы по заказу" from categoryTreeSelect "Категория"
        And I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"
        
    @subscritionTroubleTicket
    @mink:selenium2
    Scenario: Edit trouble ticket
        Given there is a trouble ticket with:
        |field          |value                                      |
        |title          |Тестовая тема                              |
        |body           |Тестовая тема Тестовая тема Тестовая тема  |
        |manager        |saintrain@mail.ru                          |
        |user           |saintrain@mail.ru                          |
        |priority       |normalnyi                                  |
        |status         |novaia                                     |
        |readiness      |100                                        |
        |category       |item                                       |
        And I am on trouble ticket with title "Тестовая тема" "admin/core/troubleticket/troubleticket/%d/edit" page
    And I follow "Следить"
    And I wait for ajax request will end
    And I should see subscription text
    
    @copyTroubleTicket
    #@mink:selenium2
    Scenario: Copy trouble ticket from another
        Given there is a trouble ticket with:
        |field          |value                                      |
        |title          |Тестовая тема                              |
        |body           |Тестовая тема Тестовая тема Тестовая тема  |
        |manager        |saintrain@mail.ru                          |
        |user           |saintrain@mail.ru                          |
        |priority       |normalnyi                                  |
        |status         |novaia                                     |
        |readiness      |100                                        |
        |category       |item                                       |
        And I am on trouble ticket with title "Тестовая тема" "admin/core/troubleticket/troubleticket/%d/edit" page
        And I follow "Копировать"
        And I should see "Создание тикета"
        When I fill in "Тема" with "Тестовая тема клон"
        And I press "btn_create_and_edit"
        Then I should see "Элемент создан успешно"
        And trouble ticket with title "Тестовая тема клон" selfdesctruct
    
    @deleteTroubleTicket
    #@mink:selenium2
    Scenario: Delete trouble ticket priority
        Given there is a trouble ticket with:
        |field          |value                                      |
        |title          |Тестовая тема                              |
        |body           |Тестовая тема Тестовая тема Тестовая тема  |
        |manager        |saintrain@mail.ru                          |
        |user           |saintrain@mail.ru                          |
        |priority       |normalnyi                                  |
        |status         |novaia                                     |
        |readiness      |100                                        |
        |category       |item                                       |
        And I am on trouble ticket with title "Тестовая тема" "admin/core/troubleticket/troubleticket/%d/delete" page
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"      