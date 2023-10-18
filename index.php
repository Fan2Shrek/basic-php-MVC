<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$route = substr($_SERVER['REQUEST_URI'], 1);
$exploded = explode('?', $route);
$route = $exploded[0];
$arg = $exploded[1] ?? null;

if ('' === $route) {
    $route = 'login';
}

function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

$mainController = require 'src/MainController.php';
$filmController = require 'src/FilmController.php';

if (method_exists($mainController, $route)) {
    $mainController->$route(...$_GET);
    exit(0);
}

if (method_exists($filmController, $route)) {
    $filmController->$route(...$_GET);
    exit(0);
}

die(sprintf('Route %s not found', $route ?? 'index'));
