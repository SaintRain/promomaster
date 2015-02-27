#Тестирование работы api ТК "DPD"
@dpdApi
Feature: Test api for delivery company DPD

    @deliveryCitiesDPD
    Scenario: Get Delivery Cities (DPD)
    Given credentials with:
    |client     |clientKey                                  |
    |1004005920 |16A9641A7A303094C9E340B105DE4B205BD7EE17   |
    And I call "dpd" with "getCities"
    Then the response should be array
    And response first row has "cityId" key with type "integer"
    And response first row has "cityName" key with type "string"
    And response first row has "regionId" key with type "integer"
    And response first row has "regionName" key with type "string"
    And response first row has "countryName" key with type "string"
    And response first row has "countryName" key with type "string"
    
    @deliveryAffiliatesDPD
    Scenario: Get Delivery Affiliates (DPD)
    Given credentials with:
    |client     |clientKey                                  |
    |1004005920 |16A9641A7A303094C9E340B105DE4B205BD7EE17   |
    And I call "dpd" with "getAffiliates"
    Then the response should be array
    And response has "choices" key with type "array"
    And response has "cittiesId" key with type "array"
    And response has "stdObj" key with type "array"
    
    @deliveryCalculateDPD
    Scenario: Calculate delivery Cost (DPD)
    Given credentials with:
    |client     |clientKey                                  |
    |1004005920 |16A9641A7A303094C9E340B105DE4B205BD7EE17   |
    And Order information with:
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
    And delivery type information with:
    |field          |value  |
    |deliveryFrom   |0      |
    |deliveryTo     |0      |
    And recipient "cityId" is "49694102"
    And recipient "cityName" is "Москва"
    And internal code is "PCL"
    And cash on delivery "false"
    And seller "cityId" is "49270397"
    And seller "cityName" is "Ростов-на-Дону"
    And I call "dpd" with "calculate"
    Then the response should be array
    And response has "cost" key with type "double"
    And response has "days" key with type "array"
    And response has "minDays" key in "days" with type "integer"
    And response has "minDays" key in "days" with type "integer"

    @deliveryTrackPackageDPD
    Scenario: Track Delivery Package Status (DPD)
    Given the track number "АСВЛЭ пинкод 6/0511" where "date" is "12313213213"
    And credentials with:
    |client     |clientKey                                  |
    |1004005920 |16A9641A7A303094C9E340B105DE4B205BD7EE17   |
    And I call "dpd" with "trackPackage" 
    Then the response should be array
    
    @deliveryInvoiceDPD
    Scenario: Get invoice for delivery (DPD)
    Given the following invoice track numbers:
    |trackNum       |
    |АСВЛЭ-6/0511   |
    And credentials with:
    |client     |clientKey                                  |
    |1004005920 |16A9641A7A303094C9E340B105DE4B205BD7EE17   |
    And I call "dpd" with "getInvoice"
    Then the response should be array
           
    @deliveryCreateOrderDPD
    Scenario: Make order for delivery (DPD)
    Given credentials with:
    |client     |clientKey                                  |
    |1004005920 |16A9641A7A303094C9E340B105DE4B205BD7EE17   |
    And Order information with:
    |field          |value      |
    |price          |1200       |
    |volume         |1          |
    |weight         |12         |
    |id             |1902       |
    |package        |1          |
    |description    |игрушки    |
    |costly         |0          |
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
    And internal code is "PCL"
    And cash on delivery "false"
    And the following extra sevices:
    |value|
    And seller information with:
    |field          |value                      |
    |cityId         |49694102                   |
    |cityName       |"Москва"                   |
    |contactFio     |Пупкин Василий Петрович    |
    |contactPhone   |+79026753465               |
    |terminalCode   |AER                        |
    |name           |ОАО "ИГРУШКИ"              |
    |email          | "oaogames@mail.ru"        |
    |isTerminal     | 1                         |
    And recipient information with:
    |field          |value              |
    |cityId         |49270397           |
    |cityName       |"Ростов-на-Дону"   |
    |street         |улица правды       |
    |house          |25                 |
    |flat           |1                  |
    |terminalCode   |AER                |
    |isTerminal     | 1                 |
    |contactFio     |газета Правда      |
    |name           |газета Правда      |
    |contactPhone   |+79026753465       |
    |email          |pravda@mail.ru     |
    And recipient address details with:
    |field      | value         |
    |flat       |42             |
    |street     |50 лет СССР    |
    |house      |7              |
    |streetAbbr |ул             |
    And seller address details with:
    |field      |value      |
    |street     |Голенова   |
    |house      |36         |
    |streetAbbr |ул         |
    #And I call "dpd" with "createOrder"
    #Then the response should be array

    @deliveryCancelOrderDPD
    Scenario: Cancel order for delivery (DPD)
    Given the following invoice track numbers:
    |trackNum       |
    |АСВЛЭ-6/0511   |
    And credentials with:
    |client     |clientKey                                  |
    |1004005920 |16A9641A7A303094C9E340B105DE4B205BD7EE17   |
    And I call "dpd" with "cancelOrder"
    Then the response should be array
