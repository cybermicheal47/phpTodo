<?php
use MainClasses\Database;
use MainClasses\Session;
$config = require basePath("config/db.php");
$db = new Database($config);


$id = $_GET['id'] ?? null;

$params = ['id' => $id];
//get the todo list from db


$currentdataQuery = "Select * from todo where id = :id";
$currentdata=$db->query($currentdataQuery, $params)->fetch();


//Authorization
if(Session::get('user')['id'] !== $currentdata['user_id']) {
    http_response_code(403);
    Session::set('error', 'You are not authorized to perform this action.');
    return header('Location: /');
    exit;
}




// delete it

$query = 'delete from todo where id = :id';
$db->query($query,$params);


//redirect
header('Location: /todo');
exit();

//redirect to todo list




?>