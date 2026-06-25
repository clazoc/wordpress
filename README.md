# Altrabolletta — Portale comparatore luce e gas

Repository per il sito WordPress di Altrabolletta: contenuti/magazine pubblici (Fase 1), comparatore pubblico integrato con API esterna (Fase 2), area riservata con autenticazione OAuth2 (Fase 3).

Piano di progetto completo: [`docs/PROJECT_PLAN.md`](docs/PROJECT_PLAN.md).

## Struttura repository

Il core di WordPress **non è versionato** (gestito via immagine Docker `wordpress:php8.2-apache`); il repo contiene solo il codice custom:

```
wp-content/
├── themes/
│   └── comparatore-theme/   # child theme di Blocksy
└── plugins/
    └── comparatore-core/    # client API/OAuth2 (logica Fase 2-3)
```

## Ambiente di sviluppo locale

Richiede Docker e Docker Compose.

```bash
cp .env.example .env
docker compose up -d
```

- Sito: http://localhost:8080
- phpMyAdmin: http://localhost:8081
- WP-CLI: `docker compose exec wpcli wp <comando> --path=/var/www/html --allow-root`

Al primo avvio va completata l'installazione guidata di WordPress da browser, poi attivato il tema **Blocksy** (parent) e il child theme **Comparatore Theme**, e attivato il plugin **Comparatore Core**.

Questo setup è indipendente dalla scelta finale di hosting (gestito o server proprio): in produzione basta puntare lo stesso `wp-content` a un'installazione WordPress standard.
