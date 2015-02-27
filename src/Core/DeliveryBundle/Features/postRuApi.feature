#Тестирование работы api ТК "ЖелДорЭкспедиция"
@postRuApi
Feature: Test api for delivery company PostRu

    @deliveryCalculatePostRu
    Scenario: Calculate delivery Cost (Ems)
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
    And recipient "cityId" is "130000"
    And seller "cityId" is "344000"
    And I call "postRu" with "calculate"
    Then the response should be array
    And response has "cost" key with type "double"
    And response has "packages" key with type "integer"
    And response has "days" key with type "array"
    And response has "minDays" key in "days" with type "integer"
    And response has "minDays" key in "days" with type "integer"    
    And response has "packages" key with type "integer"

    @deliveryTrackPackagePostRu
    Scenario: Track Delivery Package Status (PostRu)
    Given the following track numbers:
    |trackNum       |
    |АСВЛЭ-6/0511   |
    And credentials with:
    |client             |clientKey  |
    |info@olikids.ru    |Ol61ikids  |
    And I call "postRu" with "trackPackage"
    Then the response should be array

   