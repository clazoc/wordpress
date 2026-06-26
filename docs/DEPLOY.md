# Guida al deploy (pubblicazione online)

Questa guida è separata da [`LOCAL_SETUP.md`](LOCAL_SETUP.md), che riguarda solo l'ambiente sul tuo computer. Qui copriamo come portare il sito online, in due scenari:

- **Scenario A** — hosting WordPress gestito (es. register.it): per la prima pubblicazione.
- **Scenario B** — server proprio (VPS): per quando deciderai di gestire l'infrastruttura in autonomia.

In entrambi i casi vale lo stesso principio del repository: **il core di WordPress non si "porta dietro"**, viene fornito dall'hosting (Scenario A) o installato da noi (Scenario B). Quello che spostiamo è solo il nostro codice: `wp-content/themes/comparatore-theme` e `wp-content/plugins/comparatore-core`, più il contenuto del database.

---

## Scenario A — Hosting gestito (register.it o simili)

Compatibile con il progetto attuale: un hosting WordPress gestito fornisce già il core di WordPress, PHP, MySQL e i certificati SSL — a noi serve solo caricare il nostro tema/plugin e i contenuti.

### 1. Attivazione hosting

1. Attiva il piano WordPress gestito su register.it e collega il dominio (es. altrabolletta.it).
2. Al termine dell'attivazione riceverai via email le credenziali di:
   - accesso a **wp-admin** del sito già installato
   - accesso **FTP/SFTP** (host, utente, password, porta)
   - eventualmente **phpMyAdmin** per il database

Conserva queste credenziali in un posto sicuro (es. un password manager), non vanno mai inserite nel repository Git.

### 2. Caricare tema e plugin custom

Userai una connessione FTP/SFTP per copiare i nostri file dentro la cartella `wp-content` del sito online.

**Opzione consigliata: estensione SFTP per VS Code**

1. Installa l'estensione **SFTP** (autore: Natizyskunk) da VS Code.
2. Apri la palette comandi (`Ctrl+Shift+P` / `Cmd+Shift+P`) e cerca "SFTP: Config".
3. Inserisci host, utente, password e porta forniti da register.it, impostando come `remotePath` la cartella `wp-content` del sito remoto.
4. Carica manualmente (tasto destro → "Upload") le cartelle:
   - `wp-content/themes/comparatore-theme`
   - `wp-content/plugins/comparatore-core`

**Alternativa: FileZilla** (se preferisci un client FTP grafico classico) — stessa logica, stesse credenziali, stesse due cartelle da caricare dentro `wp-content/themes` e `wp-content/plugins` del sito remoto.

> Non caricare mai la cartella `wp-content/uploads` del tuo ambiente locale: sul sito online avrà già i suoi contenuti (media caricati da remoto), sovrascriverla creerebbe confusione.

### 3. Configurare il sito online come in locale

Accedi a `tuosito.it/wp-admin` e ripeti gli stessi passaggi fatti in locale (vedi `LOCAL_SETUP.md`, punto 5):

1. **Aspetto → Temi**: installa **Blocksy** (cercalo da "Aggiungi nuovo tema", è gratuito), poi attiva **Comparatore Theme** (quello appena caricato via FTP).
2. Attiva **Blocksy Companion** quando il sito te lo propone.
3. **Plugin → Plugin installati**: attiva **Comparatore Core**.
4. Installa/attiva **RankMath** (SEO) e **Akismet** (anti-spam), come deciso nel piano di progetto.
5. Configura **Iubenda** per cookie banner e privacy policy.

### 4. Spostare i contenuti da locale a online (se servono)

Se hai già creato pagine/articoli in locale e vuoi portarli sul sito online, le opzioni più semplici per chi non ha accesso SSH (tipico degli hosting gestiti) sono:

- **Esportazione nativa di WordPress**: in locale vai su **Strumenti → Esporta**, scarica il file XML, poi sul sito online vai su **Strumenti → Importa** e carica quel file. Funziona bene per pagine/articoli/media, non per impostazioni di tema o configurazioni dei plugin.
- **Plugin di migrazione** (es. **All-in-One WP Migration** o **Duplicator**): esporta un pacchetto completo (database + media) dal sito locale e lo importa nel sito online in un colpo. Più comodo se i contenuti sono già numerosi.

Per la primissima pubblicazione, in cui probabilmente i contenuti reali li scriverai direttamente online, puoi anche saltare questo passaggio e creare i contenuti finali direttamente sul sito in produzione.

### 5. Verifiche finali

- Controlla che il certificato **SSL** sia attivo (di solito automatico su hosting gestiti; verifica che il sito risponda su `https://`).
- Verifica che **Impostazioni → Generali** abbia l'URL del sito corretto (`https://tuodominio.it`).
- Disattiva eventuali plugin di debug locale (non dovrebbero comunque essere stati caricati: `WP_DEBUG` è una variabile d'ambiente di Docker, non viene copiata via FTP).

---

## Scenario B — Server proprio (VPS)

Quando deciderai di gestire l'infrastruttura in autonomia, il vantaggio è che possiamo riutilizzare la stessa logica Docker già pronta in questo repository, irrobustita per la produzione.

### 1. Requisiti del server

- Un VPS (es. Hetzner, DigitalOcean, Aruba Cloud) con almeno 2 vCPU / 4 GB RAM per partire (da scalare quando il traffico crescerà verso i volumi discussi in precedenza).
- Sistema operativo Linux (Ubuntu LTS consigliato).
- **Docker** e **Docker Compose** installati sul server (stessa logica usata in locale).
- Un dominio con i record DNS (A/AAAA) puntati all'IP del server.

### 2. Differenze rispetto all'ambiente locale

Il `docker-compose.yml` del repository è pensato per lo sviluppo (porte esposte direttamente, `WP_DEBUG` attivo, nessun HTTPS). In produzione serve un file **dedicato** che:

- non espone le porte di WordPress/MariaDB direttamente su Internet, ma le mette dietro un **reverse proxy** (es. **Traefik** o **Nginx Proxy Manager**) che gestisce automaticamente i certificati SSL via **Let's Encrypt**.
- disattiva `WORDPRESS_DEBUG`.
- non monta `host.docker.internal`/Xdebug (sono strumenti di sviluppo, vanno rimossi in produzione).
- usa password robuste per il database, lette da variabili d'ambiente non versionate (stesso principio del file `.env` già usato in locale, ma con valori reali e segreti).

Quando arriveremo a questo scenario, andrà creato un secondo file, ad esempio `docker-compose.prod.yml`, da mantenere nel repository ma con i segreti reali forniti solo a runtime sul server (mai committati).

### 3. Deploy del codice

Il server avrà una copia del repository (via `git clone`), e ad ogni aggiornamento:

```bash
git pull origin main
docker compose -f docker-compose.prod.yml up -d --build
```

Questo aggiorna tema e plugin custom (`wp-content/themes/comparatore-theme`, `wp-content/plugins/comparatore-core`) senza toccare il database né i contenuti, che restano nei volumi Docker persistenti sul server.

### 4. Backup

A differenza dell'hosting gestito (che di solito include backup automatici), su un server proprio i backup sono **a tuo carico**:

- Backup periodico del database (`mysqldump` schedulato, es. via cron).
- Backup della cartella `wp-content/uploads` (media caricati dagli utenti/editor).
- Idealmente copie su storage esterno (es. object storage S3-compatibile), non solo sullo stesso server.

### 5. Migrazione da register.it al server proprio (quando arriverà il momento)

1. Esporta il database dal sito su register.it (via phpMyAdmin o plugin di migrazione).
2. Importa il database nel nuovo ambiente.
3. Copia la cartella `wp-content/uploads` (media) dal vecchio al nuovo hosting via FTP/SFTP.
4. Aggiorna gli URL nel database con **WP-CLI**, fondamentale perché WordPress salva l'URL del sito anche dentro ai contenuti:
   ```bash
   wp search-replace 'https://vecchiosito.it' 'https://nuovosito.it' --all-tables
   ```
5. Aggiorna i record DNS del dominio per puntare al nuovo server, solo dopo aver verificato che il sito funzioni correttamente sul nuovo ambiente (es. tramite l'IP diretto o un dominio di test).

Affronteremo questo scenario con una guida più dettagliata quando sarà il momento — per ora basta sapere che il passaggio è previsto e non richiede di ripartire da zero.
