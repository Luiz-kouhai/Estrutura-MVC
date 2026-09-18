<?php

namespace App\model ;

use App\core\Model  ;

class Usuario extends Model
{
    public function getUserData() 
    {
        return 
        [
            'nome' => ' Gustavo Lopes',
            'idade' => 28,
            'email' =>' negoney228@gmail.com'
        ] ;
    }

   public function create_user($name) 
   {
        $sql = "INSERT INTO usuarios (nome) VALUES(:name)" ;
        $params = ['name' => $name] ;
        return $this->db->execute($sql, $params) ;
   }

    public function get_all_users() 
    {
        return $this->db->fetchAll('SELECT * from usuarios') ;
    }

    public function get_user_by_id($id) 
    {
        $sql = ('SELECT * from usuarios WHERE id = :id') ; 
        $params = ['id' => $id] ;
        return $this->db->fetch($sql , $params) ;
    }
    
    public function get_users_count() 
    {
        return $this->db->fetch('SELECT COUNT(*) as count from usuarios')['count'] ;
    }
}

?>