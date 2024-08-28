<?php
class Database {
    private $host = "localhost";
    private $db_name = "sistemagestion";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>


<?php

$pdo = new mysqli('localhost','root','','sistemagestion');

$pdo->set_charset("utf8");

//Connection Error

   $error = mysqli_connect_error();

if($pdo->connect_errno){

echo "Connection Failed: ".$error;

}
?>