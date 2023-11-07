<?php namespace App;

class orders extends Controller
{

    function index()
    {
        $this->orders = Db::getAll("SELECT * FROM orders");
    }

    function view()
    {
        $orderId = $this->getId();
        $this->order = Db::getFirst("SELECT * FROM orders WHERE orderId = '{$orderId}'");
    }

}