<?php
/**
 * Template Name: Servizi — Società
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
			<span class="ab-current">Società di vendita</span>
		</div>
	</nav>

	<section class="ab-page-hero">
		<div class="wrap">
			<h1>Servizi per società di vendita</h1>
			<p>altrabolletta.it è molto più di un tradizionale comparatore: offre una suite completa di funzionalità utili a migliorare la gestione commerciale per le società di vendita di qualsiasi dimensione. Dall'analisi del pricing alla gestione delle comunicazioni obbligatorie verso Acquirente Unico.</p>
		</div>
	</section>

	<nav class="ab-service-nav" aria-label="Sezioni pagina">
		<div class="wrap">
			<a href="#servizio-trasmissione-offerte">Configurazione</a>
			<a href="#servizio-portale-offerte">XML AU</a>
			<a href="#servizio-placet">PLACET</a>
			<a href="#servizio-schede-confrontabilita">Schede confrontabilità</a>
		</div>
	</nav>

	<main>

		<div id="servizio-trasmissione-offerte" class="ab-service-block">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Trasmissione offerte</h2>
					<p>Le offerte sul nostro comparatore sono gestite dal nostro team, che raccoglie i dati da fonti pubbliche e le configura perché appaiano tra i risultati del confronto.</p>
					<p>Questa attività non riesce a coprire tutte le società di vendita attive, e può passare qualche giorno da quando l'offerta è disponibile a quando viene censita nei nostri sistemi.</p>
					<p>Per ampliare e velocizzare la copertura del mercato, mettiamo a disposizione <strong>gratuitamente</strong> a tutte le società di vendita il nostro tool di configurazione, che permette di gestire in autonomia la configurazione delle offerte e di aggiungere informazioni personalizzate nelle schede descrittive.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price ab-free">FREE</span>
						<a href="mailto:info@altrabolletta.it?subject=Informazioni%20su%20trasmissione%20offerte" class="ab-btn-info">Richiedi info</a>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">📡</div>
			</div>
		</div>

		<div id="servizio-portale-offerte" class="ab-service-block ab-reverse">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Comunicazioni Portale Offerte</h2>
					<p>Tutte le società di vendita devono comunicare obbligatoriamente ad Acquirente Unico le loro offerte rivolte alla generalità dei clienti finali.</p>
					<p>La comunicazione deve avvenire tramite il caricamento sul Sistema Informativo Integrato di un file XML contenente tutti i dettagli dell'offerta secondo un <a href="https://siiportale.acquirenteunico.it/mercato-retail" target="_blank" rel="noopener noreferrer">formato definito e aggiornato</a> da Acquirente Unico per la pubblicazione sul <a href="https://ilportaleofferte.it" target="_blank" rel="noopener noreferrer">Portale Offerte</a>.</p>
					<p>La nostra soluzione sfrutta la stessa interfaccia del servizio gratuito di <a href="#servizio-trasmissione-offerte">trasmissione offerte</a> per generare in pochi secondi i file da caricare sul SII, sempre aggiornati e testati secondo le ultime specifiche.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price">Da 500&nbsp;&euro;/anno</span>
						<a href="mailto:info@altrabolletta.it?subject=Informazioni%20su%20comunicazioni%20portale%20offerte" class="ab-btn-info">Richiedi info</a>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">📤</div>
			</div>
		</div>

		<div id="servizio-placet" class="ab-service-block">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Offerte PLACET</h2>
					<p>Ogni venditore di energia o gas è obbligato ad avere in portafoglio almeno un'offerta a prezzo fisso e una a prezzo variabile secondo condizioni standard definite dall'ARERA, e a comunicare i relativi parametri ad Acquirente Unico per la pubblicazione sul <a href="https://ilportaleofferte.it" target="_blank" rel="noopener noreferrer">Portale Offerte</a>.</p>
					<p>La standardizzazione di queste offerte permette un'elevata automazione di tutte le fasi del processo, dalla generazione della documentazione dell'offerta a quella dei file per le comunicazioni al SII.</p>
					<p>Il servizio di altrabolletta.it permette di configurare facilmente i soli parametri indispensabili delle offerte, creare le condizioni economiche, le schede di confrontabilità e le condizioni generali, oltre che generare i file CSV per il caricamento sul SII.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price">Da 200&nbsp;&euro;/anno</span>
						<a href="mailto:info@altrabolletta.it?subject=Informazioni%20su%20offerte%20PLACET" class="ab-btn-info">Richiedi info</a>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">📄</div>
			</div>
		</div>

		<div id="servizio-schede-confrontabilita" class="ab-service-block ab-reverse">
			<div class="wrap">
				<div class="ab-service-block-text">
					<h2>Schede di confrontabilità</h2>
					<p>Il Codice di Condotta Commerciale dell'ARERA ha adeguato le modalità di calcolo delle schede di confrontabilità da consegnare ai clienti domestici agli algoritmi di calcolo del <a href="https://ilportaleofferte.it" target="_blank" rel="noopener noreferrer">Portale Offerte</a>.</p>
					<p>Dal nostro portale potrai esportare i valori per tutte le configurazioni effettuate con il servizio gratuito di <a href="#servizio-trasmissione-offerte">trasmissione offerte</a>, tenendo conto delle tariffe e dei profili di volta in volta applicabili e tempestivamente aggiornati dal nostro team.</p>
					<p>Inoltre è possibile anche scegliere di esportare i dati in formato PDF pronto per essere incluso nel proprio plico contrattuale, utilizzando il nostro template standard oppure creandone di personalizzati sia in termini di grafica che di contenuti.</p>
					<div class="ab-service-actions">
						<span class="ab-tag-price">Da 200&nbsp;&euro;/anno</span>
						<a href="mailto:info@altrabolletta.it?subject=Informazioni%20su%20schede%20di%20confrontabilit%C3%A0" class="ab-btn-info">Richiedi info</a>
					</div>
				</div>
				<div class="ab-service-block-img" aria-hidden="true">📊</div>
			</div>
		</div>

	</main>

</div>
<?php get_footer(); ?>
