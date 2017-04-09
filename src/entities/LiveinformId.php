<?php


namespace Hector68\Liveinform\entities;


class LiveinformId
{
    /**
     * @var int  ID отправления
     */
    protected $id;

    /**
     * LiveinformId constructor.
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


}