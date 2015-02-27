#Тестирование работы api ТК "ПЭК"
@pekApi
Feature: Test api for delivery company PEK

    @deliveryCitiesPEK    
    Scenario: Get Delivery Cities (PEK)
    Given I call "pek" with "getCities"
    Then the response should be array
    And response first row has "cityId" key with type "integer"
    And response first row has "cityName" key with type "string"
    And response first row has "regionName" key with type "string"

    @deliveryCalculatePEK    
    Scenario: Calculate delivery Cost (PEK)
    Given Order information with:
    |field  |value  |
    |price  |1200   |
    |volume |1      |
    |weight |12     |
    #|price  |volume | |
    #|1200   |1      |12     |
    And recipient "cityId" is "64251"
    And seller "cityId" is "-457"
    And I call "pek" with "calculate"
    Then the response should be array
    And response has "cost" key with type "double"
    And response has "packages" key with type "integer"
    And response has "days" key with type "array"
    And response has "minDays" key in "days" with type "integer"
    And response has "minDays" key in "days" with type "integer"

    @deliveryTrackPackagePEK
    Scenario: Track Delivery Package Status (PEK)
    Given the following track numbers:
    |trackNum       |
    |АСВЛЭ-6/0511   |
    And credentials with:
    |client             |clientKey  |
    |info@olikids.ru    |Ol61ikids  |
    And I call "pek" with "trackPackage" 
    Then the response should be array