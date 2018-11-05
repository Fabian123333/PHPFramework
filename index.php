<?php
session_start();

ini_set("display_errors", 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

/* This is the main file of the PHP framework, an totally new hosting solution */
define("ROOT", __DIR__, true);

/* Requires the core essentials */
require(ROOT."/core/autoloader/autoloader.php");

use Core\Autoloader;
use Core\Sitemanager;

Autoloader::Init();

$sitemanager = new Sitemanager();
$site = $sitemanager->GetSite();

echo "debug";
