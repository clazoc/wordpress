# Guida all'ambiente locale (per chi parte da zero)

Questa guida assume che tu non abbia mai usato WordPress né Visual Studio Code (VS Code). Segui i passaggi nell'ordine: ogni sezione presuppone che le precedenti siano già state completate.

---

## 1. Cosa installare sul tuo computer

Installa questi 3 programmi (sono gratuiti):

1. **Docker Desktop** — fa "girare" WordPress sul tuo computer dentro dei contenitori isolati, senza installare PHP/MySQL manualmente.
   👉 https://www.docker.com/products/docker-desktop/
   Dopo l'installazione, apri Docker Desktop e lascialo avviato in background (vedrai un'icona della balena nella barra in alto/in basso del sistema).

2. **Visual Studio Code** — l'editor con cui scriveremo e leggeremo il codice.
   👉 https://code.visualstudio.com/

3. **Git** — serve per scaricare (e poi aggiornare) il codice del repository.
   👉 https://git-scm.com/downloads

Verifica che siano installati correttamente apri un terminale (su Windows: "Prompt dei comandi" o "PowerShell"; su Mac: app "Terminale") e scrivi:

```bash
docker --version
git --version
```

Se vedono numeri di versione invece di un errore, sei pronto.

---

## 2. Estensioni di VS Code

Apri VS Code, poi:

1. Clicca sull'icona dei quadratini a sinistra (si chiama "Extensions" / "Estensioni").
2. Cerca e installa queste tre estensioni:
   - **PHP Debug** (autore: Xdebug) — permette di "fermare" il codice riga per riga
   - **Intelephense** (autore: bmewburn) — autocompletamento e controllo errori PHP
   - **Docker** (autore: Microsoft) — per vedere comodamente i contenitori da VS Code

Quando apriremo il progetto, VS Code probabilmente ti suggerirà da solo queste estensioni (sono salvate in `.vscode/extensions.json` nel repository): in quel caso basta cliccare "Installa tutto".

---

## 3. Scaricare il progetto

Nel terminale, vai nella cartella dove vuoi salvare il progetto e scrivi (sostituendo l'URL con quello reale del repository):

```bash
git clone <URL-DEL-REPOSITORY>
cd wordpress
```

Poi apri la cartella in VS Code:

```bash
code .
```

(se il comando `code` non viene riconosciuto, apri VS Code manualmente e usa "File → Apri cartella")

---

## 4. Primo avvio dell'ambiente

Nel terminale **integrato di VS Code** (menu "Terminal → New Terminal" / "Visualizza → Terminale") esegui:

```bash
cp .env.example .env
docker compose up -d --build
```

La prima volta scaricherà alcune immagini e potrebbe richiedere qualche minuto. Quando finisce, controlla che tutto sia partito:

```bash
docker compose ps
```

Dovresti vedere 4 servizi in stato "Up": `db`, `wordpress`, `wpcli`, `phpmyadmin`.

---

## 5. Completare l'installazione di WordPress

1. Apri il browser su **http://localhost:8080**
2. Si apre la procedura guidata di WordPress: scegli la lingua, poi inserisci:
   - Titolo del sito (es. "Altrabolletta")
   - Un nome utente amministratore e una password (annotali, ti serviranno sempre)
   - La tua email
3. Clicca "Installa WordPress" e poi accedi con le credenziali appena create.

Sei ora nella **bacheca di amministrazione** di WordPress (si chiama "wp-admin"), raggiungibile sempre da http://localhost:8080/wp-admin.

### Attivare tema e plugin del progetto

1. Vai su **Aspetto → Temi**: dovrai installare il tema **Blocksy** (cercalo e installalo dalla pagina "Aggiungi nuovo tema", è gratuito sulla repository ufficiale WordPress), poi attiva **Comparatore Theme** (il nostro child theme, già presente perché è nel repository).
2. Dopo aver attivato Blocksy, WordPress mostrerà un avviso che consiglia di installare e attivare **Blocksy Companion**: accetta e attivalo. È il plugin ufficiale (degli stessi autori di Blocksy) che sblocca i componenti che useremo nel sito — tabs, accordion FAQ, pricing card, slider per le recensioni, template demo. Senza questo plugin il tema perde gran parte delle funzionalità per cui lo abbiamo scelto.
3. Vai su **Plugin → Plugin installati**: troverai già **Comparatore Core**, clicca "Attiva".

A questo punto il sito su http://localhost:8080 mostrerà il tema in lavorazione.

---

## 6. phpMyAdmin (vedere il database, facoltativo)

Se vuoi sbirciare dentro al database (tabelle, contenuti, ecc.) vai su **http://localhost:8081**. Per accedere usa:
- Server/host: lascia quello precompilato
- Utente: `wordpress`
- Password: `wordpress` (a meno che tu non l'abbia cambiata nel file `.env`)

Non serve per lo sviluppo quotidiano, è solo uno strumento di ispezione.

---

## 7. Debug del codice PHP con VS Code

Il debug ti permette di **fermare l'esecuzione del codice** su una riga precisa e guardare il valore delle variabili in quel momento, invece di indovinare con `echo`/`var_dump`.

L'ambiente Docker ha già **Xdebug** installato e configurato per parlare con VS Code (vedi `docker/wordpress/Dockerfile` e `.vscode/launch.json`, già pronti nel repository).

### Come usarlo

1. Apri un file PHP, ad esempio `wp-content/plugins/comparatore-core/comparatore-core.php`.
2. Clicca alla sinistra del numero di riga dove vuoi fermarti: apparirà un **punto rosso** (si chiama "breakpoint").
3. Vai sull'icona "Run and Debug" nella barra laterale sinistra di VS Code (un triangolo con un insetto).
4. In alto trovi un menu a tendina: seleziona **"Ascolta Xdebug (WordPress Docker)"** (è già configurato, viene dal file `.vscode/launch.json`).
5. Premi il tasto play verde ▶️ (oppure F5). VS Code ora "ascolta" in attesa che il codice venga eseguito.
6. Vai nel browser e ricarica la pagina http://localhost:8080 (o l'azione che attiva quel codice).
7. VS Code dovrebbe "fermarsi" automaticamente sulla riga del tuo breakpoint, mostrandoti tutte le variabili a sinistra.

Da lì puoi usare i comandi in alto: "Continua" (▶️), "Step Over" (▷, esegue una riga), "Stop" (■).

### Se il debug non si avvia

- Controlla che Docker sia in esecuzione e che `docker compose ps` mostri il servizio `wordpress` come "Up".
- Su Windows con WSL2 o su Linux nativo, l'opzione `host.docker.internal` (già impostata in `docker-compose.yml`) dovrebbe funzionare automaticamente; in caso di problemi chiedi supporto, può servire un piccolo aggiustamento di rete.
- Ricorda di premere "play" sul debugger **prima** di ricaricare la pagina nel browser: Xdebug si collega solo se trova qualcuno "in ascolto".

---

## 8. Comandi utili

```bash
# avviare l'ambiente
docker compose up -d

# fermare l'ambiente (i dati restano salvati)
docker compose down

# vedere i log di WordPress in tempo reale
docker compose logs -f wordpress

# eseguire un comando WP-CLI (es. elenco plugin)
docker compose exec wpcli wp plugin list --path=/var/www/html --allow-root
```

---

## 9. Riepilogo indirizzi

| Cosa | Indirizzo |
|---|---|
| Sito pubblico | http://localhost:8080 |
| Bacheca amministrazione | http://localhost:8080/wp-admin |
| phpMyAdmin | http://localhost:8081 |

Se qualcosa non funziona come descritto, copia l'errore esatto dal terminale: aiuta moltissimo a capire cosa è andato storto.
