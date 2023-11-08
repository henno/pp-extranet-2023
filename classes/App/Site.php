<?php

namespace App;

class Site extends Model
{

    /** Returns a list of sites based on the user's permissions:
     * - if the user is a superadmin or admin or client admin, returns all sites of the selected client
     * - else returns the site of the selected client
     *
     * @return array
     */
    public static function getMine(): array
    {
        $result = [];
        $criteria = [];

        // If a specific client is selected in the URL, add it to the WHERE clause
        if (isset($_GET['clientId'])) {
            $criteria[] = "clientId = " . (int)$_GET['clientId'];
        }

        // TODO: check if the user is a superadmin or admin or client admin

        $where = SQL::getWhere($criteria);

        return Db::getAll("
            SELECT siteId as id
                 , siteName as name
            FROM sites
            $where
            ORDER BY siteName");

    }


}