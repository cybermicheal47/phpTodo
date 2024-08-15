<?php



$router->get('/','controllers/home.php');

$router->get('/login','controllers/auth/login.php',  ['guest']);
$router->get('/register','controllers/auth/register.php', ['guest']);
$router->get('/logout','controllers/auth/logout.php');

$router->post('/register','controllers/auth/register.php');
$router->post('/login','controllers/auth/login.php');
$router->post('/logout','controllers/auth/logout.php');


$router->get('/logout','controllers/auth/logout.php');
$router->get('/todo','controllers/todo/index.php');
$router->get('/todo/edit','controllers/todo/edit.php', ['auth']);
$router->get('/todo/show','controllers/todo/show.php');
$router->delete('/todo/delete','controllers/todo/delete.php', ['auth']);
$router->post('/todo','controllers/todo/add.php', ['auth']);
$router->post('/todo/edit','controllers/todo/edit.php');


$router->put('/todo/edit','controllers/todo/edit.php');









?>
