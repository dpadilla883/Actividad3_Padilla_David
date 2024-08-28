<?php
require_once 'db.php';

class Book {
    private $conn;
    private $table_name = "books";

    public $id;
    public $title;
    public $published_year;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getBooks() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function createBook() {
        $query = "INSERT INTO " . $this->table_name . " (title, published_year) VALUES (:title, :published_year)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":published_year", $this->published_year);
        return $stmt->execute();
    }

    public function updateBook() {
        $query = "UPDATE " . $this->table_name . " SET title = :title, published_year = :published_year WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":published_year", $this->published_year);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function deleteBook() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
?>
