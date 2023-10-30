<?php namespace App;
class orders extends Controller
{
    function AJAX_add()
    {
        $orderId = Db::insert('orders', [
            'userId' => $this->$this->auth->userId,
            'orderTimestamp' => date('Y-m-d H:i:s')
            'clientId' => $this->clientId,
        ]);




        stop(201, 'Order added');
    }
}