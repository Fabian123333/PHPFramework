<?php

namespace Core;

abstract class Config {
    static $config = [];
    static $config_files = [
        "router" => ["path" => "routing.yaml"],
        "sitemanager" => ["path" => "sitemanager.yaml"]
    ];

    function SetWebsiteConfig($config){
        Config::$config["website"] = $config;
    }

    function GetConfigPath($type, $local_name = "") {
        if($local_name == "")
            return ROOT."/config/".Config::$config_files[$type]["path"];
        return ROOT."/web/${local_name}/config/".Config::$config_files[$type]["path"];
    }

    function GetWebsiteConfig()
    {
        return Config::$config["website"];
    }

    /*
     * Load config by name from $config_files
     */
    function LoadConfig($type, $local_name = "") {
        if(isset(Config::$config_files[$type])){
            if(function_exists("yaml_parse")){
                return yaml_parse(file_get_contents(Config::GetConfigPath($type, $local_name)));
            }
        }
        else{
            throw new \Exception("unknown config type");
        }
    }
}