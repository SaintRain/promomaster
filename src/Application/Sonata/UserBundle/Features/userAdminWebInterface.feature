#Тестирование админской части статьи (юзер)
@userAdminWebInterface
Feature: Test user web interface in adminzone
    Background:
        Given I am logged in as administrator
    
    @createUserBackend
    Scenario: Add a new user
        Given I am on "admin/sonata/user/user/create"
        And there no user with email "test-test@mail.ru"
        #And I click on tab with text "SEO"
        And I fill in the following:
        |Логин              |test-test@mail.ru  |
        |E-mail             |test-test@mail.ru  |
        |Открытый пароль    |pa55w0rd           |
        |Имя                |Василий            |
        |Фамилия            |Пупкин             |
        |Веб-сайт           |test-test.ru       |
        |Телефон            |+790245678312      |
        |Примечание         |Текст Текст        |
        And I check "Активен"
        And I check "Администратор"
        When I press "btn_create_and_edit"
        Then I should see "Элемент создан успешно"

    @editUserBackend
    Scenario: Edit user
        Given there is a user with:
        |field          |value              |
        |username       |test-test@mail.ru  |
        |email          |test-test@mail.ru  |
        |plainPassword  |pa55w0rd           |
        |firstname      |Василий            |
        |lastname       |Пупкин             |
        |website        |test-test.ru       |
        |phone          |+790245678312      |
        |notation       |Текст Текст        |
        And I am on user with email "test-test@mail.ru" "admin/sonata/user/user/%d/edit" page
        And I fill in the following:
        |Открытый пароль    |password           |
        |Имя                |Петр               |
        |Фамилия            |Петров             |
        |Веб-сайт           |peter-test.ru      |
        |Телефон            |+790245678355      |
        |Примечание         |Текст был обновлен |
        And I check "Активен"
        And I check "Подписка"
        And I check "Администратор"
        When I press "btn_update_and_edit"
        Then I should see "Элемент успешно обновлен"
    
    @deleteUserBackend
    Scenario: Delete user
        Given there is a user with:
        |field          |value              |
        |username       |test-test@mail.ru  |
        |email          |test-test@mail.ru  |
        |plainPassword  |pa55w0rd           |
        |firstname      |Василий            |
        |lastname       |Пупкин             |
        |website        |test-test.ru       |
        |phone          |+790245678312      |
        |notation       |Текст Текст        |
        And I am on user with email "test-test@mail.ru" "admin/sonata/user/user/%d/edit" page
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"      