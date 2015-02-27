#Загрузка и анализ прайсов для Авента
Feature: Test for PriceAnalise admin web interface

  Background:
    Given I am logged in as administrator
    Given I am on "admin/core/logistics/supplierpriceanalysis/create?uniqid=test"

  @javascript
  @CheckPriceAnaliseForm
  Scenario: Check upload price form
    When I attach the file "/Core/ManufacturerBundle/Features/TestFiles/testPrice.xls" to "test_priceFile"
    And I wait for ajax request will end
    Then I should see "Файл testPrice.xls успешно загружен."


