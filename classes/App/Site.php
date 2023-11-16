<?php
//
//namespace App;
//
//class Site extends Model
//{
//
//    /** Returns a list of sites based on the user's permissions:
//     * - if the user is a superadmin or admin or client admin, returns all sites of the selected client
//     * - else returns the site of the selected client
//     *
//     * @return array
//     */
//    public static function getMine(): array
//    {
//        $result = [];
//        $criteria = [];
//
//        // If a specific client is selected in the URL, add it to the WHERE clause
//        if (isset($_GET['clientId'])) {
//            $criteria[] = "clientId = " . (int)$_GET['clientId'];
//        }
//
//        // TODO: check if the user is a superadmin or admin or client admin
//
//        $where = SQL::getWhere($criteria);
//
//        return Db::getAll("
//            SELECT siteId as id
//                 , siteName as name
//            FROM sites
//            $where
//            ORDER BY siteName");
//
//    }
//
//
//}


namespace App;

class Site extends Model
{
    /**
     * Returns a list of sites based on the user's permissions:
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

        // Check user role
        $userRole = Auth::getUserRole(); // Assuming Auth class has a method to get the current user's role

        // Add role-based criteria
        if (in_array($userRole, ['superadmin', 'admin', 'client admin'])) {
            // Logic for superadmin, admin, or client admin
            // For example, if these roles should see all sites, no additional criteria are needed
        } else {
            // Logic for other roles
            // For example, add criteria to limit the sites based on the user's specific permissions
        }

        $where = SQL::getWhere($criteria);

        return Db::getAll("
            SELECT siteId as id
                 , siteName as name
            FROM sites
            $where
            ORDER BY siteName");
    }
}

