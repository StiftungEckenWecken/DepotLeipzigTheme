<style type="text/css">
* {font-family: 'Open Sans', sans-serif;}
.os {font-family: 'Open Sans', sans-serif !important;}
h1, h2, h3, h4, h5, h6 {font-family: 'Roboto Slab', serif;}
.rs, .accordion-title, .l-footer *, .form-type-checkbox:not(.form-item-field-verleihvertrag--und) .description, fieldset legend, label {font-family: 'Roboto Slab', serif !important;}
.page-ressourcen #page-title {text-align:center;}
.page-ressourcen .header-content-box {margin-top:10px;}
.page-ressourcen #header_box {width: 300px;text-align:center;position: relative;margin:0 auto;}
.page-ressourcen #header_box img { width: 300px;margin-top:-182px; }
.page-ressourcen .view-header {margin-bottom:5px;}
.page-ressourcen #button-group-logged-in {border-top:1px solid #DDDDDD;border-bottom:1px solid #DDDDDD;background-color:#fff;padding:0 30px;margin-bottom:25px;}
.page-ressourcen .views-exposed-widgets > div {width:25%;}
.page-ressourcen .views-exposed-form input, .page-ressourcen .views-exposed-form select, .page-ressourcen .views-exposed-form button {width:100%;}
#edit-submit-ressourcen-bersicht { font-size: 0.8125rem; }
.view-header:after { content:' ';display:table;box-sizing:border-box;clear:both; }
</style>
<script type="text/javascript">
    $ = jQuery;
    $(document).ready(function () {
        $('#edit-field-fake-kategorie').change(function () {
            $('#edit-field-kategorie-und-0-state-id').val($(this).val());
        });
    });
</script>
<!-- TEMPORARY!! -->
<header id="wannabe-hero"></header>

<!--.page -->
<div role="document" class="page">

    <!--.l-header -->
    <header role="banner" class="l-header">

		<?php if ($top_bar): ?>
            <!--.top-bar -->
			<?php if ($top_bar_classes): ?>
                <div class="<?php print $top_bar_classes; ?>">
			<?php endif; ?>
            <nav class="top-bar" data-topbar <?php print $top_bar_options; ?>>
                <ul class="title-area">
                    <li class="name"><a href="/"><img id="top-bar-logo"
                                                      src="<?= base_path() . path_to_theme(); ?>/images/logo.png"
                                                      alt="Logo Depot Leipzig"/></a></li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span><?php print $top_bar_menu_text; ?></span></a>
                    </li>
                </ul>
                <section class="top-bar-section">
                    <ul id="main-menu" class="main-nav">
                        <li>
                            <select id="depot-global-select-kategorie">
								<?php foreach (depot_get_kategorien(true) as $bid => $bezirk) { ?>
                                    <option value="<?= $bid; ?>"><?= (empty($bid)) ? t('Alle Kategorien') : $bezirk; ?></option>
								<?php } ?>
                            </select>
                        </li>
                    </ul>
					<?php if ($top_bar_main_menu) : ?>
						<?php //print $top_bar_main_menu; ?>
					<?php endif; ?>
					<?php $user_menu = menu_tree('user-menu');
					print drupal_render($user_menu); ?>
                </section>
            </nav>
			<?php if ($top_bar_classes): ?>
                </div>
			<?php endif; ?>
            <!--/.top-bar -->
		<?php endif; ?>

        <!-- Title, slogan and menu -->
		<?php if ($alt_header): ?>
            <section class="row <?php print $alt_header_classes; ?>">

				<?php if ($linked_logo): print $linked_logo; endif; ?>

				<?php if ($site_name): ?>
					<?php if ($title): ?>
                        <div id="site-name" class="element-invisible">
                            <strong>
                                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"
                                   rel="home"><span><?php print $site_name; ?></span></a>
                            </strong>
                        </div>
					<?php else: /* Use h1 when the content title is empty */ ?>
                        <h1 id="site-name">
                            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"
                               rel="home"><span><?php print $site_name; ?></span></a>
                        </h1>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ($site_slogan): ?>
                    <h2 title="<?php print $site_slogan; ?>" class="site-slogan"><?php print $site_slogan; ?></h2>
				<?php endif; ?>

				<?php if ($alt_main_menu): ?>
                    <nav id="main-menu" class="navigation" role="navigation">
						<?php print ($alt_main_menu); ?>
                    </nav> <!-- /#main-menu -->
				<?php endif; ?>

				<?php if ($alt_secondary_menu): ?>
                    <nav id="secondary-menu" class="navigation" role="navigation">
						<?php print $alt_secondary_menu; ?>
                    </nav> <!-- /#secondary-menu -->
				<?php endif; ?>

            </section>
		<?php endif; ?>
        <!-- End title, slogan and menu -->

		<?php if (!empty($page['header'])): ?>
            <!--.l-header-region -->
            <section class="l-header-region row">
                <div class="columns">
					<?php print render($page['header']); ?>
                </div>
            </section>
            <!--/.l-header-region -->
		<?php endif; ?>

    </header>
    <!--/.l-header -->

	<?php if (!empty($page['featured'])): ?>
        <!--.l-featured -->
        <section class="l-featured row">
            <div class="columns">
				<?php print render($page['featured']); ?>
            </div>
        </section>
        <!--/.l-featured -->
	<?php endif; ?>

	<?php if ($messages && !$zurb_foundation_messages_modal): ?>
        <!--.l-messages -->
        <section class="l-messages row">
            <div class="columns">
				<?php if ($messages): print $messages; endif; ?>
            </div>
        </section>
        <!--/.l-messages -->
	<?php endif; ?>

	<?php if (!empty($page['help'])): ?>
        <!--.l-help -->
        <section class="l-help row">
            <div class="columns">
				<?php print render($page['help']); ?>
            </div>
        </section>
        <!--/.l-help -->
	<?php endif; ?>

    <!--.l-main -->
    <main role="main" id="main-content" class="row l-main">
        <!-- .l-main region -->
        <div class="<?php print $main_grid; ?> main columns">
			<?php if (!empty($page['highlighted'])): ?>
                <div class="highlight panel callout">
					<?php print render($page['highlighted']); ?>
                </div>
			<?php endif; ?>

            <a id="main-content"></a>

			<?php if ($breadcrumb): print $breadcrumb; endif; ?>

			<?php if ($title): ?>
				<?php print render($title_prefix); ?>
                <h1 id="page-title" class="title"><?php print $title; ?></h1>
				<?php print render($title_suffix); ?>
			<?php endif; ?>

			<?php if (!empty($tabs)): ?>
				<?php print render($tabs); ?>
				<?php if (!empty($tabs2)): print render($tabs2); endif; ?>
			<?php endif; ?>

			<?php if ($action_links): ?>
                <ul class="action-links">
					<?php print render($action_links); ?>
                </ul>
			<?php endif; ?>

			<?php print render($page['content']); ?>
        </div>
        <!--/.l-main region -->
    </main>
    <!--/.l-main -->

	<?php if (!empty($page['triptych_first']) || !empty($page['triptych_middle']) || !empty($page['triptych_last'])): ?>
        <!--.triptych-->
        <section class="l-triptych row">
            <div class="triptych-first medium-4 columns">
				<?php print render($page['triptych_first']); ?>
            </div>
            <div class="triptych-middle medium-4 columns">
				<?php print render($page['triptych_middle']); ?>
            </div>
            <div class="triptych-last medium-4 columns">
				<?php print render($page['triptych_last']); ?>
            </div>
        </section>
        <!--/.triptych -->
	<?php endif; ?>

	<?php if (!empty($page['footer_firstcolumn']) || !empty($page['footer_secondcolumn']) || !empty($page['footer_thirdcolumn']) || !empty($page['footer_fourthcolumn'])): ?>
        <!--.footer-columns -->
        <section class="row l-footer-columns">
			<?php if (!empty($page['footer_firstcolumn'])): ?>
                <div class="footer-first medium-3 columns">
					<?php print render($page['footer_firstcolumn']); ?>
                </div>
			<?php endif; ?>
			<?php if (!empty($page['footer_secondcolumn'])): ?>
                <div class="footer-second medium-3 columns">
					<?php print render($page['footer_secondcolumn']); ?>
                </div>
			<?php endif; ?>
			<?php if (!empty($page['footer_thirdcolumn'])): ?>
                <div class="footer-third medium-3 columns">
					<?php print render($page['footer_thirdcolumn']); ?>
                </div>
			<?php endif; ?>
			<?php if (!empty($page['footer_fourthcolumn'])): ?>
                <div class="footer-fourth medium-3 columns">
					<?php print render($page['footer_fourthcolumn']); ?>
                </div>
			<?php endif; ?>
        </section>
        <!--/.footer-columns-->
	<?php endif; ?>

</div><!--/.page -->

<!--.l-footer -->
<footer class="l-footer" role="contentinfo">
	<?php if (!empty($page['footer'])): ?>
        <div class="footer columns">
            <div class="copyright columns">
                &copy; <?php print date('Y') . ' ' . $site_name . ' ' . t('All rights reserved.'); ?>
            </div>
			<?php print render($page['main-menu']); ?>
        </div>
	<?php endif; ?>

	<?php if ($site_name) : $menu = menu_tree('main-menu'); ?>
        <div class="row">

            <div class="medium-4 column">
                <p>&copy; Copyright <?php print date('Y') . ', Stiftung "Ecken Wecken"'; ?></p>
            </div>

            <div id="depot-footer-menu" class="medium-8 column">
				<?php print drupal_render($menu); ?>
            </div>

        </div>
	<?php endif; ?>
</footer>
<!--/.l-footer -->

<?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
