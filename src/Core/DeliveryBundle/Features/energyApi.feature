#Тестирование работы api ТК "Энергия"
@energyApi
Feature: Test api for delivery company Energy

    @deliveryCitiesEnergy
    Scenario: Get Delivery Cities (Energy)
    Given I call "energy" with "getCities"
    Then the response should be array
    And response first row has "cityId" key with type "integer"
    And response first row has "cityName" key with type "string"

    @deliveryCalculateEnergy
    Scenario: Calculate delivery Cost (Energy)
    Given Order information with:
    |field  |value  |
    |price  |1200   |
    |volume |1      |
    |weight |12     |
    And recipient "cityId" is "495"
    And seller "cityId" is "863"
    And I call "energy" with "calculate"
    Then the response should be array
    And response has "cost" key with type "double"
    And response has "packages" key with type "integer"
    And response has "days" key with type "array"
    And response has "minDays" key in "days" with type "integer"
    And response has "minDays" key in "days" with type "integer"    
    And response has "packages" key with type "integer"
    
    @deliveryTrackPackageEnergy
    Scenario: Track Delivery Package Status (Energy)
    Given the track number "АСВЛЭ пинкод 6/0511" where "cityId" is "495"
    And I call "energy" with "trackPackage"
    Then the response should be array
    