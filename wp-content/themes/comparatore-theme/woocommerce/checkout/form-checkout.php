<?php
/**
 * Override checkout WooCommerce — stile altrabolletta.
 * Campi di fatturazione italiani + codice fiscale.
 * Basato su woocommerce/templates/checkout/form-checkout.php
 */
defined( 'ABSPATH' ) || exit;

if ( ! is_user_logged_in() && ! WC()->checkout()->is_registration_enabled() && WC()->checkout()->is_registration_required() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'Devi effettuare l\'accesso per completare l\'acquisto.', 'woocommerce' ) ) );
	return;
}
?>

<div class="ab-checkout-wrap">

<?php do_action( 'woocommerce_before_checkout_form', WC()->checkout() ); ?>

<form name="checkout" method="post" class="checkout woocommerce-checkout ab-checkout-form" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<div class="ab-checkout-grid">

		<!-- Colonna sinistra: dati di fatturazione -->
		<div class="ab-checkout-billing">
			<h2 class="ab-checkout-section-title">Dati di fatturazione</h2>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="ab-checkout-fields">

				<div class="ab-field-row ab-field-row--2col">
					<div class="form-row form-row-first">
						<label for="billing_first_name">Nome <abbr class="required" title="obbligatorio">*</abbr></label>
						<input type="text" class="input-text" name="billing_first_name" id="billing_first_name"
							value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_first_name' ) ); ?>" autocomplete="given-name" required>
					</div>
					<div class="form-row form-row-last">
						<label for="billing_last_name">Cognome <abbr class="required" title="obbligatorio">*</abbr></label>
						<input type="text" class="input-text" name="billing_last_name" id="billing_last_name"
							value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_last_name' ) ); ?>" autocomplete="family-name" required>
					</div>
				</div>

				<div class="form-row">
					<label for="billing_company">Ragione sociale / Azienda</label>
					<input type="text" class="input-text" name="billing_company" id="billing_company"
						value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_company' ) ); ?>" autocomplete="organization">
				</div>

				<div class="ab-field-row ab-field-row--2col">
					<div class="form-row">
						<label for="billing_codice_fiscale">Codice fiscale <abbr class="required" title="obbligatorio">*</abbr></label>
						<input type="text" class="input-text" name="billing_codice_fiscale" id="billing_codice_fiscale"
							value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_codice_fiscale' ) ); ?>"
							maxlength="16" placeholder="Es. RSSMRA80A01H501U" required>
					</div>
					<div class="form-row">
						<label for="billing_piva">Partita IVA</label>
						<input type="text" class="input-text" name="billing_piva" id="billing_piva"
							value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_piva' ) ); ?>"
							maxlength="11" placeholder="Solo se diversa dal CF">
					</div>
				</div>

				<div class="form-row">
					<label for="billing_address_1">Indirizzo <abbr class="required" title="obbligatorio">*</abbr></label>
					<input type="text" class="input-text" name="billing_address_1" id="billing_address_1"
						value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_address_1' ) ); ?>"
						placeholder="Via, numero civico" autocomplete="address-line1" required>
				</div>

				<div class="ab-field-row ab-field-row--3col">
					<div class="form-row">
						<label for="billing_postcode">CAP <abbr class="required" title="obbligatorio">*</abbr></label>
						<input type="text" class="input-text" name="billing_postcode" id="billing_postcode"
							value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_postcode' ) ); ?>"
							maxlength="5" autocomplete="postal-code" required>
					</div>
					<div class="form-row">
						<label for="billing_city">Città <abbr class="required" title="obbligatorio">*</abbr></label>
						<input type="text" class="input-text" name="billing_city" id="billing_city"
							value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_city' ) ); ?>" autocomplete="address-level2" required>
					</div>
					<div class="form-row">
						<label for="billing_state">Provincia <abbr class="required" title="obbligatorio">*</abbr></label>
						<input type="text" class="input-text" name="billing_state" id="billing_state"
							value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_state' ) ); ?>"
							maxlength="2" placeholder="Es. MI" autocomplete="address-level1" required>
					</div>
				</div>

				<input type="hidden" name="billing_country" value="IT">

				<div class="ab-field-row ab-field-row--2col">
					<div class="form-row">
						<label for="billing_email">Email <abbr class="required" title="obbligatorio">*</abbr></label>
						<input type="email" class="input-text" name="billing_email" id="billing_email"
							value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_email' ) ); ?>" autocomplete="email" required>
					</div>
					<div class="form-row">
						<label for="billing_phone">Telefono</label>
						<input type="tel" class="input-text" name="billing_phone" id="billing_phone"
							value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_phone' ) ); ?>" autocomplete="tel">
					</div>
				</div>

				<div class="form-row">
					<label for="billing_sdi">Codice SDI / PEC (per fattura elettronica)</label>
					<input type="text" class="input-text" name="billing_sdi" id="billing_sdi"
						value="<?php echo esc_attr( WC()->checkout()->get_value( 'billing_sdi' ) ); ?>"
						placeholder="Codice destinatario 7 cifre o indirizzo PEC">
				</div>

			</div>

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

			<!-- Note aggiuntive -->
			<h2 class="ab-checkout-section-title" style="margin-top:32px">Note sull'ordine</h2>
			<div class="form-row">
				<label for="order_comments">Note (opzionale)</label>
				<textarea name="order_comments" class="input-text" id="order_comments" placeholder="Eventuali note o richieste particolari" rows="3"></textarea>
			</div>
		</div>

		<!-- Colonna destra: riepilogo ordine e pagamento -->
		<div class="ab-checkout-summary">
			<h2 class="ab-checkout-section-title">Il tuo ordine</h2>

			<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
			<?php do_action( 'woocommerce_checkout_order_review' ); ?>
		</div>

	</div><!-- .ab-checkout-grid -->

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', WC()->checkout() ); ?>

</div><!-- .ab-checkout-wrap -->
