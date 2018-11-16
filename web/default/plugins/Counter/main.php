<?php
namespace Site\Plugin\Counter;

use \Template\Plugin\Plugin;

class Counter extends Plugin
{
    function __construct()
    {
        $this->AddJavascript(["react.js", "react-dom.js"], false, false);
        $this->AddJavascript("counter.js");
    }
}