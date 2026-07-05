# RDuende.com

Repositorio del sitio RDuende.com.

## Requisitos

- [PHP](https://windows.php.net/) 8.x en el PATH, con las extensiones `curl`, `mbstring`, `openssl`, `pdo_sqlite` y `sqlite3` habilitadas en `php.ini`.

No se necesita Docker ni MySQL: el entorno local usa el servidor embebido de PHP y SQLite.

## Desarrollo local (WordPress + PHP + SQLite)

1. Monta el entorno (descarga WordPress, el plugin de SQLite, WP-CLI, enlaza el tema y crea el contenido inicial):

   ```powershell
   powershell -ExecutionPolicy Bypass -File bin\setup-local-dev.ps1
   ```

2. Arranca el servidor:

   ```sh
   php -S localhost:8080 -t .wp-local
   ```

3. Abre http://localhost:8080 (usuario `admin` / contraseña `admin`).

El código del tema vive en `wp-content/themes/rduende/` y se enlaza dentro de `.wp-local/wp-content/themes/rduende` mediante un *junction* de NTFS, así que los cambios se reflejan al instante sin necesidad de copiar archivos.

`.wp-local/` no se versiona (contiene el núcleo de WordPress y la base de datos SQLite, ambos generados localmente). Para reconstruir el contenido inicial (páginas, menú, entrada de blog) sin volver a montar todo el entorno:

```sh
php ruta\a\wp-cli.phar --path=.wp-local eval-file bin\seed-content.php
```

Nota: la página "Sobre nosotros" y los datos de contacto de la página "Contacto" quedan con placeholders `[Pendiente: ...]` hasta que se defina el texto real.

## Contribuir

Las contribuciones son bienvenidas. Abre un issue o un pull request para proponer cambios.
