<?php
/**
 * Template Name: Servizi — Privati
 */
get_header();
$servizi_url = esc_url( get_permalink( get_page_by_path( 'servizi' ) ) );
?>
<div class="ab-wrap">

	<nav class="ab-breadcrumb" aria-label="Breadcrumb">
		<div class="wrap">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
			<span class="ab-breadcrumb-sep" aria-hidden="true">›</span>
			<a href="<?php echo $servizi_url; ?>">Servizi</a>
			<span class="ab-breadcrumb-sep" aria-hidden="true">›</span>
			<span class="ab-current">Privati</span>
		</div>
	</nav>

	<section class="ab-page-hero">
		<div class="wrap">
			<h1>Servizi per privati</h1>
			<p>Se le bollette di luce e gas sono uno stress, scopri gli strumenti e i servizi che altrabolletta.it ti mette a disposizione per gestire senza pensieri le tue forniture di energia elettrica e gas naturale.</p>
		</div>
	</section>

	<nav class="ab-service-nav" aria-label="Sezioni pagina">
		<div class="wrap">
			<a href="#servizio-confronto">Comparazione</a>
			<a href="#servizio-check-up">Check-up</a>
			<a href="#servizio-reclami">Reclami</a>
			<a href="#servizio-pratiche">Pratiche</a>
			<a href="#servizio-data-entry">Data entry</a>
			<a href="#servizio-gruppi-acquisto">Gruppi di acquisto</a>
			<a href="#servizio-alert-offerte">Alert offerte</a>
		</div>
	</nav>

	<main>

		<div id="servizio-confronto" class="ab-service-block">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Confronto self-service</h2>
					<p>altrabolletta.it recupera le migliori offerte web dei più importanti fornitori di luce e gas, che possono anche inserire gratuitamente nel nostro database le loro offerte per i clienti domestici.</p>
					<p>Con il nostro comparatore, puoi cercare l'offerta migliore sulla base di parametri standard oppure inserendo i tuoi consumi e i dati tecnici della tua utenza per un calcolo della spesa personalizzato.</p>
					<p>Se ti registri avrai accesso all'area riservata dove salvare i tuoi dati per riutilizzarli ogni volta che vuoi, e utilizzare le funzionalità di ricerca avanzate per filtrare e ordinare le offerte come preferisci.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price ab-free">FREE</span>
						<span class="ab-tag-price">Coming soon</span>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">🔍</div>
			</div>
		</div>

		<div id="servizio-check-up" class="ab-service-block ab-reverse">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Check-up bolletta</h2>
					<p>Ti è sembrato che la tua ultima bolletta fosse un po' più alta o bassa del solito?</p>
					<p>Registrandoti potrai usare il nostro semplicissimo tool gratuito con cui verificare se le condizioni sono in linea con i prezzi di mercato attuali.</p>
					<p>Se hai un prezzo troppo alto, potrai usare il <a href="#servizio-confronto">nostro comparatore</a> per cercare da solo l'offerta migliore per te, oppure farti aiutare da uno dei nostri esperti per un controllo approfondito a partire da <strong>soli 10&nbsp;&euro;</strong>.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price ab-free">FREE</span>
						<span class="ab-tag-price">Da 10&nbsp;&euro;</span>
						<span class="ab-tag-price">Coming soon</span>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">📋</div>
			</div>
		</div>

		<div id="servizio-reclami" class="ab-service-block">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Assistenza reclami</h2>
					<p>Ti sono arrivate due bollette per lo stesso periodo? Il tuo fornitore ti ha fatturato consumi sbagliati? Ti è arrivata una bolletta da un fornitore con cui non hai mai stipulato alcun contratto?</p>
					<p>Per questi e altri problemi, devi seguire le procedure corrette per far valere i tuoi diritti. Ma non sempre è facile orientarsi nella giungla di norme da seguire.</p>
					<p>Per questo ti mettiamo a disposizione una semplice procedura guidata che ti assiste passo per passo per trovare la maniera giusta di far valere le tue ragioni, e ti aiuta a preparare la documentazione corretta da mandare al tuo fornitore.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price ab-free">FREE</span>
						<span class="ab-tag-price">Coming soon</span>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">📨</div>
			</div>
		</div>

		<div id="servizio-pratiche" class="ab-service-block ab-reverse">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Supporto pratiche</h2>
					<p>Cambiare l'intestatario del contratto? Subentrare al precedente inquilino nel tuo nuovo appartamento? Chiudere il contatore nella vecchia casa e aprirlo in quella nuova?</p>
					<p>Se non sai da che parte cominciare, perché non lasciare che della burocrazia se ne occupi uno dei nostri esperti, che preparerà tutte le carte al posto tuo e ti fornirà tutto il supporto necessario per completare la pratica senza sorprese?</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price">Da 30&nbsp;&euro;</span>
						<span class="ab-tag-price">Coming soon</span>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">📝</div>
			</div>
		</div>

		<div id="servizio-data-entry" class="ab-service-block">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Data entry</h2>
					<p>Abbiamo cercato di renderti le cose più semplici possibili, ma i dati da inserire per scegliere e poi cambiare fornitore di luce e gas sono veramente tanti, e vanno cercati in bollette scritte in piccolo e piene di informazioni.</p>
					<p>Se non vuoi perdere tempo in una caccia al tesoro per trovare il POD o codice RE.MI. sulla tua bolletta, fai fare il lavoro all'occhio allenato di uno dei nostri esperti.</p>
					<p>Registrati e carica una foto della tua bolletta nella nostra area riservata, e in poche ore inseriremo i dati per te e ti invieremo i risultati della tua prima comparazione personalizzata direttamente nella tua mail.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price">Solo 5&nbsp;&euro;</span>
						<span class="ab-tag-price">Coming soon</span>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">⌨️</div>
			</div>
		</div>

		<div id="servizio-gruppi-acquisto" class="ab-service-block ab-reverse">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Gruppi di acquisto</h2>
					<p>Quante volte ti è stato detto, per la fornitura di energia e gas ma non solo, "<em>sei un cliente troppo piccolo, non posso farti un'offerta migliore</em>"?</p>
					<p>Ma cosa succede se tanti clienti piccoli si mettono insieme? L'unione fa la forza, se ci si propone come un unico grande cliente.</p>
					<p>altrabolletta.it ha avviato le analisi per procedere all'<a href="https://www.arera.it/it/consumatori/gruppiacquisto1.htm" target="_blank" rel="noopener noreferrer">accreditamento tra i gruppi di acquisto</a> approvati dall'Autorità per l'energia e lo sviluppo delle relative piattaforme.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price">Da 5&nbsp;&euro;</span>
						<span class="ab-tag-price">Coming soon</span>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">🤝</div>
			</div>
		</div>

		<div id="servizio-alert-offerte" class="ab-service-block">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Alert offerte</h2>
					<p>Hai trovato l'offerta migliore per te, ma ti viene già l'ansia perché dura solo un anno e non sai cosa succederà dopo.</p>
					<p>Chi sarà il fornitore migliore tra un anno? Ma soprattutto, mi ricorderò di controllare per tempo ed eventualmente passare alla nuova offerta migliore?</p>
					<p>Per toglierti anche questo pensiero, puoi impostare i nostri alert automatici, decidendo la frequenza di aggiornamento e i tuoi obiettivi per ricevere direttamente nella tua mail la miglior offerta disponibile per te.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price ab-free">FREE</span>
						<span class="ab-tag-price">Coming soon</span>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">🔔</div>
			</div>
		</div>

	</main>

</div>
<?php get_footer(); ?>
