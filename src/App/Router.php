<?php

namespace NataInditama\Auctionx\App;

use NataInditama\Auctionx\App\View;

class Router
{
  private static $routes;

  public static function add(string $path, string $controller, string $function, string $method = "GET", array $middleware = []): void
  {
    self::$routes[] = [
      'method' => $method,
      'path' => $path,
      'controller' => $controller,
      'function' => $function,
      'middleware' => $middleware
    ];
  }

  public static function run(): void
  {
    $path = $_SERVER['PATH_INFO'] ?? "/";
    $method = $_SERVER['REQUEST_METHOD'];

    foreach (self::$routes as $route) {
      $pattern = "#^" . $route['path'] . "$#";
      if (preg_match($pattern, $path, $variables) && $method == $route['method']) {

        foreach ($route['middleware'] as $middleware) {
          $instance = new $middleware;
          $instance->before();
        }
        
        $function = $route['function'];
        $controller = new $route['controller'];
        
        array_shift($variables);
        call_user_func_array([$controller, $function], $variables);
        
        return;
      }
    }

    http_response_code(404);
    View::render('404');
  }   
}