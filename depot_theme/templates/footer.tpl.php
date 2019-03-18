<<<<<<< HEAD
<footer class="l-footer" role="contentinfo">

    <?php if ($site_name) : 
          $menu_1 = menu_tree('menu-menu-footer-ber-uns-');
          $menu_2 = menu_tree('menu-menu-footer-informationen-');
          $menu_3 = menu_tree('main-menu');
    ?>
        <div class="row">

            <div class="medium-5 column">
                <img id="footer__logo" src="<?= base_path() . path_to_theme(); ?>/images/logo.svg" title="Logo depot.social" />
                <p>
                    Betreut durch <a href="https://stiftung-ecken-wecken.de/" title="Webseite der Stiftung 'Ecken Wecken' besuchen">Stiftung "Ecken Wecken"</a>.
                    <br />
                    Herzlichen Dank an unsere Förderer
                    <br />
                    <a href="#">
                        <img id="footer__sponsors-badge" src="<?= base_path() . path_to_theme(); ?>/images/footer_sponsors.png" />
                    </a>
                </p>
            </div>

            <div class="depot-footer-menu medium-2 medium-offset-1 column">
				<h6>Über uns</h6>
                <?php print drupal_render($menu_1); ?>
            </div>

            <div class="depot-footer-menu medium-2 column">
				<h6>Informationen</h6>
                <?php print drupal_render($menu_2); ?>
            </div>

            <div class="depot-footer-menu medium-2 column">
				<h6>Kontakt</h6>
                <?php print drupal_render($menu_3); ?>
            </div>

        </div>
	<?php endif; ?>
</footer>

<?php 
    if ($messages && $zurb_foundation_messages_modal) {
        print $messages;
    } 
?>
=======
<footer class="l-footer" role="contentinfo">

    <?php if ($site_name) : 
          $menu_1 = menu_tree('main-menu');
          $menu_2 = menu_tree('menu-footer-ber-uns-');
          $menu_3 = menu_tree('main-menu');
    ?>
        <div class="row">

            <div class="medium-5 column">
                <img id="footer__logo" src="<?= base_path() . path_to_theme(); ?>/images/logo.svg" title="Logo Depot Leipzig" />
                <p>
                    Betreut durch <a href="https://stiftung-ecken-wecken.de/" title="Webseite der Stiftung Ecken Wecken besuchen">Stiftung Ecken Wecken</a>.
                    <br />
                    Herzlichen Dank an unsere Förderer
                    <br />
                    <a href="#">
                        <img id="footer__sponsors-badge" src="<?= base_path() . path_to_theme(); ?>/images/footer_sponsors.png" />
                    </a>
                </p>
            </div>

            <div class="depot-footer-menu medium-2 medium-offset-1 column">
				<h6>Über uns</h6>
                <?php print drupal_render($menu_1); ?>
            </div>

            <div class="depot-footer-menu medium-2 column">
				<h6>Mein Depot</h6>
                <?php print drupal_render($menu_2); ?>
            </div>

            <div class="depot-footer-menu medium-2 column">
				<h6>Kontakt</h6>
                <?php print drupal_render($menu_3); ?>
            </div>

        </div>
	<?php endif; ?>
</footer>

<?php 
    if ($messages && $zurb_foundation_messages_modal) {
        print $messages;
    } 
?>
>>>>>>> 87fefedda3330ba011fcac45dfd806f850d1afc1
