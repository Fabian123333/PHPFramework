<?php
/* This is the main file of the utopica framework, an totally new hosting solution */
define("ROOT", __DIR__, true);

/* Requires the core essentials */
require(ROOT."/core/autoloader/main.php");

use Core\Autoloader;

Autoloader::Init();

echo "debug";
