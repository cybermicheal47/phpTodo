<?php

use MainClasses\Database;
use MainClasses\Session;
use MainClasses\Validation;
$config = require basePath("config/db.php");
$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];
    $errors = [];
// Validation
    if (!Validation::email($email)) {
        $errors['email'] = 'Please enter a valid email';
    }

    if (!Validation::string($password, 6, 1000)) {
        $errors['password'] = 'Password must be at least 6 characters';
    }
    if(!Validation::match($password,$passwordConfirmation)){
        $errors['password_confirmation'] = ' Your Password do not match';
    }


    if (!empty($errors)) {
        loadView('authentication/register', [
            'errors' => $errors]);
        exit;
    } else {


//check if email/username exit

        $param= [
            'email' => $email,
        ];

        $useralreadyExist = $db->query("SELECT * FROM users WHERE email='$email'");
        //if it does ,  return error
        if($useralreadyExist->rowCount() > 0){
            $errors['email'] = 'This email is already registered';

            loadView('authentication/register', [
                'errors' => $errors,
                'user' => [

                'email' => $email ] ]);
            exit();

        } else {

            //if it doesn't have error create new account

 $params = [
     'email' => $email,
     'password' => password_hash($password, PASSWORD_DEFAULT)
 ];

 $newuser = $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", $params);
           $newuserid = $db->conn->lastInsertId();

            Session::set('user',[
                'id' => $newuserid,

                'email' => $email,


            ] );


            header('Location:  /todo');

        }






//if it doesn't have error create new account
//redirect to the todo list






    }





}







loadView('authentication/register');
?>