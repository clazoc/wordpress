<?php
/**
 * Pagina Magazine — Posts page (Settings → Reading).
 * Template hierarchy: home.php ha priorità su archive.php per la blog page.
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="ab-archive-wrap">
	<div class="wrap ab-archive-inner">

		<header class="ab-archive-header">
			<p class="ab-archive-label">Magazine</p>
			<h1 class="ab-archive-title">
				<?php
				$blog_page_id = get_option( 'page_for_posts' );
				echo $blog_page_id ? esc_html( get_the_title( $blog_page_id ) ) : 'Articoli';
				?>
			</h1>
		</header>

		<?php if ( have_posts() ) : ?>

			<ol class="ab-post-list" reversed>
				<?php
				$ab_index = 0;
				while ( have_posts() ) :
					the_post();
					$ab_flip = ( $ab_index % 2 === 1 ) ? ' ab-post-row--flip' : '';
					$ab_index++;

					$cats = get_the_category();
				?>
				<li class="ab-post-row<?php echo esc_attr( $ab_flip ); ?>">

					<?php if ( has_post_thumbnail() ) : ?>
					<a class="ab-post-thumb" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
						<?php the_post_thumbnail( 'medium', [ 'loading' => 'lazy' ] ); ?>
					</a>
					<?php else : ?>
					<div class="ab-post-thumb ab-post-thumb--empty" aria-hidden="true"></div>
					<?php endif; ?>

					<div class="ab-post-body">
						<?php if ( $cats ) : ?>
						<div class="ab-post-cats">
							<?php foreach ( $cats as $cat ) : ?>
							<a class="ab-post-cat" href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
								<?php echo esc_html( $cat->name ); ?>
							</a>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>

						<h2 class="ab-post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>

						<p class="ab-post-excerpt">
							<?php
							if ( has_excerpt() ) {
								echo wp_kses_post( get_the_excerpt() );
							} else {
								echo wp_trim_words( get_the_content(), 28, '…' );
							}
							?>
						</p>

						<div class="ab-post-meta">
							<span class="ab-post-author">
								<?php echo esc_html( get_the_author() ); ?>
							</span>
							<span class="ab-post-sep" aria-hidden="true">·</span>
							<time class="ab-post-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
								<?php echo esc_html( get_the_date( 'j F Y' ) ); ?>
							</time>
							<?php
							$words   = str_word_count( wp_strip_all_tags( get_the_content() ) );
							$minutes = max( 1, (int) round( $words / 200 ) );
							?>
						</div>

						<div class="ab-post-footer">
							<a class="ab-post-readmore" href="<?php the_permalink(); ?>">
								Leggi l'articolo →
							</a>
							<span class="ab-post-readtime">
								<?php printf( '%d min di lettura', $minutes ); ?>
							</span>
						</div>
					</div>

				</li>
				<?php endwhile; ?>
			</ol>

			<nav class="ab-pagination">
				<?php
				the_posts_pagination( [
					'mid_size'  => 2,
					'prev_text' => '← Precedenti',
					'next_text' => 'Successivi →',
				] );
				?>
			</nav>

		<?php else : ?>

			<p class="ab-archive-empty">Nessun articolo pubblicato.</p>

		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>
