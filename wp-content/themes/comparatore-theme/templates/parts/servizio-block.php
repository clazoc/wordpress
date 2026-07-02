<?php
/**
 * Partial: singolo blocco servizio.
 * Variabili attese: $post (WP_Post), $index (int, 0-based per alternare direzione).
 */
if ( ! isset( $post ) || ! isset( $index ) ) return;

$anchor       = get_post_meta( $post->ID, '_ab_anchor',       true );
$emoji        = get_post_meta( $post->ID, '_ab_emoji',        true ) ?: '⚡';
$is_free      = get_post_meta( $post->ID, '_ab_is_free',      true );
$prezzo       = get_post_meta( $post->ID, '_ab_prezzo',       true );
$coming_soon  = get_post_meta( $post->ID, '_ab_coming_soon',  true );
$info_subject = get_post_meta( $post->ID, '_ab_info_subject', true );

$reverse_class = ( $index % 2 !== 0 ) ? ' ab-reverse' : '';
$anchor_attr   = $anchor ? ' id="' . esc_attr( $anchor ) . '"' : '';
?>
<div<?php echo $anchor_attr; ?> class="ab-service-block<?php echo $reverse_class; ?>">
	<div class="wrap">
		<div class="ab-service-block-text">
			<h2><?php echo esc_html( get_the_title( $post ) ); ?></h2>
			<?php echo wp_kses_post( apply_filters( 'the_content', $post->post_content ) ); ?>
			<div class="ab-service-actions">
				<?php if ( $is_free ) : ?>
					<span class="ab-tag-price ab-free">FREE</span>
				<?php endif; ?>
				<?php if ( $prezzo ) : ?>
					<span class="ab-tag-price"><?php echo esc_html( $prezzo ); ?></span>
				<?php endif; ?>
				<?php if ( $coming_soon ) : ?>
					<span class="ab-tag-price">Coming soon</span>
				<?php endif; ?>
				<?php if ( $info_subject ) : ?>
					<a href="mailto:info@altrabolletta.it?subject=<?php echo rawurlencode( $info_subject ); ?>" class="ab-btn-info">Richiedi info</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="ab-service-block-img" aria-hidden="true"><?php echo esc_html( $emoji ); ?></div>
	</div>
</div>
