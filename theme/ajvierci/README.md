# theme_ajvierci

Tema del Portal de Capacitación de Grupo AJ Vierci. Es hijo de **Boost**, así que hereda todo su funcionamiento, y aplica el design system de **Astra**.

## Qué incluye
- Tokens de Astra: neutros, teal y navy antracita.
- Fuente **Inter** self-hosted en `fonts/`, sin depender de Google Fonts.
- **Hero** en la página principal (`templates/hero.mustache`), que reemplaza el título duplicado. Muestra saludo, botones y contadores de cursos.
- **Grid de cursos** con cards: imagen arriba, título, resumen recortado a 3 líneas y profesores al pie.
- **Login** con gradiente navy.
- Fallback: si el SCSS falla al compilar, Moodle sirve el CSS de Boost en vez de una página sin estilos.

## Instalar
1. *Administración del sitio → Extensiones → Instalar complementos* → subir `theme_ajvierci.zip` → seguir el asistente.
2. *Apariencia → Temas → Selector de temas* → **Default** → **AJ Vierci**.
3. Purgar cachés.

## Configurar
*Apariencia → Temas → AJ Vierci*
- **Página principal**: textos del hero y contadores.
- **Avanzado**: SCSS propio, para retoques sin reinstalar.

## Revertir
Volver a seleccionar **Boost** en el selector de temas.

## Editar el tema
- Colores y variables: `scss/pre.scss`
- Reglas: `scss/post.scss`
- Hero: `templates/hero.mustache` y `classes/output/core_renderer.php`

Para publicar cambios, subí `$plugin->version` en `version.php`, volvé a zipear e instalá encima.
