RDuende Vitrinas – Anuncio + Calculadora (WooCommerce)

INSTALACIÓN
1) WordPress → Plugins → Añadir nuevo → Subir plugin → selecciona el .zip → Activar.

USO
- Shortcode: [rduende_vitrinas_anuncio]
  Parámetros:
    - show_anuncio="1|0"
    - show_calc="1|0"

- Auto en productos:
  Ajustes → RDuende Vitrinas → Activar "Mostrar en fichas de producto"
  (Opcional) Filtrar por categoría (slug), p.ej. "vitrinas"

PRECIO
El precio es orientativo. Ajusta el cálculo en:
includes/class-rdvitac-plugin.php → método ajax_calc().
