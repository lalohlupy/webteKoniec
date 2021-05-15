<?php

class Database{

    private $conn;
    public function getConnection(){
        $servername = "localhost";
        $username = "xcernan";
        $password = "Jek1qD$#HWzwjB";
        $dbname = "zaverecne_zadanie";

        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=". $servername . ";dbname=" .$dbname, $username, $password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
