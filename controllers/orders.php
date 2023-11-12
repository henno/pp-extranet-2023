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


    // TODO: make this function into ajax so it wouldn't require a view (?)


    function add()
    {
        // Check if the user is logged in and get the userId
        if (!isset($_SESSION['userId'])) {
            echo json_encode(['success' => false, 'error' => 'User is not logged in.']);
            return;
        }

        $userId = $_SESSION['userId']; // Retrieve the userId from the session

        // Get POST data from the request
        $site = $_POST['site'] ?? '';  // Using null coalescing operator to provide default value
        $priority = $_POST['priority'] ?? 'normal'; // Default to 'normal' if not provided

        // Validate the site data
        if (empty($site)) {
            echo json_encode(['success' => false, 'error' => 'Site is required.']);
            return;
        }

        // Prepare the insert data array
        $insertData = [
            'site' => $site,
            'priority' => $priority,
            'userId' => $userId, // Use the userId from the session
        ];

        // Insert the data into the orders table
        $lastInsertId = Db::insert('orders', $insertData);

        if ($lastInsertId) {
            echo json_encode(['success' => true, 'lastInsertId' => $lastInsertId]);
        } else {
            // Get the error from the database if the insert failed
            $error = Db::getLastError();
            echo json_encode(['success' => false, 'error' => 'Failed to insert the order.', 'dbError' => $error]);
        }
    }
}