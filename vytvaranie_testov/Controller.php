<?php
require_once "Database.php";

class Controller
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function selectQuestion($string){
        try{
            echo $string;
            $stmt = $this->conn->prepare("select * from $string");
            echo "111";
            //echo var_dump($sql);
            if($stmt == false){
                echo "cc";
                return 0;
            }
            echo "1";
            $temp = $stmt->execute();
            echo "f";
        }        catch (PDOException $e){
            return "Error" . $e->getMessage();;
        }

        return $temp;
    }

    public function createTable($myRandomString){
        try {
            $sql = $this->conn->prepare("CREATE TABLE $myRandomString (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        test_code VARCHAR(64) NOT NULL
        )");

            $temp = $sql->execute();
        }
        catch (PDOException $e){

            return "Error" . $e->getMessage();;
        }
        return 1;
    }
}