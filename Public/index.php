<?php
require __DIR__ . "/../vendor/autoload.php";
use MainClasses\Router;
require '../helpers.php';

$router = new Router();

// get routes
$routes = require basePath('routes.php');

// get current uri and http method
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//route the request
$router->route($uri,$method);


