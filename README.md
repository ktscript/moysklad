# PHP SDK Moysklad API 1.2 AddOn

Это расширение библиотеки от cdekmarketteam/moysklad.
Помимо прочего планируется разработка более подробного описания работы с библиотекой.

Перечень изменений добавлен ниже.

--------------------------------------------------------------------------------------

## Интро от создателей библиотеки:

Данная библиотека предназначена для удобной работы с API Remap версии 1.2 МоегоСклада. 
Она содержит набор функций, позволяющий совершать базовые операции над сущностями (создание, чтение, изменение, удаление).

## Установка
- `composer require ktscript/moysklad`
- `composer dump-autoload`

## Пример работы
### 1. Начало работы
Основной класс, посредством которого осуществляется работа с SDK: `MoySklad\ApiClient`.

Для того, чтобы начать работу, требуется создать экземпляр этого класса, 
передав в конструктор поля:
- адрес хоста API (`online.moysklad.ru`)
- флаг принудительного соединения по https
- логин в формате [имя пользователя]@[название компании] и пароль или готовый token для доступа к API:

```php
use MoySklad\ApiClient;

$api = new ApiClient('host', true, [
    'login' => 'your_login',
    'password' => 'your_password',
]);

//or

$api = new ApiClient('host', true, [
   'token' => 'your_token',
]);

```

### 2. Работа с сущностями
#### 2.1. Получение сущностей
Для доступа к эндпоинтам отдельных сущностей используется метод `ApiClient->entity()`,
который возвращает базовый клиент для сущностей. 
Этот объект позволяет получить клиент для работы с конкретной сущностью. 
Например, чтобы получить список всех контрагентов или одного контрагента, достаточно выполнить следующий код:
```php
$counterpartyList = $api->entity()->counterparty()->getList();
$counterparty = $api->entity()->counterparty()->get('id');
```

Список возможных фильтров:
- EntityFilter - фильтр по сущности, можно назначить нескольким полям
- Limit - лимит для пагинации, максимальное значение 1000
- Offset - позиция начала отображения
- Order - сортировка, может быть назначена по нескольким полям
- Search - фильтр поиска, который принимает только значение
- StandardFilter - стандартный фильтр поле|значение, можно назначить нескольким полям
Работа с фильтрами:
```php
use MoySklad\Util\Param\Limit;
use MoySklad\Util\Param\Offset;
use MoySklad\Util\Param\Order;
use MoySklad\Util\Param\Search;
use MoySklad\Util\Param\EntityFilter;
use MoySklad\Util\Param\StandardFilter;

$params = [
    Limit::eq(50),
    Offset::eq(10),
    Order::asc('name'),
    Order::desc('date'),
    Search::eq('some interesting thing'),
    EntityFilter::eq('product', $product),
    EntityFilter::neq('pricetype', $pricetype),
    StandardFilter::eq('region_id', $regionId),
    StandardFilter::gte('created', $createdDate),
    StandardFilter::like('name', 'ame'),
];

$counterpartyList = $api->entity()->counterparty()->getList($params);
```
Массив фильтров передается аргументом при вызове методов клиентов сущностей, там где это возможно.

#### 2.2. Создание сущностей
Чтобы отправить запрос к API на создание сущности, достаточно создать объект класса, заполнить необходимые поля, 
и затем при помощи соответствующего клиента вызвать метод `create()`, передав в качестве параметра созданный объект:
```php
$product = new Product();
$product->name = 'Новый продукт';

$product = $api->entity()->product()->create($product);
```
После выполнения кода и при успешном создании вернется объект product, с заполенными полями, полученными из ответа API (`id`, `href` и др.).

#### 2.3. Изменение сущностей
Для изменения уже созданной сущности используются метод `editById()` или `editByEntity()` клиента сущности:

```php
$product->name = 'new name';
$product = $api->entity()->product()->update($product);
```

#### 2.4. Вложенные сущности
Работа с вложенными сущностями производится при помощи специальных методов клиентов сущностей. 
Например, метод получения аккаунтов или аккаунта контрагента:
```php
$counterpartyAccountsList = $api->entity()->counterparty()->getAccountsList('counterparty_id');

$counterpartyAccount = $api->entity()->counterparty()->getAccount('counterparty_id', 'account_id');

```
Полностью аналогично производится работа с остальными методами. 

В некоторых сущностях имеются свойства - вложенные сущности (например у контрагента есть полный адрес), 
такие вложенные сущности, как полный адрес, при ответе с API заполняются только метаданными, 
для того чтобы заполнить ее основные свойства необходимо вызвать метод `fetch()`:
```php
$counterparty = $api->entity()->counterparty()->get('id');
$addressCity = $counterparty->legalAddressFull->city; // null

$counterparty->legalAddressFull->fetch();
$addressCity = $counterparty->legalAddressFull->city; // название города

```
Метод `fetch()` есть у каждой сущности, его можно использовать и для простого обновления сущности.

## Дальнейшее знакомство
Список доступных методов и сущностей, 
а также накладываемые ограничения по работе с API можно узнать в 
[Moysklad API 1.2 Doc](https://dev.moysklad.ru/doc/api/remap/1.2/)


## Корректировки

2022-09-08:
Добавлена возможность работы с Заявками поставщика (purchaseorder)
пример работы:
```php
$api->entity()->purchaseorder()->getList([StandardFilter::eq('name', 'my_name')]);
```
2022-09-20:
-Добавлена возможность выборки единого варианта, метод first()
пример работы:
```php
$api->entity()->purchaseorder()->first(); //берет первый из возвращаемого списка 
$api->entity()->purchaseorder()->first('name', 'my_name'); //берет первый из фильтрованного возвращаемого списка 
```
где name - полe по которому осуществляется выборка, можно указывать любые желаемые (code, id и т.д.)

-Заменен вариант обращения по части заявок поставщику, productEnter() заменен на enter(), чтобы логика не отличалась
от документации Мой Склад.

2022-09-24:
-Устранены проблемы срабатывания исключания jms на пустые поля.

2022-09-25:
-Добавлен метод fill()
пример работы:
```php
$productSupply = new ProductSupply();
$productSupply->fill([
    'name' => 'my_name',
    'organization' => $organization,
    'store' => $store,
    'agent' => $counterparty,
    'positions' => $positionsList,
]);
```

2022-09-26:
-Добавлена сущность supply (приемка)
пример работы:
```php
$supply = $api->entity()->supply()->create($productSupply);
```
