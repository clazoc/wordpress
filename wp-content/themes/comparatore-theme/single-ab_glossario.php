<?php
/**
 * Template per la pagina di dettaglio di un singolo termine del glossario.
 */

get_header();
the_post();

$def = get_post_meta( get_the_ID(), '_ab_definizione_breve', true );
?>

<div class="wrap ab-glossario-single-wrap">

	<nav class="ab-glossario-breadcrumb" aria-label="Breadcrumb">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
		<span class="ab-bc-sep">›</span>
		<?php
		// Cerca la pagina con template page-glossario.php
		$pagina_glossario = get_pages( [ 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/page-glossario.php' ] );
		if ( ! empty( $pagina_glossario ) ) : ?>
			<a href="<?php echo esc_url( get_permalink( $pagina_glossario[0]->ID ) ); ?>">Glossario</a>
			<span class="ab-bc-sep">›</span>
		<?php else : ?>
			<a href="<?php echo esc_url( home_url( '/glossario/' ) ); ?>">Glossario</a>
			<span class="ab-bc-sep">›</span>
		<?php endif; ?>
		<span class="ab-bc-current"><?php the_title(); ?></span>
	</nav>

	<article class="ab-glossario-single">
		<header class="ab-glossario-single-header">
			<h1><?php the_title(); ?></h1>
			<?php if ( $def ) : ?>
				<p class="ab-glossario-single-def"><?php echo esc_html( $def ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( get_the_content() ) : ?>
			<div class="ab-glossario-single-content ab-content">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>

		<footer class="ab-glossario-single-footer">
			<?php
			$pagina_glossario = get_pages( [ 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/page-glossario.php' ] );
			$back_url = ! empty( $pagina_glossario ) ? get_permalink( $pagina_glossario[0]->ID ) : home_url( '/glossario/' );
			?>
			<a href="<?php echo esc_url( $back_url ); ?>" class="ab-glossario-back">← Torna al glossario</a>
		</footer>
	</article>

</div>

<?php get_footer(); ?>
