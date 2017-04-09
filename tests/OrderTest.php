<?php


use Assert\LazyAssertionException;
use Hector68\Liveinform\entities\Config;
use Hector68\Liveinform\entities\LiveinformId;
use Hector68\Liveinform\entities\Order;
use Hector68\Liveinform\exceptions\LiveinformApiException;
use Hector68\Liveinform\repository\CurlRepository;
use Hector68\Liveinform\repository\RepositoryInterface;

class OrderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Config
     */
    protected $config;

    /***
     * @var RepositoryInterface
     */
    protected $repository;

    protected function setUp()
    {
        $this->config = require dirname(__FILE__) . '/_config.php';
        $this->repository = new CurlRepository($this->config);
    }


    public function testOrderSmall()
    {
        $order = new Order('89991234567', '44003312316849', 99, 'test@test.ru');
        $liveinformId = $this->repository->save($order);

        $this->assertInstanceOf(LiveinformId::class, $liveinformId);
        $this->assertNotEmpty($liveinformId->getId());
    }

    public function testOrderFull()
    {
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
        $liveinformId = $this->repository->save($order);

        $this->assertInstanceOf(LiveinformId::class, $liveinformId);
        $this->assertNotEmpty($liveinformId->getId());
    }


    public function testWrongOrder()
    {

        $this->setExpectedException(LiveinformApiException::class, 'Неправильный api_id');
        $config = new Config('123456', 1,1);
        $repository = new CurlRepository($config);

        $order = new Order('89991234567', '44003312316849', 99, 'test@test.ru');
        $repository->save($order);

    }

    public function testValidateOrder()
    {
        $this->setExpectedException(LazyAssertionException::class);

        $order = new Order(' 79991234567', '44003312316849', 99, 'wrongMail.ru');
        $liveinformId = $this->repository->save($order);

    }

}