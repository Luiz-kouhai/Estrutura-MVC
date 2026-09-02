<?php
require_once __DIR__ . '/../core/Controller.php' ;
require_once __DIR__ . '/../model/Usuario.php' ;

class HomeController extends Controller
{
    public function index() 
    {
        // exemplos de dado do model
       $usuario = new Usuario;
       $data = $usuario->getUserData() ;

        // Retorna a view do home
        $this->view('home/index',$data );

    }
    
    public function contact() 
    {
        $this->view('home/contact') ;
    }

}

?>

