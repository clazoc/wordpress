<?php
/**
 * Template pagine statiche standard (chi siamo, contatti, ecc.)
 * Le pagine servizi usano i propri template in templates/page-servizi*.php
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="ab-page-outer">
	<div class="wrap ab-page-wrap">
		<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'ab-page-article' ); ?>>

			<header class="ab-page-header">
				<h1><?php the_title(); ?></h1>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
			<figure class="ab-page-thumb">
				<?php the_post_thumbnail( 'large', [ 'loading' => 'eager' ] ); ?>
			</figure>
			<?php endif; ?>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

		</article>

		<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>
