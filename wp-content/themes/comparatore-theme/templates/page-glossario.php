<?php
/**
 * Template Name: Glossario
 * Pagina glossario con menu A-Z e termini raggruppati per lettera.
 */

get_header();

$termini = get_posts( [
	'post_type'      => 'ab_glossario',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC',
	'post_status'    => 'publish',
] );

// Raggruppa per prima lettera
$per_lettera = [];
foreach ( $termini as $t ) {
	$lettera = strtoupper( mb_substr( $t->post_title, 0, 1 ) );
	if ( ! ctype_alpha( $lettera ) ) $lettera = '#';
	$per_lettera[ $lettera ][] = $t;
}
ksort( $per_lettera );

$lettere_presenti = array_keys( $per_lettera );
?>

<div class="ab-glossario-page">

	<div class="ab-glossario-hero">
		<div class="wrap">
			<h1><?php the_title(); ?></h1>
			<?php if ( have_posts() ) : the_post(); ?>
				<?php if ( get_the_content() ) : ?>
					<div class="ab-glossario-hero-desc"><?php the_content(); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( ! empty( $lettere_presenti ) ) : ?>
	<nav class="ab-glossario-az-nav" aria-label="Indice alfabetico">
		<div class="wrap">
			<?php
			foreach ( range( 'A', 'Z' ) as $l ) {
				if ( in_array( $l, $lettere_presenti, true ) ) {
					echo '<a href="#lettera-' . esc_attr( $l ) . '" class="ab-az-link ab-az-link--active">' . esc_html( $l ) . '</a>';
				} else {
					echo '<span class="ab-az-link ab-az-link--empty">' . esc_html( $l ) . '</span>';
				}
			}
			?>
		</div>
	</nav>
	<?php endif; ?>

	<div class="wrap ab-glossario-wrap">
		<?php if ( empty( $termini ) ) : ?>
			<p class="ab-glossario-empty">Nessun termine ancora inserito. <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=ab_glossario' ) ); ?>">Aggiungi il primo →</a></p>
		<?php else : ?>
			<?php foreach ( $per_lettera as $lettera => $voci ) : ?>
				<section id="lettera-<?php echo esc_attr( $lettera ); ?>" class="ab-glossario-sezione">
					<h2 class="ab-glossario-lettera"><?php echo esc_html( $lettera ); ?></h2>
					<dl class="ab-glossario-lista">
						<?php foreach ( $voci as $voce ) :
							$def      = get_post_meta( $voce->ID, '_ab_definizione_breve', true );
							$ha_pag   = get_post_meta( $voce->ID, '_ab_ha_pagina', true );
							$link     = $ha_pag ? get_permalink( $voce->ID ) : '';
						?>
							<div class="ab-glossario-voce">
								<dt class="ab-glossario-termine">
									<?php if ( $link ) : ?>
										<a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $voce->post_title ); ?></a>
									<?php else : ?>
										<?php echo esc_html( $voce->post_title ); ?>
									<?php endif; ?>
								</dt>
								<dd class="ab-glossario-definizione">
									<?php echo esc_html( $def ); ?>
									<?php if ( $link ) : ?>
										<a href="<?php echo esc_url( $link ); ?>" class="ab-glossario-leggi">Leggi di più →</a>
									<?php endif; ?>
								</dd>
							</div>
						<?php endforeach; ?>
					</dl>
				</section>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

</div>

<?php get_footer(); ?>
