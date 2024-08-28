<?php
require_once '../models/Author.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    $author = new Author();
    if ($action == 'create') {
        $author->name = $_POST['name'];
        $author->createAuthor();
    } elseif ($action == 'update') {
        $author->id = $_POST['id'];
        $author->name = $_POST['name'];
        $author->updateAuthor();
    } elseif ($action == 'delete') {
        $author->id = $_POST['id'];
        $author->deleteAuthor();
    }

    header('Location: ../authors.php');
}
?>
