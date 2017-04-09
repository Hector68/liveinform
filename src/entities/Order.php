<?php

namespace Hector68\Liveinform\entities;

/**
 * Class Order
 * @package Hector68\Liveinform\entities
 */
class Order
{

    /**
     * @var int Телефон клиента в формате (89001234567 или +79001234567)
     */
    protected $phone;

    /**
     * @var string Трек-номер посылки (14-ти значный для "Почты России", либо 13 для EMS)
     */
    protected $track;

    /**
     * @var int Номер заказа внутри вашего магазина
     */
    protected $order_id;

    

    /**
     * @var string E-mail клиента
     */
    protected $email;

    /**
     * @var string Имя клиента
     */
    protected $firstname;

    /**
     * @var string Фамилия клиента
     */
    protected $lastname;

    /**
     * @var double Сумма заказа (целое значение, без валюты)
     */
    protected $summa;

    /**
     * @var string  Метки через запятую
     */
    protected $tags;

    /**
     * @var string Дополнительное поле 1, до 255 символов
     */
    protected $additional1;

    /**
     * @var string Дополнительное поле 2, до 255 символов
     */
    protected $additional2;

    /**
     * @var string Дополнительное поле 3, до 255 символов
     */
    protected $additional3;

    /**
     * Order constructor.
     * @param int $phone
     * @param string $track
     * @param int $order_id
     * @param string $email
     * @param string $firstname
     * @param string $lastname
     * @param float $summa
     * @param string $tags
     * @param string $additional1
     * @param string $additional2
     * @param string $additional3
     */
    public function __construct($phone, $track, $order_id = null, $email = null, $firstname = null, $lastname = null, $summa = null, $tags = null, $additional1 = null, $additional2 = null, $additional3 = null)
    {
        $this->phone = $phone;
        $this->track = $track;
        $this->order_id = $order_id;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->summa = $summa;
        $this->tags = $tags;
        $this->additional1 = $additional1;
        $this->additional2 = $additional2;
        $this->additional3 = $additional3;
    }

    /**
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getTrack()
    {
        return $this->track;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->order_id === null ? null : (string) $this->order_id;
    }

  

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return float
     */
    public function getSumma()
    {
        return $this->summa === null ? null : (double) $this->summa;
    }

    /**
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return string
     */
    public function getAdditional1()
    {
        return $this->additional1;
    }

    /**
     * @return string
     */
    public function getAdditional2()
    {
        return $this->additional2;
    }

    /**
     * @return string
     */
    public function getAdditional3()
    {
        return $this->additional3;
    }

    
    

}