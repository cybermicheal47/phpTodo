<?php

use MainClasses\Database;
use MainClasses\Session;


$config = require basePath("config/db.php");
$db = new Database($config);

$userId = Session::get('user')['id'];

$params = [
    'user_id' => $userId
];

$todolist = $db->query('SELECT * FROM todo WHERE user_id = :user_id', $params )->fetchAll();
//inspectandDie($todolist);


loadView('todolist/index' , ['todolist' => $todolist]);
?>