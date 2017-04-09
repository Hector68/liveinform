<?php


namespace Hector68\Liveinform\repository;


use Hector68\Liveinform\entities\Config;
use Hector68\Liveinform\entities\Order;

/**
 * Class AbstractRepository
 * @package Hector68\Liveinform\repository
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * CurlRepository constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }


    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Order $order
     * @return mixed
     */
    abstract public function save(Order $order);
}