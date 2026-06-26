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

- Una VM (es. Azure, dato che è il provider già in uso — vedi sezione dedicata più sotto) con almeno 2 vCPU / 4 GB RAM per partire (da scalare quando il traffico crescerà verso i volumi discussi in precedenza).
- Sistema operativo Linux (Ubuntu LTS consigliato).
- **Docker** e **Docker Compose** installati sul server (stessa logica usata in locale).
- Un dominio con i record DNS (A/AAAA) puntati all'IP pubblico della VM.

### 2. Creare la Virtual Machine su Azure

Visto che usi già Azure come provider, ecco i passaggi per creare la VM che ospiterà WordPress. Puoi farlo dal **portale Azure** (portal.azure.com) oppure da CLI (`az`); qui copriamo entrambi.

#### Via portale Azure

1. Accedi a [portal.azure.com](https://portal.azure.com) e cerca **"Macchine virtuali"** nella barra di ricerca in alto.
2. Clicca **"+ Crea" → "Macchina virtuale"**.
3. Scheda **Base**:
   - **Gruppo di risorse**: creane uno nuovo, es. `rg-altrabolletta-prod` (utile per gestire insieme tutte le risorse del progetto e poterle eliminare in blocco se necessario).
   - **Nome macchina virtuale**: es. `vm-altrabolletta-prod`.
   - **Area (region)**: scegli quella più vicina al tuo pubblico target (es. "Italy North" se disponibile, altrimenti "West Europe").
   - **Immagine**: **Ubuntu Server 22.04 LTS** (allineata a quanto già usato/consigliato in questa guida).
   - **Dimensione**: parti da una taglia tipo **Standard_B2s** (2 vCPU / 4 GB RAM, economica e adatta per iniziare); la potrai ridimensionare in seguito senza ricreare la VM.
   - **Autenticazione**: scegli **Chiave pubblica SSH** (più sicura della password). Se non ne hai già una, Azure può generarla per te al volo — scarica e conserva la chiave privata `.pem` che ti propone, ti servirà per connetterti.
   - **Porte di ingresso pubbliche**: consenti **SSH (22)** per ora; le porte 80/443 le apriremo dopo, a livello di Network Security Group.
4. Scheda **Disks**: il disco SO predefinito (es. 30 GB Premium SSD) va bene per iniziare.
5. Scheda **Networking**: lascia la rete virtuale e subnet di default (Azure le crea automaticamente), verifica che venga creato un **IP pubblico** assegnato alla VM (necessario per puntarci il dominio).
6. Clicca **"Rivedi e crea"**, poi **"Crea"**. Dopo un paio di minuti la VM sarà pronta; annota l'**indirizzo IP pubblico** mostrato nella pagina della risorsa.

#### Via Azure CLI (alternativa più rapida se preferisci il terminale)

```bash
az login

az group create --name rg-altrabolletta-prod --location westeurope

az vm create \
  --resource-group rg-altrabolletta-prod \
  --name vm-altrabolletta-prod \
  --image Ubuntu2204 \
  --size Standard_B2s \
  --admin-username altrabolletta \
  --generate-ssh-keys
```

Il comando restituisce l'IP pubblico della VM (`publicIpAddress`) e salva la chiave SSH in `~/.ssh/id_rsa` (se non ne avevi già una).

#### Aprire le porte 80/443 (Network Security Group)

Per servire il sito via web serve aprire HTTP/HTTPS sul firewall di Azure (NSG) associato alla VM:

```bash
az vm open-port --resource-group rg-altrabolletta-prod --name vm-altrabolletta-prod --port 80 --priority 100
az vm open-port --resource-group rg-altrabolletta-prod --name vm-altrabolletta-prod --port 443 --priority 101
```

(oppure dal portale: vai sulla risorsa VM → **Networking** → **Aggiungi regola porta in ingresso**, una per la 80 e una per la 443).

#### Connessione e setup iniziale

```bash
ssh -i ~/.ssh/id_rsa altrabolletta@<IP-PUBBLICO-VM>

# installa Docker e Docker Compose
curl -fsSL https://get.docker.com | sudo sh
sudo usermod -aG docker $USER
# rifai login SSH per applicare il gruppo "docker"

# verifica
docker --version
docker compose version
```

#### IP statico e dominio

Per impostazione predefinita Azure assegna un IP pubblico **dinamico** (può cambiare se la VM viene riavviata/fermata). Prima di puntarci il dominio, rendilo **statico**:

- Portale: vai sulla risorsa **IP pubblico** della VM → **Configurazione** → **Assegnazione: Statico** → Salva.
- CLI: `az network public-ip update --resource-group rg-altrabolletta-prod --name <nome-ip-pubblico> --allocation-method Static`

Poi crea un record **A** nel pannello DNS del tuo dominio che punti a quell'IP statico.

> Costo: una VM Standard_B2s accesa 24/7 ha un costo mensile contenuto ma continuo (verifica il prezzo aggiornato per la tua region su [Azure Pricing Calculator](https://azure.microsoft.com/pricing/calculator/)); se in futuro il traffico crescerà molto, valuta anche un **Azure Database for MariaDB/MySQL** gestito al posto del container `db`, per delegare ad Azure backup e patching del database.

### 3. Differenze rispetto all'ambiente locale

Il `docker-compose.yml` del repository è pensato per lo sviluppo (porte esposte direttamente, `WP_DEBUG` attivo, nessun HTTPS). In produzione serve un file **dedicato** che:

- non espone le porte di WordPress/MariaDB direttamente su Internet, ma le mette dietro un **reverse proxy** (es. **Traefik** o **Nginx Proxy Manager**) che gestisce automaticamente i certificati SSL via **Let's Encrypt**.
- disattiva `WORDPRESS_DEBUG`.
- non monta `host.docker.internal`/Xdebug (sono strumenti di sviluppo, vanno rimossi in produzione).
- usa password robuste per il database, lette da variabili d'ambiente non versionate (stesso principio del file `.env` già usato in locale, ma con valori reali e segreti).

Quando arriveremo a questo scenario, andrà creato un secondo file, ad esempio `docker-compose.prod.yml`, da mantenere nel repository ma con i segreti reali forniti solo a runtime sul server (mai committati).

### 4. Deploy del codice

Il server avrà una copia del repository (via `git clone`), e ad ogni aggiornamento:

```bash
git pull origin main
docker compose -f docker-compose.prod.yml up -d --build
```

Questo aggiorna tema e plugin custom (`wp-content/themes/comparatore-theme`, `wp-content/plugins/comparatore-core`) senza toccare il database né i contenuti, che restano nei volumi Docker persistenti sul server.

### 5. Backup

A differenza dell'hosting gestito (che di solito include backup automatici), su un server proprio i backup sono **a tuo carico**:

- Backup periodico del database (`mysqldump` schedulato, es. via cron).
- Backup della cartella `wp-content/uploads` (media caricati dagli utenti/editor).
- Idealmente copie su storage esterno, non solo sullo stesso server. Su Azure la scelta naturale è **Azure Backup** abilitato direttamente sulla VM (snapshot periodici dell'intero disco, gestiti dal portale senza script da mantenere) oppure, per backup più granulari, caricare gli archivi di `mysqldump`/`uploads` su un **Azure Storage Account** (Blob Storage) via cron + [`azcopy`](https://learn.microsoft.com/azure/storage/common/storage-use-azcopy-v10) o `az storage blob upload`.

### 6. Migrazione da register.it al server proprio (quando arriverà il momento)

1. Esporta il database dal sito su register.it (via phpMyAdmin o plugin di migrazione).
2. Importa il database nel nuovo ambiente.
3. Copia la cartella `wp-content/uploads` (media) dal vecchio al nuovo hosting via FTP/SFTP.
4. Aggiorna gli URL nel database con **WP-CLI**, fondamentale perché WordPress salva l'URL del sito anche dentro ai contenuti:
   ```bash
   wp search-replace 'https://vecchiosito.it' 'https://nuovosito.it' --all-tables
   ```
5. Aggiorna i record DNS del dominio per puntare al nuovo server, solo dopo aver verificato che il sito funzioni correttamente sul nuovo ambiente (es. tramite l'IP diretto o un dominio di test).

Affronteremo questo scenario con una guida più dettagliata quando sarà il momento — per ora basta sapere che il passaggio è previsto e non richiede di ripartire da zero.
