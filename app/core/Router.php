<?php

namespace App\core;

use App\controller\HomeController;
use App\controller\errors\HttpErrorController;

// require_once '../app/controller/HomeController.php' ;
// require_once '../app/controller/errors/HttpErrorController.php' ;

class Router 
{
    public function dispatch(mixed $url) 
    
    {
       $url = trim($url, '/') ;
       $parts = $url ? explode('/', $url) : [] ;
       
       $controller_name = $parts[0] ?? 'Home' ;
       $controller_name = 'App\controller\\' . ucfirst($controller_name) . 'Controller' ;
      
       $action_name = $parts[1] ?? 'index' ;

       if(!class_exists($controller_name)) 
       {
            $controller = new HttpErrorController();
            $controller->notFound();
            return ;
       }

       $controller = new $controller_name() ;
      
       if(!method_exists($controller_name, $action_name)) 
       {
          $controller = new HttpErrorController() ;
          $controller->notFound() ;
          return ;
       }


       $params = array_slice($parts, 2) ;

       call_user_func_array([$controller, $action_name], $params);


    }
}

?>