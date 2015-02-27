#Тестирование работы api ТК "СДЭК"
@cdekApi
Feature: Test api for delivery company CDEK

    @deliveryCitiesCDEK
    Scenario: Get Delivery Cities (CDEK)
    Given credentials with:
    |client                             |clientKey                          |
    |e765dfc32d8e7b57b3c99ad0622a4802   |f59947f42410856d4f8ab9833ab088cf   |
    And I call "cdek" with "getCities"
    Then the response should be array
    And response first row has "cityId" key with type "integer"
    And response first row has "cityName" key with type "string"
    
    @deliveryAffiliatesCDEK
    Scenario: Get Delivery Affiliates (CDEK)
    Given credentials with:
    |client                             |clientKey                          |
    |e765dfc32d8e7b57b3c99ad0622a4802   |f59947f42410856d4f8ab9833ab088cf   |
    And I call "cdek" with "getAffiliates"
    Then the response should be array
    And response has "choices" key with type "array"
    And response has "cittiesId" key with type "array"
    And response has "stdObj" key with type "array"
    
    @deliveryCalculateCDEK
    Scenario: Calculate delivery Cost (CDEK)
    Given credentials with:
    |client                             |clientKey                          |
    |e765dfc32d8e7b57b3c99ad0622a4802   |f59947f42410856d4f8ab9833ab088cf   |
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
    And recipient "cityId" is "438"
    And internal code is "137"
    And cash on delivery "false"
    And seller "cityId" is "44"
    And I call "cdek" with "calculate"
    Then the response should be array
    And response has "cost" key with type "double"
    And response has "packages" key with type "integer"
    And response has "days" key with type "array"
    And response has "minDays" key in "days" with type "integer"
    And response has "minDays" key in "days" with type "integer"

    @deliveryTrackPackageCDEK
    Scenario: Track Delivery Package Status (CDEK)
    Given the following track numbers:
    |trackNum       |
    |АСВЛЭ-6/0511   |
    And credentials with:
    |client                             |clientKey                          |
    |e765dfc32d8e7b57b3c99ad0622a4802   |f59947f42410856d4f8ab9833ab088cf   |
    And I call "cdek" with "trackPackage" 
    Then the response should be array
    
    @deliveryInvoiceCDEK
    Scenario: Get invoice for delivery (CDEK)
    Given the following invoice track numbers:
    |trackNum       |
    |АСВЛЭ-6/0511   |
    And credentials with:
    |client                             |clientKey                          |
    |e765dfc32d8e7b57b3c99ad0622a4802   |f59947f42410856d4f8ab9833ab088cf   |
    And I call "cdek" with "getInvoice"
    Then the response should be array
           
    @deliveryCreateOrderCDEK
    Scenario: Make order for delivery (CDEK)
    Given credentials with:
    |client                             |clientKey                          |
    |e765dfc32d8e7b57b3c99ad0622a4802   |f59947f42410856d4f8ab9833ab088cf   |
    And Order information with:
    |field  |value  |
    |price  |1200   |
    |volume |1      |
    |weight |12     |
    |id     |1902   |
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
    And internal code is "137"
    And cash on delivery "false"
    And the following extra sevices:
    |value|
    And seller information with:
    |field          |value          |
    |cityId         |438            |
    |name           |ОАО "ИГРУШКИ"  |
    And recipient information with:
    |field          |value          |
    |cityId         |44             |
    |street         |улица правды   |
    |house          |25             |
    |flat           |1              |
    |terminalCode   |ABK1           |
    |contactFio     |газета Правда  |
    |contactPhone   |+79026753465   |
    |email          |pravda@mail.ru |
    #And I call "cdek" with "createOrder"
    #Then the response should be array

    @deliveryCancelOrderCDEK
    Scenario: Cancel order for delivery (CDEK)
    Given the following invoice track numbers:
    |trackNum       |
    |АСВЛЭ-6/0511   |
    And credentials with:
    |client                             |clientKey                          |
    |e765dfc32d8e7b57b3c99ad0622a4802   |f59947f42410856d4f8ab9833ab088cf   |
    And I call "cdek" with "cancelOrder"
    Then the response should be array