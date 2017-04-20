<?php

namespace Hector68\Liveinform\repository;


use Assert\Assert;
use Assert\LazyAssertionException;
use Hector68\Liveinform\entities\LiveinformId;
use Hector68\Liveinform\entities\Order;
use Hector68\Liveinform\exceptions\LiveinformApiException;

class CurlRepository extends AbstractRepository
{

    protected $serviceUrl = "http://www.liveinform.ru/";


    public function save(Order $order)
    {

        $postData = [
            'test' => $this->getConfig()->isTest(),
            'api_id' => $this->getConfig()->getApiId(),
            'type' => $this->getConfig()->getType(),
            'phone' => $order->getPhone(),
            'tracking' => $order->getTrack(),
            'order_id' => $order->getOrderId(),
            'email' => $order->getEmail(),
            'firstname' => $order->getFirstname(),
            'lastname' => $order->getLastname(),
            'tags' => $order->getTags(),
            'additional1' => $order->getAdditional1(),
            'additional2' => $order->getAdditional1(),
            'additional3' => $order->getAdditional3(),
            'summa' => $order->getSumma(),
            'cms' => $order->getCms()
        ];


        $this->validateSaveData($postData);

        foreach ($postData as $key => $value) {
            if ($value === null)
                unset($postData[$key]);

        }

        $serviceAction = $this->serviceUrl . 'api/add/';
        $ch = curl_init($serviceAction);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $body = curl_exec($ch);
        curl_close($ch);

        $responseCodes = [
            '100' => 'Отслеживание успешно добавлено',
            '200' => 'Неправильный api_id',
            '201' => 'Неправильно введен телефон',
            '202' => 'Неправильно введен трек-номер',
            '203' => 'Не указан тип отслеживания',
            '204' => 'Не хватает денежных средств',
            '205' => 'Отслеживание с таким телефоном клиентом и трек-номер уже отслеживается'
        ];

        
        $result = explode("\n", $body);
        
        if($result[0] == 100) {
            return new LiveinformId($result[1]);
        } else {
            throw new LiveinformApiException($responseCodes[$result[0]]);
        }
    }


    /**
     * @param $postData
     * @throws LazyAssertionException
     */
    public function validateSaveData($postData)
    {
        Assert::lazy()
            ->that($postData['test'], 'isTest')->boolean()
            ->that($postData['api_id'], 'api_id')->notEmpty()->string()
            ->that($postData['type'], 'type')->notEmpty()->between(1, 2)
            ->that($postData['phone'], 'phone')->notEmpty()->regex('/(\+7|8)[0-9]{10}/ui')
            ->that($postData['tracking'], 'tracking')->notEmpty()->regex('/[a-zA-Z0-9]{13,14}/ui')
            ->that($postData['order_id'], 'order_id')->nullOr()->string()
            ->that($postData['email'], 'email')->nullOr()->email()
            ->that($postData['firstname'], 'firstname')->nullOr()->string()
            ->that($postData['lastname'], 'lastname')->nullOr()->string()
            ->that($postData['tags'], 'tags')->nullOr()->string()
            ->that($postData['additional1'], 'additional1')->nullOr()->betweenLength(0, 255)->string()
            ->that($postData['additional2'], 'additional2')->nullOr()->betweenLength(0, 255)->string()
            ->that($postData['additional3'], 'additional3')->nullOr()->betweenLength(0, 255)->string()
            ->that($postData['cms'], 'cms')->nullOr()->betweenLength(0, 255)->string()
            ->that($postData['summa'], 'summa')->nullOr()->float()
            ->verifyNow();
    }

}