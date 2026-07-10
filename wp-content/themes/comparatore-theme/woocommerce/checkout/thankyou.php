<?php
/**
 * Override pagina "Grazie" post-acquisto — stile altrabolletta.
 */
defined( 'ABSPATH' ) || exit;
?>

<div class="ab-woo-wrap ab-thankyou-wrap">

<?php if ( $order ) :
	do_action( 'woocommerce_before_thankyou', $order->get_id() );
?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<div class="ab-thankyou-notice ab-thankyou-notice--error">
			<p><?php esc_html_e( 'Purtroppo il tuo ordine non è andato a buon fine. Riprova o contattaci.', 'woocommerce' ); ?></p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="ab-btn-buy">Riprova il pagamento</a>
		</div>

	<?php else : ?>

		<div class="ab-thankyou-header">
			<div class="ab-thankyou-icon">✅</div>
			<h1><?php esc_html_e( 'Grazie per il tuo acquisto!', 'woocommerce' ); ?></h1>
			<p>Il tuo ordine è stato ricevuto. Riceverai una email di conferma all'indirizzo indicato.</p>
		</div>

		<div class="ab-thankyou-details">
			<div class="ab-thankyou-meta">
				<div class="ab-thankyou-meta-item">
					<span class="ab-thankyou-meta-label">Numero ordine</span>
					<strong><?php echo $order->get_order_number(); ?></strong>
				</div>
				<div class="ab-thankyou-meta-item">
					<span class="ab-thankyou-meta-label">Data</span>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
				</div>
				<div class="ab-thankyou-meta-item">
					<span class="ab-thankyou-meta-label">Totale</span>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</div>
				<div class="ab-thankyou-meta-item">
					<span class="ab-thankyou-meta-label">Metodo di pagamento</span>
					<strong><?php echo $order->get_payment_method_title(); ?></strong>
				</div>
			</div>
		</div>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

		<div class="ab-thankyou-actions">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ab-btn-info">← Torna alla homepage</a>
		</div>

	<?php endif; ?>

<?php else : ?>

	<div class="ab-thankyou-header">
		<div class="ab-thankyou-icon">✅</div>
		<h1><?php esc_html_e( 'Grazie per il tuo acquisto!', 'woocommerce' ); ?></h1>
		<p>Il tuo ordine è stato ricevuto con successo.</p>
	</div>

	<div class="ab-thankyou-actions">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ab-btn-info">← Torna alla homepage</a>
	</div>

<?php endif; ?>

</div><!-- .ab-thankyou-wrap -->
