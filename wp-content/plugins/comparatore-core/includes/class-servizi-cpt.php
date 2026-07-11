<?php
/**
 * Custom Post Type: ab_servizio
 *
 * Campi custom (meta box "Dettagli servizio"):
 *   _ab_cat          string  categoria pagina: privati | imprese | societa
 *   _ab_anchor       string  slug per l'anchor nav (es. servizio-confronto)
 *   _ab_emoji        string  emoji placeholder immagine
 *   _ab_is_free      1|''   mostra badge verde FREE
 *   _ab_prezzo       string  etichetta prezzo es. "Da 10 €" (vuoto = nessun tag extra)
 *   _ab_coming_soon  1|''   mostra tag "Coming soon"
 *   _ab_info_subject string  se valorizzato, mostra bottone "Richiedi info" (mailto)
 */

defined( 'ABSPATH' ) || exit;

class AB_Servizi_CPT {

	public static function init() {
		add_action( 'init',              [ __CLASS__, 'register_cpt' ] );
		add_action( 'add_meta_boxes',    [ __CLASS__, 'add_meta_box' ] );
		add_action( 'save_post',         [ __CLASS__, 'save_meta' ] );
	}

	public static function register_cpt() {
		register_post_type( 'ab_servizio', [
			'labels' => [
				'name'               => 'Servizi',
				'singular_name'      => 'Servizio',
				'add_new_item'       => 'Aggiungi servizio',
				'edit_item'          => 'Modifica servizio',
				'new_item'           => 'Nuovo servizio',
				'view_item'          => 'Visualizza servizio',
				'search_items'       => 'Cerca servizi',
				'not_found'          => 'Nessun servizio trovato',
				'not_found_in_trash' => 'Nessun servizio nel cestino',
			],
			'public'            => false,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'menu_icon'         => 'dashicons-list-view',
			'supports'          => [ 'title', 'editor', 'page-attributes' ],
			'rewrite'           => false,
		] );
	}

	public static function add_meta_box() {
		add_meta_box(
			'ab_servizio_details',
			'Dettagli servizio',
			[ __CLASS__, 'render_meta_box' ],
			'ab_servizio',
			'side',
			'high'
		);
	}

	public static function render_meta_box( $post ) {
		wp_nonce_field( 'ab_servizio_save', 'ab_servizio_nonce' );

		$cat          = get_post_meta( $post->ID, '_ab_cat',          true );
		$anchor       = get_post_meta( $post->ID, '_ab_anchor',       true );
		$emoji        = get_post_meta( $post->ID, '_ab_emoji',        true );
		$is_free      = get_post_meta( $post->ID, '_ab_is_free',      true );
		$prezzo       = get_post_meta( $post->ID, '_ab_prezzo',       true );
		$coming_soon  = get_post_meta( $post->ID, '_ab_coming_soon',  true );
		$info_subject    = get_post_meta( $post->ID, '_ab_info_subject',    true );
		$woo_product_id  = get_post_meta( $post->ID, '_ab_woo_product_id',  true );
		$immagine_id     = (int) get_post_meta( $post->ID, '_ab_immagine_id', true );
		$immagine_url    = $immagine_id ? wp_get_attachment_image_url( $immagine_id, 'medium' ) : '';
		?>
		<p>
			<label for="ab_cat"><strong>Categoria</strong></label><br>
			<select name="ab_cat" id="ab_cat" style="width:100%">
				<option value="">— seleziona —</option>
				<option value="privati"  <?php selected( $cat, 'privati' ); ?>>Privati</option>
				<option value="imprese"  <?php selected( $cat, 'imprese' ); ?>>Imprese</option>
				<option value="societa"  <?php selected( $cat, 'societa' ); ?>>Società di vendita</option>
			</select>
		</p>
		<p>
			<label for="ab_anchor"><strong>Anchor ID</strong></label><br>
			<input type="text" name="ab_anchor" id="ab_anchor" value="<?php echo esc_attr( $anchor ); ?>" style="width:100%" placeholder="es. servizio-confronto">
		</p>
		<p>
			<label for="ab_emoji"><strong>Emoji</strong> <span style="font-weight:400;color:#666">(ignorata se carichi un'immagine sotto)</span></label><br>
			<input type="text" name="ab_emoji" id="ab_emoji" value="<?php echo esc_attr( $emoji ); ?>" style="width:100%" placeholder="es. 🔍">
		</p>
		<p style="border-top:1px solid #ddd;padding-top:10px;margin-top:4px">
			<label><strong>Immagine servizio</strong></label><br>
			<?php if ( $immagine_url ) : ?>
				<img id="ab_immagine_preview" src="<?php echo esc_url( $immagine_url ); ?>" style="max-width:100%;margin:6px 0;border-radius:4px;display:block">
			<?php else : ?>
				<img id="ab_immagine_preview" src="" style="max-width:100%;margin:6px 0;border-radius:4px;display:none">
			<?php endif; ?>
			<input type="hidden" name="ab_immagine_id" id="ab_immagine_id" value="<?php echo esc_attr( $immagine_id ?: '' ); ?>">
			<button type="button" id="ab_immagine_scegli" class="button">Scegli immagine</button>
			<button type="button" id="ab_immagine_rimuovi" class="button" style="<?php echo $immagine_id ? '' : 'display:none'; ?>">Rimuovi</button>
		</p>
		<script>
		jQuery(function($){
			var frame;
			$('#ab_immagine_scegli').on('click', function(){
				if(frame){ frame.open(); return; }
				frame = wp.media({ title:'Scegli immagine servizio', button:{text:'Usa immagine'}, multiple:false });
				frame.on('select', function(){
					var att = frame.state().get('selection').first().toJSON();
					$('#ab_immagine_id').val(att.id);
					$('#ab_immagine_preview').attr('src', att.sizes?.medium?.url || att.url).show();
					$('#ab_immagine_rimuovi').show();
				});
				frame.open();
			});
			$('#ab_immagine_rimuovi').on('click', function(){
				$('#ab_immagine_id').val('');
				$('#ab_immagine_preview').attr('src','').hide();
				$(this).hide();
			});
		});
		</script>
		<p>
			<label>
				<input type="checkbox" name="ab_is_free" value="1" <?php checked( $is_free, '1' ); ?>>
				Mostra badge verde <strong>FREE</strong>
			</label>
		</p>
		<p>
			<label for="ab_prezzo"><strong>Prezzo aggiuntivo</strong></label><br>
			<input type="text" name="ab_prezzo" id="ab_prezzo" value="<?php echo esc_attr( $prezzo ); ?>" style="width:100%" placeholder="es. Da 10 €">
		</p>
		<p>
			<label>
				<input type="checkbox" name="ab_coming_soon" value="1" <?php checked( $coming_soon, '1' ); ?>>
				Mostra tag <strong>Coming soon</strong>
			</label>
		</p>
		<p>
			<label for="ab_info_subject"><strong>Oggetto email "Richiedi info"</strong></label><br>
			<input type="text" name="ab_info_subject" id="ab_info_subject" value="<?php echo esc_attr( $info_subject ); ?>" style="width:100%" placeholder="lascia vuoto per nascondere il bottone">
		</p>
		<p style="border-top:1px solid #ddd;padding-top:10px;margin-top:10px">
			<label for="ab_woo_product_id"><strong>ID prodotto WooCommerce</strong></label><br>
			<input type="number" name="ab_woo_product_id" id="ab_woo_product_id" value="<?php echo esc_attr( $woo_product_id ); ?>" style="width:100%" placeholder="es. 42 — lascia vuoto se non collegato">
			<span style="font-size:11px;color:#666">Collega un prodotto WooCommerce per mostrare il prezzo e il bottone Acquista.</span>
		</p>
		<?php
	}

	public static function save_meta( $post_id ) {
		if (
			! isset( $_POST['ab_servizio_nonce'] ) ||
			! wp_verify_nonce( $_POST['ab_servizio_nonce'], 'ab_servizio_save' ) ||
			defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ||
			! current_user_can( 'edit_post', $post_id )
		) {
			return;
		}

		$fields = [
			'_ab_cat'             => 'ab_cat',
			'_ab_anchor'          => 'ab_anchor',
			'_ab_emoji'           => 'ab_emoji',
			'_ab_prezzo'          => 'ab_prezzo',
			'_ab_info_subject'    => 'ab_info_subject',
			'_ab_woo_product_id'  => 'ab_woo_product_id',
			'_ab_immagine_id'     => 'ab_immagine_id',
		];
		foreach ( $fields as $meta_key => $input_key ) {
			$value = isset( $_POST[ $input_key ] ) ? sanitize_text_field( $_POST[ $input_key ] ) : '';
			update_post_meta( $post_id, $meta_key, $value );
		}

		$checkboxes = [ '_ab_is_free' => 'ab_is_free', '_ab_coming_soon' => 'ab_coming_soon' ];
		foreach ( $checkboxes as $meta_key => $input_key ) {
			update_post_meta( $post_id, $meta_key, isset( $_POST[ $input_key ] ) ? '1' : '' );
		}
	}
}

AB_Servizi_CPT::init();
