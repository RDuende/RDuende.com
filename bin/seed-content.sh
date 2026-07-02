#!/bin/sh
# Crea el contenido inicial de RDuende.com (páginas, menú y entrada de blog)
# dentro del contenedor de WordPress. Requiere WP-CLI instalado en el contenedor
# y el stack de docker compose corriendo.
#
# Uso: docker compose exec wordpress sh /var/www/html/wp-content/themes/rduende/../../../bin/seed-content.sh
# o copia este script dentro del contenedor y ejecútalo con `wp --allow-root`.

set -e

WP="wp --allow-root"

# Elimina el post y la página de muestra que WordPress crea en cada instalación nueva,
# para que no compitan con el contenido real (p.ej. en la sección "Proyecto destacado").
$WP post delete 1 --force > /dev/null 2>&1 || true
$WP post delete 2 --force > /dev/null 2>&1 || true

INICIO_ID=$($WP post create --post_type=page --post_title="Inicio" --post_status=publish --post_content='<p>En un mundo donde la primera impresión lo es todo, transformamos tus ideas en piezas gráficas que inspiran, comunican y dejan huella.</p>' --porcelain)

SERVICIOS_ID=$($WP post create --post_type=page --post_title="Servicios" --post_status=publish --post_content='<ul class="services-grid">
<li class="service-card"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-impresion-gran-formato.jpg" alt="Impresión de gran formato: vallas, lonas, carteles y papeles"></li>
<li class="service-card"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-rotulacion-vinilos.jpg" alt="Rotulación y vinilos: vehículos, escaparates y fachadas"></li>
<li class="service-card"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-corte-laser.jpg" alt="Corte y grabado láser: madera, metacrilato y metal"></li>
<li class="service-card"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-textil-sublimacion.jpg" alt="Textil y sublimación: camisetas, ropa laboral y personalización"></li>
<li class="service-card"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-letras-corporeas.jpg" alt="Letras corpóreas: 3D, luminosas o sin luz"></li>
<li class="service-card"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-articulos-promocionales.jpg" alt="Artículos promocionales: regalos, merchandising y empresas"></li>
</ul>' --porcelain)

SOBRE_ID=$($WP post create --post_type=page --post_title="Sobre nosotros" --post_status=publish --post_content='<p><em>[Pendiente: historia, misión y equipo real de RDuende. Editar esta página en cuanto tengamos el texto definitivo.]</em></p>' --porcelain)

CONTACTO_ID=$($WP post create --post_type=page --post_title="Contacto" --post_status=publish --post_content='<p>La vida es demasiado corta para diseños aburridos.</p><p>Teléfono: <a href="tel:+34968626506">968 62 65 06</a><br>Email: <a href="mailto:info@rduende.com">info@rduende.com</a></p><p><em>[Pendiente: dirección física, si se quiere publicar.]</em></p>' --porcelain)

BLOG_PAGE_ID=$($WP post create --post_type=page --post_title="Blog" --post_status=publish --post_content='' --porcelain)

$WP option update show_on_front page
$WP option update page_on_front "$INICIO_ID"
$WP option update page_for_posts "$BLOG_PAGE_ID"
$WP option update blogdescription "Tu idea, nuestro arte"

$WP post create --post_type=post --post_title="Reconstrucción del panel de mandos de una máquina recreativa COMAVI" --post_status=publish --post_date="2025-09-18 12:00:00" --post_content='<p>Una máquina recreativa no es solo un mueble electrónico: es un fragmento de la historia del ocio y la cultura popular.</p><p>El proceso de reconstrucción incluyó varias fases: digitalización del vinilo original, creación de plantillas de corte en metacrilato, procesamiento mediante máquina láser, e impresión digital del diseño en material transparente.</p><p>En el montaje, adherimos el vinilo bajo el metacrilato, aplicamos un fondo blanco para dar contraste, y ajustamos los orificios para los controles.</p><p>La reconstrucción de máquinas recreativas antiguas combina la preservación cultural con tecnología contemporánea: en RDuende integramos la tradición del diseño original con herramientas modernas como el corte láser y la impresión digital.</p>'

$WP menu create "Principal"
$WP menu item add-post principal "$INICIO_ID" --title="Inicio"
$WP menu item add-post principal "$SERVICIOS_ID" --title="Servicios"
$WP menu item add-post principal "$SOBRE_ID" --title="Sobre nosotros"
$WP menu item add-post principal "$CONTACTO_ID" --title="Contacto"
$WP menu item add-post principal "$BLOG_PAGE_ID" --title="Blog"
$WP menu location assign principal primary
