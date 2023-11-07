<?php namespace App;

class clients extends Controller
{

    function index()
    {
        // Add logged-in user's clientId to criteria if the user is not an admin
        $criteria = User::isAdmin() ? null : ["clientId = " . User::getClientId()];

        $this->clients = Client::getWithUsers($criteria, true);
    }

    function view()
    {
        $clientId = $this->getId();
        $this->client = Db::getFirst("SELECT * FROM clients WHERE clientId = '{$clientId}'");
    }

}