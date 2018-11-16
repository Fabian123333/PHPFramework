<?php

namespace Core;

use Core\Config;
use Core\Router;

class Sitemanager
{
    private $config = [];
    private $router;

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
            if(isset($website["path"]) && !preg_match("~^/".$website["base_name"]."~", $path)){
                next;
            }
            Config::SetWebsiteConfig($website);
            return $website;
        }
    }

    public function LoadSite(){
        $this->router = new Router(Config::GetWebsiteConfig()["local_name"]);
        $this->router->Run();
        $this->ParseSiteType($this->router);
    }

    private function ParseSiteType(Router $router) {
        switch(strtolower($router->GetSite()["type"])) {
            case "extended":
                $this->LoadExtended($router->GetSite());
                break;
            case "simple":

                break;
            case "api":

                break;
        }
    }

    private function LoadExtended($site) {
        require_once($this->GetSourcePath($site["source"]));
        $site = new \Site\Run();
    }

    private function LoadConfig() {
        $this->config = Config::LoadConfig("sitemanager");
    }

    private function GetSourcePath($file) {
        return ROOT."/web/".Config::GetWebsiteConfig()['local_name']."/source/".$file;
    }
}
