<?php
/**
 * Header globale — usato da tutti i template eccetto front-page.php
 * (che ha il proprio shell HTML completo).
 *
 * Wrappa solo la barra nav in .ab-home; il div non abbraccia il contenuto
 * della pagina, quindi gli stili .ab-home restano confinati alla nav.
 */

defined( 'ABSPATH' ) || exit;

$ab_comparatore   = defined( 'AB_COMPARATORE_ATTIVO' )  && AB_COMPARATORE_ATTIVO;
$ab_registrazione = defined( 'AB_REGISTRAZIONE_ATTIVA' ) && AB_REGISTRAZIONE_ATTIVA;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="ab-home">

	<div class="rainbow-bar"></div>

	<header class="ab-nav">
		<div class="wrap ab-nav-inner">
			<a class="ab-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				altra<span>bolletta</span>.it
			</a>

			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'ab-menu',
				'fallback_cb'    => false,
				'depth'          => 1,
			] );
			?>

			<?php get_template_part( 'templates/parts/ab-social' ); ?>

			<div class="ab-nav-actions">
				<?php if ( $ab_registrazione ) : ?>
				<a class="ab-btn ab-btn-ghost" href="<?php echo esc_url( wp_login_url() ); ?>">Accedi</a>
				<?php endif; ?>
				<?php if ( $ab_comparatore ) : ?>
				<a class="ab-btn ab-btn-primary" href="<?php echo esc_url( home_url( '/#comparatore' ) ); ?>">Confronta ora</a>
				<?php endif; ?>
			</div>

			<button type="button" class="ab-menu-toggle" aria-expanded="false" aria-controls="ab-mobile-menu">
				<span></span><span></span><span></span>
				<span class="screen-reader-text">Apri il menu</span>
			</button>
		</div>

		<div id="ab-mobile-menu" class="ab-mobile-menu" hidden>
			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'ab-menu',
				'fallback_cb'    => false,
				'depth'          => 1,
			] );
			?>
			<div class="ab-nav-actions">
				<?php if ( $ab_registrazione ) : ?>
				<a class="ab-btn ab-btn-ghost" href="<?php echo esc_url( wp_login_url() ); ?>">Accedi</a>
				<?php endif; ?>
				<?php if ( $ab_comparatore ) : ?>
				<a class="ab-btn ab-btn-primary" href="<?php echo esc_url( home_url( '/#comparatore' ) ); ?>">Confronta ora</a>
				<?php endif; ?>
			</div>
		</div>
	</header>

</div><!-- /.ab-home (solo nav) -->
