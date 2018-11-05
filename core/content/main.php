<?php

namespace Core;

abstract class Content {
    static $content = [];

    function Set($key, $val){
        Content::$content[$key] = $val;
    }

    function Get($key){
        return Content::$content[$key];
    }
}