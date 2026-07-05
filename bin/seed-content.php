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
<p>Producimos vinilos, lonas, carteles, rollups y papel de gran formato con la máxima calidad de color, ideales para vallas publicitarias, escaparates y campañas que necesitan impacto visual a gran escala. Trabajamos tanto piezas puntuales como campañas completas para varios puntos de venta, cuidando que el color y el acabado sean idénticos en todas las unidades.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Impresión digital de gran formato (UV y eco-solvente):</strong> para interiores y exteriores, resistente a la intemperie, la abrasión y la exposición prolongada al sol sin perder intensidad de color.</li>
<li><strong>Vinilos autoadhesivos y microperforados:</strong> ideales para escaparates, vehículos y superficies curvas; se adaptan a esquinas y relieves sin burbujas ni levantamientos con el tiempo.</li>
<li><strong>Lonas de PVC y banners:</strong> con ojales, dobladillos reforzados y opción de ventilada (microperforada) para vallas y soportes expuestos al viento.</li>
<li><strong>Papel fotográfico y sintético:</strong> para carteles y puntos de venta, con acabado mate o brillo según el efecto que busques.</li>
<li><strong>Laminado de protección:</strong> añade una capa extra de resistencia a rayones y humedad en piezas que van a manipularse o exponerse a la intemperie.</li>
</ul>

<h2>Nuestra maquinaria</h2>
<ul class="service-tech">
<li><strong>Mimaki CJV150-160:</strong> plotter de impresión y corte eco-solvente que integra el corte de contorno en el mismo proceso, ideal para pegatinas, vinilos troquelados y rotulación con formas personalizadas.</li>
<li><strong>HP Latex 120:</strong> impresora de tinta látex de HP, con colores vivos, sin olor y curado en la propia impresora, apta para interiores sin necesidad de laminado adicional en muchos usos. La tinta látex está certificada como apta para contacto con productos alimentarios, por lo que también podemos imprimir envases, expositores y señalización para el sector alimentario.</li>
<li><strong>Impresora DTF (Direct to Film):</strong> transfiere diseños a todo color y con gran detalle sobre prácticamente cualquier tejido, incluido algodón, sin las limitaciones de la sublimación.</li>
<li><strong>Mimaki UJV (UV rollo a rollo):</strong> impresión UV de curado instantáneo con tintas muy resistentes, capaz de crear efectos especiales (relieve, blanco de contraste, barniz) sobre una gran variedad de materiales rígidos y flexibles.</li>
</ul>

<h2>Materiales disponibles y usos recomendados</h2>
<ul class="service-tech">
<li><strong>Lona (banner PVC):</strong> el material más habitual para vallas publicitarias, banners de eventos, carpas y carteles de exterior de gran tamaño.</li>
<li><strong>Lona microperforada:</strong> deja pasar el aire y reduce la carga de viento; ideal para cubrir andamios y fachadas en obra, o vallas de gran altura expuestas a rachas fuertes.</li>
<li><strong>Vinilo microperforado (one-way vision):</strong> se ve el anuncio desde fuera sin perder visibilidad desde dentro; perfecto para escaparates, oficinas con cristaleras y lunas de vehículos.</li>
<li><strong>Vinilo monomérico:</strong> económico y de fácil aplicación, pensado para promociones y campañas de corta duración (1-2 años) sobre superficies planas como escaparates o expositores puntuales.</li>
<li><strong>Vinilo polimérico:</strong> más resistente y flexible que el monomérico, se adapta a superficies con ligeras curvas; adecuado para rotulación de furgonetas, fachadas y señalización con una vida útil de 5-7 años.</li>
<li><strong>Vinilo de fundición (cast):</strong> el más duradero y conformable, capaz de ajustarse a curvas pronunciadas sin levantarse; la opción preferida para rotulación integral de vehículos y flotas que deben durar 7-10 años.</li>
<li><strong>Laminado brillo:</strong> intensifica los colores y aporta un acabado vistoso, ideal para fotografías, gráficos impactantes y escaparates que buscan destacar.</li>
<li><strong>Laminado mate:</strong> reduce reflejos y deslumbramientos, recomendado para espacios con mucha luz directa, pantallas informativas o piezas que se verán desde ángulos variados.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Consulta y medición:</strong> analizamos el espacio y el soporte, y te asesoramos sobre el material más adecuado según la ubicación (interior/exterior) y la distancia de visionado.</li>
<li><strong>Diseño y maquetación:</strong> adaptamos tu diseño al formato final, revisando resolución, sangrados y áreas de seguridad para que nada quede cortado.</li>
<li><strong>Prueba de color:</strong> verificamos tonos antes de la producción final, especialmente importante en logotipos con colores corporativos exactos.</li>
<li><strong>Impresión y acabado:</strong> corte, laminado y refuerzos según el uso, con control de calidad pieza por pieza.</li>
<li><strong>Entrega o instalación:</strong> colocación en sitio si se requiere, o embalaje reforzado para que llegue en perfecto estado si prefieres instalarlo tú mismo.</li>
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
<p>Convertimos tu flota y tus espacios en herramientas de comunicación: rotulación de vehículos, escaparates y fachadas con vinilos de corte e impresión digital de alta durabilidad. Cada vehículo o local rotulado se convierte en publicidad en movimiento o en un punto de venta que refuerza tu marca las 24 horas.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Vinilo de corte:</strong> para logotipos y textos precisos, sin marco ni fondo, directamente sobre la carrocería o el cristal.</li>
<li><strong>Impresión digital + laminado:</strong> diseños a todo color con protección UV, ideales para rotulaciones completas o parciales con imágenes y degradados.</li>
<li><strong>Vinilo microperforado (one-way vision):</strong> para lunas y escaparates sin perder visibilidad interior; se ve el anuncio desde fuera y la calle desde dentro.</li>
<li><strong>Vinilo mate, brillo y efecto cromado o carbono:</strong> acabados especiales para vehículos que buscan un aspecto más premium o deportivo.</li>
<li><strong>Instalación con cámara plana:</strong> montaje sin burbujas ni pliegues, con termosoplado en zonas curvas para un acabado profesional.</li>
</ul>

<h2>Nuestra maquinaria</h2>
<ul class="service-tech">
<li><strong>Plotter de corte de precisión:</strong> corta el vinilo directamente desde el archivo vectorial, sin necesidad de imprimir, para logotipos y textos a un solo color. Ejemplos: nombre y teléfono en furgonetas, numeración de flota, rótulos de escaparate en vinilo de corte.</li>
<li><strong>Mimaki CJV150-160 y HP Latex 120</strong> (los mismos equipos de nuestra área de gran formato): para los gráficos a todo color, fotografías e ilustraciones que se laminan y aplican sobre vehículo o fachada. Ejemplos: rotulación integral de furgonetas con diseño fotográfico, escaparates con imagen de producto a gran tamaño.</li>
<li><strong>Films de vinilo de marcas reconocidas</strong> (3M, Avery Dennison): para garantizar la máxima durabilidad y facilitar la retirada sin dañar la pintura cuando llega el momento de cambiar de diseño.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Visita o fotos del vehículo/espacio:</strong> para tomar medidas exactas y detectar particularidades (remaches, molduras, curvas pronunciadas).</li>
<li><strong>Diseño a medida:</strong> adaptado a la carrocería o fachada, con una previsualización para que apruebes el resultado antes de producir.</li>
<li><strong>Impresión y laminado:</strong> materiales resistentes a la intemperie, los lavados a presión y la radiación solar.</li>
<li><strong>Instalación profesional:</strong> por técnicos especializados, en taller o a domicilio según el proyecto.</li>
<li><strong>Revisión final:</strong> comprobamos acabado, adherencia en los bordes y durabilidad antes de la entrega.</li>
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
<p>Precisión milimétrica en madera, metacrilato y metal. Ideal para piezas personalizadas, señalética, expositores y proyectos que requieren acabados exactos. Desde una única pieza para un regalo especial hasta series completas para eventos o producción, ajustamos el proceso a la escala de cada encargo.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Corte láser CO2:</strong> para madera, metacrilato, papel y textiles, con cortes limpios sin astillado ni rebabas.</li>
<li><strong>Grabado láser de precisión:</strong> personaliza con nombres, logotipos o textos, incluso en degradados de profundidad para efectos 3D en la superficie.</li>
<li><strong>Corte de precisión en metal:</strong> para piezas y letras metálicas que requieren un acabado industrial y gran durabilidad.</li>
<li><strong>Diseño vectorial a medida:</strong> cada pieza se prepara digitalmente antes del corte, optimizando el trazado para reducir tiempos y desperdicio de material.</li>
<li><strong>Combinación de materiales:</strong> podemos combinar metacrilato transparente y de color, madera y metal en la misma pieza para composiciones más elaboradas.</li>
</ul>

<h2>Nuestra maquinaria</h2>
<ul class="service-tech">
<li><strong>Láser CO2 de 130 cm de ancho:</strong> nuestro equipo de mayor formato, para corte y grabado en madera, metacrilato, cartón y textiles en piezas grandes de una sola pasada. Lo usamos tanto para <em>corte</em> de precisión (letras corpóreas, plantillas, piezas decorativas) como para <em>grabado</em> de detalle (nombres, logotipos, ilustraciones). Ejemplos: placas conmemorativas, expositores de tienda, mobiliario a medida, letreros de interior y paneles decorativos.</li>
<li><strong>Láser de grabado por fibra:</strong> especializado en marcar metal y algunos plásticos técnicos, con un trazo muy fino y permanente que no se borra ni con el uso diario. Ejemplos: placas de acero inoxidable, herramientas y utillaje personalizado, chapas identificativas para maquinaria, joyería y bisutería metálica.</li>
</ul>

<h2>Vitrinas personalizadas — vitrinas.net</h2>
<p>Diseñamos y fabricamos vitrinas de metacrilato cortadas a medida con nuestro láser, a través de nuestra marca <a href="https://vitrinas.net" target="_blank" rel="noopener">vitrinas.net</a>. Perfectas para proteger y exponer colecciones de figuras, maquetas, coches a escala, cómics o trofeos, fabricadas con las medidas exactas que necesites.</p>

<h2>Otros trabajos habituales con láser</h2>
<ul class="service-tech">
<li><strong>Adornos personalizados de Navidad:</strong> figuras, bolas y centros de mesa grabados con nombres o mensajes, ideales como regalo de empresa o detalle familiar en estas fechas.</li>
<li><strong>Corte de letras corpóreas:</strong> aquí realizamos el corte de precisión de las letras que después se montan como rótulo; si buscas letras en volumen para tu fachada, consulta también nuestro servicio de <a href="/servicios/letras-corporeas/">letras corpóreas</a>.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Recepción del diseño o boceto:</strong> tuyo, o lo creamos desde cero junto a nuestro equipo de diseño gráfico.</li>
<li><strong>Preparación vectorial:</strong> ajustamos el archivo para corte y grabado, definiendo qué líneas se cortan y cuáles solo se graban.</li>
<li><strong>Prueba de material:</strong> comprobamos el acabado en una muestra si el proyecto lo requiere, sobre todo en grabados con degradado o piezas grandes.</li>
<li><strong>Corte y grabado:</strong> con control de precisión milimétrica y supervisión continua durante el proceso.</li>
<li><strong>Acabado y entrega:</strong> pulido de bordes, retirada de film protector y embalaje seguro para que llegue sin marcas.</li>
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
<p>Personalizamos camisetas, ropa laboral y textil deportivo con técnicas de sublimación y estampación duraderas, perfectas para equipos y empresas. Ya sea la equipación completa de un club, camisetas de un evento o uniformes corporativos, adaptamos la técnica al tejido y al uso que le vas a dar.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Sublimación textil:</strong> la tinta se integra en la fibra, ideal para poliéster y equipaciones deportivas; el diseño no se agrieta ni se despega con el uso.</li>
<li><strong>DTF (Direct to Film):</strong> estampación de alta definición sobre algodón y mezclas, con colores vivos y buena resistencia al lavado.</li>
<li><strong>Vinilo textil de corte:</strong> para nombres y números individuales, con acabado mate, brillo o flock según el efecto deseado.</li>
<li><strong>Serigrafía:</strong> para pedidos de grandes cantidades, la opción más económica cuando se repite el mismo diseño en muchas unidades.</li>
<li><strong>Bordado:</strong> para logotipos que requieren un acabado más premium y duradero, típico en ropa laboral y polos corporativos.</li>
</ul>

<h2>Nuestra maquinaria</h2>
<ul class="service-tech">
<li><strong>Impresora de sublimación:</strong> transfiere el diseño directamente a la fibra de poliéster mediante calor, sin capas superpuestas que se puedan agrietar. Ejemplos: camisetas técnicas de running, equipaciones de fútbol y baloncesto con diseños a todo color, banderines y merchandising deportivo.</li>
<li><strong>Impresora DTF</strong> (la misma que usamos en gran formato): para estampar sobre algodón y mezclas donde la sublimación no funciona. Ejemplos: camisetas de eventos populares, sudaderas de peñas y asociaciones, ropa infantil.</li>
<li><strong>Plancha térmica industrial:</strong> fija el estampado con presión y temperatura constantes en toda la superficie, clave para que el resultado sea uniforme en pedidos grandes.</li>
<li><strong>Bordadora industrial:</strong> cose el logotipo con hilo, punto a punto, siguiendo un patrón digital. Ejemplos: polos y chaquetas de empresa, gorras corporativas, ropa laboral de hostelería.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Elección de la prenda y técnica:</strong> según tejido, cantidad y presupuesto, te recomendamos la combinación que mejor resultado dará.</li>
<li><strong>Diseño y prueba de color:</strong> ajustamos el diseño al patrón de la prenda, cuidando que quede centrado y proporcionado en cada talla.</li>
<li><strong>Producción:</strong> sublimación, DTF, serigrafía o bordado según el proyecto y el volumen de pedido.</li>
<li><strong>Control de calidad:</strong> revisamos cada prenda antes de entregar, comprobando colocación, colores y acabados.</li>
<li><strong>Entrega:</strong> por unidad o en lotes para equipos y empresas, con opción de personalización individual (nombre y dorsal) dentro del mismo pedido.</li>
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
<p>Letras y logotipos en volumen, con o sin iluminación, para dar presencia y visibilidad a tu marca en fachadas, recepciones y puntos de venta. Son una de las formas más efectivas de generar una primera impresión sólida y profesional, tanto de día como de noche si incorporan luz.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>PVC, metacrilato o metal:</strong> según el estilo y presupuesto del proyecto; el metal aporta un aspecto más corporativo y el metacrilato permite acabados translúcidos.</li>
<li><strong>Iluminación LED integrada:</strong> backlit (luz hacia la pared, efecto halo) o frontlit (luz hacia fuera), para visibilidad de día y de noche con bajo consumo.</li>
<li><strong>Corte y fresado de precisión:</strong> para acabados limpios y exactos, incluso en tipografías complejas o logotipos con formas irregulares.</li>
<li><strong>Pintura y acabados especiales:</strong> lacados, efecto cepillado o cromado para letras metálicas que buscan un toque más distintivo.</li>
<li><strong>Montaje con separadores:</strong> efecto de volumen sobre la pared, dejando una sombra que refuerza la sensación de profundidad.</li>
</ul>

<h2>Nuestra maquinaria</h2>
<ul class="service-tech">
<li><strong>Láser CO2 de 130 cm</strong> (compartido con nuestra área de corte láser): corta el contorno exacto de cada letra en PVC o metacrilato, con precisión milimétrica en tipografías complejas. Ejemplos: logotipos de marca con tipografías personalizadas, numeración de portales, letras decorativas para interiorismo.</li>
<li><strong>Fresadora CNC:</strong> para letras en materiales más gruesos o en metal, con un acabado de borde limpio y uniforme. Ejemplos: letras corpóreas en aluminio para fachadas comerciales, placas identificativas de gran tamaño.</li>
<li><strong>Módulos LED y transformadores:</strong> iluminación interior de cada letra con bajo consumo y larga vida útil. Ejemplos: rótulos de bares y restaurantes visibles de noche, logotipos retroiluminados en recepciones de oficina.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Diseño y elección de material:</strong> según ubicación, imagen de marca y si se necesita o no iluminación.</li>
<li><strong>Fabricación de las letras:</strong> corte, fresado y, si aplica, instalación de los módulos LED en el interior de cada letra.</li>
<li><strong>Prueba de iluminación</strong> (si corresponde), comprobando uniformidad de luz y ausencia de puntos calientes antes de la instalación final.</li>
<li><strong>Instalación in situ:</strong> con anclajes adecuados a cada superficie (fachada, cristal, pladur) y conexión eléctrica si incluyen luz.</li>
<li><strong>Revisión final:</strong> comprobamos nivelación, sujeción e iluminación, y te explicamos el mantenimiento básico si lo necesitas.</li>
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
<p>Tazas, bolígrafos, mochilas y merchandising personalizado con tu marca: el detalle perfecto para regalos corporativos y campañas promocionales. Un buen artículo promocional se usa durante meses o años, manteniendo tu marca presente mucho después del evento o la entrega.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Impresión UV directa:</strong> sobre tazas, bolígrafos y superficies rígidas, con colores vivos y gran resistencia al uso diario.</li>
<li><strong>Sublimación:</strong> para tazas mágicas (cambian de color con el calor) y textiles, con el diseño integrado en el propio material.</li>
<li><strong>Grabado láser:</strong> sobre metal, madera y algunos plásticos; ideal para artículos más duraderos como bolígrafos metálicos o llaveros.</li>
<li><strong>Bordado y estampación textil:</strong> para mochilas, gorras y ropa promocional, con acabado más resistente que la impresión directa.</li>
<li><strong>Packaging personalizado:</strong> cajas o bolsas con tu marca para reforzar la experiencia de regalo, especialmente en kits de bienvenida.</li>
</ul>

<h2>Nuestra maquinaria</h2>
<ul class="service-tech">
<li><strong>Mimaki UJV (UV rollo a rollo)</strong> y equipo UV de sobremesa: imprimen directamente sobre tazas, powerbanks, bolígrafos y otros objetos rígidos, sin necesidad de plantillas ni serigrafía previa. Ejemplos: tazas y termos de empresa, powerbanks de regalo, carcasas y objetos de oficina personalizados.</li>
<li><strong>Láser de grabado por fibra</strong> (compartido con nuestra área de corte láser): marca de forma permanente sobre metal. Ejemplos: bolígrafos metálicos grabados, llaveros, medallas y trofeos conmemorativos.</li>
<li><strong>Bordadora industrial:</strong> para textil promocional con acabado premium. Ejemplos: mochilas y bolsas de tela con logo bordado, gorras de merchandising.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Selección del producto:</strong> según presupuesto, público objetivo y el mensaje que quieres transmitir.</li>
<li><strong>Diseño de la marca en el artículo:</strong> ajustado al espacio disponible y a la técnica de personalización elegida.</li>
<li><strong>Prueba de muestra</strong> (en pedidos grandes), para validar colores y colocación antes de producir todo el lote.</li>
<li><strong>Producción:</strong> según la técnica más adecuada al material, con control de calidad en cada tanda.</li>
<li><strong>Empaquetado y entrega:</strong> listo para eventos o campañas, con opción de envío directo a varias sedes o puntos de entrega.</li>
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
<p>Convertimos tus ideas en imágenes que comunican: diseño de marca, materiales gráficos y creatividad al servicio de tu proyecto. Trabajamos codo a codo con producción, así que cada diseño que creamos ya está pensado para imprimirse o fabricarse sin sorpresas.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Software profesional de diseño vectorial y edición de imagen:</strong> para máxima calidad de impresión a cualquier escala, desde una tarjeta hasta una lona gigante.</li>
<li><strong>Maquetación editorial:</strong> para catálogos, folletos y papelería corporativa, con una estructura clara y coherente en todas las páginas.</li>
<li><strong>Diseño adaptado a cada soporte:</strong> impreso o digital, gran formato o pequeño detalle, teniendo en cuenta cómo y desde qué distancia se va a ver.</li>
<li><strong>Tipografías y recursos con licencia:</strong> para un resultado profesional y sin restricciones legales de uso comercial.</li>
<li><strong>Identidad de marca coherente:</strong> aplicamos tu paleta de colores, tipografías y estilo visual a cada pieza nueva para que todo tu material se vea como parte de la misma marca.</li>
</ul>

<h2>Nuestras herramientas</h2>
<ul class="service-tech">
<li><strong>Adobe Illustrator:</strong> diseño vectorial para logotipos, iconos y cualquier gráfico que necesite escalarse sin perder calidad, desde una tarjeta hasta una lona.</li>
<li><strong>Adobe Photoshop:</strong> retoque y composición de imagen para fotografías de producto, banners y materiales que combinan fotografía con diseño.</li>
<li><strong>Adobe InDesign:</strong> maquetación de documentos con muchas páginas. Ejemplos: catálogos de producto, dossiers corporativos, revistas y memorias anuales.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Briefing:</strong> entendemos tu marca, objetivo y público antes de proponer nada.</li>
<li><strong>Propuestas iniciales:</strong> bocetos o conceptos para elegir dirección, sin comprometernos aún al detalle final.</li>
<li><strong>Desarrollo del diseño:</strong> con revisiones y ajustes contigo hasta llegar al resultado que buscas.</li>
<li><strong>Preparación para producción:</strong> archivos listos para imprimir o publicar, con las especificaciones técnicas correctas (resolución, modo de color, sangrados).</li>
<li><strong>Entrega de archivos finales:</strong> en los formatos que necesites, tanto para imprenta como para uso digital.</li>
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
<p>Tarjetas, folletos, catálogos y todo tipo de impresión digital de alta calidad, con tiempos de entrega rápidos. Perfecta para todo el material que necesita renovarse con frecuencia o adaptarse a tiradas cortas sin perder calidad profesional.</p>

<h2>Tecnología y materiales</h2>
<ul class="service-tech">
<li><strong>Impresión digital offset y láser de alta resolución:</strong> para tirajes cortos y medios con calidad profesional, sin el coste de plancha del offset tradicional.</li>
<li><strong>Acabados especiales:</strong> plastificado brillo o mate, barniz UV selectivo, troquelado a medida y esquinas redondeadas para un resultado más cuidado.</li>
<li><strong>Papeles y gramajes variados:</strong> desde folletos ligeros hasta tarjetas de alta consistencia, con opciones estucadas, texturizadas o recicladas.</li>
<li><strong>Impresión bajo demanda:</strong> sin necesidad de grandes tiradas mínimas, ideal si necesitas reimprimir solo cuando se acaba el stock.</li>
<li><strong>Numeración y datos variables:</strong> para talonarios, entradas o materiales donde cada copia necesita un dato distinto (número, nombre, código).</li>
</ul>

<h2>Nuestra maquinaria</h2>
<ul class="service-tech">
<li><strong>Impresora digital de producción:</strong> equipo de alta velocidad para tiradas cortas y medias con calidad de imprenta profesional. Ejemplos: tarjetas de visita, catálogos de producto, invitaciones de boda o evento.</li>
<li><strong>Guillotina de corte industrial:</strong> corta con precisión grandes pilas de papel a la medida final. Ejemplos: talonarios, flyers, tarjetas en tiradas grandes.</li>
<li><strong>Plastificadora:</strong> aplica el laminado brillo o mate sobre el papel impreso para mayor resistencia y un acabado más profesional. Ejemplos: cartas de restaurante, menús, portadas de catálogo.</li>
</ul>

<h2>Nuestra metodología</h2>
<ol class="service-methodology">
<li><strong>Revisión del archivo:</strong> comprobamos resolución, sangrados y colores antes de aceptar el pedido.</li>
<li><strong>Prueba digital</strong> (si se solicita), para validar colores y maquetación antes de imprimir el lote completo.</li>
<li><strong>Impresión:</strong> con el papel y acabado elegidos, ajustando la máquina para ese gramaje y textura concretos.</li>
<li><strong>Acabados:</strong> corte, plastificado u otros procesos según el proyecto, con control de medidas en cada pieza.</li>
<li><strong>Entrega:</strong> recogida en tienda o envío, con opción de entregas urgentes si el proyecto lo requiere.</li>
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

// Permalinks "bonitos": el servidor embebido de PHP cae de vuelta a index.php
// para cualquier ruta que no exista como archivo, así que WordPress puede
// resolverlas igual que en un hosting con mod_rewrite.
global $wp_rewrite;
update_option( 'permalink_structure', '/%postname%/' );
$wp_rewrite->set_permalink_structure( '/%postname%/' );
$wp_rewrite->flush_rules();

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
