<?php

namespace App;

class Client
{

    public static function getId()
    {

    }

    public static function getSlug(int $clientId)
    {
        return Db::getCol("SELECT slug FROM clients WHERE clientId = ?", [$clientId]);
    }
}