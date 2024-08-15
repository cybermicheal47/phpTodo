<?php


namespace MainClasses\middleware;
use Closure;
use MainClasses\Session;

class Authorize
{
    public function isAuthenticated(){
        return Session::has('user');

    }


    public function handle($role){
        // If the role is 'guest' and the user is authenticated (logged in),
        // redirect them to the homepage ('/'). This prevents logged-in users
        // from accessing guest-only areas like the login or registration pages
        if($role == 'guest' && $this->isAuthenticated()){
            return header('Location: /');
            exit();

        }  // If the role is 'auth' and the user is NOT authenticated (not logged in),
        // redirect them to the login page ('/login'). This ensures that only
        // authenticated users can access certain areas of the application.
        elseif ($role === 'auth' && !$this->isAuthenticated()){
            return header('Location: /login');
            exit();

        }

    }
}