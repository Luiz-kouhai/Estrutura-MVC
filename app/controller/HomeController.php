<?php

namespace App\controller;

use App\core\Controller;
use App\core\Database;
use App\model\Usuario;

use function App\core\config;
use function App\core\dd;

// require_once __DIR__ . '/../core/Controller.php' ;
// require_once __DIR__ . '/../model/Usuario.php' ;

class HomeController extends Controller
{
    public function index() 
    {
        // exemplos de dado do model
       $usuario = new Usuario;
       $data = $usuario->getUserData() ;

       $user_id1 = $usuario->get_user_by_id(80) ;
       $total_usuarios = $usuario->get_users_count() ;

       echo "Usuário com ID 1: " .$user_id1['nome'] ; 
       echo "<br>" ;
       echo "Total de usuários: " . $total_usuarios ;

       $usuarios = $usuario->get_all_users() ;

       
        // Retorna a view do home
        $this->view('home/index',$data );

    }
    
    public function contact() 
    {
        $this->view('home/contact') ;
    }

}

?>

