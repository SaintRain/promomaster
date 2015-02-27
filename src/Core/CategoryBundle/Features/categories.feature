Feature: Categories management
In order to manager categories
As a store administrator
I want to be able to list all categories

Background:
Given I am logged in as administrator
And the following blocks are defined:
| name |
| Магазин |
| Категории |
| Справочники |
| Пользователи |

Scenario: Seeing index categories page
Given I am on "admin/dashboard"
When I follow "Категории товаров"
Then I should be on the "admin/shop/category/productcategory/list" page
And I should not see "Категорий нет"

Scenario: Submitting empty form
Given I am on "admin/shop/category/productcategory/create" page
When I press "Создать и редактировать"
Then I should still be on "admin/shop/category/productcategory/create" page
And I should see "При создании элемента произошла ошибка."

Scenario: Simple creating category
Given I am on "admin/shop/category/productcategory/create" page
When I fill in the following:
| Название * | Подкатегория2 |
And I press "Создать и редактировать"
Then I should be on "admin/shop/category/productcategory/list" page
And I should see "Элемент создан успешно"

#@javascript
#Scenario: Creating category
#Given I am on the category index page
#When I fill in the following:
#| Название Категории | Подкатегория2 |
#Then I click "SEO" in the form
#And I should not see "Название Категории"
#When I fill in the following:
#| Описание | описание подкатегория |
#And I press "Создать и редактировать"
#Then I should be on the page of category with name "Подкатегория2"
#And I should see "Элемент создан успешно"

#Scenario: Accessing category editing form from categories index
#Given I am on the categories index page
#When I click "Подкатегория" in sidebar
#Then I should be editing category with name "Подкатегория"

@javascript
Scenario: Updating the category
Given I am on category edit page
When I fill in the following:
| Название * | Надкатегория2 |
And I press "Сохранить"
And I wait for request will end
Then I should see "Элемент успешно обновлен."

#Scenario: Deleting category
#Given I am on category edit page
#When I follow "Удалить"
#Then I should be on batch deleting page
#And I should see "Подтверждение удаления"
#When I press "Да, удалить"
#Then I should see "Элемент успешно удален."