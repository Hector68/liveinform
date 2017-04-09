<?php


namespace Hector68\Liveinform\repository;


use Hector68\Liveinform\entities\Config;
use Hector68\Liveinform\entities\LiveinformId;
use Hector68\Liveinform\entities\Order;

interface RepositoryInterface
{

    /**
     * @param Order $order
     * @return LiveinformId
     */
    public function save(Order $order);

    /***
     * @return Config
     */
    public function getConfig();

}