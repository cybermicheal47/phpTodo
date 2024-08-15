<?php
use MainClasses\Database;
$config = require basePath("config/db.php");
$db = new Database($config);


$id = $_GET['id'] ?? null;

$params = ['id' => $id];
//get the todo list from db


$currentdataQuery = "Select * from todo where id = :id";
$currentdata=$db->query($currentdataQuery, $params)->fetch();


// delete it

$query = 'delete from todo where id = :id';
$db->query($query,$params);


//redirect
header('Location: /todo');
exit();

//redirect to todo list




?>