<?php
/**
 * Custom Post Type: ab_glossario
 *
 * Campi custom:
 *   _ab_definizione_breve  string  definizione breve (1-2 righe)
 *   _ab_ha_pagina          1|''    se abilitato, il termine ha una pagina di dettaglio
 */

defined( 'ABSPATH' ) || exit;

class AB_Glossario_CPT {

	public static function init() {
		add_action( 'init',           [ __CLASS__, 'register_cpt' ] );
		add_action( 'add_meta_boxes', [ __CLASS__, 'add_meta_box' ] );
		add_action( 'save_post',      [ __CLASS__, 'save_meta' ] );
	}

	public static function register_cpt() {
		register_post_type( 'ab_glossario', [
			'labels' => [
				'name'               => 'Glossario',
				'singular_name'      => 'Termine',
				'add_new_item'       => 'Aggiungi termine',
				'edit_item'          => 'Modifica termine',
				'new_item'           => 'Nuovo termine',
				'view_item'          => 'Visualizza termine',
				'search_items'       => 'Cerca termini',
				'not_found'          => 'Nessun termine trovato',
				'not_found_in_trash' => 'Nessun termine nel cestino',
			],
			'public'            => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'menu_icon'         => 'dashicons-book-alt',
			'supports'          => [ 'title', 'editor', 'page-attributes' ],
			'rewrite'           => [ 'slug' => 'glossario' ],
			'has_archive'       => false,
		] );
	}

	public static function add_meta_box() {
		add_meta_box(
			'ab_glossario_details',
			'Dettagli termine',
			[ __CLASS__, 'render_meta_box' ],
			'ab_glossario',
			'normal',
			'high'
		);
	}

	public static function render_meta_box( $post ) {
		wp_nonce_field( 'ab_glossario_save', 'ab_glossario_nonce' );

		$definizione_breve = get_post_meta( $post->ID, '_ab_definizione_breve', true );
		$ha_pagina         = get_post_meta( $post->ID, '_ab_ha_pagina',         true );
		?>
		<p>
			<label for="ab_definizione_breve"><strong>Definizione breve</strong> <span style="font-weight:400;color:#666">(1-2 righe, mostrata nella pagina glossario)</span></label><br>
			<textarea name="ab_definizione_breve" id="ab_definizione_breve" rows="3" style="width:100%;margin-top:4px"><?php echo esc_textarea( $definizione_breve ); ?></textarea>
		</p>
		<p>
			<label>
				<input type="checkbox" name="ab_ha_pagina" value="1" <?php checked( $ha_pagina, '1' ); ?>>
				Questo termine ha una <strong>pagina di approfondimento</strong> (usa il campo "Contenuto" sopra per il testo esteso)
			</label>
		</p>
		<p style="color:#666;font-size:12px;margin-top:0">
			Se abilitato, il termine nella pagina glossario mostrerà un link "Leggi di più →" che porta a questa pagina.
		</p>
		<?php
	}

	public static function save_meta( $post_id ) {
		if (
			! isset( $_POST['ab_glossario_nonce'] ) ||
			! wp_verify_nonce( $_POST['ab_glossario_nonce'], 'ab_glossario_save' ) ||
			defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ||
			! current_user_can( 'edit_post', $post_id )
		) {
			return;
		}

		$definizione = isset( $_POST['ab_definizione_breve'] ) ? sanitize_textarea_field( $_POST['ab_definizione_breve'] ) : '';
		update_post_meta( $post_id, '_ab_definizione_breve', $definizione );
		update_post_meta( $post_id, '_ab_ha_pagina', isset( $_POST['ab_ha_pagina'] ) ? '1' : '' );
	}
}

AB_Glossario_CPT::init();
