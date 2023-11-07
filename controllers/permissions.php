<?php namespace App;

class permissions extends Controller
{

    function index()
    {
        $this->clients = Client::getWithUsers(null, true);
    }

    function view()
    {
        $permissionId = $this->getId();
        $this->permission = Db::getFirst("SELECT * FROM permissions WHERE permissionId = '{$permissionId}'");
    }

}