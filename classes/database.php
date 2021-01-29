<?php

class database{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $dbName = 'visual_trip';
    public $conn;

    public function __construct(){

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);

        if($this->conn == TRUE){
            return $this->conn;

        } else {
            die('ERROR'.$this->conn->connect_error);

        }
    }
}
?>