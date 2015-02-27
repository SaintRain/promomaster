#Тестирование работы api ТК "Деловые линии"
@dellinApi
Feature: Test api for delivery company Dellin

    @deliveryCitiesDellin
    Scenario: Get Delivery Cities (Dellin)
    Given I call "dellin" with "getCities"
    Then the response should be array
    And response first row has "cityId" key with type "string"
    And response first row has "cityName" key with type "string"
    And response first row has "kladrId" key with type "string"
    
    @deliveryCalculateDellin
    Scenario: Calculate delivery Cost (Dellin)
    Given Order information with:
    |field  |value  |
    |price  |1200   |
    |volume |1      |
    |weight |12     |
    And delivery type information with:
    |field          |value  |
    |deliveryFrom   |0      |
    |deliveryTo     |0      |
    And recipient "cityId" is "0x834F00112FDD658311DA4C6326EF0E13"
    And seller "cityId" is "0x81E100112FDD658311DA55B5652DB512"
    And I call "dellin" with "calculate"
    Then the response should be array
    And response has "cost" key with type "double"
    And response has "packages" key with type "integer"
    And response has "days" key with type "array"
    And response has "minDays" key in "days" with type "integer"
    And response has "minDays" key in "days" with type "integer"
    
    @deliveryTrackPackageDellin
    Scenario: Track Delivery Package Status (Dellin)
    Given the following track numbers:
    |trackNum       |
    |АСВЛЭ-6/0511   |
    And I call "dellin" with "trackPackage" 
    Then the response should be array
    

   