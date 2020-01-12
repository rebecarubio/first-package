<?php

class DBconn{
    private $host;
    private $dbname;
    private $user;
    private $password;
    public $conn;

    public function __construct(){
        $this->host = 'localhost';
        $this->dbname ='icb0006_uf4_pr01';
        $this->user='root';
        $this->password='';

    }

    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'connection succes';
        }
        catch(PDOException $e){
            echo 'connection failed '.$e->getMessage();
        }
        return $this->conn;
    }
    
    public function disconnect(){
        $this->conn = NULL;
        //echo "Disconnected succesfully";
    }   
   
}



?>