#!/usr/bin/env bash
# Compila el CSS en vivo y empaqueta el tema como zip instalable.
set -euo pipefail
cd "$(dirname "$0")/.."
npx --yes sass@1.69 --no-source-map --style=compressed --load-path=live live/live.scss docs/live.css
( cd theme && rm -f ../dist/theme_ajvierci.zip && zip -rq ../dist/theme_ajvierci.zip ajvierci )
echo "OK → docs/live.css y dist/theme_ajvierci.zip"
