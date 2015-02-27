#Тест веб интерфейса формы редактирования продуктов
Feature: Test product web interface in adminzone
   Background:
      Given I am logged in as administrator
   @javascript
   @testPriceChart
   Scenario: Test for product product chart price history
      Given I am on "admin/core/product/commonproduct/1692/edit"
      When I press on icon with class ".get-chart-price-history"
      Then I should see div container with id "graph-container"

   @javascript 
   @modificationCreate
   Scenario: Test for  product modification creating
    Given I am on "admin/core/product/commonproduct/1692/edit"
      Then I click on tab with text "Модификации"
      When I press on button with class like "_modificationUnion__dataList_UnionThisToGroupModificationAdd" 
      When I type text  "new_modification" in alert box and press ok
      Then I should see created product and link with text "new_modification"
