<?php
namespace Site;

use Core\Plugin;

class Run extends \Template\Site\Extended
{
    private $plugin = ["counter"];

    function __construct()
    {
        $this->AddJavascript(["jquery.js", "bootstrap.js"]);
        $this->AddCSS(["bootstrap.css"]);
        $this->AddPlugin(["Counter"]);

        $this->RunPlugins();
        echo "<pre>";
        print_r($this->GetConfig());
        echo "</pre>";
    }
}