<?php

class Controller 
{

    protected function view(string $view, $view_data = [])
    {
        extract($view_data) ;

        $view_file = __DIR__ . '/../view/' . $view . '.php' ;

        if(!file_exists($view_file)) 
        {
            throw new Exception("View not found: " , $view_file) ;
        }

        require_once "$view_file" ;
    }

}

?>