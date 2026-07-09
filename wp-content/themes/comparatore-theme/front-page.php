<?php
/**
 * Template Name: Homepage Altrabolletta
 *
 * Homepage statica (Fase 1): contenuti reali via WordPress (menu, articoli),
 * comparatore e form ancora segnaposto in attesa dell'integrazione Fase 2.
 */

defined( 'ABSPATH' ) || exit;

wp_enqueue_style(
	'comparatore-theme-front-page',
	get_stylesheet_directory_uri() . '/assets/css/front-page.css',
	[ 'comparatore-theme-tokens' ],
	wp_get_theme()->get( 'Version' )
);
wp_enqueue_script(
	'comparatore-theme-front-page',
	get_stylesheet_directory_uri() . '/assets/js/front-page.js',
	[],
	wp_get_theme()->get( 'Version' ),
	true
);

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
?>

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

			<div class="ab-nav-actions">
				<a class="ab-btn ab-btn-ghost" href="<?php echo esc_url( wp_login_url() ); ?>">Accedi</a>
				<a class="ab-btn ab-btn-primary" href="#comparatore">Confronta ora</a>
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
				<a class="ab-btn ab-btn-ghost" href="<?php echo esc_url( wp_login_url() ); ?>">Accedi</a>
				<a class="ab-btn ab-btn-primary" href="#comparatore">Confronta ora</a>
			</div>
		</div>
	</header>

	<section class="ab-hero" id="comparatore">
		<div class="wrap ab-hero-grid">
			<div>
				<span class="ab-eyebrow">● Comparatore indipendente</span>
				<h1>Confronta le offerte luce e gas senza pressioni e senza costi.</h1>
				<p class="ab-lead">Analizziamo le tariffe di tutti i fornitori e ti mostriamo solo quelle davvero più convenienti per i tuoi consumi. Zero costi di provvigione, zero chiamate indesiderate.</p>
				<div class="ab-hero-trust">
					<div class="ab-trust-item"><span class="ab-dot"></span> Nessun costo per te</div>
					<div class="ab-trust-item"><span class="ab-dot"></span> Dati trattati in autonomia</div>
					<div class="ab-trust-item"><span class="ab-dot"></span> Aggiornamento periodico tariffe</div>
				</div>
			</div>

			<?php if ( defined( 'AB_COMPARATORE_ATTIVO' ) && AB_COMPARATORE_ATTIVO ) : ?>
			<div class="ab-compare-card">
				<h3>Trova la tua offerta migliore</h3>
				<p>Bastano pochi dati, nessuna registrazione richiesta.</p>
				<div class="ab-tabs">
					<div class="ab-tab">Luce</div>
					<div class="ab-tab">Gas</div>
					<div class="ab-tab is-active">Luce + Gas</div>
				</div>
				<div class="ab-field">
					<label>Codice postale</label>
					<input type="text" placeholder="Es. 38068" disabled>
				</div>
				<div class="ab-field">
					<label>Consumo annuo stimato (kWh / Smc)</label>
					<input type="text" placeholder="Lascia vuoto se non lo sai" disabled>
				</div>
				<button class="ab-btn ab-btn-primary" disabled>Vedi le offerte migliori</button>
				<p class="ab-compare-note">Confronto gratuito · risultati in meno di 1 minuto<br>(disponibile a breve)</p>
			</div>
			<?php else : ?>
			<div class="ab-compare-card">
				<h3>Resta aggiornato</h3>
				<p>Stiamo costruendo qualcosa di diverso: zero provvigioni, zero chiamate, confronto trasparente tra tutti i fornitori.</p>
				<form action="https://altrabolletta.us16.list-manage.com/subscribe/post?u=5625d9c767dfd6244be43631e&amp;id=d30f8b093e&amp;f_id=00932be0f0" method="post" class="ab-hero-newsletter">
					<div class="ab-field">
						<label for="ab-hero-email">La tua email</label>
						<input type="email" id="ab-hero-email" name="EMAIL" placeholder="nome@esempio.it" required>
					</div>
					<div style="position:absolute;left:-5000px" aria-hidden="true">
						<input type="text" name="b_5625d9c767dfd6244be43631e_d30f8b093e" tabindex="-1" value="">
					</div>
					<button type="submit" name="subscribe" class="ab-btn ab-btn-primary">Avvisami al lancio</button>
					<p class="ab-compare-note">Niente spam — solo un'email il giorno del lancio.</p>
				</form>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="ab-section">
		<div class="wrap">
			<div class="ab-section-head">
				<h2>Come funziona il confronto</h2>
				<p>Un processo semplice, pensato per farti capire davvero cosa stai scegliendo.</p>
			</div>
			<div class="ab-steps">
				<div class="ab-step"><div class="ab-num">1</div><h4>Inserisci i tuoi dati</h4><p>Pochi campi, anche senza una bolletta sotto mano.</p></div>
				<div class="ab-step"><div class="ab-num">2</div><h4>Analizziamo il mercato</h4><p>Confrontiamo le tariffe disponibili in base ai tuoi consumi reali.</p></div>
				<div class="ab-step"><div class="ab-num">3</div><h4>Scegli con chiarezza</h4><p>Ti mostriamo costi, vantaggi e condizioni in modo trasparente.</p></div>
				<div class="ab-step"><div class="ab-num">4</div><h4>Attiva quando vuoi</h4><p>Nessun obbligo: decidi tu se e quando cambiare fornitore.</p></div>
			</div>
		</div>
	</section>

	<section class="ab-section ab-trust-section">
		<div class="wrap">
			<div class="ab-section-head">
				<h2>Perché altrabolletta.it</h2>
				<p>Indipendenza e trasparenza non sono uno slogan: sono il motivo per cui esistiamo.</p>
			</div>
			<div class="ab-trust-grid">
				<div class="ab-trust-card"><h4>Zero costi di provvigione</h4><p>Non guadagniamo sulle attivazioni: il nostro interesse è solo trovarti la tariffa giusta.</p></div>
				<div class="ab-trust-card"><h4>Confronto neutrale</h4><p>Analizziamo le offerte di tutti i fornitori, senza preferenze commerciali.</p></div>
				<div class="ab-trust-card"><h4>Aggiornamento continuo</h4><p>Le tariffe vengono riviste periodicamente per restare sempre accurate.</p></div>
				<div class="ab-trust-card"><h4>Niente burocrazia</h4><p>Se decidi di cambiare, ti accompagniamo passo passo senza pratiche complicate.</p></div>
			</div>
		</div>
	</section>

	<section class="ab-section">
		<div class="wrap">
			<div class="ab-section-head">
				<h2>Un account, se e quando ti serve</h2>
				<p>Il confronto è sempre gratuito. L'area personale aggiunge strumenti utili nel tempo.</p>
			</div>
			<div class="ab-plans">
				<div class="ab-plan">
					<span class="ab-plan-badge">Free</span>
					<h3>Area personale base</h3>
					<div class="ab-price">Gratuita, per sempre</div>
					<ul>
						<li><span class="ab-check">✓</span> Trova la tua offerta migliore</li>
						<li><span class="ab-check">✓</span> Accesso a guide e contenuti</li>
						<li><span class="ab-check">✓</span> Promemoria scadenza contratto</li>
						<li><span class="ab-check">✓</span> Storico delle tue ricerche</li>
					</ul>
					<a class="ab-btn ab-btn-ghost" style="width:100%;padding:12px;text-align:center;" href="<?php echo esc_url( wp_registration_url() ); ?>">Registrati gratis</a>
				</div>
				<div class="ab-plan is-featured">
					<span class="ab-plan-badge">Premium</span>
					<h3>Monitoraggio continuo</h3>
					<div class="ab-price">Tutto il Free, in più:</div>
					<ul>
						<li><span class="ab-check">✓</span> Controllo automatico della bolletta</li>
						<li><span class="ab-check">✓</span> Avviso quando esiste un'offerta migliore</li>
						<li><span class="ab-check">✓</span> Preferenze personalizzate sui fornitori</li>
						<li><span class="ab-check">✓</span> Assistenza dedicata</li>
					</ul>
					<span class="ab-btn ab-btn-primary" style="width:100%;padding:12px;text-align:center;display:block;box-sizing:border-box;">Scopri Premium (presto)</span>
				</div>
			</div>
		</div>
	</section>

	<section class="ab-section">
		<div class="wrap">
			<div class="ab-section-head" style="margin-bottom:32px;">
				<h2>I fornitori che confrontiamo</h2>
			</div>
			<div class="ab-providers-row">
				<span class="ab-provider-logo">EDF</span>
				<span class="ab-provider-logo">LUCE&amp;GAS</span>
				<span class="ab-provider-logo">PULSEE</span>
				<span class="ab-provider-logo">ENEL</span>
				<span class="ab-provider-logo">VIVI ENERGIA</span>
			</div>
		</div>
	</section>

	<?php
	$ab_magazine_query = new WP_Query( [
		'post_type'           => 'post',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
	] );

	if ( $ab_magazine_query->have_posts() ) :
		?>
		<section class="ab-section">
			<div class="wrap">
				<div class="ab-section-head">
					<h2>Dal Magazine</h2>
					<p>Guide e aggiornamenti per orientarti nel mercato libero dell'energia.</p>
				</div>
				<div class="ab-articles">
					<?php while ( $ab_magazine_query->have_posts() ) : $ab_magazine_query->the_post(); ?>
						<div class="ab-article-card">
							<a class="ab-article-thumb" href="<?php the_permalink(); ?>" style="<?php echo has_post_thumbnail() ? 'background-image:url(' . esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ) . ');' : ''; ?>display:block;"></a>
							<div class="ab-article-body">
								<?php $ab_category = get_the_category(); ?>
								<?php if ( ! empty( $ab_category ) ) : ?>
									<span class="ab-article-tag"><?php echo esc_html( $ab_category[0]->name ); ?></span>
								<?php endif; ?>
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php
		wp_reset_postdata();
	endif;
	?>

	<section class="ab-section" style="padding-top:0;">
		<div class="wrap">
			<div class="ab-newsletter">
				<div>
					<h3>Resta aggiornato sul mercato dell'energia</h3>
					<p>Una email al mese, niente spam: solo le informazioni utili per risparmiare.</p>
				</div>
				<form class="ab-newsletter-form" method="post" action="#">
					<input type="email" name="ab_newsletter_email" placeholder="La tua email" required>
					<button type="submit">Iscriviti</button>
				</form>
			</div>
		</div>
	</section>

</div>

<?php wp_footer(); ?>
</body>
</html>
