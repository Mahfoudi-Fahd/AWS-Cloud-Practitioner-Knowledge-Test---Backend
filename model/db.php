<?php

 define('DB_USER','root');
 define('DB_PASSWORD','');
 define('DB_HOST','localhost');
 define('DB_NAME','quizizy');
 
 session_start();



class DB{
    protected $pdo;
    function __construct($user = DB_USER, $password = DB_PASSWORD, $host = DB_HOST, $dbname = DB_NAME)
    {
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);


        } catch (PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }
    }

    function getDb(){
        return $this->pdo;
    }

    function __destruct()
    {
        if ($this->pdo !== null) {$this->pdo = null;} //return false to close the connection
    }
}

?>