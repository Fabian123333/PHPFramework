<?php

namespace Core;

abstract class Autoloader {
    function GetCorePath() {
        return ROOT."/core/";
    }

    function Init() {
        Autoloader::IncludeCore();
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

}