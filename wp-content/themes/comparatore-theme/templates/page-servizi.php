<?php
/**
 * Template Name: Servizi — Index
 */
get_header();
?>
<div class="ab-wrap">

	<nav class="ab-breadcrumb" aria-label="Breadcrumb">
		<div class="wrap">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
			<span class="ab-breadcrumb-sep" aria-hidden="true">›</span>
			<span class="ab-current">Servizi</span>
		</div>
	</nav>

	<section class="ab-page-hero">
		<div class="wrap">
			<h1>I nostri servizi</h1>
			<p>Sei un consumatore domestico, un'impresa con partita IVA, oppure una società di vendita di energia o gas? Per ognuno di voi altrabolletta.it ha progettato un bouquet di servizi freemium per aiutarvi a gestire al meglio le forniture di luce e gas.</p>
		</div>
	</section>

	<section class="ab-services-grid wrap">

		<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'servizi/privati' ) ) ); ?>" class="ab-service-card">
			<div class="ab-service-card-thumb">🏠</div>
			<div class="ab-service-card-body">
				<h3>Cliente finale &ndash; Domestico</h3>
				<p>Non facciamo solo il confronto delle offerte di luce e gas: scopri tutti i servizi per gestire al meglio le tue utenze di casa.</p>
				<span class="ab-service-card-link">Scopri i servizi →</span>
			</div>
		</a>

		<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'servizi/imprese' ) ) ); ?>" class="ab-service-card">
			<div class="ab-service-card-thumb">🏢</div>
			<div class="ab-service-card-body">
				<h3>Cliente finale &ndash; Partita IVA</h3>
				<p>Possiamo aiutarti a scegliere, controllare e gestire le forniture di energia elettrica e gas naturale della tua azienda.</p>
				<span class="ab-service-card-link">Scopri i servizi →</span>
			</div>
		</a>

		<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'servizi/societa' ) ) ); ?>" class="ab-service-card">
			<div class="ab-service-card-thumb">⚡</div>
			<div class="ab-service-card-body">
				<h3>Società di vendita energia e gas</h3>
				<p>Oltre alla stipula dei contratti dal nostro comparatore, offriamo servizi a supporto delle tue attività commerciali.</p>
				<span class="ab-service-card-link">Scopri i servizi →</span>
			</div>
		</a>

	</section>

</div>
<?php get_footer(); ?>
