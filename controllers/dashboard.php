<?php namespace App;

class dashboard extends Controller
{
    function index()
    {
        $this->users = Db::getAll("SELECT * FROM users");
        $this->sites = Db::getAll("SELECT siteId value, siteName name FROM sites");
        $this->priorities = [
            __('Normal priority'),
            __('High priority'),
            __('Urgent priority')
        ];

    }

}