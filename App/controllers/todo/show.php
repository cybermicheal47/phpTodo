<?php
use MainClasses\Database;


$config = require basePath("config/db.php");
$db = new Database($config);

$id  = $_GET["id"];

$params = [
    'id' => $id
];

$todolist = $db->query('SELECT * FROM todo WHERE id = :id',$params)->fetch();
// inspectandDie($todolist);

loadView('todolist/show', [
    'todolist' => $todolist,
]);
;
?>