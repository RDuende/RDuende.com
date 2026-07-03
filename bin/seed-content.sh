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

SERVICIOS_ID=$($WP post create --post_type=page --post_title="Servicios" --post_status=publish --post_content='' --porcelain)

# Páginas individuales de cada servicio (hijas de Servicios), con su propia URL.
SVC1=$($WP post create --post_type=page --post_parent="$SERVICIOS_ID" --post_title="Impresión de gran formato" --post_status=publish --post_content='<img src="/wp-content/themes/rduende/assets/images/icons/icon-impresion-gran-formato.jpg" alt="Impresión de gran formato" class="service-page-image"><p>Producimos vinilos, lonas, carteles, rollups y papel de gran formato con la máxima calidad de color, ideales para vallas publicitarias, escaparates y campañas que necesitan impacto visual a gran escala.</p><p><a class="button" href="/contacto/">Pide presupuesto</a></p>' --porcelain)
SVC2=$($WP post create --post_type=page --post_parent="$SERVICIOS_ID" --post_title="Rotulación de vehículos y empresas" --post_status=publish --post_content='<img src="/wp-content/themes/rduende/assets/images/icons/icon-rotulacion-vinilos.jpg" alt="Rotulación de vehículos y empresas" class="service-page-image"><p>Convertimos tu flota y tus espacios en herramientas de comunicación: rotulación de vehículos, escaparates y fachadas con vinilos de corte e impresión digital de alta durabilidad.</p><p><a class="button" href="/contacto/">Pide presupuesto</a></p>' --porcelain)
SVC3=$($WP post create --post_type=page --post_parent="$SERVICIOS_ID" --post_title="Corte y grabado láser" --post_status=publish --post_content='<img src="/wp-content/themes/rduende/assets/images/icons/icon-corte-laser.jpg" alt="Corte y grabado láser" class="service-page-image"><p>Precisión milimétrica en madera, metacrilato y metal. Ideal para piezas personalizadas, señalética, expositores y proyectos que requieren acabados exactos.</p><p><a class="button" href="/contacto/">Pide presupuesto</a></p>' --porcelain)
SVC4=$($WP post create --post_type=page --post_parent="$SERVICIOS_ID" --post_title="Estampación de camisetas deportivas" --post_status=publish --post_content='<img src="/wp-content/themes/rduende/assets/images/icons/icon-textil-sublimacion.jpg" alt="Estampación de camisetas deportivas" class="service-page-image"><p>Personalizamos camisetas, ropa laboral y textil deportivo con técnicas de sublimación y estampación duraderas, perfectas para equipos y empresas.</p><p><a class="button" href="/contacto/">Pide presupuesto</a></p>' --porcelain)
SVC5=$($WP post create --post_type=page --post_parent="$SERVICIOS_ID" --post_title="Letras corpóreas" --post_status=publish --post_content='<img src="/wp-content/themes/rduende/assets/images/icons/icon-letras-corporeas.jpg" alt="Letras corpóreas" class="service-page-image"><p>Letras y logotipos en volumen, con o sin iluminación, para dar presencia y visibilidad a tu marca en fachadas, recepciones y puntos de venta.</p><p><a class="button" href="/contacto/">Pide presupuesto</a></p>' --porcelain)
SVC6=$($WP post create --post_type=page --post_parent="$SERVICIOS_ID" --post_title="Artículos publicitarios" --post_status=publish --post_content='<img src="/wp-content/themes/rduende/assets/images/icons/icon-articulos-promocionales.jpg" alt="Artículos publicitarios" class="service-page-image"><p>Tazas, bolígrafos, mochilas y merchandising personalizado con tu marca: el detalle perfecto para regalos corporativos y campañas promocionales.</p><p><a class="button" href="/contacto/">Pide presupuesto</a></p>' --porcelain)
SVC7=$($WP post create --post_type=page --post_parent="$SERVICIOS_ID" --post_title="Diseño gráfico" --post_status=publish --post_content='<img src="/wp-content/themes/rduende/assets/images/icons/icon-diseno-grafico.jpg" alt="Diseño gráfico" class="service-page-image"><p>Convertimos tus ideas en imágenes que comunican: diseño de marca, materiales gráficos y creatividad al servicio de tu proyecto.</p><p><a class="button" href="/contacto/">Pide presupuesto</a></p>' --porcelain)
SVC8=$($WP post create --post_type=page --post_parent="$SERVICIOS_ID" --post_title="Impresión digital" --post_status=publish --post_content='<img src="/wp-content/themes/rduende/assets/images/icons/icon-impresion-digital.jpg" alt="Impresión digital" class="service-page-image"><p>Tarjetas, folletos, catálogos y todo tipo de impresión digital de alta calidad, con tiempos de entrega rápidos.</p><p><a class="button" href="/contacto/">Pide presupuesto</a></p>' --porcelain)

$WP post update "$SERVICIOS_ID" --post_content='<ul class="services-grid">
<li class="service-card"><a href="/?page_id='"$SVC1"'"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-impresion-gran-formato.jpg" alt="Impresión de gran formato: vallas, lonas, carteles y papeles"></a></li>
<li class="service-card"><a href="/?page_id='"$SVC2"'"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-rotulacion-vinilos.jpg" alt="Rotulación y vinilos: vehículos, escaparates y fachadas"></a></li>
<li class="service-card"><a href="/?page_id='"$SVC3"'"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-corte-laser.jpg" alt="Corte y grabado láser: madera, metacrilato y metal"></a></li>
<li class="service-card"><a href="/?page_id='"$SVC4"'"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-textil-sublimacion.jpg" alt="Textil y sublimación: camisetas, ropa laboral y personalización"></a></li>
<li class="service-card"><a href="/?page_id='"$SVC5"'"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-letras-corporeas.jpg" alt="Letras corpóreas: 3D, luminosas o sin luz"></a></li>
<li class="service-card"><a href="/?page_id='"$SVC6"'"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-articulos-promocionales.jpg" alt="Artículos promocionales: regalos, merchandising y empresas"></a></li>
<li class="service-card"><a href="/?page_id='"$SVC7"'"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-diseno-grafico.jpg" alt="Diseño gráfico: imagen, creatividad y comunicación"></a></li>
<li class="service-card"><a href="/?page_id='"$SVC8"'"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/icon-impresion-digital.jpg" alt="Impresión digital: tarjetas, folletos, catálogos y más"></a></li>
</ul>'

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
