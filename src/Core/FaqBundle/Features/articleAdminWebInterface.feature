#Тестирование админской части статьи
@articleAdminWebInterface
Feature: Test FAQ article web interface in adminzone
    Background:
        Given I am logged in as administrator
    
    @createArticle
    @mink:selenium2
    Scenario: Add a new article
        Given I am on "admin/core/faq/article/create"
        And I select "FAQ" from categoryTreeSelect "Категория"
        And there is no article with name "test-article"
        And I fill in "Название" with "Тестовая статья"
        And I fill ckeditor in "Тело статьи" with "Тестовая статья"
        And I click on tab with text "SEO"
        And I fill in the following:
        |ЧПУ                            |test-article       |
        |Title                          |Тестовая статья    |
        |Metakeywords                   |test-article       |
        |Metadescription                |test-article       |
        And I press "btn_create_and_edit"
        Then I should see "Элемент создан успешно"

    @editArticle
    @mink:selenium2
    Scenario: Add a new article
        Given there is an Article with:
        |field              |value                |
        |captionRu          |Тестовая статья      |
        |isActive           |1                    |
        |isOnMain           |1                    |
        |isPredifinedAnswer |1                    |
        |bodyRu             |Тестовая статья      |
        |category           |child-development-1  | 
        |slug               |test-article         |
        |titleRu            |test-article         |
        |metakeywordsRu     |test-article         |
        |metadescriptionRu  |test-article         |
        And I am on article with slug "test-article" "admin/core/faq/article/%s/edit" page
        When I select "Доставка" from categoryTreeSelect "Категория"
        And I fill in "Название" with "Тестовая статья"
        And I fill ckeditor in "Тело статьи" with "<p>Тестовая статья</p><p>Тестовая статья</p>"
        And I click on tab with text "SEO"
        And I fill in the following:
        |Metakeywords                   |test-article-1         |
        |Metadescription                |test-article-1         |
        And I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"
    
    @deleteArticle
    Scenario: Delete Service Type
        Given there is an Article with:
        |field              |value                |
        |captionRu          |Тестовая статья      |
        |isActive           |1                    |
        |isOnMain           |1                    |
        |isPredifinedAnswer |1                    |
        |bodyRu             |Тестовая статья      |
        |category           |child-development-1  | 
        |slug               |test-article         |
        |titleRu            |test-article         |
        |metakeywordsRu     |test-article         |
        |metadescriptionRu  |test-article         |
        And I am on article with slug "test-article" "admin/core/faq/article/%s/edit" page
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"      