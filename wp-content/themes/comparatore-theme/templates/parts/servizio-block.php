<?php
/**
 * Partial: singolo blocco servizio.
 * Variabili attese: $post (WP_Post), $index (int, 0-based per alternare direzione).
 */
if ( ! isset( $post ) || ! isset( $index ) ) return;

$anchor          = get_post_meta( $post->ID, '_ab_anchor',          true );
$emoji           = get_post_meta( $post->ID, '_ab_emoji',           true ) ?: '⚡';
$immagine_id     = (int) get_post_meta( $post->ID, '_ab_immagine_id', true );
$is_free         = get_post_meta( $post->ID, '_ab_is_free',         true );
$prezzo          = get_post_meta( $post->ID, '_ab_prezzo',          true );
$coming_soon     = get_post_meta( $post->ID, '_ab_coming_soon',     true );
$info_subject    = get_post_meta( $post->ID, '_ab_info_subject',    true );
$woo_product_id  = (int) get_post_meta( $post->ID, '_ab_woo_product_id', true );

// Recupera prezzo e URL add-to-cart da WooCommerce se disponibile
$woo_price       = '';
$woo_cart_url    = '';
if ( $woo_product_id && function_exists( 'wc_get_product' ) ) {
	$woo_product = wc_get_product( $woo_product_id );
	if ( $woo_product && $woo_product->is_purchasable() ) {
		$woo_price    = $woo_product->get_price_html();
		$woo_cart_url = esc_url( add_query_arg( 'add-to-cart', $woo_product_id, wc_get_checkout_url() ) );
	}
}

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
				<?php if ( $woo_price ) : ?>
					<span class="ab-tag-price ab-woo-price"><?php echo $woo_price; ?></span>
				<?php elseif ( $prezzo ) : ?>
					<span class="ab-tag-price"><?php echo esc_html( $prezzo ); ?></span>
				<?php endif; ?>
				<?php if ( $coming_soon ) : ?>
					<span class="ab-tag-price">Coming soon</span>
				<?php endif; ?>
				<?php if ( $woo_cart_url ) : ?>
					<a href="<?php echo $woo_cart_url; ?>" class="ab-btn-buy">Acquista →</a>
				<?php elseif ( $info_subject ) : ?>
					<a href="mailto:info@altrabolletta.it?subject=<?php echo rawurlencode( $info_subject ); ?>" class="ab-btn-info">Richiedi info</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="ab-service-block-img" aria-hidden="true">
			<?php if ( $immagine_id ) : ?>
				<?php echo wp_get_attachment_image( $immagine_id, 'medium', false, [ 'class' => 'ab-service-img', 'loading' => 'lazy' ] ); ?>
			<?php else : ?>
				<?php echo esc_html( $emoji ); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
