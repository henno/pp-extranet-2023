<?php namespace App;

class dashboard extends Controller
{
    function index()
    {
        $this->users = Db::getAll("SELECT * FROM users");
        $this->sites = Site::getMine();
        $this->priorities = [
            ['name' => __('Normal priority'), 'value' => 'normal'],
            ['name' => __('High priority'), 'value' => 'high'],
            ['name' => __('Urgent priority'), 'value' => 'urgent']
        ];

    }

}