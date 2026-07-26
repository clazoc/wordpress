# Guida alla gestione dei contenuti — altrabolletta.it

Questa guida è scritta per chi si occupa dei contenuti del sito: redattori, collaboratori, o chiunque lavori nel pannello WordPress senza occuparsi del codice. Non serve sapere programmare per usarla.

---

## Il pannello di amministrazione

Si accede da **`https://altrabolletta.it/wp-admin`** con le credenziali ricevute. Da qui puoi fare tutto quello che riguarda i contenuti.

La barra laterale sinistra è il menu principale. Le sezioni che userai più spesso:

| Voce del menu | Cosa contiene |
|---|---|
| **Articoli** | Il magazine: guide, notizie, aggiornamenti tariffe |
| **Servizi** | I servizi offerti agli utenti (sezione dedicata) |
| **Pagine** | Le pagine statiche del sito (Home, Chi siamo, Contatti…) |
| **Media** | Tutte le immagini e i file caricati |
| **Aspetto → Menu** | I link di navigazione visibili in header e footer |

---

## Il magazine

### Come funziona

Il magazine è la sezione blog del sito. Ogni contenuto pubblicato è un **articolo** (voce "Articoli" nel pannello). Gli articoli sono organizzati per **categorie** (es. "Notizie", "Guide", "Prezzi e tariffe").

In homepage compare automaticamente un riquadro **"Dal Magazine"** con gli ultimi 3 articoli pubblicati. Non devi fare nulla di speciale: basta pubblicare un articolo e compare da solo.

### Pubblicare un nuovo articolo

1. Vai su **Articoli → Aggiungi nuovo**
2. Inserisci il **titolo** in cima
3. Scrivi il contenuto nell'area centrale (editor a blocchi)
4. Nel pannello destro:
   - **Categoria**: assegna almeno una categoria (crea quelle che mancano da Articoli → Categorie)
   - **Immagine in evidenza**: carica o scegli l'immagine che apparirà nella card homepage e nell'anteprima sui social. Dimensione consigliata: **1200×630 px**.
   - **Estratto**: breve riassunto dell'articolo (2-3 righe). Viene mostrato nella card homepage e nelle anteprime. Se non lo scrivi, WordPress usa l'inizio del testo automaticamente.
5. Clicca **Pubblica** (in alto a destra)

### Categorie consigliate

Definisci le categorie prima di iniziare a scrivere. Una struttura consigliata:

**Contenuti editoriali (rivolti ai lettori)**
- **Mercato e tariffe** — aggiornamenti ARERA, prezzi, indici PUN
- **Normativa** — decreti, bollettini, regolamenti del settore
- **Guide** — come leggere la bolletta, come cambiare fornitore, glossario
- **Curiosità** — retroscena, storie, approfondimenti sul mondo dell'energia

**Notizie interne (su altrabolletta.it)**
- **Altrabolletta** — lancio del servizio, aggiornamenti della piattaforma, comunicati, partnership

Tenere separata la categoria "Altrabolletta" permette in futuro di escluderla dalla sezione "Dal Magazine" in homepage, creare una pagina "Press" dedicata o inviare newsletter segmentate.

### Creare una categoria

1. Vai su **Articoli → Categorie**
2. Nel pannello sinistro compila:
   - **Nome**: il nome visibile (es. "Mercato e tariffe")
   - **Slug**: l'identificativo nell'URL, minuscolo senza spazi (es. `mercato-e-tariffe`) — WordPress lo genera automaticamente dal nome, puoi lasciarlo così
   - **Categoria genitore**: lascia vuoto per categorie di primo livello; scegli una categoria esistente se vuoi creare una sottocategoria
   - **Descrizione**: facoltativa, appare in alcune visualizzazioni dell'archivio
3. Clicca **Aggiungi nuova categoria**

### Pagine archivio delle categorie

WordPress crea automaticamente una **pagina archivio** per ogni categoria, senza che tu debba fare nulla. L'URL segue questo schema:

```
https://altrabolletta.it/category/mercato-e-tariffe/
https://altrabolletta.it/category/guide/
https://altrabolletta.it/category/altrabolletta/
```

Queste pagine mostrano tutti gli articoli di quella categoria in ordine cronologico inverso (il più recente prima) e si aggiornano automaticamente ogni volta che pubblichi un nuovo articolo nella categoria.

**Come aggiungere un archivio categoria al menu di navigazione:**

1. Vai su **Aspetto → Menu**
2. Nel pannello sinistro, apri la sezione **Categorie**
3. Seleziona la categoria che vuoi aggiungere e clicca **Aggiungi al menu**
4. Trascina la voce nella posizione desiderata (anche come sottovoce di "Magazine")
5. Clicca **Salva menu**

Esempio di struttura menu Magazine con sottovoci:
```
Magazine
├── Mercato e tariffe
├── Normativa
├── Guide
└── Curiosità
```

> La categoria "Altrabolletta" puoi non aggiungerla al menu principale — raggiungibile comunque tramite URL diretto o da una futura pagina "Press".

### Modificare o eliminare un articolo

- **Modificare**: Articoli → clicca sul titolo → modifica → Aggiorna
- **Mettere in bozza** (nasconderlo senza eliminarlo): apri l'articolo → in alto a destra cambia "Pubblicato" in "Bozza" → Aggiorna
- **Eliminare**: Articoli → passa il mouse sul titolo → "Cestino"

---

## I servizi

### Come funziona

I servizi sono gestiti tramite una sezione dedicata chiamata **"Servizi"** nel pannello. Ogni servizio è un contenuto separato, assegnato a una delle tre categorie di utenti:

| Categoria | Pagina del sito |
|---|---|
| **Privati** | `/servizi/privati/` |
| **Imprese** | `/servizi/imprese/` |
| **Società di vendita** | `/servizi/societa/` |

Le pagine di categoria mostrano **automaticamente** tutti i servizi assegnati a quella categoria. Non devi fare nulla di speciale: pubblica il servizio con la categoria giusta e compare nella pagina corrispondente.

L'ordine in cui compaiono nella pagina dipende dal campo **Ordine** (menu_order): numeri più bassi vengono prima.

> **Prerequisito**: le pagine Servizi devono essere create in WP admin con i template corretti (vedi sezione "Le pagine" più avanti). Senza le pagine, gli URL non funzionano.

### Pubblicare un nuovo servizio

1. Vai su **Servizi → Aggiungi nuovo**
2. Inserisci il **titolo** del servizio (es. "Confronto offerte luce e gas")
3. Scrivi la **descrizione** nell'editor centrale: puoi usare paragrafi, elenchi puntati, grassetti come in un normale documento
4. Compila il pannello **"Dettagli servizio"** in fondo alla pagina:

| Campo | Cosa inserire |
|---|---|
| **Categoria utente** | Scegli tra Privati, Imprese, Società di vendita |
| **Anchor ID** | Un identificativo breve senza spazi (es. `confronto-offerte`) — serve per il menu di navigazione interno alla pagina |
| **Emoji** | Una emoji che rappresenta il servizio (es. ⚡ 📊 🔍) — compare come icona decorativa |
| **Servizio gratuito** | Spunta se il servizio è gratuito — mostra il badge "FREE" |
| **Prezzo aggiuntivo** | Se non è gratuito, inserisci il prezzo/condizioni (es. "Da 9,90€/mese") |
| **Coming soon** | Spunta se il servizio non è ancora disponibile — lo mostra come "in arrivo" |
| **Oggetto email informazioni** | Testo pre-compilato per il pulsante "Richiedi info" — compare come oggetto nell'email |

5. Nel pannello destro **"Attributi pagina"**, imposta l'**Ordine** (numero intero, 1 = primo in alto)
6. Clicca **Pubblica**

### Modificare l'ordine dei servizi

Vai su **Servizi**, trascina i servizi nell'ordine che vuoi (se hai un plugin di ordinamento installato), oppure apri ciascun servizio e modifica il campo **Ordine** nel pannello "Attributi pagina" a destra.

---

## Le pagine

Le pagine contengono i contenuti statici del sito. Alcune hanno un template PHP che genera il contenuto automaticamente; altre vanno scritte nell'editor.

> **Regola generale**: i file PHP del tema devono essere già presenti sul server (caricati via FTP) prima di creare le pagine che li usano. Se crei la pagina prima di caricare il tema, WordPress non trova il template e usa quello di default.

---

### La pagina Magazine (`/magazine`)

La pagina `/magazine` non è una pagina normale: è la **pagina degli articoli** di WordPress. Non ha un template dedicato — mostra automaticamente tutti gli articoli pubblicati.

**Come configurarla (una volta sola):**

1. **Pagine → Aggiungi nuova**
   - Titolo: `Magazine`
   - Slug: `magazine`
   - Template: *Pagina predefinita*
   - Lascia il contenuto vuoto
   - Clicca **Pubblica**

2. **Impostazioni → Lettura**
   - "La tua homepage mostra" → seleziona **"Una pagina statica"**
   - **Homepage**: scegli la pagina `Home`
   - **Pagina degli articoli**: scegli la pagina `Magazine`
   - Clicca **Salva modifiche**

Da questo momento `/magazine` mostra tutti gli articoli con il layout del sito. La pagina si aggiorna automaticamente ogni volta che pubblichi un nuovo articolo.

---

### Le pagine Servizi

Le pagine Servizi hanno template PHP dedicati che generano il contenuto automaticamente leggendo i servizi inseriti nel pannello. **Non scrivere nulla nell'editor** — il contenuto verrebbe ignorato.

**Ordine di creazione consigliato** (prima i genitori, poi i figli):

#### 1. Pagina Servizi principale

1. **Pagine → Aggiungi nuova**
2. Titolo: `Servizi` — slug: `servizi`
3. Pannello destro → **Attributi pagina → Template** → seleziona **Servizi — Index**
4. Lascia "Pagina genitore" su *Nessuno*
5. Pubblica

#### 2. Sottopagina Privati

1. **Pagine → Aggiungi nuova**
2. Titolo: `Privati` — slug: `privati`
3. Template: **Servizi — Privati**
4. Pagina genitore: **Servizi**
5. Pubblica → URL risultante: `/servizi/privati/`

#### 3. Sottopagina Imprese

1. **Pagine → Aggiungi nuova**
2. Titolo: `Imprese` — slug: `imprese`
3. Template: **Servizi — Imprese**
4. Pagina genitore: **Servizi**
5. Pubblica → URL risultante: `/servizi/imprese/`

#### 4. Sottopagina Società di vendita

1. **Pagine → Aggiungi nuova**
2. Titolo: `Società` — slug: `societa` (senza accento)
3. Template: **Servizi — Società di vendita**
4. Pagina genitore: **Servizi**
5. Pubblica → URL risultante: `/servizi/societa/`

> **Dove si trova il campo Template?** Nel pannello laterale destro dell'editor, sotto la sezione "Attributi pagina" (potrebbe essere necessario espanderla cliccando sul titolo). Se non vedi questa sezione, vai su **Opzioni → Attributi pagina** (icona ⋮ in alto a destra).

---

### Pagine da creare con contenuto libero

Queste pagine usano il template standard di WordPress e il contenuto va scritto nell'editor:

| Pagina | Slug | Note |
|---|---|---|
| Chi siamo | `chi-siamo` | Descrizione del progetto e del team |
| Come funziona | `come-funziona` | Spiegazione del servizio |
| Contatti | `contatti` | Form contatto o informazioni |
| Privacy Policy | `privacy-policy` | Obbligatoria per legge |
| Cookie Policy | `cookie-policy` | Obbligatoria per legge |
| Note legali | `note-legali` | Termini di servizio |

> **Suggerimento**: per Privacy Policy e Cookie Policy usa i testi generati da **Iubenda**: crea l'account su iubenda.com, genera i documenti per altrabolletta.it e incollali nelle pagine corrispondenti.

---

### Modificare una pagina

Pagine → clicca sul titolo → modifica → Aggiorna.

**Attenzione**: non modificare il campo "Template" nelle pagine Servizi e Homepage — cambiereste il layout e la pagina smetterebbe di funzionare correttamente.

---

## Il menu di navigazione

Il menu principale (in alto nel sito) si gestisce da **Aspetto → Menu**.

1. Se non esiste ancora un menu, crea uno nuovo e assegnagli la posizione **"Menu principale"**
2. Aggiungi le voci trascinando dalla colonna sinistra (Pagine, Link personalizzati, ecc.)
3. Riordina trascinando le voci in alto e in basso
4. Clicca **Salva menu**

Le voci che compaiono tipicamente:

- Home
- Servizi (con sottovoci opzionali: Privati, Imprese, Società)
- Magazine
- Chi siamo
- Contatti

---

## Le immagini

### Caricare nuove immagini

Puoi caricare immagini in due modi:
- **Da Media → Aggiungi nuovo**: carica e organizza le immagini in anticipo
- **Direttamente dall'editor**: quando scrivi un articolo o una pagina, clicca sull'icona immagine nel blocco

### Dimensioni consigliate

| Uso | Dimensione consigliata |
|---|---|
| Immagine in evidenza articolo (card magazine e anteprima social) | 1200 × 630 px |
| Immagine interna all'articolo | Larghezza max 1120 px |
| Logo fornitori (sezione "I fornitori che confrontiamo") | da definire |

### Alt text (testo alternativo)

Quando carichi un'immagine, compila sempre il campo **"Testo alternativo"**: descrive l'immagine in una frase (es. "Confronto bollette luce e gas su schermo"). Serve per l'accessibilità e per il posizionamento SEO.

---

## La newsletter

Il sito ha due punti di raccolta email:

1. **Footer** (in basso su tutte le pagine): form sempre visibile
2. **Hero card in homepage** (solo quando il comparatore non è ancora attivo): mostra un form "Avvisami al lancio"

Entrambi i form inviano le iscrizioni alla lista **Mailchimp** configurata. Per vedere gli iscritti, gestire le campagne e inviare email, accedi al pannello Mailchimp con le credenziali del progetto.

---

## Cosa non modificare

Alcune aree del sito sono gestite dal codice e non devono essere toccate dal pannello WordPress, per evitare di rompere il layout:

- **Template delle pagine** (campo "Attributi pagina → Template") — non cambiarlo nelle pagine già funzionanti
- **Slug delle pagine principali** — non cambiare lo slug di Home, Servizi, Servizi/Privati, ecc.: i link interni del sito dipendono da quegli URL
- **L'editor della pagina Home** — il contenuto viene dal template PHP, non dall'editor WordPress

---

## Sezioni che si attivano in futuro

Due sezioni della homepage non sono ancora visibili perché il servizio non è ancora attivo:

| Sezione | Quando si attiva |
|---|---|
| Form di confronto offerte + pulsante "Confronta ora" | Quando il comparatore sarà pronto (Fase 2) |
| Pulsante "Accedi" + sezione piani account | Quando l'area riservata sarà pronta (Fase 3) |

L'attivazione richiede una modifica tecnica minima da parte dello sviluppatore (aggiunta di una riga in `wp-config.php`) — non c'è nulla da fare da wp-admin.

---

## Autori

### Aggiungere un nuovo autore

1. Vai su **Utenti → Aggiungi nuovo**
2. Compila:
   - **Nome utente** — identificativo univoco, non modificabile dopo la creazione
   - **Email** — deve essere univoca per ogni utente
   - **Password** — usa il pulsante "Genera password" e condividila con l'autore in modo sicuro
   - **Ruolo** — vedi tabella sotto
3. Clicca **Aggiungi nuovo utente**

### Ruoli disponibili

| Ruolo | Cosa può fare |
|---|---|
| **Collaboratore** | Scrive i propri articoli ma non può pubblicarli — serve l'approvazione di un Editore o Amministratore |
| **Autore** | Scrive, modifica e pubblica i **propri** articoli autonomamente |
| **Editore** | Scrive, modifica e pubblica articoli **di tutti**, gestisce categorie e tag |
| **Amministratore** | Accesso completo — riservato a chi gestisce il sito tecnicamente |

Per un redattore esterno che lavora in autonomia → **Autore**.
Per un caporedattore che supervisiona il lavoro altrui → **Editore**.
Per chi manda contributi occasionali da approvare → **Collaboratore**.

### Nome visualizzato negli articoli

Per default WordPress mostra il nome utente. Per cambiarlo in "Nome Cognome":

1. **Utenti → tutti gli utenti** → clicca sull'utente
2. Compila i campi **Nome** e **Cognome**
3. Nel campo **"Visualizza il nome pubblicamente come"** scegli il formato dal menu a tendina
4. Clicca **Aggiorna profilo**

### Immagine profilo (avatar)

L'avatar dell'autore si gestisce tramite [Gravatar](https://gravatar.com): l'autore crea un account Gravatar con la stessa email usata in WordPress e carica la sua foto — comparirà automaticamente nel sito.

---

## Stili del testo negli articoli

Gli articoli hanno stili tipografici personalizzati coerenti con il resto del sito. Non è necessario fare nulla di speciale: basta usare i blocchi standard dell'editor e i colori e le proporzioni corretti vengono applicati in automatico.

### Blocchi consigliati e come usarli

| Blocco | Quando usarlo |
|---|---|
| **Titolo (H2)** | Sezioni principali dell'articolo |
| **Titolo (H3)** | Sottosezioni dentro un H2 |
| **Titolo (H4)** | Dettagli dentro un H3 — usalo con parsimonia |
| **Paragrafo** | Tutto il testo corrente |
| **Elenco** | Liste di punti o numerate |
| **Citazione** | Blocco citazione — ha uno stile con bordo verde a sinistra |
| **Tabella** | Confronti, dati, elenchi strutturati |
| **Immagine** | Foto, grafici, screenshot — aggiungi sempre il testo alternativo |
| **Separatore** | Riga orizzontale per staccare sezioni molto diverse |

### Cosa evitare

- **Non cambiare colore al testo** usando i controlli colore dell'editor — il sistema applica i colori giusti in automatico, sovrascriverli crea incoerenze
- **Non usare H1** nel corpo dell'articolo — l'H1 è il titolo della pagina, già presente in cima; usare un secondo H1 è scorretto per la SEO
- **Non incollare testo da Word o Google Docs direttamente** — porta formattazioni nascoste. Usa invece "Incolla come testo normale" (`Ctrl+Shift+V`) e poi riapplica la formattazione nell'editor

---

## SEO — ottimizzare i contenuti

Se è installato **RankMath**, sotto ogni articolo e pagina compare un pannello "RankMath SEO" con:

- **Parola chiave focus**: la parola chiave principale per cui vuoi posizionare quel contenuto (es. "confronto offerte luce gas")
- **Meta description**: il testo che appare nei risultati di Google (max 160 caratteri)
- **Punteggio SEO**: un indicatore che suggerisce miglioramenti (non deve necessariamente essere 100/100)

Buone abitudini per ogni contenuto:
- Titolo chiaro e specifico che contenga la parola chiave
- Meta description che invoglia a cliccare
- Immagine in evidenza con alt text compilato
- Estratto scritto manualmente (più preciso di quello automatico)

---

## WooCommerce — Gestione servizi a pagamento

### Configurazione iniziale (una tantum)

1. **Installa WooCommerce** — `Plugin → Aggiungi nuovo → WooCommerce` → Attiva → segui il wizard (seleziona "Italia", valuta "EUR", tipo "Servizi/Virtuali")
2. **Installa WooCommerce PayPal Payments** — `Plugin → Aggiungi nuovo → WooCommerce PayPal Payments` → Attiva → `WooCommerce → Impostazioni → Pagamenti → PayPal` → collegati con il tuo account PayPal
3. **Installa plugin Aruba Fatturazione** — scarica il plugin dal portale Aruba o cercalo su WordPress.org come "Aruba Fatturazione Elettronica per WooCommerce" → caricalo da `Plugin → Aggiungi nuovo → Carica plugin` → inserisci le API key dal pannello Aruba Fatturazione

### Creare un prodotto/servizio

1. `Prodotti → Aggiungi nuovo`
2. Tipo prodotto: **Prodotto semplice** (o "Virtuale" se non richiede spedizione — consigliato per servizi)
3. Compila: nome, descrizione breve, prezzo
4. Pubblica
5. Annota l'**ID** del prodotto (visibile nell'URL della pagina di modifica: `post=XXX`)

### Collegare un servizio al prodotto WooCommerce

1. Vai in `Servizi → [nome servizio]`
2. Nel pannello laterale "Dettagli servizio" trovi il campo **"ID prodotto WooCommerce"**
3. Inserisci l'ID del prodotto corrispondente
4. Salva

Il blocco servizio mostrerà automaticamente:
- Il **prezzo aggiornato** preso da WooCommerce (se cambi il prezzo in WooCommerce, si aggiorna ovunque)
- Il **bottone "Acquista →"** che porta direttamente al checkout (salta la pagina prodotto)

### Pagine generate automaticamente da WooCommerce

WooCommerce crea automaticamente queste pagine alla prima installazione:

| Pagina | URL | Descrizione |
|--------|-----|-------------|
| Shop | `/shop` | Catalogo prodotti |
| Carrello | `/cart` | Riepilogo prima del pagamento |
| Checkout | `/checkout` | Form dati + pagamento |
| Il mio account | `/my-account` | Area clienti |

Puoi aggiungere "Shop" o "Il mio account" al menu da `Aspetto → Menu`.

### Campi di fatturazione nel checkout

Il checkout raccoglie:
- Nome, cognome
- Ragione sociale / Azienda (opzionale)
- **Codice fiscale** (obbligatorio)
- **Partita IVA** (opzionale — per aziende)
- Indirizzo, CAP, città, provincia
- Email, telefono
- **Codice SDI / PEC** (opzionale — per fattura elettronica)

I campi Codice fiscale, Partita IVA e Codice SDI sono visibili nell'admin sotto ogni ordine (`WooCommerce → Ordini → [ordine]`).

### Gestione ordini

`WooCommerce → Ordini` — lista tutti gli ordini con stato (In attesa, In lavorazione, Completato, Rimborsato)

Dopo che un ordine raggiunge lo stato **"Completato"**, il plugin Aruba genera e invia automaticamente la fattura elettronica al SdI.

### App WooCommerce (mobile)

Scarica l'app **WooCommerce** (iOS/Android) separata dall'app WordPress:
- Notifiche push per ogni nuovo ordine
- Gestione ordini e rimborsi
- Statistiche vendite
- Aggiunta/modifica prodotti

---

## Analytics e pixel di tracciamento

### Google Analytics 4 (GA4)

**Metodo consigliato: plugin "Site Kit by Google"**

1. `Plugin → Aggiungi nuovo → Site Kit by Google` → Installa → Attiva
2. Segui il wizard di configurazione: ti chiede di accedere con l'account Google che gestisce il tuo GA4
3. Seleziona la proprietà GA4 già esistente (o creane una nuova da [analytics.google.com](https://analytics.google.com))
4. Il codice di tracciamento viene inserito automaticamente su tutte le pagine — non serve toccare il codice

Site Kit integra anche **Google Search Console** nello stesso flusso: collegala quando te lo propone, è utile per monitorare le parole chiave con cui il sito appare su Google.

**Alternativa senza plugin: Google Tag Manager**

Se preferisci gestire tutti i tag da un unico posto (GA4, Pixel, altri script):

1. Crea un account su [tagmanager.google.com](https://tagmanager.google.com) e un nuovo contenitore per il sito
2. Installa il plugin **"GTM4WP"** (`Plugin → Aggiungi nuovo → GTM4WP`)
3. Inserisci il tuo ID contenitore (es. `GTM-XXXXXXX`) nelle impostazioni del plugin
4. Da Tag Manager puoi poi aggiungere GA4, Pixel Facebook e qualsiasi altro script senza mai modificare il codice del sito

### Meta Pixel (Facebook / Instagram Ads)

**Con Site Kit o GTM (consigliato):**
Se usi GTM, aggiungi il Pixel da Tag Manager: `Tag → Nuovo → tag personalizzato HTML` → incolla il codice Pixel di Meta → trigger "All Pages".

**Con plugin dedicato:**

1. `Plugin → Aggiungi nuovo → PixelYourSite` → Installa → Attiva
2. Vai in `PixelYourSite → Facebook Pixel`
3. Inserisci il tuo Pixel ID (lo trovi in [Meta Business Manager → Gestione eventi](https://business.facebook.com))
4. Attiva gli eventi standard che ti interessano (PageView, Purchase per WooCommerce, ecc.)

PixelYourSite si integra automaticamente con WooCommerce e invia l'evento `Purchase` dopo ogni ordine completato — utile per ottimizzare le campagne ads.

### Google Search Console

Per verificare il sito (se non usi Site Kit):

1. Vai su [search.google.com/search-console](https://search.google.com/search-console)
2. Aggiungi proprietà → scegli "Prefisso URL" → inserisci `https://altrabolletta.it`
3. Metodo di verifica consigliato: **meta tag HTML** → copia il tag
4. Incollalo in WordPress tramite RankMath: `RankMath → Impostazioni generali → Webmaster Tools → Google Search Console` → incolla solo il valore dell'attributo `content`

### Riepilogo: quale approccio scegliere

| Scenario | Soluzione |
|----------|-----------|
| Solo GA4, setup rapido | Site Kit by Google |
| GA4 + Pixel + altri tag futuri | Google Tag Manager + GTM4WP |
| Pixel con eventi WooCommerce automatici | PixelYourSite |

---

## Il Glossario

### Come funziona

Il glossario è una sezione dedicata ai termini del settore energetico (kWh, PUN, spread, ecc.). Ogni termine è un contenuto separato gestito dal pannello **Glossario**. Nella pagina pubblica i termini appaiono ordinati alfabeticamente con un menu A–Z in cima per saltare direttamente alla lettera desiderata.

Per ogni termine puoi scegliere se mostrare solo la **definizione breve** (una o due righe nella lista) oppure creare anche una **pagina di approfondimento** con testo esteso.

### Aggiungere un termine

1. Vai su **Glossario → Aggiungi termine** nel pannello laterale sinistro
2. Nel campo **Titolo** scrivi il termine esatto (es. "Kilowattora")
3. Nel riquadro **Dettagli termine** (sotto l'editor):
   - **Definizione breve** — 1-2 righe che compaiono nella lista del glossario
   - **Spunta "Ha pagina di approfondimento"** — solo se vuoi anche una pagina dedicata (vedi sotto)
4. Clicca **Pubblica**

Il termine comparirà automaticamente nella pagina glossario, raggruppato sotto la lettera iniziale.

### Aggiungere una pagina di approfondimento

Se un termine è abbastanza complesso da meritare una spiegazione più lunga:

1. Spunta la casella **"Questo termine ha una pagina di approfondimento"** nel riquadro Dettagli termine
2. Scrivi il testo esteso nell'**editor principale** (quello grande al centro, uguale agli articoli)
3. Pubblica

Nella lista del glossario comparirà automaticamente il link **"Leggi di più →"** accanto alla definizione breve, che porta alla pagina dedicata.

### Modificare o eliminare un termine

- **Modificare**: vai su **Glossario → Tutti i termini**, clicca sul titolo del termine
- **Eliminare**: dalla stessa lista, passa il mouse sul termine e clicca "Cestino"

### Creare la pagina pubblica del glossario

La pagina del glossario va creata una volta sola come qualsiasi pagina WordPress:

1. Vai su **Pagine → Aggiungi nuova**
2. Titolo: "Glossario" (o quello che preferisci)
3. Nel pannello destro, sezione **Attributi di pagina → Template**, scegli **"Glossario"**
4. Il campo contenuto (editor) è opzionale: se scrivi qualcosa comparirà come sottotitolo sotto il titolo della pagina
5. Pubblica e aggiungi la pagina al menu da **Aspetto → Menu**

> Se dopo aver creato la pagina i link ai termini non funzionano, vai su **Impostazioni → Permalink** e clicca **"Salva le modifiche"** (senza cambiare nulla) per aggiornare le regole di routing WordPress.

### Consigli per un glossario efficace

- Usa il **titolo esatto** del termine così come lo cerca l'utente (es. "Corrispettivo fisso", non "CF")
- La **definizione breve** deve rispondere alla domanda "cos'è?" in modo diretto, senza tecnicismi ulteriori
- Crea la pagina di approfondimento solo se hai davvero qualcosa di aggiuntivo da dire — non gonfiare il testo solo per avere una pagina separata
- L'**ordine alfabetico** è automatico: non devi preoccuparti dell'ordine in cui inserisci i termini
| Tutti e due | GTM per GA4 e Pixel, PixelYourSite solo se vuoi eventi WC automatici senza configurazione manuale |
