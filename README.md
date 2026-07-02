# RDuende.com

Repositorio del sitio RDuende.com.

## Requisitos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) con Docker Compose.

## Desarrollo local (WordPress + Docker)

1. Copia `.env.example` a `.env` y ajusta las contraseñas.
2. Levanta los contenedores:

   ```sh
   docker compose up -d
   ```

3. Abre http://localhost:8080 para completar la instalación de WordPress.
4. Activa el tema **RDuende** en Apariencia > Temas. El código del tema vive en `wp-content/themes/rduende/` y se monta directamente en el contenedor, así que los cambios se reflejan al instante.
5. (Opcional) Instala WP-CLI en el contenedor y ejecuta `bin/seed-content.sh` para crear las páginas, el menú y la entrada de blog con el contenido real de RDuende:

   ```sh
   docker compose exec wordpress sh -c \
     "curl -sS -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && chmod +x /usr/local/bin/wp"
   docker compose cp bin/seed-content.sh wordpress:/tmp/seed-content.sh
   docker compose exec -w /var/www/html wordpress sh /tmp/seed-content.sh
   ```

   Nota: la página "Sobre nosotros" y los datos de contacto de la página "Contacto" quedan con placeholders `[Pendiente: ...]` hasta que se defina el texto real.

Para detener el entorno:

```sh
docker compose down
```

## Contribuir

Las contribuciones son bienvenidas. Abre un issue o un pull request para proponer cambios.
