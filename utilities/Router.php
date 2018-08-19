<?php

namespace Blip\Utilities;


use Blip\Utilities\Routes;

use Blip\Controllers\ErrorController;

use \Exception;


/**
 * Front router for handling URIs
 * 
 */
class Router
{
    protected $routes = [

        'GET' => [],

        'POST' => []

    ];


    /**
     * Gets all routes from file and sorts them into $routes property by request type,
     * creates new 'self' object to allow for method chaining.
     * 
     * @param string $file  File containing arrays of routes by request type
     * 
     * @return Router
     */
    public static function load()
    {
        try {

            $router = new self;

            $allRoutes = Routes::getRoutes();

            $router->routes['GET'] = $allRoutes['get'];
            $router->routes['POST'] = $allRoutes['post'];

            return $router;
        
        } catch (Exception $e) {

            ErrorController::logError($e, __METHOD__);

            return ErrorController::throwError('NOROUTE');

        }
    }

    /**
     * Breaks route into URI and controller type.
     * 
     * @param string $uri
     * @param string $requestType
     * 
     * @return callable  Returns callAction() method
     */
    public function direct($uri, $requestType)
    {

        if (array_key_exists($uri, $this->routes[$requestType])) {

            return $this->callAction(

                ...explode('@', $this->routes[$requestType][$uri])

            );

        }

        return ErrorController::throw404();
    }

    /**
     * Routes request to proper controller + controller method.
     * 
     * @param string $controller
     * @param string $action
     * 
     * @return object  Returns new instance of the specified Controller
     */
    protected function callAction($controller, $action)
    {

        $controller = "Blip\\Controllers\\{$controller}";

        if (!method_exists($controller, $action)) {
        
            return ErrorController::throw404();
        }

        return (new $controller)->$action();

    }
}