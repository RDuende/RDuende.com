# RDuende.com

## Desarrollo local (WordPress + Docker)

Requisitos: [Docker Desktop](https://www.docker.com/products/docker-desktop/) con Docker Compose.

1. Copia `.env.example` a `.env` y ajusta las contraseñas.
2. Levanta los contenedores:

   ```sh
   docker compose up -d
   ```

3. Abre http://localhost:8080 para completar la instalación de WordPress.
4. Activa el tema **RDuende** en Apariencia > Temas. El código del tema vive en `wp-content/themes/rduende/` y se monta directamente en el contenedor, así que los cambios se reflejan al instante.

Para detener el entorno:

```sh
docker compose down
```
