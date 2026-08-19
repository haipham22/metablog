# MetaBlog

WordPress blog theme — a [Sage 11](https://roots.io/sage/) (Bedrock) port of the
[metablog-free](https://github.com/js-template/metablog-free) design (Tailwind +
the daisyUI palette, ported to CSS variables — no daisyUI dependency).

## Features

- Blade templating via Acorn, assets built with Vite + Tailwind CSS v4
- Home hero slider (scroll-snap, autoplay, dots/arrows) — featured posts only,
  sticky posts excluded
- Light/dark toggle (palette icon, persisted in `localStorage`), plus two extra
  palettes: `data-theme="shadcn"` / `shadcn-dark`
- Footer: `footer_navigation` menu location + copyright text editable in
  Customizer → Theme Options
- Single post: byline (avatar + author, date beneath), next/prev article cards,
  styled comment cards and WP widget/theme blocks (query pagination, calendar,
  archives/categories lists, post author)
- Frontend URLs are host-relative (soil-style rewrite), so the site works from
  `localhost`, LAN IP, or phone without touching `WP_HOME`
- Avatars forced to Gravatar `d=retro` (no gray mystery-man)

## Requirements

- PHP ≥ 8.4, WordPress ≥ 6.6 (Bedrock layout: `web/app/themes/metablog`)
- Node ≥ 20, **pnpm 11** (`packageManager` pinned in `package.json` — CI uses it)
- Composer

## Development

```sh
composer install
pnpm install
pnpm dev     # vite dev server (HMR)
pnpm build   # production build to public/build
```

Note: in the parent Docker stack PHP runs with `opcache.validate_timestamps=Off`
— run `docker compose restart wordpress` after editing `.php`/`.blade.php` files.

## Structure

```
app/                 setup (menus, customizer), filters, view composers
resources/views/     layouts / sections / partials (Blade)
resources/css/       app.css — palette vars + all component styles
resources/js/        app.js — theme toggle + hero slider
```
