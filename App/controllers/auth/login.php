<?php
use MainClasses\Database;
use MainClasses\Session;
use MainClasses\Validation;
$config = require basePath("config/db.php");
$db = new Database($config);

 if ($_SERVER["REQUEST_METHOD"] == "POST") {


     $email = $_POST['email'];
     $password = $_POST['password'];

     $errors = [];
// Validation
     if (!Validation::email($email)) {
         $errors['email'] = 'Please enter a valid email';
     }

     if (!Validation::string($password, 6, 1000)) {
         $errors['password'] = 'Password must be at least 3 characters';
     }

     if (!empty($errors)) {
         loadView('authentication/login', [
             'errors' => $errors]);
         exit;
     }

     //check if email and password matches db then auth
     //else give error
     //load session

     //check if the email and password matches

     $params =[
         'email' => $email
     ];
     $user = $db->query("SELECT * FROM   users WHERE email = :email" , $params)->fetch();


     //check if the password matches


     // Check if the password matches
     $passwordverify = $user && password_verify($password, $user['password']);


     if (!$passwordverify) {
         loadView('authentication/login', [
             'errors' => ['Wrong email or password']
         ]);
             exit;

     }

     else{
//set user session

         Session::set('user',[
             'id' => $user['id'],
             'name' => $user['name'],
             'email' => $user['email'] ]);

         header('Location: /todo');
     }





 }






loadView('authentication/login');
?>