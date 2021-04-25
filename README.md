# Setup

- `composer install`

### ENV
Setup your env variables in .env file.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kilo_homework
DB_USERNAME=root
DB_PASSWORD=
```
### Run server & migrations

-  `php artisan migrate`
- `php artisan serve`

## API

Postman documentation: [available here](https://documenter.getpostman.com/view/11525094/TzJybF3R).

### Category data

- id
- name - category name `validation: Must be at least 5 symbols`

### Item data

- id
- category - category name `relationship to category`
- name - item name `valdiation: Must always end in _item suffix`
- value - item value `valdiation: At least 10, no greater than 100`
- quality - item quality `valdiation: At least -10, no greater than 50`

### Create a category
```
curl --location --request POST 'http://127.0.0.1:8000/api/categories' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--header 'Accept: application/json' \
--data-urlencode 'name=testas'
```
### Create a item
```
curl --location --request POST 'http://127.0.0.1:8000/api/items/' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--header 'Accept: application/json' \
--data-urlencode 'category=testas' \
--data-urlencode 'name=_itemsaf_item' \
--data-urlencode 'value=80' \
--data-urlencode 'quality=-9'
```
### Show all items
```
curl --location --request GET 'http://127.0.0.1:8000/api/items/'
```
### Show items by category
```
curl --location --request GET 'http://127.0.0.1:8000/api/items/testas'
```
### Update(PATCH) item by id
```
curl --location --request PUT 'http://127.0.0.1:8000/api/items/44' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--header 'Accept: application/json' \
--data-urlencode 'category=testas' \
--data-urlencode 'name=_itemasfsaf_item' \
--data-urlencode 'value=80' \
--data-urlencode 'quality=-9'
```
### Delete one item by id
```
curl --location --request DELETE 'http://127.0.0.1:8000/api/items/1'
```
### Delete items by category
```
curl --location --request DELETE 'http://127.0.0.1:8000/api/categories/testas'
```






