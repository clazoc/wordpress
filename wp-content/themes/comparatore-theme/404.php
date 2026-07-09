<?php
/**
 * Pagina 404 — "Si è spenta la luce"
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="ab-404-wrap">
	<div class="ab-404-inner">

		<div class="ab-404-icon" aria-hidden="true">💡</div>

		<p class="ab-404-code">404</p>

		<h1 class="ab-404-title">Si è spenta la luce.</h1>

		<p class="ab-404-lead">
			La pagina che cerchi non esiste (o forse si è spostata senza avvisare il gestore di rete).
			Ci dispiace per il disagio — di solito non è colpa tua.
		</p>

		<div class="ab-404-actions">
			<a class="ab-404-btn ab-404-btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				Torna in homepage
			</a>
			<a class="ab-404-btn ab-404-btn-ghost" href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>">
				Vai al Magazine
			</a>
		</div>

		<p class="ab-404-tip">
			Oppure prova a cercare quello che ti serve:
		</p>

		<?php get_search_form(); ?>

	</div>
</div>

<?php get_footer(); ?>
