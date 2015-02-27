#Тестирование админской части статьи категории (FAQ)
@faqCategotyAdminWebInterface
Feature: Test categories FAQ article web interface in adminzone
    Background:
        Given I am logged in as administrator
    
    @createFaqCategory
    @mink:selenium2
    Scenario: Add a new faq category
        Given there is no faq category with name "child-development"
        And I am on "admin/core/category/faqcategory/create"
        When I fill in the following:
        |Название           |Детское развитие                     |
        |Код/имя категории  |child-development-1                  |
        And I click on tab with text "SEO"
        And I fill in the following:
        |ЧПУ                |child-development-1                  |
        |Title              |child-development-1 Title            |
        |Metakeywords       |child-development-1 Metakeywords     |
        |Metadescription    |child-development-1 description      |
        And I press "btn_create_and_edit"
        Then I should see "Элемент создан успешно"

    @editFaqCategory
    @mink:selenium2
    Scenario: Edit faq category
        Given there is an faq category:
        |field                  |value                                |
        |captionRu              |Детское развитие                     |
        |name                   |child-development-1                  |
        |slug                   |child-development-1                  |
        |titleRu                |child-development-1 Title            |
        |metakeywordsRu         |child-development-1 Metakeywords     |
        |metadescriptionRu      |child-development-1 description      |
        And I am on "admin/core/category/faqcategory/list"
        And I follow "Детское развитие"
        And I wait for ajax request will end
        When I fill in the following:
        |Название           |Детское развитие                     |
        |Код/имя категории  |child-development-1                  |
        And I click on tab with text "SEO"
        And I fill in the following:
        |ЧПУ                |child-development-1                  |
        |Title              |child-development-2 Title            |
        |Metakeywords       |child-development-2 Metakeywords     |
        |Metadescription    |child-development-2 description      |
        And I press "btn_update_and_edit"
        And I wait for ajax request will end
        Then I should see "Элемент успешно обновлен"

    @deleteFaqCategory
    @mink:selenium2
    Scenario: Delete faq category
        Given there is an faq category:
        |field                  |value                                |
        |captionRu              |Детское развитие                     |
        |name                   |child-development-1                  |
        |slug                   |child-development-1                  |
        |titleRu                |child-development-1 Title            |
        |metakeywordsRu         |child-development-1 Metakeywords     |
        |metadescriptionRu      |child-development-1 description      |
        And I am on "admin/core/category/faqcategory/list"
        And I follow "Детское развитие"
        And I wait for ajax request will end
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        
        And I should see "Элемент успешно удален"      