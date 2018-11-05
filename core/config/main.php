<?php

namespace Core;

use Core\Content;

abstract class Config {
    static $config = [];
    static $config_files = [
        "routing" => ["path" => "routing.yaml"],
        "sitemanager" => ["path" => "sitemanager.yaml"]
    ];

    function GetConfigPath($type){
        return ROOT."/config/".Config::$config_files[$type]["path"];
    }

    /*
     * Load config by name from $config_files
     */
    function LoadConfig($type) {
        if(isset(Config::$config_files[$type])){
            if(function_exists("yaml_parse")){
                return yaml_parse(file_get_contents(Config::GetConfigPath($type)));
            }
        }
        else{
            throw new \Exception("unknown config type");
        }
    }
}