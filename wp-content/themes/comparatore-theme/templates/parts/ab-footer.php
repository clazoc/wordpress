<?php
/**
 * Sitewide footer — newsletter + 3 colonne + copyright.
 * Incluso in front-page.php direttamente e in footer.php del child theme
 * (che lo riceve dai template servizi via get_footer()).
 */
defined( 'ABSPATH' ) || exit;
?>
<footer class="ab-site-footer">
	<div class="wrap">

		<div class="ab-footer-newsletter">
			<div class="ab-footer-newsletter-text">
				<h3>Resta aggiornato sul mercato dell'energia</h3>
				<p>Una email al mese, niente spam: solo le informazioni utili per risparmiare.</p>
			</div>
			<form class="ab-footer-newsletter-form"
				  action="https://altrabolletta.us16.list-manage.com/subscribe/post?u=5625d9c767dfd6244be43631e&amp;id=d30f8b093e&amp;f_id=00932be0f0"
				  method="post">
				<div style="position:absolute;left:-5000px" aria-hidden="true">
					<input type="text" name="b_5625d9c767dfd6244be43631e_d30f8b093e" tabindex="-1" value="">
				</div>
				<input type="email" name="EMAIL" placeholder="La tua email" required>
				<button type="submit" name="subscribe">Iscriviti</button>
			</form>
		</div>

		<div class="ab-footer-cols">

			<div class="ab-footer-col">
				<h4 class="ab-footer-col-title">Altrabolletta.it</h4>
				<p class="ab-footer-legal">
					altrabolletta.it è un progetto di<br>
					<strong>altrabolletta S.r.l.</strong><br>
					P.IVA / C.F. 04470590235<br>
					Via XXV Aprile, 3 - 37030 Lavagno (VR)
				</p>
				<ul class="ab-footer-links">
					<li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>">Privacy Policy</a></li>
					<li><a href="<?php echo esc_url( home_url( '/cookie-policy' ) ); ?>">Cookie Policy</a></li>
					<li><a href="<?php echo esc_url( home_url( '/note-legali' ) ); ?>">Note legali</a></li>
				</ul>
			</div>

			<div class="ab-footer-col">
				<h4 class="ab-footer-col-title">Esplora</h4>
				<ul class="ab-footer-links">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
					<li><a href="<?php echo esc_url( home_url( '/servizi' ) ); ?>">Servizi</a></li>
					<li><a href="<?php echo esc_url( home_url( '/magazine' ) ); ?>">Magazine</a></li>
					<?php if ( defined( 'AB_COMPARATORE_ATTIVO' ) && AB_COMPARATORE_ATTIVO ) : ?>
					<li><a href="<?php echo esc_url( home_url( '/#comparatore' ) ); ?>">Comparatore</a></li>
					<?php endif; ?>
					<?php if ( defined( 'AB_REGISTRAZIONE_ATTIVA' ) && AB_REGISTRAZIONE_ATTIVA ) : ?>
					<li><a href="<?php echo esc_url( home_url( '/area-personale' ) ); ?>">Area personale</a></li>
					<?php endif; ?>
					<li><a href="<?php echo esc_url( home_url( '/contatti' ) ); ?>">Contatti</a></li>
				</ul>
			</div>

			<div class="ab-footer-col">
				<h4 class="ab-footer-col-title">Seguici</h4>
				<?php get_template_part( 'templates/parts/ab-social' ); ?>
			</div>

		</div>

		<div class="ab-footer-bar">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> altrabolletta.it &mdash; Tutti i diritti riservati.</span>
		</div>

	</div>
</footer>
