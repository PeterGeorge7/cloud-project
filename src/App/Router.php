<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouterException;

class Router
{
    private $routes = [];

    /**
     * Summary of register
     * @param string $requestMethod
     * @param string $route
     * @param callable|array $action
     * @return void
     */
    private function register(string $requestMethod, string $route, callable|array $action)
    {
        $this->routes[$requestMethod][$route] = $action;
    }

    /**
     * Summary of get
     * @param string $route
     * @param callable|array $action
     * @return void
     */
    public function get(string $route, callable|array $action)
    {
        return $this->register("get", $route, $action);
    }
    public function post(string $route, callable|array $action)
    {
        return $this->register("post", $route, $action);
    }

    /**
     * Summary of resolve
     * @param string $requestUri
     * @throws \App\Exceptions\RouterException
     * @return callable|null
     */
    public function resolve(string $requestUri,string $requestMethod)
    {
        $requestUri = explode("?", $requestUri);
        $action = $this->routes[strtolower($requestMethod)][$requestUri[0]] ?? null;
        if ($action === null) {
            throw new RouterException();
        }
        if (is_callable($action)) {
            return call_user_func($action);
        }
        if (is_array($action)) {
            [$class, $method] = $action;
            if (class_exists($class)) {
                $object = new $class;
                if (method_exists($object, $method)) {
                    return call_user_func([$object, $method]);
                }
            }
        }
    }
}
