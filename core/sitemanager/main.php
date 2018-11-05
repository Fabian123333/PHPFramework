<?php

namespace Core;

use Core\Config;

class Sitemanager
{
    private $config = [];

    function __construct()
    {
        $this->LoadConfig();
    }

    public function GetSite(){
        $domain = $_SERVER["HTTP_HOST"];
        $path = $_SERVER["REQUEST_URI"];

        foreach($this->config as $website){
            if(isset($website["domain"]) && $website["domain"] != $domain){
                next;
            }
            if(isset($website["path"]) && !preg_match(/* @TODO */)){

            }
        }
    }

    private function LoadConfig()
    {
        $this->config = Config::LoadConfig("sitemanager");
    }
}