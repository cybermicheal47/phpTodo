<?php

namespace MainClasses;

use MainClasses\middleware\Authorize;

class Router
{
    // An array to store all registered routes.
protected $routes = [];


    /**
     * Registers a new route.
     *
     * @param string $method       The HTTP method (GET, POST, etc.) for the route.
     * @param string $uri          The URI (path) associated with the route.
     * @param string $controller   The controller that handles the route's logic.
     * @param array  $middleware   (Optional) An array of middleware to apply to the route.
     */
public function registerRoute($method,$uri,$controller, $middleware = []){
    // Add the route details to the routes array.
    $this->routes[] = [
        'method' => $method,           // Store the HTTP method.
        'uri' => $uri,                 // Store the URI.
        'controller' => $controller,       // Store the controller.
        'middleware' => $middleware   //Store any middleware associated with the route.


    ];

}



//add a get route
    /**
     * Add a Get Route
     * @param string uri
     * @param string controller
     * return void
     */

    public function get ($uri,$controller,$middleware = []){
        $this->registerRoute('GET', $uri,$controller,$middleware);
    }


    //add a POST route
    /**
     * Add a POST Route
     * @param string uri
     * @param string controller
     * return void
     */
    public function post ($uri,$controller,$middleware = []){
        $this->registerRoute('POST', $uri,$controller,$middleware);
    }


    //add a PUT route
    /**
     * Add a PUT Route
     * @param string uri
     * @param string controller
     * return void
     */
    public function put ($uri,$controller,$middleware = []){
        $this->registerRoute('PUT', $uri,$controller,$middleware);

    }


    //add a DELETE route
    /**
     * Add a DELETE Route
     * @param string uri
     * @param string controller
     * return void
     */
    public function delete ($uri,$controller,$middleware = []){
        $this->registerRoute('DELETE', $uri,$controller,$middleware);
    }


    public function error($httpCode = 404){
        http_response_code($httpCode);
        loadView("errors/{$httpCode}");
        exit;
    }


    public function  route($uri,$method){
        //check if there is an method overide using _method
        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }


        // Loop through all registered routes to find a matching route
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri) {


                // Apply middleware before the controller is executed
                foreach ($route['middleware'] as $middleware) {
                    (new Authorize())->handle($middleware);
                }


                // Load and execute the controller associated with the route
                require  basePath("App/" . $route['controller']);
                return;
            }

        }

        // If no matching route is found, trigger an error handling method
        $this->error();


    }



}