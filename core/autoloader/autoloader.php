<?php

namespace Core;

abstract class Autoloader {
    function GetCorePath() {
        return ROOT."/core/";
    }

    function GetClassPath() {
        return ROOT."/class/";
    }

    function Init() {
        Autoloader::IncludeCore();
        Autoloader::IncludeClasses();
    }

    /*
     * Includes core utils from "/core"
     */
    function IncludeCore() {
        $dir = glob(Autoloader::GetCorePath()."*", GLOB_ONLYDIR);
        foreach($dir as $path){
            if(file_exists($path."/main.php")) {
                require_once($path."/main.php");
            }
        }
    }

    function IncludeClasses()
    {
        $dir = glob(Autoloader::GetClassPath()."*", GLOB_ONLYDIR);
        foreach($dir as $path){
            if(file_exists($path."/main.php")) {
                require_once($path."/main.php");
            }
        }

    }
}
