<?php
/**
 * Override carrello WooCommerce — stile altrabolletta.
 * Basato su woocommerce/templates/cart/cart.php
 */
defined( 'ABSPATH' ) || exit;
?>

<div class="ab-woo-wrap">

<?php do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form ab-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				<th class="product-remove"></th>
				<th class="product-name">Servizio</th>
				<th class="product-price">Prezzo</th>
				<th class="product-quantity">Quantità</th>
				<th class="product-subtotal">Totale</th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			?>
			<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

				<td class="product-remove">
					<?php echo apply_filters( 'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							esc_attr__( 'Rimuovi elemento', 'woocommerce' ),
							esc_attr( $product_id ),
							esc_attr( $_product->get_sku() )
						),
						$cart_item_key
					); ?>
				</td>

				<td class="product-name" data-title="Servizio">
					<?php if ( $product_permalink ) : ?>
						<a href="<?php echo esc_url( $product_permalink ); ?>"><?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ); ?></a>
					<?php else : ?>
						<?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ); ?>
					<?php endif; ?>
					<?php do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key ); ?>
					<?php echo WC()->cart->get_item_data( $cart_item ); ?>
				</td>

				<td class="product-price" data-title="Prezzo">
					<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
				</td>

				<td class="product-quantity" data-title="Quantità">
					<?php if ( $_product->is_sold_individually() ) : ?>
						<span>1</span>
						<input type="hidden" name="cart[<?php echo esc_attr( $cart_item_key ); ?>][qty]" value="1">
					<?php else : ?>
						<?php woocommerce_quantity_input( [
							'input_name'   => "cart[{$cart_item_key}][qty]",
							'input_value'  => $cart_item['quantity'],
							'max_value'    => $_product->get_max_purchase_quantity(),
							'min_value'    => '0',
							'product_name' => $_product->get_name(),
						], $_product ); ?>
					<?php endif; ?>
				</td>

				<td class="product-subtotal" data-title="Totale">
					<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
				</td>

			</tr>
			<?php endif; endforeach; ?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">
					<?php if ( wc_coupons_enabled() ) : ?>
					<div class="coupon">
						<label for="coupon_code"><?php esc_html_e( 'Codice sconto', 'woocommerce' ); ?></label>
						<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Codice sconto', 'woocommerce' ); ?>">
						<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Applica codice', 'woocommerce' ); ?>"><?php esc_html_e( 'Applica codice', 'woocommerce' ); ?></button>
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>
					<?php endif; ?>

					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Aggiorna carrello', 'woocommerce' ); ?>"><?php esc_html_e( 'Aggiorna carrello', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>
					<?php wp_nonce_field( 'woocommerce-cart', '_wpnonce' ); ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="cart-collaterals">
	<?php do_action( 'woocommerce_cart_collaterals' ); ?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>

</div><!-- .ab-woo-wrap -->
