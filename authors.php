<?php
require_once 'models/Author.php';
$author = new Author();
$authors = $author->getAuthors()->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Autores</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Autores</h2>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#authorModal">Añadir Autor</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($authors as $author): ?>
                <tr>
                    <td><?php echo $author['id']; ?></td>
                    <td><?php echo $author['name']; ?></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#authorModal" onclick="editAuthor(<?php echo $author['id']; ?>, '<?php echo $author['name']; ?>')">Editar</button>
                        <form action="controllers/AuthorController.php" method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $author['id']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="authorModal" tabindex="-1" aria-labelledby="authorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="authorModalLabel">Añadir/Editar Autor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="controllers/AuthorController.php" method="POST" id="authorForm">
                    <div class="modal-body">
                        <input type="hidden" name="action" id="authorAction" value="create">
                        <input type="hidden" name="id" id="authorId">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
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
        function editAuthor(id, name) {
            document.getElementById('authorId').value = id;
            document.getElementById('name').value = name;
            document.getElementById('authorAction').value = 'update';
            document.getElementById('authorModalLabel').textContent = 'Editar Autor';
        }

        $('#authorModal').on('hidden.bs.modal', function () {
            document.getElementById('authorForm').reset();
            document.getElementById('authorAction').value = 'create';
            document.getElementById('authorModalLabel').textContent = 'Añadir Autor';
        });
    </script>
</body>
</html>
