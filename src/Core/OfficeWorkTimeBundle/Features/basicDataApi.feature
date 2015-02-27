#Тестирование работы api "Basic Data"
@basicDataApi
Feature: Test api for work schedule (Basic Data)

    @scheduleBasicData
    Scenario: Read work schedule from Basic Data
    Given that want to get work schedule for "basicData"
    When I call "getSchedule" from "basicData"
    Then the response should be array
    #And response has  key with type "boolean"
    #And response has  key first row type "integer"