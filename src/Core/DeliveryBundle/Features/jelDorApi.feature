#Тестирование работы api ТК "ЖелДорЭкспедиция"
@jelDorApi
Feature: Test api for delivery company JelDor

    @deliveryCalculateJelDor
    Scenario: Calculate delivery Cost (JelDor)
    Given Order information with:
    |field  |value  |
    |price  |1200   |
    |volume |1      |
    |weight |12     |
    And recipient "cityName" is "Краснодар"
    And seller "cityName" is "Москва"
    And I call "jelDor" with "calculate"
    Then the response should be array
    And response has "cost" key with type "double"
    And response has "packages" key with type "integer"
    And response has "days" key with type "array"
    And response has "minDays" key in "days" with type "integer"
    And response has "minDays" key in "days" with type "integer"

    @deliveryTrackPackageJelDor
    Scenario: Track Delivery Package Status (JelDor)
    Given the track number "АСВЛЭ пинкод 6/0511" where "cityName" is "Москва"
    And I call "jelDor" with "trackPackage"
    Then the response should be array