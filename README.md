# Liveinform

Библиотека для работы с сервисом http://www.liveinform.ru/

### Создание заказов

```
use Hector68\Liveinform\entities\Config;
use Hector68\Liveinform\entities\Order;
use Hector68\Liveinform\repository\CurlRepository;

/** Создаем конфиг */
$config = new Config(api_id, type, is_test);

/** Стандарный репозиторий через curl */
$repository = new CurlRepository($config);

/** Создаем оьъект заказа */
$order = new Order(
            '+79991234567',
            '4400331231684',
            '998',
            'test@test.ru',
            'Василий',
            'Пупкин',
            '999.25',
            'test, fsf',
            'Саратов',
            'Вознесенская',
            'Кальяны'
        );

/** Получаем id заказа в системе liveinform*/

$liveinformId = $this->repository->save($order);

```