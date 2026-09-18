<?php

Namespace App\core ;

class Database
{
    private ?\PDO $connection = null ;

    private static ?self $instance = null;

    private function __construct()
    {
        $this->connect() ;
    }

    public static function Get_instance() :self
    {
        if(self::$instance == null) 
        {
            self::$instance = new self() ;
        }
        return self::$instance ;
    }

    public function connect(): bool
    {
        $database_config = config('database') ;

        $dsn = "mysql:host={$database_config['host']};dbname={$database_config['dbname']};charset={$database_config['charset']};" ;

        $options = 
        [ 
            \PDO::ATTR_ERRMODE=> \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE=> \PDO::FETCH_ASSOC, 
        ];

        try 
        {
            $this->connection = new \PDO($dsn, $database_config['username'], $database_config['password'], $options);
            return true;
        }
        catch(\PDOException $e) 
        {
            throw new \Exception('Erro de conexão DB:' . $e->getMessage());
        } 
        return false ;
    }

    public function fetch(string $sql,array $params = []): array|false 
    {
        $stmt = $this->query($sql, $params) ;
        return $stmt->fetch() ;
    } 

    public function fetchAll($sql, $params = []): array
    {
        $stmt = $this->query($sql, $params) ;
        return $stmt->fetchAll() ;
    }

    public function execute($sql, $params = []): string 
    {   
        $stmt = $this->query($sql, $params) ;
        return $stmt->rowCount() ;
    }
    
    public function last_insert_id(): string 
    {
        return $this->connection->lastInsertId();
    }
    

    public function query(string $sql,array $params= []): \PDOstatement 
    {
        try 
        {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params) ;
            return $stmt ;
        }
        catch (\PDOException $e) 
        {
            throw new \Exception('Erro na consulta ao DB:' . $e->getMessage()) ;
        }
    }
}

?>