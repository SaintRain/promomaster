#Тестирование админской части траблтикеты
@troubleTicketFrontendWebInterface
Feature: Test trouble ticket web interface in user-zone
    
    @askQuestionNotAuth
    Scenario: Add a new trouble ticket from frontend
        Given I am on "contacts.html"
        And there is no trouble ticket with title "Проверка тикета фронтэнд уник"
        When I fill in the following:
        |Имя                |Василий Пупкин                 |
        |E-mail             |saintrain@mail.ru              |
        |Ваш вопрос         |Проверка тикета фронтэнд уник  |
        |Подробное описание |Проверка Проверка Проверка     |
        And I select "Вопросы по товарам" from "Категория вопроса"
        And I press "Отправить"
        Then I should see "По вашему вопросу (обращению) создано сообщение"

    @askQuestionAuth
    Scenario: Add a new trouble ticket from frontend
        Given I am logged in as administrator 
        And I am on "contacts.html"
        And the "E-mail" field should contain "saintrain@mail.ru"
        And there is no trouble ticket with title "Проверка тикета фронтэнд уник"
        When I fill in the following:
        |Имя                |Василий Пупкин                 |
        |Ваш вопрос         |Проверка тикета фронтэнд уник  |
        |Подробное описание |Проверка Проверка Проверка     |
        And I select "Вопросы по товарам" from "Категория вопроса"
        And I press "Отправить"
        Then I should see "По вашему вопросу (обращению) создано сообщение"    
    
    @ticketsListFrontend
    Scenario: View tickets list from frontend
        Given I am logged in as administrator 
        And there is a trouble ticket with:
        |field          |value                                      |
        |title          |Проверка тикета фронтэнд уник              |
        |body           |Тестовая тема Тестовая тема Тестовая тема  |
        |manager        |saintrain@mail.ru                          |
        |user           |saintrain@mail.ru                          |
        |priority       |normalnyi                                  |
        |status         |novaia                                     |
        |readiness      |100                                        |
        |category       |item                                       |
        When I am on "trouble-tickets/index.html"
        Then I should see "Проверка тикета фронтэнд уник"

    @addCommentForTicketFrontend
    Scenario: Add a comment for ticket from frontend
        And there is a trouble ticket with:
        |field          |value                                      |
        |title          |Проверка тикета фронтэнд уник              |
        |body           |Тестовая тема Тестовая тема Тестовая тема  |
        |manager        |saintrain@mail.ru                          |
        |user           |saintrain@mail.ru                          |
        |priority       |normalnyi                                  |
        |status         |novaia                                     |
        |readiness      |100                                        |
        |category       |item                                       |    
    And I am on frontent trouble ticket with title "Проверка тикета фронтэнд уник" "/trouble-tickets/edit-%s.html" page
    When I fill in "message_body" with "Комментарий к тикету"
    And I press "Добавить"
    Then I should see "Комментарий к тикету"

    @closeTicketFrontend
    @mink:selenium2
    Scenario: Add a comment for ticket from frontend
        And there is a trouble ticket with:
        |field          |value                                      |
        |title          |Проверка тикета фронтэнд уник              |
        |body           |Тестовая тема Тестовая тема Тестовая тема  |
        |manager        |saintrain@mail.ru                          |
        |user           |saintrain@mail.ru                          |
        |priority       |normalnyi                                  |
        |status         |novaia                                     |
        |readiness      |100                                        |
        |category       |item                                       |    
        |notClosed      |zakryto                                    |
    And I am on frontent trouble ticket with title "Проверка тикета фронтэнд уник" "/trouble-tickets/edit-%s.html" page
    When I click like link "Закрыть обращение"
    And I wait for ajax request will end
    Then I should see "Закрыт"