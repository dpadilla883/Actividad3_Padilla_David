NOMBRE: DAVID PADILLA

# Sistema de Gestión de Libros

Este proyecto es un sistema de gestión de libros que permite manejar autores y libros a través de una interfaz web. La aplicación está construida utilizando PHP y sigue el patrón de arquitectura MVC (Modelo-Vista-Controlador).

## Tecnologías Utilizadas

- **PHP**: Lenguaje de programación utilizado para el desarrollo del backend.
- **MySQL**: Base de datos utilizada para almacenar la información de los autores y libros.
- **HTML/CSS**: Para la estructura y estilo de las páginas web.

## Estructura del Proyecto

- `index.php`: Archivo principal que inicia la aplicación.
- `db.php`: Archivo de configuración de la base de datos.
- `authors.php`: Maneja las operaciones relacionadas con los autores.
- `books.php`: Maneja las operaciones relacionadas con los libros.
- `controllers/`: Contiene los controladores que manejan la lógica del negocio.
- `models/`: Contiene los modelos que representan las entidades y se comunican con la base de datos.

## Instrucciones para Ejecutar la Aplicación

1. **Clonar el repositorio:**

   ```bash
   git clone <https://github.com/dpadilla883/Actividad3_Padilla_David.git>
   ```

2. **Configurar la base de datos:**

   - Crear una base de datos en MySQL.
   - Importar el archivo SQL proporcionado en la base de datos.
   - Configurar las credenciales de la base de datos en `db.php`.

3. **Iniciar el servidor:**

   usar un servidor local como XAMPP o WAMP. Coloque el proyecto en la carpeta `htdocs` o el equivalente en su servidor y acceda a `http://localhost/Sis-gestion`.

 que desee hacer.
