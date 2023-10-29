<?php namespace App;

class sites extends Controller
{

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