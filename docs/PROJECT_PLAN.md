# Piano di progetto — Altrabolletta

## Obiettivo

Portale di comparazione offerte luce e gas (stile facile.it/switcho.it, tono meno aggressivo). WordPress gestisce contenuti e magazine; i dati dell'area riservata e i calcoli di comparazione vivono in un'API esterna proprietaria con autenticazione OAuth2.

## Architettura

- **WordPress**: CMS per contenuti pubblici (pagine informative, magazine/blog). Tema: child theme di **Blocksy**.
- **Plugin custom `comparatore-core`** (separato dal tema): conterrà client OAuth2, wrapper REST verso l'API esterna, blocchi/shortcode per i risultati di comparazione. Nessun dato utente persistito in WordPress.
- **Ambiente locale**: Docker Compose (WordPress + MariaDB + WP-CLI + phpMyAdmin), indipendente dalla scelta finale di hosting.

## Fasi

### Fase 1 — Area pubblica contenuti (in corso)
- [x] Scaffolding repo, Docker, child theme, plugin vuoto
- [x] Mockup home page (palette e struttura validate con il cliente)
- [ ] Setup Blocksy + child theme via dashboard, import struttura dal mockup
- [ ] Information architecture: Home, Chi siamo, Altrabolletta (come funziona/lavora con noi/FESR), Magazine (categorie News/Prezzi e tariffe/Consigli pratici/Curiosità), Contatti
- [ ] CPT "Articolo" o uso dei post nativi + categorie magazine
- [ ] SEO: plugin **RankMath**
- [ ] Compliance cookie/privacy: **Iubenda**
- [ ] Caching pagina (object cache / CDN) dimensionato per traffico target (~400-500k visite/mese)

### Fase 2 — Comparatore pubblico (no auth)
- [ ] `comparatore-core`: client HTTP verso l'API esterna per i calcoli di comparazione
- [ ] Blocco/shortcode "Form comparazione" + pagina risultati
- [ ] Cache applicativa (transient) con TTL breve per risposte ripetute, rate limiting verso l'API
- [ ] Schema.org Offer/Product dinamico generato dal plugin (non gestibile dai plugin SEO standard)

### Fase 3 — Area riservata con OAuth2
- [ ] `comparatore-core`: flow OAuth2 Authorization Code verso l'API di autenticazione proprietaria
- [ ] Gestione token/refresh token, nessuna persistenza dati utente in WP
- [ ] Pagine area riservata (piani Free/Premium come da mockup agenzia)
- [ ] Newsletter: doppio canale — editoriale via provider esterno (Mailchimp/Brevo), alert personalizzati (es. nuova offerta per i consumi dell'utente) come email transazionali innescate dalla tua API/backend
- [ ] Aggiornamento Privacy Policy (Iubenda) per il trattamento dati lato API esterna

## Decisioni prese

| Tema | Decisione |
|---|---|
| Hosting | Da definire (gestito o server proprio); ambiente locale Docker indipendente dalla scelta |
| Tema WP | Blocksy (child theme) — scelto per componenti pronti (tabs, accordion, pricing card) e gestione colori via Customizer |
| Architettura API | Plugin custom `comparatore-core` separato dal tema, da subito |
| SEO | RankMath (plugin), schema custom solo per le offerte comparate in Fase 2 |
| Newsletter | Provider esterno per invii, dati personalizzati gestiti dalla tua API (vedi Fase 3) |
| Cookie/Privacy | Iubenda confermato, da aggiornare in Fase 3 per i trattamenti lato API |
| Palette | Compromesso ~70% identità brand agenzia (verdi #7ac843/#408f55/#99cc66) + 30% impostazione sobria (molto white space, accenti arcobaleno limitati a dettagli decorativi) |

## Mockup di riferimento

Mockup HTML statico della home (versione approvata) conservato fuori dal repo durante la fase di validazione; da tradurre in template Blocksy/blocchi nella Fase 1.
