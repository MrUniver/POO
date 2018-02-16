<?php
use Strange\Config\Autoloader;
use Strange\Config\Routeur;

define("ROOT", dirname(__FILE__).'\\');
require 'Config/Autoloader.php';
Autoloader::register();

/** Methodes du controleur welcomeController */
Routeur::get("/" , "welcome@connexion");
Routeur::get("/inscription" , "welcome@inscription");

Routeur::run();