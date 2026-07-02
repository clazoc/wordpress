<?php
/**
 * Template Name: Servizi — Imprese
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
			<span class="ab-current">Imprese</span>
		</div>
	</nav>

	<section class="ab-page-hero">
		<div class="wrap">
			<h1>Servizi per le imprese</h1>
			<p>Se hai un'attività con partita IVA e vuoi smettere di preoccuparti delle bollette di luce e gas, sei nel posto giusto. Scopri i servizi di altrabolletta.it per ottimizzare e gestire le forniture di energia elettrica e gas naturale della tua azienda.</p>
		</div>
	</section>

	<nav class="ab-service-nav" aria-label="Sezioni pagina">
		<div class="wrap">
			<a href="#servizio-confronto">Comparazione</a>
			<a href="#servizio-check-up">Check-up</a>
			<a href="#servizio-gestione-fornitura">Gestione</a>
			<a href="#servizio-gruppi-acquisto">Gruppi di acquisto</a>
		</div>
	</nav>

	<main>

		<div id="servizio-confronto" class="ab-service-block">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Confronto self service</h2>
					<p>altrabolletta.it censisce le migliori offerte web dei principali fornitori di energia e gas, e permette a tutte le società di vendita di inserire gratuitamente le proprie offerte per le imprese.</p>
					<p>Con il nostro comparatore, puoi inserire i tuoi dati di consumo e gli altri dati tecnici necessari a stimare il tuo costo annuo. Il nostro algoritmo calcolerà la spesa annua stimata e ti ordinerà le offerte a partire dalla più conveniente.</p>
					<p>Registrandoti potrai salvare i tuoi dati per aggiornare rapidamente il confronto ogni volta che vuoi, nonché utilizzare le funzionalità di ricerca avanzate per filtrare e ordinare le offerte secondo le tue preferenze.</p>
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
					<p>Sei sicuro che la tua fornitura di energia o gas sia davvero conveniente?</p>
					<p>Gli utenti registrati hanno a disposizione un semplice tool gratuito che, inserendo pochissimi dati, ti permette di verificare se le condizioni che ti applica il tuo fornitore sono convenienti rispetto ai prezzi di mercato attuali.</p>
					<p>Se il tuo prezzo è troppo alto, potrai cercare in autonomia un'offerta più conveniente con <a href="#servizio-confronto">il nostro comparatore</a>, oppure richiedere il supporto di uno dei nostri esperti per un controllo approfondito a partire da <strong>soli 20&nbsp;&euro;</strong> (IVA esclusa).</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price ab-free">FREE</span>
						<span class="ab-tag-price">Da 20&nbsp;&euro; + IVA</span>
						<span class="ab-tag-price">Coming soon</span>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">📋</div>
			</div>
		</div>

		<div id="servizio-gestione-fornitura" class="ab-service-block">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Gestione fornitura</h2>
					<p>Non ne puoi più di star dietro alle bollette di luce e gas? Lascia che se ne occupino i nostri esperti, così tu potrai portare avanti la tua attività senza preoccuparti se il tuo fornitore ti fa pagare troppo o ti addebita corrispettivi non dovuti.</p>
					<p>A partire da <strong>soli 50&nbsp;&euro;/anno</strong> (IVA esclusa), puoi chiedere ad altrabolletta.it di occuparsi della selezione dell'offerta migliore, del controllo della correttezza delle fatture e delle eventuali richieste di rettifica al fornitore.</p>
					<p>Se non è abbastanza, potrai anche attivare il servizio <strong>PLUS</strong> che prevede anche la gestione di tutte le altre pratiche verso il fornitore, come le richieste di aumenti o diminuzioni di potenza, di attivazione o disattivazione del contatore, ecc.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price">Da 50&nbsp;&euro;/anno + IVA</span>
						<span class="ab-tag-price">Coming soon</span>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">⚙️</div>
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
						<span class="ab-tag-price ab-free">FREE</span>
						<span class="ab-tag-price">Coming soon</span>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">🤝</div>
			</div>
		</div>

	</main>

</div>
<?php get_footer(); ?>
