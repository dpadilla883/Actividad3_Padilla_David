<?php
require_once '../models/Book.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$book = new Book();

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['action'])) {
            switch ($data['action']) {
                case 'create':
                    $book->title = $data['title'];
                    $book->published_year = $data['published_year'];
                    $book->createBook();
                    echo json_encode(['message' => 'Libro creado correctamente']);
                    break;
                case 'update':
                    $book->id = $data['id'];
                    $book->title = $data['title'];
                    $book->published_year = $data['published_year'];
                    $book->updateBook();
                    echo json_encode(['message' => 'Libro actualizado correctamente']);
                    break;
                case 'delete':
                    $book->id = $data['id'];
                    $book->deleteBook();
                    echo json_encode(['message' => 'Libro eliminado correctamente']);
                    break;
            }
        }
        break;
    default:
        echo json_encode(['message' => 'Método no soportado']);
        break;
}
?>
