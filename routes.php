<?php



$router->get('/','controllers/home.php');

$router->get('/login','controllers/auth/login.php');
$router->get('/register','controllers/auth/register.php');
$router->get('/logout','controllers/auth/logout.php');

$router->post('/register','controllers/auth/register.php');
$router->post('/login','controllers/auth/login.php');
$router->post('/logout','controllers/auth/logout.php');


$router->get('/logout','controllers/auth/logout.php');
$router->get('/todo','controllers/todo/index.php');
$router->get('/todo/edit','controllers/todo/edit.php');
$router->get('/todo/show','controllers/todo/show.php');
$router->delete('/todo/delete','controllers/todo/delete.php');
$router->post('/todo','controllers/todo/add.php');
$router->post('/todo/edit','controllers/todo/edit.php');


$router->put('/todo/edit','controllers/todo/edit.php');









?>
