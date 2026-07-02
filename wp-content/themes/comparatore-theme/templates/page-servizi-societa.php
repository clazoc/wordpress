<?php
/**
 * Template Name: Servizi — Società
 */
get_header();
$servizi_url = esc_url( get_permalink( get_page_by_path( 'servizi' ) ) );

$query = new WP_Query( [
	'post_type'      => 'ab_servizio',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'meta_query'     => [ [ 'key' => '_ab_cat', 'value' => 'societa' ] ],
] );
$posts = $query->posts;
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

	<?php if ( $posts ) : ?>
	<nav class="ab-service-nav" aria-label="Sezioni pagina">
		<div class="wrap">
			<?php foreach ( $posts as $p ) :
				$anchor = get_post_meta( $p->ID, '_ab_anchor', true );
				if ( $anchor ) : ?>
				<a href="#<?php echo esc_attr( $anchor ); ?>"><?php echo esc_html( get_the_title( $p ) ); ?></a>
			<?php endif; endforeach; ?>
		</div>
	</nav>
	<?php endif; ?>

	<main>
		<?php foreach ( $posts as $index => $post ) :
			include __DIR__ . '/parts/servizio-block.php';
		endforeach; ?>
	</main>

</div>
<?php get_footer(); ?>
