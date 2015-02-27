#Тестирование фронтэнд (юзер)
@userFrontendWebInterface
Feature: Test user frontend interface
    Background:
        Given there no user with email "test-test@ekance.com"

    @registerUserFrontend
    #@mink:selenium2
    Scenario: New user registration
    Given I am on "register.html"
    When I fill in the following:
        |Ваш e-mail         |test-test@ekance.com   |
        |Пароль             |pa55w0rd               |
        |Пароль еще раз     |pa55w0rd               |
        When I press "Регистрация"
        Then I should be on "register/check-email.html"
        And I should see "Ваша регистрация успешно завершена. Подтверждение выслано на ваш E-mail"

    @registrarionConfirmationUserFrontend
    #@mink:selenium2
    Scenario: Confirm registration
        Given there is a user with:
        |field              |value                                          |
        |username           |test-test@ekance.com                           |
        |email              |test-test@ekance.com                           |
        |plainPassword      |pa55w0rd                                       |
        |confirmationToken  |XttsVRr0hidlvoMHxOOgVUidxYjX8yFw6F6aSOpl70w    |
        When I am on user with email "test-test@ekance.com" registration confiramtion "/register/confirm/%s.html" page
        Then I should be on "register/confirmed.html"    
        And I should see "Поздравляем test-test@ekance.com, ваш аккаунт подтвержден."

    @loginUserFrontend
    #@mink:selenium2
    Scenario: Login
        Given there is a user with:
        |field              |value                                          |
        |username           |test-test@ekance.com                           |
        |email              |test-test@ekance.com                           |
        |plainPassword      |pa55w0rd                                       |
        |enabled            |true                                           |
        And I am on "login.html"
        When I fill in the following:
        |Ваш e-mail         |test-test@ekance.com   |
        |Пароль             |pa55w0rd               |
        And I press "Войти"
        Then I should be on "profile.html"
        And I should see "Персональная информация"
    
    @forgotPasswordUserFrontend
    #@mink:selenium2
    Scenario: Request for forgot password
        Given there is a user with:
        |field              |value                                          |
        |username           |test-test@ekance.com                           |
        |email              |test-test@ekance.com                           |
        |plainPassword      |pa55w0rd                                       |
        |enabled            |true                                           |
        And I am on "resetting/request.html"
        When I fill in the following:
        |Ваш e-mail         |test-test@ekance.com   |
        And I press "Восстановить"
        Then I should be on "resetting/check-email.html"
        And I should see "Письмо на адрес test-test@ekance.com уже отправлено. Оно содержит ссылку, при переходе по которой ваш пароль будет сброшен."    
    
    @passwordRecoveryUserFrontend
    #@mink:selenium2
    Scenario: Password recovery
        Given there is a user with:
        |field                  |value                                          |
        |username               |test-test@ekance.com                           |
        |email                  |test-test@ekance.com                           |
        |plainPassword          |pa55w0rd                                       |
        |enabled                |true                                           |
        |confirmationToken      |XttsVRr0hidlvoMHxOOgVUidxYjX8yFw6F6aSOpl70w    |
        |passwordRequestedAt    |now                                            |
        When I am on user with email "test-test@ekance.com" password recovery "resetting/reset/%s.html" page
        And I should see "Восстановление пароля"
        And I fill in the following:
        |Пароль             |pa55w0rd               |
        |Пароль еще раз     |pa55w0rd               |
        And I press "Изменить пароль"
        Then I should be on "profile.html"
        And I should see "Персональная информация"

    @editUserFrontend
    #@mink:selenium2
    Scenario: Edit only user information
        Given there is a user with:
        |field                  |value                                          |
        |username               |test-test@ekance.com                           |
        |email                  |test-test@ekance.com                           |
        |plainPassword          |pa55w0rd                                       |
        |enabled                |true                                           |
        And I am login as "test-test@ekance.com" with "pa55w0rd"
        And I am on "profile.html"
        When I fill in the following:
        |Фамилия            |Петров             |
        |Имя                |Петр               |
        |Телефон            |+790245678355      |
        |Примечание         |Текст был обновлен |
        And I check "Получать новости"
        When I press "Сохранить изменения"
        Then I should see "Данные успешно обновлены"    
    
    @changeEmailUserFrontend
    Scenario: Change email from profile page
        Given there no user with email "test-quest@ekance.com"
        And there is a user with:
        |field                  |value                                          |
        |username               |test-test@ekance.com                           |
        |email                  |test-test@ekance.com                           |
        |plainPassword          |pa55w0rd                                       |
        |enabled                |true                                           |
        And I am login as "test-test@ekance.com" with "pa55w0rd"
        And I am on "profile.html"
        When I fill in the following:
        |Фамилия            |Петров                 |
        |Имя                |Петр                   |
        |Телефон            |+790245678355          |
        |Примечание         |Текст был обновлен     |
        |E-mail             |test-quest@ekance.com  |
        And I check "Получать новости"
        When I press "Сохранить изменения"
        Then I should see "Ваш email будет изменен после его активации по ссылки в высланом нами письме"
    
    @changeEmailConfirmationUserFrontend
    #@mink:selenium2
    Scenario: Change email confirmation after request from profile
        Given there no user with email "test-quest@ekance.com"
        And there is a user with:
        |field                  |value                              |
        |username               |test-test@ekance.com               |
        |email                  |test-test@ekance.com               |
        |plainPassword          |pa55w0rd                           |
        |enabled                |true                               |
        |newEmail               |test-quest@ekance.com              |
        |newEmailHash           |cc152caf2a9c1bcf5acc39fd4444f170   |               
        And I am login as "test-test@ekance.com" with "pa55w0rd"
        When I am on user with email "test-test@ekance.com" email confimation "/change-email-%s.html" page
        Then I should be on "profile.html"
        And I should see "Ваш email успешно изменен"
