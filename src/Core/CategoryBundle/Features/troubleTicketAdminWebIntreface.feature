#Тестирование админской части статьи категории (FAQ)
@troubleTicketCategotyAdminWebInterface
Feature: Test categories for trouble ticket web interface in adminzone
    Background:
        Given I am logged in as administrator
    
    @createTroubleTicketCategory
    @mink:selenium2
    Scenario: Add a new trouble ticket category
        Given there is no trouble ticket category with name "questions-about-goods"
        And I am on "admin/core/category/troubleticketcategory/create"
        When I fill in the following:
        |Название           |Вопросы от товарах тест    |
        |Код/имя категории  |questions-about-goods      |
        And I fill ckeditor in "Описание" with "Краткое описание"
        And I press "btn_create_and_edit"
        Then I should see "Элемент создан успешно"

    @editTroubleTicketCategory
    @mink:selenium2
    Scenario: Edit faq category
        Given there is a trouble ticket category:
        |field                  |value                                |
        |captionRu              |Вопросы от товарах тест              |
        |name                   |questions-about-goods                |
        |descriptionRu          |"Краткое описание"                   |  
        And I am on "admin/core/category/troubleticketcategory/list"
        And I follow "Вопросы от товарах тест"
        And I wait for ajax request will end
        And I fill ckeditor in "Описание" with "<p>Краткое описание</p><p>Краткое описание 2</p>"
        And I press "btn_update_and_edit"
        And I wait for ajax request will end
        Then I should see "Элемент успешно обновлен"

    @deleteTroubleTicketCategory
    @mink:selenium2
    Scenario: Delete faq category
        Given there is a trouble ticket category:
        |field                  |value                                |
        |captionRu              |Вопросы от товарах тест              |
        |name                   |questions-about-goods                |
        |descriptionRu          |"Краткое описание"                   |
        And I am on "admin/core/category/troubleticketcategory/list"
        And I follow "Вопросы от товарах тест"
        And I wait for ajax request will end
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"