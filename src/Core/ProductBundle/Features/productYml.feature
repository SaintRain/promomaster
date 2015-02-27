#Тест на генерацию YML файла для яндекс маркета
Feature: Test for product yml generation
    @productYML
    Scenario: Generate YML
        Given I generate new yml file
        