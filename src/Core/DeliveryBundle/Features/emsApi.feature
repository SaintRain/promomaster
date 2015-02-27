#Тестирование работы api ТК "EMS Россия"
@emsApi
Feature: Test api for delivery company EMS
    
    @deliveryCitiesEms
    Scenario: Get Delivery Cities (EMS)
    Given I call "ems" with "getCities"
    Then the response should be array
    And response first row has "cityId" key with type "string"
    And response first row has "cityName" key with type "string"

    @deliveryCalculateEms
    Scenario: Calculate delivery Cost (EMS)
    Given Order information with:
    |field  |value  |
    |price  |1200   |
    |volume |1      |
    |weight |12     |
    And package number "1930" information with:
    |field      |value                                              |numeric|
    |quantity   |1                                                  |1      |
    |id         |1930                                               |1      |
    |price      |4080                                               |1      |
    |weight     |2.1                                                |1      |
    |length     |0.21                                               |1      |
    |width      |0.33                                               |1      |
    |height     |0.43                                               |1      |
    |title      |Авент Дорожная сумка (5 предметов), цвет черный    |0      |
    |wareKey    |0                                                  |1      |
    |volume     |0.029799                                           |1      |
    And recipient "cityId" is "city--moskva"
    And seller "cityId" is "city--rostov-na-donu"
    And I call "ems" with "calculate"
    Then the response should be array
    And response has "cost" key with type "double"
    And response has "packages" key with type "integer"
    And response has "days" key with type "array"
    And response has "minDays" key in "days" with type "integer"
    And response has "minDays" key in "days" with type "integer"    
    And response has "packages" key with type "integer"

   