<?php
/**
 * Plugin Name: Comparatore Core
 * Description: Integrazione con l'API esterna Altrabolletta — comparazione tariffe (Fase 2) e autenticazione OAuth2 / area riservata (Fase 3).
 * Version: 0.1.0
 * Author: Altrabolletta
 * Text Domain: comparatore-core
 */

defined( 'ABSPATH' ) || exit;

define( 'COMPARATORE_CORE_VERSION', '0.1.0' );
define( 'COMPARATORE_CORE_PATH', plugin_dir_path( __FILE__ ) );
define( 'COMPARATORE_CORE_URL', plugin_dir_url( __FILE__ ) );

/**
 * Fase 1: nessuna logica attiva, solo scaffolding.
 * Fase 2: includes/class-api-client.php (client REST verso l'API di comparazione).
 * Fase 3: includes/class-oauth-client.php (flow OAuth2 Authorization Code per l'area riservata).
 */
