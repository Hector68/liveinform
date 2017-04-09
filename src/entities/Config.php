<?php

namespace Hector68\Liveinform\entities;


/**
 * Class Config
 * @package Hector68\Liveinform\entities
 */
class Config
{
    /**
     * @var string Уникальный идентификатор API
     */
    protected $api_id;

    /**
     * @var int Тип отслеживания. 2 или 1 . За 20 и 10 рублей соответственно.
     */
    protected $type;

    /**
     * @var bool Имитирует добавление трека для тестирования ваших программ на правильность обработки ответов сервера. При этом сам трек не добавляется и баланс не расходуется.
     */
    protected $test = 1;
    
    
    /**
     * Config constructor.
     * @param string $api_id
     * @param int $type
     * @param int $test
     */
    public function __construct($api_id, $type, $test = 1)
    {
        $this->api_id = $api_id;
        $this->type = $type;
        $this->test = $test;
    }


    /**
     * @return string
     */
    public function getApiId()
    {
        return $this->api_id;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type === null ? null : (int) $this->type;
    }

    /**
     * @return boolean
     */
    public function isTest()
    {
        return (bool) $this->test;
    }

 


}