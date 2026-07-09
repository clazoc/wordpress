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
| **Privati** | `/servizi/privati` |
| **Imprese** | `/servizi/imprese` |
| **Società di vendita** | `/servizi/societa` |

L'ordine in cui compaiono nella pagina dipende dal campo **Ordine** (menu_order): numeri più bassi vengono prima.

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

Le pagine contengono i contenuti statici del sito che non cambiano frequentemente: Home, Chi siamo, Contatti, Privacy Policy, ecc.

### Pagine già presenti

| Pagina | Template assegnato | Note |
|---|---|---|
| Home | Homepage Altrabolletta | Completamente custom — non usare l'editor per questa pagina |
| Servizi | Servizi — Index | Generata automaticamente dai servizi creati |
| Servizi / Privati | Servizi — Privati | Generata automaticamente |
| Servizi / Imprese | Servizi — Imprese | Generata automaticamente |
| Servizi / Società | Servizi — Società di vendita | Generata automaticamente |

### Pagine da creare

Queste pagine devono essere create con template **"Pagina predefinita"** e contenuto scritto direttamente nell'editor:

- **Chi siamo** (slug: `chi-siamo`)
- **Come funziona** (slug: `come-funziona`)
- **Contatti** (slug: `contatti`)
- **Privacy Policy** (slug: `privacy-policy`) — richiesta per legge
- **Cookie Policy** (slug: `cookie-policy`) — richiesta per legge
- **Note legali** (slug: `note-legali`)

> **Suggerimento**: per Privacy Policy e Cookie Policy usa i testi generati da **Iubenda** (il plugin già previsto nel progetto): crea l'account su iubenda.com, genera i documenti per altrabolletta.it e incollali nelle pagine corrispondenti.

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
