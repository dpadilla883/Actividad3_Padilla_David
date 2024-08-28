<?php
require_once 'models/Book.php';
$book = new Book();
$books = $book->getBooks()->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Libros</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Libros</h2>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#bookModal">Añadir Libro</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Año de Publicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($books as $book): ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['published_year']; ?></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#bookModal" onclick="editBook(<?php echo $book['id']; ?>, '<?php echo $book['title']; ?>', <?php echo $book['published_year']; ?>)">Editar</button>
                        <form action="controllers/BookController.php" method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookModalLabel">Añadir/Editar Libro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controllers/BookController.php" method="POST" id="bookForm">
                    <div class="modal-body">
                        <input type="hidden" name="action" id="bookAction" value="create">
                        <input type="hidden" name="id" id="bookId">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="published_year">Año de Publicación</label>
                            <input type="number" class="form-control" id="published_year" name="published_year" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function editBook(id, title, published_year) {
            document.getElementById('bookId').value = id;
            document.getElementById('title').value = title;
            document.getElementById('published_year').value = published_year;
            document.getElementById('bookAction').value = 'update';
            document.getElementById('bookModalLabel').textContent = 'Editar Libro';
        }

        $('#bookModal').on('hidden.bs.modal', function () {
            document.getElementById('bookForm').reset();
            document.getElementById('bookAction').value = 'create';
            document.getElementById('bookModalLabel').textContent = 'Añadir Libro';
        });
    </script>
</body>
</html>
