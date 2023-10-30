<?php namespace App;

class clients extends Controller
{

    function index()
    {
        $this->clients = Db::getAll("SELECT * FROM clients");
    }

    function view()
    {
        $clientId = $this->getId();
        $this->client = Db::getFirst("SELECT * FROM clients WHERE clientId = '{$clientId}'");
    }

}