#Тестирование логики officeWorkTimeLogic
@officeWorkTimeLogic
Feature: Test api for work schedule (Basic Data)
    
    @getOfficestate
    Scenario: Get current office state
    Given today is not weekend or holiday
    Then i should get correct state for "09:00" and "18:00"
    
    @runCronOfficeWorkTimeLogic
    Scenario: Run office work time cron job
    Given i call for a cron job
    Then i should not get exception