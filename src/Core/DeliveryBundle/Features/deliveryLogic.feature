#Тестирование работы логики доставки
@deliveryLogic
Feature: Test api for delivery company DPD
    
    Background:
        Given there is a default seller
        And delivery companies:
        |companyName    |
        |dellin         |
        |dpd            |
        |cdek           |
        |energy         |
        |ems            |
        |pek            |
        |jel_dor        |
        |post_ru        |
        |test_company   |
        And delivery methods:
        |deliveryMethodName                 |serviceType        |companyName    |deliveryFrom   |deliveryTo |maxSum |minSum |internalCode   |
        |dellin_default                     |transport_company  |dellin         |0              |0          |0      |0      |0              |
        |dpd_classic_parcel_warehouse_door  |transport_company  |dpd            |0              |1          |0      |0      |"PCL"          |
        |warehouse_warehouse_default        |transport_company  |cdek           |0              |0          |0      |0      |136            |    
        |energy_default                     |transport_company  |energy         |0              |0          |0      |0      |               |
        |ems_default                        |transport_company  |ems            |0              |0          |0      |0      |               |
        |pek_default                        |transport_company  |pek            |0              |0          |0      |0      |               |
        |jel_dor_default                    |transport_company  |jel_dor        |0              |0          |0      |0      |               |
        |post_ru_default                    |transport_company  |post_ru        |0              |0          |0      |0      |               |
        |test_ru_default                    |transport_company  |test_company   |0              |0          |0      |0      |               |
        
    #@deliveryCities
    #Scenario: Get Delivery Cities
    #When i call for getCities
    #Then response should be "integer"
    
    @deliveryAffiliates
    Scenario Outline: Get Delivery Affiliates
    Given configurate deliveryMethodId parameter <deliveryMethodName>
    And configurate seller parameter <seller>
    And i call configurate
    And i call for getAffiliates
    Then response should be "array"
    And response has "choices" with type "array"
    And response has "cittiesId" with type "array"
    And response has "stdObj" with type "array"
    Examples:
        |deliveryMethodName                     |seller       |
        |"dpd_classic_parcel_warehouse_door"    |"rostpay"    |
        |"warehouse_warehouse_default"          |"rostpay"    |

    @trackPackageCron
    Scenario: Track Package (Cron)
    Given i call for trackPackage
    Then response should be "integer"

    #@cancelOrder
    #Scenario Outline: Get Delivery Affiliates
    #Given configurate deliveryMethodId parameter <deliveryMethodName>
    #And configurate seller parameter <seller>
    #And track number is ""
    #And order information with:
    #|field|value|
    #|||
    #And i call configurate
    #And i call for calcenOrder
    #Then response should be "array"
    #Examples:
    #    |deliveryMethodName                     |seller       |
    #    |"dpd_classic_parcel_warehouse_door"    |"rostpay"    |
    #    |"warehouse_warehouse_default"          |"rostpay"    |

        
        
    