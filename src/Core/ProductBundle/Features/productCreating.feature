#Тест на добавление всех типов продуктов
Feature: Test for product creating
    @CreateProduct
    Scenario: Create Product
        Given I create a new product object with data:
        |captionRu|article|sku|manufactureIds|manufactureMainId|categoryIds|categoryMainId|price|unitOfMeasureId|lengthOfBox|widthOfBox|heightOfBox|grossWeight|
        |Тест на добавление|test|tet|713,714|714|18|18|100.2|7|1|1|1|1|
        Then Save to BD and check product creation
    @CreateDigitalProduct
    Scenario: Create DigitalProduct
        Given I create a new DigitalProduct object with data:
        |captionRu|article|sku|manufactureIds|manufactureMainId|categoryIds|categoryMainId|price|unitOfMeasureId|
        |Тест на добавление DigitalProduct|test|tet|713,714|714|18|18|100.2|7|
        Then Save to BD and check product creation
    @CreateServiceProduct
    Scenario: Create ServiceProduct
        Given I create a new ServiceProduct object with data:
        |captionRu|article|sku|manufactureIds|manufactureMainId|categoryIds|categoryMainId|price|unitOfMeasureId|
        |Тест на добавление ServiceProduct|test|tet|713,714|714|18|18|100.2|7|
        Then Save to BD and check product creation
    @CreateCompositeProduct
    Scenario: Create CompositeProduct
        Given I create a new CompositeProduct object with data:
        |captionRu|article|sku|manufactureIds|manufactureMainId|categoryIds|categoryMainId|price|unitOfMeasureId|attachProductId|lengthOfBox|widthOfBox|heightOfBox|grossWeight|
        |Тест на добавление CompositeProduct|test|tet|713,714|714|18|18|100.2|7|2919|1|1|1|1|
        Then Save to BD and check product creation
