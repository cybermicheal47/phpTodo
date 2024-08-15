<?php




use MainClasses\Database;
use MainClasses\Session;
use MainClasses\Validation;
$config = require basePath("config/db.php");
$db = new Database($config);



Session::clearAll();

$params = session_get_cookie_params();///this give us path and domain cookie belongs to
setcookie('PHPSESSID', '', time()-86400, $params['path'],$params['domain']);

header('Location: /');


exit;

