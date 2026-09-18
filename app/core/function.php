<?php

namespace App\core;

function dd($vars) 
{
    echo '<pre style="background-color: #f5f5f5;
    color: #212529;
    padding: 10px;
    margin: 10px;
    border-radius: 5px;
    font-family: monospace;">' ;

    echo "<strong>Debug Output: </strong>" . "<br><br>" ;
    foreach($vars as $var) 
    {
        echo '<pre style="background-color: #d1d1d1;
                color: #212529;
                padding: 10px;
                margin: 10px;
                border-radius: 5px;
                font-family: monospace;">' ;
        echo "<pre>"; 
        var_dump($var) ;
        echo "<pre>"; 
    }


    $backtrace = debug_backtrace()[0] ;

    echo "<br><br>" . "<strong>Arquivo: </strong>:" . $backtrace['file'] . "<br>" ;
    echo "<strong>Linha: </strong>:" . $backtrace['line'] . "<br><br>" ;
    echo "<pre>" ;
    die() ;
}

function config(string $key, mixed $default = null): mixed  
{
    static $config = null;

    // Só lê o arquivo do disco na primeiríssima execução
    if ($config === null) {
        $config = require __DIR__ . '/../config/config.php';
    }

    return $config[$key] ?? $default;
}

?>