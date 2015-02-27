#Тестирование админской части пункты выдачи
@officeWorkTimeDateAdmin
Feature: Test office work time web interface in adminzone
    Background:
        Given I am logged in as administrator
    @createOfficeWorkTimeDate
    #@mink:selenium2
    Scenario: Add a new date
        Given I am on "/admin/core/officeworktime/schedule/create"
        And there is no "Schedule" on date "12-01-2014 00:00"
        When I select "Выходной день" from "Тип дня"
        And I fill in "Дата" with "12-01-2014"
        And I press "Создать и редактировать"        
        Then I should see "Элемент создан успешно"
    @editOfficeWorkTimeDate
    Scenario: Edit date
        Given I have a schedule on date "12-01-2014 00:00"
        And I am on "/admin/core/officeworktime/schedule/list"
        And I follow "12 января 2014"
        When I select "Рабочий день" from "Тип дня"
        And I press "Сохранить"
        Then I should see "Элемент успешно обновлен"
    @deleteOfficeWorkTimeDate
    Scenario: Delete date
        Given I have a schedule on date "12-01-2014 00:00"
        And I am on "/admin/core/officeworktime/schedule/list"
        And I follow "12 января 2014"
        When I follow "Удалить"
        Then I should see "Подтверждение удаления"
        And I press "Да, удалить"
        And I should see "Элемент успешно удален"