<?php namespace App;

class sites extends Controller
{
    public $requires_admin = true;

    function index()
    {
        $this->sites = Db::getAll("SELECT * FROM sites");
    }

    function view()
    {
        $siteId = $this->getId();
        $this->site = Db::getFirst("SELECT * FROM sites WHERE siteId = '{$siteId}'");
    }

}