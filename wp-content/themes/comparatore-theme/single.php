<?php
/**
 * Template singolo articolo.
 * Usa il nostro get_header() e get_footer() per avere
 * nav e footer coerenti con il resto del sito.
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="ab-article-outer">
	<div class="wrap ab-article-wrap">
		<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="ab-article-header">
				<?php
				$cats = get_the_category();
				if ( $cats ) :
					foreach ( $cats as $cat ) :
				?>
				<a class="ab-article-cat" href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
					<?php echo esc_html( $cat->name ); ?>
				</a>
				<?php
					endforeach;
				endif;
				?>
				<h1><?php the_title(); ?></h1>
				<div class="ab-article-meta">
					<span><?php echo esc_html( get_the_author() ); ?></span>
					<span>·</span>
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
						<?php echo esc_html( get_the_date( 'j F Y' ) ); ?>
					</time>
					<?php
					$words   = str_word_count( wp_strip_all_tags( get_the_content() ) );
					$minutes = max( 1, (int) round( $words / 200 ) );
					?>
					<span>·</span>
					<span><?php printf( '%d min di lettura', $minutes ); ?></span>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
			<figure class="ab-article-thumb">
				<?php the_post_thumbnail( 'large', [ 'loading' => 'eager' ] ); ?>
			</figure>
			<?php endif; ?>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<footer class="ab-article-footer">
				<a class="ab-article-back" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">
					← Torna al Magazine
				</a>
			</footer>

		</article>

		<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>
