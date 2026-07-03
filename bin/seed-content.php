<?php
/**
 * Crea el contenido inicial de RDuende.com (páginas, menú y entrada de blog).
 *
 * Uso: wp eval-file bin/seed-content.php --path=/ruta/a/wordpress
 */

// Elimina el post y la página de muestra que WordPress crea en cada instalación nueva,
// para que no compitan con el contenido real (p.ej. en la sección "Proyecto destacado").
wp_delete_post( 1, true );
wp_delete_post( 2, true );

$inicio_id = wp_insert_post(
	array(
		'post_type'    => 'page',
		'post_title'   => 'Inicio',
		'post_status'  => 'publish',
		'post_content' => '<p>En un mundo donde la primera impresión lo es todo, transformamos tus ideas en piezas gráficas que inspiran, comunican y dejan huella.</p>',
	)
);

$servicios_id = wp_insert_post(
	array(
		'post_type'    => 'page',
		'post_title'   => 'Servicios',
		'post_status'  => 'publish',
		'post_content' => '',
	)
);

$services = array(
	'impresion-de-gran-formato' => array(
		'title'   => 'Impresión de gran formato',
		'icon'    => 'icon-impresion-gran-formato.jpg',
		'gallery' => array( 'icon-impresion-gran-formato.jpg' ),
		'alt'     => 'Impresión de gran formato: vallas, lonas, carteles y papeles',
		'content' => <<<'HTML'
<img src="/wp-content/themes/rduende/assets/images/icons/icon-impresion-gran-formato.jpg" alt="Impresión de gran formato" class="service-page-image">
<p>Producimos vinilos, lonas, carteles, rollups y papel de gran formato con la máxima calidad de color, ideales para vallas publicitarias, escaparates y campañas que necesitan impacto visual a gran escala.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Impresión digital de gran formato (UV y eco-solvente):</strong> para interiores y exteriores, resistente a la intemperie.</li>
<li><strong>Vinilos autoadhesivos y microperforados:</strong> ideales para escaparates, vehículos y superficies curvas.</li>
<li><strong>Lonas de PVC y banners:</strong> con ojales y refuerzos para vallas y exteriores.</li>
<li><strong>Papel fotográfico y sintético:</strong> para carteles y puntos de venta.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Consulta y medición:</strong> analizamos el espacio y el soporte.</li>
<li><strong>Diseño y maquetación:</strong> adaptamos tu diseño al formato final, revisando resolución y sangrados.</li>
<li><strong>Prueba de color:</strong> verificamos tonos antes de la producción final.</li>
<li><strong>Impresión y acabado:</strong> corte, laminado y refuerzos según el uso.</li>
<li><strong>Entrega o instalación:</strong> colocación en sitio si se requiere.</li>
</ol>

<h2>Galería</h2>
<div class="service-gallery">
<img src="/wp-content/themes/rduende/assets/images/icons/icon-impresion-gran-formato.jpg" alt="Impresión de gran formato">
</div>

<h2>Preguntas frecuentes</h2>
<div class="service-faq">
<details><summary>¿Qué materiales duran más en exterior?</summary><p>Los vinilos laminados y las lonas de PVC con protección UV son los que mejor resisten la intemperie durante años.</p></details>
<details><summary>¿Puedo pedir un tamaño personalizado?</summary><p>Sí, trabajamos a medida según el espacio disponible.</p></details>
<details><summary>¿Cuánto tarda un pedido?</summary><p>Depende del tamaño y acabado, pero la mayoría de pedidos están listos en pocos días.</p></details>
<details><summary>¿Incluyen instalación?</summary><p>Sí, ofrecemos instalación profesional en vallas, escaparates y fachadas.</p></details>
</div>

<p><a class="button" href="/contacto/">Pide presupuesto</a></p>
HTML,
	),
	'rotulacion-de-vehiculos-y-empresas' => array(
		'title'   => 'Rotulación de vehículos y empresas',
		'icon'    => 'icon-rotulacion-vinilos.jpg',
		'alt'     => 'Rotulación y vinilos: vehículos, escaparates y fachadas',
		'content' => <<<'HTML'
<img src="/wp-content/themes/rduende/assets/images/icons/icon-rotulacion-vinilos.jpg" alt="Rotulación de vehículos y empresas" class="service-page-image">
<p>Convertimos tu flota y tus espacios en herramientas de comunicación: rotulación de vehículos, escaparates y fachadas con vinilos de corte e impresión digital de alta durabilidad.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Vinilo de corte:</strong> para logotipos y textos precisos.</li>
<li><strong>Impresión digital + laminado:</strong> diseños a todo color con protección UV.</li>
<li><strong>Vinilo microperforado (one-way vision):</strong> para lunas y escaparates sin perder visibilidad interior.</li>
<li><strong>Instalación con cámara plana:</strong> montaje sin burbujas ni pliegues.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Visita o fotos del vehículo/espacio:</strong> para tomar medidas exactas.</li>
<li><strong>Diseño a medida:</strong> adaptado a la carrocería o fachada.</li>
<li><strong>Impresión y laminado:</strong> materiales resistentes a la intemperie y el lavado.</li>
<li><strong>Instalación profesional:</strong> por técnicos especializados.</li>
<li><strong>Revisión final:</strong> comprobamos acabado y durabilidad.</li>
</ol>

<h2>Galería</h2>
<div class="service-gallery">
<img src="/wp-content/themes/rduende/assets/images/icons/icon-rotulacion-vinilos.jpg" alt="Rotulación de vehículos">
<img src="/wp-content/themes/rduende/assets/images/promo-rotulacion-fachadas.jpg" alt="Rotulación de fachadas y tiendas">
</div>

<h2>Preguntas frecuentes</h2>
<div class="service-faq">
<details><summary>¿La rotulación daña la pintura del vehículo?</summary><p>No, los vinilos de calidad son removibles sin dañar la pintura si se retiran correctamente.</p></details>
<details><summary>¿Cuánto dura la rotulación?</summary><p>Entre 3 y 7 años según el material y las condiciones de uso.</p></details>
<details><summary>¿Puedo rotular solo una parte del vehículo?</summary><p>Sí, ofrecemos desde rotulación parcial hasta el vehículo completo.</p></details>
<details><summary>¿Trabajáis con flotas de varios vehículos?</summary><p>Sí, gestionamos proyectos de flota completa con el mismo diseño.</p></details>
</div>

<p><a class="button" href="/contacto/">Pide presupuesto</a></p>
HTML,
	),
	'corte-y-grabado-laser'  => array(
		'title'   => 'Corte y grabado láser',
		'icon'    => 'icon-corte-laser.jpg',
		'alt'     => 'Corte y grabado láser: madera, metacrilato y metal',
		'content' => <<<'HTML'
<img src="/wp-content/themes/rduende/assets/images/icons/icon-corte-laser.jpg" alt="Corte y grabado láser" class="service-page-image">
<p>Precisión milimétrica en madera, metacrilato y metal. Ideal para piezas personalizadas, señalética, expositores y proyectos que requieren acabados exactos.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Corte láser CO2:</strong> para madera, metacrilato, papel y textiles.</li>
<li><strong>Grabado láser de precisión:</strong> personaliza con nombres, logotipos o textos.</li>
<li><strong>Corte de precisión en metal:</strong> para piezas y letras metálicas.</li>
<li><strong>Diseño vectorial a medida:</strong> cada pieza se prepara digitalmente antes del corte.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Recepción del diseño o boceto:</strong> tuyo o creado por nuestro equipo.</li>
<li><strong>Preparación vectorial:</strong> ajustamos el archivo para corte y grabado.</li>
<li><strong>Prueba de material:</strong> comprobamos el acabado en una muestra si el proyecto lo requiere.</li>
<li><strong>Corte y grabado:</strong> con control de precisión milimétrica.</li>
<li><strong>Acabado y entrega:</strong> pulido de bordes y embalaje seguro.</li>
</ol>

<h2>Galería</h2>
<div class="service-gallery">
<img src="/wp-content/themes/rduende/assets/images/icons/icon-corte-laser.jpg" alt="Corte y grabado láser">
<img src="/wp-content/themes/rduende/assets/images/promo-corte-laser-metacrilato.jpg" alt="Corte láser de metacrilato">
</div>

<h2>Preguntas frecuentes</h2>
<div class="service-faq">
<details><summary>¿Qué materiales se pueden cortar con láser?</summary><p>Madera, metacrilato, cartón, papel y algunos metales finos.</p></details>
<details><summary>¿Puedo grabar un nombre o logo?</summary><p>Sí, el grabado láser permite personalizar cualquier pieza con texto o imágenes.</p></details>
<details><summary>¿Hacen piezas en serie?</summary><p>Sí, tanto piezas únicas como series de producción.</p></details>
<details><summary>¿Cuál es el grosor máximo de metacrilato?</summary><p>Trabajamos con metacrilato de hasta varios centímetros de grosor, según el proyecto.</p></details>
</div>

<p><a class="button" href="/contacto/">Pide presupuesto</a></p>
HTML,
	),
	'estampacion-de-camisetas-deportivas' => array(
		'title'   => 'Estampación de camisetas deportivas',
		'icon'    => 'icon-textil-sublimacion.jpg',
		'alt'     => 'Textil y sublimación: camisetas, ropa laboral y personalización',
		'content' => <<<'HTML'
<img src="/wp-content/themes/rduende/assets/images/icons/icon-textil-sublimacion.jpg" alt="Estampación de camisetas deportivas" class="service-page-image">
<p>Personalizamos camisetas, ropa laboral y textil deportivo con técnicas de sublimación y estampación duraderas, perfectas para equipos y empresas.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Sublimación textil:</strong> la tinta se integra en la fibra, ideal para poliéster y equipaciones deportivas.</li>
<li><strong>DTF (Direct to Film):</strong> estampación de alta definición sobre algodón y mezclas.</li>
<li><strong>Vinilo textil de corte:</strong> para nombres y números individuales.</li>
<li><strong>Serigrafía:</strong> para pedidos de grandes cantidades.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Elección de la prenda y técnica:</strong> según tejido y cantidad.</li>
<li><strong>Diseño y prueba de color:</strong> ajustamos el diseño al patrón de la prenda.</li>
<li><strong>Producción:</strong> sublimación, DTF o serigrafía según el proyecto.</li>
<li><strong>Control de calidad:</strong> revisamos cada prenda antes de entregar.</li>
<li><strong>Entrega:</strong> por unidad o en lotes para equipos y empresas.</li>
</ol>

<h2>Galería</h2>
<div class="service-gallery">
<img src="/wp-content/themes/rduende/assets/images/icons/icon-textil-sublimacion.jpg" alt="Textil y sublimación">
<img src="/wp-content/themes/rduende/assets/images/promo-lienzos-camisetas.jpg" alt="Lienzos y camisetas personalizadas">
</div>

<h2>Preguntas frecuentes</h2>
<div class="service-faq">
<details><summary>¿Qué diferencia hay entre sublimación y DTF?</summary><p>La sublimación tiñe la fibra (ideal en poliéster), mientras que el DTF imprime sobre una película que se transfiere a cualquier tejido, incluido el algodón.</p></details>
<details><summary>¿Puedo personalizar cada camiseta con un nombre distinto?</summary><p>Sí, es habitual en equipaciones deportivas con nombres y dorsales individuales.</p></details>
<details><summary>¿Cuál es el pedido mínimo?</summary><p>Trabajamos tanto pedidos unitarios como grandes cantidades para equipos y empresas.</p></details>
<details><summary>¿Los diseños aguantan lavados frecuentes?</summary><p>Sí, con el cuidado adecuado (lavado del revés, sin secadora) mantienen su color y calidad durante mucho tiempo.</p></details>
</div>

<p><a class="button" href="/contacto/">Pide presupuesto</a></p>
HTML,
	),
	'letras-corporeas'       => array(
		'title'   => 'Letras corpóreas',
		'icon'    => 'icon-letras-corporeas.jpg',
		'alt'     => 'Letras corpóreas: 3D, luminosas o sin luz',
		'content' => <<<'HTML'
<img src="/wp-content/themes/rduende/assets/images/icons/icon-letras-corporeas.jpg" alt="Letras corpóreas" class="service-page-image">
<p>Letras y logotipos en volumen, con o sin iluminación, para dar presencia y visibilidad a tu marca en fachadas, recepciones y puntos de venta.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>PVC, metacrilato o metal:</strong> según el estilo y presupuesto del proyecto.</li>
<li><strong>Iluminación LED integrada:</strong> backlit o frontlit, para visibilidad de día y de noche.</li>
<li><strong>Corte y fresado de precisión:</strong> para acabados limpios y exactos.</li>
<li><strong>Montaje con separadores:</strong> efecto de volumen sobre la pared.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Diseño y elección de material:</strong> según ubicación e imagen de marca.</li>
<li><strong>Fabricación de las letras:</strong> corte, fresado y, si aplica, instalación de LED.</li>
<li><strong>Prueba de iluminación</strong> (si corresponde), antes de la instalación final.</li>
<li><strong>Instalación in situ:</strong> con anclajes adecuados a cada superficie.</li>
<li><strong>Revisión final:</strong> comprobamos nivelación, sujeción e iluminación.</li>
</ol>

<h2>Galería</h2>
<div class="service-gallery">
<img src="/wp-content/themes/rduende/assets/images/icons/icon-letras-corporeas.jpg" alt="Letras corpóreas">
</div>

<h2>Preguntas frecuentes</h2>
<div class="service-faq">
<details><summary>¿Las letras corpóreas se pueden iluminar?</summary><p>Sí, ofrecemos opciones con luz LED frontal o retroiluminada.</p></details>
<details><summary>¿Qué material es más duradero para exterior?</summary><p>El PVC y el metacrilato con protección UV son los más habituales para exteriores.</p></details>
<details><summary>¿Se pueden instalar en cualquier fachada?</summary><p>Sí, adaptamos el sistema de anclaje según el tipo de superficie.</p></details>
<details><summary>¿Cuánto tardan en fabricarse?</summary><p>Depende del tamaño y si incluyen iluminación, pero suelen estar listas en 1-2 semanas.</p></details>
</div>

<p><a class="button" href="/contacto/">Pide presupuesto</a></p>
HTML,
	),
	'articulos-publicitarios' => array(
		'title'   => 'Artículos publicitarios',
		'icon'    => 'icon-articulos-promocionales.jpg',
		'alt'     => 'Artículos promocionales: regalos, merchandising y empresas',
		'content' => <<<'HTML'
<img src="/wp-content/themes/rduende/assets/images/icons/icon-articulos-promocionales.jpg" alt="Artículos publicitarios" class="service-page-image">
<p>Tazas, bolígrafos, mochilas y merchandising personalizado con tu marca: el detalle perfecto para regalos corporativos y campañas promocionales.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Impresión UV directa:</strong> sobre tazas, bolígrafos y superficies rígidas.</li>
<li><strong>Sublimación:</strong> para tazas mágicas y textiles.</li>
<li><strong>Grabado láser:</strong> sobre metal, madera y algunos plásticos.</li>
<li><strong>Bordado y estampación textil:</strong> para mochilas, gorras y ropa promocional.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Selección del producto:</strong> según presupuesto y público objetivo.</li>
<li><strong>Diseño de la marca en el artículo:</strong> ajustado al espacio disponible.</li>
<li><strong>Prueba de muestra</strong> (en pedidos grandes), para validar antes de producir todo el lote.</li>
<li><strong>Producción:</strong> según la técnica más adecuada al material.</li>
<li><strong>Empaquetado y entrega:</strong> listo para eventos o campañas.</li>
</ol>

<h2>Galería</h2>
<div class="service-gallery">
<img src="/wp-content/themes/rduende/assets/images/icons/icon-articulos-promocionales.jpg" alt="Artículos publicitarios">
</div>

<h2>Preguntas frecuentes</h2>
<div class="service-faq">
<details><summary>¿Hay un mínimo de unidades?</summary><p>Depende del producto, pero adaptamos pedidos tanto pequeños como grandes.</p></details>
<details><summary>¿Puedo combinar varios artículos en una misma campaña?</summary><p>Sí, es habitual combinar tazas, bolígrafos y textil en kits de bienvenida o regalos corporativos.</p></details>
<details><summary>¿Cuánto tiempo de antelación necesito para un evento?</summary><p>Recomendamos pedir con al menos 2-3 semanas de antelación para campañas grandes.</p></details>
<details><summary>¿Se puede ver una muestra antes de fabricar todo el pedido?</summary><p>Sí, ofrecemos muestras en pedidos de cierto volumen.</p></details>
</div>

<p><a class="button" href="/contacto/">Pide presupuesto</a></p>
HTML,
	),
	'diseno-grafico'         => array(
		'title'   => 'Diseño gráfico',
		'icon'    => 'icon-diseno-grafico.jpg',
		'alt'     => 'Diseño gráfico: imagen, creatividad y comunicación',
		'content' => <<<'HTML'
<img src="/wp-content/themes/rduende/assets/images/icons/icon-diseno-grafico.jpg" alt="Diseño gráfico" class="service-page-image">
<p>Convertimos tus ideas en imágenes que comunican: diseño de marca, materiales gráficos y creatividad al servicio de tu proyecto.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Software profesional de diseño vectorial y edición de imagen:</strong> para máxima calidad de impresión.</li>
<li><strong>Maquetación editorial:</strong> para catálogos, folletos y papelería corporativa.</li>
<li><strong>Diseño adaptado a cada soporte:</strong> impreso o digital, gran formato o pequeño detalle.</li>
<li><strong>Tipografías y recursos con licencia:</strong> para un resultado profesional y sin restricciones legales.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Briefing:</strong> entendemos tu marca, objetivo y público.</li>
<li><strong>Propuestas iniciales:</strong> bocetos o conceptos para elegir dirección.</li>
<li><strong>Desarrollo del diseño:</strong> con revisiones y ajustes contigo.</li>
<li><strong>Preparación para producción:</strong> archivos listos para imprimir o publicar.</li>
<li><strong>Entrega de archivos finales:</strong> en los formatos que necesites.</li>
</ol>

<h2>Galería</h2>
<div class="service-gallery">
<img src="/wp-content/themes/rduende/assets/images/icons/icon-diseno-grafico.jpg" alt="Diseño gráfico">
</div>

<h2>Preguntas frecuentes</h2>
<div class="service-faq">
<details><summary>¿Puedo pedir solo el diseño sin que lo imprimáis vosotros?</summary><p>Sí, entregamos los archivos finales listos para que los uses donde quieras.</p></details>
<details><summary>¿Cuántas revisiones incluye el servicio?</summary><p>Incluimos varias rondas de ajustes hasta que el diseño se ajuste a lo que necesitas.</p></details>
<details><summary>¿Diseñáis logotipos desde cero?</summary><p>Sí, trabajamos tanto marcas nuevas como el rediseño de identidades existentes.</p></details>
<details><summary>¿En qué formatos entregáis los archivos?</summary><p>En los formatos que necesites (impresión, web, editables) según el uso final.</p></details>
</div>

<p><a class="button" href="/contacto/">Pide presupuesto</a></p>
HTML,
	),
	'impresion-digital'      => array(
		'title'   => 'Impresión digital',
		'icon'    => 'icon-impresion-digital.jpg',
		'alt'     => 'Impresión digital: tarjetas, folletos, catálogos y más',
		'content' => <<<'HTML'
<img src="/wp-content/themes/rduende/assets/images/icons/icon-impresion-digital.jpg" alt="Impresión digital" class="service-page-image">
<p>Tarjetas, folletos, catálogos y todo tipo de impresión digital de alta calidad, con tiempos de entrega rápidos.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Impresión digital offset y láser de alta resolución:</strong> para tirajes cortos y medios con calidad profesional.</li>
<li><strong>Acabados especiales:</strong> plastificado, barniz UV, troquelado y esquinas redondeadas.</li>
<li><strong>Papeles y gramajes variados:</strong> desde folletos ligeros hasta tarjetas de alta consistencia.</li>
<li><strong>Impresión bajo demanda:</strong> sin necesidad de grandes tiradas mínimas.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Revisión del archivo:</strong> comprobamos resolución, sangrados y colores.</li>
<li><strong>Prueba digital</strong> (si se solicita), para validar antes de imprimir el lote completo.</li>
<li><strong>Impresión:</strong> con el papel y acabado elegidos.</li>
<li><strong>Acabados:</strong> corte, plastificado u otros procesos según el proyecto.</li>
<li><strong>Entrega:</strong> recogida en tienda o envío.</li>
</ol>

<h2>Galería</h2>
<div class="service-gallery">
<img src="/wp-content/themes/rduende/assets/images/icons/icon-impresion-digital.jpg" alt="Impresión digital">
</div>

<h2>Preguntas frecuentes</h2>
<div class="service-faq">
<details><summary>¿Cuál es la tirada mínima?</summary><p>Trabajamos desde tiradas cortas hasta grandes cantidades, sin mínimos elevados.</p></details>
<details><summary>¿Puedo imprimir con diseños distintos en el mismo pedido?</summary><p>Sí, es posible combinar diseños distintos, por ejemplo, en tarjetas de varios empleados.</p></details>
<details><summary>¿Qué acabados ofrecéis?</summary><p>Plastificado brillo o mate, barniz UV, esquinas redondeadas y troquelados a medida.</p></details>
<details><summary>¿Cuánto tardan los pedidos?</summary><p>La mayoría de pedidos de impresión digital están listos en 24-48 horas, según el volumen y acabado.</p></details>
</div>

<p><a class="button" href="/contacto/">Pide presupuesto</a></p>
HTML,
	),
);

$service_ids = array();
foreach ( $services as $slug => $svc ) {
	$service_ids[ $slug ] = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_parent'  => $servicios_id,
			'post_title'   => $svc['title'],
			'post_status'  => 'publish',
			'post_content' => $svc['content'],
			'post_name'    => $slug,
		)
	);
}

$grid = '<ul class="services-grid">';
foreach ( $services as $slug => $svc ) {
	$grid .= sprintf(
		'<li class="service-card"><a href="/?page_id=%d"><img class="service-card-image" src="/wp-content/themes/rduende/assets/images/icons/%s" alt="%s"></a></li>',
		$service_ids[ $slug ],
		esc_attr( $svc['icon'] ),
		esc_attr( $svc['alt'] )
	);
}
$grid .= '</ul>';

wp_update_post(
	array(
		'ID'           => $servicios_id,
		'post_content' => $grid,
	)
);

$sobre_id = wp_insert_post(
	array(
		'post_type'    => 'page',
		'post_title'   => 'Sobre nosotros',
		'post_status'  => 'publish',
		'post_content' => '<p><em>[Pendiente: historia, misión y equipo real de RDuende. Editar esta página en cuanto tengamos el texto definitivo.]</em></p>',
	)
);

$contacto_id = wp_insert_post(
	array(
		'post_type'    => 'page',
		'post_title'   => 'Contacto',
		'post_status'  => 'publish',
		'post_content' => '<p>La vida es demasiado corta para diseños aburridos.</p><p>Teléfono: <a href="tel:+34968626506">968 62 65 06</a><br>Email: <a href="mailto:info@rduende.com">info@rduende.com</a></p><p><em>[Pendiente: dirección física, si se quiere publicar.]</em></p>',
	)
);

$blog_page_id = wp_insert_post(
	array(
		'post_type'    => 'page',
		'post_title'   => 'Blog',
		'post_status'  => 'publish',
		'post_content' => '',
	)
);

update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $inicio_id );
update_option( 'page_for_posts', $blog_page_id );
update_option( 'blogdescription', 'Tu idea, nuestro arte' );

wp_insert_post(
	array(
		'post_type'    => 'post',
		'post_title'   => 'Reconstrucción del panel de mandos de una máquina recreativa COMAVI',
		'post_status'  => 'publish',
		'post_date'    => '2025-09-18 12:00:00',
		'post_content' => '<p>Una máquina recreativa no es solo un mueble electrónico: es un fragmento de la historia del ocio y la cultura popular.</p><p>El proceso de reconstrucción incluyó varias fases: digitalización del vinilo original, creación de plantillas de corte en metacrilato, procesamiento mediante máquina láser, e impresión digital del diseño en material transparente.</p><p>En el montaje, adherimos el vinilo bajo el metacrilato, aplicamos un fondo blanco para dar contraste, y ajustamos los orificios para los controles.</p><p>La reconstrucción de máquinas recreativas antiguas combina la preservación cultural con tecnología contemporánea: en RDuende integramos la tradición del diseño original con herramientas modernas como el corte láser y la impresión digital.</p>',
	)
);

$existing_menu = get_term_by( 'name', 'Principal', 'nav_menu' );
if ( $existing_menu ) {
	wp_delete_nav_menu( $existing_menu->term_id );
}
$menu_id = wp_create_nav_menu( 'Principal' );
wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Inicio', 'menu-item-object-id' => $inicio_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Servicios', 'menu-item-object-id' => $servicios_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Sobre nosotros', 'menu-item-object-id' => $sobre_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Contacto', 'menu-item-object-id' => $contacto_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Blog', 'menu-item-object-id' => $blog_page_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );

$locations = get_theme_mod( 'nav_menu_locations' );
$locations['primary'] = $menu_id;
set_theme_mod( 'nav_menu_locations', $locations );

echo "Contenido creado correctamente.\n";
