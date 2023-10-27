<?php namespace App;
class orders extends Controller
{
    function AJAX_add()
    {
        $orderId = Db::insert('orders', [
            'userId' => $this->$this->auth->userId,
            'orderTimestamp' => date('Y-m-d H:i:s')
        ]);

        Db::insert('orderServices', [
            'orderId' => $orderId,
            'serviceName' => ...
            'serviceId' => $_POST['services'][0]['serviceId'], // see tuleb ümber teha tsükliga, itereerides kõik serviced läbi sest neid on n+1.
            'servicePrice' = Service::getPrice($service_id)
        ]);



        stop(201, 'Order added');
    }
}