<?php
require_once "Database.php";
require_once "TestClass.php";

class Controller
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function createTable($myRandomString){
        try {
            $sql = $this->conn->prepare("CREATE TABLE $myRandomString (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            test_code VARCHAR(256) NOT NULL
            )");

            $temp = $sql->execute();
        }
        catch (PDOException $e){

            return "Error" . $e->getMessage();
        }
        return 1;
    }

    public function selectTeacher($login){
        try {
            $sql = $this->conn->prepare("SELECT COUNT(*) FROM teachers WHERE id_ucitel='$login'");
            $sql->execute();
            $result = $sql->fetchColumn();
        }
        catch (PDOException $e){

            return "Error" . $e->getMessage();
        }

        return $result;
    }

    public function insertTeacher($hash){
        try{

            $sql = "INSERT INTO teachers (meno_ucitel, priezvisko_ucitel, id_ucitel, heslo_ucitel)
                    VALUES ('{$_POST['meno_ucitel']}', '{$_POST['priezvisko_ucitel']}', '{$_POST['id']}', 
                            '{$hash}')";
            $this->conn->exec($sql);
        }
        catch (PDOException $e){
            return "Error" . $e->getMessage();
        }
    }

    public function checkPassword($login){
        try{
            $veta = $this->conn->prepare("SELECT heslo_ucitel from teachers WHERE id_ucitel='$login'");
            $veta->execute();
            $result = $veta->fetchColumn();
        }
        catch (PDOException $e){
            return "Error" . $e->getMessage();
        }
        return $result;
    }

    public function insertTest($ucitel_id , $test_id){
        try{

            $sql =  "INSERT INTO tests (ucitel_id, test_id) VALUES ('$ucitel_id', '$test_id')";
            $this->conn->exec($sql);
        }
        catch (PDOException $e){
            return "Error" . $e->getMessage();
        }
        return 1;
    }

    public function insertQuestion($table , $html){
        try{
            $sql = "INSERT INTO $table (test_code) VALUE ('$html')";
            $this->conn->exec($sql);
        }
        catch (PDOException $e){
            return "Error" . $e->getMessage();
        }
        return 1;
    }

    public function selectTableQuestion($table){
        try {
            $sql = $this->conn->prepare("SELECT * FROM $table");
            $sql->execute();
            $questions = $sql->fetchAll(PDO::FETCH_CLASS, "TestClass");
        }
        catch (PDOException $e){

            return "Error" . $e->getMessage();
        }

        return $questions;
    }

}