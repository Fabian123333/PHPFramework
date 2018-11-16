<?php
namespace Core\Plugin;

use Core\Config;

class Plugin
{
    private $name;
    private $plugin;

    function __construct($name){
       $this->name = $name;

       $this->LoadPlugin();
    }

    private function LoadPlugin() {
        echo $this->GetPluginPath();
        if(file_exists($this->GetPluginPath())) {
            require_once($this->GetPluginPath());
            $class = $this->GetClassName();
            $this->plugin = new $class;
        }
        else
            throw new \Exception("plugin $this->name path not found");
    }
    private function GetPluginPath(){
        return ROOT."/web/".Config::GetWebsiteConfig()["local_name"]."/plugins/".$this->name."/main.php";
    }

    private function GetClassName(){
        return "\\Site\\Plugin\\".$this->name."\\".$this->name;
    }

    public function GetJavascript(){
        return $this->plugin->GetJavascript();
    }
}