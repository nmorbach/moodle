# Moodle — Portal de Capacitación AJ Vierci

Tema `theme_ajvierci` (hijo de Boost, design system Astra) y CSS en vivo para `capacitacion.ajvierci.com.py`.

## Cómo funciona
- **`theme/ajvierci/`**: código del tema. Para cambios estructurales (templates, PHP, ajustes) hay que reinstalarlo como zip.
- **`live/live.scss`** → compila a **`docs/live.css`**, que se publica en GitHub Pages:
  `https://nmorbach.github.io/moodle/live.css`
  El tema carga ese archivo después de sus propios estilos, así que **cualquier cambio visual que se suba acá aparece en el Moodle en ~10 minutos**, sin reinstalar ni purgar caché.

## Cambiar estilos
1. Editar `live/live.scss` (los tokens de color están en `live/_tokens.scss`).
2. `./scripts/build.sh`
3. Commit + push a `main`.

## Nueva versión del tema
1. Editar `theme/ajvierci/` y subir `$plugin->version` en `version.php`.
2. `./scripts/build.sh` → `dist/theme_ajvierci.zip`.
3. Moodle: *Administración del sitio → Extensiones → Instalar complementos* → subir el zip → purgar cachés.

## Apagar el CSS en vivo
*Apariencia → Temas → AJ Vierci → Avanzado* → desmarcar **CSS en vivo**. El sitio vuelve al instante a los estilos base del tema.

## Reglas
- Repo público: **nunca** subir contraseñas, tokens ni datos internos.
