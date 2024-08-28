NOMBRE: DAVID PADILLA

# Documentación del Sistema de Gestión de Libros

## Funcionalidad del Router

El router de esta aplicación es simple y está basado en archivos PHP. El archivo `index.php` actúa como el punto de entrada principal de la aplicación y direcciona las solicitudes a los controladores correspondientes.

### Rutas Principales

- **/index.php**: Página principal que puede mostrar una lista de libros o un dashboard.
- **/authors.php**: Maneja todas las operaciones relacionadas con los autores (crear, editar, eliminar).
- **/books.php**: Maneja todas las operaciones relacionadas con los libros (crear, editar, eliminar).

### Estructura del Proyecto

- **controllers/**: Aquí se encuentran los controladores que procesan las solicitudes y coordinan las respuestas con los modelos.
  - Ejemplo: `BookController.php`, `AuthorController.php`.
- **models/**: Los modelos representan las entidades del sistema, como `Book.php` y `Author.php`, y se encargan de interactuar con la base de datos.
- **db.php**: Archivo de configuración para la conexión a la base de datos.

### Uso de las Peticiones

Las peticiones HTTP (GET y POST) son utilizadas para interactuar con la aplicación. Por ejemplo:

- **GET**: Para obtener datos (como la lista de libros).
- **POST**: Para enviar datos al servidor (como agregar un nuevo autor o libro).

### Ejemplo de Flujo de Trabajo

1. El usuario accede a la página de autores (`authors.php`).
2. Si envía un formulario para agregar un nuevo autor, la solicitud POST se procesa en el controlador correspondiente.
3. El controlador utiliza el modelo `Author.php` para interactuar con la base de datos y agregar el nuevo autor.
4. El usuario es redirigido de vuelta a la lista de autores.
