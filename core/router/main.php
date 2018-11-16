<?php
namespace Core;

use Core\Config;

/*
 * Core Routing Engine of the PHPFramework
 */
class Router
{
    private $local_name;
    private $config;
    private $site;

    function __construct($local_name){
        $this->local_name = $local_name;
        $this->LoadConfig();
    }

    private function GetRelativePath(){
        $url =  $_SERVER['REQUEST_URI'];
        $replace = Config::GetWebsiteConfig()["base_name"];
        if($replace == "")
            return $url;
        $position = strpos($url, $replace);
        if ($position !== false)
            return substr_replace($url, "", $position, strlen($url));
    }

    public function Run(){
        $this->Route();
    }

    public function GetSite(){
        return $this->site;
    }

    private function Route(){
        $url = $this->GetRelativePath();
        foreach($this->config as $site) {
            if (preg_match("~".$site["path"]."(/)?~", $url)) {
                $this->site = $site;
                return;
            }
        }
        throw new \Exception("no route found");
    }
    private function LoadConfig(){
        $this->config = Config::LoadConfig("router", $this->local_name);
    }
}
