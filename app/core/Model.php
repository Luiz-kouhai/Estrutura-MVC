<?php

namespace App\core ;

abstract class Model 
{
    protected Database $db ;

    public function __construct() 
    {
        $this->db = Database::Get_instance() ;
    }
}

?>