<?php

namespace App;

class Client
{

    public static function getId()
    {

    }

    public static function getWithUsers($criteria, bool $withPermissions): array
    {
        $result = [];

        // Exclude deleted
        $criteria[] = "(userDeleted = 0 OR userDeleted IS NULL)";

        // If a specific client is selected in the URL, add it to the WHERE clause
        if (isset($_GET['clientId'])) {
            $criteria[] = "clientId = " . (int)$_GET['clientId'];
        }

        $where = SQL::getWhere($criteria);

        $clients = Db::getAll("
            SELECT userId
                 , clientId
                 , clientName
                 , userName
                 , userEmail
                 , userIsAdmin
                 , userIsClientAdmin
                 , userIsSuperAdmin
            FROM clients
            LEFT JOIN users USING (clientId)
            $where
            ORDER BY clientName");

        foreach ($clients as $client) {
            $result[$client['clientId']]['clientName'] = $client['clientName'];
            $result[$client['clientId']]['users'][$client['userId']] = [
                'userId' => $client['userId'],
                'userName' => $client['userName'],
                'userEmail' => $client['userEmail'],
            ];
        }


        return $result;
    }


}