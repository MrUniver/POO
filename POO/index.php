<?php
use Strange\Config\Autoloader;
use Strange\Config\Routeur;

define("ROOT", dirname(__FILE__).'\\');
require 'Config/Autoloader.php';
Autoloader::register();

Routeur::get("/" , "user@connect");
Routeur::get("/create" , "user@create");

Routeur::run();